<style>
    .batch-students-wrapper {
        background: #fff;
        border-radius: 4px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        overflow: hidden;
        margin-bottom: 12px;
    }
    
    .batch-students-header {
        background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
        border-bottom: 3px solid #FFD700;
        color: white;
        padding: 12px 15px;
        position: relative;
    }
    
    .back-to-list-btn {
        position: absolute;
        top: 12px;
        right: 15px;
        background: rgba(255, 255, 255, 0.2);
        border: 2px solid rgba(255, 215, 0, 0.5);
        color: white;
        padding: 5px 10px;
        border-radius: 4px;
        text-decoration: none;
        font-weight: 600;
        font-size: 11px;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        transition: all 0.3s;
        backdrop-filter: blur(10px);
    }
    
    .back-to-list-btn:hover {
        background: #FFD700;
        border-color: #FFD700;
        color: #000;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(255, 215, 0, 0.3);
        text-decoration: none;
    }
    
    .back-to-list-btn i {
        font-size: 10px;
    }
    
    .back-to-list-btn-mobile {
        display: none;
    }
    
    .batch-title-info {
        position: relative;
    }
    
    .back-icon-mobile {
        position: absolute;
        top: 0;
        right: 0;
        width: 36px;
        height: 36px;
        background: rgba(255, 215, 0, 0.2);
        border: 2px solid rgba(255, 215, 0, 0.6);
        border-radius: 50%;
        display: none;
        align-items: center;
        justify-content: center;
        color: #FFD700;
        text-decoration: none;
        transition: all 0.3s;
        flex-shrink: 0;
    }
    
    .back-icon-mobile:hover {
        background: #FFD700;
        border-color: #FFD700;
        color: #000;
        transform: scale(1.1);
        box-shadow: 0 4px 8px rgba(255, 215, 0, 0.4);
        text-decoration: none;
    }
    
    .back-icon-mobile i {
        font-size: 16px;
    }
    
    .batch-info-section {
        margin-bottom: 20px;
    }
    
    .batch-title-row {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 15px;
        flex-wrap: wrap;
    }
    
    .batch-icon {
        width: 45px;
        height: 45px;
        background: linear-gradient(135deg, #FFD700 0%, #FFC107 100%);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    
    .batch-icon i {
        font-size: 22px;
        color: #000;
    }
    
    .batch-title-info {
        flex: 1;
        min-width: 0;
    }
    
    .batch-name {
        font-size: 18px;
        font-weight: 700;
        color: white;
        margin: 0 0 6px 0;
        line-height: 1.2;
    }
    
    .batch-date {
        font-size: 11px;
        color: rgba(255, 255, 255, 0.8);
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 5px;
        margin-bottom: 6px;
    }
    
    .batch-date i {
        color: rgba(255, 215, 0, 0.8);
        font-size: 10px;
    }
    
    .batch-code-display {
        display: flex;
        align-items: center;
        gap: 8px;
        background: rgba(255, 255, 255, 0.15);
        padding: 6px 12px;
        border-radius: 6px;
        backdrop-filter: blur(10px);
        width: fit-content;
    }
    
    .batch-code-label {
        font-size: 10px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        opacity: 0.9;
    }
    
    .batch-code-label i {
        font-size: 10px;
    }
    
    .batch-code-value {
        font-size: 12px;
        font-weight: 700;
        color: #FFD700;
        font-family: 'Courier New', monospace;
    }
    
    .copy-batch-code {
        background: rgba(255, 215, 0, 0.2);
        border: 1px solid rgba(255, 215, 0, 0.4);
        color: #FFD700;
        padding: 4px 8px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 10px;
        font-weight: 600;
        transition: all 0.3s;
        display: inline-flex;
        align-items: center;
        gap: 4px;
        margin-left: 8px;
        white-space: nowrap;
    }
    
    .copy-batch-code:hover {
        background: rgba(255, 215, 0, 0.3);
        border-color: #FFD700;
        transform: translateY(-1px);
        box-shadow: 0 2px 4px rgba(255, 215, 0, 0.3);
    }
    
    .copy-batch-code:active {
        transform: translateY(0);
    }
    
    .copy-batch-code i {
        font-size: 10px;
        flex-shrink: 0;
    }
    
    .copy-batch-code.copied {
        background: rgba(40, 167, 69, 0.3);
        border-color: #28a745;
        color: #28a745;
    }
    
    .copy-batch-code.copied i {
        color: #28a745;
    }
    
    .copy-batch-code .copy-text {
        margin-left: 4px;
    }
    
    .batch-tabs {
        display: flex;
        gap: 6px;
        border-bottom: 2px solid rgba(255, 255, 255, 0.2);
        padding: 0;
        margin: 0;
        list-style: none;
        flex-wrap: wrap;
    }
    
    .batch-tabs li {
        margin: 0;
    }
    
    .batch-tabs a {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 8px 12px;
        color: rgba(255, 255, 255, 0.8);
        text-decoration: none;
        font-weight: 500;
        font-size: 12px;
        border-bottom: 3px solid transparent;
        transition: all 0.3s;
        position: relative;
        top: 2px;
        cursor: pointer;
    }
    
    .batch-tabs a i {
        font-size: 12px;
    }
    
    .batch-tabs a:hover {
        color: white;
        background: rgba(255, 255, 255, 0.1);
        text-decoration: none;
    }
    
    .batch-tabs li.active a {
        color: white;
        border-bottom-color: #FFD700;
        background: rgba(255, 255, 255, 0.1);
    }
    
    .batch-students-content {
        padding: 12px;
    }
    
    .students-list {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    
    .student-card {
        background: #f9f9f9;
        border-left: 4px solid #FFD700;
        border-radius: 4px;
        padding: 12px;
        transition: all 0.3s;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }
    
    .student-card:hover {
        box-shadow: 0 4px 8px rgba(0,0,0,0.15);
        transform: translateY(-2px);
    }
    
    .student-card-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 10px;
        flex-wrap: wrap;
        gap: 10px;
    }
    
    .student-info {
        flex: 1;
        min-width: 0;
    }
    
    .student-name {
        font-size: 14px;
        font-weight: 700;
        color: #2c3e50;
        margin: 0 0 6px 0;
    }
    
    .student-email {
        font-size: 12px;
        color: #666;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    
    .student-email i {
        color: #FFD700;
        font-size: 12px;
    }
    
    .student-status {
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 10px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .status-badge i {
        font-size: 10px;
    }
    
    .status-joined {
        background: #28a745;
        color: white;
        box-shadow: 0 2px 4px rgba(40, 167, 69, 0.2);
    }
    
    .status-in-progress {
        background: #ffc107;
        color: #000;
        box-shadow: 0 2px 4px rgba(255, 193, 7, 0.2);
    }
    
    .status-declined {
        background: #dc3545;
        color: white;
        box-shadow: 0 2px 4px rgba(220, 53, 69, 0.2);
    }
    
    .student-actions {
        margin-top: 15px;
        padding-top: 15px;
        border-top: 2px solid #e0e0e0;
    }
    
    .actions-label {
        font-weight: 600;
        color: #666;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 10px;
        display: block;
    }
    
    .action-buttons {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }
    
    .btn {
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
        min-width: 150px;
        justify-content: center;
    }
    
    .btn i {
        font-size: 16px;
    }
    
    .btn span {
        display: inline;
    }
    
    .btn-danger {
        background: #dc3545;
        color: white;
        box-shadow: 0 2px 4px rgba(220, 53, 69, 0.2);
    }
    
    .btn-danger:hover {
        background: #c82333;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(220, 53, 69, 0.4);
        color: white;
        text-decoration: none;
    }
    
    .btn-info {
        background: #17a2b8;
        color: white;
        box-shadow: 0 2px 4px rgba(23, 162, 184, 0.2);
    }
    
    .btn-info:hover {
        background: #138496;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(23, 162, 184, 0.4);
        color: white;
        text-decoration: none;
    }
    
    .btn-warning {
        background: #ffc107;
        color: #000;
        box-shadow: 0 2px 4px rgba(255, 193, 7, 0.2);
    }
    
    .btn-warning:hover {
        background: #e0a800;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(255, 193, 7, 0.4);
        color: #000;
        text-decoration: none;
    }
    
    .btn-primary {
        background: #FFD700;
        color: #000;
        box-shadow: 0 2px 4px rgba(255, 215, 0, 0.2);
    }
    
    .btn-primary:hover {
        background: #FFC107;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(255, 215, 0, 0.4);
        color: #000;
        text-decoration: none;
    }
    
    /* Single button styling when only one action */
    .action-buttons .btn:only-child {
        max-width: 250px;
    }
    
    @media (max-width: 767px) {
        .action-buttons .btn:only-child {
            max-width: 100%;
        }
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
    
    .tab-content {
        padding-top: 0;
    }
    
    .tab-pane {
        display: none !important;
    }
    
    .tab-pane.active {
        display: block !important;
    }
    
    @media (max-width: 767px) {
        .batch-students-header {
            padding: 20px 15px;
        }
        
        .back-to-list-btn {
            display: none;
        }
        
        .batch-title-row {
            flex-direction: row;
            align-items: center;
        }
        
        .batch-icon {
            width: 50px;
            height: 50px;
        }
        
        .batch-icon i {
            font-size: 24px;
        }
        
        .batch-title-info {
            padding-right: 50px;
        }
        
        .back-icon-mobile {
            display: flex !important;
            position: absolute;
            top: 0;
            right: 0;
            width: 32px;
            height: 32px;
            background: rgba(255, 255, 255, 0.2);
            border: 2px solid rgba(255, 215, 0, 0.5);
            border-radius: 50%;
            color: #ffffff;
        }
        
        .back-icon-mobile:hover {
            background: #FFD700;
            border-color: #FFD700;
            color: #000;
        }
        
        .back-icon-mobile i {
            font-size: 14px;
        }
        
        .back-to-list-btn-mobile {
            display: none !important;
        }
        
        .batch-name {
            font-size: 20px;
            padding-right: 0;
        }
        
        .batch-date {
            font-size: 12px;
            margin-bottom: 6px;
        }
        
        .batch-date i {
            font-size: 11px;
        }
        
        .batch-code-display {
            width: 100%;
            justify-content: space-between;
            padding: 6px 12px;
        }
        
        .batch-code-label {
            font-size: 11px;
        }
        
        .batch-code-value {
            font-size: 14px;
        }
        
        .batch-tabs {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            flex-wrap: nowrap;
        }
        
        .batch-tabs li {
            flex-shrink: 0;
        }
        
        .batch-tabs a {
            padding: 10px 15px;
            font-size: 13px;
            white-space: nowrap;
        }
        
        .batch-students-content {
            padding: 15px;
        }
        
        .student-card {
            padding: 15px;
        }
    }
    
    /* Desktop Optimizations */
    @media (min-width: 768px) {
        .back-to-list-btn {
            padding: 5px 10px;
            font-size: 11px;
        }
        
        .back-icon-mobile {
            display: none !important;
        }
        
        .student-card-header {
            flex-direction: column;
            align-items: flex-start;
        }
        
        .student-name {
            font-size: 16px;
        }
        
        .student-email {
            font-size: 13px;
        }
        
        .student-status {
            width: 100%;
            justify-content: flex-start;
        }
        
        .batch-code-display {
            flex-direction: row;
            align-items: center;
            width: 100%;
            gap: 8px;
            padding: 5px 10px;
            flex-wrap: wrap;
        }
        
        .batch-code-label {
            font-size: 10px;
            flex-shrink: 0;
        }
        
        .batch-code-value {
            word-break: break-all;
            font-size: 13px;
            flex: 1;
            min-width: 0;
        }
        
        .copy-batch-code {
            flex-shrink: 0;
            padding: 5px 10px;
            font-size: 11px;
            border-width: 1px;
        }
        
        .copy-batch-code i {
            font-size: 12px;
        }
        
        .copy-batch-code .copy-text {
            margin-left: 3px;
        }
        
        .action-buttons {
            flex-direction: row;
            width: 100%;
            gap: 8px;
        }
        
        .btn {
            flex: 1;
            min-width: auto;
            justify-content: center;
            padding: 8px 12px;
            font-size: 12px;
        }
        
        .btn i {
            font-size: 14px;
        }
        
        .btn span {
            display: none !important;
        }
        
        .actions-label {
            font-size: 11px;
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

<?php 
$join_count = $request_batches[0]->join_students != '' ? count(explode(',',$request_batches[0]->join_students)) : 0;
$decline_count = $request_batches[0]->decline_students != '' ? count(explode(',',$request_batches[0]->decline_students)) : 0;
$in_progress_count = count(explode(',',$request_batches[0]->students)) - ($join_count + $decline_count);
?>

<div class="batch-students-wrapper">
    <div class="batch-students-header">
        <a href="<?= base_url('batches') ?>" class="back-to-list-btn">
            <i class="fa fa-arrow-left"></i> Back to List
        </a>
        <div class="batch-info-section">
            <div class="batch-title-row">
                <div class="batch-icon">
                    <i class="fa fa-users"></i>
                </div>
                <div class="batch-title-info">
                    <a href="<?= base_url('batches') ?>" class="back-icon-mobile">
                        <i class="fa fa-arrow-left"></i>
                    </a>
                    <h2 class="batch-name"><?= $request_batches[0]->batch_name ?></h2>
                    <?php if(isset($request_batches[0]->created_at) && !empty($request_batches[0]->created_at)) { ?>
                    <div class="batch-date">
                        <i class="fa fa-calendar"></i>
                        <span>Created: <?= date('d M, Y', strtotime($request_batches[0]->created_at)); ?></span>
                    </div>
                    <?php } ?>
                    <div class="batch-code-display">
                        <span class="batch-code-label"><i class="fa fa-key"></i> Batch Code:</span>
                        <span class="batch-code-value" id="batchCodeValue"><?= $request_batches[0]->batch_code ?></span>
                        <button type="button" class="copy-batch-code" onclick="copyBatchCode()" title="Click to copy batch code">
                            <i class="fa fa-copy"></i>
                            <span class="copy-text">Copy</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <ul class="batch-tabs" id="batchTabs">
            <li class="active">
                <a href="#join" data-tab="join" class="tab-link">
                    <i class="fa fa-check-circle"></i> Joined
                </a>
            </li>
            <li>
                <a href="#in_progress" data-tab="in_progress" class="tab-link">
                    <i class="fa fa-clock-o"></i> In Progress
                </a>
            </li>
            <li>
                <a href="#decline_view" data-tab="decline_view" class="tab-link">
                    <i class="fa fa-times-circle"></i> Declined
                </a>
            </li>
        </ul>
    </div>
    
    <div class="batch-students-content">
        <div class="tab-content">
            <?php if (isset($request_batches) != NULL) { ?>
                <!-- Joined Students Tab -->
                <div class="tab-pane active" id="join" data-tab="join">
                    <div class="students-list">
                        <?php 
                        $i = 1;
                        $has_students = false;
                        foreach ($request_batches as $result) {
                            if(!empty($result->join_students) && trim($result->join_students) != '') {
                                $explode_student = explode(',', $result->join_students);
                                $explode_student = array_filter(array_map('trim', $explode_student)); // Remove empty values and trim
                                foreach($explode_student as $key => $value) {
                                    if(!empty($value) && $value != '') {
                                        $student_detail = $this->db->where('user_id', $value)->get('users')->row();
                                        if($student_detail) {
                                            $has_students = true;
                        ?>
                            <div class="student-card" id="student<?= $student_detail->user_id; ?>">
                                <div class="student-card-header">
                                    <div class="student-info">
                                        <h3 class="student-name"><?= $student_detail->user_name; ?></h3>
                                        <div class="student-email">
                                            <i class="fa fa-envelope"></i>
                                            <?= $student_detail->user_email; ?>
                                        </div>
                                    </div>
                                    <div class="student-status">
                                        <span class="status-badge status-joined">
                                            <i class="fa fa-check"></i> Joined
                                        </span>
                                    </div>
                                </div>
                                <div class="student-actions">
                                    <span class="actions-label"><i class="fa fa-cogs"></i> Actions</span>
                                    <div class="action-buttons">
                                        <a class="btn btn-danger decline_request" href="#" studentid="<?= $value?>" batchid="<?= $result->id?>">
                                            <i class="fa fa-trash"></i> Remove Student
                                        </a>
                                        <a class="btn btn-info" href="<?= base_url('user_control/view_user_detail/'.$value) ?>">
                                            <i class="fa fa-user"></i> View Profile
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php 
                                            $i++;
                                        }
                                    }
                                }
                            }
                        }
                        if(!$has_students) {
                        ?>
                            <div class="no-data">
                                <i class="fa fa-inbox"></i>
                                <h4>No Joined Students</h4>
                                <p>No students have joined this batch yet.</p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                
                <!-- In Progress Students Tab -->
                <div class="tab-pane" id="in_progress" data-tab="in_progress">
                    <div class="students-list">
                        <?php 
                        $i = 1;
                        $has_students = false;
                        foreach ($request_batches as $result) {
                            if(!empty($result->students) && trim($result->students) != '') {
                                $explode_student = explode(',', $result->students);
                                $explode_student = array_filter(array_map('trim', $explode_student)); // Remove empty values and trim
                                
                                // Get joined students array
                                if(!empty($result->join_students) && trim($result->join_students) != '') {
                                    $join_students = explode(',', $result->join_students);
                                    $join_students = array_filter(array_map('trim', $join_students));
                                } else {
                                    $join_students = [];
                                }
                                
                                // Get declined students array
                                if(!empty($result->decline_students) && trim($result->decline_students) != '') {
                                    $decline_students = explode(',', $result->decline_students);
                                    $decline_students = array_filter(array_map('trim', $decline_students));
                                } else {
                                    $decline_students = [];
                                }
                                
                                foreach($explode_student as $key => $value) {
                                    if(!empty($value) && $value != '') {
                                        // Check if student is NOT in joined and NOT in declined
                                        if(!in_array($value, $join_students) && !in_array($value, $decline_students)) {
                                            $student_detail = $this->db->where('user_id', $value)->get('users')->row();
                                            if($student_detail) {
                                                $has_students = true;
                        ?>
                            <div class="student-card">
                                <div class="student-card-header">
                                    <div class="student-info">
                                        <h3 class="student-name"><?= $student_detail->user_name; ?></h3>
                                        <div class="student-email">
                                            <i class="fa fa-envelope"></i>
                                            <?= $student_detail->user_email; ?>
                                        </div>
                                    </div>
                                    <div class="student-status">
                                        <span class="status-badge status-in-progress">
                                            <i class="fa fa-clock-o"></i> In Progress
                                        </span>
                                    </div>
                                </div>
                                <div class="student-actions">
                                    <span class="actions-label"><i class="fa fa-cogs"></i> Actions</span>
                                    <div class="action-buttons">
                                        <a class="btn btn-info" href="<?= base_url('user_control/view_user_detail/'.$value) ?>">
                                            <i class="fa fa-user"></i> View Profile
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php 
                                                $i++;
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        if(!$has_students) {
                        ?>
                            <div class="no-data">
                                <i class="fa fa-inbox"></i>
                                <h4>No Students In Progress</h4>
                                <p>No students are currently in progress for this batch.</p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                
                <!-- Declined Students Tab -->
                <div class="tab-pane" id="decline_view" data-tab="decline_view">
                    <div class="students-list">
                        <?php 
                        $i = 1;
                        $has_students = false;
                        foreach ($request_batches as $result) {
                            if(!empty($result->decline_students) && trim($result->decline_students) != '') {
                                $explode_student = explode(',', $result->decline_students);
                                $explode_student = array_filter(array_map('trim', $explode_student)); // Remove empty values and trim
                                
                                // Get decline status array if exists
                                $decline_student_status = [];
                                if(!empty($result->decline_student_status) && trim($result->decline_student_status) != '') {
                                    $decline_student_status = explode(',', $result->decline_student_status);
                                    $decline_student_status = array_filter(array_map('trim', $decline_student_status));
                                }
                                
                                foreach($explode_student as $key => $value) {
                                    if(!empty($value) && $value != '') {
                                        $student_detail = $this->db->where('user_id', $value)->get('users')->row();
                                        if($student_detail) {
                                            $has_students = true;
                                            $status = 'Declined';
                                            
                                            // Get decline status if available
                                            if(!empty($decline_student_status) && isset($decline_student_status[$key])) {
                                                $status_code = explode('-', $decline_student_status[$key]);
                                                if(isset($status_code[1]) && $status_code[1] == 'S') {
                                                    $status = 'Declined By Student';
                                                } else {
                                                    $status = "Declined By Teacher";
                                                }
                                            }
                        ?>
                            <div class="student-card">
                                <div class="student-card-header">
                                    <div class="student-info">
                                        <h3 class="student-name"><?= $student_detail->user_name; ?></h3>
                                        <div class="student-email">
                                            <i class="fa fa-envelope"></i>
                                            <?= $student_detail->user_email; ?>
                                        </div>
                                    </div>
                                    <div class="student-status">
                                        <span class="status-badge status-declined">
                                            <i class="fa fa-times"></i> <?= $status ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="student-actions">
                                    <span class="actions-label"><i class="fa fa-cogs"></i> Actions</span>
                                    <div class="action-buttons">
                                        <a class="btn btn-info" href="<?= base_url('user_control/view_user_detail/'.$value) ?>">
                                            <i class="fa fa-user"></i> View Profile
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php 
                                            $i++;
                                        }
                                    }
                                }
                            }
                        }
                        if(!$has_students) {
                        ?>
                            <div class="no-data">
                                <i class="fa fa-inbox"></i>
                                <h4>No Declined Students</h4>
                                <p>No students have declined this batch.</p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Tab functionality
        function switchTab(tabId) {
            // Hide all tab panes and remove inline styles
            $('.tab-pane').removeClass('active').css('display', 'none');
            
            // Remove active class from all tabs
            $('#batchTabs li').removeClass('active');
            
            // Show selected tab pane
            $('#' + tabId).addClass('active').css('display', 'block');
            
            // Add active class to clicked tab
            $('#batchTabs a[data-tab="' + tabId + '"]').parent('li').addClass('active');
            
            // Store active tab
            localStorage.setItem('activeBatchTab', tabId);
        }
        
        // Initialize: hide all tabs except the active one on page load
        $('.tab-pane').not('.active').css('display', 'none');
        $('.tab-pane.active').css('display', 'block');
        
        // Handle tab clicks
        $('#batchTabs a.tab-link').on('click', function (e) {
            e.preventDefault();
            var tabId = $(this).attr('data-tab');
            switchTab(tabId);
        });
        
        // Restore active tab from localStorage
        var activeTab = localStorage.getItem('activeBatchTab');
        if (activeTab) {
            // Remove hash if present
            activeTab = activeTab.replace('#', '');
            switchTab(activeTab);
        } else {
            // Ensure only the default active tab is visible
            switchTab('join');
        }
        
        // Delete student functionality
        $('body').on('click', '.decline_request', function() {
            var id = $(this).attr('batchid');
            var student_id = $(this).attr('studentid');
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to remove this student from the batch!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Remove',
                cancelButtonText: 'Cancel',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.LoadingOverlay("show");
                    $.ajax({
                        type: 'POST',
                        url: "<?= base_url('admin_control/remove_student_batch')?>",
                        data: { id:id, student_id : student_id },
                        dataType: "json",
                        success: function(resultData) 
                        { 
                            $.LoadingOverlay("hide");
                            if(resultData.status) {
                                $('#student'+student_id).fadeOut(300, function() {
                                    $(this).remove();
                                });
                                Swal.fire(
                                    'Removed!',
                                    resultData.message,
                                    'success'
                                );
                                setTimeout(function(){
                                    location.reload();
                                }, 2000);
                            } 
                            else 
                            {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: resultData.message
                                })
                            }
                        }
                    });
                }
            });
        });
    });
    
    function copyBatchCode() {
        var batchCodeElement = document.getElementById('batchCodeValue');
        if (!batchCodeElement) {
            console.error('Batch code element not found');
            return;
        }
        
        var batchCode = batchCodeElement.textContent.trim();
        var copyBtn = document.querySelector('.copy-batch-code');
        var copyText = copyBtn ? copyBtn.querySelector('.copy-text') : null;
        
        // Try modern Clipboard API first
        if (navigator.clipboard && window.isSecureContext) {
            navigator.clipboard.writeText(batchCode).then(function() {
                // Show success feedback
                if (copyBtn) {
                    copyBtn.classList.add('copied');
                    if (copyText) {
                        copyText.textContent = 'Copied!';
                    }
                    
                    setTimeout(function() {
                        copyBtn.classList.remove('copied');
                        if (copyText) {
                            copyText.textContent = 'Copy';
                        }
                    }, 2000);
                }
            }).catch(function(err) {
                console.error('Failed to copy:', err);
                // Fallback to old method
                fallbackCopy(batchCode, copyBtn, copyText);
            });
        } else {
            // Fallback for older browsers
            fallbackCopy(batchCode, copyBtn, copyText);
        }
    }
    
    function fallbackCopy(text, copyBtn, copyText) {
        // Create temporary textarea
        var textarea = document.createElement('textarea');
        textarea.value = text;
        textarea.style.position = 'fixed';
        textarea.style.top = '-9999px';
        textarea.style.left = '-9999px';
        textarea.setAttribute('readonly', '');
        document.body.appendChild(textarea);
        
        // Select and copy
        textarea.select();
        textarea.setSelectionRange(0, 99999); // For mobile devices
        
        try {
            var successful = document.execCommand('copy');
            if (successful) {
                // Show success feedback
                if (copyBtn) {
                    copyBtn.classList.add('copied');
                    if (copyText) {
                        copyText.textContent = 'Copied!';
                    }
                    
                    setTimeout(function() {
                        copyBtn.classList.remove('copied');
                        if (copyText) {
                            copyText.textContent = 'Copy';
                        }
                    }, 2000);
                }
            } else {
                throw new Error('Copy command failed');
            }
        } catch (err) {
            console.error('Failed to copy:', err);
            alert('Failed to copy batch code. Please copy manually: ' + text);
        }
        
        document.body.removeChild(textarea);
    }
</script>
