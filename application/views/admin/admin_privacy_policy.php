

<div class="product-page pt-40 mb-20">
<div class="container">
<div class="row g-xl-4 gy-5">
<div class="col-xl-12 menu_mobile_dash"><a href="#">Click Dashboard Menu</a></div>

<div class="col-xl-3">
<?php $this->load->view('admin/admin_sidebar'); ?>
</div>
<div class="col-xl-9">


<form id="privacy_policyForm">
        <div class="row g-4 mb-20">
            <div class="col-lg-12">
                <div class="add_new_car_head" style="padding-top:6px;">Edit privacy policy page</div>
            </div>
            <div class="col-lg-5">
                <div class="add_photo_net1">Banner image</div>
                <div class="add_imk_car_foot">
                  <input name="privacy_policy_banner_image" id="privacy_policy_banner_image" type="file"></div>
                <div class="add_imk_car_foot2" <?php if(empty($privacy_policy['privacy_policy_banner_image_id'])){ ?> style="display: none;" <?php } ?> id="privacy_policy_banner_image_preview" style="background-image:url(<?php if(!empty($privacy_policy['privacy_policy_banner_image_id'])){echo get_image_path_by_id($privacy_policy['privacy_policy_banner_image_id']);  } ?>);">
                    <a id="remove_privacy_policy_banner_image" href="javascript:;"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="col-lg-5"></div>
        

            <div class="col-lg-12 add_sty1">
                <label>Page main title</label>
                <input name="privacy_policy_title" value="<?php echo $privacy_policy['privacy_policy_title']; ?>" type="text">
            </div>

            <div class="col-lg-12 add_sty1 mb-0">
                <label>Page paragraph</label>
                <textarea id="privacy_policy_content" name="privacy_policy_content" cols="" rows=""><?php echo $privacy_policy['privacy_policy_content']; ?></textarea>
            </div>

      

            <div class="col-lg-12">
                <div class="form-inner">
                    <button class="primary-btn2" type="submit">Update now</button>
                    <input type="hidden" name="privacy_policy_banner_image_id" id="privacy_policy_banner_image_id" value="<?php echo $privacy_policy['privacy_policy_banner_image_id']; ?>" />
                  
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
