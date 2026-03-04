<style>
    .banned-users-wrapper {
        background: #fff;
        border-radius: 4px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        overflow: hidden;
        width: 100%;
        margin-bottom: 20px;
    }
    
    .banned-users-header {
        background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
        border-bottom: 3px solid #FFD700;
        color: white;
        padding: 12px 15px;
        margin-bottom: 0;
    }
    
    .banned-users-header h4 {
        margin: 0;
        font-size: 16px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .banned-users-header h4 i {
        font-size: 14px;
        color: #FFD700;
    }
    
    .banned-users-content {
        padding: 12px;
    }
    
    .banned-users-tabs {
        display: flex;
        gap: 6px;
        border-bottom: 2px solid #e9ecef;
        background: #f8f9fa;
        padding: 0 12px;
        margin: -12px -12px 12px -12px;
        flex-wrap: wrap;
    }
    
    .banned-users-tabs .tab-link {
        padding: 8px 12px;
        background: transparent;
        border: none;
        border-bottom: 3px solid transparent;
        color: #555;
        font-size: 12px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        position: relative;
        margin-bottom: -2px;
    }
    
    .banned-users-tabs .tab-link:hover {
        color: #2c3e50;
        background: rgba(255, 255, 255, 0.8);
        border-bottom-color: rgba(255, 215, 0, 0.6);
    }
    
    .banned-users-tabs .tab-link.active {
        color: #2c3e50;
        border-bottom-color: #FFD700;
        background: #fff;
        font-weight: 700;
        box-shadow: 0 -2px 4px rgba(0,0,0,0.05);
    }
    
    .banned-users-tabs .tab-link i {
        font-size: 12px;
        transition: all 0.3s;
    }
    
    .banned-users-tabs .tab-link.active i {
        color: #FFD700;
        transform: scale(1.1);
    }
    
    .banned-users-tabs .tab-link:hover i {
        transform: scale(1.05);
    }
    
    .banned-users-wrapper .tab-content .tab-pane {
        display: none !important;
    }
    
    .banned-users-wrapper .tab-content .tab-pane.active {
        display: block !important;
    }
    
    .delete-actions {
        margin-bottom: 12px;
        padding: 12px;
        background: #fff3cd;
        border: 1px solid #ffc107;
        border-radius: 4px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        flex-wrap: wrap;
    }
    
    .delete-actions .checkbox-section {
        display: flex;
        align-items: center;
        gap: 15px;
        margin: 0;
        padding: 0;
        background: transparent;
        flex: 1;
        min-width: 200px;
    }
    
    .delete-actions .checkbox-section label {
        flex: 1;
        white-space: nowrap;
    }
    
    .delete-actions .btn-danger {
        background: #dc3545;
        border-color: #dc3545;
        color: white;
        padding: 8px 16px;
        font-size: 14px;
        border-radius: 4px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s;
        white-space: nowrap;
        flex-shrink: 0;
    }
    
    .delete-actions .btn-danger:hover {
        background: #c82333;
        border-color: #bd2130;
    }
    
    .user-info-card {
        background: white;
        border: 1px solid #dee2e6;
        border-left: 4px solid #FFD700;
        border-radius: 4px;
        padding: 12px;
        margin-bottom: 10px;
        transition: all 0.3s;
    }
    
    .user-info-card:hover {
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        transform: translateY(-2px);
        border-left-width: 5px;
    }
    
    .user-title-section {
        margin-bottom: 12px;
        padding-bottom: 8px;
        border-bottom: 2px solid #FFD700;
    }
    
    .user-title-section h4 {
        margin: 0;
        font-size: 14px;
        font-weight: 600;
        color: #333;
    }
    
    .user-info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 8px;
        margin: 12px 0;
    }
    
    .user-info-item {
        display: flex;
        align-items: center;
        padding: 8px;
        background: white;
        border-radius: 3px;
        border: 1px solid #e0e0e0;
    }
    
    .user-info-item .info-label {
        font-weight: 600;
        color: #666;
        margin-right: 8px;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        min-width: 100px;
        max-width: 120px;
        flex-shrink: 0;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }
    
    .user-info-item .info-label i {
        color: #716006;
        width: 16px;
        text-align: center;
        flex-shrink: 0;
        display: inline-block;
        font-size: 11px;
    }
    
    .user-info-item .info-value {
        color: #333;
        font-size: 12px;
        font-weight: 600;
        flex: 1;
        word-wrap: break-word;
        overflow-wrap: break-word;
        word-break: break-word;
        min-width: 0;
        overflow: visible;
        white-space: normal;
    }
    
    .user-actions {
        margin-top: 12px;
        padding-top: 12px;
        border-top: 2px solid #e0e0e0;
    }
    
    .user-actions-label {
        font-weight: 600;
        color: #666;
        display: block;
        margin-bottom: 8px;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .btn-group {
        display: flex;
        gap: 6px;
        flex-wrap: nowrap;
        justify-content: center;
        align-items: center;
    }
    
    .btn {
        padding: 6px 10px;
        font-size: 12px;
        border-radius: 4px;
        border: none;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        cursor: pointer;
        font-weight: 500;
        white-space: nowrap;
        overflow: visible;
        flex-shrink: 0;
    }
    
    .btn i {
        font-size: 12px;
        flex-shrink: 0;
    }
    
    .btn span {
        white-space: nowrap;
    }
    
    .btn-activate {
        background: #28a745;
        color: white;
    }
    
    .btn-activate:hover {
        background: #218838;
        color: white;
    }
    
    .btn-unban {
        background: #007bff;
        color: white;
    }
    
    .btn-unban:hover {
        background: #0056b3;
        color: white;
    }
    
    .checkbox-section {
        margin-bottom: 15px;
        padding: 10px;
        background: #f8f9fa;
        border-radius: 4px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .checkbox-section input[type="checkbox"] {
        width: 18px;
        height: 18px;
        cursor: pointer;
    }
    
    .no-data-message {
        text-align: center;
        padding: 40px 20px;
        color: #666;
        font-size: 16px;
    }
    
    .table-scroll-hint {
        display: none !important;
    }
    
    @media (max-width: 767px) {
        .banned-users-header {
            padding: 12px 15px;
        }
        
        .banned-users-header h4 {
            font-size: 16px;
        }
        
        .banned-users-header h4 i {
            font-size: 14px;
        }
        
        .banned-users-content {
            padding: 10px;
        }
        
        .banned-users-tabs {
            padding: 0 10px;
            flex-direction: row;
            gap: 4px;
            margin: -10px -10px 10px -10px;
        }
        
        .banned-users-tabs .tab-link {
            padding: 12px 15px;
            border-bottom: 1px solid #e9ecef;
            border-left: 3px solid transparent;
            width: 100%;
            justify-content: flex-start;
        }
        
        .banned-users-tabs .tab-link.active {
            border-left-color: #e11d80;
            border-bottom-color: #e9ecef;
            background: #fff;
        }
        
        .delete-actions {
            padding: 12px;
            flex-direction: column;
            align-items: flex-start;
        }
        
        .delete-actions .checkbox-section {
            width: 100%;
            min-width: auto;
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }
        
        .delete-actions .checkbox-section .btn-danger {
            width: 100%;
            justify-content: center;
            margin-left: 0 !important;
        }
        
        .user-info-card {
            padding: 15px;
        }
        
        .user-title-section {
            margin-bottom: 12px;
            padding-bottom: 10px;
        }
        
        .user-title-section h4 {
            font-size: 16px;
        }
        
        .user-info-grid {
            grid-template-columns: 1fr;
            gap: 8px;
        }
        
        .user-info-item {
            flex-direction: column;
            align-items: flex-start;
            padding: 10px;
        }
        
        .user-info-item .info-label {
            margin-bottom: 5px;
            margin-right: 0;
            min-width: auto;
            width: 100%;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }
        
        .user-info-item .info-value {
            width: 100%;
            word-wrap: break-word;
        }
        
        .user-actions {
            margin-top: 12px;
            padding-top: 12px;
        }
        
        .user-actions-label {
            margin-bottom: 8px;
            font-size: 12px;
        }
        
        .btn-group {
            flex-direction: row !important;
            width: 100%;
            gap: 8px;
            flex-wrap: wrap;
            justify-content: flex-start;
        }
        
        .btn {
            padding: 8px 12px !important;
            font-size: 12px !important;
            width: auto !important;
            min-width: auto !important;
            max-width: none !important;
            height: auto !important;
            flex: 0 0 auto !important;
            gap: 6px !important;
            display: inline-flex !important;
            justify-content: center !important;
            align-items: center !important;
            text-align: center;
        }
        
        .btn span.hidden-xs {
            display: inline !important;
        }
        
        .btn i {
            font-size: 14px !important;
            margin: 0 !important;
            display: inline-block !important;
            line-height: 1 !important;
            flex-shrink: 0;
            vertical-align: middle;
            text-align: center;
        }
    }
</style>

<div id="note">
    <?=validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>        
    <?=($this->session->flashdata('s_message')) ? $this->session->flashdata('s_message') : '' ?>
    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>
            <?php echo $this->session->flashdata('error'); ?>
        </div>
    <?php endif; ?>
    <?=($message) ? $message : ''; ?>
</div>

<div class="banned-users-wrapper">
    <div class="banned-users-header">
        <h4><i class="fa fa-ban"></i> Banned & Inactive Users</h4>
    </div>
    
    <div class="banned-users-content">
        <div class="banned-users-tabs">
            <a href="#banned" class="tab-link active" data-tab="banned">
                <i class="fa fa-ban"></i> Banned
            </a>
            <a href="#inactive" class="tab-link" data-tab="inactive">
                <i class="fa fa-user-times"></i> Inactive
            </a>
        </div>
        
        <div class="tab-content">
            <?php if (isset($users) != NULL) { ?>
                <!-- Banned Users Tab -->
                <div class="tab-pane active" id="banned">
                    <form id="recordBanForm" method="post" action="<?php echo site_url('user_control/delete_records'); ?>">
                        <div class="delete-actions">
                            <div class="checkbox-section">
                                <input type="checkbox" id="selectBanAll">
                                <label for="selectBanAll" style="margin: 0; cursor: pointer; font-weight: 500;">Select All Banned Users</label>
                                <button type="button" class="btn btn-danger" id="deleteBanSelected" style="margin-left: auto;">
                                    <i class="glyphicon glyphicon-trash"></i> Delete Selected Users
                                </button>
                            </div>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tbody>
                                    <?php
                                    $j = 1;
                                    foreach ($users as $user) {
                                        if (($user->banned == 1) && ($user->user_role_id > $this->session->userdata['user_role_id'])) {
                                    ?>
                                        <tr>
                                            <td>
                                                <div class="user-info-card">
                                                    <div class="checkbox-section" style="margin-bottom: 0; padding: 0; background: transparent;">
                                                        <input type="checkbox" class="recordBanCheckbox" name="record_ids[]" value="<?php echo $user->user_id; ?>" style="margin-right: 10px;">
                                                    </div>
                                                    
                                                    <div class="user-title-section">
                                                        <h4><?= $user->user_name; ?></h4>
                                                    </div>
                                                    
                                                    <div class="user-info-grid">
                                                        <div class="user-info-item">
                                                            <span class="info-label"><i class="fa fa-phone"></i> Phone:</span>
                                                            <span class="info-value"><?= $user->user_phone; ?></span>
                                                        </div>
                                                        
                                                        <div class="user-info-item">
                                                            <span class="info-label"><i class="fa fa-envelope"></i> Email:</span>
                                                            <span class="info-value"><?= $user->user_email; ?></span>
                                                        </div>
                                                        
                                                        <div class="user-info-item">
                                                            <span class="info-label"><i class="fa fa-user"></i> Role:</span>
                                                            <span class="info-value"><?= $user->user_role_name; ?></span>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="user-actions">
                                                        <span class="user-actions-label"><i class="fa fa-cogs"></i> Actions:</span>
                                                        <div class="btn-group">
                                                            <a onclick="return are_you_sure()" class="btn btn-unban" href="<?php echo base_url('user_control/unban_user_account/' . $user->user_id); ?>" title="Unban">
                                                                <i class="glyphicon glyphicon-check"></i> <span>Unban</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                        $j++;
                                        }
                                    }
                                    
                                    if($j == 1) {
                                    ?>
                                        <tr>
                                            <td>
                                                <div class="no-data-message">
                                                    <p>No banned users found</p>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
                
                <!-- Inactive Users Tab -->
                <div class="tab-pane" id="inactive">
                    <form id="recordForm" method="post" action="<?php echo site_url('user_control/delete_records'); ?>">
                        <div class="delete-actions">
                            <div class="checkbox-section">
                                <input type="checkbox" id="selectAll">
                                <label for="selectAll" style="margin: 0; cursor: pointer; font-weight: 500;">Select All Inactive Users</label>
                                <button type="button" class="btn btn-danger" id="deleteSelected" style="margin-left: auto;">
                                    <i class="glyphicon glyphicon-trash"></i> Delete Selected Users
                                </button>
                            </div>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($users as $user) {
                                        if (($user->active == 0) && ($user->user_role_id > $this->session->userdata['user_role_id'])) {
                                    ?>
                                        <tr>
                                            <td>
                                                <div class="user-info-card">
                                                    <div class="checkbox-section" style="margin-bottom: 0; padding: 0; background: transparent;">
                                                        <input type="checkbox" class="recordCheckbox" name="record_ids[]" value="<?php echo $user->user_id; ?>" style="margin-right: 10px;">
                                                    </div>
                                                    
                                                    <div class="user-title-section">
                                                        <h4><?= $user->user_name; ?></h4>
                                                    </div>
                                                    
                                                    <div class="user-info-grid">
                                                        <div class="user-info-item">
                                                            <span class="info-label"><i class="fa fa-phone"></i> Phone:</span>
                                                            <span class="info-value"><?= $user->user_phone; ?></span>
                                                        </div>
                                                        
                                                        <div class="user-info-item">
                                                            <span class="info-label"><i class="fa fa-envelope"></i> Email:</span>
                                                            <span class="info-value"><?= $user->user_email; ?></span>
                                                        </div>
                                                        
                                                        <div class="user-info-item">
                                                            <span class="info-label"><i class="fa fa-user"></i> Role:</span>
                                                            <span class="info-value"><?= $user->user_role_name; ?></span>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="user-actions">
                                                        <span class="user-actions-label"><i class="fa fa-cogs"></i> Actions:</span>
                                                        <div class="btn-group">
                                                            <a onclick="return are_you_sure()" class="btn btn-activate" href="<?php echo base_url('user_control/activate_user_account/' . $user->user_id); ?>" title="Activate">
                                                                <i class="glyphicon glyphicon-check"></i> <span>Activate</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                        $i++;
                                        }
                                    }
                                    
                                    if($i == 1) {
                                    ?>
                                        <tr>
                                            <td>
                                                <div class="no-data-message">
                                                    <p>No inactive users found</p>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            <?php } else { ?>
                <div class="no-data-message">
                    <p>You have no banned or inactive users!</p>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php $this->load->view('plugin_scripts/are_you_sure'); ?>

<script>
    $(document).ready(function () {
        // Tab switching functionality
        $('.banned-users-tabs .tab-link').click(function(e) {
            e.preventDefault();
            var targetTab = $(this).data('tab');
            
            // Update active tab link
            $('.banned-users-tabs .tab-link').removeClass('active');
            $(this).addClass('active');
            
            // Show corresponding tab pane
            $('.tab-content .tab-pane').removeClass('active');
            $('#' + targetTab).addClass('active');
        });
        
        // Initialize - show only active tab on page load
        $('.tab-content .tab-pane').removeClass('active');
        $('.tab-content .tab-pane#banned').addClass('active');
        
        // Select or Deselect all checkboxes - Inactive
        $('#selectAll').click(function () {
            $('.recordCheckbox').prop('checked', this.checked);
        });

        // Deselect "Select All" if one of the checkboxes is deselected - Inactive
        $('.recordCheckbox').change(function () {
            if (!this.checked) {
                $('#selectAll').prop('checked', false);
            }
        });

        // Delete selected inactive users
        $('#deleteSelected').click(function() {
            var checked = $('.recordCheckbox:checked').length;
            if (checked === 0) {
                alert('Please select at least one user to delete.');
                return false;
            }
            if (confirm('Are you sure you want to delete ' + checked + ' selected user(s)?')) {
                $('#recordForm').submit();
            }
        });

        // Select or Deselect all checkboxes - Banned
        $('#selectBanAll').click(function () {
            $('.recordBanCheckbox').prop('checked', this.checked);
        });

        // Deselect "Select All" if one of the checkboxes is deselected - Banned
        $('.recordBanCheckbox').change(function () {
            if (!this.checked) {
                $('#selectBanAll').prop('checked', false);
            }
        });

        // Delete selected banned users
        $('#deleteBanSelected').click(function() {
            var checked = $('.recordBanCheckbox:checked').length;
            if (checked === 0) {
                alert('Please select at least one user to delete.');
                return false;
            }
            if (confirm('Are you sure you want to delete ' + checked + ' selected user(s)?')) {
                $('#recordBanForm').submit();
            }
        });
    });
</script>
