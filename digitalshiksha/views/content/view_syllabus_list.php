<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
   .nav>li>a {
      padding: 0px;
   }

   a.whatsapp.pull-right {
      margin-top: -14px;
   }

   .widget ul {
      display: none;
   }

   .fa-minus {
      display: none;
   }

   .fa-plus {
      display: block;
   }

   /* Study Material Page Styling */
   /* #study-materials {
      background-color: #f8f9fa;
      padding: 80px 0;
   } */

   /* Ensure parent container allows sticky */
   #study-materials .container {
      position: relative;
      overflow: visible;
   }

   #study-materials .container .row {
      position: relative;
      overflow: visible;
   }

   .study-filter-card {
      background: #fff;
      border-radius: 16px;
      padding: 25px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
      border: 1px solid rgba(241, 185, 0, 0.1);
   }
   

   .study-filter-card .form-group {
      margin-bottom: 18px;
   }
   
   .study-filter-card .form-group:last-of-type {
      margin-bottom: 0;
   }

   .study-filter-card label {
      color: #2c3e50;
      font-weight: 600;
      font-size: 14px;
      margin-bottom: 8px;
      display: block;
   }

   .study-filter-card .form-control {
      padding: 5px 11px;
      border: 2px solid #e5e7eb;
      border-radius: 10px;
      font-size: 13px;
      transition: all 0.3s ease;
      background-color: #fff;
      width: 100%;
      color: #2c3e50 !important;
      z-index: 1;
      position: relative;
      appearance: auto;
      -webkit-appearance: menulist;
   }

   .study-filter-card .form-control:focus {
      border-color: #F1B900;
      outline: none;
      box-shadow: 0 0 0 3px rgba(241, 185, 0, 0.1);
   }
   
   /* Select2 Custom Styling for Study Material */
   .study-filter-card .select2-container--default .select2-selection--single {
      height: 38px !important;
      border: 2px solid #e5e7eb !important;
      border-radius: 10px !important;
      padding: 5px 11px !important;
   }
   
   .study-filter-card .select2-container--default .select2-selection--single .select2-selection__rendered {
      line-height: 28px !important;
      padding-left: 0 !important;
      font-size: 13px !important;
      color: #2c3e50 !important;
   }
   
   .study-filter-card .select2-container--default .select2-selection--single .select2-selection__arrow {
      height: 36px !important;
      right: 10px !important;
   }
   
   .study-filter-card .select2-container--default .select2-search--dropdown .select2-search__field {
      border: 2px solid #e5e7eb !important;
      border-radius: 10px !important;
      padding: 8px 12px !important;
      font-size: 13px !important;
   }
   
   .study-filter-card .select2-container--default .select2-results__option {
      padding: 8px 12px !important;
      font-size: 13px !important;
   }
   
   .study-filter-card .select2-container--default .select2-results__option--highlighted[aria-selected] {
      background-color: #F1B900 !important;
      color: #fff !important;
   }
   
   .study-filter-card .select2-dropdown {
      border: 2px solid #e5e7eb !important;
      border-radius: 10px !important;
      box-shadow: 0 4px 15px rgba(0,0,0,0.08) !important;
   }
   
   .study-filter-card .select2-container {
      z-index: 9999 !important;
   }

   .study-filter-card .btn {
      padding: 10px 20px;
      border-radius: 10px;
      font-weight: 600;
      transition: all 0.3s ease;
      border: none;
   }

   .study-filter-card .btn-primary {
      background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%);
      color: #fff;
   }

   .study-filter-card .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 15px rgba(241, 185, 0, 0.4);
   }

   .study-filter-card .filBtn {
      display: flex;
      gap: 10px;
      align-items: flex-end;
      height: 100%;
   }

   .study-filter-card .filBtn .btn {
      flex: 1;
   }

   #study-materials .row {
      display: flex;
      flex-wrap: wrap;
      margin-left: -10px;
      margin-right: -10px;
   }
   
   #study-materials .row > [class*="col-"] {
      padding-left: 10px;
      padding-right: 10px;
      margin-bottom: 20px;
      box-sizing: border-box;
   }
   
   /* Ensure 3 cards per row on desktop */
   @media (min-width: 992px) {
      #study-materials .row > .col-lg-4 {
         flex: 0 0 33.333333%;
         max-width: 33.333333%;
         width: 33.333333%;
      }
   }
   
   /* 2 cards per row on tablet */
   @media (min-width: 768px) and (max-width: 991px) {
      #study-materials .row > .col-md-6 {
         flex: 0 0 50%;
         max-width: 50%;
         width: 50%;
      }
   }
   
   /* 1 card per row on mobile */
   @media (max-width: 767px) {
      #study-materials .row > [class*="col-"] {
         flex: 0 0 100%;
         max-width: 100%;
         width: 100%;
      }
   }

   .material-card {
      background: #fff;
      border-radius: 16px;
      box-shadow: 0 6px 25px rgba(0,0,0,0.08);
      overflow: hidden;
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      min-height: 420px;
      display: flex;
      flex-direction: column;
      border: 1px solid rgba(241, 185, 0, 0.2);
      height: 100%;
   }

   .material-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 15px 40px rgba(0,0,0,0.2);
      border-color: rgba(241, 185, 0, 0.3);
   }

   .material-card-header {
      background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%);
      padding: 20px;
      color: #fff;
      position: relative;
      overflow: hidden;
      min-height: 90px;
      display: flex;
      flex-direction: column;
      justify-content: center;
   }

   .material-card-header::before {
      content: '';
      position: absolute;
      top: -50%;
      right: -50%;
      width: 200%;
      height: 200%;
      background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
   }

   .material-card-header h4 {
      margin: 0;
      font-size: 20px;
      font-weight: 700;
      line-height: 1.4;
      display: flex;
      align-items: center;
      gap: 12px;
      position: relative;
      z-index: 1;
      min-height: 28px;
   }

   .material-card-header .material-type-badge {
      display: inline-block;
      padding: 4px 10px;
      background: rgba(0,0,0,0.18);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255,255,255,0.28);
      border-radius: 12px;
      font-size: 10px;
      font-weight: 600;
      letter-spacing: 0.3px;
      text-transform: uppercase;
      color: #fff;
      margin-top: 8px;
      position: relative;
      z-index: 1;
   }

   .material-card-body {
      padding: 20px 25px;
      flex-grow: 1;
      display: flex;
      flex-direction: column;
      background: #fff;
      overflow: hidden;
   }

   .material-card-body .material-icon-display {
      text-align: center;
      margin-bottom: 20px;
   }

   .material-card-body .material-icon-display img {
      max-width: 100%;
      height: auto;
      border-radius: 8px;
      max-height: 150px;
      object-fit: cover;
   }

   .material-card-footer {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: auto;
      padding: 20px 25px;
      border-top: 1px solid rgba(241, 185, 0, 0.15);
      background: #f8f9fa;
   }

   .material-card-footer .btn {
      background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%) !important;
      border: none !important;
      border-radius: 25px !important;
      padding: 10px 24px !important;
      font-size: 14px !important;
      font-weight: 600 !important;
      color: #fff !important;
      box-shadow: 0 4px 15px rgba(241, 185, 0, 0.3) !important;
      transition: all 0.3s ease !important;
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      text-decoration: none;
      text-transform: none;
      letter-spacing: 0.3px;
      position: relative;
      overflow: hidden;
   }
   
   .material-card-footer .btn::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
      transition: left 0.5s;
   }
   
   .material-card-footer .btn:hover::before {
      left: 100%;
   }

   .material-card-footer .btn:hover {
      transform: translateY(-2px) !important;
      box-shadow: 0 6px 20px rgba(241, 185, 0, 0.4) !important;
      background: linear-gradient(135deg, #ff8c00 0%, #F1B900 100%) !important;
   }
   
   .material-card-footer .btn:active {
      transform: translateY(-1px);
      box-shadow: 0 4px 15px rgba(241, 185, 0, 0.4);
   }
   
   .material-card-footer .btn i {
      font-size: 16px;
      opacity: 0.95;
   }
   
   /* All buttons use same gold gradient as Start button */
   .material-card-footer .btn[href*="video"],
   .material-card-footer .btn[href*="pdf"],
   .material-card-footer .btn[href*="mcq"],
   .material-card-footer .btn[href*="long-answer"] {
      background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%) !important;
      box-shadow: 0 4px 15px rgba(241, 185, 0, 0.3) !important;
   }
   
   .material-card-footer .btn[href*="video"]:hover,
   .material-card-footer .btn[href*="pdf"]:hover,
   .material-card-footer .btn[href*="mcq"]:hover,
   .material-card-footer .btn[href*="long-answer"]:hover {
      background: linear-gradient(135deg, #ff8c00 0%, #F1B900 100%) !important;
      box-shadow: 0 6px 20px rgba(241, 185, 0, 0.4) !important;
   }

   /* Responsive adjustments */
   @media (max-width: 991px) {
      .study-filter-card {
         position: relative !important;
         top: auto !important;
      }
      
      #study-materials .row > [class*="col-"] {
         margin-bottom: 20px;
      }
   }

   @media (max-width: 991px) {
      .study-filter-card {
         position: relative !important;
         top: auto !important;
      }
   }

   @media (max-width: 767px) {
      .study-filter-card {
         padding: 20px;
      }
   }
   
   /* Material Tabs Styling */
   .material-tabs {
      margin: 0 !important;
      border-bottom: 3px solid #e5e7eb;
   }
   
   .material-tabs > li > a {
      padding: 12px 20px !important;
      font-size: 15px !important;
      font-weight: 600 !important;
      color: #4b5563 !important;
      border: none !important;
      border-radius: 0 !important;
      border-bottom: 3px solid transparent !important;
      transition: all 0.3s ease !important;
      margin-right: 0 !important;
   }
   
   .material-tabs > li > a:hover {
      background: transparent !important;
      color: #F1B900 !important;
      border-bottom-color: #F1B900 !important;
   }
   
   .material-tabs > li.active > a,
   .material-tabs > li.active > a:hover,
   .material-tabs > li.active > a:focus {
      color: #F1B900 !important;
      background: transparent !important;
      border: none !important;
      border-bottom: 3px solid #F1B900 !important;
      border-radius: 0 !important;
   }
   
   .material-tabs .tab-count {
      margin-left: 8px;
      background: #F1B900;
      color: #fff;
      padding: 2px 8px;
      border-radius: 12px;
      font-size: 12px;
      font-weight: 600;
   }
   
   .material-tabs > li.active > a .tab-count {
      background: #ff8c00;
   }
   
   /* Tab Content Spacing */
   .tab-content {
      padding-top: 0 !important;
      padding-bottom: 10px !important;
   }
   
   .tab-pane {
      margin-top: 0 !important;
      margin-bottom: 0 !important;
      padding-top: 0 !important;
      display: none !important;
   }
   
   .tab-pane.active {
      display: block !important;
   }
   
   .tab-pane .row {
      margin-top: 0 !important;
      margin-bottom: 0 !important;
   }
   
   /* Ensure consistent spacing for all tabs */
   #long-answer-tab,
   #mcq-tab,
   #video-tab {
      padding-top: 12px !important;
   }
   
   /* Remove extra spacing from last row of cards in tabs */
   #long-answer-list .col-lg-4:nth-last-child(-n+3),
   #mcq-list .col-lg-4:nth-last-child(-n+3),
   #video-list .col-lg-4:nth-last-child(-n+3) {
      margin-bottom: 0;
   }
   
   /* For tablets - last 2 cards */
   @media (min-width: 768px) and (max-width: 991px) {
      #long-answer-list .col-md-6:nth-last-child(-n+2),
      #mcq-list .col-md-6:nth-last-child(-n+2),
      #video-list .col-md-6:nth-last-child(-n+2) {
         margin-bottom: 0;
      }
   }
   
   /* For mobile - last card */
   @media (max-width: 767px) {
      #long-answer-list .col-12:last-child,
      #mcq-list .col-12:last-child,
      #video-list .col-12:last-child {
         margin-bottom: 0;
      }
   }
