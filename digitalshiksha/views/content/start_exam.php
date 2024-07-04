<script src="https://cdn.ckeditor.com/4.13.1/standard-all/ckeditor.js"></script>

<style>
    body
    {
        padding-top: 0;
		margin: 0;
    }
    
    .cke_editable {
        font-size: 15px !important;
    }
    .radio {
        font-size: 15px !important;
    }
</style>

<?php
    $num_of_ques = count($questions);
    $count = 1;
?>
<section id="start_exam" class="myBox secPad decpara startExam" style="margin-top: 0 !important">
   <div class="container">
      <div class="row">
         <div class="col-md-12 text-center">
            <h1 class="text-uppercase h1"><strong> <?= $mock->batch_id == 0 ? 'Digital Mock Test' : 'Digital Live Test'  ?></strong></h1>
            <div class="line_br mrauto"></div>
         </div>
      </div>
      <div class="box">
         <div class="row">
                <div class="col-md-12">
                    <div id="note">
                        <noscript><div class="alert alert-danger">Your browser does not support JavaScript or JavaScript is disabled! Please use JavaScript enabled browser to take this exam.</div></noscript>
                        <?php if ($message) echo $message; ?>
                    </div>
                    <h3># <?= $mock->title_name ?></h3>
                    <hr>
                    <form id="anserForm" action="<?= base_url('exam_control'); ?>" method="post">
                        <div class="question_content">
                            <input type="hidden" name="exam_id" value="<?= $mock->title_id; ?>">
                            <input type="hidden" name="token" value="<?= time(); ?>">
                            <div id="Carousel" class="carousel" data-interval="false" data-wrap="false" style="margin-bottom: 5px;">
                                <div class="carousel-inner">
                                    <?php 
                                    foreach ($questions as $ques): $type = ($ques->option_type == 'Radio') ? 'radio' : 'checkbox'; ?>
                                        <div class="item <?= ($count == $num_of_ques) ? 'active' : '' ?>">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="shTime">
                                                        <p>Question <?= ($num_of_ques - $count + 1) . ' of ' . $num_of_ques; ?> </p>
                                                        <p>Time Remaining: <span class="time-duration"></span> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                 <textarea cols="10" id="editor<?= $ques->ques_id ?>" name="editor<?= $ques->ques_id ?>" rows="5" disabled> <?=$ques->question; ?></textarea>
                                 
                                 
                                  <script>
    (function() {
      var mathElements = [
        'math',
        'maction',
        'maligngroup',
        'malignmark',
        'menclose',
        'merror',
        'mfenced',
        'mfrac',
        'mglyph',
        'mi',
        'mlabeledtr',
        'mlongdiv',
        'mmultiscripts',
        'mn',
        'mo',
        'mover',
        'mpadded',
        'mphantom',
        'mroot',
        'mrow',
        'ms',
        'mscarries',
        'mscarry',
        'msgroup',
        'msline',
        'mspace',
        'msqrt',
        'msrow',
        'mstack',
        'mstyle',
        'msub',
        'msup',
        'msubsup',
        'mtable',
        'mtd',
        'mtext',
        'mtr',
        'munder',
        'munderover',
        'semantics',
        'annotation',
        'annotation-xml'
      ];

      CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.13.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');

      CKEDITOR.replace('editor<?= $ques->ques_id ?>', {
        versionCheck : false,
        extraPlugins: 'ckeditor_wiris',
        // For now, MathType is incompatible with CKEditor file upload plugins.
        removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser',
        height: 80,
        // Update the ACF configuration with MathML syntax.
        extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
      });
    }());
  </script>
  <style>
    .cke_top {
  
    display: none;
}
   .cke_bottom {
  
    display: none;
}
    
  </style>


                                                    <?php if (!empty($ques->media_type) AND ($ques->media_type != '')  AND ($ques->media_link != '')) {
                                                        switch ($ques->media_type) {
                                                            case 'youtube':
                                                                parse_str(parse_url($ques->media_link, PHP_URL_QUERY));
                                                                echo '<div class="embed-responsive embed-responsive-16by9">';
                                                                echo '<iframe class="embed-responsive-item" src="//www.youtube.com/embed/'.$v.'" frameborder="0"></iframe>';
                                                                echo "</div>";
                                                                break;
                                                            case 'audio':
                                                                $link = '<audio controls>';
                                                                  $link .= '<source src="'.base_url("question-media/".$ques->media_link).'" type="audio/mpeg">';
                                                                  $link .= '<source src="'.base_url("question-media/".$ques->media_link).'" type="audio/ogg">';
                                                                  $link .= '<source src="'.base_url("question-media/".$ques->media_link).'" type="audio/wav">';
                                                                $link .= '</audio>';
                                                                echo $link;
                                                                break;
                                                            case 'video':
                                                                $link = '<p><video width="600" height="400" controls>';
                                                                  $link .= '<source src="'.base_url("question-media/".$ques->media_link).'" type="video/mp4">';
                                                                  $link .= '<source src="'.base_url("question-media/".$ques->media_link).'" type="video/ogg">';
                                                                  $link .= '<source src="'.base_url("question-media/".$ques->media_link).'" type="video/webm">';
                                                                $link .= '</audio></p>';
                                                                echo $link;
                                                                break;
                                                            case 'image':
                                                                echo '<div class="imgfits"><img src="'.base_url("question-media/".$ques->media_link).'" alt="image" height="auto" width="100%"></div>';
                                                                break;                                    
                                                            default:
                                                                break;
                                                        }
                                                        echo "";
                                                    }
                                                    ?>
                                                    <?php
                                                    foreach ($answers[$ques->ques_id][0] as $ans) { ?>
                                                        <div class="<?= $type ?>">
                                                            <label><input type="<?= $type ?>" name="ans[<?= $ques->ques_id; ?>]<?= ($type == 'checkbox') ? '[]' : '' ?>" value="<?=$ans->ans_id; ?>"> 
                                                            <?php if($ans->new==2){ ?>
                                                            <textarea cols="10" id="answer<?=$ans->ans_id;?>" name="answer<?=$ans->ans_id;?>" rows="5" disabled> <?=$ans->answer; ?></textarea>
                                                            <?php } else { echo $ans->answer; } ?>
                                                            </label>

                                                            <script>
                                                            (function() {
                                                            var mathElements = [
                                                                'math',
                                                                'maction',
                                                                'maligngroup',
                                                                'malignmark',
                                                                'menclose',
                                                                'merror',
                                                                'mfenced',
                                                                'mfrac',
                                                                'mglyph',
                                                                'mi',
                                                                'mlabeledtr',
                                                                'mlongdiv',
                                                                'mmultiscripts',
                                                                'mn',
                                                                'mo',
                                                                'mover',
                                                                'mpadded',
                                                                'mphantom',
                                                                'mroot',
                                                                'mrow',
                                                                'ms',
                                                                'mscarries',
                                                                'mscarry',
                                                                'msgroup',
                                                                'msline',
                                                                'mspace',
                                                                'msqrt',
                                                                'msrow',
                                                                'mstack',
                                                                'mstyle',
                                                                'msub',
                                                                'msup',
                                                                'msubsup',
                                                                'mtable',
                                                                'mtd',
                                                                'mtext',
                                                                'mtr',
                                                                'munder',
                                                                'munderover',
                                                                'semantics',
                                                                'annotation',
                                                                'annotation-xml'
                                                            ];

                                                            CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.13.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');

                                                            CKEDITOR.replace('answer<?=$ans->ans_id;?>', {
                                                                versionCheck : false,
                                                                extraPlugins: 'ckeditor_wiris',
                                                                // For now, MathType is incompatible with CKEditor file upload plugins.
                                                                removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser',
                                                                height: 80,
                                                                // Update the ACF configuration with MathML syntax.
                                                                extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
                                                            });
                                                            }());
                                                        </script>
                                                        </div>
                                                    <?php 
                                                    } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $count++;
                                    endforeach;
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class=" me-control-btn">
                                    <a class="btn btn-lg btn-info me-prev" href="#Carousel" data-slide="next" disabled> &laquo; Prev<span class="hidden-xxs">ious Question</span></a>
                                    <a class="btn btn-lg btn-info me-next" href="#Carousel" data-slide="prev"> Next <span class="hidden-xxs">Question</span> &raquo; </a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <p id="submit_button" style="margin: 30px 15px;"></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script language="JavaScript"><!--
