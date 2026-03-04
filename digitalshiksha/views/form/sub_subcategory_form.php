<style>
    .category-form-wrapper {
        background: #fff;
        border-radius: 4px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        overflow: hidden;
        width: 100%;
        max-width: 100%;
        box-sizing: border-box;
        margin-bottom: 12px;
    }
    
    /* Override negative margins that cut off inputs */
    .category-form-wrapper .form-horizontal .form-group,
    .category-form-wrapper .form-group {
        margin-right: 0 !important;
        margin-left: 0 !important;
    }
    
    .form-header {
        background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
        border-bottom: 3px solid #FFD700;
        color: white;
        padding: 10px 15px;
        margin-bottom: 0;
    }
    
    .form-header h4 {
        margin: 0;
        font-size: 16px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .form-header h4 i {
        font-size: 14px;
        color: #FFD700;
    }
    
    .form-body {
        padding: 12px;
    }
    
    .form-group {
        margin-bottom: 12px;
    }
    
    .form-group label {
        font-weight: 600;
        color: #333;
        margin-bottom: 6px;
        display: block;
        font-size: 12px;
    }
    
    .form-group label .required {
        color: #2c3e50;
        margin-left: 3px;
    }
    
    .form-group label i {
        font-size: 12px;
    }
    
    .form-control {
        border-radius: 4px;
        border: 1px solid #ccc;
        padding: 6px 10px;
        transition: border-color 0.3s, box-shadow 0.3s;
        color: #333;
        font-size: 12px;
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
    
    .form-control::placeholder {
        color: #999;
    }
    
    select.form-control {
        height: auto;
        min-height: 42px;
        overflow: visible !important;
        text-overflow: clip !important;
        white-space: normal !important;
        word-wrap: break-word !important;
        overflow-wrap: break-word !important;
    }
    
    select.form-control option {
        color: #333 !important;
        background-color: #fff !important;
        padding: 8px;
    }
    
    .form-actions {
        padding: 12px;
        background: #f8f9fa;
        border-top: 1px solid #e9ecef;
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }
    
    .form-actions .btn {
        padding: 6px 12px;
        font-size: 12px;
        font-weight: 500;
        border-radius: 4px;
        transition: all 0.3s;
        border: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    
    .form-actions .btn i {
        font-size: 12px;
    }
    
    .form-actions .btn-primary {
        background: #FFD700;
        color: #000;
    }
    
    .form-actions .btn-primary:hover {
        background: #f1b900;
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(255, 215, 0, 0.3);
    }
    
    .alert {
        margin-bottom: 12px;
        border-radius: 4px;
    }
    
    @media (max-width: 767px) {
        .category-form-wrapper {
            margin-bottom: 15px;
        }
        
        .form-header {
            padding: 15px 20px;
        }
        
        .form-header h4 {
            font-size: 18px;
        }
        
        .form-body {
            padding: 20px 15px;
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
            height: auto;
            min-height: 48px;
            line-height: 1.5;
        }
        
        select.form-control {
            height: auto;
            min-height: 48px;
            padding-right: 35px;
        }
        
        .form-actions {
            padding: 15px !important;
            margin: 0 !important;
            display: flex !important;
            flex-direction: row;
            flex-wrap: nowrap;
            gap: 10px;
            width: 100%;
            box-sizing: border-box;
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
            color: #000 !important;
            color: white !important;
        }
        
        .form-actions .btn i {
            flex-shrink: 0;
            font-size: 14px;
            display: inline-block !important;
        }
    }
    
    @media (min-width: 768px) {
        .category-form-wrapper {
            max-width: 100%;
        }
        
        .form-actions .btn {
            min-width: 120px;
        }
        
        .form-actions {
            justify-content: flex-start;
        }
        
        .form-body {
            padding: 30px;
        }
        
        .form-group {
            max-width: 600px;
        }
    }
</style>

<div class="block category-form-wrapper">
    <div class="form-header">
        <h4><i class="fa fa-plus-circle"></i> Create Sub Sub-category</h4>
    </div>
    
    <div class="form-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-xs-12">
                        <?php if ($message) echo $message; ?>
                        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                    </div>
                </div>
                
                <?=form_open(base_url('admin_control/create_sub_subcategory'), 'role="form" class="form-horizontal"'); ?>
                
                <?php
                $option = array();
                $option[''] = 'Select Category';
                foreach ($categories as $category) {
                    if ($category->active) {
                        $option[$category->category_id] = $category->category_name;
                    }
                }
                ?>
                
                <div class="form-group">
                    <label for="category">
                        <i class="fa fa-folder"></i> Select Category <span class="required">*</span>
                    </label>
                    <?php echo form_dropdown('category', $option, isset($cat_id) ? $cat_id : '', 'id="category" class="form-control"') ?>
                </div>
                
                <div class="form-group">
                    <label for="sub_category">
                        <i class="fa fa-tag"></i> Select Sub Category <span class="required">*</span>
                    </label>
                    <?php echo form_dropdown('sub_category', array('' => 'Select Sub Category'), '', 'id="sub_category" class="form-control"');?>
                </div>
                
                <div class="form-group">
                    <label for="sub_cat_name">
                        <i class="fa fa-tags"></i> Sub Sub-category Name <span class="required">*</span>
                    </label>
                    <?php echo form_input('sub_cat_name', '', 'id="sub_cat_name" placeholder="Enter sub sub-category name" class="form-control" required="required"') ?>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save"></i> Save
                    </button>
                </div>
                
                <?=form_close() ?>
            </div>
        </div>
    </div>
</div>

<script>
    $('select#category').change(function() {
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
