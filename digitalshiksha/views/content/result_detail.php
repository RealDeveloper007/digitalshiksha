<div id="note">
    <?php 
    if ($message) {
        echo $message;    
    }    
    ?>
</div>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
<!-- Action Buttons Header -->
<div class="hidden-print result-actions-header">
    <div class="result-actions-container">
        <!-- Action Buttons Group -->
        <div class="result-action-buttons">
            <?php if($_SESSION['type'] == 'andriod') { ?>
             <a href="<?=base_url('exam_control/view_exam_detail/'.$results->result_id);?>" class="btn btn-solution-action">
                    <i class="fa fa-book"></i> <span class="solution-text">View Solution</span>
                </a>
                <a href="<?=base_url('exam_control/download_result_pdf/'.$results->result_id.'?download=1');?>" id="printNew" class="btn btn-print-action">
                    <i class="fa fa-print"></i> <span class="print-text">Print Result</span>
                </a>
                <!-- Android specific actions if needed -->
            <?php } else { ?>
                <a href="<?=base_url('exam_control/view_exam_detail/'.$results->result_id);?>" class="btn btn-solution-action">
                    <i class="fa fa-book"></i> <span class="solution-text">View Solution</span>
                </a>
                <a href="<?=base_url('exam_control/download_result_pdf/'.$results->result_id.'?download=1');?>" id="printNew" class="btn btn-print-action">
                    <i class="fa fa-print"></i> <span class="print-text">Print Result</span>
                </a>
            <?php } ?>
        </div>
        
        <!-- Back Button Desktop -->
        <a href="<?=base_url('exam_control/view_results')?>" class="btn btn-back-action back-button-desktop">
            <i class="fa fa-arrow-left"></i> <span class="back-text">Back to Results</span>
        </a>
        
        <!-- Back Button Mobile (Circular Icon on Right) -->
        <a href="<?=base_url('exam_control/view_results')?>" class="back-button-mobile">
            <i class="fa fa-arrow-left"></i>
        </a>
    </div>
</div>

<!-- Result Certificate Container -->
<div class="result-certificate-wrapper">
    <!-- Print Header with Logo -->
    <div class="result-print-header-section visible-print">
<h2 class="cert-title">
    CERTIFICATE OF COMPETENCY
