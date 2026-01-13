<?php 
// application/helpers/image_helper.php

if (!function_exists('get_image_path_by_id')) {
  function get_image_path_by_id($id) {
      // Get the CodeIgniter instance
      $CI =& get_instance();

      // Load the model
      $CI->load->model('Image_model');

      // Fetch the image path from the model
      return $CI->Image_model->get_image_path($id);
  }
}



if (!function_exists('get_header_footer_by_id')) {
  function get_header_footer_by_id($id) {
      // Get the CodeIgniter instance
      $CI =& get_instance();

      // Load the model
      $CI->load->model('Image_model');

      // Fetch the image path from the model
      return $CI->Image_model->get_header_footer($id);
  }
}


if (!function_exists('get_home_page_by_id')) {
  function get_home_page_by_id($id) {
      // Get the CodeIgniter instance
      $CI =& get_instance();

      // Load the model
      $CI->load->model('Image_model');

      // Fetch the image path from the model
      return $CI->Image_model->get_home_page($id);
  }
}

if (!function_exists('get_latest_three_blogs')) {
  function get_latest_three_blogs() {
      // Get the CodeIgniter instance
      $CI =& get_instance();

      // Load the model
      $CI->load->model('Image_model');

      // Fetch the image path from the model
      return $CI->Image_model->get_latest_three_blogs();
  }
}

if (!function_exists('get_category_by_id')) {
  function get_category_by_id($id) {
      // Get the CodeIgniter instance
      $CI =& get_instance();

      // Load the model
      $CI->load->model('Image_model');

      // Fetch the image path from the model
      return $CI->Image_model->get_category_by_id($id);
  }
}


if (!function_exists('get_about_page_by_id')) {
  function get_about_page_by_id($id) {
      // Get the CodeIgniter instance
      $CI =& get_instance();

      // Load the model
      $CI->load->model('Image_model');

      // Fetch the image path from the model
      return $CI->Image_model->get_about_page($id);
  }
}


if (!function_exists('get_contact_page_by_id')) {
  function get_contact_page_by_id($id) {
      // Get the CodeIgniter instance
      $CI =& get_instance();

      // Load the model
      $CI->load->model('Image_model');

      // Fetch the image path from the model
      return $CI->Image_model->get_contact_page($id);
  }
}

if (!function_exists('get_faq_page_by_id')) {
  function get_faq_page_by_id($id) {
      // Get the CodeIgniter instance
      $CI =& get_instance();

      // Load the model
      $CI->load->model('Image_model');

      // Fetch the image path from the model
      return $CI->Image_model->get_faq_page($id);
  }

}
  if (!function_exists('get_faqs')) {
    function get_faqs() {
        // Get the CodeIgniter instance
        $CI =& get_instance();
  
        // Load the model
        $CI->load->model('Image_model');
  
        // Fetch the image path from the model
        return $CI->Image_model->get_faqs();
    }
    
}

if (!function_exists('get_revews')) {
  function get_revews() {
      // Get the CodeIgniter instance
      $CI =& get_instance();

      // Load the model
      $CI->load->model('Image_model');

      // Fetch the image path from the model
      return $CI->Image_model->get_revews();
  }
  
}

if (!function_exists('get_blog_page_by_id')) {
  function get_blog_page_by_id($id) {
      // Get the CodeIgniter instance
      $CI =& get_instance();

      // Load the model
      $CI->load->model('Image_model');

      // Fetch the image path from the model
      return $CI->Image_model->get_blog_page($id);
  }
}

if (!function_exists('get_categories')) {
  function get_categories() {
      // Get the CodeIgniter instance
      $CI =& get_instance();

      // Load the model
      $CI->load->model('Image_model');

      // Fetch the image path from the model
      return $CI->Image_model->get_categories();
  }
  
}

if (!function_exists('get_id_by_slug')) {
  function get_id_by_slug($slug) {
      // Get the CodeIgniter instance
      $CI =& get_instance();

      // Load the model
      $CI->load->model('Image_model');

      // Fetch the image path from the model
      return $CI->Image_model->get_id_by_slug($slug);
  }
}

  if (!function_exists('get_profile')) {
    function get_profile($id) {
        // Get the CodeIgniter instance
        $CI =& get_instance();
  
        // Load the model
        $CI->load->model('Image_model');
  
        // Fetch the image path from the model
        return $CI->Image_model->get_profile($id);
    }
  
}


if (!function_exists('get_car_cat_by_id_and_table_name')) {
  function get_car_cat_by_id_and_table_name($id,$table_name) {
      // Get the CodeIgniter instance
      $CI =& get_instance();

      // Load the model
      $CI->load->model('Image_model');

      // Fetch the image path from the model
      return $CI->Image_model->get_car_cat_by_id_and_table_name($id,$table_name);
  }

}


