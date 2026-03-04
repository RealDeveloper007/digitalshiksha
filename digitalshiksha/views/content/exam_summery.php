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
    
    /* Modern Exam Summary Page - Optimized */
    #exam_summery {
        padding: 90px 0 40px 0;
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
    }
    
    .exam-summary-wrapper {
        max-width: 1000px;
        margin: 0 auto;
    }
    
    .exam-header-card {
        background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%);
        color: #fff;
        border-radius: 16px;
        padding: 15px 25px;
        margin-bottom: 20px;
        box-shadow: 0 6px 25px rgba(241, 185, 0, 0.35);
        position: relative;
        overflow: hidden;
    }
    
    .exam-header-card::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
    }
    
    .exam-header-card h2 {
        font-size: 22px;
        font-weight: 600;
        margin: 0;
        text-transform: none;
        position: relative;
        z-index: 1;
        line-height: 1.3;
    }
    
    .social-share-wrapper {
        position: absolute;
        top: 12px;
        right: 12px;
        z-index: 2;
    }
    
    .exam-info-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
        margin-bottom: 20px;
    }
    
    .exam-info-card {
        background: #fff;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.06);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        border: 1px solid #e5e7eb;
    }
    
    .exam-info-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }
    
    .exam-info-card h3 {
        font-size: 14px;
        font-weight: 600;
        color: #2c3e50;
        margin: 0 0 15px 0;
        padding-bottom: 10px;
        border-bottom: 3px solid #F1B900;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .exam-info-table {
        width: 100%;
        border-collapse: collapse;
    }
    
    .exam-info-table tr {
        border-bottom: 1px solid #f3f4f6;
    }
    
    .exam-info-table tr:last-child {
        border-bottom: none;
    }
    
    .exam-info-table th {
        padding: 8px 0;
        text-align: left;
        font-weight: 500;
        color: #6b7280;
        font-size: 13px;
        width: 40%;
    }
    
    .exam-info-table td {
        padding: 8px 0;
        color: #1f2937;
        font-weight: 500;
        font-size: 14px;
    }
    
    .syllabus-card {
        background: #fff;
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.06);
        border: 1px solid #e5e7eb;
    }
    
    .syllabus-card h3 {
        font-size: 14px;
        font-weight: 600;
        color: #2c3e50;
        margin: 0 0 12px 0;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .syllabus-card p {
        color: #4a5568;
        font-size: 14px;
        line-height: 1.6;
        margin: 0;
    }
    
    .exam-action-btn {
        display: inline-block;
        background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%);
        color: #fff;
        padding: 14px 40px;
        border-radius: 30px;
        font-size: 15px;
        font-weight: 600;
        text-decoration: none;
        box-shadow: 0 6px 25px rgba(241, 185, 0, 0.35);
        transition: all 0.3s ease;
        text-transform: none;
        letter-spacing: 0.3px;
        border: none;
    }
    
    .exam-action-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 30px rgba(241, 185, 0, 0.45);
        color: #fff;
        text-decoration: none;
    }
    
    .exam-action-btn.pay-btn {
        background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
        box-shadow: 0 6px 25px rgba(44, 62, 80, 0.35);
    }
    
    .exam-action-btn.pay-btn:hover {
        box-shadow: 0 8px 30px rgba(44, 62, 80, 0.45);
    }
    
    .action-center {
        text-align: center;
        padding: 25px 0 15px 0;
    }
    
    @media (max-width: 768px) {
        #exam_summery {
            padding: 70px 0 20px 0;
        }
        
        .exam-summary-wrapper {
            margin: 70px auto;
        }
        
        .exam-header-card {
            padding: 15px 18px;
            margin-bottom: 12px;
        }
        
        .exam-header-card h2 {
            font-size: 18px;
            padding-right: 80px;
            margin-bottom: 0;
        }
        
        /* Combine all sections into one card on mobile */
        .exam-info-grid {
            display: block;
            margin-bottom: 0;
            background: #fff;
            border-radius: 12px 12px 0 0;
            padding: 15px;
            padding-bottom: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.06);
            border: 1px solid #e5e7eb;
            border-bottom: none;
        }
        
        .exam-info-card {
            background: transparent;
            box-shadow: none;
            border: none;
            padding: 0;
            margin-bottom: 0;
            padding-bottom: 15px;
            border-bottom: 1px solid #e5e7eb;
        }
        
        .exam-info-card:last-of-type {
            border-bottom: 1px solid #e5e7eb;
            padding-bottom: 15px;
        }
        
        .exam-info-card h3 {
            font-size: 14px;
            margin-bottom: 10px;
            padding-bottom: 8px;
            border-bottom: 2px solid #F1B900;
        }
        
        .exam-info-table {
            font-size: 13px;
        }
        
        .exam-info-table th,
        .exam-info-table td {
            padding: 6px 0;
            font-size: 13px;
        }
        
        /* Combine syllabus card with exam-info-grid - make it appear as part of same card */
        .syllabus-card {
            background: #fff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.06);
            border: 1px solid #e5e7eb;
            border-top: none;
            border-radius: 0 0 12px 12px;
            padding: 15px;
            margin-bottom: 12px;
            margin-top: 0;
        }
        
        .syllabus-card h3 {
            font-size: 14px;
            margin-bottom: 8px;
            padding-bottom: 8px;
            border-bottom: 2px solid #F1B900;
        }
        
        .syllabus-card p {
            font-size: 13px;
            line-height: 1.5;
            margin: 0;
        }
        
        .action-center {
            padding: 15px 0 10px 0;
        }
        
        .exam-action-btn {
            padding: 12px 30px;
            font-size: 14px;
        }
    }
