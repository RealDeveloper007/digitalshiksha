<section id="login">
    <div class="container">
        <div class="box">
            <div class="row">
                <div class="col-xs-10 col-xs-offset-1">
                    <?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>        
                </div>
                <div class="col-md-4 col-sm-8 col-md-offset-4 col-sm-offset-2">
                    <div class="center">
                        <h3>Reset Password</h3>
                    </div><!--/.center-->   
                    <div class="big-gap"></div>
                      <?=form_open(base_url('login_control/reset_password_by_mobile'), 'role="form" class="form-horizontal"'); ?>
                        <?=form_hidden('phone', $phone);?>
                        <?=form_hidden('key', $key);?>
                         <?=form_input('otp', '', 'placeholder="Enter the OTP" class="form-control" required="required"') ?>
                        <?=form_password('user_pass', '', 'placeholder="New Password (Minimum 6 character)" class="form-control" required="required"') ?>
                        <?=form_password('user_passcf', '', 'placeholder="Confirm New Password" class="form-control" required="required"') ?>
                        <button type="submit" class="btn btn-warning btn-lg btn-block">Reset</button>
                      <?=form_close() ?>
                      <div class="big-gap"></div>
                </div>
              </div>
            </div>
        </div> 
    </div>
</section><!--/#login-->
