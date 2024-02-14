<?php //echo "<pre>"; print_r($profile_info); exit(); ?>
<style>
.form-group.setname {
    margin-right: 48% !important;
}
</style>
<div id="note">
    <?=validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>        
    <?=(isset($message)) ? $message : ''; ?>
</div>
<div class="block">  
    <div class="navbar block-inner block-header">
        <div class="row"><p class="text-muted">Profile Info </p></div>
    </div>
    <div class="block-content">
        <div class="row">
            <div class="col-xs-12">
                <div class="col-sm-4 col-md-3">
                    <ul class="proile tabbable">
                        <li class="active">
                            <a data-toggle="tab" href="#tab-1"><i class="fa fa-cog"></i> Personal info </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#tab-photo"><i class="fa fa-picture-o"></i> Upload Image</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#tab-2"><i class="fa fa-lock"></i> Change Password</a>
                        </li>
<!--
                        <li>
                            <a data-toggle="tab" href="#tab-3"><i class="fa fa-lock"></i> Subscription</a>
                        </li>
-->
                    </ul>
                </div>
                <div class="col-sm-8 col-md-9 proile-info">
                    <div class="row">&nbsp;</div>
                    <div class="tab-content">
                        <div id="tab-3" class="tab-pane">
                        <?php if ($profile_info->subscription_id) { ?>
                            <?php $package = $this->db->get_where('price_table', array('price_table_id' => $profile_info->subscription_id))->row()->price_table_title; ?>
                            <p class="lead">You are subscribed in "<?=$package; ?>" package.</p>
                                <p>Subscription will expire on <?=date('F d, Y',$profile_info->subscription_end)?></p>                            
                        <?php }else{ ?>
                            <p class="lead">Currently you have not subscribed in package. </p>
                            <a href="<?=base_url('guest/pricing') ?>" class="btn btn-default"> Subscribe Now</a>
                        <?php } ?>
                        </div>

                        <div id="tab-photo" class="tab-pane">
                            <?= form_open_multipart(base_url('admin_control/upload_image'), 'role="form" class="form-horizontal"'); ?>
                            <div class="form-group">
                                <label for="password" class="col-sm-3 control-label invisible-on-sm">Upload Photo: </label>
                                <div class="col-sm-9">

                                    <input type="file" name="user_photo" class="form-control" required="required" />

                                </div>
                            </div>
                            <?php if($profile_info->user_photo) { ?>
                             <div class="form-group" style="text-align: center;">
                                <img src="<?= base_url('user-avatar/'.$profile_info->user_photo) ?>" class="img-rounded" width="100px">
                             </div>
                         <?php } ?>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                            <?= form_close() ?>
                        </div>

                        <div id="tab-2" class="tab-pane">
                            <?= form_open(base_url('admin_control/change_password'), 'role="form" class="form-horizontal"'); ?>
                            <div class="form-group">
                                <label for="password" class="col-sm-3 control-label invisible-on-sm">Current Password: </label>
                                <div class="col-sm-9">
                                    <?= form_password('old-pass', '', 'placeholder="Old Password" class="form-control" required="required"') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-3 control-label invisible-on-sm">New Password: </label>
                                <div class="col-sm-9">
                                    <?= form_password('new-pass', '', 'placeholder="New Password" class="form-control" required="required"') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-3 control-label invisible-on-sm">Re-type New Password: </label>
                                <div class="col-sm-9">
                                    <?= form_password('re-new-pass', '', 'placeholder="Re-type New Password" class="form-control" required="required"') ?>
                                </div>
                            </div><br/>                         
                            <hr/>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Change Password</button>
                                </div>
                            </div>
                            <?= form_close() ?>
                        </div>

                        <div id="tab-1" class="tab-pane active">
                        <?php echo form_open(base_url() . 'admin_control/update_profile', 'role="form" class="form-horizontal"'); ?>
                       

                            <div class="form-group">
                                <label class="col-md-2 col-xs-3 control-label">Name: </label>
                                <div class="col-md-10 col-xs-9">
                        <?php echo form_input('user_name',$profile_info->user_name, 'placeholder="Name" class="form-control" required="required"') ?>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-xs-3 control-label">Phone: </label>
                                <div class="col-md-10 col-xs-9">
                                    <p class="form-control-static">
                        <?php echo form_input('user_phone',$profile_info->user_phone, 'placeholder="Phone" class="form-control" required="required"') ?>
                                    </p>
                                </div>
                            </div>                       
                            <div class="form-group">
                                <label class="col-md-2 col-xs-3 control-label">Email: </label>
                                <div class="col-md-10 col-xs-9">
                        <?php echo form_input('user_email',$profile_info->user_email, 'placeholder="Email" class="form-control" required="required"') ?>
                                </div>
                            </div>                       
                            <div class="form-group">
                                <label class="col-md-2 col-xs-3 control-label">Role: </label>
                                <div class="col-md-10 col-xs-9">
                                <?php echo form_input('role',$profile_info->user_role_name, 'placeholder="Role" class="form-control" required="required" disabled') ?>
                                </div>
                            </div>  

                              <div class="form-group">
                                <label class="col-md-2 col-xs-3 control-label">School/Institute: </label>
                                <div class="col-md-10 col-xs-9">
                                <?=form_input('school_name',$profile_info->school_name, 'class="form-control" required="required"') ?>
                                </div>
                            </div> 

                             <div class="form-group">
                                <label class="col-md-2 col-xs-3 control-label">State: </label>
                                <div class="col-md-10 col-xs-9">
                                     <?=form_dropdown('state', $states,$profile_info->state, 'class="form-control"') ?>

                                </div>
                            </div>  

                             <div class="form-group">
                                <label class="col-md-2 col-xs-3 control-label">District: </label>
                                <div class="col-md-10 col-xs-9">
                                    <?php if($district_check) { 
                                        echo form_dropdown('district', $districts,$profile_info->district, 'class="form-control"');
                                        echo form_input('district','', 'class="form-control" style="display:none" disabled');
                                     } else {
                                          echo form_input('district',$profile_info->district, 'class="form-control"');
                                        echo form_dropdown('district', $districts,$profile_info->district, 'class="form-control" style="display:none" disabled');
                                    }
                                    ?>
                                </div>
                            </div>  

                             <div class="row">
                                    <div class="col-xs-offset-1 col-sm-offset-2 col-xs-4">
                                        <button type="submit" class="btn btn-primary col-xs-6" >Save</button>&nbsp;
                                    </div>
                                </div>
            <?php echo form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--/span-->

<script>
    
    $("select option:first").attr('disabled', 'disabled');


    $('select[name="state"]').on('change',function(){
        if(this.value==1)
        {
               $('select[name="district"]').show();
               $('select[name="district"]').prop('disabled',false);
               $("select[name='district'] option:first").attr('disabled', 'disabled');

               $('input[name="district"]').hide();
               $('input[name="district"]').prop('disabled',true);

        } else if(this.value==0) {


               $('select[name="district"]').show();
               $('select[name="district"]').prop('disabled',false);
               $('select[name="district"]').val($('select[name="district"] option:first').val());
               $("select[name='district'] option:first").attr('disabled', 'disabled');

               $('input[name="district"]').hide();
               $('input[name="district"]').prop('disabled',true);


        } else {

               $('input[name="district"]').show();
               $('select[name="district"]').prop('disabled',true);

               $('select[name="district"]').hide();
               $('input[name="district"]').prop('disabled',false);

        }
    })
</script>