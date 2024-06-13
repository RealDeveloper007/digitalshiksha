    <header id="header" role="banner">

        <div id="navbar" class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?= base_url(); ?><?= ($this->session->userdata('log')) ? 'dashboard/' . $this->session->userdata('user_id') : '' ?>">
                        <?php if (file_exists('./logo.fsz')) { ?>
                            <img src="<?= base_url(); ?>logo.png">
                        <?php } else {
                            echo ($brand_name) ? $brand_name : 'digitalshiksha';
                        } ?>
                    </a> <!-- Brand Title -->
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="<?= ($this->uri->segment(1) == '') ? 'active' : ''; ?>"><a href="<?= base_url('/'); ?>">Home</a></li>
                        <li class="<?= ($this->uri->segment(1) == 'about-us') ? 'active' : ''; ?>"><a href="<?= base_url('about-us'); ?>">About uss</a></li>
                        <li class="<?= ($this->uri->segment(1) == 'mock-test') ? 'active' : ''; ?>"><a href="<?= base_url('mock-test'); ?>">Mock Test</a></li>
                        <li class="<?= ($this->uri->segment(1) == 'study-material') ? 'active' : ''; ?>"><a href="<?= base_url('study-material'); ?>">Study Material</a></li>
                        <li><a href="#contact">Contact us</a></li>
                        <li class="<?= ($this->uri->segment(1) == 'faq') ? 'active' : ''; ?>"><a href="<?= base_url('faq') ?>">Faq</a></li>
                        <li class="<?= ($this->uri->segment(1) == 'digital-shiksha-search-engine') ? 'active' : ''; ?>"><a href="<?= base_url('digital-shiksha-search-engine'); ?>">Digital Shiksha Search Engine</a></li>

                        <?php if ($this->session->userdata('log')) { ?>
                            <li><a href="<?= base_url('dashboard/' . $this->session->userdata('user_id')); ?>"><i class="fa fa-user"></i> Dashboard</a></li>

                            <li><a href="<?= base_url('logout'); ?>"><i class="fa fa-power-off"></i></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </header><!--/#header-->