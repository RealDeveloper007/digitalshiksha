<script src="https://cdn.ckeditor.com/4.13.1/standard-all/ckeditor.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

<style>
    body
    {
        padding-top: 0;
		margin: 0;
    }
    
    .cke_editable {
        font-size: 15px !important;
    }
    .radio {
        font-size: 15px !important;
    }
    .ctm_radio_btn {
    counter-reset: radioCounter;
}

.ctm_radio_btn .radio label:before {
    counter-increment: radioCounter;
    content: counter(radioCounter, upper-alpha);
    position: absolute;
    left: 10px;
    top: 50%;
    transform: translateY(-50%);
    width: 28px;
    height: 28px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%);
    color: #fff;
    border-radius: 50%;
    font-weight: 700;
    font-size: 13px;
    margin: 0;
    flex-shrink: 0;
    box-shadow: 0 2px 6px rgba(241, 185, 0, 0.3);
}

.ctm_radio_btn {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 12px;
    margin: 20px 0;
}

.ctm_radio_btn .radio {
    padding: 0;
    margin: 0;
    height: 100%;
}

.ctm_radio_btn .radio label {
    display: flex;
    align-items: center;
    padding: 10px 12px 10px 40px;
    font-weight: 500;
    font-size: 17px;
    background-color: #90EE90;
    cursor: pointer;
    height: 100%;
    position: relative;
    line-height: 1.5;
    min-height: auto;
}

.ctm_radio_btn .radio input[type="radio"] {
    width: 0;
}

.ctm_radio_btn .radio input[type="radio"]:checked+label {
    background-color: #05a105;
    color: #fff;
}
@media (max-width:600px) {
    .ctm_radio_btn {
        grid-template-columns: repeat(1, 1fr);
    }
    .ctm_radio_btn .radio label {
        padding: 8px 10px 8px 36px;
        font-size: 16px;
    }
    .ctm_radio_btn .radio label::before {
        width: 24px;
        height: 24px;
        font-size: 11px;
        left: 8px;
    }
}
</style>

