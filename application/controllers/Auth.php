<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once(BASEPATH.'simple_html_dom.php');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
        $this->load->helper(array('url', 'form')); // Load the URL helper here
        // $this->load->helper("simple_html_dom");
        // $this->load->library('simple_html_dom');
    }

    public function register() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('register');
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
            );

            $this->User_model->register($data);
            redirect('auth/login');
        }
    }

    public function login() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $user = $this->User_model->login($username, $password);

            if ($user) {
                $this->session->set_userdata('user_id', $user->id);
                $this->session->set_userdata('user_role', $user->role);
                redirect('welcome');
            } else {
                $this->session->set_flashdata('login_failed', 'Invalid username or password');
                redirect('auth/login');
            }
        }
    }

    public function logout() {
        $this->session->unset_userdata('user_id');
        redirect('admin/login');
    }

    public function user_logout() {
        $this->session->unset_userdata('user_id');
        redirect("");
    }


    public function admin_login(){

        $this->load->view('admin/admin_header');
        $this->load->view('admin/admin_login');
        $this->load->view('admin/admin_footer');
    }

    public function admin_login_process(){

        $this->load->library('form_validation');
        $this->form_validation->set_rules('email_address', 'email_address', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $response = array('status' => 'error', 'message' => 'Somthing was wrong');
        } else {
            $username = $this->input->post('email_address');
            $password = $this->input->post('password');
            $user = $this->User_model->login($username, $password);

            if ($user) {
                $this->session->set_userdata('user_id', $user->id);
                $this->session->set_userdata('user_role', $user->role);
                $response = array('status' => 'success', 'message' => 'Login successful! Please hold on while we redirect you to your profile dashboard.');
            } else {

                $response = array('status' => 'error', 'message' => 'Invalid username or password');
            }
        }

        echo json_encode($response);

    }

public function get_current_highest_bidder() {
    $car_id = $this->input->post('car_id');
    
    if (!$car_id) {
        echo json_encode(array('status' => 'error', 'message' => 'Car ID required'));
        return;
    }
    
    // Get highest bid with user info
    $highest_bid = $this->User_model->get_highest_bidder_info($car_id);
    
    if ($highest_bid) {
        echo json_encode(array(
            'status' => 'success',
            'user_id' => $highest_bid['user_id'],
            'bid_amount' => $highest_bid['bidding_price'],
            'is_auto_bid' => $highest_bid['is_auto_bid'],
            'bid_time' => $highest_bid['created']
        ));
    } else {
        echo json_encode(array(
            'status' => 'no_bids',
            'message' => 'No bids yet'
        ));
    }
}
/**
 * Real-time Bid Updates Endpoint
 * Returns current bid data, timer status, and auction state
 */
public function get_bid_updates() {
    $car_id = $this->input->post('car_id');
        $post_status = get_post_status($car_id);
    
    // If it's in timer mode, calculate the actual countdown
    $time_remaining = '';
    if ($post_status === 'timer') {
        $post = $this->Image_model->get_post($car_id);
        $created_at = new DateTime($post->created);
        $expiration_time = clone $created_at;
        $expiration_time->add(new DateInterval('P14D'));
        
        $current_time = new DateTime();
        $interval = $current_time->diff($expiration_time);
        
        $time_remaining = sprintf('%dh %dm %ds', $interval->h, $interval->i, $interval->s);
    }

    if (!$car_id) {
        echo json_encode(array('success' => false, 'message' => 'Car ID required'));
        return;
    }
    
    // Get car data
    $car_data = $this->User_model->get_car_by_id($car_id);
    
    if (!$car_data) {
        echo json_encode(array('success' => false, 'message' => 'Car not found'));
        return;
    }
    
    // Get highest bid
    $highest_bid = $this->User_model->get_highest_bid($car_id);
    
    // Calculate recommended bid
    if (!empty($highest_bid)) {
        $recommended_bid = $highest_bid + 1000;
    } else {
        $recommended_bid = !empty($car_data['fixed_price']) ? $car_data['fixed_price'] * 0.7 : 10000;
    }
    
    // Get total bid count
    $bid_count = $this->User_model->get_total_bid_count($car_id);
    
    // Get reservation status
    $reservation_met = false;
    if (!empty($car_data['reservation_price']) && !empty($highest_bid)) {
        $reservation_met = $highest_bid >= $car_data['reservation_price'];
    }
    
    // Get bid list with user names and time ago
    $bids = $this->User_model->get_bid_with_name($car_id);
    $bid_list = array();
    
    if (!empty($bids)) {
        foreach ($bids as $bid) {
            // Calculate time ago
            // Get bid list with user names and time ago
            $bids = $this->User_model->get_bid_with_name($car_id);
            $bid_list = array();

if (!empty($bids)) {
    foreach ($bids as $bid) {
        // FIX: Use 'created' not 'created_at'
        $time_ago = isset($bid['created']) ? $this->time_ago($bid['created']) : 'Unknown';
        
        $bid_list[] = array(
            'bidder_name' => isset($bid['username']) ? $bid['username'] : 'User #' . $bid['unique_id'],
            'amount' => $bid['bidding_price'],
            'time_ago' => $time_ago,
            'is_auto_bid' => isset($bid['is_auto_bid']) ? $bid['is_auto_bid'] : 0
        );
    }
}
            $bid_list[] = array(
    'bidder_name' => isset($bid['username']) ? $bid['username'] : 'User #' . $bid['unique_id'],
    'amount' => $bid['bidding_price'],
    'time_ago' => $time_ago,
    'is_auto_bid' => isset($bid['is_auto_bid']) ? $bid['is_auto_bid'] : 0
);
        }
    }
    
    // **IMPORTANT: Get timer data for sync**
    $timer_data = get_auction_timer_data($car_id);
    $timer_timestamp = isset($timer_data['created_timestamp']) ? $timer_data['created_timestamp'] : null;
    
    // **IMPORTANT: Check if auction is still active**
    $auction_active = true;
    if ($car_data['auction_status'] == 1) {
        $auction_active = false; // Auction completed
    } else {
        // Check if timer expired
        if ($timer_timestamp) {
            $current_time = time();
            $elapsed = $current_time - $timer_timestamp;
            $three_minutes = 3 * 60;
            
            if ($elapsed >= $three_minutes) {
                $auction_active = false;
            }
        }
    }
    
    // Build response
    $response = array(
        'success' => true,
        'data' => array(
                        'post_status' => $post_status,
            'time_remaining' => $time_remaining,

            'bid_count' => $bid_count,
            'highest_bid' => $highest_bid ? $highest_bid : 0,
            'recommended_bid' => $recommended_bid,
            'reservation_met' => $reservation_met,
            'bids' => $bid_list,
            'timer_timestamp' => $timer_timestamp,
            'auction_active' => $auction_active,
            'auction_status' => $car_data['auction_status']
        )
    );
    
    echo json_encode($response);
}

/**
 * Helper function to calculate time ago
 */
