<?php //echo "<pre/>"; print_r($blogs); exit(); ?>
<style>
    .blog-list-wrapper {
        background: #fff;
        border-radius: 4px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        overflow: hidden;
        width: 100%;
        margin-bottom: 20px;
    }
    
    .blog-header {
        background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
        border-bottom: 3px solid #FFD700;
        color: white;
        padding: 12px 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 10px;
    }
    
    .blog-header h4 {
        margin: 0;
        font-size: 16px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .blog-header h4 i {
        font-size: 14px;
        color: #FFD700;
    }
    
    .add-btn {
        background: rgba(255, 255, 255, 0.2);
        color: white;
        padding: 6px 12px;
        border: 1.5px solid rgba(255, 215, 0, 0.5);
        border-radius: 4px;
        text-decoration: none;
        font-weight: 500;
        font-size: 12px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: all 0.3s;
        backdrop-filter: blur(10px);
    }
    
    .add-btn:hover {
        background: #FFD700;
        border-color: #FFD700;
        color: #000;
        transform: translateY(-1px);
        box-shadow: 0 2px 6px rgba(255, 215, 0, 0.25);
    }
    
    .blog-content {
        padding: 12px;
    }
    
    .blog-item {
        background: #fff;
        border: 1px solid #dee2e6;
        border-left: 4px solid #FFD700;
        border-radius: 6px;
        padding: 12px;
        margin-bottom: 12px;
        transition: all 0.3s;
        box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    }
    
    .blog-item:hover {
        box-shadow: 0 4px 8px rgba(255, 215, 0, 0.2);
        border-color: #FFD700;
        border-left-color: #FFD700;
        transform: translateY(-2px);
    }
    
    .blog-item {
        border-left: 4px solid #FFD700;
    }
    
    .blog-header-row {
        display: flex;
        align-items: flex-start;
        gap: 15px;
        margin-bottom: 15px;
        padding-bottom: 15px;
        border-bottom: 1px solid #f0f0f0;
    }
    
    .blog-media {
        flex-shrink: 0;
    }
    
    .blog-media img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 6px;
        border: 1px solid #dee2e6;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }
    
    .blog-media .file-link {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 10px;
        background: #f8f9fa;
        border: 1px solid #dee2e6;
        border-radius: 4px;
        color: #2c3e50;
        text-decoration: none;
        font-size: 12px;
        font-weight: 500;
        transition: all 0.3s;
    }
    
    .blog-media .file-link:hover {
        background: #FFD700;
        color: #000;
        border-color: #FFD700;
    }
    
    .blog-media .video-container {
        width: 100px;
        height: 100px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f8f9fa;
        border: 1px solid #dee2e6;
        border-radius: 6px;
        color: #dc3545;
        font-size: 24px;
    }
    
    .blog-info {
        flex: 1;
        min-width: 0;
    }
    
    .blog-title {
        font-size: 14px;
        font-weight: 600;
        color: #333;
        margin-bottom: 8px;
        word-wrap: break-word;
    }
    
    .blog-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        font-size: 13px;
        color: #666;
    }
    
    .blog-meta-item {
        display: flex;
        align-items: center;
        gap: 5px;
    }
    
    .blog-meta-item i {
        color: #e11d80;
        font-size: 12px;
    }
    
    .media-type-badge {
        display: inline-block;
        padding: 4px 10px;
        border-radius: 12px;
        font-size: 11px;
        font-weight: 600;
        text-transform: uppercase;
        background: #e11d80;
        color: white;
    }
    
    .blog-description {
        margin-top: 12px;
        padding-top: 12px;
        border-top: 1px solid #f0f0f0;
        font-size: 14px;
        color: #555;
        line-height: 1.6;
    }
    
    .blog-actions {
        margin-top: 15px;
        padding-top: 15px;
        border-top: 1px solid #f0f0f0;
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }
    
    .btn {
        padding: 8px 16px;
        font-size: 13px;
        border-radius: 4px;
        border: none;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        cursor: pointer;
        font-weight: 500;
    }
    
    .btn i {
        font-size: 13px;
    }
    
    .btn-default {
        background: #6c757d;
        color: white;
    }
    
    .btn-default:hover {
        background: #5a6268;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(108, 117, 125, 0.3);
    }
    
    .btn-info {
        background: #17a2b8;
        color: white;
    }
    
    .btn-info:hover {
        background: #138496;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(23, 162, 184, 0.3);
    }
    
    .btn-danger {
        background: #dc3545;
        color: white;
    }
    
    .btn-danger:hover {
        background: #c82333;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(220, 53, 69, 0.3);
    }
    
    .pagination {
        margin-top: 30px;
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 5px;
    }
    
    .tsc_pagination {
        display: flex;
        list-style: none;
        padding: 0;
        margin: 0;
        flex-wrap: wrap;
        gap: 5px;
        justify-content: center;
    }
    
    .tsc_pagination li {
        margin: 0;
    }
    
    .tsc_pagination li a,
    .tsc_pagination li .page {
        padding: 8px 12px;
        border: 1px solid #dee2e6;
        border-radius: 4px;
        text-decoration: none;
        color: #e11d80;
        font-size: 14px;
        transition: all 0.3s;
        display: inline-block;
    }
    
    .tsc_pagination li a:hover,
    .tsc_pagination li .page.active {
        background: #e11d80;
        color: white;
        border-color: #e11d80;
    }
    
    .no-data-message {
        text-align: center;
        padding: 60px 20px;
        color: #666;
    }
    
    .no-data-message i {
        font-size: 64px;
        color: #ccc;
        margin-bottom: 20px;
        display: block;
    }
    
    .no-data-message p {
        font-size: 18px;
        margin: 0;
    }
    
    @media (max-width: 767px) {
        .blog-header {
            padding: 15px 20px;
            flex-direction: column;
            align-items: flex-start;
        }
        
        .blog-header h4 {
            font-size: 18px;
        }
        
        .add-btn {
            width: 100%;
            justify-content: center;
        }
        
        .blog-content {
            padding: 15px;
        }
        
        .blog-item {
            padding: 15px;
            margin-bottom: 15px;
        }
        
        .blog-header-row {
            flex-direction: column;
            gap: 12px;
        }
        
        .blog-media {
            align-self: center;
        }
        
        .blog-media img {
            width: 80px;
            height: 80px;
        }
        
        .blog-media .video-container {
            width: 80px;
            height: 80px;
            font-size: 20px;
        }
        
        .blog-title {
            font-size: 16px;
            text-align: center;
        }
        
        .blog-meta {
            justify-content: center;
            font-size: 12px;
        }
        
        .blog-description {
            font-size: 13px;
        }
        
        .blog-actions {
            flex-direction: column;
            gap: 8px;
        }
        
        .btn {
            width: 100%;
            justify-content: center;
            padding: 10px 16px;
            font-size: 14px;
        }
        
        .pagination {
            margin-top: 20px;
        }
        
        .tsc_pagination {
            gap: 4px;
        }
        
        .tsc_pagination li a,
        .tsc_pagination li .page {
            padding: 6px 10px;
            font-size: 13px;
        }
    }
