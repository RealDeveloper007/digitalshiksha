<div id="note">
    <?=validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>        
    <?=(isset($message)) ? $message : ''; ?>
</div>

<div class="block">  
    <div class="navbar block-inner block-header">
        <div class="row">
            <p class="text-muted">Messages 
            </p>
        </div>
    </div>
	
    <div class="block-content tbContant custom">
    <div class="row">
    <div class="col-sm-12">
    <?php if (isset($messages) != NULL) { ?>
        
    <!--BEGIN TABS-->
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_Inbox" data-toggle="tab">Inbox</a></li>
            <!-- <li><a href="#tab_Send" data-toggle="tab">Send</a></li> -->
            <!-- <li><a href="#tab_Drafts" data-toggle="tab">Drafts</a></li> -->

        <?php if($this->session->userdata['user_role_id']!=5) { ?>

            <li><a href="#tab_Spam" data-toggle="tab">Spam</a></li>
            <li><a href="#tab_Trash" data-toggle="tab">Trash</a></li>
        <?php } ?>
        </ul>
        <div class="tab-content info-display">
            <div class="tab-pane table-responsive" id="tab_Trash">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-hover">
                   <thead>
                       <tr>
                           <th><span><input type="checkbox"></span></th>
                           <th class="mobile">Sender</th>
                           <th class="">Subject</th>
                           <th class="invisible-on-sm">Directory</th>
                           <th class="text-center">Action</th>
                       </tr>
                   </thead>
                   <tbody>
                   <?php
                    $i = 1; 
                    $j = 0;
                    foreach ($messages as $msg) {
                        if ($msg->trash == 1) {
                            $j = 1;
                   ?>
                   <tr class="<?=($i & 1) ? 'even' : 'odd'; echo($msg->message_read == 0) ? ' bold-text ' : ' '; ?>" href="<?=base_url('message_control/open_message/'.$msg->message_id); ?>">
                       <td><span><input type="checkbox"></span></td>
                       <td class="mobile clickableRow"><?=$msg->message_sender.'('.$msg->sender_email.')'; ?></td>
                       <td class="clickableRow"><?=$msg->message_subject; echo($msg->numOfReply != 0) ? ' ('.++$msg->numOfReply.')' : ''; ?></td>
                       <td class=" invisible-on-sm clickableRow"><?=$msg->message_folder; ?></td>
                       <td class="text-center">
                           <div class="btn-group">
                               <a href="<?php echo base_url('message_control/move_message/untrash/' . $msg->message_id); ?>" class="btn btn-sm btn-default"><i class="fa fa-reply"></i><span class="invisible-on-sm"> Inbox</span></a>
                               <button type="button" class="btn  btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                               </button>
                               <ul class="dropdown-menu text-left" role="menu">
                                  <li><a href="<?php echo base_url('message_control/move_message/untrash/' . $msg->message_id) ; ?>"><i class="glyphicon glyphicon-envelope"></i><span class="invisible-on-sm"> Move to</span> Inbox </a></li>
                                  <li class="divider"></li>
                                  <li><a onclick="return delete_confirmation()" href = "<?php echo base_url('message_control/delete_message/' . $msg->message_id); ?>"><i class="glyphicon glyphicon-trash"></i><span class="invisible-on-md">  Delete forever</span></a></li>
                               </ul>
                           </div>
                       </td>
                   </tr>
                   <?php
                        }
                        $i++;                       
                    }
                    if ($j == 0) {
                        echo '<tr><td colspan="5"><h4>  Trash is empty!</h4> <td></tr>';
                    }
                    ?>
                   </tbody>
                </table>


           </div>

            <div class="tab-pane table-responsive" id="tab_Spam">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-hover">
                   <thead>
                       <tr>
                           <th><span><input type="checkbox"></span></th>
                           <th class="mobile">Sender</th>
                           <th class="">Subject</th>
                           <th class="invisible-on-sm">Directory</th>
                           <th class="text-center">Action</th>
                       </tr>
                   </thead>
                   <tbody>
                   <?php
                    $i = 1; 
                    $j = 0;
                    foreach ($messages as $msg) {
                        if (($msg->trash == 0) && ($msg->spam == 1)) {
                            $j = 1;
                   ?>
                   <tr class="<?=($i & 1) ? 'even' : 'odd'; echo($msg->message_read == 0) ? ' bold-text ' : ' '; ?>" href="<?=base_url('message_control/open_message/'.$msg->message_id); ?>">
                       <td><span><input type="checkbox"></span></td>
                       <td class="mobile clickableRow"><?=$msg->message_sender; ?></td>
                       <td class="clickableRow"><?=$msg->message_subject; echo($msg->numOfReply != 0) ? ' ('.++$msg->numOfReply.')' : ''; ?></td>
                       <td class=" invisible-on-sm clickableRow"><?=$msg->message_folder; ?></td>
                       <td class="text-center">
                           <div class="btn-group">
                               <a href="<?php echo base_url('message_control/move_message/unspam/' . $msg->message_id) ; ?>" class="btn btn-sm btn-default"><i class="fa fa-reply"></i><span class="invisible-on-sm"> Inbox</span></a>
                               <button type="button" class="btn  btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                               </button>
                               <ul class="dropdown-menu text-left" role="menu">
                                  <li><a href="<?php echo base_url('message_control/move_message/unspam/' . $msg->message_id) ; ?>"><i class="glyphicon glyphicon-ok"></i><span class="invisible-on-sm"> Not Spam</span></a></li>
                                  <li class="divider"></li>
                                  <li><a onclick="return delete_confirmation()" href = "<?php echo base_url('message_control/delete_message/' . $msg->message_id); ?>"><i class="glyphicon glyphicon-trash"></i><span class="invisible-on-md">  Delete forever</span></a></li>
                               </ul>
                           </div>
                       </td>
                   </tr>
                   <?php
                        }
                        $i++;                       
                    }
                    if ($j == 0) {
                        echo '<tr><td colspan="5"><h4>  No Spam.</h4> <td></tr>';
                    }
                    ?>
                   </tbody>
                </table>
           </div>
            
            <div class="tab-pane table-responsive" id="tab_Drafts">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-hover">
                   <thead>
                       <tr>
                           <th><span><input type="checkbox"></span></th>
                           <th class="mobile">To</th>
                           <th class="col-sm-5">Subject</th>
                           <th class="mobile">Sender</th>
                           <th class="invisible-on-sm">Date Time</th>
                           <th class="text-center">Action</th>
                       </tr>
                   </thead>
                   <tbody>
                   <?php
                    $i = 1; 
                    $j = 0;
                    foreach ($messages as $msg) {
                        if (($msg->trash == 0) && ($msg->spam == 0) && ($msg->message_folder == 'draft') ) {
                            $j = 1;
                    ?>
                   <tr class="<?=($i & 1) ? 'even' : 'odd'; echo($msg->message_read == 0) ? ' bold-text ' : ' '; ?>" href="<?=base_url('message_control/open_message/'.$msg->message_id); ?>">
                       <td><span><input type="checkbox"></span></td>
                       <td class="mobile clickableRow"><?=$msg->message_send_to; ?></td>
                       <td class="clickableRow"><?=$msg->message_subject; echo($msg->numOfReply != 0) ? ' ('.++$msg->numOfReply.')' : ''; ?></td>
                       <td class="mobile clickableRow"><?=$msg->message_sender; ?></td>
                       <td class="invisible-on-sm clickableRow"><?=date("D, d M g:i a", strtotime($msg->message_date)); ?></td>
                       <td class="text-center">
                           <div class="btn-group">
                               <a href="<?php echo base_url('message_control/reply_message/' . $msg->message_id); ?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-edit"></i><span class="invisible-on-sm"> Edit</span></a>
                               <a onclick="return delete_confirmation()" href = "<?php echo base_url('message_control/delete_message/' . $msg->message_id); ?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-trash"></i><span class="invisible-on-sm"> Delete</span></a>
                           </div>
                       </td>
                   </tr>
                   <?php
                        }
                        $i++;                       
                    }
                    if ($j == 0) {
                        echo '<tr><td colspan="5"><h4> No Draft.</h4><td></tr>';
                    }
                   ?>
                   </tbody>
                </table>
           </div>

            <div class="tab-pane table-responsive" id="tab_Send">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-hover">
                   <thead>
                       <tr>
                           <th><span><input type="checkbox"></span></th>
                           <th class="mobile">To</th>
                           <th class="col-sm-5">Subject</th>
                           <th class="mobile">Sender</th>
                           <th class="invisible-on-sm">Date Time</th>
                           <th class="text-center">Action</th>
                       </tr>
                   </thead>
                   <tbody>
                   <?php
                    $i = 1; 
                    $j = 0;
                    foreach ($messages as $msg) {
                        if (($msg->trash == 0) && ($msg->spam == 0) && ($msg->message_folder == 'send') ) {
                            $j = 1;
                   ?>
                   <tr class="<?=($i & 1) ? 'even' : 'odd'; echo($msg->message_read == 0) ? ' bold-text ' : ' '; ?>" href="<?=base_url('message_control/open_message/'.$msg->message_id); ?>">
                       <td><span><input type="checkbox"></span></td>
                       <td class="mobile clickableRow"><?=$msg->message_send_to; ?></td>
                       <td class="clickableRow"><?=$msg->message_subject; echo($msg->numOfReply != 0) ? ' ('.++$msg->numOfReply.')' : ''; ?></td>
                       <td class="mobile clickableRow"><?=$msg->message_sender; ?></td>
                       <td class="invisible-on-sm clickableRow"><?=date("D, d M g:i a", strtotime($msg->message_date)); ?></td>
                       <td class="text-center">
                           <div class="btn-group">
                               <a href="<?php echo base_url('message_control/reply_message/' . $msg->message_id); ?>" class="btn btn-sm btn-default"><i class="fa fa-reply"></i><span class="invisible-on-sm"> Reply</span></a>
                               <button type="button" class="btn  btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                               </button>
                               <ul class="dropdown-menu text-left" role="menu">
                                  <li><a href="<?php echo base_url('message_control/move_message/spam/' . $msg->message_id) ; ?>"><i class="glyphicon glyphicon-minus-sign"></i><span class="invisible-on-sm"> Mark as</span> Spam </a></li>
                                  <li class="divider"></li>
                                  <li><a href = "<?php echo base_url('message_control/move_message/trash/' . $msg->message_id) ; ?>"><i class="glyphicon glyphicon-trash"></i><span class="invisible-on-sm"> Move to</span> Trash</a></li>
                               </ul>
                           </div>
                       </td>
                   </tr>
                   <?php
                        }
                        $i++;                       
                    }
                    if ($j == 0) {
                        echo '<tr><td colspan="5"><h4> Send directory is empty.</h4><td></tr>';
                    }
                   ?>
                   </tbody>
                </table>
           </div>

            <div class="tab-pane table-responsive active" id="tab_Inbox">
<?php if($this->session->userdata['user_role_id']==5 || $this->session->userdata['user_role_id'] == 4) { ?>

                 <?=form_open(base_url('message_control/contact'), 'role="form" class="form-horizontal"'); ?>
    <div class="row">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-xs-offset-1 col-xs-10">
                <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                <?=form_hidden('user_id', $this->session->userdata('user_id')); ?>
                <?=form_hidden('name', $this->session->userdata('user_name')); ?>
                <?=form_hidden('email', $this->session->userdata('user_email')); ?>
                <?=form_hidden('token', time()); ?>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="name" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">From: </label>
                <div class="col-lg-6 col-sm-8 col-xs-7 col-mb">
                   <?=form_input('name', $this->session->userdata('user_name').' < '.$this->session->userdata('user_email').' >', 'placeholder="Subject" class="form-control" required="required" disabled') ?>
                </div>
            </div>
            <div class="form-group">
                <label for="subject" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">Subject: </label>
                <div class="col-lg-6 col-sm-8 col-xs-7 col-mb">
                   <?=form_input('subject', '', 'placeholder="Subject" class="form-control" required="required"'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="message" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile" style="padding-top: 50px;">Message : </label>
                <div class="col-lg-6 col-sm-8 col-xs-7 col-mb">
                  <?php 
                    $data = array(
                        'name'        => 'message',
                        'placeholder' => 'Your Message',
                        'value'       => '',
                        'rows'        => '10',
                        'class'       => 'form-control textarea-wysihtml5',
                        'required' => 'required',
                    ); ?>
                    <?=form_textarea($data) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-offset-1 col-xs-11 col-sm-offset-2 col-md-8">
                    <button type="submit" class="btn btn-primary col-xs-5 col-sm-3">Send</button>
                    <span class="col-sm-1">&nbsp;</span>
                    <a href="<?=base_url('message_control');?>" class="btn btn-default">Cancel</a>
                </div>
            </div>
        </div>
    </div>
    </div>
                <?=form_close() ?>
            <?php } ?>

                <table cellpadding="0" cellspacing="0" border="0" class="table table-hover">
                   <thead>
                       <tr>
                        <?php if($this->session->userdata['user_role_id']!=5 && $this->session->userdata['user_role_id'] != 4) { ?>
                            <th class="mobile">Type</th>
                        <?php } ?>
                           <th class="mobile">Sender</th>
                           <th class="">Subject</th>
                           <th class="">Message</th>
                           <th class="invisible-on-sm">Date Time</th>
                            <th class="text-center">Action</th>

                       </tr>
                   </thead>
                   <tbody>
                   <?php
                    $i = 1; 
                    $j = 0;
                    foreach ($messages as $msg) {
                        if (($msg->trash == 0) && ($msg->spam == 0) && ($msg->message_folder == 'inbox') ) {
                            $j = 1;
                    ?>
                   <tr class="<?=($i & 1) ? 'even' : 'odd'; echo($msg->message_read == 0) ? ' bold-text ' : ' '; ?>" href="#">

                     <?php if($this->session->userdata['user_role_id']!=5) { ?>
                        <td class=""><?=$msg->user_id!='' ? 'User' : 'Visitor' ?></td>
                     <?php } ?>
                       <td class="mobile"><?=$msg->message_sender.'('.$msg->sender_email.','.$msg->phone_number.')'; ?></td>
                       <td class=""><?=$msg->message_subject; ?></td>
                      <td class=""><?=$msg->message_body; ?></td>
                       <td class=" invisible-on-sm"><?=date("D, d M Y g:i a", strtotime($msg->message_date)); ?></td>
                       <td class="text-center" style="display: block ruby;">
                        <?php if($this->session->userdata['user_role_id']==5 || $this->session->userdata['user_role_id'] == 4) { ?>


                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal<?= $msg->message_id ?>">View Reply</button>

                        <?php } else { ?>

                             <?php if($msg->user_id!='') { ?>

                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal<?= $msg->message_id ?>">View Reply</button>

                        <?php } ?>

                            <?php if($this->CI->replies($msg->message_id) == 'Not replied yet')
                            { 
                                
                                ?>

                           <div class="btn-group">
                            <?php if($msg->user_id!='') { ?>
                               <a href="<?php echo base_url('message_control/reply_message/' . $msg->message_id); ?>" class="btn btn-sm btn-default"><i class="fa fa-reply"></i><span class="invisible-on-sm"> Reply</span></a>
                           <?php } else { ?>
                            <a href="#" class="btn btn-sm btn-default"><span class="invisible-on-sm"> Action</span></a>
                           <?php } ?>
                               <button type="button" class="btn  btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                               </button>
                               <ul class="dropdown-menu text-left" role="menu">
                                  <li><a href="<?php echo base_url('message_control/move_message/spam/' . $msg->message_id) ; ?>"><i class="glyphicon glyphicon-minus-sign"></i><span class="invisible-on-sm"> Mark as</span> Spam </a></li>
                                  <li class="divider"></li>
                                  <li><a href = "<?php echo base_url('message_control/move_message/trash/' . $msg->message_id) ; ?>"><i class="glyphicon glyphicon-trash"></i><span class="invisible-on-sm"> Move to</span> Trash</a></li>
                               </ul>
                           </div>
                       <?php  } ?>
                       
                       <?php } ?>
                       </td>
                   </tr>

                   <div id="myModal<?= $msg->message_id ?>" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Reply from Admin Portal</h4>
                          </div>

                          <div class="modal-body">
                            <h4>Subject      : <?=$msg->message_subject; ?></h4>
                            <h4>Your Message : <?=$msg->message_body; ?></h4>
                            <h3>Reply        : <?= $this->CI->replies($msg->message_id) ?>.</h3>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>

                      </div>
                    </div>
                   <?php
                        }
                        $i++;                       
                    }
                    if ($j == 0) {
                        echo '<tr><td colspan="5"><h4> Inbox is empty.</h4><td></tr>';
                    }
                   ?>
                   </tbody>
                </table>
                 <div id="pagination">
                     <ul class="tsc_pagination">
                                <!-- Show pagination links -->
                                <?php foreach ($links as $link) {
                                    echo "<li>". $link."</li>";
                                } ?>
                    </ul>
                    </div>
            </div>
       </div>
    <!--END TABS-->
    <?php
    } else {
        echo '<h4> No Message!</h4> ';
    }
    ?>
    </div>
    </div>
    </div>
</div><!--/span-->

<style>
    .pagination {
    display: flex;
    /* justify-content: center; */
    margin: 0px !important;
    flex-wrap: wrap!important;
    margin: 0 auto;
    max-width: 90%;
    width: 100%;
}
</style>
