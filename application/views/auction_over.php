<div class="product-page pt-40 mb-20">
<div class="container">
<div class="row g-xl-4 gy-5">

<div class="col-xl-3">
    
<?php $this->load->view('sidebar'); ?>

</div>
<div class="col-xl-9">
<div class="row g-4 mb-40">
<div class="col-lg-12">
<div class="add_new_car_head">Avslutade Auktion</div>
</div>
<div class="col-lg-12">
<div class="aution_wrap15">
<table width="100%" cellspacing="0" cellpadding="0">
  <tr>
    <td class="head156">Startdatum</td>
	<td class="head156">Slutdatum</td>
    <td class="head156">&nbsp;</td>
    <td class="head156">Bil Namn</td>
    <td class="head156">Budbelopp</td>
    <td class="head156">&nbsp;</td>
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

      
      // $user_data= get_profile($car->winner_id);
      // $cardata = get_bid_by_id($car->id);

    $data=  get_bid_by_primary_id($car->winner_id);
  
    $user_data= get_profile($data->user_id);
           $user_id =$this->session->userdata('user_id');
    
      $car_bids = get_bid_by_id($car->id);
      
 
      
    $dt=$car->created   ;
	$edt=date('Y-m-d H:i:s', strtotime($dt. ' + 14 days'));

?>
  <tr class="sert54">
    <td class="head157"><?php echo $car->created; ?></td>
	<td class="head157"><?php echo $edt; ?></td>
    <td class="head157"><img src="<?php if (!empty($image)) { echo get_image_path_by_id($image); } ?>" class="au_wrap159" alt="" /></td>
    <td class="head157">
    <a class="name_p65" href="<?php echo base_url();  ?>car/<?php echo $car->car_slug; ?>"><?php echo $car->car_title; ?></a>
    </td>
    <td class="head157"><?php echo $car_bids[0]->bidding_price; ?> <?php echo $this->config->item('CURRENCY'); ?></td>
    <td class="head157"><a href="<?php echo base_url();  ?>car/<?php echo $car->car_slug; ?>" class="view_new"><i class="fa fa-eye"></i></a></td>
  </tr>
    <?php } }else{ ?>
  <tr>
    <td colspan="6" class="drio55">NOT FOUND !</td>
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