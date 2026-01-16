<div class="product-page pt-40 mb-20">
<div class="container">
<div class="row g-xl-4 gy-5">

<div class="col-xl-3">
<?php $this->load->view('sidebar'); ?>
</div>
<div class="col-xl-9">
<div class="row g-4 mb-40">
<div class="col-lg-12">
<div class="add_new_car_head">
    <?php 

// print_r($cars);

   $bid_by_user = isset($_GET['bid_by_user']) ? $_GET['bid_by_user'] : '';
   
   if(!empty($bid_by_user)){
       $profile_data = get_profile($bid_by_user);
       
       print_r($profile_data["username"]);
       
       $user_id =$_GET['bid_by_user'];
       
   }else{
       echo"Mina bud";
       
       $user_id =$this->session->userdata('user_id');
   }


?>
    
    </div>
</div>
<?php

if(!empty($cars)){

foreach ($cars as $cardata):

  $car=get_car_by_id($cardata->car_id);

  //  print_r($car);

  $gallery_images = json_decode($car["car_photo_gallery_ids"], true); 

  $model_year= get_car_cat_by_id_and_table_name($car["cat_year"],'model_year_category');
  $engine= get_car_cat_by_id_and_table_name($car["cat_engine"],'engine_category');
  
   $car_bids = get_bids_by_carid_user_id($car["id"],$user_id);
   $car_allbids = get_bid_by_id($car["id"]);

//    print_r($car_allbids);
   $highest_car_bid = 0;
   foreach ($car_allbids as $car_allbids_elem) {
     if($car_allbids_elem->bidding_price > $highest_car_bid) {
        $highest_car_bid = $car_allbids_elem->bidding_price;
     }
   }
//    echo "Highest price: ".$highest_car_bid;

?>

<div class="col-lg-4 col-md-6 col-sm-10 wow hovgh55 fadeInUp" data-wow-delay="200ms">
<div class="product-card">
<div class="product-img">
  <?php if($car["cat_buy_method"]==3){
 ?>
<div class="number-of-img">
<i class="fa fa-clock"></i> 


    <?php if (get_post_status($car["id"]) == 'timer'): ?>
        <span id="countdown_<?php echo $car["id"]; ?>" style="color:red;"></span>
     
    <?php else: ?>
        <span><?php echo get_post_status($car["id"]); ?></span>
    <?php endif; ?>
</div>
<?php } ?>



<?php 
  if (empty($this->session->userdata('user_id'))) {
    $user_id = 0;
	$class = 'fa-heart-o';
	?>
	<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#signUpModal01"  class="fav add-fav add-fav"><i class="fa <?php echo $class; ?>"></i></a>
	<?php
  }else{
    $user_id = $this->session->userdata('user_id');
	 if(is_already_favourite($car['id'],$user_id)==0){

     $class = 'fa-heart-o';
	 ?>
	 <a href="javascript:;" data-id="<?php echo $car['id']; ?>" data-user_id="<?php echo $this->session->userdata('user_id'); ?>"  class="fav add-fav add-fav"><i class="fa <?php echo $class; ?>"></i></a>
	 <?php
  }else{
    $class = 'fa-heart';
	?>
	 <a href="<?php echo base_url();  ?>/favourite"   class="fav add-fav add-fav"><i class="fa <?php echo $class; ?>"></i></a>
	 <?php
  }
  }

 


  // print_r();
?>

<?php 
if(!empty($car["reduce_price"])){
?>
<div class="reduc_wrap">Reduced price</div>
<?php } ?>

<?php if(!empty($gallery_images)){ ?>
<div class="suporty587">
    <?php
        $gallery_images  =    json_decode( $gallery_images);
        
        $image_url ="";
        $image_url1 ="";
        $i =0;
         if (is_array($gallery_images) && !empty($gallery_images)) {
              foreach ($gallery_images as $image) {
                if($i==0){
                  $image_url =  get_image_path_by_id($image);
                } 
                if($i==1){
                     $image_url1 =  get_image_path_by_id($image);
                } 
        
        $i++;      }
             
         }

    ?>
<div class="nwt1" style="background-image:url(<?php if (!empty($image_url)) { echo $image_url; }else{ echo base_url()."/uploads/preview.png"; } ?>);"></div>
<div class="nwt2" style="background-image:url(<?php if (!empty($image_url1)) { echo $image_url1; }else{ echo base_url()."/uploads/preview.png"; } ?>);"></div>
</div>
<?php } ?>

</div>
<div class="product-content">
<h5><a href="<?php echo base_url();  ?>car/<?php echo $car["car_slug"]; ?>"> <?php echo $car["car_title"]; ?> </a></h5>
<div class="date_wrap"><span><?php echo  @$model_year["year_name"]; ?></span> <span><?php echo @$car["mileage"]; ?></span> <span><?php echo  @$engine["engine_name"]; ?></span></div>
<?php if($car['fixed_price'] != 0) {  ?>
<div class="price_wrap15"><span class="fix_st1">Fast Pris:</span>

<span class="fix_st2 ledf55">
<?php if(!empty($car["reduce_price"])){  ?>  
<?php echo $car["reduce_price"]; ?> <?php echo $this->config->item('CURRENCY'); ?>
<?php }else{ ?>
  <?php echo $car["fixed_price"]; ?> <?php echo $this->config->item('CURRENCY'); ?>
<?php }  ?>
</span>

</div>
<?php } ?>
<div class="price_wrap15"><span class="fix_st1">Ledande Bud:</span>

<span class="fix_st2 ledf55">
<?php if(!empty($highest_car_bid)) { echo number_format($highest_car_bid); } else { echo 0; } ?> <?php echo $this->config->item('CURRENCY'); ?>

</span>

</div>
<?php if(!empty($car["reduce_price"])){ ?>
<div class="price_wrap16"><?php echo $car["fixed_price"]; ?> <?php echo $this->config->item('CURRENCY'); ?></div>
<?php } ?>

<div class="price_wrap17"><span class="pr1556">With financing:</span> <span class="pr1557"><?php monthlyEMI($car["id"]); ?> </span></div>

<?php

if(!empty($car_bids)){
    $i=1;
foreach ($car_bids as  $value) {
    if($i==1){
?>

<div class="new_wrap_bt6"><a href="<?php echo base_url();  ?>car/<?php echo $car["car_slug"]; ?>" class="red_bt14557">Min Bud  <span><?php echo $value->bidding_price; ?> <?php echo $this->config->item('CURRENCY'); ?></span></a></div>

<?php } $i++; } } ?>

</div>
</div>
</div>

<?php 
endforeach;

}else{

  ?>
  You have not placed any bid. <a href="<?= base_url('search') ?>?cat_buy_method=auction">Browse Here</a>
  <?php

} ?>




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

<style>
.nwt1 {height: 170px !important;}    
.nwt2 {height: 170px !important;}     
</style>