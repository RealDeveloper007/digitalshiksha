<style>
    /* Modern MCQ Page - Optimized */
    #faq {
        padding: 90px 0 40px 0;
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        min-height: 100vh;
    }
    
    .mcq-wrapper {
        max-width: 900px;
        margin: 90px auto 0 auto;
        padding-top: 0;
    }
    
    .page-header-card {
        background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%);
        color: #fff;
        border-radius: 16px;
        padding: 22px 25px;
        margin-bottom: 20px;
        box-shadow: 0 6px 25px rgba(241, 185, 0, 0.3);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .page-header-card > div {
        flex: 1;
    }
    
    .page-header-card h2 {
        font-size: 22px;
        font-weight: 700;
        margin: 0;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .back-link {
        color: #fff;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 8px 18px;
        background: rgba(255,255,255,0.25);
        border-radius: 20px;
        transition: all 0.3s ease;
        font-size: 14px;
        font-weight: 600;
        border: 1px solid rgba(255,255,255,0.3);
    }
    
    .back-link:hover {
        background: rgba(255,255,255,0.4);
        color: #fff;
        text-decoration: none;
        transform: translateX(-3px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }
    
    .panel-default {
        border-color: transparent;
    }
    
    .panel-heading.qusAnawer {
        background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%) !important;
        border-radius: 10px !important;
        margin: 12px 0 !important;
        padding: 0 !important;
        border: none !important;
        transition: all 0.3s ease;
        box-shadow: 0 3px 10px rgba(241, 185, 0, 0.2);
    }
    
    .panel-heading.qusAnawer:hover {
        transform: translateX(3px);
        box-shadow: 0 5px 15px rgba(241, 185, 0, 0.4);
    }
    
    .panel-heading.qusAnawer .panel-title {
        padding: 16px 20px !important;
        margin: 0 !important;
    }
    
    .panel-heading.qusAnawer .panel-title a {
        color: #fff !important;
        font-size: 15px;
        font-weight: 600;
        text-decoration: none;
        display: flex;
        align-items: flex-start;
        gap: 8px;
        line-height: 1.6;
        position: relative;
        padding-right: 30px;
        cursor: pointer;
    }
    
    .panel-heading.qusAnawer .panel-title a::after {
        content: '\f107';
        font-family: 'FontAwesome';
        position: absolute;
        right: 0;
        top: 50%;
        transform: translateY(-50%);
        font-size: 18px;
        transition: all 0.3s ease;
        opacity: 0.9;
    }
    
    .panel-heading.qusAnawer .panel-title a[aria-expanded="true"]::after {
        content: '\f106';
        transform: translateY(-50%) rotate(180deg);
    }
    
    .panel-heading.qusAnawer .panel-title a:hover,
    .panel-heading.qusAnawer .panel-title a:focus {
        color: #fff !important;
        text-decoration: none;
    }
    
    .panel-heading.qusAnawer .panel-title a:hover::after {
        opacity: 1;
        transform: translateY(-50%) scale(1.1);
    }
    
    .panel-heading.qusAnawer .panel-title a[aria-expanded="true"] {
        color: #2c3e50 !important;
        font-weight: 700;
    }
    
    .panel-collapse {
        border-top: none !important;
    }
    
    .panel-collapse .panel-body {
        padding: 20px !important;
        background: #fff;
        border-radius: 0 0 10px 10px;
        font-size: 15px;
        line-height: 1.8;
        color: #4a5568;
        border-top: 2px solid rgba(241, 185, 0, 0.2);
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }
    
    .panel-body.options {
        padding: 12px 16px !important;
        margin: 8px 0 !important;
        background: #fff !important;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-size: 13px;
    }
    
    .panel-body.options:hover {
        border-color: #F1B900;
        background: #fffef5 !important;
    }
    
    .panel-body.options img {
        display: none !important;
        width: 20px;
        height: 20px;
    }
    
    .panel-body.options.show-answer img {
        display: inline-block !important;
    }
    
    .answer-btn {
        background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%);
        color: #fff;
        border: none;
        padding: 10px 24px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
        margin: 12px 10px;
        cursor: pointer;
        box-shadow: 0 4px 15px rgba(241, 185, 0, 0.3);
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    
    .answer-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(241, 185, 0, 0.4);
    }
    
    .answer-btn .fa-eye-slash {
        display: none;
    }
    
    .answer-btn.showing .fa-eye {
        display: none;
    }
    
    .answer-btn.showing .fa-eye-slash {
        display: inline-block;
    }
    
    .media-container {
        margin: 20px 0;
        border-radius: 12px;
        overflow: hidden;
    }
    
    .media-container img {
        width: 100%;
        height: auto;
        display: block;
    }
    
    .embed-responsive {
        border-radius: 12px;
        overflow: hidden;
    }
    
    @media (max-width: 768px) {
        #faq {
            padding: 110px 0 30px 0;
        }
        
        .mcq-wrapper {
            margin-top: 90px;
        }
        
        .page-header-card {
            flex-direction: column;
            align-items: flex-start;
            gap: 12px;
            padding: 18px 20px;
            margin-top: 0;
            margin-bottom: 25px;
        }
        
        .page-header-card > div {
            width: 100%;
        }
        
        .page-header-card h2 {
            font-size: 18px;
        }
        
        .page-header-card p {
            font-size: 13px !important;
        }
        
        .panel-heading.qusAnawer .panel-title {
            padding: 12px 15px !important;
        }
        
        .panel-heading.qusAnawer .panel-title a {
            font-size: 13px;
        }
        
        .panel-collapse .panel-body {
            padding: 15px !important;
            font-size: 13px;
        }
    }
