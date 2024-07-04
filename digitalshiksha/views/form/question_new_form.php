<!-- Dynamic Form Script-->
<script src="https://cdn.ckeditor.com/4.13.1/standard-all/ckeditor.js"></script>
<script type="text/javascript">
//Add basic 4 fields initially
var i = 5, s;
function add_form(val) {
  //  alert(val);
    i = 5;
    var opt = '<div class=row><div class="col-xs-offset-1 col-xs-10 col-sm-offset-2 col-sm-8">';
        opt += '<p class="text-primary"><i class="glyphicon glyphicon-flash"></i> Select correct answer/s from left radio/checkbox options.</p>';
        opt += '</div></div>';

    for (q = 1; q <= 4; q++) {
        opt += '<div class="form-group">';
        opt += '<label for="options[' + q + ']" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">Option ' + q + ': </label>';
        opt += '<div class="col-lg-5 col-sm-8 col-xs-7 col-mb">';
        opt += '<div class="input-group">';
        opt += '<span class="input-group-addon">';
        if (val == 'Radio') {
            opt += '<input type="' + val + '" name="ans" onclick="put_right_ans(' + q + ')" required="required">  <span class="invisible-on-sm"> Correct Ans.</span>';
        } else if (val == 'Checkbox') {
            opt += '<input type="' + val + '" name="right_ans[' + q + ']">  <span class="invisible-on-sm"> Correct Ans.</span>';
        }
        opt += '</span>';
        if (q <= 2) {
            opt += '<textarea name="options'+q+'" class="form-control" required="required" id="options'+q+'"></textarea>';
    
        }
        if (q > 2) {
            opt += '<textarea name="options'+q+'" class="form-control" required="required" id="options'+q+'"></textarea>';
        }
        opt += '</div></div></div>';
    }
    opt += '<div id="add_more_field-5"></div>';
    opt += '<div class="form-group">';
    opt += '<label class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">&nbsp;</label><div class="col-lg-5 col-sm-8 col-xs-7 col-mb">';
    opt += '<button type="button" class="btn btn-info" id="add_btn" onclick="add_field()"><icon class="icon-plus"></icon> Add More Options</button>';
    opt += '</div></div>';
    document.getElementById('options').innerHTML = opt;
}

//add_form('Radio');

//Add more fields
function add_field() {
    var type;
    if (document.getElementById('radio1').checked) {
        type = 'radio';
    } else if (document.getElementById('checkbox1').checked) {
        type = 'checkbox';
    }
    if (i <= 8) {
        var str = '<div class="form-group"><label for="options[' + i + ']" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobil">Option ' + i + ': </label>';
        str += '<div class="col-lg-5 col-sm-8 col-xs-7 col-mb">';
        str += '<div class="input-group">';
        str += '<span class="input-group-addon">';
        if (type === 'radio') {
            str += '<input type="' + type + '" name="ans" onclick="put_right_ans(' + i + ')" required="required">  <span class="invisible-on-sm"> Correct Ans.</span>';
        } else if (type === 'checkbox') {
            str += '<input type="' + type + '" name="right_ans[' + i + ']">  <span class="invisible-on-sm"> Correct Ans.</span>';
        }    
        str += '</span>';
        str += '<input name="options[' + i + ']" class="form-control" type="text">';
        str += '</div></div></div><div id="add_more_field-' + (i + 1) + '"></div>';

        document.getElementById('add_more_field-' + i).innerHTML = str;
        i++;
    } else {
        alert('You added maximum number of options!');
    }
}

//Pick the righ answers and set the value to hidden field
function put_right_ans(val) {
    var ryt = '<input type="hidden" name="right_ans[' + val + ']" value="on">';
    document.getElementById('hidden_fields').innerHTML = ryt;
}
</script>
 
