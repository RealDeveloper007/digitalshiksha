  <script src="https://cdn.ckeditor.com/4.13.1/standard-all/ckeditor.js"></script>
<style>
    .cke_top {
        display: none;;
    }
    .cke_bottom {
        display: none;
    }
    a.btn.custom_navbar-btn.btn-primary.pull-left.col-sm-3 {
    margin: 10px;
    width: 30%;
}
form.importform {
    display: flex;
    width: 50%;
    margin: 10px auto;
}
    </style>
<div id="note">
    <?php 
    if ($message) {
        echo $message;    
    }
    ?>
</div>
<div class="block">  
    <div class="navbar block-inner block-header">
        <div class="row">
            <p class="text-muted">Exam Title: <?php echo (!empty($mock_title)) ? $mock_title->title_name : ''; ?> 
<br><br>
                <a class="btn custom_navbar-btn btn-sm btn-primary pull-left col-sm-3" href="<?php echo base_url('admin_control/add_more_question_new_option') . '/' . $mock_title->title_id; ?>"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp; Add More Question with new options</a>

                <?php if($mock_title->batch_id != '0') { ?>
                    <a class="btn custom_navbar-btn btn-sm btn-primary pull-left col-sm-3" href="<?php echo base_url('admin_control/bulk_questions') . '/' . $mock_title->title_id; ?>"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp;Add Multiple Questions</a>
                  
                <?php } ?>    

                <a class="btn custom_navbar-btn btn-sm btn-primary pull-right col-sm-3" href="<?php echo base_url('admin_control/add_more_question') . '/' . $mock_title->title_id; ?>"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp; Add More Question with old options</a>
          
            </p>
        </div>
    </div>
    <br><br>
     <div class="row">
        <div class="col-md-12">
    <form method="post" action="<?= base_url('admin_control/importquestions').'/'.$mock_title->title_id ?>" class="importform" enctype="multipart/form-data">
        <div class="col-md-6">
        <input type="file" class="form-control" name="fileURL" accept=".csv,.xlsx"  required>
        <button type="submit" class="btn btn-sm btn-primary">Import Questions </button>
    </div>
    <div class="col-md-6">
        <a href="<?= base_url('assets/images/questions.xlsx') ?>">
        <input type="button" class="btn btn-sm btn-success" value="Download Questions File" ></a>
    </div>
    </form>
