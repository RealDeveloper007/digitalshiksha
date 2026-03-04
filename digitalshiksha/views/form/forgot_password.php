<style type="text/css">
   section#contact {
      display: none;
   }

   /* Forgot Password Page Styling - White Background with #F1B900 Accents */
   #login {
      padding: 100px 0 60px 0;
      background: #ffffff;
      min-height: calc(100vh - 200px);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      position: relative;
   }

   /* Add subtle background pattern */
   #login::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: linear-gradient(135deg, rgba(241, 185, 0, 0.02) 0%, rgba(255, 140, 0, 0.02) 100%);
      pointer-events: none;
      z-index: 0;
   }

   #login > .container {
      position: relative;
      z-index: 1;
   }

   .forgot-password-container {
      max-width: 450px;
      margin: 0 auto;
      width: 100%;
      position: relative;
      z-index: 1;
   }

   .forgot-password-card {
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 20px 60px rgba(241, 185, 0, 0.15);
      border: 3px solid #F1B900;
      padding: 50px 40px;
      position: relative;
      overflow: hidden;
   }

   .forgot-password-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 5px;
      background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%);
   }

   .forgot-password-header {
      text-align: center;
      margin-bottom: 40px;
   }

   .forgot-password-icon {
      width: 80px;
      height: 80px;
      background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 20px;
      box-shadow: 0 8px 20px rgba(241, 185, 0, 0.3);
   }

   .forgot-password-icon i {
      font-size: 36px;
      color: #fff;
   }

   .forgot-password-header h3 {
      font-size: 28px;
      font-weight: 700;
      color: #2c3e50;
      margin: 0;
      margin-bottom: 8px;
   }

   .forgot-password-header p {
      color: #6b7280;
      font-size: 14px;
      margin: 0;
   }

   .forgot-password-form-group {
      position: relative;
      margin-bottom: 25px;
   }

   .forgot-password-form-group i {
      position: absolute;
      left: 18px;
      top: 50%;
      transform: translateY(-50%);
      color: #F1B900;
      font-size: 18px;
      z-index: 2;
   }

   .forgot-password-form-group input {
      width: 100%;
      padding: 15px 20px 15px 50px;
      border: 2px solid #e5e7eb;
      border-radius: 12px;
      font-size: 15px;
      transition: all 0.3s ease;
      background: #f9fafb;
      color: #2c3e50;
   }

   .forgot-password-form-group input:hover {
      border-color: rgba(241, 185, 0, 0.5);
   }

   .forgot-password-form-group input:focus {
      outline: none;
      border-color: #F1B900;
      background: #ffffff;
      box-shadow: 0 0 0 4px rgba(241, 185, 0, 0.15);
   }

   .forgot-password-form-group input::placeholder {
      color: #9ca3af;
   }

   .forgot-password-button {
      width: 100%;
      padding: 16px;
      background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%);
      color: #000000;
      border: 2px solid #F1B900;
      border-radius: 12px;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 8px 20px rgba(241, 185, 0, 0.3);
      margin-top: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
   }

   .forgot-password-button:hover {
      transform: translateY(-2px);
      box-shadow: 0 12px 30px rgba(241, 185, 0, 0.4);
      background: linear-gradient(135deg, #ff8c00 0%, #F1B900 100%);
      color: #000000;
   }

   .forgot-password-button:active {
      transform: translateY(0);
   }

   .forgot-password-footer {
      text-align: center;
      margin-top: 30px;
      padding-top: 25px;
      border-top: 2px solid rgba(241, 185, 0, 0.2);
   }

   .forgot-password-footer a {
      color: #F1B900;
      text-decoration: none;
      font-weight: 500;
      font-size: 14px;
      transition: color 0.3s ease;
      display: inline-flex;
      align-items: center;
      gap: 6px;
   }

   .forgot-password-footer a:hover {
      color: #ff8c00;
      text-decoration: none;
   }

   .forgot-password-alert {
      margin-bottom: 25px;
      padding: 15px 20px;
      border-radius: 12px;
      border: 2px solid #F1B900;
      border-left: 4px solid #F1B900;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
   }

   /* Hide empty alert divs */
   .forgot-password-alert:empty {
      display: none !important;
   }

   .forgot-password-alert.alert-danger {
      background: rgba(241, 185, 0, 0.1);
      color: #000000;
   }

   .forgot-password-alert.alert-success {
      background: rgba(241, 185, 0, 0.1);
      color: #000000;
      border-color: #F1B900;
   }

   /* Responsive Design */
   @media (max-width: 767px) {
      #login {
         padding: 90px 20px 40px 20px;
         min-height: auto;
      }

      .forgot-password-container {
         margin-top: 80px;
      }

      .forgot-password-card {
         padding: 35px 25px;
         border-radius: 16px;
      }

      .forgot-password-header {
         margin-bottom: 30px;
      }

      .forgot-password-header h3 {
         font-size: 22px;
      }

      .forgot-password-icon {
         width: 65px;
         height: 65px;
         margin-bottom: 15px;
      }

      .forgot-password-icon i {
         font-size: 28px;
      }

      .forgot-password-form-group {
         margin-bottom: 20px;
      }

      .forgot-password-button {
         padding: 14px;
         font-size: 15px;
      }

      .forgot-password-footer {
         margin-top: 25px;
         padding-top: 20px;
      }
   }

   @media (max-width: 480px) {
      #login {
         padding: 80px 15px 30px 15px;
      }

      .forgot-password-card {
         padding: 30px 20px;
         border-radius: 12px;
      }

      .forgot-password-header h3 {
         font-size: 20px;
      }

      .forgot-password-header p {
         font-size: 13px;
      }

      .forgot-password-icon {
         width: 60px;
         height: 60px;
      }

      .forgot-password-icon i {
         font-size: 26px;
      }

      .forgot-password-form-group input {
         padding: 12px 18px 12px 45px;
         font-size: 14px;
      }

      .forgot-password-button {
         padding: 12px;
         font-size: 14px;
      }
   }

   /* Animation */
   @keyframes fadeInUp {
      from {
         opacity: 0;
         transform: translateY(30px);
      }
      to {
         opacity: 1;
         transform: translateY(0);
      }
   }

   .forgot-password-card {
      animation: fadeInUp 0.6s ease-out;
   }
