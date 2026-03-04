  <link href="<?php echo base_url('assets/css/home_p.css') ?>" rel="stylesheet" media="screen">
  <style>
    /* Enhanced Card Hover Effects */
    .quiz-card:hover, .blog-card:hover, .material-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.15) !important;
    }
    
    .quiz-card, .blog-card, .material-card {
        cursor: pointer;
    }
    
    .quiz-card-header a:hover, .blog-card-body a:hover {
        color: #F1B900 !important;
    }
    
    /* Smooth transitions for buttons */
    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }
    
    /* Section spacing improvements */
    section.secPad {
        padding: 60px 0;
    }
    
    /* Top Students Grid Styles */
    #top-students-grid .row {
        display: flex;
        flex-wrap: wrap;
    }
    
    #top-students-grid .row > [class*="col-"] {
        display: flex;
        flex-direction: column;
    }
    
    #top-students-grid .student-achiever-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        display: flex;
        flex-direction: column;
        height: 100%;
    }
    
    #top-students-grid .student-achiever-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 50px rgba(0,0,0,0.4) !important;
    }
    
    #top-students-grid .student-exam-details {
        margin-top: auto;
    }
    
    /* Mobile: Hide achievers 4-6 by default */
    @media (max-width: 768px) {
        #top-students-grid .achiever-item.hidden-mobile {
            display: none !important;
        }
        
        #top-students-grid .view-all-btn-wrapper {
            text-align: center;
            margin-top: 20px;
        }
        
        #top-students-grid .view-all-btn {
            background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%);
            color: #000;
            padding: 12px 40px;
            border-radius: 30px;
            font-size: 16px;
            font-weight: 700;
            border: none;
            cursor: pointer;
            box-shadow: 0 6px 20px rgba(241, 185, 0, 0.4);
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        #top-students-grid .view-all-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(241, 185, 0, 0.6);
        }
        
        #top-students-grid .view-all-btn.hidden {
            display: none;
        }
    }
    
    /* Desktop: Show all 6 achievers */
    @media (min-width: 769px) {
        #top-students-grid .achiever-item {
            display: flex !important;
        }
        
        #top-students-grid .view-all-btn-wrapper {
            display: none;
        }
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        #top-students-grid {
            padding: 50px 0 !important;
        }
        
        #top-students-grid .section-title h2 {
            font-size: 36px !important;
        }
        
        #top-students-grid .student-achiever-card {
            padding: 25px 20px !important;
        }
        
        #top-students-grid .student-photo-wrapper img {
            width: 120px !important;
            height: 120px !important;
        }
        
        #top-students-grid .student-name-wrapper h3 {
            font-size: 18px !important;
        }
        
        #top-students-grid .student-percentage div {
            font-size: 26px !important;
            padding: 10px 25px !important;
        }
        
        .quiz-card, .blog-card, .material-card {
            margin-bottom: 30px;
        }
        
        .section-title .title {
            font-size: 32px !important;
        }
    }
    
    @media (max-width: 480px) {
        #top-students-grid .student-photo-wrapper img {
            width: 100px !important;
            height: 100px !important;
        }
        
        #top-students-grid .student-percentage div {
            font-size: 24px !important;
        }
    }
    
    /* Notice board improvements */
    #notice .box {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        padding: 30px;
    }
    
    #notice table {
        border-radius: 8px;
        overflow: hidden;
    }
    
    #notice th {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
    }
    
    /* About section improvements */
    .aboutHome {
        background: #fff !important;
    }
    
    .aboutHome .box {
        background: #f8f9fa;
        border-radius: 12px;
        padding: 40px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }
    
    /* Breaking News Section - Between Header and Slider - Match Slider Overlay */
    #breaking-news-section {
        background-color: #776a6a;
        background-image: url(<?= base_url('assets/images/p25.jpg') ?>);
        background-attachment: fixed;
        background-size: cover;
        background-position: 50% 0;
        background-repeat: no-repeat;
        color: #F1B900;
        padding: 12px 0;
        margin-top: 80px;
        position: relative;
        z-index: 1040;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        border-bottom: 2px solid #F1B900;
    }
    
    #breaking-news-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(44, 62, 80, 0.65) 0%, rgba(52, 73, 94, 0.6) 50%, rgba(241, 185, 0, 0.25) 100%);
        z-index: 0;
    }
    
    #breaking-news-section .breaking-news-container {
        position: relative;
        z-index: 1;
    }
    
    #breaking-news-section .breaking-news-label {
        background: #F1B900 !important;
        color: #000 !important;
    }
    
    #breaking-news-section .breaking-news-marquee {
        color: #ffffff !important;
    }
    
    /* Show carousel indicators (dots) properly */
    #main-slider .carousel-indicators {
        display: block !important;
        visibility: visible !important;
        opacity: 1 !important;
        bottom: 30px !important;
        z-index: 15 !important;
    }
    
    #main-slider .carousel-indicators li {
        display: inline-block !important;
        width: 12px !important;
        height: 12px !important;
        margin: 0 5px !important;
        background-color: rgba(255, 255, 255, 0.5) !important;
        border: 2px solid rgba(255, 255, 255, 0.8) !important;
        border-radius: 50% !important;
        cursor: pointer !important;
        transition: all 0.3s ease !important;
    }
    
    #main-slider .carousel-indicators li.active {
        background-color: #F1B900 !important;
        border-color: #F1B900 !important;
        width: 14px !important;
        height: 14px !important;
        box-shadow: 0 0 10px rgba(241, 185, 0, 0.6) !important;
    }
    
    #main-slider .carousel-indicators li:hover {
        background-color: rgba(241, 185, 0, 0.7) !important;
        border-color: #F1B900 !important;
        transform: scale(1.2) !important;
    }
    
    /* Adjust button position when breaking news is showing - move higher */
    #breaking-news-section ~ #main-slider .newBanner {
        bottom: 180px !important;
    }
    
    /* Adjust button position even without breaking news - move higher */
    #main-slider .newBanner {
        bottom: 160px !important;
    }
    
    /* Register/Login Buttons - Match Achievement Colors */
    #main-slider .newBanner .btn-home-slider:not(.secondary) {
        background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%) !important;
        color: #000 !important;
        border: 2px solid #F1B900 !important;
        box-shadow: 0 10px 30px rgba(241, 185, 0, 0.5), 0 0 0 0 rgba(241, 185, 0, 0.7) !important;
    }
    
    #main-slider .newBanner .btn-home-slider:not(.secondary):hover {
        background: linear-gradient(135deg, #ff8c00 0%, #F1B900 100%) !important;
        box-shadow: 0 15px 40px rgba(241, 185, 0, 0.6), 0 0 0 4px rgba(241, 185, 0, 0.3) !important;
        color: #000 !important;
    }
    
    #main-slider .newBanner .btn-home-slider.secondary {
        background: rgba(241, 185, 0, 0.2) !important;
        border: 2px solid #F1B900 !important;
        color: #F1B900 !important;
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
    }
    
    #main-slider .newBanner .btn-home-slider.secondary:hover {
        background: rgba(241, 185, 0, 0.3) !important;
        border-color: #F1B900 !important;
        color: #F1B900 !important;
        box-shadow: 0 15px 40px rgba(241, 185, 0, 0.4), 0 0 0 4px rgba(241, 185, 0, 0.3) !important;
    }
    
    @media (max-width: 768px) {
        #main-slider .carousel-indicators {
            bottom: 20px !important;
        }
        
        #breaking-news-section ~ #main-slider .newBanner {
            bottom: 120px !important;
        }
        
        #main-slider .newBanner {
            bottom: 100px !important;
        }
    }
    
    #breaking-news-section .breaking-news-container {
        display: flex;
        align-items: center;
        gap: 15px;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 15px;
    }
    
    #breaking-news-section .breaking-news-label {
        background: var(--theme-accent);
        color: var(--theme-primary);
        padding: 6px 15px;
        font-weight: 700;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 1px;
        white-space: nowrap;
        border-radius: 4px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    #breaking-news-section .breaking-news-label i {
        font-size: 14px;
        animation: pulse 2s infinite;
    }
    
    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.5; }
    }
    
    #breaking-news-section .breaking-news-content {
        flex: 1;
        overflow: hidden;
    }
    
    #breaking-news-section .breaking-news-marquee {
        font-size: 14px;
        font-weight: 500;
        color: #ffffff;
        line-height: 1.5;
    }
    
    #breaking-news-section .breaking-news-marquee a {
        color: #ffffff;
        text-decoration: none;
        transition: color 0.3s ease;
    }
    
    #breaking-news-section .breaking-news-marquee a:hover {
        color: var(--theme-accent);
        text-decoration: underline;
    }
    
    @media (max-width: 768px) {
        #breaking-news-section {
            margin-top: 75px;
            padding: 10px 0;
        }
        
        #breaking-news-section .breaking-news-container {
            flex-direction: column;
            gap: 0px;
            align-items: flex-start;
        }
        
        #breaking-news-section .breaking-news-label {
            font-size: 11px;
            padding: 5px 12px;
        }
        
        #breaking-news-section .breaking-news-marquee {
            font-size: 12px;
        }
    }
  </style>

