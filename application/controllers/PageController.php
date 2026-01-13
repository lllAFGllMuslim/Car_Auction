<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PageController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Pages_model');
        $this->load->model('User_model');
        
        $this->load->library('upload');
        $this->load->library('session');
        
    }

    public function about_edit() {

        if (!$this->session->userdata('user_id') and $this->session->userdata('user_role')!='admin') {
            redirect(base_url());
            return;
        }

        $data['about_page'] = $this->Pages_model->get_about(1);
        $data['active'] = 'aboutedit';

        // print_r( $data['about_page']['about_banner_image_path'] );

        $this->load->view('admin/admin_header');
        $this->load->view('admin/admin_about', $data);
        $this->load->view('admin/admin_footer');
    }

    public function update_about() {
        // $data = $this->input->post();
        $data = array(
            'id' => $this->input->post('id'), // Assuming the form has a hidden field for 'id'
            'about_banner_image_id' => $this->input->post('banner_image_id'),
            'about_banner_title' => $this->input->post('banner_title'),
            'about_banner_sub_title' => $this->input->post('banner_subtitle'),
            'about_page_title' => $this->input->post('page_title'),
            'about_page_content' => $this->input->post('page_content'),
            'about_gallery_images' => json_encode($this->input->post('about_gallery_ids')) // Assuming gallery_images is an array
        );

        $update_status = $this->Pages_model->update_about($data);

        if ($update_status) {
            $response = array('status' => 'success', 'message' => 'About page updated successfully.');
        } else {
            $response = array('status' => 'error', 'message' => 'Failed to update about page.');
        }

        echo json_encode($response);
    }

    public function uploadImage() {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|PNG|JPEG|JPG|jpeg|webp|avif';
        $config['max_size'] = 204800; // 2MB max
        $config['encrypt_name'] = TRUE; // Encrypt the file name for security

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('file')) {
            echo json_encode(['status' => 'error', 'message' => $this->upload->display_errors()]);
        } else {
            $data = $this->upload->data();
            $image_path = base_url('uploads/' . $data['file_name']);
           $image_data= $this->Pages_model->insert_image($image_path);
        
            echo json_encode(['status' => 'success', 'file_name' => $data['file_name'],'media_id' =>$image_data, 'file_url' => base_url('uploads/' . $data['file_name'])]);
        }
    }


   /************* policy***********/ 

   public function privacy_policy_edit() {

    if (!$this->session->userdata('user_id') and $this->session->userdata('user_role')!='admin') {
        redirect(base_url());
        return;
    }

    $data['privacy_policy'] = $this->Pages_model->get_privacy_policy(1);
  

    // print_r( $data['about_page']['about_banner_image_path'] );

    $this->load->view('admin/admin_header');
    $this->load->view('admin/admin_privacy_policy', $data);
    $this->load->view('admin/admin_footer');
}

public function update_privacy_policy() {
    // $data = $this->input->post();
    $data = array(
        'id' => $this->input->post('id'), // Assuming the form has a hidden field for 'id'
        'privacy_policy_banner_image_id' => $this->input->post('privacy_policy_banner_image_id'),
        'privacy_policy_title' => $this->input->post('privacy_policy_title'),
        'privacy_policy_content' => $this->input->post('privacy_policy_content')
    );

    $update_status = $this->Pages_model->update_privacy_policyt($data);

    if ($update_status) {
        $response = array('status' => 'success', 'message' => 'Privacy policyt page updated successfully.');
    } else {
        $response = array('status' => 'error', 'message' => 'Failed to update about page.');
    }

    echo json_encode($response);
}

  /************* term***********/ 

  public function terms_and_conditions_edit() {

    if (!$this->session->userdata('user_id') and $this->session->userdata('user_role')!='admin') {
        redirect(base_url());
        return;
    }

    $data['terms_and_conditions'] = $this->Pages_model->get_terms_and_conditions(1);
  

    // print_r( $data['about_page']['about_banner_image_path'] );

    $this->load->view('admin/admin_header');
    $this->load->view('admin/admin_terms_and_conditions', $data);
    $this->load->view('admin/admin_footer');
}

