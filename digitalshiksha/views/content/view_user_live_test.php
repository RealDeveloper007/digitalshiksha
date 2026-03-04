<div id="note">
    <?php 
    if ($message) {
        echo $message;    
    }
    ?>
</div>
<?php
$str = '[';
foreach ($categories as $value) {
    $str .= "{value:" . $value->category_id . ",text:'" . $value->category_name . " '},";
}
$str = substr($str, 0, -1);
$str .= "]";
?>

<style>
    .live-test-wrapper {
        background: #fff;
        border-radius: 4px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        overflow: hidden;
        width: 100%;
        margin-bottom: 12px;
    }
    
    .live-test-header {
        background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
        border-bottom: 3px solid #FFD700;
        color: white;
        padding: 12px 15px;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        width: 100%;
        box-sizing: border-box;
    }
    
    .live-test-header h3 {
        margin: 0;
        font-size: 18px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 10px;
        width: 100%;
        flex-shrink: 0;
    }
    
    .live-test-header h3 i {
        color: #FFD700;
        font-size: 18px;
    }
    
    .live-test-content {
        padding: 12px;
    }
    
    .live-test-cards-container {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    
    .live-test-card {
        background: #fff;
        border: 1px solid #e0e0e0;
        border-left: 4px solid #FFD700;
        border-radius: 4px;
        padding: 0;
        transition: all 0.3s;
        box-shadow: 0 2px 4px rgba(0,0,0,0.08);
        overflow: hidden;
    }
    
    .live-test-card:hover {
        box-shadow: 0 6px 12px rgba(255, 215, 0, 0.2);
        transform: translateY(-3px);
        border-left-width: 5px;
        border-left-color: #FFD700;
    }
    
    .live-test-card-header {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        padding: 10px 12px;
        border-bottom: 1px solid #e0e0e0;
    }
    
    .live-test-card-title-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 8px;
        margin-bottom: 6px;
    }
    
    .live-test-card-title {
        flex: 1;
        min-width: 0;
    }
    
    .live-test-card-title h4 {
        font-size: 14px;
        font-weight: 700;
        color: #2c3e50;
        margin: 0 0 4px 0;
        line-height: 1.2;
        word-break: break-word;
    }
    
    .live-test-card-body {
        padding: 12px;
    }
    
    .live-test-info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 8px;
        margin-bottom: 10px;
    }
    
    .live-test-info-item {
        display: flex;
        align-items: flex-start;
        gap: 8px;
        padding: 8px;
        background: #f8f9fa;
        border-radius: 6px;
        transition: all 0.2s;
    }
    
    .live-test-info-item:hover {
        background: #fffef5;
        border-left: 3px solid #FFD700;
    }
    
    .live-test-info-item .info-label {
        font-weight: 600;
        color: #666;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 4px;
        display: block;
        min-width: 100px;
    }
    
    .live-test-info-item .info-label i {
        color: #716006;
        font-size: 11px;
    }
    
    .live-test-info-item .info-value {
        color: #2c3e50;
        font-size: 12px;
        font-weight: 600;
        flex: 1;
        word-break: break-word;
    }
    
    .live-test-info-item .info-value a {
        color: #2c3e50;
        text-decoration: none;
    }
    
    .live-test-info-item .info-value a:hover {
        color: #FFD700;
    }
    
    .live-test-syllabus {
        margin-top: 10px;
        padding: 10px;
        background: #f8f9fa;
        border-radius: 6px;
        border-left: 3px solid #FFD700;
    }
    
    .live-test-syllabus .syllabus-label {
        font-weight: 600;
        color: #666;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 4px;
        display: block;
    }
    
    .live-test-syllabus .syllabus-value {
        color: #2c3e50;
        font-size: 12px;
        font-weight: 500;
        word-break: break-word;
    }
    
    .live-test-actions {
        margin-top: 10px;
        padding-top: 10px;
        border-top: 2px solid #e0e0e0;
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }
    
    .live-test-actions .btn {
        padding: 6px 12px;
        font-size: 12px;
        font-weight: 600;
        border-radius: 6px;
        border: none;
        background: #FFD700;
        color: #000;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: all 0.3s;
        cursor: pointer;
    }
    
    .live-test-actions .btn:hover {
        background: #FFC107;
        color: #000;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }
    
    .live-test-actions .btn i {
        font-size: 12px;
    }
    
    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 10px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        white-space: nowrap;
    }
    
    .status-badge.active {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        color: #fff;
        border: 1.5px solid #28a745;
    }
    
    .status-badge.inactive {
        background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
        color: #fff;
        border: 1.5px solid #dc3545;
    }
    
    .empty-state {
        text-align: center;
        padding: 30px 15px;
        color: #999;
        font-size: 14px;
    }
    
    @media (max-width: 767px) {
        .live-test-wrapper {
            margin-bottom: 10px;
        }
        
        .live-test-header {
            padding: 12px 15px;
        }
        
        .live-test-header h3 {
            font-size: 16px;
        }
        
        .live-test-header h3 i {
            font-size: 16px;
        }
        
        .live-test-content {
            padding: 10px;
        }
        
        .live-test-info-grid {
            grid-template-columns: 1fr;
            gap: 6px;
        }
        
        .live-test-info-item {
            flex-direction: column;
            align-items: flex-start;
            padding: 8px;
            gap: 4px;
        }
        
        .live-test-info-item .info-label {
            margin-bottom: 4px;
            margin-right: 0;
            min-width: auto;
            width: 100%;
        }
        
        .live-test-actions .btn {
            flex: 1;
            min-width: 120px;
            justify-content: center;
        }
        
        .live-test-actions .btn span {
            display: inline-block;
        }
    }
    
    @media (min-width: 768px) {
        .live-test-wrapper {
            margin-bottom: 12px;
        }
        
        .live-test-header {
            padding: 12px 15px;
        }
        
        .live-test-content {
            padding: 12px;
        }
        
        .live-test-info-grid {
            gap: 8px;
        }
    }