</style>

<section id="faq" class="secPad">
    <div class="container">
        <div class="mcq-wrapper">
            <!-- Page Header -->
            <div class="page-header-card">
                <div>
                    <h2><i class="fa fa-list-alt" style="margin-right: 8px;"></i> MCQ Question Details</h2>
                    <p style="margin: 8px 0 0 0; font-size: 14px; opacity: 0.95;"><i class="fa fa-list" style="margin-right: 6px;"></i> Topic List</p>
                </div>
                <a href="javascript:history.go(-1)" class="back-link">
                    <i class="fa fa-angle-left"></i> <span>Go Back</span>
                </a>
            </div>
            
            <!-- MCQ Questions -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel-group" id="accordion">
                        <?php 
                        if (isset($mocks) AND !empty($mocks)) {
                            $i = 1; 
                            foreach ($mocks as $mock) {
                        ?>
                            <div class="panel panel-default">
                                <div class="panel-heading qusAnawer" id="mainquestion<?= $mock->ques_id ?>">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#question<?= $mock->ques_id ?>">
                                            <strong><?=$i;?>.</strong> <?= $mock->question; ?>
                                            <?php if (!empty($mock->question_hindi)) { ?>
                                                <br><span style="font-size: 14px; opacity: 0.9;"><?= $mock->question_hindi ?></span>
                                            <?php } ?>
                                        </a>
                                    </h4>
                                </div>
                                
                                <div id="question<?= $mock->ques_id ?>" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <?php if (!empty($mock->media_type) AND ($mock->media_type != '') AND ($mock->media_link != '')) {
                                            switch ($mock->media_type) {
                                                case 'youtube':
                                                    parse_str(parse_url($mock->media_link, PHP_URL_QUERY));
                                                    echo '<div class="media-container embed-responsive embed-responsive-16by9">';
                                                    echo '<iframe class="embed-responsive-item" src="//www.youtube.com/embed/'.$v.'" frameborder="0"></iframe>';
                                                    echo "</div>";
                                                    break;
                                                case 'audio':
                                                    echo '<div class="media-container">';
                                                    echo '<audio controls style="width: 100%;">';
                                                    echo '<source src="'.base_url("uploads/question-media/".$mock->media_link).'" type="audio/mpeg">';
                                                    echo '<source src="'.base_url("uploads/question-media/".$mock->media_link).'" type="audio/ogg">';
                                                    echo '<source src="'.base_url("uploads/question-media/".$mock->media_link).'" type="audio/wav">';
                                                    echo '</audio>';
                                                    echo '</div>';
                                                    break;
                                                case 'video':
                                                    echo '<div class="media-container">';
                                                    echo '<video width="100%" controls style="border-radius: 12px;">';
                                                    echo '<source src="'.base_url("uploads/question-media/".$mock->media_link).'" type="video/mp4">';
                                                    echo '<source src="'.base_url("uploads/question-media/".$mock->media_link).'" type="video/ogg">';
                                                    echo '<source src="'.base_url("uploads/question-media/".$mock->media_link).'" type="video/webm">';
                                                    echo '</video>';
                                                    echo '</div>';
                                                    break;
                                                case 'image':
                                                    echo '<div class="media-container"><img src="'.base_url("uploads/question-media/".$mock->media_link).'" alt="Question Image"></div>';
                                                    break;
                                            }
                                        }
                                        
                                        if ($mock_ans[$mock->ques_id][0]) {
                                            foreach ($mock_ans[$mock->ques_id] as $all_ans) {
                                                $sl = 1;
                                                foreach ($all_ans as $ans) { 
                                        ?>
                                                    <div class="panel-body options" id="option<?= $sl ?>">
                                                        <span><?= $ans->answer; ?></span>
                                                        <?=($ans->right_ans != 0) ? '<img src="'. base_url('assets/images/check.png').'">' : '<img src="'. base_url('assets/images/uncheck.png').'">'; ?>
                                                    </div>
                                        <?php 
                                                    $sl++;        
                                                }
                                            }
                                        }
                                        ?>
                                        <button class="answer-btn" id="answer-btn-<?= $mock->ques_id ?>" onclick="ShowAnswer(<?= $mock->ques_id ?>)">
                                            <i class="fa fa-eye"></i>
                                            <i class="fa fa-eye-slash"></i>
                                            <span class="btn-text">Show Answer</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php 
                                $i++;
                            }
                        } else {
                            echo '<div class="panel panel-default"><div class="panel-body" style="text-align: center; padding: 40px;"><h4 style="color: #999;">No MCQ questions found!</h4></div></div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
   function ShowAnswer(id) {
        var $btn = $('#answer-btn-' + id);
        var $options = $('#question' + id + ' .options');
        var $btnText = $btn.find('.btn-text');
        
        // Toggle check/tick and cross icons visibility
        $options.toggleClass('show-answer');
        
        // Toggle button class and text
        if ($btn.hasClass('showing')) {
            $btn.removeClass('showing');
            $btnText.text('Show Answer');
        } else {
            $btn.addClass('showing');
            $btnText.text('Hide Answer');
        }
   }
</script>
