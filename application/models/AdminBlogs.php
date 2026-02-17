<?php
class AdminBlogs extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_categories() {
        $query = $this->db->get('blog_categories');
        return $query->result_array();
    }
    
    public function add_category($data) {
        $this->db->insert('blog_categories', $data);
        return $this->db->insert_id();
    }

    public function update_category($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('blog_categories', $data);
    }

    public function delete_category($id) {
        $this->db->where('id', $id);
        return $this->db->delete('blog_categories');
    }

    public function is_unique_category_name($category_name, $id = null) {
        $this->db->where('cat_name', $category_name);
        if ($id) {
            $this->db->where('id !=', $id);
        }
        $query = $this->db->get('blog_categories');
        return $query->num_rows() == 0;
    }

    public function is_unique_slug($category_slug, $id = null) {
        $this->db->where('cat_slug', $category_slug);
        if ($id) {
            $this->db->where('id !=', $id);
        }
        $query = $this->db->get('blog_categories');
        return $query->num_rows() == 0;
    }


    public function is_unique_blog_name($category_name, $id = null) {
        $this->db->where('blog_title', $category_name);
        if ($id) {
            $this->db->where('id !=', $id);
        }
        $query = $this->db->get('blogs');
        return $query->num_rows() == 0;
    }

    public function is_unique_blog_slug($category_slug, $id = null) {
        $this->db->where('blog_slug', $category_slug);
        if ($id) {
            $this->db->where('id !=', $id);
        }
        $query = $this->db->get('blogs');
        return $query->num_rows() == 0;
    }

    public function blog_added($data){

        $this->db->insert('blogs', $data);
        return $this->db->insert_id();

    }

    public function get_blog_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('blogs');
        return $query->row_array();
    }

    

    public function update_blog($data) {
        // Assuming 'id' is the primary key and you have it in your $data array
        $this->db->where('id', $data['id']);
        return $this->db->update('blogs', $data);
    }

    public function get_blogs($limit, $offset)
    {
        $this->db->limit($limit, $offset);
        $query = $this->db->get('blogs'); // Assuming the table name is 'blogs'
        return $query->result();
    }

    public function get_total_blogs_count()
    {
        return $this->db->count_all('blogs'); // Assuming the table name is 'blogs'
    }

    
    public function delete_blog($id) {
        $this->db->where('id', $id);
        return $this->db->delete('blogs');
    }

    
  public function update_blog_page($data) {
    $this->db->where('id', $data['id']);
    return $this->db->update('blog_page', $data);
}



public function get_blog_page($id) {
    $this->db->where('id', $id);
    $query = $this->db->get('blog_page');
    return $query->row_array();
  }

  public function get_blog_by_slug($slug) {
    // Define criteria to block certain slugs
    
    // Otherwise, proceed with data retrieval
    $query = $this->db->get_where('blogs', array('blog_slug' => $slug));
    return $query->row_array();
}



public function get_blogs_by_catid($limit, $offset,$catid)
{
    $this->db->limit($limit, $offset);
    $this->db->where('blog_category', $catid);
    $query = $this->db->get('blogs'); // Assuming the table name is 'blogs'
    return $query->result();
}

public function get_total_blogs_count_by_catid($catid)
{
    // Ensure the table name is 'blogs' and use the active record pattern for better readability
    $this->db->where('blog_category', $catid);
    $this->db->from('blogs');
    return $this->db->count_all_results();
}

//// **** brand ******//

public function is_unique_brand_category_name($category_name, $id = null) {
    $this->db->where('brand_name', $category_name);
    if ($id) {
        $this->db->where('id !=', $id);
    }
    $query = $this->db->get('brand_category');
    return $query->num_rows() == 0;
}

public function is_unique_brand_slug($category_slug, $id = null) {
    $this->db->where('brand_slug', $category_slug);
    if ($id) {
        $this->db->where('id !=', $id);
    }
    $query = $this->db->get('brand_category');
    return $query->num_rows() == 0;
}

public function brand_category($data) {
    $this->db->insert('brand_category', $data);
    return $this->db->insert_id();
}

