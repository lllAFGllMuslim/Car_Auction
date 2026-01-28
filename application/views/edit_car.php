  
<?php
$footer_data = get_header_footer_by_id(1);
global $sd;
$sd=1;

$profile_data = get_profile($this->session->userdata('user_id'));

// print_r($profile_data);

?>

  <style>
        .slider-container {
            max-width: 500px;
            margin: auto auto;
            position: relative;
        }
         .tooltip-value1 {
       background-color: #0d6efd;
  color: #fff;
  padding: 1px 8px;
  font-size: 12px;
  width: 3%;
          
        }
        
    </style>

<div class="product-page pt-40 mb-20">
<div class="container">
<div class="row g-xl-4 gy-5">

<div class="col-xl-3">
<?php $this->load->view('sidebar'); ?>
</div>
<div class="col-xl-9">
  <form name="post_car_edit_form" id="post_car_edit_form" action="" method="" >

  <?php 
  
  // print_r($car);

  ?>

<?php 
                   $gallery_images = json_decode($car['car_photo_gallery_ids'], true); 

                  //  print_r(  $gallery_images);

                ?>



<div class="row g-4 mb-40">
<div class="col-lg-12">
<div class="add_new_car_head">Edit Car</div>
</div>
<div class="col-lg-12">
<div class="add_photo_net1">Photo Gallery</div>
<div class="flex items-center mt-2 mb-2">
    <svg width=25 height=25 viewBox="0 0 121.65 122.88" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g fill="currentColor">
                <path d="M1.96,0.28L1.91,0.3L1.88,0.32c-0.07,0.03-0.13,0.06-0.19,0.1L1.67,0.43L1.61,0.46L1.58,0.48C1.55,0.5,1.52,0.52,1.49,0.54 l0,0L1.45,0.57L1.44,0.57L1.41,0.59L1.38,0.61L1.34,0.64L1.29,0.68l-0.01,0C0.73,1.11,0.33,1.69,0.14,2.36 C0.03,2.7-0.01,3.07,0,3.43v2.05c0.02,2.55,2.78,4.12,4.98,2.8c0.67-0.41,1.15-1.02,1.4-1.73h3.46c2.55-0.02,4.12-2.78,2.8-4.98 C12.03,0.59,11,0.01,9.84,0H3.42C2.94-0.02,2.44,0.07,1.96,0.28L1.96,0.28z M101.11,122.86c0.09,0.02,0.19,0.02,0.29,0 c0.03-0.02,0.07-0.04,0.1-0.05l9.76-5.63c0.09-0.06,0.15-0.16,0.18-0.26c0.02-0.08,0.02-0.16-0.01-0.21l-10.7-18.65l0,0 c-0.09-0.16-0.15-0.33-0.19-0.51c-0.19-0.94,0.41-1.85,1.35-2.04l15.7-3.25c0.02-0.01,0.04-0.01,0.06-0.01 c1.35-0.28,2.5-0.76,3.26-1.36c0.37-0.29,0.62-0.59,0.72-0.87c0.06-0.18,0.03-0.39-0.09-0.63c-0.22-0.41-0.66-0.87-1.39-1.36 L66.79,51.49l4.95,64.46c0.07,0.88,0.24,1.49,0.48,1.88c0.14,0.23,0.31,0.35,0.5,0.39c0.29,0.06,0.67-0.01,1.11-0.18 c0.9-0.36,1.88-1.12,2.81-2.15l10.71-12.02l0,0c0.12-0.13,0.26-0.25,0.43-0.35c0.83-0.48,1.89-0.2,2.37,0.63l10.8,18.59 C100.97,122.8,101.03,122.84,101.11,122.86L101.11,122.86L101.11,122.86z M1.61,0.46C1.57,0.49,1.53,0.51,1.49,0.54L1.61,0.46 L1.61,0.46z M6.56,18.59c-0.02-2.55-2.78-4.12-4.98-2.8C0.59,16.4,0.01,17.43,0,18.59v6.55c0.02,2.55,2.78,4.12,4.98,2.8 c0.99-0.61,1.57-1.64,1.58-2.8V18.59L6.56,18.59z M6.56,38.26c-0.02-2.55-2.78-4.12-4.98-2.8C0.59,36.06,0.01,37.1,0,38.26v6.55 c0.02,2.55,2.78,4.12,4.98,2.8c0.99-0.61,1.57-1.64,1.58-2.8V38.26L6.56,38.26z M6.56,57.92c-0.02-2.55-2.78-4.12-4.98-2.8 c-0.99,0.61-1.57,1.64-1.58,2.8v6.56c0.02,2.55,2.78,4.12,4.98,2.8c0.99-0.61,1.57-1.64,1.58-2.8V57.92L6.56,57.92z M6.56,77.59 c-0.02-2.55-2.78-4.12-4.98-2.8c-0.99,0.61-1.57,1.64-1.58,2.8v6.55c0.02,2.55,2.78,4.12,4.98,2.8c0.99-0.61,1.57-1.64,1.58-2.8 V77.59L6.56,77.59z M6.56,97.25c-0.02-2.55-2.78-4.12-4.98-2.8c-0.99,0.61-1.57,1.64-1.58,2.8v6.56c0.02,2.55,2.78,4.12,4.98,2.8 c0.99-0.61,1.57-1.64,1.58-2.8V97.25L6.56,97.25z M13.13,103.79c-2.55,0.02-4.12,2.78-2.8,4.98c0.61,0.99,1.64,1.57,2.8,1.58h6.55 c2.55-0.02,4.12-2.78,2.8-4.98c-0.61-0.99-1.64-1.57-2.8-1.58H13.13L13.13,103.79z M32.79,103.79c-2.55,0.02-4.12,2.78-2.8,4.98 c0.61,0.99,1.64,1.57,2.8,1.58h6.56c2.55-0.02,4.12-2.78,2.8-4.98c-0.61-0.99-1.64-1.57-2.8-1.58H32.79L32.79,103.79z M52.46,103.79c-2.55,0.02-4.12,2.78-2.8,4.98c0.61,0.99,1.64,1.57,2.8,1.58h6.56c2.55-0.02,4.12-2.78,2.8-4.98 c-0.61-0.99-1.64-1.57-2.8-1.58H52.46L52.46,103.79z M103.79,63.36c0.02,2.55,2.78,4.12,4.98,2.8c0.99-0.61,1.57-1.64,1.58-2.8 v-6.56c-0.02-2.55-2.78-4.12-4.98-2.8c-0.99,0.61-1.57,1.64-1.58,2.8V63.36L103.79,63.36z M103.79,43.7 c0.02,2.55,2.78,4.12,4.98,2.8c0.99-0.61,1.57-1.64,1.58-2.8v-6.56c-0.02-2.55-2.78-4.12-4.98-2.8c-0.99,0.61-1.57,1.64-1.58,2.8 V43.7L103.79,43.7z M103.79,24.03c0.02,2.55,2.78,4.12,4.98,2.8c0.99-0.61,1.57-1.64,1.58-2.8v-6.55c-0.02-2.55-2.78-4.12-4.98-2.8 c-0.99,0.61-1.57,1.64-1.58,2.8V24.03L103.79,24.03z M104.63,6.56c0.99,1.1,2.69,1.49,4.14,0.61c0.99-0.61,1.57-1.64,1.58-2.8V3.42 c0.03-0.61-0.12-1.25-0.47-1.84c-0.61-0.99-1.64-1.57-2.8-1.58h-5.47c-2.55,0.02-4.12,2.78-2.8,4.98c0.61,0.99,1.64,1.57,2.8,1.58 H104.63L104.63,6.56z M88.5,6.56c2.55-0.02,4.12-2.78,2.8-4.98C90.69,0.59,89.66,0.01,88.5,0h-6.55c-2.55,0.02-4.12,2.78-2.8,4.98 c0.61,0.99,1.64,1.57,2.8,1.58H88.5L88.5,6.56z M68.83,6.56c2.55-0.02,4.12-2.78,2.8-4.98c-0.61-0.99-1.64-1.57-2.8-1.58h-6.56 c-2.55,0.02-4.12,2.78-2.8,4.98c0.61,0.99,1.64,1.57,2.8,1.58H68.83L68.83,6.56z M49.17,6.56c2.55-0.02,4.12-2.78,2.8-4.98 c-0.61-0.99-1.64-1.57-2.8-1.58h-6.56c-2.55,0.02-4.12,2.78-2.8,4.98c0.61,0.99,1.64,1.57,2.8,1.58H49.17L49.17,6.56z M29.5,6.56 c2.55-0.02,4.12-2.78,2.8-4.98C31.7,0.59,30.66,0.01,29.5,0h-6.55c-2.55,0.02-4.12,2.78-2.8,4.98c0.61,0.99,1.64,1.57,2.8,1.58 H29.5L29.5,6.56z"/>
            </g>
    </svg>
  <b>Dra och ändra ordning på bilbilder</b>
