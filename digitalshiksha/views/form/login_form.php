<style type="text/css">
    section#contact {
        display: none;
    }
</style>
<section id="login" class="loginPage secPad">
    <div class="container">
        <div class="box">
            <div class="row">
                <div class="col-md-12">
                    <div class="boxInner boxError">
                        <?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                        <span style="font-weight: bold;"><?= (isset($message)) ? $message : ''; ?></span>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="boxInner">
                        <i class="fa fa-user fnew"></i>
                        <h3>Login</h3>
                        <?= form_open(base_url('login'), 'role="form" class="form-horizontal"'); ?>
                        <?= form_input('user_email', '', 'id="user_email" type="email" placeholder="Email address/Phone No" class="form-control" required="required"') ?>
                        <?= form_password('user_pass', '', 'id="user_pass" placeholder="Password" class="form-control" required="required"') ?>
                        <button type="submit" class="btn btn-warning btn-lg btn-block">Login</button>
                        <?= form_close() ?>

                        <div class="text-center loginBt">
                            <div>
                                <i class="glyphicon glyphicon-question-sign"> </i>
                                <a href="<?= base_url('forgot-password'); ?>"> Forgot Password.</a>
                            </div>
                            <?php if ($this->session->userdata('student_can_register')) {  ?>
                                New user? <a href="#register" class="register_open" style="background-color: transparent !important;
    border-color: transparent !important;">Register</a> from here.
                            <?php } ?>
                        </div>
                    </div><!--/.center-->
                </div>
            </div>
        </div>
    </div>
</section><!--/#login-->