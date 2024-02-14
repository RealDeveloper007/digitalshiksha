<?=$this->load->view('plugin_scripts/datepicker');?>
<?php date_default_timezone_set($this->session->userdata['time_zone']); ?>
<?php 
if ($message) { 
    echo $message;
}
?>
<script src="<?php echo base_url('assets/js/'); ?>/ckeditor/ckeditor.js"></script>

<!-- block -->
<div class="block">
    <div class="navbar block-inner block-header">
        <div class="row"><p class="text-muted">Edit Long Answer Question </p></div>
    </div>
    <div class="block-content">
    <form action="<?php echo base_url().'syllabus_control/update_question'?>" method="post" id="ajax-form" role="form" class="form-horizontal">  
    <div class="row">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-xs-offset-1 col-xs-10">
                <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
            </div>
        </div>
        <div class="row">
        <div class="form-group">
                <label for="sub_cat_name" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">Question:</label>
                <div class="col-lg-5 col-sm-8 col-xs-7 col-mb">
                <?php echo form_hidden('id', $syllabus_question->id, 'placeholder="id" class="form-control" required="required"') ?>
                <?php echo form_hidden('type', $syllabus_question->type, 'placeholder="type" class="form-control" required="required"') ?>
                <?php echo form_hidden('cat_id', $syllabus_question->cat_id, 'id="cat_id" placeholder="cat_id" class="form-control" required="required"') ?>
                    <?php echo form_input('question', $syllabus_question->question, 'id="question" placeholder="Question" class="form-control" required="required"') ?>
                </div>
            </div>
            

                    <div class="form-group">
                                <label for="Description" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile" style="padding-top: 50px;">Answer : </label>
                                <div class="col-lg-6 col-sm-8 col-xs-7 col-mb">
                                    <?php
                                    $data = array(
                                        'name'        => 'url',
                                        'placeholder' => 'Answer',
                                        // 'id'          => 'url',
                                        'value'       => $syllabus_question->url, 
                                        'rows'        => '4',
                                        'class'       => 'form-control',
                                        'required' => 'required',
                                    );
                                    echo form_textarea($data);
                                    ?>
                                </div>
                            </div>

                            <?= $this->load->view('plugin_scripts/bootstrap-wysihtml5'); ?>
                            <script>
                                CKEDITOR.replace('url', {
                                    filebrowserBrowseUrl: '<?= base_url('assets/js/ckeditor/kcfinder/browse.php?opener=ckeditor&type=files') ?>',
                                    filebrowserUploadUrl: '<?= base_url('assets/js/ckeditor/kcfinder/browse.php?opener=ckeditor&type=files') ?>',
                                    filebrowserImageBrowseUrl: '<?= base_url('assets/js/ckeditor/kcfinder/browse.php?opener=ckeditor&type=images') ?>',
                                    filebrowserImageUploadUrl: '<?= base_url('assets/js/ckeditor/kcfinder/upload.php?opener=ckeditor&type=images') ?>'
                                });
                            </script>
          
            <div class="form-group">
                <label for="title" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">Status: </label>
                <div class="col-lg-6 col-sm-8 col-xs-7 col-mb">
                    <?=form_dropdown('status', array(1 => "Active", 0 => "In-Active"),$syllabus_question->status, 'placeholder="Status" class="form-control" required="required"') ?>
                </div>
            </div>
            <br/><hr/>
            <div class="row">
                <div class="col-xs-offset-1 col-xs-11 col-sm-offset-2 col-md-8">
                    <button type="submit" class="btn btn-primary col-xs-5 col-sm-3">Save</button>

                </div>
            </div>
            </form>
        </div>
    </div>
    </div>
    </div>
</div>
<?=$this->load->view('plugin_scripts/bootstrap-wysihtml5');?>
