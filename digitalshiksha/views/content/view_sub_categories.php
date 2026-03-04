<?php
$str = '[';
foreach ($categories as $value) {
    $str .= "{value:" . $value->category_id . ",text:'" . $value->category_name . " '},";
}
$str = substr($str, 0, -1);
$str .= "]";
?>

<style>
    .category-list-wrapper {
        background: #fff;
        border-radius: 4px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        overflow: hidden;
        width: 100%;
        margin-bottom: 20px;
    }
    
    .category-header {
        background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
        border-bottom: 3px solid #FFD700;
        color: white;
        padding: 12px 15px;
    }
    
    .nav-pills {
        display: flex;
        gap: 10px;
        align-items: center;
        flex-wrap: wrap;
        padding: 0;
        margin: 0;
        list-style: none;
    }
    
    .nav-pills > li {
        margin: 0;
    }
    
    .nav-pills > li > a {
        padding: 10px 20px;
        border-radius: 4px;
        color: rgba(255, 255, 255, 0.8);
        background: rgba(255, 255, 255, 0.15);
        border: 2px solid rgba(255, 255, 255, 0.3);
        transition: all 0.3s;
        text-decoration: none;
        display: inline-block;
        font-weight: 500;
        font-size: 14px;
    }
    
    .nav-pills > li > a:hover {
        background: rgba(255, 255, 255, 0.25);
        border-color: rgba(255, 255, 255, 0.5);
        color: white;
    }
    
    .nav-pills > li.active > a {
        background: white;
        color: #2c3e50;
        border-color: white;
        font-weight: 600;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }
    
    .nav-pills > li.active > a i {
        color: #FFD700;
    }
    
    .nav-pills > li > p {
        margin: 0;
        padding: 8px 0;
        font-weight: 500;
        color: white;
        font-size: 16px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .nav-pills > li > p i {
        color: #FFD700;
        font-size: 14px;
    }
    
    .block-content {
        padding: 12px;
    }
    
    .category-item {
        background: #fff;
        border: 1px solid #dee2e6;
        border-radius: 6px;
        padding: 12px;
        margin-bottom: 10px;
        transition: all 0.3s;
        box-shadow: 0 1px 2px rgba(0,0,0,0.05);
        box-sizing: border-box;
        border-left: 4px solid #FFD700;
    }
    
    .category-item:hover {
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        border-left-color: #FFD700;
        border-left-width: 5px;
        transform: translateY(-2px);
    }
    
    .category-name {
        font-size: 14px;
        font-weight: 600;
        color: #333;
        margin-bottom: 12px;
        padding-bottom: 8px;
        border-bottom: 2px solid #FFD700;
    }
    
    .category-name a {
        color: #333;
        text-decoration: none;
        transition: color 0.3s;
    }
    
    .category-name a:hover {
        color: #2c3e50;
    }
    
    .category-info {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-bottom: 12px;
        padding-bottom: 12px;
        border-bottom: 1px solid #f0f0f0;
    }
    
    .category-info-item {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 12px;
        color: #666;
    }
    
    .category-info-item i {
        color: #716006;
        font-size: 11px;
    }
    
    .category-info-item strong {
        color: #333;
        font-weight: 600;
        margin-right: 5px;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .category-info-item .exam-count {
        background: #FFD700;
        color: #000;
        padding: 2px 8px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 11px;
    }
    
    .category-actions {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }
    
    .btn {
        padding: 8px;
        font-size: 0;
        border-radius: 4px;
        border: none;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        cursor: pointer;
        position: relative;
    }
    
    .btn i {
        font-size: 16px;
        margin: 0;
    }
    
    .btn[title]:hover::after {
        content: attr(title);
        position: absolute;
        bottom: 100%;
        left: 50%;
        transform: translateX(-50%);
        padding: 4px 8px;
        background: #333;
        color: white;
        font-size: 12px;
        border-radius: 4px;
        white-space: nowrap;
        margin-bottom: 5px;
        z-index: 1000;
    }
    
    .btn-primary {
        background: #e11d80;
        color: white;
    }
    
    .btn-primary:hover {
        background: #c91a6e;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(225, 29, 128, 0.3);
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
    
    .no-data-message {
        text-align: center;
        padding: 40px 20px;
        color: #666;
        font-size: 16px;
    }
    
    .no-style {
        text-decoration: none;
        color: inherit;
    }
    
    .no-style:hover {
        text-decoration: none;
        color: #e11d80;
    }
    
    @media (max-width: 767px) {
        .category-header {
            padding: 12px 15px;
        }
        
        .nav-pills {
            flex-direction: column;
            align-items: stretch;
            gap: 8px;
        }
        
        .nav-pills > li {
            width: 100%;
        }
        
        .nav-pills > li > p {
            margin-bottom: 5px;
            font-size: 15px;
        }
        
        .nav-pills > li > a {
            width: 100%;
            text-align: center;
            padding: 12px;
            font-size: 14px;
        }
        
        .nav-pills > li.active > a {
            background: white !important;
            color: #e11d80 !important;
            border-color: white !important;
            font-weight: 600;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
        
        .nav-pills > li.pull-right {
            float: none !important;
        }
        
        .block-content {
            padding: 15px;
        }
        
        .category-item {
            padding: 15px;
            margin-bottom: 12px;
        }
        
        .category-name {
            font-size: 16px;
            margin-bottom: 12px;
            padding-bottom: 10px;
        }
        
        .category-info {
            flex-direction: column;
            gap: 12px;
            margin-bottom: 12px;
            padding-bottom: 12px;
        }
        
        .category-info-item {
            font-size: 13px;
        }
        
        .category-actions {
            gap: 6px;
        }
        
        .btn {
            width: 40px;
            height: 40px;
            padding: 0;
        }
        
        .btn i {
            font-size: 18px;
        }
    }
    
    /* X-Editable Button Styling */
    .editable-buttons {
        display: inline-flex !important;
        gap: 8px !important;
        margin-left: 5px !important;
        vertical-align: middle !important;
    }
    
    .editable-buttons .editable-submit,
    .editable-buttons .editable-cancel {
        padding: 6px 12px !important;
        font-size: 13px !important;
        border-radius: 4px !important;
        border: none !important;
        cursor: pointer !important;
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        transition: all 0.3s !important;
        min-width: 40px !important;
        height: 32px !important;
        box-sizing: border-box !important;
    }
    
    .editable-buttons .editable-submit {
        background: #e11d80 !important;
        color: white !important;
    }
    
    .editable-buttons .editable-submit:hover {
        background: #c91a6e !important;
        color: white !important;
    }
    
    .editable-buttons .editable-cancel {
        background: #6c757d !important;
        color: white !important;
    }
    
    .editable-buttons .editable-cancel:hover {
        background: #5a6268 !important;
        color: white !important;
    }
    
    .editable-buttons .editable-submit i,
    .editable-buttons .editable-cancel i {
        font-size: 14px !important;
        margin: 0 !important;
    }
    
    .editable-input {
        display: inline-flex !important;
        align-items: center !important;
        flex-wrap: wrap !important;
        gap: 5px !important;
        width: 100% !important;
    }
    
    .editable-input input[type="text"],
    .editable-input input[type="number"],
    .editable-input select {
        padding: 8px 12px !important;
        font-size: 14px !important;
        border: 1px solid #ccc !important;
        border-radius: 4px !important;
        min-width: 200px !important;
        flex: 1 !important;
        max-width: 100% !important;
    }
    
    .editable-input input[type="text"]:focus,
    .editable-input input[type="number"]:focus,
    .editable-input select:focus {
        border-color: #e11d80 !important;
        outline: 0 !important;
        box-shadow: 0 0 0 0.2rem rgba(225, 29, 128, 0.25) !important;
    }
    
    @media (max-width: 767px) {
        .editable-buttons {
            display: flex !important;
            flex-direction: row !important;
            gap: 6px !important;
            margin-left: 0 !important;
            margin-top: 8px !important;
            width: 100% !important;
        }
        
        .editable-input {
            flex-direction: column !important;
            align-items: stretch !important;
            width: 100% !important;
        }
        
        .editable-input input[type="text"],
        .editable-input input[type="number"],
        .editable-input select {
            width: 100% !important;
            min-width: 100% !important;
            max-width: 100% !important;
            font-size: 16px !important;
            padding: 10px 12px !important;
            box-sizing: border-box !important;
        }
        
        .editable-buttons .editable-submit,
        .editable-buttons .editable-cancel {
            flex: 1 1 0 !important;
            min-width: 0 !important;
            padding: 6px 10px !important;
            font-size: 12px !important;
            height: 32px !important;
        }
        
        .editable-buttons .editable-submit i,
        .editable-buttons .editable-cancel i {
            font-size: 14px !important;
        }
    }
    
    @media (min-width: 768px) {
        .nav-pills {
            justify-content: flex-end;
        }
        
        .nav-pills > li.pull-right {
            float: right;
        }
        
        .category-actions {
            flex-direction: row;
        }
    }
</style>

<div id="note">
    <?php 
    if ($message) {
        echo $message;    
    }
    ?>
</div>

<div class="block category-list-wrapper"> 
    <div class="category-header">
        <div class="row">
            <ul class="nav nav-pills">
                <li><p>Sub-category List</p></li>
                <li class="pull-right"><a href="#muted" data-toggle="pill">Inactive</a></li>
                <li class="active pull-right"><a href="#running" data-toggle="pill">Active</a></li>
            </ul>
        </div>
    </div>
    <div class="block-content">
    <div class="row">
    <div class="col-sm-12">
        <div class="tab-content">
                    <?php if (isset($sub_categories) && count($sub_categories) > 0) { 
                        // Separate active and inactive
                        $inactive_categories = array();
                        $active_categories = array();
                        
                        foreach ($sub_categories as $category) {
                            $category->exam_count = isset($mock_count[$category->id]) ? $mock_count[$category->id] : 0;
                            if ($category->sub_cat_active == 0) {
                                $inactive_categories[] = $category;
                            } else {
                                $active_categories[] = $category;
                            }
                        }
                        
                        // Sort by exam count (descending) - subcategories with more exams first
                        usort($inactive_categories, function($a, $b) {
                            return $b->exam_count - $a->exam_count;
                        });
                        
                        usort($active_categories, function($a, $b) {
                            return $b->exam_count - $a->exam_count;
                        });
                    ?>
                        <!-- Inactive Categories Tab -->
        <div class="tab-pane fade" id="muted">
                            <?php if (count($inactive_categories) > 0) { 
                                foreach ($inactive_categories as $category) { ?>
                                    <div class="category-item">
                                        <div class="category-name">
                                            <?=$category->sub_cat_name; ?>
                                        </div>
                                        <div class="category-info">
                                            <div class="category-info-item">
                                                <i class="fa fa-file-text"></i>
                                                <strong>Have Exams:</strong>
                                                <span class="exam-count"><?php echo isset($mock_count[$category->id]) ? $mock_count[$category->id] : 0; ?></span>
                                            </div>
                                            <div class="category-info-item">
                                                <i class="fa fa-book"></i>
                                                <strong>Have Courses:</strong>
                                                <span><?php echo isset($course_count[$category->id]) ? $course_count[$category->id] : 0; ?></span>
                                            </div>
                                            <div class="category-info-item">
                                                <i class="fa fa-folder"></i>
                                                <strong>Parent Category:</strong>
                                                <span><?php echo $category->category_name; ?></span>
                                            </div>
                                        </div>
                                        <div class="category-actions">
                                            <a class="btn btn-primary" href="<?php echo base_url('admin_control/activate_subcategory/' . $category->id); ?>" title="Activate">
                                                <i class="glyphicon glyphicon-check"></i>
                                            </a>
                                        </div>
                                    </div>
                                <?php }
                            } else { ?>
                                <div class="no-data-message">
                                    <i class="fa fa-info-circle" style="font-size: 48px; color: #ccc; margin-bottom: 15px;"></i>
                                    <p>No inactive sub-categories available.</p>
                                </div>
                            <?php } ?>
        </div>
                        
                        <!-- Active Categories Tab -->
        <div class="tab-pane fade active in" id="running">
                            <?php if (count($active_categories) > 0) {
                                foreach ($active_categories as $category) { ?>
                                    <div class="category-item">
                                        <div class="category-name">
                        <a href="#" data-name="sub_cat_name" data-type="text" data-url="<?php echo base_url('admin_control/update_subcategory'); ?>" data-pk="<?=$category->id; ?>" class="data-modify-<?=$category->id; ?> no-style"><?=$category->sub_cat_name; ?></a>
                                        </div>
                                        <div class="category-info">
                                            <div class="category-info-item">
                                                <i class="fa fa-file-text"></i>
                                                <strong>Have Exams:</strong>
                                                <span class="exam-count"><?php echo isset($mock_count[$category->id]) ? $mock_count[$category->id] : 0; ?></span>
                                            </div>
                                            <div class="category-info-item">
                                                <i class="fa fa-book"></i>
                                                <strong>Have Courses:</strong>
                                                <span><?php echo isset($course_count[$category->id]) ? $course_count[$category->id] : 0; ?></span>
                                            </div>
                                            <div class="category-info-item">
                                                <i class="fa fa-folder"></i>
                                                <strong>Parent Category:</strong>
                        <a href="#" data-name="cat_id" data-type="select" data-url="<?php echo base_url('admin_control/update_subcategory'); ?>" data-source="<?= $str; ?>" data-value="<?= $category->cat_id; ?>" data-pk="<?= $category->id; ?>" class="data-modify-<?= $category->id; ?> no-style"><?php echo $category->category_name; ?></a>
                                            </div>
                                        </div>
                                        <div class="category-actions">
                                            <a class="btn btn-default modify" name="modify-<?=$category->id; ?>" href="#" title="Modify">
                                                <i class="glyphicon glyphicon-edit"></i>
                                            </a>
                                            <?php if($this->session->userdata('user_role_id')==1) { ?>
                                                <a class="btn btn-default" href="<?php echo base_url('admin_control/mute_subcategory/' . $category->id); ?>" title="Deactivate">
                                                    <i class="glyphicon glyphicon-off"></i>
                                                </a>
                                                <a onclick="return delete_confirmation()" href="<?php echo base_url('admin_control/delete_subcategory/' . $category->id); ?>" class="btn btn-default" title="Delete">
                                                    <i class="glyphicon glyphicon-trash"></i>
                                                </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                <?php }
                            } else { ?>
                                <div class="no-data-message">
                                    <i class="fa fa-info-circle" style="font-size: 48px; color: #ccc; margin-bottom: 15px;"></i>
                                    <p>No active sub-categories available.</p>
                                </div>
                        <?php } ?>
                    </div>
                    <?php } else { ?>
                        <div class="no-data-message">
                            <i class="fa fa-info-circle" style="font-size: 48px; color: #ccc; margin-bottom: 15px;"></i>
                            <p>No data available!</p>
        </div>
                    <?php } ?>
        </div>
    </div>
    </div>
    </div>
</div>
