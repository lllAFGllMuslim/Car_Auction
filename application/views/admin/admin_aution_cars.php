<div class="product-page pt-40 mb-20">
<div class="container">
<div class="row g-xl-4 gy-5">
<div class="col-xl-12 menu_mobile_dash"><a href="#">Click Dashboard Menu</a></div>

<div class="col-xl-3">
<?php $this->load->view('admin/admin_sidebar'); ?>
</div>
<div class="col-xl-9">
<div class="row g-4 mb-20">
<div class="col-lg-7">
<div class="add_new_car_head" style="padding-top:6px;">Auction cars</div>
</div>
<div class="col-lg-5">
<form name="" id="" action="" method="post">  
<div class="user_list_wrap7896"><input name="title" require placeholder="Search here" value="<?php echo htmlspecialchars($search_term); ?>" type="text"> <button type="submit"><i class="fa fa-search"></i></button></div>
</form>
</div>
<div class="col-lg-12 mt-20">
<div class="add_admin_user">
<table width="100%" cellspacing="0" cellpadding="0">
  <tr>
    <td class="head15699">&nbsp;</td>
    <td class="head15699">Dealer name</td>
    <td class="head15699"></td>
    <td class="head15699">Car name</td>
    <td class="head15699">Time left out</td>
    <td class="head15699">&nbsp;</td>
  </tr>

  <?php

if(!empty($cars)){

  foreach ($cars as $car){

    $profile_data = get_profile($car->post_author_id);
    $gallery_images = json_decode($car->car_photo_gallery_ids, true); 

    $gallery_images  =    json_decode( $gallery_images);
        
    if (is_array($gallery_images) && !empty($gallery_images)) {
     

      $image = $gallery_images[0];

      }

?>
  <tr class="sert54">
  <td class="head15700 stuj890 hj15"><img src="<?php if(!empty($profile_data['profle_photo_id'])){echo get_image_path_by_id($profile_data['profle_photo_id']);  }else{ ?><?= base_url(); ?>assets/img/us3.jpg<?php } ?>" width="50px" alt="" /></td>
    <td class="head15700"><?php echo $profile_data["first_name"].' '.$profile_data["last_name"]; ?></td>
    <td class="head15700 stuj890"><a href="<?php echo base_url();  ?>car/<?php echo $car->car_slug; ?>"><img src="<?php if (!empty($image)) { echo get_image_path_by_id($image); } ?>" width="80px" alt="" /></a></td>
    <td class="head15700"><a href="<?php echo base_url();  ?>car/<?php echo $car->car_slug; ?>"><?php echo $car->car_title; ?></a></td>
    <td class="head15700">  <?php if (get_post_status($car->id) == 'timer'): ?>
        <span id="countdown_<?php echo $car->id; ?>" style="color:red;"></span>
     
    <?php else: ?>
        <span><?php echo get_post_status($car->id); ?></span>
    <?php endif; ?></td>
    <td class="head15700 text-center"><a href="<?php echo base_url();  ?>car/<?php echo $car->car_slug; ?>" class="view_new" title="View bidding"><i class="fa fa-eye"></i></a>
     <a  href="javascript:;" data-id="<?php echo $car->id; ?>" class="red_bt_new delete_car" title="Delete"><i class="fa fa-trash-o"></i></a></td>
  </tr>

  <?php } }else{ ?>
  <tr>
    <td colspan="7"><p>NOT FOUND !</p></td>
  </tr>

  <?php } ?>

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
                        <li class="<?php echo ($i == $current_page) ? 'active' : ''; ?>"><a href="<?php echo base_url('car-list/' . $i); ?>"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?></a></li>
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