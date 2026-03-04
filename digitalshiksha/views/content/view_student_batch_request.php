<style>
    .batch-request-wrapper {
        background: #fff;
        border-radius: 4px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        overflow: hidden;
        margin-bottom: 12px;
    }
    
    .batch-request-header {
        background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
        border-bottom: 3px solid #FFD700;
        color: white;
        padding: 10px 15px;
    }
    
    .batch-request-header h3 {
        margin: 0;
        font-size: 16px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .batch-request-header h3 i {
        font-size: 14px;
        color: #FFD700;
    }
    
    .batch-request-content {
        padding: 12px;
    }
    
    .batch-card {
        background: #f9f9f9;
        border-left: 4px solid #FFD700;
        border-radius: 4px;
        padding: 12px;
        margin-bottom: 10px;
        transition: all 0.3s;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }
    
    .batch-card:hover {
        box-shadow: 0 4px 8px rgba(0,0,0,0.15);
        transform: translateY(-2px);
    }
    
    .batch-info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 8px;
        margin-bottom: 10px;
    }
    
    .batch-info-item {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }
    
    .batch-info-label {
        font-weight: 600;
        color: #666;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        display: flex;
        align-items: center;
        gap: 5px;
    }
    
    .batch-info-label i {
        font-size: 11px;
    }
    
    .batch-info-value {
        color: #333;
        font-size: 12px;
        font-weight: 500;
    }
    
    .batch-actions {
        margin-top: 10px;
        padding-top: 10px;
        border-top: 2px solid #e0e0e0;
    }
    
    .batch-actions-label {
        font-weight: 600;
        color: #666;
        display: block;
        margin-bottom: 8px;
        font-size: 11px;
    }
    
    .btn-group {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }
    
    .btn {
        padding: 6px 12px;
        border-radius: 4px;
        border: none;
        font-size: 12px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }
    
    .btn i {
        font-size: 12px;
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
        text-decoration: none;
    }
    
    .btn-danger {
        background: #dc3545;
        color: white;
    }
    
    .btn-danger:hover {
        background: #c82333;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(220, 53, 69, 0.3);
        color: white;
        text-decoration: none;
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
    
    @media (max-width: 767px) {
        .batch-request-wrapper {
            margin-bottom: 10px;
        }
        
        .batch-request-header {
            padding: 10px 12px;
        }
        
        .batch-request-header h3 {
            font-size: 14px;
        }
        
        .batch-request-header h3 i {
            font-size: 12px;
        }
        
        .batch-request-content {
            padding: 10px;
        }
        
        .batch-card {
            padding: 10px;
            margin-bottom: 8px;
        }
        
        .batch-info-grid {
            grid-template-columns: 1fr;
            gap: 6px;
            margin-bottom: 8px;
        }
        
        .batch-info-label {
            font-size: 10px;
        }
        
        .batch-info-label i {
            font-size: 10px;
        }
        
        .batch-info-value {
            font-size: 11px;
        }
        
        .batch-actions {
            margin-top: 8px;
            padding-top: 8px;
        }
        
        .batch-actions-label {
            font-size: 10px;
            margin-bottom: 6px;
        }
        
        .btn-group {
            flex-direction: column;
            width: 100%;
            gap: 6px;
        }
        
        .btn {
            width: 100%;
            justify-content: center;
            padding: 6px 12px;
            font-size: 11px;
        }
        
        .btn i {
            font-size: 11px;
        }
        
        .hidden-xxs {
            display: none !important;
        }
    }
    
    /* Desktop Optimizations */
    @media (min-width: 768px) {
        .batch-request-wrapper {
            margin-bottom: 12px;
        }
        
        .batch-request-header {
            padding: 10px 15px;
        }
        
        .batch-request-content {
            padding: 12px;
        }
        
        .batch-card {
            padding: 12px;
            margin-bottom: 10px;
        }
        
        .batch-info-grid {
            gap: 8px;
            margin-bottom: 10px;
        }
        
        .batch-actions {
            margin-top: 10px;
            padding-top: 10px;
        }
        
        .btn-group {
            gap: 8px;
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

<div class="batch-request-wrapper">
    <div class="batch-request-header">
        <h3><i class="fa fa-user-graduate"></i> Student Batch Request</h3>
    </div>
    
    <div class="batch-request-content">
        <?php if (isset($request_batches) != NULL && !empty($request_batches)) { ?>
            <div class="batch-list">
                <?php 
                $i = 1;
                foreach ($request_batches as $result) {
                    $explode_student = explode(',',$result['student_request']);
                    if(count($explode_student) > 0) {
                        foreach($explode_student as $key => $value) { 
                            $student_detail = $this->db->where('user_id',$value)->get('users')->row();
                ?>
                            <div class="batch-card">
                                <div class="batch-info-grid">
                                    <div class="batch-info-item">
                                        <span class="batch-info-label"><i class="fa fa-user"></i> Student Name</span>
                                        <span class="batch-info-value"><?= $student_detail->user_name; ?></span>
                                    </div>
                                    
                                    <div class="batch-info-item">
                                        <span class="batch-info-label"><i class="fa fa-envelope"></i> Student Email</span>
                                        <span class="batch-info-value"><?= $student_detail->user_email; ?></span>
                                    </div>
                                    
                                    <div class="batch-info-item">
                                        <span class="batch-info-label"><i class="fa fa-book"></i> Batch Name</span>
                                        <span class="batch-info-value"><?= $result['batch_name']; ?></span>
                                    </div>
                                    
                                    <div class="batch-info-item hidden-xxs">
                                        <span class="batch-info-label"><i class="fa fa-key"></i> Batch Code</span>
                                        <span class="batch-info-value"><?= $result['batch_code']; ?></span>
                                    </div>
                                </div>
                                
                                <div class="batch-actions">
                                    <span class="batch-actions-label">Actions:</span>
                                    <div class="btn-group">
                                        <a class="btn btn-success accept_batch" href="#" studentid="<?= $value?>" batchid="<?= $result['id']?>">
                                            <i class="fa fa-check"></i> Accept
                                        </a>
                                        <a class="btn btn-danger decline_request" href="#" studentid="<?= $value?>" batchid="<?= $result['id']?>">
                                            <i class="fa fa-trash"></i> Decline
                                        </a>
                                    </div>
                                </div>
                            </div>
                <?php 
                            $i++;
                        }
                    }
                }
                ?>
            </div>
        <?php } else { ?>
            <div class="no-data">
                <i class="fa fa-inbox"></i>
                <h4>No Student Batch Requests</h4>
                <p>You don't have any pending student batch requests.</p>
            </div>
        <?php } ?>
    </div>
</div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('body').on('click', '.decline_request', function() {
            var id = $(this).attr('batchid');
            var student_id = $(this).attr('studentid');
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to decline this batch!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.LoadingOverlay("show");
                    $.ajax({
                        type: 'POST',
                        url: "<?= base_url('admin_control/decline_batch')?>",
                        data: { id:id, student_id : student_id },
                        dataType: "json",
                        success: function(resultData) 
                        { 
                            $.LoadingOverlay("hide");
                            if(resultData.status) {
                                Swal.fire(
                                    'Success!',
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

        $('body').on('click', '.accept_batch', function() {
            var id = $(this).attr('batchid');
            var student_id = $(this).attr('studentid');
            $.LoadingOverlay("show");
            $.ajax({
                type: 'POST',
                url: "<?= base_url('admin_control/accept_batch')?>",
                data: { id:id, student_id : student_id },
                dataType: "json",
                success: function(resultData) 
                { 
                    $.LoadingOverlay("hide");
                    if(resultData.status) {
                        Swal.fire(
                            'Success!',
                            'You are joined new batch for Live Exam!',
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
        });
    });
</script>
