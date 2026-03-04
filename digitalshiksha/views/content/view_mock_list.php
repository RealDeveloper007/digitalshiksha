<link href="<?php echo base_url('assets/css/mock_list.css') ?>" rel="stylesheet" media="screen">
<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
   /* Ensure proper grid layout - 3 exams per row on desktop */
   #mock-tests .row {
      display: flex;
      flex-wrap: wrap;
      margin-left: -10px;
      margin-right: -10px;
   }
   #mock-tests .row > [class*="col-"] {
      padding-left: 10px;
      padding-right: 10px;
      margin-bottom: 20px;
      box-sizing: border-box;
   }
   #mock-tests .quiz-card {
      width: 100%;
      box-sizing: border-box;
   }
   /* Desktop: 3 columns per row */
   @media (min-width: 992px) {
      #mock-tests .row > .col-lg-4 {
         flex: 0 0 33.333333%;
         max-width: 33.333333%;
         width: 33.333333%;
      }
   }
   /* Tablet: 2 columns per row */
   @media (min-width: 768px) and (max-width: 991px) {
      #mock-tests .row > .col-md-6 {
         flex: 0 0 50%;
         max-width: 50%;
         width: 50%;
      }
   }
   /* Small screens: 2 columns per row */
   @media (min-width: 576px) and (max-width: 767px) {
      #mock-tests .row > .col-sm-6 {
         flex: 0 0 50%;
         max-width: 50%;
         width: 50%;
      }
   }
   /* Mobile: 1 column per row */
   @media (max-width: 575px) {
      #mock-tests .row > [class*="col-"] {
         flex: 0 0 100%;
         max-width: 100%;
         width: 100%;
      }
   }
   /* Responsive adjustments for sidebar layout */
   @media (max-width: 991px) {
      .mock-filter-card {
         position: relative !important;
         top: auto !important;
      }
   }
   .mock-filter-card {
      background: #fff;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.08);
      margin-bottom: 30px;
   }
   .mock-filter-card .form-group {
      margin-bottom: 18px;
   }
   .mock-filter-card .form-group:last-of-type {
      margin-bottom: 0;
   }
   .mock-filter-card .form-control {
      padding: 10px 15px;
      border: 2px solid #e5e7eb;
      border-radius: 8px;
      font-size: 13px;
      transition: all 0.3s ease;
      background-color: #fff;
      width: 100%;
      color: #2c3e50 !important;
      z-index: 1;
      position: relative;
   }
   .mock-filter-card select.form-control {
      padding: 5px 12px;
      border: 2px solid #e5e7eb;
      border-radius: 8px;
      font-size: 13px;
      transition: all 0.3s ease;
      background-color: #fff;
      width: 100%;
      color: #2c3e50 !important;
      z-index: 1;
      position: relative;
      appearance: auto;
      -webkit-appearance: menulist;
      -moz-appearance: menulist;
      cursor: pointer;
   }
   .mock-filter-card select.form-control:focus {
      border-color: #F1B900;
      box-shadow: 0 0 0 4px rgba(241, 185, 0, 0.1);
      outline: none;
      z-index: 10;
      background-color: #fff !important;
      color: #2c3e50 !important;
   }
   
   /* Select2 Custom Styling */
   .select2-container--default .select2-selection--single {
      height: 38px !important;
      border: 2px solid #e5e7eb !important;
      border-radius: 8px !important;
      padding: 5px 12px !important;
   }
   
   .select2-container--default .select2-selection--single .select2-selection__rendered {
      line-height: 28px !important;
      padding-left: 0 !important;
      font-size: 13px !important;
      color: #2c3e50 !important;
   }
   
   .select2-container--default .select2-selection--single .select2-selection__arrow {
      height: 36px !important;
      right: 10px !important;
   }
   
   .select2-container--default .select2-search--dropdown .select2-search__field {
      border: 2px solid #e5e7eb !important;
      border-radius: 8px !important;
      padding: 8px 12px !important;
      font-size: 13px !important;
   }
   
   .select2-container--default .select2-results__option {
      padding: 8px 12px !important;
      font-size: 13px !important;
   }
   
   .select2-container--default .select2-results__option--highlighted[aria-selected] {
      background-color: #F1B900 !important;
      color: #fff !important;
   }
   
   .select2-dropdown {
      border: 2px solid #e5e7eb !important;
      border-radius: 8px !important;
      box-shadow: 0 4px 15px rgba(0,0,0,0.08) !important;
   }
   
   .select2-container {
      z-index: 9999 !important;
   }
   .mock-filter-card select.form-control option {
      padding: 10px;
      background: #fff !important;
      color: #2c3e50 !important;
      display: block;
   }
   .mock-filter-card select.form-control option:checked,
   .mock-filter-card select.form-control option:selected {
      background: #F1B900 !important;
      color: #fff !important;
   }
   /* Ensure selected text is visible in the select box */
   .mock-filter-card select.form-control::-ms-value {
      background: transparent !important;
      color: #2c3e50 !important;
   }
   /* Fix for WebKit browsers */
   .mock-filter-card select.form-control {
      -webkit-appearance: menulist;
      -moz-appearance: menulist;
      appearance: menulist;
   }
   /* Ensure text color is always visible */
   .mock-filter-card select.form-control,
   .mock-filter-card select.form-control:focus,
   .mock-filter-card select.form-control:hover {
      color: #2c3e50 !important;
      background-color: #fff !important;
   }
   .mock-filter-card select.form-control:focus {
      z-index: 1000;
   }
   .mock-filter-card .form-group {
      position: relative;
      z-index: 1;
   }
   .mock-filter-card .form-group:focus-within {
      z-index: 1000;
   }
   /* Ensure dropdowns are above other elements */
   .mock-filter-card {
      position: relative;
      z-index: 1;
   }
   .mock-filter-card select {
      position: relative;
      z-index: 2;
   }
   .mock-filter-card select:focus {
      z-index: 1000;
   }
   .mock-filter-card label {
      font-weight: 600;
      color: #2c3e50;
      margin-bottom: 8px;
      font-size: 13px;
      display: block;
   }
   .mock-filter-buttons {
      display: flex;
      flex-direction: column;
      gap: 10px;
      margin-top: 0;
   }
   .mock-filter-buttons .btn {
      width: 100%;
      padding: 10px;
      border-radius: 8px;
      font-size: 13px;
      font-weight: 600;
      transition: all 0.3s ease;
   }
   .mock-filter-buttons .btn-primary {
      background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%);
      border: none;
      color: #fff;
   }
   .mock-filter-buttons .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 15px rgba(241, 185, 0, 0.3);
   }
   .mock-filter-buttons .btn-default {
      background: #6c757d;
      border: none;
      color: #fff;
   }
   .mock-filter-buttons .btn-default:hover {
      background: #5a6268;
      transform: translateY(-2px);
   }
   .commercial-filter {
      display: flex;
      gap: 10px;
      justify-content: flex-end;
      margin-bottom: 20px;
   }
   .commercial-filter .btn {
      padding: 8px 16px;
      border-radius: 8px;
      font-size: 13px;
      font-weight: 600;
      transition: all 0.3s ease;
   }
   .social-sharing {
      display: flex !important;
      gap: 10px;
      margin-top: 15px;
      justify-content: center;
      padding-top: 15px;
      border-top: 1px solid rgba(255,255,255,0.1);
      visibility: visible !important;
      opacity: 1 !important;
   }
   .social-sharing a {
      width: auto !important;
      min-width: 90px !important;
      height: 40px !important;
      display: flex !important;
      align-items: center;
      justify-content: center;
      border-radius: 8px;
      background: rgba(241, 185, 0, 0.25) !important;
      transition: all 0.3s ease;
      border: 2px solid rgba(241, 185, 0, 0.6) !important;
      visibility: visible !important;
      opacity: 1 !important;
      position: relative;
      z-index: 1;
      padding: 8px 15px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
   }
   .social-sharing a:hover {
      background: rgba(241, 185, 0, 0.4) !important;
      border-color: rgba(241, 185, 0, 0.8) !important;
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(241, 185, 0, 0.3);
   }
   .social-sharing img {
      width: 90px !important;
      height: auto !important;
      max-height: 30px !important;
      object-fit: contain;
      display: block !important;
      visibility: visible !important;
      opacity: 1 !important;
      background: transparent;
   }
   /* Pagination Styling */
   /* #mock-tests #pagination {
      margin-top: 50px;
      margin-bottom: 30px;
   } */
   #mock-tests .tsc_pagination {
      display: inline-flex;
      list-style: none;
      padding: 0;
      margin: 0;
      gap: 8px;
      flex-wrap: wrap;
      justify-content: center;
      align-items: center;
   }
   #mock-tests .tsc_pagination li {
      display: inline-block;
      margin: 0;
      padding: 0;
   }
   #mock-tests .tsc_pagination a,
   #mock-tests .tsc_pagination span {
      display: inline-block;
      padding: 10px 16px;
      margin: 0;
      border-radius: 8px;
      font-size: 14px;
      font-weight: 600;
      text-decoration: none;
      transition: all 0.3s ease;
      min-width: 40px;
      text-align: center;
      border: 2px solid #e5e7eb;
      background: #fff;
      color: #2c3e50;
   }
   #mock-tests .tsc_pagination a:hover {
      background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%);
      border-color: #F1B900;
      color: #fff;
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(241, 185, 0, 0.3);
   }
   #mock-tests .tsc_pagination .active,
   #mock-tests .tsc_pagination .current {
      background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%) !important;
      border-color: #F1B900 !important;
      color: #fff !important;
      font-weight: 700;
      box-shadow: 0 4px 8px rgba(241, 185, 0, 0.3);
   }
   #mock-tests .tsc_pagination .disabled,
   #mock-tests .tsc_pagination .disabled a {
      background: #f8f9fa !important;
      border-color: #e5e7eb !important;
      color: #9ca3af !important;
      cursor: not-allowed;
      opacity: 0.6;
   }
   #mock-tests .tsc_pagination .disabled a:hover {
      background: #f8f9fa !important;
      border-color: #e5e7eb !important;
      color: #9ca3af !important;
      transform: none;
      box-shadow: none;
}
   
   /* Mobile view: Section title margin adjustments */
   @media (max-width: 991px) {
      #mock-tests .section-title.text-center {
         margin-bottom: 0px !important;
         margin-top: 100px !important;
      }
   }
   
   /* Enhanced Card Styling */
   .quiz-card {
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
   }
   
   .quiz-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 12px 30px rgba(0,0,0,0.15) !important;
      border-color: rgba(241, 185, 0, 0.4) !important;
   }
   
   .quiz-card-image {
      position: relative;
      overflow: hidden;
   }
   
   .quiz-card-image img {
      transition: transform 0.5s ease;
   }
   
   .quiz-card:hover .quiz-card-image img {
      transform: scale(1.1);
   }
   
   /* Ensure images load properly */
   .quiz-card-image img[src=""],
   .quiz-card-image img:not([src]) {
      display: none;
   }
   
   /* Text overflow handling */
   .quiz-card h4 {
      word-wrap: break-word;
      overflow-wrap: break-word;
      hyphens: auto;
   }
   
   /* Badge text overflow */
   .quiz-card span[style*="max-width"] {
      display: inline-block;
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap;
   }
   
   /* Responsive image sizing */
   @media (max-width: 767px) {
      .quiz-card-image {
         height: 160px !important;
      }
      
      .quiz-card {
         min-height: 400px !important;
      }
   }
   
   @media (max-width: 575px) {
      .quiz-card-image {
         height: 140px !important;
      }
      
      .quiz-card {
         min-height: 380px !important;
      }
   }
   </style>

