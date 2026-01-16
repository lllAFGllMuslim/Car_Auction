<div class="product-page pt-40 mb-20">
<div class="container">
<div class="row g-xl-4 gy-5">

<div class="col-xl-3">
<?php $this->load->view('admin/admin_sidebar'); ?>
</div>
<div class="col-xl-9">

<?php 

// print_r($header_footer);

?>

<form id="headefooter" >

<div class="row g-4 mb-20">
<div class="col-lg-12">
<div class="add_new_car_head" style="padding-top:6px;">Edit Header</div>
</div>
<div class="col-lg-5">
<div class="add_photo_net1">Logo</div>
<div class="add_imk_car_foot"><input name="logo" id="logo" type="file"></div>
<div class="add_imk_car_foot2" <?php if(empty($header_footer['logo_id'])){ ?> style="display: none;" <?php } ?> id="logo_preview" style="background-image:url(<?php if(!empty($header_footer['logo_id'])){echo get_image_path_by_id($header_footer['logo_id']);  } ?>);">
  <a id="remove_logo" href="javascript:;"><i class="fa fa-close"></i></a></div>
</div>
<div class="col-lg-5">
<div class="add_photo_net1">Favicon</div>
<div class="add_imk_car_foot"><input name="favicon" id="favicon" type="file"></div>
<div class="add_imk_car_foot2" <?php if(empty($header_footer['favicon_id'])){ ?> style="display: none;" <?php } ?> id="favicon_preview" style="background-image:url(<?php if(!empty($header_footer['favicon_id'])){echo get_image_path_by_id($header_footer['favicon_id']);  } ?>);">
  <a id="remove_favicon" href="javascript:;"><i class="fa fa-close"></i></a></div>
</div>
<div class="col-lg-12 add_sty1">
<label>Title</label>
<input name="site_title" id="site_title" value="<?php echo $header_footer["site_title"]; ?>" type="text">
</div>

<div class="col-lg-12 mt-0">
<div class="add_photo_net1">Menu</div>
</div>

<div class="col-lg-4 add_sty1">
<input name="manu_name1" id="manu_name1" value="<?php echo $header_footer["manu_name1"]; ?>" type="text">
</div>

<div class="col-lg-4 add_sty1">
<input name="manu_name2" id="manu_name2" value="<?php echo $header_footer["manu_name2"]; ?>" type="text">
</div>

<div class="col-lg-4 add_sty1">
<input name="manu_name3" id="manu_name3" value="<?php echo $header_footer["manu_name3"]; ?>" type="text">
</div>

<div class="col-lg-4 add_sty1">
<input name="manu_name4" id="manu_name4" value="<?php echo $header_footer["manu_name4"]; ?>" type="text">
</div>

<div class="col-lg-4 add_sty1">
<input name="manu_name5" id="manu_name5" value="<?php echo $header_footer["manu_name5"]; ?>" type="text">
</div>

<div class="col-lg-4 add_sty1">
<input name="manu_name6" id="manu_name6" placeholder="" value="<?php echo $header_footer["manu_name6"]; ?>" type="text">
</div>

<div class="col-lg-12 mt-0">
<div class="add_photo_net1">Phone</div>
</div>

<div class="col-lg-6 add_sty1">
<input name="manu_name7" id="manu_name7" placeholder="+1234567890" value="<?php echo $header_footer["manu_name7"]; ?>" type="text">
</div>

<div class="col-lg-12">
<div class="add_new_car_head" style="padding-top:6px;">Edit Footer</div>
</div>

<div class="col-lg-12">
<div class="add_photo_net1">Logo</div>
<div class="add_imk_car"><input name="footer_logo" id="footer_logo" type="file"></div>
<div class="add_imk_car2" <?php if(empty($header_footer['footer_logo_id'])){ ?> style="display: none;" <?php } ?> id="footer_logo_preview" style="background-image:url(<?php if(!empty($header_footer['footer_logo_id'])){echo get_image_path_by_id($header_footer['footer_logo_id']);  } ?>);">
<a id="remove_footer_logo"  href="javascript:;"><i class="fa fa-close"></i></a></div>
</div>

<div class="col-lg-6 add_sty1">
<label>Menu heading name</label>
<input name="footer_menu1_heading" id="footer_menu1_heading"  value="<?php echo $header_footer["footer_menu1_heading"]; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>Menu name and links</label>
<textarea name="footer_menu1_content" id="footer_menu1_content" cols="" rows="">
<?php echo $header_footer["footer_menu1_content"]; ?></textarea>
</div>


<div class="col-lg-6 add_sty1">
<label>Menu heading name</label>
<input name="footer_menu2_heading" id="footer_menu2_heading" value="<?php echo $header_footer["footer_menu2_heading"]; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>Menu name and links</label>
<textarea name="footer_menu2_content" id="footer_menu2_content" cols="" rows="">
<?php echo $header_footer["footer_menu2_content"]; ?></textarea>
</div>