</div>


<div class="add_imk_car"><input name="car_photo_gallery[]" id="car_photo_gallery" multiple type="file"></div>
<div id="car_photo_gallery_preview"  data-ids="<?php echo $gallery_images; ?>" style="margin-top: 20px;;">
<?php
       // Decode as an associative array
        
   
        $gallery_images  =    json_decode( $gallery_images);
          
          if (is_array($gallery_images) && !empty($gallery_images)) {
              foreach ($gallery_images as $image) {

               
          ?>
                  <div id="img_<?php echo $image; ?>"  class="add_imk_car2" style="background-image:url(<?php if (!empty($image)) { echo get_image_path_by_id($image); } ?>);">
                      <a href="javascript:;" class="remove-image" data-id="<?php echo $image; ?>"><i class="fa fa-close"></i></a>
                  </div>
          <?php
              }
          }
               
          ?>
</div>

</div>
<div class="col-lg-4 add_sty1">
<label><?php echo $footer_data["buy_method_text"]; ?> <span>*</span></label>
<select name="cat_buy_method" id="cat_buy_method">
<option value="">Select type</option>
<?php
if(!empty($buy_method_category)){
foreach ($buy_method_category as $value4) { ?>

<option <?php if($car['cat_buy_method']==$value4->id){ echo"selected"; } ?> value="<?php echo $value4->id; ?>"><?php echo $value4->buy_method_name; ?></option>
<?php
 }
}
?>
</select>
</div>
<div class="col-lg-4 add_sty1">
<label><?php echo $footer_data["category_text"]; ?> <span>*</span></label>
<select name="category" id="category">
<option value="" >Select category</option>
<option <?php if($car['category']=='car'){ echo"selected";  } ?>  value="car">Car</option>
<option <?php if($car['category']=='light_truck'){ echo"selected";  } ?> value="light_truck">Light truck</option>
</select>
</div>
<div class="col-lg-4 add_sty1">
<label>Car title <span>*</span></label>
<input name="car_title" id="car_title" type="text" value="<?php echo $car['car_title']; ?>" >
</div>
<div class="col-lg-4 add_sty1">
<label>Car sub title <span>*</span></label>
<input name="car_sub_title" id="car_sub_title" type="text" value="<?php echo $car['car_sub_title']; ?>" >
</div>
<!-- <div class="col-lg-4 add_sty1">
<label><?php echo $footer_data["fixed_price_text"]; ?> </label>
<input name="fixed_price" id="fixed_price" type="text" value="<?php #echo $car['fixed_price']; ?>" >
</div> -->
<div class="col-lg-4 add_sty1">
<label><?php echo $footer_data["reduce_price_text"]; ?> </label>
<input name="reduce_price" id="reduce_price" type="text" value="<?php echo $car['reduce_price']; ?>" >
</div>
<div class="col-lg-4 add_sty1">
<label><?php echo $footer_data["reservation_price_text"]; ?> </label>
<input name="reservation_price" id="reservation_price" type="text" value="<?php echo $car['reservation_price']."\""; if($profile_data['role'] != "admin") { echo " disabled"; }?> >
</div>
<div class="col-lg-12 add_sty2">
<div class="add_photo_net1">Car Info</div>
</div>

