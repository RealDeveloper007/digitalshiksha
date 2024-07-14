<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Student Results</title>
	<style>
         /* @page {
            margin: 100px 25px;
        } */
		body {
			position: relative;
			font-family: 'Helvetica';
			font-size: 11px;
		}

		table {
			border-collapse: collapse;
			width: 100%;
            page-break-before:auto;
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
table th {
    color : #191970;
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
                /* position: fixed;
                top: -70px;
                height: 60px;
                background-color: white;
                text-align: center;
                /* overflow: hidden; 
                left: 0;
                right: 0; */
                bottom : 20px;
                color: #F1B900;
                line-height: 30px;
                /* clear: both; */
            }

        .content {
            /* page-break-before: always; */
            margin-top: 20px; /* Ensure this matches the @page margin-top to avoid overlap */
        }
        tr{page-break-inside: avoid;  
            page-break-after: auto;} 

            .watermark {
			position: absolute;
			top: 10.6%;
			width: 100%;
			height: 880px;
			opacity: .13;
			object-fit: cover;
			z-index: -1;
		}
        .footer
        {
            font-size:12px;
        }
    </style>

</head>

<body>
<header>
<table cellspacing="0" border="0" cellpadding="5">
		<tr>
			<th align="left" class="no-border"><img src="<?= base_url('logo.png') ?>" alt="Logo" class="logo"></th>
			<th colspan="7" class="no-border" align="center">
				<span style="font-size: 16px;"> <?= $details->school_name?> (<?= $details->district ?>)</span><br>
				<span style="font-size: 16px;"> Exam Portal : www.digitalshikshadarpan.com</span> 
				<span style="font-size: 16px;"><?= $setting->heading ?></span>
			</th>
		</tr>

</table>
        </header>
        <div class="content">

<table cellpadding="0" cellspacing="0">
   <thead style="width: 100%;
   max-width: 100%;top:0px">
   <tr>
       <th align="center" style="font-size: 14px;">Exam Title</th>
       <th align="center" style="font-size: 14px;">Batch Code</th>
	   <th align="center" style="font-size: 14px;">Total No. of Questions</th>
       <th align="center" style="font-size: 14px;">Class</th>	    
       <th align="center" style="font-size: 14px;">Date</th>
       <th align="center" style="font-size: 14px;">Prepared By</th>
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
                                <th align="center"  style="height:50px;">#</th>
                                <th align="center" style="height:50px;">Student's Name</th>
                                <th align="center" style="height:50px;">Student's Phone</th>
                                <th align="center" style="height:50px;">Attempted Questions</th>
                                <th align="center" style="height:50px;">Right Answers</th>
                                <th class="hidden-xxs" align="center" style="height:50px;">Score</th>
                                <!-- <th class="hidden-xxs" align="center" style="height:50px;">Total</th> -->
                                <th class="hidden-xs" align="center" style="height:50px;">Result</th>
                                <th class="text-center" align="center" style="height:50px;">Signature</th>
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
                                        <td style="height:50px;width:5%" align="center"><?= $i ?></td>
                                        <td style="height:50px;width:11%" align="center"><?= $result->user_name; ?></td>
                                        <td style="height:50px;width:10%" align="center"><?= $result->user_phone; ?></td>
                                        <td style="height:50px;width:10%" align="center"><?= count($GetAttempted) ?></td>
                                        <td style="height:50px;width:7%" align="center"><?= count($GetRightAnswers) ?></td>
                                        <td style="height:50px;width:10%" align="center"><?= $result->result_percent; ?>%</td>
                                        <!-- <td style="height:50px;width:7%" align="center"><?php // round($ScoreCount,2)?></td> -->
                                        <td class="hidden-xxs" style="height:50px;width:10%" align="center"><?= ($result->result_percent >= $result->pass_mark) ? '<span class="label label-primary">Qualified</span>' : '<span class="label label-warning">Not Qualified</span>' ?></td>
                                        <td style="height:50px;width:25%" align="center"></td>
                                        
                                    </tr>
                                    
                                    <?php
                                    $i++;
                                }
                                    
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

                
<table cellspacing="0" border="0" cellpadding="5" class="footer">
		
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
           
            </div>
</html>