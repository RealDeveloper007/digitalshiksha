<?php 
if (isset($this->session->userdata['time_zone']) && !empty($this->session->userdata['time_zone'])) {
    date_default_timezone_set($this->session->userdata['time_zone']);
}
?>
<script src="<?php echo base_url('assets/js/'); ?>/ckeditor/ckeditor.js"></script>

<style>
    .blog-form-wrapper {
        background: #fff;
        border-radius: 4px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        overflow: hidden;
        width: 100%;
        max-width: 100%;
        box-sizing: border-box;
        margin-bottom: 20px;
    }
    
    .form-header {
        background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
        border-bottom: 3px solid #FFD700;
        color: white;
        padding: 12px 15px;
        margin-bottom: 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 10px;
    }
    
    .form-header h4 {
        margin: 0;
        font-size: 16px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .form-header h4 i {
        font-size: 14px;
        color: #FFD700;
    }
    
    .back-btn {
        background: rgba(255, 255, 255, 0.2);
        color: white;
        padding: 6px 12px;
        border: 1.5px solid rgba(255, 215, 0, 0.5);
        border-radius: 4px;
        text-decoration: none;
        font-weight: 500;
        font-size: 12px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: all 0.3s;
        backdrop-filter: blur(10px);
    }
    
    .back-btn:hover {
        background: #FFD700;
        border-color: #FFD700;
        color: #000;
        transform: translateY(-1px);
        box-shadow: 0 2px 6px rgba(255, 215, 0, 0.25);
    }
    
    .form-body {
        padding: 12px;
    }
    
    .form-group {
        margin-bottom: 15px;
    }
    
    .form-group label {
        font-weight: 600;
        color: #333;
        margin-bottom: 6px;
        display: block;
        font-size: 12px;
    }
    
    .form-group label .required {
        color: #dc3545;
        margin-left: 3px;
    }
    
    .form-control {
        border-radius: 4px;
        border: 1px solid #ccc;
        padding: 8px 12px;
        transition: border-color 0.3s, box-shadow 0.3s;
        color: #333;
        font-size: 13px;
        width: 100%;
        box-sizing: border-box;
        background-color: #fff;
    }
    
    .form-control:focus {
        border-color: #FFD700;
        border-width: 2px;
        box-shadow: 0 0 0 0.2rem rgba(255, 215, 0, 0.25);
        outline: 0;
        color: #333;
    }
    
    .form-control::placeholder {
        color: #999;
    }
    
    textarea.form-control {
        min-height: 120px;
        resize: vertical;
    }
    
    input[type="file"] {
        padding: 8px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: #fff;
        width: 100%;
        box-sizing: border-box;
    }
    
    input[type="file"]::-webkit-file-upload-button {
        background: #e11d80;
        color: white;
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        margin-right: 10px;
    }
    
    input[type="file"]::-webkit-file-upload-button:hover {
        background: #c91a6e;
    }
    
    .cke_editor {
        border: 1px solid #ccc !important;
        border-radius: 4px !important;
    }
    
    .cke_top {
        border-bottom: 1px solid #ccc !important;
        border-radius: 4px 4px 0 0 !important;
    }
    
    .cke_bottom {
        border-top: 1px solid #ccc !important;
        border-radius: 0 0 4px 4px !important;
    }
    
    .media-type-options {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
        margin-top: 8px;
    }
    
    .media-type-option {
        display: flex;
        align-items: center;
        gap: 6px;
    }
    
    .media-type-option input[type="radio"] {
        width: 18px;
        height: 18px;
        cursor: pointer;
        accent-color: #e11d80;
    }
    
    .media-type-option label {
        margin: 0;
        font-weight: normal;
        cursor: pointer;
        font-size: 14px;
    }
    
    .help-text {
        font-size: 12px;
        color: #666;
        margin-top: 5px;
        display: block;
    }
    
    .help-text i {
        color: #ffc107;
        margin-right: 4px;
    }
    
    .form-actions {
        padding: 20px 25px;
        background: #f8f9fa;
        border-top: 1px solid #e9ecef;
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
        margin: 0;
    }
    
    .form-actions .btn {
        padding: 10px 25px;
        font-size: 14px;
        font-weight: 500;
        border-radius: 4px;
        transition: all 0.3s;
        border: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    
    .form-actions .btn-primary {
        background: #e11d80;
        color: white;
    }
    
    .form-actions .btn-primary:hover {
        background: #c91a6e;
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(225, 29, 128, 0.3);
    }
    
    .alert {
        margin-bottom: 20px;
        border-radius: 4px;
    }
    
    @media (max-width: 767px) {
        .blog-form-wrapper {
            margin-bottom: 15px;
        }
        
        .form-header {
            padding: 12px 15px;
            flex-direction: row;
            align-items: center;
        }
        
        .form-header h4 {
            font-size: 16px;
        }
        
        .form-header h4 i {
            font-size: 14px;
        }
        
        .back-btn {
            width: 100%;
            justify-content: center;
        }
        
        .form-body {
            padding: 20px 15px;
        }
        
        .form-group {
            margin-bottom: 18px;
        }
        
        .form-group label {
            font-size: 14px;
            margin-bottom: 6px;
        }
        
        .form-control {
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ccc;
        }
        
        textarea.form-control {
            min-height: 100px;
            font-size: 16px;
        }
        
        input[type="file"] {
            padding: 10px;
            font-size: 16px;
        }
        
        .media-type-options {
            flex-direction: column;
            gap: 12px;
        }
        
        .media-type-option input[type="radio"] {
            width: 20px;
            height: 20px;
        }
        
        .form-actions {
            padding: 15px !important;
            margin: 0 !important;
            display: flex !important;
            flex-direction: row;
            flex-wrap: nowrap;
            gap: 10px;
            width: 100%;
            box-sizing: border-box;
        }
        
        .form-actions .btn {
            flex: 1 1 0;
            min-width: 0;
            padding: 12px 15px !important;
            font-size: 16px !important;
            font-weight: 500 !important;
            white-space: nowrap;
            display: inline-flex !important;
            align-items: center;
            justify-content: center;
            gap: 8px;
            border-radius: 4px;
            border: none !important;
            transition: all 0.3s;
            box-sizing: border-box;
            visibility: visible !important;
            opacity: 1 !important;
        }
        
        .form-actions .btn-primary {
            background: #e11d80 !important;
            color: white !important;
        }
        
        .form-actions .btn i {
            flex-shrink: 0;
            font-size: 14px;
            display: inline-block !important;
        }
    }
    
    @media (min-width: 768px) {
        .blog-form-wrapper {
            max-width: 100%;
        }
        
        .form-actions .btn {
            min-width: 120px;
        }
        
        .form-actions {
            justify-content: flex-start;
        }
        
        .form-body {
            padding: 30px;
        }
        
        .form-group {
            max-width: 800px;
        }
    }
</style>

<div class="blog-form-wrapper">
    <div class="form-header">
        <h4><i class="fa fa-plus-circle"></i> Add Post</h4>
        <a href="<?php echo base_url('blog/view_all'); ?>" class="back-btn">
            <i class="fa fa-arrow-left"></i> Back to List
        </a>
    </div>
    
    <div class="form-body">
        <?php if ($message) echo $message; ?>
        <?php echo ($this->session->flashdata('message')) ? $this->session->flashdata('message') : ''; ?>
        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
        
        <?= form_open(base_url().'blog/save', 'method="post" id="ajax-form" role="form" class="form-horizontal" enctype="multipart/form-data"'); ?>
        
        <div class="form-group">
            <label for="blog_title">
                <i class="fa fa-header"></i> Title <span class="required">*</span>
            </label>
            <?= form_input('blog_title', set_value('blog_title'), 'placeholder="Blog title" id="blog_title" class="form-control" required="required"') ?>
        </div>
        
            <div class="form-group">
            <label for="blog_slug">
                <i class="fa fa-link"></i> Slug <span class="required">*</span>
            </label>
            <?= form_input('blog_slug', set_value('blog_slug'), 'placeholder="Blog Slug" id="blog_slug" class="form-control" required="required"') ?>
            </div>

            <div class="form-group">
            <label for="blog_short_body">
                <i class="fa fa-file-text-o"></i> Short Description <span class="required">*</span>
            </label>
                  <?php 
                    $data = array(
                        'name'        => 'blog_short_body',
                        'id'          => 'blog_short_body',
                        'rows'        => '5',
                        'class'       => 'form-control',
                'required'    => 'required',
                'placeholder' => 'Enter short description'
            );
            echo form_textarea($data);
            ?>
                </div>
        
            <div class="form-group" id="media-choose">
            <label>
                <i class="fa fa-file"></i> Media <span class="required">*</span>
            </label>
            <a href="#" class="btn btn-default" id='upload-media-file' style="padding: 8px 16px;">
                <i class="fa fa-upload"></i> Choose Media
            </a>
                </div>
        
            <div id="media-option"></div>
            <div id="media-field"></div>
        
            <div class="form-group">
            <label for="post_descr">
                <i class="fa fa-file-text"></i> Content <span class="required">*</span>
            </label>
                  <?php 
                    $data = array(
                        'name'        => 'post_descr',
                'id'          => 'post_descr',
                'value'       => set_value('post_descr'),
                'rows'        => '20',
                'class'       => 'form-control',
                'required'    => 'required',
                'placeholder' => 'Enter blog content'
            );
            echo form_textarea($data);
            ?>
            </div>

        <?php $this->load->view('plugin_scripts/bootstrap-wysihtml5'); ?>
        <script>
            var postDescrEditor = CKEDITOR.replace('post_descr', {
                versionCheck : false,
                allowedContent: true,
                extraAllowedContent: '*(*);*{*};*[*]',
                forcePasteAsPlainText: false,
                filebrowserBrowseUrl: '<?= base_url('assets/js/ckeditor/kcfinder/browse.php?opener=ckeditor&type=files') ?>',
                filebrowserUploadUrl: '<?= base_url('assets/js/ckeditor/kcfinder/browse.php?opener=ckeditor&type=files') ?>',
                filebrowserImageBrowseUrl: '<?= base_url('assets/js/ckeditor/kcfinder/browse.php?opener=ckeditor&type=images') ?>',
                filebrowserImageUploadUrl: '<?= base_url('assets/js/ckeditor/kcfinder/upload.php?opener=ckeditor&type=images') ?>'
            });

            postDescrEditor.on('instanceReady', function() {
                postDescrEditor.on('change', function() { this.updateElement(); });
                postDescrEditor.on('blur', function() { this.updateElement(); });
                postDescrEditor.on('paste', function() {
                    var editor = this;
                    setTimeout(function() { editor.updateElement(); }, 0);
                });
            });
        </script>
        
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-save"></i> Save
            </button>
        </div>
        
        <?= form_close() ?>
    </div>
</div>

<script>
$('#ajax-form').on('submit', function() {
    if (typeof postDescrEditor !== 'undefined' && postDescrEditor) {
        postDescrEditor.updateElement();
    } else if (typeof CKEDITOR !== 'undefined') {
        CKEDITOR.instances.post_descr && CKEDITOR.instances.post_descr.updateElement();
    }
});

$('#upload-media-file').click(function(e){
    e.preventDefault();
    var type = '<div class="form-group">'
                +'<label><i class="fa fa-cog"></i> Media Type <span class="required">*</span></label>'
                +'<div class="media-type-options">'
                        +'<div class="media-type-option">'
                            +'<input type="radio" value="file" id="media_type_file" name="media_type" required="required" onclick="add_media_field(this.value)">'
                            +'<label for="media_type_file">File</label>'
                        +'</div>'
                        +'<div class="media-type-option">'
                            +'<input type="radio" value="image" id="media_type_image" name="media_type" required="required" onclick="add_media_field(this.value)">'
                            +'<label for="media_type_image">Image</label>'
                        +'</div>'
                        +'<div class="media-type-option">'
                            +'<input type="radio" value="video" id="media_type_video" name="media_type" required="required" onclick="add_media_field(this.value)">'
                            +'<label for="media_type_video">YouTube Video URL</label>'
                        +'</div>'
                +'</div>'
            +'</div>';
    $('#media-choose').hide();
    $('#media-option').html(type);
});

function add_media_field(val) {
    var field = '<div class="form-group">'
                +'<label><i class="fa fa-upload"></i> Add Media <span class="required">*</span></label>'
                +'<input type="hidden" name="media_type" value="'+val+'">';
    
    var types = '';
    if (val == 'file') {
        types = 'pdf';
    } else if (val == 'image') {
        types = 'gif | jpg | png';
    }

    switch(val){
        case 'image':
        case 'file':
            field += '<input type="file" id="media" name="media" class="form-control">';
            field += '<span class="help-text"><i class="fa fa-info-circle"></i> Allowed types: '+ types +'</span>';
            break;
    }
    
    if(val == 'video'){
        field += '<textarea id="media" name="media" class="form-control" placeholder="YouTube Embed Code" rows="3"></textarea>';
    }
    
    field += '</div>';

    $('#media-option').hide();
    $('#media-field').html(field);
}
</script>
