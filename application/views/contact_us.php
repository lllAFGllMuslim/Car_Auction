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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#contact_form').on('submit', function(e) {
        e.preventDefault();
        
        // Disable submit button
        var submitBtn = $(this).find('button[type="submit"]');
        var originalText = submitBtn.text();
        submitBtn.prop('disabled', true).text('Skickar...');
        
        var formData = $(this).serialize();
        
        $.ajax({
            url: '<?php echo base_url('contact/send'); ?>',
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    $('.message').html('<span style="color: green; font-weight: bold; display: block; padding: 15px; background: #d4edda; border: 1px solid #c3e6cb; border-radius: 5px; margin-top: 20px;">' + response.message + '</span>');
                    $('#contact_form')[0].reset();
                } else {
                    $('.message').html('<span style="color: red; font-weight: bold; display: block; padding: 15px; background: #f8d7da; border: 1px solid #f5c6cb; border-radius: 5px; margin-top: 20px;">' + response.message + '</span>');
                }
                
                // Re-enable submit button
                submitBtn.prop('disabled', false).text(originalText);
            },
            error: function() {
                $('.message').html('<span style="color: red; font-weight: bold; display: block; padding: 15px; background: #f8d7da; border: 1px solid #f5c6cb; border-radius: 5px; margin-top: 20px;">Ett fel uppstod. Försök igen.</span>');
                
                // Re-enable submit button
                submitBtn.prop('disabled', false).text(originalText);
            }
        });
    });
});
</script>