</style>

<div class="live-test-wrapper">
    <div class="live-test-header">
        <h3>
            <i class="fa fa-clock-o"></i> Pending Live Test List
        </h3>
    </div>
    
    <div class="live-test-content">
        <?php 
        $i = 1;
        $hasTests = false;
        if (isset($mocks) && !empty($mocks)) {
            foreach ($mocks as $mock) {
                if($this->CI->checkLiveTestResult($mock->title_id)==0) {
                    $hasTests = true;
                    $i++;
                }
            }
        }
        ?>
        
        <?php if (isset($mocks) && !empty($mocks) && $hasTests) { ?>
            <div class="live-test-cards-container">
                <?php
                $i = 1;
                foreach ($mocks as $mock) {
                    if($this->CI->checkLiveTestResult($mock->title_id)==0) {
                ?>
                    <div class="live-test-card">
                        <div class="live-test-card-header">
                            <div class="live-test-card-title-row">
                                <div class="live-test-card-title">
                                    <h4>
                                        <a href="#" data-name="exam_title" data-type="textarea" data-rows="2" data-url="<?php echo base_url('admin_control/update_mock_title'); ?>" data-pk="<?= $mock->title_id; ?>" class="data-modify-<?= $mock->title_id; ?> no-style" style="color: #2c3e50; text-decoration: none;">
                                            <?= htmlspecialchars($mock->title_name); ?>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        
                        <div class="live-test-card-body">
                            <div class="live-test-info-grid">
                                <div class="live-test-info-item">
                                    <div>
                                        <span class="info-label"><i class="fa fa-book"></i> Syllabus</span>
                                        <div class="info-value">
                                            <a href="#" data-name="exam_syllabus" data-type="textarea" data-rows="2" data-url="<?php echo base_url('admin_control/update_mock_title'); ?>" data-pk="<?= $mock->title_id; ?>" class="data-modify-<?= $mock->title_id; ?> no-style">
                                                <?= htmlspecialchars($mock->syllabus); ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="live-test-info-item">
                                    <div>
                                        <span class="info-label"><i class="fa fa-trophy"></i> Passing Score</span>
                                        <div class="info-value">
                                            <a href="#" data-name="passing_score" data-type="text" data-url="<?php echo base_url('admin_control/update_mock_title'); ?>" data-pk="<?= $mock->title_id; ?>" class="data-modify-<?= $mock->title_id; ?> no-style">
                                                <?= $mock->pass_mark; ?>%
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="live-test-info-item">
                                    <div>
                                        <span class="info-label"><i class="fa fa-folder"></i> Category</span>
                                        <div class="info-value">
                                            <a href="#" data-name="cat_id" data-type="select" data-url="<?php echo base_url('admin_control/update_mock_title'); ?>" data-source="<?= $str; ?>" data-value="<?= $mock->category_id; ?>" data-pk="<?= $mock->title_id; ?>" class="data-modify-<?= $mock->title_id; ?> no-style">
                                                <?= htmlspecialchars($mock->category_name); ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="live-test-info-item">
                                    <div>
                                        <span class="info-label"><i class="fa fa-users"></i> Batch Name</span>
                                        <div class="info-value">
                                            <?= htmlspecialchars($mock->batch_name); ?>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="live-test-info-item">
                                    <div>
                                        <span class="info-label"><i class="fa fa-key"></i> Batch Code</span>
                                        <div class="info-value">
                                            <?= htmlspecialchars($mock->batch_code); ?>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="live-test-info-item">
                                    <div>
                                        <span class="info-label"><i class="fa fa-calendar"></i> Date Range</span>
                                        <div class="info-value">
                                            <?= date('d M, Y', strtotime($mock->batch_start_date)) . ' - ' . date('d M, Y', strtotime($mock->batch_end_date)); ?>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="live-test-info-item">
                                    <div>
                                        <span class="info-label"><i class="fa fa-check-circle"></i> Status</span>
                                        <div class="info-value">
                                            <span class="status-badge <?= ($mock->exam_active == 1) ? 'active' : 'inactive'; ?>">
                                                <?= ($mock->exam_active == 1) ? 'Active' : 'Inactive'; ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="live-test-actions">
                                <a class="btn" href="<?= base_url('mock-test-details/instructions/' . $mock->slug); ?>">
                                    <i class="fa fa-eye"></i> <span>View</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php 
                    $i++;
                    } 
                }
                ?>
            </div>
        <?php } else { ?>
            <div class="empty-state">
                <i class="fa fa-info-circle" style="font-size: 48px; margin-bottom: 15px; display: block; color: #ddd;"></i>
                <p>You have no live test!</p>
            </div>
        <?php } ?>
    </div>
</div>
