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
        background: linear-gradient(135deg, #e11d80 0%, #c91a6e 100%);
        color: white;
        padding: 15px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
    }
    
    .category-header h4 {
        margin: 0;
        font-size: 18px;
        font-weight: 500;
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
    }
    
    .filter-section {
        padding: 20px;
        background: #f8f9fa;
        border-bottom: 1px solid #e9ecef;
    }
    
    .filter-form {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
        align-items: flex-end;
    }
    
    .filter-group {
        flex: 1;
        min-width: 150px;
    }
    
    .filter-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: 600;
        color: #333;
        font-size: 14px;
    }
    
    .filter-group .form-control {
        width: 100%;
        padding: 8px 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
        box-sizing: border-box;
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
    }
    
    select.form-control option {
        color: #333 !important;
        background-color: #fff !important;
        padding: 8px;
        white-space: normal !important;
        word-wrap: break-word !important;
        overflow-wrap: break-word !important;
    }
    
    .filter-btn {
        padding: 8px 20px;
        background: #e11d80;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
        font-weight: 500;
        transition: all 0.3s;
    }
    
    .filter-btn:hover {
        background: #c91a6e;
        transform: translateY(-1px);
        box-shadow: 0 2px 4px rgba(225, 29, 128, 0.3);
    }
    
    .note-text {
        padding: 15px 20px;
        background: #fff3cd;
        border-left: 4px solid #ffc107;
        margin: 0;
        color: #856404;
        font-size: 14px;
    }
    
    .block-content {
        padding: 20px;
    }
    
    .category-item {
        background: #fff;
        border: 1px solid #dee2e6;
        border-radius: 6px;
        padding: 20px;
        margin-bottom: 15px;
        transition: all 0.3s;
        box-shadow: 0 1px 2px rgba(0,0,0,0.05);
        box-sizing: border-box;
    }
    
    .category-item:hover {
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        border-color: #e11d80;
        border-width: 1px;
    }
    
    .category-content {
        display: flex;
        align-items: flex-start;
        gap: 15px;
        flex-wrap: wrap;
        margin-bottom: 15px;
        padding-bottom: 15px;
        border-bottom: 1px solid #f0f0f0;
    }
    
    .category-image-section {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        flex-shrink: 0;
    }
    
    .category-image {
        flex-shrink: 0;
    }
    
    .category-image img {
        width: 90px;
        height: 90px;
        object-fit: cover;
        border-radius: 6px;
        border: 1px solid #dee2e6;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }
    
    .category-actions {
        display: flex;
        flex-direction: column;
        gap: 8px;
        align-items: flex-start;
        justify-content: flex-start;
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
        justify-content: flex-start;
        cursor: pointer;
        font-weight: 500;
        white-space: nowrap;
        box-sizing: border-box;
        width: auto;
        height: auto;
        min-height: 32px;
    }
    
    .btn i {
        font-size: 12px;
        flex-shrink: 0;
        margin-right: 6px;
    }
    
    .btn span {
        display: inline;
    }
    
    .category-details {
        flex: 1;
        min-width: 200px;
    }
    
    .category-name {
        font-size: 18px;
        font-weight: 600;
        color: #333;
        margin-bottom: 10px;
        padding-bottom: 10px;
        border-bottom: 2px solid #f0f0f0;
    }
    
    .category-status {
        display: inline-block;
        padding: 5px 14px;
        border-radius: 12px;
        font-size: 12px;
        font-weight: 600;
        margin-top: 5px;
    }
    
    .category-status.active {
        background: #28a745;
        color: white;
    }
    
    .category-status.inactive {
        background: #6c757d;
        color: white;
    }
    
    .btn-success {
        background: #28a745;
        color: white;
    }
    
    .btn-success:hover {
        background: #218838;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(40, 167, 69, 0.3);
        color: white;
    }
    
    .btn-info {
        background: #17a2b8;
        color: white;
    }
    
    .btn-info:hover {
        background: #138496;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(23, 162, 184, 0.3);
        color: white;
    }
    
    .btn-default {
        background: #6c757d;
        color: white;
    }
    
    .btn-default:hover {
        background: #5a6268;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(108, 117, 125, 0.3);
        color: white;
    }
    
    .no-data-message {
        text-align: center;
        padding: 40px 20px;
        color: #666;
        font-size: 16px;
    }
    
    @media (max-width: 767px) {
        .category-header {
            padding: 12px 15px;
            flex-direction: column;
            align-items: flex-start;
        }
        
        .add-btn {
            width: 100%;
            justify-content: center;
        }
        
        .filter-section {
            padding: 15px;
        }
        
        .filter-form {
            flex-direction: column;
            gap: 12px;
        }
        
        .filter-group {
            width: 100%;
            min-width: 100%;
        }
        
        .filter-group .form-control {
            padding: 12px;
            padding-right: 35px;
            font-size: 16px;
            height: auto;
            min-height: 48px;
            line-height: 1.5;
        }
        
        select.form-control {
            overflow: visible !important;
            text-overflow: clip !important;
            white-space: normal !important;
            word-wrap: break-word !important;
            overflow-wrap: break-word !important;
        }
        
        select.form-control option {
            white-space: normal !important;
            word-wrap: break-word !important;
            overflow-wrap: break-word !important;
            padding: 10px;
        }
        
        .filter-btn {
            width: 100%;
            padding: 12px;
            font-size: 16px;
        }
        
        .note-text {
            padding: 12px 15px;
            font-size: 13px;
        }
        
        .block-content {
            padding: 15px;
        }
        
        .category-item {
            padding: 15px;
            margin-bottom: 12px;
        }
        
        .category-content {
            flex-direction: column;
            align-items: flex-start;
            gap: 12px;
            padding-bottom: 12px;
        }
        
        .category-image-section {
            width: 100%;
            justify-content: space-between;
            align-items: center;
        }
        
        .category-image img {
            width: 70px;
            height: 70px;
        }
        
        .category-actions {
            flex-direction: row;
            gap: 8px;
            flex-wrap: wrap;
        }
        
        .category-name {
            font-size: 16px;
            width: 100%;
            padding-bottom: 8px;
            margin-top: 10px;
        }
        
        .btn {
            width: 32px;
            height: 32px;
            min-width: 32px;
            min-height: 32px;
            padding: 0;
            justify-content: center;
        }
        
        .btn span {
            display: none !important;
        }
        
        .btn i {
            font-size: 14px;
            margin-right: 0;
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
        <h4>Sub Sub Sub-category List</h4>
        <a class="add-btn" href="<?php echo base_url('admin_control/sub_sub_subcategory_form'); ?>">
            <i class="glyphicon glyphicon-plus-sign"></i> Add Sub Sub Sub Category
        </a>
    </div>
    
    <div class="note-text">
        <strong>Note:</strong> Name must be LONG ANSWER, PDF, VIDEO & MCQ.
    </div>
    
    <div class="filter-section">
        <form method="get" class="filter-form">
            <div class="filter-group">
                <label>Category:</label>
                                <?php 
                if(isset($_GET['category'])) {
                    echo form_dropdown('category', $categories, $_GET['category'], 'id="parent-category" class="form-control"');
                                } else {
                    echo form_dropdown('category', $categories, '', 'id="parent-category" class="form-control"');
                                }
                                ?>
                            </div>
            <div class="filter-group">
                <label>Sub Category:</label>
                     <?php 
                if(isset($_GET['sub_category'])) {
                    echo form_dropdown('sub_category', isset($option2) ? $option2 : array('Select Sub Category'), $_GET['sub_category'], 'id="sub_category" class="form-control"');
                                } else {
                    echo form_dropdown('sub_category', array('' => 'Select Sub Category'), '', 'id="sub_category" class="form-control"');
                                }
                    ?>
                </div>
            <div class="filter-group">
                <label>Sub Sub Category:</label>
                     <?php 
                if(isset($_GET['sub_sub_category'])) {
                    echo form_dropdown('sub_sub_category', isset($option3) ? $option3 : array('Select Sub Sub Category'), $_GET['sub_sub_category'], 'id="sub_sub_category" class="form-control"');
                                } else {
                    echo form_dropdown('sub_sub_category', array('' => 'Select Sub Sub Category'), '', 'id="sub_sub_category" class="form-control"');
                                }
                    ?>
                </div>
            <div class="filter-group">
                <button type="submit" class="filter-btn">
                    <i class="fa fa-search"></i> Search
                </button>
                </div>
                </form>
        </div>
    
    <div class="block-content">
        <div class="row">
    <div class="col-sm-12">
                <?php if(isset($sub_sub_sub_categories) && count($sub_sub_sub_categories) > 0) {
            foreach ($sub_sub_sub_categories as $category) { ?>
                        <div class="category-item">
                            <div class="category-content">
                                <div class="category-image-section">
                                    <div class="category-image">
                                        <img src="<?=base_url('uploads/category_images/'.$category->icon_class); ?>" alt="<?=$category->name; ?>">
                                    </div>
                                    <div class="category-actions">
                        <?php if($category->name!='MCQ') { ?>
                                            <a class="btn btn-success" href="<?php echo base_url('create_syllabus_questions?id='.$category->id.'&type='.strtolower($category->name).'&back_url='.urlencode(base_url('admin_control/view_sub_sub_subcategories?category='.$_GET['category'].'&sub_category='.$_GET['sub_category'].'&sub_sub_category='.$_GET['sub_sub_category']))); ?>" title="Add Questions">
                                                <i class="glyphicon glyphicon-plus"></i> <span>Add Questions</span>
                                            </a>
                         <?php } ?>
                                        <a class="btn btn-info" href="<?php 
                                            $back_url = base_url('admin_control/view_sub_sub_subcategories?category='.$_GET['category'].'&sub_category='.$_GET['sub_category'].'&sub_sub_category='.$_GET['sub_sub_category']);
                                            echo base_url('view_syllabus_questions?id='.$category->id.'&type='.strtolower($category->name).'&back_url='.urlencode($back_url)); 
                                        ?>" title="View Questions">
                                            <i class="glyphicon glyphicon-eye-open"></i> <span>View Questions</span>
                                        </a>
                                        <a class="btn btn-default" href="<?php echo base_url('admin_control/sub_sub_subcategory_form?category='.$_GET['category'].'&sub_category='.$_GET['sub_category'].'&sub_sub_category='.$_GET['sub_sub_category'].'&id='.$category->id); ?>" title="Modify">
                                            <i class="glyphicon glyphicon-edit"></i> <span>Modify</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="category-details">
                                    <div class="category-name">
                                        <?=$category->name; ?>
                                    </div>
                                    <span class="category-status <?=$category->status==1 ? 'active' : 'inactive'; ?>">
                                        <?=$category->status==1 ? 'Active' : 'In-Active'; ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    <?php }
                } else { ?>
                    <div class="no-data-message">
                        <i class="fa fa-info-circle" style="font-size: 48px; color: #ccc; margin-bottom: 15px;"></i>
                        <p>No Sub Sub Sub-categories found</p>
                    </div>
                <?php } ?>
            </div>
    </div>
    </div>
    </div>

<script>
$('select#parent-category').change(function() {
    var category = $(this).val();
    var link = '<?php echo base_url()?>'+'admin_control/get_subcategories_ajax/'+category;
    $.ajax({
        data: category,
        url: link
    }).done(function(subcategories) {
        console.log(subcategories);
        $('#sub_category').html(subcategories);
                $('#sub_sub_category').empty().html("<option>Select Sub Category first</option>");
    });
});

$('select#sub_category').change(function() {
    var sub_category = $(this).val();
    var link = '<?php echo base_url()?>'+'admin_control/get_sub_subcategories_ajax/'+sub_category;
    $.ajax({
        data: sub_category,
        url: link
    }).done(function(subcategories) {
        console.log(subcategories);
        $('#sub_sub_category').html(subcategories);
    });
});
</script>