// javascript:window.history.forward(1);
//--></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Set Time
        // $.LoadingOverlay('show');
//

        // setTimeout(function() {
        //     $('.cke_notification').remove();
        //     $.LoadingOverlay('hide');

        // }, 5000);
        var count = <?= ($duration) ?>;
        var h, m, s, newTime;

        var counter = setInterval(timer, 1000);
        function timer() {
            count = count - 1;
            if (count < 0) {
                clearInterval(counter);
                return;
            }
            h = Math.floor(count / 3600);
            m = Math.floor(count / 60) - (h * 60);
            s = count % 60;
            if (m.toString().length == 1)
                m = '0' + m;
            if (s.toString().length == 1)
                s = '0' + s;
            if (h) {
                if (h.toString().length == 1)
                    h = '0' + h;
                newTime = '<strong>' + h + ':' + m + ':' + s + '</strong> <small class="text-muted">Hours</small>';
            } else {
                newTime = '<strong>' + m + ':' + s + '</strong> <small class="text-muted">Minutes</small>';
            }
           
            //Update timer cookie
            var now = new Date();
            var time = now.getTime();
            time += count * 1000;
            now.setTime(time);
            document.cookie="ExamTimeDuration="+count+"; expires="+now.toUTCString()+"; path=/";
            
            //Update time to HTML
            $('.time-duration').html(newTime);
        }

        // Coltrol Buttons    
        var submit_btn = '<button type="submit" class="btn btn-lg btn-success" > <i class="fa fa-check-square-o"></i> Submit <span class="hidden-xxs">your answers </span></a>';
        var slide_count = 1;
        var num_of_ques = "<?php echo $num_of_ques; ?>";
        $('.me-next').click(function() {
            $('.me-prev').removeAttr('disabled');
            slide_count++;
            if (slide_count >= num_of_ques) {
                $('.me-next').attr('disabled', 'disabled');      //disable Nest button for last question.
                if (!$("#submit_button > button").length) {          //Check if the submit button already placed add if not.
                    $("#submit_button").append(submit_btn);
                }
            }
        });
        $('.me-prev').click(function() {
            $('.me-next').removeAttr('disabled');
            slide_count--;
            if (slide_count == 1) {
                $('.me-prev').attr('disabled', 'disabled');   //disable Prev button for fast question.
            }
        });

        //Sumbit after time out
        var timeout = <?= ($duration * 1000) ?>;
        setTimeout(function() {
            alert('TIME OUT!');
            $('#anserForm').submit();
        }, timeout);

    });

</script>