<div class="product-page pt-40 mb-20">
<div class="container">
<div class="row g-xl-4 gy-5">

<div class="col-xl-3">
<?php $this->load->view('admin/admin_sidebar'); ?>

</div>

<div class="col-xl-9">
  <form id="home_page_form" >
<div class="row g-4 mb-20">
<div class="col-lg-12">
<div class="add_new_car_head" style="padding-top:6px;">Edit Home Page</div>
</div>

<div class="col-lg-5">
<div class="add_photo_net1">Banner image</div>
<div class="add_imk_car_foot"><input name="home_page_banner_image" id="home_page_banner_image" type="file"></div>
<div class="add_imk_car_foot2" <?php if(empty($home['home_page_banner_image_id'])){ ?> style="display: none;" <?php } ?> id="home_page_banner_image_preview" style="background-image:url(<?php if(!empty($home['home_page_banner_image_id'])){echo get_image_path_by_id($home['home_page_banner_image_id']);  } ?>);"><a  id="remove_home_page_banner_image" href="javascript:;"><i class="fa fa-close"></i></a></div>
</div>
<div class="col-lg-5"></div>
<div class="col-lg-12 add_sty1">
<label>Banner sub title</label>
<input name="home_page_banner_title" id="home_page_banner_title" value="<?php echo $home["home_page_banner_title"]; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>Banner main title</label>
<input name="home_page_banner_main_title" id="home_page_banner_main_title" value="<?php echo $home["home_page_banner_main_title"]; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1 mb-0">
<label>Banner paragraph</label>
<textarea name="banner_paragraph" id="banner_paragraph" cols="" rows=""><?php echo $home["banner_paragraph"]; ?></textarea>
</div>

<div class="col-lg-6 add_sty1">
<label>Brand sub title name</label>
<input name="brand_sub_title" id="brand_sub_title" value="<?php echo $home["brand_sub_title"]; ?>" type="text">
</div>

<div class="col-lg-6 add_sty1">
<label>Brand main title name</label>
<input name="brand_main_title_name" id="brand_main_title_name" value="<?php echo $home["brand_main_title_name"]; ?>" type="text">
</div>

<div class="col-lg-5">
<div class="add_photo_net1">Mid banner image</div>
<div class="add_imk_car_foot"><input name="main_banner_image" id="main_banner_image" type="file"></div>
<div class="add_imk_car_foot2" id="main_banner_image_preview" <?php if(empty($home['main_banner_image_id'])){ ?> style="display: none;" <?php } ?> style="background-image:url(<?php if(!empty($home['main_banner_image_id'])){echo get_image_path_by_id($home['main_banner_image_id']);  } ?>);"><a id="remove_main_banner_image" href="javascript:;"><i class="fa fa-close"></i></a></div>
</div>

<div class="col-lg-6"></div>

<div class="col-lg-6 add_sty1">
<label>Banner main title</label>
<input name="banner_main_title" id="banner_main_title" value="<?php echo $home["banner_main_title"]; ?>" type="text">
</div>

<div class="col-lg-6 add_sty1">
<label>Button link</label>
<input name="button_link" id="button_link" value="<?php echo $home["button_link"]; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1 mb-0">
<label>Banner paragraph</label>
<textarea name="banner_paragraph1" id="banner_paragraph1" cols="" rows="">
<?php echo $home["banner_paragraph1"]; ?></textarea>
</div>
<?php 
                   $gallery_images = json_decode($home['our_trusted_partners_id'], true); 

                  //  print_r(  $gallery_images);

                ?>
<div class="col-lg-12 mt-1">
<div class="add_photo_net1">Our Trusted Partners</div>
<div class="add_imk_car"><input name="our_trusted_partners[]" id="our_trusted_partners" type="file" multiple></div>
<div id="our_trusted_partners_preview" data-ids="<?php echo $gallery_images; ?>">
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

<div class="col-lg-6 add_sty1">
<label>Middle section sub title</label>
<input name="middle_section_sub_title" id="middle_section_sub_title" value="<?php echo $home["middle_section_sub_title"]; ?>" type="text">
</div>

<div class="col-lg-6 add_sty1">
<label>Middle section main title</label>
<input name="middle_section_main_title" id="middle_section_main_title" value="<?php echo $home["middle_section_sub_title"]; ?>" type="text">
</div>

<div class="col-lg-6 add_sty1">
<label>Middle section Part1</label>
<input name="middle_section_part1" id="middle_section_part1" value="<?php echo $home["middle_section_part1"]; ?>" type="text">
</div>

