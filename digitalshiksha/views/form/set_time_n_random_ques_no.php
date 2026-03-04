<style>
    /* Override negative margins that cut off inputs */
    .time-duration-form-wrapper .form-horizontal .form-group,
    .time-duration-form-wrapper .form-group {
        margin-right: 0 !important;
        margin-left: 0 !important;
    }
    
    /* Form Wrapper Styling */
    .time-duration-form-wrapper {
        background: #fff;
        border-radius: 4px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        overflow: hidden;
        margin-bottom: 12px;
    }
    
    /* Header Section */
    .form-header-section {
        background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
        border-bottom: 3px solid #FFD700;
        color: white;
        padding: 10px 15px;
        border-radius: 4px 4px 0 0;
    }
    
    .form-header-section h3 {
        margin: 0;
        font-size: 16px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .form-header-section h3 i {
        font-size: 14px;
        color: #FFD700;
    }
    
    /* Form Body */
    .form-body-section {
        padding: 12px;
    }
    
    /* Form Group Styling */
    .form-group {
        margin-bottom: 12px;
    }
    
    .form-group label {
        font-weight: 600;
        color: #333;
        font-size: 12px;
        margin-bottom: 6px;
        display: block;
    }
    
    .form-group label i {
        color: #2c3e50;
        margin-right: 6px;
        font-size: 12px;
    }
    
    /* Input Group Styling */
    .input-group {
        display: flex;
        width: 100%;
        align-items: stretch;
    }
    
    .input-group .form-control {
        border: 1px solid #ccc;
        border-radius: 4px 0 0 4px;
        padding: 6px 10px;
        font-size: 12px;
        height: auto;
        min-height: 36px;
        box-sizing: border-box;
        transition: border-color 0.3s, box-shadow 0.3s;
        color: #333;
    }
    
    .input-group .form-control:focus {
        border-color: #FFD700;
        border-width: 2px;
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(255, 215, 0, 0.25);
    }
    
    .input-group-addon {
        background-color: #f8f9fa;
        border: 1px solid #ccc;
        border-left: 0;
        border-radius: 0 4px 4px 0;
        padding: 0 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 50px;
        height: auto;
        min-height: 36px;
        box-sizing: border-box;
    }
    
    .input-group-addon i {
        color: #2c3e50;
        font-size: 14px;
    }
    
    .input-group:focus-within .input-group-addon {
        border-color: #FFD700;
        background-color: #fffef5;
    }
    
    /* Help Text Styling */
    .help-inline,
    .help-block {
        margin-top: 6px;
        font-size: 11px;
        color: #666;
        line-height: 1.5;
    }
    
    .help-inline i,
    .help-block i {
        color: #17a2b8;
        margin-right: 5px;
        font-size: 11px;
    }
    
    .help-block.info {
        margin-top: 8px;
        padding: 8px 10px;
        background: #fff3cd;
        border-left: 3px solid #ffc107;
        border-radius: 4px;
        font-size: 11px;
    }
    
    .help-block.info strong {
        color: #856404;
        font-weight: 600;
        font-size: 11px;
    }
    
    .help-block.info i {
        color: #ffc107;
        font-size: 11px;
    }
    
    /* Save Button Section */
    .form-action-section {
        background: #f8f9fa;
        padding: 20px 25px;
        border-top: 1px solid #e9ecef;
        border-radius: 0 0 4px 4px;
        margin-top: 12px;
    }
    
    .form-action-section .btn {
        padding: 10px 25px;
        font-size: 14px;
        font-weight: 500;
        border-radius: 4px;
        border: none;
        transition: all 0.3s;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    
    .form-action-section .btn-primary {
        background: #2c3e50;
        color: white;
    }
    
    .form-action-section .btn-primary:hover {
        background: #34495e;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(255, 215, 0, 0.3);
    }
    
    .form-action-section .btn i {
        font-size: 16px;
    }
    
    /* Alert Styling */
    .alert {
        margin-bottom: 12px;
        border-radius: 4px;
        font-size: 12px;
        padding: 8px 12px;
    }
    
    /* Mobile Responsive Styles */
    @media (max-width: 767px) {
        .time-duration-form-wrapper {
            margin-bottom: 10px;
            border-radius: 4px;
        }
        
        .form-header-section {
            padding: 10px 12px;
        }
        
        .form-header-section h3 {
            font-size: 14px;
        }
        
        .form-header-section h3 i {
            font-size: 12px;
        }
        
        .form-body-section {
            padding: 10px;
        }
        
        .form-group {
            margin-bottom: 10px;
        }
        
        .form-group label {
            font-size: 11px;
            margin-bottom: 6px;
        }
        
        .form-group label i {
            font-size: 11px;
        }
        
        .input-group .form-control {
            padding: 8px 10px;
            font-size: 12px;
            min-height: 40px;
        }
        
        .input-group-addon {
            padding: 0 10px;
            min-width: 45px;
            min-height: 40px;
        }
        
        .input-group-addon i {
            font-size: 12px;
        }
        
        .help-inline,
        .help-block {
            font-size: 10px;
            margin-top: 6px;
        }
        
        .help-inline i,
        .help-block i {
            font-size: 10px;
        }
        
        .help-block.info {
            padding: 6px 8px;
            font-size: 10px;
        }
        
        .help-block.info strong {
            font-size: 10px;
        }
        
        .help-block.info i {
            font-size: 10px;
        }
        
        .form-action-section {
            padding: 18px 15px;
            margin-top: 10px;
        }
        
        .form-action-section .btn {
            width: 100%;
            padding: 12px 15px;
            font-size: 14px;
            justify-content: center;
        }
        
        .form-action-section .btn i {
            font-size: 14px;
        }
        
        .alert {
            margin-bottom: 10px;
            font-size: 11px;
            padding: 6px 10px;
        }
    }
    
    @media (min-width: 768px) {
        .form-body-section {
            max-width: 800px;
        }
        
        .input-group {
            max-width: 300px;
        }
        
        .form-group .col-lg-4 {
            padding-left: 15px;
        }
    }
</style>

<?php 
// Display message only once - prefer flashdata if available, otherwise use $message variable
$display_message = $this->session->flashdata('message') ? $this->session->flashdata('message') : (isset($message) && !empty($message) ? $message : '');
if ($display_message) {
    echo $display_message;
}
?>

<!-- block -->
<div class="block">
    <div class="time-duration-form-wrapper">
        <!-- Header Section -->
        <div class="form-header-section">
            <h3>
                <i class="fa fa-clock-o"></i> Set Time Duration for "<?=$exam_title;?>"
            </h3>
        </div>
        
        <!-- Form Body -->
        <div class="form-body-section">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-xs-12">
                            <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                        </div>
                    </div>
                    
                    <?=form_open(base_url('admin_control/update_time_n_random_ques_no'), 'role="form" class="form-horizontal"'); ?>
                    <input type="hidden" name="exam_id" value="<?=$exam_id; ?>">
                    <input type="hidden" name="exam_title" value="<?=$exam_title; ?>">
                    <input type="hidden" name="ques_count" value="<?=$ques_count; ?>">
                    
                    <!-- Time Duration Field -->
                    <div class="form-group">
                        <label for="timepicker1">
                            <i class="fa fa-hourglass-half"></i> Time Duration:
                        </label>
                        <div class="input-group">
                            <?php echo form_input('duration', '', 'id="timepicker1" placeholder="hh:mm:ss" class="form-control" required="required"') ?>
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-time"></i>
                            </span>
                        </div>
                    </div>
                    
                    <!-- Total Random Question Field -->
                    <div class="form-group">
                        <label for="random_ques">
                            <i class="fa fa-list-ol"></i> Total Random Question:
                        </label>
                        <div class="input-group">
                            <?php echo form_input('random_ques', '', 'id="random_ques" placeholder="Numbers only" class="form-control" required="required"') ?>
                        </div>
                        <div class="help-inline">
                            <i class="fa fa-info-circle"></i> Number of question have to answer.
                        </div>
                        <div class="help-block info">
                            <strong>
                                <i class="fa fa-exclamation-triangle"></i> Not more than <?=$ques_count;?>
                            </strong>
                        </div>
                    </div>
                    
                    <!-- Save Button Section -->
                    <div class="form-action-section">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save"></i> Save
                        </button>
                    </div>
                    
                    <?=form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('plugin_scripts/bootstrap-timepicker');?>
