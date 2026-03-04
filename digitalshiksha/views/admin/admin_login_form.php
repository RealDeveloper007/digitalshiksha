<style type="text/css">
    section#contact {
        display: none;
    }

    /* Super Admin Login Page Styling - White Background with #F1B900 Accents */
    #login {
        padding: 100px 0 60px 0;
        background: #ffffff;
        min-height: calc(100vh - 200px);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }

    /* Ensure proper spacing under header */
    body.login-page {
        padding-top: 0 !important;
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

    .login-container {
        max-width: 450px;
        margin: 0 auto;
        width: 100%;
        position: relative;
        z-index: 1;
        flex-shrink: 0;
    }

    .login-card {
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 20px 60px rgba(241, 185, 0, 0.15);
        border: 3px solid #F1B900;
        padding: 40px 35px;
        position: relative;
        overflow: hidden;
    }

    .login-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%);
    }

    .login-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .login-icon {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 15px;
        box-shadow: 0 8px 20px rgba(241, 185, 0, 0.3);
    }

    .login-icon i {
        font-size: 36px;
        color: #fff;
    }

    .login-header h3 {
        font-size: 24px;
        font-weight: 700;
        color: #2c3e50;
        margin: 0;
        margin-bottom: 6px;
    }

    .login-header p {
        color: #6b7280;
        font-size: 14px;
        margin: 0;
    }

    .login-form-group {
        position: relative;
        margin-bottom: 20px;
    }

    .login-form-group i {
        position: absolute;
        left: 18px;
        top: 50%;
        transform: translateY(-50%);
        color: #F1B900;
        font-size: 18px;
        z-index: 2;
    }

    .login-form-group input,
    .login-form-group select {
        width: 100%;
        padding: 15px 20px;
        border: 2px solid #e5e7eb;
        border-radius: 12px;
        font-size: 15px;
        transition: all 0.3s ease;
        background: #f9fafb;
        color: #060606 !important;
        font-weight: 400;
    }

    .login-form-group:has(i) input {
        padding-left: 50px;
    }

    .login-form-group input:hover,
    .login-form-group select:hover {
        border-color: rgba(241, 185, 0, 0.5);
    }

    .login-form-group input:focus,
    .login-form-group select:focus {
        outline: none;
        border-color: #F1B900;
        background: #ffffff;
        box-shadow: 0 0 0 4px rgba(241, 185, 0, 0.15);
    }

    .login-form-group input::placeholder {
        color: #9ca3af;
    }

    .login-button {
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

    .login-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 30px rgba(241, 185, 0, 0.4);
        background: linear-gradient(135deg, #ff8c00 0%, #F1B900 100%);
        color: #000000;
    }

    .login-button:active {
        transform: translateY(0);
    }

    .login-footer {
        text-align: center;
        margin-top: 20px;
        padding-top: 20px;
        border-top: 2px solid rgba(241, 185, 0, 0.2);
    }

    .login-footer a {
        color: #F1B900;
        text-decoration: none;
        font-weight: 500;
        font-size: 14px;
        transition: color 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .login-footer a:hover {
        color: #ff8c00;
        text-decoration: none;
    }

    .login-alert {
        margin-bottom: 20px;
        padding: 12px 18px;
        border-radius: 12px;
        border: 2px solid #F1B900;
        border-left: 4px solid #F1B900;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        font-size: 14px;
    }

    .login-alert.alert-danger {
        background: rgba(241, 185, 0, 0.1);
        color: #000000;
    }

    .login-alert:empty {
        display: none !important;
    }

    /* Responsive Design */
    @media (max-width: 767px) {
        #login {
            padding: 120px 20px 60px 20px;
            min-height: calc(100vh - 200px);
        }

        .login-card {
            padding: 30px 25px;
            border-radius: 16px;
            margin-top: 75px;
        }

        .login-header {
            margin-bottom: 25px;
        }

        .login-header h3 {
            font-size: 22px;
        }

        .login-icon {
            width: 60px;
            height: 60px;
        }

        .login-icon i {
            font-size: 26px;
        }

        .login-form-group {
            margin-bottom: 18px;
        }

        .login-footer {
            margin-top: 15px;
            padding-top: 15px;
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

    .login-card {
        animation: fadeInUp 0.6s ease-out;
    }
</style>

<section id="login" class="loginPage secPad">
    <div class="container">
        <div class="login-container">
            <div class="login-card">
                <div class="login-header">
                    <div class="login-icon">
                        <i class="fa fa-user-shield"></i>
                    </div>
                    <h3>Super Admin Login</h3>
                    <p>Sign in to your super admin account</p>
                </div>

                <?php 
                $validation_errors = validation_errors();
                if (!empty($validation_errors)) : ?>
                    <div class="login-alert alert-danger"><?= $validation_errors ?></div>
                <?php endif; ?>
                
                <?php 
                $flash_message = $this->session->flashdata('message');
                if (!empty($flash_message)) : ?>
                    <div class="login-alert alert-danger"><?= $flash_message ?></div>
                <?php endif; ?>
                
                <?php 
                if (isset($message) && !empty($message)) : ?>
                    <div class="login-alert alert-danger"><?= $message ?></div>
                <?php endif; ?>

                <?php echo form_open(base_url('superadmin'), 'role="form" class="login-form"'); ?>
                    <div class="login-form-group">
                        <?php
                        $option = array();
                        $option[0] = 'Select User Role';
                        foreach ($user_role as $value) {
                            if ($value->user_role_id < 5) {
                                $option[$value->user_role_id] = $value->user_role_name;
                            }
                        }
                        ?>
                        <?php echo form_dropdown('user_role', $option, '', 'class="form-control"') ?>
                    </div>

                    <div class="login-form-group">
                        <i class="fa fa-envelope"></i>
                        <?= form_input('user_email', '', 'id="user_email" type="email" pattern="^[a-zA-Z0-9.!#$%&\'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$" title="you@domain.com" placeholder="Email address" required="required"') ?>
                    </div>

                    <div class="login-form-group">
                        <i class="fa fa-lock"></i>
                        <?= form_password('user_pass', '', 'id="user_pass" placeholder="Password" required="required"') ?>
                    </div>

                    <button type="submit" class="login-button">
                        <i class="fa fa-sign-in"></i>
                        <span>Login</span>
                    </button>
                <?= form_close() ?>

                <div class="login-footer">
                    <a href="<?= base_url('login_control/password_recovery_form'); ?>">
                        <i class="fa fa-question-circle"></i>
                        <span>Forgot Password?</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
