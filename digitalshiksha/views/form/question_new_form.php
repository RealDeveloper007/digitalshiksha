<style>
    /* Import/Download Section Styling */
    .import-actions-section {
        background: #f8f9fa;
        padding: 12px;
        border-radius: 4px;
        margin-bottom: 12px;
        border: 1px solid #e9ecef;
        box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    }
    
    .import-actions-section form {
        margin: 0;
    }
    
    .import-actions-section .form-group {
        margin-bottom: 0;
    }
    
    .import-actions-row {
        display: flex;
        gap: 8px;
        align-items: flex-end;
        flex-wrap: wrap;
    }
    
    .import-file-group {
        flex: 1;
        min-width: 250px;
    }
    
    .import-file-group label {
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 6px;
        color: #333;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    
    .import-file-group label i {
        color: #2c3e50;
        font-size: 12px;
    }
    
    .import-file-group .form-control {
        padding: 6px 10px;
        font-size: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: #fff;
        width: 100%;
        box-sizing: border-box;
        cursor: pointer;
        color: #333;
        line-height: 1.5;
        height: auto;
        min-height: 36px;
    }
    
    .import-file-group .form-control:focus {
        border-color: #FFD700;
        border-width: 2px;
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(255, 215, 0, 0.25);
    }
    
    .import-file-group .form-control::-webkit-file-upload-button {
        padding: 6px 12px;
        margin-right: 10px;
        background: #2c3e50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 11px;
        font-weight: 500;
    }
    
    .import-file-group .form-control::-webkit-file-upload-button:hover {
        background: #34495e;
    }
    
    .import-actions-buttons {
        display: flex;
        gap: 8px;
        flex-wrap: nowrap;
        align-items: flex-end;
    }
    
    .import-actions-buttons .btn {
        white-space: nowrap;
        padding: 6px 12px;
        font-size: 12px;
        font-weight: 500;
        border-radius: 4px;
        transition: all 0.3s;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        border: none;
        cursor: pointer;
        text-decoration: none;
    }
    
    .import-actions-buttons .btn i {
        font-size: 12px;
        flex-shrink: 0;
    }
    
    .import-actions-buttons .btn-primary {
        background: #2c3e50;
        color: white;
    }
    
    .import-actions-buttons .btn-primary:hover {
        background: #34495e;
        transform: translateY(-1px);
        box-shadow: 0 2px 4px rgba(255, 215, 0, 0.3);
    }
    
    .import-actions-buttons .btn-success {
        background: #28a745;
        color: white;
    }
    
    .import-actions-buttons .btn-success:hover {
        background: #218838;
        transform: translateY(-1px);
        box-shadow: 0 2px 4px rgba(40, 167, 69, 0.3);
    }
    
    /* Header Section Improvements */
    .question-header-section {
        background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
        border-bottom: 3px solid #FFD700;
        color: white;
        padding: 10px 15px;
        border-radius: 4px 4px 0 0;
        margin: -12px -12px 12px -12px;
    }
    
    .question-header-info {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 10px;
    }
    
    .question-header-title {
        font-size: 16px;
        font-weight: 500;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .question-header-title i {
        font-size: 14px;
        color: #FFD700;
    }
    
    .question-header-actions {
        display: flex;
        gap: 8px;
        align-items: center;
        flex-wrap: wrap;
    }
    
    .question-number-badge {
        background: rgba(255, 255, 255, 0.2);
        padding: 4px 10px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: 500;
        white-space: nowrap;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }
    
    .question-number-badge i {
        font-size: 11px;
    }
    
    /* Option Selection Styling (Radio/Checkbox in input-group-addon) */
    .input-group-addon {
        background-color: #f8f9fa;
        border: 1px solid #ccc;
        border-right: 0;
        padding: 8px 12px;
        display: flex;
        align-items: center;
        gap: 8px;
        min-width: 120px;
        justify-content: center;
    }
    
    .input-group-addon input[type="radio"],
    .input-group-addon input[type="checkbox"] {
        width: 20px;
        height: 20px;
        cursor: pointer;
        margin: 0;
        flex-shrink: 0;
    }
    
    .input-group-addon input[type="radio"]:checked,
    .input-group-addon input[type="checkbox"]:checked {
        accent-color: #FFD700;
    }
    
    .input-group-addon .invisible-on-sm {
        font-size: 12px;
        font-weight: 600;
        color: #333;
        white-space: nowrap;
    }
    
    .input-group {
        display: flex;
        width: 100%;
        align-items: stretch;
    }
    
    .input-group .form-control {
        border-left: 0;
        border-radius: 0 4px 4px 0;
    }
    
    .input-group:focus-within .input-group-addon {
        border-color: #FFD700;
        background-color: #fffef5;
    }
    
    .input-group:focus-within .form-control {
        border-color: #FFD700;
    }
    
    /* Upload Media File Section */
    #media-choose {
        margin-bottom: 20px;
    }
    
    #media-choose label {
        font-weight: 600;
        color: #333;
        font-size: 14px;
        margin-bottom: 8px;
        display: block;
    }
    
    #upload-media-file,
    #media-choose .btn,
    #media-choose a.btn {
        background: #6c757d;
        border-color: #6c757d;
        color: white;
        padding: 10px 20px;
        font-size: 14px;
        font-weight: 500;
        border-radius: 4px;
        transition: all 0.3s;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        border: none;
        cursor: pointer;
        text-decoration: none;
    }
    
    #upload-media-file i,
    #media-choose .btn i,
    #media-choose a.btn i {
        font-size: 14px;
    }
    
    #upload-media-file:hover,
    #media-choose .btn:hover,
    #media-choose a.btn:hover {
        background: #5a6268;
        border-color: #5a6268;
        color: white;
        transform: translateY(-1px);
        box-shadow: 0 2px 4px rgba(108, 117, 125, 0.3);
    }
    
    
    /* Add More Options Button */
    #add_btn,
    button#add_btn.btn-info {
        background: #17a2b8;
        border-color: #17a2b8;
        color: white;
        padding: 10px 20px;
        font-size: 14px;
        font-weight: 500;
        border-radius: 4px;
        transition: all 0.3s;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        border: none;
        cursor: pointer;
    }
    
    #add_btn i,
    button#add_btn.btn-info i {
        font-size: 14px;
    }
    
    #add_btn:hover,
    button#add_btn.btn-info:hover {
        background: #138496;
        border-color: #138496;
        color: white;
        transform: translateY(-1px);
        box-shadow: 0 2px 4px rgba(23, 162, 184, 0.3);
    }
    
    /* Save Buttons Section */
    .form-action-buttons {
        background: #f8f9fa;
        padding: 20px 25px;
        border-top: 1px solid #e9ecef;
        margin: 0;
        border-radius: 0 0 4px 4px;
        display: flex;
        gap: 15px;
        justify-content: flex-start;
        flex-wrap: wrap;
    }
    
    .form-action-buttons .btn {
        padding: 10px 25px;
        font-size: 14px;
        font-weight: 500;
        border-radius: 4px;
        border: none;
        transition: all 0.3s;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
    }
    
    .form-action-buttons .btn i {
        font-size: 16px;
    }
    
    .form-action-buttons .btn-primary {
        background: #2c3e50;
        color: white;
    }
    
    .form-action-buttons .btn-primary:hover {
        background: #34495e;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(255, 215, 0, 0.3);
    }
    
    .form-action-buttons .btn-info {
        background: #17a2b8;
        color: white;
    }
    
    .form-action-buttons .btn-info:hover {
        background: #138496;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(23, 162, 184, 0.3);
    }
    
    /* Form Controls Optimization */
    .form-group {
        margin-bottom: 12px;
    }
    
    .control-label.mobile {
        font-size: 12px;
        font-weight: 600;
        color: #333;
        padding-top: 6px;
        margin-bottom: 6px;
    }
    
    .form-control {
        padding: 6px 10px;
        font-size: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        line-height: 1.5;
        transition: border-color 0.3s, box-shadow 0.3s;
        color: #333;
        width: 100%;
        box-sizing: border-box;
        background-color: #fff;
    }
    
    .form-control:focus {
        border-color: #FFD700;
        border-width: 2px;
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(255, 215, 0, 0.25);
        color: #333;
    }
    
    textarea.form-control {
        min-height: 100px;
        resize: vertical;
        border: 1px solid #ccc;
    }
    
    .text-primary {
        font-size: 12px;
        margin-bottom: 10px;
    }
    
    .text-primary i {
        font-size: 12px;
        color: #2c3e50;
    }
    
    .radio-inline {
        font-size: 12px;
        padding-left: 20px;
        margin-right: 15px;
    }
    
    .radio-inline input[type="radio"] {
        width: 18px;
        height: 18px;
        margin-right: 6px;
        accent-color: #FFD700;
    }
    
    /* Mobile Responsive Styles */
    @media (max-width: 767px) {
        .import-actions-section {
            padding: 10px;
        }
        
        .import-actions-row {
            flex-direction: column;
            gap: 8px;
            align-items: stretch;
        }
        
        .import-file-group {
            width: 100%;
            min-width: 100%;
        }
        
        .import-file-group label {
            font-size: 11px;
            margin-bottom: 6px;
        }
        
        .import-file-group .form-control {
            padding: 8px 10px;
            font-size: 12px;
            width: 100%;
            min-height: 40px;
            line-height: 1.5;
        }
        
        .import-file-group .form-control::-webkit-file-upload-button {
            padding: 6px 12px;
            margin-right: 8px;
            font-size: 11px;
        }
        
        .import-actions-buttons {
            width: 100%;
            flex-direction: column;
            gap: 6px;
            align-items: stretch;
        }
        
        .import-actions-buttons .btn {
            width: 100%;
            padding: 6px 10px;
            font-size: 11px;
            justify-content: center;
        }
        
        .import-actions-buttons .btn i {
            font-size: 11px;
        }
        
        .question-header-section {
            padding: 10px 12px;
            margin: -12px -12px 12px -12px;
        }
        
        .question-header-info {
            flex-direction: row;
            align-items: center;
            gap: 8px;
            justify-content: space-between;
        }
        
        .question-header-title {
            font-size: 13px;
            flex: 1;
            min-width: 0;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        
        .question-header-title i {
            font-size: 12px;
            margin-right: 6px;
        }
        
        .question-header-actions {
            flex-shrink: 0;
            display: flex;
            gap: 6px;
            align-items: center;
        }
        
        .question-number-badge {
            padding: 4px 8px;
            font-size: 11px;
            flex-shrink: 0;
        }
        
        .question-number-badge i {
            font-size: 10px;
        }
        
        /* Option Selection Mobile Styling */
        .input-group-addon {
            min-width: 120px;
            padding: 8px 10px;
            flex-wrap: nowrap;
            gap: 6px;
            justify-content: flex-start;
            align-items: center;
        }
        
        .input-group-addon input[type="radio"],
        .input-group-addon input[type="checkbox"] {
            width: 20px;
            height: 20px;
        }
        
        .input-group-addon .invisible-on-sm {
            font-size: 11px;
            display: inline-block !important;
            visibility: visible !important;
            width: auto !important;
            text-align: left !important;
            opacity: 1 !important;
            white-space: nowrap !important;
            margin-left: 6px !important;
            font-weight: 600 !important;
            color: #333 !important;
        }
        
        #add_btn,
        button#add_btn.btn-info {
            padding: 6px 12px;
            font-size: 11px;
            width: 100%;
            justify-content: center;
        }
        
        #add_btn i,
        #add_btn icon,
        #add_btn .icon-plus {
            font-size: 11px;
        }
        
        .form-action-buttons {
            padding: 18px 15px;
            margin: 0 0 50px 0;
            flex-direction: row;
            flex-wrap: nowrap;
            gap: 10px;
        }
        
        .form-action-buttons .btn {
            flex: 1 1 0;
            min-width: 0;
            max-width: 50%;
            padding: 12px 15px;
            font-size: 14px;
            border-radius: 4px;
        }
        
        .form-action-buttons .btn i {
            font-size: 14px;
        }
        
        /* Upload Media File Mobile */
        #media-choose {
            margin-bottom: 18px;
        }
        
        #upload-media-file,
        #media-choose .btn,
        #media-choose a.btn {
            padding: 8px 16px;
            font-size: 13px;
            justify-content: center;
            display: inline-flex;
        }
        
        #upload-media-file i,
        #media-choose .btn i {
            font-size: 12px;
        }
    }
    
    @media (min-width: 768px) {
        .input-group-addon {
            min-width: 130px;
        }
        
        .input-group-addon .invisible-on-sm {
            font-size: 12px;
        }
        
        .import-actions-section {
            padding: 12px;
        }
        
        .import-actions-row {
            align-items: flex-end;
        }
        
        .import-file-group {
            flex: 1.5;
            min-width: 300px;
            max-width: 500px;
        }
        
        .import-file-group label {
            font-size: 12px;
        }
        
        .import-file-group label i {
            font-size: 12px;
        }
        
        .import-file-group .form-control {
            padding: 6px 10px;
            font-size: 12px;
            min-height: 36px;
        }
        
        .import-actions-buttons {
            flex-shrink: 0;
            gap: 8px;
            min-width: 200px;
        }
        
        .import-actions-buttons .btn {
            padding: 6px 12px;
            font-size: 12px;
            min-width: 120px;
        }
    }
