<style type="text/css">
    section#contact{
        display: none;
    }
</style>
<section id="login" class="loginPage secPad">
    <div class="container">
        <div class="box">
            <div class="row">
                <div class="col-md-12">
                    <div class="boxInner boxError"> 
                        <?=validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                        <?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>        
                        <?=(isset($message)) ? $message : ''; ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="boxInner"> 
                        <i class="fa fa-user fnew"></i>
                        <h3>Register</h3> 
                        <?=form_open(base_url('login_control/register'), 'role="form" class="form-horizontal"'); ?>
                            <div class="row">
                                <div class="col-md-12 ">
                                    <?=form_hidden('token', time()); ?>
                                    <?=form_input('user_name', '', 'id="user_name" placeholder="User Name *" class="form-control" required="required"') ?>
                                    <?=form_input('user_email', '', 'id="user_email" type="email" pattern="^[a-zA-Z0-9.!#$%&'."'".'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$" title="you@domain.com" placeholder="Email address *" class="form-control" required="required"') ?>
                                    <?=form_input('user_phone', '', 'id="user_phone" pattern="^(\(?\+?[0-9]*\)?)?[0-9_\- \(\)]*$" title="Enter Valid Phone Number" minlength="10" maxlength="10" placeholder="Phone Number" class="form-control"') ?>
                                </div><!--/.col-md-12-->
                            </div><!--/.row-->
                                
                            <div class="row">
                                <div class="col-md-6 ">
                                    <?=form_password('user_pass', '', 'id="user_pass" placeholder="Password * (Minimum 6 character)" class="form-control" required="required"') ?>
                                </div>
                                <div class="col-md-6 ">
                                    <?=form_password('user_passcf', '', 'id="user_passcf" placeholder="Confirm Password *" class="form-control" required="required"') ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <button type="submit" class="btn btn-warning btn-lg btn-block">Register</button>
                                </div><!--/.col-md-11-->
                                <div class="col-md-2 ">
                                    <button type="reset" class="btn btn-default btn-lg btn-lg pull-right">Reset</button>
                                </div><!--/.col-md-1-->
                            </div><!--/.row-->
                        <?=form_close() ?>
                        <div class="text-center loginBt">
                            <i class="glyphicon glyphicon-bell"> </i> Have an account? <a href="<?=base_url('login_control'); ?>"> Login</a>
                        </div>
                    </div><!--/.center--> 
                </div><!--/.col-md-8 .col-xs-12-->
            </div><!--/.row-->
        </div><!--/.box-->
    </div><!--/.container-->
</section><!--/#login-->