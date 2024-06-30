<div id="note">
    <?php 
    if ($message) {
        echo $message;    
    
}    ?>
</div>
<ol class="breadcrumb hidden-print">
    <li><a href="<?=base_url('dashboard/'.$this->session->userdata('user_id')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li> 
    <li><a href="<?=base_url('exam_control/view_results')?>"><i class="fa fa-puzzle-piece"></i> Results</a></li> 
    <li class="active"><a href="<?=base_url('exam_control/view_exam_detail/'.$results->result_id);?>"><button class="btn btn-primary">Solution</button></a></li>
   
</ol>
<div class="hidden-print">
    <div class="newContainer">
        <?php if($_SESSION['type'] == 'andriod') { ?>
            <!--<p class="btn-print"> <a href="<?=base_url('exam_control/view_exam_detail/'.$results->result_id);?>"><button class="btn btn-primary">Solution</button></a></p>-->
            <?php } else { ?>
            <p class="btn-print">    
                <a href="javascript:window.print()" id="printNew" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-print"></i>&nbsp; Print </a>
            </p>
        <?php } ?>
    </div>
</div>
<div class="visible-border">
<div class="container visible-print">
    <div class="result-head text-center" style="margin-bottom: 15px">
       <!--  <h3><?=$brand_name?></h3>
        <h4>Certificate</h4> -->
        <img src="<?= base_url('logo.png') ?>">
    </div>
</div>
<div class="result-info container result-modified">
    <div class="row">
		<div class="col-sm-6 col-md-6 col-xs-8">
            <div class="panel panel-default">
                <div class="panel-body result-info-user">
                    <h4>Student Detail</h4>
					<div class="col-md-3 col-sm-4 col-xs-4">
                        <?php if($results->user_photo) { ?>
						<img src="<?= base_url('user-avatar/'.$results->user_photo) ?>" style="width:100%;object-fit:cover;margin:0 -15px;">
                    <?php } ?>
					</div>
					<div class="col-md-9 col-sm-8 col-xs-8">
						<dl class="dl-horizontal modified ml-15">
							<dt>Name: </dt>
							<dd><?=$results->user_name?></dd>
							<dt>Email: </dt>
							<dd><?=$results->user_email?></dd>
							<dt>Phone: </dt>
							<dd><?=$results->user_phone?></dd>
						</dl>
					</div>					
                </div>
            </div>
        </div>
		
		<div class="col-sm-6 col-md-6 col-xs-4">
            <div class="panel panel-default">
                <div class="panel-body result-info-exam">
                    <h4 style="white-space:nowrap;">Exam Detail</h4>
                    <?php 

                    $GetRightAnswers = [];

                                foreach($all_questions as $SingleQuestion) :

                                $StudentQuestionsResults = json_decode($results->result_json);

                                    $CheckAns =  $this->CI->StudentQuestionAnswer($StudentQuestionsResults,$SingleQuestion->ques_id,$results->exam_id);

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
                    <dl class="dl-horizontal modified">
                        <dt>Title: </dt>
                        <dd><?=$results->title_name?></dd>
                        <dt>Right Questions: </dt>
                        <dd><?= count($GetRightAnswers).' out of '.count($all_questions) ?></dd>
                        <dt>Passing Score: </dt>
                        <dd><?=$results->pass_mark?>%</dd>
                    </dl>             
				<div class="d-none">
					<div class="result-score">
						<br> <p><?=$results->user_name?>'s Score (<?=$results->result_percent?>%)</p>
					</div>
					<div class="progress progress-striped">
						<div class="progress-bar progress-bar-<?=($results->result_percent >= $results->pass_mark)?'success':'danger'?>" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?=$results->result_percent?>%">
							<span class="sr-only"><?=$results->result_percent?>% Complete (success)</span>
						</div>
					</div>
					<!--<div class="result-score">
						<p>Passing Score (<?=$results->pass_mark?>%)</p>
					</div>
					<div class="progress progress-striped">
					<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?=$results->pass_mark?>%">
						<span class="sr-only"><?=$results->pass_mark?>% Complete (success)</span>
					</div>-->
				</div>
				</div>
			</div>
			
            </div>
        </div>
		
    </div><!-- /.row -->
    
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                <h4 class="text-center reh3">*** Result ***</h4>
                <div class="centDiv">
                    <h4 class="assessment">Assessment: 
                    
                    <?php if($results->result_percent >= $results->pass_mark) 
                         {
                            if($results->result_percent >= 95)
                            {
                                echo '<span class="label label-success">Excellent</span>';
                                
                            } else {
                                
                                echo '<span class="label label-primary">Qualified</span>';
                                
                            }
                            
                        } else { 
                            
                           echo  '<span class="label label-warning">Not Qualified</span>';
                            
                        }
                    ?>
                    </h4>

                </div>
            </div>
        </div>
    
	
    <div class="row m-none">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="result-score">
                <p style="font-size:1.3em;color:#333;"><?=$results->user_name?>'s Score (<?=$results->result_percent?>%)</p>
            </div>
            <div class="progress progress-striped">
                <div class="progress-bar progress-bar-<?=($results->result_percent >= $results->pass_mark)?'success':'danger'?>" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?=$results->result_percent?>%">
                    <span class="sr-only"><?=$results->result_percent?>% Complete (success)</span>
                </div>
            </div>
        </div>
    </div>
	
    <div class="row m-none">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="result-score">
                <p style="font-size:1.3em;color:#333;">Passing Score (<?=$results->pass_mark?>%)</p>
            </div>
            <div class="progress progress-striped">
                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?=$results->pass_mark?>%">
                    <span class="sr-only"><?=$results->pass_mark?>% Complete (success)</span>
                </div>
            </div>
        </div>
    </div>
	
	</div>
    <div class="container sign-panel visible-print">
        <div class="col-xs-offset-1 col-xs-5">
            <h4 class="text-center">Signature <?=$brand_name?></h4>
        </div>
        <div class="col-xs-push-1 col-xs-5">
            <h4 class="text-center">Signature Student</h4>
        </div>
    </div>
</div>
<div class="container">
    <p class="result-note"><strong>Note: </strong>This certificate is only valid under the terms and conditions of <?=$brand_name?>.</p>
</div>
</div>
<link href="<?php echo base_url('assets/css/print-result.css') ?>" rel="stylesheet" media="print">


<style>
/*.result-info-user::before {
    position: absolute;
    font-family: FontAwesome;
    right: 30px;
    bottom: 21px;
    opacity: 0.7;
    background: url('');
        background-position-x: 0%;
        background-position-y: 0%;
        background-repeat: repeat;
        background-size: auto;
    content: " ";
    position: absolute;
    height: 85px;
    display: block;
    width: 100%;
    right: 18px;
    z-index: 999999;
    background-position: right;
    background-repeat: no-repeat;
    background-size: contain;
}*/
.dl-horizontal dt{text-align:left;}
.dl-horizontal dd {margin-left:0;}

.panel
{
    margin-bottom : 5px !important;
}
.result-info h4{
        font-size: 18px !important;
}
.result-info-user:before {
        font-size: 7em !important;
}
.result-info-exam:before {
    font-size: 7em!important;
}
.reh3 {
    background-color: #191970;
    margin: 0 auto 0px !important
    text-align: center;
    display: flex;
    justify-content: center;
    width: fit-content;
    padding: 8px 17px !important
    border-radius: 4px;
    color: #fff;
}
a#printNew {
    padding: 7px 10px;
}
</style>