<div class="col-lg-3 add_sty1">
<label><?php echo $footer_data["mileage_text"]; ?> <span>*</span></label>
<input name="mileage" id="mileage" type="text" value="<?php echo $car['mileage']; ?>" >
</div>

<div class="col-lg-3 add_sty1">
<label><?php echo $footer_data["horsepower_text"]; ?> <span>*</span></label>
<input name="horsepower" id="horsepower" type="text" value="<?php echo $car['horsepower']; ?>">
</div>

<div class="col-lg-3 add_sty1">
<label><?php echo $footer_data["brand_text"]; ?> <span>*</span></label>
<select name="cat_brand" id="cat_brand">
<option value="" >Select type</option>
<?php
if(!empty($brand_category)){
foreach ($brand_category as $value) { ?>

<option <?php if($car['cat_brand']==$value->id){ echo"selected"; } ?> value="<?php echo $value->id; ?>"><?php echo $value->brand_name; ?></option>
<?php
 }
}
?>

</select>
</div>
<div class="col-lg-3 add_sty1 modelbox">
<label><?php echo $footer_data["model_text"]; ?> <span>*</span></label>
<select name="cat_model" id="cat_model">
<option value="" >Select type</option>
<?php
if(!empty($model_category)){
foreach ($model_category as $value1) { ?>

<option <?php if($car['cat_model']==$value1->id){ echo"selected"; } ?> value="<?php echo $value1->id; ?>"><?php echo $value1->model_name; ?></option>
<?php
 }
}
?>
</select>
</div>

