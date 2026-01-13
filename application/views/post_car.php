
<?php
$footer_data = get_header_footer_by_id(1);
global $sd;
$sd=1;
// print_r($CarAPI_data);
function update_input($value) {
    // echo $value."<br />";
    if(isset($CarAPI_data[$value])) { 
        echo " value=\"".$CarAPI_data[$value]."\"";
    } else {
        echo " value=\"nothing\"";
    }
}
// echo $CarAPI_data['response'];
?>
 

<div class="product-page pt-40 mb-20">
<div class="container">
<div class="row g-xl-4 gy-5">
<div class="col-xl-12 menu_mobile_dash"><a href="#">Click Dashboard Menu</a></div>

<div class="col-xl-3">
<?php $this->load->view('sidebar'); ?>
</div>
<div class="col-xl-9">
  <!--<form name="post_car_form" id="post_car_form" action="" method="" >-->

<div class="row g-4 mb-40" >
<div class="col-lg-12">
<div class="add_new_car_head">Post New Car</div>
</div>
<div class="col-lg-6 form-inner">
    <form name="api_car_search" id="api_car_search" action="" method="post">
        <label>Search Car</lable>
        <input name="CAR_NO" id="CAR_NO" type="text" style="
                padding: 5px 12px;
                font-size: 14px;
                line-height: 20px;
                color: #24292e;
                vertical-align: middle;
                background-color: #ffffff;
                background-repeat: no-repeat;
                background-position: right 8px center;
                border: 1px solid #e1e4e8;
                border-radius: 6px;
                outline: none;
                box-shadow: rgba(225, 228, 232, 0.2) 0px 1px 0px 0px inset;
                :focus{
                    border-color: #0366d6;
                    outline: none;
                    box-shadow: rgba(3, 102, 214, 0.3) 0px 0px 0px 3px;
                }
                ">
        <button type="submit">
            <i class="fa fa-search">
            </i>
        </button>
    </form>
    
        <?php
        if(array_key_exists('brand',$CarAPI_data)) {
            echo '<p class="message_car" style="font-size: 10px; padding-top:5px;color: green">Found car info!</p>';
        }
        elseif($CarAPI_data['response'] == "not submitted") { 
            echo '<p class="message_car" style="font-size: 10px; padding-top:5px;">&nbsp;</p>';
        } elseif($CarAPI_data['response'] == "not found") {
            echo '<p class="message_car" style="font-size: 10px; padding-top:5px; color: red;">Error: No such car found!"</p>';
        }
        ?>
</div>
<form name="post_car_form" id="post_car_form" action="" method="" >
<div class="col-lg-12">
<div class="add_photo_net1">Photo Gallery</div>
<div class="add_imk_car"><input name="car_photo_gallery[]" id="car_photo_gallery" multiple type="file"></div>
<div id="car_photo_gallery_preview" style="margin-top: 20px;;">

</div>