private function time_ago($datetime) {
    $time_ago = strtotime($datetime);
    $current_time = time();
    $time_difference = $current_time - $time_ago;
    $seconds = $time_difference;
    
    $minutes = round($seconds / 60);
    $hours = round($seconds / 3600);
    $days = round($seconds / 86400);
    $weeks = round($seconds / 604800);
    $months = round($seconds / 2629440);
    $years = round($seconds / 31553280);
    
    if ($seconds <= 60) {
        return "Just now";
    } else if ($minutes <= 60) {
        return ($minutes == 1) ? "1 minute ago" : "$minutes minutes ago";
    } else if ($hours <= 24) {
        return ($hours == 1) ? "1 hour ago" : "$hours hours ago";
    } else if ($days <= 7) {
        return ($days == 1) ? "1 day ago" : "$days days ago";
    } else if ($weeks <= 4.3) {
        return ($weeks == 1) ? "1 week ago" : "$weeks weeks ago";
    } else if ($months <= 12) {
        return ($months == 1) ? "1 month ago" : "$months months ago";
    } else {
        return ($years == 1) ? "1 year ago" : "$years years ago";
    }
}

    public function profile(){
  
        if (!$this->session->userdata('user_id')) {
            redirect(base_url());
            return;
        }
        
        $data['profile'] = $this->User_model->get_profile($this->session->userdata('user_id'));
        $data['countries'] = $this->User_model->get_countries();

        $this->load->view('admin/admin_header');
        $this->load->view('profile',$data);
        $this->load->view('admin/admin_footer');

    }

    
    public function profile_update(){

      

        if($this->input->post('change_password')!="" and $this->input->post('confirm_password')!="" ){

        $data = array(
            'id' => $this->input->post('user_id'), // Assuming the form has a hidden field for 'id'
            'profle_photo_id' => $this->input->post('profle_photo_id'),
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
          //  'email' => $this->input->post('email_address'),
            'phone_number' => $this->input->post('phone_number'),
            'social_security_number' => $this->input->post('social_security_number'),
            'country' => $this->input->post('country'),
            'state' => $this->input->post('state'),
            'city' => $this->input->post('city'),
            'pincode' => $this->input->post('pincode'),
            'address' => $this->input->post('address'),
            
            'company_name' => $this->input->post('company_name'),
            'registration_number' => $this->input->post('registration_number'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
            
        );
    }else{

        $data = array(
            'id' => $this->input->post('user_id'), // Assuming the form has a hidden field for 'id'
            'profle_photo_id' => $this->input->post('profle_photo_id'),
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
          //  'email' => $this->input->post('email_address'),
            'phone_number' => $this->input->post('phone_number'),
            'social_security_number' => $this->input->post('social_security_number'),
            'country' => $this->input->post('country'),
            'state' => $this->input->post('state'),
            'company_name' => $this->input->post('company_name'),
            'registration_number' => $this->input->post('registration_number'),
            'city' => $this->input->post('city'),
            'pincode' => $this->input->post('pincode'),
            'address' => $this->input->post('address')
            
        );

    }

        $update_status = $this->User_model->profile_update($data);

        if ($update_status) {
            $response = array('status' => 'success', 'message' => 'Profile Updated Successfully.');
        } else {
            $response = array('status' => 'error', 'message' => 'Failed to update.');
        }

        echo json_encode($response);


    }
    
    public function account_activation(){
        $id = $this->input->get('id');
        $code = $this->input->get('code');
        $this->load->view('admin/admin_header');
        // print("hello<br/>");
        
        // print($id.'  '.$code.'<br/>');
        print("<br/>");
        $account_result = $this->User_model->verify_activation_code($id,$code);
        if($account_result){
            if($account_result->active == 0) {
                if($this->User_model->activate_account($account_result)) {
                  print("<center><h2>Your account has been activted</h2></center>");  
                } else {
                    print("<center><h2>Error: could not activate account</h2></center>");
                }    
            } else {
                print("<center><h2>your account is already activated!</h2></center>");
            }
            // print($account_result->email);
            
        } else {
            print("<center><h2>Error: no account found!</h2></center>");
        }
        // redirect('welcome');
        print("<center><a href=\"./welcome\">Home</a></center>");
        $this->load->view('admin/admin_footer');
        
    }


    public function signup(){
        $username = $this->input->post('first_name') . $this->input->post('last_name');
        $email = $this->input->post('email_address');
    
        // Check if username or email already exists
        if ($this->User_model->is_username_taken($username)) {
            $response = array('status' => 'error', 'message' => 'Username already taken.');
        } elseif ($this->User_model->is_email_taken($email)) {
            $response = array('status' => 'error', 'message' => 'Email already taken.');
        } else {
            $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $code = substr(str_shuffle($set), 0, 12);
            // Proceed with user registration
            $data = array(
                'username' => $username,
                'profle_photo_id' => $this->input->post('profle_photo_id'),
                'first_name' => ucwords(strtolower($this->input->post('first_name'))),
                'last_name' => ucwords(strtolower($this->input->post('last_name'))),
                'email' => $email,
                'phone_number' => $this->input->post('phone_number'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role' => $this->input->post('role'),
                'company_name' => ucwords(strtolower($this->input->post('company_name'))),
                'registration_number' => $this->input->post('registration_number'),
                'code' => $code,
                'active' => false
            );
    
            $insert_status = $this->User_model->signup($data);
            
            
            

            // print_r($insert_status);
    
if ($insert_status) {
                //$this->session->set_userdata('user_id', $insert_status->id);
                //$this->session->set_userdata('user_role', $insert_status->role);

                //$response = array('status' => 'success', 'message' => 'Signup successfully! Please hold on while we redirect you to your profile dashboard.');
                $response = array('status' => 'success', 'message' => 'Registration successful! Please check your email to verify your account.');
                $account_active_link = site_url('/account_activation?id='.$insert_status->id.'&code='.$code);
                
                if($this->input->post('role')=='dealer'){
                    $message='
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px;">
        <h2 style="color: #2c3e50;">Welcome to Zogglo Car Auction</h2>
        
        <p>Dear '.$username.',</p>
        
        <p>Thank you for registering as a dealer with Zogglo. Your account has been created successfully.</p>
        
        <div style="background-color: #f8f9fa; padding: 15px; border-radius: 5px; margin: 20px 0;">
            <p style="margin: 5px 0;"><strong>Account Details:</strong></p>
            <p style="margin: 5px 0;">Username: '.$email.'</p>
            <p style="margin: 5px 0;">Role: '.ucfirst($this->input->post('role')).'</p>
        </div>
        
        <p>To complete your registration, please activate your account by clicking the button below:</p>
        
        <div style="text-align: center; margin: 30px 0;">
            <a href="'.$account_active_link.'" style="background-color: #007bff; color: white; padding: 12px 30px; text-decoration: none; border-radius: 5px; display: inline-block;">Activate My Account</a>
        </div>
        
        <p style="font-size: 12px; color: #666;">If the button doesn\'t work, copy and paste this link into your browser:<br/>
        <a href="'.$account_active_link.'" style="color: #007bff;">'.$account_active_link.'</a></p>
        
        <hr style="border: none; border-top: 1px solid #eee; margin: 30px 0;">
        
        <p style="margin: 0;">Best regards,<br/>
        <strong>The Zogglo Team</strong></p>
    </div>
</body>
</html>';

                } else {
                    $message='
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px;">
        <h2 style="color: #2c3e50;">Welcome to Zogglo Car Auction</h2>
        
        <p>Dear '.$username.',</p>
        
        <p>Thank you for registering with Zogglo. Your account has been created successfully.</p>
        
        <div style="background-color: #f8f9fa; padding: 15px; border-radius: 5px; margin: 20px 0;">
            <p style="margin: 5px 0;"><strong>Account Details:</strong></p>
            <p style="margin: 5px 0;">Username: '.$email.'</p>
            <p style="margin: 5px 0;">Role: '.ucfirst($this->input->post('role')).'</p>
        </div>
        
        <p>To complete your registration, please activate your account by clicking the button below:</p>
        
        <div style="text-align: center; margin: 30px 0;">
            <a href="'.$account_active_link.'" style="background-color: #007bff; color: white; padding: 12px 30px; text-decoration: none; border-radius: 5px; display: inline-block;">Activate My Account</a>
        </div>
        
        <p style="font-size: 12px; color: #666;">If the button doesn\'t work, copy and paste this link into your browser:<br/>
        <a href="'.$account_active_link.'" style="color: #007bff;">'.$account_active_link.'</a></p>
        
        <hr style="border: none; border-top: 1px solid #eee; margin: 30px 0;">
        
        <p style="margin: 0;">Best regards,<br/>
        <strong>The Zogglo Team</strong></p>
    </div>
</body>
</html>';
                }
                
// To send HTML mail, the Content-type header must be set
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// Additional headers
// $headers .= 'From: sender@example.com' . "\r\n";
// $headers .= 'Reply-To: sender@example.com' . "\r\n";

$subject ="Thanks for your registration as on our car auction website";

mail($email, $subject, $message, $headers);

                
            } else {
                $response = array('status' => 'error', 'message' => 'Failed to sign up.');
            }
        }
    
        echo json_encode($response);
    }


    public function loginprocess(){

        $this->load->library('form_validation');
        $this->form_validation->set_rules('email_address', 'email_address', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $response = array('status' => 'error', 'message' => 'Somthing was wrong');
        } else {
            $username = $this->input->post('email_address');
            $password = $this->input->post('password');
            $user = $this->User_model->login($username, $password);

            if ($user) {
                $this->session->set_userdata('user_id', $user->id);
                $this->session->set_userdata('user_role', $user->role);
                $response = array('status' => 'success', 'message' => 'Login successful! Please hold on while we redirect you to your profile dashboard.');
            } else {

                $response = array('status' => 'error', 'message' => 'Invalid username or password');
            }
        }

        echo json_encode($response);

    }
    

    public function us_de_profile(){
  
        if (!$this->session->userdata('user_id')) {
            redirect(base_url());
            return;
        }
        
        $data['profile'] = $this->User_model->get_profile($this->session->userdata('user_id'));
        $data['countries'] = $this->User_model->get_countries();

        $this->load->view('header');
        $this->load->view('us_de_profile',$data);
        $this->load->view('footer');

    }


    public function post_car(){
  
        // if (!$this->session->userdata('user_id')) {
        //     redirect(base_url());
        //     return;
        // }
        if($this->input->post('CAR_NO')) {
            $search_car_no = $this->input->post('CAR_NO');
        }
        // $data['profile'] = $this->User_model->get_profile($this->session->userdata('user_id'));

        $data['body_category'] = $this->User_model->get_body_category();
        $data['brand_category'] = $this->User_model->get_brand_category();
        $data['buy_method_category'] = $this->User_model->get_buy_method_category();
        $data['engine_category'] = $this->User_model->get_engine_category();
        $data['equipment_category'] = $this->User_model->get_equipment_category();
        $data['model_category'] = $this->User_model->get_model_category();
        $data['model_year_category'] = $this->User_model->get_model_year_category();
        $data['fuel_category'] = $this->User_model->get_fuel_category();
        
        // if(isset($search_car_no)) {
        //     // echo $search_car_no;
        //     if(FALSE !== ($json_string = @file_get_contents('https://api.car.info/v2/app/demo/license-plate/S/'.$search_car_no))) {
        //         $json_array = json_decode($json_string, TRUE);
        //         // print_r($json_array['result']);
        //         $data['Car_Detail_Internet'] = $json_array["result"];
        //         // $response = array('status' => 'success', 'message' => 'Successfully Fetched car info');
        //     } else {
        //         // echo "could not fetch data";
        //         $data['Car_Detail_Internet'] = array('response' => 'not found');
        //         // $response = array('status' => 'error', 'message' => 'Could not fetch Car info');
        //     }
        // } else {
        //     // echo "no car found";
        //     $data['Car_Detail_Internet'] = array('response' => 'not submitted');
        //     // $response = array('status' => 'error', 'message' => 'No Car found');
        // }
        
        if(isset($search_car_no)) {
            // echo $search_car_no;
            $context = stream_context_create(array(
                'http' => array(
                    'header' => array('User-Agent: Mozilla/5.0 (Windows; U; Windows NT 6.1; rv:2.2) Gecko/20110201'),
                ),
            ));
            $api_url = "https://biluppgifter.se/fordon/".$search_car_no."/";
            // $html = file_get_html($api_url, false, $context);
            if(FALSE !== ($html = file_get_html($api_url, false, $context))) {
                $vehical_data = $html->find('section[id=vehicle-data]',0);
                if($vehical_data == null) {
                    $data['CarAPI_data'] = array('response' => 'not found');
                } else {
                    $data['CarAPI_data'] = array('response' => 'successfully');
                    foreach ($vehical_data->find('div[class=inner]',0)->find('ul') as $vehical_ul) {
                        foreach ($vehical_ul->find('li') as $vehical_li) {
                            foreach ($vehical_li->find('span') as $vehical_span) {
                                if($vehical_span->class == 'label') {
                                    $vlabel = $vehical_span->plaintext;
                                } elseif($vehical_span->class == 'value') {
                                    $vvalue = $vehical_span->plaintext;
                                }
                                if(isset($vlabel) && isset($vvalue)) {
                                    if($vlabel == 'Mätarställning (besiktning)') {
                                        $vlabel_new = "Mätarställning";
                                        $vvalue_new = str_replace("mil","",$vvalue);
                                        $vvalue_new = str_replace(" ","",$vvalue_new);
                                    } elseif($vlabel == 'Fordonsår / Modellår') {
                                        $vlabel_new = 'Fordonsår';
                                        $vvalue_new = preg_replace('/ \/.*/', '', $vvalue);
                                    } else {
                                        $vlabel_new = $vlabel;
                                        $vvalue_new = $vvalue;
                                    }
                                    $data['CarAPI_data'][$vlabel_new] = $vvalue_new;
                                }
                            }
                        }
                    }
                    $technical_data = $html->find('section[id=technical-data]',0);
                    foreach ($technical_data->find('div[class=inner]',0)->find('ul') as $technical_ul) {
                        foreach ($technical_ul->find('li') as $technical_li) {
                            foreach ($technical_li->find('span') as $technical_span) {
                                if($technical_span->class == 'label') {
                                    $vlabel = $technical_span->plaintext;
                                } elseif($technical_span->class == 'value') {
                                    $vvalue = $technical_span->plaintext;
                                }
                                if(isset($vlabel) && isset($vvalue)) {
                                    if($vlabel == 'Passagerare') {
                                        $vlabel_new = "Passagerare";
                                        $vvalue_new = preg_replace('/ st .*/', '', $vvalue);
                                    } else {
                                        $vlabel_new = $vlabel;
                                        $vvalue_new = $vvalue;
                                    }
                                    $data['CarAPI_data'][$vlabel_new] = $vvalue_new;
                                }
                            }
                        }
                    }

                }
            } else {
                $data['CarAPI_data'] = array('response' => 'not found');
            }
        } else {
            $data['CarAPI_data'] = array('response' => 'not submitted');
        }

        // print_r($data['CarAPI_data']);

        // foreach ($data['CarAPI_data'] as $key => $value) {
        //     echo $key." - ".$value." <br />";
        // }

        $this->load->view('header');
        $this->load->view('post_car',$data);
        $this->load->view('footer');

    }

    public function car_added() {


        $car_title = $this->input->post('car_title');
        //$car_slug = url_title($car_title, 'dash', TRUE); // Generate slug
		//$nslug=htmlspecialchars($car_title);
		$car_slug=preg_replace('/[^A-Za-z0-9\-]/', '-', $car_title);
         //print_r( $nslug);exit; 
        // exit;
    
        // if ($this->User_model->is_unique_car_name($car_title)) {
            if ($this->User_model->is_unique_car_slug($car_slug)) {
                
                   $car_slug =  $car_slug;
          
            } else {
                 $car_slug =  $car_slug."-".rand(0,1000);
            }
            
                $data = array(
                    'category' => $this->input->post('category'),
                    'car_title' => $this->input->post('car_title'),
                    'car_slug' => $car_slug,
                    'car_sub_title' => $this->input->post('car_sub_title'),
                    'fixed_price' => $this->input->post('fixed_price'),
                    'reduce_price' => $this->input->post('reduce_price'),
                    'reservation_price' =>  $this->input->post('reservation_price'),
                    'emi_show' =>  $this->input->post('emi_show'),
                    'mileage' => $this->input->post('mileage'),
                    'cat_brand' => $this->input->post('cat_brand'),
                    'cat_model' => $this->input->post('cat_model'),
                    'cat_fuel' => $this->input->post('cat_fuel'),
                    'cat_year' => $this->input->post('cat_year'),
                    'cat_buy_method' => $this->input->post('cat_buy_method'),
                    'cat_body' => $this->input->post('cat_body'),
                    'cat_engine' => $this->input->post('cat_engine'),
                    'condition' => $this->input->post('condition'),
                    'cat_equipment' => json_encode($this->input->post('cat_equipment')),
                    'previous_owners' => $this->input->post('previous_owners'),
                    // 'service_book' => $this->input->post('service_book'),
                    'license_number' => $this->input->post('license_number'),
                    // 'gearbox' => $this->input->post('gearbox'),
                    'number_of_seats' => $this->input->post('number_of_seats'),
                    'manufacture_month' => $this->input->post('manufacture_month'),
                    'odometer_reading' => $this->input->post('odometer_reading'),
                    'color' => $this->input->post('color'),
                    'first_date_traffic_sweden' => $this->input->post('first_date_traffic_sweden'),
                    'finish' => $this->input->post('finish'),
                    'service_history' => $this->input->post('service_history'),
                    'textile' => $this->input->post('textile'),
                    'chassis_number' => $this->input->post('chassis_number_text'),
                    'next_inspection' => $this->input->post('next_inspection'),
                    'curb_weight' => $this->input->post('curb_weight'),
                    'tax_weight' => $this->input->post('tax_weight'),
                    'engine_effect' => $this->input->post('engine_effect'),
                    'number_of_keys' => $this->input->post('number_of_keys'),
                    'max_playload' => $this->input->post('max_playload'),
                    'max_pull_weight' => $this->input->post('max_pull_weight'),
                    'vehicle_tital_weight' => $this->input->post('vehicle_tital_weight'),
                    'Breaks_description' => $this->input->post('Breaks_description'),
                    'exterior_body_description' => $this->input->post('exterior_body_description'),
                    'tires_description' => $this->input->post('tires_description'),
                    'interior_body_description' => $this->input->post('interior_body_description'),
                    'bracks_count' => $this->input->post('bracks_count'),
                    'exterior_body' => $this->input->post('exterior_body'),
                    'tires' => $this->input->post('tires'),
                    'interior_body' => $this->input->post('interior_body'),
                     'horsepower' => $this->input->post('horsepower'),
                    'remark_image_ids' => json_encode($this->input->post('remark_image_ids')),
                    'car_photo_gallery_ids' => json_encode($this->input->post('car_photo_gallery_ids')),  
                    'post_author_id' => $this->session->userdata('user_id')  
                                  
                  
                );
            
                $update_status = $this->User_model->car_added($data);
            
                if ($update_status) {
                    $response = array('status' => 'success', 'message' => 'Car posted successfully.');
                    
                    $profile_data = get_profile($this->session->userdata('user_id'));
                 $name=    $profile_data["username"];
                 $url = base_url()."car/".$car_slug;
                 $email = $profile_data["email"];
                    
                           $message='Hello '.$name.', <br/>

Your car has been added to our platform.  <br/>

View Car Details:  '.$url.'  <br/>

Regards,<br/>
Car Auction Company';

// To send HTML mail, the Content-type header must be set
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// Additional headers
// $headers .= 'From: sender@example.com' . "\r\n";
// $headers .= 'Reply-To: sender@example.com' . "\r\n";

$subject ="Added Car successfully";

mail($email, $subject, $message, $headers);
                    
                } else {
                    $response = array('status' => 'error', 'message' => 'Failed to create.');
                }
    
    
          
        // } else {
        //     $response = array('status' => 'error', 'message' => 'Name already exists');
        
        // }
    
        echo json_encode($response);
    
       }


       
   public function car_list($page = 1)
   {

    $limit = 16; // Number of blogs per page
    $offset = ($page - 1) * $limit;

    $blogs = $this->User_model->get_cars($limit, $offset);
    $total_blogs = $this->User_model->get_total_cars_count();
    $total_pages = ceil($total_blogs / $limit);

    $data = [
        'cars' => $blogs,
        'total_pages' => $total_pages,
        'current_page' => $page
    ];


    $this->load->view('header');
    $this->load->view('car_list',$data);
    $this->load->view('footer',$data);

   }

   public function car_edit($id) {

    if (!$this->session->userdata('user_id')) {
        redirect(base_url());
        return;
    }

    $data['body_category'] = $this->User_model->get_body_category();
    $data['brand_category'] = $this->User_model->get_brand_category();
    $data['buy_method_category'] = $this->User_model->get_buy_method_category();
    $data['engine_category'] = $this->User_model->get_engine_category();
    $data['equipment_category'] = $this->User_model->get_equipment_category();
    $data['model_category'] = $this->User_model->get_model_category();
    $data['model_year_category'] = $this->User_model->get_model_year_category();
    $data['fuel_category'] = $this->User_model->get_fuel_category();
   
   
    $data['car'] = $this->User_model->get_car_by_id($id);
   // print_r( $data['about_page']['about_banner_image_path'] );


   $this->load->view('header');
   $this->load->view('edit_car', $data);
   $this->load->view('footer');
}


public function car_delete(){


       // Load the form validation library
       $this->load->library('form_validation');

       // Set validation rules
       $this->form_validation->set_rules('post_id', 'Post ID', 'required|integer');
       $this->form_validation->set_rules('delete_message', 'Message', 'required|trim');
   
       // Check if the form validation passes
       if ($this->form_validation->run() === FALSE) {
           // Validation failed
           $errors = validation_errors();
           $this->output
               ->set_output(json_encode(array('status' => 'error', 'message' => $errors)));
           return;
       }

    $data = array(
        'id' => $this->input->post('post_id'), 
        'status' => 'pending'  
);

$data1 = array(
    'car_id' => $this->input->post('post_id'), 
    'message' => $this->input->post('delete_message') 
);

$this->User_model->car_delete_message($data1);
$update_status = $this->User_model->update_car($data);

if ($update_status) {
    $response = array('status' => 'success', 'message' => 'Your message has been sent to admin, Once admin removed it will not get display.');
    
    $cardata=get_car_by_id($this->input->post('post_id'));
    
    $car_slug = $cardata["car_slug"];
    
        $profile_data = get_profile($this->session->userdata('user_id'));
                 $name=    $profile_data["username"];
                 $url = base_url()."car/".$car_slug;
                 $email = $profile_data["email"];
                 
                //   $cardata = get_car_by_id($this->input->post('post_id'));
                    
                           $message='Hello '.$name.', <br/>

Your car request of deleting has been sent to the admin. Once he deleted then it will not be get displayed on the website  <br/>

View Car Details:  '.$url.'  <br/>


Regards,<br/>
Car Auction Company';

// To send HTML mail, the Content-type header must be set
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// Additional headers
// $headers .= 'From: sender@example.com' . "\r\n";
// $headers .= 'Reply-To: sender@example.com' . "\r\n";

$subject ="Added Car successfully";

mail($email, $subject, $message, $headers);
    
} else {
    $response = array('status' => 'error', 'message' => 'Failed to delete.');
}

echo json_encode($response);
}


   public function update_car()
   {
       $id = $this->input->post('id');
       $car_title = $this->input->post('car_title');
       $car_slug = url_title($car_title, 'dash', TRUE); // Generate slug


    //   if ($this->User_model->is_unique_car_name($car_title, $id)) {
    //       if ($this->User_model->is_unique_car_slug($car_slug, $id)) {
              
            $data = array(
                    'id' => $this->input->post('id'), 
                    'category' => $this->input->post('category'),
                    'car_title' => $this->input->post('car_title'),
                    // 'car_slug' => $car_slug,
                    'car_sub_title' => $this->input->post('car_sub_title'),
                    'fixed_price' => $this->input->post('fixed_price'),
                    'reduce_price' => $this->input->post('reduce_price'),
                    'reservation_price' =>  $this->input->post('reservation_price'),
                    'emi_show' =>  $this->input->post('emi_show'),
                    'mileage' => $this->input->post('mileage'),
                    'cat_brand' => $this->input->post('cat_brand'),
                    'cat_model' => $this->input->post('cat_model'),
                    'cat_fuel' => $this->input->post('cat_fuel'),
                    'cat_year' => $this->input->post('cat_year'),
                    'cat_buy_method' => $this->input->post('cat_buy_method'),
                    'cat_body' => $this->input->post('cat_body'),
                    'cat_engine' => $this->input->post('cat_engine'),
                    'condition' => $this->input->post('condition'),
                    'cat_equipment' => json_encode($this->input->post('cat_equipment')),
                    'previous_owners' => $this->input->post('previous_owners'),
                    // 'service_book' => $this->input->post('service_book'),
                    'license_number' => $this->input->post('license_number'),
                    // 'gearbox' => $this->input->post('gearbox'),
                    'number_of_seats' => $this->input->post('number_of_seats'),
                    'manufacture_month' => $this->input->post('manufacture_month'),
                    'odometer_reading' => $this->input->post('odometer_reading'),
                    'color' => $this->input->post('color'),
                    'first_date_traffic_sweden' => $this->input->post('first_date_traffic_sweden'),
                    'finish' => $this->input->post('finish'),
                    'service_history' => $this->input->post('service_history'),
                    'textile' => $this->input->post('textile'),
                    'chassis_number' => $this->input->post('chassis_number_text'),
                    'next_inspection' => $this->input->post('next_inspection'),
                    'curb_weight' => $this->input->post('curb_weight'),
                    'tax_weight' => $this->input->post('tax_weight'),
                    'engine_effect' => $this->input->post('engine_effect'),
                    'number_of_keys' => $this->input->post('number_of_keys'),
                    'max_playload' => $this->input->post('max_playload'),
                    'max_pull_weight' => $this->input->post('max_pull_weight'),
                    'vehicle_tital_weight' => $this->input->post('vehicle_tital_weight'),
                    'Breaks_description' => $this->input->post('Breaks_description'),
                    'exterior_body_description' => $this->input->post('exterior_body_description'),
                    'tires_description' => $this->input->post('tires_description'),
                    'interior_body_description' => $this->input->post('interior_body_description'),
                    'bracks_count' => $this->input->post('bracks_count'),
                    'exterior_body' => $this->input->post('exterior_body'),
                    'tires' => $this->input->post('tires'),
                    'interior_body' => $this->input->post('interior_body'),
                    'horsepower' => $this->input->post('horsepower'),
                    'remark_image_ids' => json_encode($this->input->post('remark_image_ids')),
                    'car_photo_gallery_ids' => json_encode($this->input->post('car_photo_gallery_ids')),    
                    // 'post_author_id' => $this->session->userdata('user_id')              
                  
            );
        
            $update_status = $this->User_model->update_car($data);
        
            if ($update_status) {
                $response = array('status' => 'success', 'message' => 'Car updated successfully.');
            } else {
                $response = array('status' => 'error', 'message' => 'Failed to update.');
            }

               
    //       } else {
    //         $response = array('status' => 'error', 'message' => 'Slug already exists');
    //       }
    //   } else {
    //     $response = array('status' => 'error', 'message' => 'Name already exists');
    //   }

       echo json_encode($response);
   }



   public function cars($page = 1)
   {

    $limit = 16; // Number of blogs per page
    $offset = ($page - 1) * $limit;

    $cars = $this->User_model->get_all_cars($limit, $offset);
    $total_blogs = $this->User_model->get_total_all_cars_count();
    $total_pages = ceil($total_blogs / $limit);

    $data = [
        'cars' => $cars,
        'total_pages' => $total_pages,
        'current_page' => $page,
        'loop' => 1,
    ];



    $this->load->view('header');
    $this->load->view('cars',$data);
    $this->load->view('footer',$data);

   }


 public function car_view($slug) {
    $this->db->select('cars.*, model_year_category.year_name, users.city');
    $this->db->from('cars');
    $this->db->join('model_year_category', 'cars.cat_year = model_year_category.id', 'left');
    $this->db->join('users', 'cars.post_author_id = users.id', 'left');
    $this->db->where('cars.car_slug', $slug);
    $query = $this->db->get();
    
    $data['car_view'] = $query->row_array();
    
    // Check if data exists
    if (empty($data['car_view'])) {
        show_404();
    }
    
    // Add year data separately for easier access in view
    $data['year_data'] = array('year_name' => $data['car_view']['year_name']);
    
    $data['highest_bid'] = $this->User_model->get_highest_bid($data['car_view']['id']);
    $data['cars'] = $this->User_model->get_related_cars($slug);
    
    $data["script_car_inner"] = 1;

    $this->load->view('header');
    $this->load->view('car_view',$data);
    $this->load->view('footer',$data);
}



public function get_car_cat_by_slug_and_table_name($slug,$sulg_name,$table_name) {
     
    $this->db->from($table_name); 
    $this->db->where($sulg_name, $slug);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->row_array();
    } else {
        return null; // or a default image path
    }
}

public function get_model_categories_by_brands()
{
    $categories = [];

    
    if(!empty($this->input->post('brand_id'))){
    // $brand_data =  $this->get_car_cat_by_slug_and_table_name($this->input->post('brand_id'),'brand_slug','brand_category');

    $categories = $this->User_model->get_model_categories_by_brands($this->input->post('brand_id'));
    }
    echo json_encode($categories);
}



public function get_model_categories_by_brands_slug()
{
    $categories = [];

    
    if(!empty($this->input->post('brand_id'))){
    $brand_data =  $this->get_car_cat_by_slug_and_table_name($this->input->post('brand_id'),'brand_slug','brand_category');

    $categories = $this->User_model->get_model_categories_by_brands($brand_data["id"]);
    }
    echo json_encode($categories);
}



    public function favourite($page = 1)
    {
 
     $limit = 16; // Number of blogs per page
     $offset = ($page - 1) * $limit;
 
     $blogs = $this->User_model->get_favourites($limit, $offset);
     $total_blogs = $this->User_model->get_total_favourite_count();
     $total_pages = ceil($total_blogs / $limit);
 
     $data = [
         'cars' => $blogs,
         'total_pages' => $total_pages,
         'current_page' => $page
     ];

    $this->load->view('header');
    $this->load->view('favourite',$data);
    $this->load->view('footer',$data); 
}


public function favourite_add(){

     if ($this->User_model->is_already_favourite($this->input->post('id'),$this->input->post('user_id') )) {


        $update_status = $this->User_model->delete_favourite($this->input->post('id'),$this->input->post('user_id') );

        if ($update_status) {
            $response = array('status' => 'success', 'message' => 'favourite removed successfully.');
        } else {
            $response = array('status' => 'error', 'message' => 'Failed to remove.');
        }

      }else{


    $data = array(
        'car_id' => $this->input->post('id'), 
        'user_id' => $this->input->post('user_id') 
    );
    

    $update_status = $this->User_model->favourite_add($data);
    
    if ($update_status) {
        $response = array('status' => 'success', 'message' => 'favourite added successfully.');
    } else {
        $response = array('status' => 'error', 'message' => 'Failed to add.');
    }
    
}
    echo json_encode($response);



}



// public function bid_added(){


//     $this->load->library('form_validation');

//     $this->form_validation->set_rules('bidprice', 'Bid Price', 'required|numeric');

//     if ($this->form_validation->run() == FALSE) {
//         // Validation failed
//         $this->load->view('your_form_view');
//     } else {
//         $bidprice = $this->input->post('bidprice');
//         $car_id = $this->input->post('car_id');

//         // Define increment levels
//          $increments = [500, 1000, 1500,2000]; 

//         // $base_increment = 500;
//         // $multiplier = 1;

//         // // Fetch the highest bid for the specific car
//         $unique_id_data = $this->User_model->get_unique_id_of_user($car_id,$this->session->userdata('user_id'));

//         if($unique_id_data==0){
            
//             $unique_id_number = $this->User_model->get_unique_id_of_car($car_id);

//           $unique_id = $unique_id_number+1;
//             // $unique_id = mt_rand($min, $max);

//         }else{

//             $unique_id =  $unique_id_data;
  
// }
  
      
//         $highest_bid = $this->User_model->get_highest_bid($car_id);

        

//         // print_r( $highest_bid);

//         //    // Calculate the next valid increment
//         //    $valid_bid = false;
//         //    while (($base_increment * $multiplier) <= ($highest_bid + $base_increment * $multiplier)) {
//         //        if ($bidprice == ($highest_bid + ($base_increment * $multiplier))) {
//         //            $valid_bid = true;
//         //            break;
//         //        }
//         //        $multiplier++;
//         //    }

//         // Determine the minimum required increment based on the highest bid
//          // Calculate the valid bid thresholds
//           $valid_bid = false;
//          foreach ($increments as $increment) {
//              if ($bidprice == ($highest_bid + $increment)) {
//                  $valid_bid = true;
//                  break;
//              }
//          }
 
//          if ($valid_bid) {
//             // Insert the new bid
//             $data = array(
//                 'car_id' => $car_id,
//                 'bidding_price' => $bidprice,
//                 'unique_id' => $unique_id,
//                 'user_id' => $this->session->userdata('user_id')
//                 // Other fields if necessary
//             );
//             $this->User_model->insert_bid($data);

        

//             $response = array('status' => 'success', 'message' => 'Bid placed successfully.');
//         } else {
//             // Error message
      
//             $response = array('status' => 'error', 'message' => 'Your bid must be at least one of the predefined increments (500, 1000, 1500) higher than the current highest bid.');
//         }
//     }

//     echo json_encode($response);

// }

public function get_timer_data() {
    $car_id = $this->input->post('car_id');
    
    if (!$car_id) {
        echo json_encode(array('status' => 'error', 'message' => 'Car ID required'));
        return;
    }
    
    $timer_data = get_auction_timer_data($car_id);
    
    if ($timer_data) {
        echo json_encode($timer_data);
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'Auction not found'));
    }
}