</style>
<?php 
$user_info = $this->db->get_where('users', array('user_id' => $this->session->userdata('user_id')))->row(); 
// Calculate time duration for display
$hr = (int) substr($mock->time_duration, 0, 2);
$minutes = substr($mock->time_duration, -5, 5);
?>
<section id="exam_summery" class="secPad">
    <div class="container">
        <div class="exam-summary-wrapper">
            <!-- Exam Header -->
            <div class="exam-header-card">
                <?php if(isset($_SESSION['type']) && $_SESSION['type'] != 'andriod') { ?>
                <div class="social-share-wrapper">
                    <span class="social_icons">
                        <a href="javascript:void(0)" class="social whatsapp" data-text="<?= $mock->title_name; ?>" data-link="<?= base_url('mock-test-details/' . $mock->slug); ?>">
                            <img src="<?= base_url('assets/images/share.png') ?>">
                        </a>
                        <a href="https://www.facebook.com/sharer.php?u=<?= base_url('mock-test-details') . '/' . $mock->slug; ?>&title=<?= $mock->title_name; ?>" class="social" onclick="FbShare('<?= $mock->sub_cat_name ?>','<?= $mock->feature_img_name; ?>','<?= $mock->slug; ?>','<?= $mock->created_byy; ?>','<?= ($hr) ? $mock->time_duration . ' hours' : $minutes . ' minutes'; ?>','<?= $mock->random_ques_no; ?>')" target="_blank"> 
                            <img class="img-responsive" src="<?= base_url('assets/images/fb.png'); ?>">
                        </a>
                    </span>
                </div>
                <?php } ?>
                
                <h2><?= htmlspecialchars($mock->title_name) ?></h2>
                
                <div style="margin-top: 12px; font-size: 13px; opacity: 0.95;">
                    <?= validation_errors('<div class="alert alert-danger" style="margin: 0;">', '</div>'); ?>
                    <?= ($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>
                    <?= (isset($message)) ? $message : ''; ?>
                </div>
            </div>

            <!-- Exam Information Grid -->
            <div class="exam-info-grid">
                <div class="exam-info-card">
                    <h3><i class="fa fa-info-circle"></i> Exam Summary</h3>
                    <table class="exam-info-table">
                        <tr>
                            <th>Category:</th>
                            <td><?= htmlspecialchars($mock->category_name . ' / ' . $mock->sub_cat_name) ?></td>
                        </tr>
                        <tr>
                            <th>Duration:</th>
                            <td><strong><?= ($hr) ? $mock->time_duration . ' hours' : $minutes . ' minutes' ?></strong></td>
                        </tr>
                    </table>
                </div>

                <div class="exam-info-card">
                    <h3><i class="fa fa-list-alt"></i> Exam Rules</h3>
                    <table class="exam-info-table">
                        <tr>
                            <th>Total Questions:</th>
                            <td><?= $mock->random_ques_no ?></td>
                        </tr>
                        <tr>
                            <th>Passing Score:</th>
                            <td><?= $mock->pass_mark ?>%</td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- Syllabus Card -->
            <?php if (!empty($mock->syllabus)) { ?>
            <div class="syllabus-card">
                <h3><i class="fa fa-book"></i> Syllabus</h3>
                <p><?= htmlspecialchars($mock->syllabus) ?></p>
            </div>
            <?php } ?>

            <!-- Action Button -->
            <div class="action-center">
                <?php 
                if ($mock->exam_price) {
                    if (($this->session->userdata('log')) && ($user_info->subscription_id != 0) && ($user_info->subscription_end > now())) {
                        $payment_info = 'instructions';
                    } else {
                        $payment_info = 'payment_process';
                    }
                } else {
                    $payment_info = 'instructions';
                }
                ?>
                <a href="<?= base_url('mock-test-details/' . $payment_info . '/' . $mock->slug) ?>" class="exam-action-btn <?= ($payment_info == 'payment_process') ? 'pay-btn' : '' ?>">
                    <i class="fa <?= ($payment_info == 'payment_process') ? 'fa-credit-card' : 'fa-play-circle' ?>" style="margin-right: 6px;"></i>
                    <?php echo ($payment_info == 'payment_process') ? 'Pay with PayPal' : 'Start Exam' ?>
                </a>
            </div>
        </div>
    </div>
</section>

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
