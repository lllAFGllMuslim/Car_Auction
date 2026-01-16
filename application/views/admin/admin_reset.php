<div class="signUp-modal box_shad mkp559" id="logInModal01" tabindex="-1" aria-labelledby="logInModal01Label" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="logInModal01Label">Reset Password</h4>

</div>
<div class="modal-body">
<form name="resetform" id="resetform">
<div class="row g-4 mt-1">
<div class="col-md-12">
<div class="form-inner">
<label>Enter new password*</label>
<input type="password" name="newpassword" id="newpassword"  >
</div>
</div>
<div class="col-md-12">
<div class="form-inner">
<label>Re enter new password*</label>
<input type="password" name="confirmnewpassword" id="confirmnewpassword"  >
</div>
</div>
<div class="col-md-12">
<div class="form-inner">
<button class="primary-btn2" type="submit">Reset Password</button>
</div>
</div>
</div>
      <input type="hidden" name="token" value="<?php echo $token; ?>">
</form>
<br/>
<p class="message"></p>
</div>
</div>
</div>
</div>