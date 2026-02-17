<?php
class Search_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_car_cat_by_slug_and_table_name($slug, $sulg_name, $table_name) {
        $this->db->from($table_name); 
        $this->db->where($sulg_name, $slug);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null;
        }
    }

    // ✅ NEW: Get only cities that have dealers
    public function get_available_cities() {
        $this->db->select('city');
        $this->db->from('users');
        $this->db->where('role', 'dealer');
        $this->db->where('city !=', '');
        $this->db->where('city IS NOT NULL', null, false);
        $this->db->group_by('city');
        $this->db->order_by('city', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function search($limit, $offset) {

        $brand       = $this->input->get('cat_brand');
        $model       = $this->input->get('cat_model');
        $fuel        = $this->input->get('cat_fuel');
        $mileage     = $this->input->get('mileage');
        $model_year  = $this->input->get('cat_year');
        $price_at_car = $this->input->get('price_at_car');
        $buy_method  = $this->input->get('cat_buy_method');
        $body        = $this->input->get('cat_body');
        $engine      = $this->input->get('cat_engine');
        $condition   = $this->input->get('condition');
        $category    = $this->input->get('category');
        $minmileage  = $this->input->get('min-mileage');
        $maxmileage  = $this->input->get('max-mileage');
        $minprice    = $this->input->get('min-price');
        $maxprice    = $this->input->get('max-price');
        $minyear     = $this->input->get('min-year');
        $maxyear     = $this->input->get('max-year');
        $priceRange  = $this->input->get('price');
        $author      = $this->input->get('author');
        $title       = $this->input->get('title');
        $order_by    = $this->input->get('order_by');
        $city        = $this->input->get('city'); // ✅ NEW

        $brand_data      = $this->get_car_cat_by_slug_and_table_name($brand, 'brand_slug', 'brand_category');
        $model_data      = $this->get_car_cat_by_slug_and_table_name($model, 'model_slug', 'model_category');
        $fuel_data       = $this->get_car_cat_by_slug_and_table_name($fuel, 'fuel_slug', 'fuel_category');
        $buy_method_data = $this->get_car_cat_by_slug_and_table_name($buy_method, 'buy_method_slug', 'buy_method_category');
        $body_data       = $this->get_car_cat_by_slug_and_table_name($body, 'body_slug', 'body_category');
        $engine_data     = $this->get_car_cat_by_slug_and_table_name($engine, 'engine_slug', 'engine_category');

        $this->db->select('cars.*, MAX(bidding.bidding_price) as highest_bid, COUNT(DISTINCT bidding.user_id) as total_bidders, users.city');
        $this->db->from('cars');
        $this->db->join('bidding', 'cars.id = bidding.car_id', 'left');
        $this->db->join('users', 'cars.post_author_id = users.id', 'left');
        $this->db->join('model_year_category', 'cars.cat_year = model_year_category.id', 'left');

        if (!empty($brand)      && $brand      != '0') { $this->db->where('cat_brand',      $brand_data["id"]); }
        if (!empty($model)      && $model      != '0') { $this->db->where('cat_model',      $model_data["id"]); }
        if (!empty($fuel)       && $fuel       != '0') { $this->db->where('cat_fuel',       $fuel_data["id"]); }
        if (!empty($buy_method) && $buy_method != '0') { $this->db->where('cat_buy_method', $buy_method_data["id"]); }
        if (!empty($body)       && $body       != '0') { $this->db->where('cat_body',       $body_data["id"]); }
        if (!empty($engine)     && $engine     != '0') { $this->db->where('cat_engine',     $engine_data["id"]); }
        if (!empty($condition)  && $condition  != '0') { $this->db->where('condition',      $condition); }
        if (!empty($category)   && $category   != '0') { $this->db->where('category',       $category); }
        if (!empty($title))  { $this->db->like('car_title', $title); }
        if (!empty($author)) { $this->db->where('post_author_id', $author); }

        // ✅ NEW: City filter
        if (!empty($city) && $city != '0') {
            $this->db->where('LOWER(users.city)', strtolower($city));
        }

        if (!empty($minyear) && !empty($maxyear)) {
            $this->db->where('model_year_category.year_slug >=', $minyear);
            $this->db->where('model_year_category.year_slug <=', $maxyear);
        }

        $this->db->where('auction_status', '0');

        if (!empty($minprice) && !empty($maxprice)) {
            $this->db->where('fixed_price >=', $minprice);
            $this->db->where('fixed_price <=', $maxprice);
        }

        if ($buy_method == 'auction') {
            $this->db->where('DATEDIFF(date_add(curdate(),interval 1 day), cars.created) BETWEEN 1 AND 14');
        }

        if (!empty($minmileage) && !empty($maxmileage)) {
            $this->db->where('mileage >=', $minmileage);
            $this->db->where('mileage <=', $maxmileage);
        }

        $this->db->select('DATEDIFF(DATE_ADD(cars.created, INTERVAL 14 DAY), NOW()) AS time_left');

        switch ($order_by) {
            case '6': $this->db->order_by('fixed_price', 'DESC'); break;
            case '7': $this->db->order_by('fixed_price', 'ASC');  break;
            case '4': $this->db->order_by('highest_bid', 'DESC'); break;
            case '5': $this->db->order_by('highest_bid', 'ASC');  break;
            case '2': $this->db->order_by('time_left', 'ASC');    break;
            case '3': $this->db->order_by('cars.created', 'DESC'); break;
            default:  $this->db->order_by('cars.car_title', 'DESC'); break;
        }

        $this->db->group_by('cars.id');
        $this->db->limit($limit, $offset);

        $query = $this->db->get();
        return $query->result();
    }

    public function get_total_search_cars_count() {

        $brand       = $this->input->get('cat_brand');
        $model       = $this->input->get('cat_model');
        $fuel        = $this->input->get('cat_fuel');
        $buy_method  = $this->input->get('cat_buy_method');
        $body        = $this->input->get('cat_body');
        $engine      = $this->input->get('cat_engine');
        $condition   = $this->input->get('condition');
        $category    = $this->input->get('category');
        $minmileage  = $this->input->get('min-mileage');
        $maxmileage  = $this->input->get('max-mileage');
        $minprice    = $this->input->get('min-price');
        $maxprice    = $this->input->get('max-price');
        $minyear     = $this->input->get('min-year');
        $maxyear     = $this->input->get('max-year');
        $author      = $this->input->get('author');
        $title       = $this->input->get('title');
        $order_by    = $this->input->get('order_by');
        $city        = $this->input->get('city'); // ✅ NEW

        $brand_data      = $this->get_car_cat_by_slug_and_table_name($brand, 'brand_slug', 'brand_category');
        $model_data      = $this->get_car_cat_by_slug_and_table_name($model, 'model_slug', 'model_category');
        $fuel_data       = $this->get_car_cat_by_slug_and_table_name($fuel, 'fuel_slug', 'fuel_category');
        $buy_method_data = $this->get_car_cat_by_slug_and_table_name($buy_method, 'buy_method_slug', 'buy_method_category');
        $body_data       = $this->get_car_cat_by_slug_and_table_name($body, 'body_slug', 'body_category');
        $engine_data     = $this->get_car_cat_by_slug_and_table_name($engine, 'engine_slug', 'engine_category');

        $this->db->select('cars.*, MAX(bidding.bidding_price) as highest_bid, COUNT(DISTINCT bidding.user_id) as total_bidders');
        $this->db->from('cars');
        $this->db->join('bidding', 'cars.id = bidding.car_id', 'left');
        $this->db->join('users', 'cars.post_author_id = users.id', 'left'); // ✅ needed for city filter
        $this->db->join('model_year_category', 'cars.cat_year = model_year_category.id', 'left');

        if (!empty($brand)      && $brand      != '0') { $this->db->where('cat_brand',      $brand_data["id"]); }
        if (!empty($model)      && $model      != '0') { $this->db->where('cat_model',      $model_data["id"]); }
        if (!empty($fuel)       && $fuel       != '0') { $this->db->where('cat_fuel',       $fuel_data["id"]); }
        if (!empty($buy_method) && $buy_method != '0') { $this->db->where('cat_buy_method', $buy_method_data["id"]); }
        if (!empty($body)       && $body       != '0') { $this->db->where('cat_body',       $body_data["id"]); }
        if (!empty($engine)     && $engine     != '0') { $this->db->where('cat_engine',     $engine_data["id"]); }
        if (!empty($condition)  && $condition  != '0') { $this->db->where('condition',      $condition); }
        if (!empty($category)   && $category   != '0') { $this->db->where('category',       $category); }
        if (!empty($title))  { $this->db->like('car_title', $title); }
        if (!empty($author)) { $this->db->where('post_author_id', $author); }

        // ✅ NEW: City filter
        if (!empty($city) && $city != '0') {
            $this->db->where('LOWER(users.city)', strtolower($city));
        }

        if (!empty($minyear) && !empty($maxyear)) {
            $this->db->where('model_year_category.year_name >=', $minyear);
            $this->db->where('model_year_category.year_name <=', $maxyear);
        }

        $this->db->where('auction_status', '0');

        if (!empty($minprice) && !empty($maxprice)) {
            $this->db->where('fixed_price >=', $minprice);
            $this->db->where('fixed_price <=', $maxprice);
        }

        if (!empty($minmileage) && !empty($maxmileage)) {
            $this->db->where('mileage >=', $minmileage);
            $this->db->where('mileage <=', $maxmileage);
        }

        $this->db->select('DATEDIFF(DATE_ADD(cars.created, INTERVAL 14 DAY), NOW()) AS time_left');
        $this->db->group_by('cars.id');
        $this->db->get();

        return $this->db->count_all_results();
    }

    public function get_auction_cars() {
        $this->db->where('cat_buy_method', 3);
        $this->db->where('winner_id', 0);
        $this->db->where('auction_status', '0');
        $query = $this->db->get('cars');
        return $query->result();
    }
}
?>