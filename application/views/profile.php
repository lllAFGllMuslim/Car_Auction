<div class="product-page pt-40 mb-20">
<div class="container">
<div class="row g-xl-4 gy-5">

<div class="col-xl-3">

<?php $this->load->view('admin/admin_sidebar'); ?>

</div>
<div class="col-xl-9">
  <form action="" id="profileform" name="profileform" >
<div class="row g-4 mb-40">
<div class="col-lg-12">
<div class="add_new_car_head">Profil</div>
</div>
<div class="col-lg-12">
<div class="add_photo_net1">Profile photo</div>
<div class="add_imk_car"><input  name="profile_photo" id="profle_photo" type="file"></div>
<div class="add_imk_car2" id="profile_photo_preview" <?php if(empty($profile['profle_photo_id'])){ ?> style="display: none;" <?php } ?> style="background-image:url(<?php if(!empty($profile['profle_photo_id'])){echo get_image_path_by_id($profile['profle_photo_id']);  } ?>);"><a id="remove_profile_photo" href="javascript:;"><i class="fa fa-close"></i></a></div>
</div>
<div class="col-lg-6 add_sty1">
<label>First name</label>
<input name="first_name" id="first_name" type="text" value="<?php echo $profile['first_name']; ?>" >
</div>
<div class="col-lg-6 add_sty1">
<label>Last name</label>
<input name="last_name" id="last_name" type="text" value="<?php echo $profile['last_name']; ?>" >
</div>
<div class="col-lg-4 add_sty1">
<label>Email address</label>
<input name="email_address" id="email_address" type="text" value="<?php echo $profile['email']; ?>">
</div>
<div class="col-lg-4 add_sty1">
<label>Phone number</label>
<input name="phone_number" id="phone_number" type="text" value="<?php echo $profile['phone_number']; ?>">
</div>
<div class="col-lg-4 add_sty1">
<label>Social security number</label>
<input name="social_security_number" id="social_security_number" type="text" value="<?php echo $profile['social_security_number']; ?>">
</div>
<div class="col-lg-4 add_sty1">
<label>Company name</label>
<input name="company_name" id="company_name" type="text" value="<?php echo $profile['company_name']; ?>">
</div>
<div class="col-lg-4 add_sty1">
<label>Company registration number</label>
<input name="registration_number" id="registration_number" type="text" value="<?php echo $profile['registration_number']; ?>">
</div>
<div class="col-lg-4 add_sty1">
<label>Country</label>
<select name="country" id="country">

<option value="" >Select country</option>
<?php 
if(!empty($countries)){
 foreach ($countries as $count) {
?>
<option <?php if($profile['country']==$count->country_code){ echo"selected"; } ?> value="<?php echo $count->country_code; ?>" ><?php echo $count->country_name; ?></option>
<?php 
 }  
}
?>
</select>
</div>
<div class="col-lg-4 add_sty1">
<label>State</label>
<input name="state" id="state" type="text" value="<?php echo $profile['state']; ?>">
</div>

<div class="col-lg-4 add_sty1">
<label>City</label>
<input name="city" id="city" type="text" value="<?php echo $profile['city']; ?>">
</div>
<div class="col-lg-4 add_sty1">
<label>Pincode</label>
<input name="pincode" id="pincode" type="text" value="<?php echo $profile['pincode']; ?>">
</div>

<div class="col-lg-12 add_sty1">
<label>Address</label>
<input name="address" id="address" type="text" value="<?php echo $profile['address']; ?>">
</div>


<div class="col-lg-6 add_sty1">
<label>Change password</label>
<input type="password" name="change_password" id="change_password" type="text">
<i class="bi bi-eye-slash" id="togglePassword"></i>
</div>
<div class="col-lg-6 add_sty1">
<label>Confirm password</label>
<input type="password" name="confirm_password" id="confirm_password" type="text">
<i class="bi bi-eye-slash" id="togglePassword2"></i>
</div>
<div class="col-lg-12 mt-0">
<button type="submit" class="primary-btn3">Update Profile</button>
<input type="hidden" name="profle_photo_id" id="profle_photo_id" value="<?php echo $profile['profle_photo_id']; ?>" />
<input type="hidden" name="user_id" id="user_id" value="<?php echo $this->session->userdata('user_id'); ?>" />
</div>
</div>
</form>
<p class="message"></p>
</div>


</div>
</div>
</div>

<style>

#togglePassword, #togglePassword2 {
   display:none;}
    
</style>