<div class="col-lg-6 add_sty1">
<label>Menu heading name</label>
<input name="footer_menu3_heading" id="footer_menu3_heading" value="<?php echo $header_footer["footer_menu3_heading"]; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>Menu name and links</label>
<textarea name="footer_menu3_content" id="footer_menu3_content"  cols="" rows="">
<?php echo $header_footer["footer_menu3_content"]; ?></textarea>
</div>

<div class="col-lg-6 add_sty1">
<label>Menu heading name</label>
<input name="footer_menu4_heading" id="footer_menu4_heading" value="<?php echo $header_footer["footer_menu4_heading"]; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>Menu name and links</label>
<textarea name="footer_menu4_content" id="footer_menu4_content" cols="" rows="">
<?php echo $header_footer["footer_menu4_content"]; ?></textarea>
</div>

<div class="col-lg-6 add_sty1">
<label>Phone number</label>
<input name="footer_phone" id="footer_phone" value="<?php echo $header_footer["footer_phone"]; ?>" type="text">
</div>

<div class="col-lg-6 add_sty1">
<label>Email address</label>
<input name="footer_email" id="footer_email" value="<?php echo $header_footer["footer_email"]; ?>" type="text">
</div>

<div class="col-lg-12">
<div class="add_photo_net1">Social media</div>
</div>

<div class="col-lg-3 add_sty1">
<label>Facebook</label>
<input name="footer_facebook" id="footer_facebook" value="<?php echo $header_footer["footer_facebook"]; ?>" type="text">
</div>

<div class="col-lg-3 add_sty1">
<label>Twitter</label>
<input name="footer_twitter" id="footer_twitter" value="<?php echo $header_footer["footer_twitter"]; ?>" type="text">
</div>

<div class="col-lg-3 add_sty1">
<label>Linkedin</label>
<input name="footer_linkedin" id="footer_linkedin" value="<?php echo $header_footer["footer_linkedin"]; ?>" type="text">
</div>

<div class="col-lg-3 add_sty1">
<label>Instagram</label>
<input name="footer_instagram" id="footer_instagram" value="<?php echo $header_footer["footer_instagram"]; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>Copyright</label>
<input name="footer_copyright" id="footer_copyright" value="<?php echo $header_footer["footer_copyright"]; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>Bidding guide</label>
<textarea name="bidding_guide" id="bidding_guide" cols="" rows="">
<?php echo $header_footer["bidding_guide"]; ?></textarea>
</div>

<div class="col-lg-12">
<div class="add_new_car_head" style="padding-top:6px;">Edit Post car fields label</div>
</div>

<div class="col-lg-12 add_sty1">
<label>Buy method text</label>
<input name="buy_method_text" id="buy_method_text" value="<?php echo $header_footer["buy_method_text"]; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>Category text</label>
<input name="category_text" id="category_text" value="<?php echo $header_footer["category_text"]; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>Fixed price text</label>
<input name="fixed_price_text" id="fixed_price_text" value="<?php echo $header_footer["fixed_price_text"]; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>Reduce price text</label>
<input name="reduce_price_text" id="reduce_price_text" value="<?php echo $header_footer["reduce_price_text"]; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>Reservation price text</label>
<input name="reservation_price_text" id="reservation_price_text" value="<?php echo $header_footer["reservation_price_text"]; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>Mileage text</label>
<input name="mileage_text" id="mileage_text" value="<?php echo $header_footer["mileage_text"]; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>Brand text</label>
<input name="brand_text" id="brand_text" value="<?php echo $header_footer["brand_text"]; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>Model text</label>
<input name="model_text" id="model_text" value="<?php echo $header_footer["model_text"]; ?>" type="text">
</div>


<div class="col-lg-12 add_sty1">
<label>Fuel type text</label>
<input name="fuel_type_text" id="fuel_type_text" value="<?php echo $header_footer["fuel_type_text"]; ?>" type="text">
</div>


<div class="col-lg-12 add_sty1">
<label>Model year text</label>
<input name="model_year_text" id="model_year_text" value="<?php echo $header_footer["model_year_text"]; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>Body text</label>
<input name="body_text" id="body_text" value="<?php echo $header_footer["body_text"]; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>Engine text</label>
<input name="engine_text" id="engine_text" value="<?php echo $header_footer["engine_text"]; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>Condition text</label>
<input name="condition_text" id="condition_text" value="<?php echo $header_footer["condition_text"]; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>Show emi price text</label>
<input name="show_emi_price_text" id="show_emi_price_text" value="<?php echo $header_footer["show_emi_price_text"]; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>Equipment text</label>
<input name="equipment_text" id="equipment_text" value="<?php echo $header_footer["equipment_text"]; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>Car facts text</label>
<input name="car_facts_text" id="car_facts_text" value="<?php echo $header_footer["car_facts_text"]; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>Previous owners text</label>
<input name="previous_owners_text" id="previous_owners_text" value="<?php echo $header_footer["previous_owners_text"]; ?>" type="text">
</div>


