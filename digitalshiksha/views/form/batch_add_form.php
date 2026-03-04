<style>
    .batch-form-wrapper {
        background: #fff;
        border-radius: 4px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        overflow: hidden;
        margin: 12px 0;
    }
    
    .batch-form-header {
        background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
        border-bottom: 3px solid #FFD700;
        color: white;
        padding: 10px 15px;
    }
    
    .batch-form-header h4 {
        margin: 0;
        font-size: 16px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .batch-form-header h4 i {
        color: #FFD700;
        font-size: 14px;
    }
    
    .batch-form-content {
        padding: 12px;
    }
    
    /* Override negative margins that cut off inputs */
    .batch-form-wrapper .form-horizontal .form-group,
    .batch-form-wrapper .form-group {
        margin-right: 0 !important;
        margin-left: 0 !important;
    }
    
    .form-group {
        margin-bottom: 12px;
    }
    
    .form-group label {
        font-weight: 600;
        color: #333;
        margin-bottom: 6px;
        display: block;
        font-size: 12px;
    }
    
    .form-group label .required {
        color: #FFD700;
        margin-left: 3px;
    }
    
    .form-control {
        width: 100%;
        padding: 6px 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 12px;
        transition: all 0.3s;
        background-color: #fff;
    }
    
    .form-control:focus {
        border-color: #FFD700;
        border-width: 2px;
        box-shadow: 0 0 0 0.2rem rgba(255, 215, 0, 0.25);
        outline: 0;
    }
    
    .form-control::placeholder {
        color: #999;
        opacity: 1;
    }
    
    select.form-control {
        cursor: pointer;
        padding: 6px 35px 6px 10px;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23333' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 10px center;
        background-size: 10px;
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        width: 100%;
        font-size: 12px;
        line-height: 1.5;
        box-sizing: border-box;
    }
    
    /* Ensure selected text is fully visible - remove text truncation */
    select.form-control::-ms-expand {
        display: none;
    }
    
    /* For better option display - ensure options have proper spacing and text wrapping */
    select.form-control option {
        padding: 8px 10px !important;
        white-space: pre-wrap !important;
        word-wrap: break-word !important;
        overflow-wrap: break-word !important;
        line-height: 1.4 !important;
        background-color: #fff !important;
        color: #333 !important;
        font-size: 12px !important;
    }
    
    select.form-control option:hover,
    select.form-control option:focus {
        background-color: #FFD700 !important;
        color: #000 !important;
    }
    
    select.form-control option:checked,
    select.form-control option[selected] {
        background-color: #FFD700 !important;
        color: #000 !important;
        font-weight: 600 !important;
    }
    
    /* For WebKit browsers (Chrome, Safari) */
    select.form-control::-webkit-list-button {
        display: none;
    }
    
    /* Ensure dropdown opens properly and shows full text */
    select.form-control:focus {
        outline: none;
        border-color: #FFD700;
        border-width: 2px;
        box-shadow: 0 0 0 0.2rem rgba(255, 215, 0, 0.25);
    }
    
    /* Special styling for status dropdown to ensure full width and visible text */
    select#status.form-control {
        padding: 6px 35px 6px 10px !important;
        width: 100% !important;
    }
    
    /* Ensure text is visible in status dropdown */
    select#status.form-control option {
        padding: 8px 10px !important;
        display: block !important;
    }
    
    .form-help-text {
        font-size: 10px;
        color: #666;
        margin-top: 4px;
        font-style: italic;
    }
    
    .required-note {
        color: #666;
        font-size: 11px;
        margin-top: 8px;
        padding-top: 10px;
        border-top: 1px solid #e0e0e0;
    }
    
    .required-note .required {
        color: #FFD700;
    }
    
    .form-actions {
        margin-top: 12px;
        padding-top: 12px;
        border-top: 2px solid #e0e0e0;
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }
    
    .btn {
        padding: 6px 12px;
        font-size: 12px;
        font-weight: 600;
        border-radius: 4px;
        cursor: pointer;
        transition: all 0.3s;
        border: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    
    .btn i {
        font-size: 12px;
    }
    
    .btn-primary {
        background: #FFD700;
        color: #000;
    }
    
    .btn-primary:hover {
        background: #FFC107;
        box-shadow: 0 4px 8px rgba(255, 215, 0, 0.3);
        transform: translateY(-2px);
        color: #000;
    }
    
    .btn-default {
        background: #6c757d;
        color: white;
    }
    
    .btn-default:hover {
        background: #5a6268;
        box-shadow: 0 4px 8px rgba(108, 117, 125, 0.3);
        transform: translateY(-2px);
        color: white;
    }
    
    .alert {
        margin-bottom: 12px;
        border-radius: 4px;
    }
    
    /* TokenInput styling improvements */
    ul.token-input-list {
        border: 1px solid #ddd !important;
        border-radius: 4px !important;
        padding: 8px !important;
        min-height: 42px !important;
        background-color: #fff !important;
        max-width: 100% !important;
        width: 100% !important;
        overflow: visible !important;
    }
    
    ul.token-input-list:focus-within {
        border-color: #FFD700 !important;
        border-width: 2px !important;
        box-shadow: 0 0 0 0.2rem rgba(255, 215, 0, 0.25) !important;
    }
    
    li.token-input-token {
        background: #FFD700 !important;
        color: #000 !important;
        border: none !important;
        border-radius: 3px !important;
        padding: 6px 10px !important;
        margin: 3px 3px 3px 0 !important;
        font-size: 13px !important;
        font-weight: 500 !important;
        height: auto !important;
        display: inline-block !important;
        float: left !important;
        white-space: nowrap !important;
        max-width: 100% !important;
    }
    
    li.token-input-token p {
        color: #000 !important;
        margin: 0 !important;
        padding: 0 !important;
        display: inline !important;
        word-wrap: break-word !important;
        overflow-wrap: break-word !important;
    }
    
    li.token-input-token span.token-input-delete-token {
        color: #000 !important;
        margin-left: 6px !important;
        font-weight: bold !important;
        cursor: pointer !important;
        font-size: 16px !important;
        line-height: 1 !important;
    }
    
    li.token-input-token span.token-input-delete-token:hover {
        color: #c82333 !important;
    }
    
    li.token-input-input-token {
        float: left !important;
        margin: 3px 0 !important;
        padding: 0 !important;
        list-style-type: none !important;
    }
    
    li.token-input-input-token input {
        border: none !important;
        padding: 6px 8px !important;
        font-size: 14px !important;
        background: transparent !important;
        width: 150px !important;
        min-width: 100px !important;
        margin: 0 !important;
    }
    
    li.token-input-input-token input:focus {
        outline: none !important;
    }
    
    /* Dropdown styling - fix text cutting */
    div.token-input-dropdown {
        position: absolute !important;
        width: auto !important;
        min-width: 100% !important;
        max-width: 600px !important;
        background-color: #fff !important;
        overflow: visible !important;
        border: 1px solid #ddd !important;
        border-top: none !important;
        cursor: default !important;
        font-size: 14px !important;
        font-family: inherit !important;
        z-index: 10000 !important;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1) !important;
        border-radius: 0 0 4px 4px !important;
    }
    
    div.token-input-dropdown p {
        margin: 0 !important;
        padding: 8px 12px !important;
        font-weight: 600 !important;
        color: #666 !important;
        border-bottom: 1px solid #e0e0e0 !important;
    }
    
    div.token-input-dropdown ul {
        margin: 0 !important;
        padding: 0 !important;
        max-height: 300px !important;
        overflow-y: auto !important;
    }
    
    div.token-input-dropdown ul li {
        background-color: #fff !important;
        padding: 10px 12px !important;
        margin: 0 !important;
        list-style-type: none !important;
        cursor: pointer !important;
        white-space: normal !important;
        word-wrap: break-word !important;
        overflow-wrap: break-word !important;
        line-height: 1.4 !important;
    }
    
    div.token-input-dropdown ul li:hover {
        background-color: #f8f9fa !important;
    }
    
    div.token-input-dropdown ul li.token-input-selected-dropdown-item {
        background-color: #FFD700 !important;
        color: #000 !important;
        font-weight: 600 !important;
    }
    
    div.token-input-dropdown ul li em {
        font-weight: bold !important;
        font-style: normal !important;
        color: #2c3e50 !important;
    }
    
    @media (max-width: 767px) {
        .batch-form-wrapper {
            margin: 10px 0;
        }
        
        .batch-form-header {
            padding: 10px 12px;
        }
        
        .batch-form-header h4 {
            font-size: 14px;
        }
        
        .batch-form-header h4 i {
            font-size: 12px;
        }
        
        .batch-form-content {
            padding: 10px;
        }
        
        .form-group {
            margin-bottom: 10px;
        }
        
        .form-group label {
            font-size: 11px;
            margin-bottom: 4px;
        }
        
        .form-control {
            padding: 8px 10px;
            font-size: 12px;
        }
        
        /* Ensure select dropdown text is visible on mobile */
        select.form-control {
            padding: 6px 30px 6px 10px;
            font-size: 12px;
        }
        
        select#status.form-control {
            padding: 6px 30px 6px 10px !important;
            width: 100% !important;
        }
        
        .form-help-text {
            font-size: 10px;
        }
        
        .form-actions {
            margin-top: 10px;
            padding-top: 10px;
            gap: 6px;
        }
        
        .btn {
            padding: 6px 12px;
            font-size: 11px;
        }
        
        .btn i {
            font-size: 11px;
        }
        }
        
        .form-actions {
            flex-direction: column;
            margin-top: 20px;
            padding-top: 15px;
        }
        
        .btn {
            width: 100%;
            justify-content: center;
            padding: 14px;
        }
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />

