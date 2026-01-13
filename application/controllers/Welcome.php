<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
				$this->load->library('session');
                $this->load->model('AdminBlogs');
                $this->load->model('User_model');
                
        $this->load->helper('url'); // Load the URL helper here

      
    }

    public function index($page = 1) {

        $limit = 8; // Number of blogs per page
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
        $this->load->view('home',$data);
        $this->load->view('footer');
    }

    public function aboutus() {

        $this->load->view('header');
        $this->load->view('about_us');
        $this->load->view('footer');
    }

    
    public function contactus() {

        $this->load->view('header');
        $this->load->view('contact_us');
        $this->load->view('footer');
    }
    
    public function faq() {

        $this->load->view('header');
        $this->load->view('faqs');
        $this->load->view('footer');
    }

    public function blogs($page = 1) {

        $limit = 10; // Number of blogs per page
        $offset = ($page - 1) * $limit;
    
        $blogs = $this->AdminBlogs->get_blogs($limit, $offset);
        $total_blogs = $this->AdminBlogs->get_total_blogs_count();
        $total_pages = ceil($total_blogs / $limit);
    
        $data = [
            'blogs' => $blogs,
            'total_pages' => $total_pages,
            'current_page' => $page
        ];
        $data['blog_page'] = $this->AdminBlogs->get_blog_page(1);

        $this->load->view('header');
        $this->load->view('blogs',$data);
        $this->load->view('footer');
    }

    public function blog_view($slug) {

          // Get data by slug
    $data['blog_view'] = $this->AdminBlogs->get_blog_by_slug($slug);

    // Check if data exists
    if (empty($data['blog_view'])) {
        show_404();
    }

        $this->load->view('header');
        $this->load->view('blog_view',$data);
        $this->load->view('footer');

    }

    public function blog_by_category_slug($slug,$page = 1) {

        $cat_data = get_id_by_slug($slug);
        if (empty($cat_data)) {
            show_404();
        }

        $catid = $cat_data['id'];

        $catname = $cat_data['cat_name'];
        $catslug = $cat_data['cat_slug'];
         
        // print_r($cat_data["id"]);
        $limit = 1; // Number of blogs per page
        $offset = ($page - 1) * $limit;
    
        $blogs = $this->AdminBlogs->get_blogs_by_catid($limit, $offset,$catid);
        $total_blogs = $this->AdminBlogs->get_total_blogs_count_by_catid($catid);
        $total_pages = ceil($total_blogs / $limit);
    
        $data = [
            'blogs' => $blogs,
            'total_pages' => $total_pages,
            'current_page' => $page,
            'catid' => $catid,
            'catname' => $catname,
            'catslug' => $catslug
            
        ];
        $data['blog_page'] = $this->AdminBlogs->get_blog_page(1);

        $this->load->view('header');
        $this->load->view('blog_categories',$data);
        $this->load->view('footer');

  }

  public function privacy_policy() {

    $this->load->view('header');
    $this->load->view('privacy_policy');
    $this->load->view('footer');
}

public function terms_and_conditions() {

    $this->load->view('header');
    $this->load->view('terms_and_conditions');
    $this->load->view('footer');
}

  
}
