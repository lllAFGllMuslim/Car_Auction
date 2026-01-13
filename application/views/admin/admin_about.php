

<div class="product-page pt-40 mb-20">
<div class="container">
<div class="row g-xl-4 gy-5">
<div class="col-xl-12 menu_mobile_dash"><a href="#">Click Dashboard Menu</a></div>

<div class="col-xl-3">
<?php $this->load->view('admin/admin_sidebar'); ?>
</div>
<div class="col-xl-9">


<form id="aboutForm">
        <div class="row g-4 mb-20">
            <div class="col-lg-12">
                <div class="add_new_car_head" style="padding-top:6px;">Edit About Page</div>
            </div>
            <div class="col-lg-5">
                <div class="add_photo_net1">Banner image</div>
                <div class="add_imk_car_foot">
                  <input name="banner_image" id="banner_image" type="file"></div>
                <div class="add_imk_car_foot2" <?php if(empty($about_page['about_banner_image_id'])){ ?> style="display: none;" <?php } ?> id="banner_image_preview" style="background-image:url(<?php if(!empty($about_page['about_banner_image_id'])){echo get_image_path_by_id($about_page['about_banner_image_id']);  } ?>);">
                    <a id="remove_about_image" href="javascript:;"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="col-lg-5"></div>
            <div class="col-lg-12 add_sty1">
                <label>Banner sub title</label>
                <input name="banner_subtitle" value="<?php echo $about_page['about_banner_sub_title']; ?>" type="text">
            </div>

            <div class="col-lg-12 add_sty1">
                <label>Banner main title</label>
                <input name="banner_title" value="<?php echo $about_page['about_banner_title']; ?>" type="text">
            </div>

            <div class="col-lg-12 add_sty1">
                <label>Page main title</label>
                <input name="page_title" value="<?php echo $about_page['about_page_title']; ?>" type="text">
            </div>

            <div class="col-lg-12 add_sty1 mb-0">
                <label>Page paragraph</label>
                <textarea id="about_page_content" name="page_content" cols="" rows=""><?php echo $about_page['about_page_content']; ?></textarea>
            </div>

            <div class="col-lg-12">
                <div class="add_photo_net1">Photo Gallery</div>
                <div class="add_imk_car" style="margin-bottom: 20px;"><input name="gallery_images[]" id="gallery_images" type="file" multiple></div>
                <?php 
                   $gallery_images = json_decode($about_page['about_gallery_images'], true); 
                ?>
                <div id="gallery_preview" data-ids="<?php echo $gallery_images; ?>">
           
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

            <div class="col-lg-12">
                <div class="form-inner">
                    <button class="primary-btn2" type="submit">Update now</button>
                    <input type="hidden" name="banner_image_id" id="banner_image_id" value="<?php echo $about_page['about_banner_image_id']; ?>" />
                    <input type="hidden" name="about_gallery_ids" id="about_gallery_ids" value='' />
                    <input type="hidden" name="id" id="id" value="1" />
                    
                </div>

               
            </div>
            <p class="message"></p>
        </div>
    </form>
</div>
</div>
</div>
</div>
