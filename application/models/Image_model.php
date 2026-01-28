<?php 
// application/models/Image_model.php

defined('BASEPATH') OR exit('No direct script access allowed');


class Image_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
 * Get auction timer information
 * 
 * @param int $car_id
 * @return object|null
 */
public function get_auction_timer_info($car_id) {
    $this->db->select('id, created, auction_status');
    $this->db->from('cars');
    $this->db->where('id', $car_id);
    $query = $this->db->get();
    
    if ($query->num_rows() > 0) {
        return $query->row();
    }
    return null;
}
public function get_highest_bidder_info($car_id) {
    $this->db->select('user_id, bidding_price, is_auto_bid, created');
    $this->db->from('bidding');
    $this->db->where('car_id', $car_id);
    $this->db->order_by('bidding_price', 'DESC');
    $this->db->limit(1);
    
    $query = $this->db->get();
    
    if ($query->num_rows() > 0) {
        return $query->row_array();
    }
    
    return null;
}
/**
 * Update auction created timestamp (for time extension)
 * 
 * @param array $data Must contain 'id' and 'created'
 * @return bool
 */
public function update_auction_created_time($data) {
    if (!isset($data['id']) || !isset($data['created'])) {
        return false;
    }
    
    $this->db->where('id', $data['id']);
    return $this->db->update('cars', array('created' => $data['created']));
}

    // Function to get the image path by ID
    public function get_image_path($id) {
        $this->db->select('image_path');
        $this->db->from('media'); // Assuming your table is named 'images'
        $this->db->where('id', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row()->image_path;
        } else {
            return null; // or a default image path
        }
    }


      public function get_brand_by_id($id) {
     
        $this->db->from('model_category'); 
        $this->db->where('id', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null; // or a default image path
        }
    }
    
         public function get_header_footer($id) {
     
        $this->db->from('header_footer_page'); 
        $this->db->where('id', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null; // or a default image path
        }
    }

    public function get_home_page($id) {
     
        $this->db->from('home_page'); 
        $this->db->where('id', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null; // or a default image path
        }
    }


    public function get_latest_three_blogs()
    {
        $this->db->order_by('created', 'DESC'); // Assuming 'created_at' is the column for the creation date
        $this->db->limit(3);
        $query = $this->db->get('blogs'); // Assuming 'blogs' is your table name
        return $query->result();
    }

    public function get_category_by_id($id) {
     
        $this->db->from('blog_categories'); 
        $this->db->where('id', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null; // or a default image path
        }
    }

    public function get_about_page($id) {
     
        $this->db->from('about_page'); 
        $this->db->where('id', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null; // or a default image path
        }
    }

    public function get_contact_page($id) {
     
        $this->db->from('contact_page'); 
        $this->db->where('id', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null; // or a default image path
        }
    }

    public function get_faq_page($id) {
     
        $this->db->from('faq_page'); 
        $this->db->where('id', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null; // or a default image path
        }
    }

    public function get_faqs() {
     
        $this->db->from('faqs'); 
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null; // or a default image path
        }
    }

    public function get_revews() {
     
        $this->db->from('reviews'); 
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null; // or a default image path
        }
    }

    public function get_blog_page($id) {
     
        $this->db->from('blog_page'); 
        $this->db->where('id', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null; // or a default image path
        }
    }


    public function get_categories() {
     
        $this->db->from('blog_categories'); 
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null; // or a default image path
        }
    }

    public function get_id_by_slug($slug) {
     
        $this->db->from('blog_categories'); 
        $this->db->where('cat_slug', $slug);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null; // or a default image path
        }
    }

    public function get_profile($id){

        $this->db->where('id', $id);
        $query = $this->db->get('users');
        return $query->row_array();

    }


    public function get_car_cat_by_id_and_table_name($id,$table_name) {
     
        $this->db->from($table_name); 
        $this->db->where('id', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null; // or a default image path
        }
    }

    public function get_post($post_id){

        $this->db->where('id', $post_id);
        $query = $this->db->get('cars');
       return $query->row();

    }

    public function get_car_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('cars');
        return $query->row_array();
    }


    public function get_privacy_policy_page($id) {
     
        $this->db->from('privacy_policy'); 
        $this->db->where('id', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null; // or a default image path
        }
    }

    public function get_terms_and_conditions_page($id) {
     
        $this->db->from('terms_and_conditions'); 
        $this->db->where('id', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null; // or a default image path
        }
    }

