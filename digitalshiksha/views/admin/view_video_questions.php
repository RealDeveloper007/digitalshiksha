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
}

i.fa.fa-youtube {
    font-size: 40px;
    color: red;
}
</style>
<script type="text/javascript" src="<?= base_url('assets/js/html2canvas.js')?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/jsPdf.debug.js')?>"></script>

<div class="block" >  
    <div class="block-content">
    
<div class="row" id="printarea">

<div class="col-sm-12">
    <span style="font-size: 26px;color: black;margin-top: 18px;float:left">
    Video Questions
    </span>
</div>
<br>
<br>
<br>
<br>
<div class="col-sm-12">

    <?php 
    
    if (isset($video_questions) != NULL && !empty($video_questions)) { ?>
    <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered table-hover" id="example">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Video</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $i = 1;
            foreach ($video_questions as $single_video_question) {
        ?>
        <tr class="accordion-group">
            <td><?=$i; ?> </td>
            <td><?= $single_video_question->question ?> </td>     
            <td><a href="https://www.youtube.com/watch?v=<?= $single_video_question->url ?>" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a> </td>    
            <td> <a href="<?= base_url('syllabus_control/delete_syllabus_question?qid='.$single_video_question->id.'&catid='.$_GET['id'].'&type='.$_GET['type']) ?>" onclick="return confirm('Are you sure delete this video?')"><button class="btn btn-danger">Delete</button></a></td> </tr>
        <?php
            $i++;
        }
        ?>
        </tbody>
    </table>
    <?php
    } else {
        echo '<h2 style="color:red;text-align: center;">No video question available here!</h2>';
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