<div class="product-page pt-40 mb-20">
<div class="container">
<div class="row g-xl-4 gy-5">
<div class="col-xl-12 menu_mobile_dash"><a href="#">Click Dashboard Menu</a></div>

<div class="col-xl-3">
<?php $this->load->view('admin/admin_sidebar'); ?>

</div>


<div class="col-xl-9">
  <form name="editblog" id="editblog" method="" action="" >
<div class="row g-4 mb-20">
<div class="col-lg-12">
<div class="add_new_car_head" style="padding-top:6px;">Edit Blog Page</div>
</div>
<div class="col-lg-5">
<div class="add_photo_net1">Blog list image</div>
<div class="add_imk_car_foot"><input name="blog_list_image" id="blog_list_image" type="file"></div>
<div class="add_imk_car_foot2" <?php if(empty($blog['blog_list_image_id'])){ ?> style="display: none;" <?php } ?> id="blog_list_image_preview"  style="background-image:url(<?php if(!empty($blog['blog_list_image_id'])){echo get_image_path_by_id($blog['blog_list_image_id']);  } ?>);"><a id="remove_blog_list_image" href="javascript:;"><i class="fa fa-close"></i></a></div>
</div>

<div class="col-lg-5">
<div class="add_photo_net1">Blog page image</div>
<div class="add_imk_car_foot"><input name="blog_page_image" id="blog_page_image" type="file"></div>
<div class="add_imk_car_foot2"  <?php if(empty($blog['blog_page_image_id'])){ ?> style="display: none;" <?php } ?>  id="blog_page_image_preview"  style="background-image:url(<?php if(!empty($blog['blog_page_image_id'])){echo get_image_path_by_id($blog['blog_page_image_id']);  } ?>);"><a id="remove_blog_page_image" href="javascript:;"><i class="fa fa-close"></i></a></div>
</div>

<?php 

// print_r($blog["blog_category"]);

?>
<div class="col-lg-5 add_sty1">
<label>Blog category</label>
<select name="blog_category" id="blog_category">
<option value="" >Select category</option>
<?php 
if(!empty($categories)){
foreach ($categories as $value) { ?>
<option <?php if($blog["blog_category"]==$value["id"]){ echo"selected"; } ?> value="<?php echo $value["id"]; ?>"><?php echo $value["cat_name"]; ?></option> 
<?php
}
}

?>

</select>
</div>

<div class="col-lg-12 add_sty1">
<label>Blog title</label>
<input name="blog_title" id="blog_title" value="<?php echo $blog["blog_title"]; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>Blog paragraph</label>
<textarea id="blog_paragraph" name="blog_paragraph"  ><?php echo $blog["blog_paragraph"]; ?> </textarea>
</div>

<div class="col-lg-12 mt-0">
<div class="form-inner">
<button class="primary-btn2" type="submit">Update Now</button>
<input type="hidden" name="blog_list_image_id" id="blog_list_image_id" value="<?php echo $blog["blog_list_image_id"]; ?>" />
<input type="hidden" name="blog_page_image_id" id="blog_page_image_id" value="<?php echo $blog["blog_page_image_id"]; ?>" />
<input type="hidden" name="id" id="id" value="<?php echo $blog["id"]; ?>" />

</div>
</div>
</div>
</form>
<p class="message"></p>
</div>
</div>
</div>
</div>