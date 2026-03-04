<?php   //  echo "<pre/>"; print_r($mocks); exit(); ?>
<div id="note"> 
<?php  
    // Prioritize $message variable passed from controller over flashdata
    // This prevents flashdata from showing on multiple pages
    if (isset($message) && !empty($message)) {
        echo $message;
    } elseif ($this->session->flashdata('message')) {
        // Only read flashdata if $message is not set
        $flash_msg = $this->session->flashdata('message');
        echo $flash_msg;
        // Clear flashdata after reading to prevent it from showing again
        $this->session->set_flashdata('message', '');
    }
?>   
</div>
<style>
.status-public {
    background: #28a745;
    color: white;
    border: 1px solid #1e7e34;
}
.status-private {
    background: #ffc107;
    color: #212529;
    border: 1px solid #ffb300;
}
.status-active {
    background: #28a745;
    color: white;
    border: 1px solid #1e7e34;
}
.status-inactive {
    background: #dc3545;
    color: white;
    border: 1px solid #c82333;
}
.status-free {
    background: #007bff;
    color: white;
    border: 1px solid #0056b3;
}
.status-paid {
    background: linear-gradient(135deg, #f1b900 0%, #ffd700 100%);
    color: #212529;
    border: 1px solid #d4af37;
    font-weight: 700;
}
    .mock-actions-buttons .btn-success {
        background: #28a745;
        border-color: #28a745;
        color: white;
    }
    
    .mock-actions-buttons .btn-success:hover {
        background: #218838;
        border-color: #1e7e34;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(40, 167, 69, 0.3);
        color: white;
        text-decoration: none;
    }
    
    .mock-actions-buttons .btn-warning {
        background: #ffc107;
        border-color: #ffc107;
        color: #212529;
    }
    
    .mock-actions-buttons .btn-warning:hover {
        background: #e0a800;
        border-color: #d39e00;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(255, 193, 7, 0.3);
        color: #212529;
        text-decoration: none;
    }
    
    .mock-actions-buttons .btn-info {
        background: #17a2b8;
        border-color: #17a2b8;
        color: white;
    }
    
    .mock-actions-buttons .btn-info:hover {
        background: #138496;
        border-color: #117a8b;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(23, 162, 184, 0.3);
        color: white;
        text-decoration: none;
    }
    
    .mock-actions-buttons .btn-danger {
        background: #dc3545;
        border-color: #dc3545;
        color: white;
    }
    
    .mock-actions-buttons .btn-danger:hover {
        background: #c82333;
        border-color: #bd2130;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(220, 53, 69, 0.3);
        color: white;
        text-decoration: none;
    }
.table td {
    vertical-align: top;
    padding: 15px !important;
}
    @media (max-width: 767px) {
        .mock-list-header {
            padding: 15px 20px;
        }
        
        .mock-list-header h3 {
            font-size: 18px;
        }
        
        .mock-list-content {
            padding: 15px;
        }
        
        .mock-cards-container {
            gap: 15px;
        }
        
        .mock-card {
            margin-bottom: 0;
        }
        
        .mock-card-header {
            padding: 15px;
        }
        
        .mock-card-title h4 {
            font-size: 16px;
        }
        
        .mock-code-badge {
            font-size: 11px;
            padding: 5px 12px;
        }
        
        .mock-card-body {
            padding: 15px;
        }
        
        .mock-info-grid {
            grid-template-columns: 1fr;
            gap: 12px;
        }
        
        .mock-info-item {
            padding: 10px;
        }
        
        .mock-info-item .info-label {
            font-size: 10px;
            min-width: auto;
        }
        
        .mock-info-item .info-value {
            font-size: 13px;
        }
        
        .status-badges-container {
            gap: 6px;
        }
        
        .mock-status-badge {
            font-size: 10px;
            padding: 5px 10px;
        }
        
        .mock-syllabus {
            padding: 10px;
        }
        
        .mock-syllabus .syllabus-label {
            font-size: 11px;
        }
        
        .mock-syllabus .syllabus-text {
            font-size: 13px;
        }
        
        .mock-actions {
            margin-top: 15px;
            padding-top: 15px;
        }
        
        .mock-actions-label {
            font-size: 11px;
            margin-bottom: 10px;
        }
        
        .mock-actions-buttons {
            flex-direction: row;
            width: 100%;
            gap: 8px;
        }
        
        .mock-actions-buttons .btn {
            flex: 1;
            min-width: auto;
            justify-content: center;
            padding: 8px 12px;
            font-size: 12px;
        }
        
        .mock-actions-buttons .btn i {
            font-size: 14px;
        }
        
        .mock-actions-buttons .btn span.btn-text {
            display: none !important;
        }
        
        .mock-filter-form {
            margin-bottom: 15px;
        }
        
        .mock-search-input {
            width: 100%;
            padding: 10px 12px;
            font-size: 16px;
            border-radius: 4px;
            box-sizing: border-box;
        }
        
        .mock-filter-buttons {
            display: flex;
            gap: 8px;
            width: 100%;
        }
        
        .mock-filter-btn,
        .mock-reset-btn {
            flex: 1;
            padding: 10px 15px;
            font-size: 14px;
        }
    }
    @media (min-width: 768px) {
        .mock-filter-form .row {
            align-items: flex-end;
        }
        
        .mock-filter-buttons {
            flex-direction: row;
            gap: 10px;
            height: auto;
        }
        
        .mock-filter-btn,
        .mock-reset-btn {
            flex: 1;
            min-width: 100px;
            padding: 8px 15px;
        }
    }
</style>
<style>
    .mock-list-wrapper {
        background: #fff;
        border-radius: 4px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        overflow: hidden;
        margin-bottom: 20px;
    }
    
    .mock-list-header {
        background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
        border-bottom: 3px solid #FFD700;
        color: white;
        padding: 20px 25px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
    }
    
    .mock-list-header h3 {
        margin: 0;
        font-size: 22px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .mock-list-header h3 i {
        color: #FFD700;
    }
    
    .mock-list-content {
        padding: 25px;
    }
    
    .mock-cards-container {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }
    
    .mock-card {
        background: #fff;
        border: 1px solid #e0e0e0;
        border-left: 4px solid #FFD700;
        border-radius: 4px;
        padding: 0;
        transition: all 0.3s;
        box-shadow: 0 2px 4px rgba(0,0,0,0.08);
        overflow: hidden;
    }
    
    .mock-card:hover {
        box-shadow: 0 6px 12px rgba(0,0,0,0.15);
        transform: translateY(-3px);
        border-left-width: 5px;
    }
    
    .mock-card-header {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        padding: 18px 20px;
        border-bottom: 1px solid #e0e0e0;
    }
    
    .mock-card-title-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 8px;
    }
    
    .mock-card-title {
        flex: 1;
        min-width: 0;
    }
    
    .mock-card-title h4 {
        font-size: 18px;
        font-weight: 700;
        color: #2c3e50;
        margin: 0 0 5px 0;
        line-height: 1.2;
        word-break: break-word;
    }
    
    .mock-code-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #FFD700;
        color: #000;
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        white-space: nowrap;
    }
    
    .mock-card-body {
        padding: 20px;
    }
    
    .mock-info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
        margin-bottom: 15px;
    }
    
    .mock-info-item {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        padding: 12px;
        background: #f8f9fa;
        border-radius: 6px;
        transition: all 0.2s;
    }
    
    .mock-info-item:hover {
        background: #e9ecef;
    }
    
    .mock-info-item .info-label {
        font-weight: 600;
        color: #666;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 4px;
        display: block;
        min-width: 100px;
    }
    
    .mock-info-item .info-value {
        color: #2c3e50;
        font-size: 14px;
        font-weight: 600;
        flex: 1;
        word-break: break-word;
    }
    
    .status-badges-container {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        align-items: center;
    }
    
    .mock-status-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        white-space: nowrap;
    }
    
    .mock-syllabus {
        margin-top: 15px;
        padding: 12px;
        background: #f8f9fa;
        border-radius: 6px;
        border-left: 3px solid #FFD700;
    }
    
    .mock-syllabus .syllabus-label {
        font-weight: 600;
        color: #666;
        display: flex;
        align-items: center;
        gap: 6px;
        margin-bottom: 8px;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .mock-syllabus .syllabus-text {
        color: #555;
        font-size: 14px;
        line-height: 1.6;
        word-break: break-word;
    }
    
    .mock-actions {
        margin-top: 20px;
        padding-top: 20px;
        border-top: 2px solid #e0e0e0;
    }
    
    .mock-actions-label {
        font-weight: 600;
        color: #666;
        display: flex;
        align-items: center;
        gap: 6px;
        margin-bottom: 12px;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .mock-actions-buttons {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }
    
    .mock-actions-buttons .btn {
        padding: 10px 20px;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        border: none;
        flex: 1;
        min-width: 140px;
        justify-content: center;
    }
    
    .mock-actions-buttons .btn i {
        font-size: 16px;
    }
    
    .mock-actions-buttons .btn span.btn-text {
        display: inline;
    }
    
    .no-data {
        text-align: center;
        padding: 60px 20px;
        color: #666;
    }
    
    .no-data i {
        font-size: 48px;
        color: #ccc;
        margin-bottom: 15px;
    }
    
    .no-data h3 {
        color: #999;
        margin: 15px 0;
    }

    .tsc_pagination {
        margin: 0;
        padding: 0;
        list-style: none;
        display: flex;
        flex-wrap: wrap;
        gap: 6px;
    }
    
    .tsc_pagination li a,
    .tsc_pagination li .page {
        display: inline-block;
        padding: 7px 12px;
        border: 1px solid #d8dee6;
        border-radius: 4px;
        text-decoration: none;
        color: #2c3e50;
        background: #fff;
    }
    
    .tsc_pagination li a:hover {
        background: #fff8dc;
        border-color: #f1b900;
    }
    
    .tsc_pagination li .page.active {
        background: #f1b900;
        border-color: #f1b900;
        color: #000;
        font-weight: 700;
    }

    #pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 22px;
    }
    
    #pagination .pagination {
        margin: 0;
        padding: 0;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 8px;
    }
    
    #pagination .pagination > a,
    #pagination .pagination > strong,
    #pagination .pagination .page {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 38px;
        height: 38px;
        padding: 0 12px;
        border: 1px solid #d6dde5;
        border-radius: 8px;
        background: #fff;
        color: #2c3e50;
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
        transition: all 0.2s ease;
    }
    
    #pagination .pagination > a:hover,
    #pagination .pagination .page:hover {
        background: #fff8dc;
        border-color: #f1b900;
        transform: translateY(-1px);
    }
    
    #pagination .pagination .page.active,
    #pagination .pagination > strong {
        background: linear-gradient(135deg, #f1b900 0%, #ffd700 100%);
        border-color: #f1b900;
        color: #000;
        font-weight: 700;
        box-shadow: 0 3px 8px rgba(241, 185, 0, 0.3);
    }
