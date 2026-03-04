<?php //echo "<pre/>"; print_r($notices); exit(); ?>
<style>
    .notice-list-wrapper {
        background: #fff;
        border-radius: 4px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        overflow: hidden;
        width: 100%;
        margin-bottom: 20px;
    }
    
    .notice-header {
        background: linear-gradient(135deg, #e11d80 0%, #c91a6e 100%);
        color: white;
        padding: 20px 25px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
    }
    
    .notice-header h4 {
        margin: 0;
        font-size: 20px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .notice-header h4 i {
        font-size: 22px;
    }
    
    .add-btn {
        background: white;
        color: #e11d80;
        padding: 8px 16px;
        border-radius: 4px;
        text-decoration: none;
        font-weight: 500;
        font-size: 14px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: all 0.3s;
    }
    
    .add-btn:hover {
        background: #f8f9fa;
        transform: translateY(-1px);
        box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        color: #e11d80;
    }
    
    .notice-tabs {
        display: flex;
        gap: 10px;
        padding: 0 25px;
        border-bottom: 2px solid #e9ecef;
        background: #f8f9fa;
        flex-wrap: wrap;
    }
    
    .notice-tabs .tab-link {
        padding: 12px 20px;
        background: transparent;
        border: none;
        border-bottom: 3px solid transparent;
        color: #666;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-block;
    }
    
    .notice-tabs .tab-link:hover {
        color: #e11d80;
        background: #fff;
    }
    
    .notice-tabs .tab-link.active {
        color: #e11d80;
        border-bottom-color: #e11d80;
        background: #fff;
    }
    
    .notice-content {
        padding: 25px;
    }
    
    .notice-list-wrapper .tab-content .tab-pane {
        display: none !important;
    }
    
    .notice-list-wrapper .tab-content .tab-pane.active {
        display: block !important;
    }
    
    .notice-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }
    
    .notice-card {
        background: #fff;
        border: 1px solid #dee2e6;
        border-radius: 8px;
        padding: 20px;
        transition: all 0.3s;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        display: flex;
        flex-direction: column;
        min-height: 200px;
        overflow: hidden;
    }
    
    .notice-card:hover {
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        transform: translateY(-2px);
        border-color: #e11d80;
    }
    
    .notice-card-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 15px;
        gap: 12px;
        flex-shrink: 0;
    }
    
    .notice-title {
        font-size: 16px;
        font-weight: 600;
        color: #333;
        margin: 0;
        line-height: 1.5;
        flex: 1;
        word-wrap: break-word;
        word-break: break-word;
        overflow-wrap: break-word;
        hyphens: auto;
        min-width: 0;
    }
    
    .notice-title h1, .notice-title h2, .notice-title h3, 
    .notice-title h4, .notice-title h5, .notice-title h6 {
        font-size: 16px;
        font-weight: 600;
        margin: 0 0 8px 0;
        padding: 0;
        line-height: 1.5;
        color: #333;
    }
    
    .notice-title h1:last-child, .notice-title h2:last-child, 
    .notice-title h3:last-child, .notice-title h4:last-child, 
    .notice-title h5:last-child, .notice-title h6:last-child {
        margin-bottom: 0;
    }
    
    .notice-title p {
        margin: 0 0 8px 0;
        padding: 0;
        line-height: 1.5;
        color: #333;
    }
    
    .notice-title p:last-child {
        margin-bottom: 0;
    }
    
    .notice-title strong, .notice-title b {
        font-weight: 600;
        color: inherit;
    }
    
    .notice-title em, .notice-title i {
        font-style: italic;
        color: inherit;
    }
    
    .notice-title ul, .notice-title ol {
        padding-left: 20px;
        margin: 0 0 8px 0;
        color: #333;
    }
    
    .notice-title ul:last-child, .notice-title ol:last-child {
        margin-bottom: 0;
    }
    
    .notice-title ul li, .notice-title ol li {
        margin-bottom: 4px;
        line-height: 1.5;
    }
    
    .notice-title a {
        color: #e11d80;
        text-decoration: underline;
    }
    
    .notice-title a:hover {
        color: #c91a6e;
    }
    
    .notice-title img {
        max-width: 100%;
        height: auto;
        display: block;
        margin: 8px 0;
    }
    
    .notice-title blockquote {
        border-left: 3px solid #e11d80;
        padding-left: 15px;
        margin: 8px 0;
        font-style: italic;
        color: #666;
    }
    
    .status-badge {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 12px;
        font-size: 12px;
        font-weight: 600;
        white-space: nowrap;
        flex-shrink: 0;
    }
    
    .status-badge.active {
        background: #28a745;
        color: white;
    }
    
    .status-badge.inactive {
        background: #6c757d;
        color: white;
    }
    
    .notice-meta {
        margin-bottom: 15px;
        padding-bottom: 15px;
        border-bottom: 1px solid #e9ecef;
        flex-shrink: 0;
    }
    
    .notice-meta-item {
        display: flex;
        align-items: flex-start;
        gap: 8px;
        margin-bottom: 8px;
        font-size: 14px;
        color: #666;
        word-wrap: break-word;
        word-break: break-word;
    }
    
    .notice-meta-item:last-child {
        margin-bottom: 0;
    }
    
    .notice-meta-item i {
        color: #e11d80;
        font-size: 14px;
        width: 16px;
        flex-shrink: 0;
        margin-top: 2px;
    }
    
    .notice-meta-item span {
        flex: 1;
        min-width: 0;
        word-wrap: break-word;
        word-break: break-word;
    }
    
    .notice-actions {
        display: flex;
        gap: 10px;
        margin-top: auto;
        padding-top: 15px;
        border-top: 1px solid #e9ecef;
        flex-shrink: 0;
    }
    
    .btn {
        padding: 8px 16px;
        font-size: 13px;
        border-radius: 4px;
        border: none;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        cursor: pointer;
        font-weight: 500;
        flex: 1;
        min-width: 0;
        white-space: nowrap;
        overflow: visible;
        text-overflow: clip;
    }
    
    .btn i {
        font-size: 13px;
        flex-shrink: 0;
    }
    
    .btn span {
        overflow: visible;
        white-space: nowrap;
    }
    
    .btn-info {
        background: #17a2b8;
        color: white;
    }
    
    .btn-info:hover {
        background: #138496;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(23, 162, 184, 0.3);
    }
    
    .btn-danger {
        background: #dc3545;
        color: white;
    }
    
    .btn-danger:hover {
        background: #c82333;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(220, 53, 69, 0.3);
    }
    
    .no-data-message {
        text-align: center;
        padding: 60px 20px;
        color: #666;
        grid-column: 1 / -1;
    }
    
    .no-data-message i {
        font-size: 64px;
        color: #ccc;
        margin-bottom: 20px;
        display: block;
    }
    
    .no-data-message p {
        font-size: 18px;
        margin: 0;
    }
    
    @media (max-width: 767px) {
        .notice-header {
            padding: 15px 20px;
            flex-direction: column;
            align-items: flex-start;
        }
        
        .notice-header h4 {
            font-size: 18px;
        }
        
        .add-btn {
            width: 100%;
            justify-content: center;
        }
        
        .notice-tabs {
            padding: 0 15px;
            flex-direction: column;
            gap: 0;
        }
        
        .notice-tabs .tab-link {
            padding: 12px 15px;
            border-bottom: 1px solid #e9ecef;
            border-left: 3px solid transparent;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: flex-start;
        }
        
        .notice-tabs .tab-link.active {
            border-left-color: #e11d80;
            border-bottom-color: #e9ecef;
            background: #fff;
        }
        
        .notice-content {
            padding: 20px 15px;
        }
        
        .notice-grid {
            grid-template-columns: 1fr;
            gap: 15px;
            margin-top: 15px;
        }
        
        .notice-card {
            padding: 15px;
            min-height: auto;
        }
        
        .notice-card-header {
            gap: 10px;
            margin-bottom: 12px;
        }
        
        .notice-title {
            font-size: 15px;
            line-height: 1.4;
        }
        
        .notice-meta {
            margin-bottom: 12px;
            padding-bottom: 12px;
        }
        
        .notice-meta-item {
            font-size: 13px;
            align-items: flex-start;
        }
        
        .notice-meta-item span {
            line-height: 1.4;
        }
        
        .notice-actions {
            padding-top: 12px;
            flex-direction: column;
        }
        
        .btn {
            padding: 10px 14px;
            font-size: 13px;
            width: 100%;
            flex: 1 1 100%;
        }
        
        .no-data-message {
            padding: 40px 15px;
        }
        
        .no-data-message i {
            font-size: 48px;
        }
        
        .no-data-message p {
            font-size: 16px;
        }
    }
    
    @media (min-width: 768px) and (max-width: 991px) {
        .notice-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    
    @media (min-width: 992px) {
        .notice-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }
</style>

<div id="note">
    <?=validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>        
    <?=(isset($message)) ? $message : ''; ?>
</div>

<div class="notice-list-wrapper">
    <div class="notice-header">
        <h4><i class="fa fa-bullhorn"></i> Noticeboard</h4>
        <?php if ($this->session->userdata['user_role_id'] <= 3) { ?>
            <a class="add-btn" href="<?php echo base_url('noticeboard/add'); ?>">
                <i class="glyphicon glyphicon-plus-sign"></i> Add Notice
            </a>
        <?php } ?>
    </div>
    
    <div class="notice-tabs">
        <a href="#notice" class="tab-link active" data-tab="notice">Notice</a>
        <a href="#bracking_news" class="tab-link" data-tab="bracking_news">Breaking News</a>
    </div>
    
    <div class="notice-content">
        <div class="tab-content">
            <!-- Notice Tab -->
            <div id="notice" class="tab-pane active">
                <?php if (isset($notices) != NULL) { 
                    $notice_count = 0;
                    foreach ($notices as $notice) {
                        if($notice->notice_type == 1) $notice_count++;
                    }
                    if ($notice_count > 0) { ?>
                        <div class="notice-grid">
                            <?php
                            foreach ($notices as $notice) {
                                if($notice->notice_type == 1) {
                            ?>
                                <div class="notice-card">
                                    <div class="notice-card-header">
                                        <div class="notice-title"><?= $notice->notice_title; ?></div>
                                        <span class="status-badge <?= ($notice->notice_status) ? 'active' : 'inactive'; ?>">
                                            <?= ($notice->notice_status) ? 'Active' : 'Inactive'; ?>
                                        </span>
                                    </div>
                                    
                                    <div class="notice-meta">
                                        <div class="notice-meta-item">
                                            <i class="fa fa-calendar"></i>
                                            <span><strong>Starts:</strong> <?= $notice->notice_start; ?></span>
                                        </div>
                                        <div class="notice-meta-item">
                                            <i class="fa fa-calendar-check-o"></i>
                                            <span><strong>Ends:</strong> <?= $notice->notice_end; ?></span>
                                        </div>
                                    </div>
                                    
                                    <div class="notice-actions">
                                        <a class="btn btn-info" href="<?php echo base_url('noticeboard/edit/' . $notice->notice_id); ?>">
                                            <i class="glyphicon glyphicon-edit"></i> Edit
                                        </a>
                                        <?php if ($this->session->userdata['user_role_id'] <= 2) { ?>
                                            <a onclick="return delete_confirmation()" href="<?php echo base_url('noticeboard/delete/' . $notice->notice_id); ?>" class="btn btn-danger">
                                                <i class="glyphicon glyphicon-trash"></i> Delete
                                            </a>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    <?php } else { ?>
                        <div class="notice-grid">
                            <div class="no-data-message">
                                <i class="fa fa-bullhorn"></i>
                                <p>No notices found!</p>
                            </div>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <div class="notice-grid">
                        <div class="no-data-message">
                            <i class="fa fa-bullhorn"></i>
                            <p>No notices found!</p>
                        </div>
                    </div>
                <?php } ?>
            </div>
            
            <!-- Breaking News Tab -->
            <div id="bracking_news" class="tab-pane">
                <?php if (isset($notices) != NULL) { 
                    $breaking_count = 0;
                    foreach ($notices as $notice) {
                        if($notice->notice_type == 2) $breaking_count++;
                    }
                    if ($breaking_count > 0) { ?>
                        <div class="notice-grid">
                            <?php
                            foreach ($notices as $notice) {
                                if($notice->notice_type == 2) {
                            ?>
                                <div class="notice-card">
                                    <div class="notice-card-header">
                                        <div class="notice-title"><?= $notice->notice_title; ?></div>
                                        <span class="status-badge <?= ($notice->notice_status) ? 'active' : 'inactive'; ?>">
                                            <?= ($notice->notice_status) ? 'Active' : 'Inactive'; ?>
                                        </span>
                                    </div>
                                    
                                    <div class="notice-meta">
                                        <div class="notice-meta-item">
                                            <i class="fa fa-calendar"></i>
                                            <span><strong>Starts:</strong> <?= $notice->notice_start; ?></span>
                                        </div>
                                        <div class="notice-meta-item">
                                            <i class="fa fa-calendar-check-o"></i>
                                            <span><strong>Ends:</strong> <?= $notice->notice_end; ?></span>
                                        </div>
                                    </div>
                                    
                                    <div class="notice-actions">
                                        <a class="btn btn-info" href="<?php echo base_url('noticeboard/edit/' . $notice->notice_id); ?>">
                                            <i class="glyphicon glyphicon-edit"></i> Edit
                                        </a>
                                        <?php if ($this->session->userdata['user_role_id'] <= 2) { ?>
                                            <a onclick="return delete_confirmation()" href="<?php echo base_url('noticeboard/delete/' . $notice->notice_id); ?>" class="btn btn-danger">
                                                <i class="glyphicon glyphicon-trash"></i> Delete
                                            </a>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    <?php } else { ?>
                        <div class="notice-grid">
                            <div class="no-data-message">
                                <i class="fa fa-newspaper-o"></i>
                                <p>No breaking news found!</p>
                            </div>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <div class="notice-grid">
                        <div class="no-data-message">
                            <i class="fa fa-newspaper-o"></i>
                            <p>No breaking news found!</p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<script>
function delete_confirmation() {
    return confirm('Are you sure you want to delete this notice?');
}

$(document).ready(function() {
    // Initialize tabs on page load - ensure only the active tab is visible
    var $wrapper = $('.notice-list-wrapper');
    
    // Find the tab link that has active class in HTML
    var $activeTabLink = $wrapper.find('.notice-tabs .tab-link.active');
    var activeTabId = null;
    
    if ($activeTabLink.length > 0) {
        activeTabId = $activeTabLink.data('tab');
    } else {
        // If no active tab, use the first one
        $activeTabLink = $wrapper.find('.notice-tabs .tab-link').first();
        activeTabId = $activeTabLink.data('tab');
        $activeTabLink.addClass('active');
    }
    
    // Remove active class from all tab panes first
    $wrapper.find('.tab-content .tab-pane').removeClass('active');
    
    // Activate only the correct tab pane
    if (activeTabId) {
        $wrapper.find('#' + activeTabId).addClass('active');
    }
    
    // Tab switching functionality
    $wrapper.find('.notice-tabs .tab-link').on('click', function(e) {
        e.preventDefault();
        var targetTab = $(this).data('tab');
        var $wrapper = $(this).closest('.notice-list-wrapper');
        
        // Remove active class from all tabs and panes within this wrapper
        $wrapper.find('.notice-tabs .tab-link').removeClass('active');
        $wrapper.find('.tab-content .tab-pane').removeClass('active');
        
        // Add active class to clicked tab and corresponding pane
        $(this).addClass('active');
        $wrapper.find('#' + targetTab).addClass('active');
    });
});
</script>
