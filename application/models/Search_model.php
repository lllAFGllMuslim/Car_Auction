<?php
class Search_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
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
  
  public function search($limit, $offset) {

    // Get search parameters from the query string
    $brand = $this->input->get('cat_brand');
    $model = $this->input->get('cat_model');
    $fuel = $this->input->get('cat_fuel');
    $mileage = $this->input->get('mileage');
    $model_year = $this->input->get('cat_year');
    $price_at_car = $this->input->get('price_at_car');
    $buy_method = $this->input->get('cat_buy_method');
    $body = $this->input->get('cat_body');
    $engine = $this->input->get('cat_engine');
    $condition = $this->input->get('condition');
    $category = $this->input->get('category');
    $minmileage = $this->input->get('min-mileage');
    $maxmileage = $this->input->get('max-mileage');
    $minprice = $this->input->get('min-price');
    $maxprice = $this->input->get('max-price');
    $minyear = $this->input->get('min-year');
    $maxyear = $this->input->get('max-year');
    $priceRange  = $this->input->get('price');
    $author  = $this->input->get('author');
    $title = $this->input->get('title');
    $order_by = $this->input->get('order_by');
	
	
	
    $brand_data =  $this->get_car_cat_by_slug_and_table_name($brand,'brand_slug','brand_category');
    $model_data =  $this->get_car_cat_by_slug_and_table_name($model,'model_slug','model_category');
    $fuel_data =  $this->get_car_cat_by_slug_and_table_name($fuel,'fuel_slug','fuel_category');
   
		$buy_method_data =  $this->get_car_cat_by_slug_and_table_name($buy_method,'buy_method_slug','buy_method_category');
	
	
    $body_data =  $this->get_car_cat_by_slug_and_table_name($body,'body_slug','body_category');
    $engine_data =  $this->get_car_cat_by_slug_and_table_name($engine,'engine_slug','engine_category');

    // Start building the query
    $this->db->select('cars.*, MAX(bidding.bidding_price) as highest_bid');
    $this->db->from('cars');
    $this->db->join('bidding', 'cars.id = bidding.car_id', 'left'); // Adjust the join condition based on your schema

    // Join the model_year_category table to get the actual year value
    $this->db->join('model_year_category', 'cars.cat_year = model_year_category.id', 'left');

    // Apply filters based on provided search parameters
    if (!empty($brand) && ($brand!='0')) { $this->db->where('cat_brand', $brand_data["id"]); }
    if (!empty($model) && ($model!='0')) { $this->db->where('cat_model', $model_data["id"]); }
    if (!empty($fuel) && ($fuel!='0')) { $this->db->where('cat_fuel', $fuel_data["id"]); }
    if (!empty($buy_method) && ($buy_method!='0')) { $this->db->where('cat_buy_method', $buy_method_data["id"]); }
    if (!empty($body) && ($body!='0')) { $this->db->where('cat_body', $body_data["id"]); }
    if (!empty($engine) && ($engine!='0')) { $this->db->where('cat_engine', $engine_data["id"]); }
    if (!empty($condition) && ($condition!='0')) { $this->db->where('condition', $condition); }
    if (!empty($category) && ($category!='0')) { $this->db->where('category', $category); }
    if (!empty($title)) { $this->db->like('car_title', $title); }
    if (!empty($author)) { $this->db->where('post_author_id', $author); }

    // Apply the year range filter from the joined model_year_category table
    if(!empty($minyear) && !empty($maxyear)) {
        $this->db->where('model_year_category.year_slug >=', $minyear);
        $this->db->where('model_year_category.year_slug <=', $maxyear);
    }

    $this->db->where('auction_status', '0');

    // Apply price range filter
    if(!empty($minprice) && !empty($maxprice)) {
        $this->db->where('fixed_price >=', $minprice);
        $this->db->where('fixed_price <=', $maxprice);
    }
	
	if($buy_method=='auction')
	{
	$this->db->where('DATEDIFF(date_add(curdate(),interval 1 day), cars.created) BETWEEN 1 AND 14');
	}
	//$this->db->where('cars.created <=', "CURDATE() + INTERVAL 14 DAY", false);
	
    // Apply mileage range filter
    if(!empty($minmileage) && !empty($maxmileage)) {
        $this->db->where('mileage >=', $minmileage);
        $this->db->where('mileage <=', $maxmileage);
    }

    // Time left calculation and ordering
    $this->db->select('DATEDIFF(DATE_ADD(cars.created, INTERVAL 14 DAY), NOW()) AS time_left');

    // Apply ordering based on the selected option
    switch ($order_by) {
        case '6': // Highest bid
            $this->db->order_by('fixed_price', 'DESC');
            break;
		case '7': // Highest bid
            $this->db->order_by('fixed_price', 'ASC');
            break;
		case '4': // Highest bid
            $this->db->order_by('highest_bid', 'DESC');
            break;
        case '5': // Lowest bid
            $this->db->order_by('highest_bid', 'ASC');
            break;
        case '2': // Less time left
            $this->db->order_by('time_left', 'ASC');
            break;
        case '3': // Latest cars added
            $this->db->order_by('cars.created', 'DESC');
            break;
        default:
            $this->db->order_by('cars.car_title', 'DESC');
            break;
    }

    // Group by car_id to ensure that we get unique cars
    $this->db->group_by('cars.id');

    // Limit and offset for pagination
    $this->db->limit($limit, $offset);

    // Execute the query and return the results
    $query = $this->db->get();
	//print_R($query);exit;
    return $query->result();
}