<div class="col-lg-6 add_sty1">
<label>Middle section Part1</label>
<input name="middle_section_part11" id="middle_section_part11" value="<?php echo $home["middle_section_part11"]; ?>" type="text">
</div>


<div class="col-lg-6 add_sty1">
<label>Middle section Part2</label>
<input name="middle_section_part2" id="middle_section_part2" value="<?php echo $home["middle_section_part2"]; ?>" type="text">
</div>

<div class="col-lg-6 add_sty1">
<label>Middle section Part2</label>
<input name="middle_section_part22" id="middle_section_part22" value="<?php echo $home["middle_section_part22"]; ?>" type="text">
</div>

<div class="col-lg-6 add_sty1">
<label>Middle section Part3</label>
<input name="middle_section_part3" id="middle_section_part3" value="<?php echo $home["middle_section_part3"]; ?>" type="text">
</div>

<div class="col-lg-6 add_sty1">
<label>Middle section Part3</label>
<input name="middle_section_part33" id="middle_section_part33" value="<?php echo $home["middle_section_part33"]; ?>" type="text">
</div>

<div class="col-lg-3 add_sty1">
<label>Car available</label>
<input name="car_available" id="car_available" value="<?php echo $home["car_available"]; ?>" type="text">
</div>

<div class="col-lg-3 add_sty1">
<label>Car sold</label>
<input name="car_sold" id="car_sold" value="<?php echo $home["car_sold"]; ?>" type="text">
</div>

<div class="col-lg-3 add_sty1">
<label>Used cars</label>
<input name="used_cars" id="used_cars" value="<?php echo $home["used_cars"]; ?>" type="text">
</div>

<div class="col-lg-3 add_sty1">
<label>Customer Satisfaction</label>
<input name="customer_satisfaction" value="<?php echo $home["customer_satisfaction"]; ?>" type="text">
</div>


<div class="col-lg-6 add_sty1">
<label>Testimonial title</label>
<input name="testimonial_title" id="testimonial_title" value="<?php echo $home["testimonial_title"]; ?>" type="text">
</div>

<div class="col-lg-6 add_sty1">
<label>Testimonial sub title</label>
<input name="testimonial_sub_title" id="testimonial_sub_title" value="<?php echo $home["testimonial_sub_title"]; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1 mb-0">
<div class="add_photo_net1">Reviews</div>
</div>

<div id="review-container">

<?php 
if(!empty($reviews)){

  foreach ($reviews as $value) {
  
?>

<div class="row review-item"><div class="col-lg-11">
<div class="add_sty1"><label>Review</label>
<input class="review" name="review[]" data-id="<?php echo $value['id']; ?>" data-feild="review" type="text" value="<?php echo htmlspecialchars($value['review'], ENT_QUOTES, 'UTF-8'); ?>" >
</div>
<div class="add_sty1 mb-0">
  <label>Name</label>
  <input data-feild="name" class="name" data-id="<?php echo $value['id']; ?>" name="name[]" value="<?php echo htmlspecialchars($value['name'], ENT_QUOTES, 'UTF-8'); ?>" > 
</div>
</div>
<div class="col-lg-1">
  <a href="javascript:;" data-id="<?php echo $value['id']; ?>" class="close_po5 remove-review"><i class="fa fa-close"></i></a>
</div></div>

<?php } } ?>
</div>

<div class="col-lg-12 add_sty1">
<a href="javascript:;" class="add_nj5"  id="add-review">+ Add Review</a>
</div>

<div class="col-lg-6 add_sty1">
<label>Blog heading</label>
<input name="blog_heading" id="blog_heading" value="<?php echo $home["blog_heading"]; ?>" type="text">
</div>

<div class="col-lg-6 add_sty1">
<label>Blog sub heading</label>
<input name="blog_sub_heading" id="blog_sub_heading" value="<?php echo $home["blog_sub_heading"]; ?>" type="text">
</div>

<div class="col-lg-12 mt-0">
<button type="submit" class="primary-btn3">Update now</button>
<input type="hidden" name="home_page_banner_image_id" id="home_page_banner_image_id" value="<?php echo $home["home_page_banner_image_id"]; ?>" />
<input type="hidden" name="main_banner_image_id" id="main_banner_image_id" value="<?php echo $home["main_banner_image_id"]; ?>" />
<input type="hidden" name="our_trusted_partners_id" id="our_trusted_partners_id" value="" />
<input type="hidden" name="id" id="id" value="1" />


</div>
</div>
</form>
<p class="message"></p>
</div>


</div>
</div>
</div>