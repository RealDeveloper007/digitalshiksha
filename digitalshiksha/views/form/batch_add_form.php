<style>
    .form-horizontal .form-group {
     margin-left: 0px;
     margin-right: 0px;
}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <?php echo form_open(base_url() . 'admin_control/save_new_batch', 'role="form" class="form-horizontal"'); ?>
            <div class="row">
                <?php
                if (isset($message) && $message != '') {
                    echo $message;
                }
                ?>
                <h4>Add new batch</h4>
            </div>
            <hr/>
            <div class="row">
                <div class="col-xs-offset-1 col-xs-10">
                    <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                  <label for="user_name" class="col-sm-2 control-label col-xs-2">Batch Name: *</label>
                  <div class="col-xs-6">
                      <?php echo form_input('batch_name', '', 'placeholder="Batch Name" class="form-control" required="required"') ?>
                  </div>
                </div>
               
                <div class="form-group">
                  <label for="user_name" class="col-sm-2 control-label col-xs-2">Batch Code: *</label>
                  <div class="col-xs-6">
                      <?php echo form_input('batch_code', '', 'placeholder="Batch Code" class="form-control" required="required"') ?>
                  </div>
                </div>
    
                 <!--  <?php
                  $studentsDropDown = array();
                  foreach ($students as $student) {
                          $studentsDropDown[$student->user_id] = $student->user_name;
                  }
                  ?>
                <div class="form-group">
                  <label for="user_role" class="col-sm-2 control-label col-xs-2">Batch Students: *</label>
                  <div class="col-xs-6">
                      <?php echo form_dropdown('students[]', $studentsDropDown,'','id="parent-category" class="form-control" multiple') ?>
                  </div>
                </div> -->
                <div class="form-group">
                  <label for="user_role" class="col-sm-2 control-label col-xs-2">Batch Students: *</label>
                  <div class="col-xs-6">
                      <?php echo form_input('students','','id="skill_input" class="form-control" required="required"') ?>
                  </div>
                </div>

                  <div class="form-group">
                  <label for="user_role" class="col-sm-2 control-label col-xs-2">Batch Status: *</label>
                  <div class="col-xs-6">
                      <?php echo form_dropdown('status', ['In-Active','Active'],'','class="form-control"') ?>
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
                    <button type="submit" class="btn btn-primary col-xs-6">Save</button>&nbsp;
                    <button type="reset" class="btn btn-default">Reset</button>
                </div>
            </div>
            <?php echo form_close() ?>
            <br/>
        </div>
    </div> <!-- /.row -->
</div> <!-- /.container -->
<br/><br/>
<link href="<?php echo base_url('assets/css/token-input.css') ?>" rel="stylesheet" media="screen">
<script src="<?php echo base_url('assets/js/jquery.tokeninput.js') ?>"></script>   
<script>
        // $('#parent-category').select2();

        $(document).ready(function() {
            $("#skill_input").tokenInput("<?= base_url('admin_control/get_student_detail')?>", {
                hintText: "Search Student here...",
                noResultsText: "Student not found.",
                searchingText: "Searching...",
                minChars: 3,
                tokenLimit: 2
            });
        });

</script>