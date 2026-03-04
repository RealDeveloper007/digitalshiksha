<script src="https://cdn.ckeditor.com/4.13.1/standard-all/ckeditor.js"></script>
<style type="text/css">
   .cke_top {
      display: none;
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

   /* Exam Detail Page Styles */
   .exam-detail-wrapper {
      padding: 12px 0;
      margin-left: 15px;
      max-width: calc(100% - 15px);
   }

   .exam-detail-header {
      background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
      color: #ffffff;
      padding: 10px 15px;
      border-radius: 8px 8px 0 0;
      margin-bottom: 0;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      position: relative;
   }

   .exam-detail-header h3 {
      margin: 0;
      font-size: 16px;
      font-weight: 600;
      display: flex;
      align-items: center;
      gap: 8px;
      padding-right: 120px;
   }

   .exam-detail-header h3 i {
      color: #FFD700;
      font-size: 14px;
   }
   
   .back-to-results-btn {
      position: absolute;
      top: 4px;
      right: 15px;
      background: rgba(255, 255, 255, 0.2);
      border: 2px solid rgba(255, 215, 0, 0.5);
      color: white;
      padding: 4px 8px;
      border-radius: 6px;
      text-decoration: none;
      font-weight: 600;
      font-size: 11px;
      display: inline-flex;
      align-items: center;
      gap: 4px;
      transition: all 0.3s;
      backdrop-filter: blur(10px);
   }
   
   .back-to-results-btn:hover {
      background: #FFD700;
      border-color: #FFD700;
      color: #000;
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(255, 215, 0, 0.3);
      text-decoration: none;
   }
   
   .back-to-results-btn i {
      font-size: 10px;
   }
   
   .back-icon-mobile {
      display: none;
   }

   .question-card {
      background: #ffffff;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      margin-bottom: 10px;
      overflow: hidden;
      transition: all 0.3s ease;
      border: 1px solid #e0e0e0;
   }

   .question-card:hover {
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
      transform: translateY(-2px);
   }

   .question-card-header {
      background: linear-gradient(135deg, #FFD700 0%, #FFC107 100%);
      padding: 10px 12px;
      border-bottom: 2px solid #e0e0e0;
      display: flex;
      align-items: center;
      gap: 8px;
      position: relative;
   }

   .question-title {
      flex: 1;
      font-size: 14px;
      font-weight: 600;
      color: #2c3e50;
      margin: 0;
   }

   .question-card-body {
      padding: 12px;
   }

   .question-media {
      margin-bottom: 12px;
      border-radius: 6px;
      overflow: hidden;
   }

   .question-media img {
      max-width: 100%;
      height: auto;
      border-radius: 6px;
      display: block;
   }

   .question-media video {
      max-width: 100%;
      height: auto;
      border-radius: 6px;
      display: block;
   }

   .question-media audio {
      width: 100%;
      margin: 10px 0;
   }

   .question-content {
      margin-bottom: 12px;
      padding: 10px;
      background: #f8f9fa;
      border-radius: 6px;
      border-left: 4px solid #FFD700;
   }

   .question-content strong {
      color: #2c3e50;
      font-size: 12px;
      display: block;
      margin-bottom: 6px;
   }

   .answers-section {
      margin-top: 12px;
   }

   .answers-section-title {
      font-size: 14px;
      font-weight: 600;
      color: #2c3e50;
      margin-bottom: 10px;
      padding-bottom: 8px;
      border-bottom: 2px solid #e0e0e0;
      display: flex;
      align-items: center;
      gap: 6px;
   }

   .answers-section-title i {
      color: #FFD700;
      font-size: 13px;
   }

   .answer-list {
      list-style: none;
      padding: 0;
      margin: 0;
   }

   .answer-item {
      padding: 10px 12px;
      margin-bottom: 8px;
      border-radius: 6px;
      border: 2px solid #e0e0e0;
      background: #ffffff;
      display: flex;
      align-items: flex-start;
      gap: 8px;
      transition: all 0.3s ease;
      position: relative;
   }

   .answer-item:hover {
      border-color: #FFD700;
      box-shadow: 0 2px 8px rgba(255, 215, 0, 0.2);
   }

   .answer-item input[type="radio"],
   .answer-item input[type="checkbox"] {
      width: 18px;
      height: 18px;
      margin-top: 2px;
      flex-shrink: 0;
      cursor: not-allowed;
   }

   .answer-content {
      flex: 1;
      font-size: 12px;
      color: #333;
      line-height: 1.5;
   }

   .answer-badge {
      position: absolute;
      top: 8px;
      right: 10px;
      width: 24px;
      height: 24px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 12px;
      flex-shrink: 0;
   }

   .answer-item.correct_answer {
      background: #d4edda;
      border-color: #28a745;
   }

   .answer-item.correct_answer .answer-badge {
      background: #28a745;
      color: #ffffff;
   }

   .answer-item.wrong_answer {
      background: #f8d7da;
      border-color: #dc3545;
   }

   .answer-item.wrong_answer .answer-badge {
      background: #dc3545;
      color: #ffffff;
   }

   .answer-item.normal_answer {
      background: #ffffff;
      border-color: #e0e0e0;
   }

   .answer-item.normal_answer .answer-badge {
      background: #6c757d;
      color: #ffffff;
   }

   /* Mobile Responsive */
   @media (max-width: 768px) {
      .exam-detail-wrapper {
         padding: 8px 0;
         margin-left: 0;
         max-width: 100%;
      }

      .exam-detail-header {
         padding: 10px 12px;
         border-radius: 6px 6px 0 0;
      }

      .exam-detail-header h3 {
         font-size: 14px;
         padding-right: 40px;
      }

      .exam-detail-header h3 i {
         font-size: 12px;
      }
      
      .back-to-results-btn {
         display: none;
      }
      
      .back-icon-mobile {
         display: flex;
         position: absolute;
         top: 0px;
         right: 12px;
         width: 32px;
         height: 32px;
         background: rgba(255, 215, 0, 0.2);
         border: 2px solid rgba(255, 215, 0, 0.6);
         border-radius: 50%;
         align-items: center;
         justify-content: center;
         color: #FFD700;
         text-decoration: none;
         transition: all 0.3s;
         flex-shrink: 0;
      }
      
      .back-icon-mobile:hover {
         background: #FFD700;
         border-color: #FFD700;
         color: #000;
         transform: scale(1.1);
         box-shadow: 0 2px 6px rgba(255, 215, 0, 0.4);
      }
      
      .back-icon-mobile i {
         font-size: 13px;
      }

      .question-card {
         margin-bottom: 8px;
         border-radius: 6px;
      }

      .question-card-header {
         padding: 8px 10px;
         flex-wrap: wrap;
      }

      .question-title {
         font-size: 13px;
      }

      .question-card-body {
         padding: 10px;
      }

      .question-content {
         padding: 8px;
         margin-bottom: 10px;
      }

      .answers-section-title {
         font-size: 12px;
         margin-bottom: 8px;
      }

      .answer-item {
         padding: 8px 10px;
         margin-bottom: 6px;
         flex-wrap: wrap;
      }

      .answer-item input[type="radio"],
      .answer-item input[type="checkbox"] {
         width: 16px;
         height: 16px;
      }

      .answer-content {
         font-size: 11px;
      }

      .answer-badge {
         width: 20px;
         height: 20px;
         font-size: 10px;
         top: 6px;
         right: 8px;
      }

      .question-media video {
         width: 100%;
         height: auto;
      }
   }
   
   /* Desktop Optimizations */
   @media (min-width: 769px) {
      .exam-detail-wrapper {
         padding: 12px 0;
      }
      
      .exam-detail-header {
         padding: 10px 15px;
      }
      
      .exam-detail-header h3 {
         font-size: 16px;
      }
      
      .question-card {
         margin-bottom: 10px;
      }
      
      .question-card-header {
         padding: 10px 12px;
      }
      
      .question-card-body {
         padding: 12px;
      }
   }
</style>

<div id="note">
   <?php if ($message) echo $message; ?>
   <?php
   $tmp = (array) json_decode($results->result_json);
   $question_count = 0;
   ?>
</div>

<div class="exam-detail-wrapper">
   <div class="exam-detail-header">
      <a href="javascript:history.back();" class="back-to-results-btn">
         <i class="fa fa-arrow-left"></i> Back
      </a>
      <a href="javascript:history.back();" class="back-icon-mobile">
         <i class="fa fa-arrow-left"></i>
      </a>
      <h3>
         <i class="glyphicon glyphicon-list-alt"></i>
         Result Details: <?= $results->title_name; ?>
      </h3>
   </div>

   <div class="question-list">
      <?php foreach ($tmp as $key => $value) {
         $question = $this->db->where('ques_id', $key)->get('questions')->row();
         $question_count++;
      ?>
         <div class="question-card">
            <div class="question-card-header">
               <div class="question-title">Question <?= $question_count; ?></div>
            </div>
            
            <div class="question-card-body">
               <?php if (!empty($question->media_type) && ($question->media_type != '') && ($question->media_link != '')) {
                  switch ($question->media_type) {
                     case 'youtube':
                        parse_str(parse_url($question->media_link, PHP_URL_QUERY));
                        echo '<div class="question-media embed-responsive embed-responsive-16by9">';
                        echo '<iframe class="embed-responsive-item" src="//www.youtube.com/embed/' . $v . '" frameborder="0" allowfullscreen></iframe>';
                        echo "</div>";
                        break;
                     case 'audio':
                        echo '<div class="question-media">';
                        echo '<audio controls>';
                        echo '<source src="' . base_url("uploads/question-media/" . $question->media_link) . '" type="audio/mpeg">';
                        echo '<source src="' . base_url("uploads/question-media/" . $question->media_link) . '" type="audio/ogg">';
                        echo '<source src="' . base_url("uploads/question-media/" . $question->media_link) . '" type="audio/wav">';
                        echo '</audio>';
                        echo '</div>';
                        break;
                     case 'video':
                        echo '<div class="question-media">';
                        echo '<video width="100%" height="auto" controls>';
                        echo '<source src="' . base_url("uploads/question-media/" . $question->media_link) . '" type="video/mp4">';
                        echo '<source src="' . base_url("uploads/question-media/" . $question->media_link) . '" type="video/ogg">';
                        echo '<source src="' . base_url("uploads/question-media/" . $question->media_link) . '" type="video/webm">';
                        echo '</video>';
                        echo '</div>';
                        break;
                     case 'image':
                        echo '<div class="question-media">';
                        echo '<img src="' . base_url("uploads/question-media/" . $question->media_link) . '" alt="Question Image" style="max-width: 100%; height: auto;">';
                        echo '</div>';
                        break;
                     default:
                        break;
                  }
               }
               ?>
               
               <div class="question-content">
                  <strong>Q:</strong>
                  <textarea cols="10" id="editor<?= $question->ques_id; ?>" name="editor<?= $question->ques_id; ?>" rows="5" disabled> <?= $question->question; ?></textarea>
               </div>
               
               <script>
                  (function() {
                     var mathElements = [
                        'math', 'maction', 'maligngroup', 'malignmark', 'menclose', 'merror',
                        'mfenced', 'mfrac', 'mglyph', 'mi', 'mlabeledtr', 'mlongdiv',
                        'mmultiscripts', 'mn', 'mo', 'mover', 'mpadded', 'mphantom',
                        'mroot', 'mrow', 'ms', 'mscarries', 'mscarry', 'msgroup',
                        'msline', 'mspace', 'msqrt', 'msrow', 'mstack', 'mstyle',
                        'msub', 'msup', 'msubsup', 'mtable', 'mtd', 'mtext', 'mtr',
                        'munder', 'munderover', 'semantics', 'annotation', 'annotation-xml'
                     ];

                     CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.13.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');

                     CKEDITOR.replace('editor<?= $question->ques_id; ?>', {
                        versionCheck: false,
                        extraPlugins: 'ckeditor_wiris',
                        removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser',
                        height: 80,
                        fontSize_defaultLabel: '16px',
                        contentsCss: [
                           'body { font-family: "Roboto", sans-serif; font-size: 16px; }'
                        ],
                        fontSize_sizes: '16/16px',
                        extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
                     });
                  }());
               </script>

               <div class="answers-section">
                  <div class="answers-section-title">
                     <i class="glyphicon glyphicon-option-horizontal"></i>
                     Answers:
                  </div>
                  
                  <ul class="answer-list">
                     <?php 
                     $answers = $this->db->where('ques_id', $key)->get('answers')->result();
                     $temp_ans = explode(',', $value);
                     foreach ($answers as $val) { 
                        $result = (in_array($val->ans_id, $temp_ans)) ? 'checked' : '';
                        
                        if($val->right_ans == 1 && $result == 'checked') {
                           $class = 'correct_answer';
                        } else if($val->right_ans == 0 && $result != 'checked') {
                           $class = 'normal_answer';
                        } else if($val->right_ans == 0 && $result == 'checked') {
                           $class = 'wrong_answer';
                        } else if($val->right_ans == 1 && $result != 'checked') {
                           $class = 'correct_answer';
                        } else {
                           $class = 'normal_answer';
                        }
                     ?>
                        <li class="answer-item <?= $class ?>">
                           <input type="<?= $question->option_type; ?>" disabled="disabled" <?= (in_array($val->ans_id, $temp_ans)) ? 'checked' : '' ?> />
                           <div class="answer-content">
                              <?php if ($val->new == 2) { ?>
                                 <textarea cols="10" id="answer<?= $val->ans_id; ?>" name="answer<?= $val->ans_id; ?>" rows="5" disabled> <?= $val->answer; ?></textarea>
                              <?php } else {
                                 echo $val->answer;
                              } ?>
                           </div>
                           <div class="answer-badge">
                              <?php if ($val->right_ans == 1) { ?>
                                 <i class="glyphicon glyphicon-ok"></i>
                              <?php } else { ?>
                                 <i class="glyphicon glyphicon-remove"></i>
                              <?php } ?>
                           </div>
                           
                           <?php if ($val->new == 2) { ?>
                              <script>
                                 (function() {
                                    var mathElements = [
                                       'math', 'maction', 'maligngroup', 'malignmark', 'menclose', 'merror',
                                       'mfenced', 'mfrac', 'mglyph', 'mi', 'mlabeledtr', 'mlongdiv',
                                       'mmultiscripts', 'mn', 'mo', 'mover', 'mpadded', 'mphantom',
                                       'mroot', 'mrow', 'ms', 'mscarries', 'mscarry', 'msgroup',
                                       'msline', 'mspace', 'msqrt', 'msrow', 'mstack', 'mstyle',
                                       'msub', 'msup', 'msubsup', 'mtable', 'mtd', 'mtext', 'mtr',
                                       'munder', 'munderover', 'semantics', 'annotation', 'annotation-xml'
                                    ];

                                    CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.13.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');

                                    CKEDITOR.replace('answer<?= $val->ans_id; ?>', {
                                       versionCheck: false,
                                       extraPlugins: 'ckeditor_wiris',
                                       removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser',
                                       height: 80,
                                       extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
                                    });
                                 }());
                              </script>
                           <?php } ?>
                        </li>
                     <?php } ?>
                  </ul>
               </div>
            </div>
         </div>
      <?php } ?>
   </div>
</div>
