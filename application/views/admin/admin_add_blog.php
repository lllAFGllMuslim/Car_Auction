<div class="product-page pt-40 mb-20">
<div class="container">
<div class="row g-xl-4 gy-5">

<div class="col-xl-3">
<?php $this->load->view('admin/admin_sidebar'); ?>

</div>

<div class="col-xl-9">
  <form name="addblog" id="addblog" method="" action="" >
<div class="row g-4 mb-20">
<div class="col-lg-12">
<div class="add_new_car_head" style="padding-top:6px;">Add Blog Page</div>
</div>
<div class="col-lg-5">
<div class="add_photo_net1">Blog list image</div>
<div class="add_imk_car_foot"><input name="blog_list_image" id="blog_list_image" type="file"></div>
<div class="add_imk_car_foot2" style="display: none;" id="blog_list_image_preview"  style="background-image:url(assets/img/inner-page/blog-dt-bannner-img.png);"><a id="remove_blog_list_image" href="javascript:;"><i class="fa fa-close"></i></a></div>
</div>

<div class="col-lg-5">
<div class="add_photo_net1">Blog page image</div>
<div class="add_imk_car_foot"><input name="blog_page_image" id="blog_page_image" type="file"></div>
<div class="add_imk_car_foot2"  style="display: none;"  id="blog_page_image_preview"  style="background-image:url(assets/img/inner-page/blog-dt-bannner-img.png);"><a id="remove_blog_page_image" href="javascript:;"><i class="fa fa-close"></i></a></div>
</div>


<div class="col-lg-5 add_sty1">
<label>Blog category</label>
<select name="blog_category" id="blog_category">
<option value="" >Select category</option>
<?php 
if(!empty($categories)){
foreach ($categories as $value) { ?>
<option value="<?php echo $value["id"]; ?>"><?php echo $value["cat_name"]; ?></option> 
<?php
}
}

?>

</select>
</div>

<div class="col-lg-12 add_sty1">
<label>Blog title</label>
<input name="blog_title" id="blog_title" value="" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>Blog paragraph</label>
<textarea id="blog_paragraph" name="blog_paragraph" ></textarea>
</div>

<div class="col-lg-12 mt-0">
<div class="form-inner">
<button class="primary-btn2" type="submit">Post blog</button>
<input type="hidden" name="blog_list_image_id" id="blog_list_image_id" value="" />
<input type="hidden" name="blog_page_image_id" id="blog_page_image_id" value="" />
</div>
</div>
</div>
</form>
<p class="message"></p>
</div>
</div>
</div>
</div>