</style>

<!-- Dynamic Form Script-->
<script src="https://cdn.ckeditor.com/4.13.1/standard-all/ckeditor.js"></script>
<script type="text/javascript">
//Add basic 4 fields initially
var i = 5, s;
function add_form(val) {
  //  alert(val);
    i = 5;
    var opt = '<div class=row><div class="col-xs-offset-1 col-xs-10 col-sm-offset-2 col-sm-8">';
        opt += '<p class="text-primary"><i class="glyphicon glyphicon-flash"></i> Select correct answer/s from left radio/checkbox options.</p>';
        opt += '</div></div>';

    for (q = 1; q <= 4; q++) {
        opt += '<div class="form-group">';
        opt += '<label for="options[' + q + ']" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">Option ' + q + ': </label>';
        opt += '<div class="col-lg-5 col-sm-8 col-xs-7 col-mb">';
        opt += '<div class="input-group">';
        opt += '<span class="input-group-addon">';
        if (val == 'Radio') {
            opt += '<input type="' + val + '" name="ans" onclick="put_right_ans(' + q + ')" required="required">  <span class="invisible-on-sm"> Correct Ans.</span>';
        } else if (val == 'Checkbox') {
            opt += '<input type="' + val + '" name="right_ans[' + q + ']">  <span class="invisible-on-sm"> Correct Ans.</span>';
        }
        opt += '</span>';
        if (q <= 2) {
            opt += '<textarea name="options'+q+'" class="form-control" required="required" id="options'+q+'"></textarea>';
    
        }
        if (q > 2) {
            opt += '<textarea name="options'+q+'" class="form-control" required="required" id="options'+q+'"></textarea>';
        }
        opt += '</div></div></div>';
    }
    opt += '<div id="add_more_field-5"></div>';
    opt += '<div class="form-group">';
    opt += '<label class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">&nbsp;</label><div class="col-lg-5 col-sm-8 col-xs-7 col-mb">';
    opt += '<button type="button" class="btn btn-info" id="add_btn" onclick="add_field()"><icon class="icon-plus"></icon> Add More Options</button>';
    opt += '</div></div>';
    document.getElementById('options').innerHTML = opt;
}

