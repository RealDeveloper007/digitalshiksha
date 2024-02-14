<style>


div#pagination {
    width: 100%;
}
   .nav > li > a {
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
   .pagination a {
    margin: 10px;
    background: #191a70;
    padding: 9px;
    color: white;
}
a.page.active {
    background: #f1b900;
}
</style>
<script type="text/javascript" src="//connect.facebook.net/en_US/sdk.js"></script>
<section id="exams" class="secPad myBox useList">
   <div class="container">
      <div class="box">
         <div class="row">
            <h1 class="text-uppercase text-center h1"><strong>Mock Test List</strong></h1>
            <div class="line_br mrauto"></div>
         </div>
         <div class="row">
            <div class="col-md-12">
               <?=validation_errors('<div class="alert alert-danger">', '</div>'); ?>
               <?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>        
               <?=(isset($message)) ? $message : ''; ?>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <!--  <form method="get">
                  <select name="main_category" class="form-control">
                  
                  </select>
                  
                  <select name="sub_category" class="form-control">
                  
                  </select>
                  
                  <button type="submit" class="btn btn-primary">Search</button>
                  <button type="button" class="btn btn-danger">Reset</button>
                  </form> -->
               <div class="row">
                  <form method="get" id="Search-form" action="<?= base_url('exam_control/view_all_mocks/'.$count) ?>">
                     <div class="form-group rental_details col-sm-3">
                        <label for="operator_id" class="control-label required">Main Category</label>
                        <div>
                           <select name="main_category" class="form-control">
                           <?php  if(isset($_GET['main_category'])) { 
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
                              if(isset($_GET['main_category']) && !isset($_GET['sub_category'])) {
                                echo SubCategory($_GET['main_category']); 
                               } else if(isset($_GET['main_category']) && isset($_GET['sub_category'])) { 
                                echo SubCategory($_GET['main_category'],$_GET['sub_category']); 
                              
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
                              if(isset($_GET['sub_category']) && isset($_GET['sub_sub_category'])) {
                                echo SubSubCategory($_GET['sub_category'],$_GET['sub_sub_category']); 
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
                           <a href="<?= base_url('exam_control/view_all_mocks') ?>"><button type="button" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i></button></a>
                        </div>
                     </div>
                  </form>
               </div>
               <?php if ($commercial) { ?>
               <div class="btn-group pull-right">
                  <a href="<?=base_url('exam_control/view_all_mocks') ?>" class="btn btn-sm btn-default">All</a>
                  <a href="<?=base_url('exam_control/mocks_type/paid') ?>" class="btn btn-sm btn-default">Paid</a>
                  <a href="<?=base_url('exam_control/mocks_type/free') ?>" class="btn btn-sm btn-default">Free</a>
               </div>
               <?php } ?>                
               <div class="exam-list">
                  <?php 
                     if (isset($mocks) AND !empty($mocks)) {  $i = 1;
                         foreach ($mocks as $mock) {
                             if (($mock->exam_active == 1) && ($mock->public == 1)) {
                                 $hr = (int) substr($mock->time_duration, 0, 2); // returns hr 
                                 $minutes =substr($mock->time_duration, -5, 5); // returns minutes 
                     ?>
                  <div class="col-lg-3 col-md-4 col-xs-12 col-sm-6 exam-item">
                     <div class="thumbnail">
                        <?php if ($mock->feature_img_name && file_exists('exam-images/'.$mock->feature_img_name)) { ?>
                        <img class="exam-thumbnail" src="<?=base_url('exam-images/'.$mock->feature_img_name); ?>" data-src="holder.js/300x300" alt="...">
                        <?php }else{ ?>
                        <img class="exam-thumbnail" src="<?=base_url('exam-images/placeholder.png'); ?>" data-src="holder.js/300x300" alt="...">
                        <?php } ?>
                        <div class="caption">
                           <span class="exam-category text-danger"><?=$mock->category_name.'/'.$mock->sub_cat_name;?></span>
                           <span class="exam-title"><?=$mock->title_name;?></span>
                           <span class="created_by">Quiz Master : <?= $mock->created_byy; ?></span>
                    

                           <div class="showTime">
                             <time class="total-question" ><?=$mock->random_ques_no;?> questions</time>
                             <div class="exam-duration" ><?=($hr)?$mock->time_duration.' hours':$minutes.' minutes';?></div>
                           </div>
                           <div class="startBtn">
                           <a href="<?=base_url('exam_control/view_exam_summery/'.$mock->title_id); ?>"><button class="btn btn-sm btn-primary">Start</button> </a>
                           </div>
						   
                           <div class="socialimg">
                               <a href="javascript:void(0)" class="whatsapp" data-text="<?=$mock->title_name;?>" data-link="<?=base_url('exam_control/view_exam_summery/'.$mock->title_id); ?>">
                                  <img src="<?= base_url('assets/images/share.png') ?>">
                               </a>
                               <a href="javascript:void(0)" onclick="FbShare('<?= $mock->sub_cat_name?>','<?= $mock->feature_img_name;?>','<?= $mock->title_id; ?>','<?= $mock->created_byy; ?>','<?=($hr)?$mock->time_duration.' hours':$minutes.' minutes';?>','<?=$mock->random_ques_no;?>')">  <img class="img-responsive" src="<?=base_url('assets/images/fb.png'); ?>">
                               </a>
                           </div>
                   
                        </div>
                     </div>
                  </div>
                  <?php           $i++;
                     }
                     }
                     ?>
                      <div id="pagination">

                     <ul class="tsc_pagination">
                                <!-- Show pagination links -->
                                <?php foreach ($links as $link) {
                                    echo "<li>". $link."</li>";
                                } ?>
                    </ul>
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

<!-- <div id="shareBtn" class="btn btn-success clearfix">Share Dialog</div>

 document.getElementById('shareBtn').onclick = function() {
  FB.ui({
    app_id:629958428806352,
    display: 'popup',
    method: 'share',
    href: 'https://developers.facebook.com/docs/',
  }, function(response){});
}
 -->

<script>

   

   $(document).ready(function() {
        $('.whatsapp').on("click", function(e) {
           if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
               var article = $(this).attr("data-text");
               var weburl = $(this).attr("data-link");
               var whats_app_message = encodeURIComponent(document.URL);
               var whatsapp_url = "whatsapp://send?text="+weburl;
               window.location.href= whatsapp_url;
           }else{
                alert('You Are Not On A Mobile Device. Please Use This Button To Share On Mobile');
           }
        });
     });
     
    // Hide Nav Bar
    function HideNav(id)
   {
       $("#nav"+id).hide(500);
       $("#plus"+id).show();
       $("#minus"+id).hide();
   }
   
   // Show Nav Bar
    function ShowNav(Id)
   {
       $("#nav"+Id).show(500);
       $("#plus"+Id).hide();
       $("#minus"+Id).show();
   }
</script>
<script>
   // this loads the Facebook API
     (function (d, s, id) {
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) { return; }
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
     }(document, 'script', 'facebook-jssdk'));
   
     window.fbAsyncInit = function () {
         var appId = '532781562009303';
         FB.init({
             appId: appId,
			 status: true,
			 cookie:true,
             //xfbml: true,
             version: 'v2.10'
         });
     };
   
     // FB Share with custom OG data.
       function FbShare(name,image,id,master,time,que) 
	   {
            
                 // Dynamically gather and set the FB share data. 
                 var FBDesc      = "Quiz Master : "+master+", Exam Time : "+time+", Total Questions : "+que;
                 var FBTitle     = name;
                 var FBLink      = 'https://digitalshikshadarpan.com/exam_control/view_exam_summery/'+id;
                 var FBPic       = 'https://digitalshikshadarpan.com/exam-images/'+image;
				 
				 // og:title, og:title, og:url, og:description, og:type, og:image
				 
				 $('meta[property="og:title"]'). attr("content", FBTitle);
				 $('meta[property="og:url"]'). attr("content", FBLink);
				 $('meta[property="og:description"]'). attr("content", FBDesc);
				 $('meta[property="og:type"]'). attr('content', 'asasasas');
				 $('meta[property="og:image"]'). attr("content", FBPic);
				 
				 // window.open('https://www.facebook.com/sharer/sharer.php?u='+ FBLink +'?title='+ FBTitle, '_blank');

   
                 // Open FB share popup
				 
				 
                 FB.ui({
                     method: 'share',
					 href: $(location).attr('href') + '?og_img=' + FBPic,
                    // action_type: 'og.shares',
                     // action_properties: JSON.stringify({
                         // object: {
                             // 'og:url': FBLink,
                             // 'og:title': FBTitle,
                             // 'og:description': FBDesc,
                             // 'og:image': FBPic
                         // }
                     // })
                 },
                 function (response) {
                 alert(response);
                 })
				 
          };
   
     
     // $('html,body').animate({
     //         scrollTop: $(".exam-list").offset().top},
     //         'slow');
   
    $('select[name="main_category"]').on('change', function() {
        $.LoadingOverlay('show');
   
         var category = $(this).val();
         var link = '<?php echo base_url()?>'+'admin_control/get_subcategories_ajax/'+category;
         $.ajax({
             data: category,
             url: link
         }).done(function(subcategories) {
   $.LoadingOverlay('hide');
   
             console.log(subcategories);
             if(subcategories)
             {
                 $('select[name="sub_category"]').empty().html(subcategories);
             } else {
   
                 $('select[name="sub_category"]').empty().html('<option value="">No sub categories found</option>');
             }
         });
     }); 
     
     $('select[name="sub_category"]').change(function() {
        $.LoadingOverlay('show');
   
     var sub_category = $(this).val();
     var link = '<?php echo base_url()?>'+'admin_control/get_sub_subcategories_ajax/'+sub_category;
     $.ajax({
         data: sub_category,
         url: link
     }).done(function(subcategories) {
   $.LoadingOverlay('hide');
   
         console.log(subcategories);
         $('#sub_sub_category').html(subcategories);
     });
   });
     
     /* $('select[name="sub_category"]').on('change', function() {
                $('#Search-form').submit();
     }); */
	 
	 
	 
	 
	 
	 
</script>