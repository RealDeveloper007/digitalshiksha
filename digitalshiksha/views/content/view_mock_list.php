<link href="<?php echo base_url('assets/css/mock_list.css') ?>" rel="stylesheet" media="screen">
<style>
   .filBtn
   {
      margin-top: 24px !important;
   }
   .filBtn button.btn.btn-primary 
   {
    height: 49px;
   }
   span.pull-right.exam_code_data {
      background: blue;
      color: white;
      padding: 5px 10px;
      font-size: 12px;
      line-height: 1.5;
   }
   span.pull-right.exam_code_data:hover {
    background: #F1B900;
}
   </style>
<section id="exams" class="secPad myBox useList">
   <div class="container">
      <div class="box">
         <div class="row">
            <h1 class="text-uppercase text-center h1"><strong>Mock Test List</strong></h1>
            <div class="line_br mrauto"></div>
         </div>
         <div class="row">
            <div class="col-md-12">
               <?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>
               <?= ($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>
               <?= (isset($message)) ? $message : ''; ?>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row">
            <form method="get" id="Search-by-exam-code-form" action="<?= base_url('mock-test') ?>">

                  <div class="form-group rental_details col-sm-12">
                           <label for="exam_code" class="control-label required">Exam Code</label>
                           <div>
                              <input name="exam_code" class="form-control" id="exam_code" placeholder="Press Enter key after type Exam Code" value="<?php if (isset($_GET['exam_code'])) { echo $_GET['exam_code']; }?>" autocomplete="off">
                           </div>
                        </div> 
            </form>
            </div>
               </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

               <div class="row">
                  <form method="get" id="Search-form" action="<?= base_url('mock-test/' . $count) ?>">
                     <div class="form-group rental_details col-sm-3">
                        <label for="operator_id" class="control-label required">Main Category</label>
                        <div>
                           <select name="main_category" class="form-control" required>
                              <?php if (isset($_GET['main_category'])) {
                                 echo MainCategory($_GET['main_category']);
                              } else {
                                 echo MainCategory();
                              }
                              ?>
                           </select>
                        </div>
                     </div>
                     <div class="form-group rental_details col-sm-3">
                        <label for="equipments" class="control-label required">Sub Category</label>
                        <div>
                           <select name="sub_category" class="form-control" required>
                              <?php
                              if (isset($_GET['main_category']) && !isset($_GET['sub_category'])) {
                                 echo SubCategory($_GET['main_category']);
                              } else if (isset($_GET['main_category']) && isset($_GET['sub_category'])) {
                                 echo SubCategory($_GET['main_category'], $_GET['sub_category']);
                              } else {
                                 echo "<option value='' disbale selected> Select Sub Category</option>";
                              }
                              ?>
                           </select>
                        </div>
                     </div>
                     <div class="form-group rental_details col-sm-3">
                        <label for="equipments" class="control-label required">Sub Sub Category</label>
                        <div>
                           <select name="sub_sub_category" class="form-control" id="sub_sub_category" required>
                              <?php
                              if (isset($_GET['sub_category']) && isset($_GET['sub_sub_category'])) {
                                 echo SubSubCategory($_GET['sub_category'], $_GET['sub_sub_category']);
                              } else {
                                 echo "<option value='' disbale selected> Select Sub Sub Category</option>";
                              }
                              ?>
                           </select>
                        </div>
                     </div>

                     <div class="col-sm-3 ">
                        <div class="filBtn">
                           <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                           <a href="<?= base_url('mock-test') ?>"><button type="button" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> Reset</button></a>
                        </div>
                     </div>
                  </form>
               </div>

               <?php if ($commercial) { ?>
                  <div class="btn-group pull-right">
                     <a href="<?= base_url('exam_control/view_all_mocks') ?>" class="btn btn-sm btn-default">All</a>
                     <a href="<?= base_url('exam_control/mocks_type/paid') ?>" class="btn btn-sm btn-default">Paid</a>
                     <a href="<?= base_url('exam_control/mocks_type/free') ?>" class="btn btn-sm btn-default">Free</a>
                  </div>
               <?php } ?>
               <div class="exam-list">
                  <?php
                  if (isset($mocks) and !empty($mocks)) {
                     $i = 1;
                     foreach ($mocks as $mock) {
                        if (($mock->exam_active == 1) && ($mock->public == 1)) {
                           $hr = (int) substr($mock->time_duration, 0, 2); // returns hr 
                           $minutes = substr($mock->time_duration, -5, 5); // returns minutes 
                  ?>
                           <div class="col-lg-3 col-md-4 col-xs-12 col-sm-6 exam-item">
                              <div class="thumbnail">
                                 <?php if ($mock->feature_img_name && file_exists('exam-images/' . $mock->feature_img_name)) { ?>
                                    <img class="exam-thumbnail" src="<?= base_url('exam-images/' . $mock->feature_img_name); ?>" data-src="holder.js/300x300" alt="...">
                                 <?php } else { ?>
                                    <img class="exam-thumbnail" src="<?= base_url('exam-images/placeholder.png'); ?>" data-src="holder.js/300x300" alt="...">
                                 <?php } ?>
                                 <div class="caption">
                                    <span class="exam-category text-danger"><?= $mock->category_name . '/' . $mock->sub_cat_name; ?></span>
                                    <span class="exam-title"><?= $mock->title_name; ?></span>
                                    <span class="created_by">Quiz Master : <?= $mock->created_byy; ?></span>


                                    <div class="showTime">
                                       <time class="total-question"><?= $mock->random_ques_no; ?> questions</time>
                                       <div class="exam-duration"><?= ($hr) ? $mock->time_duration . ' hours' : $minutes . ' minutes'; ?></div>
                                    </div>
                                    <div class="startBtn">
                                       <a href="<?= base_url('mock-test-details/' . $mock->slug); ?>"><button class="btn btn-sm btn-primary">Start</button> </a>

                                       <span class="pull-right exam_code_data" title="Exam Code">
                                          <?php 

                                                if(strlen($mock->title_id) == 1)
                                                {
                                                   echo 'MT00'.$mock->title_id;

                                                } else if(strlen($mock->title_id) == 2)
                                                {
                                                   echo 'MT0'.$mock->title_id;

                                                } else if(strlen($mock->title_id) == 3) {

                                                   echo 'MT'.$mock->title_id;
                                                }
                                       
                                          ?>
                                       </span>
                                    </div>
                                    <?php if($this->session->userdata('type') != 'andriod') { ?>
                                    <div class="socialimg">
                                       <a href="javascript:void(0)" class="whatsapp" data-text="<?= $mock->title_name; ?>" data-link="<?= base_url('mock-test-details/' . $mock->slug); ?>">
                                          <img src="<?= base_url('assets/images/share.png') ?>">
                                       </a>
                                       <a href="https://www.facebook.com/sharer.php?u=<?= base_url('mock-test-details') . '/' . $mock->slug; ?>&title=<?= $mock->title_name; ?>" onclick="FbShare('<?= $mock->sub_cat_name ?>','<?= $mock->feature_img_name; ?>','<?= $mock->slug; ?>','<?= $mock->created_byy; ?>','<?= ($hr) ? $mock->time_duration . ' hours' : $minutes . ' minutes'; ?>','<?= $mock->random_ques_no; ?>')" target="_blank"> <img class="img-responsive" src="<?= base_url('assets/images/fb.png'); ?>">
                                       </a>
                                    </div>
                                    <?php } ?>

                                 </div>
                              </div>
                           </div>
                     <?php $i++;
                        }
                     }
                     ?>
                     <div id="pagination">
                        <?php if (!isset($_GET['exam_code'])) { ?>
                        <ul class="tsc_pagination">
                           <!-- Show pagination links -->
                           <?php foreach ($links as $link) {
                              echo "<li>" . $link . "</li>";
                           } ?>
                        </ul>
                        <?php } ?>
                     </div>
                  <?php
                  } else {
                     echo '<h4>No Mock Test found!</h4>';
                  }
                  ?>
               </div>
               <!-- /.exam-list -->
            </div>
            <!--/.col-md-10-->
         </div>
         <!--/.row-->
      </div>
      <!--/.box-->
   </div>
   <!--/.container-->
</section>
<!--/#emaxs-->