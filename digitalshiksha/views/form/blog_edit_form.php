<?php //echo "<pre/>"; print_r($notice); exit(); ?>
<style>
iframe {
    width: 200px;
    height: 100px;
}
</style>
<?php 
if ($message) { 
    echo $message;
}
?>
<?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '';?>   
<script src="<?php echo base_url('assets/js/'); ?>/ckeditor/ckeditor.js"></script>

<!-- block -->
<div class="block">
    <div class="navbar block-inner block-header">
        <div class="row"><p class="text-muted">Edit Post </p></div>
    </div>
    <div class="block-content">
    <form action="<?php echo base_url('blog/update/'.$blog->blog_id)?>" method="post" role="form" class="form-horizontal" enctype="multipart/form-data">  
    <div class="row">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-xs-offset-1 col-xs-10">
                <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="blog_title" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">Title: </label>
                <div class="col-lg-6 col-sm-8 col-xs-7 col-mb">
                    <?php echo form_input('blog_title', $blog->blog_title, 'placeholder="Post title" id="title" class="form-control" required="required"') ?>
                </div>
            </div>
             <div class="form-group">
                <label for="slug" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">Slug: </label>
                <div class="col-lg-6 col-sm-8 col-xs-7 col-mb">
                    <?=form_input('blog_slug',$blog->blog_slug, 'placeholder="Blog Slug" id="title" class="form-control" required="required"') ?>
                </div>
            </div>
            <div class="form-group">
                <label for="title" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">Short Description: </label>
                 <div class="col-lg-9 col-sm-9 col-xs-7 col-mb">
                  <?php 
                    $data = array(
                        'name'        => 'blog_short_body',
                        'id'          => 'blog_short_body',
                        'value'       =>  $blog->blog_short_body,
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
			<label  class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">Uploaded File: </label>
			<div class="col-lg-5 col-sm-8 col-xs-7 col-mb">

			<?php
									if($blog->blog_media_type=='image') {
										echo  "<img src='".base_url('blog_files/').$blog->blog_attachment."' width='50px;'>"; 
									} else if($blog->blog_media_type=='file'){
										echo "<a href='".base_url('blog_files/').$blog->blog_attachment."' target='_blank'>View File</a>"; 
									} else {

                                        echo $blog->blog_attachment;
                                    }
                                    ?>
				            </div>
				</div>

            <div class="form-group">
                <label for="blog_body" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile" style="padding-top: 50px;">Content : </label>
                <div class="col-lg-9 col-sm-9 col-xs-7 col-mb">
                  <?php 
                    $data = array(
                        'name'        => 'blog_body',
                       // 'id'          => 'blog_body',
                        'value'       =>  $blog->blog_body,
                        'rows'        => '20',
                        'class'       => 'form-control',
                        'required' 	=> 'required',
                    );
					echo form_textarea($data);					
					?>					
                </div>
			</div>
                            <script>
                                CKEDITOR.replace('blog_body', {
                                    versionCheck : false,
                                    filebrowserBrowseUrl: '<?= base_url('assets/js/ckeditor/kcfinder/browse.php?opener=ckeditor&type=files') ?>',
                                    filebrowserUploadUrl: '<?= base_url('assets/js/ckeditor/kcfinder/browse.php?opener=ckeditor&type=files') ?>',
                                    filebrowserImageBrowseUrl: '<?= base_url('assets/js/ckeditor/kcfinder/browse.php?opener=ckeditor&type=images') ?>',
                                    filebrowserImageUploadUrl: '<?= base_url('assets/js/ckeditor/kcfinder/upload.php?opener=ckeditor&type=images') ?>'
                                });
                            </script>
                                                <?= $this->load->view('plugin_scripts/bootstrap-wysihtml5'); ?>

            
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



</script>