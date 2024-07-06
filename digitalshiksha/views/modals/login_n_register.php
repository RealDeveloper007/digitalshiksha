<link href="<?php echo base_url('assets/css/popup.css') ?>" rel="stylesheet" media="screen">
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<!-- Popup Login-->
<div id="login" class="well my-popup loginPopup widthPopup">
  <h4>Login</h4>
  <?php echo form_open(base_url('login'), 'role="form" class="form-horizontal"'); ?>
  <div class="popup-form">
    <div class="col-xs-12 nopadding">
      <?php echo form_input('user_email', '', 'placeholder="Email address / Phone No" class="form-control input" required="required"') ?>
      <?php echo form_password('user_pass', '', 'placeholder="Password" class="form-control input" required="required"') ?>
    </div>
  </div>
  <div class=" col-xs-12 nopadding mb15">
    <?php echo form_submit('submit', 'Login', 'class="btn btn-warning btn-block"') ?>
  </div>
  <i class="glyphicon glyphicon-question-sign"> </i> <a href="<?= base_url('forgot-password'); ?>"> Forgot Password?</a>
  <div class=" col-xs-12 popup-bottom">
    <button type="reset" class=" btn btn-sm btn-default">Reset</button>
    <button class="login_close btn btn-sm btn-default pull-right">Close</button>
  </div>
  <?php echo form_close() ?>
</div>

<!-- Popup Register-->
<div id="register" class="well my-popup" style="max-width:44em;">
  <h4>Register</h4>
  <div class="message_area"></div>
  <?php echo form_open(base_url('login_control/register_ajax'), 'role="form" class="form-horizontal" id="registerForm" autocomplete="off"'); ?>
  <?= form_hidden('token', time()); ?>
  <?= form_hidden('type'); ?>
  <div class="popup-form">

              <div class="order-container">
                  <div class="order-options">
                      <div class="option signinform" data-loader="" data-radio="student">
                      <?= form_radio('user_type', 'student', null, 'required="required" class="login-item signinform" checked') ?>
                        <b>Student</b>
                        </div>
                      <div class="option signinform" data-loader="" data-radio="teacher">
                          <?= form_radio('user_type', 'teacher', null, 'class="login-item signinform" required="required"') ?>
                          <b>Teacher</b>
                      </div>
                  </div>
              </div>
    <div class="col-xs-12 nopadding">
      <label>OTP on mobile.</label>
      <?= form_radio('sending_type', 'mobile', null, 'placeholder="OTP on mobile" required="required" checked') ?>

      <label>OTP on email.</label>
      <?= form_radio('sending_type', 'email', null, 'placeholder="OTP on email" required="required"') ?>

      <?= form_hidden('token_data', '', 'id="token_data" class="form-control" required="required"') ?>

    </div>
    <?= form_input('user_phone', '', 'id="user_phone" pattern="^(\(?\+?[0-9]*\)?)?[0-9_\- \(\)]*$" title="Enter Valid Phone Number" minlength="10" maxlength="10" placeholder="Enter 10 digits Phone Number without +91 code" class="form-control" required="required"') ?>

    <?= form_input('user_email', '', 'pattern="^[a-zA-Z0-9.!#$%&' . "'" . '*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$" title="Please enter the correct mail id" placeholder="Enter Vaild Email address *" class="form-control" required="required"') ?>

    <div class="otp_div" style="display:none;"> </div>
    <?php echo form_button('button', 'Send OTP', 'id="send_otp" class="btn btn-primary btn-block"') ?>


    <div class="other_fields">
      <?php echo form_input('first_name', '', 'placeholder="First Name " class="form-control" required="required"') ?>
      <?php echo form_input('last_name', '', 'placeholder="Last Name " class="form-control" required="required"') ?>
      <?php echo form_password('user_pass', '', 'placeholder="Password * (Minimum 6 character)" class="form-control" required="required"') ?>

      <?php echo form_password('user_passcf', '', 'placeholder="Confirm Password * (Minimum 6 character)" class="form-control" required="required"') ?>
      <div class="g-recaptcha" data-sitekey="6LfCe_kpAAAAAAWi9d1lL1sliIpN97oIVmJlCypc"></div>

    </div>


    <p class="text-muted">* All fields are required.</p>
  </div>
  <div class=" col-xs-12 nopadding mb15 other_fields">
    <?php echo form_button('submit', 'Final Submit', 'id="register_button" class="btn btn-warning btn-block"') ?>
  </div>
  <div class=" col-xs-12 popup-bottom">
    <!-- <button type="reset" class=" btn btn-sm btn-default">Reset</button> -->
    <button class="register_close btn btn-sm btn-default pull-right">Close</button>
  </div>
  <?php echo form_close() ?>
</div>

<script src="<?php echo base_url('assets/js/jquery.popupoverlay.js') ?>"></script>