<style>
    /* Start Exam Page - Refined Design */
    #start_exam {
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        padding: 0 0 20px 0;
        min-height: auto;
        margin-top: 0;
    }
    
    /* Desktop only - margin from header */
    @media (min-width: 769px) {
        #start_exam {
            padding-top: 15px;
        }
    }
    
    /* Header */
    .exam-header-wrapper {
        background: linear-gradient(135deg, #3a3a54 0%, #406061 100%);
        border-radius: 12px;
        padding: 10px 18px;
        margin-bottom: 10px;
        box-shadow: 0 4px 15px rgba(241, 185, 0, 0.3);
    }
    
    .exam-header-top {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        flex-wrap: wrap;
    }
    
    .exam-header-logo {
        display: flex;
        align-items: center;
        gap: 10px;
        justify-content: center;
    }
    
    .exam-header-logo .brand-icon {
        width: 40px;
        height: 40px;
        object-fit: contain;
        filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.2));
    }
    
    #start_exam .h1 {
        color: #fff !important;
        font-size: 18px;
        font-weight: 600;
        margin: 0;
        text-transform: uppercase;
        white-space: nowrap;
    }
    
    .exam-title-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        margin-bottom: 12px;
        flex-wrap: wrap;
    }
    
    .exam-title-row h3 {
        margin: 0;
        flex: 1;
        min-width: 200px;
    }
    
    .question-info {
        display: flex;
        align-items: center;
        gap: 15px;
        flex-wrap: wrap;
    }
    
    .question-info .question-number {
        background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%);
        color: #fff;
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 13px;
        font-weight: 600;
        white-space: nowrap;
    }
    
    .question-info .time-display {
        background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%);
        color: #fff;
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 13px;
        font-weight: 600;
        white-space: nowrap;
    }
    
    .question-info .time-display::before {
        content: '\f017';
        font-family: 'FontAwesome';
        margin-right: 6px;
    }
    
    #start_exam .line_br {
        width: 80px;
        height: 3px;
        background: rgba(255,255,255,0.8);
        margin: 10px auto 0;
        border-radius: 2px;
    }
    
    /* Main Content Box */
    #start_exam .box {
        background: #fff;
        border-radius: 12px;
        padding: 18px 20px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        border: 1px solid #e5e7eb;
        margin-top: 0;
    }
    
    #start_exam h3 {
        background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
        color: #fff;
        font-size: 15px;
        font-weight: 600;
        margin: 0;
        padding: 8px 12px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(44, 62, 80, 0.2);
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    #start_exam hr {
        display: none;
    }
    
    /* Time Display - Hidden, now in question-info */
    .shTime {
        display: none;
    }
    
    /* Question Section */
    .question-section {
        background: #f9fafb;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 15px;
        border: 1px solid #e5e7eb;
    }
    
    /* Answer Options - Refined */
    .ctm_radio_btn {
        margin: 12px 0;
        gap: 10px;
    }
    
    .ctm_radio_btn .radio {
        margin: 0;
        padding: 0;
    }
    
    .ctm_radio_btn .radio label {
        background: #fff;
        border: 2px solid #e5e7eb;
        color: #2c3e50;
        padding: 10px 12px 10px 40px;
        font-size: 14px;
        font-weight: 500;
        border-radius: 8px;
        transition: all 0.3s ease;
        height: 100%;
        display: flex;
        align-items: center;
        position: relative;
        min-height: auto;
        line-height: 1.5;
    }
    
    .ctm_radio_btn .radio label::before {
        background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%);
        color: #fff;
        width: 28px;
        height: 28px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 13px;
        margin-right: 0;
        margin-left: 0;
        box-shadow: 0 2px 6px rgba(241, 185, 0, 0.3);
        position: absolute;
        left: 8px;
        top: 50%;
        transform: translateY(-50%);
        flex-shrink: 0;
    }
    
    .ctm_radio_btn .radio label textarea {
        margin-left: 0;
        padding-left: 0;
    }
    
    #start_exam .ctm_radio_btn .radio input[type="radio"]:checked+label,
    #start_exam .ctm_radio_btn .radio input[type="checkbox"]:checked+label {
        background: linear-gradient(135deg, #3d5c61 0%, #3c3623 100%);
        color: #fff;
        border-color: #3f555e;
    }
    
    #start_exam .ctm_radio_btn .radio input[type="radio"]:checked+label::before,
    #start_exam .ctm_radio_btn .radio input[type="checkbox"]:checked+label::before {
        background: #fff;
        color: #3d5c61;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
    }
    
    .ctm_radio_btn .radio label:hover {
        border-color: #F1B900;
        transform: translateX(3px);
        box-shadow: 0 2px 8px rgba(241, 185, 0, 0.2);
    }
    
    /* Desktop only - mock test option text 3px larger */
    @media (min-width: 769px) {
        #start_exam .ctm_radio_btn .radio label {
            font-size: 17px;
        }
    }
    
    /* Navigation Buttons */
    .me-control-btn {
        display: flex;
        justify-content: space-between;
        gap: 12px;
        margin: 3px 0 12px 0;
        padding-top: 3px;
        border-top: 2px solid #e5e7eb;
    }
    
    .me-control-btn .btn {
        flex: 1;
        padding: 12px 20px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        transition: all 0.3s ease;
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        margin: 0;
    }
    
    /* Blinking animation for mobile */
    @keyframes blinkArrow {
        0%, 100% {
            opacity: 1;
            transform: scale(1);
        }
        50% {
            opacity: 0.5;
            transform: scale(1.1);
        }
    }
    
    /* Flash notification for last question */
    @keyframes flashSubmit {
        0%, 100% {
            opacity: 0;
            transform: translateX(-50%) translateY(-30px);
        }
        5%, 95% {
            opacity: 1;
            transform: translateX(-50%) translateY(0);
        }
    }
    
    @keyframes bounceArrow {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(10px);
        }
    }
    
    .submit-flash-notification {
        position: fixed;
        top: 80px;
        left: 50%;
        transform: translateX(-50%);
        background: linear-gradient(135deg, #8e8200 0%, #fba53e 100%);
        color: #fff;
        padding: 14px 24px 12px 24px;
        border-radius: 30px;
        font-size: 15px;
        font-weight: 700;
        box-shadow: 0 8px 30px rgba(142, 130, 0, 0.6), 0 4px 15px rgba(0, 0, 0, 0.2);
        z-index: 1001;
        display: none;
        flex-direction: column;
        align-items: center;
        gap: 10px;
        white-space: nowrap;
        border: 2px solid rgba(255, 255, 255, 0.3);
    }
    
    .submit-flash-notification.show {
        display: flex;
        animation: flashSubmit 6s ease-in-out;
    }
    
    .submit-flash-notification .flash-content {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        width: 100%;
    }
    
    .submit-flash-notification i.fa-exclamation-circle {
        font-size: 18px;
        animation: pulse 1.5s ease-in-out infinite;
    }
    
    .submit-flash-notification .flash-text {
        font-weight: 700;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }
    
    .submit-flash-notification .arrow-down {
        font-size: 22px;
        color: #2c3e50;
        animation: bounceArrow 1s ease-in-out infinite;
        margin-top: 0;
        text-shadow: 0 2px 4px rgba(255, 255, 255, 0.5);
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        text-align: center;
    }
    
    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.2);
        }
    }
    
    .me-control-btn.blink-buttons .btn i {
        animation: blinkArrow 1s ease-in-out infinite;
    }
    
    .me-control-btn .btn-info {
        background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%);
        color: #fff;
        box-shadow: 0 3px 10px rgba(241, 185, 0, 0.3);
    }
    
    .me-control-btn .btn-info:hover:not(:disabled) {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(241, 185, 0, 0.4);
        color: #fff;
    }
    
    .me-control-btn .btn-info:disabled {
        background: #9ca3af;
        opacity: 0.6;
        cursor: not-allowed;
        box-shadow: none;
    }
    
    /* Submit Button */
    #submit_button button {
        background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%);
        color: #fff;
        border: none;
        padding: 14px 35px;
        border-radius: 8px;
        font-size: 15px;
        font-weight: 600;
        box-shadow: 0 4px 15px rgba(241, 185, 0, 0.35);
        transition: all 0.3s ease;
        width: 100%;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    #submit_button button:hover:not(:disabled) {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(241, 185, 0, 0.45);
    }
    
    #submit_button button:disabled {
        opacity: 0.7;
        cursor: not-allowed;
    }
    
    /* Media Elements */
    .embed-responsive {
        border-radius: 8px;
        overflow: hidden;
        margin: 10px 0;
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    }
    
    .imgfits {
        border-radius: 8px;
        overflow: hidden;
        margin: 10px 0;
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    }
    
    .imgfits img {
        border-radius: 8px;
    }
    
    audio, video {
        border-radius: 8px;
        margin: 10px 0;
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    }
    
    /* CKEditor */
    .cke_editable {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 6px;
        padding: 12px;
        min-height: 70px;
        font-size: 14px;
    }
    
    @media (max-width: 768px) {
        #start_exam {
            padding: 0 0 15px 0;
        }
        
        .exam-header-wrapper {
            flex-direction: column;
            gap: 0;
            padding: 10px 15px;
            margin-bottom: 8px;
            margin-top: 0;
        }
        
        .exam-header-logo {
            gap: 8px;
        }
        
        .exam-header-logo .brand-icon {
            width: 32px;
            height: 32px;
        }
        
        #start_exam .h1 {
            font-size: 14px;
        }
        
        #start_exam .box {
            padding: 12px 15px;
            margin-top: 0;
        }
        
        #start_exam h3 {
            font-size: 13px;
            padding: 8px 12px;
            margin-bottom: 8px;
        }
        
        .exam-title-row {
            margin-bottom: 8px;
            gap: 8px;
        }
        
        .question-info {
            gap: 8px;
        }
        
        .question-info .question-number,
        .question-info .time-display {
            padding: 5px 10px;
            font-size: 11px;
        }
        
        .question-section {
            padding: 12px;
            margin-bottom: 10px;
        }
        
        .shTime {
            flex-direction: column;
            gap: 6px;
            text-align: center;
            padding: 8px 12px;
        }
        
        .me-control-btn {
            position: relative;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            margin: 3px 0 12px 0;
            padding: 10px 0 0 0;
            gap: 12px;
            z-index: 1;
            border-top: 2px solid #e5e7eb;
        }
        
        .me-control-btn .btn {
            flex: 1;
            padding: 12px 15px;
            font-size: 14px;
            margin: 0;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 3px 10px rgba(241, 185, 0, 0.3);
            transition: all 0.3s ease;
            background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%);
            color: #fff;
            font-weight: 600;
        }
        
        .me-control-btn .me-prev {
            margin-left: 0;
        }
        
        .me-control-btn .me-next {
            margin-right: 0;
        }
        
        .me-control-btn .btn i {
            margin: 0 6px 0 0;
            color: #fff;
        }
        
        .me-control-btn .me-next .btn i {
            margin: 0 0 0 6px;
        }
        
        .me-control-btn .btn span {
            display: inline;
        }
        
        .me-control-btn .btn:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(241, 185, 0, 0.4);
        }
        
        .me-control-btn .btn:active:not(:disabled) {
            transform: translateY(0);
        }
        
        /* Disabled state styling */
        .me-control-btn .btn.disabled {
            opacity: 0.6;
            cursor: not-allowed;
            box-shadow: 0 2px 6px rgba(0,0,0,0.2);
            background: #9ca3af;
        }
        
        .me-control-btn .btn.disabled:hover {
            transform: none;
        }
        
        /* Ensure buttons don't overlap content */
        #start_exam .box {
            position: relative;
            z-index: 1;
        }
        
        /* Flash notification for mobile */
        .submit-flash-notification {
            top: 60px;
            padding: 12px 20px 10px 20px;
            font-size: 13px;
            border-radius: 25px;
            gap: 8px;
        }
        
        .submit-flash-notification .flash-content {
            gap: 8px;
            width: 100%;
            justify-content: center;
        }
        
        .submit-flash-notification i.fa-exclamation-circle {
            font-size: 15px;
        }
        
        .submit-flash-notification .flash-text {
            font-size: 13px;
        }
        
        .submit-flash-notification .arrow-down {
            font-size: 20px;
            color: #2c3e50;
            width: 100%;
            text-align: center;
            display: flex;
            justify-content: center;
        }
        
        #submit_button {
            margin: 0 !important;
            padding: 8px 0 0 0;
        }
        
        #submit_button button {
            padding: 10px 20px;
            font-size: 13px;
        }
        
        .ctm_radio_btn {
            grid-template-columns: 1fr;
            gap: 6px;
            margin: 10px 0;
        }
        
        .ctm_radio_btn .radio label {
            font-size: 12px;
            padding: 8px 10px 8px 36px;
            min-height: auto;
        }
        
        .ctm_radio_btn .radio label::before {
            width: 24px;
            height: 24px;
            font-size: 11px;
            left: 6px;
        }
        
        .cke_editable {
            padding: 10px;
            min-height: 60px;
            font-size: 13px;
        }
        
        .embed-responsive,
        .imgfits,
        audio,
        video {
            margin: 8px 0;
        }
    }
    
    @media (max-width: 480px) {
        #start_exam {
            padding: 0 0 12px 0;
        }
        
        .exam-header-wrapper {
            padding: 8px 12px;
            margin-bottom: 6px;
            margin-top: 0;
        }
        
        .exam-header-logo {
            gap: 6px;
        }
        
        .exam-header-logo .brand-icon {
            width: 28px;
            height: 28px;
        }
        
        #start_exam .h1 {
            font-size: 12px;
        }
        
        #start_exam .box {
            padding: 10px 12px;
        }
        
        #start_exam h3 {
            font-size: 12px;
            padding: 6px 10px;
            margin-bottom: 6px;
        }
        
        .exam-title-row {
            margin-bottom: 6px;
            flex-direction: column;
            align-items: flex-start;
        }
        
        .question-info {
            width: 100%;
            justify-content: space-between;
        }
        
        .question-info .question-number,
        .question-info .time-display {
            padding: 4px 8px;
            font-size: 10px;
        }
        
        .question-section {
            padding: 10px;
            margin-bottom: 8px;
        }
        
        .me-control-btn {
            position: relative;
            margin: 3px 0 12px 0;
            padding: 8px 0 0 0;
            gap: 10px;
        }
        
        .me-control-btn .btn {
            flex: 1;
            padding: 10px 12px;
            font-size: 12px;
            margin: 0;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .me-control-btn .btn i {
            margin: 0 4px 0 0;
            font-size: 14px;
        }
        
        .me-control-btn .me-next .btn i {
            margin: 0 0 0 4px;
        }
        
        .me-control-btn .btn span {
            display: inline;
            font-size: 12px;
        }
        
        .submit-flash-notification {
            top: 50px;
            padding: 10px 18px 8px 18px;
            font-size: 12px;
            border-radius: 22px;
            gap: 6px;
        }
        
        .submit-flash-notification .flash-content {
            gap: 6px;
            width: 100%;
            justify-content: center;
        }
        
        .submit-flash-notification i.fa-exclamation-circle {
            font-size: 14px;
        }
        
        .submit-flash-notification .flash-text {
            font-size: 12px;
        }
        
        .submit-flash-notification .arrow-down {
            font-size: 18px;
            color: #2c3e50;
            width: 100%;
            text-align: center;
            display: flex;
            justify-content: center;
        }
        
        .ctm_radio_btn {
            gap: 5px;
            margin: 8px 0;
        }
        
        .ctm_radio_btn .radio label {
            font-size: 11px;
            padding: 6px 8px 6px 32px;
            min-height: auto;
        }
        
        .ctm_radio_btn .radio label::before {
            width: 22px;
            height: 22px;
            font-size: 10px;
            left: 5px;
        }
        
        #submit_button button {
            padding: 8px 16px;
            font-size: 12px;
        }
    }