</h2>        <div class="result-logo-container">
            <img src="<?= base_url('assets/images/logo.png') ?>" alt="<?=$brand_name?>" class="result-logo">
        </div>
    </div>

    <!-- Main Result Content -->
    <div class="result-main-container">
        <div class="result-info-section">
            <div class="row result-info-row">
                <!-- Student Detail Card -->
                <div class="col-sm-6 col-md-6 col-xs-12 result-card-wrapper">
                    <div class="result-card result-card-student">
                        <div class="result-card-header">
                            <h4><i class="fa fa-user"></i> Student Detail</h4>
                        </div>
                        <div class="result-card-body">
                            <div class="student-photo-section">
                                <div class="student-photo">
                                    <?php 
                                    $dummy_photo = base_url('uploads/user-avatar/avatar-placeholder.jpg');
                                    $student_photo_src = $dummy_photo;
                                    if (!empty($results->user_photo)) {
                                        $new_photo_path = FCPATH . 'uploads/user-avatar/' . $results->user_photo;
                                        $old_photo_path = FCPATH . 'user-avatar/' . $results->user_photo;
                                        if (file_exists($new_photo_path)) {
                                            $student_photo_src = base_url('uploads/user-avatar/' . $results->user_photo);
                                        } elseif (file_exists($old_photo_path)) {
                                            $student_photo_src = base_url('user-avatar/' . $results->user_photo);
                                        }
                                    }
                                    if (!empty($results->user_photo)) { ?>
                                        <img src="<?= $student_photo_src ?>" alt="Student Photo" onerror="this.onerror=null; this.src='<?= $dummy_photo ?>';">
                                    <?php } else { ?>
                                        <img src="<?= $dummy_photo ?>" alt="Student Photo">
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="student-info-section">
                            <dl class="result-info-list">
                                <dt><i class="fa fa-user"></i> Name:</dt>
                                <dd><?=$results->user_name?></dd>
                                <dt><i class="fa fa-envelope"></i> Email:</dt>
                                <dd><?=$results->user_email?></dd>
                                <dt><i class="fa fa-phone"></i> Phone:</dt>
                                <dd><?=$results->user_phone?></dd>
                            </dl>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Exam Detail Card -->
                <div class="col-sm-6 col-md-6 col-xs-12 result-card-wrapper">
                    <div class="result-card result-card-exam">
                        <div class="result-card-header">
                            <h4><i class="fa fa-file-text"></i> Competency Detail</h4>
                        </div>
                        <div class="result-card-body">
                            <?php 
                            $GetRightAnswers = [];
                            foreach($all_questions as $SingleQuestion) :
                                $StudentQuestionsResults = json_decode($results->result_json);
                                $CheckAns = $this->CI->StudentQuestionAnswer($StudentQuestionsResults,$SingleQuestion->ques_id,$results->exam_id);
                                if($CheckAns!=='not_attempted') {
                                    $GetAttempted[] = 'attempted';
                                }
                                if($CheckAns=='right') {
                                    $GetRightAnswers[] = 'right';
                                }
                            endforeach;
                            ?>
                            <dl class="result-info-list">
                                <dt><i class="fa fa-book"></i> Title:</dt>
                                <dd><?=$results->title_name?></dd>
                                <dt><i class="fa fa-qrcode"></i> Exam Code:</dt>
                                <dd><strong><?php 
                                    if(strlen($results->title_id) == 1) {
                                        echo 'MT00'.$results->title_id;
                                    } else if(strlen($results->title_id) == 2) {
                                        echo 'MT0'.$results->title_id;
                                    } else if(strlen($results->title_id) == 3) {
                                        echo 'MT'.$results->title_id;
                                    } else {
                                        echo 'MT'.$results->title_id;
                                    }
                                ?></strong></dd>
                                <dt><i class="fa fa-check-circle"></i> Right Questions:</dt>
                                <dd><strong><?= count($GetRightAnswers).' out of '.count($all_questions) ?></strong></dd>
                                <dt><i class="fa fa-trophy"></i> Passing Score:</dt>
                                <dd><?=$results->pass_mark?>%</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Result Assessment Section -->
        <div class="result-assessment-section">
            <div class="result-title-badge">
                <h3 class="result-title">*** Result ***</h3>
            </div>
            
            <div class="result-assessment-badge">
                <h4 class="assessment-label">Assessment: 
                    <?php 
                    if($results->result_percent >= $results->pass_mark) {
                        if($results->result_percent == 100) {
                            echo '<span class="assessment-badge assessment-competent">Competent</span>';
                        } else if($results->result_percent >= 90) {
                            echo '<span class="assessment-badge assessment-excellent">Excellent</span>';
                        } else {
                            echo '<span class="assessment-badge assessment-qualified">Qualified</span>';
                        }
                    } else { 
                        echo '<span class="assessment-badge assessment-not-qualified">Not Qualified</span>';
                    }
                    ?>
                </h4>
            </div>
        </div>

        <!-- Score Progress Bars -->
        <div class="result-scores-section" >
            <div class="score-item">
                <div class="score-header">
                    <p class="score-label"><?=$results->user_name?>'s Score</p>
                    <span class="score-percentage"><?=$results->result_percent?>%</span>
                </div>
                <div class="progress progress-custom">
                    <div class="progress-bar progress-bar-<?=($results->result_percent >= $results->pass_mark)?'success':'danger'?>" 
                         role="progressbar" 
                         aria-valuenow="<?=$results->result_percent?>" 
                         aria-valuemin="0" 
                         aria-valuemax="100" 
                         style="width: <?=$results->result_percent?>%">
                        <span class="sr-only"><?=$results->result_percent?>% Complete</span>
                    </div>
                </div>
            </div>
            
            <div class="score-item">
                <div class="score-header">
                    <p class="score-label">Passing Score</p>
                    <span class="score-percentage"><?=$results->pass_mark?>%</span>
                </div>
                <div class="progress progress-custom">
                    <div class="progress-bar progress-bar-info" 
                         role="progressbar" 
                         aria-valuenow="<?=$results->pass_mark?>" 
                         aria-valuemin="0" 
                         aria-valuemax="100" 
                         style="width: <?=$results->pass_mark?>%">
                        <span class="sr-only"><?=$results->pass_mark?>% Complete</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Signature Panel for Print -->
        <div class="signature-panel visible-print" >

                <div class="signature-item">
                    <div class="signature-line"></div>
                    <p class="sign-label">Student Signature</p>
                </div>

                <div class="signature-item">
                    <div class="signature-line"></div>
                    <p class="sign-label">Admin Signature</p>
                </div>

            </div>
    </div>

    <!-- Result Note -->
    <div class="result-note-section">
        <p class="result-note-text">
            <strong>Note: </strong>This certificate is only valid under the terms and conditions of <?=$brand_name?>.
        </p>
    </div>
</div>

<link href="<?php echo base_url('assets/css/print-result.css') ?>" rel="stylesheet" media="print">

<style>

    .cert-title{
    font-family: "Times New Roman", serif;
    font-size: 30px;
    font-weight: bold;
    letter-spacing: 4px;
    text-align: center;
    color: #2c3e50;
    border-bottom: 3px solid #d4af37;
    display: inline-block;
    padding-bottom: 8px;
}
/* Result Certificate Wrapper */
.result-certificate-wrapper {
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    padding: 8px;
    margin-bottom: 8px;
}

/* Action Buttons Header */
.result-actions-header {
    margin-bottom: 8px;
    background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
    border-bottom: 3px solid #FFD700;
    padding: 6px 10px;
    border-radius: 6px;
    position: relative;
}

.result-actions-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 6px;
    flex-wrap: wrap;
    position: relative;
}