<?php
if ($message) {
    echo $message;
}
?>
<?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '';?>  
<style>
    .importform .col-md-6 {
    display: flex;
}
</style>
<!-- block -->
<div class="block">
    <div class="navbar block-inner block-header">

          <div class="row">
        <div class="col-md-12">
    <form method="post" action="<?= base_url('admin_control/importquestions').'/'.$title_id ?>" class="importform" enctype="multipart/form-data">
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

        <div class="row">
            <p class="text-muted">
                <span class=""><?='Exam Title: '.$mock_title; ?></span>
                <span class="pull-right"><?='Question No: '.$question_no; ?></span>
            </p>
        </div>
    </div><br/>
    <div class="block-content">
    <?=form_open_multipart(base_url('admin_control/create_question'), 'role="form" class="form-horizontal"'); ?>
    <div class="row">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-xs-offset-1 col-xs-10">
                <?=validation_errors('<div class="alert alert-danger">', '</div>'); ?>
            </div>
        </div>

        <div id="hidden_fields"></div>
        <div class="row">
            <input type="hidden" name="ques_no" value="<?=$question_no; ?>">
            <input type="hidden" name="ques_id" value="<?=$title_id; ?>">
            <input type="hidden" name="mock_title" value="<?=$mock_title; ?>">
            <div class="form-group">
                <label for="question" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">Question: </label>
                <div class="col-lg-5 col-sm-8 col-xs-7 col-mb">
                  <?php 
                    $data = array(
                        'name'         => 'question',
                        'id'           => 'question',
                        'placeholder' => 'Question Title',
                        'value'       => '',
                        'rows'        => '10',
                        'class'       => 'form-control',
                        'required' => 'required',
                    ); ?>
                    <?=form_textarea($data) ?>
                </div>
            </div>
            <div class="form-group" id="media-choose">
                <label for="upload-media-file" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">Upload Media File: </label>
                <div class="col-lg-5 col-sm-8 col-xs-7 col-mb">
                    <a href="#" class="btn btn-default" id='upload-media-file'>Choose</a>
                </div>
            </div>
            <div id="media-option"></div>
            <div id="media-field"></div>

            <div class="form-group" style="display:none;">
                <label for="ans_type" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">Answer Type: </label>
                <div class="col-lg-5 col-sm-8 col-xs-7 col-mb">
                    <label class="radio-inline">
                        <input type="radio" id="radio1" name="ans_type" required="required" value="Radio" checked> <span>Radio </span>&nbsp;&nbsp;&nbsp;&nbsp;
                    </label>
                </div>
            </div><br/>
            <div id="options">
    <div class="row">
        <div class="col-xs-offset-1 col-xs-10 col-sm-offset-2 col-sm-8">
            <p class="text-primary">
                <i class="glyphicon glyphicon-flash"></i> Select correct answer/s from left radio options.
            </p>
        </div>
    </div>
    <div class="form-group">
        <label for="options[1]" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">Option 1: </label>
        <div class="col-lg-5 col-sm-8 col-xs-7 col-mb">
            <div class="input-group">
                <span class="input-group-addon">
                    <input type="Radio" name="ans" onclick="put_right_ans(1)" required="required">  
                    <input type="hidden" name="new[1]" value="2" required="required">
                    <span class="invisible-on-sm"> Correct Ans.</span>
                </span>
                <textarea name="options[1]" class="form-control" required="required" id="options[1]"></textarea>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="options[2]" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">Option 2: </label>
        <div class="col-lg-5 col-sm-8 col-xs-7 col-mb">
            <div class="input-group">
                <span class="input-group-addon">
                    <input type="Radio" name="ans" onclick="put_right_ans(2)" required="required">  
                    <input type="hidden" name="new[2]" value="2" required="required">
                    <span class="invisible-on-sm"> Correct Ans.</span>
                </span>
                <textarea name="options[2]" class="form-control" required="required" id="options[2]"></textarea
                ></div>
            </div>
        </div>
        <div class="form-group">
            <label for="options[3]" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">Option 3: </label>
            <div class="col-lg-5 col-sm-8 col-xs-7 col-mb">
                <div class="input-group">
                    <span class="input-group-addon">
                        <input type="Radio" name="ans" onclick="put_right_ans(3)" required="required">
                        <input type="hidden" name="new[3]" value="2" required="required">
                          <span class="invisible-on-sm"> Correct Ans.</span>
                        </span>
                        <textarea name="options[3]" class="form-control" required="required" id="options[3]"></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="options[4]" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">Option 4: </label>
                <div class="col-lg-5 col-sm-8 col-xs-7 col-mb">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <input type="Radio" name="ans" onclick="put_right_ans(4)" required="required">
                            <input type="hidden" name="new[4]" value="2" required="required">
                              <span class="invisible-on-sm"> Correct Ans.</span>
                            </span>
                            <textarea name="options[4]" class="form-control" required="required" id="options[4]"></textarea>
                        </div>
                    </div>
                </div>
                </div>
               
                
               
            <div class="form-group">
                <div class="col-sm-8 col-xs-7 col-sm-offset-2 col-xs-offset-0">
                    <div id="progressBar" style="display:none;"><br/><img src="<?=base_url('assets/images/progress.gif')?>" /></div>
                </div>
            </div>
            <br/><hr/>
            <div class="row">
                <div class="col-xs-offset-1 col-xs-11 col-sm-offset-2 col-md-8">
                    <button type="submit" onclick="$('#progressBar').show();" class="btn btn-primary col-xs-5 col-sm-3"> <i class="glyphicon glyphicon-ok"></i> Save and Add More</button>
                    <button type="submit" onclick="$('#progressBar').show();" class="btn btn-info col-xs-offset-1" name="done" value="done"><i class="glyphicon glyphicon-saved"></i> Save and Done</button>
                </div>
            </div><br/>
            </form>
        </div>
    </div>
    </div>
    </div>