public function update_brand_category($id, $data) {
    $this->db->where('id', $id);
    return $this->db->update('brand_category', $data);
}

public function get_brand_categories() {
    $query = $this->db->get('brand_category');
    return $query->result_array();
}

public function delete_brand_category($id) {
    $this->db->where('id', $id);
    return $this->db->delete('brand_category');
}


// ***** fuel *****//

public function is_unique_fuel_category_name($category_name, $id = null) {
    $this->db->where('fuel_name', $category_name);
    if ($id) {
        $this->db->where('id !=', $id);
    }
    $query = $this->db->get('fuel_category');
    return $query->num_rows() == 0;
}

public function is_unique_fuel_slug($category_slug, $id = null) {
    $this->db->where('fuel_slug', $category_slug);
    if ($id) {
        $this->db->where('id !=', $id);
    }
    $query = $this->db->get('fuel_category');
    return $query->num_rows() == 0;
}

public function fuel_category($data) {
    $this->db->insert('fuel_category', $data);
    return $this->db->insert_id();
}

public function update_fuel_category($id, $data) {
    $this->db->where('id', $id);
    return $this->db->update('fuel_category', $data);
}

public function get_fuel_categories() {
    $query = $this->db->get('fuel_category');
    return $query->result_array();
}

public function delete_fuel_category($id) {
    $this->db->where('id', $id);
    return $this->db->delete('fuel_category');
}

/** model year **/

public function is_unique_model_year_category_name($category_name, $id = null) {
    $this->db->where('year_name', $category_name);
    if ($id) {
        $this->db->where('id !=', $id);
    }
    $query = $this->db->get('model_year_category');
    return $query->num_rows() == 0;
}

public function is_unique_model_year_slug($category_slug, $id = null) {
    $this->db->where('year_slug', $category_slug);
    if ($id) {
        $this->db->where('id !=', $id);
    }
    $query = $this->db->get('model_year_category');
    return $query->num_rows() == 0;
}

public function model_year_category($data) {
    $this->db->insert('model_year_category', $data);
    return $this->db->insert_id();
}

public function update_model_year_category($id, $data) {
    $this->db->where('id', $id);
    return $this->db->update('model_year_category', $data);
}

public function get_model_year_categories() {
    $query = $this->db->get('model_year_category');
    return $query->result_array();
}

public function delete_model_year_category($id) {
    $this->db->where('id', $id);
    return $this->db->delete('model_year_category');
}

/** buy method **/

public function is_unique_buy_method_category_name($category_name, $id = null) {
    $this->db->where('buy_method_name', $category_name);
    if ($id) {
        $this->db->where('id !=', $id);
    }
    $query = $this->db->get('buy_method_category');
    return $query->num_rows() == 0;
}

public function is_unique_buy_method_slug($category_slug, $id = null) {
    $this->db->where('buy_method_slug', $category_slug);
    if ($id) {
        $this->db->where('id !=', $id);
    }
    $query = $this->db->get('buy_method_category');
    return $query->num_rows() == 0;
}

public function buy_method_category($data) {
    $this->db->insert('buy_method_category', $data);
    return $this->db->insert_id();
}

public function update_buy_method_category($id, $data) {
    $this->db->where('id', $id);
    return $this->db->update('buy_method_category', $data);
}

public function get_buy_method_categories() {
    $query = $this->db->get('buy_method_category');
    return $query->result_array();
}

public function delete_buy_method_category($id) {
    $this->db->where('id', $id);
    return $this->db->delete('buy_method_category');
}


/** buy method **/

public function is_unique_body_category_name($category_name, $id = null) {
    $this->db->where('body_name', $category_name);
    if ($id) {
        $this->db->where('id !=', $id);
    }
    $query = $this->db->get('body_category');
    return $query->num_rows() == 0;
}

public function is_unique_body_slug($category_slug, $id = null) {
    $this->db->where('body_slug', $category_slug);
    if ($id) {
        $this->db->where('id !=', $id);
    }
    $query = $this->db->get('body_category');
    return $query->num_rows() == 0;
}

