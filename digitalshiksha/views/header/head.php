<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,400,300,600,700' rel='stylesheet' type='text/css'>
<!-- Bootstrap core CSS -->
<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.css') ?>" rel="stylesheet" media="screen">

<!-- Font Awesome -->
<link href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" media="screen">

<!-- Custom CSS  -->
<link href="<?php echo base_url('assets/css/front.css') ?>" rel="stylesheet" media="screen">
<link href="<?php echo base_url('assets/css/responsivenew.css') ?>" rel="stylesheet" media="screen">
<link href="<?php echo base_url('assets/css/header-nav.css') ?>" rel="stylesheet" media="screen">
<link href="<?php echo base_url('assets/css/header-improved.css') ?>" rel="stylesheet" media="screen">
<link href="<?php echo base_url('assets/css/dropdown-fix.css') ?>" rel="stylesheet" media="screen">
<link href="<?php echo base_url('assets/css/dropdown-force-visible.css') ?>" rel="stylesheet" media="screen">
<link href="<?php echo base_url('assets/css/navbar-force-visible.css') ?>" rel="stylesheet" media="screen">
<link href="<?php echo base_url('assets/css/slider-buttons-fix.css') ?>" rel="stylesheet" media="screen">
<link href="<?php echo base_url('assets/css/modals-popup.css') ?>" rel="stylesheet" media="screen">
<link href="<?php echo base_url('assets/css/home-sections-enhanced.css') ?>" rel="stylesheet" media="screen">
<!-- Critical: Hide popups immediately on page load to prevent flash -->
<style>
    /* Page Loader Styles */
    #page-loader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
        z-index: 99999;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: opacity 0.5s ease, visibility 0.5s ease;
    }
    
    #page-loader.hidden {
        opacity: 0;
        visibility: hidden;
        pointer-events: none;
    }
    
    .loader-content {
        text-align: center;
        color: #ffffff;
    }
    
    .loader-logo-container {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: nowrap;
        gap: 15px;
        margin-bottom: 20px;
        animation: fadeInScale 0.6s ease-out;
    }
    
    .loader-logo {
        width: 50px;
        height: 50px;
        object-fit: contain;
        display: block;
    }
    
    .loader-brand-name {
        font-size: 24px;
        font-weight: 700;
        color: #F1B900;
        margin: 0;
        line-height: 1.2;
        white-space: nowrap;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    @media (max-width: 767px) {
        .loader-content {
            width: 100%;
            padding: 0 12px;
        }

        .loader-logo-container {
            gap: 10px;
        }

        .loader-logo {
            width: 38px;
            height: 38px;
            flex: 0 0 38px;
        }

        .loader-brand-name {
            font-size: 18px;
            letter-spacing: 0.8px;
            max-width: calc(100vw - 80px);
            overflow: hidden;
            text-overflow: ellipsis;
        }
    }
    
    .loader-spinner-container {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        margin-top: 15px;
        animation: fadeIn 1s ease-out;
    }
    
    .loader-spinner {
        width: 30px;
        height: 30px;
        border: 3px solid rgba(241, 185, 0, 0.2);
        border-top-color: #F1B900;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }
    
    .loader-text {
        font-size: 14px;
        font-weight: 500;
        color: rgba(255, 255, 255, 0.9);
        margin: 0;
    }
    
    @keyframes spin {
        to { transform: rotate(360deg); }
    }
    
    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
    
    @keyframes fadeInScale {
        from {
            opacity: 0;
            transform: scale(0.8);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    /* Hide popups immediately - highest priority */
    .popup_wrapper,
    #login_wrapper,
    #register_wrapper,
    .black_overlay,
    #fade {
        display: none !important;
        visibility: hidden !important;
        opacity: 0 !important;
        pointer-events: none !important;
    }
    
    /* Keep popups hidden while loader is active */
    body.page-loading .popup_wrapper,
    body.page-loading #login_wrapper,
    body.page-loading #register_wrapper,
    body.page-loading .black_overlay,
    body.page-loading #fade {
        display: none !important;
        visibility: hidden !important;
        opacity: 0 !important;
        pointer-events: none !important;
    }
    
    html.popup_visible:not(.page-loading) .popup_wrapper,
    html.popup_visible:not(.page-loading) #login_wrapper,
    html.popup_visible:not(.page-loading) #register_wrapper {
        display: block !important;
        visibility: visible !important;
        opacity: 1 !important;
        pointer-events: auto !important;
    }
</style>
<script>
    // Page Loader and Popup Prevention - runs before DOM is ready
    (function() {
        // Add page-loading class to body immediately
        if (document.body) {
            document.body.classList.add('page-loading');
        } else {
            // If body doesn't exist yet, wait for it
            if (document.addEventListener) {
                document.addEventListener('DOMContentLoaded', function() {
                    document.body.classList.add('page-loading');
                }, false);
            }
        }
        
        // Get logo path and brand name
        var logoPath = '<?php echo base_url("assets/images/logo-new.png"); ?>';
        var brandName = '<?php echo (isset($brand_name) && !empty($brand_name)) ? htmlspecialchars($brand_name, ENT_QUOTES, "UTF-8") : "Digital Shiksha"; ?>';
        
        // Fallback: Try to get brand name from page title if PHP variable not available
        if (!brandName || brandName === '') {
            try {
                var pageTitle = document.title;
                if (pageTitle && pageTitle.indexOf(' - ') > -1) {
                    brandName = pageTitle.split(' - ')[0];
                } else {
                    brandName = 'Digital Shiksha';
                }
            } catch(e) {
                brandName = 'Digital Shiksha';
            }
        }
        
        // Create page loader HTML with logo and brand name side by side
        var loaderHTML = '<div id="page-loader">' +
            '<div class="loader-content">' +
            '<div class="loader-logo-container">' +
            '<img src="' + logoPath + '" alt="Logo" class="loader-logo" onerror="this.style.display=\'none\'">' +
            '<div class="loader-brand-name">' + brandName + '</div>' +
            '</div>' +
            '<div class="loader-spinner-container">' +
            '<div class="loader-spinner"></div>' +
            '<div class="loader-text">Loading...</div>' +
            '</div>' +
            '</div>' +
            '</div>';
        
        if (document.body) {
            document.body.insertAdjacentHTML('afterbegin', loaderHTML);
        } else {
            // Insert into document if body doesn't exist
            document.write(loaderHTML);
        }
        
        // Remove popup_visible class from html immediately
        if (document.documentElement) {
            document.documentElement.classList.remove('popup_visible');
            var classes = document.documentElement.className.split(' ');
            for (var i = 0; i < classes.length; i++) {
                if (classes[i].indexOf('popup_visible_') === 0) {
                    document.documentElement.classList.remove(classes[i]);
                }
            }
        }
        
        // Function to hide all popups
        function hideAllPopups() {
            var popupWrappers = document.querySelectorAll('.popup_wrapper, #login_wrapper, #register_wrapper');
            var overlays = document.querySelectorAll('.black_overlay, #fade');
            
            for (var i = 0; i < popupWrappers.length; i++) {
                popupWrappers[i].style.setProperty('display', 'none', 'important');
                popupWrappers[i].style.setProperty('visibility', 'hidden', 'important');
                popupWrappers[i].style.setProperty('opacity', '0', 'important');
            }
            
            for (var i = 0; i < overlays.length; i++) {
                overlays[i].style.setProperty('display', 'none', 'important');
                overlays[i].style.setProperty('visibility', 'hidden', 'important');
                overlays[i].style.setProperty('opacity', '0', 'important');
            }
        }
        
        // Function to hide page loader
        function hidePageLoader() {
            var loader = document.getElementById('page-loader');
            if (loader) {
                loader.classList.add('hidden');
                setTimeout(function() {
                    if (loader && loader.parentNode) {
                        loader.parentNode.removeChild(loader);
                    }
                }, 500);
            }
            if (document.body) {
                document.body.classList.remove('page-loading');
            }
        }
        
        // Hide popups immediately
        hideAllPopups();
        
        // Hide popups on DOMContentLoaded
        if (document.addEventListener) {
            document.addEventListener('DOMContentLoaded', function() {
                hideAllPopups();
                if (document.body) {
                    document.body.classList.add('page-loading');
                }
            }, false);
        }
        
        // Hide loader and popups when page is fully loaded
        if (window.addEventListener) {
            window.addEventListener('load', function() {
                // Wait a bit to ensure everything is loaded
                setTimeout(function() {
                    hideAllPopups();
                    hidePageLoader();
                }, 300);
            }, false);
        }
        
        // Fallback: Hide loader after maximum wait time
        setTimeout(function() {
            hidePageLoader();
        }, 5000);
        
        // Remove hash from URL
        if (window.location.hash === '#login' || window.location.hash === '#register') {
            var scrollPos = window.pageYOffset || document.documentElement.scrollTop;
            history.replaceState('', document.title, window.location.pathname + window.location.search);
            if (window.scrollTo) {
                window.scrollTo(0, scrollPos);
            }
        }
    })();
</script>
<!-- Dynamic Theme CSS - Loaded from system settings -->
<?php 
$this->load->helper('theme');
// Generate inline CSS with cache-busting timestamp
echo theme_inline_css();
?>
<!-- Global Dynamic Theme Overrides - Applies to all frontend pages -->
<link href="<?php echo base_url('assets/css/frontend-dynamic-theme.css') ?>" rel="stylesheet" media="screen">

<?php if (isset($mock)) {

	$Description =  "Quiz Master : " . $mock->created_byy . ', Total Questions : ' . $mock->random_ques_no;

?>


	<meta property="og:title" content="<?= $mock->title_name; ?>">
	<meta property="og:site_name" content="Digital Shiksha Darpan">
	<meta property="og:url" content="<?php echo base_url('exam_control/view_exam_summery') . '/' . $mock->title_id; ?>">
	<meta property="og:description" content="<?= $Description; ?>">
	<meta property="og:image:secure_url" content="<?php echo base_url('assets/images/logo.png') ?>">
<?php } ?>


<?php if (isset($post)) { ?>

	<meta property="og:title" content="<?= $post->blog_title; ?>">
	<meta property="og:site_name" content="Digital Shiksha Darpan">
	<meta property="og:url" content="<?php echo base_url('blog/post') . '/' . $post->blog_id; ?>">
	<meta property="og:description" content="<?= $post->blog_short_body; ?>">
	<meta property="og:image:secure_url" content="<?php echo base_url('assets/images/logo.png') ?>">
<?php } ?>


<style>
	span {
		word-break: normal !important;
	}
	
	/* Alert Styles - Apply globally */
	.login-alert.alert-danger,
	.alert-danger {
		color: #ab2320;
		/* background-color: #f2dede; */
		/* border-color: #ebccd1; */
	}
	
	.login-alert.alert-dismissable,
	.alert-dismissable,
	.alert-dismissible {
		padding-right: 10px;
		position: relative;
	}
	
	.login-alert.alert-dismissable .close,
	.alert-dismissable .close,
	.alert-dismissible .close {
		position: absolute;
		top: 0;
		right: 0;
		padding: 10px 15px;
		color: inherit;
		opacity: 0.5;
		font-size: 20px;
		font-weight: bold;
		line-height: 20px;
		cursor: pointer;
		border: none;
		background: transparent;
		text-decoration: none;
	}
	
	.login-alert.alert-dismissable .close:hover,
	.alert-dismissable .close:hover,
	.alert-dismissible .close:hover,
	.login-alert.alert-dismissable .close:focus,
	.alert-dismissable .close:focus,
	.alert-dismissible .close:focus {
		opacity: 1;
		text-decoration: none;
	}
	
	.login-alert.alert-dismissable .close span,
	.alert-dismissable .close span,
	.alert-dismissible .close span {
		font-size: 20px;
		line-height: 20px;
	}
	
	.login-alert.alert,
	.alert {
		/* padding: 15px; */
		/* margin-bottom: 20px; */
		border: 1px solid transparent;
		border-radius: 4px;
	}
</style>

<?php if ($this->session->userdata('type') === 'andriod'): ?>
<style>
	/* Android in-app view: shrink header and adjust first slider on mobile */
	@media (max-width: 991px) {
		body.android-type #header {
			height: 0px !important;
			min-height: 10px !important;
			border-bottom:none;
		}

		body.android-type #navbar {
			min-height: 10px !important;
		}

		body.android-type #main-slider:first-of-type {
			margin-top: 0px !important;
		}
		
		body.android-type #breaking-news-section:first-of-type {
		    		            margin-top: 2px !important;

		}
		
		body.android-type #mock-tests .section-title.text-center {
		    		    		            margin-top: 2px !important;
		}
		
		body.android-type #breaking-news-section {
		            margin-top: 2px !important;
		}
		body.android-type  .container div {
    margin-top: 0px;
}

