<script src="<?= base_url('assets/pdf_viewer/js/html2canvas.min.js') ?>"></script>
<script src="<?= base_url('assets/pdf_viewer/js/three.min.js') ?>"></script>
<script src="<?= base_url('assets/pdf_viewer/js/pdf.min.js') ?>"></script>

<script src="<?= base_url('assets/pdf_viewer/js/3dflipbook.min.js') ?>"></script>
<section class="secPad">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="listUser">
               <h2> PDF Details </h2>
               <a href="javascript:history.go(-1)"> <i class="fa fa-angle-left" aria-hidden="true"></i> <span> Go Back To Pervious Page </span></a>
            </div>
         </div>
      </div>

      <div class="row">
         <div class="col-md-12">
            <div class="text-center">
               <h2 class="h2">Topic List</h2>
            </div>
         </div>

         <div class="col-md-12 qusAList">
           <div class="panel panel-default">

            <div class="panel-group" id="accordion">
               <?php $i = 1;
               if (isset($syllabus_questions) && !empty($syllabus_questions)) {
                  foreach ($syllabus_questions as $allQuestions) { ?>


                     <div class="panel-heading qusAnawer">
                        <h4 class="panel-title" style="color: white;"><?= $i; ?>.
                           <a data-toggle="collapse" data-parent="#accordion" href="#question<?= $allQuestions->id ?>" style="color: white;">
                              <?= $allQuestions->question ?>
                           </a>
                        </h4>
                     </div>
                     <div id="question<?= $allQuestions->id ?>" class="panel-collapse collapse panel-modified">

                        <div class="panel-body">

                           <div class="container" id="container<?= $allQuestions->id ?>">

                           </div>
                        </div>


                        <script type="text/javascript">
                           $('#container<?= $allQuestions->id ?>').FlipBook({
                              pdf: '<?= base_url('pdf_files/'.$allQuestions->pdf_file) ?>',
                              pages: 5,
                              template: {
                                 html: '<?= base_url('assets/pdf_viewer/templates/default-book-view.html') ?>',
                                 styles: [
                                    '<?= base_url('assets/pdf_viewer/css/white-book-view.css') ?>'
                                 ],
                                 links: [{
                                    rel: 'stylesheet',
                                    href: '<?= base_url('assets/pdf_viewer/css/font-awesome.min.css') ?>'
                                 }],
                                 script: '<?= base_url('assets/pdf_viewer/js/default-book-view.js') ?>'
                              }
                           });
                        </script>
                     </div>
               <?php $i++;
                  }
               } else {
                  echo "No question found";
               } ?>
            </div>
			</div>
			
         </div>
      </div>
   </div>
</section>
<style>
.panel-heading.qusAnawer {
    background: #8f8484;
    /* color: black; */
    margin: 10px;
}
</style>