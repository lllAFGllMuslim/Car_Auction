<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages_model extends CI_Model {

  public function __construct() {
    parent::__construct();
    $this->load->database();
}

  // Insert image data into the media table
  public function insert_image($image_path) {
    $data = array(
        'image_path' => $image_path,
    );
    $this->db->insert('media', $data);
    return $this->db->insert_id();
}


    // Function to update about page data
    public function update_about($data) {
      // Assuming 'id' is the primary key and you have it in your $data array
      $this->db->where('id', $data['id']);
      return $this->db->update('about_page', $data);
  }

  public function get_about($id) {
    $this->db->where('id', $id);
    $query = $this->db->get('about_page');
    return $query->row_array();
}

public function get_privacy_policy($id) {
  $this->db->where('id', $id);
  $query = $this->db->get('privacy_policy');
  return $query->row_array();
}

public function update_privacy_policyt($data) {
  // Assuming 'id' is the primary key and you have it in your $data array
  $this->db->where('id', $data['id']);
  return $this->db->update('privacy_policy', $data);
}


public function get_terms_and_conditions($id) {
  $this->db->where('id', $id);
  $query = $this->db->get('terms_and_conditions');
  return $query->row_array();
}

public function update_terms_and_conditions($data) {
  // Assuming 'id' is the primary key and you have it in your $data array
  $this->db->where('id', $data['id']);
  return $this->db->update('terms_and_conditions', $data);
}

/*  Header footer */

    public function update_header_footer($data) {
      // Assuming 'id' is the primary key and you have it in your $data array
      $this->db->where('id', $data['id']);
      return $this->db->update('header_footer_page', $data);
  }

  public function get_header_footer($id) {

    
    $this->db->where('id', $id);
    $query = $this->db->get('header_footer_page');
    return $query->row_array();
}


/*  Home */

public function update_home($data) {
  // Assuming 'id' is the primary key and you have it in your $data array
  $this->db->where('id', $data['id']);
  return $this->db->update('home_page', $data);
}


public function get_home($id) {
  $this->db->where('id', $id);
  $query = $this->db->get('home_page');
  return $query->row_array();
}


/*  Contact */

public function update_contact($data) {
  // Assuming 'id' is the primary key and you have it in your $data array
  $this->db->where('id', $data['id']);
  return $this->db->update('contact_page', $data);
}

public function get_contact($id) {
  $this->db->where('id', $id);
  $query = $this->db->get('contact_page');
  return $query->row_array();
}


public function update_faq($data) {
  // Assuming 'id' is the primary key and you have it in your $data array
  $this->db->where('id', $data['id']);
  return $this->db->update('faq_page', $data);
}


public function faqs_add($data) {
  
  $this->db->insert('faqs', $data);
  return $this->db->insert_id();
}

public function reviews_add($data) {
  
  $this->db->insert('reviews', $data);
  return $this->db->insert_id();
}

public function delete_reviews($id) {
  $this->db->where('id', $id);
  return $this->db->delete('reviews');
}


public function reviews_update($data) {
  // Assuming 'id' is the primary key and you have it in your $data array
  $this->db->where('id', $data['id']);
  return $this->db->update('reviews', $data);
}

public function reviews_faqs() {

  $query = $this->db->get('reviews');
  return $query->result_array();
}


public function faqs_update($data) {
  // Assuming 'id' is the primary key and you have it in your $data array
  $this->db->where('id', $data['id']);
  return $this->db->update('faqs', $data);
}

public function get_faq($id) {
  $this->db->where('id', $id);
  $query = $this->db->get('faq_page');
  return $query->row_array();
}

public function get_faqs() {

  $query = $this->db->get('faqs');
  return $query->result_array();
}


public function delete_faqs($id) {
  $this->db->where('id', $id);
  return $this->db->delete('faqs');
}



public function get_all_cars($limit, $offset,$search_term)
{
    $this->db->limit($limit, $offset);
    // $this->db->where('post_author_id', $this->session->userdata('user_id') );
        $this->db->order_by('id', 'DESC');
           // If a search term is provided, filter by car_title
           if (!empty($search_term)) {
            $this->db->like('car_title', $search_term);
        }
    $query = $this->db->get('cars'); // Assuming the table name is 'blogs'
    return $query->result();
}

public function get_total_all_cars_count($search_term)
{
    // Get the user ID from session data
    // $user_id = $this->session->userdata('user_id');

    // Filter by user ID
    // $this->db->where('post_author_id', $user_id); // Adjust column name to match your schema

       // If a search term is provided, filter by car_title
       if (!empty($search_term)) {
        $this->db->like('car_title', $search_term);
    }

    // Count rows matching the condition
    $this->db->from('cars'); // Use from() to specify the table for counting
    $count = $this->db->count_all_results();

    return $count;
}





}
?>