</div>
<?=$this->load->view('plugin_scripts/bootstrap-wysihtml5');?>

<!-- Dynamic media file upload Script-->
<script type="text/javascript">
$('#upload-media-file').click(function(){
    var type = '<div class="form-group">'
                +'<label for="media_type" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">Media Type: </label>'
                +'<div class="col-lg-5 col-sm-8 col-xs-7 col-mb" style="margin-top: 5px;">'
                        +'<input type="radio" value="youtube" name="media_type" required="required" onclick="add_media_field(this.value)"> <span>YouTube </span>&nbsp;&nbsp;&nbsp;&nbsp;'
                        +'<input type="radio" value="video" name="media_type" required="required" onclick="add_media_field(this.value)"> <span>Video </span>&nbsp;&nbsp;&nbsp;&nbsp;'
                        +'<input type="radio" value="image" name="media_type" required="required" onclick="add_media_field(this.value)"> <span>Image </span>&nbsp;&nbsp;&nbsp;&nbsp;'
                        +'<input type="radio" value="audio" name="media_type" required="required" onclick="add_media_field(this.value)"> <span>Audio </span>'
                +'</div>'
            +'</div>';
    $('#media-choose').hide();
    $('#media-option').append(type);
})

//Add media fields
function add_media_field(val) {
    var field = '<div class="form-group">'
                +'<label for="media_field" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">Add Media: </label>'
                +'<div class="col-lg-5 col-sm-8 col-xs-7 col-mb"><input type="hidden" name="media_type" value="'+val+'">';
    if (val == 'video') {
            var types = 'mp4 | webm | ogg';
    }else if (val == 'audio') {
            var types = 'ogg | mp3 | wav';        
    }else if (val == 'image') {
            var types = 'gif | jpg | png | jpeg';
    };

    switch(val){
        case 'youtube':
            field += '<input type="text" class="form-control" name="media">';
            break;
        case 'video':
        case 'image':
        case 'audio':
            field += '<input type="file" id="media" name="media" style="margin-top:8px;">';
            field += '<p class="help-block"><i class="glyphicon glyphicon-warning-sign"></i> Allowed types = '+ types +'.</p>';
            break;
    }
    field +='</div></div>';

    $('#media-option').hide();
    $('#media-field').append(field);
}


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

      CKEDITOR.replace('question', {
        versionCheck : false,
        extraPlugins: 'ckeditor_wiris',
        // For now, MathType is incompatible with CKEditor file upload plugins.
        removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser',
        height: 100,
        // Update the ACF configuration with MathML syntax.
        extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
      });


for(i=1;i<=4;i++)
{
      var mathElements1 = [
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

        CKEDITOR.replace('options['+i+']', {
        versionCheck : false,
        extraPlugins: 'ckeditor_wiris',
        // For now, MathType is incompatible with CKEditor file upload plugins.
        removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser',
        height: 100,
        // Update the ACF configuration with MathML syntax.
        extraAllowedContent: mathElements1.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
        });

    }


    }());
    
</script>
                
            
            
  