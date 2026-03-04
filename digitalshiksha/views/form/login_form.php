<style type="text/css">
    section#contact {
        display: none;
    }

    /* Login Page Styling - White Background with #F1B900 Accents */
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

    /* Logo removed - no longer needed */

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

    .login-form-group input {
        width: 100%;
        padding: 15px 20px 15px 50px;
        border: 2px solid #e5e7eb;
        border-radius: 12px;
        font-size: 15px;
        transition: all 0.3s ease;
        background: #f9fafb;
        color: #060606 !important;
        font-weight: 400;
    }

    .login-form-group input:hover {
        border-color: rgba(241, 185, 0, 0.5);
    }

    .login-form-group input:focus {
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

    .login-footer .register-link {
        margin-top: 15px;
        display: block;
        color: #6b7280;
        font-size: 14px;
    }

    .login-footer .register-link a {
        color: #F1B900;
        font-weight: 600;
        transition: color 0.3s ease;
    }

    .login-footer .register-link a:hover {
        color: #ff8c00;
    }

    /* Alert Styling - Modern and Clean */
    .login-alert,
    .alert {
        margin-bottom: 20px;
        padding: 15px 40px 15px 20px;
        border-radius: 12px;
        border: 2px solid #F1B900 !important;
        box-shadow: 0 4px 12px rgba(241, 185, 0, 0.2);
        font-size: 14px;
        position: relative;
        background: rgba(241, 185, 0, 0.1) !important;
        color: #2c3e50 !important;
        font-weight: 500;
        line-height: 1.6;
    }

    .login-alert.alert-danger,
    .alert.alert-danger {
        background: rgba(220, 53, 69, 0.1) !important;
        color: #721c24 !important;
        border: 2px solid #dc3545 !important;
    }

    .login-alert.alert-success,
    .alert.alert-success {
        background: rgba(40, 167, 69, 0.1) !important;
        color: #155724 !important;
        border: 2px solid #28a745 !important;
    }

    /* Single Close Button Styling */
    .login-alert.alert-dismissable,
    .alert.alert-dismissable {
        padding-right: 40px;
    }

    .login-alert .close,
    .alert .close {
        position: absolute;
        top: 50%;
        right: 12px;
        transform: translateY(-50%);
        color: #2c3e50;
        opacity: 0.6;
        font-size: 20px;
        font-weight: bold;
        line-height: 1;
        text-shadow: none;
        padding: 0;
        background: transparent;
        border: 0;
        cursor: pointer;
        transition: all 0.3s ease;
        width: 24px;
        height: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
    }

    .login-alert.alert-danger .close,
    .alert.alert-danger .close {
        color: #721c24;
    }

    .login-alert.alert-success .close,
    .alert.alert-success .close {
        color: #155724;
    }

    .login-alert .close:hover,
    .login-alert .close:focus,
    .alert .close:hover,
    .alert .close:focus {
        opacity: 1;
        background: rgba(0, 0, 0, 0.05);
        outline: none;
    }

    /* Remove any duplicate close buttons */
    .login-alert .close ~ .close,
    .alert .close ~ .close {
        display: none !important;
    }

    /* Remove nested alert styling */
    .login-alert .alert,
    .alert .alert {
        background: transparent !important;
        border: none !important;
        padding: 0 !important;
        margin: 0 !important;
        box-shadow: none !important;
    }

    .login-alert .alert .close,
    .alert .alert .close {
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
                        <i class="fa fa-user"></i>
                    </div>
                    <h3>Sign In</h3>
                    <p>Sign in to your account to continue</p>
                </div>

                <?php 
                $validation_errors = validation_errors();
                if (!empty($validation_errors)) : ?>
                    <div class="login-alert alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <?= $validation_errors; ?>
                    </div>
                <?php endif; ?>
                <?php if (isset($message) && !empty($message)) : ?>
                    <?= $message; ?>
                <?php endif; ?>

                <?= form_open(base_url('login'), 'role="form" class="login-form" id="loginForm"'); ?>
                    <!-- User Type Selection - Teacher/Student -->
                    <div class="user-type-selection login-user-type" style="margin-bottom: 25px;">
                        <label class="selection-label">I am a:</label>
                        <div class="user-type-tabs">
                            <label class="user-tab login-type-tab active" data-radio="5">
                                <?= form_radio('user_role', '5', true, 'required="required" class="login-item" checked') ?>
                                <span class="tab-icon"><i class="fa fa-book"></i></span>
                                <span class="tab-text">Student</span>
                            </label>
                            <label class="user-tab login-type-tab" data-radio="4">
                                <?= form_radio('user_role', '4', false, 'class="login-item" required="required"') ?>
                                <span class="tab-icon"><i class="fa fa-user"></i></span>
                                <span class="tab-text">Teacher</span>
                            </label>
                        </div>
                    </div>

                    <div class="login-form-group">
                        <i class="fa fa-envelope"></i>
                        <?= form_input('user_email', '', 'id="user_email" type="text" placeholder="Email address / Phone No" required="required"') ?>
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
                    <a href="<?= base_url('forgot-password'); ?>">
                        <i class="fa fa-question-circle"></i>
                        <span>Forgot Password?</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
$(document).ready(function() {
    // Ensure alert dismiss functionality works for all alerts
    $(document).on('click', '.alert .close, .login-alert .close', function(e) {
        e.preventDefault();
        var $alert = $(this).closest('.alert, .login-alert');
        $alert.fadeOut(300, function() {
            $(this).remove();
        });
    });
    
    // Also handle Bootstrap's data-dismiss attribute
    $('[data-dismiss="alert"]').on('click', function(e) {
        e.preventDefault();
        var $alert = $(this).closest('.alert, .login-alert');
        $alert.fadeOut(300, function() {
            $(this).remove();
        });
    });
});
</script>
