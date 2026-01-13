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
<div class="nav nav2 nav  nav-pills" id="v-pills-tab2" role="tablist" aria-orientation="vertical">

<a class="btn nav-link " href="<?= base_url('admin/user/list') ?>" >User List</a>
<a class="btn nav-link active" href="<?= base_url('admin/dealer/list') ?>" >Dealer List</a>

</div></div>
<div class="col-lg-5">
<form name="" id="" action="" method="post">  
<div class="user_list_wrap7896"><input name="title" require placeholder="Search here" value="<?php echo htmlspecialchars($search_term); ?>" type="text"> <button type="submit"><i class="fa fa-search"></i></button></div>
</form>
</div>
<div class="col-lg-12 mt-20">
<div class="tab-content tab-content2" id="v-pills-tabContent2">
<div class="tab-pane fade active show" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
<div class="add_admin_user">

<table width="100%" cellspacing="0" cellpadding="0">
  <tr>
    <td class="head15699 stuj899">&nbsp;</td>
    <td class="head15699">Company Name</td>
    <td class="head15699">Dealer name</td>
	 <td class="head15699 ">Email address</td>
     <td class="head15699 text-center">Phone</td>
    <td class="head15699 text-center">Organization number</td>
    <td class="head15699 text-center">Active cars</td>
    <td class="head15699 text-center">Auction completed</td>
    <td class="head15699 text-center">Won auction</td>
    <td class="head15699 text-center">Bids placed</td>
    <td class="head15699">&nbsp;</td>
  </tr>

  <?php 
 
if(!empty($users)){

  foreach ($users as $user) {
  

  ?>
  <tr class="sert54">
    <td class="head15700 stuj5 stuj89 hj15"><img src="<?php if(!empty($user->profle_photo_id)){echo get_image_path_by_id($user->profle_photo_id);  }else{ ?><?= base_url(); ?>assets/img/us3.jpg<?php } ?>" width="50px" alt="" /></td>
    <td class="head15700 stuj5"><?php echo $user->company_name; ?></td>
    <td class="head15700 stuj5"><?php echo $user->first_name.' '.$user->last_name; ?></td>
	<td class="head15700 stuj5"><?php echo $user->email; ?></td>
     <td class="head15700 stuj5 text-center"><?php if(!empty($user->phone_number)){ echo $user->phone_number; }else{ echo"-"; } ?></td>
    <td class="head15700 stuj5 text-center"><?php if(!empty($user->registration_number)){ echo $user->registration_number; }else{ echo"-"; } ?></td>
    <td class="head15700 stuj5 text-center"><a target="blank" href="<?= base_url(); ?>/car-list?author=<?php echo $user->id; ?>"><?php echo get_car_by_data('post_author_id',$user->id); ?></a></td>
    <td class="head15700 stuj5 text-center"><a target="blank" href="<?= base_url(); ?>admin/car/admin_aution_completed?completed_by_user=<?php echo $user->id; ?>"><?php echo get_compllete_car_auction_by_id($user->id); ?></a></td>
    <td class="head15700 stuj5 text-center"><a target="blank" href="<?= base_url(); ?>admin/car/admin_aution_completed?win_by_user=<?php echo $user->id; ?>"><?php echo get_win_car_auction_by_id($user->id); ?></a></td>
    <td class="head15700 stuj5 text-center"><a target="blank" href="<?= base_url(); ?>car/bid/dealercars?bid_by_user=<?php echo $user->id; ?>"><?php echo get_bid_by_userid_distin($user->id); ?></a></td>
    <td class="head15700 stuj5 text-center der55">
      <a href="<?= base_url(); ?>/car/bid/dealercars?author=<?php echo $user->id; ?>" class="view_new" title="View"><i class="fa fa-eye"></i></a>
       <a href="javascript:;" class="red_bt_new delete_user" data-id="<?php echo $user->id; ?>" title="Delete"><i class="fa fa-trash-o"></i></a>
    </td>
  </tr>

  <?php } }else{
?>
 <tr>
 <td colspan="8" class="drio55">No Dealer Found.</td>
 </tr>
<?php 

  } ?>
  
</table>
</div>
</div>


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