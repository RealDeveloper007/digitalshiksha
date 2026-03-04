<style>
   /* Hide AddThis labels */
   span.at-label {
      display: none;
   }

   /* Blog Section Styling */
   #blog {
      padding: 100px 0 60px 0;
      background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
      min-height: 100vh;
      margin-top: 0;
   }

   .blog-header {
      text-align: center;
      margin-bottom: 50px;
   }

   .blog-header h1 {
      font-size: 42px;
      font-weight: 700;
      color: #2c3e50;
      margin-bottom: 15px;
      text-transform: uppercase;
      letter-spacing: 1px;
   }

   .blog-header .line_br {
      width: 80px;
      height: 4px;
      background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%);
      margin: 0 auto;
      border-radius: 2px;
   }

   /* Blog Post Cards */
   .blog-card {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
      margin-bottom: 25px;
      overflow: hidden;
      transition: all 0.3s ease;
      display: flex;
      flex-direction: column;
      height: 100%;
   }

   .blog-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
   }

   .blog-card-image {
      width: 100%;
      height: 180px;
      overflow: hidden;
      position: relative;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
   }

   .blog-card-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.3s ease;
   }

   .blog-card:hover .blog-card-image img {
      transform: scale(1.05);
   }

   .blog-card-image iframe {
      width: 100%;
      height: 100%;
      border: none;
   }

   .blog-card-body {
      padding: 18px;
      flex: 1;
      display: flex;
      flex-direction: column;
   }

   .blog-card-title {
      margin-bottom: 12px;
   }

   .blog-card-title h2 {
      font-size: 18px;
      font-weight: 600;
      color: #2c3e50;
      margin: 0;
      line-height: 1.4;
   }

   .blog-card-title a {
      color: #2c3e50;
      text-decoration: none;
      transition: color 0.3s ease;
   }

   .blog-card-title a:hover {
      color: #F1B900;
   }

   .blog-card-meta {
      display: flex;
      align-items: center;
      gap: 12px;
      margin-bottom: 12px;
      padding-bottom: 12px;
      border-bottom: 1px solid #e5e7eb;
      flex-wrap: wrap;
   }

   .blog-card-meta-item {
      display: flex;
      align-items: center;
      gap: 5px;
      font-size: 12px;
      color: #6b7280;
   }

   .blog-card-meta-item i {
      color: #F1B900;
      font-size: 14px;
   }

   .blog-card-excerpt {
      color: #4b5563;
      font-size: 13px;
      line-height: 1.6;
      margin-bottom: 15px;
      flex: 1;
      display: -webkit-box;
      -webkit-line-clamp: 3;
      -webkit-box-orient: vertical;
      overflow: hidden;
   }

   .blog-card-excerpt p {
      margin-bottom: 10px;
   }

   .blog-card-footer {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-top: auto;
      padding-top: 12px;
      border-top: 1px solid #e5e7eb;
   }

   .blog-read-more {
      background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%);
      color: #fff;
      padding: 8px 18px;
      border-radius: 20px;
      text-decoration: none;
      font-weight: 600;
      font-size: 13px;
      transition: all 0.3s ease;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      box-shadow: 0 3px 12px rgba(241, 185, 0, 0.3);
   }

   .blog-read-more:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(241, 185, 0, 0.4);
      color: #fff;
      text-decoration: none;
   }

   .blog-share {
      display: flex;
      align-items: center;
      gap: 10px;
   }

   .blog-share .addthis_inline_share_toolbox {
      margin: 0;
   }

   /* Search Box Card Styling */
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
      padding: 12px 90px 12px 15px;
      border: 2px solid #e5e7eb;
      border-radius: 10px;
      font-size: 14px;
      transition: all 0.3s ease;
      background: #fff;
      color: #1a1a1a;
      font-weight: 500;
   }
   
   .blog-search-input::placeholder {
      color: #9ca3af;
      font-weight: 400;
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
      z-index: 2;
   }

   .blog-search-button:hover {
      transform: translateY(-50%) scale(1.05);
      box-shadow: 0 4px 12px rgba(241, 185, 0, 0.4);
   }
   
   .blog-reset-button {
      position: absolute;
      right: 45px;
      top: 50%;
      transform: translateY(-50%);
      background: #6b7280;
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
      z-index: 2;
      text-decoration: none;
   }

   .blog-reset-button:hover {
      background: #ef4444;
      transform: translateY(-50%) scale(1.05);
      box-shadow: 0 4px 12px rgba(239, 68, 68, 0.4);
      color: #fff;
   }
   
   .blog-reset-button.hidden {
      display: none;
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
      min-width: 60px;
      min-height: 60px;
      max-width: 60px;
      max-height: 60px;
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
      min-height: 36px;
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

   /* No Results */
   .no-results {
      text-align: center;
      padding: 60px 20px;
      background: #fff;
      border-radius: 16px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
   }

   .no-results h3 {
      font-size: 28px;
      color: #2c3e50;
      margin-bottom: 15px;
   }

   .no-results p {
      color: #6b7280;
      font-size: 16px;
   }

   /* Pagination */
   .blog-pagination {
      margin-top: 50px;
      text-align: center;
   }

   .blog-pagination .pagination {
      display: inline-flex;
      gap: 8px;
      list-style: none;
      padding: 0;
      margin: 0;
   }

   .blog-pagination .pagination li {
      margin: 0;
   }

   .blog-pagination .pagination li a,
   .blog-pagination .pagination li span {
      display: flex;
      align-items: center;
      justify-content: center;
      min-width: 40px;
      height: 40px;
      padding: 0 12px;
      border: 2px solid #e5e7eb;
      border-radius: 10px;
      color: #2c3e50;
      text-decoration: none;
      font-weight: 500;
      transition: all 0.3s ease;
      background: #fff;
   }

   .blog-pagination .pagination li.active a,
   .blog-pagination .pagination li.active span {
      background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%);
      border-color: #F1B900;
      color: #fff;
      box-shadow: 0 4px 15px rgba(241, 185, 0, 0.3);
   }

   .blog-pagination .pagination li a:hover {
      border-color: #F1B900;
      color: #F1B900;
      transform: translateY(-2px);
   }

   .blog-pagination .pagination li.active a:hover {
      color: #fff;
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(241, 185, 0, 0.4);
   }
   
   /* Hide disabled pagination links */
   .blog-pagination .pagination li.disabled {
      display: none;
   }
   
   /* Style first and last buttons */
   .blog-pagination .pagination li a:contains("First"),
   .blog-pagination .pagination li a:contains("Last") {
      font-weight: 600;
   }

   /* Blog Content Area */
   .blog-content-area {
      padding-left: 0;
   }
   
   /* Blog Cards Grid Layout */
   .blog-content-area .row {
      display: flex;
      flex-wrap: wrap;
      margin: 0 -12.5px;
   }
   
   .blog-content-area .row > [class*="col-"] {
      padding: 0 12.5px;
      display: flex;
      flex-direction: column;
   }
   
   .blog-content-area .blog-card {
      margin-bottom: 0;
      height: 100%;
   }



   /* Responsive Design */
   @media (max-width: 991px) {
      #blog {
         padding: 80px 0 40px 0;
      }

      .blog-content-area {
         padding-left: 0;
      }

      .blog-header h1 {
         font-size: 32px;
      }

      .blog-card-image {
         height: 200px;
      }
      
      .blog-content-area .row {
         margin: 0 -10px;
      }
      
      .blog-content-area .row > [class*="col-"] {
         padding: 0 10px;
         margin-bottom: 20px;
      }
   }
   
   @media (max-width: 767px) {
      .blog-content-area .row > [class*="col-"] {
         flex: 0 0 100%;
         max-width: 100%;
      }
   }

   @media (max-width: 767px) {
      #blog {
         padding: 70px 0 30px 0;
         margin-top: 60px;
      }

      .blog-header h1 {
         font-size: 28px;
      }

      .blog-card-body {
         padding: 15px;
      }

      .blog-card-title h2 {
         font-size: 16px;
      }

      .blog-card-image {
         height: 180px;
      }

      .sidebar-card {
         padding: 18px;
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
   
   /* Blog Tabs */
   .blog-tabs {
      display: flex;
      gap: 10px;
      margin-bottom: 30px;
      border-bottom: 2px solid #e5e7eb;
      padding-bottom: 0;
   }
   
   .blog-tab {
      padding: 12px 24px;
      background: transparent;
      border: none;
      border-bottom: 3px solid transparent;
      color: #6b7280;
      font-size: 15px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      position: relative;
      bottom: -2px;
      text-transform: uppercase;
      letter-spacing: 0.5px;
   }
   
   .blog-tab:hover {
      color: #F1B900;
      background: rgba(241, 185, 0, 0.05);
   }
   
   .blog-tab.active {
      color: #F1B900;
      border-bottom-color: #F1B900;
      background: transparent;
   }
   
   .blog-tab-content {
      display: none !important;
   }
   
   .blog-tab-content.active {
      display: block !important;
   }
   
   /* Ensure popular posts are hidden by default */
   #popular-posts-content {
      display: none !important;
   }
   
   #popular-posts-content.active {
      display: block !important;
   }
   
   /* Ensure all posts are visible by default */
   #all-posts-content {
      display: block;
   }
   
   #all-posts-content:not(.active) {
      display: none !important;
   }
   
   /* Popular Posts Grid */
   .popular-posts-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 25px;
   }
   
   .popular-post-card {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
      overflow: hidden;
      transition: all 0.3s ease;
      display: flex;
      flex-direction: column;
      height: 100%;
   }
   
   .popular-post-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
   }
   
   .popular-post-card-image {
      width: 100%;
      height: 180px;
      overflow: hidden;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
   }
   
   .popular-post-card-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
   }
   
   .popular-post-card-body {
      padding: 18px;
      flex: 1;
      display: flex;
      flex-direction: column;
   }
   
   .popular-post-card-title {
      margin-bottom: 12px;
   }
   
   .popular-post-card-title h3 {
      font-size: 16px;
      font-weight: 600;
      color: #2c3e50;
      margin: 0;
      line-height: 1.4;
   }
   
   .popular-post-card-title a {
      color: #2c3e50;
      text-decoration: none;
      transition: color 0.3s ease;
   }
   
   .popular-post-card-title a:hover {
      color: #F1B900;
   }
   
   .popular-post-card-meta {
      display: flex;
      align-items: center;
      gap: 12px;
      margin-top: auto;
      padding-top: 12px;
      border-top: 1px solid #e5e7eb;
      font-size: 12px;
      color: #6b7280;
   }
   
   .popular-post-card-meta i {
      color: #F1B900;
   }
   
   /* Responsive Tabs */
   @media (max-width: 767px) {
      .blog-tabs {
         flex-direction: column;
         gap: 0;
         border-bottom: none;
      }
      
      .blog-tab {
         width: 100%;
         text-align: center;
         border-bottom: 2px solid #e5e7eb;
         border-left: 3px solid transparent;
         border-right: none;
         border-top: none;
         padding: 15px 20px;
         bottom: 0;
      }
      
      .blog-tab.active {
         border-left-color: #F1B900;
         border-bottom-color: #e5e7eb;
      }
      
      .popular-posts-grid {
         grid-template-columns: 1fr;
         gap: 20px;
      }
   }
