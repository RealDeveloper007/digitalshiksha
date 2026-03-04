
<div class="result_popup">
        
</div>
        
<!-- Modal Start -->
<?php if (isset($modal)) echo $modal; ?>

<div id="fade" class="black_overlay"></div>
<!-- Common Scripts-->
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
<!-- Custom JS  -->
<script src="<?php echo base_url('assets/js/jsscript.js') ?>"></script>
<script type="text/javascript">
    (function($) {
        $(document).on('contextmenu', 'img', function() {
            return false;
        })

        $(document).keydown(function(e) {
            if (e.which === 123) {
                return false;
            }
        });
    })(jQuery);

    $(window).keyup(function(e) {
        if (e.keyCode == 44) {
            $("body").hide();
        }
    });
    var btn = $('#button');

    $(window).scroll(function() {
        if ($(window).scrollTop() > 30) {
            btn.addClass('show');
        } else {
            btn.removeClass('show');
        }
    });

    btn.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, '50');
    });
    window.onload = function() {

        console.log(localStorage.getItem('play_store_modal'));
        if(localStorage.getItem('play_store_modal') === null)
        {
            $('#andriodAppModal').modal({backdrop: 'static', keyboard: false});
            $('#andriodAppModal').modal('show');
        }

            // $('#app_info_modal').css('display', 'block');
            // $('body').addClass('app-popup');
            $('.not_now').click(function() {
                localStorage.setItem('play_store_modal', false);
            });

        /// remove ck editor notification..
        // $('.cke_notification').remove();

        // Fix: Check if iframe exists before accessing contentDocument
        let frameElement = document.getElementById("myiFrame");
        if (frameElement && frameElement.contentDocument) {
            try {
                let doc = frameElement.contentDocument;
                if (doc && doc.body) {
                    doc.body.innerHTML = doc.body.innerHTML + '<style>.bar {width:45%;}</style>';
                }
            } catch (e) {
                // Cross-origin iframe access denied - ignore error
                console.log('Cannot access iframe content (cross-origin restriction)');
            }
        }
    }

    // Highlight the top nav as scrolling occurs
    $('body').scrollspy({
        target: '.navbar-fixed-top'
    })

    // Closes the Responsive Menu on Menu Item Click
    $('.navbar-collapse ul li a:not(.dropdown-toggle)').click(function() {
        $('.navbar-toggle:visible').click();
    });

    function showVideo(id) {
        $('#video' + id).slideToggle();
    }

    // Hide popups immediately on page load to prevent flash
    (function() {
        // Remove popup_visible class from html if it exists (from previous page state)
        if (document.documentElement.classList.contains('popup_visible')) {
            document.documentElement.classList.remove('popup_visible');
            // Remove all popup_visible_* classes
            var classes = document.documentElement.className.split(' ');
            for (var i = 0; i < classes.length; i++) {
                if (classes[i].indexOf('popup_visible_') === 0) {
                    document.documentElement.classList.remove(classes[i]);
                }
            }
        }
        
        // Hide popup wrappers
        var popupWrappers = document.querySelectorAll('.popup_wrapper, #login_wrapper, #register_wrapper');
        for (var i = 0; i < popupWrappers.length; i++) {
            popupWrappers[i].style.display = 'none';
            popupWrappers[i].style.visibility = 'hidden';
            popupWrappers[i].style.opacity = '0';
        }
        
        // Hide overlays
        var overlays = document.querySelectorAll('.black_overlay, #fade');
        for (var i = 0; i < overlays.length; i++) {
            overlays[i].style.display = 'none';
            overlays[i].style.visibility = 'hidden';
            overlays[i].style.opacity = '0';
        }
        
        // Remove hash from URL on page load to prevent auto-opening popup
        if (window.location.hash === '#login' || window.location.hash === '#register') {
            // Clear hash but keep the scroll position
            var scrollPos = window.pageYOffset || document.documentElement.scrollTop;
            history.replaceState('', document.title, window.location.pathname + window.location.search);
            window.scrollTo(0, scrollPos);
        }
    })();

    // Function to ensure popups stay hidden
    function ensurePopupsHidden() {
        // Only hide if not explicitly opened by user click
        if (!$('html').data('popup-user-opened')) {
            $('html').removeClass('popup_visible');
            $('html').removeClass(function(index, className) {
                return (className.match(/(^|\s)popup_visible_\S+/g) || []).join(' ');
            });
            $('.popup_wrapper, #login_wrapper, #register_wrapper').each(function() {
                this.style.setProperty('display', 'none', 'important');
                this.style.setProperty('visibility', 'hidden', 'important');
                this.style.setProperty('opacity', '0', 'important');
            });
            $('.black_overlay, #fade').each(function() {
                this.style.setProperty('display', 'none', 'important');
                this.style.setProperty('visibility', 'hidden', 'important');
                this.style.setProperty('opacity', '0', 'important');
            });
        }
    }
    
    // Watch for any changes to popup visibility and prevent unwanted showing
    if (typeof MutationObserver !== 'undefined') {
        var popupObserver = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                    var target = mutation.target;
                    // If html gets popup_visible class but user didn't open it
                    if (target === document.documentElement && 
                        target.classList.contains('popup_visible') && 
                        !$('html').data('popup-user-opened')) {
                        // Small delay to allow legitimate opens, then hide if not user-initiated
                        setTimeout(function() {
                            if (!$('html').data('popup-user-opened')) {
                                ensurePopupsHidden();
                            }
                        }, 50);
                    }
                }
            });
        });
        
        // Observe html element for class changes
        if (document.documentElement) {
            popupObserver.observe(document.documentElement, {
                attributes: true,
                attributeFilter: ['class']
            });
        }
    }

    $(document).ready(function() {

        /// remove ck editor notification..
        // $('.cke_notification').remove();
        
        // Ensure html doesn't have popup_visible class on page load
        $('html').removeClass('popup_visible');
        $('html').removeClass(function(index, className) {
            return (className.match(/(^|\s)popup_visible_\S+/g) || []).join(' ');
        });
        $('html').data('popup-user-opened', false);
        
        // Keep page-loading class until page is fully ready
        $('body').addClass('page-loading');
        
        // Initialize the plugin only if it exists and elements are found
        if (typeof $.fn.popup !== 'undefined' && $('.my-popup').length > 0) {
            $('.my-popup').popup({
                transition: 'all 0.3s',
                autoopen: false  // Explicitly disable auto-open
            });
        }
        
        // Ensure popups stay hidden after initialization
        setTimeout(ensurePopupsHidden, 50);
        setTimeout(ensurePopupsHidden, 200);
        setTimeout(ensurePopupsHidden, 500);
        
        // Hide page loader when everything is ready
        $(window).on('load', function() {
            setTimeout(function() {
                $('#page-loader').addClass('hidden');
                setTimeout(function() {
                    $('#page-loader').remove();
                    $('body').removeClass('page-loading');
                }, 500);
            }, 300);
        });
        
        // Fallback: Hide loader after maximum wait
        setTimeout(function() {
            $('#page-loader').addClass('hidden');
            setTimeout(function() {
                $('#page-loader').remove();
                $('body').removeClass('page-loading');
            }, 500);
        }, 3000);
    });
    
    // Monitor scroll events to ensure popups don't show during scroll
    var scrollCheckTimeout;
    $(window).on('scroll', function() {
        clearTimeout(scrollCheckTimeout);
        scrollCheckTimeout = setTimeout(function() {
            if (!$('html').data('popup-user-opened')) {
                ensurePopupsHidden();
            }
        }, 50);
    });
    
    // Continuous monitoring to prevent popup from showing
    var popupCheckInterval = setInterval(function() {
        if (!$('html').data('popup-user-opened') && $('html').hasClass('popup_visible')) {
            ensurePopupsHidden();
        }
    }, 100);
    
    // Stop monitoring after 5 seconds (popup should be initialized by then)
    setTimeout(function() {
        clearInterval(popupCheckInterval);
    }, 5000);
    
    // Track when user explicitly opens popup via click
    $(document).on('click', '.login_open, .register_open', function() {
        $('html').data('popup-user-opened', true);
    });
    
    // Reset flag when popup is closed
    $(document).on('click', '.login_close, .register_close', function() {
        $('html').data('popup-user-opened', false);
        setTimeout(ensurePopupsHidden, 300);
    });

    $('body').on('change', 'form#registerForm input[name="sending_type"]', function() {
        // Update active class for OTP selection
        $('.selection-option.otp-option, .option.otp-option').removeClass('active');
        $(this).closest('.selection-option, .option').addClass('active');

        $('form#registerForm input[name="user_phone"]').css('border-color', '#cccccc');
        $('form#registerForm input[name="user_email"]').css('border-color', '#cccccc');

        if ($(this).val() == 'email') {

            $('.otp_div').empty().hide();
            $('.message_area').empty().hide();
            $('form#registerForm input[name="token_data"]').val('');

            $('form#registerForm input[name="user_email"]').show();
            $('form#registerForm input[name="user_phone"]').hide();


            $('form#registerForm input[name="user_email"]').val('');
            $('form#registerForm input[name="user_phone"]').val('');


        } else {

            $('.otp_div').empty().hide();
            $('form#registerForm input[name="token_data"]').val('');
            $('.message_area').empty().hide();

            $('form#registerForm input[name="user_phone"]').show();
            $('form#registerForm input[name="user_email"]').hide();

            $('form#registerForm input[name="user_phone"]').val('');
            $('form#registerForm input[name="user_email"]').val('');

        }
    });


    $('form#registerForm button#send_otp').on('click', function() {

        if ($('input[name="sending_type"]:checked').val() == 'email') {
            var EmailValue = $('form#registerForm input[name="user_email"]').val();

            if (!isEmail(EmailValue)) {
                /* do stuff here */
                $('form#registerForm input[name="user_email"]').css('border-color', 'red');
            } else {
                $('form#registerForm input[name="user_email"]').css('border-color', '#cccccc');

                if ($('input[name="otp"]').is(":visible")) {
                    if ($('input[name="otp"]').val() == '') {
                        $('form#registerForm input[name="otp"]').css('border-color', 'red');

                    } else {
                        $('form#registerForm input[name="otp"]').css('border-color', '#cccccc');

                        SendOtp('email', EmailValue);
                    }
                } else {
                    SendOtp('email', EmailValue);

                }
            }


        } else {
            var phone = $('form#registerForm input[name="user_phone"]').val();

            if (!isPhone(phone)) {

                $('form#registerForm input[name="user_phone"]').css('border-color', 'red');
            } else {
                $('form#registerForm input[name="user_phone"]').css('border-color', '#cccccc');

                if ($('input[name="otp"]').is(":visible")) {
                    if ($('input[name="otp"]').val() == '') {
                        $('form#registerForm input[name="otp"]').css('border-color', 'red');

                    } else {
                        $('form#registerForm input[name="otp"]').css('border-color', '#cccccc');

                        SendOtp('mobile', phone);
                    }
                } else {
                    SendOtp('mobile', phone);

                }

            }

        }

    });

    function isEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }

    function isPhone(phone) {

        var filter = /^\d*(?:\.\d{1,2})?$/;

        if (filter.test(phone)) {
            if (phone.length == 10) {
                return true;
            } else {

                return false;
            }
        } else {

            return false;
        }
    }


    function SendOtp(type, type_value) {
        $.LoadingOverlay('show');
        var link = '<?php echo base_url() ?>' + 'login_control/SendOtpData';
        $.ajax({
            data: {
                'type': type,
                'type_value': type_value,
                'user_type':$('form#registerForm input[name="user_type"]').val(),
                'otp': $('form#registerForm input[name="otp"]').val(),
                'token': $('form#registerForm input[name="token_data"]').val()
            },
            url: link,
            method: 'post',
            dataType: 'text', // Force text response to avoid auto-parsing
            success: function(response) {
                var Response = JSON.parse(response);

                if (Response.status) {
                    $('#send_otp').text('Submit OTP');
                    if (Response.type === 'otp_checked') {

                        $('.message_area').show().empty().append("<div class='alert alert-success'>OTP is matched. Please fill your details for registeration</div>");

                        $('form#registerForm input[name="token_data"]').hide();
                        $('.otp_div').hide().empty();
                        $('.other_fields').show();
                        if (type == 'mobile') {
                            $('form#registerForm input[name="user_phone"]').prop('readonly', true);

                        } else {
                            $('form#registerForm input[name="user_email"]').prop('readonly', true);

                        }
                        $('form#registerForm input[name="user_email"]').show();
                        $('form#registerForm input[name="user_phone"]').show();
                        $('form#registerForm input[name="sending_type"]').prop('disabled', true);
                        $('form#registerForm #send_otp').hide();


                        $('#send_otp').text('Final Submit');

                    } else {

                        $('.message_area').show().empty().append("<div class='alert alert-success'>OTP has been sent.</div>");

                        $('form#registerForm input[name="token_data"]').val(Response.data);
                        $('.otp_div').empty().show().append('<input type="number" name="otp" class="form-control" placeholder="Enter OTP" required="required">');

                    }

                } else {

                    if (Response.type == 'otp_not_checked') {
                        $('.message_area').show().empty().append("<div class='alert alert-danger'>OTP is not matched! Please try again after some time.</div>");

                    } else if (Response.type == 'otp_not_sent') {

                        $('.message_area').show().empty().append("<div class='alert alert-danger'>OTP is not sent! Please try again after some time.</div>");
                        $('.otp_div').hide().append('<input type="number" name="otp" class="form-control" placeholder="Enter OTP" required="required">');
                    } else if (Response.type == 'validation_error') {
                        $('.message_area').show().empty().append("<div class='alert alert-danger'>" + Response.message + "</div>");
                    }

                }
                $.LoadingOverlay('hide');

            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                $('.message_area').empty().append("<div class='alert alert-danger'>" + errorThrown + "</div>");
                $.LoadingOverlay('hide');
            }
        });

    }


    $('form#registerForm button#register_button').on('click', function() {
        if ($('form#registerForm input[name="otp"]').val() != undefined && $('input[name="otp"]').val() == '') {
            $('.message_area').empty();

            $('.message_area').append("<div class='alert alert-danger'>OTP is required.</div>");

        } else {

            $.LoadingOverlay('show');
            $('.message_area').empty();
            var link = '<?php echo base_url() ?>' + 'login_control/register_ajax';
            $.ajax({
                data: $('form#registerForm').serialize(),
                url: link,
                method: 'post',
                success: function(response) {
                    var Response = JSON.parse(response);
                    if (Response.status) 
                    {
                        if(Response.login_url)
                        {
                            $('.message_area').append(Response.message);

                            window.location.href = '<?php echo base_url() ?>' + Response.login_url;

                        } else {

                            alert(Response.message);

                            $('form#registerForm input,button').attr('disabled',true);

                            setTimeout( function(){ 
                                // Do something after 1 second 
                                window.location.href = '<?php echo base_url() ?>';
                            }  , 3000 );
                        }
                    }
                    $.LoadingOverlay('hide');

                },
                error: function(data) {
                    var Response = JSON.parse(data);
                    $('.message_area').append(Response);
                    $('form#registerForm')[0].reset();
                    $('form#registerForm button#register_button').text('Register');

                    $.LoadingOverlay('hide');

                }
            });
        }
    });


    $(document).ready(function() {
        $('.whatsapp').on("click", function(e) {
            if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                var article = $(this).attr("data-text");
                var weburl = $(this).attr("data-link");
                var whats_app_message = encodeURIComponent(document.URL);
                var whatsapp_url = "whatsapp://send?text=" + weburl;
                window.location.href = whatsapp_url;
            } else {
                alert('You Are Not On A Mobile Device. Please Use This Button To Share On Mobile');
            }
        });
    });

    // Hide Nav Bar
    function HideNav(id) {
        $("#nav" + id).hide(500);
        $("#plus" + id).show();
        $("#minus" + id).hide();
    }

    // Show Nav Bar
    function ShowNav(Id) {
        $("#nav" + Id).show(500);
        $("#plus" + Id).hide();
        $("#minus" + Id).show();
    }

    $('select[name="main_category"]').on('change', function() {
        $.LoadingOverlay('show');

        var category = $(this).val();
        var link = '<?php echo base_url() ?>' + 'admin_control/get_subcategories_ajax/' + category;
        $.ajax({
            data: category,
            url: link
        }).done(function(subcategories) {
            $.LoadingOverlay('hide');

            console.log(subcategories);
            if (subcategories) {
                $('select[name="sub_category"]').empty().html(subcategories);
            } else {

                $('select[name="sub_category"]').empty().html('<option value="">No sub categories found</option>');
            }
        });
    });

    $('select[name="sub_category"]').change(function() {
        $.LoadingOverlay('show');

        var sub_category = $(this).val();
        var link = '<?php echo base_url() ?>' + 'admin_control/get_sub_subcategories_ajax/' + sub_category;
        $.ajax({
            data: sub_category,
            url: link
        }).done(function(subcategories) {
            $.LoadingOverlay('hide');

            console.log(subcategories);
            $('#sub_sub_category').html(subcategories);
        });
    });

    $(document).ready(function() {

       
        });
