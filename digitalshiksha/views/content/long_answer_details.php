<style>
    /* Modern Long Answer Details Page - Optimized */
    .secPad {
        padding: 90px 0 40px 0;
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        min-height: 100vh;
    }
    
    .long-answer-wrapper {
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
    
    
    .accordion-wrapper {
        background: #fff;
        border-radius: 16px;
        padding: 20px;
        box-shadow: 0 6px 25px rgba(0,0,0,0.08);
        border: 1px solid rgba(241, 185, 0, 0.2);
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
    
    .panel-body {
        padding: 20px !important;
        background: #fff;
        border-radius: 0 0 10px 10px;
        font-size: 15px;
        line-height: 1.8;
        color: #4a5568;
        border-top: 2px solid rgba(241, 185, 0, 0.2);
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }
    
    @media (max-width: 768px) {
        .secPad {
            padding: 110px 0 30px 0;
        }
        
        .long-answer-wrapper {
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
        
        .panel-body {
            padding: 15px !important;
            font-size: 13px;
        }
    }
</style>

<section class="secPad">
    <div class="container">
        <div class="long-answer-wrapper">
            <!-- Page Header -->
            <div class="page-header-card">
                <div>
                    <h2><i class="fa fa-file-text-o" style="margin-right: 8px;"></i> Long Answer Question Details</h2>
                    <p style="margin: 8px 0 0 0; font-size: 14px; opacity: 0.95;"><i class="fa fa-list" style="margin-right: 6px;"></i> Topic List</p>
                </div>
                <a href="javascript:history.go(-1)" class="back-link">
                    <i class="fa fa-angle-left"></i> <span>Go Back</span>
                </a>
            </div>
            
            <!-- Accordion -->
            <div class="accordion-wrapper">
                <div class="panel-group mb-1" id="accordion">
                    <?php $i=1; foreach ($syllabus_questions as $allQuestions) { ?>
                        <div class="panel panel-default">
                            <div class="panel-heading qusAnawer">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#question<?= $allQuestions->id ?>">
                                        <span style="font-weight: 600; margin-right: 6px;"><?=$i;?>.</span>
                                        <?= htmlspecialchars($allQuestions->question) ?>
                                    </a>
                                </h4>
                            </div>
                            <div id="question<?= $allQuestions->id ?>" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <?= $allQuestions->url ?>
                                </div>
                            </div>
                        </div>
                    <?php $i++;} ?>
                </div>
            </div>
        </div>
    </div>
</section>
