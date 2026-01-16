<div class="product-page pt-40 mb-20">
<div class="container">
<div class="row g-xl-4 gy-5">

<div class="col-xl-3">

<?php $this->load->view('admin/admin_sidebar'); ?>

</div>
<div class="col-xl-9">
<form id="contact_form" >
<div class="row g-4 mb-20">
<div class="col-lg-12">
<div class="add_new_car_head" style="padding-top:6px;">Edit Contact Page</div>
</div>
<div class="col-lg-5">
<div class="add_photo_net1">Banner image</div>
<div class="add_imk_car_foot"><input name="contact_banner_image" id="contact_banner_image" type="file"></div>
<div class="add_imk_car_foot2" <?php if(empty($contact['contact_banner_image_id'])){ ?> style="display: none;" <?php } ?> id="contact_banner_image_preview" style="background-image:url(<?php if(!empty($contact['contact_banner_image_id'])){echo get_image_path_by_id($contact['contact_banner_image_id']);  } ?>);">
  <a id="remove_contact_banner_image" href="javascript:;"><i class="fa fa-close"></i></a></div>
</div>
<div class="col-lg-5"></div>
<div class="col-lg-12 add_sty1">
<label>Banner sub title</label>
<input name="contact_banner_sub_title" id="contact_banner_sub_title" value="<?php echo $contact['contact_banner_sub_title']; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>Banner main title</label>
<input name="contact_banner_main_title" id="contact_banner_main_title" value="<?php echo $contact['contact_banner_main_title']; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>Page main title</label>
<input name="contact_page_main_title" id="contact_page_main_title" value="<?php echo $contact['contact_page_main_title']; ?>" type="text">

</div>

<div class="col-lg-12 add_sty1">
<label>Email address</label>
<input name="contact_email_address" id="contact_email_address" value="<?php echo $contact['contact_email_address']; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>Email phone</label>
<input name="contact_email_phone" id="contact_email_phone" value="<?php echo $contact['contact_email_phone']; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>Note</label>
<input name="contact_note" id="contact_note" value="<?php echo $contact['contact_note']; ?>" type="text">
</div>

<div class="col-lg-12 mt-0">
<div class="form-inner">
<button class="primary-btn2" type="submit">Update now</button>
<input type="hidden" name="contact_banner_image_id" id="contact_banner_image_id" value="<?php echo $contact['contact_banner_image_id']; ?>" />
<input type="hidden" name="id" id="id" value="1" />
                    

</div>
</div>
</div>
</form>
<p class="message"></p>

</div>
</div>
</div>
</div>