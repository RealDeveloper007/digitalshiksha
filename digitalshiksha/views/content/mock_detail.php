  <script src="https://cdn.ckeditor.com/4.13.1/standard-all/ckeditor.js"></script>
<style>
    .cke_top {
        display: none;
    }
    .cke_bottom {
        display: none;
    }
    
    .mock-detail-wrapper {
        background: #fff;
        border-radius: 4px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        overflow: hidden;
        width: 100%;
        margin-bottom: 12px;
    }
    
    .mock-detail-header {
        background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
        border-bottom: 3px solid #FFD700;
        color: white;
        padding: 10px 15px;
        margin-bottom: 0;
        position: relative;
    }
    
    .mock-detail-header h4 {
        margin: 0;
        font-size: 16px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 8px;
        padding-right: 120px;
    }
    
    .mock-detail-header h4 i {
        font-size: 14px;
        color: #FFD700;
    }
    
    .mock-actions-header {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        margin-top: 10px;
    }
    
    .mock-actions-header .btn {
        padding: 6px 12px;
        font-size: 12px;
        border-radius: 4px;
        border: none;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        cursor: pointer;
        font-weight: 500;
        white-space: nowrap;
    }
    
    .mock-actions-header .btn i {
        font-size: 12px;
    }
    
    .mock-actions-header .btn-primary {
        background: rgba(255,255,255,0.2);
        color: white;
        border: 1px solid rgba(255,255,255,0.3);
    }
    
    .mock-actions-header .btn-primary:hover {
        background: rgba(255,255,255,0.3);
        color: white;
    }
    
    .mock-detail-content {
        padding: 12px;
    }
    
    .import-section {
        background: #fff3cd;
        border: 1px solid #ffc107;
        border-radius: 4px;
        padding: 12px;
        margin-bottom: 12px;
    }
    
    .import-form {
        display: flex;
        gap: 8px;
        align-items: flex-end;
        flex-wrap: wrap;
    }
    
    .import-group {
        flex: 1;
        min-width: 250px;
    }
    
    .import-group .form-control {
        width: 100%;
        padding: 6px 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 12px;
    }
    
    .import-group .form-control:focus {
        border-color: #FFD700;
        border-width: 2px;
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(255, 215, 0, 0.25);
    }
    
    .import-actions {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }
    
    .import-actions .btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 12px;
        font-size: 12px;
    }
    
    .import-actions .btn i {
        font-size: 12px;
    }
    
    .question-card {
        background: white;
        border: 1px solid #dee2e6;
        border-left: 4px solid #FFD700;
        border-radius: 4px;
        padding: 12px;
        margin-bottom: 10px;
        transition: all 0.3s;
    }
    
    .question-card:hover {
        box-shadow: 0 2px 8px rgba(255, 215, 0, 0.2);
    }
    
    .question-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 10px;
        padding-bottom: 10px;
        border-bottom: 2px solid #e9ecef;
    }
    
    .question-number {
        font-size: 14px;
        font-weight: 600;
        color: #2c3e50;
        margin-right: 10px;
        min-width: 30px;
    }
    
    .question-content {
        flex: 1;
        min-width: 0;
    }
    
    .question-editor {
        width: 100%;
    }
    
    .question-actions {
        display: flex;
        gap: 6px;
        flex-shrink: 0;
        margin-left: 15px;
    }
    
    .question-actions .btn {
        padding: 6px 12px;
        font-size: 12px;
        border-radius: 4px;
        border: 1px solid #dee2e6;
        background: white;
        color: #666;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: all 0.3s;
        white-space: nowrap;
    }
    
    .question-actions .btn i {
        font-size: 12px;
    }
    
    .question-actions .btn:hover {
        background: #f8f9fa;
        border-color: #FFD700;
        color: #2c3e50;
    }
    
    .question-actions .btn-danger:hover {
        background: #dc3545;
        border-color: #dc3545;
        color: white;
    }
    
    .question-details {
        margin-top: 10px;
        padding-top: 10px;
        border-top: 1px solid #e9ecef;
    }
    
    .option-type-badge {
        display: inline-block;
        padding: 4px 10px;
        background: #e9ecef;
        color: #495057;
        border-radius: 12px;
        font-size: 11px;
        font-weight: 500;
        margin-bottom: 10px;
    }
    
    .option-type-warning {
        background: #fff3cd;
        color: #856404;
        font-size: 11px;
        padding: 6px 10px;
        border-radius: 4px;
        margin-top: 6px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    
    .option-type-warning i {
        font-size: 11px;
    }
    
    .options-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }
    
    .options-table thead {
        background: #f8f9fa;
    }
    
    .options-table th {
        padding: 8px;
        text-align: left;
        font-weight: 600;
        color: #333;
        border-bottom: 2px solid #dee2e6;
        font-size: 12px;
    }
    
    .options-table td {
        padding: 8px;
        border-bottom: 1px solid #e9ecef;
        vertical-align: middle;
        font-size: 12px;
    }
    
    .options-table tbody tr:hover {
        background: #f8f9fa;
    }
    
    .option-text {
        min-width: 200px;
    }
    
    .right-ans-badge {
        display: inline-block;
        padding: 4px 8px;
        border-radius: 12px;
        font-size: 11px;
        font-weight: 500;
    }
    
    .right-ans-badge.yes {
        background: #d4edda;
        color: #155724;
    }
    
    .right-ans-badge.no {
        background: #f8d7da;
        color: #721c24;
    }
    
    .answer-actions {
    display: flex;
        gap: 5px;
    }
    
    .answer-actions .btn {
        padding: 4px 8px;
        font-size: 11px;
        border-radius: 3px;
        border: 1px solid #dee2e6;
        background: white;
        color: #666;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }
    
    .answer-actions .btn i {
        font-size: 11px;
    }
    
    .answer-actions .btn:hover {
        background: #f8f9fa;
        border-color: #FFD700;
        color: #2c3e50;
    }
    
    .answer-actions .btn-danger:hover {
        background: #dc3545;
        border-color: #dc3545;
        color: white;
    }
    
    .no-questions {
        text-align: center;
        padding: 40px 15px;
        color: #666;
        font-size: 14px;
    }
    
    .no-questions i {
        font-size: 36px;
        color: #ccc;
        margin-bottom: 10px;
    }
    
    .back-btn {
        position: absolute;
        top: 10px;
        right: 15px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 4px 8px;
        background: rgba(255,255,255,0.2);
        color: white;
        text-decoration: none;
        border-radius: 4px;
        border: 1px solid rgba(255,255,255,0.3);
        font-size: 11px;
        transition: all 0.3s;
        z-index: 10;
    }
    
    .back-btn i {
        font-size: 10px;
    }
    
    .back-btn:hover {
        background: #FFD700;
        border-color: #FFD700;
        color: #000;
    }
    
    .back-btn:hover i {
        color: #000;
    }
    
    .back-icon-mobile {
        display: none;
    }
    
    @media (min-width: 768px) {
        .back-btn {
            display: inline-flex;
        }
        
        .back-icon-mobile {
            display: none !important;
        }
    }
    
    @media (max-width: 767px) {
        .mock-detail-header {
            padding: 10px 12px;
            display: block !important;
            visibility: visible !important;
        }
        
        .mock-detail-header h4 {
            font-size: 14px !important;
            display: flex !important;
            visibility: visible !important;
            opacity: 1 !important;
            margin: 0 !important;
            padding: 0 50px 0 0 !important;
            width: 100% !important;
            flex-wrap: wrap;
            word-wrap: break-word;
            overflow-wrap: break-word;
            color: white !important;
            line-height: 1.4 !important;
        }
        
        .mock-detail-header h4 i {
            font-size: 12px !important;
            flex-shrink: 0;
            margin-right: 6px !important;
        }
        
        .mock-detail-header h4 * {
            color: white !important;
        }
        
        .mock-detail-content {
            padding: 10px;
        }
        
        .back-btn {
            display: none !important;
        }
        
        .back-icon-mobile {
            display: flex !important;
            position: absolute;
            top: 0;
            right: 0;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,0.2);
            color: white;
            text-decoration: none;
            border-radius: 0 4px 0 0;
            border: none;
            border-left: 1px solid rgba(255,255,255,0.3);
            border-bottom: 3px solid #FFD700;
            transition: all 0.3s;
            z-index: 10;
        }
        
        .back-icon-mobile:hover {
            background: #FFD700;
            color: #000;
        }
        
        .back-icon-mobile i {
            font-size: 14px;
            margin: 0;
        }
        
        .mock-actions-header {
            flex-direction: column;
            gap: 6px;
        }
        
        .mock-actions-header .btn {
            width: 100%;
            justify-content: center;
            padding: 6px 10px;
            font-size: 11px;
            white-space: normal;
            word-wrap: break-word;
            line-height: 1.4;
        }
        
        .mock-actions-header .btn span {
            display: inline !important;
            margin-left: 6px;
        }
        
        .mock-actions-header .btn i {
            font-size: 11px;
            flex-shrink: 0;
        }
        
        .import-section {
            padding: 10px;
        }
        
        .import-form {
            flex-direction: column;
            gap: 8px;
        }
        
        .import-group {
            width: 100%;
            min-width: auto;
        }
        
        .import-group .form-control {
            padding: 6px 10px;
            font-size: 12px;
        }
        
        .import-actions {
            width: 100%;
            flex-direction: column;
            gap: 6px;
        }
        
        .import-actions .btn {
            width: 100%;
            padding: 6px 10px;
            font-size: 11px;
            justify-content: center;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            white-space: nowrap;
        }
        
        .import-actions .btn i {
            font-size: 11px;
            flex-shrink: 0;
        }
        
        .question-card {
            padding: 10px;
        }
        
        .question-header {
            flex-direction: column;
            gap: 10px;
            align-items: stretch;
        }
        
        .question-number {
            font-size: 13px;
            margin-bottom: 8px;
        }
        
        .question-content {
            width: 100%;
        }
        
        .question-actions {
            width: 100%;
            justify-content: flex-start;
            margin-left: 0;
            flex-wrap: wrap;
            gap: 8px;
        }
        
        .question-actions .btn {
            flex: 1;
            min-width: 0;
            max-width: none;
            justify-content: center;
            padding: 8px 10px;
            font-size: 12px;
        }
        
        .question-actions .btn span.hidden-xs {
            display: none;
        }
        
        .question-details {
            margin-top: 12px;
            padding-top: 12px;
        }
        
        .option-type-badge {
            font-size: 12px;
            padding: 4px 10px;
            display: block;
            margin-bottom: 10px;
        }
        
        .option-type-warning {
            font-size: 11px;
            padding: 6px 10px;
            display: block;
            width: 100%;
        }
        
        .options-table {
            font-size: 12px;
            display: block;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            width: 100%;
        }
        
        .options-table thead {
            display: none;
        }
        
        .options-table tbody {
            display: block;
        }
        
        .options-table tbody tr {
            display: block;
            margin-bottom: 15px;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            padding: 12px;
            background: #f8f9fa;
        }
        
        .options-table tbody td {
            display: block;
            padding: 8px 0;
            border: none;
            text-align: left;
        }
        
        .options-table tbody td:first-child:before {
            content: "Sl. No: ";
            font-weight: 600;
            color: #666;
            display: inline-block;
            min-width: 90px;
            margin-right: 8px;
        }
        
        .options-table tbody td:nth-child(2):before {
            content: "Option: ";
            font-weight: 600;
            color: #666;
            display: block;
            margin-bottom: 6px;
        }
        
        .options-table tbody td:nth-child(3):before {
            content: "Right Answer: ";
            font-weight: 600;
            color: #666;
            display: inline-block;
            min-width: 110px;
            margin-right: 8px;
        }
        
        .options-table tbody td:nth-child(4):before {
            content: "Actions: ";
            font-weight: 600;
            color: #666;
            display: block;
            margin-bottom: 8px;
        }
        
        .option-text {
            word-break: break-word;
        }
        
        .answer-actions {
            flex-direction: row;
            gap: 8px;
            justify-content: flex-start;
        }
        
        .answer-actions .btn {
            flex: 0 0 auto;
            padding: 6px 12px;
            font-size: 12px;
        }
}
    </style>