public function update_terms_and_conditions() {
    // $data = $this->input->post();
    $data = array(
        'id' => $this->input->post('id'), // Assuming the form has a hidden field for 'id'
        'terms_and_conditions_banner_image_id' => $this->input->post('terms_and_conditions_banner_image_id'),
        'terms_and_conditions_title' => $this->input->post('terms_and_conditions_title'),
        'terms_and_conditions_content' => $this->input->post('terms_and_conditions_content')
    );

    $update_status = $this->Pages_model->update_terms_and_conditions($data);

    if ($update_status) {
        $response = array('status' => 'success', 'message' => 'Terms and conditions page updated successfully.');
    } else {
        $response = array('status' => 'error', 'message' => 'Failed to update about page.');
    }

    echo json_encode($response);
}



    //***************** HEADER FOOTER********** */

    
    public function header_footer_edit() {


        if (!$this->session->userdata('user_id') and $this->session->userdata('user_role')!='admin') {
            redirect(base_url());
            return;
        }

        $data['header_footer'] = $this->Pages_model->get_header_footer(1);
      

        // print_r( $data['about_page']['about_banner_image_path'] );

        $this->load->view('admin/admin_header');
        $this->load->view('admin/header_footer', $data);
        $this->load->view('admin/admin_footer');
    }

    public function update_header_footer() {
        // $data = $this->input->post();
        $data = array(
            'id' => $this->input->post('id'), // Assuming the form has a hidden field for 'id'
            'logo_id' => $this->input->post('logo_id'),
            'favicon_id' => $this->input->post('favicon_id'),
            'site_title' => $this->input->post('site_title'),
            'manu_name1' => $this->input->post('manu_name1'),
            'manu_name2' => $this->input->post('manu_name2'),
            'manu_name3' => $this->input->post('manu_name3'),
            'manu_name4' => $this->input->post('manu_name4'),
            'manu_name5' => $this->input->post('manu_name5'),
            'manu_name6' => $this->input->post('manu_name6'),
            'manu_name7' => $this->input->post('manu_name7'),
            'footer_logo_id' => $this->input->post('footer_logo_id'),
            'footer_menu1_heading' => $this->input->post('footer_menu1_heading'),
            'footer_menu1_content' => $this->input->post('footer_menu1_content'),
            'footer_menu2_heading' => $this->input->post('footer_menu2_heading'),
            'footer_menu2_content' => $this->input->post('footer_menu2_content'),
            'footer_menu3_heading' => $this->input->post('footer_menu3_heading'),
            'footer_menu3_content' => $this->input->post('footer_menu3_content'),
            'footer_menu4_heading' => $this->input->post('footer_menu4_heading'),
            'footer_menu4_content' => $this->input->post('footer_menu4_content'),
            'footer_phone' => $this->input->post('footer_phone'),
            'footer_email' => $this->input->post('footer_email'),
            'footer_facebook' => $this->input->post('footer_facebook'),
            'footer_twitter' => $this->input->post('footer_twitter'),
            'footer_linkedin' => $this->input->post('footer_linkedin'),
            'footer_instagram' => $this->input->post('footer_instagram'),
               'bidding_guide' => $this->input->post('bidding_guide'),
            'footer_copyright' => $this->input->post('footer_copyright'),
            
            'buy_method_text' => $this->input->post('buy_method_text'),
            'category_text' => $this->input->post('category_text'),
            'fixed_price_text' => $this->input->post('fixed_price_text'),
            'reduce_price_text' => $this->input->post('reduce_price_text'),
            'reservation_price_text' => $this->input->post('reservation_price_text'),
            'mileage_text' => $this->input->post('mileage_text'),
            'brand_text' => $this->input->post('brand_text'),
            'model_text' => $this->input->post('model_text'),
            'fuel_type_text' => $this->input->post('fuel_type_text'),
            'model_year_text' => $this->input->post('model_year_text'),
            'body_text' => $this->input->post('body_text'),
            'engine_text' => $this->input->post('engine_text'),
            'condition_text' => $this->input->post('condition_text'),
            'show_emi_price_text' => $this->input->post('show_emi_price_text'),
            'equipment_text' => $this->input->post('equipment_text'),
            'car_facts_text' => $this->input->post('car_facts_text'),
            'previous_owners_text' => $this->input->post('previous_owners_text'),
            'service_book_text' => $this->input->post('service_book_text'),
            'license_number' => $this->input->post('license_number'),
            'gearbox_text' => $this->input->post('gearbox_text'),
            'Number_of_seats' => $this->input->post('Number_of_seats'),
            'manufacture_month' => $this->input->post('manufacture_month'),
            'number_of_keys' => $this->input->post('number_of_keys'),
            'odometer_reading' => $this->input->post('odometer_reading'),
            'color_text' => $this->input->post('color_text'),
            'first_date_traffic_sweden_text' => $this->input->post('first_date_traffic_sweden_text'),
            'finish_text' => $this->input->post('finish_text'),
            'service_history_text' => $this->input->post('service_history_text'),
            'textile_text' => $this->input->post('textile_text'),
            'technical_data_text' => $this->input->post('technical_data_text'),
            
            'chassis_number_text' => $this->input->post('chassis_number_text'),
            'next_inspection_the_latest_text' => $this->input->post('next_inspection_the_latest_text'),
            'engine_effect_text' => $this->input->post('engine_effect_text'),
            'curb_weight_text' => $this->input->post('curb_weight_text'),
            'max_payload_text' => $this->input->post('max_payload_text'),
            'tax_weight_text' => $this->input->post('tax_weight_text'),
            'max_pull_weight_text' => $this->input->post('max_pull_weight_text'),
            'vehicle_total_weight_text' => $this->input->post('vehicle_total_weight_text'),
            'remark_text' => $this->input->post('remark_text'),
            'breaks_text' => $this->input->post('breaks_text'),
            'exterior_body_text' => $this->input->post('exterior_body_text'),
            'tires_text' => $this->input->post('tires_text'),
            'interior_body_text' => $this->input->post('interior_body_text'),
            'horsepower_text' => $this->input->post('horsepower_text')
            );

        $update_status = $this->Pages_model->update_header_footer($data);

        if ($update_status) {
            $response = array('status' => 'success', 'message' => 'Page updated successfully.');
        } else {
            $response = array('status' => 'error', 'message' => 'Failed to update about page.');
        }

        echo json_encode($response);
    }


    /* home page */

    public function home_edit() {


        if (!$this->session->userdata('user_id') and $this->session->userdata('user_role')!='admin') {
            redirect(base_url());
            return;
        }
         $data['home'] = $this->Pages_model->get_home(1);
         $data['reviews'] = $this->Pages_model->reviews_faqs();
      
        // $data = [];

        // print_r( $data['about_page']['about_banner_image_path'] );

        $this->load->view('admin/admin_header');
        $this->load->view('admin/admin_home', $data);
        $this->load->view('admin/admin_footer');
    }


    public function update_home() {
        
        $data = array(
            'id' => $this->input->post('id'), // Assuming the form has a hidden field for 'id'
            'home_page_banner_image_id' => $this->input->post('home_page_banner_image_id'),
            'home_page_banner_title' => $this->input->post('home_page_banner_title'),
            'home_page_banner_main_title' => $this->input->post('home_page_banner_main_title'),
            'banner_paragraph' => $this->input->post('banner_paragraph'),
            'brand_sub_title' => $this->input->post('brand_sub_title'),
            'brand_main_title_name' => $this->input->post('brand_main_title_name'),
            'main_banner_image_id' => $this->input->post('main_banner_image_id'),
            'banner_main_title' => $this->input->post('banner_main_title'),
            'button_link' => $this->input->post('button_link'),
            'banner_paragraph1' => $this->input->post('banner_paragraph1'),
            'our_trusted_partners_id' =>json_encode($this->input->post('our_trusted_partners_id')),
            'middle_section_sub_title' => $this->input->post('middle_section_sub_title'),
            'middle_section_main_title' => $this->input->post('middle_section_main_title'),
            'middle_section_part1' => $this->input->post('middle_section_part1'),
            'middle_section_part11' => $this->input->post('middle_section_part11'),
            'middle_section_part2' => $this->input->post('middle_section_part2'),
            'middle_section_part22' => $this->input->post('middle_section_part22'),
            'middle_section_part3' => $this->input->post('middle_section_part3'),
            'middle_section_part33' => $this->input->post('middle_section_part33'),
            'car_available' => $this->input->post('car_available'),
            // 'footer_email' => $this->input->post('footer_email'),
            'car_sold' => $this->input->post('car_sold'),
            'used_cars' => $this->input->post('used_cars'),
            'customer_satisfaction' => $this->input->post('customer_satisfaction'),
            'testimonial_title' => $this->input->post('testimonial_title'),
            'testimonial_sub_title' => $this->input->post('testimonial_sub_title'),
            'blog_heading' => $this->input->post('blog_heading'),
            'blog_sub_heading' => $this->input->post('blog_sub_heading')
            
            );

        $update_status = $this->Pages_model->update_home($data);

        if ($update_status) {
            $response = array('status' => 'success', 'message' => 'Home page updated successfully.');
        } else {
            $response = array('status' => 'error', 'message' => 'Failed to update about page.');
        }

        echo json_encode($response);
    }


     /* contact page */

     public function contact_edit() {

        if (!$this->session->userdata('user_id') and $this->session->userdata('user_role')!='admin') {
            redirect(base_url());
            return;
        }

        $data['contact'] = $this->Pages_model->get_contact(1);
       // print_r( $data['about_page']['about_banner_image_path'] );

       $this->load->view('admin/admin_header');
       $this->load->view('admin/admin_contact_us', $data);
       $this->load->view('admin/admin_footer');
   }

   public function update_contact() {
    // $data = $this->input->post();
    $data = array(
        'id' => $this->input->post('id'), // Assuming the form has a hidden field for 'id'
        'contact_banner_image_id' => $this->input->post('contact_banner_image_id'),
        'contact_banner_sub_title' => $this->input->post('contact_banner_sub_title'),
        'contact_banner_main_title' => $this->input->post('contact_banner_main_title'),
        'contact_page_main_title' => $this->input->post('contact_page_main_title'),
        'contact_email_address' => $this->input->post('contact_email_address'),
        'contact_email_phone' => $this->input->post('contact_email_phone'),
        'contact_note' => $this->input->post('contact_note')
    );

    $update_status = $this->Pages_model->update_contact($data);

    if ($update_status) {
        $response = array('status' => 'success', 'message' => 'About page updated successfully.');
    } else {
        $response = array('status' => 'error', 'message' => 'Failed to update about page.');
    }

    echo json_encode($response);
}


 /* Faq page */

 public function faq_edit() {

    if (!$this->session->userdata('user_id') and $this->session->userdata('user_role')!='admin') {
        redirect(base_url());
        return;
    }

    $data['faq'] = $this->Pages_model->get_faq(1);
    $data['faqs'] = $this->Pages_model->get_faqs();
 
    // $data = [];

   $this->load->view('admin/admin_header');
   $this->load->view('admin/admin_faq', $data);
   $this->load->view('admin/admin_footer');
}