//     public function search($limit, $offset) {

//       // Get search parameters from the query string
//       $brand = $this->input->get('cat_brand');
//       $model = $this->input->get('cat_model');
//       $fuel = $this->input->get('cat_fuel');
//       $mileage = $this->input->get('mileage');
//       $model_year = $this->input->get('cat_year');
//       $price_at_car = $this->input->get('price_at_car');
//       $buy_method = $this->input->get('cat_buy_method');
//       $body = $this->input->get('cat_body');
//       $engine = $this->input->get('cat_engine');
//       $condition = $this->input->get('condition');
//       $category = $this->input->get('category');
//       $minmileage = $this->input->get('min-mileage');
//       $maxmileage = $this->input->get('max-mileage');
       
//         $minprice = $this->input->get('min-price');
//         $maxprice = $this->input->get('max-price');
        
//          $minyear = $this->input->get('min-year');
//         $maxyear = $this->input->get('max-year');
      
//         $priceRange  = $this->input->get('price');
        
//          $author  = $this->input->get('author');
      

//       $title = $this->input->get('title');

//       $order_by = $this->input->get('order_by');

//     $brand_data =  $this->get_car_cat_by_slug_and_table_name($brand,'brand_slug','brand_category');
//     $model_data =  $this->get_car_cat_by_slug_and_table_name($model,'model_slug','model_category');
//     $fuel_data =  $this->get_car_cat_by_slug_and_table_name($fuel,'fuel_slug','fuel_category');
//     $model_year_data =  $this->get_car_cat_by_slug_and_table_name($model_year,'year_slug','model_year_category');
//     $buy_method_data =  $this->get_car_cat_by_slug_and_table_name($buy_method,'buy_method_slug','buy_method_category');

//     $body_data =  $this->get_car_cat_by_slug_and_table_name($body,'body_slug','body_category');

//     $engine_data =  $this->get_car_cat_by_slug_and_table_name($engine,'engine_slug','engine_category');
//     $brand_data =  $this->get_car_cat_by_slug_and_table_name($brand,'brand_slug','brand_category');

  
//       // $this->db->limit($limit, $offset);
//       // $this->db->select('*');
//       // $this->db->from('cars'); // Replace with your table name

//       // Start building the query
//     $this->db->select('cars.*, MAX(bidding.bidding_price) as highest_bid');
//     $this->db->from('cars');
//     $this->db->join('bidding', 'cars.id = bidding.car_id', 'left'); // Adjust the join condition based on your schema

  
//       // Apply filters based on provided search parameters
//       if (!empty($brand)) { $this->db->where('cat_brand', $brand_data["id"]); }
//       if (!empty($model)) { $this->db->where('cat_model', $model_data["id"]); }
//       if (!empty($fuel)) { $this->db->where('cat_fuel', $fuel_data["id"]); }
//       // if (!empty($mileage)) { $this->db->where('mileage', $mileage); }
//       if (!empty($model_year)) { $this->db->where('cat_year', $model_year_data["id"]); }
//       // if (!empty($price_at_car)) { $this->db->where('price_at_car', $price_at_car); }
//       if (!empty($buy_method)) { $this->db->where('cat_buy_method', $buy_method_data["id"]); }
//       if (!empty($body)) { $this->db->where('cat_body', $body_data["id"]); }
//       if (!empty($engine)) { $this->db->where('cat_engine', $engine_data["id"]); }
//       if (!empty($condition)) { $this->db->where('condition', $condition); }
//       if (!empty($category)) { $this->db->where('category', $category); }