/**
 * AJAX endpoint to check and update auction expiry
 */
public function check_expiry() {
    $car_id = $this->input->post('car_id');
    
    if (!$car_id) {
        echo json_encode(array('status' => 'error', 'message' => 'Car ID required'));
        return;
    }
    
    $expired = check_auction_expiry($car_id);
    
    echo json_encode(array(
        'status' => 'success',
        'expired' => $expired,
        'message' => $expired ? 'Auction marked as completed' : 'Auction still active'
    ));
}

public function bid_added()
{
    $this->load->library('form_validation');
    $this->form_validation->set_rules('bidprice', 'Bid Price', 'required|numeric');

    if ($this->form_validation->run() == FALSE) {
        $response = array('status' => 'error', 'message' => 'Invalid bid price');
        echo json_encode($response);
        return;
    }
    
    $bidprice = $this->input->post('bidprice');
    $car_id = $this->input->post('car_id');
    $max_auto_bid = $this->input->post('max_auto_bid');
    
    if (empty($max_auto_bid) || $max_auto_bid == 0) {
        $max_auto_bid = NULL;
    }
    
    $is_auto_bid = 0;

    $unique_id_data = $this->User_model->get_unique_id_of_user($car_id, $this->session->userdata('user_id'));

    if ($unique_id_data == 0) {
        $unique_id_number = $this->User_model->get_unique_id_of_car($car_id);
        $unique_id = $unique_id_number + 1;
    } else {
        $unique_id = $unique_id_data;
    }

    $highest_bid = $this->User_model->get_highest_bid($car_id);
    $bid_increment = 500;
    $minimum_bid = $highest_bid + $bid_increment;

    if ($bidprice >= $minimum_bid) {
        // **Get the previous highest bidder BEFORE inserting new bid**
        $previous_highest_bidder = $this->User_model->get_highest_bidder_info($car_id);
        
        // Insert the new bid
        $data = array(
            'car_id' => $car_id,
            'bidding_price' => $bidprice,
            'max_auto_bid' => $max_auto_bid,
            'is_auto_bid' => 0,
            'unique_id' => $unique_id,
            'user_id' => $this->session->userdata('user_id')
        );
        
        $this->User_model->insert_bid($data);

        // **Notify the previous highest bidder they've been outbid**
        if ($previous_highest_bidder && $previous_highest_bidder['user_id'] != $this->session->userdata('user_id')) {
            notify_outbid($previous_highest_bidder['user_id'], $car_id, $bidprice);
        }

        $extension_result = extend_auction_time($car_id);
        $this->process_auto_bidding($car_id, $bidprice, $this->session->userdata('user_id'), $bid_increment);

        $response = array(
            'status' => 'success', 
            'message' => 'Bid placed successfully.',
            'extension' => $extension_result
        );
    } else {
        $response = array('status' => 'error', 'message' => 'Your minimum bid amount should be '.$minimum_bid.' SEK or more you can place.');
    }

    echo json_encode($response);
}


