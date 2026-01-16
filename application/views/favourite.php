
<div class="product-page pt-40 mb-20">
<div class="container">
<div class="row g-xl-4 gy-5">

<div class="col-xl-3">
<?php $this->load->view('sidebar'); ?>
</div>

<div class="col-xl-9">
<div class="row g-4 mb-40">
<div class="col-lg-12">
<div class="add_new_car_head">Favorit</div>
</div>
<div class="col-lg-12">
<div class="aution_wrap15">
<table width="100%" cellspacing="0" cellpadding="0">
  <tr>
    <td class="head156"></td>
    <td class="head156" width="33%">Bil Namn</td>
    <td class="head156">Budgivning Avslutas</td>
    <td class="head156"></td>
  </tr>

  <?php
  if(!empty($cars)){

    foreach ($cars as $car):

    $car_data = get_car_by_id(@$car->car_id); 

 

  $gallery_images = json_decode(@$car_data["car_photo_gallery_ids"], true); 

      $gallery_images  =    json_decode( $gallery_images);

          
  ?>
  <tr class="sert54">
    <td class="head157 stuj89"><img src="<?php if (!empty($gallery_images[0])) { echo get_image_path_by_id($gallery_images[0]); } ?>" class="au_wrap159" alt="" /></td>
    <td class="head157"><a href="<?php echo base_url();  ?>car/<?php echo @$car_data["car_slug"]; ?>" class="name_p65"><?php echo @$car_data["car_title"]; ?></a></td>
    <td class="head157">
    <?php if (get_post_status(@$car->car_id) == 'timer'): ?>
        <span class="red_p5" id="countdown_<?php echo $car->car_id; ?>" style="color:red;"></span>
     
    <?php else: ?>
        <span class="red_p5" ><?php echo get_post_status($car->car_id); ?></span>
    <?php endif; ?>
  
  </td>
    <td class="head157"><a href="<?php echo base_url();  ?>car/<?php echo @$car_data["car_slug"]; ?>" class="view_new"><i class="fa fa-eye"></i></a> <a href="javascript:;" data-id="<?php echo $car->car_id; ?>" data-user_id="<?php echo $this->session->userdata('user_id'); ?>" class="red_bt_new remove_fav"><i class="fa fa-trash-o"></i></a></td>
  </tr>

  <?php 
endforeach;

}else{

 ?>
  <tr ><td colspan="4" >
    You have not added any car in favorite. <a href="<?= base_url('search') ?>?cat_buy_method=auction">Browse Here</a>
  </td></tr>
 <?php 

} ?>

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