public function body_category($data) {
    $this->db->insert('body_category', $data);
    return $this->db->insert_id();
}

public function update_body_category($id, $data) {
    $this->db->where('id', $id);
    return $this->db->update('body_category', $data);
}

public function get_body_categories() {
    $query = $this->db->get('body_category');
    return $query->result_array();
}

public function delete_body_category($id) {
    $this->db->where('id', $id);
    return $this->db->delete('body_category');
}



/** Engine  **/

public function is_unique_engine_category_name($category_name, $id = null) {
    $this->db->where('engine_name', $category_name);
    if ($id) {
        $this->db->where('id !=', $id);
    }
    $query = $this->db->get('engine_category');
    return $query->num_rows() == 0;
}

public function is_unique_engine_slug($category_slug, $id = null) {
    $this->db->where('engine_slug', $category_slug);
    if ($id) {
        $this->db->where('id !=', $id);
    }
    $query = $this->db->get('engine_category');
    return $query->num_rows() == 0;
}

public function engine_category($data) {
    $this->db->insert('engine_category', $data);
    return $this->db->insert_id();
}

public function update_engine_category($id, $data) {
    $this->db->where('id', $id);
    return $this->db->update('engine_category', $data);
}

public function get_engine_categories() {
    $query = $this->db->get('engine_category');
    return $query->result_array();
}

public function delete_engine_category($id) {
    $this->db->where('id', $id);
    return $this->db->delete('engine_category');
}



/** equipment  **/

public function is_unique_equipment_category_name($category_name, $id = null) {
    $this->db->where('equipment_name', $category_name);
    if ($id) {
        $this->db->where('id !=', $id);
    }
    $query = $this->db->get('equipment_category');
    return $query->num_rows() == 0;
}

public function is_unique_equipment_slug($category_slug, $id = null) {
    $this->db->where('equipment_slug', $category_slug);
    if ($id) {
        $this->db->where('id !=', $id);
    }
    $query = $this->db->get('equipment_category');
    return $query->num_rows() == 0;
}

public function equipment_category($data) {
    $this->db->insert('equipment_category', $data);
    return $this->db->insert_id();
}

public function update_equipment_category($id, $data) {
    $this->db->where('id', $id);
    return $this->db->update('equipment_category', $data);
}

public function get_equipment_categories() {
    $query = $this->db->get('equipment_category');
    return $query->result_array();
}

public function delete_equipment_category($id) {
    $this->db->where('id', $id);
    return $this->db->delete('equipment_category');
}


/** model  **/

public function is_unique_model_category_name($category_name, $id = null) {
    $this->db->where('model_name', $category_name);
    if ($id) {
        $this->db->where('id !=', $id);
    }
    $query = $this->db->get('model_category');
    return $query->num_rows() == 0;
}

public function is_unique_model_slug($category_slug, $id = null) {
    $this->db->where('model_slug', $category_slug);
    if ($id) {
        $this->db->where('id !=', $id);
    }
    $query = $this->db->get('model_category');
    return $query->num_rows() == 0;
}

public function model_category($data) {
    $this->db->insert('model_category', $data);
    return $this->db->insert_id();
}

public function update_model_category($id, $data) {
    $this->db->where('id', $id);
    return $this->db->update('model_category', $data);
}

public function get_model_categories() {
    // Select the columns you want to retrieve
    $this->db->select('brand_category.brand_name, model_category.*');
    
    // From brand_category table
    $this->db->from('brand_category');
    
    // Join with model_category table on brand_category.id = model_category.brand_id
    $this->db->join('model_category', 'model_category.brand_id = brand_category.id');
    
    // Order by model_category.id in descending order
    $this->db->order_by('model_category.id', 'DESC');
    
    // Execute the query
    $query = $this->db->get();
    
    return $query->result_array();
}


public function delete_model_category($id) {
    $this->db->where('id', $id);
    return $this->db->delete('model_category');
}

