<style>
    .batches-wrapper {
        background: #fff;
        border-radius: 4px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        overflow: hidden;
        margin-bottom: 12px;
    }
    
    .batches-header {
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
    
    .batches-header h3 {
        margin: 0;
        font-size: 16px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .batches-header h3 i {
        color: #FFD700;
        font-size: 14px;
    }
    
    .btn-primary {
        background: #FFD700;
        color: #000;
        border: none;
        padding: 6px 12px;
        font-size: 12px;
        font-weight: 600;
        border-radius: 4px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: all 0.3s;
    }
    
    .btn-primary i {
        font-size: 12px;
    }
    
    .btn-primary:hover {
        background: #FFC107;
        box-shadow: 0 4px 8px rgba(255, 215, 0, 0.3);
        transform: translateY(-2px);
        color: #000;
        text-decoration: none;
    }
    
    .batches-content {
        padding: 12px;
    }
    
    .batch-card {
        background: #fff;
        border: 1px solid #e0e0e0;
        border-left: 4px solid #FFD700;
        border-radius: 4px;
        padding: 0;
        margin-bottom: 10px;
        transition: all 0.3s;
        box-shadow: 0 2px 4px rgba(0,0,0,0.08);
        overflow: hidden;
    }
    
    .batch-card:hover {
        box-shadow: 0 6px 12px rgba(0,0,0,0.15);
        transform: translateY(-3px);
        border-left-width: 5px;
    }
    
    .batch-card-header {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        padding: 10px 12px;
        border-bottom: 1px solid #e0e0e0;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 8px;
    }
    
    .batch-card-title {
        display: flex;
        align-items: center;
        gap: 10px;
        flex: 1;
    }
    
    .batch-card-icon {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, #FFD700 0%, #FFC107 100%);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    
    .batch-card-icon i {
        font-size: 18px;
        color: #000;
    }
    
    .batch-card-title-text {
        flex: 1;
    }
    
    .batch-card-name {
        font-size: 14px;
        font-weight: 700;
        color: #2c3e50;
        margin: 0 0 4px 0;
        line-height: 1.2;
    }
    
    .batch-card-date {
        font-size: 11px;
        color: #888;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 5px;
        margin-bottom: 4px;
    }
    
    .batch-card-date i {
        color: #888;
        font-size: 10px;
    }
    
    .batch-card-code {
        font-size: 11px;
        color: #666;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 5px;
    }
    
    .batch-card-code i {
        color: #FFD700;
        font-size: 10px;
    }
    
    .batch-card-status {
        display: flex;
        align-items: center;
        gap: 6px;
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
    
    .status-active {
        background: #28a745;
        color: white;
        box-shadow: 0 2px 4px rgba(40, 167, 69, 0.2);
    }
    
    .status-inactive {
        background: #dc3545;
        color: white;
        box-shadow: 0 2px 4px rgba(220, 53, 69, 0.2);
    }
    
    .batch-card-body {
        padding: 12px;
    }
    
    .batch-info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 8px;
        margin-bottom: 10px;
    }
    
    .batch-info-item {
        display: flex;
        align-items: flex-start;
        gap: 8px;
        padding: 8px;
        background: #f8f9fa;
        border-radius: 6px;
        transition: all 0.2s;
    }
    
    .batch-info-item:hover {
        background: #e9ecef;
    }
    
    .batch-info-icon {
        width: 30px;
        height: 30px;
        background: #fff;
        border: 2px solid #FFD700;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    
    .batch-info-icon i {
        font-size: 14px;
        color: #716006;
    }
    
    .batch-info-content {
        flex: 1;
        min-width: 0;
    }
    
    .batch-info-label {
        font-weight: 600;
        color: #666;
        font-size: 10px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 4px;
        display: block;
    }
    
    .batch-info-value {
        color: #2c3e50;
        font-size: 12px;
        font-weight: 600;
        line-height: 1.3;
        word-break: break-word;
    }
    
    /* Batch code with copy option */
    .batch-code-item {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        padding: 12px;
        background: #f8f9fa;
        border-radius: 6px;
        transition: all 0.2s;
    }
    
    .batch-code-item:hover {
        background: #e9ecef;
    }
    
    .batch-code-content {
        flex: 1;
        min-width: 0;
    }
    
    .batch-code-label {
        font-weight: 600;
        color: #666;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 6px;
        display: block;
    }
    
    .batch-code-display {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
    }
    
    .batch-code-text {
        color: #2c3e50;
        font-size: 15px;
        font-weight: 600;
        font-family: 'Courier New', monospace;
        word-break: break-all;
        flex: 1;
        min-width: 120px;
    }
    
    .copy-batch-code-btn {
        background: #FFD700;
        color: #000;
        border: 2px solid #FFD700;
        border-radius: 6px;
        padding: 8px 16px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        white-space: nowrap;
        flex-shrink: 0;
    }
    
    .copy-batch-code-btn:hover {
        background: #FFC107;
        border-color: #FFC107;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(255, 215, 0, 0.3);
    }
    
    .copy-batch-code-btn:active {
        transform: translateY(0);
    }
    
    .copy-batch-code-btn i {
        font-size: 14px;
    }
    
    .copy-batch-code-btn.copied {
        background: #28a745;
        border-color: #28a745;
        color: white;
    }
    
    .copy-batch-code-btn.copied i::before {
        content: "\f00c";
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
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .batch-actions-label i {
        font-size: 11px;
    }
    
    .btn-group {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }
    
    .btn {
        padding: 6px 12px;
        border-radius: 6px;
        border: 2px solid #e0e0e0;
        background: #fff;
        color: #333;
        font-size: 12px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        flex: 1;
        min-width: 120px;
        justify-content: center;
    }
    
    .btn:hover {
        background: #FFD700;
        border-color: #FFD700;
        color: #000;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(255, 215, 0, 0.3);
        text-decoration: none;
    }
    
    .btn i {
        font-size: 12px;
    }
    
    .btn span {
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
    
    @media (max-width: 767px) {
        .batches-header {
            padding: 15px 20px;
            flex-direction: column;
            align-items: flex-start;
        }
        
        .batches-header h3 {
            font-size: 18px;
        }
        
        .btn-primary {
            width: 100%;
            justify-content: center;
        }
        
        .batches-content {
            padding: 15px;
        }
        
        .batch-card {
            margin-bottom: 15px;
        }
        
        .batch-card-header {
            padding: 15px;
            flex-direction: column;
            align-items: flex-start;
        }
        
        .batch-card-title {
            width: 100%;
        }
        
        .batch-card-icon {
            width: 40px;
            height: 40px;
        }
        
        .batch-card-icon i {
            font-size: 18px;
        }
        
        .batch-card-name {
            font-size: 16px;
        }
        
        .batch-card-date {
            font-size: 11px;
            margin-bottom: 3px;
        }
        
        .batch-card-date i {
            font-size: 10px;
        }
        
        .batch-card-code {
            font-size: 12px;
        }
        
        .batch-card-status {
            width: 100%;
            justify-content: flex-start;
            margin-top: 10px;
        }
        
        .status-badge {
            padding: 5px 12px;
            font-size: 11px;
        }
        
        .batch-card-body {
            padding: 15px;
        }
        
        .batch-info-grid {
            grid-template-columns: 1fr;
            gap: 12px;
            margin-bottom: 15px;
        }
        
        .batch-info-item {
            padding: 10px;
        }
        
        .batch-info-icon {
            width: 32px;
            height: 32px;
        }
        
        .batch-info-icon i {
            font-size: 14px;
        }
        
        .batch-info-value {
            font-size: 14px;
        }
        
        .batch-code-item {
            padding: 10px;
            flex-direction: column;
            gap: 10px;
        }
        
        .batch-code-content {
            width: 100%;
        }
        
        .batch-code-label {
            font-size: 10px;
            margin-bottom: 5px;
        }
        
        .batch-code-display {
            width: 100%;
            flex-wrap: wrap;
            gap: 8px;
        }
        
        .batch-code-text {
            font-size: 13px;
            width: 100%;
            word-break: break-all;
            min-width: 100%;
        }
        
        .copy-batch-code-btn {
            width: 100%;
            justify-content: center;
            padding: 10px;
            font-size: 12px;
        }
        
        .batch-actions {
            margin-top: 15px;
            padding-top: 15px;
        }
        
        .btn-group {
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
        
        .batch-actions-label {
            font-size: 11px;
            margin-bottom: 8px;
        }
    }
</style>

<div id="note">
    <?=validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>
</div>

<div class="batches-wrapper">
    <div class="batches-header">
        <h3><i class="fa fa-users"></i> Batches List</h3>
        <a href="<?= base_url('admin_control/add_new_batch') ?>" class="btn-primary">
            <i class="fa fa-plus"></i> Add New Batch
        </a>
    </div>
    
    <div class="batches-content">
        <?php if (isset($batches) && !empty($batches)) { ?>
            <div class="batch-list">
                <?php 
                foreach ($batches as $batch) { 
                    $AllStudents = explode(',',$batch->students);
                    $studentCount = count($AllStudents);
                ?>
                    <div class="batch-card">
                        <div class="batch-card-header">
                            <div class="batch-card-title">
                                <div class="batch-card-icon">
                                    <i class="fa fa-users"></i>
                                </div>
                                <div class="batch-card-title-text">
                                    <h3 class="batch-card-name"><?=$batch->batch_name; ?></h3>
                                    <?php if(isset($batch->created_at) && !empty($batch->created_at)) { ?>
                                    <div class="batch-card-date">
                                        <i class="fa fa-calendar"></i>
                                        <span>Created: <?= date('d M, Y', strtotime($batch->created_at)); ?></span>
                                    </div>
                                    <?php } ?>
                                   
                                </div>
                            </div>
                            <div class="batch-card-status">
                                <span class="status-badge status-<?=$batch->status==1 ? 'active' : 'inactive'; ?>">
                                    <i class="fa fa-<?=$batch->status==1 ? 'check-circle' : 'times-circle'; ?>"></i>
                                    <?=$batch->status==1 ? 'Active' : 'Inactive'; ?>
                                </span>
                            </div>
                        </div>
                        
                        <div class="batch-card-body">
                            <div class="batch-info-grid">
                                <div class="batch-code-item">
                                    <div class="batch-info-icon">
                                        <i class="fa fa-key"></i>
                                    </div>
                                    <div class="batch-code-content">
                                        <span class="batch-code-label">Batch Code</span>
                                        <div class="batch-code-display">
                                            <span class="batch-code-text" id="batch-code-<?=$batch->id; ?>"><?=$batch->batch_code; ?></span>
                                            <button type="button" class="copy-batch-code-btn" onclick="copyBatchCode('<?=$batch->batch_code; ?>', 'batch-code-<?=$batch->id; ?>', this)">
                                                <i class="fa fa-copy"></i>
                                                <span class="copy-text">Copy</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="batch-info-item">
                                    <div class="batch-info-icon">
                                        <i class="fa fa-users"></i>
                                    </div>
                                    <div class="batch-info-content">
                                        <span class="batch-info-label">Total Students</span>
                                        <span class="batch-info-value"><?= $studentCount; ?> Student<?= $studentCount != 1 ? 's' : ''; ?></span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="batch-actions">
                                <span class="batch-actions-label"><i class="fa fa-cogs"></i> Actions</span>
                                <div class="btn-group">
                                    <a class="btn" href="<?= base_url('admin_control/batch_edit_form/'.$batch->id) ?>">
                                        <i class="glyphicon glyphicon-edit"></i>
                                        <span>Modify</span>
                                    </a>
                                    <a class="btn" href="<?= base_url('admin_control/batch_students/'.$batch->id) ?>">
                                        <i class="fa fa-eye"></i>
                                        <span>View Students</span>
                                    </a>
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
                <h4>No Batches Found</h4>
                <p>Create your first batch to get started.</p>
            </div>
        <?php } ?>
    </div>
</div>

<script>
function copyBatchCode(batchCode, elementId, button) {
    // Use the Clipboard API if available
    if (navigator.clipboard && window.isSecureContext) {
        navigator.clipboard.writeText(batchCode).then(function() {
            showCopySuccess(button);
        }).catch(function(err) {
            fallbackCopy(batchCode, button);
        });
    } else {
        // Fallback for older browsers
        fallbackCopy(batchCode, button);
    }
}

function fallbackCopy(batchCode, button) {
    // Create a temporary textarea element
    var textArea = document.createElement("textarea");
    textArea.value = batchCode;
    textArea.style.position = "fixed";
    textArea.style.left = "-999999px";
    textArea.style.top = "-999999px";
    document.body.appendChild(textArea);
    textArea.focus();
    textArea.select();
    
    try {
        var successful = document.execCommand('copy');
        if (successful) {
            showCopySuccess(button);
        } else {
            alert('Failed to copy batch code. Please copy manually: ' + batchCode);
        }
    } catch (err) {
        alert('Failed to copy batch code. Please copy manually: ' + batchCode);
    } finally {
        document.body.removeChild(textArea);
    }
}

function showCopySuccess(button) {
    var copyText = button.querySelector('.copy-text');
    var originalText = copyText.textContent;
    
    // Add copied class
    button.classList.add('copied');
    copyText.textContent = 'Copied!';
    
    // Reset after 2 seconds
    setTimeout(function() {
        button.classList.remove('copied');
        copyText.textContent = originalText;
    }, 2000);
}
</script>
