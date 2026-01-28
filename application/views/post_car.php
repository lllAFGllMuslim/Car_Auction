
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
        <label style="display: block; margin-bottom: 10px; font-weight: 600; color: #24292e;">Search Car</label>
        
        <div style="display: flex; align-items: center; gap: 10px;">
            <!-- License Plate Style Input -->
            <div style="
                position: relative;
                display: inline-block;
                background: linear-gradient(to bottom, #ffffff 0%, #f5f5f5 100%);
                border: 3px solid #333;
                border-radius: 8px;
                padding: 12px 20px;
                box-shadow: 
                    0 3px 8px rgba(0,0,0,0.3),
                    inset 0 1px 0 rgba(255,255,255,0.8),
                    inset 0 -1px 0 rgba(0,0,0,0.2);
            ">
                <!-- EU Strip (optional - remove if not needed) -->
                <div style="
                    position: absolute;
                    left: 0;
                    top: 0;
                    bottom: 0;
                    width: 35px;
                    background: #003399;
                    border-radius: 5px 0 0 5px;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                    padding: 5px 0;
                ">
                    <span style="color: #ffcc00; font-size: 10px; font-weight: bold;">★★★</span>
                    <span style="color: #fff; font-size: 9px; font-weight: bold; margin-top: 2px;">SWD</span>
                </div>
                
                <input 
                    name="CAR_NO" 
                    id="CAR_NO" 
                    type="text" 
                    placeholder="AB 12 CD 3456"
                    style="
                        width: 220px;
                        padding: 8px 12px 8px 45px;
                        font-size: 24px;
                        font-weight: bold;
                        font-family: 'Courier New', monospace;
                        letter-spacing: 3px;
                        text-transform: uppercase;
                        color: #000;
                        background: transparent;
                        border: none;
                        outline: none;
                        text-align: center;
                    ">
            </div>
            
            <button type="submit" style="
                padding: 12px 20px;
                background: #0366d6;
                color: white;
                border: none;
                border-radius: 6px;
                cursor: pointer;
                transition: background 0.3s;
                font-size: 16px;
                box-shadow: 0 2px 4px rgba(0,0,0,0.2);
            " onmouseover="this.style.background='#0256c4'" onmouseout="this.style.background='#0366d6'">
                <i class="fa fa-search"></i> Search
            </button>
        </div>
    </form>
    
    <?php
    if(array_key_exists('brand',$CarAPI_data)) {
        echo '<p class="message_car" style="font-size: 10px; padding-top:5px;color: green">Found car info!</p>';
    }
    elseif($CarAPI_data['response'] == "not submitted") { 
        echo '<p class="message_car" style="font-size: 10px; padding-top:5px;">&nbsp;</p>';
    } elseif($CarAPI_data['response'] == "not found") {
        echo '<p class="message_car" style="font-size: 10px; padding-top:5px; color: red;">Error: No such car found!</p>';
    }
    ?>
</div>
<form name="post_car_form" id="post_car_form" action="" method="" >
    
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
<select name="service_history" id="service_history">
    <option value="">Select</option>
    <option value="ja" <?php if(isset($car['service_history']) && $car['service_history'] == 'ja') echo 'selected'; ?>>Ja</option>
    <option value="nej" <?php if(isset($car['service_history']) && $car['service_history'] == 'ney') echo 'selected'; ?>>Nej</option>
</select>
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
                
                //  var service_book_slider = new rSlider({
                //     target: '#service_book_slider',
                //     values: [0, 1, 2],
                //     range: false,
                //     set: [0],
                //     tooltip: false,
                //     onChange: function (vals) {
                //         console.log(vals);
                //         $("#service_book").val(vals);
                //     }
                // });
                
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