/**
 * Process auto-bidding when a new bid is placed
 * Automatically places counter-bids for users with auto-bid enabled
 */
private function process_auto_bidding($car_id, $new_bid_price, $new_bidder_user_id, $increment = 500)
{
    $auto_bids = $this->User_model->get_active_auto_bids($car_id, $new_bidder_user_id);
    
    if (empty($auto_bids)) {
        return;
    }

    foreach ($auto_bids as $auto_bid) {
        $max_auto_bid = $auto_bid['max_auto_bid'];
        $auto_bidder_user_id = $auto_bid['user_id'];
        
        $next_bid_price = $new_bid_price + $increment;
        
        if ($next_bid_price <= $max_auto_bid) {
            // **Get the current highest bidder BEFORE placing auto-bid**
            $previous_highest_bidder = $this->User_model->get_highest_bidder_info($car_id);
            
            $unique_id_data = $this->User_model->get_unique_id_of_user($car_id, $auto_bidder_user_id);
            
            if ($unique_id_data == 0) {
                $unique_id_number = $this->User_model->get_unique_id_of_car($car_id);
                $unique_id = $unique_id_number + 1;
            } else {
                $unique_id = $unique_id_data;
            }
            
            $auto_bid_data = array(
                'car_id' => $car_id,
                'bidding_price' => $next_bid_price,
                'max_auto_bid' => $max_auto_bid,
                'is_auto_bid' => 1,
                'unique_id' => $unique_id,
                'user_id' => $auto_bidder_user_id
            );
            
            $this->User_model->insert_bid($auto_bid_data);
            
            // **Notify the previous highest bidder they've been auto-outbid**
            if ($previous_highest_bidder && $previous_highest_bidder['user_id'] != $auto_bidder_user_id) {
                notify_outbid($previous_highest_bidder['user_id'], $car_id, $next_bid_price);
            }
            
            extend_auction_time($car_id);
            
            // **Check if we've reached max auto-bid**
            if ($next_bid_price >= $max_auto_bid) {
                notify_auto_bid_max_reached($auto_bidder_user_id, $car_id, $max_auto_bid);
            }
            
            if ($next_bid_price < $max_auto_bid) {
                $this->process_auto_bidding($car_id, $next_bid_price, $auto_bidder_user_id, $increment);
            }
            
            break;
        } else {
            // **Max reached - notify user**
            notify_auto_bid_max_reached($auto_bidder_user_id, $car_id, $max_auto_bid);
        }
    }
}

