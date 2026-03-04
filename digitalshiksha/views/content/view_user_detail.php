<style>
    .user-detail-wrapper {
        background: #fff;
        border-radius: 4px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        overflow: hidden;
        margin-bottom: 12px;
    }
    
    .user-detail-header {
        background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
        border-bottom: 3px solid #FFD700;
        color: white;
        padding: 12px 15px;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
    }
    
    .user-detail-header h3 {
        margin: 0;
        font-size: 16px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
        flex: 1;
    }
    
    .user-detail-header h3 i {
        color: #FFD700;
        font-size: 14px;
    }
    
    .back-btn-header {
        background: rgba(255, 255, 255, 0.2);
        border: 2px solid rgba(255, 215, 0, 0.5);
        color: white;
        padding: 6px 12px;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 600;
        font-size: 12px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: all 0.3s;
        backdrop-filter: blur(10px);
        flex-shrink: 0;
    }
    
    .back-btn-header:hover {
        background: #FFD700;
        border-color: #FFD700;
        color: #000;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(255, 215, 0, 0.3);
        text-decoration: none;
    }
    
    .back-btn-header i {
        font-size: 12px;
        color: #FFD700;
    }
    
    .back-btn-header:hover i {
        color: #000;
    }
    
    .back-icon-mobile-header {
        display: none;
    }
    
    .user-detail-content {
        padding: 12px;
    }
    
    .user-info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 8px;
        margin-bottom: 12px;
    }
    
    .user-info-item {
        background: #f8f9fa;
        padding: 10px;
        border-radius: 6px;
        border-left: 4px solid #FFD700;
    }
    
    .user-info-label {
        font-size: 11px;
        font-weight: 600;
        color: #666;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 6px;
        display: block;
    }
    
    .user-info-value {
        font-size: 12px;
        font-weight: 600;
        color: #2c3e50;
        word-break: break-word;
    }
    
    .user-info-value.email {
        color: #007bff;
    }
    
    .back-btn {
        display: none;
    }
    
    @media (max-width: 767px) {
        .user-detail-wrapper {
            margin-bottom: 10px;
        }
        
        .user-detail-header {
            padding: 12px 15px;
            flex-wrap: wrap;
            position: relative;
        }
        
        .user-detail-header h3 {
            font-size: 16px;
            padding-right: 45px;
            width: 100%;
        }
        
        .user-detail-header h3 i {
            font-size: 14px;
        }
        
        .back-btn-header {
            display: none;
        }
        
        .back-icon-mobile-header {
            display: flex !important;
            position: absolute;
            top: 0;
            right: 0;
            width: 36px;
            height: 36px;
            background: rgba(255, 255, 255, 0.2);
            border: 2px solid rgba(255, 215, 0, 0.5);
            border-radius: 50%;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            text-decoration: none;
            transition: all 0.3s;
            flex-shrink: 0;
            z-index: 10;
            backdrop-filter: blur(10px);
        }
        
        .back-icon-mobile-header:hover {
            background: #FFD700;
            border-color: #FFD700;
            color: #000;
            transform: scale(1.1);
            box-shadow: 0 2px 6px rgba(255, 215, 0, 0.4);
            text-decoration: none;
        }
        
        .back-icon-mobile-header i {
            font-size: 16px;
            margin: 0;
        }
        
        .user-detail-content {
            padding: 10px;
        }
        
        .user-info-grid {
            grid-template-columns: 1fr;
            gap: 6px;
            margin-bottom: 10px;
        }
        
        .user-info-item {
            padding: 8px;
        }
        
        .user-info-label {
            font-size: 10px;
            margin-bottom: 4px;
        }
        
        .user-info-value {
            font-size: 11px;
        }
    }
    
    /* Desktop Optimizations */
    @media (min-width: 768px) {
        .user-detail-wrapper {
            margin-bottom: 12px;
        }
        
        .user-detail-header {
            padding: 12px 15px;
        }
        
        .back-btn-header {
            display: inline-flex;
        }
        
        .back-icon-mobile-header {
            display: none !important;
        }
        
        .user-detail-content {
            padding: 12px;
        }
        
        .user-info-grid {
            gap: 8px;
            margin-bottom: 12px;
        }
    }
</style>

<div class="user-detail-wrapper">
    <div class="user-detail-header">
        <h3><i class="fa fa-user"></i> User Details</h3>
        <a href="javascript:history.back();" class="back-btn-header">
            <i class="fa fa-arrow-left"></i> Back
        </a>
        <a href="javascript:history.back();" class="back-icon-mobile-header">
            <i class="fa fa-arrow-left"></i>
        </a>
    </div>
    
    <div class="user-detail-content">
        <?php if (isset($user_details) && !empty($user_details)) { ?>
            <div class="user-info-grid">
                <div class="user-info-item">
                    <span class="user-info-label">User Name</span>
                    <div class="user-info-value"><?= htmlspecialchars($user_details->user_name) ?></div>
                </div>
                
                <div class="user-info-item">
                    <span class="user-info-label">Email Address</span>
                    <div class="user-info-value email"><?= htmlspecialchars($user_details->user_email) ?></div>
                </div>
                
                <?php if (!empty($user_details->user_phone)) { ?>
                <div class="user-info-item">
                    <span class="user-info-label">Phone Number</span>
                    <div class="user-info-value"><?= htmlspecialchars($user_details->user_phone) ?></div>
                </div>
                <?php } ?>
                
                <?php
                // Get user role name
                $this->load->model('admin_model');
                $user_roles = $this->admin_model->get_user_role();
                $role_name = 'N/A';
                foreach ($user_roles as $role) {
                    if ($role->user_role_id == $user_details->user_role_id) {
                        $role_name = $role->user_role_name;
                        break;
                    }
                }
                ?>
                <div class="user-info-item">
                    <span class="user-info-label">User Role</span>
                    <div class="user-info-value"><?= htmlspecialchars($role_name) ?></div>
                </div>
                
                <div class="user-info-item">
                    <span class="user-info-label">Account Status</span>
                    <div class="user-info-value">
                        <?php if ($user_details->active == 1) { ?>
                            <span style="color: #28a745; font-weight: 600;">Active</span>
                        <?php } else { ?>
                            <span style="color: #dc3545; font-weight: 600;">Inactive</span>
                        <?php } ?>
                    </div>
                </div>
                
                <?php if (!empty($user_details->user_from)) { ?>
                <div class="user-info-item">
                    <span class="user-info-label">Registered Date</span>
                    <div class="user-info-value"><?= date('d M, Y', strtotime($user_details->user_from)) ?></div>
                </div>
                <?php } ?>
            </div>
        <?php } else { ?>
            <div style="text-align: center; padding: 40px;">
                <p>User details not found.</p>
            </div>
        <?php } ?>
    </div>
</div>