</style>

<div class="blog-list-wrapper">
    <div class="blog-header">
        <h4><i class="fa fa-newspaper-o"></i> Blog Posts</h4>
        <a class="add-btn" href="<?php echo base_url('blog/add'); ?>">
            <i class="glyphicon glyphicon-plus-sign"></i> Add Post
        </a>
    </div>
    
    <div class="blog-content">
        <?php if (!empty($message)) { echo $message; } ?>
        <?php echo ($this->session->flashdata('message')) ? $this->session->flashdata('message') : ''; ?>

        <div class="row">
            <div class="col-sm-12">
                <?php if (isset($blogs) != NULL && !empty($blogs)) { 
                    $i = 1;
                    foreach ($blogs as $blog) { ?>
                        <div class="blog-item">
                            <div class="blog-header-row">
                                <div class="blog-media">
                                    <?php if($blog->blog_media_type == 'image') { ?>
                                        <img src="<?= base_url('uploads/blog_files/').$blog->blog_attachment; ?>" alt="<?= htmlspecialchars($blog->blog_title); ?>">
                                    <?php } else if($blog->blog_media_type == 'file') { ?>
                                        <a href="<?= base_url('uploads/blog_files/').$blog->blog_attachment; ?>" target="_blank" class="file-link">
                                            <i class="fa fa-file"></i> View File
                                        </a>
                                    <?php } else { ?>
                                        <div class="video-container">
                                            <i class="fa fa-youtube-play"></i>
                                        </div>
                                    <?php } ?>
                                </div>
                                
                                <div class="blog-info">
                                    <div class="blog-title">
                                        <?= htmlspecialchars($blog->blog_title); ?>
                                    </div>
                                    <div class="blog-meta">
                                        <div class="blog-meta-item">
                                            <i class="fa fa-calendar"></i>
                                            <span><?= $blog->blog_post_date; ?></span>
                                        </div>
                                        <div class="blog-meta-item">
                                            <span class="media-type-badge"><?= ucfirst($blog->blog_media_type); ?></span>
                                        </div>
                                        <?php if($blog->blog_media_type == 'video') { ?>
                                            <div class="blog-meta-item">
                                                <span><?= htmlspecialchars($blog->blog_attachment); ?></span>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            
                            <?php if (!empty($blog->blog_short_body)) { ?>
                                <div class="blog-description">
                                    <?= htmlspecialchars($blog->blog_short_body); ?>
                                </div>
                            <?php } ?>
                            
                            <div class="blog-actions">
                                <?php $frontendUrl = base_url('digital-shiksha-search-engine/' . $blog->blog_slug); ?>
                                <a href="<?php echo $frontendUrl; ?>" class="btn btn-info">
                                    <i class="fa fa-eye"></i> View (Same Tab)
                                </a>
                                <a href="<?php echo $frontendUrl; ?>" target="_blank" rel="noopener noreferrer" class="btn btn-info">
                                    <i class="fa fa-external-link"></i> View (New Tab)
                                </a>
                                <a href="<?php echo base_url('blog/edit/' . $blog->blog_id); ?>" class="btn btn-default">
                                    <i class="glyphicon glyphicon-edit"></i> Edit
                                </a>
                                <?php if ($this->session->userdata['user_role_id'] <= 3) { ?>
                                    <a onclick="return delete_confirmation()" href="<?php echo base_url('blog/delete/' . $blog->blog_id); ?>" class="btn btn-danger">
                                        <i class="glyphicon glyphicon-trash"></i> Delete
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    <?php 
                        $i++;
                    } ?>
                    
                    <?php if (isset($links) && !empty($links)) { ?>
                        <div class="pagination">
                            <ul class="tsc_pagination">
                                <?php foreach ($links as $link) {
                                    echo "<li>". $link."</li>";
                                } ?>
                            </ul>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <div class="no-data-message">
                        <i class="fa fa-newspaper-o"></i>
                        <p>No blog posts found!</p>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<script>
function delete_confirmation() {
    return confirm('Are you sure you want to delete this blog post?');
}
</script>