<!-- Breaking News Section - Between Header and Slider -->
<?php if (isset($News->notice_title) && !empty($News->notice_title)) : ?>
<section id="breaking-news-section">
    <div class="breaking-news-container">
        <div class="breaking-news-label">
            <i class="fa fa-bullhorn"></i>
            <span>Breaking News</span>
        </div>
        <div class="breaking-news-content">
            <marquee class="breaking-news-marquee" behavior="scroll" direction="left" scrollamount="3" onmouseover="this.stop()" onmouseout="this.start()">
                <?= htmlspecialchars($News->notice_title, ENT_QUOTES, 'UTF-8'); ?>
            </marquee>
        </div>
    </div>
</section>
<?php endif; ?>

<section id="main-slider" class="carousel">
    <div class="carousel-inner">
        <?php 
        $i = 0;
        $sliders = $this->db->where('content_type', 'slider_text')->get('content')->result();
        
        // Add text sliders first
        foreach ($sliders as $slider) {
            $i++; ?>
            <div class="item <?= ($i == 1) ? 'active' : ''; ?>" style="background-image: inherit;">
                <div class="container">
                    <div class="carousel-content">
                        <h1><?= strip_tags($slider->content_heading); ?></h1>
                        <p class="lead"><?= strip_tags($slider->content_data); ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <?php if (!$this->session->userdata('log')) : ?>
        <div class="text-center newBanner">
            <?php if (isset($student_can_register) && $student_can_register) : ?>
                <a href="#register" class="btn btn-primary btn-home-slider btn-lg register_open">
                    <i class="fa fa-user-plus"></i> Register
                </a>
            <?php endif; ?>
            <a href="#login" class="btn btn-primary btn-home-slider btn-lg login_open secondary">
                <i class="fa fa-sign-in"></i> Login
            </a>
        </div>
    <?php endif; ?>
    <?php 
    $slider_count = count($sliders);
    if ($slider_count > 1) : ?>
        <a class="prev" href="#main-slider" data-slide="prev"><i class="fa fa-angle-left"></i></a>
        <a class="next" href="#main-slider" data-slide="next"><i class="fa fa-angle-right"></i></a>
        <ul class="carousel-indicators">
            <?php for ($j = 0; $j < $slider_count; $j++) : ?>
                <li data-target="#main-slider" data-slide-to="<?= $j ?>" class="<?= ($j == 0) ? 'active' : ''; ?>"></li>
            <?php endfor; ?>
        </ul>
    <?php endif; ?>
</section>

<script>
$(document).ready(function() {
    // Initialize slider indicators
    if ($('#main-slider').length && $('#main-slider .item').length > 1) {
        $(document).on('click', '.carousel-indicators li', function(e) {
            e.preventDefault();
            var slideTo = $(this).data('slide-to');
            if (slideTo !== undefined) {
                $('#main-slider').carousel(parseInt(slideTo));
            }
        });
        
        $('#main-slider').on('slid.bs.carousel', function(e) {
            var currentIndex = $(e.relatedTarget).index();
            $('.carousel-indicators li').removeClass('active').eq(currentIndex).addClass('active');
        });
    }
});
</script>

<section id="about-us" class="aboutHome secPad bgblue">
    <div class="container">
        <div class="box myBox " id="about">
            <?php $temp = $this->db->get_where('content', array('content_type' => 'about_us'))->row(); 
                  $content_text = strip_tags($temp->content_data);
                  $content_length = strlen($content_text);
                  $excerpt_length = 500; // Show first 500 characters
                  $content_excerpt = $content_length > $excerpt_length ? substr($content_text, 0, $excerpt_length) . '...' : $content_text;
            ?>
            <div class="col-md-12">
                <h1 class="text-uppercase text-center h1"><strong><?= $temp->content_heading; ?></strong></h1>
                <div class="line_br mrauto"></div>
            </div>
            <div class="row about-content-wrapper">
                <div class="col-md-6 col-sm-12 about-image-col">
                    <div class="about-image-container">
                        <img src="<?php echo base_url('assets/images/about.jpg') ?>" class="img-responsive about-image">
                    </div>
                </div>

                <div class="col-md-6 col-sm-12 about-text-col">
                    <div class="about-text-container">
                        <i class="fa fa-apple fa fa-md fa fa-color1"></i>
                        <p class="about-text-content"><?= $content_excerpt; ?></p>
                        <?php if ($content_length > $excerpt_length) : ?>
                            <div class="about-read-more">
                                <a href="<?= base_url('about-us') ?>" class="btn btn-read-more">
                                    Read More <i class="fa fa-arrow-right"></i>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="achivement-area bg-with-black">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center">
                    <h2 class="title">Our <span class="inner">Achievement</span></h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="single-achivement">
                    <div class="icon">
                        <img src="<?= base_url('assets/images/student.png') ?>" alt="">                      
                    </div>
                    <div class="content">
                        <h2 class="counter counter-up" data-counterup-time="1500" data-counterup-delay="30"><?= $total_student ?></h2>
                        <p class="name">Students</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="single-achivement">
                    <div class="icon icon-exam">
                        <i class="fa fa-file-text-o"></i>
                    </div>
                    <div class="content">
                        <h2 class="counter counter-up" data-counterup-time="1500" data-counterup-delay="30"><?= $total_exam ?></h2>
                        <p class="name">Exams</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="single-achivement">
                    <div class="icon">
                        <img src="<?= base_url('assets/images/blog.png') ?>" alt="">                         
                    </div>
                    <div class="content">
                        <h2 class="counter counter-up" data-counterup-time="1500" data-counterup-delay="30"><?= $total_blogs ?></h2>
                        <p class="name">Blogs</p>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</section>

<!-- Top Passed Students Grid Section -->
<?php 
if (isset($top_passed_students) && !empty($top_passed_students)) : 
    $this->load->helper('theme');
    $theme_colors = get_theme_colors();
?>
<section id="top-students-grid" class="secPad bg-with-black" style="background: rgba(0, 0, 0, 0) url(<?= base_url('assets/images/achivement-bg.jpg') ?>) no-repeat fixed center center / cover; padding: 80px 0; position: relative; overflow: hidden; border-top: 1px solid #F1B900;">
    <div style="background: #000 none repeat scroll 0 0; content: ''; height: 100%; left: 0; opacity: 0.3; position: absolute; top: 0; width: 100%; z-index: 0;"></div>
    <div class="container" style="position: relative; z-index: 1;">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center" style="margin-bottom: 60px;">
                    <h2 class="title" style="color: #ffffff; font-size: 48px; font-weight: 800; margin-bottom: 20px; text-transform: uppercase; letter-spacing: 2px;">
                        Top <span style="color: #F1B900;">Achievers</span>
                    </h2>
                    <div style="width: 150px; height: 4px; background: #F1B900; margin: 20px auto;"></div>
                    <p style="color: #ffffff; font-size: 18px; margin-top: 15px; opacity: 0.9;">Celebrating our top performing students</p>
                </div>
            </div>
        </div>
        <div class="row" style="margin: 0 -15px; display: flex; flex-wrap: wrap;">
            <?php 
            $default_avatar_svg = '<svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" viewBox="0 0 150 150"><circle cx="75" cy="75" r="75" fill="#e0e0e0"/><circle cx="75" cy="60" r="25" fill="#999"/><path d="M40 120 Q40 95 75 95 Q110 95 110 120" fill="#999"/></svg>';
            $default_avatar = base_url('assets/images/achiever.jpeg');
            
            foreach ($top_passed_students as $index => $student) : 
                $result_date = isset($student->exam_taken_date) ? date("F j, Y", strtotime($student->exam_taken_date)) : (isset($student->result_date) ? date("F j, Y", strtotime($student->result_date)) : date("F j, Y"));
                $user_photo = !empty($student->user_photo) ? base_url('user_photos/' . $student->user_photo) : $default_avatar;
                // Add class for mobile hiding (hide items 4, 5, 6 on mobile)
                $mobile_class = ($index >= 3) ? 'hidden-mobile' : '';
            ?>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 achiever-item <?= $mobile_class ?>" style="padding: 15px; margin-bottom: 30px; display: flex; flex-direction: column;">
                    <div class="student-achiever-card" style="background: #ffffff; border-radius: 20px; padding: 30px 25px; text-align: center; box-shadow: 0 6px 25px rgba(0,0,0,0.2); border: 1px solid rgba(241, 185, 0, 0.3); transition: all 0.3s ease; position: relative; overflow: hidden; height: 100%; display: flex; flex-direction: column;">
                        <!-- Gold ribbon effect -->
                        <div style="position: absolute; top: -10px; right: -40px; width: 150px; height: 40px; background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%); transform: rotate(45deg); box-shadow: 0 2px 10px rgba(241, 185, 0, 0.5);"></div>
                        
                        <!-- Student Photo -->
                        <div class="student-photo-wrapper" style="margin-bottom: 20px; position: relative; z-index: 1;">
                            <div style="display: inline-block; position: relative;">
                                <img src="<?= $user_photo ?>" 
                                     alt="<?= htmlspecialchars($student->user_name) ?>"
                                     onerror="this.src='<?= $default_avatar ?>'"
                                     style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover; border: 6px solid #F1B900; box-shadow: 0 8px 30px rgba(241, 185, 0, 0.5); background: #f0f0f0; display: block;">
                            </div>
                        </div>
                        
                        <!-- Student Name -->
                        <div class="student-name-wrapper" style="margin-bottom: 15px; position: relative; z-index: 1;">
                            <div style="display: inline-block; background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%); padding: 8px 25px; border-radius: 25px; box-shadow: 0 4px 15px rgba(241, 185, 0, 0.4);">
                                <h3 style="color: #000; font-size: 20px; font-weight: 700; margin: 0; text-shadow: none;">
                                    <?= htmlspecialchars($student->user_name) ?>
                                </h3>
                            </div>
                        </div>
                        
                        <!-- Percentage Badge -->
                        <div class="student-percentage" style="margin-bottom: 20px; position: relative; z-index: 1;">
                            <div style="display: inline-block; background: #000; color: #F1B900; padding: 12px 30px; border-radius: 30px; font-size: 32px; font-weight: 800; box-shadow: 0 6px 20px rgba(0,0,0,0.3); border: 3px solid #F1B900;">
                                <i class="fa fa-trophy" style="margin-right: 8px; font-size: 28px;"></i>
                                <?= number_format($student->result_percent, 2) ?>%
                            </div>
                        </div>
                        
                        <!-- Exam Info -->
                        <div class="student-exam-details" style="position: relative; z-index: 1; margin-top: auto;">
                            <div style="background: #f8f9fa; border-radius: 12px; padding: 15px; margin-bottom: 10px;">
                                <div style="color: #000; font-size: 15px; font-weight: 600; margin-bottom: 8px;">
                                    <i class="fa fa-book" style="color: #F1B900; margin-right: 8px;"></i>
                                    <?= htmlspecialchars($student->title_name) ?>
                                </div>
                                <div style="color: #666; font-size: 13px;">
                                    <i class="fa fa-calendar" style="color: #F1B900; margin-right: 6px;"></i>
                                    <?= $result_date ?>
                                </div>
                            </div>
                            <div style="display: inline-block; background: #e8f5e9; color: #2e7d32; padding: 6px 15px; border-radius: 15px; font-size: 12px; font-weight: 600;">
                                <i class="fa fa-check-circle" style="margin-right: 5px;"></i>
                                Passed (Required: <?= $student->pass_mark ?>%)
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
        <!-- View All Button (Mobile Only) -->
        <?php if (count($top_passed_students) > 3) : ?>
        <div class="view-all-btn-wrapper">
            <button class="view-all-btn" onclick="toggleAchievers()" data-expanded="false">
                <i class="fa fa-chevron-down" id="view-all-icon"></i> View All Achievers
            </button>
        </div>
        <?php endif; ?>
    </div>
</section>

<script>
function toggleAchievers() {
    var allItems = document.querySelectorAll('#top-students-grid .achiever-item');
    var viewAllBtn = document.querySelector('#top-students-grid .view-all-btn');
    var viewAllIcon = document.getElementById('view-all-icon');
    var isExpanded = viewAllBtn && viewAllBtn.getAttribute('data-expanded') === 'true';
    
    allItems.forEach(function(item, index) {
        if (index >= 3) {
            if (isExpanded) {
                // Hide achievers 4-6
                item.style.display = 'none';
                item.classList.add('hidden-mobile');
            } else {
                // Show achievers 4-6
                item.style.display = 'flex';
                item.classList.remove('hidden-mobile');
            }
        }
    });
    
    // Update button text and icon
    if (viewAllBtn) {
        if (isExpanded) {
            viewAllBtn.innerHTML = '<i class="fa fa-chevron-down" id="view-all-icon"></i> View All Achievers';
            viewAllBtn.setAttribute('data-expanded', 'false');
            // Scroll to top of achievers section
            setTimeout(function() {
                document.getElementById('top-students-grid').scrollIntoView({ behavior: 'smooth', block: 'start' });
            }, 300);
        } else {
            viewAllBtn.innerHTML = '<i class="fa fa-chevron-up" id="view-all-icon"></i> Show Less';
            viewAllBtn.setAttribute('data-expanded', 'true');
        }
    }
}
</script>
<?php endif; ?>

<!-- Top Quizzes Section -->
<section id="top-quizzes" class="secPad" style="background-color: #f8f9fa; padding: 80px 0;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center" style="margin-bottom: 50px;">
                    <h2 class="title" style="color: var(--theme-text); font-size: 42px; font-weight: 700; margin-bottom: 15px;">
                        Top <span style="color: var(--theme-accent-alt);">Quizzes</span>
                    </h2>
                    <div class="line_br mrauto" style="width: 100px; height: 4px; background: var(--theme-accent-alt); margin: 20px auto;"></div>
                    <p style="color: var(--theme-text-light); font-size: 16px; margin-top: 15px;">Practice with our most popular mock tests</p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php 
            if (isset($top_quizzes) && !empty($top_quizzes)) : 
                if (!function_exists('get_theme_colors')) {
                    $this->load->helper('theme');
                }
                $theme_colors = get_theme_colors();
                // Use theme colors for card gradients
                $color_themes = [
                    ['start' => $theme_colors['accent_alt'], 'end' => '#ff8c00'], // Accent to Orange
                    ['start' => '#667eea', 'end' => '#764ba2'], // Purple to Violet
                    ['start' => '#f093fb', 'end' => '#f5576c'], // Pink to Red
                    ['start' => '#4facfe', 'end' => '#00f2fe'], // Blue to Cyan
                    ['start' => '#43e97b', 'end' => '#38f9d7'], // Green to Teal
                    ['start' => $theme_colors['accent'], 'end' => '#fee140'], // Accent to Yellow
                    ['start' => '#30cfd0', 'end' => '#330867'], // Cyan to Dark Purple
                    ['start' => '#a8edea', 'end' => '#fed6e3'], // Light Teal to Pink
                    ['start' => '#ff9a9e', 'end' => '#fecfef'], // Coral to Light Pink
                ];
                $theme_index = 0;
                foreach ($top_quizzes as $quiz) : 
                    $current_theme = $color_themes[$theme_index % count($color_themes)];
                    $theme_index++;
                    $show_quiz_image = false;
                    $quiz_image_path = '';
                    if ($this->session->userdata('log') && !empty($quiz->feature_img_name)) {
                        if (file_exists('uploads/exam-images/' . $quiz->feature_img_name)) {
                            $show_quiz_image = true;
                            $quiz_image_path = base_url('uploads/exam-images/' . $quiz->feature_img_name);
                        }
                    }
            ?>
                <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                    <div class="quiz-card" style="background: var(--theme-primary); border-radius: 16px; box-shadow: 0 6px 25px rgba(0,0,0,0.08); overflow: hidden; transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); height: 420px; display: flex; flex-direction: column; border: 1px solid rgba(241, 185, 0, 0.1);">
                        <div class="quiz-card-header" style="<?= $show_quiz_image ? "background: linear-gradient(rgba(0,0,0,0.35), rgba(0,0,0,0.55)), url('" . $quiz_image_path . "'); background-size: cover; background-position: center;" : "background: linear-gradient(135deg, {$current_theme['start']} 0%, {$current_theme['end']} 100%);" ?> padding: 25px; color: #fff; position: relative; overflow: hidden;">
                            <div style="position: absolute; top: -50%; right: -50%; width: 200%; height: 200%; background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);"></div>
                            <h4 style="margin: 0 0 15px 0; font-size: 20px; font-weight: 700; line-height: 1.4; display: flex; align-items: center; gap: 12px; position: relative; z-index: 1;">
                                <i class="fa fa-file-text-o" style="font-size: 24px; opacity: 0.95;"></i>
                                <?= htmlspecialchars($quiz->title_name) ?>
                            </h4>
                            <div style="display: flex; flex-direction: column; gap: 6px; position: relative; z-index: 1;">
                                <?php if (!empty($quiz->category_name)) : ?>
                                    <div style="display: flex; align-items: center; gap: 8px;">
                                        <i class="fa fa-folder" style="font-size: 11px; opacity: 0.9;"></i>
                                        <span style="display: inline-block; padding: 4px 10px; background: rgba(0,0,0,0.18); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.28); border-radius: 12px; font-size: 10px; font-weight: 600; letter-spacing: 0.3px; text-transform: uppercase; color: #fff;">
                                            <?= htmlspecialchars($quiz->category_name) ?>
                                        </span>
                                    </div>
                                <?php endif; ?>
                                <?php if (isset($quiz->question_count) && $quiz->question_count > 0) : ?>
                                    <div style="display: flex; align-items: center; gap: 8px;">
                                        <i class="fa fa-list-ol" style="font-size: 11px; opacity: 0.9;"></i>
                                        <span style="display: inline-block; padding: 4px 10px; background: rgba(0,0,0,0.18); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.28); border-radius: 12px; font-size: 10px; font-weight: 600; letter-spacing: 0.3px; color: #fff;">
                                            <?= $quiz->question_count ?> Questions
                                        </span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="quiz-card-body" style="padding: 25px; flex-grow: 1; display: flex; flex-direction: column; background: var(--theme-primary); overflow: hidden;">
                            <?php if (!empty($quiz->syllabus)) : ?>
                                <p style="color: #e5e7eb; font-size: 14px; margin-bottom: 20px; line-height: 1.7; flex-grow: 1; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical;">
                                    <?= substr(strip_tags($quiz->syllabus), 0, 120) ?><?= strlen($quiz->syllabus) > 120 ? '...' : '' ?>
                                </p>
                            <?php endif; ?>
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: auto; padding-top: 15px; border-top: 1px solid rgba(255,255,255,0.1);">
                                <?php if (!empty($quiz->time_duration)) : ?>
                                    <span style="color: #b0b8c4; font-size: 13px; font-weight: 500; display: flex; align-items: center; gap: 6px;">
                                        <i class="fa fa-clock-o" style="color: <?= $current_theme['start'] ?>;"></i> <?= $quiz->time_duration ?>
                                    </span>
                                <?php endif; ?>
                                <?php if ($this->session->userdata('log')) : ?>
                                    <?php 
                                        // Use slug if available, otherwise fallback to title_id
                                        $quiz_url = !empty($quiz->slug) ? $quiz->slug : $quiz->title_id;
                                    ?>
                                    <a href="<?= base_url('mock-test-details/' . $quiz_url) ?>" 
                                       class="btn btn-primary" 
                                       style="background: linear-gradient(135deg, <?= $current_theme['start'] ?> 0%, <?= $current_theme['end'] ?> 100%); border: none; border-radius: 25px; padding: 10px 24px; font-size: 14px; font-weight: 600; color: #fff; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3); transition: all 0.3s ease;">
                                        Start
                                    </a>
                                <?php else : ?>
                                    <a href="#login" class="btn btn-primary login_open" 
                                       style="background: linear-gradient(135deg, <?= $current_theme['start'] ?> 0%, <?= $current_theme['end'] ?> 100%); border: none; border-radius: 25px; padding: 10px 24px; font-size: 14px; font-weight: 600; color: #fff; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3); transition: all 0.3s ease;">
                                        Start
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php 
                endforeach;
            else : ?>
                <div class="col-md-12">
                    <p class="text-center" style="color: #999; font-size: 16px;">No quizzes available at the moment.</p>
                </div>
            <?php endif; ?>
        </div>
        <div class="row home-section-cta">
            <div class="col-md-12 text-center">
                <a href="<?= base_url('mock-test') ?>" class="btn btn-lg" 
                   style="background: linear-gradient(135deg, var(--theme-accent-alt) 0%, #ff8c00 100%); color: #fff; border: none; border-radius: 30px; padding: 12px 40px; font-size: 16px; font-weight: 600; transition: all 0.3s ease; box-shadow: 0 6px 25px rgba(241, 185, 0, 0.35);">
                    View All Quizzes <i class="fa fa-arrow-right" style="margin-left: 8px;"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Top Blogs Section -->
<section id="top-blogs" class="secPad" style="background-color: #fff; padding: 80px 0;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center" style="margin-bottom: 50px;">
                    <h2 class="title" style="color: #333; font-size: 42px; font-weight: 700; margin-bottom: 15px;">
                        Latest <span style="color: #F1B900;">Blogs</span>
                    </h2>
                    <div class="line_br mrauto" style="width: 100px; height: 4px; background: #F1B900; margin: 20px auto;"></div>
                    <p style="color: #666; font-size: 16px; margin-top: 15px;">Stay updated with our latest educational insights</p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php if (isset($top_blogs) && !empty($top_blogs)) : 
                $count = 0;
                foreach ($top_blogs as $blog) : 
                    if ($count >= 3) break;
                    $count++;
                    $blog_date = isset($blog->blog_created) ? date("F j, Y", strtotime($blog->blog_created)) : date("F j, Y");
                    $blog_excerpt = isset($blog->blog_body) ? substr(strip_tags($blog->blog_body), 0, 150) : '';
                    $blog_slug = isset($blog->blog_slug) ? $blog->blog_slug : $blog->blog_id;
                    // Get blog image - check blog_attachment when blog_media_type is 'image'
                    $blog_image = (isset($blog->blog_attachment) && isset($blog->blog_media_type) && $blog->blog_media_type == 'image') ? $blog->blog_attachment : '';
            ?>
                <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                    <div class="blog-card" style="background: #fff; border-radius: 16px; box-shadow: 0 6px 25px rgba(0,0,0,0.08); overflow: hidden; transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); height: 100%; display: flex; flex-direction: column; border: 1px solid rgba(241, 185, 0, 0.1);">
                        <?php if (!empty($blog_image)) : ?>
                            <div class="blog-image" style="height: 220px; overflow: hidden; background: #f0f0f0; position: relative;">
                                <img src="<?= base_url('uploads/blog_files/' . $blog_image) ?>" 
                                     alt="<?= htmlspecialchars($blog->blog_title) ?>"
                                     style="width: 100%; height: 100%; object-fit: cover; display: block; transition: transform 0.4s ease;">
                            </div>
                        <?php else : ?>
                            <div class="blog-image" style="height: 220px; background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%); display: flex; align-items: center; justify-content: center; position: relative;">
                                <i class="fa fa-file-text-o" style="font-size: 60px; color: rgba(255,255,255,0.7);"></i>
                            </div>
                        <?php endif; ?>
                        <div class="blog-card-body" style="padding: 25px; flex-grow: 1; display: flex; flex-direction: column;">
                            <h4 style="margin: 0 0 12px 0; font-size: 20px; font-weight: 700; line-height: 1.4; color: #2c3e50;">
                                <a href="<?= base_url('digital-shiksha-search-engine/' . $blog_slug) ?>" 
                                   style="color: #2c3e50; text-decoration: none; transition: color 0.3s ease;">
                                    <?= htmlspecialchars($blog->blog_title) ?>
                                </a>
                            </h4>
                            <p style="color: #6b7280; font-size: 13px; margin-bottom: 15px; display: flex; align-items: center; gap: 12px;">
                                <span style="display: flex; align-items: center; gap: 6px;">
                                    <i class="fa fa-calendar" style="color: #F1B900;"></i> <?= $blog_date ?>
                                </span>
                                <?php if (isset($blog->user_name)) : ?>
                                    <span style="display: flex; align-items: center; gap: 6px;">
                                        <i class="fa fa-user" style="color: #F1B900;"></i> <?= htmlspecialchars($blog->user_name) ?>
                                    </span>
                                <?php endif; ?>
                            </p>
                            <?php if (!empty($blog_excerpt)) : ?>
                                <p style="color: #4a5568; font-size: 14px; line-height: 1.7; margin-bottom: 20px; flex-grow: 1;">
                                    <?= $blog_excerpt ?>...
                                </p>
                            <?php endif; ?>
                            <div style="margin-top: auto; padding-top: 15px; border-top: 1px solid #e5e7eb;">
                                <a href="<?= base_url('digital-shiksha-search-engine/' . $blog_slug) ?>" 
                                   class="btn btn-sm" 
                                   style="background: transparent; color: #F1B900; border: 2px solid #F1B900; border-radius: 25px; padding: 10px 24px; font-size: 14px; font-weight: 600; transition: all 0.3s ease; display: inline-flex; align-items: center; gap: 8px;">
                                    Read More <i class="fa fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php 
                endforeach;
            else : ?>
                <div class="col-md-12">
                    <p class="text-center" style="color: #999; font-size: 16px;">No blogs available at the moment.</p>
                </div>
            <?php endif; ?>
        </div>
        <div class="row home-section-cta">
            <div class="col-md-12 text-center">
                <a href="<?= base_url('digital-shiksha-search-engine') ?>" class="btn btn-lg" 
                   style="background: #F1B900; color: #fff; border: none; border-radius: 30px; padding: 12px 40px; font-size: 16px; font-weight: 600; transition: all 0.3s ease;">
                    View All Blogs <i class="fa fa-arrow-right" style="margin-left: 8px;"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Important Study Materials Section -->
<section id="study-materials" class="secPad" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 80px 0; display: none !important;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center" style="margin-bottom: 50px;">
                    <h2 class="title" style="color: #fff; font-size: 42px; font-weight: 700; margin-bottom: 15px;">
                        Important <span style="color: #F1B900;">Study Materials</span>
                    </h2>
                    <div class="line_br mrauto" style="width: 100px; height: 4px; background: #F1B900; margin: 20px auto;"></div>
                    <p style="color: rgba(255,255,255,0.9); font-size: 16px; margin-top: 15px;">Access quality study resources to excel in your exams</p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php if (isset($important_study_materials) && !empty($important_study_materials)) : 
                foreach ($important_study_materials as $material) : 
                    $material_type = isset($material->name) ? $material->name : 'PDF';
                    $material_id = $material->id;
            ?>
                <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                    <div class="material-card" style="background: #fff; border-radius: 16px; box-shadow: 0 6px 25px rgba(0,0,0,0.15); overflow: hidden; transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); height: 100%; display: flex; flex-direction: column; border: 1px solid rgba(241, 185, 0, 0.2);">
                        <div class="material-icon" style="background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%); padding: 35px 30px; text-align: center; position: relative; overflow: hidden;">
                            <div style="position: absolute; top: -50%; right: -50%; width: 200%; height: 200%; background: radial-gradient(circle, rgba(255, 255, 255, 0.2) 0%, transparent 70%);"></div>
                            <?php if ($material_type == 'VIDEO') : ?>
                                <i class="fa fa-play-circle-o" style="font-size: 64px; color: #fff; position: relative; z-index: 1;"></i>
                            <?php elseif ($material_type == 'PDF') : ?>
                                <i class="fa fa-file-pdf-o" style="font-size: 64px; color: #fff; position: relative; z-index: 1;"></i>
                            <?php elseif ($material_type == 'MCQ') : ?>
                                <i class="fa fa-list-alt" style="font-size: 64px; color: #fff; position: relative; z-index: 1;"></i>
                            <?php else : ?>
                                <i class="fa fa-file-text-o" style="font-size: 64px; color: #fff; position: relative; z-index: 1;"></i>
                            <?php endif; ?>
                        </div>
                        <div class="material-card-body" style="padding: 25px; flex-grow: 1; display: flex; flex-direction: column;">
                            <h4 style="margin: 0 0 12px 0; font-size: 20px; font-weight: 700; line-height: 1.4; color: #2c3e50;">
                                <?= htmlspecialchars($material->name) ?>
                            </h4>
                            <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 15px;">
                                <span style="color: #6b7280; font-size: 13px; font-weight: 500; display: flex; align-items: center; gap: 6px;">
                                    <i class="fa fa-book" style="color: #F1B900;"></i> Study Material
                                </span>
                                <?php if (isset($material->exam_count) && $material->exam_count > 0) : ?>
                                    <span style="color: #6b7280; font-size: 13px; font-weight: 500; display: flex; align-items: center; gap: 6px;">
                                        <i class="fa fa-clipboard" style="color: #F1B900;"></i> <?= $material->exam_count ?> Exams
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div style="margin-top: auto; padding-top: 15px; border-top: 1px solid #e5e7eb;">
                                <?php if ($this->session->userdata('log')) : ?>
                                    <?php if ($material_type == 'LONG ANSWER') : ?>
                                        <a href="<?= base_url('study-material/long-answer-details/' . $material_id) ?>" 
                                           class="btn btn-primary" 
                                           style="background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%); border: none; border-radius: 25px; padding: 10px 24px; font-size: 14px; font-weight: 600; width: 100%; color: #fff; box-shadow: 0 4px 15px rgba(241, 185, 0, 0.3); transition: all 0.3s ease;">
                                            View Material
                                        </a>
                                    <?php elseif ($material_type == 'VIDEO') : ?>
                                        <a href="<?= base_url('study-material/video-details/' . $material_id) ?>" 
                                           class="btn btn-primary" 
                                           style="background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%); border: none; border-radius: 25px; padding: 10px 24px; font-size: 14px; font-weight: 600; width: 100%; color: #fff; box-shadow: 0 4px 15px rgba(241, 185, 0, 0.3); transition: all 0.3s ease;">
                                            Watch Video
                                        </a>
                                    <?php elseif ($material_type == 'PDF') : ?>
                                        <a href="<?= base_url('study-material/pdf-details/' . $material_id) ?>" 
                                           class="btn btn-primary" 
                                           style="background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%); border: none; border-radius: 25px; padding: 10px 24px; font-size: 14px; font-weight: 600; width: 100%; color: #fff; box-shadow: 0 4px 15px rgba(241, 185, 0, 0.3); transition: all 0.3s ease;">
                                            View PDF
                                        </a>
                                    <?php elseif ($material_type == 'MCQ') : ?>
                                        <a href="<?= base_url('study-material/mcq/' . $material_id) ?>" 
                                           class="btn btn-primary" 
                                           style="background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%); border: none; border-radius: 25px; padding: 10px 24px; font-size: 14px; font-weight: 600; width: 100%; color: #fff; box-shadow: 0 4px 15px rgba(241, 185, 0, 0.3); transition: all 0.3s ease;">
                                            Practice MCQ
                                        </a>
                                    <?php else : ?>
                                        <a href="<?= base_url('study-material') ?>" 
                                           class="btn btn-primary" 
                                           style="background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%); border: none; border-radius: 25px; padding: 10px 24px; font-size: 14px; font-weight: 600; width: 100%; color: #fff; box-shadow: 0 4px 15px rgba(241, 185, 0, 0.3); transition: all 0.3s ease;">
                                            View Material
                                        </a>
                                    <?php endif; ?>
                                <?php else : ?>
                                    <a href="#login" class="btn btn-primary login_open" 
                                       style="background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%); border: none; border-radius: 25px; padding: 10px 24px; font-size: 14px; font-weight: 600; width: 100%; color: #fff; box-shadow: 0 4px 15px rgba(241, 185, 0, 0.3); transition: all 0.3s ease;">
                                        Login to Access
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php 
                endforeach;
            else : ?>
                <div class="col-md-12">
                    <p class="text-center" style="color: rgba(255,255,255,0.9); font-size: 16px;">No study materials available at the moment.</p>
                </div>
            <?php endif; ?>
        </div>
        <div class="row mt-4">
            <div class="col-md-12 text-center">
                <a href="<?= base_url('study-material') ?>" class="btn btn-lg" 
                   style="background: #F1B900; color: #fff; border: none; border-radius: 30px; padding: 12px 40px; font-size: 16px; font-weight: 600; transition: all 0.3s ease;">
                    View All Study Materials <i class="fa fa-arrow-right" style="margin-left: 8px;"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Notices Section -->
<section id="notice" class="secPad" style="background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%); padding: 80px 0;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center" style="margin-bottom: 50px;">
                    <h2 class="title" style="color: #2c3e50; font-size: 42px; font-weight: 700; margin-bottom: 15px;">
                        Latest <span style="background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">Notices</span>
                    </h2>
                    <div class="line_br mrauto" style="width: 100px; height: 4px; background: linear-gradient(90deg, #F1B900 0%, #ff8c00 100%); margin: 20px auto; border-radius: 2px;"></div>
                    <p style="color: #6b7280; font-size: 16px; margin-top: 15px;">Stay updated with our latest announcements</p>
                </div>
            </div>
        </div>
        <?php if (isset($notices) && !empty($notices)) : 
            $notice_count = count($notices);
        ?>
            <div id="noticeCarousel" class="carousel notice-carousel-wrapper" data-ride="carousel" data-interval="5000">
                <!-- Carousel Indicators -->
                <?php if ($notice_count > 1) : ?>
                    <ol class="carousel-indicators notice-indicators">
                        <?php for ($j = 0; $j < $notice_count; $j++) : ?>
                            <li data-target="#noticeCarousel" data-slide-to="<?= $j ?>" class="<?= ($j == 0) ? 'active' : ''; ?>"></li>
                        <?php endfor; ?>
                    </ol>
                <?php endif; ?>
                
                <!-- Carousel Inner -->
                <div class="carousel-inner notice-carousel-inner" role="listbox">
                    <?php $i = 0;
                    foreach ($notices as $notice) : 
                        $i++;
                        $notice_start = isset($notice->notice_start) ? date("F j, Y", strtotime($notice->notice_start)) : '';
                        $notice_end = isset($notice->notice_end) ? date("F j, Y", strtotime($notice->notice_end)) : '';
                        $is_expired = isset($notice->notice_end) && strtotime($notice->notice_end) < strtotime(date('Y-m-d'));
                        $notice_link = isset($notice->notice_id) ? base_url('noticeboard/notice/' . $notice->notice_id) : '#';
                    ?>
                        <div class="item <?= ($i == 1) ? 'active' : ''; ?> notice-carousel-item">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="notice-card-new" style="background: #ffffff; border-radius: 20px; box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12); overflow: hidden; transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); height: 100%; display: flex; flex-direction: column; border: 2px solid #f0f0f0; position: relative; width: 100%; margin: 0 auto; max-width: 1200px;">
                                            <!-- Left Border Accent -->
                                            <div class="notice-accent-bar" style="position: absolute; left: 0; top: 0; bottom: 0; width: 5px; background: <?= $is_expired ? 'linear-gradient(180deg, #9ca3af 0%, #6b7280 100%)' : 'linear-gradient(180deg, #F1B900 0%, #ff8c00 100%)'; ?>; z-index: 1;"></div>
                                            
                                            <!-- Status Badge -->
                                            <div class="notice-status-badge" style="position: absolute; top: 20px; right: 20px; z-index: 25;">
                                                <?php if ($is_expired) : ?>
                                                    <span class="status-badge-expired" style="background: #6b7280; color: #ffffff; padding: 6px 14px; border-radius: 25px; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; box-shadow: 0 2px 8px rgba(107, 114, 128, 0.3); display: inline-block;">
                                                        <i class="fa fa-clock-o" style="margin-right: 4px;"></i> Expired
                                                    </span>
                                                <?php else : ?>
                                                    <span class="status-badge-active" style="background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%); color: #ffffff; padding: 6px 14px; border-radius: 25px; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; box-shadow: 0 2px 8px rgba(241, 185, 0, 0.3); display: inline-block;">
                                                        <i class="fa fa-check-circle" style="margin-right: 4px;"></i> Active
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                            
                                            <!-- Card Header with Icon -->
                                            <div class="notice-card-header-new" style="padding: 30px 30px 20px 35px; background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%); border-bottom: 1px solid #e5e7eb; position: relative;">
                                                <div style="display: flex; align-items: flex-start; gap: 15px;">
                                                    <div class="notice-icon-wrapper" style="width: 60px; height: 60px; background: <?= $is_expired ? 'linear-gradient(135deg, #9ca3af 0%, #6b7280 100%)' : 'linear-gradient(135deg, #F1B900 0%, #ff8c00 100%)'; ?>; border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; box-shadow: 0 4px 12px <?= $is_expired ? 'rgba(107, 114, 128, 0.25)' : 'rgba(241, 185, 0, 0.25)'; ?>;">
                                                        <i class="fa fa-bullhorn" style="font-size: 28px; color: #ffffff;"></i>
                                                    </div>
                                                    <div style="flex: 1; min-width: 0;">
                                                        <h4 style="color: #2c3e50; font-size: 22px; font-weight: 700; margin: 0 0 8px 0; line-height: 1.4; word-wrap: break-word;">
                                                            <?= htmlspecialchars($notice->notice_title) ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- Card Body -->
                                            <div class="notice-card-body-new" style="padding: 30px 35px; flex-grow: 1; display: flex; flex-direction: column;">
                                                <!-- Date Information -->
                                                <div style="margin-bottom: 25px; flex-grow: 1;">
                                                    <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 15px; padding: 15px; background: #f8f9fa; border-radius: 10px; border-left: 3px solid #F1B900;">
                                                        <div style="width: 45px; height: 45px; background: #F1B900; border-radius: 8px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                                            <i class="fa fa-calendar" style="color: #000; font-size: 18px;"></i>
                                                        </div>
                                                        <div style="flex: 1;">
                                                            <div style="color: #6b7280; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 4px;">Published Date</div>
                                                            <div style="color: #2c3e50; font-size: 15px; font-weight: 600;"><?= $notice_start ?></div>
                                                        </div>
                                                    </div>
                                                    <div style="display: flex; align-items: center; gap: 15px; padding: 15px; background: #f8f9fa; border-radius: 10px; border-left: 3px solid <?= $is_expired ? '#9ca3af' : '#F1B900'; ?>;">
                                                        <div style="width: 45px; height: 45px; background: <?= $is_expired ? '#9ca3af' : '#F1B900'; ?>; border-radius: 8px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                                            <i class="fa fa-calendar-check-o" style="color: <?= $is_expired ? '#ffffff' : '#000'; ?>; font-size: 18px;"></i>
                                                        </div>
                                                        <div style="flex: 1;">
                                                            <div style="color: #6b7280; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 4px;">Expiry Date</div>
                                                            <div style="color: #2c3e50; font-size: 15px; font-weight: 600;"><?= $notice_end ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                
                <!-- Carousel Controls -->
                <?php if ($notice_count > 1) : ?>
                    <a class="left carousel-control notice-carousel-control notice-carousel-control-prev" href="#noticeCarousel" role="button" data-slide="prev">
                        <span class="fa fa-angle-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control notice-carousel-control notice-carousel-control-next" href="#noticeCarousel" role="button" data-slide="next">
                        <span class="fa fa-angle-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                <?php endif; ?>
            </div>
        <?php else : ?>
            <div class="col-md-12">
                <p class="text-center" style="color: #6b7280; font-size: 16px;">No notices available at the moment.</p>
            </div>
        <?php endif; ?>
    </div>
</section>




 <!-- <div class="app_info_modal">

        <img src="https://www.techspot.com/images2/downloads/topdownload/2022/08/2022-08-11-ts3_thumbs-68b.png" alt="play store icon">

        <h2>Install Digital Shiksha Darpan from the Play Store Now!</h2>
        <a href="https://play.google.com/store/apps/details?id=com.shikshaapp" class="install_now_btn">Install Now</a>
        <a href="javascript:void(0)" class="not_now">Not Now</a>

    </div> -->


<div class="modal" id="andriodAppModal"  tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content app_info_modal">
      
      <div class="modal-body">
      <img src="<?= base_url('assets/images/play_store.webp') ?>" alt="play store icon">
        <h2>Install Digital Shiksha Darpan from the Play Store Now!</h2>
        <a href="https://play.google.com/store/apps/details?id=com.shikshaapp" class="install_now_btn">Install Now</a>
        <a href="javascript:void(0)" class="not_now" data-dismiss="modal">Not Now</a>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div> -->
    </div>
  </div>
</div>
