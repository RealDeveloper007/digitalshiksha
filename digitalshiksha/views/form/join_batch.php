<style>
    .join-batch-wrapper {
        background: #fff;
        border-radius: 4px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        overflow: hidden;
        margin: 12px 0;
    }
    
    .join-batch-header {
        background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
        border-bottom: 3px solid #FFD700;
        color: white;
        padding: 10px 15px;
    }
    
    .join-batch-header h4 {
        margin: 0;
        font-size: 16px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .join-batch-header h4 i {
        color: #FFD700;
        font-size: 14px;
    }
    
    .join-batch-content {
        padding: 12px;
    }
    
    /* Override negative margins that cut off inputs */
    .join-batch-wrapper .form-horizontal .form-group,
    .join-batch-wrapper .form-group {
        margin-right: 0 !important;
        margin-left: 0 !important;
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
        color: #FFD700;
    }
    
    .form-control {
        width: 100%;
        padding: 6px 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 12px;
        transition: all 0.3s;
    }
    
    .form-control:focus {
        border-color: #FFD700;
        border-width: 2px;
        box-shadow: 0 0 0 0.2rem rgba(255, 215, 0, 0.25);
        outline: 0;
    }
    
    .btn-primary {
        background: #FFD700;
        color: #000;
        border: none;
        padding: 6px 12px;
        font-size: 12px;
        font-weight: 600;
        border-radius: 4px;
        cursor: pointer;
        transition: all 0.3s;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    
    .btn-primary i {
        font-size: 12px;
    }
    
    .btn-primary:hover {
        background: #FFC107;
        box-shadow: 0 4px 8px rgba(255, 215, 0, 0.3);
        transform: translateY(-2px);
    }
    
    .alert {
        margin-bottom: 12px;
        border-radius: 4px;
    }
    
    @media (max-width: 767px) {
        .join-batch-wrapper {
            margin: 10px 0;
        }
        
        .join-batch-header {
            padding: 10px 12px;
        }
        
        .join-batch-header h4 {
            font-size: 14px;
        }
        
        .join-batch-header h4 i {
            font-size: 12px;
        }
        
        .join-batch-content {
            padding: 10px;
        }
        
        .form-group {
            margin-bottom: 10px;
        }
        
        .form-group label {
            font-size: 11px;
            margin-bottom: 4px;
        }
        
        .form-control {
            padding: 8px 10px;
            font-size: 12px;
        }
        
        .btn-primary {
            width: 100%;
            padding: 8px 12px;
            font-size: 12px;
        }
        
        .btn-primary i {
            font-size: 12px;
        }
    }
    
    /* Desktop Optimizations */
    @media (min-width: 768px) {
        .join-batch-wrapper {
            margin: 12px 0;
        }
        
        .join-batch-header {
            padding: 10px 15px;
        }
        
        .join-batch-content {
            padding: 12px;
        }
        
        .form-group {
            margin-bottom: 12px;
        }
    }
</style>

<div class="join-batch-wrapper">
    <div class="join-batch-header">
        <h4><i class="fa fa-users"></i> Join Batch</h4>
    </div>
    
    <div class="join-batch-content">
        <?php
        if (isset($message) && $message != '') {
            echo $message;
        }
        ?>
        
        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
        
        <?php echo form_open(base_url() . 'exam_control/search_batch', 'role="form" class="form-horizontal"'); ?>
        
        <div class="form-group">
            <label for="batch_code">
                Batch Code: <span class="required">*</span>
            </label>
            <?php echo form_input('batch_code', '', 'placeholder="Enter Batch Code" id="batch_code" class="form-control" required="required"') ?>
        </div>
        
        <div class="form-group">
            <button type="button" class="btn btn-primary search_batch">
                <i class="fa fa-search"></i> Submit
            </button>
        </div>
        
        <?php echo form_close() ?>
    </div>
</div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script> 
<script>
    $(".search_batch").on('click', function(){
        var code = $("input[name=batch_code]").val();
        if(code != '') {
            $.LoadingOverlay("show");
            $.ajax({
                type: 'POST',
                url: "<?= base_url('exam_control/request_join_batch')?>",
                data: { code:code },
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
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Please fill Batch Code Firstly!'
            })
        }
    })
</script>
