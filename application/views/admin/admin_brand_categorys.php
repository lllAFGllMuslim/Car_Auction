<div class="product-page pt-40 mb-20">
<div class="container">
<div class="row g-xl-4 gy-5">
<div class="col-xl-12 menu_mobile_dash"><a href="#">Click Dashboard Menu</a></div>

<div class="col-xl-3">
<?php $this->load->view('admin/admin_sidebar'); ?>
</div>
<div class="col-xl-9">
<div class="row g-4 mb-20">
<div class="col-lg-12">
<div class="add_new_car_head" style="padding-top:6px;">Add brands</div>
</div>

<div class="col-lg-12">
<div class="add_cart15789">
  <a href="javascript:;" class="active" onClick="cls(1)" id="clsa1">Brand</a>
 <a href="javascript:;" onClick="cls(2)" id="clsa2">Model</a>
  <a href="javascript:;" onClick="cls(3)" id="clsa3">Fuel</a>
   <a href="javascript:;" onClick="cls(4)" id="clsa4">Model year</a> 
   <a href="javascript:;" onClick="cls(5)" id="clsa5">Buy method</a> 
   <a href="javascript:;" onClick="cls(6)" id="clsa6">Body</a> 
   <a href="javascript:;" onClick="cls(7)" id="clsa7">Engine</a>
   <a href="javascript:;" onClick="cls(8)" id="clsa8">Equipment</a>
  </div>
</div>

<div class="col-lg-12" id="tb1">
<div class="row">

<div class="col-lg-4">
<div class="row">
<form name="brand_form" id="brand_form" >
<div class="col-lg-12 add_sty1 mt-2">
<label>Type brand name</label>
<input name="brand_name" id="brand_name" value="" type="text">
</div>

<div class="col-lg-12 mt-0">
<div class="form-inner">
<button class="primary-btn2" type="submit">Add category</button>
</div>
</div>
</form>
</div>
<p class="message"></p>
</div>

<div class="col-lg-8">
<div class="add_admin_user">
<table width="100%" cellspacing="0" cellpadding="0">

    
  <tr>
    <td class="head15699">Brands name</td>
    <td class="head15699 ter156478"></td>
  </tr>
  <tbody id="brand_categories_list">

 </tbody>
</table>
</div>
</div>
</div>
</div>

<div class="col-lg-12" id="tb2" style="display:none;">
<div class="row">
<div class="col-lg-4">
<div class="row">
<form name="model_form" id="model_form" >
<div class="col-lg-12 add_sty1 mt-2">
<label>Type model name</label>
<input name="model_name" id="model_name" value="" type="text">
</div>

<?php 


//  print_r($brand_cat[0]["brand_name"]); 

?>

<div class="col-lg-12 add_sty1 mt-1">
<label>Brand</label>
<select name="brand_id" id="brand_id">
<?php if(!empty($brand_cat)){ 
  foreach ($brand_cat as $value) {
   ?>
<option value="<?php echo $value["id"] ?>" ><?php echo $value["brand_name"] ?></option>
<?php } } ?>

</select>
</div>

<div class="col-lg-12 mt-10" >
<div class="form-inner">
<button class="primary-btn2" style="margin-top: 10px;" type="submit">Add category</button>
</div>
</div>
</form>
<p class="message"></p>
</div>
</div>

<div class="col-lg-8">
<div class="add_admin_user">
<table width="100%" cellspacing="0" cellpadding="0">
  <tbody><tr>
    <td class="head15699">Model name</td>
    <td class="head15699">Brand name</td>
    <td class="head15699 ter156478"></td>
  </tr>
  <tbody id="model_categories_list">

</tbody>

</tbody>
</table>
</div>
</div>
</div>
</div>

<div class="col-lg-12" id="tb3" style="display:none;">
<div class="row">
<div class="col-lg-4">
<div class="row">
  <form name="fuel_form" id="fuel_form" >
<div class="col-lg-12 add_sty1 mt-2">
<label>Type fuel name</label>
<input name="fuel_name" id="fuel_name" value="" type="text">
</div>

<div class="col-lg-12 mt-0">
<div class="form-inner">
<button class="primary-btn2" type="submit">Add category</button>
</div>
</div>
</form>
<p class="message"></p>
</div>
</div>

<div class="col-lg-8">
<div class="add_admin_user">
<table width="100%" cellspacing="0" cellpadding="0">
  <tbody><tr>
    <td class="head15699">Fuel name</td>
    <td class="head15699 ter156478"></td>
  </tr>
  <tbody id="fuel_categories_list">

