<section class="secPad">
   <div class="container">
      <div class="row">
    
          <div class="col-md-12">
             <div class="listUser">
                <h2> Long Answer Question Details </h2>
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

        <div class="panel-group mb-1" id="accordion">
                 <?php $i=1; foreach ($syllabus_questions as $allQuestions) { ?>

                                                                   
                                     <div class="panel-heading qusAnawer">
                                            <h4 class="panel-title" style="color: white;"><?=$i;?>.
                                     <a data-toggle="collapse" data-parent="#accordion" href="#question<?= $allQuestions->id ?>" style="color: white;">
                                     <?= $allQuestions->question ?>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="question<?= $allQuestions->id ?>" class="panel-collapse collapse">

                                            <div class="panel-body">
                                            <?= $allQuestions->url ?>
                                            </div>
                                      </div>      
                 <?php $i++;}?>     
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