/* Back Button Desktop - Hidden on Mobile */
.back-button-desktop {
    display: inline-flex;
    flex-shrink: 0;
    margin-left: auto;
}

/* Back Button Mobile - Circular Icon on Right (Hidden on Desktop) */
.back-button-mobile {
    display: none;
}

.result-action-buttons {
    display: flex;
    gap: 6px;
    flex-wrap: wrap;
}

/* Back Button */
.btn-back-action {
    background: rgba(255, 255, 255, 0.2);
    border: 1.5px solid rgba(255, 215, 0, 0.5);
    color: #ffffff;
    padding: 4px 8px;
    border-radius: 4px;
    font-weight: 600;
    font-size: 11px;
    transition: all 0.3s;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 4px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.15);
    text-decoration: none;
}

.btn-back-action i {
    font-size: 10px;
    color: #FFD700;
}

.btn-back-action:hover {
    background: #FFD700;
    transform: translateY(-1px);
    box-shadow: 0 2px 6px rgba(255, 215, 0, 0.4);
    border-color: #FFD700;
    color: #000;
    text-decoration: none;
}

.btn-back-action:hover i {
    transform: translateX(-3px);
    color: #000;
}

/* Solution Button */
.btn-solution-action {
    background: rgba(255, 255, 255, 0.2);
    border: 1.5px solid rgba(255, 215, 0, 0.5);
    color: #ffffff;
    padding: 4px 8px;
    border-radius: 4px;
    font-weight: 600;
    font-size: 11px;
    transition: all 0.3s;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 4px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.15);
    text-decoration: none;
}

.btn-solution-action i {
    font-size: 10px;
    color: #FFD700;
}

.btn-solution-action:hover {
    background: #FFD700;
    transform: translateY(-1px);
    box-shadow: 0 2px 6px rgba(255, 215, 0, 0.4);
    border-color: #FFD700;
    color: #000;
    text-decoration: none;
}

.btn-solution-action:hover i {
    transform: scale(1.1);
    color: #000;
}

/* Action Buttons - Print, Solution, Back */
.btn-print-action {
    background: rgba(255, 255, 255, 0.2);
    border: 1.5px solid rgba(255, 215, 0, 0.5);
    color: #ffffff;
    padding: 4px 8px;
    border-radius: 4px;
    font-weight: 600;
    font-size: 11px;
    transition: all 0.3s;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 4px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.15);
    text-decoration: none;
}

.btn-print-action i {
    font-size: 10px;
    color: #FFD700;
}

.btn-print-action:hover {
    background: #FFD700;
    transform: translateY(-1px);
    box-shadow: 0 2px 6px rgba(255, 215, 0, 0.4);
    border-color: #FFD700;
    color: #000;
}

.btn-print-action:hover i {
    color: #000;
    transform: scale(1.1);
}

/* Print Header Section */
.result-print-header-section {
    text-align: center;
    margin-bottom: 30px;
    padding-bottom: 20px;
    border-bottom: 2px solid #e0e0e0;
}

.result-logo-container {
    display: inline-block;
}

.result-logo {
    max-height: 80px;
    width: auto;
}

/* Result Cards */
.result-info-row {
    display: flex;
    gap: 12px;
    align-items: stretch;
}

.result-card-wrapper {
    flex: 1;
    display: flex;
    flex-direction: column;
}