public function update_faq() {
    // $data = $this->input->post();
    $data = array(
        'id' => $this->input->post('id'), // Assuming the form has a hidden field for 'id'
        'faq_banner_sub_title' => $this->input->post('faq_banner_sub_title'),
        'faq_banner_main_title' => $this->input->post('faq_banner_main_title'),
        'faq_page_main_title' => $this->input->post('faq_page_main_title'),
        'faq_banner_image_id' => $this->input->post('faq_banner_image_id'),
        'faq_page_image_id' => $this->input->post('faq_page_image_id')
    );

    $update_status = $this->Pages_model->update_faq($data);

    if ($update_status) {
        $response = array('status' => 'success', 'message' => 'Faq page updated successfully.');
    } else {
        $response = array('status' => 'error', 'message' => 'Failed to update page.');
    }

    echo json_encode($response);
}

public function delete_faqs() {
  
    $update_status = $this->Pages_model->delete_faqs($this->input->post('id'));

    if ($update_status) {
        $response = array('status' => 'success', 'message' => 'Deleted');
    } else {
        $response = array('status' => 'error', 'message' => 'Failed to update page.');
    }

    echo json_encode($response);
}

// add review

public function reviews_add(){

    $data = array(
        'review' =>'',
        'name' => ' '
    );

    $update_status = $this->Pages_model->reviews_add($data);

    if ($update_status) {
        $response = array('status' => 'success','review_id' => $update_status , 'message' => 'Review added successfully.');
    } else {
        $response = array('status' => 'error', 'message' => 'Failed.');
    }

    echo json_encode($response);

}

