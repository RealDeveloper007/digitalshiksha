<style>
    /* Hide AddThis labels */
    span.at-label {
        display: none;
    }

    /* Blog Post Single Page Styling */
    #blog {
        padding: 100px 0 60px 0;
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        min-height: 100vh;
    }

    .blog-post-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .blog-post-header h1 {
        font-size: 36px;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 15px;
        line-height: 1.4;
    }

    .blog-post-header .line_br {
        width: 80px;
        height: 4px;
        background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%);
        margin: 0 auto;
        border-radius: 2px;
    }

    /* Main Content Card */
    .blog-post-card {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        padding: 0;
        overflow: hidden;
        margin-bottom: 30px;
    }

    .blog-post-image {
        width: 100%;
        max-height: 500px;
        overflow: hidden;
        position: relative;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .blog-post-image img {
        width: 100%;
        height: auto;
        object-fit: cover;
        display: block;
    }

    .blog-post-image iframe {
        width: 100%;
        min-height: 400px;
        border: none;
    }

    .blog-post-body {
        padding: 40px;
    }

    .blog-post-meta {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 25px;
        padding-bottom: 20px;
        border-bottom: 2px solid #e5e7eb;
        flex-wrap: wrap;
    }

    .blog-post-meta-item {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
        color: #6b7280;
    }

    .blog-post-meta-item i {
        color: #F1B900;
        font-size: 16px;
    }

    .blog-post-content {
        color: #2c3e50;
        font-size: 16px;
        line-height: 1.8;
        margin-bottom: 30px;
    }

    .blog-post-content h1,
    .blog-post-content h2,
    .blog-post-content h3,
    .blog-post-content h4 {
        color: #2c3e50;
        margin-top: 30px;
        margin-bottom: 15px;
        font-weight: 600;
    }

    .blog-post-content p {
        margin-bottom: 20px;
    }

    .blog-post-content img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin: 20px 0;
    }

    .blog-post-content ul,
    .blog-post-content ol {
        margin-bottom: 20px;
        padding-left: 30px;
    }

    .blog-post-content li {
        margin-bottom: 10px;
    }

    .blog-post-actions {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 20px 40px;
        background: #f9fafb;
        border-top: 1px solid #e5e7eb;
        flex-wrap: wrap;
        gap: 15px;
    }

    .blog-back-button {
        background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%);
        color: #fff;
        padding: 12px 28px;
        border-radius: 25px;
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 4px 15px rgba(241, 185, 0, 0.3);
        border: none;
    }

    .blog-back-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(241, 185, 0, 0.4);
        color: #fff;
        text-decoration: none;
    }

    .blog-share-buttons {
        display: flex;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
    }

    .blog-share-buttons a.social {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 45px;
        height: 45px;
        min-width: 45px;
        min-height: 45px;
        max-width: 45px;
        max-height: 45px;
        transition: all 0.3s ease;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        text-decoration: none;
        font-size: 20px;
    }
    
    .blog-share-buttons a.social i {
        color: #fff;
        font-size: 20px;
        line-height: 1;
    }
    
    .blog-share-buttons a.social.whatsapp {
        background: #25D366;
    }
    
    .blog-share-buttons a.social.whatsapp:hover {
        background: #20BA5A;
        transform: scale(1.1);
        box-shadow: 0 4px 12px rgba(37, 211, 102, 0.4);
    }
    
    .blog-share-buttons a.social.facebook {
        background: #1877F2;
    }
    
    .blog-share-buttons a.social.facebook:hover {
        background: #166FE5;
        transform: scale(1.1);
        box-shadow: 0 4px 12px rgba(24, 119, 242, 0.4);
    }

    .blog-share-buttons a.social:hover {
        transform: scale(1.1);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }
    
    /* Ensure AddThis share toolbox displays properly */
    .addthis_inline_share_toolbox {
        display: inline-block;
        vertical-align: middle;
    }
    
    .addthis_inline_share_toolbox a {
        display: inline-block;
        margin: 0 5px;
    }
    
    .addthis_inline_share_toolbox .at-share-btn {
        width: 45px !important;
        height: 45px !important;
        min-width: 45px !important;
        min-height: 45px !important;
    }

    /* Comments Section */
    .blog-comments {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        padding: 30px;
        margin-top: 30px;
    }

    .blog-comments h2 {
        font-size: 24px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 2px solid #e5e7eb;
    }

    .blog-comment-form textarea {
        width: 100%;
        padding: 15px;
        border: 2px solid #e5e7eb;
        border-radius: 10px;
        font-size: 14px;
        resize: vertical;
        transition: all 0.3s ease;
        margin-bottom: 15px;
    }

    .blog-comment-form textarea:focus {
        outline: none;
        border-color: #F1B900;
        box-shadow: 0 0 0 3px rgba(241, 185, 0, 0.1);
    }

    .blog-comment-form button {
        background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%);
        color: #fff;
        padding: 10px 24px;
        border: none;
        border-radius: 20px;
        font-weight: 600;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(241, 185, 0, 0.3);
    }

    .blog-comment-form button:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(241, 185, 0, 0.4);
    }

    .comment-section {
        margin-top: 30px;
    }

    .old-comments {
        display: flex;
        gap: 15px;
        padding: 20px;
        background: #f9fafb;
        border-radius: 12px;
        margin-bottom: 20px;
        border-left: 4px solid #F1B900;
    }

    .old-comments .avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        overflow: hidden;
        flex-shrink: 0;
    }

    .old-comments .avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .comment-body-section {
        flex: 1;
    }

    .comment-body-section h5 {
        font-size: 16px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 10px;
    }

    .comment-body-section small {
        color: #6b7280;
        font-size: 12px;
    }

    .comment-body-section blockquote {
        margin: 0;
        padding: 0;
        border-left: none;
        color: #4b5563;
        font-size: 14px;
        line-height: 1.6;
    }

    /* Sidebar Styling */
    .blog-sidebar {
        position: sticky;
        top: 100px;
        max-height: calc(100vh - 120px);
        overflow-y: auto;
        overflow-x: hidden;
    }

    .sidebar-card {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        padding: 20px;
        margin-bottom: 25px;
    }

    .sidebar-card h3 {
        font-size: 16px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 18px;
        padding-bottom: 12px;
        border-bottom: 2px solid #e5e7eb;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .sidebar-card h3 i {
        margin-right: 8px;
        color: #F1B900;
    }

    /* Search Box */
    .blog-search-form {
        position: relative;
    }

    .blog-search-input {
        width: 100%;
        padding: 12px 45px 12px 15px;
        border: 2px solid #e5e7eb;
        border-radius: 10px;
        font-size: 14px;
        transition: all 0.3s ease;
        background: #fff;
        color: #2c3e50;
    }

    .blog-search-input:focus {
        outline: none;
        border-color: #F1B900;
        box-shadow: 0 0 0 3px rgba(241, 185, 0, 0.1);
    }

    .blog-search-button {
        position: absolute;
        right: 6px;
        top: 50%;
        transform: translateY(-50%);
        background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%);
        border: none;
        border-radius: 8px;
        width: 34px;
        height: 34px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 13px;
    }

    .blog-search-button:hover {
        transform: translateY(-50%) scale(1.05);
        box-shadow: 0 4px 12px rgba(241, 185, 0, 0.4);
    }

    /* Popular Posts */
    .popular-post-item {
        display: flex;
        gap: 12px;
        padding: 12px 0;
        border-bottom: 1px solid #e5e7eb;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .popular-post-item:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .popular-post-item:hover {
        background: #f9fafb;
        margin: 0 -12px;
        padding: 12px;
        border-radius: 8px;
    }

    .popular-post-image {
        width: 60px;
        height: 60px;
        border-radius: 8px;
        overflow: hidden;
        flex-shrink: 0;
        background: #e5e7eb;
    }

    .popular-post-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .popular-post-content {
        flex: 1;
    }

    .popular-post-title {
        font-size: 13px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 5px;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .popular-post-meta {
        font-size: 11px;
        color: #6b7280;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .popular-post-meta i {
        color: #F1B900;
        font-size: 11px;
    }

    /* Custom Scrollbar for Sidebar */
    .blog-sidebar::-webkit-scrollbar {
        width: 6px;
    }

    .blog-sidebar::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }

    .blog-sidebar::-webkit-scrollbar-thumb {
        background: #F1B900;
        border-radius: 10px;
    }

    .blog-sidebar::-webkit-scrollbar-thumb:hover {
        background: #ff8c00;
    }

    /* Responsive Design */
    @media (max-width: 991px) {
        #blog {
            padding: 80px 0 40px 0;
        }

        .blog-sidebar {
            position: relative !important;
            top: auto !important;
            max-height: none !important;
            overflow-y: visible !important;
            margin-bottom: 30px;
        }

        .blog-post-body {
            padding: 30px;
        }

        .blog-post-header h1 {
            font-size: 28px;
        }
    }

    @media (max-width: 767px) {
        #blog {
            padding: 70px 0 30px 0;
        }

        .blog-post-body {
            padding: 20px;
        }
        
        .blog-share-buttons {
            gap: 10px;
        }
        
        .blog-share-buttons a.social {
            width: 40px !important;
            height: 40px !important;
            min-width: 40px !important;
            min-height: 40px !important;
            max-width: 40px !important;
            max-height: 40px !important;
            font-size: 18px !important;
        }
        
        .blog-share-buttons a.social i {
            font-size: 18px !important;
        }
        
        .addthis_inline_share_toolbox .at-share-btn {
            width: 40px !important;
            height: 40px !important;
            min-width: 40px !important;
            min-height: 40px !important;
        }
        
        .blog-post-actions {
            flex-direction: column;
            align-items: stretch;
            padding: 20px;
        }
        
        .blog-share-buttons {
            justify-content: center;
            width: 100%;
        }

        .blog-post-actions {
            padding: 15px 20px;
            flex-direction: column;
            align-items: stretch;
        }

        .blog-back-button {
            width: 100%;
            justify-content: center;
        }

        .blog-share-buttons {
            justify-content: center;
        }
    }

    /* Alert Messages */
    .alert {
        border-radius: 12px;
        padding: 15px 20px;
        margin-bottom: 25px;
        border: none;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
</style>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5f089d664f9be2d5"></script>

<section id="blog" class="blogNew secPad">
    <div class="container">
        <div class="blog-post-header">
            <h1><?= htmlspecialchars($post->blog_title); ?></h1>
            <div class="line_br"></div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                <?= ($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>
                <?= (isset($message)) ? $message : ''; ?>
            </div>
        </div>

        <div class="row" style="align-items: flex-start;">
            <div class="col-lg-8 col-md-12">

                <div class="blog-post-card">
                    <div class="blog-post-image">
                        <?php if ($post->blog_media_type == 'image') : ?>
                            <img src="<?= base_url('uploads/blog_files/') . $post->blog_attachment ?>" alt="<?= htmlspecialchars($post->blog_title) ?>">
                        <?php elseif ($post->blog_media_type == 'file') : ?>
                            <div style="display: flex; align-items: center; justify-content: center; min-height: 400px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: #fff; padding: 40px;">
                                <div style="text-align: center;">
                                    <i class="fa fa-file" style="font-size: 64px; margin-bottom: 15px;"></i>
                                    <p style="margin: 0; font-size: 16px;">Document Available</p>
                                    <a href="<?= base_url('uploads/blog_files/') . $post->blog_attachment ?>" target="_blank" style="color: #fff; text-decoration: underline; margin-top: 10px; display: inline-block;">Click to view file</a>
                                </div>
                            </div>
                        <?php else : ?>
                            <div style="display: flex; align-items: center; justify-content: center; min-height: 400px;">
                                <?= $post->blog_attachment ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="blog-post-body">
                        <div class="blog-post-meta">
                            <div class="blog-post-meta-item">
                                <i class="fa fa-user"></i>
                                <span><?= htmlspecialchars($post->user_name) ?></span>
                            </div>
                            <div class="blog-post-meta-item">
                                <i class="fa fa-calendar"></i>
                                <span><?= date("F j, Y", strtotime($post->blog_post_date)) ?></span>
                            </div>
                            <div class="blog-post-meta-item">
                                <i class="fa fa-comments"></i>
                                <span><?= count($post_comments) ?> Comments</span>
                            </div>
                        </div>

                        <div class="blog-post-content">
                            <?= $post->blog_body; ?>
                        </div>
                    </div>

                    <div class="blog-post-actions">
                        <a href="<?= base_url('digital-shiksha-search-engine') ?>" class="blog-back-button">
                            <i class="fa fa-arrow-left"></i>
                            <span>Back to Search Engine</span>
                        </a>
                        <div class="blog-share-buttons">
                            <a href="javascript:void(0)" class="social whatsapp" data-text="<?= htmlspecialchars($post->blog_title); ?>" data-link="<?= base_url('digital-shiksha-search-engine/' . $post->blog_slug); ?>" title="Share on WhatsApp">
                                <i class="fa fa-whatsapp"></i>
                            </a>
                            <a href="https://www.facebook.com/sharer.php?u=<?= urlencode(base_url('digital-shiksha-search-engine') . '/' . $post->blog_slug); ?>&title=<?= urlencode($post->blog_title); ?>" class="social facebook" target="_blank" title="Share on Facebook">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="blog-comments" id="comments">
                    <h2><i class="fa fa-comments"></i> <?= count($post_comments) ?> Comments</h2>
                    
                    <?= form_open('blog/comment', array('class' => 'blog-comment-form')); ?>
                    <input type="hidden" name="blog_id" value="<?= $post->blog_id; ?>">
                    <textarea name="blog_comment" placeholder="Leave your comment here..." rows="4" required></textarea>
                    <div class="text-right">
                        <button type="submit" class="btn btn-sm btn-warning sebtn">
                            <i class="fa fa-paper-plane"></i> Submit Comment
                        </button>
                    </div>
                    <?= form_close(); ?>

                    <div class="comment-section">
                        <?php if (!empty($post_comments)) : ?>
                            <?php foreach ($post_comments as $value) : ?>
                                <div class="old-comments">
                                    <div class="avatar">
                                        <img src="<?= base_url('uploads/user-avatar/avatar-placeholder.jpg') ?>" alt="<?= htmlspecialchars($value->user_name) ?>">
                                    </div>
                                    <div class="comment-body-section">
                                        <h5>
                                            <?= htmlspecialchars($value->user_name); ?>
                                            <small class="pull-right">
                                                <i class="fa fa-clock-o"></i> <?= date('D, d M Y', strtotime($value->comment_date)); ?>
                                            </small>
                                        </h5>
                                        <blockquote>
                                            <?= htmlspecialchars($value->comment_body); ?>
                                        </blockquote>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <p style="text-align: center; color: #6b7280; padding: 30px 0;">No comments yet. Be the first to comment!</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                <div class="blog-sidebar" style="position: sticky; top: 100px;">
                    <div class="sidebar-card">
                        <h3><i class="fa fa-search"></i> Search</h3>
                        <form action="<?= base_url('digital-shiksha-search-engine') ?>" method="get" class="blog-search-form">
                            <input type="text" class="blog-search-input" name="blog_name" placeholder="Search articles..." value="<?= isset($_GET['blog_name']) ? htmlspecialchars($_GET['blog_name']) : '' ?>" required>
                            <button type="submit" class="blog-search-button">
                                <i class="fa fa-search"></i>
                            </button>
                        </form>
                    </div>

                    <div class="sidebar-card">
                        <h3><i class="fa fa-fire"></i> Popular Posts</h3>
                        <div class="recentPost">
                            <?php if (!empty($Popular_posts)) : ?>
                                <?php foreach ($Popular_posts as $single_post) : ?>
                                    <a href="<?= base_url('digital-shiksha-search-engine/' . $single_post->blog_slug); ?>" class="popular-post-item">
                                        <div class="popular-post-image">
                                            <?php if ($single_post->blog_media_type == 'image') : ?>
                                                <img src="<?= base_url('uploads/blog_files/') . $single_post->blog_attachment ?>" alt="<?= htmlspecialchars($single_post->blog_title) ?>">
                                            <?php else : ?>
                                                <div style="display: flex; align-items: center; justify-content: center; height: 100%; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: #fff;">
                                                    <i class="fa fa-file" style="font-size: 20px;"></i>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="popular-post-content">
                                            <div class="popular-post-title"><?= htmlspecialchars($single_post->blog_title) ?></div>
                                            <div class="popular-post-meta">
                                                <i class="fa fa-comments"></i>
                                                <span><?= $single_post->total_comment ?> Comments</span>
                                            </div>
                                        </div>
                                    </a>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <p style="color: #6b7280; font-size: 12px; text-align: center; padding: 15px 0;">No popular posts available.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        // Smooth scroll to comments section if URL has #comments anchor
        if (window.location.hash === '#comments') {
            setTimeout(function() {
                $('html, body').animate({
                    scrollTop: $('#comments').offset().top - 100
                }, 800);
            }, 100);
        }
        
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
