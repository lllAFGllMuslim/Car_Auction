<div class="signUp-modal box_shad mkp559" id="logInModal01" tabindex="-1" aria-labelledby="logInModal01Label" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="logInModal01Label">Log In</h4>
</div>
<div class="modal-body">
<form id="adminloginform" >
<div class="row g-4 mt-1">
<div class="col-md-12">
<div class="form-inner">
<label>Email Address</label>
<input id="email_address" name="email_address" type="email" >
</div>
</div>
<div class="col-md-12">
<div class="form-inner">
<label>Password</label>
<input id="password" name="password" type="password" >
<i class="bi bi-eye-slash" id="togglePassword3"></i>
</div>
</div>
<div class="col-lg-12">
<div class="form-agreement form-inner d-flex justify-content-between flex-wrap">
<div class="form-group">
<input type="checkbox" id="html">
<label for="html">Remember Me</label>
</div>
<a href="<?php echo base_url('admin/forgetpassword'); ?>"  class="forgot-pass">Forget Password?</a>
</div>
</div>
<div class="col-md-12">
<div class="form-inner">
<button class="primary-btn2" type="submit">Log In</button>
</div>
</div>
</div>
</form>
<p class="message"></p>
</div>
</div>
</div>
</div>