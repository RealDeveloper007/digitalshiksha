<?php 
if (isset($this->session->userdata['time_zone']) && !empty($this->session->userdata['time_zone'])) {
    date_default_timezone_set($this->session->userdata['time_zone']);
}

$str = '[';
foreach ($currencies as $value) {
    $str .= "{value:" . $value->currency_id . ",text:'" . $value->currency_name . " (" . $value->currency_symbol . ")'},";
}
$str = substr($str, 0, -1);
$str .= "]";
?>

<style>
    .system-settings-wrapper {
        background: #fff;
        border-radius: 4px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        overflow: hidden;
        width: 100%;
        margin-bottom: 20px;
    }
    
    .settings-header {
        background: linear-gradient(135deg, #e11d80 0%, #c91a6e 100%);
        color: white;
        padding: 20px 25px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .settings-header h4 {
        margin: 0;
        font-size: 20px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .settings-header h4 i {
        font-size: 22px;
    }
    
    .settings-content {
        padding: 25px;
    }
    
    .settings-tabs {
        display: flex;
        gap: 10px;
        border-bottom: 2px solid #e9ecef;
        margin-bottom: 25px;
        background: #f8f9fa;
        padding: 0 25px;
        flex-wrap: wrap;
    }
    
    .settings-tabs .tab-link {
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
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    
    .settings-tabs .tab-link:hover {
        color: #e11d80;
        background: #fff;
    }
    
    .settings-tabs .tab-link.active {
        color: #e11d80;
        border-bottom-color: #e11d80;
        background: #fff;
    }
    
    .settings-tabs .tab-link i {
        font-size: 16px;
    }
    
    .system-settings-wrapper .tab-content .tab-pane {
        display: none !important;
    }
    
    .system-settings-wrapper .tab-content .tab-pane.active {
        display: block !important;
    }
    
    .tab-content {
        padding-top: 20px;
    }
    
    .form-group {
        margin-bottom: 20px;
    }
    
    .form-group label {
        font-weight: 600;
        color: #333;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
    }
    
    .form-group label i {
        color: #e11d80;
        font-size: 16px;
        width: 18px;
    }
    
    .form-group label .required {
        color: #e11d80;
        margin-left: 3px;
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
        border-color: #e11d80;
        border-width: 2px;
        box-shadow: 0 0 0 0.2rem rgba(225, 29, 128, 0.25);
        outline: 0;
        color: #333;
    }
    
    .form-control::placeholder {
        color: #999;
    }
    
    select.form-control {
        color: #333 !important;
        background-color: #fff !important;
        overflow: visible !important;
        text-overflow: clip !important;
        white-space: normal !important;
        word-wrap: break-word !important;
        overflow-wrap: break-word !important;
        padding-right: 30px;
        height: auto;
        min-height: 40px;
    }
    
    select.form-control option {
        color: #333 !important;
        background-color: #fff !important;
        padding: 8px;
        white-space: normal !important;
        word-wrap: break-word !important;
        overflow-wrap: break-word !important;
    }
    
    textarea.form-control {
        min-height: 120px;
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
    
    .logo-upload-section {
        display: flex;
        align-items: flex-start;
        gap: 20px;
        flex-wrap: wrap;
        padding: 20px;
        background: #f8f9fa;
        border-radius: 4px;
        border: 1px solid #e9ecef;
    }
    
    .logo-preview {
        flex-shrink: 0;
    }
    
    .logo-preview img {
        max-width: 150px;
        max-height: 150px;
        border: 2px solid #dee2e6;
        border-radius: 4px;
        padding: 5px;
        background: white;
    }
    
    .logo-upload-controls {
        flex: 1;
        min-width: 200px;
    }
    
    .btn-file {
        position: relative;
        overflow: hidden;
        display: inline-block;
    }
    
    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: pointer;
        display: block;
    }
    
    .btn-upload {
        background: #17a2b8;
        color: white;
        padding: 8px 16px;
        border-radius: 4px;
        border: none;
        cursor: pointer;
        font-size: 14px;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: all 0.3s;
    }
    
    .btn-upload:hover {
        background: #138496;
        transform: translateY(-1px);
        box-shadow: 0 2px 4px rgba(23, 162, 184, 0.3);
        color: white;
    }
    
    .help-block {
        font-size: 13px;
        color: #6c757d;
        margin-top: 8px;
    }
    
    .form-actions {
        padding: 20px 0;
        border-top: 1px solid #e9ecef;
        margin-top: 30px;
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
    }
    
    .form-actions .btn {
        padding: 10px 25px;
        font-size: 14px;
        font-weight: 500;
        border-radius: 4px;
        transition: all 0.3s;
        border: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
    }
    
    .form-actions .btn-primary {
        background: #e11d80;
        color: white;
    }
    
    .form-actions .btn-primary:hover {
        background: #c91a6e;
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(225, 29, 128, 0.3);
        color: white;
    }
    
    .social-links-section {
        padding: 20px 0;
    }
    
    .social-link-item {
        background: #f8f9fa;
        border: 1px solid #e9ecef;
        border-radius: 6px;
        padding: 20px;
        margin-bottom: 20px;
        transition: all 0.3s;
    }
    
    .social-link-item:hover {
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        border-color: #e11d80;
    }
    
    .social-link-item dt {
        font-weight: 600;
        color: #333;
        font-size: 15px;
        margin-bottom: 10px;
        width: 100%;
        float: none;
        text-align: left;
    }
    
    .social-link-item dd {
        margin-left: 0;
        margin-bottom: 15px;
    }
    
    .social-link-item .lead {
        font-size: 14px;
        color: #555;
        word-break: break-all;
        margin-bottom: 10px;
    }
    
    .social-link-item .lead a {
        color: #e11d80;
        text-decoration: none;
    }
    
    .social-link-item .lead a:hover {
        text-decoration: underline;
    }
    
    .btn-visit {
        background: #6c757d;
        color: white;
        padding: 6px 12px;
        font-size: 12px;
        border-radius: 4px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: all 0.3s;
    }
    
    .btn-visit:hover {
        background: #5a6268;
        color: white;
        transform: translateY(-1px);
        box-shadow: 0 2px 4px rgba(108, 117, 125, 0.3);
    }
    
    .section-title {
        font-size: 18px;
        font-weight: 600;
        color: #333;
        margin: 30px 0 20px 0;
        padding-bottom: 10px;
        border-bottom: 2px solid #e11d80;
    }
    
    .section-title:first-child {
        margin-top: 0;
    }
    
    .example-code {
        background: #f8f9fa;
        border: 1px solid #e9ecef;
        border-left: 4px solid #17a2b8;
        padding: 15px;
        border-radius: 4px;
        font-family: monospace;
        font-size: 13px;
        color: #333;
        margin: 15px 0;
        word-break: break-all;
    }
    
    .btn-modify {
        background: #17a2b8;
        color: white;
        padding: 10px 20px;
        border-radius: 4px;
        text-decoration: none;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s;
        border: none;
        cursor: pointer;
    }
    
    .btn-modify:hover {
        background: #138496;
        transform: translateY(-1px);
        box-shadow: 0 2px 4px rgba(23, 162, 184, 0.3);
        color: white;
    }
    
    .alert {
        margin-bottom: 20px;
        border-radius: 4px;
    }
    
    @media (max-width: 767px) {
        .system-settings-wrapper {
            margin-bottom: 15px;
        }
        
        .settings-header {
            padding: 15px 20px;
        }
        
        .settings-header h4 {
            font-size: 18px;
        }
        
        .settings-content {
            padding: 15px;
        }
        
        .settings-tabs {
            padding: 0 15px;
            flex-direction: column;
            gap: 0;
        }
        
        .settings-tabs .tab-link {
            padding: 12px 15px;
            border-bottom: 1px solid #e9ecef;
            border-left: 3px solid transparent;
            width: 100%;
            justify-content: flex-start;
        }
        
        .settings-tabs .tab-link.active {
            border-left-color: #e11d80;
            border-bottom-color: #e9ecef;
            background: #fff;
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
        
        select.form-control {
            min-height: 48px;
            line-height: 1.5;
        }
        
        textarea.form-control {
            min-height: 100px;
            font-size: 16px;
        }
        
        .logo-upload-section {
            flex-direction: column;
            padding: 15px;
        }
        
        .logo-preview {
            width: 100%;
            text-align: center;
        }
        
        .logo-preview img {
            max-width: 120px;
            max-height: 120px;
        }
        
        .logo-upload-controls {
            width: 100%;
        }
        
        .btn-upload {
            width: 100%;
            justify-content: center;
            padding: 12px 15px;
            font-size: 16px;
        }
        
        .form-actions {
            padding: 15px 0;
            margin-top: 20px;
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
            background: #e11d80 !important;
            color: white !important;
        }
        
        .social-link-item {
            padding: 15px;
            margin-bottom: 15px;
        }
        
        .social-link-item dt {
            font-size: 14px;
            margin-bottom: 8px;
        }
        
        .social-link-item .lead {
            font-size: 13px;
        }
        
        .btn-visit {
            width: 100%;
            justify-content: center;
            padding: 8px 12px;
            font-size: 13px;
        }
        
        .section-title {
            font-size: 16px;
            margin: 20px 0 15px 0;
        }
        
        .example-code {
            font-size: 12px;
            padding: 12px;
        }
        
        .btn-modify {
            width: 100%;
            justify-content: center;
            padding: 12px 15px;
            font-size: 15px;
        }
    }
    
    @media (min-width: 768px) {
        .form-group {
            max-width: 700px;
        }
        
        .form-actions {
            justify-content: flex-start;
        }
        
        .form-actions .btn {
            min-width: 120px;
        }
        
        .social-link-item dt {
            width: 200px;
            float: left;
            text-align: right;
            padding-right: 20px;
        }
        
        .social-link-item dd {
            margin-left: 220px;
        }
    }
</style>

<div id="note">
    <?=validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>        
    <?=(isset($message)) ? $message : ''; ?>
</div>

<div class="system-settings-wrapper">
    <div class="settings-header">
        <h4><i class="fa fa-cogs"></i> System Settings</h4>
    </div>
    
    <div class="settings-content">
        <div class="settings-tabs">
            <a href="#tab_1" class="tab-link active" data-tab="tab_1">
                <i class="fa fa-info-circle"></i> Basic Info
            </a>
            <a href="#tab_5" class="tab-link" data-tab="tab_5">
                <i class="fa fa-file-text"></i> Content
            </a>
            <a href="#tab_2" class="tab-link" data-tab="tab_2">
                <i class="fa fa-share-alt"></i> Social Profiles
            </a>
            <a href="#tab_3" class="tab-link" data-tab="tab_3">
                <i class="fa fa-paint-brush"></i> Theme & Colors
            </a>
        </div>
        
        <div class="tab-content">
            <!-- Basic Info Tab -->
            <div class="tab-pane active" id="tab_1">
                <?=form_open_multipart(base_url('admin/system_control/view_settings'), 'role="form" class="form-horizontal"'); ?>
                
                <div class="form-group">
                    <label for="brand_name">
                        <i class="fa fa-building"></i> Brand Name <span class="required">*</span>
                    </label>
                    <?=form_input('brand_name', $sys_set->brand_name, 'placeholder="Brand Name" id="brand_name" class="form-control" required="required"') ?>
                </div>
                
                <div class="form-group">
                    <label for="brand_tagline">
                        <i class="fa fa-tag"></i> Brand Tagline
                    </label>
                    <?=form_input('brand_tagline', $sys_set->brand_tagline, 'placeholder="Brand Tagline" id="brand_tagline" class="form-control"') ?>
                </div>
                
                <div class="form-group">
                    <label for="address">
                        <i class="fa fa-map-marker"></i> Address
                    </label>
                    <?=form_input('address', $sys_set->address, 'placeholder="Address" id="address" class="form-control"') ?>
                </div>
                
                <div class="form-group">
                    <label for="local_time_zone">
                        <i class="fa fa-clock-o"></i> Timezone <span class="required">*</span>
                    </label>
                    <select name="local_time_zone" id="local_time_zone" class="form-control" required="required">
                        <option value=''>Select Timezone</option>
                        <?php foreach ($time_zone as $value) { ?>
                            <option value="<?=$value->timezone_name?>" <?=($sys_set->local_time_zone == $value->timezone_name)?'selected':''?>><?=$value->timezone_name?></option>
                        <?php } ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="support_email">
                        <i class="fa fa-envelope"></i> Support Email
                    </label>
                    <?=form_input('support_email', $sys_set->support_email, 'placeholder="Support Email" id="support_email" class="form-control" type="email"') ?>
                </div>
                
                <div class="form-group">
                    <label for="support_phone">
                        <i class="fa fa-phone"></i> Support Phone
                    </label>
                    <?=form_input('support_phone', $sys_set->support_phone, 'placeholder="Support Phone" id="support_phone" class="form-control"') ?>
                </div>
                
                <div class="form-group">
                    <label for="bussiness_type">
                        <i class="fa fa-briefcase"></i> Business Type <span class="required">*</span>
                    </label>
                    <select name="bussiness_type" id="bussiness_type" class="form-control" required="required">
                        <option value="1" <?=($sys_set->commercial == 1)?'selected':''?>>Commercial</option>
                        <option value="0" <?=($sys_set->commercial == 0)?'selected':''?>>Non-commercial</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="student_can_register">
                        <i class="fa fa-user-plus"></i> Student Can Register <span class="required">*</span>
                    </label>
                    <select name="student_can_register" id="student_can_register" class="form-control" required="required">
                        <option value="1" <?=($sys_set->student_can_register == 1)?'selected':''?>>Yes</option>
                        <option value="0" <?=($sys_set->student_can_register == 0)?'selected':''?>>No</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label>
                        <i class="fa fa-image"></i> Logo
                    </label>
                    <div class="logo-upload-section">
                        <div class="logo-preview">
                            <?php if(file_exists('logo.png')): ?>
                                <img src="<?=base_url('logo.png');?>" alt="LOGO">
                            <?php else: ?>
                                <img src="http://placehold.it/150x78?text=LOGO" alt="LOGO">
                            <?php endif; ?>
                        </div>
                        <div class="logo-upload-controls">
                            <label class="btn-file btn-upload">
                                <i class="fa fa-upload"></i> Upload Logo
                                <?=form_upload('logo', '', 'id="logo"') ?>
                            </label>
                            <p class="help-block"><i class="fa fa-info-circle"></i> Allowed only: jpg | jpeg | png. Recommended: 200px × 78px</p>
                        </div>
                    </div>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save"></i> Save
                    </button>
                </div>
                
                <?=form_close() ?>
            </div>
            
            <!-- Content Tab -->
            <div class="tab-pane" id="tab_5">
                <?=form_open(base_url('admin/system_control/update_content'), 'role="form" class="form-horizontal"'); ?>
                <?php 
                $sys_content = $this->db->get('content')->result(); 
                foreach ($sys_content as $value) { 
                    if ($value->content_type == 'about_us') { ?>
                        <div class="form-group">
                            <label for="about_title">
                                <i class="fa fa-header"></i> About Us Title <span class="required">*</span>
                            </label>
                            <?=form_input('about_title', $value->content_heading, 'placeholder="About Us Title" id="about_title" class="form-control" required="required"') ?>
                        </div>
                        <div class="form-group">
                            <label for="about_content">
                                <i class="fa fa-file-text"></i> About Us Content <span class="required">*</span>
                            </label>
                            <?php 
                            $data = array(
                                'name'        => 'about_content',
                                'id'          => 'about_content',
                                'placeholder' => 'About Us Content',
                                'value'       => $value->content_data,
                                'rows'        => '10',
                                'class'       => 'form-control textarea-wysihtml5',
                                'required'    => 'required',
                            );
                            echo form_textarea($data);
                            ?>
                        </div>
                    <?php }
                    if ($value->content_type == 'price_table_msg') { ?>
                        <div class="form-group">
                            <label for="price_tbl_title">
                                <i class="fa fa-table"></i> Price Table Title <span class="required">*</span>
                            </label>
                            <?=form_input('price_tbl_title', $value->content_heading, 'placeholder="Price Table Title" id="price_tbl_title" class="form-control" required="required"') ?>
                        </div>
                        <div class="form-group">
                            <label for="price_tbl_content">
                                <i class="fa fa-comment"></i> Price Table Message <span class="required">*</span>
                            </label>
                            <?php 
                            $data = array(
                                'name'        => 'price_tbl_content',
                                'id'          => 'price_tbl_content',
                                'placeholder' => 'Price Table Message',
                                'value'       => $value->content_data,
                                'rows'        => '5',
                                'class'       => 'form-control textarea-wysihtml5',
                                'required'    => 'required',
                            );
                            echo form_textarea($data);
                            ?>
                        </div>
                    <?php }
                    if ($value->content_type == 'slider_text') { ?>
                        <div class="form-group">
                            <label for="slider_text_title">
                                <i class="fa fa-text-width"></i> Slider Text Heading <span class="required">*</span>
                            </label>
                            <?=form_input('slider_text_title[]', $value->content_heading, 'placeholder="Slider Text Heading" id="slider_text_title" class="form-control" required="required"') ?>
                        </div>
                        <div class="form-group">
                            <label for="slider_text">
                                <i class="fa fa-sliders"></i> Slider Text
                            </label>
                            <?php 
                            $data = array(
                                'name'        => 'slider_text[]',
                                'id'          => 'slider_text',
                                'placeholder' => 'Slider Text',
                                'value'       => $value->content_data,
                                'rows'        => '2',
                                'class'       => 'form-control textarea-wysihtml5'
                            );
                            echo form_textarea($data);
                            ?>
                        </div>
                    <?php }
                } ?>
                
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save"></i> Save
                    </button>
                </div>
                
                <?=form_close() ?>
            </div>
            
            <!-- Social Profiles Tab -->
            <div class="tab-pane" id="tab_2">
                <div class="social-links-section">
                    <h4 class="section-title">Important Links</h4>
                    
                    <div class="social-link-item">
                        <dt>YouTube Channel:</dt>
                        <dd>
                            <p class="lead">
                                <a href="#" data-name="youtube" data-type="textarea" data-rows="2" data-url="<?=base_url('admin/system_control/update_system_info'); ?>" data-pk="<?= $sys_set->brand_id ?>" class="data-modify-social no-style"><?= $sys_set->you_tube_url ? $sys_set->you_tube_url : 'Not set' ?></a>
                            </p>
                            <?php if ($sys_set->you_tube_url): ?>
                                <a href="<?= $sys_set->you_tube_url ?>" target="_blank" class="btn-visit">
                                    <i class="fa fa-external-link"></i> Visit Link
                                </a>
                            <?php endif; ?>
                        </dd>
                    </div>
                    
                    <div class="social-link-item">
                        <dt>Meet Us On Facebook:</dt>
                        <dd>
                            <p class="lead">
                                <a href="#" data-name="facebook" data-type="textarea" data-rows="2" data-url="<?=base_url('admin/system_control/update_system_info'); ?>" data-pk="<?= $sys_set->brand_id ?>" class="data-modify-social no-style"><?= $sys_set->facbook_url ? $sys_set->facbook_url : 'Not set' ?></a>
                            </p>
                            <?php if ($sys_set->facbook_url): ?>
                                <a href="<?= $sys_set->facbook_url ?>" target="_blank" class="btn-visit">
                                    <i class="fa fa-external-link"></i> Visit Link
                                </a>
                            <?php endif; ?>
                        </dd>
                    </div>
                    
                    <div class="social-link-item">
                        <dt>Online Exam Tutorial Video:</dt>
                        <dd>
                            <p class="lead">
                                <a href="#" data-name="googleplus" data-type="textarea" data-rows="2" data-url="<?=base_url('admin/system_control/update_system_info'); ?>" data-pk="<?= $sys_set->brand_id ?>" class="data-modify-social no-style"><?= $sys_set->googleplus_url ? $sys_set->googleplus_url : 'Not set' ?></a>
                            </p>
                            <?php if ($sys_set->googleplus_url): ?>
                                <a href="<?= $sys_set->googleplus_url ?>" target="_blank" class="btn-visit">
                                    <i class="fa fa-external-link"></i> Visit Link
                                </a>
                            <?php endif; ?>
                        </dd>
                    </div>
                    
                    <div class="social-link-item">
                        <dt>Our Subjective Website:</dt>
                        <dd>
                            <p class="lead">
                                <a href="#" data-name="twitter" data-type="textarea" data-rows="2" data-url="<?=base_url('admin/system_control/update_system_info'); ?>" data-pk="<?= $sys_set->brand_id ?>" class="data-modify-social no-style"><?= $sys_set->twitter_url ? $sys_set->twitter_url : 'Not set' ?></a>
                            </p>
                            <?php if ($sys_set->twitter_url): ?>
                                <a href="<?= $sys_set->twitter_url ?>" target="_blank" class="btn-visit">
                                    <i class="fa fa-external-link"></i> Visit Link
                                </a>
                            <?php endif; ?>
                        </dd>
                    </div>
                    
                    <h4 class="section-title">Useful Links</h4>
                    
                    <div class="example-code">
                        <strong>Example:</strong><br>
                        &lt;li&gt;&lt;a class="text-muted" href="www.google.com" target="_blank"&gt;&lt;i class="fa fa-google"&gt;&lt;/i&gt; Google&lt;/a&gt;&lt;/li&gt;
                    </div>
                    <p style="margin-bottom: 20px;">
                        <a href="https://fontawesome.com/v4.7.0/icons/" target="_blank" style="color: #17a2b8; text-decoration: none;">
                            <i class="fa fa-external-link"></i> Find the Icons
                        </a>
                    </p>
                    
                    <div class="social-link-item">
                        <dt>Link 1:</dt>
                        <dd>
                            <p class="lead">
                                <a href="#" data-name="linkedin" data-type="textarea" data-rows="2" data-url="<?=base_url('admin/system_control/update_system_info'); ?>" data-pk="<?= $sys_set->brand_id ?>" class="data-modify-social no-style"><?= $sys_set->linkedin_url ? $sys_set->linkedin_url : 'Not set' ?></a>
                            </p>
                            <?php if ($sys_set->linkedin_url): ?>
                                <a href="<?= $sys_set->linkedin_url ?>" target="_blank" class="btn-visit">
                                    <i class="fa fa-external-link"></i> Visit Link
                                </a>
                            <?php endif; ?>
                        </dd>
                    </div>
                    
                    <div class="social-link-item">
                        <dt>Link 2:</dt>
                        <dd>
                            <p class="lead">
                                <a href="#" data-name="pinterest" data-type="textarea" data-rows="2" data-url="<?=base_url('admin/system_control/update_system_info'); ?>" data-pk="<?= $sys_set->brand_id ?>" class="data-modify-social no-style"><?= $sys_set->pinterest_url ? $sys_set->pinterest_url : 'Not set' ?></a>
                            </p>
                            <?php if ($sys_set->pinterest_url): ?>
                                <a href="<?= $sys_set->pinterest_url ?>" target="_blank" class="btn-visit">
                                    <i class="fa fa-external-link"></i> Visit Link
                                </a>
                            <?php endif; ?>
                        </dd>
                    </div>
                    
                    <div class="social-link-item">
                        <dt>Link 3:</dt>
                        <dd>
                            <p class="lead">
                                <a href="#" data-name="flickr" data-type="textarea" data-rows="2" data-url="<?=base_url('admin/system_control/update_system_info'); ?>" data-pk="<?= $sys_set->brand_id ?>" class="data-modify-social no-style"><?= $sys_set->flickr_url ? $sys_set->flickr_url : 'Not set' ?></a>
                            </p>
                            <?php if ($sys_set->flickr_url): ?>
                                <a href="<?= $sys_set->flickr_url ?>" target="_blank" class="btn-visit">
                                    <i class="fa fa-external-link"></i> Visit Link
                                </a>
                            <?php endif; ?>
                        </dd>
                    </div>
                </div>
                
                <?php if ($this->session->userdata['user_role_id'] == 1) { ?>
                    <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #e9ecef;">
                        <button type="button" class="btn-modify" id="rev-link" name="modify-social">
                            <i class="fa fa-edit"></i> Modify Links
                        </button>
                    </div>
                <?php } ?>
            </div>
            
            <!-- Theme & Colors Tab -->
            <div class="tab-pane" id="tab_3">
                <?=form_open_multipart(base_url('admin/system_control/view_settings'), 'role="form" class="form-horizontal"'); ?>
                <input type="hidden" name="update_type" value="colors_only">
                
                <div class="theme-settings-section">
                    <h4 class="section-title" style="margin-bottom: 25px; color: #333; font-size: 18px; font-weight: 600;">
                        <i class="fa fa-palette"></i> Frontend Color Theme Settings
                    </h4>
                    <p style="color: #666; margin-bottom: 30px; font-size: 14px;">
                        Customize the color scheme for all frontend pages. Changes will be applied immediately.
                    </p>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="primary_color">
                                    <i class="fa fa-circle" style="color: <?= isset($sys_set->primary_color) && !empty($sys_set->primary_color) ? $sys_set->primary_color : '#2c3e50' ?>;"></i> Primary Color
                                </label>
                                <div style="display: flex; gap: 10px; align-items: center;">
                                    <input type="color" name="primary_color" id="primary_color" value="<?= isset($sys_set->primary_color) && !empty($sys_set->primary_color) ? $sys_set->primary_color : '#2c3e50' ?>" class="form-control" style="width: 80px; height: 40px; padding: 2px;">
                                    <input type="text" value="<?= isset($sys_set->primary_color) && !empty($sys_set->primary_color) ? $sys_set->primary_color : '#2c3e50' ?>" class="form-control color-text-input" data-target="primary_color" placeholder="#2c3e50" style="flex: 1;">
                                </div>
                                <small class="help-block">Main dark color for headers and backgrounds</small>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="secondary_color">
                                    <i class="fa fa-circle" style="color: <?= isset($sys_set->secondary_color) && !empty($sys_set->secondary_color) ? $sys_set->secondary_color : '#34495e' ?>;"></i> Secondary Color
                                </label>
                                <div style="display: flex; gap: 10px; align-items: center;">
                                    <input type="color" name="secondary_color" id="secondary_color" value="<?= isset($sys_set->secondary_color) && !empty($sys_set->secondary_color) ? $sys_set->secondary_color : '#34495e' ?>" class="form-control" style="width: 80px; height: 40px; padding: 2px;">
                                    <input type="text" value="<?= isset($sys_set->secondary_color) && !empty($sys_set->secondary_color) ? $sys_set->secondary_color : '#34495e' ?>" class="form-control color-text-input" data-target="secondary_color" placeholder="#34495e" style="flex: 1;">
                                </div>
                                <small class="help-block">Secondary dark color for gradients</small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="accent_color">
                                    <i class="fa fa-circle" style="color: <?= isset($sys_set->accent_color) && !empty($sys_set->accent_color) ? $sys_set->accent_color : '#FFD700' ?>;"></i> Accent Color (Gold)
                                </label>
                                <div style="display: flex; gap: 10px; align-items: center;">
                                    <input type="color" name="accent_color" id="accent_color" value="<?= isset($sys_set->accent_color) && !empty($sys_set->accent_color) ? $sys_set->accent_color : '#FFD700' ?>" class="form-control" style="width: 80px; height: 40px; padding: 2px;">
                                    <input type="text" value="<?= isset($sys_set->accent_color) && !empty($sys_set->accent_color) ? $sys_set->accent_color : '#FFD700' ?>" class="form-control color-text-input" data-target="accent_color" placeholder="#FFD700" style="flex: 1;">
                                </div>
                                <small class="help-block">Main accent/highlight color (borders, icons, badges)</small>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="accent_color_alt">
                                    <i class="fa fa-circle" style="color: <?= isset($sys_set->accent_color_alt) && !empty($sys_set->accent_color_alt) ? $sys_set->accent_color_alt : '#F1B900' ?>;"></i> Accent Color Alt (Gold Alt)
                                </label>
                                <div style="display: flex; gap: 10px; align-items: center;">
                                    <input type="color" name="accent_color_alt" id="accent_color_alt" value="<?= isset($sys_set->accent_color_alt) && !empty($sys_set->accent_color_alt) ? $sys_set->accent_color_alt : '#F1B900' ?>" class="form-control" style="width: 80px; height: 40px; padding: 2px;">
                                    <input type="text" value="<?= isset($sys_set->accent_color_alt) && !empty($sys_set->accent_color_alt) ? $sys_set->accent_color_alt : '#F1B900' ?>" class="form-control color-text-input" data-target="accent_color_alt" placeholder="#F1B900" style="flex: 1;">
                                </div>
                                <small class="help-block">Alternative accent color for gradients</small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="text_color">
                                    <i class="fa fa-font"></i> Text Color
                                </label>
                                <div style="display: flex; gap: 10px; align-items: center;">
                                    <input type="color" name="text_color" id="text_color" value="<?= isset($sys_set->text_color) && !empty($sys_set->text_color) ? $sys_set->text_color : '#333333' ?>" class="form-control" style="width: 80px; height: 40px; padding: 2px;">
                                    <input type="text" value="<?= isset($sys_set->text_color) && !empty($sys_set->text_color) ? $sys_set->text_color : '#333333' ?>" class="form-control color-text-input" data-target="text_color" placeholder="#333333" style="flex: 1;">
                                </div>
                                <small class="help-block">Main text color</small>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="text_color_light">
                                    <i class="fa fa-font"></i> Text Color Light
                                </label>
                                <div style="display: flex; gap: 10px; align-items: center;">
                                    <input type="color" name="text_color_light" id="text_color_light" value="<?= isset($sys_set->text_color_light) && !empty($sys_set->text_color_light) ? $sys_set->text_color_light : '#666666' ?>" class="form-control" style="width: 80px; height: 40px; padding: 2px;">
                                    <input type="text" value="<?= isset($sys_set->text_color_light) && !empty($sys_set->text_color_light) ? $sys_set->text_color_light : '#666666' ?>" class="form-control color-text-input" data-target="text_color_light" placeholder="#666666" style="flex: 1;">
                                </div>
                                <small class="help-block">Secondary text color for descriptions</small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="background_color">
                                    <i class="fa fa-square"></i> Background Color
                                </label>
                                <div style="display: flex; gap: 10px; align-items: center;">
                                    <input type="color" name="background_color" id="background_color" value="<?= isset($sys_set->background_color) && !empty($sys_set->background_color) ? $sys_set->background_color : '#ffffff' ?>" class="form-control" style="width: 80px; height: 40px; padding: 2px;">
                                    <input type="text" value="<?= isset($sys_set->background_color) && !empty($sys_set->background_color) ? $sys_set->background_color : '#ffffff' ?>" class="form-control color-text-input" data-target="background_color" placeholder="#ffffff" style="flex: 1;">
                                </div>
                                <small class="help-block">Main background color</small>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="background_dark">
                                    <i class="fa fa-square"></i> Background Dark
                                </label>
                                <div style="display: flex; gap: 10px; align-items: center;">
                                    <input type="color" name="background_dark" id="background_dark" value="<?= isset($sys_set->background_dark) && !empty($sys_set->background_dark) ? $sys_set->background_dark : '#1a1a1a' ?>" class="form-control" style="width: 80px; height: 40px; padding: 2px;">
                                    <input type="text" value="<?= isset($sys_set->background_dark) && !empty($sys_set->background_dark) ? $sys_set->background_dark : '#1a1a1a' ?>" class="form-control color-text-input" data-target="background_dark" placeholder="#1a1a1a" style="flex: 1;">
                                </div>
                                <small class="help-block">Dark background for sections</small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-actions" style="margin-top: 30px; padding-top: 20px; border-top: 2px solid #e9ecef;">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save"></i> Save Color Settings
                        </button>
                        <button type="button" class="btn btn-default" onclick="resetColors()" style="margin-left: 10px;">
                            <i class="fa fa-refresh"></i> Reset to Defaults
                        </button>
                    </div>
                </div>
                
                <?=form_close() ?>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('plugin_scripts/bootstrap-wysihtml5'); ?>

<script>
// Color picker synchronization
$(document).ready(function() {
    // Sync color picker with text input
    $('input[type="color"]').on('change', function() {
        var textInput = $('.color-text-input[data-target="' + $(this).attr('id') + '"]');
        textInput.val($(this).val());
    });
    
    // Sync text input with color picker
    $('.color-text-input').on('input', function() {
        var colorInput = $('#' + $(this).data('target'));
        var colorValue = $(this).val();
        if (/^#[0-9A-F]{6}$/i.test(colorValue)) {
            colorInput.val(colorValue);
        }
    });
    
    // Reset colors function
    window.resetColors = function() {
        if (confirm('Are you sure you want to reset all colors to default values?')) {
            $('#primary_color').val('#2c3e50');
            $('#secondary_color').val('#34495e');
            $('#accent_color').val('#FFD700');
            $('#accent_color_alt').val('#F1B900');
            $('#text_color').val('#333333');
            $('#text_color_light').val('#666666');
            $('#background_color').val('#ffffff');
            $('#background_dark').val('#1a1a1a');
            
            $('.color-text-input').each(function() {
                var target = $(this).data('target');
                $(this).val($('#' + target).val());
            });
        }
    };
});

$(document).ready(function() {
    // Initialize tabs on page load - ensure only the active tab is visible
    var $wrapper = $('.system-settings-wrapper');
    
    // Find the tab link that has active class in HTML
    var $activeTabLink = $wrapper.find('.settings-tabs .tab-link.active');
    var activeTabId = null;
    
    if ($activeTabLink.length > 0) {
        activeTabId = $activeTabLink.data('tab');
    } else {
        // If no active tab, use the first one
        $activeTabLink = $wrapper.find('.settings-tabs .tab-link').first();
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
    $wrapper.find('.settings-tabs .tab-link').on('click', function(e) {
        e.preventDefault();
        var targetTab = $(this).data('tab');
        var $wrapper = $(this).closest('.system-settings-wrapper');
        
        // Remove active class from all tabs and panes within this wrapper
        $wrapper.find('.settings-tabs .tab-link').removeClass('active');
        $wrapper.find('.tab-content .tab-pane').removeClass('active');
        
        // Add active class to clicked tab and corresponding pane
        $(this).addClass('active');
        $wrapper.find('#' + targetTab).addClass('active');
    });
});
</script>
