<style>
    .student-dashboard-wrapper {
        padding: 12px 0;
        margin-left: 15px;
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
    
    /* Section Headers (Quick Actions, Your Last Few Results) - Smaller font */
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
    
    .settings-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 10px;
        margin-bottom: 12px;
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
    
    .results-section {
        margin-top: 12px;
    }
    
    .results-cards-container {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    
    .result-card {
        background: #fff;
        border: 1px solid #e0e0e0;
        border-left: 4px solid #FFD700;
        border-radius: 4px;
        padding: 0;
        transition: all 0.3s;
        box-shadow: 0 2px 4px rgba(0,0,0,0.08);
        overflow: hidden;
    }
    
    .result-card:hover {
        box-shadow: 0 6px 12px rgba(0,0,0,0.15);
        transform: translateY(-2px);
        border-left-width: 5px;
    }
    
    .result-card-header {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        padding: 10px 12px;
        border-bottom: 1px solid #e0e0e0;
    }
    
    .result-card-title {
        font-size: 14px;
        font-weight: 700;
        color: #2c3e50;
        margin: 0;
        line-height: 1.3;
        word-break: break-word;
    }
    
    .result-card-body {
        padding: 12px;
    }
    
    .result-info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 8px;
        margin-bottom: 10px;
    }
    
    .result-info-item {
        display: flex;
        align-items: center;
        gap: 6px;
        padding: 8px;
        background: #f8f9fa;
        border-radius: 6px;
        transition: all 0.2s;
    }
    
    .result-info-item:hover {
        background: #e9ecef;
    }
    
    .result-info-item .info-label {
        font-weight: 600;
        color: #666;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        min-width: 80px;
        display: flex;
        align-items: center;
        gap: 5px;
    }
    
    .result-info-item .info-label i {
        font-size: 12px;
        color: #716006;
    }
    
    .result-info-item .info-value {
        color: #333;
        font-size: 12px;
        font-weight: 500;
        flex: 1;
    }
    
    .result-actions {
        margin-top: 10px;
        padding-top: 10px;
        border-top: 2px solid #e0e0e0;
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }
    
    .result-actions-label {
        font-weight: 600;
        color: #666;
        display: flex;
        align-items: center;
        gap: 5px;
        margin-bottom: 8px;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        width: 100%;
    }
    
    .result-actions-label i {
        font-size: 11px;
    }
    
    .result-actions-buttons {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        width: 100%;
    }
    
    .result-actions-buttons .btn {
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        border: none;
        flex: 1;
        min-width: 100px;
        justify-content: center;
    }
    
    .result-actions-buttons .btn i {
        font-size: 12px;
    }
    
    .result-actions-buttons .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }
    
    .result-actions-buttons .btn-primary {
        background: #FFD700;
        color: #000;
    }
    
    .result-actions-buttons .btn-primary:hover {
        background: #FFC107;
        color: #000;
    }
    
    .result-actions-buttons .btn-danger {
        background: #dc3545;
        color: white;
    }
    
    .result-actions-buttons .btn-danger:hover {
        background: #c82333;
        color: white;
    }
    
    .label {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        padding: 5px 10px;
        border-radius: 16px;
        font-size: 11px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.3px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        transition: all 0.3s;
        border: 1.5px solid transparent;
    }
    
    .label i {
        font-size: 10px;
    }
    
    .label-success {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        color: #fff;
        border-color: #28a745;
    }
    
    .label-success:hover {
        box-shadow: 0 4px 8px rgba(40, 167, 69, 0.3);
        transform: translateY(-1px);
    }
    
    .label-primary {
        background: linear-gradient(135deg, #FFD700 0%, #FFC107 100%);
        color: #000;
        border-color: #FFD700;
        font-weight: 700;
    }
    
    .label-primary:hover {
        box-shadow: 0 4px 8px rgba(255, 215, 0, 0.4);
        transform: translateY(-1px);
    }
    
    .label-warning {
        background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
        color: #fff;
        border-color: #dc3545;
    }
    
    .label-warning:hover {
        box-shadow: 0 4px 8px rgba(220, 53, 69, 0.3);
        transform: translateY(-1px);
    }
    
    .btn-group {
        display: flex;
        gap: 5px;
    }
    
    .btn {
        padding: 6px 12px;
        border-radius: 4px;
        border: 1px solid #ddd;
        background: #fff;
        color: #333;
        text-decoration: none;
        font-size: 13px;
        transition: all 0.3s;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }
    
    .btn:hover {
        background: #FFD700;
        border-color: #FFD700;
        color: #000;
        text-decoration: none;
    }
    
    .btn-sm {
        padding: 5px 10px;
        font-size: 12px;
    }
    
    .no-results {
        text-align: center;
        padding: 40px 20px;
        color: #666;
        font-size: 14px;
    }
    
    .alert {
        margin-bottom: 20px;
        border-radius: 4px;
    }
    
    @media (max-width: 767px) {
        .student-dashboard-wrapper {
            padding: 15px 0;
            margin-left: 0;
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
        
        .settings-grid {
            grid-template-columns: repeat(2, 1fr);
        gap: 8px;
        margin-bottom: 10px;
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
        
        .result-info-grid {
            grid-template-columns: 1fr;
        gap: 6px;
        }
        
        .result-card-header {
        padding: 8px 10px;
        }
        
        .result-card-title {
        font-size: 13px;
        }
        
        .result-card-body {
        padding: 10px;
        }
        
        .result-info-item {
            flex-direction: column;
            align-items: flex-start;
        padding: 8px;
        gap: 4px;
        }
        
        .result-info-item .info-label {
            min-width: auto;
            width: 100%;
        margin-bottom: 4px;
        font-size: 10px;
    }
    
    .result-info-item .info-label i {
        font-size: 11px;
        }
        
        .result-info-item .info-value {
            width: 100%;
        font-size: 11px;
    }
    
    .result-actions {
        margin-top: 8px;
        padding-top: 8px;
    }
    
    .result-actions-label {
        font-size: 10px;
        margin-bottom: 6px;
        gap: 4px;
    }
    
    .result-actions-label i {
        font-size: 10px;
        }
        
        .result-actions-buttons {
            flex-direction: row;
            justify-content: flex-start;
        gap: 6px;
        }
        
        .result-actions-buttons .btn {
            width: auto;
            min-width: auto;
        padding: 6px 10px;
            flex: 0 0 auto;
        font-size: 11px;
        }
        
        .result-actions-buttons .btn span {
            display: none;
        }
        
        .result-actions-buttons .btn i {
            margin: 0;
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
        .student-dashboard-wrapper {
            padding: 10px 0;
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
        
        .settings-grid {
            gap: 10px;
            margin-bottom: 12px;
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
        
        .results-section {
            margin-top: 12px;
        }
        
        .results-cards-container {
            gap: 10px;
        }
        
        .result-card-header {
            padding: 10px 12px;
        }
        
        .result-card-title {
            font-size: 14px;
        }
        
        .result-card-body {
            padding: 12px;
        }
        
        .result-info-grid {
            gap: 8px;
            margin-bottom: 10px;
        }
        
        .result-info-item {
            padding: 8px;
            gap: 6px;
        }
        
        .result-actions {
            margin-top: 10px;
            padding-top: 10px;
        }
        
        .result-actions-buttons {
            gap: 8px;
        }
        
        .result-actions-buttons .btn {
            padding: 6px 12px;
            font-size: 12px;
        }
    }
</style>

<div class="student-dashboard-wrapper">
    <div class="dashboard-header">
        <h3><i class="fa fa-dashboard"></i> <?=$title; ?></h3>
    </div>
    
    <div class="dashboard-content">
        <?php 
        if ($message) {
            echo $message;
        }
        ?>
        
        <?php if($this->session->userdata('dashboard_message')) { ?>
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>
                <?= $this->session->userdata('dashboard_message') ?>
            </div>
        <?php } ?>
        
        <?php if($this->session->userdata('message')) { ?>
            <?= $this->session->userdata('message') ?>
        <?php } ?>
        
        <div class="dashboard-header section-header" style="margin-top: 0; border-radius: 4px;">
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
                
                <a href="<?=base_url('exam_control/view_results');?>" class="settings-card">
                    <div class="settings-card-icon">
                        <i class="fa fa-puzzle-piece"></i>
                    </div>
                    <p class="settings-card-label">View Result</p>
                </a>
                
                <a href="<?=base_url('exam_control/view_all_mocks');?>" class="settings-card">
                    <div class="settings-card-icon">
                        <i class="fa fa-rocket"></i>
                    </div>
                    <p class="settings-card-label">Mock Test</p>
                </a>
                
                <a href="<?=base_url('admin_control/view_live_tests');?>" class="settings-card">
                    <div class="settings-card-icon">
                        <i class="fa fa-bullseye"></i>
                    </div>
                    <p class="settings-card-label">Pending Live Test (<?= $pending_live_tests ?>)</p>
                </a>
            </div>
        </div>
        
        <div class="results-section">
            <div class="dashboard-header section-header" style="margin-top: 0; border-radius: 4px;">
                <h3><i class="fa fa-tasks"></i> Your Last Few Results</h3>
            </div>
            
            <div class="dashboard-content" style="margin-top: 0; border-radius: 0 0 4px 4px;">
                <?php if (isset($results) != NULL && !empty($results)) { ?>
                    <div class="results-cards-container">
                        <?php 
                        $i = 1;
                        foreach ($results as $result) {
                            if ($i > 5){
                                break;
                            }
                        ?>
                            <div class="result-card">
                                <div class="result-card-header">
                                    <h4 class="result-card-title"><?= $result->title_name; ?></h4>
                                </div>
                                <div class="result-card-body">
                                    <div class="result-info-grid">
                                        <div class="result-info-item">
                                            <span class="info-label">
                                                <i class="fa fa-check-circle"></i> Assessment
                                            </span>
                                            <span class="info-value">
                                                <?php 
                                                if($result->result_percent >= $result->pass_mark) {
                                                    if($result->result_percent >= 95) {
                                                        echo '<span class="label label-success"><i class="fa fa-trophy"></i> Excellent</span>';
                                                    } else {
                                                        echo '<span class="label label-primary"><i class="fa fa-check-circle"></i> Qualified</span>';
                                                    }
                                                } else { 
                                                    echo '<span class="label label-warning"><i class="fa fa-times-circle"></i> Not Qualified</span>';
                                                }
                                                ?>
                                            </span>
                                        </div>
                                        <div class="result-info-item">
                                            <span class="info-label">
                                                <i class="fa fa-percent"></i> Score
                                            </span>
                                            <span class="info-value"><?php echo $result->result_percent; ?>%</span>
                                        </div>
                                        <div class="result-info-item">
                                            <span class="info-label">
                                                <i class="fa fa-calendar"></i> Date
                                            </span>
                                            <span class="info-value"><?= date("D, d M Y", strtotime($result->exam_taken_date)); ?></span>
                                        </div>
                                    </div>
                                    <div class="result-actions">
                                        <div class="result-actions-label">
                                            <i class="fa fa-cog"></i> Actions
                                        </div>
                                        <div class="result-actions-buttons">
                                            <a href="<?= base_url('exam_control/view_result_detail/' . $result->result_id); ?>" class="btn btn-primary">
                                                <i class="glyphicon glyphicon-eye-open"></i>
                                                <span>View Details</span>
                                            </a>
                                            <a onclick="return delete_confirmation()" href="<?= base_url('exam_control/delete_results/' . $result->result_id); ?>" class="btn btn-danger">
                                                <i class="glyphicon glyphicon-trash"></i>
                                                <span>Delete</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php 
                            $i++;
                        }
                        ?>
                    </div>
                <?php } else { ?>
                    <div class="no-results">
                        <i class="fa fa-info-circle" style="font-size: 48px; color: #ccc; margin-bottom: 15px;"></i>
                        <p>No results available yet!</p>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<script>
function delete_confirmation() {
    return confirm('Are you sure you want to delete this result?');
}
</script>