body.android-type #blog {
    		            margin-top: 2px !important;

}

body.android-type #study-materials {
        		            margin-top: 2px !important;

}
	body.android-type {
			padding-top: 0px !important;
		}
		
	body.android-type #study-materials {
	        padding: 0px 0 !important;
	}
	}
</style>
<?php endif; ?>

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="<?php echo base_url('assets/js/jquery-2.0.3.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/loadingoverlay.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.popupoverlay.js') ?>"></script>
<!-- Dynamic Theme Color Replacer - Replaces hardcoded colors with CSS variables -->
<script src="<?php echo base_url('assets/js/dynamic-theme-replacer.js') ?>"></script>
<!-- <script src="<?php echo base_url('assets/js/video.js') ?>"></script> -->

<!-- Alert Dismiss Functionality -->
<script>
$(document).ready(function() {
    // Add close button to alerts without one
    $('.login-alert.alert-danger, .alert-danger').each(function() {
        if (!$(this).find('.close').length) {
            $(this).addClass('alert-dismissable').prepend('<button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
        }
    });
    
    // Handle close button click for all alerts
    $(document).on('click', '.login-alert .close, .alert-dismissable .close, .alert-dismissible .close', function(e) {
        e.preventDefault();
        $(this).closest('.login-alert, .alert').fadeOut(300, function() {
            $(this).remove();
        });
    });
    
    // Bootstrap data-dismiss support
    $(document).on('click', '[data-dismiss="alert"]', function(e) {
        e.preventDefault();
        $(this).closest('.login-alert, .alert').fadeOut(300, function() {
            $(this).remove();
        });
    });
});
</script>
