<style>
   .media-left iframe {
      width: 64px;
      margin-right: 8px;
      height: 70px;
   }

   span.at-label {
      display: none;
   }

   .fixImg iframe {
      height: 100%;
   }

   .fixImg img {
      width: 100%;
      height: 100%;
      object-fit: cover;
   }
</style>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5f089d664f9be2d5"></script>

<section id="blog" class="blogNew secPad">
   <div class="container">
      <div class="box">
         <div class="row">
            <div class="col-md-12">
               <h1 class="text-uppercase text-center h1"><strong>Digital Shiksha Search Engine</strong></h1>
               <div class="line_br mrauto"></div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12">
               <?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>
               <?= ($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>
               <?= (isset($message)) ? $message : ''; ?>
            </div>

         </div>
         <div class="row mobileView">

            <div class="col-md-8 mt150">
               <?php if (empty($blogs)) echo "<h3>No result found!</h3>"; ?>
               <?php foreach ($blogs as $value) {

               ?>
                  <div class="row">
                     <div class="col-md-12">
                        <!-- <div class="block-search">
                        <?php //form_open(base_url('blog/find'), 'method="GET" role="form" class="form-horizontal"'); 
                        ?>
                         <input name="keyword" type="search" class="form-control" placeholder="Search..." />
                        <?php //form_close(); 
                        ?>
                        </div> -->
                        <div class="blog">
                           <!-- /.row Start-->
                           <div class="blog-post">
                              <div class="blog-body">
                                 <div class="row blo-left">
                                    <div class="col-md-12 p-rig">
                                       <div class="blog-flex">
                                          <div class="fixImg h-150">
                                             <?php if ($value->blog_media_type == 'image') {
                                                $File =  "<img src='" . base_url('blog_files/') . $value->blog_attachment . "' class='img-responsive'>";
                                                echo $File;
                                             } else if ($value->blog_media_type == 'file') {
                                                $File =  "<a href='" . base_url('blog_files/') . $value->blog_attachment . "' target='_blank' style='text-decoration:underline;color:blue'>Click here to view file</a>";
                                                echo $File;
                                             } else {

                                                echo $value->blog_attachment;
                                             } ?>
                                          </div>

                                          <div class="bgBlog">
                                             <div class="blog-content">
                                                <h1 class="text-center"><a href="<?= base_url('digital-shiksha-search-engine/' . $value->blog_slug); ?>"><?= $value->blog_title; ?></a></h1>
                                                <div class="blog-caption">
                                                   Author: <?= $value->user_name . ', Published: ' . date("F j, Y", strtotime($value->blog_post_date)); ?>

                                                   <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                                   <div class="addthis_inline_share_toolbox"></div>

                                                </div>
                                             </div>
                                             <?= $value->blog_short_body; ?>
                                             <div class="read-more text-left">
                                                <a href="<?= base_url('digital-shiksha-search-engine/' . $value->blog_slug); ?>" class="btn btn-default"> Read More </a>
                                             </div>

                                          </div>
                                       </div>
                                    </div>

                                 </div>


                              </div>

                           </div>
                        </div>
                        <!-- /.row End-->
                     </div>
                  </div>
                  <!--/.col-md-4-->
               <?php } ?>
               <div class="text-center">
                  <?= $this->pagination->create_links(); ?>
               </div>
            </div>

            <div class="col-md-4 rightser">
               <div class="searchri pd25 bgblue posMob">
                  <h3>Search</h3>
                  <!-- Actual search box -->
                  <div class="form-group has-feedback has-search">
                     <form action="<?= base_url('digital-shiksha-search-engine')  ?>" method="get" role="form" class="form-horizontal" enctype="multipart/form-data">
                        <button class="fa fa-search form-control-feedback" type="submit"></button>
                        <input type="text" class="form-control" name="blog_name" placeholder="Search" required>
                     </form>
                  </div>
               </div>

               <div class="searchri pd25 bgblue">
                  <h3>Popular Post</h3>
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

         </div>
         <!--/.row-->
      </div>
      <!--/.box-->
   </div>
   <!--/.container-->
</section>
<!--/#services-->