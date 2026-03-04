$(document).ready(function() {
 /*------------- SideBar ------------*/   
    // Hide all submenus
    $('.sidebar > li > ul').hide();
    
    //Open .active submenu
    $('.active').next().show();

    // Add (.current) to submenu  active link	
    $('.sidebar ul li a').click(function() {
        $(".sidebar ul li a").removeClass("current");
        $(this).addClass("current");
    });

    // Dropdown
    $(function() {

        var parent = $('.sidebar > li > a');
        var child = $('.sidebar > li > ul');

        // Click on any link in main menu
        parent.click(function(event) {
            // Check if has submenu
            var has_sub = $(this).hasClass('sub');
            
            if(has_sub) // If has submenu
                event.preventDefault(); //Deactivate the link

            if ($(this).hasClass('active')) {
                // If link is active
                $(this).removeClass('active');
                $(this).next().stop(true, true).slideUp(500);
            } else {
                //Close previously opened submenu dropdown
                parent.removeClass('active');
                child.filter(':visible').slideUp(500);

                //Open clicked current dropdown
                $(this).addClass('active').next().stop(true, true).slideDown(500);
            }
                
        });

    });

 /*------------ offcanvas ----------*/ 
  $('[data-toggle=offcanvas]').click(function() {
    $('.row-offcanvas').toggleClass('active');
  });
    
 /*------------ Remove visit button ----------*/ 
  $('#rev-link').click(function(){
      $('.vitis-url').hide();
  });  
    
 /*----- Toggle faqs -----------*/ 
  $('.open-faq').click(function(){
    var str = this.name;
    var id = str.slice(7); 
  //  alert(id);
    $('#collapse_'+id).addClass('in');
  });  
  
 /*----- Clickable Row Inbox-----------*/ 
    $(".clickableRow").click(function() {
       window.document.location = $(this).parent().attr("href");
      });

});

jQuery(function($) {

    $(function(){
        $('#main-slider.carousel').carousel({
            interval: 4000,
            pause: false
        });
    });

    //Ajax contact
    // var form = $('.contact-form');
    // form.submit(function () {
    //     alert($(this).attr('action'));
    //     $this = $(this);
    //     $.post($(this).attr('action'), function(data) {
    //         $this.prev().text(data.message).fadeIn().delay(3000).fadeOut();
    //     },'json');
    //     return false;
    // });

    //smooth scroll
    $('.navbar-nav > li').click(function(event) {
        // event.preventDefault();
        var target = $(this).find('>a').prop('hash');
        if (target && $(target).length > 0 && $(target).offset()) {
            $('html, body').animate({
                scrollTop: $(target).offset().top
            }, 500);
        }
    });

    //scrollspy
    $('[data-spy="scroll"]').each(function () {
        var $spy = $(this).scrollspy('refresh')
    })

});


// <!------------- Delete Confirmation ---------------> 

    function delete_confirmation() {
        return confirm('Do you really want to delete the data?');
    }
  

