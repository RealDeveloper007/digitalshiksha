<?php //echo "<pre/>"; print_r($faqs); exit(); ?>
<div id="note">
    <?=validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>        
    <?=(isset($message)) ? $message : ''; ?>
</div>
<div class="block">  
    <div class="navbar block-inner block-header">
        <div class="row">
            <p class="text-muted">FAQ
                <?php if ($this->session->userdata['user_role_id'] <= 3) { ?>
                    <a class="btn custom_navbar-btn btn-primary pull-right col-sm-3" href="<?php echo base_url('faqs/add'); ?>"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp; ADD FAQ </a>
                <?php } ?> 				
            </p>
        </div>
    </div>
	
	
	<div class="block-content">
        <div class="row">
            <div class="col-sm-12">		    
                <?php if (isset($faqs) != NULL) { ?>
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-hover table-bordered">
                        <thead>
                            <tr>								
                                <th style="width:30%">Question</th>
                                <th class="col-sm-1 mobile" style="width:40%">Answers</th>                          
                                <th class="col-sm-3 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($faqs as $faq) {
								
                                ?>
                                <tr class="<?= ($i & 1) ? 'even' : 'odd'; ?>">
                                   
                                        <div class="collapse" id="collapse_<?= $faq->faq_id; ?>"><br/>
                                            
                                        </div>
                                                                  
                                    <td><?= nl2br($faq->faq_ques); ?></td>
                                    <td><?= nl2br($faq->faq_ans); ?></td>
                                    <td class="col-xs-3 text-center">
                                        <div class="btn-group">                                        
                                            <a class="btn btn-default btn-sm" href = "<?php echo base_url('faqs/edit/' . $faq->faq_id); ?>"><i class="glyphicon glyphicon-edit"></i><span class="invisible-on-md">  Modify</span></a>
                                            <?php if ($this->session->userdata['user_role_id'] <= 2) { ?>
                                                <a onclick="return delete_confirmation()" href = "<?php echo base_url('faqs/delete/' . $faq->faq_id); ?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-trash"></i><span class="invisible-on-md">  Delete</span></a>
                                                    <?php } ?>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                $i++;
								
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php
                } else {
                    echo 'No notice!';
                }
                ?>
				</div>
				</div>
				</div>
</div>