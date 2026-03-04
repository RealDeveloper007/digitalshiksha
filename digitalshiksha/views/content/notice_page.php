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
    .box.first {
    margin-top: 78px !important;
    padding-top: 40px;
}
</style>
    <section id="notice">
        <div class="container">
            <div class="box first">
                <div class="row">
                     <div class="col-md-7 col-sm-12">
                    <table border="1px solid" style="border-collapse: separate;
			border-color:black;
			background-color:transparent;
			border-spacing:5px;">
			<tbody><tr>
			<th style="background-color:#b39c50;
			color: white;
			height: 70px;
			width:550px;">
            <h3 style="color:white;text-align:center;">Notice Updates</h3></th>
			</tr><tr> 
			<td>
                
            <p> <marquee direction="up" behaviour="scroll" onmouseover="this.stop()" onmouseout="this.start()" scrollamount="2" align="center" height="290"> 
                  <?php foreach ($notices as $value) { ?>             
                
			<pre><a href="" style="color: black;font-size: 15px;"><?= $value->notice_title.',</a>
			<p> Published: '. date("F j, Y", strtotime($value->notice_start)); ?> </p></pre>
              <?php } ?>    
			</marquee>
			</p>
           
                </td></tr></tbody></table>
                    </div>
                                         <div class="col-md-4 col-sm-12">
                 <div class="fb-page" data-href="https://www.facebook.com/Digital-Shiksha-Darpan-139760276654681/" data-tabs="timeline" data-width="350px" data-height="400px" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Digital-Shiksha-Darpan-139760276654681/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Digital-Shiksha-Darpan-139760276654681/">Digital Shiksha Darpan</a></blockquote></div>
                    </div>
                </div><!--/.row-->
            </div><!--/.box-->
        </div><!--/.container-->
    </section><!--/#services-->
