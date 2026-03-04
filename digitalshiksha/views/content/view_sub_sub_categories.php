<style>
    .category-list-wrapper {
        background: #fff;
        border-radius: 4px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        overflow: hidden;
        width: 100%;
        margin-bottom: 12px;
    }
    
    .category-header {
        background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
        border-bottom: 3px solid #FFD700;
        color: white;
        padding: 10px 15px;
    }
    
    .category-header h4 {
        margin: 0;
        font-size: 16px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .category-header h4 i {
        color: #FFD700;
        font-size: 14px;
    }
    
    .filter-section {
        padding: 12px;
        background: #f8f9fa;
        border-bottom: 1px solid #e9ecef;
    }
    
    .filter-form {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        align-items: flex-end;
    }
    
    .filter-group {
        flex: 1;
        min-width: 200px;
    }
    
    .filter-group label {
        display: block;
        margin-bottom: 4px;
        font-weight: 600;
        color: #333;
        font-size: 12px;
    }
    
    .filter-group .form-control {
        width: 100%;
        padding: 6px 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 12px;
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
        padding: 6px 8px;
        white-space: normal !important;
        word-wrap: break-word !important;
        overflow-wrap: break-word !important;
        font-size: 12px;
    }
    
    .filter-btn {
        padding: 6px 12px;
        background: #FFD700;
        color: #000;
        border: 2px solid #FFD700;
        border-radius: 4px;
        cursor: pointer;
        font-size: 12px;
        font-weight: 500;
        transition: all 0.3s;
    }
    
    .filter-btn:hover {
        background: #f1b900;
        border-color: #f1b900;
        transform: translateY(-1px);
        box-shadow: 0 2px 4px rgba(255, 215, 0, 0.3);
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
    }
    
    .category-item:hover {
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        border-color: #FFD700;
        border-width: 1px;
    }
    
    .category-name {
        font-size: 14px;
        font-weight: 600;
        color: #333;
        margin-bottom: 10px;
        padding-bottom: 8px;
        border-bottom: 2px solid #f0f0f0;
    }
    
    .category-info {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 10px;
        padding-bottom: 10px;
        border-bottom: 1px solid #f0f0f0;
    }
    
    .category-info-item {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 12px;
        color: #666;
    }
    
    .category-info-item i {
        color: #e11d80;
        font-size: 12px;
    }
    
    .category-info-item strong {
        color: #333;
        font-weight: 600;
        margin-right: 4px;
    }
    
    .category-info-item .exam-count {
        background: #2c3e50;
        color: white;
        padding: 2px 6px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 11px;
    }
    
    .category-actions {
        display: flex;
        gap: 6px;
        flex-wrap: wrap;
    }
    
    .btn {
        padding: 6px;
        font-size: 0;
        border-radius: 4px;
        border: none;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 30px;
        height: 30px;
        cursor: pointer;
        position: relative;
    }
    
    .btn i {
        font-size: 14px;
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
    
    .btn-warning {
        background: #ffc107;
        color: #333;
    }
    
    .btn-warning:hover {
        background: #e0a800;
        color: #333;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(255, 193, 7, 0.3);
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
        padding: 40px 20px;
        color: #666;
        font-size: 16px;
    }
    
    @media (max-width: 767px) {
        .category-header {
            padding: 12px 15px;
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
        <h4>Sub Sub-category List</h4>
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
                <button type="submit" class="filter-btn">
                    <i class="fa fa-search"></i> Search
                </button>
            </div>
        </form>
    </div>
  
    <div class="block-content">
    <div class="row">
        <div class="col-sm-12">
                <?php if(isset($sub_sub_categories) && count($sub_sub_categories) > 0) {
                    // Sort by exam count (descending) - sub-subcategories with more exams first
                    $sorted_categories = $sub_sub_categories;
                    usort($sorted_categories, function($a, $b) use ($mock_count) {
                        $count_a = isset($mock_count[$a->id]) ? $mock_count[$a->id] : 0;
                        $count_b = isset($mock_count[$b->id]) ? $mock_count[$b->id] : 0;
                        return $count_b - $count_a;
                    });
                    
                    foreach ($sorted_categories as $category) { ?>
                        <div class="category-item">
                            <div class="category-name">
                                <?=$category->name; ?>
                            </div>
                            <div class="category-info">
                                <div class="category-info-item">
                                    <i class="fa fa-file-text"></i>
                                    <strong>Have Exams:</strong>
                                    <span class="exam-count"><?php echo isset($mock_count[$category->id]) ? $mock_count[$category->id] : 0; ?></span>
                                </div>
                            </div>
                            <div class="category-actions">
                                <a class="btn btn-warning" href="<?php echo base_url('admin_control/sub_subcategory_form?category='.$_GET['category'].'&sub_category='.$_GET['sub_category'].'&id='.$category->id); ?>" title="Edit">
                                    <i class="glyphicon glyphicon-pencil"></i>
                                </a>
                                <a onclick="return confirm('Are you sure to delete this sub sub category?')" class="btn btn-danger" href="<?php echo base_url('admin_control/delete_sub_subcategory/' . $category->id); ?>" title="Delete">
                                    <i class="glyphicon glyphicon-trash"></i>
                                </a>
                </div>
                </div>
                    <?php }
                } else { ?>
                    <div class="no-data-message">
                        <i class="fa fa-info-circle" style="font-size: 48px; color: #ccc; margin-bottom: 15px;"></i>
                        <p>No Sub Sub-category found</p>
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