public function delete_reviews() {
  
    $update_status = $this->Pages_model->delete_reviews($this->input->post('id'));

    if ($update_status) {
        $response = array('status' => 'success', 'message' => 'Deleted');
    } else {
        $response = array('status' => 'error', 'message' => 'Failed to update page.');
    }

    echo json_encode($response);
}


public function reviews_update() {
    // $data = $this->input->post();

    if($this->input->post('feild')=='review'){

    $data = array(
        'id' => $this->input->post('id'), // Assuming the form has a hidden field for 'id'
        'review' => $this->input->post('review'));
    }
    
    if($this->input->post('feild')=='name'){

        $data = array(
            'id' => $this->input->post('id'), // Assuming the form has a hidden field for 'id'
            'name' => $this->input->post('name'));
        }

    $update_status = $this->Pages_model->reviews_update($data);

    if ($update_status) {
        $response = array('status' => 'success', 'message' => 'Faq updated successfully.');
    } else {
        $response = array('status' => 'error', 'message' => 'Failed to update about page.');
    }

    echo json_encode($response);
}

// Add faq

public function faqs_add(){

    $data = array(
        'quesion' =>' ',
        'ans' => ' '
    );

    $update_status = $this->Pages_model->faqs_add($data);

    if ($update_status) {
        $response = array('status' => 'success','faq_id' => $update_status , 'message' => 'Faq added successfully.');
    } else {
        $response = array('status' => 'error', 'message' => 'Failed.');
    }

    echo json_encode($response);

}


