<?php
$profile_data = get_profile($this->session->userdata('user_id'));

if (!$this->session->userdata('user_id')) {
        redirect(base_url());
    }
?>
<div class="product-sidebar">
<div class="product-widget">
<div class="check-box-item">
<div class="user_wrap_del5">
<a target="_blank" href="<?= base_url() ?>"><span style="background-image:url(<?php if(!empty($profile_data['profle_photo_id'])){echo get_image_path_by_id($profile_data['profle_photo_id']);  }else{ ?><?= base_url(); ?>assets/img/us3.jpg<?php } ?>);"></span></a>
<h5><?php echo $profile_data["first_name"].' '.$profile_data["last_name"]; ?></h5>
</div>
<div class="checkbox-container">
<?php if($profile_data["role"]=='admin'){ ?>
<style>
li.dropdown ul {
display : none;
}

</style>
<ul class="wp-block-categoris-cloud">
   <li class="dropdown dwmain"><a href="javascript:void(0)" class="<?php if(($this->uri->segment(2)=="user") || ($this->uri->segment(2)=="dealer") || ($this->uri->segment(1)=="profile")){echo "active2"; }?>"><span><i class="fa fa-user"></i> User Management <i class="fa fa fa-caret-down"></i></span></a>
      <ul class="subdropdown" <?php if(($this->uri->segment(2)=="user") || ($this->uri->segment(2)=="dealer") || ($this->uri->segment(1)=="profile")){?> style="display:block;" <?php }?>>
           <li><a href="<?= base_url('admin/user/list') ?>"><span> User List</span></a></li>
		   <li><a href="<?= base_url('admin/dealer/list') ?>"><span> Dealer List</span></a></li>
           <li><a href="<?= base_url('profile') ?>"><span> My Profile</span></a></li>
      </ul>
   </li>
	<li class="dwmain"><a href="<?= base_url('admin/car/sellyourcarlist') ?>" target="_blank"><span> Sell Your Car Equiries</span></a></li>
	<li class="dropdown dwmain"><a href="javascript:void(0)" class="<?php if(($this->uri->segment(1)=="car-list") || ($this->uri->segment(2)=="market_price")){echo "active2"; }?>"><span><i class="fa fa-automobile"></i> Car Management <i class="fa fa fa-caret-down"></i></span></a>
      <ul class="subdropdown" <?php if(($this->uri->segment(1)=="car-list") || ($this->uri->segment(1)=="favourite") || ($this->uri->segment(2)=="market_price")){?> style="display:block;" <?php }?>>
           <li><a href="<?= base_url('car-list') ?>" ><span> Cars List</span></a></li>
		   <li><a href="<?= base_url('admin/car/categories') ?>" <?php if(@$active=='categories'){ echo"active fff"; } ?>><span> Car Category</span></a></li>
		   <li><a href="<?= base_url('admin/car/admin_aution_cars') ?>"><span> Auction Cars</span></a></li>
<li><a href="<?= base_url('admin/car/want_to_delete_car') ?>"><span> Want To Delete Car?</span></a></li>
<li><a href="<?= base_url('admin/car/admin_aution_completed') ?>"><span> Auction Complete</span></a></li>
<li><a href="<?= base_url('admin/market_price') ?>"><span> Add Market Value Price</span></a></li>
<li><a href="<?= base_url('favourite') ?>"><span> Admin Favourites Cars</span></a></li>
      </ul>
   </li>

    <li class="dropdown dwmain"><a href="javascript:void(0)"  class="<?php if($this->uri->segment(3)=="edit"){echo "active2"; }?>"><span><i class="fa fa-file"></i> Page Management <i class="fa fa fa-caret-down"></i></span></a>
       <ul class="subdropdown" <?php if($this->uri->segment(3)=="edit"){?> style="display:block;" <?php }?>>
	   		<li><a href="<?= base_url('admin/header_footer/edit') ?>"><span> Header & Footer</span></a></li>
			<li><a href="<?= base_url('admin/home/edit') ?>"><span> Home</span></a></li>
<li><a <?php if(@$active=='aboutedit'){ echo"active"; } ?>  href="<?= base_url('admin/about/edit') ?>"><span> About Us</span></a></li>
            <li><a href="<?= base_url('admin/faq/edit') ?>"><span> FAQ</span></a></li>
			<li><a href="<?= base_url('admin/privacy_policy/edit') ?>"><span> Privacy Policy</span></a></li>
			<li><a href="<?= base_url('admin/terms_and_conditions/edit') ?>"><span> Terms & conditions</span></a></li>
			<li><a href="<?= base_url('admin/contact/edit') ?>"><span> Contact Us</span></a></li>
       </ul>
    </li>
	
	
	<li class="dropdown dwmain"><a href="javascript:void(0)" class="<?php if($this->uri->segment(2)=="blogs"){echo "active2"; }?>"><span><i class="fa fa-rss"></i> Blog Management <i class="fa fa fa-caret-down"></i></span></a>
      <ul class="subdropdown" <?php if($this->uri->segment(2)=="blogs"){?> style="display:block;" <?php }?>>
           
		   <li><a href="<?= base_url('admin/blogs') ?>"><span> Blog Management</span></a></li>
           <li><a href="<?= base_url('admin/blog/categories') ?>"><span> Blog Category</span></a></li>
		   <li><a href="<?= base_url('admin/blog/add') ?>"><span> Add New Blog </span></a></li>
      </ul>
   </li>
	<li class="dwmain"><a href="<?= base_url('admin/logout') ?>"><span><i class="fa fa-sign-in"></i> Logout</span></a></li>
</ul>

<?php /*?><ul class="wp-block-categoris-cloud">
<li><a href="<?= base_url('admin/header_footer/edit') ?>"><span><i class="fa fa-file"></i> Page Management</span></a></li>
<li><a href="<?= base_url('admin/user/list') ?>"><span><i class="fa fa-user"></i> User list</span></a></li>
<li><a href="<?= base_url('admin/car/admin_aution_cars') ?>"><span><i class="fa fa-gavel"></i> Auction cars</span></a></li>
<li><a href="<?= base_url('admin/car/want_to_delete_car') ?>"><span><i class="fa fa-automobile"></i> Want to delete car?</span></a></li>
<li><a href="<?= base_url('admin/car/admin_aution_completed') ?>"><span><i class="fa fa-navicon"></i> Auction complete</span></a></li>
<li><a href="<?= base_url('admin/market_price') ?>"><span><i class="fa fa-heart-o"></i> Add market value price</span></a></li>

<li><a href="<?= base_url('profile') ?>"><span><i class="fa fa-user"></i> Profile</span></a></li>
<li><a href="<?= base_url('admin/logout') ?>"><span><i class="fa fa-sign-in"></i> Logout</span></a></li>
</ul><?php */?>
<?php } ?>