if (!function_exists('is_already_favourite')) {
  function is_already_favourite($carid,$user_id) {
      // Get the CodeIgniter instance
      $CI =& get_instance();

      // Load the model
      $CI->load->model('User_model');

      // Fetch the image path from the model
      return $CI->User_model->is_already_favourite($carid,$user_id);
  }

}

if (!function_exists('get_post_status')) {
  function get_post_status($post_id) {
      $CI =& get_instance();
      $CI->load->model('Image_model');

      // Fetch post data
      $post = $CI->Image_model->get_post($post_id);

      if (!$post) return null;


      // Calculate expiration time
      $created_at = new DateTime($post->created);

  

      $expiration_time = $created_at->add(new DateInterval('P14D')); // 14 days expiration

      $current_time = new DateTime();
      $interval = $current_time->diff($expiration_time);

      $days = $interval->days;
      $hours = $interval->h;
      $minutes = $interval->i;
      $seconds = $interval->s;

      // Determine status
      if ($current_time > $expiration_time) {
        return 'Auction Time Completed';
    } elseif ($days >= 7) {
        return $days . ' Dagar Kvar';
    } elseif ($days >= 1) {
        return '1 Dag Kvar';
    } else {
        return  'timer'; // sprintf('%dH %dM %dS Left', $hours, $minutes, $seconds);
    }
  }
}


if (!function_exists('get_post_expiration_timestamp')) {
  function get_post_expiration_timestamp($post_id) {
      $CI =& get_instance();
      $CI->load->model('Image_model');

      // Fetch post data
      $post = $CI->Image_model->get_post($post_id);

      if (!$post) return null;


           // Calculate expiration timestamp
           $created_at = new DateTime($post->created);
           $expiration_time = $created_at->add(new DateInterval('P14D')); // 14 days expiration
          $expiration_timestamp= $expiration_time->getTimestamp();

          return $expiration_timestamp * 1000;
  }

}


if (!function_exists('get_car_by_id')) {
  function get_car_by_id($id) {
      // Get the CodeIgniter instance
      $CI =& get_instance();

      // Load the model
      $CI->load->model('Image_model');

      // Fetch the image path from the model
      return $CI->Image_model->get_car_by_id($id);
  }

}



if (!function_exists('get_privacy_policy_by_id')) {
  function get_privacy_policy_by_id($id) {
      // Get the CodeIgniter instance
      $CI =& get_instance();

      // Load the model
      $CI->load->model('Image_model');

      // Fetch the image path from the model
      return $CI->Image_model->get_privacy_policy_page($id);
  }
}


if (!function_exists('get_terms_and_conditions_by_id')) {
  function get_terms_and_conditions_by_id($id) {
      // Get the CodeIgniter instance
      $CI =& get_instance();

      // Load the model
      $CI->load->model('Image_model');

      // Fetch the image path from the model
      return $CI->Image_model->get_terms_and_conditions_page($id);
  }
}

if (!function_exists('get_car_by_brand_id')) {
  function get_car_by_brand_id($id) {
      // Get the CodeIgniter instance
      $CI =& get_instance();

      // Load the model
      $CI->load->model('Image_model');

      // Fetch the image path from the model
      return $CI->Image_model->get_car_by_brand_id($id);
  }

}


if (!function_exists('get_bid_by_id')) {
  function get_bid_by_id($id) {
      // Get the CodeIgniter instance
      $CI =& get_instance();

      // Load the model
      $CI->load->model('Image_model');

      // Fetch the image path from the model
      return $CI->Image_model->get_bid_by_id($id);
  }

}

if (!function_exists('get_bids_by_carid_user_id')) {
  function get_bids_by_carid_user_id($id,$user_id) {
      // Get the CodeIgniter instance
      $CI =& get_instance();

      // Load the model
      $CI->load->model('Image_model');

      // Fetch the image path from the model
      return $CI->Image_model->get_bids_by_carid_user_id($id,$user_id);
  }

}

if (!function_exists('get_bid_by_primary_id')) {
  function get_bid_by_primary_id($id) {
      // Get the CodeIgniter instance
      $CI =& get_instance();

      // Load the model
      $CI->load->model('Image_model');

      // Fetch the image path from the model
      return $CI->Image_model->get_bid_by_primary_id($id);
  }

}


if (!function_exists('format_date')) {
  /**
   * Format the given date to "Auto bid, Today at HH:MM AM/PM"
   *
   * @param string $date The date to format
   * @return string Formatted date string
   */
  function format_date($date) {
      $now = new DateTime();
      $givenDate = new DateTime($date);
      
      // Check if the given date is today
      if ($givenDate->format('Y-m-d') == $now->format('Y-m-d')) {
          // Format for today
          return 'Auto bid, Today at ' . $givenDate->format('g:i A');
      } else {
          // Format for other dates
          return 'Auto bid, ' . $givenDate->format('m/d/Y \a\t g:i A');
      }
  }
}





