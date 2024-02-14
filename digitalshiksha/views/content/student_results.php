<style>
    a.btn.btn-default.btn-xs {
    margin: 6px;
}
span i {
    background: green;
    color: white;
    border-radius: 4px;
}
tr td.ans {
    width: 168px
}

#renderPdf{
    cursor: pointer;
}

.PrintClass
{
    padding-left: 15px !important;
    margin-top: -106px !important;
}
.result_calculation .col-md-2 {
    font-size: 17px;
    font-weight: 700;
}
.result_calculation .col-md-3 {
    font-size: 17px;
    font-weight: 700;
}
    </style>
<script type="text/javascript" src="<?= base_url('assets/js/html2canvas.js')?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/jsPdf.debug.js')?>"></script>
<div id="note"> <?php //if ($message) echo $message; ?> </div>

<div class="block"> 
    <div class="navbar block-inner block-header">
        <div class="row"><p class="text-muted">Results </p></div>
    </div>
    <div class="block-content">
        <div class="row"  id="printarea">
        <div class="col-sm-12">
    <span style="font-size: 26px;color: black;margin-top: 18px;float:right">
    </span>
    <img src="<?= base_url('logo.png')?>" width="200px" style="float:left" id='renderPdf'/>
    <span class="pull-right" style="font-size: 25px;font-weight: bold;margin: 23px;">
    <?= $details->school_name?> (<?= $details->district ?>)<br/><br/>
    Exam Portal : www.digitalshikshadarpan.com</span>
</div>
<br>
<br>
<br>
<br>
        <div class="col-md-12">

<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered table-hover" style="width: 100% !important;
   max-width: 100% !important;">
   <thead style="width: 100%;
   max-width: 100%;">
   <tr>
       <th>Exam Title</th>
       <th>Batch Code</th>
	   <th>Total No. of Questions</th>
       <th>Class</th>	    
       <th>Date</th>
       <th>Prepared By</th>
   </tr>
   </thead>
   <tbody style="width: 100%;
   max-width: 100%;">
       <tr class="accordion-group" >
           <td><?= $mock_details->title_name ?></td>
           <td><?= $mock_details->batch_name.' - '.$mock_details->batch_code ?></td>
		   <td><?= count($all_questions) ?></td>
           <td><?= $mock_details->category_name ?></td>		   
           <td><?= date('d-M-y',strtotime($mock_details->exam_created)) ?></td>		   
           <td><?= $mock_details->user_name=='' ? '' : $mock_details->user_name ?></td>
       </tr>
   </tbody>
 </table>
</div>
            <div class="col-sm-12">
                <?php if (isset($student_results) != NULL) { ?>
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                        <thead>
                            <tr>
                                <td>#</td>
                                <th>Student's Name</th>
                                <th>Student's Phone</th>
                                <th>Attempted Questions</th>
                                <th>Right Answers</th>
                                <th class="hidden-xxs">Score</th>
                                <th class="hidden-xxs">Total</th>
                                <th class="hidden-xs">Result</th>
                                <th class="text-center" style=" width: 10%">Signature</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            $ResultArray = array();
                            if($student_results){
                            foreach ($student_results as $result) {
                                if($result->result_percent >= $result->pass_mark)
                                {
                                    $ResultArray[] = 'pass';
                                } else {
                                    $ResultArray[] = 'fail';
                                }

                                $ScoreCount = ($result->result_percent * $result->question_answered)/100;

                                $GetAttempted = [];
                                $GetRightAnswers = [];

                                foreach($all_questions as $SingleQuestion) :

                                $StudentQuestionsResults = json_decode($result->result_json);

                                    $CheckAns =  $this->CI->StudentQuestionAnswer($StudentQuestionsResults,$SingleQuestion->ques_id,$result->exam_id);

                                    if($CheckAns!=='not_attempted')
                                    {
                                        $GetAttempted[] = 'attempted';

                                    }

                                     if($CheckAns=='right')
                                    {
                                        $GetRightAnswers[] = 'right';

                                    }

                                endforeach;

                             ?>
                                    <tr class="<?= ($i & 1) ? 'even' : 'odd'; ?>">
                                        <td><?= $i ?></td>
                                        <td><?= $result->user_name; ?></td>
                                        <td><?= $result->user_phone; ?></td>
                                        <td><?= count($GetAttempted) ?></td>
                                        <td><?= count($GetRightAnswers) ?></td>
                                        <td><?= $result->result_percent; ?>%</td>
                                        <td><?= $ScoreCount?></td>
                                        <td class="hidden-xxs"><?= ($result->result_percent >= $result->pass_mark) ? '<span class="label label-primary">PASS</span>' : '<span class="label label-warning">FAIL</span>' ?></td>
                                        <td></td>
                                        
                                    </tr>
                                    <?php
                                    $i++;}
                                        } else {

                                            echo "<tr><td colspan='8'>No Result found</td></tr>";
                             } ?>
                        </tbody>
                    </table>
                <?php
                } else {
                    echo 'No results!';
                }

                $ResultDeclared = array_count_values($ResultArray);
                $Passed = isset($ResultDeclared['pass']) ? $ResultDeclared['pass'] : 0;
                $Failed = isset($ResultDeclared['fail']) ? $ResultDeclared['fail'] : 0;
                $TotalStudents = (int)$Passed + (int)$Failed; 
                $PassPercentage = $Passed/$TotalStudents * 100;
                ?>
            </div>
            <div class="col-md-12 result_calculation">
                <div class="col-md-2">Total % Pass Students <br> <span><?= number_format((float)$PassPercentage, 2, '.', '');?></span></div>
                <div class="col-md-2">Pass Students <br> <span><?= $Passed ?></span></div>
                <div class="col-md-2">Fail Students <br> <span><?= $Failed; ?></span></div>
                <div class="col-md-3">Sign of Class Teacher</div>
                <div class="col-md-3">Sign of Principal</div>

            </div>
        </div>
    </div>
</div><!--/span-->
<script>

var downPdf = document.getElementById("renderPdf");
var section_head = document.getElementById("printarea");

downPdf.onclick = function() {

    $('nav.navbar.navbar-inverse.navbar-fixed-top').hide();
    $("#wrapper").addClass("PrintClass");

    html2canvas(document.section_head, {
        onrendered:function(canvas) {

            var contentWidth = canvas.width;
            var contentHeight = canvas.height;

            var pageHeight = contentWidth / 595.28 * 841.89;
            var leftHeight = contentHeight;
            var position = 0;
            var imgWidth = 555.28;
            var imgHeight = 555.28/contentWidth * contentHeight;

            var pageData = canvas.toDataURL('image/jpeg', 1.0);

            var pdf = new jsPDF('', 'pt', 'a4');
            // if (leftHeight < pageHeight) {
                pdf.addImage(pageData, 'JPEG', 20, 0, imgWidth, imgHeight );
            /* } else {
                while(leftHeight > 0) {
                    pdf.addImage(pageData, 'JPEG', 20, position, imgWidth, imgHeight)
                    leftHeight -= pageHeight;
                    position -= 841.89;
                    if(leftHeight > 0) {
                        pdf.addPage();
                    }
                }
            } */

            pdf.save('<?= $mock_details->title_name ?>_report.pdf');
            location.reload();
        }
    })
}

</script>