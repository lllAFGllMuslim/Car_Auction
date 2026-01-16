<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Search_model'); // Load the model
        $this->load->model('User_model');
        $this->load->library('session');
        $this->load->helper(array('url', 'form')); // Load the URL helper here
    }

    public function index($page = 1) {
        $data = array();





        $limit =20; // Number of blogs per page
        $offset = ($page - 1) * $limit;
    
        $cars = $this->Search_model->search($limit, $offset);
        $total_blogs = $this->Search_model->get_total_search_cars_count();
        $total_pages = ceil($total_blogs / $limit);
    
        $data = [
            'cars' => $cars,
            'total_pages' => $total_pages,
            'current_page' => $page,
            'loop' => 1,
        ];

        $data['body_category'] = $this->User_model->get_body_category();
        $data['brand_category'] = $this->User_model->get_brand_category();
        $data['buy_method_category'] = $this->User_model->get_buy_method_category();
        $data['engine_category'] = $this->User_model->get_engine_category();
        $data['equipment_category'] = $this->User_model->get_equipment_category();
        $data['model_category'] = $this->User_model->get_model_category();
        $data['model_year_category'] = $this->User_model->get_model_year_category();
        $data['fuel_category'] = $this->User_model->get_fuel_category();
    

        // Load view with search results
        // $this->load->view('search_results', $data);
        $this->load->view('header');
        $this->load->view('search_results',$data);
        $this->load->view('footer',$data);
    }
    
    
 public function get_auction_cars(){
     
      $get_auction_cars = $this->Search_model->get_auction_cars();
      
      if(!empty($get_auction_cars)){
          
          foreach ($get_auction_cars as $car){
              
              if(get_post_status($car->id) == 'Completed'){
             
              $bid = $this->User_model->get_bid($car->id);     


                  
                  $data = array(
            'id' => $car->id, 
            'winner_id' =>  $bid[0]["id"],
            'winner_user_id' =>  $bid[0]["user_id"],
            'auction_status' =>'1',
            'auction_completed_date' =>date('Y-m-d H:i:s')
            
          
    );

    $update_status = $this->User_model->update_winner($data);
    
    $winner = $bid[0]["user_id"];
    $author = $car->post_author_id;
    
        $author_data = get_profile($author);
          $name1 =    $author_data["username"];
             $email1 = $author_data["email"];
    
      $winner_data = get_profile($winner);
                 $name =    $winner_data["username"];
                 $url = base_url()."car/".$car->car_slug;
                 $email = $winner_data["email"];
                 
                 
                 $admin_data = get_profile(1);
          $name2 =    $admin_data["username"];
             $email2 = $admin_data["email"];
             $phone = $admin_data["phone_number"];
             
    
        if ($update_status) {
            
    
                   $message='Hello '.$name.', <br/>

You are the winner in the auction for the below car details.<br/>

View Car Details : '.$url.' <br/><br/>

Regards,<br/>
Car Auction Company'; 


  $message1='Hello '.$name1.', <br/>

Auction is completed in your listing. To view the details of the winner you can contact to the admin on below details :-<br/>

View Car Details : '.$url.' <br/>

Admin Email ID : '.$email2.' <br/>

Admin Phone No :- '.$phone.' <br/><br/>

Regards,<br/>
Car Auction Company'; 
    


// To send HTML mail, the Content-type header must be set
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// Additional headers
// $headers .= 'From: sender@example.com' . "\r\n";
// $headers .= 'Reply-To: sender@example.com' . "\r\n";

$subject ="Auction Winner!";

mail($email, $subject, $message, $headers);

mail($email1, $subject, $message1, $headers);
    
  
            $response = array('status' => 'success', 'message' => 'Winner updated successfully.');
        } else {
            $response = array('status' => 'error', 'message' => 'Failed to update.');
        }

        echo json_encode($response);
                  
              }
          }
      }
     
 }
}
?>
