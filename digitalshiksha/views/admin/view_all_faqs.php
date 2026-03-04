<?php //echo "<pre/>"; print_r($faqs); exit(); ?>
<style>
    .faq-list-wrapper {
        background: #fff;
        border-radius: 4px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        overflow: hidden;
        width: 100%;
        margin-bottom: 20px;
    }
    
    .faq-header {
        background: linear-gradient(135deg, #e11d80 0%, #c91a6e 100%);
        color: white;
        padding: 20px 25px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
    }
    
    .faq-header h4 {
        margin: 0;
        font-size: 20px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .faq-header h4 i {
        font-size: 22px;
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
        color: #e11d80;
    }
    
    .faq-content {
        padding: 25px;
    }
    
    .faq-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }
    
    .faq-card {
        background: #fff;
        border: 1px solid #dee2e6;
        border-radius: 8px;
        padding: 20px;
        transition: all 0.3s;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        display: flex;
        flex-direction: column;
        min-height: 200px;
        overflow: hidden;
    }
    
    .faq-card:hover {
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        transform: translateY(-2px);
        border-color: #e11d80;
    }
    
    .faq-question {
        font-size: 16px;
        font-weight: 600;
        color: #333;
        margin: 0 0 15px 0;
        line-height: 1.5;
        word-wrap: break-word;
        word-break: break-word;
        overflow-wrap: break-word;
        padding-bottom: 15px;
        border-bottom: 1px solid #e9ecef;
    }
    
    .faq-question h1, .faq-question h2, .faq-question h3, 
    .faq-question h4, .faq-question h5, .faq-question h6 {
        font-size: 16px;
        font-weight: 600;
        margin: 0 0 8px 0;
        padding: 0;
        line-height: 1.5;
        color: #333;
    }
    
    .faq-question h1:last-child, .faq-question h2:last-child, 
    .faq-question h3:last-child, .faq-question h4:last-child, 
    .faq-question h5:last-child, .faq-question h6:last-child {
        margin-bottom: 0;
    }
    
    .faq-question p {
        margin: 0 0 8px 0;
        padding: 0;
        line-height: 1.5;
        color: #333;
    }
    
    .faq-question p:last-child {
        margin-bottom: 0;
    }
    
    .faq-question strong, .faq-question b {
        font-weight: 600;
        color: inherit;
    }
    
    .faq-question em, .faq-question i {
        font-style: italic;
        color: inherit;
    }
    
    .faq-question ul, .faq-question ol {
        padding-left: 20px;
        margin: 0 0 8px 0;
        color: #333;
    }
    
    .faq-question ul:last-child, .faq-question ol:last-child {
        margin-bottom: 0;
    }
    
    .faq-question ul li, .faq-question ol li {
        margin-bottom: 4px;
        line-height: 1.5;
    }
    
    .faq-question a {
        color: #e11d80;
        text-decoration: underline;
    }
    
    .faq-question a:hover {
        color: #c91a6e;
    }
    
    .faq-answer {
        color: #555;
        line-height: 1.6;
        font-size: 14px;
        margin-bottom: 15px;
        flex: 1;
        word-wrap: break-word;
        word-break: break-word;
        overflow-wrap: break-word;
    }
    
    .faq-answer h1, .faq-answer h2, .faq-answer h3, 
    .faq-answer h4, .faq-answer h5, .faq-answer h6 {
        font-size: 14px;
        font-weight: 600;
        margin: 0 0 8px 0;
        padding: 0;
        line-height: 1.6;
        color: #555;
    }
    
    .faq-answer h1:last-child, .faq-answer h2:last-child, 
    .faq-answer h3:last-child, .faq-answer h4:last-child, 
    .faq-answer h5:last-child, .faq-answer h6:last-child {
        margin-bottom: 0;
    }
    
    .faq-answer p {
        margin: 0 0 8px 0;
        padding: 0;
        line-height: 1.6;
        color: #555;
    }
    
    .faq-answer p:last-child {
        margin-bottom: 0;
    }
    
    .faq-answer strong, .faq-answer b {
        font-weight: 600;
        color: inherit;
    }
    
    .faq-answer em, .faq-answer i {
        font-style: italic;
        color: inherit;
    }
    
    .faq-answer ul, .faq-answer ol {
        padding-left: 20px;
        margin: 0 0 8px 0;
        color: #555;
    }
    
    .faq-answer ul:last-child, .faq-answer ol:last-child {
        margin-bottom: 0;
    }
    
    .faq-answer ul li, .faq-answer ol li {
        margin-bottom: 4px;
        line-height: 1.6;
    }
    
    .faq-answer a {
        color: #e11d80;
        text-decoration: underline;
    }
    
    .faq-answer a:hover {
        color: #c91a6e;
    }
    
    .faq-answer img {
        max-width: 100%;
        height: auto;
        display: block;
        margin: 8px 0;
    }
    
    .faq-answer blockquote {
        border-left: 3px solid #e11d80;
        padding-left: 15px;
        margin: 8px 0;
        font-style: italic;
        color: #666;
    }
    
    .faq-actions {
        display: flex;
        gap: 10px;
        margin-top: auto;
        padding-top: 15px;
        border-top: 1px solid #e9ecef;
        flex-shrink: 0;
    }
    
    .btn {
        padding: 8px 16px;
        font-size: 13px;
        border-radius: 4px;
        border: none;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        cursor: pointer;
        font-weight: 500;
        flex: 1;
        min-width: 0;
        white-space: nowrap;
        overflow: visible;
        text-overflow: clip;
    }
    
    .btn i {
        font-size: 13px;
        flex-shrink: 0;
    }
    
    .btn-info {
        background: #17a2b8;
        color: white;
    }
    
    .btn-info:hover {
        background: #138496;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(23, 162, 184, 0.3);
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
        padding: 60px 20px;
        color: #666;
        grid-column: 1 / -1;
    }
    
    .no-data-message i {
        font-size: 64px;
        color: #ccc;
        margin-bottom: 20px;
        display: block;
    }
    
    .no-data-message p {
        font-size: 18px;
        margin: 0;
    }
    
    @media (max-width: 767px) {
        .faq-header {
            padding: 15px 20px;
            flex-direction: column;
            align-items: flex-start;
        }
        
        .faq-header h4 {
            font-size: 18px;
        }
        
        .add-btn {
            width: 100%;
            justify-content: center;
        }
        
        .faq-content {
            padding: 20px 15px;
        }
        
        .faq-grid {
            grid-template-columns: 1fr;
            gap: 15px;
            margin-top: 15px;
        }
        
        .faq-card {
            padding: 15px;
            min-height: auto;
        }
        
        .faq-question {
            font-size: 15px;
            margin-bottom: 12px;
            padding-bottom: 12px;
        }
        
        .faq-answer {
            font-size: 13px;
            margin-bottom: 12px;
        }
        
        .faq-actions {
            padding-top: 12px;
            flex-direction: column;
        }
        
        .btn {
            padding: 10px 14px;
            font-size: 13px;
            width: 100%;
            flex: 1 1 100%;
        }
        
        .no-data-message {
            padding: 40px 15px;
        }
        
        .no-data-message i {
            font-size: 48px;
        }
        
        .no-data-message p {
            font-size: 16px;
        }
    }
    
    @media (min-width: 768px) and (max-width: 991px) {
        .faq-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    
    @media (min-width: 992px) {
        .faq-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }
</style>

<div id="note">
    <?=validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>        
    <?=(isset($message)) ? $message : ''; ?>
</div>

<div class="faq-list-wrapper">
    <div class="faq-header">
        <h4><i class="fa fa-question-circle"></i> FAQ</h4>
        <?php if ($this->session->userdata['user_role_id'] <= 3) { ?>
            <a class="add-btn" href="<?php echo base_url('faqs/add'); ?>">
                <i class="glyphicon glyphicon-plus-sign"></i> Add FAQ
            </a>
        <?php } ?>
    </div>
    
    <div class="faq-content">
        <?php if (isset($faqs) != NULL && !empty($faqs)) { ?>
            <div class="faq-grid">
                <?php
                foreach ($faqs as $faq) {
                ?>
                    <div class="faq-card">
                        <div class="faq-question">
                            <?= $faq->faq_ques; ?>
                        </div>
                        
                        <div class="faq-answer">
                            <?= $faq->faq_ans; ?>
                        </div>
                        
                        <div class="faq-actions">
                            <a class="btn btn-info" href="<?php echo base_url('faqs/edit/' . $faq->faq_id); ?>">
                                <i class="glyphicon glyphicon-edit"></i> Edit
                            </a>
                            <?php if ($this->session->userdata['user_role_id'] <= 2) { ?>
                                <a onclick="return delete_confirmation()" href="<?php echo base_url('faqs/delete/' . $faq->faq_id); ?>" class="btn btn-danger">
                                    <i class="glyphicon glyphicon-trash"></i> Delete
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        <?php } else { ?>
            <div class="faq-grid">
                <div class="no-data-message">
                    <i class="fa fa-question-circle"></i>
                    <p>No FAQs found!</p>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<script>
function delete_confirmation() {
    return confirm('Are you sure you want to delete this FAQ?');
}
</script>