.result-card {
    background: #fff;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.08);
    margin-bottom: 8px;
    overflow: hidden;
    transition: all 0.3s;
    display: flex;
    flex-direction: column;
    height: 100%;
}

.result-card:hover {
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    transform: translateY(-2px);
}

.result-card-header {
    background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
    border-bottom: 2px solid #FFD700;
    color: #fff;
    padding: 6px 10px;
}

.result-card-header h4 {
    margin: 0;
    font-size: 13px;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 6px;
}

.result-card-header h4 i {
    color: #FFD700;
    font-size: 13px;
}

.result-card-body {
    padding: 8px;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.result-card-student .result-card-body {
    display: flex;
    gap: 8px;
    align-items: flex-start;
    flex: 1;
}

.result-card-exam .result-card-body {
    flex: 1;
    display: flex;
    flex-direction: column;
}

.student-photo-section {
    flex-shrink: 0;
}

.student-photo {
    width: 55px;
    height: 55px;
    border-radius: 50%;
    overflow: hidden;
    border: 2px solid #FFD700;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
}

.student-photo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.student-info-section {
    flex: 1;
    min-width: 0;
}

.result-info-list {
    margin: 0;
    padding: 0;
    width: 100%;
}

.result-info-list dt {
    font-weight: 600;
    color: #2c3e50;
    margin: 0;
    padding: 4px 0 2px 0;
    display: block;
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 0.3px;
    line-height: 1.4;
}

.result-info-list dt:first-child {
    margin-top: 0;
    padding-top: 0;
}

.result-info-list dt i {
    color: #FFD700;
    font-size: 13px;
    width: 16px;
    text-align: center;
    display: inline-block;
    min-width: 16px;
    font-style: normal;
    margin-right: 4px;
}

.result-info-list dd {
    margin: 0 0 8px 0;
    padding: 0 0 0 20px;
    color: #333;
    font-size: 13px;
    display: block;
    word-break: break-word;
    line-height: 1.4;
}

/* Result Assessment Section */
.result-assessment-section {
    text-align: center;
    margin: 8px 0;
    padding: 8px;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border-radius: 6px;
    border: 1px solid #e0e0e0;
}

.result-title-badge {
    margin-bottom: 6px;
}

.result-title {
    background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
    border-bottom: 2px solid #FFD700;
    color: #fff;
    display: inline-block;
    padding: 4px 15px;
    border-radius: 4px;
    font-size: 13px;
    font-weight: 700;
    margin: 0;
    letter-spacing: 1px;
}

.result-assessment-badge {
    margin-top: 6px;
}

.assessment-label {
    font-size: 12px;
    font-weight: 600;
    color: #2c3e50;
    margin: 0;
    display: inline-flex;
    align-items: center;
    gap: 6px;
}

.assessment-badge {
    display: inline-block;
    padding: 3px 10px;
    border-radius: 12px;
    font-weight: 700;
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.assessment-competent {
    background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
    color: #fff;
}

.assessment-excellent {
    background: linear-gradient(135deg, #FFD700 0%, #f1b900 100%);
    color: #000;
}

.assessment-qualified {
    background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
    color: #fff;
}

.assessment-not-qualified {
    background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
    color: #fff;
}

/* Score Progress Bars */
.result-scores-section {
    margin: 8px 0;
}

.score-item {
    margin-bottom: 8px;
}

.score-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 4px;
}

.score-label {
    font-size: 12px;
    font-weight: 600;
    color: #2c3e50;
    margin: 0;
}

.score-percentage {
    font-size: 14px;
    font-weight: 700;
    color: #2c3e50;
    background: #f8f9fa;
    padding: 3px 10px;
    border-radius: 3px;
}

.progress-custom {
    height: 22px;
    background-color: #e9ecef;
    border-radius: 11px;
    overflow: hidden;
    box-shadow: inset 0 1px 3px rgba(0,0,0,0.1);
}

.progress-custom .progress-bar {
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    color: #fff;
    text-shadow: 0 1px 2px rgba(0,0,0,0.2);
    transition: width 0.6s ease;
}

.progress-custom .progress-bar-success {
    background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
}

.progress-custom .progress-bar-danger {
    background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
}

.progress-custom .progress-bar-info {
    background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
}

/* Signature Panel */
.signature-panel{
    display:flex;
    justify-content:space-between;
    margin-top:200px;
    padding:0 60px;
}

.signature-item{
    width:220px;
    text-align:center;
}

.signature-line{
    border-top:2px solid #000;
    margin-bottom:2px;
}

.sign-label{
    margin-top:0;
    font-size:14px;
    font-weight:600;
}

/* Result Note */
.result-note-section {
    margin-top: 12px;
    padding: 8px 12px;
    background: #fff3cd;
    border-left: 3px solid #ffc107;
    border-radius: 4px;
}

.result-note-text {
    margin: 0;
    color: #856404;
    font-size: 11px;
    line-height: 1.4;
}

/* Mobile Responsive Styles */
@media (max-width: 767px) {
    .result-certificate-wrapper {
        padding: 8px;
        margin: 4px;
        border-radius: 6px;
    }
    
    .result-actions-header {
        margin-bottom: 8px;
        padding: 12px 15px;
        position: relative;
        background: #2e4258;
    }
    
    .result-actions-container {
        flex-direction: row;
        gap: 6px;
        justify-content: space-between;
        align-items: center;
        position: relative;
    }
    
    /* Hide desktop back button on mobile */
    .back-button-desktop {
        display: none !important;
    }
    
    /* Show and style mobile back button (circular icon on right) */
    .back-button-mobile {
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
    
    .back-button-mobile:hover {
        background: #FFD700;
        border-color: #FFD700;
        color: #000;
        transform: scale(1.1);
        box-shadow: 0 2px 6px rgba(255, 215, 0, 0.4);
        text-decoration: none;
    }
    
    .back-button-mobile i {
        font-size: 16px;
        margin: 0;
    }
    
    .result-action-buttons {
        display: flex;
        flex-direction: row;
        gap: 6px;
        align-items: center;
        flex: 1;
    }
    
    .btn-solution-action,
    .btn-print-action {
        width: auto;
        padding: 6px;
        font-size: 0;
        justify-content: center;
        min-width: 32px;
        height: 32px;
        background: rgba(255, 255, 255, 0.2);
        border: 1.5px solid rgba(255, 215, 0, 0.5);
        color: #ffffff;
    }
    
    .btn-solution-action i,
    .btn-print-action i {
        font-size: 13px;
        margin: 0;
        color: #FFD700;
    }
    
    .btn-solution-action:hover,
    .btn-print-action:hover {
        background: #FFD700;
        border-color: #FFD700;
        color: #000;
    }
    
    .btn-solution-action:hover i,
    .btn-print-action:hover i {
        color: #000;
    }
    
    .back-text,
    .solution-text,
    .print-text {
        display: none;
    }
    
    /* Ensure desktop back button is hidden */
    .back-button-desktop {
        display: none !important;
    }
    
    /* Show mobile back button */
    .back-button-mobile {
        display: flex !important;
    }
    
    .result-info-row {
        flex-direction: column;
    }
    
    .result-card-wrapper {
        margin-bottom: 15px;
        width: 100%;
    }
    
    .result-card {
        margin-bottom: 15px;
        height: auto;
    }
    
    .result-card-student .result-card-body {
        flex-direction: column;
        align-items: center;
        text-align: center;
        gap: 15px;
    }
    
    .student-photo {
        width: 90px;
        height: 90px;
        margin-bottom: 0;
    }
    
    .student-info-section {
        width: 100%;
    }
    
    .result-info-list {
        text-align: left;
    }
    
    .result-info-list dt {
        font-size: 11px;
        margin-top: 0;
        margin-bottom: 0;
        padding: 3px 0 2px 0;
        display: block;
    }
    
    .result-info-list dt i {
        font-size: 13px;
        width: 16px;
        min-width: 16px;
    }
    
    .result-info-list dd {
        margin-left: 0;
        font-size: 13px;
        margin-bottom: 6px;
        padding: 0 0 0 20px;
        word-break: break-word;
        display: block;
    }
    
    .result-card-header {
        padding: 12px 15px;
    }
    
    .result-card-header h4 {
        font-size: 16px;
        gap: 8px;
    }
    
    .result-card-header h4 i {
        font-size: 18px;
    }
    
    .result-card-body {
        padding: 15px;
    }
    
    .result-assessment-section {
        padding: 20px 15px;
        margin: 20px 0;
    }
    
    .result-title {
        font-size: 16px;
        padding: 10px 20px;
        display: block;
        width: 100%;
    }
    
    .assessment-label {
        font-size: 15px;
        flex-direction: column;
        gap: 10px;
        align-items: center;
    }
    
    .assessment-badge {
        font-size: 14px;
        padding: 8px 18px;
        display: inline-block;
    }
    
    .result-scores-section {
        margin: 20px 0;
    }
    
    .score-item {
        margin-bottom: 20px;
    }
    
    .score-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
    }
    
    .score-label {
        font-size: 15px;
        width: 100%;
    }
    
    .score-percentage {
        font-size: 16px;
        align-self: flex-end;
        margin-top: -30px;
    }
    
    .progress-custom {
        height: 28px;
        width: 100%;
    }
    
   .signature-panel{
    display:flex;
    justify-content:space-between;
    margin-top:200px;
    padding:0 60px;
    /* flex-direction:row !important; */
}

@media (max-width: 767px) {

.signature-panel {
    display:flex;
            justify-content:space-between;

        gap: 60px;
        align-items: center;
        margin-top:200px;
        /* margin: 100px 0 50px; */
}
    
    .signature-item {
        max-width: 100%;
        width: 100%;
        margin-top:200px;
    }
    
    .result-note-section {
        margin-top: 20px;
        padding: 12px;
    }
    
    .result-note-text {
        font-size: 13px;
        line-height: 1.6;
    }
    
    /* Better spacing for mobile */
    .result-info-row {
        margin: 0;
    }
    
    .result-main-container {
        padding: 0;
    }
}

/* Desktop Enhancements */
@media (min-width: 768px) {
    .result-certificate-wrapper {
        padding: 10px;
        margin-bottom: 10px;
    }
    
    .result-actions-header {
        margin-bottom: 10px;
        padding: 8px 12px;
        background: #2e4258;
    }
    
    .btn-back-action,
    .btn-solution-action,
    .btn-print-action {
        padding: 5px 10px;
        font-size: 11px;
        border-width: 1px;
    }
    
    .btn-back-action i,
    .btn-solution-action i,
    .btn-print-action i {
        font-size: 11px;
    }
    
    .back-text,
    .solution-text,
    .print-text {
        display: inline-block;
    }
    
    .result-info-row {
        display: flex;
        gap: 8px;
        align-items: stretch;
        margin-bottom: 0;
    }
    
    .result-card-wrapper {
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    
    .result-card {
        flex: 1;
        display: flex;
        flex-direction: column;
        height: 100%;
        margin-bottom: 0;
    }
    
    .result-card-header {
        padding: 6px 10px;
    }
    
    .result-card-header h4 {
        font-size: 13px;
    }
    
    .result-card-body {
        flex: 1;
        display: flex;
        flex-direction: column;
        padding: 8px;
    }
    
    .result-card-student .result-card-body {
        flex: 1;
        gap: 8px;
    }
    
    .result-card-exam .result-card-body {
        flex: 1;
    }
    
    .student-photo {
        width: 55px;
        height: 55px;
    }
    
    .result-info-list {
        width: 100%;
    }
    
    .result-info-list dt {
        padding: 3px 0 2px 0;
        display: block;
    }
    
    .result-info-list dd {
        padding: 0 0 6px 20px;
        display: block;
        margin-left: 0;
    }
    
    .result-assessment-section {
        margin: 8px 0;
        padding: 8px;
    }
    
    .result-title-badge {
        margin-bottom: 6px;
    }
    
    .result-title {
        padding: 4px 15px;
        font-size: 13px;
    }
    
    .result-scores-section {
        max-width: 100%;
        margin: 8px 0;
    }
    
    .score-item {
        margin-bottom: 8px;
    }
    
    .result-note-section {
        margin-top: 8px;
        padding: 6px 10px;
    }
}

/* Optimized for 1366px width laptops */
@media (min-width: 1200px) and (max-width: 1400px) {
    .result-certificate-wrapper {
        padding: 8px;
        margin-bottom: 8px;
    }
    
    .result-actions-header {
        margin-bottom: 8px;
        padding: 6px 10px;
    }
    
    .result-info-row {
        gap: 10px;
    }
    
    .result-card-header {
        padding: 5px 8px;
    }
    
    .result-card-header h4 {
        font-size: 13px;
    }
    
    .result-card-body {
        padding: 8px;
    }
    
    .result-info-list dt {
        font-size: 10px;
        padding: 3px 0 2px 0;
        display: block;
    }
    
    .result-info-list dd {
        font-size: 12px;
        padding: 0 0 5px 18px;
        display: block;
    }
    
    .result-assessment-section {
        margin: 8px 0;
        padding: 8px;
    }
    
    .result-title {
        padding: 4px 12px;
        font-size: 12px;
    }
    
    .assessment-label {
        font-size: 13px;
    }
    
    .assessment-badge {
        font-size: 11px;
        padding: 3px 10px;
    }
    
    .result-scores-section {
        margin: 8px 0;
    }
    
    .score-item {
        margin-bottom: 8px;
    }
    
    .score-label {
        font-size: 12px;
    }
    
    .score-percentage {
        font-size: 13px;
        padding: 2px 8px;
    }
    
    .progress-custom {
        height: 20px;
    }
    
    .result-note-section {
        margin-top: 8px;
        padding: 5px 8px;
    }
    
    .result-note-text {
        font-size: 10px;
    }
    
    .student-photo {
        width: 55px;
        height: 55px;
    }
}

/* Print Styles - Optimized for single page */
@media print {
    @page {
        size: A4;
        margin: 0.8cm 1cm;
    }
    
    .result-certificate-wrapper {
        box-shadow: none !important;
        border: 3px ridge #FFD700 !important;
        padding: 0.5cm !important;
        margin: 0 !important;
        page-break-inside: avoid;
        background: #fff !important;
        height: auto !important;
    }
    
    .result-print-header-section {
        margin-bottom: 10px !important;
        padding-bottom: 8px !important;
        border-bottom: 1px solid #333;
    }
    
    .result-logo {
        max-height: 45px !important;
    }
    
    .result-info-row {
        display: flex !important;
        gap: 10px !important;
        align-items: stretch !important;
        margin-bottom: 10px !important;
    }
    
    .result-card-wrapper {
        flex: 1 !important;
        display: flex !important;
        flex-direction: column !important;
    }
    
    .result-card {
        page-break-inside: avoid !important;
        box-shadow: none !important;
        border: 1.5px solid #333 !important;
        margin-bottom: 0 !important;
        display: flex !important;
        flex-direction: column !important;
        height: 100% !important;
        background: #fff !important;
    }
    
    .result-card-header {
        -webkit-print-color-adjust: exact !important;
        print-color-adjust: exact !important;
        background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%) !important;
        border-bottom: 2px solid #FFD700 !important;
        padding: 10px 15px !important;
        flex-shrink: 0 !important;
    }
    
    .result-card-header h4 {
        color: #fff !important;
        font-size: 13px !important;
        font-weight: 700 !important;
        letter-spacing: 0.5px !important;
    }
    
    .result-card-header h4 i {
        color: #FFD700 !important;
        display: inline-block !important;
        font-size: 13px !important;
        margin-right: 8px !important;
    }
    
    .result-card-body {
        padding: 12px 15px !important;
        flex: 1 !important;
        display: flex !important;
        flex-direction: column !important;
    }
    
    .result-card-student .result-card-body {
        flex-direction: row !important;
        gap: 12px !important;
        align-items: flex-start !important;
    }
    
    .student-photo-section {
        flex-shrink: 0 !important;
    }
    
    .student-photo {
        width: 65px !important;
        height: 65px !important;
        border: 2.5px solid #FFD700 !important;
        border-radius: 50% !important;
    }
    
    .student-info-section {
        flex: 1 !important;
        min-width: 0 !important;
    }
    
    .result-info-list {
        margin: 0 !important;
        padding: 0 !important;
        width: 100% !important;
    }
    
    .result-info-list {
        margin: 0 !important;
        padding: 0 !important;
        width: 100% !important;
    }
    
    .result-info-list dt {
        font-size: 10px !important;
        margin: 0 !important;
        padding: 3px 0 2px 0 !important;
        text-transform: uppercase !important;
        letter-spacing: 0.3px !important;
        display: block !important;
        line-height: 1.4 !important;
        font-weight: 700 !important;
        color: #2c3e50 !important;
    }
    
    .result-info-list dt:first-child {
        padding-top: 0 !important;
    }
    
    .result-info-list dt i {
        color: #FFD700 !important;
        display: inline-block !important;
        font-size: 11px !important;
        width: 14px !important;
        margin-right: 6px !important;
        text-align: center !important;
        vertical-align: middle !important;
        font-style: normal !important;
    }
    
    .result-info-list dd {
        font-size: 11px !important;
        margin: 0 0 6px 0 !important;
        padding: 0 0 0 22px !important;
        line-height: 1.5 !important;
        word-break: break-word !important;
        display: block !important;
        color: #000 !important;
    }
    
    .result-card-exam .result-card-body {
        display: flex !important;
        flex-direction: column !important;
        justify-content: flex-start !important;
    }
    
    .result-title {
        -webkit-print-color-adjust: exact !important;
        print-color-adjust: exact !important;
        background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%) !important;
        color: #fff !important;
        padding: 6px 15px !important;
        font-size: 14px !important;
    }
    
    .result-assessment-section {
        margin: 12px 0 !important;
        padding: 12px !important;
    }
    
    .assessment-label {
        font-size: 12px !important;
    }
    
    .assessment-badge {
        -webkit-print-color-adjust: exact !important;
        print-color-adjust: exact !important;
        font-size: 11px !important;
        padding: 4px 12px !important;
    }
    
    .result-scores-section {
        margin: 12px 0 !important;
    }
    
    .score-item {
        margin-bottom: 10px !important;
    }
    
    .score-label {
        font-size: 11px !important;
    }
    
    .score-percentage {
        font-size: 11px !important;
        padding: 2px 8px !important;
    }
    
    .progress-custom {
        border: 1px solid #ddd !important;
        height: 18px !important;
    }
    
    .progress-custom .progress-bar {
        -webkit-print-color-adjust: exact !important;
        print-color-adjust: exact !important;
        font-size: 9px !important;
    }
    
    /* .signature-panel {
        margin: 15px 0 10px !important;
        padding-top: 15px !important;
        border-top: 1px solid #333 !important;
        page-break-inside: avoid;
    }
     */
    .signature-item h4 {
        font-size: 11px !important;
        margin-top: 25px !important;
    }

     .signature-item  {
        margin-top: 50px !important;
    }
    
    .result-note-section {
        page-break-inside: avoid;
        margin-top: 15px !important;
        margin-bottom: 5px !important;
        padding: 10px 12px !important;
        background: #fff3cd !important;
        border: 2px solid #ffc107 !important;
        border-left: 4px solid #ffc107 !important;
        border-radius: 4px !important;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1) !important;
    }
    
    .result-note-text {
        font-size: 11px !important;
        line-height: 1.6 !important;
        font-weight: 500 !important;
        color: #856404 !important;
        margin: 0 !important;
    }
    
    .result-note-text strong {
        color: #856404 !important;
        font-weight: 700 !important;
        font-size: 12px !important;
    }
    
    /* Ensure icons are visible in print */
    .fa, .fa:before {
        display: inline-block !important;
        font-family: FontAwesome !important;
        font-style: normal !important;
        font-weight: normal !important;
    }
    
    /* Compact spacing for single page with better alignment */
    .result-info-section {
        margin-bottom: 12px !important;
    }
    
    .result-info-row {
        display: flex !important;
        gap: 10px !important;
        align-items: stretch !important;
        margin: 0 !important;
    }
    
    .result-card-wrapper {
        margin-bottom: 0 !important;
        flex: 1 !important;
        display: flex !important;
        flex-direction: column !important;
    }
    
    .result-card {
        flex: 1 !important;
        display: flex !important;
        flex-direction: column !important;
        height: 100% !important;
        min-height: 100% !important;
        border: 1.5px solid #333 !important;
    }
    
    .result-card-student {
        border-left: 3px solid #2c3e50 !important;
    }
    
    .result-card-exam {
        border-left: 3px solid #17a2b8 !important;
    }
    
    .result-card-body {
        flex: 1 !important;
    }
    
    .result-card-student .result-card-body {
        gap: 12px !important;
    }
    
    .student-info-section {
        flex: 1 !important;
        min-width: 0 !important;
    }
}

/* Icon Visibility Fixes */
.result-card-header h4 i,
.result-info-list dt i,
.btn-print-action i,
.btn-solution-action i,
.btn-back-action i {
    display: inline-block !important;
    font-style: normal !important;
    font-weight: normal !important;
    line-height: 1 !important;
    text-rendering: auto !important;
    -webkit-font-smoothing: antialiased !important;
    -moz-osx-font-smoothing: grayscale !important;
}

/* Fallback for icons if FontAwesome doesn't load */
.result-card-header h4 i:empty::before,
.result-info-list dt i:empty::before {
    content: "•";
    color: #FFD700;
    font-weight: bold;
}

/* Legacy Support */
.dl-horizontal dt {
    text-align: left;
}

.dl-horizontal dd {
    margin-left: 0;
}

.panel {
    margin-bottom: 5px !important;
}

.result-info h4 {
    font-size: 18px !important;
}

.btn-print-action {
    padding: 7px 10px;
}

</style>