$('#user_phone').bind("keyup blur",function(){
      $(this).val( $(this).val().replace(/[^\d]/g,'') )  

    });

    // update Radio button through clicking (new and legacy structure)
    $('body').on('click', '.user-tab.signinform, .selection-option.signinform, .option.signinform', function(){
        var registerVal = $(this).data('radio');
        var $container = $(this).closest('.user-type-selection, .selection-options, .options');
        if (!$container.length) {
            $container = $(this).parent();
        }

        if (typeof registerVal !== 'undefined') {
            $container.find('input[name="user_type"][value="' + registerVal + '"]').prop('checked', true);
        }

        // Update active class only in the current register selector group
        $container.find('.user-tab.signinform, .selection-option.signinform, .option.signinform').removeClass('active');
        $(this).addClass('active');
    });

    // Login form: Teacher/Student user type selection
    $('body').on('click', '.login-type-tab', function(){
        var roleVal = $(this).data('radio');
        var $group = $(this).closest('.login-user-type');

        if (!$group.length) {
            $group = $(this).parent();
        }

        $group.find('input[name="user_role"][value="' + roleVal + '"]').prop('checked', true);
        $group.find('.login-type-tab').removeClass('active');
        $(this).addClass('active');
    });
    
    // Function to update input field icons and visibility based on OTP selection
    function updateInputIcons() {
        var $registerForm = $('form#registerForm');
        if (!$registerForm.length) {
            return;
        }

        var sendingType = $registerForm.find('input[name="sending_type"]:checked').val();
        var phoneIcon = $registerForm.find('#otp_input_icon');
        var emailIcon = $registerForm.find('#email_input_icon');
        var $phoneInput = $registerForm.find('input[name="user_phone"]');
        var $emailInput = $registerForm.find('input[name="user_email"]');
        var phoneInputDiv = $phoneInput.closest('div[style*="position: relative"]');
        var emailInputDiv = $emailInput.closest('div[style*="position: relative"]');
        
        // Remove all possible icon classes first
        var allIconClasses = 'fa-phone fa-phone-square fa-envelope fa-envelope-o fa-mobile';
        
        if (sendingType === 'mobile') {
            // Mobile selected: show only phone field with phone icon
            if (phoneIcon.length) {
                phoneIcon.removeClass(allIconClasses).addClass('fa-phone');
            }
            if (emailIcon.length) {
                emailIcon.removeClass(allIconClasses).addClass('fa-envelope');
            }
            // Show phone field, hide email field
            if (phoneInputDiv.length) {
                phoneInputDiv.show();
                $phoneInput.prop('required', true);
                $phoneInput.val(''); // Clear stale value
            }
            if (emailInputDiv.length) {
                emailInputDiv.hide();
                $emailInput.prop('required', false);
                $emailInput.val(''); // Clear stale value
            }
        } else if (sendingType === 'email') {
            // Email selected: show only email field with email icon
            if (phoneIcon.length) {
                phoneIcon.removeClass(allIconClasses).addClass('fa-phone');
            }
            if (emailIcon.length) {
                emailIcon.removeClass(allIconClasses).addClass('fa-envelope');
            }
            // Show email field, hide phone field
            if (phoneInputDiv.length) {
                phoneInputDiv.hide();
                $phoneInput.prop('required', false);
                $phoneInput.val(''); // Clear stale value
            }
            if (emailInputDiv.length) {
                emailInputDiv.show();
                $emailInput.prop('required', true);
                $emailInput.val(''); // Clear stale value
            }
        }
    }
    
    // Update active class for OTP selection and change input field icons
    $('body').on('change', 'form#registerForm input[name="sending_type"]', function() {
        $('.selection-option.otp-option, .option.otp-option').removeClass('active');
        $(this).closest('.selection-option, .option').addClass('active');
        updateInputIcons();
    });
    
    // Update icons on click for OTP selection options
    $('body').on('click', '.selection-option.otp-option, .option.otp-option', function(e) {
        var radio = $(this).find('input[type="radio"][name="sending_type"]');
        if (radio.length && !radio.prop('checked')) {
            radio.prop('checked', true).trigger('change');
        }
    });
    
    // Initialize active states and icons on page load
    $(document).ready(function() {
        // Set initial active states per group to avoid cross-form mismatches.
        $('.user-type-selection').each(function() {
            var $checkedUserType = $(this).find('input[name="user_type"]:checked');
            if ($checkedUserType.length) {
                $(this).find('.user-tab.signinform, .selection-option.signinform, .option.signinform').removeClass('active');
                $checkedUserType.closest('.user-tab, .selection-option, .option').addClass('active');
            }
        });

        $('.login-user-type').each(function() {
            var $checkedRole = $(this).find('input[name="user_role"]:checked');
            if ($checkedRole.length) {
                $(this).find('.login-type-tab').removeClass('active');
                $checkedRole.closest('.login-type-tab').addClass('active');
            }
        });

        $('input[name="sending_type"]:checked').closest('.selection-option, .option').addClass('active');
        
        // Update input fields visibility based on initial selection
        updateInputIcons();
    });
    
    // Re-initialize when popup overlay shows (using MutationObserver as fallback)
    if (typeof MutationObserver !== 'undefined') {
        var observer = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                if (mutation.type === 'attributes' && mutation.attributeName === 'style') {
                    var target = $(mutation.target);
                    if (target.is('#register') && target.is(':visible')) {
                        setTimeout(updateInputIcons, 50);
                    }
                }
            });
        });
        
        $(document).ready(function() {
            var registerEl = document.getElementById('register');
            if (registerEl) {
                observer.observe(registerEl, { attributes: true, attributeFilter: ['style'] });
            }
        });
    }