<div class="col-lg-3 add_sty1">
<label><?php echo $footer_data["fuel_type_text"]; ?> <span>*</span></label>
<select name="cat_fuel" id="cat_fuel">
<option value="" >Select type</option>
<?php
if(!empty($fuel_category)){
foreach ($fuel_category as $value2) { ?>

<option <?php if($car['cat_fuel']==$value2->id){ echo"selected"; } ?> value="<?php echo $value2->id; ?>"><?php echo $value2->fuel_name; ?></option>
<?php
 }
}
?>
</select>
</div>

<div class="col-lg-3 add_sty1">
<label><?php echo $footer_data["model_year_text"]; ?> <span>*</span></label>
<select name="cat_year" id="cat_year">
<option value="" >Select type</option>
<?php
if(!empty($model_year_category)){
foreach ($model_year_category as $value3) { ?>

<option <?php if($car['cat_year']==$value3->id){ echo"selected"; } ?> value="<?php echo $value3->id; ?>"><?php echo $value3->year_name; ?></option>
<?php
 }
}
?>
</select>
</div>



<div class="col-lg-3 add_sty1">
<label><?php echo $footer_data["body_text"]; ?> <span>*</span></label>
<select name="cat_body" id="cat_body">
<option value="" >Select type</option>
<?php
if(!empty($body_category)){
foreach ($body_category as $value5) { ?>

<option  <?php if($car['cat_body']==$value5->id){ echo"selected"; } ?> value="<?php echo $value5->id; ?>"><?php echo $value5->body_name; ?></option>
<?php
 }
}
?>
</select>
</div>

<div class="col-lg-3 add_sty1">
<label><?php echo $footer_data["engine_text"]; ?> <span>*</span></label>
<select name="cat_engine" id="cat_engine">
<option value="">Select type</option>
<?php
if(!empty($engine_category)){
foreach ($engine_category as $value6) { ?>

<option <?php if($car['cat_engine']==$value6->id){ echo"selected"; } ?> value="<?php echo $value6->id; ?>"><?php echo $value6->engine_name; ?></option>
<?php
 }
}
?>
</select>
</div>



<div class="col-lg-12 add_sty3">
<label id="eq_msg"><?php echo $footer_data["show_emi_price_text"]; ?> <span>*</span></label>
<div class="eq">
<label class="eq_label"> <input <?php if($car['emi_show']=='yes'){ echo"checked"; } ?> type="radio" name="emi_show"  value="yes"> Yes </label>
<label class="eq_label"> <input <?php if($car['emi_show']=='no'){ echo"checked"; } ?> type="radio" name="emi_show"  value="no"> No </label>

</div>
</div>
<div class="col-lg-12 add_sty3">
<?php echo $footer_data["equipment_text"]; ?> <span></span>&nbsp;&nbsp;<label><input type="checkbox" name="selectAll" id="selectAll" /> Select All</label>
<div class="eq">

<?php
$cat_equipment = json_decode($car['cat_equipment'], true); 

if (!empty($equipment_category)) {
    foreach ($equipment_category as $value7) { 
        // Check if the current checkbox value is in the $cat_equipment array
        $checked = in_array($value7->id, $cat_equipment) ? 'checked' : ''; 
        ?>

        <label class="eq_label">
            <input class="eq_inpput" type="checkbox" name="cat_equipment[]" value="<?php echo $value7->id; ?>" <?php echo $checked; ?> />
            <?php echo $value7->equipment_name; ?> 
        </label>

        <?php
    }
}
?>

</div>
</div>

<div class="col-lg-12 add_sty2">
<div class="add_photo_net1"></div>
</div>