public function get_bid(){
    $car_id = $this->input->post('id');

    $bids = $this->User_model->get_bid($car_id);
    echo json_encode($bids);

}

public function get_bid_with_name(){
    $car_id = $this->input->post('id');

    $bids = $this->User_model->get_bid_with_name($car_id);
    echo json_encode($bids);

}



public function test_email() {
    $this->load->library('email');
    
    $this->email->from('info@zogglo.se', 'Zogglo Test');
    $this->email->to('muslimraoufi123@gmail.com'); // Use your personal email
    $this->email->subject('Test Email from Zogglo');
    $this->email->message('<h1>Hello!</h1><p>This is a test email.</p>');
    
    if ($this->email->send()) {
        echo "✅ Email sent successfully!";
    } else {
        echo "❌ Email failed!<br><br>";
        echo $this->email->print_debugger();
    }
}


public function get_total_bid_count(){
    $car_id = $this->input->post('id');

    $bid_count = $this->User_model->get_total_bid_count($car_id);
    echo json_encode($bid_count);

}

public function check_reservation(){

    $car_id = $this->input->post('id');
    $highest_bid = $this->User_model->get_highest_bid($car_id); 
    $cardata = $this->User_model->get_car_by_id($car_id); 
    // echo json_encode($cardata);

    //   print_r( $cardata["reservation_price"]);
    //     print_r( $highest_bid);

      if(!empty($cardata["reservation_price"])){

        if($cardata["reservation_price"]<$highest_bid){

            $response = array('status' => 'success', 'message' => 'Reservationspriset har uppnåtts');

        }else{

            $response = array('status' => 'error', 'message' => 'Reservationspriset har inte uppnåtts');
        }

      }else{
        $response = array('status' => 'error', 'message' => 'Reservationspriset har inte uppnåtts');
      }

      
    echo json_encode($response);
} 


