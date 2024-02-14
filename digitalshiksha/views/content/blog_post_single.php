<style>
    .media-left iframe {
        width: 64px;
        height: 70px;
    }

    span.at-label {
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
</style>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5f089d664f9be2d5"></script>

<section id="blog" class="blogNew secPad">
    <div class="container">
        <div class="box">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-uppercase text-center h1"><strong><?= $post->blog_title; ?></strong></h1>
                    <div class="line_br mrauto"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                    <?= ($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>
                    <?= (isset($message)) ? $message : ''; ?>
                </div>
                <div class="col-md-8">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="blog">
                                <!-- /.row Start-->
                                <div class="blog-post newBlogset">
                                    <div class="blog-body">
                                        <div class="bgBlog">



                                            <div class="fixImg youtube-video">
                                                <?php
                                                if ($post->blog_media_type == 'image') {
                                                    $File =  "<img src='" . base_url('blog_files/') . $post->blog_attachment . "' class='img-responsive'>";
                                                    echo $File;
                                                } else if ($post->blog_media_type == 'file') {
                                                    $File =  "<a href='" . base_url('blog_files/') . $post->blog_attachment . "' target='_blank' style='text-decoration:underline;color:blue'>Click here to view file</a>";
                                                    echo $File;
                                                } else {
                                                    echo $post->blog_attachment;
                                                } ?>
                                            </div>


                                            <div class="blog-content">
                                                <h1 class="text-center"><?= $post->blog_title; ?></h1>
                                                <div class="blog-caption">
                                                    Author: <?= $post->user_name . ', Published: ' . date("F j, Y", strtotime($post->blog_post_date)); ?>
                                                    <!-- Go to www.addthis.com/dashboard to customize your tools -->

                                                </div>
                                            </div>
                                            <?= $post->blog_body; ?>
                                        </div>

                                        <div class="read-more redright">
                                            <a href="<?= base_url('digital-shiksha-search-engine') ?>" class="btn btn-default"> Go Back To Digital Search Engine </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div><!--/.col-md-10-->
                    </div>

                    <div class="row">
                        <div class="col-md-12">

                            <span class="social_icons">

                                <a href="javascript:void(0)" class="social whatsapp" data-text="<?= $post->blog_title; ?>" data-link="<?= base_url('digital-shiksha-search-engine/' . $post->blog_slug); ?>">
                                    <img src="<?= base_url('assets/images/share.png') ?>">
                                </a>

                                <a href="https://www.facebook.com/sharer.php?u=<?= base_url('digital-shiksha-search-engine') . '/' . $post->blog_slug; ?>&title=<?= $post->blog_title; ?>" class="social" target="_blank"> <img class="img-responsive" src="<?= base_url('assets/images/fb.png'); ?>">
                                </a>
                            </span>


                            <div class="blog-comments">
                                <hr />
                                <!-- <div class="addthis_inline_share_toolbox"></div> -->


                                <h2><?= count($post_comments) ?> Comments</h2>
                                <?= form_open('blog/comment'); ?>
                                <input type="hidden" name="blog_id" value="<?= $post->blog_id; ?>">
                                <div class="col-xm-12">
                                    <textarea name="blog_comment" class="form-control" placeholder="Leave your comment here..." rows="2" required></textarea> <br>
                                    <div class="text-right"><button type="submit" class="btn btn-sm btn-warning sebtn">Submit</button></div>
                                </div>
                                <?= form_close(); ?>
                                <div class="row comment-section">
                                    <?php foreach ($post_comments as $value) { ?>
                                        <div class="col-xs-12">
                                            <div class="old-comments">
                                                <div class="avatar"><img src="<?= base_url('user-avatar/avatar-placeholder.jpg') ?>"></div>
                                                <div class="comment-body-section">
                                                    <h5><?= $value->user_name; ?> <small class="pull-right"><em> Posted: <?= date('D, d M Y', strtotime($value->comment_date)); ?> </em></small></h5>
                                                    <blockquote>
                                                        <?= $value->comment_body; ?>
                                                    </blockquote>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div><!--/.col-md-10-->
                    </div><!--/.row-->
                </div><!--/.row-->
                <div class="col-md-4 rightser">
                    <div class="searchri pd25 bgblue">
                        <h3>Search</h3>
                        <!-- Actual search box -->
                        <div class="form-group has-feedback has-search">
                            <form action="<?= base_url('digital-shiksha-search-engine') ?>" method="get" role="form" class="form-horizontal" enctype="multipart/form-data">
                                <button class="fa fa-search form-control-feedback" type="submit"></button>
                                <input type="text" class="form-control" name="blog_name" placeholder="Search" required>
                            </form>
                        </div>
                    </div>

                    <div class="searchri pd25 bgblue">
                        <h3>Popular Posts</h3>
                        <div class="recentPost">
                            <?php foreach ($Popular_posts as $single_post) { ?>

                                <div class="media">
                                    <div class="media-left">


                                        <?php
                                        if ($single_post->blog_media_type == 'image') {
                                            $File =  " <a href='#'><img src='" . base_url('blog_files/') . $single_post->blog_attachment . "' class='media-object' style='width: 64px; height: 64px;'></a>";
                                            echo $File;
                                        } else if ($single_post->blog_media_type == 'file') {
                                            $File =  "<a href='" . base_url('blog_files/') . $single_post->blog_attachment . "' target='_blank' style='text-decoration:underline;color:blue'>Click here to view file</a>";
                                            echo $File;
                                        } else {

                                            echo $single_post->blog_attachment;
                                        }

                                        ?>

                                    </div>
                                    <a href="<?= base_url('digital-shiksha-search-engine/' . $single_post->blog_slug); ?>">
                                        <div class="media-body">
                                            <h4 class="media-heading"><?= $single_post->blog_title ?></h4>
                                            <p>Total Comments : <?= $single_post->total_comment ?></p>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>

            </div><!--/.box-->
        </div><!--/.container-->
</section><!--/#services-->
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