<?php if($profile_data["role"]=='dealer' ){ ?>
<ul class="wp-block-categoris-cloud">

<?php if($profile_data["role"]=='admin'){ ?>
<li><a href="<?= base_url('admin/user/list') ?>"><span><i class="fa fa-user"></i> User Management</span></a></li>
<?php } ?>

<li><a href="<?= base_url('post-car') ?>"><span><i class="fa fa-edit"></i> Posta ny bil</span></a></li>

<li><a href="<?= base_url('car-list') ?>"><span><i class="fa fa-automobile"></i> Min Bil Lista</span></a></li>
<li><a href="<?= base_url('auctionover') ?>"><span><i class="fa fa-gavel"></i> Auktion över</span></a></li>
<li><a href="<?= base_url('car/bid/mybid') ?>"><span><i class="fa fa-gavel"></i> Mina Auktioner</span></a></li>
<li><a href="<?= base_url('favourite') ?>"><span><i class="fa fa-heart-o"></i> Favorit</span></a></li>
<li><a href="<?= base_url('profile') ?>"><span><i class="fa fa-user"></i> Profil</span></a></li>
<li><a href="<?= base_url('logout') ?>"><span><i class="fa fa-sign-in"></i> Utloggning</span></a></li>
</ul>
<?php } ?>
<?php if($profile_data["role"]=='user'){ ?>
<ul class="wp-block-categoris-cloud">

<li><a href="<?= base_url('car/bid/mybid') ?>"><span><i class="fa fa-gavel"></i> Mina Auktioner</span></a></li>
<li><a href="<?= base_url('favourite') ?>"><span><i class="fa fa-heart-o"></i> Favorit</span></a></li>
<li><a href="#sellUsModal01" data-bs-toggle="modal" data-bs-target="#sellUsModal01"><span><i class="fa fa-gavel"></i> Sälj Med Oss</span></a></li>
<li><a href="<?= base_url('profile') ?>"><span><i class="fa fa-user"></i> Profil</span></a></li>
<li><a href="<?= base_url('logout') ?>"><span><i class="fa fa-sign-in"></i> Utloggning</span></a></li>
</ul>
<?php } ?>
</div>
</div>
</div>
</div>