//       if (!empty($title)) {  $this->db->like('car_title', $title);  }
      
//             if (!empty($author)) {  $this->db->where('post_author_id', $author);  }
      
//     //   print_r($priceRange);
//      $this->db->where('auction_status', '0' );
      
//       if(!empty($minprice) && $maxmileage!=0 ){
          
//         //   list($startPrice, $endPrice) = explode(' - ', $priceRange);
//         //       // Convert to integers (if needed)
//         //     $startPrice = (int) $startPrice;
//         //     $endPrice = (int) $endPrice;
            
//         $this->db->where('fixed_price >=', $minprice);
//         $this->db->where('fixed_price <=', $maxmileage);
//       }
      
//       if(!empty($minmileage) && $maxmileage!=0){
          
//         //   list($startmileage, $endmileage) = explode(' - ', $mileage);
//         //       // Convert to integers (if needed)
//         //     $startmileage = (int) $startmileage;
//         //     $endmileage = (int) $endmileage;
            
//         $this->db->where('mileage >=', $minmileage);
//         $this->db->where('mileage <=', $maxmileage);
//       }
      
//       if(!empty($minyear) && $maxyear!=0){
          
//         //   list($startmileage, $endmileage) = explode(' - ', $mileage);
//         //       // Convert to integers (if needed)
//         //     $startmileage = (int) $startmileage;
//         //     $endmileage = (int) $endmileage;
            
//         $this->db->where('mileage >=', $minyear);
//         $this->db->where('mileage <=', $maxyear);
//       }

//       $this->db->select('DATEDIFF(DATE_ADD(cars.created, INTERVAL 14 DAY), NOW()) AS time_left');


//   // Apply ordering based on the selected option
//   switch ($order_by) {
//     case '4': // Highest bid
//         $this->db->order_by('highest_bid', 'DESC');
//         break;
//     case '5': // Lowest bid
//         $this->db->order_by('highest_bid', 'ASC');
//         break;
//     case '2': // Less time left
//         $this->db->order_by('time_left', 'DESC');
//         break;
//     case '3': // Latest cars added (assuming you have a field for this)
//         $this->db->order_by('cars.created', 'DESC');
//         break;
//     default:
//         // Default ordering (e.g., by car title or another field)
//         $this->db->order_by('cars.car_title', 'DESC');
//         break;
// }

//   // Group by car_id to ensure that we get unique cars
//   $this->db->group_by('cars.id');

//   // Limit and offset for pagination
//   $this->db->limit($limit, $offset);
  
