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
$bid_by_user = isset($_GET['author']) ? $_GET['author'] : '';
   
   if(!empty($bid_by_user)){
       $profile_data = get_profile($bid_by_user);
       print_r($profile_data["username"]);
       $user_id = $_GET['author'];
   }else{
       echo "Min Bil Lista";
       $user_id = $this->session->userdata('user_id');
   }
?>
</div>
</div>

<?php
if(!empty($cars)){
    foreach ($cars as $car):

        $gallery_images = json_decode($car->car_photo_gallery_ids, true); 
        $model_year = get_car_cat_by_id_and_table_name($car->cat_year, 'model_year_category');
        $engine = get_car_cat_by_id_and_table_name($car->cat_engine, 'engine_category');
        $bids = get_bid_by_id($car->id);
        $leading_bid = !empty($bids) ? $bids[0]->bidding_price : null;
        $currency = $this->config->item('CURRENCY');
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

<?php if (empty($this->session->userdata('user_id'))): ?>
  <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#signUpModal01" class="fav add-fav"><i class="fa fa-heart-o"></i></a>
<?php else: ?>
  <?php if(is_already_favourite($car->id, $this->session->userdata('user_id')) == 0): ?>
    <a href="javascript:;" data-id="<?php echo $car->id; ?>" data-user_id="<?php echo $this->session->userdata('user_id'); ?>" class="fav add-fav"><i class="fa fa-heart-o"></i></a>
  <?php else: ?>
    <a href="<?php echo base_url(); ?>/favourite" class="fav add-fav"><i class="fa fa-heart"></i></a>
  <?php endif; ?>
<?php endif; ?>

<?php if(!empty($car->reduce_price)): ?>
  <div class="reduc_wrap">Reduced price</div>
<?php endif; ?>

<?php if(!empty($gallery_images)): ?>
<a href="<?php echo base_url(); ?>car/<?php echo $car->car_slug; ?>">
  <div class="suporty587">
    <?php
      if (is_string($gallery_images)) {
          $gallery_images = json_decode($gallery_images, true);
      }
      $image_url = "";
      $image_url1 = "";
      $i = 0;
      if (is_array($gallery_images) && !empty($gallery_images)) {
          foreach ($gallery_images as $image) {
              if($i == 0) $image_url = get_image_path_by_id($image);
              if($i == 1) $image_url1 = get_image_path_by_id($image);
              $i++;
          }
      }
    ?>
    <div class="nwt1" style="background-image:url(<?php echo !empty($image_url) ? $image_url : base_url().'/uploads/preview.png'; ?>);"></div>
    <div class="nwt2" style="background-image:url(<?php echo !empty($image_url1) ? $image_url1 : base_url().'/uploads/preview.png'; ?>);"></div>
  </div>
</a>
<?php endif; ?>

</div><!-- /.product-img -->

<div class="product-content">
  <h5><a href="<?php echo base_url(); ?>car/<?php echo $car->car_slug; ?>"><?php echo $car->car_title; ?></a></h5>
  <div class="date_wrap">
    <span><?php if(!empty($model_year)) echo $model_year["year_name"]; ?></span>
    <span><?php echo $car->mileage; ?></span>
    <span><?php if(!empty($engine)) echo $engine["engine_name"]; ?></span>
  </div>

  <!-- Fast Pris -->
  <div class="price_wrap15">
    <span class="fix_st1">Fast Pris:</span>
    <span class="fix_st2">
      <?php if(!empty($car->reduce_price)): ?>
        <span style="text-decoration:line-through; color:#999; font-size:13px;"><?php echo number_format($car->fixed_price); ?> <?php echo $currency; ?></span>
        <?php echo number_format($car->reduce_price); ?> <?php echo $currency; ?>
      <?php else: ?>
        <?php echo !empty($car->fixed_price) ? number_format($car->fixed_price).' '.$currency : '-'; ?>
      <?php endif; ?>
    </span>
  </div>

  <!-- Ledande Bud -->
  <div class="price_wrap15">
    <span class="fix_st1">Ledande Bud:</span>
    <span class="fix_st2 ledf55">
      <?php echo !empty($leading_bid) ? number_format($leading_bid).' '.$currency : 'Inga bud ännu'; ?>
    </span>
  </div>

  <!-- Reservationpris (only if set) -->
  <?php if(!empty($car->reservation_price)): ?>
  <div class="price_wrap15">
    <span class="fix_st1">Reservationpris:</span>
    <span class="fix_st2" style="color:#e67e22;">
      <?php echo number_format($car->reservation_price).' '.$currency; ?>
    </span>
  </div>
  <?php endif; ?>

  <?php if($car->emi_show == 'yes'): ?>
  <div class="price_wrap17">
    <span class="pr1556">With financing:</span>
    <span class="pr1557"><?php monthlyEMI($car->id); ?></span>
  </div>
  <?php endif; ?>

  <div class="new_wrap_bt5756">
    <a href="<?php echo base_url(); ?>car/<?php echo $car->car_slug; ?>" onClick="openNav()" class="view_new" style="color:#0492c2 !important;" title="View bids"><i class="fa fa-eye"></i></a>
    <a href="<?php echo base_url(); ?>car/edit/<?php echo $car->id; ?>" class="view_new" title="Edit details"><i class="fa fa-edit"></i></a>
    <a href="#dele_wrap" onclick="deletepost(<?php echo $car->id; ?>)" data-bs-toggle="modal" class="red_bt_new" title="Delete"><i class="fa fa-trash-o"></i></a>
  </div>
</div><!-- /.product-content -->

</div><!-- /.product-card -->
</div><!-- /.col -->

<?php 
    endforeach;
}else{
    echo "<div class='jhn55'>No Car Found.<br/>Add new car details by clicking on<br/><a href='".base_url('post-car')."'>POST NOW</a></div>";
} ?>

<div class="col-lg-12 mt-40">
  <div class="pagination-and-next-prev">
    <div class="pagination full_wid55">
      <ul class="mty155">
        <?php if($total_pages > 1): ?>
          <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <li class="<?php echo ($i == $current_page) ? 'active' : ''; ?>">
              <a href="<?php echo base_url('car-list/' . $i); ?>"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?></a>
            </li>
          <?php endfor; ?>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</div>

</div><!-- /.row -->
</div><!-- /.col-xl-9 -->
</div><!-- /.row -->
</div><!-- /.container -->
</div><!-- /.product-page -->

<style>
.nwt1 { height: 200px !important; }
.nwt2 { height: 200px !important; }
.product-card { min-height: 420px !important; }
</style>