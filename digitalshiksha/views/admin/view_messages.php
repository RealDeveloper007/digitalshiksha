<?php 
if (isset($this->session->userdata['time_zone']) && !empty($this->session->userdata['time_zone'])) {
    date_default_timezone_set($this->session->userdata['time_zone']);
}
?>

<style>
    .messages-wrapper {
        background: #fff;
        border-radius: 4px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        overflow: hidden;
        width: 100%;
        margin-bottom: 12px;
    }
    
    .messages-header {
        background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
        border-bottom: 3px solid #FFD700;
        color: white;
        padding: 10px 15px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .messages-header h4 {
        margin: 0;
        font-size: 16px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .messages-header h4 i {
        font-size: 14px;
        color: #FFD700;
    }
    
    .messages-content {
        padding: 12px;
    }
    
    .nav-tabs {
        border-bottom: 2px solid #e9ecef;
        margin-bottom: 25px;
    }
    
    .nav-tabs > li {
        margin-bottom: -2px;
    }
    
    .nav-tabs {
        background: #f8f9fa;
        padding: 0 12px;
        margin: -12px -12px 12px -12px;
    }
    
    .nav-tabs > li > a {
        color: #555;
        font-weight: 600;
        padding: 8px 12px;
        border: none;
        border-bottom: 3px solid transparent;
        transition: all 0.3s;
        display: flex;
        align-items: center;
        gap: 6px;
        position: relative;
        margin-bottom: -2px;
        font-size: 12px;
    }
    
    .nav-tabs > li > a:hover {
        color: #2c3e50;
        background: rgba(255, 255, 255, 0.8);
        border-bottom-color: rgba(255, 215, 0, 0.6);
    }
    
    .nav-tabs > li.active > a,
    .nav-tabs > li.active > a:hover,
    .nav-tabs > li.active > a:focus {
        color: #2c3e50;
        background: #fff;
        border: none;
        border-bottom: 3px solid #FFD700;
        cursor: default;
        font-weight: 700;
        box-shadow: 0 -2px 4px rgba(0,0,0,0.05);
    }
    
    .nav-tabs > li > a i {
        font-size: 12px;
        transition: all 0.3s;
    }
    
    .nav-tabs > li.active > a i {
        color: #FFD700;
        transform: scale(1.1);
    }
    
    .tab-content {
        padding-top: 12px;
    }
    
    .tab-content > .tab-pane {
        display: none;
    }
    
    .tab-content > .tab-pane.active {
        display: block;
    }
    
    .messages-list {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    
    .message-card {
        background: #f9f9f9;
        border-left: 4px solid #FFD700;
        border-radius: 4px;
        overflow: visible;
        transition: all 0.3s;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        position: relative;
        z-index: 1;
    }
    
    .message-card .btn-group.open {
        z-index: 10;
        position: relative;
    }
    
    .message-card.has-open-dropdown,
    .message-card:has(.btn-group.open) {
        z-index: 100;
        position: relative;
    }
    
    .message-card:hover {
        box-shadow: 0 4px 8px rgba(0,0,0,0.15);
        transform: translateY(-2px);
    }
    
    .message-card.unread {
        border-left-color: #FFD700;
        background: #fff;
    }
    
    .message-card.unread .message-card-header {
        background: #fff5f9;
    }
    
    .message-card-header {
        padding: 10px 12px;
        background: #f8f9fa;
        border-bottom: 1px solid #e0e0e0;
    }
    
    .message-title-section {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .message-checkbox {
        flex-shrink: 0;
    }
    
    .message-checkbox input[type="checkbox"] {
        width: 16px;
        height: 16px;
        cursor: pointer;
    }
    
    .message-title-section h4 {
        margin: 0;
        color: #333;
        font-weight: 600;
        font-size: 14px;
        flex: 1;
    }
    
    .unread-badge {
        background: #FFD700;
        color: #000000;
        padding: 3px 8px;
        border-radius: 12px;
        font-size: 10px;
        font-weight: 600;
        text-transform: uppercase;
    }
    
    .message-card-body {
        padding: 12px;
    }
    
    .message-info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 8px;
        margin-bottom: 10px;
    }
    
    .message-info-item {
        display: flex;
        align-items: flex-start;
        padding: 8px;
        background: white;
        border-radius: 3px;
        border: 1px solid #e0e0e0;
    }
    
    .message-info-item.full-width {
        grid-column: 1 / -1;
        flex-direction: column;
        gap: 6px;
    }
    
    .message-info-item .info-label {
        font-weight: 600;
        color: #666;
        margin-right: 8px;
        font-size: 11px;
        min-width: 90px;
        max-width: 110px;
        flex-shrink: 0;
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }
    
    .message-info-item .info-label i {
        color: #FFD700;
        width: 14px;
        text-align: center;
        flex-shrink: 0;
        font-size: 11px;
    }
    
    .message-info-item .info-value {
        color: #333;
        font-size: 12px;
        flex: 1;
        word-wrap: break-word;
        overflow-wrap: break-word;
        word-break: break-word;
        min-width: 0;
        overflow: visible;
        white-space: normal;
    }
    
    .message-content {
        margin-bottom: 10px;
    }
    
    .message-actions {
        margin-top: 10px;
        padding-top: 10px;
        border-top: 2px solid #e0e0e0;
        position: relative;
        z-index: 1;
    }
    
    .actions-label {
        font-weight: 600;
        color: #666;
        display: block;
        margin-bottom: 8px;
        font-size: 11px;
    }
    
    .message-card {
        position: relative;
        overflow: visible;
    }
    
    .message-card-body {
        position: relative;
        overflow: visible;
    }
    
    .delete-actions {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 20px;
        padding: 15px;
        background: #f8f9fa;
        border-radius: 4px;
        border: 1px solid #e9ecef;
    }
    
    .delete-actions .checkbox-section {
        display: flex;
        align-items: center;
        flex: 1;
    }
    
    .delete-actions .checkbox-section label {
        display: flex;
        align-items: center;
        gap: 8px;
        font-weight: 600;
        color: #333;
        margin: 0;
        cursor: pointer;
    }
    
    .delete-actions .checkbox-section input[type="checkbox"] {
        width: 18px;
        height: 18px;
        cursor: pointer;
    }
    
    .btn-group {
        display: flex;
        gap: 5px;
        flex-wrap: wrap;
        position: relative;
    }
    
    .btn {
        padding: 6px 12px;
        font-size: 12px;
        border-radius: 4px;
        border: none;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        cursor: pointer;
        font-weight: 500;
    }
    
    .btn i {
        font-size: 12px;
    }
    
    .btn-sm {
        padding: 5px 10px;
        font-size: 11px;
    }
    
    .btn-default {
        background: #6c757d;
        color: white;
    }
    
    .btn-default:hover {
        background: #5a6268;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(108, 117, 125, 0.3);
    }
    
    .btn-primary {
        background: #FFD700;
        color: #000000;
        font-weight: 600;
    }
    
    .btn-primary:hover {
        background: #FFC107;
        color: #000000;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(255, 215, 0, 0.3);
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
    
    .btn-action-delete {
        margin: 10px 0;
    }
    
    .btn span {
        display: inline;
    }
    
    .contact-form-section {
        background: #f8f9fa;
        border: 1px solid #e9ecef;
        border-radius: 6px;
        padding: 25px;
        margin-bottom: 30px;
    }
    
    .contact-form-section h4 {
        font-size: 18px;
        font-weight: 600;
        color: #333;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .contact-form-section h4 i {
        color: #FFD700;
    }
    
    .form-group {
        margin-bottom: 20px;
    }
    
    .form-group label {
        font-weight: 600;
        color: #333;
        margin-bottom: 8px;
        display: block;
        font-size: 14px;
    }
    
    .form-control {
        border-radius: 4px;
        border: 1px solid #ccc;
        padding: 10px 12px;
        transition: border-color 0.3s, box-shadow 0.3s;
        color: #333;
        font-size: 14px;
        width: 100%;
        box-sizing: border-box;
        background-color: #fff;
    }
    
    .form-control:focus {
        border-color: #FFD700;
        border-width: 2px;
        box-shadow: 0 0 0 0.2rem rgba(255, 215, 0, 0.25);
        outline: 0;
        color: #333;
    }
    
    .form-control:disabled {
        background-color: #e9ecef;
        opacity: 1;
        cursor: not-allowed;
        color: #555;
    }
    
    textarea.form-control {
        min-height: 150px;
        resize: vertical;
    }
    
    .wysihtml5-toolbar {
        border: 1px solid #ccc;
        border-radius: 4px 4px 0 0;
        border-bottom: none;
        padding: 8px;
        background: #f8f9fa;
    }
    
    .wysihtml5-sandbox {
        border: 1px solid #ccc !important;
        border-radius: 0 0 4px 4px !important;
    }
    
    .form-actions {
        padding: 20px 0;
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
    }
    
    .form-actions .btn {
        padding: 10px 25px;
        font-size: 14px;
        font-weight: 500;
    }
    
    .pagination {
        display: flex;
        justify-content: center;
        margin: 20px 0;
        flex-wrap: wrap;
    }
    
    .tsc_pagination {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        gap: 5px;
        flex-wrap: wrap;
        justify-content: center;
    }
    
    .tsc_pagination li {
        display: inline-block;
    }
    
    .tsc_pagination li a {
        padding: 8px 12px;
        border: 1px solid #dee2e6;
        border-radius: 4px;
        color: #e11d80;
        text-decoration: none;
        transition: all 0.3s;
    }
    
    .tsc_pagination li a:hover {
        background: #FFD700;
        color: #000000;
        border-color: #FFD700;
        font-weight: 600;
    }
    
    .tsc_pagination li .active {
        background: #FFD700;
        color: #000000;
        border-color: #FFD700;
        font-weight: 600;
    }
    
    .no-data-message {
        text-align: center;
        padding: 60px 20px;
        color: #666;
    }
    
    .no-data-message h4 {
        font-size: 18px;
        color: #999;
        margin: 0;
    }
    
    .dropdown-menu {
        border-radius: 4px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        z-index: 1050;
        position: absolute;
        min-width: 180px;
    }
    
    .dropdown-menu > li > a {
        padding: 8px 15px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .dropdown-menu > li > a:hover {
        background: #f8f9fa;
        color: #e11d80;
    }
    
    .btn-group {
        position: relative;
    }
    
    .message-actions .btn-group {
        position: relative;
        z-index: 10;
    }
    
    .message-actions .btn-group.open {
        z-index: 1000;
    }
    
    .message-actions .btn-group.open .dropdown-menu {
        display: block !important;
        z-index: 1001 !important;
        position: absolute !important;
        top: 100% !important;
        left: 0 !important;
        right: auto !important;
        margin-top: 2px !important;
        background: white !important;
        border: 1px solid #ddd !important;
        box-shadow: 0 4px 12px rgba(0,0,0,0.3) !important;
    }
    
    .message-actions .btn-group .dropdown-menu {
        display: none;
    }
    
    .messages-list {
        position: relative;
    }
    
    .modal-content {
        border-radius: 6px;
        border: none;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }
    
    .modal-header {
        background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
        border-bottom: 2px solid #FFD700;
        color: white;
        border-radius: 6px 6px 0 0;
        padding: 20px 25px;
    }
    
    .modal-header .close {
        color: white;
        opacity: 0.9;
        font-size: 28px;
    }
    
    .modal-header .close:hover {
        opacity: 1;
    }
    
    .modal-title {
        font-weight: 500;
    }
    
    .modal-body {
        padding: 25px;
    }
    
    .modal-body h4 {
        margin-bottom: 15px;
        color: #333;
        font-size: 15px;
    }
    
    .modal-body h3 {
        color: #FFD700;
        font-size: 16px;
        margin-top: 20px;
    }
    
    .message-preview {
        max-width: 300px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    
    @media (max-width: 767px) {
        .messages-wrapper {
            margin-bottom: 15px;
        }
        
        .messages-header {
            padding: 15px 20px;
        }
        
        .messages-header h4 {
            font-size: 18px;
        }
        
        .messages-content {
            padding: 15px;
        }
        
        .nav-tabs {
            display: flex;
            flex-wrap: nowrap;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            border-bottom: 2px solid #e9ecef;
            margin-bottom: 20px;
        }
        
        .nav-tabs > li {
            flex-shrink: 0;
        }
        
        .nav-tabs > li > a {
            padding: 10px 15px;
            font-size: 13px;
            white-space: nowrap;
        }
        
        .tab-content > .tab-pane {
            display: none !important;
        }
        
        .tab-content > .tab-pane.active {
            display: block !important;
        }
        
        .messages-list {
            gap: 12px;
        }
        
        .message-card-header {
            padding: 12px 15px;
        }
        
        .message-title-section {
            flex-wrap: wrap;
            gap: 10px;
        }
        
        .message-title-section h4 {
            font-size: 15px;
        }
        
        .message-card-body {
            padding: 15px;
        }
        
        .message-info-grid {
            grid-template-columns: 1fr;
            gap: 8px;
        }
        
        .message-info-item {
            flex-direction: column;
            align-items: flex-start;
            padding: 10px;
        }
        
        .message-info-item .info-label {
            margin-bottom: 5px;
            margin-right: 0;
            min-width: auto;
            max-width: none;
        }
        
        .message-info-item .info-value {
            width: 100%;
        }
        
        .message-actions {
            margin-top: 12px;
            padding-top: 12px;
        }
        
        .btn-group {
            flex-direction: column;
            width: 100%;
            gap: 8px;
        }
        
        .btn {
            width: 100%;
            justify-content: center;
            padding: 10px 15px;
            font-size: 14px;
        }
        
        .btn span {
            display: inline !important;
        }
        
        .delete-actions {
            flex-direction: column;
            align-items: stretch;
            gap: 12px;
            padding: 12px;
        }
        
        .delete-actions .checkbox-section {
            width: 100%;
        }
        
        .delete-actions .btn {
            width: 100%;
        }
        
        /* Fix dropdown on mobile */
        .message-card {
            z-index: 1 !important;
        }
        
        .message-card.has-open-dropdown {
            z-index: 100 !important;
            position: relative !important;
        }
        
        .btn-group {
            position: relative !important;
        }
        
        .message-actions .btn-group {
            position: relative !important;
            z-index: 10 !important;
        }
        
        .message-actions .btn-group.open {
            z-index: 1000 !important;
        }
        
        .message-actions .btn-group.open .dropdown-menu {
            display: block !important;
            position: absolute !important;
            top: 100% !important;
            left: 0 !important;
            right: auto !important;
            z-index: 1001 !important;
            margin-top: 2px !important;
            background: white !important;
            border: 1px solid #ddd !important;
            box-shadow: 0 4px 12px rgba(0,0,0,0.3) !important;
            min-width: 180px !important;
        }
        
        .message-card {
            overflow: visible !important;
        }
        
        .message-card-body {
            overflow: visible !important;
        }
        
        .messages-list {
            overflow: visible !important;
        }
        
        .messages-wrapper {
            overflow: visible !important;
        }
        
        .contact-form-section {
            padding: 20px 15px;
            margin-bottom: 20px;
        }
        
        .contact-form-section h4 {
            font-size: 16px;
            margin-bottom: 15px;
        }
        
        .form-group {
            margin-bottom: 18px;
        }
        
        .form-group label {
            font-size: 14px;
            margin-bottom: 6px;
        }
        
        .form-control {
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ccc;
        }
        
        textarea.form-control {
            min-height: 120px;
            font-size: 16px;
        }
        
        .form-actions {
            padding: 15px 0;
            flex-direction: row;
            flex-wrap: nowrap;
            gap: 10px;
        }
        
        .form-actions .btn {
            flex: 1 1 0;
            min-width: 0;
            padding: 12px 15px !important;
            font-size: 16px !important;
            font-weight: 500 !important;
            white-space: nowrap;
            display: inline-flex !important;
            align-items: center;
            justify-content: center;
            gap: 8px;
            border-radius: 4px;
            border: none !important;
            transition: all 0.3s;
            box-sizing: border-box;
            visibility: visible !important;
            opacity: 1 !important;
        }
        
        .form-actions .btn-primary {
            background: #FFD700 !important;
            color: #000000 !important;
            font-weight: 600 !important;
        }
        
        .form-actions .btn-default {
            background: #6c757d !important;
            color: white !important;
        }
        
        .btn-action-delete {
            width: 100%;
            margin: 10px 0;
        }
        
        .no-data-message {
            padding: 40px 15px;
        }
        
        .no-data-message h4 {
            font-size: 16px;
        }
        
        .message-preview {
            max-width: 150px;
        }
        
        .modal-dialog {
            margin: 10px;
        }
        
        .modal-body {
            padding: 20px 15px;
        }
        
        .modal-body h4 {
            font-size: 14px;
        }
        
        .modal-body h3 {
            font-size: 15px;
        }
    }
    
    @media (min-width: 768px) {
        .contact-form-section {
            max-width: 800px;
        }
        
        .form-actions {
            justify-content: flex-start;
        }
        
        .form-actions .btn {
            min-width: 120px;
        }
    }
</style>

<div id="note">
    <?=validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>        
    <?=(isset($message)) ? $message : ''; ?>
<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
<?php endif; ?>
<?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
<?php endif; ?>
</div>

<div class="messages-wrapper">
    <div class="messages-header">
        <h4><i class="fa fa-envelope"></i> Messages</h4>
    </div>
	
    <div class="messages-content">
    <?php if (isset($messages) != NULL) { ?>
        <ul class="nav nav-tabs" id="myTab">
                <li class="active"><a href="#tab_Inbox" data-toggle="tab"><i class="fa fa-inbox"></i> Inbox</a></li>
        <?php if($this->session->userdata['user_role_id']!=5) { ?>
                    <li><a href="#tab_Spam" data-toggle="tab"><i class="fa fa-ban"></i> Spam</a></li>
                    <li><a href="#tab_Trash" data-toggle="tab"><i class="fa fa-trash"></i> Trash</a></li>
        <?php } ?>
        </ul>
            
            <div class="tab-content" id="myTabContent">
                <!-- Inbox Tab -->
                <div class="tab-pane active" id="tab_Inbox">
<?php if($this->session->userdata['user_role_id']==5 || $this->session->userdata['user_role_id'] == 4) { ?>
                        <div class="contact-form-section">
                            <h4><i class="fa fa-paper-plane"></i> Send Message</h4>
                 <?=form_open(base_url('message_control/contact'), 'role="form" class="form-horizontal"'); ?>
                <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                <?=form_hidden('user_id', $this->session->userdata('user_id')); ?>
                <?=form_hidden('name', $this->session->userdata('user_name')); ?>
                <?=form_hidden('email', $this->session->userdata('user_email')); ?>
                <?=form_hidden('token', time()); ?>
                            
            <div class="form-group">
                                <label for="name">From:</label>
                                <?=form_input('name', $this->session->userdata('user_name').' < '.$this->session->userdata('user_email').' >', 'placeholder="From" id="name" class="form-control" disabled') ?>
                </div>
                            
            <div class="form-group">
                                <label for="subject">Subject: <span style="color: #FFD700;">*</span></label>
                                <?=form_input('subject', '', 'placeholder="Subject" id="subject" class="form-control" required="required"'); ?>
                </div>
                            
            <div class="form-group">
                                <label for="message">Message: <span style="color: #FFD700;">*</span></label>
                  <?php 
                    $data = array(
                        'name'        => 'message',
                                    'id'          => 'message',
                        'placeholder' => 'Your Message',
                        'value'       => '',
                        'rows'        => '10',
                        'class'       => 'form-control textarea-wysihtml5',
                                    'required'    => 'required',
                                );
                                echo form_textarea($data);
                                ?>
                </div>
                            
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-send"></i> Send
                                </button>
                                <a href="<?=base_url('message_control');?>" class="btn btn-default">
                                    <i class="fa fa-times"></i> Cancel
                                </a>
            </div>
                            
                            <?=form_close() ?>
    </div>
            <?php } ?>

                    <div class="messages-list">
                   <?php
                    $i = 1; 
                    $j = 0;
                    foreach ($messages as $msg) {
                        if (($msg->trash == 0) && ($msg->spam == 0) && ($msg->message_folder == 'inbox') ) {
                            $j = 1;
                    ?>
                        <div class="message-card <?=($msg->message_read == 0) ? 'unread' : ''; ?>">
                            <div class="message-card-header">
                                <div class="message-title-section">
                                    <h4><?=$msg->message_subject; ?></h4>
                                    <?php if($msg->message_read == 0) { ?>
                                        <span class="unread-badge">New</span>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="message-card-body">
                                <div class="message-info-grid">
                                    <?php if($this->session->userdata['user_role_id']!=5 && $this->session->userdata['user_role_id'] != 4) { ?>
                                        <div class="message-info-item">
                                            <span class="info-label"><i class="fa fa-user"></i> Type:</span>
                                            <span class="info-value"><?=$msg->user_id!='' ? 'User' : 'Visitor' ?></span>
                                        </div>
                     <?php } ?>
                                    <div class="message-info-item">
                                        <span class="info-label"><i class="fa fa-user-circle"></i> Sender:</span>
                                        <span class="info-value"><?=$msg->message_sender.' ('.$msg->sender_email.($msg->phone_number ? ', '.$msg->phone_number : '').')'; ?></span>
                                    </div>
                                    <div class="message-info-item">
                                        <span class="info-label"><i class="fa fa-calendar"></i> Date:</span>
                                        <span class="info-value"><?=date("D, d M Y g:i a", strtotime($msg->message_date)); ?></span>
                                    </div>
                                </div>
                                <div class="message-content">
                                    <div class="message-info-item full-width">
                                        <span class="info-label"><i class="fa fa-envelope"></i> Message:</span>
                                        <span class="info-value"><?=nl2br(htmlspecialchars($msg->message_body)); ?></span>
                                    </div>
                                </div>
                                <div class="message-actions">
                                    <span class="actions-label">Actions:</span>
                                    <div class="btn-group">
                        <?php if($this->session->userdata['user_role_id']==5 || $this->session->userdata['user_role_id'] == 4) { ?>
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#myModal<?= $msg->message_id ?>">
                                                <i class="fa fa-eye"></i> <span>View Reply</span>
                                            </button>
                        <?php } else { ?>
                             <?php if($msg->user_id!='') { ?>
                                                <button class="btn btn-primary" data-toggle="modal" data-target="#myModal<?= $msg->message_id ?>">
                                                    <i class="fa fa-eye"></i> <span>View Reply</span>
                                                </button>
                        <?php } ?>

                                            <?php if($this->CI->replies($msg->message_id) == 'Not replied yet') { ?>
                            <?php if($msg->user_id!='') { ?>
                                                    <a href="<?php echo base_url('message_control/reply_message/' . $msg->message_id); ?>" class="btn btn-default">
                                                        <i class="fa fa-reply"></i> <span>Reply</span>
                                                    </a>
                           <?php } ?>
                                                    <a href="<?php echo base_url('message_control/move_message/spam/' . $msg->message_id); ?>" class="btn btn-default">
                                                        <i class="fa fa-ban"></i> <span>Mark as Spam</span>
                                                    </a>
                                                    <a href="<?php echo base_url('message_control/move_message/trash/' . $msg->message_id); ?>" class="btn btn-default">
                                                        <i class="fa fa-trash"></i> <span>Move to Trash</span>
                                                    </a>
                                            <?php } ?>
                       <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                   <div id="myModal<?= $msg->message_id ?>" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Reply from Admin Portal</h4>
                          </div>
                          <div class="modal-body">
                                        <div style="margin-bottom: 20px;">
                                            <h4 style="margin-bottom: 10px;"><strong>Subject:</strong> <?=$msg->message_subject; ?></h4>
                                        </div>
                                        <div style="margin-bottom: 20px; padding: 15px; background: #f8f9fa; border-radius: 4px; border-left: 4px solid #FFD700;">
                                            <h4 style="margin-bottom: 10px;"><strong><i class="fa fa-envelope"></i> Your Message:</strong></h4>
                                            <div style="color: #333; line-height: 1.6;"><?=nl2br(htmlspecialchars($msg->message_body)); ?></div>
                                        </div>
                                        <div style="padding: 15px; background: #e8f5e9; border-radius: 4px; border-left: 4px solid #4caf50;">
                                            <h4 style="margin-bottom: 10px;"><strong><i class="fa fa-reply"></i> Reply:</strong></h4>
                                            <div style="color: #333; line-height: 1.6;">
                                                <?php 
                                                $reply_text = $this->CI->replies($msg->message_id);
                                                if($reply_text == 'Not replied yet') {
                                                    echo '<span style="color: #999; font-style: italic;">Not replied yet.</span>';
                                                } else {
                                                    echo nl2br(htmlspecialchars($reply_text));
                                                }
                                                ?>
                                            </div>
                                        </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                        
                   <?php
                        }
                        $i++;                       
                    }
                    if ($j == 0) {
                            echo '<div class="no-data-message"><h4>Inbox is empty.</h4></div>';
                    }
                   ?>
                    </div>
                    
                 <div id="pagination">
                     <ul class="tsc_pagination">
                                <?php foreach ($links as $link) {
                                    echo "<li>". $link."</li>";
                                } ?>
                    </ul>
                    </div>
                </div>
                
                <!-- Spam Tab -->
                <?php if($this->session->userdata['user_role_id']!=5) { ?>
                <div class="tab-pane" id="tab_Spam">
                    <form id="messageForm" method="post" action="<?php echo site_url('message_control/delete_messages'); ?>">
                        <div class="delete-actions">
                            <div class="checkbox-section">
                                <label>
                                    <input type="checkbox" id="selectAll"> Select All
                                </label>
                            </div>
                            <button type="button" class="btn btn-danger" id="deleteSelected">
                                <i class="fa fa-trash"></i> <span>Delete Selected</span>
                            </button>
                        </div>
                        
                        <div class="messages-list">
                            <?php
                            $i = 1; 
                            $j = 0;
                            foreach ($spam_messages as $msg) {
                                $j = 1;
                            ?>
                            <div class="message-card">
                                <div class="message-card-header">
                                    <div class="message-title-section">
                                        <div class="message-checkbox">
                                            <input type="checkbox" class="recordCheckbox" name="record_ids[]" value="<?php echo $msg->message_id; ?>">
                                        </div>
                                        <h4><?=$msg->message_subject; echo($msg->numOfReply != 0) ? ' ('.++$msg->numOfReply.')' : ''; ?></h4>
                                    </div>
                                </div>
                                <div class="message-card-body">
                                    <div class="message-info-grid">
                                        <div class="message-info-item">
                                            <span class="info-label"><i class="fa fa-user-circle"></i> Sender:</span>
                                            <span class="info-value"><?=$msg->message_sender; ?></span>
                                        </div>
                                        <div class="message-info-item">
                                            <span class="info-label"><i class="fa fa-folder"></i> Directory:</span>
                                            <span class="info-value"><?=$msg->message_folder; ?></span>
                                        </div>
                                    </div>
                                    <div class="message-actions">
                                        <span class="actions-label">Actions:</span>
                                        <div class="btn-group">
                                            <a href="<?php echo base_url('message_control/move_message/unspam/' . $msg->message_id); ?>" class="btn btn-default">
                                                <i class="fa fa-inbox"></i> <span>Move to Inbox</span>
                                            </a>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                    <i class="fa fa-ellipsis-v"></i> <span>More</span> <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu text-left" role="menu">
                                                    <li><a href="<?php echo base_url('message_control/move_message/unspam/' . $msg->message_id); ?>"><i class="fa fa-check"></i> Not Spam</a></li>
                                                    <li class="divider"></li>
                                                    <li><a onclick="return delete_confirmation()" href="<?php echo base_url('message_control/delete_message/' . $msg->message_id); ?>"><i class="fa fa-trash"></i> Delete Forever</a></li>
                                                </ul>
                                            </div>
                                        </div>
                    </div>
            </div>
       </div>
    <?php
                                $i++;                       
                            }
                            if ($j == 0) {
                                echo '<div class="no-data-message"><h4>No Spam Messages.</h4></div>';
    }
    ?>
    </div>
                    </form>
                </div>
                <?php } ?>
                
                <!-- Trash Tab -->
                <?php if($this->session->userdata['user_role_id']!=5) { ?>
                <div class="tab-pane" id="tab_Trash">
                    <form id="messageDeleteForm" method="post" action="<?php echo site_url('message_control/delete_messages'); ?>">
                        <div class="delete-actions">
                            <div class="checkbox-section">
                                <label>
                                    <input type="checkbox" id="selectTrashAll"> Select All
                                </label>
                            </div>
                            <button type="button" class="btn btn-danger" id="deleteTrashSelected">
                                <i class="fa fa-trash"></i> <span>Delete Selected</span>
                            </button>
                        </div>
                        
                        <div class="messages-list">
                            <?php
                            $i = 1; 
                            $j = 0;
                            foreach ($trash_messages as $msg) {
                                $j = 1;
                            ?>
                            <div class="message-card">
                                <div class="message-card-header">
                                    <div class="message-title-section">
                                        <div class="message-checkbox">
                                            <input type="checkbox" class="recordTrashCheckbox" name="record_ids[]" value="<?php echo $msg->message_id; ?>">
                                        </div>
                                        <h4><?=$msg->message_subject; echo($msg->numOfReply != 0) ? ' ('.++$msg->numOfReply.')' : ''; ?></h4>
                                    </div>
                                </div>
                                <div class="message-card-body">
                                    <div class="message-info-grid">
                                        <div class="message-info-item">
                                            <span class="info-label"><i class="fa fa-user-circle"></i> Sender:</span>
                                            <span class="info-value"><?=$msg->message_sender.' ('.$msg->sender_email.')'; ?></span>
                                        </div>
                                        <div class="message-info-item">
                                            <span class="info-label"><i class="fa fa-folder"></i> Directory:</span>
                                            <span class="info-value"><?=$msg->message_folder; ?></span>
                                        </div>
                                    </div>
                                    <div class="message-actions">
                                        <span class="actions-label">Actions:</span>
                                        <div class="btn-group">
                                            <a href="<?php echo base_url('message_control/move_message/untrash/' . $msg->message_id); ?>" class="btn btn-default">
                                                <i class="fa fa-inbox"></i> <span>Move to Inbox</span>
                                            </a>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                    <i class="fa fa-ellipsis-v"></i> <span>More</span> <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu text-left" role="menu">
                                                    <li><a href="<?php echo base_url('message_control/move_message/untrash/' . $msg->message_id); ?>"><i class="fa fa-envelope"></i> Move to Inbox</a></li>
                                                    <li class="divider"></li>
                                                    <li><a onclick="return delete_confirmation()" href="<?php echo base_url('message_control/delete_message/' . $msg->message_id); ?>"><i class="fa fa-trash"></i> Delete Forever</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                $i++;                       
                            }
                            if ($j == 0) {
                                echo '<div class="no-data-message"><h4>Trash is empty!</h4></div>';
                            }
                            ?>
                        </div>
                    </form>
                </div>
                <?php } ?>
            </div>
        <?php } else { ?>
            <div class="no-data-message">
                <h4>No Messages!</h4>
            </div>
        <?php } ?>
    </div>
    </div>

<script>
     $(document).ready(function () {
            // Select or Deselect all checkboxes
            $('#selectAll').click(function () {
                $('.recordCheckbox').prop('checked', this.checked);
            });

            $('.recordCheckbox').change(function () {
                if (!this.checked) {
                    $('#selectAll').prop('checked', false);
                }
            });

            $('#deleteSelected').click(function() {
                if (confirm('Are you sure you want to delete selected records?')) {
                    $('#messageForm').submit();
                }
            });

    // Trash checkboxes
             $('#selectTrashAll').click(function () {
                $('.recordTrashCheckbox').prop('checked', this.checked);
            });

            $('.recordTrashCheckbox').change(function () {
                if (!this.checked) {
                    $('#selectTrashAll').prop('checked', false);
                }
            });

            $('#deleteTrashSelected').click(function() {
                if (confirm('Are you sure you want to delete selected records?')) {
                    $('#messageDeleteForm').submit();
                }
            });
            
            // Initialize Bootstrap tabs
            $('#myTab a[data-toggle="tab"]').on('click', function (e) {
                e.preventDefault();
                var target = $(this).attr('href');
                $(this).tab('show');
                
                // Store active tab in localStorage
                localStorage.setItem('activeMessageTab', target);
            });
            
            // Restore active tab from localStorage on page load
            var activeTab = localStorage.getItem('activeMessageTab');
            if (activeTab && $('#myTab a[href="' + activeTab + '"]').length) {
                $('#myTab a[href="' + activeTab + '"]').tab('show');
            } else {
                // Ensure first tab is active if no saved tab
                if (!$('.nav-tabs li.active').length) {
                    $('#myTab li:first a').tab('show');
                }
            }
            
            // Handle tab shown event
            $('#myTab a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                var activeTab = $(e.target).attr('href');
                localStorage.setItem('activeMessageTab', activeTab);
            });
            
            // Fix dropdown on mobile - ensure dropdowns work properly
            $(document).on('click', '.dropdown-toggle', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                var $btnGroup = $(this).closest('.btn-group');
                var $dropdownMenu = $btnGroup.find('.dropdown-menu');
                var $messageCard = $btnGroup.closest('.message-card');
                
                // Close other open dropdowns
                $('.message-card').removeClass('has-open-dropdown');
                $('.btn-group').not($btnGroup).removeClass('open');
                $('.btn-group').not($btnGroup).find('.dropdown-menu').removeClass('show');
                
                // Toggle current dropdown
                $btnGroup.toggleClass('open');
                $dropdownMenu.toggleClass('show');
                
                // If opening, position the dropdown and raise the card
                if ($btnGroup.hasClass('open')) {
                    $messageCard.addClass('has-open-dropdown');
                    // Ensure dropdown is visible
                    setTimeout(function() {
                        var $menu = $btnGroup.find('.dropdown-menu');
                        $menu.css({
                            'display': 'block',
                            'position': 'absolute',
                            'z-index': '1001'
                        });
                    }, 10);
                } else {
                    $messageCard.removeClass('has-open-dropdown');
                }
            });
            
            // Close dropdown when clicking outside
            $(document).on('click', function(e) {
                if (!$(e.target).closest('.btn-group').length) {
                    $('.message-card').removeClass('has-open-dropdown');
                    $('.btn-group').removeClass('open');
                    $('.dropdown-menu').removeClass('show').css('display', 'none');
                }
            });
            
            // Close dropdown when clicking on dropdown item
            $(document).on('click', '.dropdown-menu a', function() {
                var $btnGroup = $(this).closest('.btn-group');
                var $messageCard = $btnGroup.closest('.message-card');
                $messageCard.removeClass('has-open-dropdown');
                $btnGroup.removeClass('open');
                $(this).closest('.dropdown-menu').removeClass('show').css('display', 'none');
            });
        });

function delete_confirmation() {
    return confirm('Are you sure you want to delete this message?');
}
</script>

<?php $this->load->view('plugin_scripts/bootstrap-wysihtml5'); ?>