//add_form('Radio');

//Add more fields
function add_field() {
    var type;
    if (document.getElementById('radio1').checked) {
        type = 'radio';
    } else if (document.getElementById('checkbox1').checked) {
        type = 'checkbox';
    }
    if (i <= 8) {
        var str = '<div class="form-group"><label for="options[' + i + ']" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobil">Option ' + i + ': </label>';
        str += '<div class="col-lg-5 col-sm-8 col-xs-7 col-mb">';
        str += '<div class="input-group">';
        str += '<span class="input-group-addon">';
        if (type === 'radio') {
            str += '<input type="' + type + '" name="ans" onclick="put_right_ans(' + i + ')" required="required">  <span class="invisible-on-sm"> Correct Ans.</span>';
        } else if (type === 'checkbox') {
            str += '<input type="' + type + '" name="right_ans[' + i + ']">  <span class="invisible-on-sm"> Correct Ans.</span>';
        }    
        str += '</span>';
        str += '<input name="options[' + i + ']" class="form-control" type="text">';
        str += '</div></div></div><div id="add_more_field-' + (i + 1) + '"></div>';

        document.getElementById('add_more_field-' + i).innerHTML = str;
        i++;
    } else {
        alert('You added maximum number of options!');
    }
}

//Pick the righ answers and set the value to hidden field
function put_right_ans(val) {
    var ryt = '<input type="hidden" name="right_ans[' + val + ']" value="on">';
    document.getElementById('hidden_fields').innerHTML = ryt;
}
</script>
 
