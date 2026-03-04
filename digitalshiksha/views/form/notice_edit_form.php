<?php $this->load->view('plugin_scripts/datepicker'); ?>
<?php 
if (isset($this->session->userdata['time_zone']) && !empty($this->session->userdata['time_zone'])) {
    date_default_timezone_set($this->session->userdata['time_zone']);
}
?>

<style>
    .notice-form-wrapper {
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
        color: #333 !important;
        background-color: #fff !important;
        overflow: visible !important;
        text-overflow: clip !important;
        white-space: normal !important;
        word-wrap: break-word !important;
        overflow-wrap: break-word !important;
        padding-right: 35px;
    }
    
    select.form-control option {
        color: #333 !important;
        background-color: #fff !important;
        padding: 8px;
        white-space: normal !important;
        word-wrap: break-word !important;
        overflow-wrap: break-word !important;
    }
    
    .input-group {
        display: flex;
        align-items: stretch;
    }
    
    .input-group .form-control {
        border-right: 0;
        border-radius: 4px 0 0 4px;
    }
    
    .input-group-addon {
        background: #f8f9fa;
        border: 1px solid #ccc;
        border-left: 0;
        border-radius: 0 4px 4px 0;
        padding: 10px 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #666;
    }
    
    .input-group .form-control:focus + .input-group-addon,
    .input-group .form-control:focus {
        border-color: #e11d80;
    }
    
    .wysihtml5-toolbar {
        border: 1px solid #ccc;
        border-radius: 4px 4px 0 0;
        border-bottom: none;
        padding: 8px;
        background: #f8f9fa;
    }
    
    .wysihtml5-sandbox {
        border: 1px solid #ccc !important;
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
    
    @media (max-width: 767px) {
        .notice-form-wrapper {
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
        
        .input-group-addon {
            padding: 12px;
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
        .notice-form-wrapper {
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

<div class="notice-form-wrapper">
    <div class="form-header">
        <h4><i class="fa fa-edit"></i> Edit Notice</h4>
        <a href="<?php echo base_url('noticeboard'); ?>" class="back-btn">
            <i class="fa fa-arrow-left"></i> Back to List
        </a>
    </div>
    
    <div class="form-body">
        <?php if ($message) echo $message; ?>
        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
        
        <?= form_open(base_url('noticeboard/update/'.$notice->notice_id), 'method="post" role="form" class="form-horizontal"'); ?>
        
        <div class="form-group">
            <label for="notice_type">
                <i class="fa fa-tag"></i> Type <span class="required">*</span>
            </label>
            <select name="notice_type" id="notice_type" class="form-control" required="required">
                <option value="1" <?php if($notice->notice_type == 1) echo 'selected="selected"'; ?>>Notice</option>
                <option value="2" <?php if($notice->notice_type == 2) echo 'selected="selected"'; ?>>Breaking News</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="notice_title">
                <i class="fa fa-header"></i> Title <span class="required">*</span>
            </label>
            <?php 
            $data = array(
                'name'        => 'notice_title',
                'id'          => 'notice_title',
                'placeholder' => 'Enter notice title',
                'value'       => $notice->notice_title,
                'rows'        => '4',
                'class'       => 'form-control textarea-wysihtml5',
                'required'    => 'required',
            );
            echo form_textarea($data);
            ?>
        </div>
        
        <div class="form-group">
            <label for="daterange">
                <i class="fa fa-calendar"></i> Date Range <span class="required">*</span>
            </label>
            <div class="input-group">
                <input type="text" name="daterange" id="daterange" class="form-control" value="<?php echo $notice->notice_start.' - '.$notice->notice_end; ?>" required="required"/>
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            </div>
        </div>
        
        <div class="form-group">
            <label for="notice_status">
                <i class="fa fa-toggle-on"></i> Status <span class="required">*</span>
            </label>
            <select name="notice_status" id="notice_status" class="form-control" required="required">
                <option value="1" <?php if($notice->notice_status) echo 'selected'; ?>>Active</option>
                <option value="0" <?php if(!$notice->notice_status) echo 'selected'; ?>>Inactive</option>
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

<?php $this->load->view('plugin_scripts/bootstrap-wysihtml5'); ?>

<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        $('#daterange').daterangepicker({
            timePicker: false, 
            timePickerIncrement: 30, 
            format: 'YYYY-MM-DD' 
        });
    });
</script>