//       // Execute the query and return the results
//       $query = $this->db->get();
//       // echo $this->db->last_query(); 
//       return $query->result();
//   }
  
  public function get_total_search_cars_count()
  {
  // Get search parameters from the query string
    $brand = $this->input->get('cat_brand');
    $model = $this->input->get('cat_model');
    $fuel = $this->input->get('cat_fuel');
    $mileage = $this->input->get('mileage');
    $model_year = $this->input->get('cat_year');
    $price_at_car = $this->input->get('price_at_car');
    $buy_method = $this->input->get('cat_buy_method');
    $body = $this->input->get('cat_body');
    $engine = $this->input->get('cat_engine');
    $condition = $this->input->get('condition');
    $category = $this->input->get('category');
    $minmileage = $this->input->get('min-mileage');
    $maxmileage = $this->input->get('max-mileage');
    $minprice = $this->input->get('min-price');
    $maxprice = $this->input->get('max-price');
    $minyear = $this->input->get('min-year');
    $maxyear = $this->input->get('max-year');
    $priceRange  = $this->input->get('price');
    $author  = $this->input->get('author');
    $title = $this->input->get('title');
    $order_by = $this->input->get('order_by');

    $brand_data =  $this->get_car_cat_by_slug_and_table_name($brand,'brand_slug','brand_category');
    $model_data =  $this->get_car_cat_by_slug_and_table_name($model,'model_slug','model_category');
    $fuel_data =  $this->get_car_cat_by_slug_and_table_name($fuel,'fuel_slug','fuel_category');
    $buy_method_data =  $this->get_car_cat_by_slug_and_table_name($buy_method,'buy_method_slug','buy_method_category');
    $body_data =  $this->get_car_cat_by_slug_and_table_name($body,'body_slug','body_category');
    $engine_data =  $this->get_car_cat_by_slug_and_table_name($engine,'engine_slug','engine_category');

    // Start building the query
    $this->db->select('cars.*, MAX(bidding.bidding_price) as highest_bid');
    $this->db->from('cars');
    $this->db->join('bidding', 'cars.id = bidding.car_id', 'left'); // Adjust the join condition based on your schema

    // Join the model_year_category table to get the actual year value
    $this->db->join('model_year_category', 'cars.cat_year = model_year_category.id', 'left');

    // Apply filters based on provided search parameters
    if (!empty($brand) && ($brand!=0)) { $this->db->where('cat_brand', $brand_data["id"]); }
    if (!empty($model) && ($model!=0)) { $this->db->where('cat_model', $model_data["id"]); }
    if (!empty($fuel) && ($fuel!=0)) { $this->db->where('cat_fuel', $fuel_data["id"]); }
    if (!empty($buy_method) && ($buy_method!=0)) { $this->db->where('cat_buy_method', $buy_method_data["id"]); }
    if (!empty($body) && ($body!=0)) { $this->db->where('cat_body', $body_data["id"]); }
    if (!empty($engine) && ($engine!=0)) { $this->db->where('cat_engine', $engine_data["id"]); }
    if (!empty($condition) && ($condition!=0)) { $this->db->where('condition', $condition); }
    if (!empty($category) && ($category!=0)) { $this->db->where('category', $category); }
    if (!empty($title)) { $this->db->like('car_title', $title); }
    if (!empty($author)) { $this->db->where('post_author_id', $author); }

    // Apply the year range filter from the joined model_year_category table
    if(!empty($minyear) && !empty($maxyear)) {
        $this->db->where('model_year_category.year_name >=', $minyear);
        $this->db->where('model_year_category.year_name <=', $maxyear);
    }

    $this->db->where('auction_status', '0');

    // Apply price range filter
    if(!empty($minprice) && !empty($maxprice)) {
        $this->db->where('fixed_price >=', $minprice);
        $this->db->where('fixed_price <=', $maxprice);
    }

    
    // Apply mileage range filter
    if(!empty($minmileage) && !empty($maxmileage)) {
        $this->db->where('mileage >=', $minmileage);
        $this->db->where('mileage <=', $maxmileage);
    }

    // Time left calculation and ordering
    $this->db->select('DATEDIFF(DATE_ADD(cars.created, INTERVAL 14 DAY), NOW()) AS time_left');

    // Apply ordering based on the selected option
    switch ($order_by) {
        case '4': // Highest bid
            $this->db->order_by('highest_bid', 'DESC');
            break;
        case '5': // Lowest bid
            $this->db->order_by('highest_bid', 'ASC');
            break;
        case '2': // Less time left
            $this->db->order_by('time_left', 'DESC');
            break;
        case '3': // Latest cars added
            $this->db->order_by('cars.created', 'DESC');
            break;
        default:
            $this->db->order_by('cars.car_title', 'DESC');
            break;
    }

    // Group by car_id to ensure that we get unique cars
    $this->db->group_by('cars.id');

    // Limit and offset for pagination
    // $this->db->limit($limit, $offset);

    // Execute the query and return the results
     $this->db->get();
      $count = $this->db->count_all_results();
   //$count = $query->count_all_results();
    
    
      // Count rows matching the condition
    //   $this->db->from('cars'); // Use from() to specify the table for counting
    //   $count = $this->db->count_all_results();
  
      return $count;
  }
  
  
  public function get_auction_cars() {
    // Ensure $brand_id is a valid integer or sanitize it to avoid SQL injection
  
    
    // Set the condition for the query
    $this->db->where('cat_buy_method',3);
    $this->db->where('winner_id',0);
    $this->db->where('auction_status','0');
    
    // Execute the query on the 'model_category' table
    $query = $this->db->get('cars');
    
    // Return the result as an array of rows
    return $query->result();
}
  
}
?>
