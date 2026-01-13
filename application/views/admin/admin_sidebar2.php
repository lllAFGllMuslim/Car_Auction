<div class="product-sidebar">

<?php
$profile_data = get_profile($this->session->userdata('user_id'));

if (!$this->session->userdata('user_id') or $this->session->userdata('user_role')!='admin') {
        redirect(base_url());
    }
?>

<div class="product-widget">
<div class="check-box-item">
<div class="user_wrap_del5">
<a target="_blank" href="<?= base_url() ?>"><span style="background-image:url(<?php if(!empty($profile_data['profle_photo_id'])){echo get_image_path_by_id($profile_data['profle_photo_id']);  }else{ ?><?= base_url(); ?>assets/img/us3.jpg<?php } ?>);"></span></a>
<h5><?php echo $profile_data["username"]; ?></h5>
</div>
<div class="checkbox-container">
<ul class="wp-block-categoris-cloud">
<li><a href="<?= base_url('admin/header_footer/edit') ?>"><span><i class="fa fa-file"></i> Page Management</span></a></li>
<li><a href="<?= base_url('admin/user/list') ?>"><span><i class="fa fa-user"></i> User list</span></a></li>
<li><a href="<?= base_url('admin/car/admin_aution_cars') ?>"><span><i class="fa fa-gavel"></i> Auction cars</span></a></li>
<li><a href="<?= base_url('admin/car/want_to_delete_car') ?>"><span><i class="fa fa-automobile"></i> Want to delete car?</span></a></li>
<li><a href="<?= base_url('admin/car/admin_aution_completed') ?>"><span><i class="fa fa-navicon"></i> Auction complete</span></a></li>
<li><a href="<?= base_url('admin/market_price') ?>"><span><i class="fa fa-heart-o"></i> Add market value price</span></a></li>

<li><a href="<?= base_url('profile') ?>"><span><i class="fa fa-user"></i> Profile</span></a></li>
<li><a href="<?= base_url('admin/logout') ?>"><span><i class="fa fa-sign-in"></i> Logout</span></a></li>
</ul>
</div>
</div>
</div>
</div>

