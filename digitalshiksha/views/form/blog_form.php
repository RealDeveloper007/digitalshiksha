<?php date_default_timezone_set($this->session->userdata['time_zone']); ?>
<?php 
if ($message) { 
    echo $message;
}
?>
<!-- block -->
<?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '';?>   
<script src="<?php echo base_url('assets/js/'); ?>/ckeditor/ckeditor.js"></script>

<div class="block">
    <div class="navbar block-inner block-header">
        <div class="row"><p class="text-muted">Add Post </p></div>
    </div>
    <div class="block-content custom">
    <form action="<?=base_url().'blog/save'?>" method="post" id="ajax-form" role="form" class="form-horizontal" enctype="multipart/form-data">  
    <div class="row">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-xs-offset-1 col-xs-10">
                <?=validation_errors('<div class="alert alert-danger">', '</div>'); ?>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="title" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">Title: </label>
                <div class="col-lg-6 col-sm-8 col-xs-7 col-mb">
                    <?=form_input('blog_title', set_value('blog_title'), 'placeholder="Blog title" id="title" class="form-control" required="required"') ?>
                </div>
            </div>

            <div class="form-group">
                <label for="slug" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">Slug: </label>
                <div class="col-lg-6 col-sm-8 col-xs-7 col-mb">
                    <?=form_input('blog_slug', set_value('blog_slug'), 'placeholder="Blog Slug" id="title" class="form-control" required="required"') ?>
                </div>
            </div>
           <div class="form-group">
                <label for="title" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">Short Description: </label>
                 <div class="col-lg-9 col-sm-9 col-xs-7 col-mb">
                  <?php 
                    $data = array(
                        'name'        => 'blog_short_body',
                        'id'          => 'blog_short_body',
                        'rows'        => '5',
                        'class'       => 'form-control',
                        'required' => 'required',
                    ); ?>
                    <?php echo form_textarea($data) ?>
                </div>
            </div>
            <div class="form-group" id="media-choose">
                <label for="upload-media-file" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">Upload File: </label>
                <div class="col-lg-5 col-sm-8 col-xs-7 col-mb">
                    <a href="#" class="btn btn-default" id='upload-media-file'>Choose</a>
                </div>
            </div>
            <div id="media-option"></div>
            <div id="media-field"></div>
            <div class="form-group">
                <label for="post_descr" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile" style="padding-top: 50px;">Content : </label>
                <div class="col-lg-9 col-sm-9 col-xs-7 col-mb">
                  <?php 
                    $data = array(
                        'name'        => 'post_descr',
                        'placeholder' => 'Use < p> or < span> tag for paragraphs',
                        // 'id'          => 'post_descr',
                        'value'       => '',
                        'rows'        => '15',
                        'class'       => 'form-control ckeditor',
                        'required' => 'required',
                    ); ?>
                    <?=form_textarea($data) ?>
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
<script>

$('#upload-media-file').click(function(){
    var type = '<div class="form-group">'
                +'<label for="media_type" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">Media Type: </label>'
                +'<div class="col-lg-5 col-sm-8 col-xs-7 col-mb" style="margin-top: 5px;">'
                       
                        +'<input type="radio" value="file" name="media_type" required="required" onclick="add_media_field(this.value)"> <span>File </span>&nbsp;&nbsp;&nbsp;&nbsp;'
                        +'<input type="radio" value="image" name="media_type" required="required" onclick="add_media_field(this.value)"> <span>Image </span>&nbsp;&nbsp;&nbsp;&nbsp;'
                        +'<input type="radio" value="video" name="media_type" required="required" onclick="add_media_field(this.value)"> <span>YouTube Video URL </span>&nbsp;&nbsp;&nbsp;&nbsp;'
                       
                +'</div>'
            +'</div>';
    $('#media-choose').hide();
    $('#media-option').append(type);
})

function add_media_field(val) {
    var field = '<div class="form-group">'
                +'<label for="media_field" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">Add Media: </label>'
                +'<div class="col-lg-5 col-sm-8 col-xs-7 col-mb"><input type="hidden" name="media_type" value="'+val+'">';
    if (val == 'file') {
            var types = 'pdf';
    }else if (val == 'image') {
            var types = 'gif | jpg | png';
    };

    switch(val){
        case 'image':
        case 'file':
            field += '<input type="file" id="media" name="media" style="margin-top:8px;">';
            field += '<p class="help-block"><i class="glyphicon glyphicon-warning-sign"></i> Allowed types = '+ types +'.</p>';
        
            break;
    }
     if(val=='video'){
          field += '<textarea id="media" name="media" class="form-control" placeholder="Youtube Embed Code" style="margin-top:8px;"></textarea>';
    }
    field +='</div></div>';

    $('#media-option').hide();
    $('#media-field').append(field);
}

CKEDITOR.replace('post_descr', {
    filebrowserBrowseUrl : '<?= base_url('assets/js/ckeditor/kcfinder/browse.php?opener=ckeditor&type=files') ?>',
    filebrowserUploadUrl : '<?= base_url('assets/js/ckeditor/kcfinder/browse.php?opener=ckeditor&type=files') ?>',
    filebrowserImageBrowseUrl : '<?= base_url('assets/js/ckeditor/kcfinder/browse.php?opener=ckeditor&type=images') ?>',
    filebrowserImageUploadUrl : '<?= base_url('assets/js/ckeditor/ckeditor/kcfinder/upload.php?opener=ckeditor&type=images') ?>'   
});
</script>
                        <?= $this->load->view('plugin_scripts/bootstrap-wysihtml5'); ?>