public function faqs_update() {
    // $data = $this->input->post();

    if($this->input->post('feild')=='question'){

    $data = array(
        'id' => $this->input->post('id'), // Assuming the form has a hidden field for 'id'
        'quesion' => $this->input->post('question'));
    }
    
    if($this->input->post('feild')=='answer'){

        $data = array(
            'id' => $this->input->post('id'), // Assuming the form has a hidden field for 'id'
            'ans' => $this->input->post('answer'));
        }

    $update_status = $this->Pages_model->faqs_update($data);

    if ($update_status) {
        $response = array('status' => 'success', 'message' => 'Faq updated successfully.');
    } else {
        $response = array('status' => 'error', 'message' => 'Failed to update about page.');
    }

    echo json_encode($response);
}



public function market_price($page = 1)
{


    $search_term = isset($_POST['title']) ? $_POST['title'] : '';

 $limit = 16; // Number of blogs per page
 $offset = ($page - 1) * $limit;

 $cars = $this->Pages_model->get_all_cars($limit, $offset,$search_term);
 $total_blogs = $this->Pages_model->get_total_all_cars_count($search_term);
 $total_pages = ceil($total_blogs / $limit);

 $data = [
     'cars' => $cars,
     'total_pages' => $total_pages,
     'current_page' => $page,
     'search_term' => htmlspecialchars($search_term)
 ];


 $this->load->view('admin/admin_header');
 $this->load->view('admin/admin_add_market_price', $data);
 $this->load->view('admin/admin_footer');

}

public function market_price_added(){


    $id = $this->input->post('id');
  
         $data = array(
                 'id' => $this->input->post('car_id'), 
                 'market_price' =>  $this->input->post('market_price')       
               
         );
     
         $update_status = $this->User_model->update_car($data);
     
         if ($update_status) {
             $response = array('status' => 'success', 'message' => 'Market price updated successfully.');
         } else {
             $response = array('status' => 'error', 'message' => 'Failed to update.');
         }

     

    echo json_encode($response);
}





}
?>
