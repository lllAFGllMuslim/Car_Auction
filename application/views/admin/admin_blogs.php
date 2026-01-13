<div class="product-page pt-40 mb-20">
<div class="container">
<div class="row g-xl-4 gy-5">
<div class="col-xl-12 menu_mobile_dash"><a href="#">Click Dashboard Menu</a></div>

<div class="col-xl-3">
<?php $this->load->view('admin/admin_sidebar'); ?>
</div>

<div class="col-xl-9">
<div class="row g-4 mb-20">
  <form id="editblogpage" >
<div class="col-lg-12">
<div class="add_new_car_head" style="padding-top:6px;">Edit Blog Page</div>
</div>


<div class="col-lg-5">
                <div class="add_photo_net1">Banner image</div>
                <div class="add_imk_car_foot">
                  <input name="blog_page_banner_image" id="blog_page_banner_image" type="file"></div>
                <div class="add_imk_car_foot2" <?php if(empty($blog_page['blog_page_banner_image_id'])){ ?> style="display: none;" <?php } ?> id="blog_page_banner_image_preview" style="background-image:url(<?php if(!empty($blog_page['blog_page_banner_image_id'])){echo get_image_path_by_id($blog_page['blog_page_banner_image_id']);  } ?>);">
                    <a id="remove_blog_page_banner_image" href="javascript:;"><i class="fa fa-close"></i></a>
                </div>
            </div>

<div class="col-lg-5"></div>
<div class="col-lg-12 add_sty1">
<label>Banner sub title</label>
<input name="blog_page_banner_sub_title" id="blog_page_banner_sub_title" value="<?php echo $blog_page['blog_page_banner_sub_title']; ?>" type="text">
</div>

<div class="col-lg-12 add_sty1">
<label>Banner main title</label>
<input name="blog_page_banner_main_title" id="blog_page_banner_main_title" value="<?php echo $blog_page['blog_page_banner_main_title']; ?>" type="text">
</div>

<div class="col-lg-12 mt-0">
<div class="form-inner">
<button class="primary-btn2" type="submit">Update now</button>
<input type="hidden" name="blog_page_banner_image_id" id="blog_page_banner_image_id" value="<?php echo $blog_page['blog_page_banner_image_id']; ?>" />
<input type="hidden" name="id" id="id" value="1" />
</div>
</div>
</form>
<p class="message"></p>

<div class="col-lg-12 add_sty1 text_right_wrap">
<a href="<?= base_url('admin/blog/add') ?>" style="text-decoration: underline;">+ Add Blog</a>
</div>

<div class="col-lg-12 mt-0">
<div class="add_admin_user">
<table width="100%" cellspacing="0" cellpadding="0">
<tbody>
                    <tr>
                        <td class="head15699"></td>
                        <td class="head15699">Title</td>
                        <td class="head15699">&nbsp;</td>
                    </tr>
                    <?php foreach ($blogs as $blog): ?>
                    <tr>
                        <td class="head15700 hj15"><a target="blank" href="<?php echo base_url(); ?>blog/<?php echo $blog->blog_slug; ?>"><img src="<?php if(!empty($blog->blog_list_image_id)){echo get_image_path_by_id($blog->blog_list_image_id);  } ?>" width="80px" alt=""></a></td>
                        <td class="head15700"><a target="blank" href="<?php echo base_url(); ?>blog/<?php echo $blog->blog_slug; ?>"><?php echo $blog->blog_title; ?></a></td>
                        <td class="head15700 text-center">
                            <a target="blank" href="<?php echo base_url(); ?>blog/<?php echo $blog->blog_slug; ?>" class="view_new" style="color:#0492c2 !important;"><i class="fa fa-eye"></i></a>
                            <a href="<?php echo base_url(); ?>admin/blog/edit/<?php echo $blog->id; ?>" class="view_new"><i class="fa fa-edit"></i></a>
                         <a href="javascript:;" data-id="<?php echo $blog->id; ?>"  class="red_bt_new delete_blog"><i class="fa fa-trash-o"></i></a></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>

</table>
</div>
</div>


<div class="col-lg-12 mt-40">
<div class="pagination-and-next-prev">
<div class="pagination full_wid55">
<ul class="mty155">
                    <?php
                    if($total_pages>1){
                    
                    for ($i = 1; $i <= $total_pages; $i++): ?>
                        <li class="<?php echo ($i == $current_page) ? 'active' : ''; ?>"><a href="<?php echo base_url('admin/blogs/' . $i); ?>"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?></a></li>
                    <?php endfor; 
                    }
                    ?>
                </ul>
</div>
</div>
</div>

</div>

</div>
</div>
</div>
</div>