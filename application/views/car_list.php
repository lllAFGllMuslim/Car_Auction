<div class="product-page pt-40 mb-20">
<div class="container">
<div class="row g-xl-4 gy-5">
<div class="col-xl-12 menu_mobile_dash"><a href="#">Click Dashboard Menu</a></div>

<div class="col-xl-3">
<?php $this->load->view('sidebar'); ?>
</div>
<div class="col-xl-9">
<div class="row g-4 mb-40">
<div class="col-lg-12">
<div class="add_new_car_head">
<?php
$bid_by_user = isset($_GET['author']) ? $_GET['author'] : '';
   
   if(!empty($bid_by_user)){
       $profile_data = get_profile($bid_by_user);
       
       print_r($profile_data["username"]);
       
       $user_id =$_GET['author'];
       
   }else{
       echo"Min Bil Lista";
       
       $user_id =$this->session->userdata('user_id');
   }
   ?>
</div>
</div>


<?php

if(!empty($cars)){

foreach ($cars as $car):

  $gallery_images = json_decode($car->car_photo_gallery_ids, true); 

  $model_year= get_car_cat_by_id_and_table_name($car->cat_year,'model_year_category');
  $engine= get_car_cat_by_id_and_table_name($car->cat_engine,'engine_category');
  

?>

<div class="col-lg-4 col-md-6 col-sm-10 wow fadeInUp hovgh55" data-wow-delay="200ms">
<div class="product-card">
<div class="product-img">
<div class="number-of-img">
<i class="fa fa-clock"></i>  
  <?php if (get_post_status($car->id) == 'timer'): ?>
        <span id="countdown_<?php echo $car->id; ?>" style="color:red;"></span>
     
    <?php else: ?>
        <span><?php echo get_post_status($car->id); ?></span>
    <?php endif; ?>
</div>

<?php 
  if (empty($this->session->userdata('user_id'))) {
    $user_id = 0;
	$class = 'fa-heart-o';
	?>
	<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#signUpModal01"  class="fav add-fav"><i class="fa <?php echo $class; ?>"></i></a>
	<?php
  }else{
    $user_id = $this->session->userdata('user_id');
	if(is_already_favourite($car->id,$user_id)==0){

     $class = 'fa-heart-o';
	 ?>
	 <a href="javascript:;" data-id="<?php echo $car->id; ?>" data-user_id="<?php echo $this->session->userdata('user_id'); ?>"  class="fav add-fav"><i class="fa <?php echo $class; ?>"></i></a>
	 <?php
  }else{
    $class = 'fa-heart';
	?>
	 <a href="<?php echo base_url();  ?>/favourite"   class="fav add-fav"><i class="fa <?php echo $class; ?>"></i></a>
	 <?php
  }
  }

  


  // print_r();
?>

<?php 
if(!empty($car->reduce_price)){
?>
<div class="reduc_wrap">Reduced price</div>
<?php } ?>
<?php if(!empty($gallery_images)){ ?>
<a href="<?php echo base_url();  ?>car/<?php echo $car->car_slug; ?>"><div class="suporty587">
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
</div></a>
<?php } ?>

<?php /*  
<div class="slider-btn-group">
<div class="product-stand-next swiper-arrow">
<svg width="8" height="13" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg">
<path d="M0 6.50008L8 0L2.90909 6.50008L8 13L0 6.50008Z" />
</svg>
</div>
<div class="product-stand-prev swiper-arrow">
<svg width="8" height="13" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg">
<path d="M8 6.50008L0 0L5.09091 6.50008L0 13L8 6.50008Z" />
</svg>
</div>
</div>
<div class="swiper product-img-slider add_sp55">
<div class="swiper-wrapper">
<?php
       // Decode as an associative array
        
   
        $gallery_images  =    json_decode( $gallery_images);
          
          if (is_array($gallery_images) && !empty($gallery_images)) {
              foreach ($gallery_images as $image) {

               
          ?>
<div class="swiper-slide" style="background-image:url(<?php if (!empty($image)) { echo get_image_path_by_id($image); } ?>);"></div>
<?php
              }
          }
               
          ?>


</div>
</div>

<?php */ ?>

</div>
<div class="product-content">
<h5><a href="<?php echo base_url();  ?>car/<?php echo $car->car_slug; ?>"> <?php echo $car->car_title; ?> </a></h5>
<div class="date_wrap"><span><?php if(!empty($model_year)){ echo  $model_year["year_name"]; } ?></span> <span><?php echo $car->mileage; ?></span> <span><?php if(!empty($engine)){ echo  $engine["engine_name"]; } ?></span></div>


<?php if($car->cat_buy_method==3){

$bids=get_bid_by_id($car->id);

if(!empty($bids)){
    ?>

<div class="price_wrap15"><span class="fix_st1">Ledande Bud:</span>

<span class="fix_st2 ledf55">
<?php echo number_format($bids[0]->bidding_price); ?> <?php echo $this->config->item('CURRENCY'); ?>

</span>

</div>

    
    <?php
    
}else{
    


?>
<div class="price_wrap15"><span class="fix_st1">Ledande Bud:</span>

<span class="fix_st2 ledf55">
<?php if(!empty($car->reduce_price)){  ?>  
<?php echo number_format($car->reduce_price); ?> <?php echo $this->config->item('CURRENCY'); ?>
<?php }else{ ?>
  <?php echo number_format($car->fixed_price); ?> <?php echo $this->config->item('CURRENCY'); ?>
<?php }  ?>
</span>

</div>
<?php if(!empty($car->reduce_price)){ ?>
<div class="price_wrap16"><?php echo number_format($car->fixed_price); ?> <?php echo $this->config->item('CURRENCY'); ?></div>
<?php } ?>

<?php } ?>

<?php if($car->emi_show=='yes'){ ?>
<div class="price_wrap17"><span class="pr1556">With financing:</span> <span class="pr1557"><?php monthlyEMI($car->id); ?></span></div>
<?php } ?>

<?php }else{ ?>

<div class="price_wrap15"><span class="fix_st1">Fixed price:</span>

<span class="fix_st2 ledf55">
<?php if(!empty($car->reduce_price)){  ?>  
<?php echo number_format($car->reduce_price); ?> <?php echo $this->config->item('CURRENCY'); ?>
<?php }else{ ?>
  <?php echo number_format($car->fixed_price); ?> <?php echo $this->config->item('CURRENCY'); ?>
<?php }  ?>
</span>

</div>
<?php if(!empty($car->reduce_price)){ ?>
<div class="price_wrap16"><?php echo number_format($car->fixed_price); ?> <?php echo $this->config->item('CURRENCY'); ?></div>
<?php } ?>

<?php if($car->emi_show=='yes'){ ?>
<div class="price_wrap17"><span class="pr1556">With financing:</span> <span class="pr1557"><?php monthlyEMI($car->id); ?></span></div>
<?php } ?>


<?php } ?>

<div class="new_wrap_bt5756"><a href="<?php echo base_url();  ?>car/<?php echo $car->car_slug; ?>" onClick="openNav()" class="view_new" style="color:#0492c2 !important;" title="View bids"><i class="fa fa-eye"></i></a> 
<a href="<?php echo base_url();  ?>car/edit/<?php echo $car->id; ?>" class="view_new" title="Edit details"><i class="fa fa-edit"></i></a> 
<a href="#dele_wrap" onclick="deletepost(<?php echo $car->id; ?>)" data-bs-toggle="modal" class="red_bt_new" title="Delete"><i class="fa fa-trash-o"></i></a></div>
</div>
</div>
</div>

<?php 
endforeach;

}else{

  echo"<div class='jhn55'>No Car Found.<br/>  Add new car details by clicking on<br/> <a href='".base_url('post-car')."'>POST NOW</a></div>";

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
.nwt1 {
    height: 200px !important;}   

.nwt2 {
    height: 200px !important;}   

.product-card {
    min-height: 420px !important;}
</style>