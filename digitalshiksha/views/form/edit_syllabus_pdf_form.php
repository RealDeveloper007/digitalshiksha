<?php $this->load->view('plugin_scripts/datepicker'); ?>
<?php 
if (isset($this->session->userdata['time_zone']) && !empty($this->session->userdata['time_zone'])) {
    date_default_timezone_set($this->session->userdata['time_zone']);
}
?>
<script src="<?php echo base_url('assets/js/'); ?>/ckeditor/ckeditor.js"></script>

<style>
    .syllabus-form-wrapper {
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
        background: linear-gradient(135deg, #e11d80 0%, #c91a6e 100%);
        color: white;
        padding: 20px 25px;
        margin-bottom: 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
    }
    
    .form-header h4 {
        margin: 0;
        font-size: 20px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .form-header h4 i {
        font-size: 22px;
    }
    
    .back-btn {
        background: white;
        color: #e11d80;
        padding: 8px 16px;
        border-radius: 4px;
        text-decoration: none;
        font-weight: 500;
        font-size: 14px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: all 0.3s;
    }
    
    .back-btn:hover {
        background: #f8f9fa;
        transform: translateY(-1px);
        box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        color: #e11d80;
    }
    
    .form-body {
        padding: 25px;
    }
    
    .form-group {
        margin-bottom: 20px;
    }
    
    .form-group label {
        font-weight: 600;
        color: #333;
        margin-bottom: 8px;
        display: block;
        font-size: 14px;
    }
    
    .form-group label .required {
        color: #e11d80;
        margin-left: 3px;
    }
    
    .form-control {
        border-radius: 4px;
        border: 1px solid #ccc;
        padding: 10px 12px;
        transition: border-color 0.3s, box-shadow 0.3s;
        color: #333;
        font-size: 14px;
        width: 100%;
        box-sizing: border-box;
        background-color: #fff;
    }
    
    .form-control:focus {
        border-color: #e11d80;
        border-width: 2px;
        box-shadow: 0 0 0 0.2rem rgba(225, 29, 128, 0.25);
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
    
    select.form-control {
        height: auto;
        padding-right: 35px;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
        background-position: right 8px center;
        background-repeat: no-repeat;
        background-size: 16px;
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
    }
    
    select.form-control option {
        color: #333 !important;
        background-color: #fff !important;
        overflow: visible !important;
        text-overflow: clip !important;
        white-space: normal !important;
        word-wrap: break-word !important;
        overflow-wrap: break-word !important;
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
    
    .existing-file {
        margin-top: 8px;
        padding: 8px 12px;
        background: #f8f9fa;
        border: 1px solid #e9ecef;
        border-radius: 4px;
        font-size: 13px;
        color: #666;
    }
    
    .existing-file a {
        color: #e11d80;
        text-decoration: none;
        font-weight: 500;
    }
    
    .existing-file a:hover {
        text-decoration: underline;
    }
    
    @media (max-width: 767px) {
        .syllabus-form-wrapper {
            margin-bottom: 15px;
        }
        
        .form-header {
            padding: 15px 20px;
            flex-direction: column;
            align-items: flex-start;
        }
        
        .form-header h4 {
            font-size: 18px;
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
        
        select.form-control {
            height: auto;
            min-height: 48px;
            padding: 12px;
            font-size: 16px;
        }
        
        input[type="file"] {
            padding: 10px;
            font-size: 16px;
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
        .syllabus-form-wrapper {
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
            max-width: 700px;
        }
    }
</style>

<div class="syllabus-form-wrapper">
    <div class="form-header">
        <h4>
            <i class="fa fa-<?php echo ($syllabus_question->type == 'pdf') ? 'file-pdf-o' : (($syllabus_question->type == 'video') ? 'video-camera' : 'file-text-o'); ?>"></i>
            Edit <?= strtoupper($syllabus_question->type) ?> Question
        </h4>
        <?php 
        $back_url = base_url('view_syllabus_questions?id='.$syllabus_question->cat_id.'&type='.$syllabus_question->type);
        if (isset($_GET['back_url']) && !empty($_GET['back_url'])) {
            $back_url = urldecode($_GET['back_url']);
        }
        ?>
        <a href="<?php echo $back_url; ?>" class="back-btn">
            <i class="fa fa-arrow-left"></i> Back to List
        </a>
    </div>
    
    <div class="form-body">
        <div class="row">
            <div class="col-sm-12">
                <?php if ($message) echo $message; ?>
                <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                
                <?= form_open(base_url().'syllabus_control/update_question', 'method="post" id="ajax-form" role="form" class="form-horizontal"'); ?>
                
                <?php echo form_hidden('id', $syllabus_question->id, 'id="id"'); ?>
                <?php echo form_hidden('type', $syllabus_question->type, ''); ?>
                <?php echo form_hidden('cat_id', $syllabus_question->cat_id, 'id="cat_id"'); ?>
                
        <div class="form-group">
                    <label for="question">
                        <i class="fa fa-question-circle"></i> Question <span class="required">*</span>
                    </label>
                    <?php echo form_input('question', $syllabus_question->question, 'id="question" placeholder="Enter question" class="form-control" required="required"') ?>
            </div>
            
                <?php if ($syllabus_question->type == 'long answer') { ?>
                    <div class="form-group">
                        <label for="url">
                            <i class="fa fa-file-text-o"></i> Answer <span class="required">*</span>
                        </label>
                                    <?php
                                    $data = array(
                                        'name'        => 'url',
                            'placeholder' => 'Enter answer',
                                        'value'       => $syllabus_question->url, 
                            'rows'        => '8',
                                        'class'       => 'form-control',
                            'required'    => 'required',
                                    );
                                    echo form_textarea($data);
                                    ?>
                            </div>

                    <?php $this->load->view('plugin_scripts/bootstrap-wysihtml5'); ?>
                            <script>
                                CKEDITOR.replace('url', {
                                    versionCheck : false,
                                    filebrowserBrowseUrl: '<?= base_url('assets/js/ckeditor/kcfinder/browse.php?opener=ckeditor&type=files') ?>',
                                    filebrowserUploadUrl: '<?= base_url('assets/js/ckeditor/kcfinder/browse.php?opener=ckeditor&type=files') ?>',
                                    filebrowserImageBrowseUrl: '<?= base_url('assets/js/ckeditor/kcfinder/browse.php?opener=ckeditor&type=images') ?>',
                                    filebrowserImageUploadUrl: '<?= base_url('assets/js/ckeditor/kcfinder/upload.php?opener=ckeditor&type=images') ?>'
                                });
                            </script>
                <?php } else if ($syllabus_question->type == 'pdf') { ?>
                    <div class="form-group">
                        <label for="pdf_file">
                            <i class="fa fa-file-pdf-o"></i> Upload PDF File
                        </label>
                        <?php if (!empty($syllabus_question->pdf_file)) { ?>
                            <div class="existing-file">
                                <i class="fa fa-file-pdf-o"></i> Current file: 
                                <a href="<?= base_url('uploads/pdf_files/'.$syllabus_question->pdf_file); ?>" target="_blank"><?= $syllabus_question->pdf_file; ?></a>
                            </div>
                        <?php } ?>
                        <input type="file" name="pdf_file" id="pdf_file" accept=".pdf">
                        <small style="color: #666; font-size: 12px; margin-top: 5px; display: block;">Leave empty to keep existing file</small>
                    </div>
                    <?php echo form_hidden('url', $syllabus_question->url, ''); ?>
                <?php } else { ?>
                    <div class="form-group">
                        <label for="url">
                            <i class="fa fa-youtube"></i> YouTube Video ID <span class="required">*</span>
                        </label>
                        <?php echo form_input('url', $syllabus_question->url, 'id="url" placeholder="Enter YouTube video ID" class="form-control" required="required"') ?>
                    </div>
                <?php } ?>
          
            <div class="form-group">
                    <label for="status">
                        <i class="fa fa-toggle-on"></i> Status <span class="required">*</span>
                    </label>
                    <select name="status" id="status" class="form-control" required="required">
                        <option value="1" <?= ($syllabus_question->status == 1) ? 'selected' : ''; ?>>Active</option>
                        <option value="0" <?= ($syllabus_question->status == 0) ? 'selected' : ''; ?>>Inactive</option>
                    </select>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save"></i> Update
                    </button>
                </div>
                
                <?= form_close() ?>
            </div>
        </div>
    </div>
    </div>
