<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Car Scraper Library for CodeIgniter
 * Handles Cloudflare bypass with auto-starting ChromeDriver
 * 
 * Installation:
 * 1. Save as application/libraries/Car_scraper.php
 * 2. Load in controller: $this->load->library('car_scraper');
 * 3. Use: $data = $this->car_scraper->get_car_data('EYS061');
 */

require_once FCPATH . 'vendor/autoload.php';

use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Chrome\ChromeOptions;

class Car_scraper {
    
    private $ci;
    private $chromedriver_path = '/usr/local/bin/chromedriver-real';  // ← Changed
    private $chrome_binary = '/opt/google/chrome/google-chrome';      // ← Added
    private $chromedriver_port = 9515;
    
    public function __construct($config = array()) {
        $this->ci =& get_instance();
        
        // Allow custom configuration
        if (isset($config['chromedriver_path'])) {
            $this->chromedriver_path = $config['chromedriver_path'];
        }
        if (isset($config['chromedriver_port'])) {
            $this->chromedriver_port = $config['chromedriver_port'];
        }
    }
    
    /**
     * Check if ChromeDriver is running
     */
    private function is_chromedriver_running() {
        $connection = @fsockopen('127.0.0.1', $this->chromedriver_port, $errno, $errstr, 1);
        if ($connection) {
            fclose($connection);
            return TRUE;
        }
        return FALSE;
    }
    
    /**
     * Start ChromeDriver if not running
     */
    private function start_chromedriver() {
        if ($this->is_chromedriver_running()) {
            return TRUE; // Already running
        }
        
        // Start ChromeDriver on Windows
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $command = 'start /B ' . $this->chromedriver_path . ' --port=' . $this->chromedriver_port . ' > NUL 2>&1';
            pclose(popen($command, 'r'));
            
            // Wait for it to start (max 5 seconds)
            $max_wait = 5;
            $waited = 0;
            while ($waited < $max_wait) {
                usleep(500000); // 0.5 seconds
                $waited += 0.5;
                if ($this->is_chromedriver_running()) {
                    return TRUE;
                }
            }
        } else {
            // Linux/Mac
            $command = $this->chromedriver_path . ' --port=' . $this->chromedriver_port . ' > /dev/null 2>&1 &';
            exec($command);
            sleep(2);
            return $this->is_chromedriver_running();
        }
        