public function get_cars($limit, $offset,$search_term)
{
    $this->db->limit($limit, $offset);
 
    $this->db->where('status','pending');
    // Order by the 'created_at' column in descending order to get the latest entries first
    $this->db->order_by('id', 'DESC');

        // If a search term is provided, filter by car_title
        if (!empty($search_term)) {
            $this->db->like('car_title', $search_term);
        }
    
    $query = $this->db->get('cars'); // Assuming the table name is 'cars'
    return $query->result();
}


public function get_total_cars_count($search_term)
{

    // Filter by user ID
$this->db->where('status','pending');
// Count rows matching the condition
    // If a search term is provided, filter by car_title
    if (!empty($search_term)) {
        $this->db->like('car_title', $search_term);
    }
    
$this->db->from('cars'); // Use from() to specify the table for counting
$count = $this->db->count_all_results();

return $count;
}


public function delete_car($id) {
$this->db->where('id', $id);
return $this->db->delete('cars');
}


public function get_dealer_message_by_brand_id($brand_id) {
    // Ensure $brand_id is a valid integer or sanitize it to avoid SQL injection
    $brand_id = intval($brand_id);
    
    // Set the condition for the query
    $this->db->where('car_id', $brand_id);
    
    // Execute the query on the 'model_category' table
    $query = $this->db->get('delete_cars');
    
    // Return the result as an array of rows
    return $query->row_array();
}

public function admin_car_delete($id){

    $this->db->where('id', $id);
    return $this->db->delete('cars');

}


public function admin_car_bid_delete($id){

    $this->db->where('car_id', $id);
    return $this->db->delete('bidding');

}

/** user **/



public function get_user_list($limit, $offset,$search_term)
{
    $this->db->limit($limit, $offset);
 
    $this->db->where('role','user');
    // Order by the 'created_at' column in descending order to get the latest entries first
    $this->db->order_by('id', 'DESC');
      // If a search term is provided, filter by car_title

      if (!empty($search_term)) {
        $this->db->like('username', $search_term);
    }
    
    $query = $this->db->get('users'); // Assuming the table name is 'cars'
    return $query->result();
}

public function get_sellyourcar_list($limit, $offset,$search_term,$type)
{
    $this->db->limit($limit, $offset);
 
    // $this->db->where('role','user');
    // Order by the 'created_at' column in descending order to get the latest entries first
    if($type == "new") {
        $this->db->order_by('DT', 'DESC');
        $this->db->where('vendor', null);
        $this->db->where('sold',0);
    } elseif ($type == "sold") {
        $this->db->order_by('DT_sold', 'DESC');
        $this->db->where('sold',1);
    } elseif ($type == "vendor") {
        $this->db->order_by('DT_vendor', 'DESC');
        $this->db->where('vendor !=', null);
        $this->db->where('sold',0);
    }
    
    //   If a search term is provided, filter by car_title

      if (!empty($search_term)) {
        $this->db->like('brandname', $search_term);
    }
    
    $query = $this->db->get('sellyourcar'); // Assuming the table name is 'cars'
    return $query->result();
}

public function get_sellyourcar_profile($id){
    $this->db->where('id',$id);
    $query = $this->db->get('sellyourcar');
    return $query->result();
}

public function sellyourcar_profileupdate($data) {
    // print_r($data);
    $this->db->where('id', $data['id']);
    return $this->db->update('sellyourcar', $data);
}
public function delete_sellyourcar($id) {
    $this->db->where('id', $id);
    return $this->db->delete('sellyourcar'); 
}

public function get_dealerlist() {
    $this->db->select(['id','first_name','last_name','company_name']);
    $this->db->where('role','dealer');
    $query = $this->db->get('users');
    return $query->result();
}


public function get_total_user_list_count($search_term)
{

    // Filter by user ID
    $this->db->where('role','user');
// Count rows matching the condition
if (!empty($search_term)) {
    $this->db->like('username', $search_term);
}
$this->db->from('users'); // Use from() to specify the table for counting
$count = $this->db->count_all_results();

return $count;
}

public function get_total_sellyourcar_list_count($search_term)
{

    // Filter by user ID
    // $this->db->where('role','user');
// Count rows matching the condition
if (!empty($search_term)) {
    $this->db->like('brandname', $search_term);
}
$this->db->from('sellyourcar'); // Use from() to specify the table for counting
$count = $this->db->count_all_results();

return $count;
}


