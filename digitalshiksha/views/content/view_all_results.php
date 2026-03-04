<script src="https://cdn.ckeditor.com/4.13.1/standard-all/ckeditor.js"></script>

<div id="note"> <?php //if ($message) echo $message; ?> </div>

<style>
    .results-wrapper {
        background: #fff;
        border-radius: 4px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        overflow: hidden;
        width: 100%;
        margin-bottom: 12px;
    }
    
    .results-header {
        background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
        border-bottom: 3px solid #FFD700;
        color: white;
        padding: 10px 15px;
        margin-bottom: 0;
    }
    
    .results-header h4 {
        margin: 0;
        font-size: 16px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .results-header h4 i {
        font-size: 14px;
        color: #FFD700;
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
    
    .results-tabs .tab-link i {
        font-size: 12px;
    }
    
    .results-tabs .tab-link:hover {
        color: #FFD700;
        background: #fff;
    }
    
    .results-tabs .tab-link.active {
        color: #FFD700;
        border-bottom-color: #FFD700;
        background: #fff;
    }
    
    .results-wrapper .tab-content .tab-pane {
        display: none !important;
    }
    
    .results-wrapper .tab-content .tab-pane.active {
        display: block !important;
    }
    
    .result-card {
        background: white;
        border: 1px solid #dee2e6;
        border-left: 4px solid #FFD700;
        border-radius: 4px;
        padding: 12px;
        margin-bottom: 10px;
        transition: all 0.3s;
    }
    
    .result-card:hover {
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    
    .result-title-section {
        margin-bottom: 10px;
        padding-bottom: 10px;
        border-bottom: 2px solid #e9ecef;
    }
    
    .result-title-section h5 {
        margin: 0 0 6px 0;
        font-size: 14px;
        font-weight: 600;
        color: #333;
    }
    
    .result-title-section .exam-name {
        font-size: 12px;
        color: #666;
        font-weight: 500;
    }
    
    .result-info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 8px;
        margin-bottom: 10px;
    }
    
    .result-info-item {
        display: flex;
        align-items: center;
        padding: 8px;
        background: #f8f9fa;
        border-radius: 4px;
        border: 1px solid #e9ecef;
    }
    
    .result-info-item .info-label {
        font-weight: 600;
        color: #666;
        margin-right: 8px;
        min-width: 90px;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 11px;
    }
    
    .result-info-item .info-label i {
        font-size: 12px;
        color: #716006;
    }
    
    .result-info-item .info-value {
        color: #333;
        font-size: 12px;
        flex: 1;
    }
    
    .assessment-badge {
        display: inline-block;
        padding: 4px 10px;
        border-radius: 12px;
        font-size: 11px;
        font-weight: 500;
    }
    
    .assessment-badge.excellent {
        background: #d4edda;
        color: #155724;
    }
    
    .assessment-badge.qualified {
        background: #cfe2ff;
        color: #084298;
    }
    
    .assessment-badge.not-qualified {
        background: #fff3cd;
        color: #856404;
    }
    
    .result-actions {
        margin-top: 10px;
        padding-top: 10px;
        border-top: 2px solid #e9ecef;
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }
    
    .result-actions-label {
        font-weight: 600;
        color: #666;
        margin-right: 8px;
        align-self: center;
        font-size: 11px;
    }
    
    .result-actions .btn-group {
        display: flex;
        gap: 6px;
        flex-wrap: wrap;
    }
    
    .result-actions .btn {
        padding: 6px 12px;
        font-size: 12px;
        border-radius: 4px;
        border: 1px solid #dee2e6;
        background: white;
        color: #666;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        transition: all 0.3s;
        cursor: pointer;
    }
    
    .result-actions .btn:hover {
        background: #FFD700;
        color: #000;
        border-color: #FFD700;
    }
    
    .result-actions .btn i {
        font-size: 12px;
    }
    
    .result-actions .btn-danger:hover {
        background: #dc3545;
        border-color: #dc3545;
        color: white;
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
    }
    
    @media (max-width: 767px) {
        .results-wrapper {
            margin-bottom: 10px;
        }
        
        .results-header {
            padding: 10px 12px;
        }
        
        .results-header h4 {
            font-size: 14px;
        }
        
        .results-header h4 i {
            font-size: 12px;
        }
        
        .results-content {
            padding: 10px;
        }
        
        .results-tabs {
            padding: 0 10px;
            margin: -10px -10px 10px -10px;
            flex-direction: column;
            gap: 4px;
        }
        
        .results-tabs .tab-link {
            width: 100%;
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
            padding-bottom: 8px;
        }
        
        .result-title-section h5 {
            font-size: 13px;
        }
        
        .result-title-section .exam-name {
            font-size: 11px;
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
        
        .result-actions .btn-group {
            width: 100%;
            flex-direction: column;
            gap: 6px;
        }
        
        .result-actions .btn {
            width: 100%;
            justify-content: center;
            padding: 6px 12px;
            font-size: 11px;
        }
        
        .result-actions .btn i {
            font-size: 11px;
        }
        
        .result-actions .btn span.hidden-xs {
            display: inline;
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
        }
        
        .results-header {
            padding: 10px 15px;
        }
        
        .results-header h4 {
            font-size: 16px;
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
            Exam Results
        </h4>
    </div>

    <div class="results-content">
        <div class="results-tabs">
            <a href="#student_mock_result" class="tab-link active" data-tab="student_mock_result">
                <i class="fa fa-graduation-cap"></i> Students Mock Results
            </a>
            <a href="#student_result_live" class="tab-link" data-tab="student_result_live">
                <i class="fa fa-bolt"></i> Students Live Results
            </a>
            <a href="#own_result" class="tab-link" data-tab="own_result">
                <i class="fa fa-user"></i> Own Results
            </a>
        </div>
        
                        <div class="tab-content">
            <?php if (isset($results) != NULL && !empty($results)) { ?>
                <div class="tab-pane active" id="student_mock_result">
                            <?php
                            $i = 1;
                            foreach ($results as $result) {
                        if (($result->exam_title_user_id == $this->session->userdata('user_id')) OR ($this->session->userdata('user_role_id') <= 3)) {
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
                                <h5><?= htmlspecialchars($result->user_name); ?></h5>
                                <div class="exam-name"><?= htmlspecialchars($result->title_name); ?></div>
                            </div>
                            
                            <div class="result-info-grid">
                                <div class="result-info-item">
                                    <span class="info-label">
                                        <i class="fa fa-check-circle"></i> Assessment:
                                    </span>
                                    <span class="info-value">
                                        <span class="assessment-badge <?= $assessment_class; ?>"><?= $assessment_text; ?></span>
                                    </span>
                                </div>
                                
                                <div class="result-info-item">
                                    <span class="info-label">
                                        <i class="fa fa-percent"></i> Score:
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
                                        <i class="glyphicon glyphicon-list-alt"></i> <span>Details</span>
                                    </a>
                                    <a class="btn" href="<?= base_url('exam_control/view_result_detail/' . $result->result_id); ?>">
                                        <i class="glyphicon glyphicon-file"></i> <span>Certificate</span>
                                    </a>
                                                <?php if ($this->session->userdata['user_role_id'] < 3) { ?>
                                    <a class="btn btn-danger" onclick="return delete_confirmation()" href="<?= base_url('exam_control/delete_results/' . $result->result_id); ?>">
                                        <i class="glyphicon glyphicon-trash"></i> <span>Delete</span>
                                    </a>
                                                <?php } ?>
                                            </div>
                            </div>
                        </div>
                                    <?php
                                    $i++;
                                }
                            }
                            ?>
                    
                    <?php if($i > 1){ ?>
                        <div id="pagination">
                     <ul class="tsc_pagination">
                                <?php foreach ($links as $link) {
                                    echo "<li>". $link."</li>";
                                } ?>
                    </ul>
                    </div>
                    <?php } ?>
                </div>
            <?php } else { ?>
                <div class="tab-pane active" id="student_mock_result">
                    <div class="empty-state">No results found!</div>
            </div>
            <?php } ?>
            
            <?php if (isset($results1) != NULL && !empty($results1)) { ?>
                <div class="tab-pane" id="student_result_live">
                            <?php
                            $i = 1;
                            foreach ($results1 as $result1) {
                        if (($result1->exam_title_user_id == $this->session->userdata('user_id')) OR ($this->session->userdata('user_role_id') <= 3)) {
                            $assessment_class = 'not-qualified';
                            $assessment_text = 'Not Qualified';
                            if($result1->result_percent >= $result1->pass_mark) {
                                if($result1->result_percent >= 95) {
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
                                <h5><?= htmlspecialchars($result1->user_name); ?></h5>
                                <div class="exam-name"><?= htmlspecialchars($result1->title_name); ?></div>
                            </div>
                            
                            <div class="result-info-grid">
                                <div class="result-info-item">
                                    <span class="info-label">
                                        <i class="fa fa-check-circle"></i> Assessment:
                                    </span>
                                    <span class="info-value">
                                        <span class="assessment-badge <?= $assessment_class; ?>"><?= $assessment_text; ?></span>
                                    </span>
                                </div>
                                
                                <div class="result-info-item">
                                    <span class="info-label">
                                        <i class="fa fa-percent"></i> Score:
                                    </span>
                                    <span class="info-value"><?= $result1->result_percent; ?>%</span>
                                </div>
                                
                                <div class="result-info-item">
                                    <span class="info-label">
                                        <i class="fa fa-calendar"></i> Date:
                                    </span>
                                    <span class="info-value"><?= date("D, d M Y", strtotime($result1->exam_taken_date)); ?></span>
                                </div>
                            </div>
                            
                            <div class="result-actions">
                                <span class="result-actions-label">Actions:</span>
                                            <div class="btn-group">
                                    <a class="btn" href="<?= base_url('exam_control/view_exam_detail/' . $result1->result_id); ?>">
                                        <i class="glyphicon glyphicon-list-alt"></i> <span>Details</span>
                                    </a>
                                    <a class="btn" href="<?= base_url('exam_control/view_result_detail/' . $result1->result_id); ?>">
                                        <i class="glyphicon glyphicon-file"></i> <span>Certificate</span>
                                    </a>
                                                <?php if ($this->session->userdata['user_role_id'] < 3) { ?>
                                    <a class="btn btn-danger" onclick="return delete_confirmation()" href="<?= base_url('exam_control/delete_results/' . $result1->result_id); ?>">
                                        <i class="glyphicon glyphicon-trash"></i> <span>Delete</span>
                                    </a>
                                                <?php } ?>
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
                <div class="tab-pane" id="student_result_live">
                    <div class="empty-state">No live results found!</div>
            </div>
            <?php } ?>
            
            <div class="tab-pane" id="own_result">
                <?php if (isset($my_result) != NULL && !empty($my_result)) { ?>
                            <?php
                            $i = 1;
                            foreach ($my_result as $mresult) {
                        $assessment_class = 'not-qualified';
                        $assessment_text = 'Not Qualified';
                        if($mresult->result_percent >= $mresult->pass_mark) {
                            if($mresult->result_percent >= 95) {
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
                                <h5><?= htmlspecialchars($mresult->title_name); ?></h5>
                            </div>
                            
                            <div class="result-info-grid">
                                <div class="result-info-item">
                                    <span class="info-label">
                                        <i class="fa fa-check-circle"></i> Assessment:
                                    </span>
                                    <span class="info-value">
                                        <span class="assessment-badge <?= $assessment_class; ?>"><?= $assessment_text; ?></span>
                                    </span>
                                </div>
                                
                                <div class="result-info-item">
                                    <span class="info-label">
                                        <i class="fa fa-percent"></i> Score:
                                    </span>
                                    <span class="info-value"><?= $mresult->result_percent; ?>%</span>
                                </div>
                                
                                <div class="result-info-item">
                                    <span class="info-label">
                                        <i class="fa fa-calendar"></i> Date:
                                    </span>
                                    <span class="info-value"><?= date("D, d M Y", strtotime($mresult->exam_taken_date)); ?></span>
                                </div>
                            </div>
                            
                            <div class="result-actions">
                                <span class="result-actions-label">Actions:</span>
                                            <div class="btn-group">
                                    <a class="btn" href="<?= base_url('exam_control/view_exam_detail/' . $mresult->result_id); ?>">
                                        <i class="glyphicon glyphicon-list-alt"></i> <span>Details</span>
                                    </a>
                                    <a class="btn" href="<?= base_url('exam_control/view_result_detail/' . $mresult->result_id); ?>">
                                        <i class="glyphicon glyphicon-file"></i> <span>Certificate</span>
                                    </a>
                                                <?php if ($this->session->userdata['user_role_id'] < 3) { ?>
                                    <a class="btn btn-danger" onclick="return delete_confirmation()" href="<?= base_url('exam_control/delete_results/' . $mresult->result_id); ?>">
                                        <i class="glyphicon glyphicon-trash"></i> <span>Delete</span>
                                    </a>
                                                <?php } ?>
                                            </div>
                            </div>
                        </div>
                                    <?php
                                    $i++;
                            }
                            ?>
                <?php } else { ?>
                    <div class="empty-state">No own results found!</div>
                <?php } ?>
            </div>
        </div>
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
    
    $(window).on('load', function() {
    $("#student_result_live").css("display","");
    });
</script>
