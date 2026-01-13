<div class="product-page pt-40 mb-20">
<div class="container">
<div class="row g-xl-4 gy-5">
<div class="col-xl-12 menu_mobile_dash"><a href="#">Click Dashboard Menu</a></div>

<!-- <div class="col-xl-3">
<?php $this->load->view('admin/admin_sidebar'); ?>

</div> -->
<div class="col-xl-9" style="width: 100%;">
<div class="row g-4 mb-20">

<div class="col-lg-12 mt-20">
<p style="text-align: right;"><a href="<?= base_url('admin/car/sellyourcarlist') ?>">Go Back</a></p>
<div class="tab-content tab-content2" id="v-pills-tabContent2">
<div class="tab-pane fade active show" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
<div class="add_admin_user">
<form onsubmit="document.getElementById('sell_status').disabled = false;" action="" id="sellyourcar_profileform" name="sellyourcar_profileform" >
<table width="100%" cellspacing="0" cellpadding="0">
  <tr>
    <!--<td class="head15699 stuj5">&nbsp;</td>-->
    <td class="head15699">Customer Name</td>
    <td class="head15699 text-center">Registration <br/>number</td>
    <td class="head15699 text-center">Brand</td>
    <td class="head15699 text-center">Location</td>
    <td class="head15699 text-center">Reg. Year</td>
    <td class="head15699 text-center">Milage</td>
    <td class="head15699 text-center">Vendor</td>
    <td class="head15699 text-center">Sell Status</td>
    <!--<td class="head15699 text-center"></td>-->
    <td class="head15699">&nbsp;</td>
  </tr>

  <?php
  $id = ""; 
if(!empty($users)){

  foreach ($users as $user) {
  $id = $user->id;

  ?>
  <tr class="sert54">
  <td class="head15700 stuj8"><?php echo $user->firstname.' '.$user->lastname; ?> </td>
	
    <td class="head15700 stuj8 text-center"><?php if(!empty($user->registrationnumber)){ echo $user->registrationnumber; }else{ echo"-"; } ?></td>
    <td class="head15700 stuj8 text-center"><?php if(!empty($user->brandname)){ echo $user->brandname; }else{ echo"-"; } ?></td>
    <td class="head15700 stuj8 text-center"><?php if(!empty($user->location)){ echo $user->location; }else{ echo"-"; } ?></td>
    <td class="head15700 stuj8 text-center"><?php if(!empty($user->reg_year)){ echo $user->reg_year; }else{ echo"-"; } ?></td>
    <td class="head15700 stuj8 text-center"><?php if(!empty($user->mileage)){ echo $user->mileage; }else{ echo"0"; } ?></td>
    <td class="head15700 stuj8 text-center">
        <select name="vendor" id="vendor">
        <option value="" >Select Vendor</option>
        <?php 
          if(!empty($vendor_data)){
          foreach ($vendor_data as $vendor) {
          ?>
          <option <?php if($vendor->id==$user->vendor){ echo"selected"; } ?> value="<?php echo $vendor->id ?>" ><?php echo $vendor->company_name ?></option>
          <?php 
          }  
          }
          ?>
        </select>
    </td>

    <td class="head15700 stuj8 text-center">
        <select name="sell_status" id="sell_status" <?php if($user->vendor == "") { echo "disabled"; } ?>>
        <option value="0" <?php if($user->sold ==0) { echo "selected"; } ?> >Not Sold</option>
        <option value="1" <?php if($user->sold ==1) { echo "selected"; } ?> >Sold</option>
        </select>
    </td>

  </tr>
  <tr>
  <td colspan="9"><?php echo $user->car_note; ?></td>
  </tr>
  <?php } ?>
  <tr><td colspan="7" style="text-align:center;"><button type="submit" class="primary-btn3">Update</button></td></tr>
  <input type="hidden" name="car_id" id="car_id" value="<?php echo $id; ?>" />

  <?php } else{ ?>
 <tr>
 <td colspan="7" class="drio55">No User Found.</td>
 </tr>
<?php } ?>
  
</table>
<br />
</form>
</div>
</div>


</div>
</div>
<div class="col-lg-12 mt-40">

</div>
</div>
</div>
</div>
</div>
</div>