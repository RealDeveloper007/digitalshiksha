<?php if (!isset($no_contact_form)) { ?>
    <!--Contact Form-->
    
    <?php 
    
   
    if($this->session->userdata('type') != 'andriod') { ?>
    
        <?= $this->load->view('contact_form.php'); ?>
        
        <footer id="footer">
            <div class="container">
                <div class="row">
                    <!--<div class="col-md-3">-->
                    <!--    <script type="text/javascript" src="https://free-hit-counters.net/count/84sq"></script><br>-->
                    <!--    <script type='text/javascript' src='https://www.whomania.com/ctr?id=3ea07c4b90628e7c0c549b91a58696a5f7515fd3'></script>-->
                    <!--</div>-->
                    <div class="col-md-12 text-center">
                        <ul class="list-inline list-unstyled">
                            <li> <a href="<?= base_url('about-us') ?>"> About us</a></li>
                            <li> <a href="<?= base_url('disclaimer') ?>">Disclaimer</a></li>
                            <li> <a href="<?= base_url('privacy-policy') ?>">Privacy Policy</a></li>
                            <li> <a href="<?= base_url('terms-and-condition') ?>">Terms & Condition</a></li>
                            <li> <a href="<?= base_url('faq') ?>">FAQ</a></li>
                        </ul>
                        <p>@2020 Copyright Digital Shikshadarpan. All Rights Reserved</p>
        
                    </div>
        
                </div>
            </div>
        </footer>
        
    <?php  } ?>
    
<?php } ?>



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

        /// remove ck editor notification..
        $('.cke_notification').remove();

        let frameElement = document.getElementById("myiFrame");
        let doc = frameElement.contentDocument;
        doc.body.innerHTML = doc.body.innerHTML + '<style>.bar {width:45%;}</style>';
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

    $(document).ready(function() {

        /// remove ck editor notification..
        $('.cke_notification').remove();
        
        // Initialize the plugin
        $('.my-popup').popup({
            transition: 'all 0.3s'
        });
    });

    $('body').on('change', 'form#registerForm input[name="sending_type"]', function() {

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
</script>