<div class="col-lg-12 add_sty2">
<div class="add_photo_net1"><?php echo $footer_data["car_facts_text"]; ?></div>
</div>
<div class="col-lg-12 add_sty1">
<label><?php echo $footer_data["previous_owners_text"]; ?> <span>*</span></label>
<input name="previous_owners" id="previous_owners" type="hidden" value="<?php echo $car['previous_owners']; ?>"  >

 <!--<div id="tooltipValue2" class="tooltip-value1">1</div>-->
 <!--<input type="range" class="form-range" id="rangeSlider2" min="1" max="20" value="<?php echo $car['previous_owners']; ?>" step="1">-->
  <input type="text" id="previous_owners_slider" class="slider" />

</div>
<div class="col-lg-12 add_sty1">
<label><?php echo $footer_data["service_book_text"]; ?> <span>*</span></label>
<input name="service_book" id="service_book" type="hidden" value="<?php echo $car['service_book']; ?>" >
 <!--<div id="tooltipValue_service_book" class="tooltip-value1">1</div>-->
 <!--<input type="range" class="form-range" id="rangeSlider_service_book" min="1" max="2" value="<?php echo $car['service_book']; ?>" step="1">-->
  <input type="text" id="service_book_slider" class="slider" />
</div>

<div class="col-lg-12 add_sty1">
<label><?php echo $footer_data["gearbox_text"]; ?> <span>*</span></label>
<input name="gearbox" id="gearbox" type="hidden" value="<?php echo $car['gearbox']; ?>" >
 <!--<div id="tooltipValue_gearbox" class="tooltip-value1">1</div>-->
 <!--<input type="range" class="form-range" id="rangeSlider_gearbox" min="1" max="7" value="<?php echo $car['gearbox']; ?>" step="1">-->
   <input type="text" id="gearbox_slider" class="slider" />
</div>


<div class="col-lg-12 add_sty1">
<label><?php echo $footer_data["Number_of_seats"]; ?> <span>*</span></label>
<input name="number_of_seats" id="number_of_seats" type="hidden" value="<?php echo $car['number_of_seats']; ?>" >
 <!--<div id="tooltipValue_number_of_seats" class="tooltip-value1">1</div>-->
 <!--<input type="range" class="form-range" id="rangeSlider_number_of_seats" min="1" max="7" value="<?php echo $car['number_of_seats']; ?>" step="1">-->
   <input type="text" id="number_of_seats_slider" class="slider" />
</div>

<div class="col-lg-12 add_sty1">
<label><?php echo $footer_data["number_of_keys"]; ?> <span>*</span></label>
<input name="number_of_keys" id="number_of_keys" type="hidden" value="<?php echo $car['number_of_keys']; ?>" >
 <!--<div id="tooltipValue_number_of_keys" class="tooltip-value1">1</div>-->
 <!--<input type="range" class="form-range" id="rangeSlider_number_of_keys" min="1" max="4" value="<?php echo $car['number_of_keys']; ?>" step="1">-->
   <input type="text" id="number_of_keys_slider" class="slider" />
</div>

<div class="col-lg-3 add_sty1">
<label><?php echo $footer_data["license_number"]; ?> <span>*</span></label>
<input name="license_number" id="license_number" type="text" value="<?php echo $car['license_number']; ?>" >
</div>


<div class="col-lg-3 add_sty1">
<label><?php echo $footer_data["manufacture_month"]; ?> <span>*</span></label>
<input name="manufacture_month" id="manufacture_month" type="text" value="<?php echo $car['manufacture_month']; ?>" >
</div>

<div class="col-lg-3 add_sty1">
<label><?php echo $footer_data["odometer_reading"]; ?> <span>*</span></label>
<input name="odometer_reading" id="odometer_reading"  type="text" value="<?php echo $car['odometer_reading']; ?>"  >
</div>
<div class="col-lg-3 add_sty1">
<label><?php echo $footer_data["color_text"]; ?> <span>*</span></label>
<!--<input name="color" id="color" type="text" value="<?php echo $car['color']; ?>" >-->

