<style>
    a.btn.btn-default.btn-sm {
         margin: 9px 4px;
    }
</style>
<div id="note">
    <?=validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>        
    <?php //(isset($message)) ? $message : ''; ?>
    
        <?=($this->session->flashdata('s_message')) ? $this->session->flashdata('s_message') : '' ?>        
</div>

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

<div class="block">  
    <div class="navbar block-inner block-header">
        <div class="row">
            <ul class="nav nav-pills">
                <li><p class="text-muted">User List </p></li>
                <li class=" pull-right"><a href="#teacher" data-toggle="pill">Teacher</a></li>
                                <li class="active pull-right"><a href="#student" data-toggle="pill">Student</a></li>

                <?php if ($this->session->userdata['user_role_id'] < 3) { ?>
                    <li class=" pull-right"><a href="#moderator" data-toggle="pill">Moderator</a></li>
                <?php }?>
                <?php if ($this->session->userdata['user_role_id'] < 2) { ?>
                    <li class=" pull-right"><a href="#admin" data-toggle="pill">Admin</a></li>
                <?php }?>
                <!--<li class="active pull-right"><a href="#all" data-toggle="pill"> All </a></li>-->
            </ul>
        </div>
    </div>
    <div class="block-content">
    <div class="row">
    <div class="col-sm-12">
        <div class="tab-content">
        <?php if (isset($users) != NULL) { ?>
        <div class="tab-pane fade" id="teacher">
        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatable" id="example">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th class="hidden-xxs">Phone Number</th>
                    <th class="hidden-xxs">Email</th>
                    <th class="hidden-xxs">Old Email</th>
                    <th class="hidden-xxs">Old Password</th>
                    <th class="hidden-xxs">Role</th>
                    <th style="width: 30%">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $i = 1;
            foreach ($users as $user) { 
               if (($user->active == 1) && ($user->banned == 0) && ($user->user_role_id == 4)) { ?>
                <tr class="<?=($i & 1) ? 'even' : 'odd'; ?>">
                    <td><?= $i ?></td>
                    <td>
                        <?=$user->user_name; ?>
                    </td>
                    <td class="hidden-xxs">
                        <?=$user->user_phone; ?>
                    </td>
                    <td class="hidden-xxs">
                        <?=$user->user_email; ?>
                    </td> 
                    <td class="hidden-xxs">
                        <?=$user->email; ?>
                    </td>
                    <td class="hidden-xxs">
                        <?=$user->confirm_password; ?>
                    </td>
                    <td class="hidden-xxs">
                        <?=$user->user_role_name; ?>
                    </td>
                    <td style="width: 30%">
                    <div class="btn-group">
                        <a class="btn btn-default btn-sm" href ="<?= base_url('user_control/user_edit_form/'.$user->user_id) ?>"><i class="glyphicon glyphicon-edit"></i><span class="invisible-on-md">  Modify</span></a>
                        <a onclick="return ban_confirmation('<?=$user->user_name?>')"  class="btn btn-default btn-sm" href = "<?=base_url('user_control/ban_user_account/' . $user->user_id); ?>"><i class="glyphicon glyphicon-ban-circle"></i><span class="invisible-on-md">  Ban</span></a>
                        <a onclick="return deactivate_confirmation('<?=$user->user_name?>')" href = "<?php echo base_url('user_control/deactivate_user_account/' . $user->user_id); ?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-trash"></i><span class="invisible-on-md">  Deactivate</span></a>
                    </div>
                    </td>
                </tr>
                <?php $i++;
                }
            }?>
            </tbody>
        </table>

        </div>
        <?php if ($this->session->userdata['user_role_id'] < 2) { ?>
        <div class="tab-pane fade" id="admin">
        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatable" id="example">
            <thead>
                <tr>
                    <th>Name</th>
                    <th class="hidden-xxs">Phone Number</th>
                    <th class="hidden-xxs">Email</th>
                    <th class="hidden-xxs">Role</th>
                    <th style="width: 30%">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $i = 1;
            foreach ($users as $user) { 
               if (($user->active == 1) && ($user->banned == 0) && ($user->user_role_id == 2)) { ?>
                <tr class="<?=($i & 1) ? 'even' : 'odd'; ?>">
                    <td>
                        <?=$user->user_name; ?>
                    </td>
                    <td class="hidden-xxs">
                        <?=$user->user_phone; ?>
                    </td>
                    <td class="hidden-xxs">
                        <?=$user->user_email; ?>
                    </td>
                    <td class="hidden-xxs">
                        <?=$user->user_role_name; ?>
                    </td>
                    <td style="width: 30%">
                    <div class="btn-group">
                        <a class="btn btn-default btn-sm" href = "#"><i class="glyphicon glyphicon-edit"></i><span class="invisible-on-md">  Modify</span></a>
                        <a onclick="return ban_confirmation('<?=$user->user_name?>')"  class="btn btn-default btn-sm" href = "<?=base_url('user_control/ban_user_account/' . $user->user_id); ?>"><i class="glyphicon glyphicon-ban-circle"></i><span class="invisible-on-md">  Ban</span></a>
                        <a onclick="return deactivate_confirmation('<?=$user->user_name?>')" href = "<?php echo base_url('user_control/deactivate_user_account/' . $user->user_id); ?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-trash"></i><span class="invisible-on-md">  Deactivate</span></a>
                    </div>
                    </td>
                </tr>
                <?php 
                $i++;
                }
            }?>
            </tbody>
        </table>
        </div>
        <?php } ?>
        
        <div class="tab-pane active fade in" id="student">

            <form method="get" action="<?= base_url('user_control') ?>">
                <div class="row">
                    <div class="col-md-3">
                        <?php if($this->input->get('phone')) { ?>
                        <input type="text" class="form-control" name="phone" placeholder="Search by Phone no" value="<?= $this->input->get('phone') ?>">
                    <?php } else { ?>
                        <input type="text" class="form-control" name="phone" placeholder="Search by Phone no" >
                    <?php } ?>
                    </div>
                    <div class="col-md-3">
                        <?php if($this->input->get('name')) { ?>
                        <input type="text" class="form-control" name="name" placeholder="Search by Name(e.g name OR any alphabet)" value="<?= $this->input->get('name') ?>">
                    <?php } else { ?>
                        <input type="text" class="form-control" name="name" placeholder="Search by Name(e.g name OR any alphabet)">
                    <?php } ?>
                    </div>
                    <div class="col-md-3">
                        <?php if($this->input->get('email')) { ?>
                        <input type="text" class="form-control" name="email" placeholder="Search by Email" value="<?= $this->input->get('email') ?>">
                    <?php } else { ?>
                        <input type="text" class="form-control" name="email" placeholder="Search by Email">
                    <?php } ?>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-success">Filter</button>
                        <button type="button" class="btn btn-danger reset_filter">Reset</button>
                    </div>
                </div>
            </form>
            <br>
            <br>
             <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatable" id="example">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th class="hidden-xxs">Phone Number</th>
                    <th class="hidden-xxs">Email</th>
                    <th class="hidden-xxs">Role</th>
                    <th class="hidden-xxs">State</th>
                    <th class="hidden-xxs">District</th>
                    <th class="hidden-xxs">School Name</th>
                    <th style="width: 30%">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $i = 1;
            foreach ($students as $suser) { 
            ?>
                <tr class="<?=($i & 1) ? 'even' : 'odd'; ?>">
                    <td><?= $count ?></td>
                    <td>
                        <?=$suser->user_name; ?>
                    </td>
                    <td class="hidden-xxs">
                        <?=$suser->user_phone; ?>
                    </td>
                    <td class="hidden-xxs">
                        <?=$suser->user_email; ?>
                    </td>
                    <td class="hidden-xxs">
                        <?=$suser->user_role_name; ?>
                    </td>
                     <td class="hidden-xxs">
                        <?=$suser->state_name; ?>
                    </td>
                     <td class="hidden-xxs">
                        <?=$suser->district_name; ?>
                    </td>
                     <td class="hidden-xxs">
                        <?=$suser->school_name; ?>
                    </td>
                    <td style="width: 30%">
                    <div class="btn-group">
                        <a class="btn btn-default btn-sm" href="<?= base_url('user_control/user_edit_form/'.$suser->user_id) ?>"><i class="glyphicon glyphicon-edit"></i><span class="invisible-on-md">  Modify</span></a>
                        <a onclick="return ban_confirmation('<?=$suser->user_name?>')"  class="btn btn-default btn-sm" href = "<?=base_url('user_control/ban_user_account/' . $suser->user_id); ?>"><i class="glyphicon glyphicon-ban-circle"></i><span class="invisible-on-md">  Ban</span></a>
                        <a class="btn btn-sm btn-default"  href="<?= base_url('user_control/reset_password_by_admin/'.$suser->user_id) ?>" onclick="return confirm('Are you sure to reset password of <?=$suser->user_name; ?>?')"><i class="glyphicon glyphicon-refresh	"></i><span class="invisible-on-md">  Reset Password</span></a>
                        <a onclick="return deactivate_confirmation('<?=$suser->user_name?>')" href = "<?php echo base_url('user_control/deactivate_user_account/' . $suser->user_id); ?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-trash"></i><span class="invisible-on-md">  Deactivate</span></a>

                    </div>
                    </td>
                </tr>
                <?php 
                $i++;
                $count++;
                
                }

                if(count($students)==0)
                {
                    echo "<tr><td colspan='9' style='text-align:center;font-size:14px;color:red;'> No student found</td></tr>";
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
        
        <?php 
        if ($this->session->userdata['user_role_id'] < 3) { 
        ?>
        <div class="tab-pane fade" id="moderator">
        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatable" id="example">
            <thead>
                <tr>
                    <th>Name</th>
                    <th class="hidden-xxs">Phone Number</th>
                    <th class="hidden-xxs">Email</th>
                    <th class="hidden-xxs">Role</th>
                    <th style="width: 30%">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $i = 1;
            foreach ($users as $user) { 
               if (($user->active == 1) && ($user->banned == 0) && ($user->user_role_id == 3)) { ?>
                <tr class="<?=($i & 1) ? 'even' : 'odd'; ?>">
                    <td>
                        <?=$user->user_name; ?>
                    </td>
                    <td class="hidden-xxs">
                        <?=$user->user_phone; ?>
                    </td>
                    <td class="hidden-xxs">
                        <?=$user->user_email; ?>
                    </td>
                    <td class="hidden-xxs">
                        <?=$user->user_role_name; ?>
                    </td>
                    <td style="width: 30%">
                    <div class="btn-group">
                        <a class="btn btn-default btn-sm" href = "#"><i class="glyphicon glyphicon-edit"></i><span class="invisible-on-md">  Modify</span></a>
                        <a onclick="return ban_confirmation('<?=$user->user_name?>')"  class="btn btn-default btn-sm" href = "<?=base_url('user_control/ban_user_account/' . $user->user_id); ?>"><i class="glyphicon glyphicon-ban-circle"></i><span class="invisible-on-md">  Ban</span></a>
                        <a onclick="return deactivate_confirmation('<?=$user->user_name?>')" href = "<?php echo base_url('user_control/deactivate_user_account/' . $user->user_id); ?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-trash"></i><span class="invisible-on-md">  Deactivate</span></a>
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
        </div>
        <?php } 
        } else {
            echo 'No users available!';
        }
        ?>
        </div>
    </div>
    </div>
    </div>
</div><!--/span-->


    <!--    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatable" id="example">
            <thead>
                <tr>
                    <th>Name</th>
                    <th class="hidden-xxs">Phone Number</th>
                    <th class="hidden-xxs">Email</th>
                    <th class="hidden-xxs">Role</th>
                    <th style="width: 30%">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
           // $i = 1;
           // foreach ($users as $user) { 
              // if (($user->active == 1) && ($user->banned == 0) && ($user->user_role_id > $this->session->userdata['user_role_id'])) { 
            ?>
                <tr class="<?php //($i & 1) ? 'even' : 'odd'; ?>">
                    <td>
                        <?php //$user->user_name; ?>
                    </td>
                    <td class="hidden-xxs">
                        <?php //$user->user_phone; ?>
                    </td>
                    <td class="hidden-xxs">
                        <?php //$user->user_email; ?>
                    </td>
                    <td class="hidden-xxs">
                        <?php //$user->user_role_name; ?>
                    </td>
                    <td style="width: 30%">
                    <div class="btn-group">
                        <a class="btn btn-default btn-sm" href = "#"><i class="glyphicon glyphicon-edit"></i><span class="invisible-on-md">  Modify</span></a>
                        <a onclick="return ban_confirmation('<?php //$user->user_name?>')"  class="btn btn-default btn-sm" href = "<?php //base_url('user_control/ban_user_account/' . $user->user_id); ?>"><i class="glyphicon glyphicon-ban-circle"></i><span class="invisible-on-md">  Ban</span></a>
                        <a onclick="return deactivate_confirmation('<?php //$user->user_name?>')" href = "<?php // echo base_url('user_control/deactivate_user_account/' . $user->user_id); ?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-trash"></i><span class="invisible-on-md">  Deactivate</span></a>
                    </div>
                    </td>
                </tr>
                <?php 
               // $i++;
               // }
           // }
            ?>
            </tbody>
        </table>-->

<?php $this->load->view('plugin_scripts/user_ban_confirmation'); ?>

<script>
    $('.reset_filter').on('click',function()
    {
        window.location.href = "<?= base_url('user_control')?>";
    })
</script>

 