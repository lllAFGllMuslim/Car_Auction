<?php 
$contact_data = get_contact_page_by_id(1);
?>

<div class="inner-page-banner">
<div class="banner-wrapper">
<div class="container-fluid">
<?php /*?><ul class="breadcrumb-list">
<li><a href="<?php echo base_url(); ?>">Home</a></li>
<li><?php echo $contact_data["contact_banner_sub_title"];  ?></li>
</ul><?php */?>
<div class="banner-main-content-wrap">
<div class="row">
<div class="col-xl-6 col-lg-7 d-flex align-items-center">
<div class="banner-content">
<span class="sub-title">
<?php echo $contact_data["contact_banner_sub_title"];  ?>
</span>
<h1><?php echo $contact_data["contact_banner_main_title"];  ?></h1>
<div class="customar-review">
</div>
</div>
</div>
<div class="col-xl-6 col-lg-5 d-lg-flex d-none align-items-center justify-content-end">
<div class="banner-img">
<img src="<?php if(!empty($contact_data['contact_banner_image_id'])){echo get_image_path_by_id($contact_data['contact_banner_image_id']);  } ?>" alt>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="contact-page pt-80 mb-60">
<div class="container">
<div class="row g-4 mb-80">
<div class="col-lg-5">
<div class="section-title mb-50">
<h4><?php echo $contact_data["contact_page_main_title"];  ?></h4>
</div>
<div class="single-contact mb-40">
<div class="title">
<h6>För Mer Information</h6>
</div>
<div class="icon">
<i class="fa fa-envelope-o"></i>
</div>
<div class="content">
<span>Email Now</span>
<h6><a href="mailto:<?php echo $contact_data["contact_email_address"];  ?>">
        <?php echo $contact_data["contact_email_address"];  ?>
    
    </a></h6>
</div>
</div>
<div class="single-contact">
<div class="title">
<h6>Telefonnummer</h6>
</div>
<div class="icon">
<i class="fa fa-map-marker"></i>
</div>
<div class="content">
<span>Ring</span>
<h6><a><?php echo $contact_data["contact_email_phone"];  ?></a></h6>
</div>
</div>
<div class="service-available">
<span>N:B:</span>
<p><?php echo $contact_data["contact_note"];  ?></p>
</div>
</div>
<div class="col-lg-7">
<div class="inquiry-form">
<form id="contact_form" >
<div class="row">
<div class="col-md-12">
<div class="form-inner mb-30">
<label>Fullständig Namn*</label>
<input type="text" name="fullname" id="fullname">
</div>
</div>
<div class="col-md-6">
<div class="form-inner mb-30">
<label>Telefon*</label>
<input type="text" name="phone" id="phone" >
</div>
</div>
<div class="col-md-6">
<div class="form-inner mb-30">
<label>Email*</label>
<input type="email" name="email" id="email" >
</div>
</div>
<div class="col-md-12">
<div class="form-inner mb-30">
<label>Ämne*</label>
<input type="subject" name="subject" id="subject" >
</div>
</div>
<div class="col-md-12">
<div class="form-inner mb-30">
<label>Korta Anteckningar*</label>
<textarea id="message" name="message" ></textarea>
</div>
</div>
<div class="col-md-12">
<div class="col-md-12">
<div class="form-inner">
<button type="submit" class="primary-btn3">Skicka in nu</button>
</div>
</div>
</div>
</div>
</form>
<p class="message">
    
</p>
</div>
</div>
</div>
</div>
</div>