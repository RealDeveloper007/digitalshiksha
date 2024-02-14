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

   .change-box-s {
      display: flex;
   }

   .box-header {
      padding: 19px 17px;
   }

   .change-box-s form {
      display: flex;
   }

   .change-box-s .form-group.rental_details {
      padding-right: 55px !important;
      display: flex;
   }

   .change-box-s .form-group.rental_details label {
      text-align: left;
      padding-right: 8px;
   }
</style>
<section id="exams" class="secPad myBox useList">
   <div class="container">
      <div class="box">
         <div class="row">
            <h1 class="text-uppercase text-center h1"><strong>Study Material List</strong></h1>
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
                  <form method="get" id="Search-form">
                     <div class="form-group rental_details col-sm-3">
                        <label for="operator_id" class="control-label required">Main Category</label>
                        <div>
                           <select name="main_category" class="form-control">
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
                        <!-- <label for="operator_id" class="control-label required">Action</label> -->
                        <div class="filBtn">
                           <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
                           <a href="<?= base_url('study-material') ?>"><button type="button" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i></button></a>
                        </div>
                     </div>
                  </form>
               </div>

               <div class="exam-list">
                  <?php
                  if (isset($syllabus) and !empty($syllabus)) {
                     $i = 1;
                     foreach ($syllabus as $ssyllabus) {
                  ?>
                        <div class="col-lg-3 col-md-4 col-xs-12 col-sm-6 exam-item">
                           <div class="thumbnail">
                              <?php if ($ssyllabus->icon_class && file_exists('category_images/' . $ssyllabus->icon_class)) { ?>
                                 <img class="exam-thumbnail" src="<?= base_url('category_images/' . $ssyllabus->icon_class); ?>" data-src="holder.js/300x300" alt="...">
                              <?php } else { ?>
                                 <img class="exam-thumbnail" src="<?= base_url('exam-images/placeholder.png'); ?>" data-src="holder.js/300x300" alt="...">
                              <?php } ?>
                              <div class="caption">
                                 <span class="exam-category text-danger"><?= $ssyllabus->name; ?></span>

                                 <div class="startBtn">
                                    <?php if ($ssyllabus->name == 'LONG ANSWER') { ?>

                                       <a href="<?= base_url('study-material/long-answer-details/' . $ssyllabus->id); ?>"><button class="btn btn-sm btn-primary">View</button> </a>

                                    <?php } else if ($ssyllabus->name == 'VIDEO') { ?>

                                       <a href="<?= base_url('study-material/video-details/' . $ssyllabus->id); ?>"><button class="btn btn-sm btn-primary">View</button> </a>

                                    <?php } else if ($ssyllabus->name == 'PDF') { ?>

                                       <a href="<?= base_url('study-material/pdf-details/' . $ssyllabus->id); ?>"><button class="btn btn-sm btn-primary">View</button> </a>

                                    <?php } else if ($ssyllabus->name == 'MCQ') { ?>

                                       <a href="<?= base_url('study-material/mcq/' . $ssyllabus->id); ?>"><button class="btn btn-sm btn-primary">View</button> </a>

                                    <?php } ?>
                                 </div>


                              </div>
                           </div>
                        </div>
                  <?php $i++;
                     }
                  } else {
                     echo '<h4>No Study Material found! Please search by category</h4>';
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
<script>
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


   $('select[name="main_category"]').on('change', function() {
      $.LoadingOverlay('show');

      var category = $(this).val();
      var link = '<?php echo base_url() ?>' + 'admin_control/get_subcategories_ajax/' + category;
      $.ajax({
         data: category,
         url: link
      }).done(function(subcategories) {
         $.LoadingOverlay('hide');

         console.log(subcategories);
         if (subcategories) {
            $('select[name="sub_category"]').empty().html(subcategories);
         } else {

            $('select[name="sub_category"]').empty().html('<option value="">No sub categories found</option>');
         }
      });
   });

   $('select[name="sub_category"]').change(function() {
      $.LoadingOverlay('show');

      var sub_category = $(this).val();
      var link = '<?php echo base_url() ?>' + 'admin_control/get_sub_subcategories_ajax/' + sub_category;
      $.ajax({
         data: sub_category,
         url: link
      }).done(function(subcategories) {
         $.LoadingOverlay('hide');

         console.log(subcategories);
         $('#sub_sub_category').html(subcategories);
      });
   });
</script>