</div>
</div>

    <div class="block-content">
    <div class="row">
    <div class="col-sm-12">
    <?php if (isset($mocks) != NULL) { ?>
    <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered table-hover" id="example">
        <thead>
            <tr>
                <th class="col-sm-1">Sl.</th>
                <th>Question</th>
                <th class="col-sm-3">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $i = 1;
            foreach ($mocks as $mock) {
        ?>
        <tr class="accordion-group <?=($i & 1) ? 'even' : 'odd'; ?>">
            <td class="col-sm-1"><?=$i; ?> : </td>
            <td class="accordion-heading">
            
                <textarea cols="10" id="editor<?=$mock->ques_id;?>" name="editor<?=$mock->ques_id;?>" rows="5" disabled> <?=$mock->question; ?></textarea>
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

      CKEDITOR.replace('editor<?=$mock->ques_id;?>', {
        extraPlugins: 'ckeditor_wiris',
        // For now, MathType is incompatible with CKEditor file upload plugins.
        removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser',
        height: 80,
        // Update the ACF configuration with MathML syntax.
        extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
      });
    }());

                </script>
               
                <div class="accordion-body collapse" id="collapse_<?php echo $i; ?>">
                    <div class="accordion-inner"><br/>
                    <p><span class="text-muted"> Option type: </span><?=$mock->option_type ?> 
                    <?php if ($mock->option_type == 'Radio') { ?>
                        <span class="pull-right"> <i class="glyphicon glyphicon-warning-sign"></i> Radio can't have more than 1 right answer.</span> <br/>
                    <?php } ?>
                    </p>
                    <?php if ($mock_ans[$mock->ques_id][0]) { ?>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>sl.</th>
                                    <th>Options</th>
                                    <th>Right Ans.</th>
                                    <th style="width: 15%">Action</th>
                                </tr>
                            </thead>
                            <?php
                            foreach ($mock_ans[$mock->ques_id] as $all_ans) {
                                $sl = 1;
                                foreach ($all_ans as $ans) { ?>
                                    <tr>
                                        <td style="width: 5%"><?php echo $sl; ?></td>
                                        <td>
                                            <a href="#" data-name="ans-text" data-type="textarea" data-rows="2" data-url="<?php echo base_url('admin_control/update_answer/'.$mock->ques_id); ?>" data-pk="<?=$ans->ans_id; ?>" class="data-modify-<?=$ans->ans_id; ?> no-style">
                                            <?php if($ans->new==2) { ?>
                                            <textarea cols="10" id="answer<?=$ans->ans_id;?>" name="answer<?=$ans->ans_id;?>" rows="5" disabled> <?=$ans->answer; ?></textarea>


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
                                                extraPlugins: 'ckeditor_wiris',
                                                // For now, MathType is incompatible with CKEditor file upload plugins.
                                                removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser',
                                                height: 80,
                                                // Update the ACF configuration with MathML syntax.
                                                extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
                                            });
                                            }());
                                        </script>

                                            <?php } else { echo $ans->answer; } ?>
                                        
                                            </a>



                                        </td>
                                        <td>

                                            <a href="#" data-name="right-ans" data-type="select" data-source="[{value:0,text:' No '},{value:1,text:' Yes '}]" data-value="<?=$ans->right_ans; ?>" data-url="<?php echo base_url('admin_control/update_answer/'.$mock->ques_id); ?>" data-pk="<?=$ans->ans_id; ?>" class="data-modify-<?=$ans->ans_id; ?> no-style"><?=($ans->right_ans != 0) ? 'Yes' : 'No'; ?></a>
                                        </td>
                                        <td class="btn-group">
                                        <?php if($ans->new==1){ ?>

                                            <a class="btn btn-sm btn-default modify" name="modify-<?=$ans->ans_id; ?>"><i class="glyphicon glyphicon-edit"></i></a>

                                             <?php
                                         }
                                            if($this->session->userdata('user_role_id')==1) {
                                            ?>
                                            <a class="btn btn-sm btn-default" onclick="return delete_confirmation();" href = "<?php echo base_url('admin_control/delete_answer/' . $ans->ans_id); ?>"><i class="glyphicon glyphicon-trash"></i></a>
                                            <?php }  ?>
                                        </td>
                                    </tr>
                                    <?php
                                    $sl++;
                                }
                            } ?>
                        </table>
                        <?php
                        } else { ?>
                        <table class="table table-bordered">
                            <tr><th>Empty !!!</th><tr>
                        </table>
                        <?php } ?>
                    </div>
                </div>
            </td>
            <td class="col-xs-3">
                <div class="btn-group">
                    <a href="#collapse_<?=$i; ?>"  data-toggle="collapse" class="btn btn-sm btn-default accordion-toggle "><i class="glyphicon glyphicon-resize-small"></i><span class="invisible-on-sm"> View</span></a>
                    <a class="btn btn-sm btn-default update"  data-update="<?=$mock->ques_id;?>" href="#update_ques" data-toggle="modal"><i class="glyphicon glyphicon-edit"></i><span class="invisible-on-md">  Modify</span></a>
                     <?php if($this->session->userdata('user_role_id')==1) { ?>
                    <a onclick="return delete_confirmation()" href = "<?php echo base_url('admin_control/delete_question/' . $mock->ques_id); ?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-trash"></i><span class="invisible-on-md">  Delete</span></a>
                    <?php } ?>
                </div>
            </td>
        </tr>
        <?php
            $i++;
        }
        ?>
        </tbody>
    </table>
    <?php
    } else {
        echo 'This mock have no question!';
    }
    ?>
    </div>
    </div>
    </div>
</div><!--/span-->
 
