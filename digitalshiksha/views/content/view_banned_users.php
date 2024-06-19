<div id="note">
    <?php
    // if ($message) {
    //     echo $message;
    // }
    ?>
    <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
<?php endif; ?>
<?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
<?php endif; ?>
</div>
<div class="block">  
    <div class="navbar block-inner block-header">
        <div class="row">
            <ul class="nav nav-pills">
                <li><p class="text-muted">User List </p></li>
                <li class=" pull-right"><a href="#inactive" data-toggle="pill">Inactive</a></li>
                <li class="active pull-right"><a href="#banned" data-toggle="pill"> Banned </a></li>
            </ul>
        </div>
    </div>
    <div class="block-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="tab-content">
                    <?php 
                    if (isset($users) != NULL) { 
                    ?>
                        <div class="tab-pane fade" id="inactive">
                        <form id="recordForm" method="post" action="<?php echo site_url('user_control/delete_records'); ?>">
                        <button type="button" class="btn btn-danger" id="deleteSelected" style="margin: 10px;pointer:cursor"><i class="glyphicon glyphicon-trash"></i> Delete Selected users</button>
                        <br>

                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatable" id="example">
                                <thead>
                                    <tr>
                                    <th><input type="checkbox" id="selectAll"></th>
                                        <th>Name</th>
                                        <th class="hidden-xxs">Phone Number</th>
                                        <th class="hidden-xxs">Email</th>
                                        <th class="hidden-xxs">Role</th>
                                        <th style="width: 22%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($users as $user) {
                                        if (($user->active == 0) && ($user->user_role_id > $this->session->userdata['user_role_id'])) {
                                            ?>
                                            <tr class="<?= ($i & 1) ? 'even' : 'odd'; ?>">
                                                <td><input type="checkbox" class="recordCheckbox" name="record_ids[]" value="<?php echo $user->user_id; ?>"></td>
                                                <td><?= $user->user_name; ?></td>
                                                <td class="hidden-xxs"><?= $user->user_phone; ?></td>
                                                <td class="hidden-xxs"><?= $user->user_email; ?></td>
                                                <td class="hidden-xxs"><?= $user->user_role_name; ?></td>
                                                <td style=" width: 13%">
                                                    <a onclick="return are_you_sure()" class="btn btn-primary" href = "<?php echo base_url('user_control/activate_user_account/' . $user->user_id); ?>"><i class="glyphicon glyphicon-check"></i><span class="invisible-on-md">  Activate </span></a>
                                                </td>
                                            </tr>
                                            <?php
                                            $i++;
                                        }
                                    }
                                    if($i ==1)
                                    {
                                        echo "<tr><td colspan='6' style='font-size:14px;color:red;text-align:center'>No Records found</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                            </form>
                        </div>
                        <div class="tab-pane active fade in" id="banned">
                        <form id="recordBanForm" method="post" action="<?php echo site_url('user_control/delete_records'); ?>">
                        <button type="button" class="btn btn-danger" id="deleteBanSelected" style="margin: 10px;pointer:cursor"><i class="glyphicon glyphicon-trash"></i> Delete Selected users</button>
                        <br>
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatable" id="example">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="selectBanAll"></th>
                                        <th>Name</th>
                                        <th class="hidden-xxs">Phone Number</th>
                                        <th class="hidden-xxs">Email</th>
                                        <th class="hidden-xxs">Role</th>
                                        <th style="width: 22%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $j = 1;
                                foreach ($users as $user) {
                                    if (($user->banned == 1) && ($user->user_role_id > $this->session->userdata['user_role_id'])) {
                                        ?>
                                            <tr class="<?= ($j & 1) ? 'even' : 'odd'; ?>">
                                                <td><input type="checkbox" class="recordBanCheckbox" name="record_ids[]" value="<?php echo $user->user_id; ?>"></td>
                                                <td><?= $user->user_name; ?></td>
                                                <td class="hidden-xxs"><?= $user->user_phone; ?></td>
                                                <td class="hidden-xxs"><?= $user->user_email; ?></td>
                                                <td class="hidden-xxs"><?= $user->user_role_name; ?></td>
                                                <td style=" width: 13%">
                                                    <a onclick="return are_you_sure()" class="btn btn-primary" href = "<?php echo base_url('user_control/unban_user_account/' . $user->user_id); ?>"><i class="glyphicon glyphicon-check"></i><span class="invisible-on-md">  Unban </span></a>
                                                </td>
                                            </tr>
                                <?php
                                $j++;
                                    }
                                }

                                if($j ==1)
                                {
                                    echo "<tr><td colspan='6' style='font-size:14px;color:red;text-align:center'>No Records found</td></tr>";
                                }
                                ?>
                                </tbody>
                            </table>
                            </form>
                        </div>

                    <?php
                    } else {
                        echo 'You have no mocks!';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div><!--/span-->
<?php $this->load->view('plugin_scripts/are_you_sure'); ?>
 
<script>
    $(document).ready(function () {
            // Select or Deselect all checkboxes
            $('#selectAll').click(function () {
                $('.recordCheckbox').prop('checked', this.checked);
            });

            // Deselect "Select All" if one of the checkboxes is deselected
            $('.recordCheckbox').change(function () {
                if (!this.checked) {
                    $('#selectAll').prop('checked', false);
                }
            });

            // Confirm before deleting records
            $('#deleteForm').submit(function (e) {
                var confirmed = confirm('Are you sure you want to delete the selected records?');
                if (!confirmed) {
                    e.preventDefault();
                }
            });

            $('#deleteSelected').click(function() {
                if (confirm('Are you sure you want to delete selected records?')) {
                    $('#recordForm').submit();
                }
            });

        // For Ban Users
        $('#selectBanAll').click(function () {
                $('.recordBanCheckbox').prop('checked', this.checked);
            });

            // Deselect "Select All" if one of the checkboxes is deselected
            $('.recordBanCheckbox').change(function () {
                if (!this.checked) {
                    $('#selectBanAll').prop('checked', false);
                }
            });

            // Confirm before deleting records
            $('#deleteBanForm').submit(function (e) {
                var confirmed = confirm('Are you sure you want to delete the selected records?');
                if (!confirmed) {
                    e.preventDefault();
                }
            });

            $('#deleteBanSelected').click(function() {
                if (confirm('Are you sure you want to delete selected records?')) {
                    $('#recordBanForm').submit();
                }
            });
        });

</script>