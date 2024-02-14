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
    body
    {
        padding-top: 78px;
    }
</style>
<section id="about-us" class="myBox secPad">
    <div class="container">
        <div class="row">
            <div class="box first" id="about">
                <div class="col-md-6 col-sm-12">
                    <div class="text-left">
                        <?php $temp = $this->db->get_where('content', array('content_type' => 'about_us'))->row(); ?>
                        <i class="fa fa-apple fa fa-md fa fa-color1"></i> 
                        <h1 class="text-uppercase h1"><strong><?=$temp->content_heading; ?></strong></h1>
                        <div class="line_br"></div>
                        <p><?=$temp->content_data; ?></p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <img src="https://digitalshikshadarpan.com/blog_files/about.jpg" class="img-responsive" />
                </div>
            </div>
        </div>
    </div>
</section>
    
