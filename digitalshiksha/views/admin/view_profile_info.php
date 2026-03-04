<?php //echo "<pre>"; print_r($profile_info); exit(); ?>
<style>
    .profile-wrapper {
        background: #fff;
        border-radius: 4px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        overflow: hidden;
        width: 100%;
        margin-bottom: 12px;
    }
    
    .profile-header {
        background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
        border-bottom: 3px solid #FFD700;
        color: white;
        padding: 10px 15px;
        margin-bottom: 0;
    }
    
    .profile-header h4 {
        margin: 0;
        font-size: 16px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .profile-header h4 i {
        font-size: 14px;
        color: #FFD700;
    }
    
    .profile-content {
        padding: 12px;
    }
    
    .profile-tabs {
        display: flex;
        gap: 6px;
        border-bottom: 2px solid #e9ecef;
        margin-bottom: 12px;
        flex-wrap: wrap;
    }
    
    .profile-tabs .tab-link {
        padding: 8px 12px;
        background: transparent;
        border: none;
        border-bottom: 3px solid transparent;
        color: #666;
        font-size: 12px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    
    .profile-tabs .tab-link:hover {
        color: #2c3e50;
        background: #f8f9fa;
    }
    
    .profile-tabs .tab-link.active {
        color: #2c3e50;
        border-bottom-color: #FFD700;
        background: #fff;
    }
    
    .profile-tabs .tab-link i {
        font-size: 12px;
    }
    
    .profile-wrapper .tab-content .tab-pane {
        display: none !important;
    }
    
    .profile-wrapper .tab-content .tab-pane.active {
        display: block !important;
    }
    
    /* Override negative margins that cut off inputs */
    .profile-wrapper .form-horizontal .form-group,
    .profile-wrapper .form-group {
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
        color: #2c3e50;
        margin-left: 3px;
    }
    
    .form-control {
        border-radius: 4px;
        border: 1px solid #ccc;
        padding: 6px 10px;
        transition: border-color 0.3s, box-shadow 0.3s;
        color: #333;
        font-size: 12px;
        width: 100%;
        box-sizing: border-box;
        background-color: #fff;
    }
    
    input[type="file"].form-control {
        padding: 8px 12px;
        overflow: visible;
        white-space: normal;
        text-overflow: ellipsis;
        min-height: 40px;
        line-height: 1.5;
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
    
    .form-control:disabled {
        background-color: #e9ecef;
        opacity: 1;
        cursor: not-allowed;
        color: #555;
    }
    
    select.form-control {
        color: #333 !important;
        background-color: #fff !important;
        overflow: visible !important;
        text-overflow: clip !important;
        white-space: normal !important;
        word-wrap: break-word !important;
        overflow-wrap: break-word !important;
        padding: 10px 40px 10px 12px !important;
        width: 100% !important;
        min-width: 100% !important;
        max-width: 100% !important;
        box-sizing: border-box !important;
        appearance: none !important;
        -webkit-appearance: none !important;
        -moz-appearance: none !important;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%23333'%3e%3cpath d='M7 10l5 5 5-5z'/%3e%3c/svg%3e") !important;
        background-repeat: no-repeat !important;
        background-position: right 12px center !important;
        background-size: 20px !important;
    }
    
    select.form-control option {
        color: #333 !important;
        background-color: #fff !important;
        padding: 8px 12px;
        white-space: normal !important;
        word-wrap: break-word !important;
        overflow-wrap: break-word !important;
        min-width: 100%;
        width: auto;
    }
    
    input[type="file"] {
        padding: 8px 12px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: #fff;
        width: 100%;
        box-sizing: border-box;
        overflow: visible;
        white-space: normal;
        text-overflow: ellipsis;
        min-height: 40px;
        line-height: 1.5;
    }
    
    input[type="file"]::-webkit-file-upload-button {
        background: #FFD700;
        color: #000;
        padding: 8px 18px;
        border: none;
        border-radius: 4px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        margin-right: 15px;
        white-space: nowrap;
        overflow: visible;
        flex-shrink: 0;
    }
    
    input[type="file"]::-webkit-file-upload-button:hover {
        background: #f1b900;
    }
    
    input[type="file"]::file-selector-button {
        background: #FFD700;
        color: #000;
        padding: 8px 18px;
        border: none;
        border-radius: 4px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        margin-right: 15px;
        white-space: nowrap;
        flex-shrink: 0;
    }
    
    input[type="file"]::file-selector-button:hover {
        background: #f1b900;
    }
    
    .photo-preview {
        text-align: center;
        margin-top: 20px;
        margin-bottom: 10px;
    }
    
    .photo-preview img {
        border-radius: 50%;
        border: 4px solid #FFD700;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        width: 150px;
        height: 150px;
        object-fit: cover;
        display: inline-block;
        max-width: 100%;
    }
    
    .form-actions {
        margin-top: 12px;
        padding-top: 12px;
        border-top: 1px solid #e9ecef;
    }
    
    .btn {
        padding: 6px 12px;
        font-size: 12px;
        font-weight: 500;
        border-radius: 4px;
        transition: all 0.3s;
        border: none;
        cursor: pointer;
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
        font-weight: 600;
    }
    
    .btn-primary:hover {
        background: #f1b900;
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(255, 215, 0, 0.3);
        color: #000;
    }
    
    .alert {
        margin-bottom: 12px;
        border-radius: 4px;
    }
    
    @media (max-width: 767px) {
        .profile-wrapper {
            margin-bottom: 10px;
        }
        
        .profile-header {
            padding: 10px 12px;
        }
        
        .profile-header h4 {
            font-size: 14px;
        }
        
        .profile-header h4 i {
            font-size: 12px;
        }
        
        .profile-content {
            padding: 10px;
        }
        
        .profile-tabs {
            flex-direction: column;
            gap: 0;
            border-bottom: none;
            margin-bottom: 10px;
        }
        
        .profile-tabs .tab-link {
            padding: 8px 10px;
            border-bottom: 1px solid #e9ecef;
            border-left: 3px solid transparent;
            border-right: none;
            border-top: none;
            width: 100%;
            justify-content: flex-start;
            font-size: 11px;
        }
        
        .profile-tabs .tab-link i {
            font-size: 11px;
        }
        
        .profile-tabs .tab-link.active {
            border-left-color: #FFD700;
            border-bottom-color: #e9ecef;
            background: #f8f9fa;
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
            border: 1px solid #ccc;
        }
        
        select.form-control {
            height: auto;
            min-height: 48px;
            padding: 12px 40px 12px 12px !important;
            font-size: 16px;
            background-position: right 12px center !important;
            box-sizing: border-box !important;
            width: 100% !important;
            text-overflow: clip !important;
            white-space: normal !important;
            word-wrap: break-word !important;
            overflow-wrap: break-word !important;
            overflow: visible !important;
        }
        
        input[type="file"] {
            padding: 12px 15px;
            font-size: 16px;
            overflow: visible;
            white-space: normal;
            text-overflow: ellipsis;
            min-height: 48px;
            line-height: 1.5;
        }
        
        input[type="file"]::-webkit-file-upload-button {
            padding: 10px 18px;
            font-size: 16px;
            margin-right: 15px;
            flex-shrink: 0;
        }
        
        input[type="file"]::file-selector-button {
            padding: 10px 18px;
            font-size: 16px;
            margin-right: 15px;
            flex-shrink: 0;
        }
        
        .photo-preview {
            margin-top: 20px;
            margin-bottom: 15px;
        }
        
        .photo-preview img {
            width: 120px;
            height: 120px;
            border-width: 3px;
        }
        
        .form-actions {
            margin-top: 10px;
            padding-top: 10px;
        }
        
        .btn {
            width: 100%;
            justify-content: center;
            padding: 8px 12px;
            font-size: 12px;
        }
        
        .btn i {
            font-size: 12px;
        }
    }
    
    @media (min-width: 768px) {
        .profile-wrapper {
            margin-bottom: 12px;
        }
        
        .profile-header {
            padding: 10px 15px;
        }
        
        .profile-content {
            padding: 12px;
        }
        
        .profile-tabs {
            margin-bottom: 12px;
        }
        
        .form-group {
            max-width: 600px;
            margin-bottom: 12px;
        }
        
        .form-group label {
            font-size: 12px;
        }
        
        .form-control {
            padding: 6px 10px;
            font-size: 12px;
        }
        
        .form-actions {
            margin-top: 12px;
            padding-top: 12px;
        }
        
        .btn {
            padding: 6px 12px;
            font-size: 12px;
        }
        
        /* Ensure state and district dropdowns have proper width matching other form fields */
        select[name="state"],
        select[name="district"] {
            width: 100% !important;
            min-width: 100% !important;
            max-width: 100% !important;
            box-sizing: border-box !important;
            padding: 10px 40px 10px 12px !important;
            text-overflow: clip !important;
            white-space: normal !important;
            word-wrap: break-word !important;
            overflow-wrap: break-word !important;
            overflow: visible !important;
        }
        
        select[name="state"] option,
        select[name="district"] option {
            padding: 10px 12px !important;
            white-space: normal !important;
            word-wrap: break-word !important;
            overflow-wrap: break-word !important;
        }
        
        /* Remove max-width constraint for form-groups containing state/district dropdowns on desktop */
        /* Use attribute selector to find form-groups with state/district selects */
        select.form-control {
    padding: 6px !important;
}       
    }
</style>

<!-- JavaScript-based fallback for browsers without :has() support -->
<script>
if (document.querySelector && (!CSS.supports || !CSS.supports('selector(:has(*))'))) {
    document.addEventListener('DOMContentLoaded', function() {
        var stateSelect = document.querySelector('select[name="state"]');
        var districtSelect = document.querySelector('select[name="district"]');
        
        if (stateSelect && stateSelect.parentElement && stateSelect.parentElement.classList.contains('form-group')) {
            stateSelect.parentElement.style.maxWidth = '100%';
        }
        if (districtSelect && districtSelect.parentElement && districtSelect.parentElement.classList.contains('form-group')) {
            districtSelect.parentElement.style.maxWidth = '100%';
        }
    });
}
</script>

<div id="note">
    <?=validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>        
    <?=(isset($message)) ? $message : ''; ?>
</div>

<div class="profile-wrapper">
    <div class="profile-header">
        <h4><i class="fa fa-user"></i> Profile Info</h4>
    </div>
    
    <div class="profile-content">
        <div class="profile-tabs">
            <a href="#tab-1" class="tab-link active" data-tab="tab-1">
                <i class="fa fa-user"></i> Personal Info
            </a>
            <a href="#tab-photo" class="tab-link" data-tab="tab-photo">
                <i class="fa fa-picture-o"></i> Upload Image
            </a>
            <a href="#tab-2" class="tab-link" data-tab="tab-2">
                <i class="fa fa-lock"></i> Change Password
            </a>
        </div>
        
        <div class="tab-content">
            <!-- Personal Info Tab -->
            <div id="tab-1" class="tab-pane active">
                <?php echo form_open(base_url() . 'admin_control/update_profile', 'role="form" class="form-horizontal"'); ?>
                
                <div class="form-group">
                    <label>Name <span class="required">*</span></label>
                    <?php echo form_input('user_name', $profile_info->user_name, 'placeholder="Name" class="form-control" required="required"') ?>
                </div>
                
                <div class="form-group">
                    <label>Phone <span class="required">*</span></label>
                    <?php echo form_input('user_phone', $profile_info->user_phone, 'placeholder="Phone" class="form-control" required="required"') ?>
                </div>
                
                <div class="form-group">
                    <label>Email <span class="required">*</span></label>
                    <?php echo form_input('user_email', $profile_info->user_email, 'placeholder="Email" class="form-control" required="required"') ?>
                </div>
                
                <div class="form-group">
                    <label>Role</label>
                    <?php echo form_input('role', $profile_info->user_role_name, 'placeholder="Role" class="form-control" disabled') ?>
                </div>
                
                <div class="form-group">
                    <label>School/Institute <span class="required">*</span></label>
                    <?= form_input('school_name', $profile_info->school_name, 'class="form-control" required="required"') ?>
                </div>
                
                <div class="form-group">
                    <label>State</label>
                    <?= form_dropdown('state', $states, $profile_info->state, 'class="form-control"') ?>
                </div>
                
                <div class="form-group">
                    <label>District</label>
                    <?php if($district_check) { 
                        echo form_dropdown('district', $districts, $profile_info->district, 'class="form-control"');
                        echo form_input('district', '', 'class="form-control" style="display:none" disabled');
                    } else {
                        echo form_input('district', $profile_info->district, 'class="form-control"');
                        echo form_dropdown('district', $districts, $profile_info->district, 'class="form-control" style="display:none" disabled');
                    }
                    ?>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save"></i> Save
                    </button>
                </div>
                
                <?php echo form_close() ?>
            </div>
            
            <!-- Upload Photo Tab -->
            <div id="tab-photo" class="tab-pane">
                <?= form_open_multipart(base_url('admin_control/upload_image'), 'role="form" class="form-horizontal"'); ?>
                
                <div class="form-group">
                    <label>Upload Photo <span class="required">*</span></label>
                    <input type="file" name="user_photo" class="form-control" required="required" />
                </div>
                
                <?php
                    $default_photo_src = base_url('uploads/user-avatar/avatar-placeholder.jpg');
                    if (!file_exists('./uploads/user-avatar/avatar-placeholder.jpg') && file_exists('./user-avatar/avatar-placeholder.jpg')) {
                        $default_photo_src = base_url('user-avatar/avatar-placeholder.jpg');
                    }

                    $profile_photo_src = $default_photo_src;
                    if (!empty($profile_info->user_photo)) {
                        if (file_exists('./uploads/user-avatar/' . $profile_info->user_photo)) {
                            $profile_photo_src = base_url('uploads/user-avatar/' . $profile_info->user_photo);
                        } elseif (file_exists('./user-avatar/' . $profile_info->user_photo)) {
                            $profile_photo_src = base_url('user-avatar/' . $profile_info->user_photo);
                        }
                    }
                ?>
                <div class="photo-preview">
                    <img src="<?= $profile_photo_src ?>" alt="Profile Photo">
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-upload"></i> Update Photo
                    </button>
                </div>
                
                <?= form_close() ?>
            </div>
            
            <!-- Change Password Tab -->
            <div id="tab-2" class="tab-pane">
                <?= form_open(base_url('admin_control/change_password'), 'role="form" class="form-horizontal"'); ?>
                
                <div class="form-group">
                    <label>Current Password <span class="required">*</span></label>
                    <?= form_password('old-pass', '', 'placeholder="Current Password" class="form-control" required="required"') ?>
                </div>
                
                <div class="form-group">
                    <label>New Password <span class="required">*</span></label>
                    <?= form_password('new-pass', '', 'placeholder="New Password" class="form-control" required="required"') ?>
                </div>
                
                <div class="form-group">
                    <label>Re-type New Password <span class="required">*</span></label>
                    <?= form_password('re-new-pass', '', 'placeholder="Re-type New Password" class="form-control" required="required"') ?>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-key"></i> Change Password
                    </button>
                </div>
                
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Initialize tabs on page load - ensure only the active tab is visible
        var $wrapper = $('.profile-wrapper');
        
        // Find the tab link that has active class in HTML
        var $activeTabLink = $wrapper.find('.profile-tabs .tab-link.active');
        var activeTabId = null;
        
        if ($activeTabLink.length > 0) {
            activeTabId = $activeTabLink.data('tab');
        } else {
            // If no active tab, use the first one
            $activeTabLink = $wrapper.find('.profile-tabs .tab-link').first();
            activeTabId = $activeTabLink.data('tab');
            $activeTabLink.addClass('active');
        }
        
        // Remove active class from all tab panes first
        $wrapper.find('.tab-content .tab-pane').removeClass('active');
        
        // Activate only the correct tab pane
        if (activeTabId) {
            $wrapper.find('#' + activeTabId).addClass('active');
        }
        
        // Tab switching functionality
        $wrapper.find('.profile-tabs .tab-link').on('click', function(e) {
            e.preventDefault();
            var targetTab = $(this).data('tab');
            var $wrapper = $(this).closest('.profile-wrapper');
            
            // Remove active class from all tabs and panes within this wrapper
            $wrapper.find('.profile-tabs .tab-link').removeClass('active');
            $wrapper.find('.tab-content .tab-pane').removeClass('active');
            
            // Add active class to clicked tab and corresponding pane
            $(this).addClass('active');
            $wrapper.find('#' + targetTab).addClass('active');
        });
        
        // State dropdown change handler
        $("select option:first").attr('disabled', 'disabled');
        
        $('select[name="state"]').on('change', function(){
            if(this.value == 1) {
                $('select[name="district"]').show();
                $('select[name="district"]').prop('disabled', false);
                $("select[name='district'] option:first").attr('disabled', 'disabled');
                $('input[name="district"]').hide();
                $('input[name="district"]').prop('disabled', true);
            } else if(this.value == 0) {
                $('select[name="district"]').show();
                $('select[name="district"]').prop('disabled', false);
                $('select[name="district"]').val($('select[name="district"] option:first').val());
                $("select[name='district'] option:first").attr('disabled', 'disabled');
                $('input[name="district"]').hide();
                $('input[name="district"]').prop('disabled', true);
            } else {
                $('input[name="district"]').show();
                $('select[name="district"]').prop('disabled', true);
                $('select[name="district"]').hide();
                $('input[name="district"]').prop('disabled', false);
            }
        });
    });
</script>
