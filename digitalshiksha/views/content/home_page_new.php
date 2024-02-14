<?php if (isset($News->notice_title)) {
    echo "<marquee>" . $News->notice_title . "</marquee>";
} ?>
  <link href="<?php echo base_url('assets/css/home_p.css') ?>" rel="stylesheet" media="screen">

<section id="main-slider" class="carousel">
      <?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>
        <?= ($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>
        <?= (isset($message)) ? $message : ''; ?>

    <div class="carousel-inner">
        <?php $i = 0;
        $sliders = $this->db->where('content_type', 'slider_text')->get('content')->result();
        foreach ($sliders as $slider) {
            $i++; ?>
            <div class="item <?= ($i == 1) ? 'active' : ''; ?>">
                <div class="container">
                    <div class="carousel-content">
                        <h1><?= $slider->content_heading; ?></h1>
                        <p class="lead"><?= $slider->content_data; ?></p>
                    </div>
                </div>
            </div><!--/.item-->
        <?php } ?>
    </div><!--/.carousel-inner-->
    
    <a class="prev" href="#main-slider" data-slide="prev"><i class="fa fa-angle-left"></i></a>
    <a class="next" href="#main-slider" data-slide="next"><i class="fa fa-angle-right"></i></a>
</section><!--/#main-slider-->

<section id="about-us" class="aboutHome secPad bgblue">
    <div class="container">
        <div class="box myBox " id="about">
            <?php $temp = $this->db->get_where('content', array('content_type' => 'about_us'))->row(); ?>
            <div class="col-md-12">
                <h1 class="text-uppercase text-center h1"><strong><?= $temp->content_heading; ?></strong></h1>
                <div class="line_br mrauto"></div>
            </div>
            <div class="col-md-6 col-sm-12">
                <img src="<?php echo base_url('blog_files/about.jpg') ?>" class="img-responsive">
            </div>

            <div class="col-md-6 col-sm-12">

                <i class="fa fa-apple fa fa-md fa fa-color1"></i>

                <p><?= $temp->content_data; ?></p>

            </div>
        </div>
    </div>
</section>
<section class="achivement-area bg-with-black">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center">
                    <h2 class="title">Our <span class="inner">Achievement</span></h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="single-achivement">
                    <div class="icon">
                        <img src="<?= base_url('assets/images/teacher.png') ?>" alt="">                         
                    </div>
                    <div class="content">
                        <h2 class="counter counter-up" data-counterup-time="1500" data-counterup-delay="30">51</h2>
                        <p class="name">Teachers</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="single-achivement">
                    <div class="icon">
                        <img src="<?= base_url('assets/images/student.png') ?>" alt="">                      
                    </div>
                    <div class="content">
                        <h2 class="counter counter-up" data-counterup-time="1500" data-counterup-delay="30"><?= $total_student ?></h2>
                        <p class="name">Students</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="single-achivement">
                    <div class="icon">
                        <img src="<?= base_url('assets/images/event.png') ?>" alt="">
                    </div>
                    <div class="content">
                        <h2 class="counter counter-up" data-counterup-time="1500" data-counterup-delay="30"><?= $total_exam ?></h2>
                        <p class="name">Exams</p>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</section>
<section id="notice" class="secPad">
    <div class="container">
        <div class="box">
            <div class="row">
                <div class="col-md-12">
                    <table border="1px solid" style="border-collapse: separate;
			border-color:black;
			background-color:transparent;
			border-spacing:5px;width:100%">
                        <tbody>
                            <tr>
                                <th style="background-color:#191970;
			color: white;
			height: 70px;
			width:550px;">
                                    <h3 class="noticBor">Notice Board</h3>
                                </th>
                            </tr>
                            <tr>
                                <td>

                                    <div class="notiFic">
                                        <marquee direction="up" behaviour="scroll" onmouseover="this.stop()" onmouseout="this.start()" scrollamount="2" align="center" height="290">
                                            <?php foreach ($notices as $value) { ?>

                                                <pre><a href="" style="color: black;font-size: 15px;"><?= $value->notice_title . ',</a> <p> Published: ' . date("F j, Y", strtotime($value->notice_start)); ?> </p></pre>
                                            <?php } ?>
                                        </marquee>
                                    </div>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div><!--/.row-->
        </div><!--/.box-->
    </div><!--/.container-->
</section><!--/#services-->