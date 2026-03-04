<style>
    #contact {
        display: none;
    }
    
    /* Modern Exam Instructions Page - Optimized */
    #exam_summery {
        padding: 90px 0 40px 0;
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
    }
    
    .exam-instructions-wrapper {
        max-width: 800px;
        margin: 0 auto;
    }
    
    .instructions-header-card {
        background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%);
        color: #fff;
        border-radius: 16px;
        padding: 15px 25px;
        margin-bottom: 20px;
        box-shadow: 0 6px 25px rgba(241, 185, 0, 0.35);
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    
    .instructions-header-card::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
    }
    
    .instructions-header-card h1 {
        font-size: 20px;
        font-weight: 600;
        margin: 0;
        text-transform: none;
        position: relative;
        z-index: 1;
        line-height: 1.3;
    }
    
    .instructions-card {
        background: #fff;
        border-radius: 16px;
        padding: 25px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.06);
        border: 1px solid #e5e7eb;
    }
    
    .instructions-card h4 {
        font-size: 14px;
        font-weight: 600;
        color: #2c3e50;
        margin: 0 0 15px 0;
        padding-bottom: 10px;
        border-bottom: 3px solid #F1B900;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .instructions-list {
        list-style: none;
        padding: 0;
        margin: 0 0 20px 0;
    }
    
    .instructions-list li {
        padding: 10px 0;
        padding-left: 30px;
        position: relative;
        color: #666;
        font-size: 15px;
        line-height: 1.6;
        border-bottom: 1px solid #f3f4f6;
    }
    
    @media (max-width: 480px) {
        #exam_summery {
            padding: 60px 0 15px 0;
        }
        
        .exam-instructions-wrapper {
            margin: 60px auto 15px auto;
        }
        
        .instructions-header-card {
            padding: 12px 15px;
            margin-bottom: 10px;
            border-radius: 12px;
        }
        
        .instructions-header-card h1 {
            font-size: 15px;
            line-height: 1.2;
        }
        
        .alert-container {
            margin-bottom: 8px;
        }
        
        .instructions-card {
            padding: 12px 15px;
            border-radius: 12px;
        }
        
        .instructions-card h4 {
            font-size: 13px;
            margin: 0 0 10px 0;
            padding-bottom: 6px;
        }
        
        .instructions-list {
            margin: 0 0 10px 0;
        }
        
        .instructions-list li {
            font-size: 11px;
            padding: 5px 0;
            padding-left: 20px;
            line-height: 1.4;
        }
        
        .instructions-list li i {
            font-size: 11px;
            top: 7px;
        }
        
        .btnset {
            padding: 8px 0 3px 0;
        }
        
        .start-exam-btn {
            padding: 9px 22px;
            font-size: 12px;
        }
    }
    
    .instructions-list li:last-child {
        border-bottom: none;
    }
    
    .instructions-list li i {
        position: absolute;
        left: 0;
        top: 12px;
        color: #F1B900;
        font-size: 14px;
    }
    
    .btnset {
        text-align: center;
        padding: 15px 0 5px 0;
    }
    
    .start-exam-btn {
        display: inline-block;
        background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%);
        color: #fff;
        padding: 14px 40px;
        border-radius: 30px;
        font-size: 15px;
        font-weight: 600;
        text-decoration: none;
        box-shadow: 0 6px 25px rgba(241, 185, 0, 0.35);
        transition: all 0.3s ease;
        text-transform: none;
        letter-spacing: 0.3px;
        border: none;
        cursor: pointer;
    }
    
    .start-exam-btn:hover,
    .start-exam-btn:focus {
        transform: translateY(-2px);
        box-shadow: 0 8px 30px rgba(241, 185, 0, 0.45);
        color: #fff;
        text-decoration: none;
        outline: none;
    }
    
    .start-exam-btn:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none;
    }
    
    .alert-container {
        margin-bottom: 15px;
    }
    
    .alert-container .alert {
        font-size: 13px;
        padding: 10px 15px;
        margin-bottom: 0;
    }
    
    @media (max-width: 768px) {
        #exam_summery {
            padding: 70px 0 20px 0;
        }
        
        .exam-instructions-wrapper {
            margin: 70px auto 20px auto;
        }
        
        .instructions-header-card {
            padding: 12px 20px;
            margin-bottom: 12px;
        }
        
        .instructions-header-card h1 {
            font-size: 15px;
            line-height: 1.2;
        }
        
        .alert-container {
            margin-bottom: 10px;
        }
        
        .alert-container .alert {
            font-size: 12px;
            padding: 8px 12px;
        }
        
        .instructions-card {
            padding: 15px 18px;
            margin-bottom: 0;
        }
        
        .instructions-card h4 {
            font-size: 13px;
            margin: 0 0 12px 0;
            padding-bottom: 8px;
        }
        
        .instructions-list {
            margin: 0 0 12px 0;
        }
        
        .instructions-list li {
            font-size: 12px;
            padding: 6px 0;
            padding-left: 22px;
            line-height: 1.5;
            border-bottom: 1px solid #f3f4f6;
        }
        
        .instructions-list li i {
            font-size: 12px;
            top: 8px;
        }
        
        .btnset {
            padding: 10px 0 5px 0;
        }
        
        .start-exam-btn {
            padding: 10px 25px;
            font-size: 13px;
            border-radius: 25px;
        }
    }
</style>
<?php $user_info = $this->db->get_where('users', array('user_id' => $this->session->userdata('user_id')))->row(); ?>
<section id="exam_summery" class="secPad">
    <div class="container">
        <div class="exam-instructions-wrapper">
            <!-- Header Card -->
            <div class="instructions-header-card">
                <h1>Exam Title: <strong><?= htmlspecialchars($mock->title_name) ?></strong></h1>
            </div>
            
            <!-- Messages -->
            <div class="alert-container">
                <noscript>
                    <div class="alert alert-danger">Your browser does not support JavaScript or JavaScript is disabled! Please use JavaScript enabled browser to take this exam.</div>
                </noscript>
                <?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                <?= ($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>
                <?= (isset($message)) ? $message : ''; ?>
            </div>
            
            <!-- Instructions Card -->
            <div class="instructions-card">
                <h4><i class="fa fa-info-circle"></i> Instructions</h4>
                <ul class="instructions-list">
                    <li>
                        <i class="fa fa-hand-o-right"></i>
                        Each question has multiple options and you have to choose one answer.
                    </li>
                    <li>
                        <i class="fa fa-hand-o-right"></i>
                        There is no negative marking for incorrect answer, so you may attempt all questions.
                    </li>
                    <li>
                        <i class="fa fa-hand-o-right"></i>
                        You can recheck and change your answers before final submit.
                    </li>
                    <li>
                        <i class="fa fa-hand-o-right"></i>
                        If you left any question without answer it will be count as wrong answer.
                    </li>
                    <li>
                        <i class="fa fa-hand-o-right"></i>
                        You have to complete test within given duration of time which is shown at the top.
                    </li>
                    <li>
                        <i class="fa fa-hand-o-right"></i>
                        You can't resume the exam before final submit.
                    </li>
                </ul>
                
                <div class="btnset">
                    <a href="<?= base_url('mock-test-details/start-exam/' . $mock->slug) ?>" id="start-exam" class="start-exam-btn">
                        <i class="fa fa-play-circle" style="margin-right: 6px;"></i>Start Exam
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $("#start-exam").removeAttr("disabled");
    })
</script>
<script language="JavaScript">
    <!--
    // javascript: window.history.forward(1);
    //
    -->
</script>
