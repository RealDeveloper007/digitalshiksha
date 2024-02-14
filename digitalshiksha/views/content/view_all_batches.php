<style>
    a.btn.btn-default.btn-sm {
         margin: 9px 4px;
    }
</style>
<div id="note">
    <?=validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>        
    <?php //(isset($message)) ? $message : ''; ?>
</div>

<div class="block">  
    <div class="navbar block-inner block-header">
        <br>
        <a href="<?= base_url('admin_control/add_new_batch') ?>" class="btn btn-primary">Add New Batch</a>
        <div class="row">
            <ul class="nav nav-pills">
                <li><p class="text-muted">Batches List </p></li>
            </ul>
        </div>
    </div>
    <div class="block-content">
    <div class="row">
    <div class="col-sm-12">

        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatable" id="example">
            <thead>
                <tr>
                    <th>#</th>
                    <th class="hidden-xxs">Batch Name</th>
                    <th class="hidden-xxs">Batch Code</th>
                    <th class="hidden-xxs">Total Students</th>
                   <!--  <th class="hidden-xxs">Students</th> -->
                    <th class="hidden-xxs">Status</th>
                    <th style="width: 30%">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $i = 1;
            foreach ($batches as $batch) { 
               ?>
                <tr class="<?=($i & 1) ? 'even' : 'odd'; ?>">
                    <td><?= $i ?></td>
                    <td>
                        <?=$batch->batch_name; ?>
                    </td>
                    <td class="hidden-xxs">
                        <?=$batch->batch_code; ?>
                    </td>
                     <td class="hidden-xxs">
                        <?php $AllStudents = explode(',',$batch->students); 
                            echo count($AllStudents);
                        ?>
                    </td>
                    <td class="hidden-xxs">
                        <?=$batch->status==1 ? 'Active' : 'In-Active'; ?>
                    </td>

                    <td style="width: 30%">
                        <div class="btn-group">
                            <a class="btn btn-default btn-sm" href ="<?= base_url('admin_control/batch_edit_form/'.$batch->id) ?>"><i class="glyphicon glyphicon-edit"></i><span class="invisible-on-md">  Modify</span></a>   <a class="btn btn-default btn-sm" href ="<?= base_url('admin_control/batch_students/'.$batch->id) ?>"><i class="fa fa-eye" aria-hidden="true"></i><span class="invisible-on-md">  View Students</span></a>
                          
                        </div>
                    </td>
                </tr>
                <?php $i++;
            }?>
            </tbody>
        </table>
      
    </div>
    </div>
    </div>