<?php
// Display message only once - prefer flashdata if available, otherwise use $message variable
$display_message = $this->session->flashdata('message') ? $this->session->flashdata('message') : (isset($message) && !empty($message) ? $message : '');
if ($display_message) {
    echo $display_message;
}
?>

<!-- block -->
<div class="block">
    <div class="navbar block-inner block-header">
        <!-- Import/Download Section -->
        <div class="import-actions-section">
            <form method="post" action="<?= base_url('admin_control/importquestions').'/'.$title_id ?>" class="importform" enctype="multipart/form-data">
                <div class="import-actions-row">
                    <div class="import-file-group">
                        <label for="fileURL">
                            <i class="fa fa-file-excel-o"></i> Choose Questions File (.csv, .xlsx)
                        </label>
                        <input type="file" class="form-control" name="fileURL" id="fileURL" accept=".csv,.xlsx" required>
                    </div>
                    <div class="import-actions-buttons">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-upload"></i> Import Questions
                        </button>
                        <a href="<?= base_url('assets/images/questions.xlsx') ?>" class="btn btn-success" download>
                            <i class="fa fa-download"></i> Download Template
                        </a>
                    </div>
                </div>
            </form>
        </div>
        
        <!-- Header Section with Title and Question Number -->
        <div class="question-header-section">
            <div class="question-header-info">
                <div>
                    <div class="question-header-title">
                        <i class="fa fa-file-text"></i> <?= 'Exam: '.$mock_title; ?>
                    </div>
                </div>
                <div class="question-header-actions">
                    <span class="question-number-badge">
                        <i class="fa fa-hashtag"></i> Question <?= $question_no; ?>
                    </span>
                </div>
            </div>
        </div>
    </div><br/>
    <div class="block-content">
    <?=form_open_multipart(base_url('admin_control/create_question'), 'role="form" class="form-horizontal"'); ?>
    <div class="row">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-xs-offset-1 col-xs-10">
                <?=validation_errors('<div class="alert alert-danger">', '</div>'); ?>
            </div>
        </div>

        <div id="hidden_fields"></div>
        <div class="row">
            <input type="hidden" name="ques_no" value="<?=$question_no; ?>">
            <input type="hidden" name="ques_id" value="<?=$title_id; ?>">
            <input type="hidden" name="mock_title" value="<?=$mock_title; ?>">
            <div class="form-group">
                <label for="question" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">Question: </label>
                <div class="col-lg-5 col-sm-8 col-xs-7 col-mb">
                  <?php 
                    $data = array(
                        'name'         => 'question',
                        'id'           => 'question',
                        'placeholder' => 'Question Title',
                        'value'       => '',
                        'rows'        => '10',
                        'class'       => 'form-control',
                        'required' => 'required',
                    ); ?>
                    <?=form_textarea($data) ?>
                </div>
            </div>
            <div class="form-group" id="media-choose">
                <label for="upload-media-file" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">
                    <i class="fa fa-upload"></i> Upload Media File
                </label>
                <div class="col-lg-5 col-sm-8 col-xs-7 col-mb">
                    <a href="#" class="btn" id='upload-media-file'>
                        <i class="fa fa-file-image-o"></i> Choose Media
                    </a>
                </div>
            </div>
            <div id="media-option"></div>
            <div id="media-field"></div>

            <div class="form-group" style="display:none;">
                <label for="ans_type" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">Answer Type: </label>
                <div class="col-lg-5 col-sm-8 col-xs-7 col-mb">
                    <label class="radio-inline">
                        <input type="radio" id="radio1" name="ans_type" required="required" value="Radio" checked> <span>Radio </span>&nbsp;&nbsp;&nbsp;&nbsp;
                    </label>
                </div>
            </div><br/>
            <div id="options">
    <div class="row">
        <div class="col-xs-offset-1 col-xs-10 col-sm-offset-2 col-sm-8">
            <p class="text-primary">
                <i class="glyphicon glyphicon-flash"></i> Select correct answer/s from left radio options.
            </p>
        </div>
    </div>
    <div class="form-group">
        <label for="options[1]" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">Option 1: </label>
        <div class="col-lg-5 col-sm-8 col-xs-7 col-mb">
            <div class="input-group">
                <span class="input-group-addon">
                    <input type="Radio" name="ans" onclick="put_right_ans(1)" required="required">  
                    <input type="hidden" name="new[1]" value="2" required="required">
                    <span class="invisible-on-sm"> Correct Ans.</span>
                </span>
                <textarea name="options[1]" class="form-control" required="required" id="options[1]"></textarea>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="options[2]" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">Option 2: </label>
        <div class="col-lg-5 col-sm-8 col-xs-7 col-mb">
            <div class="input-group">
                <span class="input-group-addon">
                    <input type="Radio" name="ans" onclick="put_right_ans(2)" required="required">  
                    <input type="hidden" name="new[2]" value="2" required="required">
                    <span class="invisible-on-sm"> Correct Ans.</span>
                </span>
                <textarea name="options[2]" class="form-control" required="required" id="options[2]"></textarea>
            </div>
        </div>
    </div>
        <div class="form-group">
            <label for="options[3]" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">Option 3: </label>
            <div class="col-lg-5 col-sm-8 col-xs-7 col-mb">
                <div class="input-group">
                    <span class="input-group-addon">
                        <input type="Radio" name="ans" onclick="put_right_ans(3)" required="required">
                        <input type="hidden" name="new[3]" value="2" required="required">
                          <span class="invisible-on-sm"> Correct Ans.</span>
                        </span>
                        <textarea name="options[3]" class="form-control" required="required" id="options[3]"></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="options[4]" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">Option 4: </label>
                <div class="col-lg-5 col-sm-8 col-xs-7 col-mb">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <input type="Radio" name="ans" onclick="put_right_ans(4)" required="required">
                            <input type="hidden" name="new[4]" value="2" required="required">
                              <span class="invisible-on-sm"> Correct Ans.</span>
                            </span>
                            <textarea name="options[4]" class="form-control" required="required" id="options[4]"></textarea>
                        </div>
                    </div>
                </div>
                </div>
               
                
               
            <div class="form-group">
                <div class="col-sm-8 col-xs-7 col-sm-offset-2 col-xs-offset-0">
                    <div id="progressBar" style="display:none;"><br/><img src="<?=base_url('assets/images/progress.gif')?>" /></div>
                </div>
            </div>
            <div class="form-action-buttons">
                <button type="submit" onclick="$('#progressBar').show();" class="btn btn-primary">
                    <i class="fa fa-plus-circle"></i> Add More
                </button>
                <button type="submit" onclick="$('#progressBar').show();" class="btn btn-info" name="done" value="done">
                    <i class="fa fa-check-circle"></i> Save and Done
                </button>
            </div>
            </form>
        </div>
    </div>
    </div>
    </div>