public function get_dealar_list($limit, $offset,$search_term)
{
    $this->db->limit($limit, $offset);
 
    $this->db->where('role','dealer');
    // Order by the 'created_at' column in descending order to get the latest entries first
    $this->db->order_by('id', 'DESC');

     // If a search term is provided, filter by car_title
     if (!empty($search_term)) {
        // $this->db->like('username', $search_term);
        $this->db->like('company_name', $search_term);
    }

   
    
    $query = $this->db->get('users'); // Assuming the table name is 'cars'
    
    return $query->result();
}


public function get_total_dealar_list_count($search_term)
{

    // Filter by user ID
    $this->db->where('role','dealer');
// Count rows matching the condition
   // If a search term is provided, filter by car_title
   if (!empty($search_term)) {
    // $this->db->like('username', $search_term);
    $this->db->like('company_name', $search_term);
}
$this->db->from('users'); // Use from() to specify the table for counting
$count = $this->db->count_all_results();

return $count;
}



public function admin_user_delete($id){

    $this->db->where('id', $id);
    return $this->db->delete('users');

}


public function get_auction_cars($limit, $offset, $search_term = '')
{
    $limit = (int)$limit;
    $offset = (int)$offset;

    $this->db->limit($limit, $offset);
    $this->db->where('status', 'publish');
    $this->db->where('auction_status', '0');
    $this->db->where('cat_buy_method', 3);
    // ✅ Only cars whose 14-day auction window hasn't expired yet
    $this->db->where('DATE_ADD(created, INTERVAL 14 DAY) >', date('Y-m-d H:i:s'));

    if (!empty($search_term)) {
        $this->db->like('car_title', $search_term);
    }

    $this->db->order_by('id', 'DESC');

    $query = $this->db->get('cars');
    return $query->result();
}


public function get_total_auction_cars_count($search_term = '')
{
    $this->db->where('status', 'publish');
    $this->db->where('auction_status', '0');
    $this->db->where('cat_buy_method', 3);
    // ✅ Same filter for accurate pagination count
    $this->db->where('DATE_ADD(created, INTERVAL 14 DAY) >', date('Y-m-d H:i:s'));

    if (!empty($search_term)) {
        $this->db->like('car_title', $search_term);
    }

    $this->db->from('cars');
    return $this->db->count_all_results();
}


public function get_aution_completed_cars($limit, $offset, $search_term = '')
{
    
        $completed_by_user = isset($_GET['completed_by_user']) ? $_GET['completed_by_user'] : '';
        $win_by_user = isset($_GET['win_by_user']) ? $_GET['win_by_user'] : '';
        
    // Sanitize input
    $limit = (int)$limit;
    $offset = (int)$offset;

    $this->db->limit($limit, $offset);
    $this->db->where('status', 'publish');
    $this->db->where('auction_status', '1');
    $this->db->where('cat_buy_method', 3);

    // If a search term is provided, filter by car_title
    if (!empty($search_term)) {
        $this->db->like('car_title', $search_term);
    }
    
    if (!empty($search_term)) {
        $this->db->like('car_title', $search_term);
    }
    
     if (!empty($completed_by_user)) {
        $this->db->like('post_author_id', $completed_by_user);
    }
    
       if (!empty($win_by_user)) {
        $this->db->like('winner_user_id', $win_by_user);
    }
    

    $this->db->order_by('id', 'DESC');

    $query = $this->db->get('cars'); // Assuming the table name is 'cars'
    return $query->result();
}



public function get_total_aution_completed_cars_count($search_term = '')
{
    $this->db->where('status', 'publish');
    $this->db->where('auction_status', '1');
    $this->db->where('cat_buy_method', 3);

    // If a search term is provided, filter by car_title
    if (!empty($search_term)) {
        $this->db->like('car_title', $search_term);
    }

    $this->db->from('cars'); // Use from() to specify the table for counting
    $count = $this->db->count_all_results();

    return $count;
}


}
?>
