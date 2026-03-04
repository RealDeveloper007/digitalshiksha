<style>
    /* Contact Page Styling */
    .contact-page-wrapper {
        padding: 40px 0;
        background: #f8f9fa;
    }
    
    .contact-header-section {
        text-align: center;
        margin-bottom: 40px;
        padding: 20px 0;
    }
    
    .contact-header-section h2 {
        font-size: 32px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 10px;
    }
    
    .contact-header-section p {
        font-size: 16px;
        color: #666;
        margin: 5px 0;
    }
    
    .contact-header-section .line_br {
        width: 80px;
        height: 3px;
        background: linear-gradient(135deg, #2c3e50 0%, #FFD700 100%);
        margin: 20px auto;
        border-radius: 2px;
    }
    
    /* Map Section */
    .map-section {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        overflow: hidden;
        height: 100%;
        min-height: 500px;
    }
    
    .map-section iframe {
        width: 100%;
        height: 100%;
        min-height: 500px;
        border: 0;
        display: block;
    }
    
    /* Contact Form Section */
    .contact-form-section {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        padding: 30px;
        height: 100%;
    }
    
    .contact-form-section h3 {
        font-size: 24px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 2px solid #FFD700;
    }
    
    .contact-form .form-group {
        margin-bottom: 20px;
    }
    
    .contact-form .form-control {
        padding: 12px 15px;
        font-size: 14px;
        border: 1px solid #ddd;
        border-radius: 4px;
        transition: all 0.3s ease;
        width: 100%;
    }
    
    .contact-form .form-control:focus {
        border-color: #FFD700;
        box-shadow: 0 0 0 3px rgba(255, 215, 0, 0.1);
        outline: none;
    }
    
    .contact-form textarea.form-control {
        resize: vertical;
        min-height: 120px;
    }
    
    .contact-form .btn-submit {
        background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
        color: #fff;
        border: none;
        padding: 12px 30px;
        font-size: 16px;
        font-weight: 600;
        border-radius: 4px;
        cursor: pointer;
        transition: all 0.3s ease;
        width: 100%;
        margin-top: 10px;
    }
    
    .contact-form .btn-submit:hover {
        background: linear-gradient(135deg, #34495e 0%, #2c3e50 100%);
        box-shadow: 0 4px 12px rgba(44, 62, 80, 0.3);
        transform: translateY(-2px);
    }
    
    .contact-form .btn-submit i {
        margin-right: 8px;
    }
    
    /* Alert Messages */
    .contact-alerts {
        margin-bottom: 20px;
    }
    
    .contact-alerts .alert {
        border-radius: 4px;
        padding: 12px 15px;
        margin-bottom: 15px;
    }
    
    /* Captcha Section */
    .captcha-section {
        margin: 20px 0;
        padding: 15px;
        background: #f8f9fa;
        border-radius: 4px;
        border: 1px solid #e9ecef;
    }
    
    /* Responsive Design */
    @media (max-width: 768px) {
        .contact-page-wrapper {
            padding: 20px 0;
        }
        
        .contact-header-section h2 {
            font-size: 24px;
        }
        
        .contact-header-section p {
            font-size: 14px;
        }
        
        .map-section {
            margin-bottom: 30px;
            min-height: 350px;
        }
        
        .map-section iframe {
            min-height: 350px;
        }
        
        .contact-form-section {
            padding: 20px;
        }
        
        .contact-form-section h3 {
            font-size: 20px;
        }
    }
</style>

<section class="contact-page-wrapper">
    <div class="container">
        <!-- Header Section -->
        <div class="contact-header-section">
            <h2>Contact Us</h2>
            <p>Write a message, we will get back to you.</p>
            <p>(किसी समस्या के लिए सम्पर्क करें।)</p>
            <div class="line_br"></div>
        </div>
        
        <!-- Alerts -->
        <div class="contact-alerts">
            <?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>
            <?= ($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>
            <?= (isset($message)) ? $message : ''; ?>
        </div>
        
        <!-- Map and Form Section -->
        <div class="row">
            <!-- Map Section - Left Side -->
            <div class="col-md-6 col-sm-12">
                <div class="map-section">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d55076.07329030838!2d76.77742684999998!3d30.372128049999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390fb62a421e6f11%3A0xebd28a29f7258d14!2sAmbala%2C%20Haryana!5e0!3m2!1sen!2sin!4v1747555954106!5m2!1sen!2sin" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
            
            <!-- Contact Form Section - Right Side -->
            <div class="col-md-6 col-sm-12">
                <div class="contact-form-section">
                    <h3>Send Us a Message</h3>
                    <div class="status alert alert-success" style="display: none"></div>
                    <?= form_open(base_url('guest/contact'), 'role="form" id="contact_form" class="contact-form"'); ?>
                        <input type="hidden" name="token" value="<?= time(); ?>">
                        <input type="hidden" name="to" value="info@digitalshikshadarpan.com" />
                        
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Your Name *" class="form-control" required="required"/>
                        </div>
                        
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Your Email *" class="form-control" required="required"/>
                        </div>
                        
                        <div class="form-group">
                            <input type="text" name="phone_number" id="phone_number" placeholder="Your Phone Number *" class="form-control" pattern="\d*" minlength="10" maxlength="10" required="required"/>
                        </div>
                        
                        <div class="form-group">
                            <input type="text" name="subject" placeholder="Subject *" class="form-control" minlength="4" maxlength="30" required="required"/>
                        </div>
                        
                        <div class="form-group">
                            <textarea name="message" id="message" required="required" class="form-control" rows="5" placeholder="Your Message *" minlength="10"></textarea>
                        </div>
                        
                        <div class="captcha-section">
                            <?php
                                $cap = new \MathsCaptcha();
                                $cap->getCaptcha();
                            ?>
                        </div>
                        
                        <button type="submit" class="btn-submit">
                            <i class="fa fa-envelope-o"></i> Send Message
                        </button>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $('#phone_number').bind("keyup blur", function(){
        $(this).val($(this).val().replace(/[^\d]/g,''));
    });
</script>