public function get_highest_bid(){

    $car_id = $this->input->post('id');
    $highest_bid = $this->User_model->get_highest_bid($car_id); 
    $cardata = $this->User_model->get_car_by_id($car_id); 


    if(!empty($highest_bid)){ 

        $response = array('status' => 'success', 'message' => number_format($highest_bid).' '.$this->config->item('CURRENCY'));

    }else{

        $response = array('status' => 'success', 'message' => 'Inga bud har lagts ännu');
    }
        
    echo json_encode($response);
}


public function get_emi_price(){

    $car_id = $this->input->post('id');
    $highest_bid = $this->User_model->get_highest_bid($car_id); 
    $cardata = $this->User_model->get_car_by_id($car_id); 

if($cardata["cat_buy_method"]==3){

    if(!empty($highest_bid)){ 

        $principal = $highest_bid; // Example principal amount
        $annual_rate = 12; // Annual interest rate in percentage
        $months = 48; // Number of monthly installments
        
       $emi = calculate_emi($principal, $annual_rate, $months);
      

        $response = array('status' => 'success', 'message' => number_format($emi).' '.$this->config->item('CURRENCY').' / month');

    }else{


        $fixed_price = $cardata["fixed_price"]; // Example principal amount
          $reduce_price = $cardata["reduce_price"];
          
          if(!empty($reduce_price)){
             $principal = $reduce_price;
          }else{
             $principal = $fixed_price;
          }
          
        $annual_rate = 12; // Annual interest rate in percentage
        $months = 48; // Number of monthly installments
        
       $emi = calculate_emi($principal, $annual_rate, $months);
      

        $response = array('status' => 'success', 'message' => number_format($emi).' '.$this->config->item('CURRENCY').' / month');

    }
    

}else{


    $fixed_price = $cardata["fixed_price"]; // Example principal amount
          $reduce_price = $cardata["reduce_price"];
          
          if(!empty($reduce_price)){
             $principal = $reduce_price;
          }else{
             $principal = $fixed_price;
          }
        $annual_rate = 12; // Annual interest rate in percentage
        $months = 48; // Number of monthly installments
        
       $emi = calculate_emi($principal, $annual_rate, $months);
      

        $response = array('status' => 'success', 'message' => number_format($emi).' '.$this->config->item('CURRENCY').' / month');


}

        
    echo json_encode($response);
}