</tbody>


</tbody>
</table>
</div>
</div>
</div>
</div>

<div class="col-lg-12" id="tb8" style="display:none;">
<div class="row">
<div class="col-lg-4">
<div class="row">
  <form name="equipment_form" id="equipment_form" >
<div class="col-lg-12 add_sty1 mt-2">
<label>Equipment name</label>
<input name="equipment_name" id="equipment_name" value="" type="text">
</div>

<div class="col-lg-12 mt-0">
<div class="form-inner">
<button class="primary-btn2" type="submit">Add category</button>
</div>
</div>
</form>
<p class="message"></p>
</div>
</div>

<div class="col-lg-8">
<div class="add_admin_user">
<table width="100%" cellspacing="0" cellpadding="0">
  <tbody><tr>
    <td class="head15699">Equipment name</td>
    <td class="head15699 ter156478"></td>
  </tr>
  <tbody id="equipment_categories_list">

</tbody>


</tbody>
</table>
</div>
</div>
</div>
</div>




<div class="col-lg-12" id="tb4" style="display:none;">
<div class="row">
<div class="col-lg-4">
<div class="row">
<form name="year_form" id="year_form" >
<div class="col-lg-12 add_sty1 mt-2">
<label>Type model year name</label>
<input name="year_name" value="" type="text">
</div>

<div class="col-lg-12 mt-0">
<div class="form-inner">
<button class="primary-btn2" type="submit">Add category</button>
</div>
</div>
</form>
<p class="message"></p>
</div>
</div>

<div class="col-lg-8">
<div class="add_admin_user">
<table width="100%" cellspacing="0" cellpadding="0">
  <tbody><tr>
    <td class="head15699">Model year</td>
    <td class="head15699 ter156478"></td>
  </tr>
  <tbody id="year_categories_list">

</tbody>

</tbody>
</table>
</div>
</div>
</div>
</div>

<div class="col-lg-12" id="tb5" style="display:none;">
<div class="row">
<div class="col-lg-4">
<div class="row">
<form name="buy_method_form" id="buy_method_form" >
<div class="col-lg-12 add_sty1 mt-2">
<label>Type buy method</label>
<input name="buy_method_name" id="buy_method_name" value="" type="text">
</div>

<div class="col-lg-12 mt-0">
<div class="form-inner">
<button class="primary-btn2" type="submit">Add category</button>
</div>
</div>
</form>
<p class="message"></p>
</div>

</div>

<div class="col-lg-8">
<div class="add_admin_user">
<table width="100%" cellspacing="0" cellpadding="0">
  <tbody><tr>
    <td class="head15699">Buy method name</td>
    <td class="head15699 ter156478"></td>
  </tr>

  <tbody id="buy_method_categories_list">

</tbody>


</tbody>
</table>
</div>
</div>
</div>
</div>

<div class="col-lg-12" id="tb6" style="display:none;">
<div class="row">
<div class="col-lg-4">
<div class="row">
<form name="body_form" id="body_form">
<div class="col-lg-12 add_sty1 mt-2">
<label>Type Body</label>
<input name="body_name" id="body_name" value="" type="text">
</div>

<div class="col-lg-12 mt-0">
<div class="form-inner">
<button class="primary-btn2" type="submit">Add category</button>
</div>
</div>
</form>
<p class="message"></p>
</div>

</div>

<div class="col-lg-8">
<div class="add_admin_user">
<table width="100%" cellspacing="0" cellpadding="0">
  <tbody><tr>
    <td class="head15699">Body name</td>
    <td class="head15699 ter156478"></td>
  </tr>
  <tbody id="body_categories_list">

</tbody>

</tbody>
</table>
</div>
</div>
</div>
</div>

<div class="col-lg-12" id="tb7" style="display:none;">
<div class="row">
<div class="col-lg-4">
<form name="engine_form" id="engine_form">
<div class="row">
  
<div class="col-lg-12 add_sty1 mt-2">
<label>Type engine name</label>
<input name="engine_name" id="engine_name" value="" type="text">
</div>

<div class="col-lg-12 mt-0">
<div class="form-inner">
<button class="primary-btn2" type="submit">Add category</button>
</div>
</div>
</div>
</form>
<p class="message"></p>
</div>

<div class="col-lg-8">
<div class="add_admin_user">
<table width="100%" cellspacing="0" cellpadding="0">
  <tbody><tr>
    <td class="head15699">Engine name</td>
    <td class="head15699 ter156478"></td>
  </tr>
  <tbody id="engine_categories_list">

</tbody>

</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>