<div class="col-lg-12 add_sty1">
<label>Service book text</label>
<input name="service_book_text" id="service_book_text" value="<?php echo $header_footer["service_book_text"]; ?>" type="text">
</div>


<div class="col-lg-12 add_sty1">
<label>license number text</label>
<input name="license_number" id="license_number" value="<?php echo $header_footer["license_number"]; ?>" type="text">
</div>


<div class="col-lg-12 add_sty1">
<label>license number text</label>
<input name="license_number" id="license_number" value="<?php echo $header_footer["license_number"]; ?>" type="text">
</div>


<div class="col-lg-12 add_sty1">
<label>Gearbox text</label>
<input name="gearbox_text" id="gearbox_text" value="<?php echo $header_footer["gearbox_text"]; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>Number of seats</label>
<input name="Number_of_seats" id="Number_of_seats" value="<?php echo $header_footer["Number_of_seats"]; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>Manufacture month</label>
<input name="manufacture_month" id="manufacture_month" value="<?php echo $header_footer["manufacture_month"]; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>Number of keys</label>
<input name="number_of_keys" id="number_of_keys" value="<?php echo $header_footer["number_of_keys"]; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>Odometer reading</label>
<input name="odometer_reading" id="odometer_reading" value="<?php echo $header_footer["odometer_reading"]; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>Color text</label>
<input name="color_text" id="color_text" value="<?php echo $header_footer["color_text"]; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>First date traffic sweden text</label>
<input name="first_date_traffic_sweden_text" id="first_date_traffic_sweden_text" value="<?php echo $header_footer["first_date_traffic_sweden_text"]; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>finish text</label>
<input name="finish_text" id="finish_text" value="<?php echo $header_footer["finish_text"]; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>Service history text</label>
<input name="service_history_text" id="service_history_text" value="<?php echo $header_footer["service_history_text"]; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>Textile text</label>
<input name="textile_text" id="textile_text" value="<?php echo $header_footer["textile_text"]; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>Technical data text</label>
<input name="technical_data_text" id="technical_data_text" value="<?php echo $header_footer["technical_data_text"]; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>Chassis number text</label>
<input name="chassis_number_text" id="chassis_number_text" value="<?php echo $header_footer["chassis_number_text"]; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>Next inspection the latest text</label>
<input name="next_inspection_the_latest_text" id="next_inspection_the_latest_text" value="<?php echo $header_footer["next_inspection_the_latest_text"]; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>Engine effect text</label>
<input name="engine_effect_text" id="engine_effect_text" value="<?php echo $header_footer["engine_effect_text"]; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>Curb weight text</label>
<input name="curb_weight_text" id="curb_weight_text" value="<?php echo $header_footer["curb_weight_text"]; ?>" type="text">
</div>


<div class="col-lg-12 add_sty1">
<label>Max payload text</label>
<input name="max_payload_text" id="max_payload_text" value="<?php echo $header_footer["max_payload_text"]; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>Tax weight text</label>
<input name="tax_weight_text" id="tax_weight_text" value="<?php echo $header_footer["tax_weight_text"]; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>Max pull weight text</label>
<input name="max_pull_weight_text" id="max_pull_weight_text" value="<?php echo $header_footer["max_pull_weight_text"]; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>Vehicle total weight text</label>
<input name="vehicle_total_weight_text" id="vehicle_total_weight_text" value="<?php echo $header_footer["vehicle_total_weight_text"]; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>Remark text</label>
<input name="remark_text" id="remark_text" value="<?php echo $header_footer["remark_text"]; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>Breaks text</label>
<input name="breaks_text" id="breaks_text" value="<?php echo $header_footer["breaks_text"]; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>Exterior body text</label>
<input name="exterior_body_text" id="exterior_body_text" value="<?php echo $header_footer["exterior_body_text"]; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>Tires text</label>
<input name="tires_text" id="tires_text" value="<?php echo $header_footer["tires_text"]; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>Interior body text</label>
<input name="interior_body_text" id="interior_body_text" value="<?php echo $header_footer["interior_body_text"]; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>horsepower text</label>
<input name="horsepower_text" id="horsepower_text" value="<?php echo $header_footer["horsepower_text"]; ?>" type="text">
</div>





<div class="col-lg-12 mt-0">
<button type="submit" class="primary-btn3">Update now</button>
<input type="hidden" name="logo_id" id="logo_id" value="<?php echo $header_footer["logo_id"]; ?>" />
<input type="hidden" name="favicon_id" id="favicon_id" value="<?php echo $header_footer["favicon_id"]; ?>" />
<input type="hidden" name="footer_logo_id" id="footer_logo_id" value="<?php echo $header_footer["footer_logo_id"]; ?>" />
<input type="hidden" name="id" id="id" value="1" />


</div>
</div>
</form>
<p class="message"></p>

</div>
</div>
</div>
</div>