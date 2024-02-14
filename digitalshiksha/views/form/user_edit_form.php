<style>
    .form-horizontal .form-group {
     margin-left: 0px;
     margin-right: 0px;
}
</style>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <?php echo form_open(base_url() . 'user_control/edit_user', 'role="form" class="form-horizontal"'); ?>
            <div class="row">
                <?php
                if (isset($message) && $message != '') {
                    echo $message;
                }
                ?>
                <h4>Edit new user</h4>
            </div>
            <hr/>
            <div class="row">
                <div class="col-xs-offset-1 col-xs-10">
                    <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                  <label for="user_name" class="col-sm-2 control-label col-xs-2">User Name: *</label>
                  <div class="col-xs-6">
                  <?php echo form_hidden('user_id',$user_details->user_id, 'placeholder="User ID" class="form-control" required="required"') ?>
                      <?php echo form_input('user_name',$user_details->user_name, 'placeholder="User Name" class="form-control" required="required" disabled') ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="user_email" class="col-sm-2 control-label col-xs-2">Email: *</label>
                  <div class="col-xs-6">
                      <?php echo form_input('user_email',$user_details->user_email, 'pattern="^[a-zA-Z0-9.!#$%&'."'".'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$" title="you@domain.com" placeholder="Email address" class="form-control" required="required"') ?>
                  </div>
                </div>

                <div class="form-group">
                  <label for="user_phone" class="col-sm-2 control-label col-xs-2">Phone:</label>
                  <div class="col-xs-6">
                      <?php echo form_input('user_phone',$user_details->user_phone, 'pattern="^(\(?\+?[0-9]*\)?)?[0-9_\- \(\)]*$" title="Enter Valid Phone Number" min="8" max="15" placeholder="Phone Number" class="form-control"') ?>
                  </div>
                </div>
                  <?php
                  $option = array();
                  $option[0] = 'User Type';
                  foreach ($user_role as $value) {
                      if ($value->user_role_id > $this->session->userdata('user_role_id')) {
                          $option[$value->user_role_id] = $value->user_role_name;
                      }
                  }
                  ?>
                <div class="form-group">
                  <label for="user_role" class="col-sm-2 control-label col-xs-2">Role: *</label>
                  <div class="col-xs-6">
                      <?php echo form_dropdown('user_role', $option,$user_details->user_role_id,'class="form-control" disabled') ?>
                  </div>
                </div>

                <div class="form-group">
                  <label for="user_role" class="col-sm-2 control-label col-xs-2">Assign Category: *</label>
                  <div class="col-xs-6">
                    <?php 
                    $AssignCategories = explode(',',$user_details->assign_categories);
                    echo form_dropdown('assign_categories[]', $opt_category,$AssignCategories, 'id="parent-category" class="form-control" multiple') ?>
                </div>
                </div>


                <div class="form-group">
                  <label class="col-xs-offset-3 col-sm-8 col-xs-offset-2 col-xs-9">
                      <p class="text-muted">* Required fields.</p>
                  </label>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-offset-1 col-sm-offset-2 col-xs-4">
                    <button type="submit" class="btn btn-primary col-xs-6" onclick="return confirm('Are you sure you want to update details?');">Save</button>&nbsp;
                    <button type="reset" class="btn btn-default">Reset</button>
                </div>
            </div>
            <?php echo form_close() ?>
            <br/>
        </div>
    </div> <!-- /.row -->
</div> <!-- /.container -->
<br/><br/>
    