</style>

<section id="login" class="loginPage secPad">
   <div class="container">
      <div class="forgot-password-container">
         <div class="forgot-password-card">
            <div class="forgot-password-header">
               <div class="forgot-password-icon">
                  <i class="fa fa-lock"></i>
               </div>
               <h3>Password Recovery</h3>
               <p>Enter your email or phone number to recover your password</p>
            </div>

            <?php 
            $validation_errors = validation_errors();
            if (!empty($validation_errors)) : ?>
                <div class="forgot-password-alert alert-danger"><?= $validation_errors ?></div>
            <?php endif; ?>
            
            <?php 
            $flash_message = $this->session->flashdata('message');
            if (!empty($flash_message)) : ?>
                <div class="forgot-password-alert alert-success"><?= $flash_message ?></div>
            <?php endif; ?>
            
            <?php 
            if (isset($message) && !empty($message)) : ?>
                <div class="forgot-password-alert alert-danger"><?= $message ?></div>
            <?php endif; ?>

            <?= form_open(base_url('forgot-password-submit'), 'role="form" class="forgot-password-form"'); ?>
               <div class="forgot-password-form-group">
                  <i class="fa fa-envelope"></i>
                  <?= form_input('email', '', 'title="you@domain.com" placeholder="Email Address OR Phone Number" required="required" autocomplete="off"') ?>
               </div>

               <button type="submit" class="forgot-password-button">
                  <i class="fa fa-key"></i>
                  <span>Recover Password</span>
               </button>
            <?= form_close() ?>

            <div class="forgot-password-footer">
               <a href="<?= base_url('login'); ?>">
                  <i class="fa fa-arrow-left"></i>
                  <span>Back to Login</span>
               </a>
            </div>
         </div>
      </div>
   </div>
</section>

<!--/#login-->