<style>
.panel-collapse button.btn.btn-primary {
    margin: 10px;
}
.options img {
    display: none;
}
</style>
<section id="faq" class="myBox secPad decpara">
    <div class="container">
    <div class="row">
        <div class="big-gap"></div>
          <div class="col-md-12">
             <div class="listUser">
                <h2> MCQ Details </h2>
                <a href="javascript:history.go(-1)"> <i class="fa fa-angle-left" aria-hidden="true"></i> <span> Go Back To Pervious Page </span></a>
             </div>
          </div>
      </div>
        <div>
                  <span class="pull-right hide">Time Start:
      <span class="mcq-duration"></span>
    </span>
            <div class="row">                
                <div class="col-md-10 col-sm-12 col-md-offset-1 col-sm-offset-0">
                    <div class="panel-group" id="accordion">
					
                    <?php 
                    if (isset($mocks) AND !empty($mocks)) {
                        $i = 1; 
                        foreach ($mocks as $mock) {
                           ?>
                                     <div class="panel panel-default">

                                     <div class="panel-heading qusAnawer" id="mainquestion<?= $mock->ques_id ?>">
                                            <h4 class="panel-title" style="color: white;"><?=$i;?>.
                                     <a data-toggle="collapse" data-parent="#accordion" href="#question<?= $mock->ques_id ?>" style="color: white;">
                                                    <?= $mock->question; ?> <br>
                                                    <?= $mock->question_hindi ?>
                                                </a>
                                            </h4>
											
											
                                        </div>
										
										
										
										
										
                                        <div id="question<?= $mock->ques_id ?>" class="panel-collapse collapse">

                                            
                                                    <?php if (!empty($mock->media_type) AND ($mock->media_type != '')  AND ($mock->media_link != '')) {
                                                        switch ($mock->media_type) {
                                                            case 'youtube':
                                                                parse_str(parse_url($mock->media_link, PHP_URL_QUERY));
                                                                echo '<div class="embed-responsive embed-responsive-16by9">';
                                                                echo '<iframe class="embed-responsive-item" src="//www.youtube.com/embed/'.$v.'" frameborder="0"></iframe>';
                                                                echo "</div>";
                                                                break;
                                                            case 'audio':
                                                                $link = '<audio controls>';
                                                                  $link .= '<source src="'.base_url("question-media/".$mock->media_link).'" type="audio/mpeg">';
                                                                  $link .= '<source src="'.base_url("question-media/".$mock->media_link).'" type="audio/ogg">';
                                                                  $link .= '<source src="'.base_url("question-media/".$mock->media_link).'" type="audio/wav">';
                                                                $link .= '</audio>';
                                                                echo $link;
                                                                break;
                                                            case 'video':
                                                                $link = '<p><video width="600" height="400" controls>';
                                                                  $link .= '<source src="'.base_url("question-media/".$mock->media_link).'" type="video/mp4">';
                                                                  $link .= '<source src="'.base_url("question-media/".$mock->media_link).'" type="video/ogg">';
                                                                  $link .= '<source src="'.base_url("question-media/".$mock->media_link).'" type="video/webm">';
                                                                $link .= '</audio></p>';
                                                                echo $link;
                                                                break;
                                                            case 'image':
                                                                echo '<div class="imgfits"><img src="'.base_url("question-media/".$mock->media_link).'" alt="image" height="auto" width="100%"></div>';
                                                                break;                                    
                                                            default:
                                                                break;
                                                        }
                                                        echo "";
                                                    }
                                                    ?>

                                        <?php  if ($mock_ans[$mock->ques_id][0]) {
                                foreach ($mock_ans[$mock->ques_id] as $all_ans) {
                                    $sl = 1;
                                    foreach ($all_ans as $ans) { ?>
                                            <div class="panel-body options" id="option<?= $sl ?>">
                                                <?=$ans->answer; ?>
                                                <?=($ans->right_ans != 0) ? '<img src="'. base_url('assets/images/check.png').'" style="width:20px;">' : '<img src="'. base_url('assets/images/uncheck.png').'" style="width:20px;">'; ?>
                                            </div>
											
                    <?php $sl++;        
                                }
                            }
                             } ?>
                             <button class="btn btn-primary" onclick="ShowAnswer(<?= $mock->ques_id ?>)">Answer</button>
                                        </div> 
										</div>

                             <?php 
                             $i++;
                    }

                    } else {
                        echo '<div class="panel panel-default"><div class="panel-body">No result found!</div></div>';
                    }
                    ?>
				
                    </div>
                </div>
            </div>
        </div> 
    </div>
</section><!--/#pricing-->
<script>
   function ShowAnswer(id)
   {
        $('#question'+id+' .options img').toggle();
   } 

   </script>