public function winner(){

    $data = array(
            'id' => $this->input->post('carId'), 
            'winner_id' =>  $this->input->post('winid')       
          
    );

    $update_status = $this->User_model->update_winner($data);

    if ($update_status) {
        $response = array('status' => 'success', 'message' => 'Winner updated successfully.');
    } else {
        $response = array('status' => 'error', 'message' => 'Failed to update.');
    }



echo json_encode($response);
}


public function my_bidding($page = 1)
{
    
         $bid_by_user = isset($_GET['bid_by_user']) ? $_GET['bid_by_user'] : '';
         
            if (!empty($bid_by_user)) {
        $bid_by_user = $bid_by_user;
    }else{
         $bid_by_user = $this->session->userdata('user_id');
    }

 $limit = 16; // Number of blogs per page
 $offset = ($page - 1) * $limit;

 $cars = $this->User_model->my_bidding($limit, $offset,$bid_by_user);
 $total_blogs = $this->User_model->get_my_bidding_count($bid_by_user);
 $total_pages = ceil($total_blogs / $limit);

 $data = [
     'cars' => $cars,
     'total_pages' => $total_pages,
     'current_page' => $page
 ];


 $this->load->view('header');
 $this->load->view('my_bid', @$data);
 $this->load->view('footer');

}