public function get_car_by_brand_id($id) {

$this->db->where('cat_brand', $id);
$this->db->where('auction_status', '0');
$this->db->from('cars'); // Use from() to specify the table for counting
$count = $this->db->count_all_results();

return $count;

}


public function get_bid_by_id($id) {
     
    $this->db->where('car_id', $id);
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get('bidding');

    // // Fetch the result
    // return $result = $query->result_array();

    if ($query->num_rows() > 0) {
        return $query->result();
    } else {
        return null; // or a default image path
    }
}

public function get_bid_by_primary_id($id) {
     
    $this->db->where('id', $id);
    $query = $this->db->get('bidding');
    return $query->row();
}


public function get_car_by_id_my_bid($id) {
    $this->db->where('id', $id);
    $this->db->from('cars');
    $query = $this->db->get();
    return $query->result();
}

public function get_bids_by_carid_user_id($id,$user_id) {
     
    $this->db->where('car_id', $id);
    $this->db->where('user_id', $user_id);
    
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get('bidding');

    // // Fetch the result
    // return $result = $query->result_array();

    if ($query->num_rows() > 0) {
        return $query->result();
    } else {
        return null; // or a default image path
    }
}

 public function get_total_cars_count()
                                    {
                                        // Get the user ID from session data
                                        $user_id = $this->session->userdata('user_id');
                                    
                                        // Filter by user ID
                                     //   $this->db->where('post_author_id', $user_id); // Adjust column name to match your schema
                                        $this->db->where('status','publish');
                                          $this->db->where('auction_status','0');
                                        // Count rows matching the condition
                                        $this->db->from('cars'); // Use from() to specify the table for counting
                                        $count = $this->db->count_all_results();
                                    
                                        return $count;
                                    }
                                    
                                    
  public function get_car_by_data($data, $value)
                                    {
                                        // Get the user ID from session data
                                        $user_id = $this->session->userdata('user_id');
                                    
                                        // Filter by user ID
                                        $this->db->where($data, $value); // Adjust column name to match your schema
										$this->db->where('status','publish');
                                        $this->db->where('auction_status','0');
                                        // $this->db->where('status','publish');
                                        // Count rows matching the condition
                                        $this->db->from('cars'); // Use from() to specify the table for counting
                                        $count = $this->db->count_all_results();
                                    
                                        return $count;
                                    }
                                    
                                    
                                                                        
  public function get_compllete_car_auction_by_id($userid)
                                    {
                                        // Get the user ID from session data
                                        $user_id = $this->session->userdata('user_id');
                                    
                                        // Filter by user ID
                                        $this->db->where('post_author_id', $userid); // Adjust column name to match your schema
                                         $this->db->where('auction_status','1');
                                         $this->db->where('cat_buy_method','3');
                                        // Count rows matching the condition
                                        $this->db->from('cars'); // Use from() to specify the table for counting
                                        $count = $this->db->count_all_results();
                                    
                                        return $count;
                                    }

  public function get_win_car_auction_by_id($userid)
                                    {
                                        // Get the user ID from session data
                                        $user_id = $this->session->userdata('user_id');
                                    
                                        // Filter by user ID
                                        // $this->db->where('post_author_id', $userid); // Adjust column name to match your schema
                                         $this->db->where('auction_status','1');
                                         $this->db->where('cat_buy_method','3');
                                           $this->db->where('winner_user_id',$userid);
                                        // Count rows matching the condition
                                        $this->db->from('cars'); // Use from() to specify the table for counting
                                        $count = $this->db->count_all_results();
                                    
                                        return $count;
                                    }
                                    
  public function get_bid_by_userid($userid)
                                    {
                                       
                                           $this->db->where('user_id',$userid);
                                        // Count rows matching the condition
                                        $this->db->from('bidding'); // Use from() to specify the table for counting
                                        $count = $this->db->count_all_results();
                                    
                                        return $count;
                                    }
                                    
                                   public function get_bid_by_userid_distin($userid)
{
    // Select distinct car_id count for the given user_id
    $this->db->select('COUNT(DISTINCT car_id) AS car_count');
    $this->db->where('user_id', $userid);
    $this->db->from('bidding');
    
    // Execute the query
    $query = $this->db->get();
    
    // Fetch the result as an array
    $result = $query->row_array();
    
    // Return the count of distinct car_id
    return $result['car_count'];
}


}
