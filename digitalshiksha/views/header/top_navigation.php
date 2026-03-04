    <header id="header" role="banner">
        <div id="navbar" class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?= base_url(); ?><?= ($this->session->userdata('log')) ? 'dashboard/' . $this->session->userdata('user_id') : '' ?>">
                        <img src="<?= base_url('assets/images/favicon.png') ?>" alt="Logo" class="brand-icon">
                        <span class="site-name"><?= ($brand_name) ? $brand_name : 'Digital Shiksha' ?></span>
                    </a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="<?= ($this->uri->segment(1) == '') ? 'active' : ''; ?>"><a href="<?= base_url('/'); ?>"><i class="fa fa-home"></i> Home</a></li>
                        <li class="<?= (in_array($this->uri->segment(1), ['mock-test', 'mock-test-details'])) ? 'active' : ''; ?>"><a href="<?= base_url('mock-test'); ?>"><i class="fa fa-file-text-o"></i> Mock Test</a></li>
                        <li class="<?= ($this->uri->segment(1) == 'study-material') ? 'active' : ''; ?>"><a href="<?= base_url('study-material'); ?>"><i class="fa fa-book"></i> Study Material</a></li>
                        <li class="<?= ($this->uri->segment(1) == 'digital-shiksha-search-engine') ? 'active' : ''; ?>"><a href="<?= base_url('digital-shiksha-search-engine'); ?>"><i class="fa fa-newspaper-o"></i> Digi Search</a></li>
                        <li class="<?= (in_array($this->uri->segment(1), ['about-us', 'contact-us', 'faq', 'privacy-policy', 'terms-and-condition', 'disclaimer'])) ? 'active' : ''; ?>">
                            <a href="#footer" class="scroll-to-footer">
                                <i class="fa fa-info-circle"></i> More
                            </a>
                        </li>

                        <?php if ($this->session->userdata('log')) : ?>
                            <!-- Logged In User Menu Dropdown -->
                            <?php 
                            $user_name = $this->session->userdata('user_name');
                            $display_name = $user_name ? $user_name : 'User';
                            $user_id = $this->session->userdata('user_id');
                            $user_photo = $this->session->userdata('user_photo');
                            $has_photo = FALSE;
                            $user_photo_url = '';
                            if (!empty($user_photo)) {
                                if (file_exists('./uploads/user-avatar/' . $user_photo)) {
                                    $has_photo = TRUE;
                                    $user_photo_url = base_url('uploads/user-avatar/' . $user_photo);
                                } elseif (file_exists('./user-avatar/' . $user_photo)) {
                                    $has_photo = TRUE;
                                    $user_photo_url = base_url('user-avatar/' . $user_photo);
                                }
                            }
                            
                            // Get initials: first letter of first word and first letter of second word if exists
                            $name_parts = explode(' ', trim($display_name));
                            if (count($name_parts) >= 2) {
                                $initials = strtoupper(substr($name_parts[0], 0, 1) . substr($name_parts[1], 0, 1));
                            } else {
                                $initials = strtoupper(substr($display_name, 0, 1));
                            }
                            ?>
                            <li class="dropdown user-menu-dropdown">
                                <a href="<?= base_url('dashboard/' . $user_id); ?>" class="user-avatar-link" title="Go to Profile">
                                    <div class="user-avatar-header">
                                        <?php if ($has_photo) : ?>
                                            <img src="<?= $user_photo_url ?>" alt="<?= htmlspecialchars($display_name) ?>" class="user-avatar-img">
                                        <?php else : ?>
                                            <span class="user-avatar-initials"><?= $initials ?></span>
                                        <?php endif; ?>
                                    </div>
                                </a>
                                <!-- <a href="#" class="dropdown-toggle user-menu-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <span class="caret"></span>
                                </a> -->
                                <ul class="dropdown-menu user-dropdown-menu" role="menu">
                                    <li class="user-dropdown-header">
                                        <div class="user-info-header">
                                            <div class="user-avatar-large">
                                                <?php if ($has_photo) : ?>
                                                    <img src="<?= $user_photo_url ?>" alt="<?= htmlspecialchars($display_name) ?>" class="user-avatar-img-large">
                                                <?php else : ?>
                                                    <span class="user-avatar-initials-large"><?= $initials ?></span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="user-details">
                                                <div class="user-name-large"><?= htmlspecialchars($display_name) ?></div>
                                                <div class="user-email-small"><?= htmlspecialchars($this->session->userdata('user_email') ? $this->session->userdata('user_email') : '') ?></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li class="<?= (strpos($this->uri->uri_string(), 'dashboard') !== false) ? 'active' : ''; ?>" role="presentation">
                                        <a href="<?= base_url('dashboard/' . $user_id); ?>" role="menuitem">
                                            <i class="fa fa-dashboard"></i> Dashboard
                                        </a>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li role="presentation">
                                        <a href="<?= base_url('logout'); ?>" role="menuitem" class="logout-link">
                                            <i class="fa fa-power-off"></i> Logout
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    
    <script>
        $(document).ready(function() {
            // Header scroll effect
            $(window).on('scroll', function() {
                if ($(window).scrollTop() > 50) {
                    $('#header').addClass('scrolled');
                } else {
                    $('#header').removeClass('scrolled');
                }
            });
            
            // Mobile menu toggle - Ensure it works properly
            // Let Bootstrap handle the collapse, but ensure CSS doesn't interfere
            $('.navbar-toggle').on('click', function(e) {
                if ($(window).width() < 992) {
                    // Don't prevent default - let Bootstrap handle it
                    // Just ensure the menu shows/hides correctly after Bootstrap processes
                    setTimeout(function() {
                        var $toggle = $('.navbar-toggle');
                        var $collapse = $('.navbar-collapse');
                        var isExpanded = $toggle.attr('aria-expanded') === 'true';
                        
                        if (isExpanded) {
                            // Menu should be open - Force show with BLOCK not FLEX
                            $collapse.addClass('in').removeClass('collapsing');
                            $collapse.css({
                                'display': 'block',
                                'height': 'auto',
                                'overflow': 'visible',
                                'visibility': 'visible',
                                'opacity': '1',
                                'flex': 'none',
                                'flex-grow': 'none',
                                'flex-direction': 'none',
                                'justify-content': 'none'
                            });
                            $toggle.removeClass('collapsed');
                        } else {
                            // Menu should be closed
                            $collapse.removeClass('in').removeClass('collapsing');
                            $collapse.css({
                                'display': 'none',
                                'height': '0',
                                'overflow': 'hidden'
                            });
                            $toggle.addClass('collapsed');
                        }
                    }, 50);
                }
            });
            
            // Sync button state with collapse state and force visibility
            $('.navbar-collapse').on('show.bs.collapse shown.bs.collapse', function() {
                if ($(window).width() < 992) {
                    var $collapse = $(this);
                    $('.navbar-toggle').removeClass('collapsed').attr('aria-expanded', 'true');
                    $collapse.addClass('in').removeClass('collapsing');
                    // Force show with inline styles - MUST USE BLOCK NOT FLEX
                    $collapse.css({
                        'display': 'block',
                        'height': 'auto',
                        'overflow': 'visible',
                        'visibility': 'visible',
                        'opacity': '1',
                        'flex': 'none',
                        'flex-grow': 'none',
                        'flex-direction': 'none',
                        'justify-content': 'none'
                    });
                }
            });
            
            $('.navbar-collapse').on('hide.bs.collapse hidden.bs.collapse', function() {
                if ($(window).width() < 992) {
                    var $collapse = $(this);
                    $('.navbar-toggle').addClass('collapsed').attr('aria-expanded', 'false');
                    $collapse.removeClass('in').removeClass('collapsing');
                    $collapse.css({
                        'display': 'none !important',
                        'height': '0 !important',
                        'overflow': 'hidden !important'
                    });
                }
            });
            
            // Continuous check on mobile to ensure menu is visible when it has .in class
            if ($(window).width() < 992) {
                setInterval(function() {
                    if ($(window).width() < 992) {
                        var $collapse = $('.navbar-collapse');
                        if ($collapse.hasClass('in')) {
                            // Force show if it has .in class - MUST USE BLOCK NOT FLEX
                            $collapse.css({
                                'display': 'block',
                                'height': 'auto',
                                'overflow': 'visible',
                                'visibility': 'visible',
                                'opacity': '1',
                                'flex': 'none',
                                'flex-grow': 'none',
                                'flex-direction': 'none',
                                'justify-content': 'none'
                            });
                            
                            // Ensure all menu items are visible
                            $collapse.find('.navbar-nav').css({
                                'display': 'block',
                                'visibility': 'visible',
                                'opacity': '1'
                            });
                            
                            // Ensure all list items are visible
                            $collapse.find('.navbar-nav > li').each(function() {
                                $(this).css({
                                    'display': 'block',
                                    'visibility': 'visible',
                                    'opacity': '1',
                                    'width': '100%'
                                });
                            });
                            
                            // Ensure all links are visible
                            $collapse.find('.navbar-nav > li > a').each(function() {
                                $(this).css({
                                    'display': 'block',
                                    'visibility': 'visible',
                                    'opacity': '1',
                                    'width': '100%'
                                });
                            });
                        }
                    }
                }, 100);
            }
            
            // Desktop hover functionality (only on desktop >= 992px)
            function setupDesktopHover() {
                if ($(window).width() >= 992) {
                    var hoverTimeout;
                    
                    // Remove existing handlers
                    $('.navbar-nav .dropdown').off('mouseenter.dropdownhover mouseleave.dropdownhover');
                    $('.navbar-nav .dropdown-menu').off('mouseenter.dropdownhover mouseleave.dropdownhover');
                    
                    // Hover on dropdown toggle - open dropdown
                    $('.navbar-nav .dropdown').on('mouseenter.dropdownhover', function() {
                        clearTimeout(hoverTimeout);
                        var $dropdown = $(this);
                        
                        // Close other dropdowns
                        $('.navbar-nav .dropdown').not($dropdown).removeClass('open');
                        
                        // Open this dropdown using Bootstrap's method
                        $dropdown.addClass('open');
                        $dropdown.find('.dropdown-toggle').attr('aria-expanded', 'true');
                        
                        // Force show menu and all items
                        forceShowDropdown($dropdown);
                    }).on('mouseleave.dropdownhover', function() {
                        var $dropdown = $(this);
                        hoverTimeout = setTimeout(function() {
                            if (!$dropdown.is(':hover') && !$dropdown.find('.dropdown-menu').is(':hover')) {
                                $dropdown.removeClass('open');
                                $dropdown.find('.dropdown-toggle').attr('aria-expanded', 'false');
                            }
                        }, 200);
                    });
                    
                    // Keep menu visible when hovering over dropdown menu
                    $('.navbar-nav .dropdown-menu').on('mouseenter.dropdownhover', function() {
                        clearTimeout(hoverTimeout);
                        var $dropdown = $(this).closest('.dropdown');
                        var $menu = $(this);
                        $dropdown.addClass('open');
                        $dropdown.find('.dropdown-toggle').attr('aria-expanded', 'true');
                        
                        // Force show menu and all items
                        forceShowDropdown($dropdown);
                    }).on('mouseleave.dropdownhover', function() {
                        var $dropdown = $(this).closest('.dropdown');
                        hoverTimeout = setTimeout(function() {
                            if (!$dropdown.is(':hover')) {
                                $dropdown.removeClass('open');
                                $dropdown.find('.dropdown-toggle').attr('aria-expanded', 'false');
                            }
                        }, 200);
                    });
                } else {
                    // Remove hover handlers on mobile
                    $('.navbar-nav .dropdown').off('mouseenter.dropdownhover mouseleave.dropdownhover');
                    $('.navbar-nav .dropdown-menu').off('mouseenter.dropdownhover mouseleave.dropdownhover');
                }
            }
            
            // Function to force show dropdown menu and all items - ULTIMATE FIX
            function forceShowDropdown($dropdown) {
                if (!$dropdown || !$dropdown.length) return;
                
                var $menu = $dropdown.find('.dropdown-menu');
                if ($menu.length) {
                    // Force show menu with inline styles (highest priority)
                    $menu[0].style.setProperty('display', 'block', 'important');
                    $menu[0].style.setProperty('opacity', '1', 'important');
                    $menu[0].style.setProperty('visibility', 'visible', 'important');
                    $menu[0].style.setProperty('transform', 'translateY(0)', 'important');
                    $menu[0].style.setProperty('pointer-events', 'auto', 'important');
                    $menu[0].style.setProperty('max-height', '1000px', 'important');
                    $menu[0].style.setProperty('height', 'auto', 'important');
                    $menu[0].style.setProperty('overflow', 'visible', 'important');
                    
                    // Force show all list items
                    $menu.find('li').each(function() {
                        this.style.setProperty('display', 'block', 'important');
                        this.style.setProperty('visibility', 'visible', 'important');
                        this.style.setProperty('opacity', '1', 'important');
                        this.style.setProperty('width', '100%', 'important');
                        this.style.setProperty('height', 'auto', 'important');
                        this.style.setProperty('overflow', 'visible', 'important');
                    });
                    
                    // Force show all links
                    $menu.find('li a').each(function() {
                        this.style.setProperty('display', 'flex', 'important');
                        this.style.setProperty('visibility', 'visible', 'important');
                        this.style.setProperty('opacity', '1', 'important');
                    });
                }
            }
            
            // Watch for Bootstrap dropdown events and ensure menu is visible
            $(document).on('shown.bs.dropdown', '.navbar-nav .dropdown', function() {
                var $dropdown = $(this);
                $dropdown.addClass('open');
                forceShowDropdown($dropdown);
            });
            
            // Also watch for click events - Ensure visibility after Bootstrap
            // Only apply force show on desktop, let Bootstrap handle mobile naturally
            $('.navbar-nav .dropdown-toggle').on('click', function(e) {
                var $dropdown = $(this).closest('.dropdown');
                
                // Only force show on desktop (>= 992px)
                if ($(window).width() >= 992) {
                    // Force show immediately
                    setTimeout(function() {
                        forceShowDropdown($dropdown);
                    }, 0);
                    
                    // Force show again after a short delay
                    setTimeout(function() {
                        forceShowDropdown($dropdown);
                    }, 50);
                    
                    // Force show after Bootstrap processes
                    setTimeout(function() {
                        forceShowDropdown($dropdown);
                    }, 200);
                }
                // On mobile, let Bootstrap handle it naturally - don't interfere
            });
            
            $(document).on('show.bs.dropdown', '.navbar-nav .dropdown', function() {
                // Close other dropdowns when opening a new one
                $('.navbar-nav .dropdown').not($(this)).removeClass('open');
            });
            
            $(document).on('hidden.bs.dropdown', '.navbar-nav .dropdown', function() {
                $(this).removeClass('open');
            });
            
            // Initialize desktop hover
            setupDesktopHover();
            $(window).on('resize', function() {
                setupDesktopHover();
            });
            
            // Close mobile menu on link click (except dropdown toggle)
            $(document).on('click', '.navbar-nav a:not(.dropdown-toggle)', function() {
                if ($(window).width() < 992) {
                    var $this = $(this);
                    if (!$this.closest('.dropdown-menu').length) {
                        setTimeout(function() {
                            $('.navbar-toggle').addClass('collapsed');
                            $('.navbar-collapse').removeClass('in').css('height', '0');
                        }, 300);
                    }
                }
            });
            
            // Continuous check to ensure open dropdowns are visible (fallback) - Desktop only
            setInterval(function() {
                // Only run on desktop
                if ($(window).width() >= 992) {
                    $('.navbar-nav .dropdown.open, .navbar-nav .dropdown').each(function() {
                        var $dropdown = $(this);
                        if ($dropdown.hasClass('open') || $dropdown.find('.dropdown-menu').is(':visible')) {
                            forceShowDropdown($dropdown);
                        }
                    });
                }
            }, 50);
            
            // Also check on any DOM mutation - Desktop only
            if (window.MutationObserver) {
                var observer = new MutationObserver(function(mutations) {
                    // Only run on desktop
                    if ($(window).width() >= 992) {
                        $('.navbar-nav .dropdown.open').each(function() {
                            forceShowDropdown($(this));
                        });
                    }
                });
                
                observer.observe(document.body, {
                    childList: true,
                    subtree: true,
                    attributes: true,
                    attributeFilter: ['class']
                });
            }
            
            // Mobile-specific dropdown handling - Let Bootstrap handle it naturally
            if ($(window).width() < 992) {
                // Prevent event propagation issues on mobile
                $(document).on('click', '.navbar-nav .dropdown-toggle', function(e) {
                    // Let Bootstrap handle the dropdown toggle
                    // Don't prevent default or stop propagation
                });
                
                // Ensure mobile dropdowns close when clicking outside
                $(document).on('click', function(e) {
                    if ($(window).width() < 992) {
                        if (!$(e.target).closest('.navbar-nav .dropdown').length) {
                            $('.navbar-nav .dropdown').removeClass('open');
                        }
                    }
                });
            }
            
            // Smooth scroll to footer when clicking "More" link
            $('.scroll-to-footer').on('click', function(e) {
                e.preventDefault();
                var footer = $('#footer');
                if (footer.length) {
                    // Close mobile menu if open
                    if ($(window).width() < 992) {
                        $('.navbar-toggle').addClass('collapsed');
                        $('.navbar-collapse').removeClass('in').css('height', '0');
                    }
                    // Smooth scroll to footer
                    $('html, body').animate({
                        scrollTop: footer.offset().top - 20
                    }, 800);
                }
            });
        });
    </script>