</style>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5f089d664f9be2d5"></script>

<section id="blog" class="blogNew secPad">
   <div class="container">
      <div class="blog-header">
         <h1>Digital Shiksha Search Engine</h1>
         <div class="line_br"></div>
      </div>

      <div class="row">
         <div class="col-md-12">
            <?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>
            <?= ($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>
            <?= (isset($message)) ? $message : ''; ?>
         </div>
      </div>

      <!-- Search Box Above All Posts -->
      <div class="row">
         <div class="col-md-12">
            <div class="sidebar-card" style="margin-bottom: 20px;">
               <h3><i class="fa fa-search"></i> Search Articles</h3>
               <form action="<?= base_url('digital-shiksha-search-engine') ?>" method="get" class="blog-search-form">
                  <input type="text" class="blog-search-input" name="blog_name" id="blog_search_input" placeholder="Search articles..." value="<?= isset($_GET['blog_name']) ? htmlspecialchars($_GET['blog_name']) : '' ?>" required>
                  <?php if (isset($_GET['blog_name']) && !empty($_GET['blog_name'])) : ?>
                     <a href="<?= base_url('digital-shiksha-search-engine') ?>" class="blog-reset-button" title="Reset Search">
                        <i class="fa fa-times"></i>
                     </a>
                  <?php endif; ?>
                  <button type="submit" class="blog-search-button">
                     <i class="fa fa-search"></i>
                  </button>
               </form>
            </div>
         </div>
      </div>

      <!-- Tabs Navigation -->
      <div class="row">
         <div class="col-md-12">
            <div class="blog-tabs">
               <button class="blog-tab active" data-tab="all-posts">
                  <i class="fa fa-list"></i> All Posts
               </button>
               <button class="blog-tab" data-tab="popular-posts">
                  <i class="fa fa-fire"></i> Popular Posts
               </button>
            </div>
         </div>
      </div>

      <div class="row">
         <div class="col-md-12">
            <div class="blog-content-area">
               <!-- All Posts Tab Content -->
               <div class="blog-tab-content active" id="all-posts-content">
                  <?php if (empty($blogs)) : ?>
                     <div class="no-results">
                        <h3>No Results Found!</h3>
                        <p>Try adjusting your search terms or browse our popular posts.</p>
                     </div>
                  <?php else : ?>
                     <div class="row">
                        <?php foreach ($blogs as $value) : ?>
                           <div class="col-lg-6 col-md-6 col-sm-12" style="margin-bottom: 25px;">
                              <div class="blog-card">
                                 <div class="blog-card-image">
                                    <?php if ($value->blog_media_type == 'image') : ?>
                                       <img src="<?= base_url('uploads/blog_files/') . $value->blog_attachment ?>" alt="<?= htmlspecialchars($value->blog_title) ?>">
                                    <?php elseif ($value->blog_media_type == 'file') : ?>
                                       <div style="display: flex; align-items: center; justify-content: center; height: 100%; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: #fff; padding: 20px;">
                                          <div style="text-align: center;">
                                             <i class="fa fa-file" style="font-size: 40px; margin-bottom: 8px;"></i>
                                             <p style="margin: 0; font-size: 12px;">Document Available</p>
                                          </div>
                                       </div>
                                    <?php else : ?>
                                       <div style="display: flex; align-items: center; justify-content: center; height: 100%;">
                                          <?= $value->blog_attachment ?>
                                       </div>
                                    <?php endif; ?>
                                 </div>

                                 <div class="blog-card-body">
                                    <div class="blog-card-title">
                                       <h2><a href="<?= base_url('digital-shiksha-search-engine/' . $value->blog_slug); ?>"><?= htmlspecialchars($value->blog_title); ?></a></h2>
                                    </div>

                                    <div class="blog-card-meta">
                                       <div class="blog-card-meta-item">
                                          <i class="fa fa-user"></i>
                                          <span><?= htmlspecialchars($value->user_name) ?></span>
                                       </div>
                                       <div class="blog-card-meta-item">
                                          <i class="fa fa-calendar"></i>
                                          <span><?= date("F j, Y", strtotime($value->blog_post_date)) ?></span>
                                       </div>
                                    </div>

                                    <div class="blog-card-excerpt">
                                       <?= $value->blog_short_body; ?>
                                    </div>

                                    <div class="blog-card-footer">
                                       <a href="<?= base_url('digital-shiksha-search-engine/' . $value->blog_slug); ?>" class="blog-read-more">
                                          <span>Read More</span>
                                          <i class="fa fa-arrow-right"></i>
                                       </a>
                                       <div class="blog-share">
                                          <div class="addthis_inline_share_toolbox"></div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        <?php endforeach; ?>
                     </div>

                     <div class="blog-pagination">
                        <?= $this->pagination->create_links(); ?>
                     </div>
                  <?php endif; ?>
               </div>

               <!-- Popular Posts Tab Content -->
               <div class="blog-tab-content" id="popular-posts-content">
                  <?php if (!empty($Popular_posts)) : ?>
                     <div class="popular-posts-grid">
                        <?php foreach ($Popular_posts as $single_post) : ?>
                           <div class="popular-post-card">
                              <div class="popular-post-card-image">
                                 <?php if ($single_post->blog_media_type == 'image') : ?>
                                    <img src="<?= base_url('uploads/blog_files/') . $single_post->blog_attachment ?>" alt="<?= htmlspecialchars($single_post->blog_title) ?>">
                                 <?php else : ?>
                                    <div style="display: flex; align-items: center; justify-content: center; height: 100%; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: #fff;">
                                       <i class="fa fa-file" style="font-size: 40px;"></i>
                                    </div>
                                 <?php endif; ?>
                              </div>
                              <div class="popular-post-card-body">
                                 <div class="popular-post-card-title">
                                    <h3><a href="<?= base_url('digital-shiksha-search-engine/' . $single_post->blog_slug); ?>"><?= htmlspecialchars($single_post->blog_title) ?></a></h3>
                                 </div>
                                 <div class="popular-post-card-meta">
                                    <span><i class="fa fa-comments"></i> <?= $single_post->total_comment ?> Comments</span>
                                    <?php if (isset($single_post->blog_post_date)) : ?>
                                       <span><i class="fa fa-calendar"></i> <?= date("M j, Y", strtotime($single_post->blog_post_date)) ?></span>
                                    <?php endif; ?>
                                 </div>
                              </div>
                           </div>
                        <?php endforeach; ?>
                     </div>
                  <?php else : ?>
                     <div class="no-results">
                        <h3>No Popular Posts Available</h3>
                        <p>Popular posts will appear here once posts receive comments.</p>
                     </div>
                  <?php endif; ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<script>
   $(document).ready(function() {
      // Initialize tabs on page load - hide all except active
      $('.blog-tab-content').each(function() {
         if (!$(this).hasClass('active')) {
            $(this).hide();
         }
      });
      
      // Tab switching functionality
      $('.blog-tab').on('click', function() {
         var targetTab = $(this).data('tab');
         
         // Remove active class from all tabs and contents
         $('.blog-tab').removeClass('active');
         $('.blog-tab-content').removeClass('active');
         
         // Hide all tab contents explicitly
         $('.blog-tab-content').hide();
         
         // Add active class to clicked tab and corresponding content
         $(this).addClass('active');
         var targetContent = $('#' + targetTab + '-content');
         if (targetContent.length) {
            targetContent.addClass('active');
            targetContent.show();
         }
      });
      
      // Show/hide reset button based on search input
      var searchInput = $('#blog_search_input');
      var resetButton = $('.blog-reset-button');
      
      function toggleResetButton() {
         if (searchInput.val().trim() !== '') {
            if (resetButton.length === 0) {
               // Create reset button if it doesn't exist
               var resetBtn = $('<a href="<?= base_url('digital-shiksha-search-engine') ?>" class="blog-reset-button" title="Reset Search"><i class="fa fa-times"></i></a>');
               searchInput.parent().append(resetBtn);
            } else {
               resetButton.show();
            }
         } else {
            resetButton.hide();
         }
      }
      
      // Check on page load
      toggleResetButton();
      
      // Check on input change
      searchInput.on('input', function() {
         toggleResetButton();
      });
      
      // Hide next button on last page
      var pagination = $('.blog-pagination .pagination');
      if (pagination.length) {
         var activePage = pagination.find('li.active');
         if (activePage.length) {
            var allPages = pagination.find('li:has(a), li:has(span)').not('.disabled');
            var activeIndex = allPages.index(activePage);
            var lastIndex = allPages.length - 1;
            
            // If active page is the last page, hide next button
            if (activeIndex === lastIndex) {
               pagination.find('li').each(function() {
                  var $this = $(this);
                  var linkText = $this.find('a, span').text().trim();
                  if (linkText === 'Next »' || linkText === 'Next') {
                     $this.hide();
                  }
               });
            }
            
            // Hide prev button on first page
            if (activeIndex === 0) {
               pagination.find('li').each(function() {
                  var $this = $(this);
                  var linkText = $this.find('a, span').text().trim();
                  if (linkText === '« Prev' || linkText === '«' || linkText === 'Prev') {
                     $this.hide();
                  }
               });
            }
         }
      }
   });
</script>