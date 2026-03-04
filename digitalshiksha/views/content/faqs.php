<style>
    /* FAQ Page - Modern Design */
    #faq {
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        padding: 90px 0 60px 0;
        min-height: auto;
    }
    
    .faq-page-header {
        text-align: center;
        margin-bottom: 30px;
    }
    
    .faq-page-header .header-icon {
        font-size: 40px;
        color: #F1B900;
        margin-bottom: 15px;
        display: inline-block;
    }
    
    .faq-page-header h1 {
        color: #2c3e50;
        font-size: 38px;
        font-weight: 800;
        margin: 0 0 15px 0;
        text-transform: uppercase;
        position: relative;
        padding-bottom: 15px;
    }
    
    .faq-page-header h1::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 100px;
        height: 4px;
        background: linear-gradient(90deg, #F1B900 0%, #ff8c00 100%);
        border-radius: 2px;
    }
    
    .faq-content-wrapper {
        background: #fff;
        border-radius: 16px;
        padding: 40px 35px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
        border: 1px solid rgba(241, 185, 0, 0.2);
    }
    
    .faq-group-title {
        color: #2c3e50;
        font-size: 24px;
        font-weight: 700;
        margin: 30px 0 20px 0;
        padding: 12px 20px;
        background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%);
        color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(241, 185, 0, 0.3);
        counter-reset: faq-counter;
    }
    
    .faq-group-title:first-child {
        margin-top: 0;
    }
    
    /* Accordion Styling */
    .panel-group {
        margin-bottom: 0;
        counter-reset: faq-counter;
    }
    
    .panel {
        border: none;
        border-radius: 8px;
        margin-bottom: 15px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        overflow: hidden;
    }
    
    .panel-heading {
        background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
        border: none;
        border-radius: 8px;
        padding: 0;
        transition: all 0.3s ease;
    }
    
    .panel-heading:hover {
        background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%);
    }
    
    .panel-heading:hover .panel-title a {
        color: #fff;
    }
    
    .panel-title {
        margin: 0;
        font-size: 16px;
        font-weight: 600;
    }
    
    .panel-title a {
        display: block;
        padding: 15px 20px;
        color: #ffffff;
        text-decoration: none;
        transition: all 0.3s ease;
        position: relative;
        padding-left: 50px;
    }
    
    .panel-title a::before {
        counter-increment: faq-counter;
        content: counter(faq-counter);
        position: absolute;
        left: 20px;
        color: #ffffff;
        font-size: 18px;
        font-weight: 700;
        width: 24px;
        height: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        line-height: 1;
    }
    
    .panel-heading:hover .panel-title a::before {
        color: #fff;
        background: rgba(255, 255, 255, 0.3);
    }
    
    .panel-title a.collapsed::before {
        content: counter(faq-counter);
    }
    
    .panel-body {
        padding: 20px 50px 20px 20px;
        background: #fff;
        border-top: 2px solid #e5e7eb;
        color: #4a5568;
        font-size: 15px;
        line-height: 1.8;
        border-radius: 0 0 8px 8px;
    }
    
    .panel-collapse.collapse {
        display: none;
    }
    
    .panel-collapse.collapse.in {
        display: block;
    }
    
    /* Responsive Design */
    @media (max-width: 991px) {
        #faq {
            padding: 80px 0 30px 0;
        }
        
        .faq-page-header {
            margin-bottom: 25px;
        }
        
        .faq-page-header h1 {
            font-size: 32px;
        }
    }
    
    @media (max-width: 768px) {
        #faq {
            padding: 80px 0 30px 0;
        }
        
        .faq-page-header h1 {
            font-size: 28px;
        }
        
        .faq-page-header .header-icon {
            font-size: 36px;
        }
        
        .faq-content-wrapper {
            padding: 30px 20px;
        }
        
        .faq-group-title {
            font-size: 20px;
            padding: 10px 15px;
        }
        
        .panel-title a {
            padding: 12px 15px;
            padding-left: 45px;
            font-size: 15px;
        }
        
        .panel-title a::before {
            left: 15px;
            width: 22px;
            height: 22px;
            font-size: 16px;
        }
        
        .panel-body {
            padding: 15px 15px 15px 15px;
            font-size: 14px;
        }
    }
    h4.panel-title a {
        color: white !important;
    }
</style>

<section id="faq" class="myBox secPad decpara">
   <div class="container">
      <!-- Header Section -->
      <div class="faq-page-header">
         <h1 class="text-uppercase"><strong>FAQS (नियमित पूछे गए प्रश्न)</strong></h1>
      </div>
      
      <!-- Content Section -->
      <div class="faq-content-wrapper">
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
                     
                         foreach ($faq_grps as $faq_grp) {
                     
                             echo '<h4 class="faq-group-title">'.$faq_grp->faq_grp_name.'</h4>';
                     
                             foreach ($faqs as $faq) { 
                     
                                 if($faq_grp->faq_grp_id == $faq->faq_grp_id){ ?>
                  <div class="panel panel-default">
                     <div class="panel-heading">
                        <h4 class="panel-title">
                           <a data-toggle="collapse" data-parent="#accordion" href="#faq<?=$faq->faq_id; ?>" class="collapsed">
                           <?=htmlspecialchars($faq->faq_ques); ?>
                           </a>
                        </h4>
                     </div>
                     <div id="faq<?=$faq->faq_id; ?>" class="panel-collapse collapse">
                        <div class="panel-body">
                           <?=$faq->faq_ans; ?>
                        </div>
                     </div>
                  </div>
                  <?php
                     }
                     
                     }
                     
                     }
                     
                     } else {
                     
                     echo '<div class="panel panel-default"><div class="panel-body">No FAQs found!</div></div>';
                     
                     }
                     
                     ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>