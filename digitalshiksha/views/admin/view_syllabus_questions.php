<style>
    .questions-wrapper {
        background: #fff;
        border-radius: 4px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        overflow: hidden;
        width: 100%;
        margin-bottom: 20px;
    }
    
    .questions-header {
        background: linear-gradient(135deg, #e11d80 0%, #c91a6e 100%);
        color: white;
        padding: 20px 25px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
    }
    
    .questions-header h2 {
        margin: 0;
        font-size: 24px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .questions-header h2 i {
        font-size: 26px;
    }
    
    .back-btn {
        background: white;
        color: #e11d80;
        padding: 8px 16px;
        border-radius: 4px;
        text-decoration: none;
        font-weight: 500;
        font-size: 14px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: all 0.3s;
    }
    
    .back-btn:hover {
        background: #f8f9fa;
        transform: translateY(-1px);
        box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        color: #e11d80;
    }
    
    .questions-content {
        padding: 25px;
    }
    
    .question-card {
        background: #fff;
        border: 1px solid #dee2e6;
        border-radius: 6px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 1px 2px rgba(0,0,0,0.05);
        transition: all 0.3s;
    }
    
    .question-card:hover {
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        border-color: #e11d80;
    }
    
    .question-number {
        display: inline-block;
        background: #e11d80;
        color: white;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        text-align: center;
        line-height: 30px;
        font-weight: 600;
        font-size: 14px;
        margin-right: 10px;
    }
    
    .question-title {
        font-size: 16px;
        font-weight: 600;
        color: #333;
        margin-bottom: 15px;
        padding-bottom: 12px;
        border-bottom: 2px solid #f0f0f0;
    }
    
    .question-text {
        font-size: 15px;
        color: #555;
        line-height: 1.6;
        margin-bottom: 15px;
    }
    
    .question-text-hindi {
        font-size: 14px;
        color: #666;
        font-style: italic;
        margin-top: 8px;
        padding-top: 8px;
        border-top: 1px solid #f0f0f0;
    }
    
    .options-section {
        margin-top: 15px;
        padding-top: 15px;
        border-top: 1px solid #f0f0f0;
    }
    
    .options-title {
        font-size: 14px;
        font-weight: 600;
        color: #333;
        margin-bottom: 12px;
    }
    
    .options-list {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 12px;
    }
    
    .option-item {
        padding: 12px 15px;
        background: #f8f9fa;
        border: 1px solid #e9ecef;
        border-radius: 4px;
        font-size: 14px;
        color: #333;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .option-item.correct {
        background: #d4edda;
        border-color: #28a745;
        color: #155724;
        font-weight: 500;
    }
    
    .option-item .check-icon {
        width: 20px;
        height: 20px;
        flex-shrink: 0;
    }
    
    .no-questions {
        text-align: center;
        padding: 60px 20px;
        color: #666;
    }
    
    .no-questions i {
        font-size: 64px;
        color: #ccc;
        margin-bottom: 20px;
        display: block;
    }
    
    .no-questions h2 {
        font-size: 20px;
        color: #dc3545;
        margin: 0;
    }
    
    @media (max-width: 767px) {
        .questions-header {
            padding: 15px 20px;
            flex-direction: column;
            align-items: flex-start;
        }
        
        .questions-header h2 {
            font-size: 20px;
        }
        
        .back-btn {
            width: 100%;
            justify-content: center;
        }
        
        .questions-content {
            padding: 15px;
        }
        
        .question-card {
            padding: 15px;
            margin-bottom: 15px;
        }
        
        .question-number {
            width: 28px;
            height: 28px;
            line-height: 28px;
            font-size: 13px;
        }
        
        .question-title {
            font-size: 15px;
            margin-bottom: 12px;
            padding-bottom: 10px;
        }
        
        .question-text {
            font-size: 14px;
            margin-bottom: 12px;
        }
        
        .question-text-hindi {
            font-size: 13px;
        }
        
        .options-list {
            grid-template-columns: 1fr;
            gap: 10px;
        }
        
        .option-item {
            padding: 10px 12px;
            font-size: 14px;
        }
        
        .no-questions {
            padding: 40px 15px;
        }
        
        .no-questions i {
            font-size: 48px;
        }
        
        .no-questions h2 {
            font-size: 18px;
        }
    }
    
    @media (min-width: 768px) {
        .options-list {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    
    @media (min-width: 992px) {
        .options-list {
            grid-template-columns: repeat(4, 1fr);
        }
    }
</style>

<script type="text/javascript" src="<?= base_url('assets/js/html2canvas.js')?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/jsPdf.debug.js')?>"></script>

<div class="questions-wrapper">  
    <div class="questions-header">
        <h2><i class="fa fa-question-circle"></i> MCQ Questions</h2>
        <?php if (isset($_GET['back_url']) && !empty($_GET['back_url'])) { ?>
            <a href="<?php echo urldecode($_GET['back_url']); ?>" class="back-btn">
                <i class="fa fa-arrow-left"></i> Back to List
            </a>
        <?php } ?>
    </div>
    
    <div class="questions-content">
        <div class="row" id="printarea">
            <div class="col-sm-12">
                <?php if (isset($mocks) != NULL && !empty($mocks)) { 
                    $i = 1;
                    foreach ($mocks as $mock) { ?>
                        <div class="question-card">
                            <div class="question-title">
                                <span class="question-number"><?=$i; ?></span>
                                Question
                            </div>
                            
                            <div class="question-text">
                                <?=$mock->question; ?>
                            </div>
                            
                            <?php if (!empty($mock->question_hindi)) { ?>
                                <div class="question-text-hindi">
                                    <strong>Hindi:</strong> <?=$mock->question_hindi; ?>
                                </div>
                            <?php } ?>
                            
                            <?php if (isset($mock_ans[$mock->ques_id][0])) { ?>
                                <div class="options-section">
                                    <div class="options-title">Options:</div>
                                    <div class="options-list">
                                        <?php 
                                        foreach ($mock_ans[$mock->ques_id] as $all_ans) {
                                            foreach ($all_ans as $ans) { 
                                                $is_correct = ($ans->right_ans != 0);
                                        ?>
                                            <div class="option-item <?=$is_correct ? 'correct' : ''; ?>">
                                                <?php if ($is_correct) { ?>
                                                    <img src="<?=base_url('assets/images/check.png'); ?>" alt="Correct" class="check-icon" />
                                                <?php } ?>
                                                <span><?=$ans->answer; ?></span>
                                            </div>
                                        <?php 
                                            }
                                        } 
                                        ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    <?php 
                        $i++;
                    }
                } else { ?>
                    <div class="no-questions">
                        <i class="fa fa-info-circle"></i>
                        <h2>This mock have no question!</h2>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<script>
var downPdf = document.getElementById("renderPdf");
var section_head = document.getElementById("printarea");

if (downPdf) {
    downPdf.onclick = function() {
        $('nav.navbar.navbar-inverse.navbar-fixed-top').hide();
        $("#wrapper").addClass("PrintClass");

        html2canvas(section_head, {
            onrendered: function(canvas) {
                var contentWidth = canvas.width;
                var contentHeight = canvas.height;

                var pageHeight = contentWidth / 595.28 * 841.89;
                var leftHeight = contentHeight;
                var position = 0;
                var imgWidth = 555.28;
                var imgHeight = 555.28/contentWidth * contentHeight;

                var pageData = canvas.toDataURL('image/jpeg', 1.0);

                var pdf = new jsPDF('', 'pt', 'a4');
                pdf.addImage(pageData, 'JPEG', 20, 0, imgWidth, imgHeight );

                pdf.save('<?= isset($mock_details->title_name) ? $mock_details->title_name : 'questions' ?>_report.pdf');
                location.reload();
            }
        });
    }
}
</script>
