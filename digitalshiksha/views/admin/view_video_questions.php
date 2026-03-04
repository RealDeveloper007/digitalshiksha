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
    
    .question-actions {
        margin-top: 15px;
        padding-top: 15px;
        border-top: 1px solid #f0f0f0;
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }
    
    .action-btn {
        padding: 10px 18px;
        font-size: 14px;
        border-radius: 4px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-weight: 500;
        transition: all 0.3s;
        border: none;
        cursor: pointer;
    }
    
    .action-btn i {
        font-size: 16px;
    }
    
    .btn-view-video {
        background: #dc3545;
        color: white;
    }
    
    .btn-view-video:hover {
        background: #c82333;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(220, 53, 69, 0.3);
    }
    
    .btn-view-video i.fa-youtube {
        font-size: 20px;
        color: white;
    }
    
    .btn-delete {
        background: #6c757d;
        color: white;
    }
    
    .btn-delete:hover {
        background: #5a6268;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(108, 117, 125, 0.3);
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
        
        .question-actions {
            flex-direction: column;
            gap: 10px;
        }
        
        .action-btn {
            width: 100%;
            justify-content: center;
            padding: 12px 18px;
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
</style>

<script type="text/javascript" src="<?= base_url('assets/js/html2canvas.js')?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/jsPdf.debug.js')?>"></script>

<div class="questions-wrapper">  
    <div class="questions-header">
        <h2><i class="fa fa-video-camera"></i> Video Questions</h2>
        <?php if (isset($_GET['back_url']) && !empty($_GET['back_url'])) { ?>
            <a href="<?php echo urldecode($_GET['back_url']); ?>" class="back-btn">
                <i class="fa fa-arrow-left"></i> Back to List
            </a>
        <?php } ?>
    </div>
    
    <div class="questions-content">
        <div class="row" id="printarea">
            <div class="col-sm-12">
                <?php if (isset($video_questions) != NULL && !empty($video_questions)) { 
                    $i = 1;
                    foreach ($video_questions as $single_video_question) { ?>
                        <div class="question-card">
                            <div class="question-title">
                                <span class="question-number"><?=$i; ?></span>
                                Title
                            </div>
                            
                            <div class="question-text">
                                <?=$single_video_question->question; ?>
                            </div>
                            
                            <div class="question-actions">
                                <a href="https://www.youtube.com/watch?v=<?= $single_video_question->url; ?>" target="_blank" class="action-btn btn-view-video">
                                    <i class="fa fa-youtube"></i> Watch Video
                                </a>
                                <a href="<?= base_url('syllabus_control/delete_syllabus_question?qid='.$single_video_question->id.'&catid='.$_GET['id'].'&type='.$_GET['type']); ?>" onclick="return confirm('Are you sure delete this video?');" class="action-btn btn-delete">
                                    <i class="fa fa-trash"></i> Delete
                                </a>
                            </div>
                        </div>
                    <?php 
                        $i++;
                    }
                } else { ?>
                    <div class="no-questions">
                        <i class="fa fa-info-circle"></i>
                        <h2>No video question available here!</h2>
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

                pdf.save('<?= isset($mock_details->title_name) ? $mock_details->title_name : 'video_questions' ?>_report.pdf');
                location.reload();
            }
        });
    }
}
</script>