</style>
<?php
    $num_of_ques = count($questions);
    $count = 1;
?>
<section id="start_exam" class="myBox secPad decpara startExam">
   <div class="container">
      <!-- Header -->
      <div class="exam-header-wrapper">
         <div class="exam-header-top">
            <div class="exam-header-logo">
               <img src="<?= base_url('assets/images/logo-new.png') ?>" alt="Logo" class="brand-icon">
            <h1 class="text-uppercase h1"><strong><?= $mock->batch_id == 0 ? 'Digital Mock Test' : 'Digital Live Test' ?></strong></h1>
            </div>
         </div>
      </div>
      
      <!-- Main Content -->
      <div class="box">
         <div class="row">
            <div class="col-md-12">
               <div id="note">
                  <noscript><div class="alert alert-danger">Your browser does not support JavaScript or JavaScript is disabled! Please use JavaScript enabled browser to take this exam.</div></noscript>
                  <?php if ($message) echo $message; ?>
               </div>
               <div class="exam-title-row">
                  <h3><i class="fa fa-file-text-o"></i> <?= htmlspecialchars($mock->title_name) ?></h3>
                  <div class="question-info">
                     <span class="question-number" id="question-number">Question 1 of <?= $num_of_ques ?></span>
                     <span class="time-display">Time Remaining: <span class="time-duration"></span></span>
                  </div>
               </div>
                    <form id="anserForm" action="<?= base_url('exam_control'); ?>" method="post">
                        <div class="question_content">
                            <input type="hidden" name="exam_id" value="<?= $mock->title_id; ?>">
                            <input type="hidden" name="token" value="<?= time(); ?>">
                            <div id="Carousel" class="carousel" data-interval="false" data-wrap="false" style="margin-bottom: 5px;">
                                <div class="carousel-inner">
                                    <?php 
                                    foreach ($questions as $ques): $type = ($ques->option_type == 'Radio') ? 'radio' : 'checkbox'; ?>
                                        <div class="item <?= ($count == $num_of_ques) ? 'active' : '' ?>">
                                            <!-- Question Content -->
                                            <div class="question-section">
                                                <textarea cols="10" id="editor<?= $ques->ques_id ?>" name="editor<?= $ques->ques_id ?>" rows="5" disabled> <?=$ques->question; ?></textarea>
                                 
                                 
                                  <script>
    (function() {
        function isMobileDevice() {
            return (typeof window.orientation !== "undefined") || (navigator.userAgent.indexOf('IEMobile') !== -1);
        }
      var mathElements = [
        'math',
        'maction',
        'maligngroup',
        'malignmark',
        'menclose',
        'merror',
        'mfenced',
        'mfrac',
        'mglyph',
        'mi',
        'mlabeledtr',
        'mlongdiv',
        'mmultiscripts',
        'mn',
        'mo',
        'mover',
        'mpadded',
        'mphantom',
        'mroot',
        'mrow',
        'ms',
        'mscarries',
        'mscarry',
        'msgroup',
        'msline',
        'mspace',
        'msqrt',
        'msrow',
        'mstack',
        'mstyle',
        'msub',
        'msup',
        'msubsup',
        'mtable',
        'mtd',
        'mtext',
        'mtr',
        'munder',
        'munderover',
        'semantics',
        'annotation',
        'annotation-xml'
      ];

      CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.13.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');

      CKEDITOR.replace('editor<?= $ques->ques_id ?>', {
        versionCheck : false,
        extraPlugins: 'ckeditor_wiris',
        // For now, MathType is incompatible with CKEditor file upload plugins.
        removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser',
        height: 80,
        fontSize_defaultLabel: '16px',
            contentsCss: [
                'body { font-family: "Roboto", sans-serif; font-size: 16px; }',
                '@media (max-width: 767px) { body { font-size: 16px; } }', // Font size for mobile devices
                '@media (min-width: 768px) { body { font-size: 18px; } }' // Font size for desktop devices
            ],
            // Optional: to include '16px' as a selectable font size in the font size dropdown
        fontSize_sizes: '16/16px',
        // Update the ACF configuration with MathML syntax.
        extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
      });
    }());
  </script>
  <style>
    .cke_top {
  
    display: none;
}
   .cke_bottom {
  
    display: none;
}
    
  </style>


                                                    <?php if (!empty($ques->media_type) AND ($ques->media_type != '')  AND ($ques->media_link != '')) {
                                                        switch ($ques->media_type) {
                                                            case 'youtube':
                                                                parse_str(parse_url($ques->media_link, PHP_URL_QUERY));
                                                                echo '<div class="embed-responsive embed-responsive-16by9">';
                                                                echo '<iframe class="embed-responsive-item" src="//www.youtube.com/embed/'.$v.'" frameborder="0"></iframe>';
                                                                echo "</div>";
                                                                break;
                                                            case 'audio':
                                                                $link = '<audio controls>';
                                                                  $link .= '<source src="'.base_url("uploads/question-media/".$ques->media_link).'" type="audio/mpeg">';
                                                                  $link .= '<source src="'.base_url("uploads/question-media/".$ques->media_link).'" type="audio/ogg">';
                                                                  $link .= '<source src="'.base_url("uploads/question-media/".$ques->media_link).'" type="audio/wav">';
                                                                $link .= '</audio>';
                                                                echo $link;
                                                                break;
                                                            case 'video':
                                                                $link = '<p><video width="600" height="400" controls>';
                                                                  $link .= '<source src="'.base_url("uploads/question-media/".$ques->media_link).'" type="video/mp4">';
                                                                  $link .= '<source src="'.base_url("uploads/question-media/".$ques->media_link).'" type="video/ogg">';
                                                                  $link .= '<source src="'.base_url("uploads/question-media/".$ques->media_link).'" type="video/webm">';
                                                                $link .= '</audio></p>';
                                                                echo $link;
                                                                break;
                                                            case 'image':
                                                                echo '<div class="imgfits"><img src="'.base_url("uploads/question-media/".$ques->media_link).'" alt="image" height="120px" width="100%" style="object-fit: contain;"></div>';
                                                                break;                                    
                                                            default:
                                                                break;
                                                        }
                                                        echo "";
                                                    }
                                                    ?>
                                                    
                                                    <!-- Answer Options -->
                                                    <div class="ctm_radio_btn">
                                                    <?php
                                                    foreach ($answers[$ques->ques_id][0] as $ans) { ?>
                                                        <div class="<?= $type ?>">
                                                            <input type="<?= $type ?>" id="for_<?=$ans->ans_id; ?>" name="ans[<?= $ques->ques_id; ?>]<?= ($type == 'checkbox') ? '[]' : '' ?>" value="<?=$ans->ans_id; ?>"> 
                                                            <label for="for_<?=$ans->ans_id; ?>" >
                                                            <?php if($ans->new==2){ ?>
                                                            <textarea cols="10" id="answer<?=$ans->ans_id;?>" name="answer<?=$ans->ans_id;?>" rows="5" disabled> <?=$ans->answer; ?></textarea>
                                                            <?php } else { echo $ans->answer; } ?>
                                                            </label>


                                                            <script>
                                                            (function() {
                                                            var mathElements = [
                                                                'math',
                                                                'maction',
                                                                'maligngroup',
                                                                'malignmark',
                                                                'menclose',
                                                                'merror',
                                                                'mfenced',
                                                                'mfrac',
                                                                'mglyph',
                                                                'mi',
                                                                'mlabeledtr',
                                                                'mlongdiv',
                                                                'mmultiscripts',
                                                                'mn',
                                                                'mo',
                                                                'mover',
                                                                'mpadded',
                                                                'mphantom',
                                                                'mroot',
                                                                'mrow',
                                                                'ms',
                                                                'mscarries',
                                                                'mscarry',
                                                                'msgroup',
                                                                'msline',
                                                                'mspace',
                                                                'msqrt',
                                                                'msrow',
                                                                'mstack',
                                                                'mstyle',
                                                                'msub',
                                                                'msup',
                                                                'msubsup',
                                                                'mtable',
                                                                'mtd',
                                                                'mtext',
                                                                'mtr',
                                                                'munder',
                                                                'munderover',
                                                                'semantics',
                                                                'annotation',
                                                                'annotation-xml'
                                                            ];

                                                            CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.13.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');

                                                            CKEDITOR.replace('answer<?=$ans->ans_id;?>', {
                                                                versionCheck : false,
                                                                extraPlugins: 'ckeditor_wiris',
                                                                // For now, MathType is incompatible with CKEditor file upload plugins.
                                                                removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser',
                                                                height: 80,
                                                                // Update the ACF configuration with MathML syntax.
                                                                extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
                                                            });
                                                            }());
                                                        </script>
                                                        </div>

                                                    <?php 
                                                    } ?>
                                                    </div>
                                            </div>
                                        </div>
                                        <?php $count++;
                                    endforeach;
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="me-control-btn">
                                    <a class="btn btn-lg btn-info me-prev disabled" href="#Carousel" data-slide="next">
                                        <i class="fa fa-arrow-left"></i> <span>Previous Question</span>
                                    </a>
                                    <a class="btn btn-lg btn-info me-next" href="#Carousel" data-slide="prev">
                                        <span>Next Question</span> <i class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div id="submit_button" style="margin: 0;"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Result Popup -->
