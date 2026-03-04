<?php 
// Display message only once - prefer flashdata if available, otherwise use $message variable
$display_message = $this->session->flashdata('message') ? $this->session->flashdata('message') : (isset($message) && !empty($message) ? $message : '');
if ($display_message) {
    echo $display_message;
}
?>

<style>
    .mock-form-wrapper {
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
    
    .form-body {
        padding: 25px;
    }
    
    .form-section {
        margin-bottom: 30px;
    }
    
    .form-section:last-child {
        margin-bottom: 0;
    }
    
    .form-section-title {
        font-size: 16px;
        font-weight: 600;
        color: #333;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #e11d80;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .form-section-title i {
        color: #e11d80;
        font-size: 18px;
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
    
    textarea.form-control {
        min-height: 100px;
        resize: vertical;
        border: 1px solid #ccc;
    }
    
    select.form-control {
        color: #333 !important;
        background-color: #fff !important;
        height: auto;
        cursor: pointer;
        border: 1px solid #ccc;
        -webkit-appearance: menulist;
        -moz-appearance: menulist;
        appearance: menulist;
        overflow: visible !important;
        text-overflow: clip !important;
        white-space: normal !important;
        word-wrap: break-word !important;
        overflow-wrap: break-word !important;
        padding-right: 30px;
    }
    
    select.form-control:focus {
        overflow: visible !important;
        text-overflow: clip !important;
    }
    
    select.form-control option {
        color: #333 !important;
        background-color: #fff !important;
        padding: 8px 12px !important;
        white-space: normal !important;
        word-wrap: break-word !important;
        overflow-wrap: break-word !important;
        display: block;
    }
    
    .form-control::placeholder {
        color: #999;
    }
    
    /* WYSIWYG Editor Styling */
    .wysihtml5-sandbox,
    .wysihtml5-toolbar {
        width: 100% !important;
        box-sizing: border-box;
    }
    
    .wysihtml5-toolbar {
        border: 1px solid #ccc;
        border-bottom: none;
        border-radius: 4px 4px 0 0;
        background: #f8f9fa;
        padding: 8px;
        margin: 0;
        display: flex;
        flex-wrap: wrap;
        align-items: flex-start;
        gap: 4px;
        line-height: 1.4;
    }
    
    .wysihtml5-sandbox {
        border: 1px solid #ccc;
        border-radius: 0 0 4px 4px;
        padding: 10px 12px;
        min-height: 100px;
        font-size: 14px;
        color: #333;
        background: #fff;
        transition: border-color 0.3s, box-shadow 0.3s;
    }
    
    .wysihtml5-sandbox:focus {
        border-color: #e11d80;
        border-width: 2px;
        box-shadow: 0 0 0 0.2rem rgba(225, 29, 128, 0.25);
        outline: 0;
    }
    
    .wysihtml5-toolbar .btn-group {
        margin: 0 4px 0 0 !important;
        display: inline-flex !important;
        vertical-align: middle;
        white-space: nowrap;
        flex-wrap: nowrap !important;
    }
    
    .wysihtml5-toolbar .btn-group > .btn,
    .wysihtml5-toolbar .btn-group > a.btn {
        float: none !important;
        display: inline-block !important;
        white-space: nowrap;
    }
    
    .wysihtml5-toolbar .btn-group:nth-child(1) {
        flex-shrink: 0;
        display: inline-flex !important;
        flex-wrap: nowrap !important;
    }
    
    .wysihtml5-toolbar .btn-group:nth-child(1) > .btn,
    .wysihtml5-toolbar .btn-group:nth-child(1) > a.btn {
        display: inline-block !important;
        float: none !important;
        white-space: nowrap;
        flex-shrink: 0;
    }
    
    .wysihtml5-toolbar .btn {
        padding: 6px 10px;
        font-size: 13px;
        border: 1px solid #ccc;
        background: #fff;
        white-space: nowrap;
        line-height: 1.4;
        min-height: 32px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
    
    .wysihtml5-toolbar .btn:hover {
        background: #e9ecef;
    }
    
    .textarea-wysihtml5 {
        width: 100% !important;
        box-sizing: border-box;
    }
    
    .wysihtml5-container {
        width: 100% !important;
        max-width: 100%;
        box-sizing: border-box;
    }
    
    .input-group {
        display: flex;
        width: 100%;
        align-items: stretch;
    }
    
    .input-group .form-control {
        border-radius: 4px 0 0 4px;
        border-right: 0;
        flex: 1;
    }
    
    .input-group .form-control:focus {
        border-right: 0;
    }
    
    .input-group-addon {
        background-color: #e9ecef;
        border: 1px solid #ccc;
        border-left: 0;
        border-radius: 0 4px 4px 0;
        padding: 10px 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #555;
        font-weight: 500;
        min-width: 45px;
        flex-shrink: 0;
    }
    
    .input-group:focus-within .input-group-addon {
        border-color: #e11d80;
        border-width: 2px;
        border-left: 0;
    }
    
    .input-group:focus-within .form-control {
        border-color: #e11d80;
        border-width: 2px;
    }
    
    .form-actions {
        padding: 20px 25px;
        background: #f8f9fa;
        border-top: 1px solid #e9ecef;
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
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
    
    .form-actions .btn-warning {
        background: #ffc107;
        color: #212529;
    }
    
    .form-actions .btn-warning:hover {
        background: #e0a800;
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(255, 193, 7, 0.3);
    }
    
    .help-block {
        font-size: 12px;
        color: #666;
        margin-top: 5px;
        display: flex;
        align-items: center;
        gap: 5px;
    }
    
    .help-block i {
        color: #ffc107;
    }
    
    .form-info-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 8px 12px;
        background: #e7f3ff;
        border: 1px solid #b3d9ff;
        border-radius: 4px;
        color: #0066cc;
        font-size: 13px;
        margin-bottom: 5px;
    }
    
    .form-info-badge i {
        font-size: 14px;
    }
    
    .category-row {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
    }
    
    .date-row {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
    }
    
    @media (max-width: 767px) {
        .mock-form-wrapper {
            margin-bottom: 15px;
        }
        
        .form-header {
            padding: 15px 20px;
        }
        
        .form-header h4 {
            font-size: 18px;
        }
        
        .form-body {
            padding: 20px 15px 100px 15px;
        }
        
        .form-section {
            margin-bottom: 25px;
        }
        
        .form-section-title {
            font-size: 15px;
            margin-bottom: 15px;
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
            min-height: 120px;
            font-size: 16px;
            border: 1px solid #ccc;
        }
        
        select.form-control {
            font-size: 16px;
            height: auto;
            min-height: 48px;
            padding: 12px 35px 12px 12px;
            border: 1px solid #ccc;
            color: #333 !important;
            background-color: #fff !important;
            overflow: visible !important;
            text-overflow: clip !important;
            white-space: normal !important;
            word-wrap: break-word !important;
            overflow-wrap: break-word !important;
            max-width: 100%;
            box-sizing: border-box;
            line-height: 1.5;
        }
        
        select.form-control:focus {
            overflow: visible !important;
            text-overflow: clip !important;
            white-space: normal !important;
        }
        
        select.form-control option {
            color: #333 !important;
            background-color: #fff !important;
            padding: 10px 12px !important;
            white-space: normal !important;
            word-wrap: break-word !important;
            overflow-wrap: break-word !important;
            display: block;
            line-height: 1.5;
        }
        
        .input-group {
            display: flex;
            align-items: stretch;
            width: 100%;
            box-sizing: border-box;
        }
        
        .input-group .form-control {
            border: 1px solid #ccc;
            border-right: 0;
            border-radius: 4px 0 0 4px;
            flex: 1;
            min-width: 0;
            height: 48px;
            padding: 12px;
            font-size: 16px;
            line-height: 1.5;
            box-sizing: border-box;
        }
        
        .input-group-addon {
            padding: 0;
            font-size: 16px;
            border: 1px solid #ccc;
            border-left: 0;
            border-radius: 0 4px 4px 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 50px;
            width: 50px;
            flex-shrink: 0;
            height: 48px;
            line-height: 1.5;
            box-sizing: border-box;
        }
        
        .input-group:focus-within .input-group-addon {
            border-color: #e11d80;
            border-left: 0;
        }
        
        .input-group:focus-within .form-control {
            border-color: #e11d80;
            border-right: 0;
        }
        
        .wysihtml5-toolbar {
            padding: 8px 6px;
            border: 1px solid #ccc;
            display: flex;
            flex-wrap: wrap;
            align-items: flex-start;
            gap: 4px;
            line-height: 1.4;
        }
        
        .wysihtml5-toolbar .btn-group {
            margin: 0 4px 4px 0 !important;
            display: inline-flex !important;
            vertical-align: middle;
            white-space: nowrap;
            flex-wrap: nowrap !important;
        }
        
        .wysihtml5-toolbar .btn-group > .btn,
        .wysihtml5-toolbar .btn-group > a.btn {
            float: none !important;
            display: inline-block !important;
            white-space: nowrap;
        }
        
        .wysihtml5-toolbar .btn-group:nth-child(1) {
            flex-shrink: 0;
            margin-bottom: 0 !important;
            display: inline-flex !important;
            flex-wrap: nowrap !important;
        }
        
        .wysihtml5-toolbar .btn-group:nth-child(1) > .btn,
        .wysihtml5-toolbar .btn-group:nth-child(1) > a.btn {
            display: inline-block !important;
            float: none !important;
            white-space: nowrap;
            flex-shrink: 0;
            margin-right: 0 !important;
        }
        
        .wysihtml5-toolbar .btn {
            padding: 8px 10px !important;
            font-size: 13px !important;
            border: 1px solid #ccc !important;
            line-height: 1.4 !important;
            min-height: 36px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        
        .wysihtml5-sandbox {
            padding: 12px;
            min-height: 120px;
            font-size: 16px;
            border: 1px solid #ccc;
        }
        
        .wysihtml5-container {
            width: 100% !important;
            max-width: 100%;
        }
        
        .category-row,
        .date-row {
            grid-template-columns: 1fr;
            gap: 15px;
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
            position: relative;
            z-index: 10;
            background: #f8f9fa !important;
            border-top: 1px solid #e9ecef;
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
        
        .form-actions .btn-warning {
            background: #ffc107 !important;
            color: #212529 !important;
        }
        
        .form-actions .btn i {
            flex-shrink: 0;
            font-size: 14px;
            display: inline-block !important;
        }
        
        .help-block {
            font-size: 13px;
        }
        
        .form-info-badge {
            width: 100%;
            margin-bottom: 5px;
        }
    }
    
    @media (min-width: 768px) {
        .mock-form-wrapper {
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
    }
</style>

<div class="block mock-form-wrapper">
    <div class="form-header">
        <h4><i class="fa fa-edit"></i> Update Exam</h4>
    </div>
    
    <?=form_open_multipart(base_url('admin_control/update_mock/'.$mock->title_id), 'role="form" class="form-horizontal"'); ?>
    
    <div class="form-body">
                <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
        
        <!-- Basic Information Section -->
        <div class="form-section">
            <div class="form-section-title">
                <i class="fa fa-info-circle"></i> Basic Information
            </div>
            
            <div class="form-group">
                <label for="mock_title">Exam Title <span class="required">*</span></label>
                  <?php 
                    $data = array(
                        'name'        => 'mock_title',
                        'placeholder' => 'Exam Title',
                        'id'          => 'mock_title',
                        'value'       => $mock->title_name,
                        'rows'        => '2',
                        'class'       => 'form-control textarea-wysihtml5',
                        'required' => 'required',
                    ); ?>
                    <?php echo form_textarea($data) ?>
                </div>
            
            <div class="form-group">
                <label for="slug">Slug</label>
                <?php echo form_input('slug', $mock->slug, 'id="slug" placeholder="Slug" class="form-control"') ?>
            </div>

            <div class="form-group">
                <label for="syllabus">Syllabus <span class="required">*</span></label>
                  <?php 
                    $data = array(
                        'name'        => 'mock_syllabus',
                        'id'          => 'syllabus',
                    'placeholder' => 'Syllabus',
                        'value'       => $mock->syllabus,
                        'rows'        => '3',
                        'class'       => 'form-control textarea-wysihtml5',
                        'required' => 'required'
                    ); ?>
                    <?php echo form_textarea($data) ?>
                </div>
            
            <div class="form-group">
                <label for="feature_image">Feature Image</label>
                    <?=form_upload('feature_image', '', 'id="feature_image" class="form-control"') ?>
                <div class="help-block">
                    <i class="glyphicon glyphicon-warning-sign"></i> Allowed only max_size = 150KB, max_width = 1024px, max_height = 768px, types = gif | jpg | png.
                </div>
            </div>
        </div>
        
            <?php if($mock->batch_id!=0) { ?>
                <?php 
                    $option1 = array();
                    $option1[''] = 'Select Batch';
                    foreach ($batches as $batch) 
                    {
                        $option1[$batch->id] = $batch->batch_name;
                    }
                ?>
            
            <!-- Batch Information Section -->
            <div class="form-section">
                <div class="form-section-title">
                    <i class="fa fa-users"></i> Batch Information
                </div>
                
                <div class="form-group">
                    <label for="parent-batch">Select Batch <span class="required">*</span></label>
                    <?php echo form_dropdown('batch_id', $option1, $mock->batch_id, 'id="parent-batch" class="form-control"') ?>
                </div>

                <div class="form-group">
                    <label>Date Range <span class="required">*</span></label>
                    <div class="date-row">
                        <div>
                            <label for="batch_start_date" style="font-size: 13px; font-weight: 500; margin-bottom: 5px;">Start Date</label>
                            <input type="date" class="form-control" name="batch_start_date" id="batch_start_date" value="<?= date('Y-m-d',strtotime($mock->batch_start_date))?>">
                        </div>
                        <div>
                            <label for="batch_end_date" style="font-size: 13px; font-weight: 500; margin-bottom: 5px;">End Date</label>
                            <input type="date" class="form-control" name="batch_end_date" id="batch_end_date" value="<?= date('Y-m-d',strtotime($mock->batch_end_date))?>">
                    </div>
                    </div>
                    </div>
                </div>
            <?php } ?> 
        
        <!-- Category Information Section -->
        <div class="form-section">
            <div class="form-section-title">
                <i class="fa fa-folder"></i> Category Information
            </div>

            <div class="form-group">
                <label>Category Selection <span class="required">*</span></label>
                <div class="category-row">
                    <div>
                        <label for="parent-category" style="font-size: 13px; font-weight: 500; margin-bottom: 5px;">Category</label>
                        <?php echo form_dropdown('category', $option, $mock->category_id, 'id="parent-category" class="form-control"') ?>
                    </div>
                    <div>
                        <label for="sub_category" style="font-size: 13px; font-weight: 500; margin-bottom: 5px;">Sub Category</label>
                        <?php echo form_dropdown('sub_category', $option2, $mock->sub_category_id, 'id="sub_category" class="form-control"') ?>
                    </div>
                    <div>
                        <label for="sub_sub_category" style="font-size: 13px; font-weight: 500; margin-bottom: 5px;">Sub Sub Category</label>
                        <?php echo form_dropdown('sub_sub_category', $option3, $mock->sub_sub_category_id, 'id="sub_sub_category" class="form-control"') ?>
                    </div>            
                </div>
            </div>

            <div class="form-group">
                <label for="course_id">Associated Course</label>
                <select name="course_id" class="form-control">
                    <option value="">None</option>
                    <?php $courses = $this->db->get('courses')->result();
                    foreach ($courses as $course) { ?>
                        <option value="<?=$course->course_id;?>" <?=($course->course_id == $mock->course_id)?'selected':'';?>><?=$course->course_title;?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        
        <!-- Exam Settings Section -->
        <div class="form-section">
            <div class="form-section-title">
                <i class="fa fa-cog"></i> Exam Settings
            </div>
            
            <div class="form-group">
                <label for="passing_score">Passing Score <span class="required">*</span></label>
                    <div class="input-group">
                      <?php echo form_input('passing_score', $mock->pass_mark, 'id="passing_score" placeholder="Passing Score" class="form-control" required="required"') ?>
                    <span class="input-group-addon">%</span>
                </div>
            </div>
            
            <div class="form-group">
                <label for="exam_price">Price</label>
                    <div class="input-group">
                      <?php echo form_input('price', $mock->exam_price, 'id="exam_price" placeholder="Exam Price" class="form-control"') ?>
                    <span class="input-group-addon"><?=$currency_symbol?></span>
                    </div>            
                <div class="form-info-badge">
                    <i class="fa fa-info-circle"></i> Enter 0 if FREE.
                </div>
            </div>
            
            <div class="form-group">
                <label for="public">Public</label>
                    <select name="public" class="form-control">
                    <option value="1" <?=(1 == $mock->public)?'selected':'';?>>Yes</option>
                    <option value="0" <?=(0 == $mock->public)?'selected':'';?>>No</option>
                    </select>
                <div class="form-info-badge">
                    <i class="fa fa-info-circle"></i> If No, This exam will only available for courses.
                </div>
            </div>
            
             <div class="form-group">
                <label for="active">Active</label>
                    <select name="active" class="form-control">
                    <option value="1" <?=(1 == $mock->active)?'selected':'';?>>Yes</option>
                    <option value="0" <?=(0 == $mock->active)?'selected':'';?>>No</option>
                    </select>
                <div class="form-info-badge">
                    <i class="fa fa-info-circle"></i> If No, This exam will be inactive.
                </div>
            </div>
            
            <div class="form-group">
                <label for="timepicker1">Time Duration <span class="required">*</span></label>
                    <div class="input-group">
                      <?php echo form_input('duration', $mock->time_duration, 'id="timepicker1" placeholder="hh:mm:ss" class="form-control" required="required"') ?>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                </div>
            </div>
            
            <div class="form-group">
                <label for="random_ques">Total Random Questions <span class="required">*</span></label>
                    <?php echo form_input('random_ques', $mock->random_ques_no, 'id="random_ques" placeholder="Numbers only" class="form-control" required="required"') ?>
                <div class="form-info-badge">
                    <i class="fa fa-exclamation-triangle"></i> Not more than <?=$ques_count;?>
                </div>
            </div>

            <div class="form-group">
                <label for="created_byy">Quiz Master</label>
                <?php echo form_input('created_byy', $mock->created_byy, 'id="created_by" placeholder="Quiz Master Name" class="form-control"') ?>
            </div>
                </div>
        
        <!-- Form Actions -->
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-save"></i> Update
            </button>
            <button type="reset" class="btn btn-warning">
                <i class="fa fa-refresh"></i> Reset
            </button>
        </div>
        
        <?=form_close(); ?>
    </div>
</div>
<?php $this->load->view('plugin_scripts/bootstrap-wysihtml5'); ?>

<script>
$('select#parent-category').change(function() {
    var category = $(this).val();
    var link = '<?php echo base_url()?>'+'admin_control/get_subcategories_ajax/'+category;
    $.ajax({
        data: category,
        url: link
    }).done(function(subcategories) {
        console.log(subcategories);
        $('#sub_category').html(subcategories);
                        $('#sub_sub_category').empty().html("<option>Select Sub Category first</option>");
    });
});

$('select#sub_category').change(function() {
    var sub_category = $(this).val();
    var link = '<?php echo base_url()?>'+'admin_control/get_sub_subcategories_ajax/'+sub_category;
    $.ajax({
        data: sub_category,
        url: link
    }).done(function(subcategories) {
        console.log(subcategories);
        $('#sub_sub_category').html(subcategories);
    });
});
</script>
