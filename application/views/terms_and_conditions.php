<?php 

$terms_and_conditions = get_terms_and_conditions_by_id(1);


?>

<div class="inner-page-banner">
<div class="banner-wrapper">
<div class="container-fluid">
<?php /*?><ul class="breadcrumb-list">
<li><a href="<?php echo base_url(); ?>">Home</a></li>
<li><?php echo $terms_and_conditions["terms_and_conditions_title"];  ?></li>
</ul><?php */?>
<div class="banner-main-content-wrap">
<div class="row">
<div class="col-xl-6 col-lg-7 d-flex align-items-center">
<div class="banner-content">
<span class="sub-title"></span>
<h1><?php echo $terms_and_conditions["terms_and_conditions_title"];  ?></h1>
</div>
</div>
<div class="col-xl-6 col-lg-5 d-lg-flex d-none align-items-center justify-content-end">
<div class="banner-img">
<img src="<?php if(!empty($terms_and_conditions['terms_and_conditions_banner_image_id'])){echo get_image_path_by_id($terms_and_conditions['terms_and_conditions_banner_image_id']);  } ?>" alt>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="faq-page-wrap pt-60 mb-60">
<div class="container">
<div class="row g-lg-4 gy-5">
<div class="col-lg-12">
<div class="faq-area">
<div class="section-title-and-filter">
<div class="section-title">

<?php echo $terms_and_conditions["terms_and_conditions_content"];  ?>
</div>
</div>
</div>
</div>
</div>
</div>
</div>