</style>

<div class="mock-list-wrapper">
    <div class="mock-list-header">
        <?php if($exam_type=='live_mock_test') { ?>
            <h3><i class="fa fa-rocket"></i> Live Test List</h3>
        <?php } else { ?>
            <h3><i class="fa fa-puzzle-piece"></i> Mock Test List</h3>
        <?php } ?>
    </div>
    
    <div class="mock-list-content">
    <div class="block-content">
             <form method="get" action="<?= base_url('mocks/'.$exam_type) ?>" class="mock-filter-form">
                <div class="row">
                    <div class="col-md-8 col-xs-12" style="margin-bottom: 10px;">
                        <?php if($this->input->get('name')) { ?>
                        <input type="text" class="form-control mock-search-input" name="name" placeholder="Search by exam name..." value="<?= $this->input->get('name') ?>">
                    <?php } else { ?>
                        <input type="text" class="form-control mock-search-input" name="name" placeholder="Search by exam name...">
                    <?php } ?>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="mock-filter-buttons">
                            <button type="submit" class="btn btn-success mock-filter-btn">
                                <i class="fa fa-filter"></i> Filter
                            </button>
                            <button type="button" class="btn btn-danger reset_filter mock-reset-btn">
                                <i class="fa fa-refresh"></i> Reset
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            <br>
            <br>
        <div class="row">
            <div class="col-sm-12">
                <?php if (isset($mocks) AND !empty($mocks)) { ?>
                    <div class="mock-cards-container">
                        <?php
                        foreach ($mocks as $mock) {
                        ?>
                            <div class="mock-card">
                                <div class="mock-card-header">
                                    <div class="mock-card-title-row">
                                        <div class="mock-card-title">
                                            <h4><?= htmlspecialchars($mock->title_name); ?></h4>
                                            <span class="mock-code-badge">
                                                <?php 
                                                if(strlen($mock->title_id) == 1) {
                                                    echo 'MT00'.$mock->title_id;
                                                } else if(strlen($mock->title_id) == 2) {
                                                    echo 'MT0'.$mock->title_id;
                                                } else if(strlen($mock->title_id) == 3) {
                                                    echo 'MT'.$mock->title_id;
                                                }
                                                ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mock-card-body">
                                    <div class="mock-info-grid">
                                        <div class="mock-info-item">
                                            <div>
                                                <span class="info-label">Category</span>
                                                <span class="info-value"><?= htmlspecialchars($mock->category_name.' / '.$mock->sub_cat_name); ?></span>
                                            </div>
                                        </div>
                                        
                                        <div class="mock-info-item">
                                            <div>
                                                <span class="info-label">Passing Score</span>
                                                <span class="info-value"><?= $mock->pass_mark; ?>%</span>
                                            </div>
                                        </div>
                                        
                                        <div class="mock-info-item">
                                            <div>
                                                <span class="info-label">Author</span>
                                                <span class="info-value"><?= htmlspecialchars($mock->user_name); ?></span>
                                            </div>
                                        </div>
                                        
                                        <?php if ($mock->course_id) { ?>
                                        <div class="mock-info-item">
                                            <div>
                                                <span class="info-label">Course</span>
                                                <span class="info-value"><?= htmlspecialchars($mock->course_id); ?></span>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        
                                        <?php if($exam_type=='live_mock_test') { ?>
                                        <div class="mock-info-item">
                                            <div>
                                                <span class="info-label">Batch Name</span>
                                                <span class="info-value"><?= htmlspecialchars($mock->batch_name); ?></span>
                                            </div>
                                        </div>
                                        <div class="mock-info-item">
                                            <div>
                                                <span class="info-label">Batch Code</span>
                                                <span class="info-value"><?= htmlspecialchars($mock->batch_code); ?></span>
                                            </div>
                                        </div>
                                        <div class="mock-info-item">
                                            <div>
                                                <span class="info-label">Date Range</span>
                                                <span class="info-value"><?= date('d M, Y',strtotime($mock->batch_start_date)).' - '.date('d M, Y',strtotime($mock->batch_end_date)); ?></span>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        
                                        <div class="mock-info-item" style="grid-column: 1 / -1;">
                                            <div style="width: 100%;">
                                                <span class="info-label">Status</span>
                                                <div class="status-badges-container" style="margin-top: 8px;">
                                                    <span class="mock-status-badge status-<?= ($mock->public == 1) ? 'public' : 'private'; ?>">
                                                        <i class="fa fa-<?= ($mock->public == 1) ? 'globe' : 'lock'; ?>"></i> <?= ($mock->public == 1) ? 'Public' : 'Private'; ?>
                                                    </span>
                                                    <span class="mock-status-badge status-<?= ($mock->exam_active == 1) ? 'active' : 'inactive'; ?>">
                                                        <i class="fa fa-<?= ($mock->exam_active == 1) ? 'check-circle' : 'times-circle'; ?>"></i> <?= ($mock->exam_active == 1) ? 'Active' : 'Inactive'; ?>
                                                    </span>
                                                    <span class="mock-status-badge status-<?= (!empty($mock->exam_price) && $mock->exam_price > 0) ? 'paid' : 'free'; ?>">
                                                        <?php 
                                                            if (!empty($mock->exam_price) && $mock->exam_price > 0) {
                                                                $currency_symbol = isset($currency_symbol) ? $currency_symbol : '₹';
                                                                echo '<i class="fa fa-inr"></i> ' . $currency_symbol . ' ' . number_format($mock->exam_price, 0);
                                                            } else {
                                                                echo '<i class="fa fa-gift"></i> Free';
                                                            }
                                                        ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <?php if (!empty($mock->syllabus)) { ?>
                                    <div class="mock-syllabus">
                                        <span class="syllabus-label"><i class="fa fa-book"></i> Syllabus</span>
                                        <div class="syllabus-text"><?= htmlspecialchars($mock->syllabus); ?></div>
                                    </div>
                                    <?php } ?>
                                    
                                    <div class="mock-actions">
                                        <span class="mock-actions-label"><i class="fa fa-cogs"></i> Actions</span>
                                        <div class="mock-actions-buttons">
                                            <a class="btn btn-success" href="<?= base_url('mock_detail/' . $mock->title_id); ?>">
                                                <i class="fa fa-eye"></i><span class="btn-text"> View Questions</span>
                                            </a>
                                            <a class="btn btn-warning" href="<?= base_url('admin_control/export_exam_questions/' . $mock->title_id); ?>">
                                                <i class="fa fa-download"></i><span class="btn-text"> Download</span>
                                            </a>
                                            <a class="btn btn-info" href="<?= base_url('admin_control/edit_mock_detail/' . $mock->title_id); ?>">
                                                <i class="fa fa-edit"></i><span class="btn-text"> Edit Detail</span>
                                            </a>
                                            <?php if($this->session->userdata('user_role_id')==1 || $this->session->userdata('user_role_id')==3) { ?>
                                            <a onclick="return delete_confirmation()" href="<?php echo base_url('admin_control/delete_exam/' . $mock->title_id); ?>" class="btn btn-danger">
                                                <i class="glyphicon glyphicon-trash"></i><span class="btn-text"> Delete</span>
                                            </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                <?php } else { ?>
                    <div class="no-data">
                        <i class="fa fa-inbox"></i>
                        <h3>No Mock Tests Found</h3>
                        <p>No mock tests match your search criteria.</p>
                    </div>
                <?php } ?>

                <?php if (!empty($links)) { ?>
                    <div id="pagination" style="margin-top: 20px;">
                        <?php if (is_array($links)) { ?>
                            <ul class="tsc_pagination">
                                <?php foreach ($links as $link) { if (trim($link) !== '') echo '<li>' . $link . '</li>'; } ?>
                            </ul>
                        <?php } else { ?>
                            <?php echo $links; ?>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<script>
    $('.reset_filter').on('click',function()
    {
        window.location.href = "<?= base_url('mocks/'.$exam_type)?>";
    })
</script>
