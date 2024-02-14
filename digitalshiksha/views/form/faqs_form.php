<?php //echo "<pre/>"; print_r($notice); exit(); ?>
<?php 
if ($message) { 
    echo $message;
}
?>
<!-- block -->
<div class="block">
    <div class="navbar block-inner block-header">
        <div class="row"><p class="text-muted">ADD FAQ</p></div>
    </div>
    <div class="block-content">
    <form action="<?php echo base_url('faqs/save')?>" method="post" role="form" class="form-horizontal">  
    <div class="row">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-xs-offset-1 col-xs-10">
                <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
            </div>
        </div>
        <div class="row">
		  <div class="form-group">
                <label for="question" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">Question: </label>
                <div class="col-lg-6 col-sm-8 col-xs-7 col-mb">
                    <div class="input-group">
                        <input type="text" name="faq_ques" id="faq_ques" class="form-control" style="width: 278%;" />                      
                    </div>
                </div>
            </div>
			  <div class="form-group">
                <label for="answers" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile" style="padding-top: 50px;">Answers: </label>
                <div class="col-lg-6 col-sm-8 col-xs-7 col-mb">
                  <?php 
                    $data = array(
                        'name'        => 'faq_ans',
                        'id'          => 'faq_ans',
                        'rows'        => '4',
						'placeholder' => 'Answers',
                        'class'       => 'form-control textarea-wysihtml5',
                        'required' 	  => 'required',
                    ); ?>
                    <?php echo form_textarea($data) ?>
                </div>
            </div>
			
             <div class="row">
                <div class="col-xs-offset-1 col-xs-11 col-sm-offset-2 col-md-8">
                    <button type="submit" class="btn btn-primary col-xs-5 col-sm-3">Save</button>

                </div>
            </div>
            </div>
            </form>	
        </div>
    </div>
    </div>
    </div>
</div>
<?=$this->load->view('plugin_scripts/bootstrap-wysihtml5');?>
