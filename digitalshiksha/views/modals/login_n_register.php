<link href="<?php echo base_url('assets/css/popup.css') ?>" rel="stylesheet" media="screen">
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<!-- Popup Login-->
<div id="login" class="well my-popup loginPopup widthPopup">
  <h4><i class="fa fa-sign-in"></i> Login <button class="login_close popup-close-icon" type="button" aria-label="Close"><i class="fa fa-times"></i></button></h4>
  <?php echo form_open(base_url('login'), 'role="form" class="form-horizontal" id="loginForm"'); ?>
  <div class="popup-form">
    <!-- User Type Selection - Teacher/Student -->
    <div class="user-type-selection login-user-type">
      <label class="selection-label">I am a:</label>
      <div class="user-type-tabs">
        <label class="user-tab login-type-tab active" data-radio="5">
          <?= form_radio('user_role', '5', true, 'required="required" class="login-item" checked') ?>
          <span class="tab-icon"><i class="fa fa-book"></i></span>
          <span class="tab-text">Student</span>
        </label>
        <label class="user-tab login-type-tab" data-radio="4">
          <?= form_radio('user_role', '4', false, 'class="login-item" required="required"') ?>
          <span class="tab-icon"><i class="fa fa-user"></i></span>
          <span class="tab-text">Teacher</span>
        </label>
      </div>
    </div>
    <div class="col-xs-12 nopadding">
      <div style="position: relative;">
        <i class="fa fa-envelope"></i>
        <?php echo form_input('user_email', '', 'placeholder="Email address / Phone No" class="form-control input" required="required"') ?>
      </div>
      <div style="position: relative;">
        <i class="fa fa-lock"></i>
        <?php echo form_password('user_pass', '', 'placeholder="Password" class="form-control input" required="required"') ?>
      </div>
    </div>
    <div class="col-xs-12 nopadding mb15" style="margin-top: 20px;">
      <button type="submit" name="submit" class="btn btn-warning btn-block">
        <i class="fa fa-sign-in"></i> Login
      </button>
    </div>
    <div class="col-xs-12 nopadding" style="text-align: center; margin-top: 15px; padding: 0;">
      <a href="<?= base_url('forgot-password'); ?>" style="color: #F1B900; text-decoration: none; font-size: 14px; font-weight: 500; transition: color 0.3s ease;">
        <i class="fa fa-question-circle"></i> Forgot Password?
      </a>
    </div>
  </div>
  <?php echo form_close() ?>
</div>

<!-- Popup Register-->
<div id="register" class="well my-popup">
  <h4><i class="fa fa-user-plus"></i> Register <button class="register_close popup-close-icon" type="button" aria-label="Close"><i class="fa fa-times"></i></button></h4>
  <div class="message_area"></div>
  <?php echo form_open(base_url('login_control/register_ajax'), 'role="form" class="form-horizontal" id="registerForm" autocomplete="off"'); ?>
  <?= form_hidden('token', time()); ?>
  <?= form_hidden('type'); ?>
  <div class="popup-form">
    <!-- User Type Selection - Tabs -->
    <div class="user-type-selection">
      <label class="selection-label">I am a:</label>
      <div class="user-type-tabs">
        <label class="user-tab signinform active" data-radio="student">
          <?= form_radio('user_type', 'student', true, 'required="required" class="login-item signinform" checked') ?>
          <span class="tab-icon"><i class="fa fa-book"></i></span>
          <span class="tab-text">Student</span>
        </label>
        <label class="user-tab signinform" data-radio="teacher">
          <?= form_radio('user_type', 'teacher', false, 'class="login-item signinform" required="required"') ?>
          <span class="tab-icon"><i class="fa fa-user"></i></span>
          <span class="tab-text">Teacher</span>
        </label>
      </div>
    </div>
    
    <!-- OTP Selection -->
    <div class="otp-type-selection">
      <label class="selection-label">Receive OTP via:</label>
      <div class="selection-options">
        <label class="selection-option otp-option active">
          <?= form_radio('sending_type', 'mobile', true, 'required="required" checked') ?>
          <div class="option-content">
            <div class="option-icon">
              <i class="fa fa-mobile"></i>
            </div>
            <div class="option-text">Mobile</div>
          </div>
        </label>
        <label class="selection-option otp-option">
          <?= form_radio('sending_type', 'email', false, 'required="required"') ?>
          <div class="option-content">
            <div class="option-icon">
              <i class="fa fa-envelope"></i>
            </div>
            <div class="option-text">Email</div>
          </div>
        </label>
      </div>
      <?= form_hidden('token_data', '', 'id="token_data" class="form-control" required="required"') ?>
    </div>
    
    <div style="position: relative;">
      <i class="fa fa-phone" id="otp_input_icon"></i>
      <?= form_input('user_phone', '', 'id="user_phone" pattern="^(\(?\+?[0-9]*\)?)?[0-9_\- \(\)]*$" title="Enter Valid Phone Number" minlength="10" maxlength="10" placeholder="Enter 10 digits Phone Number" class="form-control" required="required"') ?>
    </div>

    <div style="position: relative;">
      <i class="fa fa-envelope" id="email_input_icon"></i>
      <?= form_input('user_email', '', 'id="user_email" pattern="^[a-zA-Z0-9.!#$%&' . "'" . '*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$" title="Please enter the correct mail id" placeholder="Enter Valid Email address *" class="form-control" required="required"') ?>
    </div>

    <div class="otp_div" style="display:none;"> </div>
    <?php echo form_button('button', '<i class="fa fa-paper-plane"></i> Send OTP', 'id="send_otp" class="btn btn-primary btn-block"') ?>

    <div class="other_fields">
      <div style="position: relative;">
        <i class="fa fa-user"></i>
        <?php echo form_input('first_name', '', 'placeholder="First Name *" class="form-control" required="required"') ?>
      </div>
      <div style="position: relative;">
        <i class="fa fa-user"></i>
        <?php echo form_input('last_name', '', 'placeholder="Last Name *" class="form-control" required="required"') ?>
      </div>
      <div style="position: relative;">
        <i class="fa fa-lock"></i>
        <?php echo form_password('user_pass', '', 'placeholder="Password * (Minimum 6 characters)" class="form-control" required="required"') ?>
      </div>
      <div style="position: relative;">
        <i class="fa fa-lock"></i>
        <?php echo form_password('user_passcf', '', 'placeholder="Confirm Password *" class="form-control" required="required"') ?>
      </div>
      <div class="g-recaptcha" data-sitekey="6LfCe_kpAAAAAAWi9d1lL1sliIpN97oIVmJlCypc" style="margin: 20px 0; display: flex; justify-content: center;"></div>
    </div>

  </div>
  <div class="col-xs-12 nopadding mb15 other_fields">
    <?php echo form_button('submit', '<i class="fa fa-check"></i> Final Submit', 'id="register_button" class="btn btn-warning btn-block"') ?>
  </div>
  <?php echo form_close() ?>
</div>

<script src="<?php echo base_url('assets/js/jquery.popupoverlay.js') ?>"></script>