if (!function_exists('get_car_by_id_my_bid')) {
  function get_car_by_id_my_bid($id) {
      // Get the CodeIgniter instance
      $CI =& get_instance();

      // Load the model
      $CI->load->model('Image_model');

      // Fetch the image path from the model
      return $CI->Image_model->get_car_by_id_my_bid($id);
  }

}


if (!function_exists('get_brand_by_id')) {
  function get_brand_by_id($id) {
      // Get the CodeIgniter instance
      $CI =& get_instance();

      // Load the model
      $CI->load->model('Image_model');

      // Fetch the image path from the model
      return $CI->Image_model->get_brand_by_id($id);
  }

}


if (!function_exists('calculate_emi')) {
    /**
     * Calculate EMI for a given principal, interest rate, and tenure.
     *
     * @param float $principal Principal loan amount
     * @param float $annual_rate Annual interest rate (in percentage)
     * @param int $months Number of monthly installments (tenure in months)
     * @return float EMI amount
     */
    function calculate_emi($principal, $annual_rate, $months) {
        // Convert annual rate to monthly rate
        $monthly_rate = ($annual_rate / 100) / 12;
        
        // Calculate EMI
        if ($monthly_rate == 0) {
            return $principal / $months;
        } else {
            $emi = ($principal * $monthly_rate * pow(1 + $monthly_rate, $months)) /
                   (pow(1 + $monthly_rate, $months) - 1);
            return round($emi, 2); // Round to 2 decimal places
        }
    }
}


if (!function_exists('monthlyEMI')) {
  function monthlyEMI($car_id) {
      // Get the CodeIgniter instance
      $CI =& get_instance();

      // Load the model
      $CI->load->model('User_model');

      // Fetch the highest bid and car data from the model
      $highest_bid = $CI->User_model->get_highest_bid($car_id); 
      $cardata = $CI->User_model->get_car_by_id($car_id); 

      // Determine the principal and calculate EMI
      if ($cardata["cat_buy_method"] == 3) {
          if (!empty($highest_bid)) {
              $principal = $highest_bid;
          } else {
            //   $principal = $cardata["fixed_price"];
              $fixed_price = $cardata["fixed_price"]; // Example principal amount
          $reduce_price = $cardata["reduce_price"];
          
          if(!empty($reduce_price)){
             $principal = $reduce_price;
          }else{
             $principal = $fixed_price;
          }
          }
      } else {
          $fixed_price = $cardata["fixed_price"]; // Example principal amount
          $reduce_price = $cardata["reduce_price"];
          
          if(!empty($reduce_price)){
             $principal = $reduce_price;
          }else{
             $principal = $fixed_price;
          }
      }

      $annual_rate = 12; // Annual interest rate in percentage
      $months = 48; // Number of monthly installments
      
      // Calculate EMI
      $emi = calculate_emi($principal, $annual_rate, $months);
      
      // Output EMI
      echo number_format($emi) . ' ' . $CI->config->item('CURRENCY') . '/Månad';
  }
}


 
 
 
if (!function_exists('total_cars')) {
  function total_cars() {
      // Get the CodeIgniter instance
      $CI =& get_instance();

      // Load the model
      $CI->load->model('Image_model');

        return $CI->Image_model->get_total_cars_count();
  }
  
  
  if (!function_exists('get_car_by_data')) {
  function get_car_by_data($name,$value) {
      // Get the CodeIgniter instance
      $CI =& get_instance();

      // Load the model
      $CI->load->model('Image_model');

      // Fetch the image path from the model
      return $CI->Image_model->get_car_by_data($name,$value);
  }

}

 if (!function_exists('get_compllete_car_auction_by_id')) {
  function get_compllete_car_auction_by_id($userid) {
      // Get the CodeIgniter instance
      $CI =& get_instance();

      // Load the model
      $CI->load->model('Image_model');

      // Fetch the image path from the model
      return $CI->Image_model->get_compllete_car_auction_by_id($userid);
  }

}


 if (!function_exists('get_win_car_auction_by_id')) {
  function get_win_car_auction_by_id($userid) {
      // Get the CodeIgniter instance
      $CI =& get_instance();

      // Load the model
      $CI->load->model('Image_model');

      // Fetch the image path from the model
      return $CI->Image_model->get_win_car_auction_by_id($userid);
  }

}

 if (!function_exists('get_bid_by_userid')) {
  function get_bid_by_userid($userid) {
      // Get the CodeIgniter instance
      $CI =& get_instance();

      // Load the model
      $CI->load->model('Image_model');

      // Fetch the image path from the model
      return $CI->Image_model->get_bid_by_userid($userid);
  }

}

 if (!function_exists('get_bid_by_userid_distin')) {
  function get_bid_by_userid_distin($userid) {
      // Get the CodeIgniter instance
      $CI =& get_instance();

      // Load the model
      $CI->load->model('Image_model');

      // Fetch the image path from the model
      return $CI->Image_model->get_bid_by_userid_distin($userid);
  }

}

}
