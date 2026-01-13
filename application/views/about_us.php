
<?php 
$home_data = get_home_page_by_id(1); 
$about_data = get_about_page_by_id(1);
?>

<div class="inner-page-banner">
<div class="banner-wrapper">
<div class="container-fluid">
<?php /*?><ul class="breadcrumb-list">
<li><a href="<?php echo base_url(); ?>">Home</a></li>
<li><?php echo $about_data["about_banner_sub_title"];  ?></li>
</ul><?php */?>
<div class="banner-main-content-wrap">
<div class="row">
<div class="col-xl-6 col-lg-7 d-flex align-items-center">
<div class="banner-content">
<span class="sub-title">
<?php echo $about_data["about_banner_sub_title"];  ?>
</span>
<h1><?php echo $about_data["about_banner_title"];  ?></h1>
<div class="customar-review">
</div>
</div>
</div>
<div class="col-xl-6 col-lg-5 d-lg-flex d-none align-items-center justify-content-end">
<div class="banner-img">
<img src="<?php if(!empty($about_data['about_banner_image_id'])){echo get_image_path_by_id($about_data['about_banner_image_id']);  } ?>" alt>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="welcome-banner-section pb-50 pt-50">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="welcome-wrap text-center">
<div class="section-title1 text-center wow fadeInUp" data-wow-delay="200ms">
<h2><?php echo $about_data["about_page_title"];  ?></h2>
</div>
<div class="welcome-content wow fadeInUp" data-wow-delay="300ms">
<p>
<?php echo $about_data["about_page_content"];  ?>
</p>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="why-choose-area pt-80 pb-70 mb-50">

<div class="container">
<div class="row mb-60 wow fadeInUp" data-wow-delay="200ms">
<div class="col-lg-12 d-flex justify-content-center">
<div class="section-title1 text-center">
<span><?php echo $home_data["middle_section_sub_title"]; ?></span>
<h2><?php echo $home_data["middle_section_sub_title"]; ?></h2>
</div>
</div>
</div>
<div class="row mb-50 g-4 justify-content-center">
<div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="200ms">
<div class="choose-card">
<div class="choose-top">
<div class="choose-icon">
<img src="<?php echo base_url(); ?>/assets/img/home1/icon/affordable.svg" alt>
</div>
<h5><?php echo $home_data["middle_section_part1"]; ?></h5>
</div>
<p><?php echo $home_data["middle_section_part11"]; ?></p>
</div>
</div>
<div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="300ms">
<div class="choose-card">
<div class="choose-top">
<div class="choose-icon">
<img src="<?php echo base_url(); ?>/assets/img/home1/icon/guarantee.svg" alt>
</div>
<h5><?php echo $home_data["middle_section_part2"]; ?></h5>
</div>
<p><?php echo $home_data["middle_section_part22"]; ?></p>
</div>
</div>
<div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="400ms">
<div class="choose-card">
<div class="choose-top">
<div class="choose-icon">
<img src="<?php echo base_url(); ?>/assets/img/home1/icon/warranty.svg" alt>
</div>
<h5><?php echo $home_data["middle_section_part3"]; ?></h5>
</div>
<p><?php echo $home_data["middle_section_part33"]; ?></p>
</div>
</div>
</div>
<div class="our-activetis">
<div class="row justify-content-center g-lg-4 gy-5">
<div class="col-lg-3 col-sm-4 col-sm-6 divider d-flex justify-content-lg-start justify-content-sm-center wow fadeInUp" data-wow-delay="200ms">
<div class="single-activiti">
<div class="icon">
<img src="<?php echo base_url(); ?>/assets/img/home1/icon/av-car.svg" alt>
</div>
<div class="content">
<div class="number">
<h5 class="counter"><?php echo $home_data["car_available"]; ?></h5>
<span>K+</span>
</div>
<p>Bil Tillgänglig</p>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-4 col-sm-6 divider d-flex justify-content-sm-center wow fadeInUp" data-wow-delay="300ms">
<div class="single-activiti">
<div class="icon">
<img src="<?php echo base_url(); ?>/assets/img/home1/icon/sold-car.svg" alt>
</div>
<div class="content">
<div class="number">
<h5 class="counter"><?php echo $home_data["car_sold"]; ?></h5>
<span>K+</span>
</div>
<p>Sålda Bilar</p>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-4 col-sm-6 divider d-flex justify-content-sm-center wow fadeInUp" data-wow-delay="400ms">
<div class="single-activiti">
<div class="icon">
<img src="<?php echo base_url(); ?>/assets/img/home1/icon/use-car.svg" alt>
</div>
<div class="content">
<div class="number">
<h5 class="counter"><?php echo $home_data["used_cars"]; ?></h5>
<span>K+</span>
</div>
<p>Begagnade bil</p>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-4 col-sm-6 d-flex justify-content-lg-end justify-content-sm-center wow fadeInUp" data-wow-delay="500ms">
<div class="single-activiti">
<div class="icon">
<img src="<?php echo base_url(); ?>/assets/img/home1/icon/happy-customar.svg" alt>
</div>
<div class="content">
<div class="number">
<h5 class="counter"><?php echo $home_data["customer_satisfaction"]; ?></h5>
<span>%</span>
</div>
<p>Kundnöjdhet</p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="drivco-gallery mb-70">
<div class="container">
<div class="row mb-50 wow fadeInUp" data-wow-delay="200ms">
<div class="col-lg-12">
<div class="section-title1 text-center">
<h2>Bild Galleri</h2>
</div>
</div>
</div>
<div class="row g-4 mb-50">
<?php 
if(!empty($about_data['about_gallery_images'])){
   $gallery_images = json_decode($about_data['about_gallery_images'], true); 

   $gallery_images  =    json_decode( $gallery_images);
          
   if (is_array($gallery_images) && !empty($gallery_images)) {
       foreach ($gallery_images as $image) {        
?>
<div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
<div class="gallery-item">
<img class="img-fluid" src="<?php if (!empty($image)) { echo get_image_path_by_id($image); } ?>" alt="gallery">
<a href="<?php if (!empty($image)) { echo get_image_path_by_id($image); } ?>" data-fancybox="gallery" class="gallary-item-overlay"></a>
</div>
</div>

<?php
   }
  }
} ?>



</div>
</div>
</div>
