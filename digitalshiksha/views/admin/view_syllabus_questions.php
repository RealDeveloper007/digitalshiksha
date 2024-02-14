<style>
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
};

</style>
<script type="text/javascript" src="<?= base_url('assets/js/html2canvas.js')?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/jsPdf.debug.js')?>"></script>

<div class="block" >  
    <div class="block-content">
    
<div class="row" id="printarea">

<div class="col-sm-12">
    <span style="font-size: 26px;color: black;margin-top: 18px;float:left">
    MCQ Questions
    </span>
</div>
<br>
<br>
<br>
<br>
<div class="col-sm-12">

    <?php 
    
    if (isset($mocks) != NULL && !empty($mocks)) { ?>
    <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered table-hover" id="example">
        <thead>
            <tr>
                <th>#</th>
                <th>Question in English</th>
                <th>Question in Hindi</th>
                <th></th>
                <th>Option 1</th>
                <th>Option 2</th>
                <th>Option 3</th>
                <th>Option 4</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $i = 1;
            foreach ($mocks as $mock) {
        ?>
        <tr class="accordion-group">
            <td><?=$i; ?> </td>
            <td>
             <?=$mock->question; ?>
            <td>
                <td> <?=$mock->question_hindi=='' ? '--' : $mock->question_hindi; ?> </td> 
                
                <?php if ($mock_ans[$mock->ques_id][0]) {
                            foreach ($mock_ans[$mock->ques_id] as $all_ans) {
                                foreach ($all_ans as $ans) { ?>
                                   
                                        <td class="<?=($ans->right_ans != 0) ? 'ans' : '' ?>">
                                         <span><?=($ans->right_ans != 0) ? '<img src="'.base_url('assets/images/check.png').'" style="width:20px;">' : ''; ?> <?=$ans->answer; ?></span>
                                        </td>
                                        
                                <?php
                                }
                            }
                         } ?>
        </tr>
        <?php
            $i++;
        }
        ?>
        </tbody>
    </table>
    <?php
    } else {
        echo '<h2 style="color:red;text-align: center;">This mock have no question!</h2>';
    }
    ?>
    </div>
    </div>
    </div>
</div><!--/span-->

 <script>
$('#example td:nth-child(3)').hide();
$('#example th:nth-child(4)').hide();

var downPdf = document.getElementById("renderPdf");
var section_head = document.getElementById("printarea");

downPdf.onclick = function() {

    $('nav.navbar.navbar-inverse.navbar-fixed-top').hide();
    $("#wrapper").addClass("PrintClass");

    html2canvas(document.section_head, {
        onrendered:function(canvas) {

            var contentWidth = canvas.width;
            var contentHeight = canvas.height;

            var pageHeight = contentWidth / 595.28 * 841.89;
            var leftHeight = contentHeight;
            var position = 0;
            var imgWidth = 555.28;
            var imgHeight = 555.28/contentWidth * contentHeight;

            var pageData = canvas.toDataURL('image/jpeg', 1.0);

            var pdf = new jsPDF('', 'pt', 'a4');
            // if (leftHeight < pageHeight) {
                pdf.addImage(pageData, 'JPEG', 20, 0, imgWidth, imgHeight );
            /* } else {
                while(leftHeight > 0) {
                    pdf.addImage(pageData, 'JPEG', 20, position, imgWidth, imgHeight)
                    leftHeight -= pageHeight;
                    position -= 841.89;
                    if(leftHeight > 0) {
                        pdf.addPage();
                    }
                }
            } */

            pdf.save('<?= $mock_details->title_name ?>_report.pdf');
            location.reload();
        }
    })
}

</script>