</div>
<div class="col-lg-4 add_sty1">
<label><?php echo $footer_data["buy_method_text"]; ?> <span>*</span></label>
<select name="cat_buy_method" id="cat_buy_method" onchange="">
<option value="">Select type</option>
<?php
if(!empty($buy_method_category)){
foreach ($buy_method_category as $value4) { ?>

<option value="<?php echo $value4->id; ?>"><?php echo $value4->buy_method_name; ?></option>
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
<option value="car" <?php  if(!empty($CarAPI_data['vehicle_type']) && $CarAPI_data['vehicle_type'] == "car") { echo "selected"; } ?>>Car</option>
<option value="light_truck" <?php  if(!empty($CarAPI_data['vehicle_type']) && $CarAPI_data['vehicle_type'] == "light_truck") { echo "selected"; } ?> >Light truck</option>
</select>
</div>
<div class="col-lg-4 add_sty1">
<label>Car title <span>*</span></label>
<input name="car_title" id="car_title" type="text">
</div>
<div class="col-lg-4 add_sty1">
<label>Car sub title <span>*</span></label>
<input name="car_sub_title" id="car_sub_title" type="text">
</div>
<div class="col-lg-4 add_sty1">
<label><?php echo $footer_data["fixed_price_text"]; ?> <span id="ssd" style="display:none;">*</span></label>
<input name="fixed_price" id="fixed_price" type="text">
</div>
<div class="col-lg-4 add_sty1">
<label><?php echo $footer_data["reduce_price_text"]; ?> </label>
<input name="reduce_price" id="reduce_price" type="text">
</div>
<div class="col-lg-4 add_sty1">
<label><?php echo $footer_data["reservation_price_text"]; ?> </label>
<input name="reservation_price" id="reservation_price" type="text">
</div>
<div class="col-lg-12 add_sty2">
<div class="add_photo_net1">Car Info</div>
</div>
<div class="col-lg-3 add_sty1">
<label><?php echo $footer_data["mileage_text"]; ?> <span>*</span></label>
<input name="mileage" id="mileage" type="text" <?php if(!empty($CarAPI_data['Mätarställning'])) { echo " value=\"".$CarAPI_data['Mätarställning']."\""; } ?>>
</div>

<div class="col-lg-3 add_sty1">
<label><?php echo $footer_data["horsepower_text"]; ?> <span>*</span></label>
<input name="horsepower" id="horsepower" type="text" <? if(!empty($CarAPI_data['Motoreffekt'])) { echo " value=\"".$CarAPI_data['Motoreffekt']."\""; } ?> >
</div>

<div class="col-lg-3 add_sty1">
<label><?php echo $footer_data["brand_text"]; ?> <span>*</span></label>
<select name="cat_brand" id="cat_brand">
<option value="" >Select type</option>
<?php
if(!empty($brand_category)){
foreach ($brand_category as $value) { ?>

<option value=<?php echo "\"".$value->id."\" "; if(!empty($CarAPI_data['Fabrikat']) && strtolower($CarAPI_data['Fabrikat']) == strtolower($value->brand_name)) { echo "selected"; } ?>><?php echo $value->brand_name; ?></option>
<?php
 }
}
?>

</select>
</div>
<div class="col-lg-3 add_sty1 modelbox">
<label><?php echo $footer_data["model_text"]; ?>  <span>*</span></label>
<select name="cat_model" class="" id="cat_model">
<option value="" >Select type</option>
<?php
if(!empty($model_category)){
foreach ($model_category as $value1) { ?>

<option value=<?php echo "\"".$value1->id."\" "; if(!empty($CarAPI_data['Modell']) && strtolower($CarAPI_data['Modell']) == strtolower($value1->model_name)) { echo "selected"; } ?>><?php echo $value1->model_name; ?></option>
<?php
 }
}
?>
</select>
</div>

<div class="col-lg-3 add_sty1">
<label><?php echo $footer_data["fuel_type_text"]; ?>  <span>*</span></label>
<select name="cat_fuel" id="cat_fuel">
<option value="" >Select type</option>
<?php
if(!empty($fuel_category)){
foreach ($fuel_category as $value2) { ?>

<option value="<?php echo $value2->id."\" "; if(!empty($CarAPI_data['Drivmedel']) && strtolower($CarAPI_data['Drivmedel']) == strtolower($value2->fuel_name)) { echo "selected"; }  ?>><?php echo $value2->fuel_name; ?></option>
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

<option value="<?php echo $value3->id."\" "; if(!empty($CarAPI_data['Fordonsår']) && strtolower($CarAPI_data['Fordonsår']) == strtolower($value3->year_name)) { echo "selected"; } ?>><?php echo $value3->year_name; ?></option>
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
<option value="<?php echo $value5->id."\" "; if(!empty($CarAPI_data['Kaross']) && strtolower($CarAPI_data['Kaross']) == strtolower($value5->body_name)) { echo "selected"; } ?> ><?php echo $value5->body_name; ?></option>
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

<option value="<?php echo $value6->id."\" "; if(!empty($CarAPI_data['Växellåda']) && strtolower($CarAPI_data['Växellåda']) == strtolower($value6->engine_name)) { echo "selected"; } ?>><?php echo $value6->engine_name; ?></option>

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
<option value="Used">Used</option>
<option value="New">New</option>
</select>
</div>
<div class="col-lg-12 add_sty3">
<label id="eq_msg"><?php echo $footer_data["show_emi_price_text"]; ?> <span>*</span></label>
<div class="eq">
<label class="eq_label"> <input type="radio" name="emi_show"  value="yes"> Yes </label>
<label class="eq_label"> <input type="radio" name="emi_show" checked value="no"> No </label>

</div>
</div>
<div class="col-lg-12 add_sty3">
<?php echo $footer_data["equipment_text"]; ?>  <span></span>&nbsp;&nbsp;<label><input type="checkbox" name="selectAll" id="selectAll" /> Select All</label>
<div class="eq">

<?php
if(!empty($equipment_category)){
foreach ($equipment_category as $value7) { ?>

<label class="eq_label"><input class="eq_inpput" type="checkbox" name="cat_equipment[]" value="<?php echo $value7->id; ?>" /> <?php echo $value7->equipment_name; ?> </label>
<?php
 }
}
?>
</div>
</div>
<div id="cat_equipment_error"></div>

<div class="col-lg-12 add_sty2">
<div class="add_photo_net1"><?php echo $footer_data["car_facts_text"]; ?></div>
</div>
<div class="col-lg-3 add_sty1">
<label><?php echo $footer_data["previous_owners_text"]; ?> <span>*</span></label>
<input name="previous_owners" id="previous_owners" type="text" <?php 
if(!empty($CarAPI_data['Antal ägare '])) { 
    echo " value=\"".$CarAPI_data['Antal ägare ']."\""; 
}
if(!empty($CarAPI_data['Antal ägare i Sverige'])) { 
    echo " value=\"".$CarAPI_data['Antal ägare i Sverige']."\""; 
} 
?> >
</div>




<div class="col-lg-3 add_sty1">
<label><?php echo $footer_data["Number_of_seats"]; ?> <span>*</span></label>
<input name="number_of_seats" id="number_of_seats" type="text" <? if(!empty($CarAPI_data['Passagerare'])) { echo " value=\"".$CarAPI_data['Passagerare']."\""; } ?> >
</div>


<div class="col-lg-12 add_sty1" style="width:92% !important;">
<label><?php echo $footer_data["number_of_keys"]; ?> <span>*</span></label>
<input name="number_of_keys" id="number_of_keys" type="hidden" value="1">
 <!--<div id="tooltipValue_number_of_keys" class="tooltip-value1">1</div>-->
 <!--<input type="range" class="form-range" id="rangeSlider_number_of_keys" min="1" max="4" value="1" step="1">-->
   <input type="text" id="number_of_keys_slider" class="slider" />
</div>

<div class="col-lg-3 add_sty1">
<label><?php echo $footer_data["license_number"]; ?> <span>*</span></label>
<input name="license_number" id="license_number" type="text" <?php if(!empty($CarAPI_data['Registreringsnummer'])) { echo " value=\"".$CarAPI_data['Registreringsnummer']."\""; } ?>>
</div>

<div class="col-lg-3 add_sty1">
<!-- <label><?php #echo $footer_data["manufacture_month"]; ?> <span>*</span></label> -->
<label>Traffic Status<span>*</span></label>
<input name="manufacture_month" id="manufacture_month" type="text" <?php if(!empty($CarAPI_data['Status'])) { echo " value=\"".$CarAPI_data['Status']."\""; } ?>>
</div>

<div class="col-lg-3 add_sty1">
<label><?php echo $footer_data["odometer_reading"]; ?> <span>*</span></label>
<input type="hidden" name="odometer_reading" id="odometer_reading"  <?php if(!empty($CarAPI_data['StatusSenast besiktigad'])) { echo " value=\"".$CarAPI_data['Senast besiktigad']."\""; } ?>>

</div>

<div class="col-lg-3 add_sty1">
<label><?php echo $footer_data["color_text"]; ?> <span>*</span></label>
<!--<input name="color" id="color" type="text">-->
<select name="color" id="color">
    <option value="">Select Color</option>
    
<?php 
foreach (array('Vit','Grå','Svart','röd','Beige','Blå','Grön','Silver','Gul','Orange') as $color_elem) {
    if($CarAPI_data['Färg'] == $color_elem) {
        echo "<option value=\"".$color_elem."\" selected>".$color_elem."</option>";
    } else {
        echo "<option value=\"".$color_elem."\">".$color_elem."</option>";
    }
}
?>

    
    
</select>
</div>
<div class="col-lg-3 add_sty1">
<label><?php echo $footer_data["first_date_traffic_sweden_text"]; ?> <span>*</span></label>
<input name="first_date_traffic_sweden" id="first_date_traffic_sweden" type="text" <?php if(!empty($CarAPI_data['Trafik i Sverige'])) { echo " value=\"".$CarAPI_data['Trafik i Sverige']."\""; } ?>>
</div>

<div class="col-lg-3 add_sty1">
<label>Import <span>*</span></label>
<select name="finish" id="finish">
    <option value="">Select</option>
    <option value="Ja" <?php if(!empty($CarAPI_data['Import / Införsel']) && $CarAPI_data['Import / Införsel'] == 'Ja') { echo " selected"; } ?> >Ja</option>
    <option value="Nej" <?php if(!empty($CarAPI_data['Import / Införsel']) && $CarAPI_data['Import / Införsel'] == 'Nej') { echo " selected"; } ?>>Nej</option>
</select>
</div>
<div class="col-lg-3 add_sty1">
<label><?php echo $footer_data["service_history_text"]; ?> <span>*</span></label>
<input name="service_history" id="service_history" type="text">
</div>
<div class="col-lg-3 add_sty1">
<label><?php echo $footer_data["textile_text"]; ?> <span>*</span></label>
<!--<input name="textile" id="textile" type="text">-->

<select name="textile" id="textile">
    <option value="">Select Textile </option>
    
    <option  value="Leather">Leather</option>
    <option  value="Cotton">Cotton</option>
    <option  value="Polyester ">Polyester </option>
   
    
    
</select>
</div>
<div class="col-lg-12 add_sty2">
<div class="add_photo_net1"><?php echo $footer_data["technical_data_text"]; ?></div>
</div>
<div class="col-lg-3 add_sty1">
<label><?php echo $footer_data["chassis_number_text"]; ?> <span>*</span></label>
<input name="chassis_number_text" id="chassis_number_text" type="text" <?php if(!empty($CarAPI_data['Chassinr / VIN'])) { echo " value=\"".$CarAPI_data['Chassinr / VIN']."\""; } ?>>
</div>
<div class="col-lg-3 add_sty1">
<label><?php echo $footer_data["next_inspection_the_latest_text"]; ?><span>*</span></label>
<input name="next_inspection" id="next_inspection" type="text" <?php if(!empty($CarAPI_data['Nästa besiktning senast'])) { echo " value=\"".$CarAPI_data['Nästa besiktning senast']."\""; } ?>>
</div>
<div class="col-lg-3 add_sty1">
<label><?php echo $footer_data["engine_effect_text"]; ?> <span>*</span></label>
<input name="engine_effect" id="engine_effect" type="text" <?php if(!empty($CarAPI_data['Motorvolym'])) { echo " value=\"".$CarAPI_data['Motorvolym']."\""; } ?>>

</div>
<div class="col-lg-3 add_sty1">
<label><?php echo $footer_data["curb_weight_text"]; ?> <span>*</span></label>
<input name="curb_weight" id="curb_weight" type="text" <?php if(!empty($CarAPI_data['Tjänstevikt'])) { echo " value=\"".$CarAPI_data['Tjänstevikt']."\""; } ?>>


</div>
<div class="col-lg-3 add_sty1">
<label><?php echo $footer_data["max_payload_text"]; ?> <span>*</span></label>
<input name="max_playload" id="max_playload" type="text" <?php if(!empty($CarAPI_data['Lastvikt'])) { echo " value=\"".$CarAPI_data['Lastvikt']."\""; } ?>>

</div>
<div class="col-lg-3 add_sty1">
<label><?php echo $footer_data["tax_weight_text"]; ?> <span>*</span></label>
<input name="tax_weight" id="tax_weight" type="text" <?php if(!empty($CarAPI_data['Senast besiktigad'])) { echo " value=\"".$CarAPI_data['Senast besiktigad']."\""; } ?>>

</div>
<div class="col-lg-3 add_sty1">
<label><?php echo $footer_data["max_pull_weight_text"]; ?> <span>*</span></label>
<input name="max_pull_weight" id="max_pull_weight" type="text" <?php if(!empty($CarAPI_data['Släp totalvikt (B)'])) { echo " value=\"".$CarAPI_data['Släp totalvikt (B)']."\""; } ?>>

</div>
<div class="col-lg-3 add_sty1">
<label><?php echo $footer_data["vehicle_total_weight_text"]; ?> <span>*</span></label>
<input name="vehicle_tital_weight" id="vehicle_tital_weight" type="text" <?php if(!empty($CarAPI_data['Totalvikt'])) { echo " value=\"".$CarAPI_data['Totalvikt']."\""; } ?>>

</div>
<div class="col-lg-12 mt-0">
<div class="add_photo_net1">Remark images</div>
<div class="add_imk_car"><input name="remark_image[]" id="remark_image" multiple type="file"></div>
<div id="remark_image_preview" style="margin-top: 20px;;">

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
<textarea name="Breaks_description" id="Breaks_description" cols="" rows=""></textarea>
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
<textarea name="exterior_body_description" id="exterior_body_description" cols="" rows=""></textarea>
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
<textarea name="tires_description" id="tires_description" cols="" rows=""></textarea>
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
<textarea name="interior_body_description" id="interior_body_description" cols="" rows=""></textarea>
<input type="hidden" id="interior_body"  name="interior_body" value="1" />
</div>
</div>
<div class="col-lg-12 mt-0">
<button type="submit" class="primary-btn3">Submit Now</button>
<input type="hidden" name="remark_image_ids" id="remark_image_ids" value="">
<input type="hidden" name="car_photo_gallery_ids" id="car_photo_gallery_ids" value="">

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
                    set: [0],
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
                    set: [0],
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
                    set: [0],
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
                    set: [0],
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
                    set: [0],
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