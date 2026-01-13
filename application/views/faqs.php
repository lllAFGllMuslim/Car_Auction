<?php 
$faq_data = get_faq_page_by_id(1);
$faqs = get_faqs();
?>

<div class="inner-page-banner">
<div class="banner-wrapper">
<div class="container-fluid">
<?php /*?><ul class="breadcrumb-list">
<li><a href="<?php echo base_url(); ?>">Home</a></li>
<li><?php echo $faq_data["faq_banner_sub_title"];  ?></li>
</ul><?php */?>
<div class="banner-main-content-wrap">
<div class="row">
<div class="col-xl-6 col-lg-7 d-flex align-items-center">
<div class="banner-content">
<span class="sub-title">
<?php echo $faq_data["faq_banner_sub_title"];  ?>
</span>
<h1><?php echo $faq_data["faq_banner_main_title"];  ?></h1>
</div>
</div>
<div class="col-xl-6 col-lg-5 d-lg-flex d-none align-items-center justify-content-end">
<div class="banner-img">
<img src="<?php if(!empty($faq_data['faq_banner_image_id'])){echo get_image_path_by_id($faq_data['faq_banner_image_id']);  } ?>" alt>
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
<div class="col-lg-4 d-lg-flex d-none">
<div class="faq-img">
<img src="<?php if(!empty($faq_data['faq_page_image_id'])){echo get_image_path_by_id($faq_data['faq_page_image_id']);  } ?>" alt>
</div>
</div>
<div class="col-lg-8">
<div class="faq-area">
<div class="section-title-and-filter mb-40">
<div class="section-title">
<h4>FAQ’s & Senaste Svaret</h4>
</div>
</div>
<div class="faq-wrap">
<div class="accordion accordion-flush" id="accordionFlushExample">

<?php


if (!empty($faqs)) {
  $i=0;
  foreach ($faqs as $value) {
if($i==0){
?>

<div class="accordion-item">
<h5 class="accordion-header" id="flush-headingOne">
<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
<?php echo htmlspecialchars($value->quesion, ENT_QUOTES, 'UTF-8'); ?>
</button>
</h5>
<div id="flush-collapseOne" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
<div class="accordion-body"><?php echo htmlspecialchars($value->ans, ENT_QUOTES, 'UTF-8'); ?></div>
</div>
</div>

<?php
}else{ ?>
<div class="accordion-item">
<h5 class="accordion-header" id="flush-headingTwo<?php echo $i; ?>">
<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo<?php echo $i; ?>" aria-expanded="false" aria-controls="flush-collapseTwo<?php echo $i; ?>">
<?php echo htmlspecialchars($value->quesion, ENT_QUOTES, 'UTF-8'); ?>
</button>
</h5>
<div id="flush-collapseTwo<?php echo $i; ?>" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
<div class="accordion-body">
<?php echo htmlspecialchars($value->ans, ENT_QUOTES, 'UTF-8'); ?>  
</div>
</div>
</div>



<?php }
$i++;    }
}
?>


</div>
</div>
</div>
</div>
</div>
</div>
</div>