<div class="batch-form-wrapper">
    <div class="batch-form-header">
        <h4><i class="fa fa-plus-circle"></i> Add New Batch</h4>
    </div>
    
    <div class="batch-form-content">
        <?php
        if (isset($message) && $message != '') {
            echo $message;
        }
        ?>
        
        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
        
        <?php echo form_open(base_url() . 'admin_control/save_new_batch', 'role="form" class="form-horizontal"'); ?>
        
        <div class="form-group">
            <label for="batch_name">
                Batch Name <span class="required">*</span>
            </label>
            <?php echo form_input('batch_name', '', 'placeholder="Enter Batch Name" id="batch_name" class="form-control" required="required"') ?>
        </div>
        
        <div class="form-group">
            <label for="batch_code">
                Batch Code <span class="required">*</span>
            </label>
            <?php echo form_input('batch_code', '', 'placeholder="Enter Batch Code" id="batch_code" class="form-control" required="required"') ?>
            <div class="form-help-text">Unique code to identify this batch</div>
        </div>
        
        <div class="form-group">
            <label for="skill_input">
                Batch Students <span class="required">*</span>
            </label>
            <?php echo form_input('students','','id="skill_input" class="form-control" required="required" placeholder="Search and select students"') ?>
            <div class="form-help-text">Start typing to search for students (minimum 3 characters)</div>
        </div>
        
        <div class="form-group">
            <label for="status">
                Batch Status <span class="required">*</span>
            </label>
            <?php echo form_dropdown('status', ['In-Active','Active'],'', 'id="status" class="form-control"') ?>
        </div>
        
        <div class="required-note">
            <span class="required">*</span> Required fields
        </div>
        
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-save"></i> Save
            </button>
            <button type="reset" class="btn btn-default">
                <i class="fa fa-refresh"></i> Reset
            </button>
        </div>
        
        <?php echo form_close() ?>
    </div>
</div>

<link href="<?php echo base_url('assets/css/token-input.css') ?>" rel="stylesheet" media="screen">
<script src="<?php echo base_url('assets/js/jquery.tokeninput.js') ?>"></script>   
<script>
    $(document).ready(function() {
        $("#skill_input").tokenInput("<?= base_url('admin_control/get_student_detail')?>", {
            hintText: "Search Student here...",
            noResultsText: "Student not found.",
            searchingText: "Searching...",
            minChars: 3,
            tokenLimit: null
        });
    });
</script>