<select name="color" id="color">
    <option value="">Select Color</option>
    
    <option <?php if($car['color']=='White'){ echo"selected"; } ?> value="White">White</option>
    <option <?php if($car['color']=='Gray'){ echo"selected"; } ?> value="Gray">Gray</option>
    <option <?php if($car['color']=='Black'){ echo"selected"; } ?> value="Black">Black</option>
    <option <?php if($car['color']=='Red'){ echo"selected"; } ?> value="Red">Red</option>
    <option <?php if($car['color']=='Beige'){ echo"selected"; } ?> value="Beige">Beige</option>
    <option <?php if($car['color']=='Blue'){ echo"selected"; } ?> value="Blue">Blue</option>
    <option <?php if($car['color']=='Green'){ echo"selected"; } ?> value="Green">Green</option>
    <option <?php if($car['color']=='Silver'){ echo"selected"; } ?> value="Silver">Silver</option>
    <option <?php if($car['color']=='Yellow'){ echo"selected"; } ?> value="Yellow">Yellow</option>
    <option <?php if($car['color']=='Orange'){ echo"selected"; } ?> value="Orange">Orange</option>
    
    
</select>
</div>

<div class="col-lg-3 add_sty1">
<label><?php echo $footer_data["first_date_traffic_sweden_text"]; ?> <span>*</span></label>
<input name="first_date_traffic_sweden" type="text" value="<?php echo $car['first_date_traffic_sweden']; ?>" >
</div>
<div class="col-lg-3 add_sty1">
<label><?php echo $footer_data["finish_text"]; ?> <span>*</span></label>
<input name="finish" id="finish" type="text" value="<?php echo $car['finish']; ?>" >
</div>
<div class="col-lg-3 add_sty1">
<label><?php echo $footer_data["service_history_text"]; ?> <span>*</span></label>
<select name="service_history" id="service_history">
    <option value="">Select</option>
    <option value="ja" <?php if(!empty($car['service_history']) && $car['service_history'] == 'ja') echo 'selected'; ?>>Ja</option>
    <option value="nej" <?php if(!empty($car['service_history']) && $car['service_history'] == 'nej') echo 'selected'; ?>>Nej</option>
</select>
</div>
<div class="col-lg-3 add_sty1">
<label><?php echo $footer_data["textile_text"]; ?> <span>*</span></label>
<!--<input name="textile" id="textile" type="text" value="<?php echo $car['textile']; ?>" >-->

<select name="textile" id="textile">
    <option value="">Select Textile </option>
    
    <option <?php if($car['color']=='Leather'){ echo"selected"; } ?> value="Leather">Leather</option>
    <option <?php if($car['color']=='Cotton'){ echo"selected"; } ?> value="Cotton">Cotton</option>
    <option <?php if($car['color']=='Polyester '){ echo"selected"; } ?> value="Polyester ">Polyester </option>
   
    
    
</select>
</div>
<div class="col-lg-12 add_sty2">
<div class="add_photo_net1"><?php echo $footer_data["technical_data_text"]; ?></div>
</div>
<div class="col-lg-3 add_sty1">
<label><?php echo $footer_data["chassis_number_text"]; ?> <span>*</span></label>
<input name="chassis_number" id="chassis_number" type="text" value="<?php echo $car['chassis_number']; ?>" >
</div>
<div class="col-lg-3 add_sty1">
<label><?php echo $footer_data["next_inspection_the_latest_text"]; ?><span>*</span></label>
<input name="next_inspection" id="next_inspection" type="text"  value="<?php echo $car['next_inspection']; ?>"  >
</div>
<div class="col-lg-3 add_sty1">
<label><?php echo $footer_data["engine_effect_text"]; ?> <span>*</span></label>
<input name="engine_effect" id="engine_effect" type="text" value="<?php echo $car['engine_effect']; ?>" >
</div>
<div class="col-lg-3 add_sty1">
<label><?php echo $footer_data["curb_weight_text"]; ?> <span>*</span></label>
<input name="curb_weight" id="curb_weight" type="text" value="<?php echo $car['curb_weight']; ?>" >
</div>
<div class="col-lg-3 add_sty1">
<label><?php echo $footer_data["max_payload_text"]; ?> <span>*</span></label>
<input name="max_playload" id="max_playload" type="text" value="<?php echo $car['max_playload']; ?>">
</div>
<div class="col-lg-3 add_sty1">
<label><?php echo $footer_data["tax_weight_text"]; ?> <span>*</span></label>
<input name="tax_weight" type="text"  value="<?php echo $car['tax_weight']; ?>" >
</div>
<div class="col-lg-3 add_sty1">
<label><?php echo $footer_data["max_pull_weight_text"]; ?> <span>*</span></label>
<input name="max_pull_weight" id="max_pull_weight" type="text" value="<?php echo $car['max_pull_weight']; ?>" >
</div>
<div class="col-lg-3 add_sty1">
<label><?php echo $footer_data["vehicle_total_weight_text"]; ?> <span>*</span></label>
<input name="vehicle_tital_weight" id="vehicle_tital_weight" type="text"  value="<?php echo $car['vehicle_tital_weight']; ?>" >
</div>
<?php 
                   $remark_images = json_decode($car['remark_image_ids'], true); 

                ?>