<div id="note">
    <?php 
    if ($message) {
        echo $message;    
    }
    ?>
</div>

<div class="mock-detail-wrapper">
    <div class="mock-detail-header">
        <a href="<?php echo base_url('admin_control/view_my_mocks/' . (!empty($mock_title) && $mock_title->batch_id == 0 ? 'mock_test' : 'live_mock_test')); ?>" class="back-btn">
            <i class="fa fa-arrow-left"></i> Back to List
        </a>
        <a href="<?php echo base_url('admin_control/view_my_mocks/' . (!empty($mock_title) && $mock_title->batch_id == 0 ? 'mock_test' : 'live_mock_test')); ?>" class="back-icon-mobile">
            <i class="fa fa-arrow-left"></i>
        </a>
        <h4>
            <i class="fa fa-file-text"></i> 
            <?php echo (!empty($mock_title)) ? htmlspecialchars($mock_title->title_name) : 'Mock Details'; ?>
        </h4>
        
        <div class="mock-actions-header">
            <a class="btn btn-primary" href="<?php echo base_url('admin_control/add_more_question_new_option') . '/' . (!empty($mock_title) ? $mock_title->title_id : ''); ?>">
                <i class="glyphicon glyphicon-plus-sign"></i> <span>Add More Question with new options</span>
            </a>

            <?php if(!empty($mock_title) && $mock_title->batch_id != '0') { ?>
                <a class="btn btn-primary" href="<?php echo base_url('admin_control/bulk_questions') . '/' . $mock_title->title_id; ?>">
                    <i class="glyphicon glyphicon-plus-sign"></i> <span>Add Multiple Questions</span>
                </a>
                <?php } ?>    

            <a class="btn btn-primary" href="<?php echo base_url('admin_control/add_more_question') . '/' . (!empty($mock_title) ? $mock_title->title_id : ''); ?>">
                <i class="glyphicon glyphicon-plus-sign"></i> <span>Add More Question with old options</span>
            </a>
        </div>
    </div>
    
    <div class="mock-detail-content">
        <div class="import-section">
            <form method="post" action="<?= base_url('admin_control/importquestions').'/'.(!empty($mock_title) ? $mock_title->title_id : ''); ?>" class="import-form" enctype="multipart/form-data">
                <div class="import-group">
                    <input type="file" class="form-control" name="fileURL" accept=".csv,.xlsx" required>
    </div>
                <div class="import-actions">
                    <button type="submit" class="btn btn-primary">
                        <i class="glyphicon glyphicon-upload"></i> Import Questions
                    </button>
                    <a href="<?= base_url('assets/images/questions.xlsx') ?>" class="btn btn-success" download>
                        <i class="glyphicon glyphicon-download"></i> Download Questions File
                    </a>
    </div>
    </form>
