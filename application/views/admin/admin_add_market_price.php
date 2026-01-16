
<div class="product-page pt-40 mb-20">
<div class="container">
<div class="row g-xl-4 gy-5">

<div class="col-xl-3">

<?php $this->load->view('admin/admin_sidebar'); ?>

</div>
<div class="col-xl-9">
<div class="row g-4 mb-20">
<div class="col-lg-7">
<div class="add_new_car_head" style="padding-top:6px;">Add market value price</div>
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
    <td class="head15699">Date</td>
    <td class="head15699"></td>
    <td class="head15699">Car name</td>
    <td class="head15699">Add market value price</td>
    <td class="head15699">Add price</td>
  </tr>

  <?php

if(!empty($cars)){

foreach ($cars as $car):

  $car_data = get_car_by_id($car->id); 

 

  $gallery_images = json_decode($car_data["car_photo_gallery_ids"], true); 

      $gallery_images  =    json_decode( $gallery_images);
  
      $formattedDate = date('j/n/Y', strtotime($car->created));

?>
  <tr class="sert54">
    <td class="head15700 hj15"><?php echo $formattedDate; ?></td>
    <td class="head15700 hj15 stuj89"><a href="<?php echo base_url();  ?>car/<?php echo $car_data["car_slug"]; ?>"><img src="<?php if (!empty($gallery_images[0])) { echo get_image_path_by_id($gallery_images[0]); } ?>" width="50px" alt="" /></a></td>
    <td class="head15700"><a href="<?php echo base_url();  ?>car/<?php echo $car_data["car_slug"]; ?>"><?php echo $car_data["car_title"]; ?></a></td>
    <td class="head15700"><input value="<?php echo $car->market_price;  ?>" name="market_price" id="market_price_id_<?php echo $car->id;  ?>" class="vale_warp1444" placeholder="Enter price" type="text"></td>
    <td class="head15700 text-center"><a href="javascript:;" data-car_id="<?php echo $car->id;  ?>" class="view_new add_price"><i class="fa fa-plus"></i></a></td>
  </tr>


  <?php 
endforeach;

}else{

?>
  <tr>
  <td colspan="5" >NOT FOUND !</td>

  </tr>
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
                        <li class="<?php echo ($i == $current_page) ? 'active' : ''; ?>"><a href="<?php echo base_url('admin/market_price/' . $i); ?>"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?></a></li>
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