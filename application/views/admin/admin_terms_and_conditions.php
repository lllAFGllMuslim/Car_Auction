

<div class="product-page pt-40 mb-20">
<div class="container">
<div class="row g-xl-4 gy-5">
<div class="col-xl-12 menu_mobile_dash"><a href="#">Click Dashboard Menu</a></div>

<div class="col-xl-3">
<?php $this->load->view('admin/admin_sidebar'); ?>
</div>
<div class="col-xl-9">


<form id="terms_and_conditionsForm">
        <div class="row g-4 mb-20">
            <div class="col-lg-12">
                <div class="add_new_car_head" style="padding-top:6px;">Edit Terms & Conditions page</div>
            </div>
            <div class="col-lg-5">
                <div class="add_photo_net1">Banner image</div>
                <div class="add_imk_car_foot">
                  <input name="terms_and_conditions_banner_image" id="terms_and_conditions_banner_image" type="file"></div>
                <div class="add_imk_car_foot2" <?php if(empty($terms_and_conditions['terms_and_conditions_banner_image_id'])){ ?> style="display: none;" <?php } ?> id="terms_and_conditions_banner_image_preview" style="background-image:url(<?php if(!empty($terms_and_conditions['terms_and_conditions_banner_image_id'])){echo get_image_path_by_id($terms_and_conditions['terms_and_conditions_banner_image_id']);  } ?>);">
                    <a id="remove_terms_and_conditions_banner_image" href="javascript:;"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="col-lg-5"></div>
        

            <div class="col-lg-12 add_sty1">
                <label>Page main title</label>
                <input name="terms_and_conditions_title" value="<?php echo $terms_and_conditions['terms_and_conditions_title']; ?>" type="text">
            </div>

            <div class="col-lg-12 add_sty1 mb-0">
                <label>Page paragraph</label>
                <textarea id="terms_and_conditions_content" name="terms_and_conditions_content" cols="" rows=""><?php echo $terms_and_conditions['terms_and_conditions_content']; ?></textarea>
            </div>

      

            <div class="col-lg-12">
                <div class="form-inner">
                    <button class="primary-btn2" type="submit">Update now</button>
                    <input type="hidden" name="terms_and_conditions_banner_image_id" id="terms_and_conditions_banner_image_id" value="<?php echo $terms_and_conditions['terms_and_conditions_banner_image_id']; ?>" />
                  
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