<!-- Mock Test Section -->
<section id="mock-tests" class="secPad" style="background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%); padding: 100px 0 60px 0;">
   <div class="container">
         <div class="row">
         <div class="col-md-12">
            <div class="section-title text-center" style="margin-bottom: 50px;">
               <h2 class="title" style="color: #333; font-size: 42px; font-weight: 700; margin-bottom: 15px;">
                  Mock <span style="color: #F1B900;">Test List</span>
               </h2>
               <div class="line_br mrauto" style="width: 100px; height: 4px; background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%); margin: 20px auto; border-radius: 2px;"></div>
               <p style="color: #666; font-size: 16px; margin-top: 15px;">Practice with our comprehensive mock test collection</p>
            </div>
         </div>
      </div>

      <!-- Messages -->
      <div class="row" style="margin-bottom: 10px;">
            <div class="col-md-12">
               <?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>
               <?php
               // Prioritize $message variable passed from controller over flashdata
               // This prevents flashdata from showing on multiple pages
               if (isset($message) && !empty($message)) {
                   echo $message;
               } elseif ($this->session->flashdata('message')) {
                   // Only read flashdata if $message is not set
                   $flash_msg = $this->session->flashdata('message');
                   echo $flash_msg;
                   // Clear flashdata after reading to prevent it from showing again
                   $this->session->set_flashdata('message', '');
               }
               ?>
            </div>
               </div>

      <!-- Main Content Layout: Filter Left, Quizzes Right -->
               <div class="row">
         <!-- Left Sidebar: Filter -->
         <div class="col-lg-3 col-md-4 col-sm-12" style="margin-bottom: 30px;">
            <div class="mock-filter-card" style="position: sticky; top: 100px;">
               <h4 style="margin-top: 0; margin-bottom: 20px; color: #2c3e50; font-weight: 700; font-size: 18px;">
                  <i class="fa fa-filter"></i> Filter
               </h4>
                  <form method="get" id="Search-form" action="<?= base_url('mock-test/' . $count) ?>">
                  <!-- Search by Exam Name or Code -->
                  <div class="form-group">
                     <label for="exam_name" class="control-label" style="font-size: 13px;">Search by Exam Name or Code</label>
                     <input name="exam_name" class="form-control" id="exam_name" placeholder="Enter Exam Name or Code" value="<?php if (isset($_GET['exam_name'])) { echo htmlspecialchars($_GET['exam_name']); }?>" autocomplete="off" style="font-size: 13px; padding: 5px 15px;">
                  </div>
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
                  <div class="mock-filter-buttons" style="margin-top: 20px;">
                     <button type="submit" class="btn btn-primary" style="width: 100%; margin-bottom: 10px;">
                        <i class="fa fa-search"></i> Search
                     </button>
                     <a href="<?= base_url('mock-test') ?>" style="width: 100%; display: block;">
                        <button type="button" class="btn btn-default" style="width: 100%;">
                           <i class="fa fa-refresh"></i> Reset
                        </button>
                     </a>
                     </div>

                  <!-- Commercial Filter -->
                  <?php if ($commercial) { ?>
                  <div style="margin-top: 25px; padding-top: 25px; border-top: 1px solid #e5e7eb;">
                     <label style="font-size: 13px; font-weight: 600; color: #2c3e50; margin-bottom: 12px; display: block;">Filter by Type</label>
                     <div style="display: flex; flex-direction: column; gap: 8px;">
                        <a href="<?= base_url('exam_control/view_all_mocks') ?>" class="btn btn-sm" style="background: #2c3e50; color: #fff; border: none; text-align: center; padding: 10px;">All</a>
                        <a href="<?= base_url('exam_control/mocks_type/paid') ?>" class="btn btn-sm" style="background: #F1B900; color: #fff; border: none; text-align: center; padding: 10px;">Paid</a>
                        <a href="<?= base_url('exam_control/mocks_type/free') ?>" class="btn btn-sm" style="background: #28a745; color: #fff; border: none; text-align: center; padding: 10px;">Free</a>
                     </div>
                  </div>
               <?php } ?>
               </form>
            </div>
         </div>

         <!-- Right Side: Mock Test Cards -->
         <div class="col-lg-9 col-md-8 col-sm-12">
            <!-- Total Exams & Sort By Filter - Right Side -->
            <div style="margin-bottom: 25px; display: flex; justify-content: space-between; align-items: center; gap: 15px; flex-wrap: wrap;">
               <!-- Total Exams Count - Left Side -->
               <div style="display: flex; align-items: center; gap: 8px;">
                  <span style="font-size: 14px; font-weight: 600; color: #2c3e50;">
                     <i class="fa fa-file-text-o" style="margin-right: 5px; color: #F1B900;"></i>
                     Total Exams: <strong style="color: #F1B900;"><?= isset($total_exams) ? number_format($total_exams) : '0' ?></strong>
                  </span>
               </div>
               
               <!-- Sort By Filter - Right Side -->
               <form method="get" id="Sort-form" style="display: flex; align-items: center; gap: 10px;">
                  <!-- Preserve other GET parameters -->
                  <?php if (isset($_GET['exam_name']) && $_GET['exam_name']): ?>
                     <input type="hidden" name="exam_name" value="<?= htmlspecialchars($_GET['exam_name']) ?>">
                  <?php endif; ?>
                  <?php if (isset($_GET['main_category']) && $_GET['main_category']): ?>
                     <input type="hidden" name="main_category" value="<?= htmlspecialchars($_GET['main_category']) ?>">
                  <?php endif; ?>
                  <?php if (isset($_GET['sub_category']) && $_GET['sub_category']): ?>
                     <input type="hidden" name="sub_category" value="<?= htmlspecialchars($_GET['sub_category']) ?>">
                  <?php endif; ?>
                  <?php if (isset($_GET['sub_sub_category']) && $_GET['sub_sub_category']): ?>
                     <input type="hidden" name="sub_sub_category" value="<?= htmlspecialchars($_GET['sub_sub_category']) ?>">
                  <?php endif; ?>
                  
                  <label for="sort_by" style="font-size: 14px; font-weight: 600; color: #2c3e50; margin: 0; white-space: nowrap;">Sort By:</label>
                  <select name="sort_by" class="form-control" id="sort_by" style="font-size: 13px; padding: 8px 15px; border: 2px solid #e5e7eb; border-radius: 8px; min-width: 180px; cursor: pointer; background-color: #fff; color: #2c3e50;">
                     <option value="most_attempted" <?php if (isset($_GET['sort_by']) && $_GET['sort_by'] == 'most_attempted') echo 'selected'; ?>>Most Attempted</option>
                     <option value="new_exam" <?php if (isset($_GET['sort_by']) && $_GET['sort_by'] == 'new_exam') echo 'selected'; ?>>New Exam</option>
                     <option value="old_exam" <?php if (isset($_GET['sort_by']) && $_GET['sort_by'] == 'old_exam') echo 'selected'; ?>>Old Exam</option>
                  </select>
               </form>
            </div>
            
            <!-- Mock Test Cards -->
            <div class="row" style="margin-left: -10px; margin-right: -10px;">
                  <?php
                  if (isset($mocks) and !empty($mocks)) {
            // Use consistent color theme for all cards
            $consistent_theme = ['start' => '#F1B900', 'end' => '#ff8c00']; // Gold to Orange
                     $i = 1;
                     foreach ($mocks as $mock) {
                        if (($mock->exam_active == 1) && ($mock->public == 1)) {
                  $hr = (int) substr($mock->time_duration, 0, 2);
                  $minutes = substr($mock->time_duration, -5, 5);
                  
                  // Format exam code
                  $exam_code = '';
                  if(strlen($mock->title_id) == 1) {
                     $exam_code = 'MT00'.$mock->title_id;
                  } else if(strlen($mock->title_id) == 2) {
                     $exam_code = 'MT0'.$mock->title_id;
                                                } else if(strlen($mock->title_id) == 3) {
                     $exam_code = 'MT'.$mock->title_id;
                  }
                  
                  // Check if image exists - only show images to logged-in users
                  $has_image = false;
                  $image_path = '';
                  if ($this->session->userdata('log')) {
                     if (!empty($mock->feature_img_name) && file_exists('uploads/exam-images/' . $mock->feature_img_name)) {
                        $has_image = true;
                        $image_path = base_url('uploads/exam-images/' . $mock->feature_img_name);
                     } else if (file_exists('uploads/exam-images/placeholder.png')) {
                        $has_image = true;
                        $image_path = base_url('uploads/exam-images/placeholder.png');
                     }
                  }
         ?>
                  <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12" style="padding-left: 10px; padding-right: 10px; margin-bottom: 20px;">
                     <div class="quiz-card" style="background: #fff; border-radius: 16px; box-shadow: 0 6px 20px rgba(0,0,0,0.1); overflow: hidden; transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); height: 100%; min-height: 420px; display: flex; flex-direction: column; ">
                        <?php 
                           // Clean title - remove HTML tags and escape special characters
                           $clean_title = htmlspecialchars(strip_tags($mock->title_name));
                           // Truncate title if too long
                           $display_title = mb_strlen($clean_title) > 60 ? mb_substr($clean_title, 0, 60) . '...' : $clean_title;
                        ?>
                        <!-- Image Section -->
                        <?php if ($has_image) : ?>
                           <div class="quiz-card-image" style="width: 100%; height: 180px; overflow: hidden; position: relative; background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%);">
                              <img src="<?= $image_path ?>" 
                                   alt="<?= $clean_title ?>" 
                                   style="width: 100%; height: 100%; object-fit: cover; display: block; transition: transform 0.4s ease;"
                                   onerror="this.style.display='none'; this.parentElement.style.background='linear-gradient(135deg, #F1B900 0%, #ff8c00 100%)';">
                              <!-- Gradient overlay for better text readability -->
                              <div style="position: absolute; bottom: 0; left: 0; right: 0; height: 80px; background: linear-gradient(to top, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0.3) 50%, transparent 100%); pointer-events: none;"></div>
                              <!-- Title overlay on image -->
                              <div style="position: absolute; bottom: 0; left: 0; right: 0; padding: 15px 18px; z-index: 2;">
                                 <h4 style="margin: 0; font-size: 17px; font-weight: 700; line-height: 1.4; color: #fff; text-shadow: 0 2px 10px rgba(0,0,0,0.5); word-wrap: break-word; overflow-wrap: break-word;">
                                    <?= $display_title ?>
                                 </h4>
                              </div>
                           </div>
                        <?php else : ?>
                           <!-- No Image - Show gradient header with title -->
                           <div class="quiz-card-header" style="background: linear-gradient(135deg, <?= $consistent_theme['start'] ?> 0%, <?= $consistent_theme['end'] ?> 100%); padding: 20px 18px; color: #fff; position: relative; overflow: hidden; min-height: 120px; display: flex; flex-direction: column; justify-content: center;">
                              <div style="position: absolute; top: -50%; right: -50%; width: 200%; height: 200%; background: radial-gradient(circle, rgba(255, 255, 255, 0.15) 0%, transparent 70%);"></div>
                              <h4 style="margin: 0 0 15px 0; font-size: 17px; font-weight: 700; line-height: 1.4; display: flex; align-items: flex-start; gap: 10px; position: relative; z-index: 1; word-wrap: break-word; overflow-wrap: break-word;">
                                 <i class="fa fa-file-text-o" style="font-size: 20px; opacity: 0.95; flex-shrink: 0; margin-top: 2px;"></i>
                                 <span style="flex: 1;"><?= $display_title ?></span>
                              </h4>
                           </div>
                        <?php endif; ?>
                        
                        <!-- Badges Section -->
                        <div style="padding: 15px 18px; background: #f8f9fa; border-bottom: 1px solid #e5e7eb; display: flex; flex-wrap: wrap; gap: 8px; align-items: center;">
                              <?php if (!empty($mock->category_name)) : ?>
                              <span style="display: inline-flex; align-items: center; gap: 6px; padding: 6px 12px; background: #fff; border: 1px solid #e5e7eb; border-radius: 20px; font-size: 11px; font-weight: 600; color: #2c3e50; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
                                 <i class="fa fa-folder" style="font-size: 11px; color: <?= $consistent_theme['start'] ?>;"></i>
                                 <span style="max-width: 150px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><?= htmlspecialchars($mock->category_name . ($mock->sub_cat_name ? ' / ' . $mock->sub_cat_name : '')) ?></span>
                                       </span>
                              <?php endif; ?>
                              <?php if (!empty($mock->random_ques_no)) : ?>
                              <span style="display: inline-flex; align-items: center; gap: 6px; padding: 6px 12px; background: #fff; border: 1px solid #e5e7eb; border-radius: 20px; font-size: 11px; font-weight: 600; color: #2c3e50; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
                                 <i class="fa fa-list-ol" style="font-size: 11px; color: <?= $consistent_theme['start'] ?>;"></i>
                                       <?= $mock->random_ques_no ?> Questions
                                    </span>
                              <?php endif; ?>
                              <?php if (!empty($exam_code)) : ?>
                              <span style="display: inline-flex; align-items: center; gap: 6px; padding: 6px 12px; background: #fff; border: 1px solid #e5e7eb; border-radius: 20px; font-size: 11px; font-weight: 600; color: #2c3e50; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
                                 <i class="fa fa-barcode" style="font-size: 11px; color: <?= $consistent_theme['start'] ?>;"></i>
                                       <?= $exam_code ?>
                                    </span>
                              <?php endif; ?>
                        </div>
                        
                        <!-- Card Body -->
                        <div class="quiz-card-body" style="padding: 18px; flex-grow: 1; display: flex; flex-direction: column; background: #fff;">
                           <!-- Syllabus/Description -->
                           <?php if (!empty($mock->syllabus)) : ?>
                              <?php 
                                 $syllabus_text = strip_tags($mock->syllabus);
                                 $syllabus_display = mb_strlen($syllabus_text) > 120 ? mb_substr($syllabus_text, 0, 120) . '...' : $syllabus_text;
                              ?>
                              <p style="color: white; font-size: 13px; line-height: 1.7; margin: 0 0 15px 0; flex-grow: 1; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; word-wrap: break-word; overflow-wrap: break-word;">
                                 <?= htmlspecialchars($syllabus_display) ?>
                              </p>
                           <?php else : ?>
                              <div style="flex-grow: 1;"></div>
                           <?php endif; ?>
                           
                           <!-- Footer Info -->
                           <div style="display: flex; justify-content: space-between; align-items: center; margin-top: auto; padding-top: 15px; border-top: 1px solid #e5e7eb;">
                              <div style="display: flex; flex-direction: column; gap: 6px; flex: 1; min-width: 0;">
                                 <?php if (!empty($mock->created_byy)) : ?>
                                    <span style="color:white; font-size: 11px; font-weight: 500; display: flex; align-items: center; gap: 6px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                       <i class="fa fa-user" style="color: <?= $consistent_theme['start'] ?>; font-size: 12px; flex-shrink: 0;"></i>
                                       <span style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><?= htmlspecialchars($mock->created_byy) ?></span>
                                    </span>
                                 <?php endif; ?>
                                 <?php if (!empty($mock->time_duration)) : ?>
                                    <span style="color: white; font-size: 11px; font-weight: 500; display: flex; align-items: center; gap: 6px;">
                                       <i class="fa fa-clock-o" style="color: <?= $consistent_theme['start'] ?>; font-size: 12px; flex-shrink: 0;"></i>
                                       <?= ($hr) ? $mock->time_duration . ' hours' : $minutes . ' minutes'; ?>
                                    </span>
                                 <?php endif; ?>
                              </div>
                              <a href="<?= base_url('mock-test-details/' . $mock->slug); ?>" 
                                 class="btn btn-primary" 
                                 style="background: linear-gradient(135deg, <?= $consistent_theme['start'] ?> 0%, <?= $consistent_theme['end'] ?> 100%); border: none; border-radius: 25px; padding: 10px 20px; font-size: 13px; font-weight: 600; color: rgb(42, 61, 81); box-shadow: 0 4px 12px rgba(241, 185, 0, 0.4); transition: all 0.3s ease; white-space: nowrap; flex-shrink: 0; margin-left: 10px;"
                                 onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 16px rgba(241, 185, 0, 0.5)';"
                                 onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(241, 185, 0, 0.4)';">
                                 <i class="fa fa-play-circle" style="margin-right: 5px;"></i> Start
                              </a>
                           </div>
                           
                           <!-- Social Sharing -->
                           <?php if($this->session->userdata('type') != 'andriod') { ?>
                           <div class="social-sharing" style="display: flex !important; gap: 10px; margin-top: 15px; justify-content: center; padding-top: 15px; border-top: 1px solid #e5e7eb;">
                              <a href="javascript:void(0)" class="whatsapp" data-text="<?= $clean_title; ?>" data-link="<?= base_url('mock-test-details/' . $mock->slug); ?>" title="Share on WhatsApp" style="text-decoration: none; min-width: 90px; height: 40px; display: flex; align-items: center; justify-content: center; border-radius: 8px; background: rgba(241, 185, 0, 0.1) !important; border: 2px solid rgba(241, 185, 0, 0.3) !important; transition: all 0.3s ease; padding: 8px 15px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);">
                                 <img src="<?= base_url('assets/images/share.png') ?>" alt="WhatsApp Share" style="width: 90px; height: auto; max-height: 30px; object-fit: contain; display: block; background: transparent;">
                              </a>
                              <a href="https://www.facebook.com/sharer.php?u=<?= base_url('mock-test-details') . '/' . $mock->slug; ?>&title=<?= urlencode($clean_title); ?>" onclick="FbShare('<?= htmlspecialchars($mock->sub_cat_name) ?>','<?= htmlspecialchars($mock->feature_img_name); ?>','<?= htmlspecialchars($mock->slug); ?>','<?= htmlspecialchars($mock->created_byy); ?>','<?= ($hr) ? $mock->time_duration . ' hours' : $minutes . ' minutes'; ?>','<?= $mock->random_ques_no; ?>')" target="_blank" title="Share on Facebook" style="text-decoration: none; min-width: 90px; height: 40px; display: flex; align-items: center; justify-content: center; border-radius: 8px; background: rgba(241, 185, 0, 0.1) !important; border: 2px solid rgba(241, 185, 0, 0.3) !important; transition: all 0.3s ease; padding: 8px 15px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);">
                                 <img src="<?= base_url('assets/images/fb.png'); ?>" alt="Facebook Share" style="width: 90px; height: auto; max-height: 30px; object-fit: contain; display: block; background: transparent;">
                              </a>
                           </div>
                           <?php } ?>
                        </div>
                     </div>
                  </div>
         <?php 
                  $i++;
               }
            }
         } else {
         ?>
            <div class="col-md-12">
               <div style="text-align: center; padding: 60px 20px; color: #666;">
                  <i class="fa fa-inbox" style="font-size: 48px; color: #ccc; margin-bottom: 15px;"></i>
                  <h3 style="color: #999; margin: 15px 0;">No Mock Test Found</h3>
                  <p>Please try different search criteria or filters.</p>
               </div>
            </div>
         <?php } ?>
            </div>

            <!-- Pagination -->
            <?php if (isset($mocks) && !empty($mocks) && !isset($_GET['exam_code'])) { ?>
            <div class="row" style="margin-top: 30px;">
               <div class="col-md-12">
                  <div id="pagination" style="text-align: center; padding: 20px 0;">
                        <ul class="tsc_pagination">
                           <?php foreach ($links as $link) {
                              echo "<li>" . $link . "</li>";
                           } ?>
                        </ul>
                     </div>
               </div>
            </div>
            <?php } ?>
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
    
    // Auto-submit sort form when sort_by changes
    $('#sort_by').on('change', function() {
        $('#Sort-form').submit();
    });
    
    // Allow Enter key to submit form in exam_name input
    $('#exam_name').on('keypress', function(e) {
        if (e.which === 13) { // Enter key
            e.preventDefault();
            $('#Search-form').submit();
        }
    });
    
    // Preserve all form values when submitting
    $('#Search-form').on('submit', function() {
        // All values are already in the form, so they will be submitted automatically
        return true;
    });
    
    // When sort form submits, also preserve exam_name if it exists
    $('#Sort-form').on('submit', function() {
        var examName = $('#exam_name').val();
        if (examName) {
            if (!$('#Sort-form input[name="exam_name"]').length) {
                $('#Sort-form').append('<input type="hidden" name="exam_name" value="' + examName + '">');
            }
        }
        return true;
    });
});
</script>