</script>

<?php if($this->session->userdata('type') != 'andriod') { 
    // Get system settings from session (with fallback to database)
    $brand_name = $this->session->userdata('brand_name');
    $brand_tagline = $this->session->userdata('brand_tagline');
    $facbook_url = $this->session->userdata('fb_url');
    $you_tube_url = $this->session->userdata('youtube_url');
    $twitter_url = $this->session->userdata('twtr_url');
    $linkedin_url = $this->session->userdata('linkedin_url');
    $googleplus_url = $this->session->userdata('googlep_url');
    $support_email = $this->session->userdata('support_email');
    $support_phone = $this->session->userdata('support_phone');
    $address = $this->session->userdata('address');
    
    // Fallback: Query database directly if session data is not available
    if (!$brand_name) {
        $CI =& get_instance();
        $CI->load->model('system_model');
        if (isset($CI->system_model) && method_exists($CI->system_model, 'get_system_info')) {
            $sys_info = $CI->system_model->get_system_info();
            if ($sys_info) {
                $brand_name = $sys_info->brand_name ?? 'Digital Shiksha';
                $brand_tagline = $sys_info->brand_tagline ?? '';
                $facbook_url = $sys_info->facbook_url ?? '';
                $you_tube_url = $sys_info->you_tube_url ?? '';
                $twitter_url = $sys_info->twitter_url ?? '';
                $linkedin_url = $sys_info->linkedin_url ?? '';
                $googleplus_url = $sys_info->googleplus_url ?? '';
                $support_email = $sys_info->support_email ?? '';
                $support_phone = $sys_info->support_phone ?? '';
                $address = $sys_info->address ?? '';
            } else {
                $brand_name = 'Digital Shiksha';
            }
        } else {
            $brand_name = 'Digital Shiksha';
        }
    }
?>
<link href="<?php echo base_url('assets/css/footer-enhanced.css') ?>" rel="stylesheet" media="screen">
<footer id="footer">
    <div class="container">
        <div class="row footer-content">
            <!-- Brand/About Section -->
            <div class="col-md-3 col-sm-6 col-xs-12 footer-section">
                <div class="footer-brand">
                    <h3><?= htmlspecialchars($brand_name) ?></h3>
                    <?php if ($brand_tagline): ?>
                        <p><?= htmlspecialchars($brand_tagline) ?></p>
                    <?php else: ?>
                        <p>Your trusted platform for online learning, mock tests, and study materials. Empowering students to excel in their academic journey.</p>
                    <?php endif; ?>
                    
                    <div class="footer-social">
                        <h5>Follow Us</h5>
                        <div class="social-icons">
                            <?php if ($facbook_url): ?>
                                <a href="<?= htmlspecialchars($facbook_url) ?>" target="_blank" rel="noopener noreferrer" title="Facebook" class="fa fa-facebook"></a>
                            <?php endif; ?>
                            <?php if ($you_tube_url): ?>
                                <a href="<?= htmlspecialchars($you_tube_url) ?>" target="_blank" rel="noopener noreferrer" title="YouTube" class="fa fa-youtube"></a>
                            <?php endif; ?>
                            <?php if ($twitter_url): ?>
                                <a href="<?= htmlspecialchars($twitter_url) ?>" target="_blank" rel="noopener noreferrer" title="Twitter" class="fa fa-twitter"></a>
                            <?php endif; ?>
                            <?php if ($linkedin_url): ?>
                                <a href="<?= htmlspecialchars($linkedin_url) ?>" target="_blank" rel="noopener noreferrer" title="LinkedIn" class="fa fa-linkedin"></a>
                            <?php endif; ?>
                            <?php if ($googleplus_url): ?>
                                <a href="<?= htmlspecialchars($googleplus_url) ?>" target="_blank" rel="noopener noreferrer" title="Tutorial Video" class="fa fa-video-camera"></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Quick Links Section -->
            <div class="col-md-3 col-sm-6 col-xs-12 footer-section">
                <h4>Quick Links</h4>
                <ul>
                    <li class="<?= ($this->uri->segment(1) == '' || $this->uri->segment(1) == false) ? 'active' : ''; ?>"><a href="<?= base_url('/') ?>"><i class="fa fa-home"></i> Home</a></li>
                    <li class="<?= ($this->uri->segment(1) == 'about-us') ? 'active' : ''; ?>"><a href="<?= base_url('about-us') ?>"><i class="fa fa-building"></i> About Us</a></li>
                    <li class="<?= ($this->uri->segment(1) == 'contact-us') ? 'active' : ''; ?>"><a href="<?= base_url('contact-us') ?>"><i class="fa fa-envelope"></i> Contact Us</a></li>
                    <li class="<?= ($this->uri->segment(1) == 'faq') ? 'active' : ''; ?>"><a href="<?= base_url('faq') ?>"><i class="fa fa-question-circle"></i> FAQ</a></li>
                </ul>
            </div>
            
            <!-- Resources Section -->
            <div class="col-md-3 col-sm-6 col-xs-12 footer-section">
                <h4>Resources</h4>
                <ul>
                    <li class="<?= ($this->uri->segment(1) == 'mock-test') ? 'active' : ''; ?>"><a href="<?= base_url('mock-test') ?>"><i class="fa fa-file-text-o"></i> Mock Test</a></li>
                    <li class="<?= ($this->uri->segment(1) == 'study-material') ? 'active' : ''; ?>"><a href="<?= base_url('study-material') ?>"><i class="fa fa-book"></i> Study Material</a></li>
                    <li class="<?= ($this->uri->segment(1) == 'digital-shiksha-search-engine') ? 'active' : ''; ?>"><a href="<?= base_url('digital-shiksha-search-engine') ?>"><i class="fa fa-newspaper-o"></i> Blog</a></li>
                    <li class="<?= ($this->uri->segment(1) == 'privacy-policy') ? 'active' : ''; ?>"><a href="<?= base_url('privacy-policy') ?>"><i class="fa fa-shield"></i> Privacy Policy</a></li>
                    <li class="<?= ($this->uri->segment(1) == 'terms-and-condition') ? 'active' : ''; ?>"><a href="<?= base_url('terms-and-condition') ?>"><i class="fa fa-file-text"></i> Terms & Conditions</a></li>
                    <li class="<?= ($this->uri->segment(1) == 'disclaimer') ? 'active' : ''; ?>"><a href="<?= base_url('disclaimer') ?>"><i class="fa fa-info-circle"></i> Disclaimer</a></li>
                </ul>
            </div>
            
            <!-- Useful Websites Section -->
            <div class="col-md-3 col-sm-6 col-xs-12 footer-section">
                <h4>Useful Websites</h4>
                <ul>
                    <li><a href="https://cbseacademic.nic.in/skill-education-books.html" target="_blank" rel="noopener noreferrer"><i class="fa fa-book"></i> CBSE Skill Books</a></li>
                    <li><a href="https://www.psscive.ac.in/publications/textbooks" target="_blank" rel="noopener noreferrer"><i class="fa fa-graduation-cap"></i> PSSCIVE Bhopal Books</a></li>
                    <li><a href="https://www.eduhelpdeskguru.com/p/list-of-all-educational-useful-video.html" target="_blank" rel="noopener noreferrer"><i class="fa fa-play-circle"></i> Skill Video Resources</a></li>
                    <li><a href="https://www.mindluster.com/" target="_blank" rel="noopener noreferrer"><i class="fa fa-laptop"></i> Online Free Courses</a></li>
                </ul>
            </div>
        </div>
        
        <!-- Contact Info Section - Separate Row -->
        <div class="row footer-contact-row">
            <div class="col-md-12 footer-section">
                <h4>Contact Info</h4>
                <div class="footer-contact-info">
                    <div class="row">
                        <?php if ($support_email): ?>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <p><i class="fa fa-envelope"></i> <a href="mailto:<?= htmlspecialchars($support_email) ?>"><?= htmlspecialchars($support_email) ?></a></p>
                            </div>
                        <?php endif; ?>
                        <?php if ($support_phone): ?>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <p><i class="fa fa-phone"></i> <a href="tel:<?= htmlspecialchars($support_phone) ?>"><?= htmlspecialchars($support_phone) ?></a></p>
                            </div>
                        <?php endif; ?>
                        <?php if ($address): ?>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <p><i class="fa fa-map-marker"></i> <?= htmlspecialchars($address) ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <p>Copyright &copy; <?= date('Y') ?> <a href="<?= base_url('/') ?>"><?= htmlspecialchars($brand_name) ?></a>. All rights reserved.</p>
        </div>
    </div>
</footer>
<?php } ?>