<?php 
$str = '[';
foreach ($user_role as $value) {
    if ($value->user_role_id != 1) {
        $str .= "{value:".$value->user_role_id.",text:'".$value->user_role_name." '},";
    }
}
$str = substr($str, 0, -1);
$str .= "]";
?>

<style>
    .user-list-wrapper {
        background: #fff;
        border-radius: 4px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        overflow: hidden;
        width: 100%;
        margin-bottom: 20px;
    }
    
    .user-header {
        background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
        border-bottom: 3px solid #FFD700;
        color: white;
        padding: 12px 15px;
        margin-bottom: 0;
    }
    
    .user-header h4 {
        margin: 0;
        font-size: 16px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .user-header h4 i {
        font-size: 14px;
        color: #FFD700;
    }
    
    .user-content {
        padding: 12px;
    }
    
    .user-tabs {
        display: flex;
        gap: 6px;
        border-bottom: 2px solid #e9ecef;
        background: #f8f9fa;
        padding: 0 12px;
        margin: -12px -12px 12px -12px;
        flex-wrap: wrap;
    }
    
    .user-tabs .tab-link {
        padding: 8px 12px;
        background: transparent;
        border: none;
        border-bottom: 3px solid transparent;
        color: #555;
        font-size: 12px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        position: relative;
        margin-bottom: -2px;
    }
    
    .user-tabs .tab-link:hover {
        color: #2c3e50;
        background: rgba(255, 255, 255, 0.8);
        border-bottom-color: rgba(255, 215, 0, 0.6);
    }
    
    .user-tabs .tab-link.active {
        color: #2c3e50;
        border-bottom-color: #FFD700;
        background: #fff;
        font-weight: 700;
        box-shadow: 0 -2px 4px rgba(0,0,0,0.05);
    }
    
    .user-tabs .tab-link i {
        font-size: 12px;
        transition: all 0.3s;
    }
    
    .user-tabs .tab-link.active i {
        color: #FFD700;
        transform: scale(1.1);
    }
    
    .user-tabs .tab-link:hover i {
        transform: scale(1.05);
    }
    
    .user-list-wrapper .tab-content .tab-pane {
        display: none !important;
    }
    
    .user-list-wrapper .tab-content .tab-pane.active {
        display: block !important;
    }
    
    .filter-section {
        background: #f8f9fa;
        padding: 12px;
        border-radius: 4px;
        margin-bottom: 12px;
        border: 1px solid #e9ecef;
    }
    
    .filter-form {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        align-items: flex-end;
    }
    
    .filter-group {
        flex: 1;
        min-width: 200px;
    }
    
    .filter-group label {
        display: block;
        font-weight: 600;
        color: #333;
        margin-bottom: 6px;
        font-size: 12px;
    }
    
    .filter-group .form-control {
        width: 100%;
        padding: 8px 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 13px;
        transition: border-color 0.3s, box-shadow 0.3s;
        box-sizing: border-box;
        min-width: 0;
    }
    
    .filter-group .form-control::placeholder {
        opacity: 0.6;
        white-space: nowrap;
        overflow: visible;
    }
    
    .filter-group .form-control:focus {
        border-color: #FFD700;
        border-width: 2px;
        box-shadow: 0 0 0 0.2rem rgba(255, 215, 0, 0.25);
        outline: 0;
    }
    
    .filter-actions {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }
    
    .btn-filter {
        padding: 8px 20px;
        font-size: 14px;
        font-weight: 500;
        border-radius: 4px;
        border: none;
        cursor: pointer;
        transition: all 0.3s;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    
    .btn-filter.btn-success {
        background: #28a745;
        color: white;
    }
    
    .btn-filter.btn-success:hover {
        background: #218838;
        transform: translateY(-1px);
        box-shadow: 0 2px 4px rgba(40, 167, 69, 0.3);
    }
    
    .btn-filter.btn-danger {
        background: #dc3545;
        color: white;
    }
    
    .btn-filter.btn-danger:hover {
        background: #c82333;
        transform: translateY(-1px);
        box-shadow: 0 2px 4px rgba(220, 53, 69, 0.3);
    }
    
    .table-responsive {
        overflow-x: hidden;
        -webkit-overflow-scrolling: touch;
    }
    
    .table-scroll-hint {
        display: none !important;
    }
    
    .table {
        width: 100%;
        margin-bottom: 0;
        background: transparent;
        border: none;
    }
    
    .table thead {
        display: none;
    }
    
    .table tbody tr {
        display: block;
        margin-bottom: 15px;
    }
    
    .table tbody td {
        display: block;
        padding: 0;
        border: none;
    }
    
    .user-info-card {
        padding: 12px;
        background: #f9f9f9;
        border-left: 4px solid #FFD700;
        border-radius: 4px;
        margin-bottom: 0;
    }
    
    .user-title-section {
        margin-bottom: 12px;
        padding-bottom: 8px;
        border-bottom: 2px solid #FFD700;
    }
    
    .user-title-section h4 {
        margin: 0 0 5px 0;
        color: #333;
        font-weight: 600;
        font-size: 14px;
    }
    
    .user-info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 8px;
        margin: 12px 0;
    }
    
    .user-info-item {
        display: flex;
        align-items: center;
        padding: 8px;
        background: white;
        border-radius: 3px;
        border: 1px solid #e0e0e0;
    }
    
    .user-info-item .info-label {
        font-weight: 600;
        color: #666;
        margin-right: 8px;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        min-width: 100px;
        max-width: 120px;
        flex-shrink: 0;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }
    
    .user-info-item .info-value {
        color: #333;
        font-size: 12px;
        font-weight: 600;
        flex: 1;
        word-wrap: break-word;
        overflow-wrap: break-word;
        word-break: break-word;
        min-width: 0;
        overflow: visible;
        white-space: normal;
    }
    
    .user-actions {
        margin-top: 12px;
        padding-top: 12px;
        border-top: 2px solid #e0e0e0;
    }
    
    .user-actions-label {
        font-weight: 600;
        color: #666;
        display: block;
        margin-bottom: 8px;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .user-info-item .info-label i {
        color: #716006;
        width: 16px;
        text-align: center;
        flex-shrink: 0;
        display: inline-block;
        font-size: 11px;
    }
    
    .btn-group {
        display: flex;
        gap: 6px;
        flex-wrap: nowrap;
        justify-content: center;
        align-items: center;
    }
    
    .btn {
        padding: 6px 10px;
        font-size: 12px;
        border-radius: 4px;
        border: none;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        cursor: pointer;
        font-weight: 500;
        white-space: nowrap;
        overflow: visible;
        flex-shrink: 0;
        min-width: 0;
    }
    
    .btn i {
        font-size: 12px;
        flex-shrink: 0;
    }
    
    .btn span {
        flex-shrink: 0;
    }
    
    .btn-edit,
    .btn-default {
        background: #ffc107;
        color: #333;
    }
    
    .btn-edit:hover,
    .btn-default:hover {
        background: #e0a800;
        color: #333;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(255, 193, 7, 0.3);
    }
    
    .btn-ban {
        background: #fd7e14;
        color: white;
    }
    
    .btn-ban:hover {
        background: #e8690b;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(253, 126, 20, 0.3);
    }
    
    .btn-reset {
        background: #17a2b8;
        color: white;
    }
    
    .btn-reset:hover {
        background: #138496;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(23, 162, 184, 0.3);
    }
    
    .btn-deactivate,
    .btn-delete {
        background: #dc3545;
        color: white;
    }
    
    .btn-deactivate:hover,
    .btn-delete:hover {
        background: #c82333;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(220, 53, 69, 0.3);
    }
    
    .no-data-message {
        text-align: center;
        padding: 60px 20px;
        color: #666;
    }
    
    .no-data-message p {
        font-size: 16px;
        margin: 0;
    }
    
    #pagination {
        margin-top: 20px;
        text-align: center;
    }
    
    .tsc_pagination {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 5px;
        list-style: none;
        padding: 0;
        margin: 0;
        max-width: 100%;
    }
    
    .tsc_pagination li {
        margin: 0;
        display: inline-block;
        flex-shrink: 0;
    }
    
    .tsc_pagination li a,
    .tsc_pagination li .page {
        padding: 6px 10px;
        border: 1px solid #dee2e6;
        border-radius: 4px;
        text-decoration: none;
        color: #666;
        font-size: 12px;
        transition: all 0.3s;
        display: inline-block;
        background: white;
        min-width: 36px;
        text-align: center;
    }
    
    .tsc_pagination li a:hover {
        background: #FFD700;
        color: #000;
        border-color: #FFD700;
    }
    
    .tsc_pagination .page.active {
        background: #FFD700;
        color: #000;
        border-color: #FFD700;
        font-weight: 600;
    }
    
    @media (max-width: 767px) {
        .user-header {
            padding: 12px 15px;
        }
        
        .user-header h4 {
            font-size: 16px;
        }
        
        .user-header h4 i {
            font-size: 14px;
        }
        
        .user-content {
            padding: 10px;
        }
        
        .user-tabs {
            padding: 0 10px;
            flex-direction: row;
            gap: 4px;
            margin: -10px -10px 10px -10px;
        }
        
        .user-tabs .tab-link {
            padding: 8px 10px;
            border-bottom: 3px solid transparent;
            border-left: none;
            width: auto;
            flex: 1;
            justify-content: center;
            font-size: 11px;
        }
        
        .user-tabs .tab-link.active {
            border-left-color: transparent;
            border-bottom-color: #FFD700;
            background: #fff;
            color: #2c3e50;
        }
        
        .user-tabs .tab-link.active i {
            color: #FFD700;
        }
        
        .filter-section {
            padding: 10px;
        }
        
        .filter-form {
            flex-direction: column;
            gap: 10px;
        }
        
        .filter-group {
            width: 100%;
            min-width: 100%;
        }
        
        .filter-group .form-control {
            padding: 8px 10px;
            font-size: 13px;
        }
        
        .filter-actions {
            width: 100%;
        }
        
        .btn-filter {
            flex: 1;
            justify-content: center;
            padding: 8px 12px;
            font-size: 13px;
        }
        
        .table-scroll-hint {
            display: none !important;
        }
        
        .user-info-card {
            padding: 12px;
        }
        
        .user-title-section h4 {
            font-size: 16px;
        }
        
        .user-info-grid {
            grid-template-columns: 1fr;
            gap: 8px;
        }
        
        .user-info-item {
            flex-direction: column;
            align-items: flex-start;
        }
        
        .user-info-item .info-label {
            margin-bottom: 5px;
            margin-right: 0;
            min-width: auto;
            width: 100%;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }
        
        .user-info-item .info-value {
            width: 100%;
            word-wrap: break-word;
        }
        
        .user-actions {
            margin-top: 12px;
            padding-top: 12px;
        }
        
        .user-actions-label {
            margin-bottom: 8px;
            font-size: 12px;
        }
        
        .btn-group {
            flex-direction: row !important;
            width: 100%;
            gap: 8px;
            flex-wrap: wrap;
            justify-content: flex-start;
        }
        
        .btn {
            width: 36px !important;
            min-width: 36px !important;
            max-width: 36px !important;
            height: 36px !important;
            padding: 0 !important;
            font-size: 0 !important;
            flex: 0 0 auto !important;
            gap: 0;
            display: inline-flex !important;
            justify-content: center !important;
            align-items: center !important;
            text-align: center;
        }
        
        .btn span.hidden-xs {
            display: none !important;
        }
        
        .btn i {
            font-size: 16px !important;
            margin: 0 !important;
            display: inline-block !important;
            line-height: 1 !important;
            flex-shrink: 0;
            vertical-align: middle;
            text-align: center;
        }
        
        .tsc_pagination {
            gap: 4px;
        }
        
        .tsc_pagination li a,
        .tsc_pagination li .page {
            padding: 6px 10px;
            font-size: 13px;
            min-width: 36px;
        }
    }
    
    @media (min-width: 768px) and (max-width: 991px) {
        .filter-group {
            min-width: 180px;
        }
    }
</style>

<div id="note">
    <?=validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>        
    <?=($this->session->flashdata('s_message')) ? $this->session->flashdata('s_message') : '' ?>        
</div>

<div class="user-list-wrapper">
    <div class="user-header">
        <h4><i class="fa fa-users"></i> User List</h4>
    </div>
    
    <div class="user-content">
        <div class="user-tabs">
            <a href="#student" class="tab-link active" data-tab="student">
                <i class="fa fa-user"></i> Student
            </a>
            <a href="#teacher" class="tab-link" data-tab="teacher">
                <i class="fa fa-user-md"></i> Teacher
            </a>
            <?php if ($this->session->userdata['user_role_id'] < 3) { ?>
                <a href="#moderator" class="tab-link" data-tab="moderator">
                    <i class="fa fa-user"></i> Moderator
                </a>
            <?php } ?>
            <?php if ($this->session->userdata['user_role_id'] < 2) { ?>
                <a href="#admin" class="tab-link" data-tab="admin">
                    <i class="fa fa-user-secret"></i> Admin
                </a>
            <?php } ?>
        </div>
        
        <div class="tab-content">
            <!-- Student Tab -->
            <div class="tab-pane active" id="student">
                <div class="filter-section">
                    <form method="get" action="<?= base_url('user_control') ?>" class="filter-form">
                        <input type="hidden" name="type" value="student">
                        <div class="filter-group">
                            <input type="text" class="form-control" name="phone" placeholder="Search by Phone no" value="<?= $this->input->get('phone') ?>">
                        </div>
                        <div class="filter-group">
                            <input type="text" class="form-control" name="name" placeholder="Search by Name" value="<?= $this->input->get('name') ?>" title="Search by Name">
                        </div>
                        <div class="filter-group">
                            <input type="text" class="form-control" name="email" placeholder="Search by Email" value="<?= $this->input->get('email') ?>">
                        </div>
                        <div class="filter-actions">
                            <button type="submit" class="btn-filter btn-success">
                                <i class="fa fa-search"></i> Filter
                            </button>
                            <button type="button" class="btn-filter btn-danger reset_filter">
                                <i class="fa fa-refresh"></i> Reset
                            </button>
                        </div>
                    </form>
                </div>
                
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>User Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if (isset($students) && !empty($students)) {
                                $i = 1;
                                foreach ($students as $suser) { 
                            ?>
                                <tr>
                                    <td>
                                        <div class="user-info-card">
                                            <div class="user-title-section">
                                                <h4><?= $suser->user_name; ?></h4>
                                            </div>
                                            
                                            <div class="user-info-grid">
                                                <div class="user-info-item">
                                                    <span class="info-label"><i class="fa fa-phone"></i> Phone:</span>
                                                    <span class="info-value"><?= $suser->user_phone; ?></span>
                                                </div>
                                                
                                                <div class="user-info-item">
                                                    <span class="info-label"><i class="fa fa-envelope"></i> Email:</span>
                                                    <span class="info-value"><?= $suser->user_email; ?></span>
                                                </div>
                                                
                                                <div class="user-info-item">
                                                    <span class="info-label"><i class="fa fa-user"></i> Role:</span>
                                                    <span class="info-value"><?= $suser->user_role_name; ?></span>
                                                </div>
                                                
                                                <?php if (!empty($suser->state_name)) { ?>
                                                <div class="user-info-item">
                                                    <span class="info-label"><i class="fa fa-map-marker"></i> State:</span>
                                                    <span class="info-value"><?= $suser->state_name; ?></span>
                                                </div>
                                                <?php } ?>
                                                
                                                <?php if (!empty($suser->district_name)) { ?>
                                                <div class="user-info-item">
                                                    <span class="info-label"><i class="fa fa-map-marker"></i> District:</span>
                                                    <span class="info-value"><?= $suser->district_name; ?></span>
                                                </div>
                                                <?php } ?>
                                                
                                                <?php if (!empty($suser->school_name)) { ?>
                                                <div class="user-info-item">
                                                    <span class="info-label"><i class="fa fa-home"></i> School:</span>
                                                    <span class="info-value"><?= $suser->school_name; ?></span>
                                                </div>
                                                <?php } ?>
                                                
                                                <?php if (!empty($suser->user_from)) { ?>
                                                <div class="user-info-item">
                                                    <span class="info-label"><i class="fa fa-calendar"></i> Registration Date:</span>
                                                    <span class="info-value"><?= date('d M, Y', strtotime($suser->user_from)); ?></span>
                                                </div>
                                                <?php } ?>
                                                
                                                <?php if (isset($suser->register_via_mobile)) { 
                                                    $is_mobile = (!empty($suser->register_via_mobile) && ($suser->register_via_mobile == 1 || strtolower($suser->register_via_mobile) == 'yes' || strtolower($suser->register_via_mobile) == 'mobile' || strtolower($suser->register_via_mobile) == 'android'));
                                                ?>
                                                <div class="user-info-item">
                                                    <span class="info-label"><i class="fa fa-<?= $is_mobile ? 'mobile' : 'globe'; ?>"></i> Register Via:</span>
                                                    <span class="info-value"><?= $is_mobile ? 'Mobile (Android)' : 'Web'; ?></span>
                                                </div>
                                                <?php } ?>
                                            </div>
                                            
                                            <div class="user-actions">
                                                <span class="user-actions-label"><i class="fa fa-cogs"></i> Actions:</span>
                                                <div class="btn-group">
                                                    <a class="btn btn-edit" href="<?= base_url('user_control/user_edit_form/'.$suser->user_id) ?>" title="Edit">
                                                        <i class="glyphicon glyphicon-edit"></i> <span class="hidden-xs">Edit</span>
                                                    </a>
                                                    <a onclick="return ban_confirmation('<?=$suser->user_name?>')" class="btn btn-ban" href="<?=base_url('user_control/ban_user_account/' . $suser->user_id); ?>" title="Ban">
                                                        <i class="glyphicon glyphicon-ban-circle"></i> <span class="hidden-xs">Ban</span>
                                                    </a>
                                                    <a class="btn btn-reset" href="<?= base_url('user_control/reset_password_by_admin/'.$suser->user_id) ?>" onclick="return confirm('Are you sure to reset password of <?=$suser->user_name; ?>?')" title="Reset Password">
                                                        <i class="glyphicon glyphicon-refresh"></i> <span class="hidden-xs">Reset</span>
                                                    </a>
                                                    <a onclick="return deactivate_confirmation('<?=$suser->user_name?>')" href="<?php echo base_url('user_control/deactivate_user_account/' . $suser->user_id); ?>" class="btn btn-deactivate" title="Deactivate">
                                                        <i class="glyphicon glyphicon-trash"></i> <span class="hidden-xs">Deactivate</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php 
                                    $i++;
                                    $count++;
                                }
                            } else {
                            ?>
                                <tr>
                                    <td>
                                        <div class="no-data-message">
                                            <p>No students found!</p>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                
                <?php if (isset($links) && !empty($links)) { ?>
                    <div id="pagination">
                        <ul class="tsc_pagination">
                            <?php foreach ($links as $link) {
                                echo "<li>". $link."</li>";
                            } ?>
                        </ul>
                    </div>
                <?php } ?>
            </div>
            
            <!-- Teacher Tab -->
            <div class="tab-pane" id="teacher">
                <div class="filter-section">
                    <form method="get" action="<?= base_url('user_control') ?>" class="filter-form">
                        <input type="hidden" name="type" value="teacher">
                        <div class="filter-group">
                            <input type="text" class="form-control" name="phone" placeholder="Search by Phone no" value="<?= $this->input->get('phone') ?>">
                        </div>
                        <div class="filter-group">
                            <input type="text" class="form-control" name="name" placeholder="Search by Name" value="<?= $this->input->get('name') ?>" title="Search by Name">
                        </div>
                        <div class="filter-group">
                            <input type="text" class="form-control" name="email" placeholder="Search by Email" value="<?= $this->input->get('email') ?>">
                        </div>
                        <div class="filter-actions">
                            <button type="submit" class="btn-filter btn-success">
                                <i class="fa fa-search"></i> Filter
                            </button>
                            <button type="button" class="btn-filter btn-danger reset_filter">
                                <i class="fa fa-refresh"></i> Reset
                            </button>
                        </div>
                    </form>
                </div>
                
                <div class="table-responsive">
                    <?php if (isset($users) != NULL) { 
                        $has_teachers = false;
                        foreach ($users as $user) {
                            if(($user->active == 1) && ($user->banned == 0) && ($user->user_role_id == 4)) {
                                $has_teachers = true;
                                break;
                            }
                        }
                        if ($has_teachers) { ?>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>User Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($users as $user) {
                                        if(($user->active == 1) && ($user->banned == 0) && ($user->user_role_id == 4)) {
                                    ?>
                                        <tr>
                                            <td>
                                                <div class="user-info-card">
                                                    <div class="user-title-section">
                                                        <h4><?= $user->user_name; ?></h4>
                                                    </div>
                                                    
                                                    <div class="user-info-grid">
                                                        <div class="user-info-item">
                                                            <span class="info-label"><i class="fa fa-phone"></i> Phone:</span>
                                                            <span class="info-value"><?= $user->user_phone; ?></span>
                                                        </div>
                                                        
                                                        <div class="user-info-item">
                                                            <span class="info-label"><i class="fa fa-envelope"></i> Email:</span>
                                                            <span class="info-value"><?= $user->user_email; ?></span>
                                                        </div>
                                                        
                                                        <div class="user-info-item">
                                                            <span class="info-label"><i class="fa fa-user"></i> Role:</span>
                                                            <span class="info-value"><?= $user->user_role_name; ?></span>
                                                        </div>
                                                        
                                                        <?php if (!empty($user->user_from)) { ?>
                                                        <div class="user-info-item">
                                                            <span class="info-label"><i class="fa fa-calendar"></i> Registration Date:</span>
                                                            <span class="info-value"><?= date('d M, Y', strtotime($user->user_from)); ?></span>
                                                        </div>
                                                        <?php } ?>
                                                        
                                                        <?php if (isset($user->register_via_mobile)) { 
                                                            $is_mobile = (!empty($user->register_via_mobile) && ($user->register_via_mobile == 1 || strtolower($user->register_via_mobile) == 'yes' || strtolower($user->register_via_mobile) == 'mobile' || strtolower($user->register_via_mobile) == 'android'));
                                                        ?>
                                                        <div class="user-info-item">
                                                            <span class="info-label"><i class="fa fa-<?= $is_mobile ? 'mobile' : 'globe'; ?>"></i> Register Via:</span>
                                                            <span class="info-value"><?= $is_mobile ? 'Mobile (Android)' : 'Web'; ?></span>
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                    
                                                    <div class="user-actions">
                                                        <span class="user-actions-label"><i class="fa fa-cogs"></i> Actions:</span>
                                                        <div class="btn-group">
                                                            <a class="btn btn-edit" href="<?= base_url('user_control/user_edit_form/'.$user->user_id) ?>" title="Edit">
                                                                <i class="glyphicon glyphicon-edit"></i> <span class="hidden-xs">Edit</span>
                                                            </a>
                                                            <a onclick="return ban_confirmation('<?=$user->user_name?>')" class="btn btn-ban" href="<?=base_url('user_control/ban_user_account/' . $user->user_id); ?>" title="Ban">
                                                                <i class="glyphicon glyphicon-ban-circle"></i> <span class="hidden-xs">Ban</span>
                                                            </a>
                                                            <a onclick="return deactivate_confirmation('<?=$user->user_name?>')" href="<?php echo base_url('user_control/deactivate_user_account/' . $user->user_id); ?>" class="btn btn-deactivate" title="Deactivate">
                                                                <i class="glyphicon glyphicon-trash"></i> <span class="hidden-xs">Deactivate</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                        $i++;
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        <?php } else { ?>
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="no-data-message">
                                                <p>No teachers found!</p>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        <?php } ?>
                    <?php } else { ?>
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="no-data-message">
                                            <p>No teachers found!</p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    <?php } ?>
                </div>
            </div>
            
            <!-- Moderator Tab -->
            <?php if ($this->session->userdata['user_role_id'] < 3) { ?>
                <div class="tab-pane" id="moderator">
                    <div class="table-responsive">
                        <?php if (isset($users) != NULL) { 
                            $has_moderators = false;
                            foreach ($users as $user) {
                                if(($user->active == 1) && ($user->banned == 0) && ($user->user_role_id == 3)) {
                                    $has_moderators = true;
                                    break;
                                }
                            }
                            if ($has_moderators) { ?>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>User Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($users as $user) {
                                            if(($user->active == 1) && ($user->banned == 0) && ($user->user_role_id == 3)) {
                                        ?>
                                            <tr>
                                                <td>
                                                    <div class="user-info-card">
                                                        <div class="user-title-section">
                                                            <h4><?= $user->user_name; ?></h4>
                                                        </div>
                                                        
                                                        <div class="user-info-grid">
                                                            <div class="user-info-item">
                                                                <span class="info-label"><i class="fa fa-phone"></i> Phone:</span>
                                                                <span class="info-value"><?= $user->user_phone; ?></span>
                                                            </div>
                                                            
                                                            <div class="user-info-item">
                                                                <span class="info-label"><i class="fa fa-envelope"></i> Email:</span>
                                                                <span class="info-value"><?= $user->user_email; ?></span>
                                                            </div>
                                                            
                                                            <div class="user-info-item">
                                                                <span class="info-label"><i class="fa fa-user"></i> Role:</span>
                                                                <span class="info-value"><?= $user->user_role_name; ?></span>
                                                            </div>
                                                            
                                                            <?php if (!empty($user->user_from)) { ?>
                                                            <div class="user-info-item">
                                                                <span class="info-label"><i class="fa fa-calendar"></i> Registration Date:</span>
                                                                <span class="info-value"><?= date('d M, Y', strtotime($user->user_from)); ?></span>
                                                            </div>
                                                            <?php } ?>
                                                            
                                                            <?php if (isset($user->register_via_mobile)) { 
                                                                $is_mobile = (!empty($user->register_via_mobile) && ($user->register_via_mobile == 1 || strtolower($user->register_via_mobile) == 'yes' || strtolower($user->register_via_mobile) == 'mobile' || strtolower($user->register_via_mobile) == 'android'));
                                                            ?>
                                                            <div class="user-info-item">
                                                                <span class="info-label"><i class="fa fa-<?= $is_mobile ? 'mobile' : 'globe'; ?>"></i> Register Via:</span>
                                                                <span class="info-value"><?= $is_mobile ? 'Mobile (Android)' : 'Web'; ?></span>
                                                            </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            <?php } else { ?>
                                <table class="table table-hover">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="no-data-message">
                                                    <p>No moderators found!</p>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            <?php } ?>
                        <?php } else { ?>
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="no-data-message">
                                                <p>No moderators found!</p>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
            
            <!-- Admin Tab -->
            <?php if ($this->session->userdata['user_role_id'] < 2) { ?>
                <div class="tab-pane" id="admin">
                    <div class="table-responsive">
                        <?php if (isset($users) != NULL) { 
                            $has_admins = false;
                            foreach ($users as $user) {
                                if(($user->active == 1) && ($user->banned == 0) && ($user->user_role_id == 2)) {
                                    $has_admins = true;
                                    break;
                                }
                            }
                            if ($has_admins) { ?>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>User Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($users as $user) {
                                            if(($user->active == 1) && ($user->banned == 0) && ($user->user_role_id == 2)) {
                                        ?>
                                            <tr>
                                                <td>
                                                    <div class="user-info-card">
                                                        <div class="user-title-section">
                                                            <h4><?= $user->user_name; ?></h4>
                                                        </div>
                                                        
                                                        <div class="user-info-grid">
                                                            <div class="user-info-item">
                                                                <span class="info-label"><i class="fa fa-phone"></i> Phone:</span>
                                                                <span class="info-value"><?= $user->user_phone; ?></span>
                                                            </div>
                                                            
                                                            <div class="user-info-item">
                                                                <span class="info-label"><i class="fa fa-envelope"></i> Email:</span>
                                                                <span class="info-value"><?= $user->user_email; ?></span>
                                                            </div>
                                                            
                                                            <div class="user-info-item">
                                                                <span class="info-label"><i class="fa fa-user"></i> Role:</span>
                                                                <span class="info-value"><?= $user->user_role_name; ?></span>
                                                            </div>
                                                            
                                                            <?php if (!empty($user->user_from)) { ?>
                                                            <div class="user-info-item">
                                                                <span class="info-label"><i class="fa fa-calendar"></i> Registration Date:</span>
                                                                <span class="info-value"><?= date('d M, Y', strtotime($user->user_from)); ?></span>
                                                            </div>
                                                            <?php } ?>
                                                            
                                                            <?php if (isset($user->register_via_mobile)) { 
                                                                $is_mobile = (!empty($user->register_via_mobile) && ($user->register_via_mobile == 1 || strtolower($user->register_via_mobile) == 'yes' || strtolower($user->register_via_mobile) == 'mobile' || strtolower($user->register_via_mobile) == 'android'));
                                                            ?>
                                                            <div class="user-info-item">
                                                                <span class="info-label"><i class="fa fa-<?= $is_mobile ? 'mobile' : 'globe'; ?>"></i> Register Via:</span>
                                                                <span class="info-value"><?= $is_mobile ? 'Mobile (Android)' : 'Web'; ?></span>
                                                            </div>
                                                            <?php } ?>
                                                        </div>
                                                        
                                                        <div class="user-actions">
                                                            <span class="user-actions-label"><i class="fa fa-cogs"></i> Actions:</span>
                                                            <div class="btn-group">
                                                                <a onclick="return ban_confirmation('<?=$user->user_name?>')" class="btn btn-ban" href="<?=base_url('user_control/ban_user_account/' . $user->user_id); ?>" title="Ban">
                                                                    <i class="glyphicon glyphicon-ban-circle"></i> <span class="hidden-xs">Ban</span>
                                                                </a>
                                                                <a onclick="return deactivate_confirmation('<?=$user->user_name?>')" href="<?php echo base_url('user_control/deactivate_user_account/' . $user->user_id); ?>" class="btn btn-deactivate" title="Deactivate">
                                                                    <i class="glyphicon glyphicon-trash"></i> <span class="hidden-xs">Deactivate</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            <?php } else { ?>
                                <table class="table table-hover">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="no-data-message">
                                                    <p>No admins found!</p>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            <?php } ?>
                        <?php } else { ?>
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="no-data-message">
                                                <p>No admins found!</p>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<script>
function ban_confirmation(name) {
    return confirm('Are you sure you want to ban ' + name + '?');
}

function deactivate_confirmation(name) {
    return confirm('Are you sure you want to deactivate ' + name + '?');
}

$(document).ready(function() {
    // Initialize tabs on page load
    var $wrapper = $('.user-list-wrapper');
    
    // Find the tab link that has active class in HTML
    var $activeTabLink = $wrapper.find('.user-tabs .tab-link.active');
    var activeTabId = null;
    
    if ($activeTabLink.length > 0) {
        activeTabId = $activeTabLink.data('tab');
    } else {
        // If no active tab, use the first one
        $activeTabLink = $wrapper.find('.user-tabs .tab-link').first();
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
    $wrapper.find('.user-tabs .tab-link').on('click', function(e) {
        e.preventDefault();
        var targetTab = $(this).data('tab');
        var $wrapper = $(this).closest('.user-list-wrapper');
        
        // Remove active class from all tabs and panes within this wrapper
        $wrapper.find('.user-tabs .tab-link').removeClass('active');
        $wrapper.find('.tab-content .tab-pane').removeClass('active');
        
        // Add active class to clicked tab and corresponding pane
        $(this).addClass('active');
        $wrapper.find('#' + targetTab).addClass('active');
    });
    
    // Reset filter functionality
    $('.reset_filter').on('click', function() {
        var form = $(this).closest('form');
        form.find('input[type="text"]').val('');
        form.submit();
    });
    
    // Show table scroll hint on mobile if table overflows
    if ($(window).width() <= 767) {
        $('.table-responsive').each(function() {
            if ($(this)[0].scrollWidth > $(this).innerWidth()) {
                $(this).siblings('.table-scroll-hint').show();
            }
        });
    }
});
</script>

<?php $this->load->view('plugin_scripts/user_ban_confirmation'); ?>
