<script src="https://cdn.ckeditor.com/4.13.1/standard-all/ckeditor.js"></script>

<div id="note">
    <?php 
    if ($message) {
        echo $message;    
    }
    ?>
</div>

<style>
    .results-wrapper {
        background: #fff;
        border-radius: 4px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        overflow: hidden;
        width: 100%;
        margin-bottom: 12px;
        margin-left: 15px;
        max-width: calc(100% - 15px);
    }
    
    .results-header {
        background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
        border-bottom: 3px solid #FFD700;
        color: white;
        padding: 12px 15px;
        margin-bottom: 0;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        width: 100%;
        box-sizing: border-box;
    }
    
    .results-header h4 {
        margin: 0;
        font-size: 16px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
        line-height: 1.4;
        width: 100%;
        flex-shrink: 0;
    }
    
    .results-header h4 i {
        font-size: 14px;
        color: #FFD700;
        flex-shrink: 0;
    }
    
    .results-content {
        padding: 12px;
    }
    
    .results-tabs {
        display: flex;
        gap: 6px;
        border-bottom: 2px solid #e9ecef;
        background: #f8f9fa;
        padding: 0 12px;
        margin: -12px -12px 12px -12px;
        flex-wrap: wrap;
    }
    
    .results-tabs .tab-link {
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
    
    .results-tabs .tab-link:hover {
        color: #2c3e50;
        background: rgba(255, 255, 255, 0.8);
        border-bottom-color: rgba(255, 215, 0, 0.6);
    }
    
    .results-tabs .tab-link.active {
        color: #2c3e50;
        border-bottom-color: #FFD700;
        background: #fff;
        font-weight: 700;
        box-shadow: 0 -2px 4px rgba(0,0,0,0.05);
    }
    
    .results-tabs .tab-link i {
        font-size: 12px;
        transition: all 0.3s;
    }
    
    .results-tabs .tab-link.active i {
        color: #FFD700;
        transform: scale(1.1);
    }
    
    .results-tabs .tab-link:hover i {
        transform: scale(1.05);
    }
    
    .results-wrapper .tab-content .tab-pane {
        display: none !important;
    }
    
    .results-wrapper .tab-content .tab-pane.active {
        display: block !important;
    }
    
    .result-card {
        background: white;
        border: 1px solid #e0e0e0;
        border-left: 4px solid #FFD700;
        border-radius: 4px;
        padding: 12px;
        margin-bottom: 10px;
        transition: all 0.3s;
        box-shadow: 0 2px 4px rgba(0,0,0,0.08);
    }
    
    .result-card:hover {
        box-shadow: 0 6px 12px rgba(0,0,0,0.15);
        transform: translateY(-2px);
        border-left-width: 5px;
    }
    
    .result-title-section {
        margin-bottom: 10px;
        padding-bottom: 8px;
    }
    
    .result-title-section h5 {
        margin: 0;
        font-size: 14px;
        font-weight: 700;
        color: #2c3e50;
        line-height: 1.3;
        word-break: break-word;
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
    
    .assessment-badge {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        padding: 4px 8px;
        border-radius: 16px;
        font-size: 10px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.3px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        transition: all 0.3s;
    }
    
    .assessment-badge i {
        font-size: 10px;
    }
    
    .assessment-badge.excellent {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        color: #fff;
        border: 1.5px solid #28a745;
    }
    
    .assessment-badge.excellent:hover {
        box-shadow: 0 4px 8px rgba(40, 167, 69, 0.3);
        transform: translateY(-1px);
    }
    
    .assessment-badge.qualified {
        background: linear-gradient(135deg, #FFD700 0%, #FFC107 100%);
        color: #000;
        border: 1.5px solid #FFD700;
        font-weight: 700;
    }
    
    .assessment-badge.qualified:hover {
        box-shadow: 0 4px 8px rgba(255, 215, 0, 0.4);
        transform: translateY(-1px);
    }
    
    .assessment-badge.not-qualified {
        background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
        color: #fff;
        border: 1.5px solid #dc3545;
    }
    
    .assessment-badge.not-qualified:hover {
        box-shadow: 0 4px 8px rgba(220, 53, 69, 0.3);
        transform: translateY(-1px);
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
    
    .result-actions .btn-group {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        width: 100%;
    }
    
    .result-actions .btn {
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
        flex: 1;
        min-width: 100px;
        justify-content: center;
    }
    
    .result-actions .btn:hover {
        background: #FFC107;
        color: #000;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }
    
    .result-actions .btn i {
        font-size: 12px;
    }
    
    .empty-state {
        text-align: center;
        padding: 30px 15px;
        color: #999;
        font-size: 14px;
    }
    
    .tsc_pagination {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 4px;
        padding: 12px 0;
        list-style: none;
        margin: 0;
    }
    
    .tsc_pagination li {
        margin: 0;
    }
    
    .tsc_pagination li a,
    .tsc_pagination li .page {
        display: inline-block;
        padding: 6px 10px;
        border: 1px solid #dee2e6;
        border-radius: 4px;
        color: #666;
        text-decoration: none;
        font-size: 12px;
        min-width: 36px;
        text-align: center;
        transition: all 0.3s;
    }
    
    .tsc_pagination li a:hover {
        background: #FFD700;
        color: #000;
        border-color: #FFD700;
    }
    
    .tsc_pagination li .page.active {
        background: #FFD700;
        color: #000;
        border-color: #FFD700;
        font-weight: 600;
    }

    #pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
    }
    
    #pagination .pagination {
        margin: 0;
        padding: 0;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 8px;
    }
    
    #pagination .pagination > a,
    #pagination .pagination > strong,
    #pagination .pagination .page {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 36px;
        height: 36px;
        padding: 0 12px;
        border: 1px solid #d6dde5;
        border-radius: 8px;
        background: #fff;
        color: #2c3e50;
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
        transition: all 0.2s ease;
    }

    #pagination .pagination > a:hover,
    #pagination .pagination .page:hover {
        background: #fff8dc;
        border-color: #FFD700;
        transform: translateY(-1px);
    }

    #pagination .pagination .page.active,
    #pagination .pagination > strong {
        background: linear-gradient(135deg, #FFD700 0%, #FFC107 100%);
        border-color: #FFD700;
        color: #000;
        font-weight: 700;
        box-shadow: 0 3px 8px rgba(255, 215, 0, 0.3);
    }
    
    @media (max-width: 767px) {
        .results-wrapper {
            margin-left: 0;
            margin-bottom: 10px;
            max-width: 100%;
            width: 100%;
        }
        
        .results-header {
            padding: 12px 15px;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            width: 100%;
            box-sizing: border-box;
        }
        
        .results-header h4 {
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
            width: 100%;
            margin: 0;
        }
        
        .results-header h4 i {
            font-size: 12px;
            color: #FFD700;
            flex-shrink: 0;
        }
        
        .results-content {
            padding: 10px;
        }
        
        .results-tabs {
            padding: 0 10px;
            margin: -10px -10px 10px -10px;
            flex-direction: row;
            gap: 4px;
        }
        
        .results-tabs .tab-link {
            flex: 1;
            justify-content: center;
            padding: 8px 10px;
            font-size: 11px;
        }
        
        .results-tabs .tab-link i {
            font-size: 11px;
        }
        
        .result-card {
            padding: 10px;
            margin-bottom: 8px;
        }
        
        .result-title-section {
            margin-bottom: 8px;
            padding-bottom: 6px;
        }
        
        .result-title-section h5 {
            font-size: 13px;
        }
        
        .result-info-grid {
            grid-template-columns: 1fr;
            gap: 6px;
            margin-bottom: 8px;
        }
        
        .result-info-item {
            flex-direction: column;
            align-items: flex-start;
            padding: 8px;
            gap: 4px;
        }
        
        .result-info-item .info-label {
            margin-bottom: 4px;
            margin-right: 0;
            min-width: auto;
            width: 100%;
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
            flex-direction: column;
            align-items: stretch;
        }
        
        .result-actions-label {
            margin-bottom: 8px;
            margin-right: 0;
            font-size: 10px;
        }
        
        .result-actions-label i {
            font-size: 10px;
        }
        
        .result-actions .btn-group {
            width: 100%;
            flex-direction: row;
            justify-content: flex-start;
            gap: 6px;
            flex-wrap: nowrap;
            display: flex;
        }
        
        .result-actions .btn {
            width: auto;
            min-width: 48px;
            max-width: none;
            flex: 0 0 auto;
            justify-content: center;
            align-items: center;
            padding: 6px 10px;
            white-space: nowrap;
            overflow: visible;
            display: inline-flex;
            font-size: 11px;
        }
        
        .result-actions .btn span {
            display: none !important;
        }
        
        .result-actions .btn i {
            margin: 0;
            font-size: 13px;
            display: inline-block;
            flex-shrink: 0;
        }
        
        .tsc_pagination {
            gap: 3px;
            padding: 10px 0;
        }
        
        .tsc_pagination li a,
        .tsc_pagination li .page {
            padding: 5px 8px;
            font-size: 11px;
            min-width: 32px;
        }
    }
    
    /* Desktop Optimizations */
    @media (min-width: 768px) {
        .results-wrapper {
            margin-bottom: 12px;
            margin-left: 15px;
            max-width: calc(100% - 15px);
        }
        
        .results-header {
            padding: 12px 15px;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            width: 100%;
            box-sizing: border-box;
        }
        
        .results-header h4 {
            font-size: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
            width: 100%;
            margin: 0;
        }
        
        .results-header h4 i {
            font-size: 14px;
            color: #FFD700;
            flex-shrink: 0;
        }
        
        .results-content {
            padding: 12px;
        }
        
        .results-tabs {
            padding: 0 12px;
            margin: -12px -12px 12px -12px;
            gap: 6px;
        }
        
        .results-tabs .tab-link {
            padding: 8px 12px;
            font-size: 12px;
        }
        
        .result-card {
            padding: 12px;
            margin-bottom: 10px;
        }
        
        .result-info-grid {
            gap: 8px;
            margin-bottom: 10px;
        }
        
        .result-actions {
            margin-top: 10px;
            padding-top: 10px;
            gap: 8px;
        }
        
        .tsc_pagination {
            padding: 12px 0;
        }
    }
</style>

<div class="results-wrapper">
    <div class="results-header">
        <h4>
            <i class="fa fa-bar-chart"></i>
            My Results
        </h4>
    </div>
    
    <div class="results-content">
        <div class="results-tabs">
            <a href="#mock_test" class="tab-link active" data-tab="mock_test">
                <i class="fa fa-file-text-o"></i> Mock Test
            </a>
            <a href="#live_Test" class="tab-link" data-tab="live_Test">
                <i class="fa fa-bolt"></i> Live Test
            </a>
        </div>
        
        <div class="tab-content">
            <?php if (isset($results) != NULL && !empty($results)) { ?>
                <div class="tab-pane active" id="mock_test">
                                <?php 
                                $i = 1;
                    foreach ($results as $result) {
                        $assessment_class = 'not-qualified';
                        $assessment_text = 'Not Qualified';
                        if($result->result_percent >= $result->pass_mark) {
                            if($result->result_percent >= 95) {
                                $assessment_class = 'excellent';
                                $assessment_text = 'Excellent';
                                                    } else {
                                $assessment_class = 'qualified';
                                $assessment_text = 'Qualified';
                            }
                        }
                    ?>
                        <div class="result-card">
                            <div class="result-title-section">
                                <h5><?= htmlspecialchars($result->title_name); ?></h5>
                            </div>
                            
                            <div class="result-info-grid">
                                <div class="result-info-item">
                                    <span class="info-label">
                                        <i class="fa fa-check-circle"></i> Assessment:
                                    </span>
                                    <span class="info-value">
                                        <span class="assessment-badge <?= $assessment_class; ?>">
                                            <?php 
                                            if($assessment_class == 'excellent') {
                                                echo '<i class="fa fa-trophy"></i> ';
                                            } elseif($assessment_class == 'qualified') {
                                                echo '<i class="fa fa-check-circle"></i> ';
                                            } else {
                                                echo '<i class="fa fa-times-circle"></i> ';
                                            }
                                            echo $assessment_text; 
                                            ?>
                                        </span>
                                    </span>
                                </div>
                                
                                <div class="result-info-item">
                                    <span class="info-label">
                                        <i class="fa fa-star"></i> Score:
                                    </span>
                                    <span class="info-value"><?= $result->result_percent; ?>%</span>
                                </div>
                                
                                <div class="result-info-item">
                                    <span class="info-label">
                                        <i class="fa fa-calendar"></i> Date:
                                    </span>
                                    <span class="info-value"><?= date("D, d M Y", strtotime($result->exam_taken_date)); ?></span>
                                </div>
                                            </div>

                            <div class="result-actions">
                                <span class="result-actions-label">Actions:</span>
                                <div class="btn-group">
                                    <a class="btn" href="<?= base_url('exam_control/view_exam_detail/' . $result->result_id); ?>">
                                        <i class="fa fa-eye"></i> <span>Details</span>
                                    </a>
                                    <a class="btn" href="<?= base_url('exam_control/view_result_detail/' . $result->result_id); ?>">
                                        <i class="fa fa-print"></i> <span>Certificate</span>
                                    </a>
                                     <a class="btn" href="<?= base_url('mock-test-details/instructions/' . $result->slug); ?>">
<i class="fa fa-refresh"></i> <span>Repeat Quiz</span>                                    </a>
                                </div>
                            </div>
                        </div>
                                    <?php 
                                    $i++;
                    }
                    ?>
                </div>
            <?php } else { ?>
                <div class="tab-pane active" id="mock_test">
                    <div class="empty-state">No Mock results found!</div>
                </div>
            <?php } ?>
            
            <?php if (isset($results1) != NULL && !empty($results1)) { ?>
                <div class="tab-pane" id="live_Test">
                    <?php
                    $i = 1;
                    foreach ($results1 as $result) {
                        $assessment_class = 'not-qualified';
                        $assessment_text = 'Not Qualified';
                        if($result->result_percent >= $result->pass_mark) {
                            if($result->result_percent >= 95) {
                                $assessment_class = 'excellent';
                                $assessment_text = 'Excellent';
                            } else {
                                $assessment_class = 'qualified';
                                $assessment_text = 'Qualified';
                            }
                        }
                    ?>
                        <div class="result-card">
                            <div class="result-title-section">
                                <h5><?= htmlspecialchars($result->title_name); ?></h5>
                            </div>
                            
                            <div class="result-info-grid">
                                <div class="result-info-item">
                                    <span class="info-label">
                                        <i class="fa fa-check-circle"></i> Assessment:
                                    </span>
                                    <span class="info-value">
                                        <span class="assessment-badge <?= $assessment_class; ?>">
                                            <?php 
                                            if($assessment_class == 'excellent') {
                                                echo '<i class="fa fa-trophy"></i> ';
                                            } elseif($assessment_class == 'qualified') {
                                                echo '<i class="fa fa-check-circle"></i> ';
                                            } else {
                                                echo '<i class="fa fa-times-circle"></i> ';
                                            }
                                            echo $assessment_text; 
                                            ?>
                                        </span>
                                    </span>
                                </div>
                                
                                <div class="result-info-item">
                                    <span class="info-label">
                                        <i class="fa fa-star"></i> Score:
                                    </span>
                                    <span class="info-value"><?= $result->result_percent; ?>%</span>
                                </div>
                                
                                <div class="result-info-item">
                                    <span class="info-label">
                                        <i class="fa fa-calendar"></i> Date:
                                    </span>
                                    <span class="info-value"><?= date("D, d M Y", strtotime($result->exam_taken_date)); ?></span>
                                </div>
                    </div>    

                            <div class="result-actions">
                                <span class="result-actions-label">Actions:</span>
                                <div class="btn-group">
                                    <a class="btn" href="<?= base_url('exam_control/view_exam_detail/' . $result->result_id); ?>">
                                        <i class="fa fa-eye"></i> <span>Details</span>
                                    </a>
                                    <a class="btn" href="<?= base_url('exam_control/view_result_detail/' . $result->result_id); ?>">
                                        <i class="fa fa-print"></i> <span>Certificate</span>
                                    </a>
                                   
                                </div>
                            </div>
                        </div>
                    <?php
                        $i++;
                    }
                    ?>
                </div>
            <?php } else { ?>
                <div class="tab-pane" id="live_Test">
                    <div class="empty-state">No Live results found!</div>
            </div>
            <?php } ?>
        </div>

        <?php if (!empty($links)) { ?>
            <div id="pagination" style="margin-top: 20px;">
                <?php if (is_array($links)) { ?>
                    <ul class="tsc_pagination">
                        <?php foreach ($links as $link) { if (trim($link) !== '') echo '<li>' . $link . '</li>'; } ?>
                    </ul>
                <?php } else { ?>
                    <?php echo $links; ?>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Initialize tabs
        $('.results-tabs .tab-link').on('click', function(e) {
            e.preventDefault();
            var targetTab = $(this).data('tab');
            
            // Update tab links
            $('.results-tabs .tab-link').removeClass('active');
            $(this).addClass('active');
            
            // Update tab panes
            $('.tab-content .tab-pane').removeClass('active');
            $('#' + targetTab).addClass('active');
        });
        
        // Ensure first tab is active on load
        if ($('.results-tabs .tab-link.active').length === 0) {
            $('.results-tabs .tab-link:first').addClass('active');
            $('.tab-content .tab-pane:first').addClass('active');
        } else {
            var activeTab = $('.results-tabs .tab-link.active').data('tab');
            $('.tab-content .tab-pane').removeClass('active');
            $('#' + activeTab).addClass('active');
        }
    });
</script>
