<style>
    .teacher-dashboard-wrapper {
        padding: 12px 0;
    }
    
    .dashboard-header {
        background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
        border-bottom: 3px solid #FFD700;
        color: white;
        padding: 10px 15px;
        border-radius: 4px 4px 0 0;
        margin-bottom: 0;
    }
    
    .dashboard-header h3 {
        margin: 0;
        font-size: 16px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .dashboard-header h3 i {
        color: #FFD700;
        font-size: 14px;
    }
    
    /* Section Headers (Quick Actions) - Smaller font */
    .dashboard-header.section-header h3 {
        font-size: 14px;
        gap: 8px;
    }
    
    .dashboard-header.section-header h3 i {
        font-size: 13px;
    }
    
    .dashboard-content {
        background: #fff;
        padding: 12px;
        border-radius: 0 0 4px 4px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }
    
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 10px;
        margin-bottom: 12px;
    }
    
    .stat-card {
        background: #fff;
        border: 1px solid #e0e0e0;
        border-left: 4px solid #FFD700;
        border-radius: 4px;
        padding: 12px;
        transition: all 0.3s;
        text-decoration: none;
        color: inherit;
        display: block;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }
    
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        border-left-color: #FFC107;
        text-decoration: none;
        color: inherit;
    }
    
    .stat-card-content {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .stat-card-icon {
        width: 55px;
        height: 55px;
        background: linear-gradient(135deg, #FFD700 0%, #FFC107 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    
    .stat-card-icon i {
        font-size: 24px;
        color: #000;
    }
    
    .stat-card-info {
        flex: 1;
    }
    
    .stat-card-value {
        font-size: 28px;
        font-weight: 700;
        color: #333;
        margin: 0;
        line-height: 1;
    }
    
    .stat-card-label {
        font-size: 12px;
        color: #666;
        margin-top: 6px;
        font-weight: 500;
    }
    
    .settings-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 10px;
    }
    
    .settings-card {
        background: #fff;
        border: 1px solid #e0e0e0;
        border-radius: 4px;
        padding: 12px 10px;
        text-align: center;
        transition: all 0.3s;
        text-decoration: none;
        color: inherit;
        display: block;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }
    
    .settings-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        border-color: #FFD700;
        text-decoration: none;
        color: inherit;
    }
    
    .settings-card-icon {
        width: 55px;
        height: 55px;
        background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 8px;
        transition: all 0.3s;
    }
    
    .settings-card:hover .settings-card-icon {
        background: linear-gradient(135deg, #FFD700 0%, #FFC107 100%);
    }
    
    .settings-card-icon i {
        font-size: 24px;
        color: #fff;
        transition: all 0.3s;
    }
    
    .settings-card:hover .settings-card-icon i {
        color: #000;
    }
    
    .settings-card-label {
        font-size: 12px;
        color: #333;
        font-weight: 600;
        margin: 0;
        line-height: 1.3;
    }
    
    .alert {
        margin-bottom: 12px;
        border-radius: 4px;
    }
    
    @media (max-width: 767px) {
        .teacher-dashboard-wrapper {
            padding: 10px 0;
        }
        
        .dashboard-header {
            padding: 10px 12px;
        }
        
        .dashboard-header h3 {
            font-size: 16px;
        }
        
        .dashboard-header.section-header h3 {
            font-size: 13px;
            gap: 6px;
        }
        
        .dashboard-header.section-header h3 i {
            font-size: 12px;
        }
        
        .dashboard-content {
            padding: 10px;
        }
        
        .stats-grid {
            grid-template-columns: 1fr;
            gap: 8px;
            margin-bottom: 10px;
        }
        
        .stat-card {
            padding: 10px;
        }
        
        .stat-card-content {
            gap: 10px;
        }
        
        .stat-card-icon {
            width: 50px;
            height: 50px;
        }
        
        .stat-card-icon i {
            font-size: 22px;
        }
        
        .stat-card-value {
            font-size: 24px;
        }
        
        .stat-card-label {
            font-size: 11px;
            margin-top: 4px;
        }
        
        .settings-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 8px;
        }
        
        .settings-card {
            padding: 10px 8px;
        }
        
        .settings-card-icon {
            width: 50px;
            height: 50px;
            margin-bottom: 6px;
        }
        
        .settings-card-icon i {
            font-size: 22px;
        }
        
        .settings-card-label {
            font-size: 11px;
        }
    }
    
    @media (max-width: 480px) {
        .settings-grid {
            grid-template-columns: 1fr;
        }
    }
    
    /* Desktop Optimizations */
    @media (min-width: 768px) {
        .teacher-dashboard-wrapper {
            padding: 12px 0;
        }
        
        .dashboard-header {
            padding: 10px 15px;
        }
        
        .dashboard-header h3 {
            font-size: 16px;
        }
        
        .dashboard-header.section-header h3 {
            font-size: 13px;
        }
        
        .dashboard-content {
            padding: 12px;
        }
        
        .stats-grid {
            gap: 10px;
            margin-bottom: 12px;
        }
        
        .stat-card {
            padding: 12px;
        }
        
        .stat-card-content {
            gap: 12px;
        }
        
        .stat-card-icon {
            width: 55px;
            height: 55px;
        }
        
        .stat-card-icon i {
            font-size: 24px;
        }
        
        .stat-card-value {
            font-size: 28px;
        }
        
        .stat-card-label {
            font-size: 12px;
        }
        
        .settings-grid {
            gap: 10px;
        }
        
        .settings-card {
            padding: 12px 10px;
        }
        
        .settings-card-icon {
            width: 55px;
            height: 55px;
            margin-bottom: 8px;
        }
        
        .settings-card-icon i {
            font-size: 24px;
        }
        
        .settings-card-label {
            font-size: 12px;
        }
    }
</style>

<div class="teacher-dashboard-wrapper">
    <div class="dashboard-header">
        <h3><i class="fa fa-dashboard"></i> Teacher Dashboard</h3>
    </div>
    
    <div class="dashboard-content">
        <?php
        if ($message) {
            echo $message;
        }
        ?>
        
        <?php if($this->session->userdata('message')) { ?>
            <?= $this->session->userdata('message') ?>
        <?php } ?>
        
        <div class="stats-grid">
            <a href="<?=base_url('mocks/mock_test');?>" class="stat-card">
                <div class="stat-card-content">
                    <div class="stat-card-icon">
                        <i class="fa fa-puzzle-piece"></i>
                    </div>
                    <div class="stat-card-info">
                        <div class="stat-card-value"><?=$total_exam;?></div>
                        <div class="stat-card-label">Total Exams Created</div>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="dashboard-header section-header" style="margin-top: 12px; border-radius: 4px;">
            <h3><i class="fa fa-cogs"></i> Quick Actions</h3>
        </div>
        
        <div class="dashboard-content" style="margin-top: 0; border-radius: 0 0 4px 4px;">
            <div class="settings-grid">
                <a href="<?=base_url('admin_control');?>" class="settings-card">
                    <div class="settings-card-icon">
                        <i class="fa fa-user"></i>
                    </div>
                    <p class="settings-card-label">Profile Settings</p>
                </a>
                
              <a href="<?=base_url('create_mock');?>" class="settings-card">
    <div class="settings-card-icon">
        <i class="fa fa-plus-circle"></i>
    </div>
    <p class="settings-card-label">Create Mock Test</p>
</a>

<a href="<?=base_url('mocks/mock_test');?>" class="settings-card">
    <div class="settings-card-icon">
        <i class="fa fa-list-alt"></i>
    </div>
    <p class="settings-card-label">View Mock Test</p>
</a>

<a href="<?=base_url('mock-test-results');?>" class="settings-card">
    <div class="settings-card-icon">
<i class="fa fa-trophy"></i>   </div>
    <p class="settings-card-label">View Results</p>
</a>
            </div>
        </div>
    </div>
</div>
