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
    PDF Questions
    </span>
</div>
<br>
<br>
<br>
<br>
<div class="col-sm-12">

    <?php 
  //  print_r($pdf_questions); die;
    if (isset($pdf_questions) != NULL && !empty($pdf_questions)) { ?>
    <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered table-hover" id="example">
        <thead>
            <tr>
                <th>#</th>
                <th>Question</th>
                <th>Answer</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $i = 1;
            foreach ($pdf_questions as $all_pdf_questions) {
        ?>
        <tr class="accordion-group">
            <td><?=$i; ?> </td>
            <td> <?=$all_pdf_questions->question; ?></td>
            <td> <?=$all_pdf_questions->url; ?> </td> 
            <td style="display: block ruby;"> <a href="<?= base_url('syllabus_control/edit_syllabus_questions?qid='.$all_pdf_questions->id.'&catid='.$_GET['id'].'&type='.$_GET['type']) ?>"><button class="btn btn-warning">Edit</button></a> <a href="<?= base_url('syllabus_control/delete_syllabus_question?qid='.$all_pdf_questions->id.'&catid='.$_GET['id'].'&type='.$_GET['type']) ?>" onclick="return confirm('Are you sure delete this question?')"><button class="btn btn-danger">Delete</button></a></td> 
        </tr>
        <?php $i++; } ?>
        </tbody>
    </table>
    <?php
    } else {
        echo '<h2 style="color:red;text-align: center;">No pdf questions found!</h2>';
    }
    ?>
    </div>
    </div>
    </div>
</div><!--/span-->

 <script>
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