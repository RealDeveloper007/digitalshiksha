<style>
    #contact {
        display: none;
    }
</style>
<?php $user_info = $this->db->get_where('users', array('user_id' => $this->session->userdata('user_id')))->row(); ?>
<section id="exam_summery" class="secPad myBox examSum listUl mobFont">
    <div class="container">
        <div class="box">
            <div class="row">
                <h1 class="text-uppercase text-center h1"> Exam Title: <strong><?= $mock->title_name ?></strong></h1>
                <div class="line_br mrauto"></div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <noscript>
                        <div class="alert alert-danger">Your browser does not support JavaScript or JavaScript is disabled! Please use JavaScript enabled browser to take this exam.</div>
                    </noscript>
                    <?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                    <?= ($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>
                    <?= (isset($message)) ? $message : ''; ?>
                </div>
                <div class="col-md-12">
                    <h4 class="text-muted" style="font-weight: 600;color: #191970;">Instructions</h4>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-hand-o-right" aria-hidden="true"></i> Each question has multiple options and you have to choose one answer.</li>
                        <li><i class="fa fa-hand-o-right" aria-hidden="true"></i> There is no negative marking for incorrect answer, so you may attempt all questions.</li>
                        <li><i class="fa fa-hand-o-right" aria-hidden="true"></i> You can recheck and change your answers before final submit.</li>
                        <li><i class="fa fa-hand-o-right" aria-hidden="true"></i> If you left any question without answer it will be count as wrong answer.</li>
                        <li><i class="fa fa-hand-o-right" aria-hidden="true"></i> You have to complete test within given duration of time which is shown at the top.</li>
                        <li><i class="fa fa-hand-o-right" aria-hidden="true"></i> You can’t resume the exam before final submit.</li>
                    </ul>
                    <div class="btnset">
                        <a href="<?= base_url('mock-test-details/start-exam/' . $mock->slug) ?>" id="start-exam" class="btn btn-success">Start Exam</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--/#pricing-->

<script>
    $(document).ready(function() {
        $("#start-exam").removeAttr("disabled");
    })
</script>
<script language="JavaScript">
    <!--
    // javascript: window.history.forward(1);
    //
    -->
</script>