        return FALSE;
    }
    
    /**
     * Get car data from biluppgifter.se
     * 
     * @param string $registration Car registration number
     * @return array Car data array or FALSE on failure
     */
    public function get_car_data($registration) {
        
        $registration = strtoupper(trim($registration));
        
        // Ensure ChromeDriver is running
        if (!$this->start_chromedriver()) {
            log_message('error', 'Car_scraper: Could not start ChromeDriver');
            return FALSE;
        }
        
        $driver = NULL;
        
        try {
            // Setup Chrome with anti-detection
            $options = new ChromeOptions();
            $options->setBinary($this->chrome_binary);  // ← Add this line
            $options->addArguments([
                '--headless=new',  // ← Changed from '--headless'
                '--disable-blink-features=AutomationControlled',
                '--disable-dev-shm-usage',
                '--no-sandbox',
                '--window-size=1920,1080',
                '--disable-gpu',
                '--user-agent=Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36'
            ]);                          
            $options->setExperimentalOption('excludeSwitches', ['enable-automation']);
            $options->setExperimentalOption('useAutomationExtension', FALSE);
            
            $capabilities = DesiredCapabilities::chrome();
            $capabilities->setCapability(ChromeOptions::CAPABILITY, $options);
            
            // Connect to ChromeDriver
            $driver = RemoteWebDriver::create(
                'http://localhost:' . $this->chromedriver_port, 
                $capabilities, 
                60000, 
                60000
            );
            
            // Hide webdriver property
            $driver->executeScript('Object.defineProperty(navigator, "webdriver", {get: () => undefined})');
            
            // Navigate to page
            $url = "https://biluppgifter.se/fordon/{$registration}/";
            $driver->get($url);
            
            // Smart wait - check every 2 seconds for content
            $max_wait = 20;
            $waited = 0;
            $html = '';
            
            while ($waited < $max_wait) {
                sleep(2);
                $waited += 2;
                
                $html = $driver->getPageSource();
                
                // Check if we got past Cloudflare and have data
                if (strpos($html, 'vehicle-data') !== FALSE) {
                    break;
                }
                
                // If not Cloudflare page, stop waiting
                if (strpos($html, 'Just a moment') === FALSE && strpos($html, 'Checking your browser') === FALSE) {
                    break;
                }
            }
            
            // Close browser
            $driver->quit();
            
            // Parse and return data
            return $this->parse_html($html, $registration);
            
        } catch (Exception $e) {
            if ($driver) {
                try { 
                    $driver->quit(); 
                } catch (Exception $ex) {}
            }
            
            log_message('error', 'Car_scraper error: ' . $e->getMessage());
            return FALSE;
        }
    }
    
    /**
     * Parse HTML and extract car data
     * Returns array compatible with existing post_car code
     */
    private function parse_html($html, $registration) {
        
        libxml_use_internal_errors(TRUE);
        $dom = new DOMDocument();
        $dom->loadHTML($html);
        libxml_clear_errors();
        
        $xpath = new DOMXPath($dom);
        
        // Initialize result array
        $result = array('response' => 'not found');
        
        // Find vehicle-data section
        $vehicle_section = $xpath->query("//section[@id='vehicle-data']")->item(0);
        
        if (!$vehicle_section) {
            return $result; // No data found
        }
        
        $result = array('response' => 'successfully');
        
        // Extract vehicle data
        $items = $xpath->query(".//li", $vehicle_section);
        
        foreach ($items as $item) {
            $label_nodes = $xpath->query(".//span[@class='label']", $item);
            $value_nodes = $xpath->query(".//span[@class='value']", $item);
            
            if ($label_nodes->length > 0 && $value_nodes->length > 0) {
                $vlabel = trim($label_nodes->item(0)->textContent);
                $vvalue = trim($value_nodes->item(0)->textContent);
                
                // Apply same transformations as original code
                if ($vlabel == 'Mätarställning (besiktning)') {
                    $vlabel_new = "Mätarställning";
                    $vvalue_new = str_replace("mil", "", $vvalue);
                    $vvalue_new = str_replace(" ", "", $vvalue_new);
                } elseif ($vlabel == 'Fordonsår / Modellår') {
                    $vlabel_new = 'Fordonsår';
                    $vvalue_new = preg_replace('/ \/.*/', '', $vvalue);
                } else {
                    $vlabel_new = $vlabel;
                    $vvalue_new = $vvalue;
                }
                
                $result[$vlabel_new] = $vvalue_new;
            }
        }
        
        // Extract technical data
        $technical_section = $xpath->query("//section[@id='technical-data']")->item(0);
        
        if ($technical_section) {
            $items = $xpath->query(".//li", $technical_section);
            
            foreach ($items as $item) {
                $label_nodes = $xpath->query(".//span[@class='label']", $item);
                $value_nodes = $xpath->query(".//span[@class='value']", $item);
                
                if ($label_nodes->length > 0 && $value_nodes->length > 0) {
                    $vlabel = trim($label_nodes->item(0)->textContent);
                    $vvalue = trim($value_nodes->item(0)->textContent);
                    
                    // Apply transformation
                    if ($vlabel == 'Passagerare') {
                        $vlabel_new = "Passagerare";
                        $vvalue_new = preg_replace('/ st .*/', '', $vvalue);
                    } else {
                        $vlabel_new = $vlabel;
                        $vvalue_new = $vvalue;
                    }
                    
                    $result[$vlabel_new] = $vvalue_new;
                }
            }
        }
        
        return $result;
    }
}