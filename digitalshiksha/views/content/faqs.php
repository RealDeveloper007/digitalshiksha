<section id="faq" class="myBox secPad decpara">
   <div class="container">
      <div class="row">
         <div class="col-md-12 text-center">
            <h1 class="text-uppercase h1"><strong>FAQS(नियमित पूछे गए प्रश्न)</strong></h1>
            <div class="line_br mrauto"></div>
         </div>
      </div>
      <div class="box">
         <div class="row">
            <div class="col-md-12">
               <?=validation_errors('<div class="alert alert-danger">', '</div>'); ?>
               <?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>        
               <?=(isset($message)) ? $message : ''; ?>
            </div>
            <div class="col-md-12">
               <div class="panel-group" id="accordion">
                  <?php  $faq_grps = $this->db->get('faq_grp')->result();
                     if (isset($faqs) AND !empty($faqs)) { 
                     
                         foreach ($faq_grps as $faq_grp) { $i = 1;
                     
                             echo "<h4>".$faq_grp->faq_grp_name."</h4>";
                     
                             foreach ($faqs as $faq) { 
                     
                                 if($faq_grp->faq_grp_id == $faq->faq_grp_id){ ?>
                  <div class="panel panel-default">
                     <div class="panel-heading">
                        <h4 class="panel-title"><?=$i;?>.
                           <a data-toggle="collapse" data-parent="#accordion" href="#faq<?=$faq->faq_id; ?>">
                           <?=$faq->faq_ques; ?>
                           </a>
                        </h4>
                     </div>
                     <div id="faq<?=$faq->faq_id; ?>" class="panel-collapse collapse">
                        <div class="panel-body">
                           <?=$faq->faq_ans; ?>
                        </div>
                     </div>
                  </div>
                  <?php           $i++;
                     }
                     
                     }
                     
                     }
                     
                     
                     
                     } else {
                     
                     echo '<div class="panel panel-default"><div class="panel-body">No result found!</div></div>';
                     
                     }
                     
                     ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!--/#pricing-->