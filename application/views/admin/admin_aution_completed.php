<div class="product-page pt-40 mb-20">
<div class="container">
<div class="row g-xl-4 gy-5">

<div class="col-xl-3">
<?php $this->load->view('admin/admin_sidebar'); ?>
</div>
<div class="col-xl-9">
<div class="row g-4 mb-20">
<div class="col-lg-7">
<div class="add_new_car_head" style="padding-top:6px;">Auction complete</div>
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
     <td class="head15699"> Phone</td>
    <td class="head15699"></td>
    <td class="head15699">Car name</td>
    <td class="head15699">Start date</td>
	<td class="head15699">End date</td>
	<td class="head15699 text-center">Winner</td>
     <td class="head15699 text-center"> phone</td>
    <td class="head15699">Change winner</td>
  </tr>

  <?php

if(!empty($cars)){

  foreach ($cars as $car){

    $profile_data = get_profile($car->post_author_id);
    if (empty($profile_data)) {
        $profile_data = ['first_name' => 'Unknown', 'last_name' => '', 'phone_number' => '', 'profle_photo_id' => ''];
    }
    $gallery_images = json_decode($car->car_photo_gallery_ids, true); 

    $gallery_images  =    json_decode( $gallery_images);
        
    if (is_array($gallery_images) && !empty($gallery_images)) {
     

      $image = $gallery_images[0];

      }

      
      // $user_data= get_profile($car->winner_id);
      // $cardata = get_bid_by_id($car->id);

      $data = get_bid_by_primary_id($car->winner_id);

      if (!empty($data) && isset($data->user_id)) {
          $user_data = get_profile($data->user_id);
      }
      if (empty($user_data)) {
          $user_data = ['first_name' => 'No Winner', 'last_name' => '', 'phone_number' => ''];
      }
	 $dt=$car->created   ;
	$edt=date('Y-m-d H:i:s', strtotime($dt. ' + 14 days'));
	

?>

  <tr class="sert54">
  <td class="head15700 ader_br hj15"><img src="<?php if(!empty($profile_data['profle_photo_id'])){echo get_image_path_by_id($profile_data['profle_photo_id']);  }else{ ?><?= base_url(); ?>assets/img/us3.jpg<?php } ?>" width="50px" alt="" /></td>
    <td class="head15700 ader_br"><?php echo $profile_data["first_name"].' '.$profile_data["last_name"]; ?></td>
    <td class="head15700 ader_br"><?php echo $profile_data["phone_number"]; ?></td>
    
    <td class="head15700 ader_br"><a href="<?php echo base_url();  ?>car/<?php echo $car->car_slug; ?>"><img src="<?php if (!empty($image)) { echo get_image_path_by_id($image); } ?>" width="80px" alt="" /></a></td>
    <td class="head15700 ader_br"><a href="<?php echo base_url();  ?>car/<?php echo $car->car_slug; ?>"><?php echo $car->car_title; ?></a></td>
	<td class="head15700 ader_br"><?php echo $dt; ?></td>
	<td class="head15700 ader_br"><?php echo $edt; ?></td>
    <td class="head15700 ader_br text-center"><?php echo $user_data["first_name"].' '.$user_data["last_name"]; ?></td>
     <td class="head15700 ader_br text-center"><?php echo $user_data["phone_number"]; ?></td>
    <td class="head15700 ader_br text-center"><a href="#view_wrap<?php echo $car->id; ?>" data-bs-toggle="modal" class="view_new" title="Change winner"><i class="fa fa-trophy"></i></a></td>
  </tr>
  <?php } }else{ ?>
  <tr>
 <td colspan="10" class="drio55">No Auction Completed.</td>
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


<?php

if(!empty($cars)){

  foreach ($cars as $car){

    $cardata = get_bid_by_id($car->id);

   
    $data = get_bid_by_primary_id($car->winner_id);

    if (!empty($data) && isset($data->user_id)) {
        $user_data = get_profile($data->user_id);
    } else {
        $user_data = ['first_name' => '', 'last_name' => '', 'phone_number' => ''];
    }
?>
<div class="modal signUp-modal sell-with-us fade" id="view_wrap<?php echo $car->id; ?>" tabindex="-1" aria-labelledby="sellUsModal01Label" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x"></i></button>
</div>
<div class="modal-body">
<div class="resv_wrap_bid">
               <div class="head_res_p5">Project Bidding</div>
            
               
               <div class="row">
                <div class="col-md-12">
                 <div class="row">
                  <?php if(!empty($cardata)){ 

                    $i=0;
                    foreach ($cardata as $value) {


                     $car_data= get_car_by_id($value->car_id);
                  

                     if($i==0){                   
                    ?>
                 <div class="col-md-12">
                 <div class="leading_wrap15">
                <div class="leading_bh">
                 <div class="call_bid958">
                 <div class="namj55"><?php echo $user_data["first_name"].' '.$user_data["last_name"]; ?></div>
                 <i class="fa fa-user"></i> LEADING BID  <span class="ad52 ml_a55"><?php echo $value->unique_id; ?></span>
                 </div>
                 
                 <div class="bid_amoi55">
                 <h5><?php echo number_format($value->bidding_price); ?> <?php echo $this->config->item('CURRENCY'); ?></h5>
                 <span><?php echo format_date($value->created); ?></span>
                 </div>
                </div>
                <div class="selec_wrap"><input <?php if($car_data["winner_id"]==$value->id){ echo"checked"; } ?> class="winner" name="winner" id="<?php echo $value->car_id; ?>" data-winid="<?php echo $value->id; ?>" type="radio" value="<?php echo $value->car_id; ?>"> Select winner</div>
               </div>
               </div>
               <?php }else{ ?>


                 <div class="col-md-6">
                 <div class="leading_wrap16">
                  <div class="leading_bh">
                  <div class="namj55"><?php echo $user_data["first_name"].' '.$user_data["last_name"]; ?></div>
                 <div class="call_bid959">
                 
                 <i class="fa fa-user"></i> <span class="ad52"><?php echo $value->unique_id; ?></span>
                 </div>
                 
                 <div class="bid_amoi56">
                 <h5><?php echo number_format($value->bidding_price); ?> <?php echo $this->config->item('CURRENCY'); ?></h5>
                 <span><?php echo format_date($value->created); ?></span>
                 </div>
                </div>
                <div class="selec_wrap"><input <?php if($car_data["winner_id"]==$value->id){ echo"checked"; } ?> class="winner" name="winner" id="<?php echo $value->car_id; ?>" data-winid="<?php echo $value->id; ?>" type="radio" value="<?php echo $value->car_id; ?>"> Select winner</div>
                 </div>
                 </div>
                 <?php } ?>

                 <?php
                 $i++;
                  }
                } ?>


               

                 </div>
                 <p class="message"></p>
                 </div>
                 
                

               </div>
            </div>
</div>
</div>
</div>
</div>
<?php } } ?>