<script src="https://cdn.ckeditor.com/4.13.1/standard-all/ckeditor.js"></script>
<style type="text/css">
   .cke_top {
      display: none;
      ;
   }

   .cke_bottom {
      display: none;
   }

   .data-red {
      color: red;
   }

   .data-green {
      color: green;
   }

   ul {
      list-style: none;
   }
</style>
<div id="note">
   <?php if ($message) echo $message;
   // echo "<pre/>"; print_r($results);
   $tmp = (array) json_decode($results->result_json);
   ?>
</div>
<div class="block">
   <div class="navbar block-inner block-header">
      <div class="row">
         <p class="text-muted">Result Details: <?= $results->title_name; ?> </p>
      </div>
   </div>
   <div class="block-content">
      <div class="row">
         <div class="col-sm-12">
            <ul class="">
               <?php foreach ($tmp as $key => $value) {
                  $question = $this->db->where('ques_id', $key)->get('questions')->row(); ?>
                  <li class="">
                     <?php if (!empty($question->media_type) and ($question->media_type != '')  and ($question->media_link != '')) {
                        switch ($question->media_type) {
                           case 'youtube':
                              parse_str(parse_url($question->media_link, PHP_URL_QUERY));
                              echo '<div class="embed-responsive embed-responsive-16by9">';
                              echo '<iframe class="embed-responsive-item" src="//www.youtube.com/embed/' . $v . '" frameborder="0"></iframe>';
                              echo "</div>";
                              break;
                           case 'audio':
                              $link = '<audio controls>';
                              $link .= '<source src="' . base_url("question-media/" . $question->media_link) . '" type="audio/mpeg">';
                              $link .= '<source src="' . base_url("question-media/" . $question->media_link) . '" type="audio/ogg">';
                              $link .= '<source src="' . base_url("question-media/" . $question->media_link) . '" type="audio/wav">';
                              $link .= '</audio>';
                              echo $link;
                              break;
                           case 'video':
                              $link = '<p><video width="600" height="400" controls>';
                              $link .= '<source src="' . base_url("question-media/" . $question->media_link) . '" type="video/mp4">';
                              $link .= '<source src="' . base_url("question-media/" . $question->media_link) . '" type="video/ogg">';
                              $link .= '<source src="' . base_url("question-media/" . $question->media_link) . '" type="video/webm">';
                              $link .= '</audio></p>';
                              echo $link;
                              break;
                           case 'image':
                              echo '<img src="' . base_url("question-media/" . $question->media_link) . '" alt="image" height="auto" width="100px">';
                              break;
                           default:
                              break;
                        }
                        echo "<br/><br/>";
                     }
                     ?>
                     <strong>Q: <textarea cols="10" id="editor<?= $question->ques_id; ?>" name="editor<?= $question->ques_id; ?>" rows="5" disabled> <?= $question->question; ?></textarea></strong>
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

                           CKEDITOR.replace('editor<?= $question->ques_id; ?>', {
                              versionCheck : false,
                              extraPlugins: 'ckeditor_wiris',
                              // For now, MathType is incompatible with CKEditor file upload plugins.
                              removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser',
                              height: 80,
                              fontSize_defaultLabel: '16px',
                                 contentsCss: [
                                    'body { font-family: "Roboto", sans-serif; font-size: 16px; }'
                                 ],
                                 // Optional: to include '16px' as a selectable font size in the font size dropdown
                           fontSize_sizes: '16/16px',
                              // Update the ACF configuration with MathML syntax.
                              extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
                           });
                        }());
                     </script>
                     <ul class="list-group" style="margin-top: 12px;">
                        <strong>Answers: </strong>
                        <?php $answers = $this->db->where('ques_id', $key)->get('answers')->result();
                        $temp_ans = explode(',', $value);
                        foreach ($answers as $val) { ?>

                           <?php
                              $result = (in_array($val->ans_id, $temp_ans)) ? 'checked' : '';

                              if($val->right_ans == 1 && $result == 'checked')
                              {
                                 $class = 'correct_answer';

                              } else if($val->right_ans == 0 && $result != 'checked') {
                                 
                                 $class = 'normal_answer';

                              } else if($val->right_ans == 0 && $result == 'checked') {

                                 $class = 'wrong_answer';

                              } else if($val->right_ans == 1 && $result != 'checked') {

                                 $class = 'correct_answer';

                              } else {

                                 $class = 'vbvbv';
                              }
                            ?>
                           <li class="list-group-item  <?= $class ?>">
                              <input type="<?= $question->option_type; ?>" disabled="disabled" <?= (in_array($val->ans_id, $temp_ans)) ? 'checked' : '' ?> />
                              <span style="margin-left: 10px;">
                                 <?php if ($val->new == 2) { ?>
                                    <textarea cols="10" id="answer<?= $val->ans_id; ?>" name="answer<?= $val->ans_id; ?>" rows="5" disabled> <?= $val->answer; ?></textarea>
                                 <?php } else {
                                    echo $val->answer;
                                 } ?>
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

                                       CKEDITOR.replace('answer<?= $val->ans_id; ?>', {
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
                              </span>
                              <?php if ($val->right_ans == 1) { ?>
                                 <span class="badge"><i class="glyphicon glyphicon-ok"></i></span>
                              <?php } else { ?>
                              <span class="badge" style="color: white;background: red;"><i class="glyphicon glyphicon-remove"></i></span>
                              <?php } ?>
                           </li>
                        <?php } ?>
                     </ul>
                  </li>
               <?php } ?>
            </ul>
         </div>
      </div>
   </div>
</div>
<!--/span-->