</div>
<?php $this->load->view('plugin_scripts/bootstrap-wysihtml5'); ?>

<!-- Dynamic media file upload Script-->
<script type="text/javascript">
$('#upload-media-file').click(function(){
    var type = '<div class="form-group">'
                +'<label for="media_type" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">Media Type: </label>'
                +'<div class="col-lg-5 col-sm-8 col-xs-7 col-mb" style="margin-top: 5px;">'
                        +'<input type="radio" value="youtube" name="media_type" required="required" onclick="add_media_field(this.value)"> <span>YouTube </span>&nbsp;&nbsp;&nbsp;&nbsp;'
                        +'<input type="radio" value="video" name="media_type" required="required" onclick="add_media_field(this.value)"> <span>Video </span>&nbsp;&nbsp;&nbsp;&nbsp;'
                        +'<input type="radio" value="image" name="media_type" required="required" onclick="add_media_field(this.value)"> <span>Image </span>&nbsp;&nbsp;&nbsp;&nbsp;'
                        +'<input type="radio" value="audio" name="media_type" required="required" onclick="add_media_field(this.value)"> <span>Audio </span>'
                +'</div>'
            +'</div>';
    $('#media-choose').hide();
    $('#media-option').append(type);
})

//Add media fields
function add_media_field(val) {
    var field = '<div class="form-group">'
                +'<label for="media_field" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">Add Media: </label>'
                +'<div class="col-lg-5 col-sm-8 col-xs-7 col-mb"><input type="hidden" name="media_type" value="'+val+'">';
    if (val == 'video') {
            var types = 'mp4 | webm | ogg';
    }else if (val == 'audio') {
            var types = 'ogg | mp3 | wav';        
    }else if (val == 'image') {
            var types = 'gif | jpg | png | jpeg';
    };

    switch(val){
        case 'youtube':
            field += '<input type="text" class="form-control" name="media">';
            break;
        case 'video':
        case 'image':
        case 'audio':
            field += '<input type="file" id="media" name="media" style="margin-top:8px;">';
            field += '<p class="help-block"><i class="glyphicon glyphicon-warning-sign"></i> Allowed types = '+ types +'.</p>';
            break;
    }
    field +='</div></div>';

    $('#media-option').hide();
    $('#media-field').append(field);
}


 (function() {
      var mathElements = [
        'math',
        'maction',
        'maligngroup',
        'malignmark',
        'menclose',
        'merror',
        'mfenced',
        'mfrac',
        'mglyph',
        'mi',
        'mlabeledtr',
        'mlongdiv',
        'mmultiscripts',
        'mn',
        'mo',
        'mover',
        'mpadded',
        'mphantom',
        'mroot',
        'mrow',
        'ms',
        'mscarries',
        'mscarry',
        'msgroup',
        'msline',
        'mspace',
        'msqrt',
        'msrow',
        'mstack',
        'mstyle',
        'msub',
        'msup',
        'msubsup',
        'mtable',
        'mtd',
        'mtext',
        'mtr',
        'munder',
        'munderover',
        'semantics',
        'annotation',
        'annotation-xml'
      ];

      CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.13.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');

      CKEDITOR.replace('question', {
        versionCheck : false,
        extraPlugins: 'ckeditor_wiris',
        // For now, MathType is incompatible with CKEditor file upload plugins.
        removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser',
        height: 100,
        // Update the ACF configuration with MathML syntax.
        extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
      });


for(i=1;i<=4;i++)
{
      var mathElements1 = [
        'math',
        'maction',
        'maligngroup',
        'malignmark',
        'menclose',
        'merror',
        'mfenced',
        'mfrac',
        'mglyph',
        'mi',
        'mlabeledtr',
        'mlongdiv',
        'mmultiscripts',
        'mn',
        'mo',
        'mover',
        'mpadded',
        'mphantom',
        'mroot',
        'mrow',
        'ms',
        'mscarries',
        'mscarry',
        'msgroup',
        'msline',
        'mspace',
        'msqrt',
        'msrow',
        'mstack',
        'mstyle',
        'msub',
        'msup',
        'msubsup',
        'mtable',
        'mtd',
        'mtext',
        'mtr',
        'munder',
        'munderover',
        'semantics',
        'annotation',
        'annotation-xml'
      ];

      CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.13.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');

        CKEDITOR.replace('options['+i+']', {
        versionCheck : false,
        extraPlugins: 'ckeditor_wiris',
        // For now, MathType is incompatible with CKEditor file upload plugins.
        removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser',
        height: 100,
        // Update the ACF configuration with MathML syntax.
        extraAllowedContent: mathElements1.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
        });

    }


    }());
    
</script>
                            
                