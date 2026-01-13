<?php 
$blog_data = get_blog_page_by_id(1);

$categories = get_categories();
?>
<div class="inner-page-banner">
<div class="banner-wrapper">
<div class="container-fluid">
<?php /*?><ul class="breadcrumb-list">
  
<li><a href="<?php echo base_url(); ?>">Home</a></li>
<li><?php echo $catname;  ?></li>
</ul><?php */?>
<div class="banner-main-content-wrap">
<div class="row">
<div class="col-xl-6 col-lg-7 d-flex align-items-center">
<div class="banner-content">
<span class="sub-title">
<?php echo $catname;  ?>
</span>
<h1><?php echo $blog_data["blog_page_banner_main_title"];  ?></h1>
<div class="customar-review">
</div>
</div>
</div>
<div class="col-xl-6 col-lg-5 d-lg-flex d-none align-items-center justify-content-end">
<div class="banner-img">
<img src="<?php if(!empty($blog_data['blog_page_banner_image_id'])){echo get_image_path_by_id($blog_data['blog_page_banner_image_id']);  } ?>" alt>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="blog-standard-page pt-60 mb-50">
<div class="container">
<div class="row g-lg-4 gy-5">
<div class="col-lg-8">

<?php

if(!empty($blogs)){

foreach ($blogs as $blog):


  $catdata = get_category_by_id($blog->blog_category);
?>

<div class="news-card2 mb-50">
<div class="news-img">
<a href="<?php echo base_url(); ?>blog/<?php echo $blog->blog_slug; ?>"><img src="<?php if (!empty($blog->blog_list_image_id)) { echo get_image_path_by_id($blog->blog_list_image_id); } ?>" alt></a>
<div class="date">
<a href="<?php echo base_url(); ?>category/<?php echo  $catdata["cat_slug"]; ?>"><?php echo  $catdata["cat_name"]; ?></a>
</div>
</div>
<div class="content">
<h4><a href="<?php echo base_url(); ?>blog/<?php echo $blog->blog_slug; ?>"><?php echo $blog->blog_title; ?></a></h4>
<p><?php echo substr(strip_tags($blog->blog_paragraph), 0, 200); ?>...</p>
<div class="news-btm d-flex align-items-center justify-content-between">
<div class="author-area">
<div class="author-content">
<?php echo 'Posted on - ' . date('d F, Y', strtotime($blog->created)); ?>
</div>
</div>
<a class="view-btn" href="<?php echo base_url(); ?>blog/<?php echo $blog->blog_slug; ?>">Read More</a>
</div>
</div>
</div>

<?php 
endforeach;

} ?>



<div class="pagination-and-next-prev">
<div class="pagination" style="margin:0px auto;">
<ul class="">
                    <?php
                    if($total_pages>1){
                    
                    for ($i = 1; $i <= $total_pages; $i++): ?>
                        <li class="<?php echo ($i == $current_page) ? 'active' : ''; ?>"><a href="<?php echo base_url('category/'.$catslug.'/' . $i); ?>"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?></a></li>
                    <?php endfor; 
                    }
                    ?>
                </ul>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="blog-sidebar mb-50">
<div class="single-widgets widget_egns_categoris mb-20">
<div class="widget-title mb-20">
<h6>Category</h6>
</div>
<ul class="wp-block-categoris-cloud">

<?php 

if(!empty($categories)){

  foreach ($categories as $cate){
    
?>
<li><a href="<?php echo base_url(); ?>category/<?php echo  $cate->cat_slug; ?>" <?php if($catid==$cate->id){ ?> class="active" <?php } ?> ><span> <?php echo $cate->cat_name; ?> </span></a></li>
 <?php 
}  }
 ?>

</ul>
</div>
</div>
</div>
</div>
</div>
</div>