<div class="col-lg-12 mt-0">
<div class="add_photo_net1">Remark images</div>
<div class="add_imk_car"><input name="remark_image[]" id="remark_image" multiple type="file"></div>
<div id="remark_image_preview" data-ids="<?php echo $remark_images; ?>" style="margin-top: 20px;;">
<?php
       // Decode as an associative array
        
   
        $remark_images  =    json_decode( $remark_images);
          
          if (is_array($remark_images) && !empty($remark_images)) {
              foreach ($remark_images as $image) {

               
          ?>
                  <div id="img_<?php echo $image; ?>"  class="add_imk_car2" style="background-image:url(<?php if (!empty($image)) { echo get_image_path_by_id($image); } ?>);">
                      <a href="javascript:;" class="remove-image" data-id="<?php echo $image; ?>"><i class="fa fa-close"></i></a>
                  </div>
          <?php
              }
          }
               
          ?>
</div>

<div class="col-lg-12 add_sty2">
<div class="add_photo_net1"><?php echo $footer_data["remark_text"]; ?></div>
</div>
</div>
<div class="col-lg-6 add_sty1">
<label><?php echo $footer_data["breaks_text"]; ?> <span>*</span></label>
<div class="brk_wrap"><span class=" bracks_count active" data-num="1"  >1</span>
 <span class="bracks_count" data-num="2" >2</span>
  <span class="bracks_count" data-num="3" >3</span> 
  <span class="bracks_count" data-num="4" >4</span> 
  <span class="bracks_count" data-num="5" >5</span>
</div>
<div class="add_sty1 mt-3 mb-0">
<label>Description</label>
<select name="Breaks_description" id="Breaks_description" class="form-control">
  <option value="">Select Description</option>
  <option value="Excellent - Like new condition">Excellent - Like new condition</option>
  <option value="Good - Minor wear, fully functional">Good - Minor wear, fully functional</option>
  <option value="Fair - Visible wear, needs attention">Fair - Visible wear, needs attention</option>
  <option value="Poor - Requires immediate replacement">Poor - Requires immediate replacement</option>
  <option value="Recently Replaced">Recently Replaced</option>
</select>
<input type="hidden" name="bracks_count" id="bracks_count" value="1" />
</div>
</div>
<div class="col-lg-6 add_sty1">
<label><?php echo $footer_data["exterior_body_text"]; ?>  <span>*</span></label>
<div class="brk_wrap">
<span class="exterior_body active" data-num="1" >1</span> 
<span class="exterior_body" data-num="2"  >2</span> 
<span class="exterior_body" data-num="3"  >3</span> 
<span class="exterior_body" data-num="4"  >4</span> 
<span class="exterior_body" data-num="5"  >5</span>
</div>
<div class="add_sty1 mt-3 mb-0">
<label>Description</label>
<select name="exterior_body_description" id="exterior_body_description" class="form-control">
  <option value="">Select Description</option>
  <option value="Pristine - No scratches or dents">Pristine - No scratches or dents</option>
  <option value="Excellent - Minor imperfections">Excellent - Minor imperfections</option>
  <option value="Good - Few scratches and small dents">Good - Few scratches and small dents</option>
  <option value="Fair - Noticeable damage, paint issues">Fair - Noticeable damage, paint issues</option>
  <option value="Poor - Significant body damage">Poor - Significant body damage</option>
</select>
<input type="hidden" name="exterior_body" id="exterior_body" value="1" />
</div>
</div>
<div class="col-lg-6 add_sty1">
<label><?php echo $footer_data["tires_text"]; ?> <span>*</span></label>
<div class="brk_wrap">
  <span class="tires active" data-num="1">1</span> 
  <span class="tires" data-num="2">2</span>
   <span class="tires" data-num="3" >3</span> 
   <span class="tires" data-num="4" >4</span> 
   <span class="tires" data-num="5" >5</span>
  </div>
