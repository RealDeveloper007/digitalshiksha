<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Real Developer">
        <title><?=$brand_name?></title>
        <!--Header-->
        <?php echo $header; ?>
        <!--Page Specific Header-->
        <?php if (isset($extra_head)) echo $extra_head; ?>
    </head>
    <body class="Site<?php echo ($this->session->userdata('type') === 'andriod') ? ' android-type' : ''; ?>">
        <div id="wrapper">
            <!-- Sidebar -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><?=$brand_name;?></a>
                </div>
                <!-- This content will toggle -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <!--Sidebar-->
                    <?php echo (isset($sidebar)) ? $sidebar : ''; ?>

                    <!--Top Navigation-->
                    <?php echo (isset($top_navi)) ? $top_navi : ''; ?>
                    
                    <!-- Navbar Buttons -->
                    <style>
                        .navbar-buttons {
                            display: flex;
                            align-items: center;
                            gap: 10px;
                            margin-left: 15px;
                        }
                        
                        .navbar-buttons .btn-visit-site {
                            background: linear-gradient(135deg, #FFD700 0%, #FFC107 100%);
                            color: #000;
                            border: 2px solid #FFD700;
                            padding: 10px 20px;
                            font-weight: 600;
                            font-size: 14px;
                            border-radius: 6px;
                            text-decoration: none;
                            display: inline-flex;
                            align-items: center;
                            gap: 8px;
                            transition: all 0.3s ease;
                            box-shadow: 0 2px 4px rgba(255, 215, 0, 0.3);
                            text-transform: uppercase;
                            letter-spacing: 0.5px;
                        }
                        
                        .navbar-buttons .btn-visit-site:hover {
                            background: linear-gradient(135deg, #FFC107 0%, #FFD700 100%);
                            color: #000;
                            transform: translateY(-2px);
                            box-shadow: 0 4px 8px rgba(255, 215, 0, 0.5);
                            text-decoration: none;
                        }
                        
                        .navbar-buttons .btn-visit-site i {
                            font-size: 16px;
                        }
                        
                        @media (max-width: 768px) {
                            .navbar-buttons {
                                margin-left: 0;
                                margin-top: 10px;
                                flex-wrap: wrap;
                            }
                            
                            .navbar-buttons .btn-visit-site {
                                padding: 8px 16px;
                                font-size: 13px;
                            }
                        }
                    </style>
                    <div class="navbar-buttons">
                        <a class="btn-visit-site" href="<?php echo base_url(); ?>">
                            <i class="fa fa-external-link"></i> Home Page
                        </a>
                        <?php if($this->uri->segment(2)=='view_results') { ?>
                            <a class="btn btn-primary" href="<?php echo base_url('exam_control/view_all_mocks'); ?>">GO TO MOCK TEST</a>
                        <?php } ?>
                    </div>
                </div><!-- /.navbar-collapse -->
            </nav>
            <div id="page-wrapper">
                <div class="note">
                <?php if ($commercial) {
                    if(!$this->db->where('id',1)->get('paypal_settings')->row()->api_username){ ?>
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>
                        Please setup the PayPal API from system setting.
                    </div>
                <?php }
                    if(!$this->db->get('price_table')->result()){ ?>
                    <div class="alert alert-info">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>
                        Please create an offer for membership.
                    </div>
                <?php }
                } ?>
                <?php if(!$this->db->get('categories')->result()){?>
                    <div class="alert alert-info">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>
                        Please create categories and sub-categories before create exams or courses.
                    </div>
                <?php }else if (!$this->db->get('sub_categories')->result()) { ?>
                    <div class="alert alert-info">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>
                        Please create sub-categories before create exams or courses.
                    </div>
                <?php } ?>
                </div>
                <!--Content-->
                <?php echo (isset($content)) ? $content : ''; ?>
            </div><!-- /#page-wrapper -->
            <hr/>
            
            <!-- Modal Start -->
            <?php if (isset($modal)) echo $modal; ?>

            <!--Footer-->
            <?php echo $footer; ?>
       </div><!-- /#wrapper -->
       
        <!--Page Specific Footer-->
       <?php if (isset($extra_footer)) echo $extra_footer; ?>
    </body>
</html>