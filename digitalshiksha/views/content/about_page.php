<?php
date_default_timezone_set($this->session->userdata['time_zone']);

        $notices = $this->db->where('notice_status', 1)
                    ->order_by('noticeboard.notice_id', 'desc')
                    ->where('notice_start <=', date('Y-m-d'))
                    ->where('notice_end >=', date('Y-m-d'))
                    ->get('noticeboard')
                    ->result(); 

?>
<style>
    body {
        padding-top: 78px;
    }
    
    /* About Us Page - Modern Design */
    #about-us {
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        padding: 0px;
        min-height: auto;
    }
    
    .about-page-header {
        text-align: center;
        margin-bottom: 30px;
    }
    
    .about-page-header .header-icon {
        font-size: 40px;
        color: #F1B900;
        margin-bottom: 15px;
        display: inline-block;
    }
    
    .about-page-header h1 {
        color: #2c3e50;
        font-size: 38px;
        font-weight: 800;
        margin: 0 0 15px 0;
        text-transform: uppercase;
        position: relative;
        padding-bottom: 15px;
    }
    
    .about-page-header h1::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 100px;
        height: 4px;
        background: linear-gradient(90deg, #F1B900 0%, #ff8c00 100%);
        border-radius: 2px;
    }
    
    .about-content-wrapper {
        background: #fff;
        border-radius: 16px;
        padding: 35px 30px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
        border: 1px solid rgba(241, 185, 0, 0.2);
        margin-bottom: 0;
    }
    
    .about-text-section {
        padding-right: 30px;
    }
    
    .about-text-section p {
        font-size: 16px;
        line-height: 1.8;
        color: #4a5568;
        text-align: justify;
        margin-bottom: 15px;
    }
    
    .about-image-section {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .about-image-section img {
        width: 100%;
        height: auto;
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        transition: transform 0.3s ease;
        object-fit: cover;
    }
    
    .about-image-section img:hover {
        transform: scale(1.02);
    }
    
    /* Responsive Design */
    @media (max-width: 991px) {
        #about-us {
            padding: 80px 0 30px 0;
        }
        
        .about-page-header {
            margin-bottom: 25px;
        }
        
        .about-page-header h1 {
            font-size: 32px;
        }
        
        .about-content-wrapper {
            padding: 30px 25px;
        }
        
        .about-text-section {
            padding-right: 0;
            margin-bottom: 25px;
        }
        
        .about-text-section p {
            font-size: 15px;
            text-align: left;
        }
    }
    
    @media (max-width: 768px) {
        #about-us {
            padding: 80px 0 30px 0;
        }
        
        .about-page-header h1 {
            font-size: 28px;
        }
        
        .about-page-header .header-icon {
            font-size: 36px;
        }
        
        .about-content-wrapper {
            padding: 25px 20px;
        }
    }
</style>

<section id="about-us" class="myBox secPad">
    <div class="container">
        <!-- Header Section -->
        <div class="about-page-header">
            <?php $temp = $this->db->get_where('content', array('content_type' => 'about_us'))->row(); ?>
            <i class="fa fa-graduation-cap header-icon"></i>
            <h1 class="text-uppercase"><strong><?= htmlspecialchars($temp->content_heading); ?></strong></h1>
        </div>
        
        <!-- Content Section -->
        <div class="row">
            <div class="col-md-12">
                <div class="about-content-wrapper">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="about-text-section">
                                <p><?= $temp->content_data; ?></p>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="about-image-section">
                                <img src="<?php echo base_url('assets/images/about.jpg') ?>" alt="About Us" class="img-responsive" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    
