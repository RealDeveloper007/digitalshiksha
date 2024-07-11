<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Student Results</title>
	<style>
		body {
			position: relative;
			font-family: 'Helvetica';
			font-size: 11px;
		}

		table {
			border-collapse: collapse;
			width: 100%;
		}

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
table th,
		table td {
			border-top: 1px solid black;
            border-bottom: 1px solid black;
            border-right: 1px solid black;
			border-left: 1px solid black;
		}

        .no-border {
			border: 0;
		}

        header {
                position: fixed;
                top: -40px;
                height: 150px;
                background-color: white;
                color: #F1B900;
                text-align: center;
                line-height: 35px;
            }
    </style>

</head>

<body>
<header>
<table cellspacing="0" border="0" cellpadding="5">
		<tr>
			<th align="left" class="no-border"><img src="<?= base_url('logo.png') ?>" alt="Logo" class="logo"></th>
			<th colspan="7" class="no-border" align="center">
				<span style="font-size: 16px;"> <?= $details->school_name?> (<?= $details->district ?>)</span>
				<span style="font-size: 16px;"> Exam Portal : www.digitalshikshadarpan.com</span>
				<span style="font-size: 16px;"><?= $setting->heading ?></span>
			</th>
		</tr>
</table>
        </header>
<br>
<br>
<br><br><br><br><br><br><br><br>
<table cellpadding="0" cellspacing="0">
   <thead style="width: 100%;
   max-width: 100%;top:150px">
   <tr>
       <th align="center">Exam Title</th>
       <th align="center">Batch Code</th>
	   <th align="center">Total No. of Questions</th>
       <th align="center">Class</th>	    
       <th align="center">Date</th>
       <th align="center">Prepared By</th>
   </tr>
   </thead>
   <tbody style="width: 100%;
   max-width: 100%;">
       <tr class="accordion-group" >
           <td align="center" style="height:63px;"><?= $mock_details->title_name ?></td>
           <td align="center" style="height:63px;"><?= $mock_details->batch_name.' - '.$mock_details->batch_code ?></td>
		   <td align="center" style="height:63px;"><?= count($all_questions) ?></td>
           <td align="center" style="height:63px;"><?= $mock_details->category_name ?></td>		   
           <td align="center" style="height:63px;"><?= date('d-M-y',strtotime($mock_details->exam_created)) ?></td>		   
           <td align="center" style="height:63px;"><?= $mock_details->user_name=='' ? '' : $mock_details->user_name ?></td>
       </tr>
   </tbody>
 </table>

 <br>
 <br>

                <?php if (isset($student_results) != NULL) { ?>
                    <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered" id="example">
                        <thead>
                            <tr>
                                <th align="center">#</th>
                                <th align="center">Student's Name</th>
                                <th align="center">Student's Phone</th>
                                <th align="center">Attempted Questions</th>
                                <th align="center">Right Answers</th>
                                <th class="hidden-xxs" align="center">Score</th>
                                <th class="hidden-xxs" align="center">Total</th>
                                <th class="hidden-xs" align="center">Result</th>
                                <th class="text-center" style=" width: 10%;" align="center">Signature</th>
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
                                        <td style="height:63px;" align="center"><?= $i ?></td>
                                        <td style="height:63px;" align="center"><?= $result->user_name; ?></td>
                                        <td style="height:63px;" align="center"><?= $result->user_phone; ?></td>
                                        <td style="height:63px;" align="center"><?= count($GetAttempted) ?></td>
                                        <td style="height:63px;" align="center"><?= count($GetRightAnswers) ?></td>
                                        <td style="height:63px;" align="center"><?= $result->result_percent; ?>%</td>
                                        <td style="height:63px;" align="center"><?= $ScoreCount?></td>
                                        <td class="hidden-xxs" style="height:63px;" align="center"><?= ($result->result_percent >= $result->pass_mark) ? '<span class="label label-primary">Qualified</span>' : '<span class="label label-warning">Not Qualified</span>' ?></td>
                                        <td style="height:63px;" align="center"></td>
                                        
                                    </tr>
                                    <?php
                                    $i++;}
                                        } else {

                                            echo "<tr><td colspan='9' style='height:30px;' align='center'>No Result found</td></tr>";
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

                
<table cellspacing="0" border="0" cellpadding="5">
		
        <tr>
			<td colspan="8" class="no-border">&nbsp;</td>
		</tr>
		<tr>
			<th colspan="2" align="left" class="bottom">Total % Qualified Students:&nbsp;
                <?php
                if($PassPercentage != 'NAN')
                {
                   echo number_format((float)$PassPercentage, 2, '.', '');
                } else {
                    echo "--";
                }
                ?>
            </th>
			<th colspan="3" align="left" class="bottom">Qualified Students:&nbsp;<?= $Passed ?></th>
            <th colspan="3" align="left" class="bottom">Not Qualified Students:&nbsp;<?= $Failed ?></th>
		</tr>

        <tr>
			<td colspan="8" class="no-border">&nbsp;</td>
		</tr>
		<tr>
			<th colspan="2" class="no-border">&nbsp;</th>
			<th colspan="3" class="bottom" style="height:63px;" align="center">Sign of Class Teacher</th>
			<th colspan="3" class="right bottom" style="height:63px;" align="center">Sign of Principal</th>
		</tr>

</table>
            <!-- <div class="col-md-12 result_calculation">
                <div class="col-md-2">Total % Qualified Students <br> <span><?= number_format((float)$PassPercentage, 2, '.', '');?></span></div>
                <div class="col-md-2">Qualified Students <br> <span><?= $Passed ?></span></div>
                <div class="col-md-2">Not Qualified Students <br> <span><?= $Failed; ?></span></div>
                <div class="col-md-3">Sign of Class Teacher</div>
                <div class="col-md-3">Sign of Principal</div>

            </div>
        </div>
    </div>
</div>
            </div> -->
</html>