<style>
    .user-form-wrapper {
        background: #fff;
        border-radius: 4px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }
    
    .form-header {
        background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
        border-bottom: 3px solid #FFD700;
        color: white;
        padding: 12px 15px;
        border-radius: 4px 4px 0 0;
        margin-bottom: 0;
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
        color: #FFD700;
        font-size: 14px;
    }
    
    .form-body {
        padding: 12px;
    }
    
    .form-section {
        margin-bottom: 20px;
    }
    
    .form-section-title {
        font-size: 14px;
        font-weight: 600;
        color: #333;
        margin-bottom: 12px;
        padding-bottom: 6px;
        border-bottom: 2px solid #FFD700;
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
        border: 1px solid #ddd;
        padding: 8px 12px;
        transition: border-color 0.3s, box-shadow 0.3s;
        color: #333;
        font-size: 13px;
    }
    
    .form-control:focus {
        border-color: #FFD700;
        box-shadow: 0 0 0 0.2rem rgba(255, 215, 0, 0.25);
        outline: 0;
        color: #333;
    }
    
    select.form-control {
        color: #333;
        background-color: #fff;
        height: auto;
    }
    
    select.form-control[multiple] {
        min-height: 120px;
        padding: 8px;
    }
    
    select.form-control option {
        color: #333;
        padding: 8px 12px;
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
    
    .form-actions {
        padding: 12px 15px;
        background: #f8f9fa;
        border-top: 1px solid #e9ecef;
        border-radius: 0 0 4px 4px;
    }
    
    .help-text {
        font-size: 13px;
        color: #555;
        margin-top: 5px;
        display: block;
    }
    
    .info-badge {
        display: inline-block;
        padding: 4px 8px;
        background: #fff3cd;
        border: 1px solid #ffc107;
        border-radius: 3px;
        font-size: 11px;
        color: #856404;
        margin-left: 10px;
        font-weight: normal;
    }
    
    .text-muted {
        color: #555 !important;
    }
    
    @media (max-width: 767px) {
        .form-body {
            padding: 10px;
        }
        
        .form-header {
            padding: 12px 15px;
        }
        
        .form-header h4 {
            font-size: 16px;
        }
        
        .form-header h4 i {
            font-size: 14px;
        }
        
        .form-actions {
            padding: 10px;
        }
        
        .info-badge {
            display: block;
            margin: 5px 0 0 0;
        }
        
        select.form-control[multiple] {
            min-height: 100px;
        }
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1 col-md-12 col-sm-12 col-xs-12">
            <?php
            if (isset($message) && $message != '') {
                echo $message;
            }
            ?>
            <?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>        
            <?=validation_errors('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>', '</div>'); ?>
            
            <div class="user-form-wrapper">
                <div class="form-header">
                    <h4><i class="fa fa-user-edit"></i> Edit User Information</h4>
                </div>
                
                <?php echo form_open(base_url() . 'user_control/edit_user', 'role="form" class="form-horizontal"'); ?>
                <?php echo form_hidden('user_id', $user_details->user_id) ?>
                
                <div class="form-body">
                    <!-- User Information Section -->
                    <div class="form-section">
                        <div class="form-section-title">User Information</div>
                        
                        <div class="form-group">
                            <label for="user_name">User Name</label>
                            <?php echo form_input('user_name', $user_details->user_name, 'placeholder="User Name" id="user_name" class="form-control" disabled') ?>
                            <small class="info-badge">Cannot be changed</small>
                        </div>
                        
                        <div class="form-group">
                            <label for="user_email">Email Address <span class="required">*</span></label>
                            <?php echo form_input('user_email', $user_details->user_email, 'type="email" pattern="^[a-zA-Z0-9.!#$%&\'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$" title="you@domain.com" placeholder="user@example.com" id="user_email" class="form-control" required="required"') ?>
                        </div>
                        
                        <div class="form-group">
                            <label for="user_phone">Phone Number</label>
                            <?php echo form_input('user_phone', $user_details->user_phone, 'type="tel" pattern="^(\(?\+?[0-9]*\)?)?[0-9_\- \(\)]*$" title="Enter Valid Phone Number" minlength="8" maxlength="15" placeholder="Enter phone number" id="user_phone" class="form-control"') ?>
                        </div>
                    </div>
                    
                    <!-- Role & Permissions Section -->
                    <div class="form-section">
                        <div class="form-section-title">Role & Permissions</div>
                        
                        <?php
                        $option = array();
                        $option[0] = '-- Select User Type --';
                        foreach ($user_role as $value) {
                            if ($value->user_role_id > $this->session->userdata('user_role_id')) {
                                $option[$value->user_role_id] = $value->user_role_name;
                            }
                        }
                        ?>
                        
                        <div class="form-group">
                            <label for="user_role">User Role</label>
                            <?php echo form_dropdown('user_role', $option, $user_details->user_role_id, 'id="user_role" class="form-control" disabled') ?>
                            <small class="info-badge">Cannot be changed</small>
                        </div>
                        
                        <div class="form-group">
                            <?php
                            $is_teacher_role = ((int)$user_details->user_role_id === 4);
                            $assigned_categories = array_filter(array_map('trim', explode(',', (string)$user_details->assign_categories)));
                            $category_attrs = 'id="parent-category" class="form-control" multiple size="5"';
                            if ($is_teacher_role) {
                                $category_attrs .= ' required="required"';
                            }
                            ?>
                            <label for="parent-category">Assign Categories <?= $is_teacher_role ? '<span class="required">*</span>' : '' ?></label>
                            <?php 
                            echo form_dropdown('assign_categories[]', $opt_category, $assigned_categories, $category_attrs)
                            ?>
                            <?php if (!$is_teacher_role): ?>
                                <small class="help-text">Optional for student role.</small>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                </div>
                
                <div class="form-actions">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <button type="submit" class="btn btn-primary btn-block" onclick="return confirm('Are you sure you want to update user details?');">
                                <i class="fa fa-save"></i> Update User
                            </button>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <button type="reset" class="btn btn-default btn-block">
                                <i class="fa fa-refresh"></i> Reset Changes
                            </button>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4">
                            <a href="<?= base_url('user_control') ?>" class="btn btn-secondary btn-block">
                                <i class="fa fa-arrow-left"></i> Cancel
                            </a>
                        </div>
                    </div>
                </div>
                
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>
<br/>