public function sellyourcar(){
    // $profile_data = get_profile(1);
    // $name=    $profile_data["username"];
    //  $url = base_url()."car/".$car_slug;
    // $email = $profile_data["email"];
    $email = "hanishmadan58@gmail.com";
    
    $form_data = $this->input->post();
    // print_r($form_data);
    if ($this->User_model->sellyourcar_is_car_taken($form_data['registrationnumber'])) {
        $response = array('status' => 'error', 'message' => 'Car is already registered!');
    } else {
        $data = array(
            'firstname' => ucwords(strtolower($form_data['firstname'])),
            'lastname' => ucwords(strtolower($form_data['lastname'])),
            'phone' => $form_data['phone'],
            'registrationnumber' => strtoupper($form_data['registrationnumber']),
            'emailaddress' => $form_data['emailaddress'],
            'location' => ucwords(strtolower($form_data['location'])),
            'brandname' => ucwords(strtolower($form_data['brandname'])),
            'model' => ucwords(strtolower($form_data['model'])),
            'reg_year' => $form_data['reg_year'],
            'mileage' => $form_data['mileage'],
            'fule_type' => strtoupper($form_data['fule_type']),
            'selling_price' => $form_data['selling_price'],
            'car_note' => $form_data['car_note']
            );
                    
        $insert_status = $this->User_model->sellyourcar_submit($data);
                    
        // print_r($insert_status);
                    
        if ($insert_status) {
            
            $message = '<html><body>';
            $message .= '<p>Hi Admin,<br/>You have received new sell car submission below details: <br/></p>';
            $message .= '<h2>Your Personal Info</h2>';
            $message .= '<p><strong>First Name:</strong> ' . $form_data['firstname'] . '</p>';
            $message .= '<p><strong>Last Name:</strong> ' . $form_data['lastname'] . '</p>';
            $message .= '<p><strong>Phone:</strong> ' . $form_data['phone'] . '</p>';
            $message .= '<p><strong>Registration Number:</strong> ' . $form_data['registrationnumber'] . '</p>';
            $message .= '<p><strong>Email:</strong> ' . $form_data['emailaddress'] . '</p>';
            $message .= '<p><strong>Location:</strong> ' . $form_data['location'] . '</p>';
            
            $message .= '<h2>Your Car Info</h2>';
            $message .= '<p><strong>Car Brand Name:</strong> ' . $form_data['brandname'] . '</p>';
            $message .= '<p><strong>Model:</strong> ' . $form_data['model'] . '</p>';
            $message .= '<p><strong>Reg. Year:</strong> ' . $form_data['reg_year'] . '</p>';
            $message .= '<p><strong>Mileage:</strong> ' . $form_data['mileage'] . '</p>';
            $message .= '<p><strong>Fuel Type:</strong> ' . $form_data['fule_type'] . '</p>';
            $message .= '<p><strong>Selling Price:</strong> ' . $form_data['selling_price'] . '</p>';
            $message .= '<p><strong>Your Car Note:</strong> ' . $form_data['car_note'] . '</p>';
            $message .= '</body></html>';
            
            // To send HTML mail, the Content-type header must be set
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
            // Additional headers
            // $headers .= 'From: sender@example.com' . "\r\n";
            // $headers .= 'Reply-To: sender@example.com' . "\r\n";
            
            $subject ="Car Information Submission";
            
            // mail($email, $subject, $message, $headers);
            
            if(mail($email, $subject, $message, $headers)) {
            
                   $response = array('status' => 'success', 'message' => 'Email has been sent successfully.');
                         
            } else {
            
                    $response = array('status' => 'error', 'message' => 'Failed to send email.');
                
            }
        } else {
            $response = array('status' => 'error', 'message' => 'Your car Information data could not be submitted!.');
        }
                    
                // $response = array('status' => 'success', 'message' => 'Email has been sent successfully.');
    }
   echo json_encode($response);
    
}


 public function forgot_password_process() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
           $response = array('status' => 'error', 'message' => 'Failed to send email.');
        } else {
            $email = $this->input->post('email');
            $user = $this->User_model->get_user_by_email($email);

            if ($user) {
                $token = rand(); // Generate a secure token
                

                $reset_link = site_url('/reset_password?token=' . $token);
                $this->User_model->store_reset_token($user->id, $token);
                $message = '
                Hello Name, <br/>
                Click on the following link to reset your password: <a href="' . $reset_link . '">' . $reset_link . '</a>
                <br/>
                Regards,<br/>
Car Auction Company
                ';

                
        

// To send HTML mail, the Content-type header must be set
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// Additional headers
// $headers .= 'From: sender@example.com' . "\r\n";
// $headers .= 'Reply-To: sender@example.com' . "\r\n";

$subject ="Foreget password";

              if(mail($email, $subject, $message, $headers)) {

                     $response = array('status' => 'success', 'message' => 'Password reset link has been sent to your email.');
                } else {
                    $response = array('status' => 'error', 'message' => 'Failed to send email.');
                }
            } else {
              
                 $response = array('status' => 'error', 'message' => 'No account found with that email address.');
            }
            
        }
         echo json_encode($response);
    }
    
     public function  forgetpassword(){
         
          $this->load->view('admin/admin_header');
        $this->load->view('admin/admin_forget');
        $this->load->view('admin/admin_footer');
     }
    
      public function reset_password() {
        $token = $this->input->get('token');

          $this->load->view('admin/admin_header');
        $this->load->view('admin/admin_reset',['token' => $token]);
        $this->load->view('admin/admin_footer');
    }
    
        public function reset_password_process() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('newpassword', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirmnewpassword', 'Password Confirmation', 'required|matches[password]');

     
            $password = password_hash($this->input->post('newpassword'), PASSWORD_DEFAULT);
            $token = $this->input->post('token');
            
            $user_id = $this->User_model->verify_reset_token($token);
            
            if ($user_id) {
                $this->User_model->update_password($user_id, $password);
                $this->User_model->delete_reset_token($token);

               
                   $response = array('status' => 'success', 'message' => 'Password has been successfully updated.');
            } else {
               
                 $response = array('status' => 'error', 'message' => 'Invalid or expired token.');
            }
        
        
              echo json_encode($response);
    }
    
    
    public function contactprocess(){

    $profile_data = get_profile(1);
                 $name=    $profile_data["username"];
                //  $url = base_url()."car/".$car_slug;
                 $email = $profile_data["email"];
   // Prepare email data
            $form_data = $this->input->post();

            // Prepare HTML content
            $message = '<html><body>';
              $message .= '<p>Hi Admin,<br/>You have received new contact submission below details: <br/></p>';
            $message .= '<h2>Your Personal Info</h2>';
            $message .= '<p><strong>full Name:</strong> ' . $form_data['fullname'] . '</p>';
      
            $message .= '<p><strong>Phone:</strong> ' . $form_data['phone'] . '</p>';
         
            $message .= '<p><strong>Email:</strong> ' . $form_data['email'] . '</p>';
            $message .= '<p><strong>Subject:</strong> ' . $form_data['subject'] . '</p>';
              $message .= '<p><strong>Message:</strong> ' . $form_data['message'] . '</p>';
              
            $message .= '</body></html>';

// To send HTML mail, the Content-type header must be set
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// Additional headers
// $headers .= 'From: sender@example.com' . "\r\n";
// $headers .= 'Reply-To: sender@example.com' . "\r\n";

$subject ="Car Information Submission";

// mail($email, $subject, $message, $headers);

if(mail($email, $subject, $message, $headers)) {

       $response = array('status' => 'success', 'message' => 'Email has been sent successfully.');
             
} else {

        $response = array('status' => 'error', 'message' => 'Failed to send email.');
    
}

   echo json_encode($response);
    
}


function auction_over($page = 1){

    if (!$this->session->userdata('user_id') and $this->session->userdata('user_role')!='dealer') {
        redirect(base_url());
        return;
    }

    // $search_term = $this->input->post('title');//
    $search_term = isset($_POST['title']) ? $_POST['title'] : '';
    
 

    // print_r($search_term);

    $limit = 16; // Number of blogs per page
    $offset = ($page - 1) * $limit;

    $blogs = $this->User_model->get_auction_over_cars($limit, $offset);
    $total_blogs = $this->User_model->get_total_auction_over_cars_count();
    $total_pages = ceil($total_blogs / $limit);

    $data = [
        'cars' => $blogs,
        'total_pages' => $total_pages,
        'current_page' => $page,
        'search_term' => htmlspecialchars($search_term)
    ];

    $this->load->view('header');
    $this->load->view('auction_over',$data);
    $this->load->view('footer');

   } 
   
   public function dealercars($page = 1)
{
    
         $bid_by_user = isset($_GET['bid_by_user']) ? $_GET['bid_by_user'] : '';
         $author = isset($_GET['author']) ? $_GET['author'] : '';
      

 $limit = 16; // Number of blogs per page
 $offset = ($page - 1) * $limit;

  
        if(!empty($author)){
             $cars = $this->User_model->get_dealercars($limit, $offset,$author);
 $total_blogs = $this->User_model->get_dealercars_count($author);
        }
        
        if(!empty($bid_by_user)){
$cars = $this->User_model->get_dealercars_by_bid($limit, $offset,$bid_by_user);
 $total_blogs = $this->User_model->get_dealercars_by_bid_count($bid_by_user);
        }
        
 $total_pages = ceil($total_blogs / $limit);

 $data = [
     'cars' => $cars,
     'total_pages' => $total_pages,
     'current_page' => $page
 ];


 $this->load->view('header');
   if(!empty($author)){
  $this->load->view('dealercars', $data);
   }
   
   if(!empty($bid_by_user)){
 $this->load->view('dealercarsbybid', $data);
   }
 $this->load->view('footer');

}


}