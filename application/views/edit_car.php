  
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
<div class="col-xl-12 menu_mobile_dash"><a href="#">Click Dashboard Menu</a></div>

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



<div class="col-lg-3 add_sty1">
<label><?php echo $footer_data["condition_text"]; ?> <span>*</span></label>
<select name="condition" id="condition">
<option value="">Select condition</option>
<option <?php if($car['condition']=='used'){ echo"selected"; } ?> value="used">Used</option>
<option <?php if($car['condition']=='new'){ echo"selected"; } ?> value="new">New</option>
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
<input name="service_history" id="service_history" type="text" value="<?php echo $car['service_history']; ?>" >
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
<div class="brk_wrap">
  <span class=" bracks_count <?php if($car['bracks_count']==1){ echo"active"; }  ?>" data-num="1"  >1</span>
 <span class="bracks_count <?php if($car['bracks_count']==2){ echo"active"; }  ?> " data-num="2" >2</span>
  <span class="bracks_count <?php if($car['bracks_count']==3){ echo"active"; }  ?> " data-num="3" >3</span> 
  <span class="bracks_count <?php if($car['bracks_count']==4){ echo"active"; }  ?>" data-num="4" >4</span> 
  <span class="bracks_count <?php if($car['bracks_count']==5){ echo"active"; }  ?> " data-num="5" >5</span>
</div>
<div class="add_sty1 mt-3 mb-0">
<label>Description</label>
<textarea name="Breaks_description" id="Breaks_description" cols="" rows=""><?php echo $car['Breaks_description']; ?></textarea>
<input type="hidden" name="bracks_count" id="bracks_count" value="<?php echo $car['bracks_count']; ?>" />
</div>
</div>
<div class="col-lg-6 add_sty1">
<label><?php echo $footer_data["exterior_body_text"]; ?> <span>*</span></label>
<div class="brk_wrap">
<span class="exterior_body <?php if($car['exterior_body']==1){ echo"active"; }  ?>" data-num="1" >1</span> 
<span class="exterior_body <?php if($car['exterior_body']==2){ echo"active"; }  ?>" data-num="2"  >2</span> 
<span class="exterior_body <?php if($car['exterior_body']==3){ echo"active"; }  ?>" data-num="3"  >3</span> 
<span class="exterior_body <?php if($car['exterior_body']==4){ echo"active"; }  ?>" data-num="4"  >4</span> 
<span class="exterior_body <?php if($car['exterior_body']==5){ echo"active"; }  ?>"  data-num="5"  >5</span>
</div>
<div class="add_sty1 mt-3 mb-0">
<label>Description</label>
<textarea name="exterior_body_description" id="exterior_body_description" cols="" rows=""><?php echo $car['exterior_body_description']; ?></textarea>
<input type="hidden" name="exterior_body" id="exterior_body" value="<?php echo $car['exterior_body']; ?>" />

</div>
</div>
<div class="col-lg-6 add_sty1">
<label><?php echo $footer_data["tires_text"]; ?> <span>*</span></label>
<div class="brk_wrap">
  <span class="tires <?php if($car['tires']==1){ echo"active"; }  ?>" data-num="1">1</span> 
  <span class="tires <?php if($car['tires']==2){ echo"active"; }  ?> " data-num="2">2</span>
   <span class="tires <?php if($car['tires']==3){ echo"active"; }  ?>" data-num="3" >3</span> 
   <span class="tires <?php if($car['tires']==4){ echo"active"; }  ?>" data-num="4" >4</span> 
   <span class="tires <?php if($car['tires']==5){ echo"active"; }  ?>" data-num="5" >5</span>
  </div>
<div class="add_sty1 mt-3 mb-0">
<label>Description</label>
<textarea name="tires_description" id="tires_description" cols="" rows=""><?php echo $car['tires_description']; ?></textarea>
<input type="hidden" name="tires" id="tires"  value="<?php echo $car['tires']; ?>" />
</div>
</div>
<div class="col-lg-6 add_sty1">
<label><?php echo $footer_data["interior_body_text"]; ?> <span>*</span></label>
<div class="brk_wrap">
  <span class="interior_body <?php if($car['interior_body']==1){ echo"active"; }  ?> " data-num="1" >1</span> 
  <span class="interior_body <?php if($car['interior_body']==2){ echo"active"; }  ?>" data-num="2" >2</span> 
  <span class="interior_body <?php if($car['interior_body']==3){ echo"active"; }  ?>" data-num="3" >3</span>
   <span class="interior_body <?php if($car['interior_body']==4){ echo"active"; }  ?>" data-num="4" >4</span> 
   <span class="interior_body <?php if($car['interior_body']==5){ echo"active"; }  ?>" data-num="5" >5</span>
  </div>
<div class="add_sty1 mt-3 mb-0">
<label>Description</label>
<textarea name="interior_body_description" id="interior_body_description" cols="" rows=""><?php echo $car['interior_body_description']; ?></textarea>
<input type="hidden" id="interior_body"  name="interior_body" value="<?php echo $car['interior_body']; ?>" />
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