<div class="result_popup" style="display: none;"></div>

<!-- Flash Notification for Last Question -->
<div class="submit-flash-notification" id="submitFlashNotification">
    <div class="flash-content">
        <i class="fa fa-exclamation-circle"></i>
        <span class="flash-text">Submit Your Exam</span>
    </div>
    <i class="fa fa-arrow-down arrow-down"></i>
</div>

<script language="JavaScript"><!--
// javascript:window.history.forward(1);
//--></script>
<!-- Bootstrap JS (required for carousel) -->
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Set Time
        // $.LoadingOverlay('show');
//

        // setTimeout(function() {
        //     $('.cke_notification').remove();
        //     $.LoadingOverlay('hide');

        // }, 5000);
        var count = <?= ($duration) ?>;
        var h, m, s, newTime;

        var counter = setInterval(timer, 1000);
        function timer() {
            count = count - 1;
            if (count < 0) {
                clearInterval(counter);
                return;
            }
            h = Math.floor(count / 3600);
            m = Math.floor(count / 60) - (h * 60);
            s = count % 60;
            if (m.toString().length == 1)
                m = '0' + m;
            if (s.toString().length == 1)
                s = '0' + s;
            if (h) {
                if (h.toString().length == 1)
                    h = '0' + h;
                newTime = '<strong>' + h + ':' + m + ':' + s + '</strong> <small class="text-muted">Hours</small>';
            } else {
                newTime = '<strong>' + m + ':' + s + '</strong> <small class="text-muted">Minutes</small>';
            }
           
            //Update timer cookie
            var now = new Date();
            var time = now.getTime();
            time += count * 1000;
            now.setTime(time);
            document.cookie="ExamTimeDuration="+count+"; expires="+now.toUTCString()+"; path=/";
            
            //Update time to HTML
            $('.time-duration').html(newTime);
        }

        // Initialize carousel
        $('#Carousel').carousel({
            interval: false,
            wrap: false
        });
        
        // Control Buttons    
        var submit_btn = '<button type="button" class="btn btn-lg btn-success" > <i class="fa fa-check-square-o"></i> Submit <span class="hidden-xxs">your answers </span></a>';
        var num_of_ques = parseInt("<?php echo $num_of_ques; ?>");
        
        // Update button states based on carousel position
        function updateButtonStates() {
            var activeIndex = $('#Carousel .item.active').index();
            var totalItems = $('#Carousel .item').length;
            
            // activeIndex 0 = last question (shown first due to reverse order)
            // activeIndex (totalItems - 1) = first question (shown last)
            
            // Update Previous button - disable on first question (last in carousel)
            if (activeIndex === (totalItems - 1)) {
                $('.me-prev').addClass('disabled').css({'pointer-events': 'none', 'opacity': '0.6'});
            } else {
                $('.me-prev').removeClass('disabled').css({'pointer-events': 'auto', 'opacity': '1'});
            }
            
            // Update Next button - disable on last question (first in carousel, index 0)
            if (activeIndex === 0) {
                $('.me-next').addClass('disabled').css({'pointer-events': 'none', 'opacity': '0.6'});
                // Show submit button ONLY on last question
                if (!$("#submit_button > button").length) {
                    $("#submit_button").html(submit_btn);
                }
                // Show flash notification for last question
                showSubmitFlash();
            } else {
                $('.me-next').removeClass('disabled').css({'pointer-events': 'auto', 'opacity': '1'});
                // Hide submit button if not on last question
                $("#submit_button").html('');
                // Hide flash notification
                $('#submitFlashNotification').removeClass('show');
            }
        }
        
        // Prevent clicks on disabled buttons
        $('.me-prev, .me-next').click(function(e) {
            if ($(this).hasClass('disabled')) {
                e.preventDefault();
                e.stopPropagation();
                return false;
            }
        });
        
        // Update question number display
        function updateQuestionNumber() {
            var activeIndex = $('#Carousel .item.active').index();
            var totalItems = $('#Carousel .item').length;
            var questionNum = totalItems - activeIndex; // Reverse order
            $('#question-number').text('Question ' + questionNum + ' of ' + totalItems);
        }
        
        // Listen to carousel slide events
        $('#Carousel').on('slid.bs.carousel', function () {
            updateButtonStates();
            updateQuestionNumber();
        });
        
        // Function to show submit flash notification
        function showSubmitFlash() {
            var $flash = $('#submitFlashNotification');
            $flash.addClass('show');
            
            // Remove the show class after animation completes to allow re-triggering
            // Extended to 6 seconds to match animation duration
            setTimeout(function() {
                $flash.removeClass('show');
            }, 6000);
        }
        
        // Initialize button states on page load - ensure submit button is hidden initially
        $("#submit_button").html('');
        updateButtonStates();
        updateQuestionNumber();
        
        // Mobile blinking animation for navigation buttons
        function checkMobileBlinking() {
            if (window.innerWidth <= 768) {
                var $submitButton = $("#submit_button button");
                var isScrolling = false;
                var scrollTimer;
                
                // Function to check and apply blinking
                function applyBlinking() {
                    if ($submitButton.length > 0 && $submitButton.is(':visible')) {
                        $('.me-control-btn').addClass('blink-buttons');
                    } else if (!isScrolling) {
                        $('.me-control-btn').removeClass('blink-buttons');
                    }
                }
                
                // Check if submit button is visible (last question)
                applyBlinking();
                
                // Detect scrolling
                $(window).on('scroll', function() {
                    isScrolling = true;
                    $('.me-control-btn').addClass('blink-buttons');
                    
                    clearTimeout(scrollTimer);
                    scrollTimer = setTimeout(function() {
                        isScrolling = false;
                        applyBlinking();
                    }, 1000);
                });
                
                // Check on carousel slide (when reaching last question)
                $('#Carousel').on('slid.bs.carousel', function () {
                    setTimeout(function() {
                        applyBlinking();
                    }, 100);
                });
                
                // Monitor submit button visibility
                var observer = new MutationObserver(function(mutations) {
                    applyBlinking();
                });
                
                var submitContainer = document.getElementById('submit_button');
                if (submitContainer) {
                    observer.observe(submitContainer, {
                        childList: true,
                        subtree: true
                    });
                }
            } else {
                $('.me-control-btn').removeClass('blink-buttons');
            }
        }
        
        // Initialize mobile blinking check
        checkMobileBlinking();
        
        // Re-check on window resize
        $(window).on('resize', function() {
            checkMobileBlinking();
        });

        //Sumbit after time out
        var timeout = <?= ($duration * 1000) ?>;
        setTimeout(function() {
            alert('TIME OUT!');
            $('#anserForm').submit();
        }, timeout);

    });

    $("body").on('click','#submit_button button',function(){

        var thisButton = $(this);
        thisButton.attr('disabled',true);
        $.LoadingOverlay('show');

        $.ajax({
            data: $('#anserForm').serialize(),
            url: '<?= base_url('exam_control/submit_answers')?>',
            method: 'post',
            success: function(response) {

                thisButton.attr('disabled',false);
                $.LoadingOverlay('hide');

                var Response = JSON.parse(response);

                if (Response.status) 
                {
                    // Clear previous content and remove previous classes
                    $('.result_popup').empty().removeClass('marvellous qualified excellent not_qualified');
                    
                    // Add the class from response
                    $('.result_popup').addClass(Response.data.class);

                    if(Response.data.celebration == true)
                    {
                        if(Response.data.class == 'marvellous')
                        {
                            $('.result_popup').html(`<img src="<?= base_url('assets/images/trophy.jpeg') ?>" alt="result image" class=""><h2>`+Response.data.heading+`</h2>
                            <p>`+Response.data.result_message+`</p>`);

                        } else {

                            $('.result_popup').html(`<img src="<?= base_url('assets/images/medal.png') ?>" alt="result image" class=""><h2>`+Response.data.heading+`</h2>
                            <p>`+Response.data.result_message+`</p>`);
                            
                        }

                        $('.result_popup').show();

                    } else {

                        $('.result_popup').html(`<img src="<?= base_url('assets/images/dis_qualified.jpg') ?>" alt="result image" class=""><h2>`+Response.data.heading+`</h2>
                        <p>`+Response.data.result_message+`</p>`);

                        $('.result_popup').show();
                    }

                    // Redirect after 3 seconds (changed from 5 to 3)
                    setTimeout(function() {
                        window.location.href = Response.url;
                    }, 3000);

                } else {

                    if(Response.url != '')
                    {
                        setTimeout(function() {
                            window.location.href = Response.url;
                        }, 3000);
                    }

                }

            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                $.LoadingOverlay('hide');
                thisButton.attr('disabled',false);
                alert('An error occurred. Please try again.');
            }
        });

    })

</script>