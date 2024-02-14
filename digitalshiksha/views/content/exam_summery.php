<style>
    #contact {
        display: none;
    }

    a.social img {
        width: 100px;
        height: 35px;
    }

    span.social_icons {
        display: flex;
        right: 0px;
        position: relative;
        padding: 2px;
    }
    .secPad {
    padding: 0px 0 !important;
}
</style>
<?php $user_info = $this->db->get_where('users', array('user_id' => $this->session->userdata('user_id')))->row(); ?>
<section id="exam_summery" class="secPad myBox examSum">
    <div class="container">
        <div class="box">
            <div class="row">
                <h3 class="text-uppercase text-center "><strong><?= $mock->title_name ?></strong></h3>
                <div class="line_br mrauto"></div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                    <?= ($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>
                    <?= (isset($message)) ? $message : ''; ?>
                </div>
                <div class="col-md-12">
                    <?php if($_SESSION['type'] != 'andriod') { ?>
                    <span class="social_icons">

                        <a href="javascript:void(0)" class="social whatsapp" data-text="<?= $mock->title_name; ?>" data-link="<?= base_url('mock-test-details/' . $mock->slug); ?>">
                            <img src="<?= base_url('assets/images/share.png') ?>">
                        </a>

                        <a href="https://www.facebook.com/sharer.php?u=<?= base_url('mock-test-details') . '/' . $mock->slug; ?>&title=<?= $mock->title_name; ?>" class="social" onclick="FbShare('<?= $mock->sub_cat_name ?>','<?= $mock->feature_img_name; ?>','<?= $mock->slug; ?>','<?= $mock->created_byy; ?>','<?= ($hr) ? $mock->time_duration . ' hours' : $minutes . ' minutes'; ?>','<?= $mock->random_ques_no; ?>')" target="_blank"> <img class="img-responsive" src="<?= base_url('assets/images/fb.png'); ?>">
                        </a>
                    </span>
                <?php } ?>
                    <!--       <h4 style="font-weight: 600;color: #191970;">
                        <span class="text-muted" style="font-weight: 600; color: #191970;"># </span> 
                    </h4>   -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-info">
                                <div class="panel-heading">Exam Summery:</div>
                                <div class="panel-body">
                                    <table class="table table-condensed table-bordered">
                                        <tr>
                                            <th>Title:</th>
                                            <td><?= $mock->title_name ?></td>
                                        </tr>
                                        <tr>
                                            <th>Category:</th>
                                            <td><?= $mock->category_name . '/' . $mock->sub_cat_name; ?></td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-info">
                                <div class="panel-heading">Rules:</div>
                                <div class="panel-body">
                                    <table class="table table-condensed table-bordered">
                                        <tr>
                                            <th>Total Questions:</th>
                                            <td><?= $mock->random_ques_no ?></td>
                                        </tr>
                                        <tr>
                                            <th>Passing Score:</th>
                                            <td><?= $mock->pass_mark ?>%</td>
                                        </tr>
                                        <tr>
                                            <th>Duration:</th>
                                            <td><?= $mock->time_duration ?> <span class="text-muted"> hours</span></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center syh3">
                        <!--<h4 class="text-muted"> </h4>-->
                        <p class="syllabus"><span style="font-size: 19px;font-weight: 400;display: initial;">Syllabus:</span> <?= $mock->syllabus; ?></p>
                    </div>
                    <?php if ($mock->exam_price) {
                        if (($this->session->userdata('log')) && ($user_info->subscription_id != 0) && ($user_info->subscription_end > now())) {
                            $payment_info = 'instructions';
                        } else {
                            $payment_info = 'payment_process';
                        }
                    } else {
                        $payment_info = 'instructions';
                    }
                    ?>
                    <div class="newStart text-center">
                        <a href="<?= base_url('mock-test-details/' . $payment_info . '/' . $mock->slug) ?>" class="btn btn-success"> <?php echo ($payment_info == 'payment_process') ? 'Pay with PayPal' : 'Start Exam' ?></a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section><!--/#pricing-->

<script>
    $(document).ready(function() {
        $('.whatsapp').on("click", function(e) {
            if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                var article = $(this).attr("data-text");
                var weburl = $(this).attr("data-link");
                var whats_app_message = encodeURIComponent(document.URL);
                var whatsapp_url = "whatsapp://send?text=" + weburl;
                window.location.href = whatsapp_url;
            } else {
                alert('You Are Not On A Mobile Device. Please Use This Button To Share On Mobile');
            }
        });
    });
</script>