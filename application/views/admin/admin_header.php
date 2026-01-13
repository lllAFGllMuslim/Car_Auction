<!doctype html>
<html lang="en">
<?php
$header_data = get_header_footer_by_id(1);

// print_r($header_data);
?>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $header_data["site_title"]; ?></title>
<link rel="icon" type="image/x-icon" href="<?php if(!empty($header_data['favicon_id'])){echo get_image_path_by_id($header_data['favicon_id']);  } ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>/assets/css/jquery-ui.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>/assets/css/bootstrap-icons.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>/assets/css/all.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>/assets/css/animate.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>/assets/css/jquery.fancybox.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>/assets/css/fontawesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/swiper-bundle.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/slick.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/slick-theme.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/magnific-popup.css">
<link href="<?php echo base_url(); ?>/assets/css/boxicons.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>/assets/css/nice-select.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/style.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/car_style.css">

</head>
<body class="tt-magic-cursor" id="bid_side">
<div class="anchor-element"></div>



