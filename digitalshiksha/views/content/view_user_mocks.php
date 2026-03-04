<div id="note">
    <?php 
    if ($message) {
        echo $message;    
    }
    ?>
</div>
<?php
$str = '[';
foreach ($categories as $value) {
    $str .= "{value:" . $value->category_id . ",text:'" . $value->category_name . " '},";
}
$str = substr($str, 0, -1);
$str .= "]";
?>

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
.mock-actions-buttons .btn-default {
    background: #6c757d;
    border-color: #6c757d;
    color: white;
}
.mock-actions-buttons .btn-default:hover {
    background: #5a6268;
    border-color: #545b62;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(108, 117, 125, 0.3);
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
.mock-list-wrapper {
    background: #fff;
    border-radius: 4px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    overflow: hidden;
    margin-bottom: 12px;
}
.mock-list-header {
    background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
    border-bottom: 3px solid #FFD700;
    color: white;
    padding: 10px 15px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 10px;
}
.mock-list-header h3 {
    margin: 0;
    font-size: 16px;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 8px;
}
.mock-list-header h3 i {
    color: #FFD700;
    font-size: 14px;
}
.mock-list-content {
    padding: 12px;
}
.mock-cards-container {
    display: flex;
    flex-direction: column;
    gap: 10px;
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
    box-shadow: 0 6px 12px rgba(255, 215, 0, 0.2);
    transform: translateY(-3px);
    border-left-width: 5px;
    border-left-color: #FFD700;
}
.mock-card-header {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    padding: 10px 12px;
    border-bottom: 1px solid #e0e0e0;
}
.mock-card-title-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 6px;
}
.mock-card-title {
    flex: 1;
    min-width: 0;
}
.mock-card-title h4 {
    font-size: 14px;
    font-weight: 700;
    color: #2c3e50;
    margin: 0 0 4px 0;
    line-height: 1.2;
    word-break: break-word;
}
.mock-code-badge {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    background: #FFD700;
    color: #000;
    padding: 4px 10px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    white-space: nowrap;
    margin-top: 6px;
}
.mock-card-body {
    padding: 12px;
}
.mock-info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 8px;
    margin-bottom: 10px;
}
.mock-info-item {
    display: flex;
    align-items: flex-start;
    gap: 8px;
    padding: 8px;
    background: #f8f9fa;
    border-radius: 6px;
    transition: all 0.2s;
}
.mock-info-item:hover {
    background: #fffef5;
    border-left: 3px solid #FFD700;
}
.mock-info-item .info-label {
    font-weight: 600;
    color: #666;
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 4px;
    display: block;
    min-width: 90px;
}
.mock-info-item .info-label i {
    color: #2c3e50;
    font-size: 11px;
}
.mock-info-item .info-value {
    color: #2c3e50;
    font-size: 12px;
    font-weight: 600;
    flex: 1;
    word-break: break-word;
}
.mock-info-item .info-value a {
    color: #2c3e50;
    text-decoration: none;
    border-bottom: 1px dashed #999;
}
.mock-info-item .info-value a:hover {
    color: #2c3e50;
    border-bottom-color: #FFD700;
}
.mock-card-title h4 a {
    color: #2c3e50;
    text-decoration: none;
}
.mock-card-title h4 a:hover {
    color: #2c3e50;
}
a.no-style {
    color: inherit !important;
    text-decoration: none !important;
    border: none !important;
}
a.no-style:hover {
    color: inherit !important;
    text-decoration: none !important;
}
.status-badges-container {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
    align-items: center;
}
.mock-status-badge {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 4px 10px;
    border-radius: 20px;
    font-size: 10px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    white-space: nowrap;
}
.mock-syllabus {
    margin-top: 10px;
    padding: 10px;
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
    margin-bottom: 6px;
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}
.mock-syllabus .syllabus-label i {
    color: #2c3e50;
    font-size: 11px;
}
.mock-syllabus .syllabus-text {
    color: #555;
    font-size: 12px;
    line-height: 1.5;
    word-break: break-word;
}
.mock-syllabus .syllabus-text a {
    color: #555;
    text-decoration: none;
    border-bottom: 1px dashed #999;
}
.mock-syllabus .syllabus-text a:hover {
    color: #2c3e50;
    border-bottom-color: #FFD700;
}
.mock-actions {
    margin-top: 10px;
    padding-top: 10px;
    border-top: 2px solid #e0e0e0;
}
.mock-actions-label {
    font-weight: 600;
    color: #666;
    display: flex;
    align-items: center;
    gap: 6px;
    margin-bottom: 8px;
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}
.mock-actions-label i {
    color: #2c3e50;
    font-size: 11px;
}
.mock-actions-buttons {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}
.mock-actions-buttons .btn {
    padding: 6px 12px;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    border: none;
    flex: 1;
    min-width: 120px;
    justify-content: center;
}
.mock-actions-buttons .btn i {
    font-size: 12px;
}
.mock-actions-buttons .btn span.btn-text {
    display: inline;
}
.no-data {
    text-align: center;
    padding: 40px 15px;
    color: #666;
}
.no-data i {
    font-size: 36px;
    color: #ccc;
    margin-bottom: 10px;
}
.no-data h3 {
    color: #999;
    margin: 10px 0;
    font-size: 14px;
}
.no-data p {
    font-size: 12px;
    margin: 0;
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

@media (max-width: 767px) {
    .mock-list-wrapper {
        margin-bottom: 10px;
    }
    .mock-list-header {
        padding: 10px 12px;
    }
    .mock-list-header h3 {
        font-size: 14px;
    }
    .mock-list-header h3 i {
        font-size: 12px;
    }
    .mock-list-content {
        padding: 10px;
    }
    .mock-cards-container {
        gap: 10px;
    }
    .mock-card {
        margin-bottom: 0;
    }
    .mock-card-header {
        padding: 10px;
    }
    .mock-card-title h4 {
        font-size: 13px;
    }
    .mock-code-badge {
        font-size: 10px;
        padding: 3px 8px;
    }
    .mock-card-body {
        padding: 10px;
    }
    .mock-info-grid {
        grid-template-columns: 1fr;
        gap: 6px;
    }
    .mock-info-item {
        padding: 8px;
    }
    .mock-info-item .info-label {
        font-size: 10px;
        min-width: auto;
    }
    .mock-info-item .info-label i {
        font-size: 10px;
    }
    .mock-info-item .info-value {
        font-size: 11px;
    }
    .status-badges-container {
        gap: 6px;
    }
    .mock-status-badge {
        font-size: 10px;
        padding: 4px 8px;
    }
    .mock-syllabus {
        padding: 8px;
        margin-top: 8px;
    }
    .mock-syllabus .syllabus-label {
        font-size: 10px;
        margin-bottom: 4px;
    }
    .mock-syllabus .syllabus-label i {
        font-size: 10px;
    }
    .mock-syllabus .syllabus-text {
        font-size: 11px;
    }
    .mock-actions {
        margin-top: 8px;
        padding-top: 8px;
    }
    .mock-actions-label {
        font-size: 10px;
        margin-bottom: 6px;
    }
    .mock-actions-label i {
        font-size: 10px;
    }
    .mock-actions-buttons {
        flex-direction: row;
        width: 100%;
        gap: 6px;
    }
    .mock-actions-buttons .btn {
        flex: 1;
        min-width: auto;
        justify-content: center;
        padding: 6px 10px;
        font-size: 11px;
    }
    .mock-actions-buttons .btn i {
        font-size: 11px;
    }
    .mock-actions-buttons .btn span.btn-text {
        display: none !important;
    }
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
        <div class="row">
            <div class="col-sm-12">
                <?php if (isset($mocks) != NULL && !empty($mocks)) { ?>
                    <div class="mock-cards-container">
                        <?php 
                        $i = 1;
                        foreach ($mocks as $mock) {
                        ?>
                            <div class="mock-card">
                                <div class="mock-card-header">
                                    <div class="mock-card-title-row">
                                        <div class="mock-card-title">
                                            <h4>
                                                <a href="#" data-name="exam_title" data-type="textarea" data-rows="2" data-url="<?php echo base_url('admin_control/update_mock_title'); ?>" data-pk="<?= $mock->title_id; ?>" class="data-modify-<?= $mock->title_id; ?> no-style"><?= htmlspecialchars($mock->title_name); ?></a>
                                            </h4>
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
                                                <span class="info-value">
                                                    <a href="#" data-name="cat_id" data-type="select" data-url="<?php echo base_url('admin_control/update_mock_title'); ?>" data-source="<?= $str; ?>" data-value="<?= $mock->category_id; ?>" data-pk="<?= $mock->title_id; ?>" class="data-modify-<?= $mock->title_id; ?> no-style"><?= htmlspecialchars($mock->category_name); ?></a>
                                                </span>
                                            </div>
                                        </div>
                                        
                                        <div class="mock-info-item">
                                            <div>
                                                <span class="info-label">Passing Score</span>
                                                <span class="info-value">
                                                    <a href="#" data-name="passing_score" data-type="text" data-url="<?php echo base_url('admin_control/update_mock_title'); ?>" data-pk="<?= $mock->title_id; ?>" class="data-modify-<?= $mock->title_id; ?> no-style"><?= $mock->pass_mark; ?>%</a>
                                                </span>
                                            </div>
                                        </div>
                                        
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
                                        
                                        <div class="mock-info-item">
                                            <div>
                                                <span class="info-label">Status</span>
                                                <div class="status-badges-container" style="margin-top: 8px;">
                                                    <span class="mock-status-badge status-<?= ($mock->exam_active == 1) ? 'active' : 'inactive'; ?>">
                                                        <i class="fa fa-<?= ($mock->exam_active == 1) ? 'check-circle' : 'times-circle'; ?>"></i> 
                                                        <a href="#" data-name="active" data-type="select" data-url="<?php echo base_url('admin_control/update_mock_title'); ?>" data-source="[{value:1,text:'Yes'},{value:0,text:'No'}]" data-value="<?= $mock->exam_active; ?>" data-pk="<?= $mock->title_id; ?>" class="data-modify-<?= $mock->title_id; ?> no-style" style="color: inherit !important; text-decoration: none !important; border: none !important;"><?= ($mock->exam_active == 1) ? 'Active' : 'Inactive'; ?></a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <?php if (!empty($mock->syllabus)) { ?>
                                    <div class="mock-syllabus">
                                        <span class="syllabus-label"><i class="fa fa-book"></i> Syllabus</span>
                                        <div class="syllabus-text">
                                            <a href="#" data-name="exam_syllabus" data-type="textarea" data-rows="2" data-url="<?php echo base_url('admin_control/update_mock_title'); ?>" data-pk="<?= $mock->title_id; ?>" class="data-modify-<?= $mock->title_id; ?> no-style"><?= htmlspecialchars($mock->syllabus . '.'); ?></a>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    
                                    <div class="mock-actions">
                                        <span class="mock-actions-label"><i class="fa fa-cogs"></i> Actions</span>
                                        <div class="mock-actions-buttons">
                                            <?php if($exam_type=='live_mock_test') { ?>
                                                <a class="btn btn-default" href="<?= base_url('exam_control/download_student_results/' . $mock->title_id); ?>" target="_blank">
                                                    <i class="glyphicon glyphicon-eye-open"></i><span class="btn-text"> View Result</span>
                                                </a>
                                            <?php } ?>
                                            <a class="btn btn-success" href="<?= base_url('mock_detail/' . $mock->title_id); ?>">
                                                <i class="glyphicon glyphicon-eye-open"></i><span class="btn-text"> View</span>
                                            </a>
                                            <a class="btn btn-default modify" name="modify-<?= $mock->title_id; ?>" href="#">
                                                <i class="glyphicon glyphicon-edit"></i><span class="btn-text"> Modify</span>
                                            </a>
                                            <a onclick="return delete_confirmation()" href="<?php echo base_url('admin_control/delete_exam/' . $mock->title_id); ?>" class="btn btn-danger">
                                                <i class="glyphicon glyphicon-trash"></i><span class="btn-text"> Delete</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php 
                        $i++;
                        }
                        ?>
                    </div>
                <?php } else { ?>
                    <div class="no-data">
                        <i class="fa fa-inbox"></i>
                        <h3>No Mock Tests Found</h3>
                        <p>You have no mocks!</p>
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
