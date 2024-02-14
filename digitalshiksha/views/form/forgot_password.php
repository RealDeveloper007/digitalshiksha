<style type="text/css">
   section#contact {
      display: none;
   }

   body {
      padding-top: 120px;
   }

   .Site {
      display: flex;
      min-height: 100vh;
      flex-direction: column;
   }

   .Site-content {
      flex: 1;
   }
</style>



<section id="login" class="loginPage secPad">
   <div class="container">
      <div class="box">
         <div class="row">
            <div class="col-xs-10 col-xs-offset-1">
               <?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>
               <?= ($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>
               <?= (isset($message)) ? $message : ''; ?>
            </div>
            <div class="col-md-12">
               <div class="boxInner">
                  <i class="fa fa-lock fnew"></i>
                  <h3>Password Recovery</h3>
                  <!--/.center-->
                  <?= form_open(base_url('forgot-password-submit'), 'role="form" class="form-horizontal"'); ?>
                  <?= form_input('email', '', 'title="you@domain.com" placeholder="Put your Email Address OR Phone Number" class="form-control" required="required" autocomplete="off"') ?>
                  <button type="submit" class="btn btn-warning btn-lg btn-block">Recover Password</button>
                  <?= form_close() ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<div class="Site-content"></div>

<!--/#login-->