<div class="add_sty1 mt-3 mb-0">
<label>Description</label>
<select name="tires_description" id="tires_description" class="form-control">
  <option value="">Select Description</option>
  <option value="New - Full tread depth">New - Full tread depth</option>
  <option value="Excellent - 80%+ tread remaining">Excellent - 80%+ tread remaining</option>
  <option value="Good - 50-80% tread remaining">Good - 50-80% tread remaining</option>
  <option value="Fair - 30-50% tread remaining">Fair - 30-50% tread remaining</option>
  <option value="Worn - Less than 30%, replacement needed">Worn - Less than 30%, replacement needed</option>
</select>
<input type="hidden" name="tires" id="tires" value="1" />
</div>
</div>
<div class="col-lg-6 add_sty1">
<label><?php echo $footer_data["interior_body_text"]; ?> <span>*</span></label>
<div class="brk_wrap">
  <span class="interior_body active" data-num="1" >1</span> 
  <span class="interior_body" data-num="2" >2</span> 
  <span class="interior_body" data-num="3" >3</span>
   <span class="interior_body" data-num="4" >4</span> 
   <span class="interior_body" data-num="5" >5</span>
  </div>
<div class="add_sty1 mt-3 mb-0">
<label>Description</label>
<select name="interior_body_description" id="interior_body_description" class="form-control">
  <option value="">Select Description</option>
  <option value="Immaculate - Spotless condition">Immaculate - Spotless condition</option>
  <option value="Excellent - Clean, minimal wear">Excellent - Clean, minimal wear</option>
  <option value="Good - Normal wear and tear">Good - Normal wear and tear</option>
  <option value="Fair - Stains, tears, or odors present">Fair - Stains, tears, or odors present</option>
  <option value="Poor - Heavy damage, needs refurbishing">Poor - Heavy damage, needs refurbishing</option>
</select>
<input type="hidden" id="interior_body"  name="interior_body" value="1" />
</div>
</div>
<div class="col-lg-12 mt-0">
<button type="submit" class="primary-btn3">Update Now</button>
<input type="hidden" name="remark_image_ids" id="remark_image_ids" value="<?php echo $car['interior_body']; ?>">
<input type="hidden" name="car_photo_gallery_ids" id="car_photo_gallery_ids" value="<?php echo $car['interior_body']; ?>">
<input type="hidden" name="id" id="id" value="<?php echo $car["id"]; ?>" />

</div>
</div>
</form>

<p class="message"></p>
</div>
</div>
</div>
</div>

  		   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/rSlider.min.css">
		<script src="<?php echo base_url(); ?>assets/js/rSlider.min.js"></script>
    <script>
        (function () {
            'use strict';

            var init = function () {                

                var previous_owners_slider = new rSlider({
                    target: '#previous_owners_slider',
                    values: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
                    range: false,
                    set: [<?php echo $car['previous_owners']; ?>],
                    tooltip: false,
                    onChange: function (vals) {
                        console.log(vals);
                        $("#previous_owners").val(vals);
                    }
                });
                
                 var service_book_slider = new rSlider({
                    target: '#service_book_slider',
                    values: [0, 1, 2],
                    range: false,
                    set: [<?php echo $car['service_book']; ?>],
                    tooltip: false,
                    onChange: function (vals) {
                        console.log(vals);
                        $("#service_book").val(vals);
                    }
                });
                
                  var gearbox_slider = new rSlider({
                    target: '#gearbox_slider',
                    values: [1, 2, 3, 4, 5, 6, 7],
                    range: false,
                    set: [<?php echo $car['gearbox']; ?>],
                    tooltip: false,
                    onChange: function (vals) {
                        console.log(vals);
                        $("#gearbox").val(vals);
                    }
                });
                
                 var number_of_seats_slider = new rSlider({
                    target: '#number_of_seats_slider',
                    values: [1, 2, 3, 4, 5, 6, 7],
                    range: false,
                    set: [<?php echo $car['number_of_seats']; ?>],
                    tooltip: false,
                    onChange: function (vals) {
                        console.log(vals);
                        $("#number_of_seats").val(vals);
                    }
                });
                
                 var number_of_keys_slider = new rSlider({
                    target: '#number_of_keys_slider',
                    values: [1, 2, 3, 4, 5, 6, 7],
                    range: false,
                    set: [<?php echo $car['number_of_keys']; ?>],
                    tooltip: false,
                    onChange: function (vals) {
                        console.log(vals);
                        $("#number_of_keys").val(vals);
                    }
                });

              
            };
            window.onload = init;
        })();
    </script>