</div>

        <?php if (isset($mocks) != NULL && !empty($mocks)) { ?>
        <?php
            $i = 1;
            foreach ($mocks as $mock) {
        ?>
            <div class="question-card">
                <div class="question-header">
                    <div style="display: flex; align-items: flex-start; flex: 1; min-width: 0;">
                        <span class="question-number"><?= $i; ?>.</span>
                        <div class="question-content">
                            <textarea cols="10" id="editor<?=$mock->ques_id;?>" name="editor<?=$mock->ques_id;?>" rows="5" disabled class="question-editor"><?=$mock->question; ?></textarea>
                <script>
                    (function() {
      var mathElements = [
                                        'math', 'maction', 'maligngroup', 'malignmark', 'menclose', 'merror',
                                        'mfenced', 'mfrac', 'mglyph', 'mi', 'mlabeledtr', 'mlongdiv', 'mmultiscripts',
                                        'mn', 'mo', 'mover', 'mpadded', 'mphantom', 'mroot', 'mrow', 'ms',
                                        'mscarries', 'mscarry', 'msgroup', 'msline', 'mspace', 'msqrt', 'msrow',
                                        'mstack', 'mstyle', 'msub', 'msup', 'msubsup', 'mtable', 'mtd', 'mtext',
                                        'mtr', 'munder', 'munderover', 'semantics', 'annotation', 'annotation-xml'
      ];

      CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.13.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');

      CKEDITOR.replace('editor<?=$mock->ques_id;?>', {
                                        versionCheck: false,
        extraPlugins: 'ckeditor_wiris',
        removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser',
                                        height: 100,
        fontSize_defaultLabel: '16px',
            contentsCss: [
                'body { font-family: "Roboto", sans-serif; font-size: 16px; }',
                                            '@media (max-width: 767px) { body { font-size: 14px; } }',
                                            '@media (min-width: 768px) { body { font-size: 16px; } }'
            ],
        fontSize_sizes: '16/16px',
        extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
      });
    }());
                </script>
                        </div>
                    </div>
                    <div class="question-actions">
                        <a href="#collapse_<?=$i; ?>" data-toggle="collapse" class="btn accordion-toggle">
                            <i class="glyphicon glyphicon-resize-small"></i> <span class="hidden-xs">View</span>
                        </a>
                        <a class="btn update" data-update="<?=$mock->ques_id;?>" href="#update_ques" data-toggle="modal">
                            <i class="glyphicon glyphicon-edit"></i> <span class="hidden-xs">Modify</span>
                        </a>
                        <?php if($this->session->userdata('user_role_id')==1) { ?>
                        <a onclick="return delete_confirmation()" href="<?php echo base_url('admin_control/delete_question/' . $mock->ques_id); ?>" class="btn btn-danger">
                            <i class="glyphicon glyphicon-trash"></i> <span class="hidden-xs">Delete</span>
                        </a>
                        <?php } ?>
                    </div>
                </div>
                
                <div class="question-details collapse" id="collapse_<?php echo $i; ?>">
                    <div>
                        <span class="option-type-badge">Option type: <?=$mock->option_type; ?></span>
                    <?php if ($mock->option_type == 'Radio') { ?>
                            <div class="option-type-warning">
                                <i class="glyphicon glyphicon-warning-sign"></i> Radio can't have more than 1 right answer.
                            </div>
                    <?php } ?>
                        
                    <?php if ($mock_ans[$mock->ques_id][0]) { ?>
                            <table class="options-table">
                            <thead>
                                <tr>
                                        <th style="width: 50px;">Sl.</th>
                                    <th>Options</th>
                                        <th style="width: 120px;">Right Ans.</th>
                                        <th style="width: 150px;">Action</th>
                                </tr>
                            </thead>
                                <tbody>
                            <?php
                                    $sl = 1;
                            foreach ($mock_ans[$mock->ques_id] as $all_ans) {
                                        foreach ($all_ans as $ans) {
                                    ?>
                                        <tr>
                                            <td data-label="Sl. No"><?php echo $sl; ?></td>
                                            <td class="option-text" data-label="Option">
                                                <a href="#" data-name="ans-text" data-type="textarea" data-rows="2" data-url="<?php echo base_url('admin_control/update_answer/'.$mock->ques_id); ?>" data-pk="<?=$ans->ans_id; ?>" class="data-modify-<?=$ans->ans_id; ?> no-style" style="text-decoration: none; color: inherit;">
                                            <?php if($ans->new==2) { ?>
                                                        <textarea cols="10" id="answer<?=$ans->ans_id;?>" name="answer<?=$ans->ans_id;?>" rows="3" disabled style="width: 100%; border: none; background: transparent; resize: none;"><?=$ans->answer; ?></textarea>
                                            <script>
                                            (function() {
                                            var mathElements = [
                                                                    'math', 'maction', 'maligngroup', 'malignmark', 'menclose', 'merror',
                                                                    'mfenced', 'mfrac', 'mglyph', 'mi', 'mlabeledtr', 'mlongdiv', 'mmultiscripts',
                                                                    'mn', 'mo', 'mover', 'mpadded', 'mphantom', 'mroot', 'mrow', 'ms',
                                                                    'mscarries', 'mscarry', 'msgroup', 'msline', 'mspace', 'msqrt', 'msrow',
                                                                    'mstack', 'mstyle', 'msub', 'msup', 'msubsup', 'mtable', 'mtd', 'mtext',
                                                                    'mtr', 'munder', 'munderover', 'semantics', 'annotation', 'annotation-xml'
                                            ];

                                            CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.13.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');

                                            CKEDITOR.replace('answer<?=$ans->ans_id;?>', {
                                                                    versionCheck: false,
                                                extraPlugins: 'ckeditor_wiris',
                                                removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser',
                                                height: 80,
                                                extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
                                            });
                                            }());
                                        </script>
                                                    <?php } else { 
                                                        echo htmlspecialchars($ans->answer); 
                                                    } ?>
                                                </a>
                                        </td>
                                            <td data-label="Right Answer">
                                                <a href="#" data-name="right-ans" data-type="select" data-source="[{value:0,text:' No '},{value:1,text:' Yes '}]" data-value="<?=$ans->right_ans; ?>" data-url="<?php echo base_url('admin_control/update_answer/'.$mock->ques_id); ?>" data-pk="<?=$ans->ans_id; ?>" class="data-modify-<?=$ans->ans_id; ?> no-style" style="text-decoration: none;">
                                                    <span class="right-ans-badge <?=($ans->right_ans != 0) ? 'yes' : 'no'; ?>">
                                                        <?=($ans->right_ans != 0) ? 'Yes' : 'No'; ?>
                                                    </span>
                                                </a>
                                        </td>
                                            <td data-label="Actions">
                                                <div class="answer-actions">
                                        <?php if($ans->new==1){ ?>
                                                        <a class="btn modify" name="modify-<?=$ans->ans_id; ?>" title="Edit">
                                                            <i class="glyphicon glyphicon-edit"></i>
                                                        </a>
                                                    <?php } ?>
                                                    <?php if($this->session->userdata('user_role_id')==1) { ?>
                                                        <a class="btn btn-danger" onclick="return delete_confirmation();" href="<?php echo base_url('admin_control/delete_answer/' . $ans->ans_id); ?>" title="Delete">
                                                            <i class="glyphicon glyphicon-trash"></i>
                                                        </a>
                                                    <?php } ?>
                                                </div>
                                        </td>
                                    </tr>
                                    <?php
                                    $sl++;
                                }
                                    }
                                    ?>
                                </tbody>
                        </table>
                        <?php } else { ?>
                            <div style="padding: 20px; text-align: center; color: #999; background: #f8f9fa; border-radius: 4px; margin-top: 15px;">
                                No options available
                            </div>
                        <?php } ?>
                    </div>
                </div>
                </div>
        <?php
            $i++;
        }
        ?>
        <?php } else { ?>
            <div class="no-questions">
                <i class="fa fa-info-circle" style="font-size: 48px; color: #ccc; margin-bottom: 15px;"></i>
                <p>This mock has no questions!</p>
    </div>
        <?php } ?>
    </div>
    </div>
