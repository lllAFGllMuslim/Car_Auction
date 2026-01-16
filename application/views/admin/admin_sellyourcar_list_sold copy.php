<div class="product-page pt-40 mb-20">
<div class="container">
<div class="row g-xl-4 gy-5">

<div class="col-xl-3">
<?php $this->load->view('admin/admin_sidebar'); ?>

</div>
<div class="col-xl-9">
<div class="row g-4 mb-20">
<div class="col-lg-7">
<div class="nav nav2 nav  nav-pills" id="v-pills-tab2" role="tablist" aria-orientation="vertical">

<a class="btn nav-link " href="<?= base_url('admin/car/sellyourcarlist') ?>" >Active</a>
<a class="btn nav-link active" href="<?= base_url('admin/car/sellyourcarlist_sold') ?>" >Sold</a>

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
    <!--<td class="head15699 stuj5">&nbsp;</td>-->
    <td class="head15699">Customer Name</td>
    <td class="head15699 stuj6 text-center">Email address</td>
	<td class="head15699 text-center">Phone</td>
    <td class="head15699 text-center">Registration <br/>number</td>
    <td class="head15699 text-center">Brand</td>
    <td class="head15699 text-center">Location</td>
    <td class="head15699 text-center">Reg. Year</td>
    <td class="head15699 text-center">Milage</td>
    <td class="head15699 text-center">Date/Time</td>
    <!--<td class="head15699 text-center"></td>-->
    <td class="head15699">&nbsp;</td>
  </tr>

  <?php 
//  print_r($users);
if(!empty($users)){

  foreach ($users as $user) {
  

  ?>
  <tr class="sert54">
  <td class="head15700 stuj8"><?php echo $user->firstname.' '.$user->lastname; ?> </td>
	<td class="head15700 stuj8"><?php echo $user->emailaddress; ?></td>
    <td class="head15700 stuj8 text-center"><?php if(!empty($user->phone)){ echo $user->phone; }else{ echo"-"; } ?></td>
    <td class="head15700 stuj8 text-center"><?php if(!empty($user->registrationnumber)){ echo $user->registrationnumber; }else{ echo"-"; } ?></a></td>
    <td class="head15700 stuj8 text-center"><?php if(!empty($user->brandname)){ echo $user->brandname; }else{ echo"-"; } ?></a></td>
    <td class="head15700 stuj8 text-center"><?php if(!empty($user->location)){ echo $user->location; }else{ echo"-"; } ?></a></td>
    <td class="head15700 stuj8 text-center"><?php if(!empty($user->reg_year)){ echo $user->reg_year; }else{ echo"-"; } ?></a></td>
    <td class="head15700 stuj8 text-center"><?php if(!empty($user->selling_price)){ echo $user->selling_price; }else{ echo"0"; } ?></a></td>
    <td class="head15700 stuj8 text-center"><?php if(!empty($user->DT)){ echo $user->DT; }else{ echo"-"; } ?></a></td>
  </tr>

  <?php } }else{
?>
 <tr>
 <td colspan="7" class="drio55">No User Found.</td>
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