<style>
    #contact .box a {
    color: #999;
    margin: 10px;
}
</style>
<?php 


?>
<section id="contact" class="navyBlue secPad contactNew">
    <div class="container">
        <div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3><b>Contact Us</b></h3>
                    <p>Write a message, we will get back to you.</p>
                    <p>(किसी समस्या के लिए सम्पर्क करें।)</p>
                    <div class="line_br"></div>
                </div>
            </div>
            <div class="row">
                  <div class="col-xs-12">
    
    </div>
                <div class="col-md-6 col-sm-6">
                    <div class="status alert alert-success" style="display: none"></div>
                    <?=form_open(base_url('guest/contact'), 'role="form" id="contact_form" class="contact-form conNew"'); ?>
                        <input type="hidden" name="token" value="<?=time();?>">
                        <div class="row">
                            <div class="col-sm-12">
                                <input type='hidden' name="to" value="info@digitalshikshadarpan.com" />
                                
                                 <input type='text' name="name" placeholder="Your Name" class="form-control" required="required"/>
                                 
                            </div>
                            <div class="col-sm-12">
                                
                                <input type='email' name="email" placeholder="Your Email" class="form-control" required="required"/>

                            </div>
                            <div class="col-sm-12">
                                
                                    <input type='text' name="phone_number" placeholder="Your Phone Number" class="form-control" pattern="\d*" minlength="10" maxlength="10" required="required"/>

                            </div>
                             <div class="col-sm-12">
                                 
                                  <input type='text' name="subject" placeholder="Subject" class="form-control"  minlength="4" maxlength="30" required="required"/>
                            </div>
                        
                            <div class="col-sm-12">
                                    <textarea name="message" id="message" required="required" class="form-control" rows="5" placeholder="Message" minlength="10" maxlength="10"></textarea>
                            </div>
                               <div class="col-sm-12" style="margin-top: 10px;">
                              <?php
                              
                                $cap=new \MathsCaptcha();
                                $cap->getCaptcha();
        ?>
                            </div>
                           
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-info  btn-outline btn-lg" style="margin-top: 10px;
    margin-bottom: 10px;"><i class="fa fa-envelope-o"></i> Send Message</button>
                            </div>
                             
                        </div>
                    <?=form_close(); ?>
                </div><!--/.col-md-6 col-sm-5-->
                <!--div class="col-md-5 col-sm-12">
                    <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.it/maps?q=<?=urlencode($address)?>&output=embed"></iframe>
                </div>.col-md-4 col-sm-5-->

                <div class="col-md-6 col-sm-6 mobiTop">
                    
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <h3><b>Important Links</b></h3>
                            <ul class="social">
                                 <?php if ($googleplus_url): ?>
                                    <li><a class="text-muted" href="<?= $googleplus_url; ?>" target="_blank" rel="noindex"><i class="fa fa-video-camera" aria-hidden="true"></i> Online Exam Tutorial Video</a></li>
                                <?php endif; ?>
                                <?php if ($you_tube_url): ?>
                                    <li><a class="text-muted" href="<?= $you_tube_url; ?>" target="_blank" rel="noindex"><i class="fa fa-youtube"></i> Our Youtube Channel</a></li>
                                <?php endif; ?>
                                <?php if ($twitter_url): ?>
                                    <li><a class="text-muted" href="<?= $twitter_url; ?>" target="_blank" rel="noindex"><i class="fa fa-twitter"></i> Our Subjective  Web Site</a></li>
                                <?php endif; ?>
                                
                                <?php if ($facbook_url): ?>
                                    <li><a class="text-muted" href="<?= $facbook_url; ?>" target="_blank" rel="noindex"><i class="fa fa-facebook"></i> Meet Us On Facebook</a></li>
                                <?php endif; ?>

                                <h3 class="h3cont"><b> Useful Websites</b></h3>
                               
                                <?php if ($linkedin_url): echo $linkedin_url; endif; ?>

                                <?php if ($pinterest_url): echo $pinterest_url; endif; ?>

                                <?php if ($flickr_url): echo $flickr_url; endif; ?>
                                
                                <li><a class="text-muted" href="https://cbseacademic.nic.in/skill-education-books.html" target="_blank" rel="noindex"><i class="fa fa-cog"></i> CBSE Skill Books</a></li>
                                <li><a class="text-muted" href="https://www.psscive.ac.in/publications/textbooks" target="_blank" rel="noindex"><i class="fa fa-cog"></i> PSSCIVE Bhopal Books</a></li>
                                <li><a class="text-muted" href="https://www.eduhelpdeskguru.com/p/list-of-all-educational-useful-video.html" target="_blank" rel="noindex"><i class="fa fa-cog"></i> Skill Video Resources</a></li>
                                <li><a class="text-muted" href="https://www.mindluster.com/" target="_blank" rel="noindex"><i class="fa fa-cog"></i> Online  Free courses website</a></li>

                            </ul>
                        </div><!--/.col-md-12 col-sm-6-->
                    </div><!--/.row-->
                </div><!--/.col-md-2 col-sm-5-->
            </div><!--/.row-->
          
        </div><!--/.box-->
    </div><!--/.container-->
</section><!--/#contact-->

<script>
    $('#phone_number').bind("keyup blur",function(){
      $(this).val( $(this).val().replace(/[^\d]/g,'') )  

    });
</script>