</style>
<section id="study-materials" class="secPad" style=" padding: 80px 0;">
   <div class="container">
      <!-- Section Header -->
      <div class="row">
         <div class="col-md-12">
            <div class="section-title text-center" style="">
               <h2 class="title" style="color: black !important;  font-size: 42px; font-weight: 700; margin-bottom: 15px;">
                  Study <span style="color: #F1B900;">Materials</span>
               </h2>
               <div class="line_br mrauto" style="width: 100px; height: 4px; background: #F1B900; margin: 20px auto;"></div>
               <p style="color: #666; font-size: 16px; margin-top: 15px;">Access quality study resources to excel in your exams</p>
            </div>
         </div>
      </div>

      <!-- Messages -->
      <div class="row" style="margin-bottom: 10px;">
         <div class="col-md-12">
            <?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>
            <?= ($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>
            <?= (isset($message)) ? $message : ''; ?>
         </div>
      </div>

      <!-- Main Content Layout: Filter Left, Materials Right -->
      <div class="row" style="align-items: flex-start;z-index: 0;">
         <!-- Left Sidebar: Filter -->
         <div class="col-lg-3 col-md-4 col-sm-12" style="margin-bottom: 30px;">
            <div class="study-filter-card" style="position: sticky; top: 100px;">
               <h4 style="margin-top: 0; margin-bottom: 20px; color: #2c3e50; font-weight: 700; font-size: 18px;">
                  <i class="fa fa-filter"></i> Filter
               </h4>
               <form method="get" id="Search-form">
                  <div class="form-group">
                     <label for="main_category" class="control-label" style="font-size: 13px;">Main Category</label>
                     <select name="main_category" id="main_category" class="form-control select2-category" style="font-size: 13px; padding: 5px 15px;">
                        <?php if (isset($_GET['main_category'])) {
                           echo MainCategory($_GET['main_category']);
                        } else {
                           echo MainCategory();
                        }
                        ?>
                     </select>
                  </div>
                  <div class="form-group">
                     <label for="sub_category" class="control-label" style="font-size: 13px;">Sub Category</label>
                     <select name="sub_category" id="sub_category" class="form-control select2-category" style="font-size: 13px; padding: 5px 15px;">
                        <?php
                        if (isset($_GET['main_category']) && !isset($_GET['sub_category'])) {
                           echo SubCategory($_GET['main_category']);
                        } else if (isset($_GET['main_category']) && isset($_GET['sub_category'])) {
                           echo SubCategory($_GET['main_category'], $_GET['sub_category']);
                        } else {
                           echo "<option value='' disabled selected>Select Sub Category</option>";
                        }
                        ?>
                     </select>
                  </div>
                  <div class="form-group">
                     <label for="sub_sub_category" class="control-label" style="font-size: 13px;">Sub Sub Category</label>
                     <select name="sub_sub_category" id="sub_sub_category" class="form-control select2-category" style="font-size: 13px; padding: 5px 15px;">
                        <?php
                        if (isset($_GET['sub_category']) && isset($_GET['sub_sub_category'])) {
                           echo SubSubCategory($_GET['sub_category'], $_GET['sub_sub_category']);
                        } else {
                           echo "<option value='' disabled selected>Select Sub Sub Category</option>";
                        }
                        ?>
                     </select>
                  </div>
                  <div style="margin-top: 20px;">
                     <button type="submit" class="btn btn-primary" style="width: 100%; margin-bottom: 10px;">
                        <i class="fa fa-search"></i> Search
                     </button>
                     <a href="<?= base_url('study-material') ?>" style="width: 100%; display: block;">
                        <button type="button" class="btn btn-default" style="width: 100%;">
                           <i class="fa fa-refresh"></i> Reset
                        </button>
                     </a>
                  </div>
               </form>
            </div>
         </div>

         <!-- Right Side: Study Material Cards -->
         <div class="col-lg-9 col-md-8 col-sm-12">
            <!-- Total Materials Count -->
            <?php if (isset($syllabus) && !empty($syllabus)): ?>
            <div style="margin-bottom: 25px; padding: 15px 20px; background: #fff; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
               <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px;">
                  <div>
                     <span style="font-size: 16px; font-weight: 600; color: #2c3e50;">
                        <i class="fa fa-book" style="margin-right: 8px; color: #F1B900;"></i>
                        Total Study Materials: <strong style="color: #F1B900;"><?= isset($total_materials) ? number_format($total_materials) : count($syllabus) ?></strong>
                     </span>
                  </div>
                  <?php if (isset($category_name) && $category_name): ?>
                  <div>
                     <span style="font-size: 14px; color: #666;">
                        <i class="fa fa-folder" style="margin-right: 5px;"></i>
                        Category: <strong><?= htmlspecialchars($category_name) ?></strong>
                     </span>
                  </div>
                  <?php endif; ?>
               </div>
            </div>
            <?php endif; ?>

            <!-- Material Type Tabs -->
            <div style="margin-bottom: 20px;">
               <ul class="nav nav-tabs material-tabs" role="tablist" style="border-bottom: 3px solid #e5e7eb; background: #fff; padding: 0; border-radius: 12px 12px 0 0; margin: 0;">
                  <li role="presentation" class="active">
                     <a href="#long-answer-tab" aria-controls="long-answer-tab" role="tab" data-toggle="tab" style="padding: 12px 20px; font-size: 15px; font-weight: 600; color: #4b5563; border: none; border-radius: 0; border-bottom: 3px solid transparent; transition: all 0.3s ease;">
                        <i class="fa fa-file-text-o" style="margin-right: 8px;"></i>Long Answer
                        <span class="tab-count" style="margin-left: 8px; background: #F1B900; color: #fff; padding: 2px 8px; border-radius: 12px; font-size: 12px;">0</span>
                     </a>
                  </li>
                  <li role="presentation">
                     <a href="#mcq-tab" aria-controls="mcq-tab" role="tab" data-toggle="tab" style="padding: 12px 20px; font-size: 15px; font-weight: 600; color: #4b5563; border: none; border-radius: 0; border-bottom: 3px solid transparent; transition: all 0.3s ease;">
                        <i class="fa fa-list-alt" style="margin-right: 8px;"></i>MCQ
                        <span class="tab-count" style="margin-left: 8px; background: #F1B900; color: #fff; padding: 2px 8px; border-radius: 12px; font-size: 12px;">0</span>
                     </a>
                  </li>
                  <li role="presentation">
                     <a href="#video-tab" aria-controls="video-tab" role="tab" data-toggle="tab" style="padding: 12px 20px; font-size: 15px; font-weight: 600; color: #4b5563; border: none; border-radius: 0; border-bottom: 3px solid transparent; transition: all 0.3s ease;">
                        <i class="fa fa-play-circle" style="margin-right: 8px;"></i>Video
                        <span class="tab-count" style="margin-left: 8px; background: #F1B900; color: #fff; padding: 2px 8px; border-radius: 12px; font-size: 12px;">0</span>
                     </a>
                  </li>
               </ul>
               
               <!-- Tab Panes -->
               <div class="tab-content" style="background: #fff; border-radius: 0 0 12px 12px; padding: 0 20px 10px 20px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); margin-top: 0; margin-bottom: 0;">
                  <!-- Long Answer Tab -->
                  <div role="tabpanel" class="tab-pane fade in active" id="long-answer-tab" style="padding-top: 12px;">
                     <div class="row" id="long-answer-list" style="margin-left: -10px; margin-right: -10px; margin-bottom: 0; margin-top: 0;">
                     </div>
                  </div>
                  
                  <!-- MCQ Tab -->
                  <div role="tabpanel" class="tab-pane fade" id="mcq-tab" style="padding-top: 12px;">
                     <div class="row" id="mcq-list" style="margin-left: -10px; margin-right: -10px; margin-bottom: 0; margin-top: 0;">
                     </div>
                  </div>
                  
                  <!-- Video Tab -->
                  <div role="tabpanel" class="tab-pane fade" id="video-tab" style="padding-top: 12px; margin-top: 0;">
                     <div class="row" id="video-list" style="margin-left: -10px; margin-right: -10px; margin-bottom: 0; margin-top: 0;">
                     </div>
                  </div>
               </div>
            </div>

            <!-- Study Material Cards (Hidden - Data will be distributed to tabs) -->
            <div class="row" id="study-material-list" style="margin-left: -10px; margin-right: -10px; display: none;">
         <?php
         if (isset($syllabus) and !empty($syllabus)) {
            // Define color theme combinations for different cards
            $color_themes = [
               ['start' => '#F1B900', 'end' => '#ff8c00'], // Gold to Orange
               ['start' => '#667eea', 'end' => '#764ba2'], // Purple to Violet
               ['start' => '#f093fb', 'end' => '#f5576c'], // Pink to Red
               ['start' => '#4facfe', 'end' => '#00f2fe'], // Blue to Cyan
               ['start' => '#43e97b', 'end' => '#38f9d7'], // Green to Teal
               ['start' => '#fa709a', 'end' => '#fee140'], // Pink to Yellow
               ['start' => '#30cfd0', 'end' => '#330867'], // Cyan to Dark Purple
               ['start' => '#a8edea', 'end' => '#fed6e3'], // Light Teal to Pink
               ['start' => '#ff9a9e', 'end' => '#fecfef'], // Coral to Light Pink
            ];
            $theme_index = 0;
            
            foreach ($syllabus as $ssyllabus) {
               $current_theme = $color_themes[$theme_index % count($color_themes)];
               $theme_index++;
               
               // Determine icon based on material type
               $material_type = $ssyllabus->name;
               $icon_class = 'fa-file-text-o';
               if ($material_type == 'VIDEO') {
                  $icon_class = 'fa-play-circle-o';
               } elseif ($material_type == 'PDF') {
                  $icon_class = 'fa-file-pdf-o';
               } elseif ($material_type == 'MCQ') {
                  $icon_class = 'fa-list-alt';
               }
         ?>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
               <div class="material-card">
                  <div class="material-card-header" style="background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%);">
                     <h4>
                        <i class="fa <?= $icon_class ?>" style="font-size: 24px; opacity: 0.95;"></i>
                        <?= htmlspecialchars($material_type) ?>
                     </h4>
                  </div>
                  <div class="material-card-body">
                     <?php if ($ssyllabus->icon_class && file_exists('uploads/category_images/' . $ssyllabus->icon_class)) : ?>
                        <div class="material-icon-display">
                           <img src="<?= base_url('uploads/category_images/' . $ssyllabus->icon_class); ?>" alt="<?= htmlspecialchars($material_type) ?>" style="width: 100%; height: 180px; object-fit: cover; border-radius: 8px;">
                        </div>
                     <?php else : ?>
                        <div class="material-icon-display" style="padding: 40px 20px; display: flex; align-items: center; justify-content: center; min-height: 180px;">
                           <i class="fa <?= $icon_class ?>" style="font-size: 80px; color: rgba(241, 185, 0, 0.15);"></i>
                        </div>
                     <?php endif; ?>
                     <div style="margin-top: auto; padding-top: 15px;">
                        <p style="color: #4a5568; font-size: 13px; text-align: center; margin: 0;">
                           <i class="fa fa-book" style="margin-right: 5px; color: #F1B900;"></i>
                           Study Material Available
                        </p>
                     </div>
                  </div>
                  <div class="material-card-footer">
                     <?php if ($material_type == 'LONG ANSWER') { ?>
                        <a href="<?= base_url('study-material/long-answer-details/' . $ssyllabus->id); ?>" class="btn" style="background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%); border: none; border-radius: 25px; padding: 10px 24px; font-size: 14px; font-weight: 600; color: #fff; box-shadow: 0 4px 15px rgba(241, 185, 0, 0.3); transition: all 0.3s ease; display: flex; align-items: center; justify-content: center; gap: 8px;">
                           <i class="fa fa-file-text-o"></i> <span>View Material</span>
                        </a>
                     <?php } else if ($material_type == 'VIDEO') { ?>
                        <a href="<?= base_url('study-material/video-details/' . $ssyllabus->id); ?>" class="btn" style="background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%); border: none; border-radius: 25px; padding: 10px 24px; font-size: 14px; font-weight: 600; color: #fff; box-shadow: 0 4px 15px rgba(241, 185, 0, 0.3); transition: all 0.3s ease; display: flex; align-items: center; justify-content: center; gap: 8px;">
                           <i class="fa fa-play-circle"></i> <span>Watch Video</span>
                        </a>
                     <?php } else if ($material_type == 'PDF') { ?>
                        <a href="<?= base_url('study-material/pdf-details/' . $ssyllabus->id); ?>" class="btn" style="background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%); border: none; border-radius: 25px; padding: 10px 24px; font-size: 14px; font-weight: 600; color: #fff; box-shadow: 0 4px 15px rgba(241, 185, 0, 0.3); transition: all 0.3s ease; display: flex; align-items: center; justify-content: center; gap: 8px;">
                           <i class="fa fa-file-pdf-o"></i> <span>View PDF</span>
                        </a>
                     <?php } else if ($material_type == 'MCQ') { ?>
                        <a href="<?= base_url('study-material/mcq/' . $ssyllabus->id); ?>" class="btn" style="background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%); border: none; border-radius: 25px; padding: 10px 24px; font-size: 14px; font-weight: 600; color: #fff; box-shadow: 0 4px 15px rgba(241, 185, 0, 0.3); transition: all 0.3s ease; display: flex; align-items: center; justify-content: center; gap: 8px;">
                           <i class="fa fa-list-alt"></i> <span>Practice MCQ</span>
                        </a>
                     <?php } else { ?>
                        <a href="<?= base_url('study-material'); ?>" class="btn" style="background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%); border: none; border-radius: 25px; padding: 10px 24px; font-size: 14px; font-weight: 600; color: #fff; box-shadow: 0 4px 15px rgba(241, 185, 0, 0.3); transition: all 0.3s ease; display: flex; align-items: center; justify-content: center; gap: 8px;">
                           <i class="fa fa-eye"></i> <span>View Material</span>
                        </a>
                     <?php } ?>
                  </div>
               </div>
            </div>
         <?php
            }
         } else {
         ?>
            <div class="col-md-12">
               <div style="text-align: center; padding: 60px 20px; background: #fff; border-radius: 16px; box-shadow: 0 4px 15px rgba(0,0,0,0.08);">
                  <i class="fa fa-file-text-o" style="font-size: 64px; color: #ddd; margin-bottom: 20px;"></i>
                  <h4 style="color: #666; font-size: 20px; margin-bottom: 10px;">No Study Material Found</h4>
                  <p style="color: #999; font-size: 14px;">Please search by category to find study materials</p>
               </div>
            </div>
         <?php
         }
         ?>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
   $(document).ready(function() {
      // Initialize Select2 on category dropdowns
      $('.select2-category').select2({
         theme: 'default',
         width: '100%',
         placeholder: function() {
            return $(this).data('placeholder') || 'Select an option';
         },
         allowClear: true,
         language: {
            noResults: function() {
               return "No results found";
            },
            searching: function() {
               return "Searching...";
            }
         }
      });
      
      // Handle main category change - update sub category
      $('#main_category').on('change', function() {
         var categoryId = $(this).val();
         var $subCategory = $('#sub_category');
         var $subSubCategory = $('#sub_sub_category');
         
         if (categoryId) {
            $.LoadingOverlay('show');
            $.ajax({
               url: '<?php echo base_url() ?>admin_control/get_subcategories_ajax/' + categoryId,
               type: 'GET',
               dataType: 'html',
               success: function(response) {
                  $.LoadingOverlay('hide');
                  $subCategory.empty().html(response);
                  $subCategory.trigger('change.select2'); // Update Select2
                  
                  // Reset sub sub category
                  $subSubCategory.empty().html('<option value="" disabled selected>Select Sub Sub Category</option>');
                  $subSubCategory.trigger('change.select2');
               },
               error: function() {
                  $.LoadingOverlay('hide');
                  $subCategory.empty().html('<option value="">Error loading sub categories</option>');
                  $subCategory.trigger('change.select2');
               }
            });
         } else {
            // Reset both sub and sub sub categories
            $subCategory.empty().html('<option value="" disabled selected>Select Sub Category</option>');
            $subCategory.trigger('change.select2');
            $subSubCategory.empty().html('<option value="" disabled selected>Select Sub Sub Category</option>');
            $subSubCategory.trigger('change.select2');
         }
      });
      
      // Handle sub category change - update sub sub category
      $('#sub_category').on('change', function() {
         var subCategoryId = $(this).val();
         var $subSubCategory = $('#sub_sub_category');
         
         if (subCategoryId) {
            $.LoadingOverlay('show');
            $.ajax({
               url: '<?php echo base_url() ?>admin_control/get_sub_subcategories_ajax/' + subCategoryId,
               type: 'GET',
               dataType: 'html',
               success: function(response) {
                  $.LoadingOverlay('hide');
                  $subSubCategory.empty().html(response);
                  $subSubCategory.trigger('change.select2'); // Update Select2
               },
               error: function() {
                  $.LoadingOverlay('hide');
                  $subSubCategory.empty().html('<option value="">Error loading sub sub categories</option>');
                  $subSubCategory.trigger('change.select2');
               }
            });
         } else {
            // Reset sub sub category
            $subSubCategory.empty().html('<option value="" disabled selected>Select Sub Sub Category</option>');
            $subSubCategory.trigger('change.select2');
         }
      });
   });
   
   // Hide Nav Bar
   function HideNav(id) {
      $("#nav" + id).hide(500);
      $("#plus" + id).show();
      $("#minus" + id).hide();
   }

   // Show Nav Bar
   function ShowNav(Id) {
      $("#nav" + Id).show(500);
      $("#plus" + Id).hide();
      $("#minus" + Id).show();
   }
   
   // Organize materials into tabs
   $(document).ready(function() {
      // Clear all tab lists first
      $('#long-answer-list').empty();
      $('#mcq-list').empty();
      $('#video-list').empty();
      
      // Collect all materials from the hidden list
      var longAnswerMaterials = [];
      var mcqMaterials = [];
      var videoMaterials = [];
      
      $('#study-material-list .col-lg-4').each(function() {
         var $card = $(this);
         // Get material type from h4 text, excluding icon
         var $h4 = $card.find('.material-card-header h4');
         var materialType = $h4.clone().children().remove().end().text().trim().toUpperCase();
         
         // Also check button href as backup
         var btnHref = $card.find('.material-card-footer .btn').attr('href') || '';
         
         // Determine material type
         if (materialType === 'LONG ANSWER' || btnHref.indexOf('long-answer') !== -1) {
            longAnswerMaterials.push($card.clone());
         } else if (materialType === 'MCQ' || btnHref.indexOf('/mcq/') !== -1) {
            mcqMaterials.push($card.clone());
         } else if (materialType === 'VIDEO' || btnHref.indexOf('video-details') !== -1) {
            videoMaterials.push($card.clone());
         }
      });
      
      // Populate tabs - only show relevant cards
      if (longAnswerMaterials.length > 0) {
         longAnswerMaterials.forEach(function($card) {
            $('#long-answer-list').append($card);
         });
      } else {
         $('#long-answer-list').html('<div class="col-md-12"><div style="text-align: center; padding: 60px 20px; background: #f8f9fa; border-radius: 16px;"><i class="fa fa-file-text-o" style="font-size: 64px; color: #ddd; margin-bottom: 20px;"></i><h4 style="color: #666; font-size: 20px; margin-bottom: 10px;">No Long Answer Materials Found</h4><p style="color: #999; font-size: 14px;">Please search by category to find long answer materials</p></div></div>');
      }
      
      if (mcqMaterials.length > 0) {
         mcqMaterials.forEach(function($card) {
            $('#mcq-list').append($card);
         });
      } else {
         $('#mcq-list').html('<div class="col-md-12"><div style="text-align: center; padding: 60px 20px; background: #f8f9fa; border-radius: 16px;"><i class="fa fa-list-alt" style="font-size: 64px; color: #ddd; margin-bottom: 20px;"></i><h4 style="color: #666; font-size: 20px; margin-bottom: 10px;">No MCQ Materials Found</h4><p style="color: #999; font-size: 14px;">Please search by category to find MCQ materials</p></div></div>');
      }
      
      if (videoMaterials.length > 0) {
         videoMaterials.forEach(function($card) {
            $('#video-list').append($card);
         });
      } else {
         $('#video-list').html('<div class="col-md-12"><div style="text-align: center; padding: 60px 20px; background: #f8f9fa; border-radius: 16px;"><i class="fa fa-play-circle" style="font-size: 64px; color: #ddd; margin-bottom: 20px;"></i><h4 style="color: #666; font-size: 20px; margin-bottom: 10px;">No Video Materials Found</h4><p style="color: #999; font-size: 14px;">Please search by category to find video materials</p></div></div>');
      }
      
      // Update tab counts
      $('.material-tabs a[href="#long-answer-tab"] .tab-count').text(longAnswerMaterials.length);
      $('.material-tabs a[href="#mcq-tab"] .tab-count').text(mcqMaterials.length);
      $('.material-tabs a[href="#video-tab"] .tab-count').text(videoMaterials.length);
      
      // Ensure Bootstrap tabs work correctly - hide inactive panes
      $('.tab-pane').removeClass('active');
      $('#long-answer-tab').addClass('active');
   });
</script>
