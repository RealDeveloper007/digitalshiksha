<?php   //  echo "<pre/>"; print_r($mocks); exit(); ?>
<div id="note"> <?php  if ($message) echo $message; ?> 
<?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '';?>   
</div>
<style>
        td .btn-group a {
    margin: 4px 10px;
}
</style>
<div class="block">  
    <div class="navbar block-inner block-header">
          <?php if($exam_type=='live_mock_test') { ?>
        <div class="row"><p class="text-muted">Live Test List </p></div>
    <?php } else { ?>
        <div class="row"><p class="text-muted">Mock List </p></div>
    <?php } ?>
    </div>
    <div class="block-content">
             <form method="get" action="<?= base_url('mocks/'.$exam_type) ?>">
                <div class="row">
                    <div class="col-md-6">
                        <?php if($this->input->get('name')) { ?>
                        <input type="text" class="form-control" name="name" placeholder="Search by Exam Name(e.g name OR any alphabet)" value="<?= $this->input->get('name') ?>">
                    <?php } else { ?>
                        <input type="text" class="form-control" name="name" placeholder="Search by Exam Name(e.g name OR any alphabet)">
                    <?php } ?>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-success">Filter</button>
                        <button type="button" class="btn btn-danger reset_filter">Reset</button>
                    </div>
                </div>
            </form>
            <br>
            <br>
        <div class="row">
            <div class="col-sm-12">
                <?php if (isset($mocks) AND !empty($mocks)) { ?>
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                        <thead>
                            <tr>
                                <th>Mock Test Title</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($mocks as $mock) {
                            ?>
                                <tr class="<?= ($i & 1) ? 'even' : 'odd'; ?>">
                                    <td>
                                        <p class="lead"><?= $mock->title_name; ?> 
                                        </p>
                                        <?php if ($mock->course_id) { ?>
                                            <span class="text-muted">Associated Course: </span><?= $mock->course_id; ?>&nbsp;
                                        <?php } ?>
                                        <span class="text-muted">Public: </span><?= ($mock->public == 1) ? 'Yes' : 'No'; ?>&nbsp;
                                        <span class="text-muted">Passing Score(%): </span><?= $mock->pass_mark; ?>&nbsp;
                                        <span class="text-muted">Category: </span><?=$mock->category_name.' / '.$mock->sub_cat_name; ?>&nbsp;<br>
                                        <span style="font-weight:bold"> Exam Code : 
                                            <?php 
                                                if(strlen($mock->title_id) == 1)
                                                {
                                                    echo 'MT00'.$mock->title_id;

                                                } else if(strlen($mock->title_id) == 2)
                                                {
                                                    echo 'MT0'.$mock->title_id;

                                                } else if(strlen($mock->title_id) == 3) {

                                                    echo 'MT'.$mock->title_id;
                                                }
                                            ?>
                                            </span>
                                        <br/>

                                          <?php if($exam_type=='live_mock_test') { ?>
                                         <span class="text-muted">Batch Name: </span>
                                        <a href="#" data-name="cat_id" data-type="select" data-url="<?php echo base_url('admin_control/update_mock_title'); ?>" data-source="<?= $str; ?>" data-value="<?= $mock->category_id; ?>" data-pk="<?= $mock->title_id; ?>" class="data-modify-<?= $mock->title_id; ?> no-style"><?= $mock->batch_name; ?></a>
                                        &nbsp;

                                        <span class="text-muted">Batch Code: </span>
                                        <a href="#" data-name="cat_id" data-type="select" data-url="<?php echo base_url('admin_control/update_mock_title'); ?>" data-source="<?= $str; ?>" data-value="<?= $mock->category_id; ?>" data-pk="<?= $mock->title_id; ?>" class="data-modify-<?= $mock->title_id; ?> no-style"><?= $mock->batch_code; ?></a>
                                        &nbsp;

                                         <span class="text-muted">From/To Date: </span>
                                        <a href="#" data-name="cat_id" data-type="select" data-url="<?php echo base_url('admin_control/update_mock_title'); ?>" data-source="<?= $str; ?>" data-value="<?= $mock->category_id; ?>" data-pk="<?= $mock->title_id; ?>" class="data-modify-<?= $mock->title_id; ?> no-style"><?= date('d M,Y',strtotime($mock->batch_start_date)).' - '.date('d M,Y',strtotime($mock->batch_end_date)); ?></a>
                                        &nbsp;

                                      

                                    <?php } ?>
                                        <span class="text-muted">Syllabus: </span><?= $mock->syllabus . '.'; ?>&nbsp;
                                        <span class="pull-right">
                                            <span class="text-muted">Price: </span>
                                            <?php if ($mock->exam_price) {
                                                $currency_code . ' ' . $currency_symbol.' '.$mock->exam_price; 
                                            }else{
                                                echo "Free";
                                            } ?>
                                            <span class="text-muted">Active: </span><?= ($mock->exam_active == 1) ? 'Yes' : 'No'; ?>&nbsp;
                                            <span class="text-muted">Author: </span>
                                            <?php echo $mock->user_name; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-success btn-sm" href = "<?= base_url('mock_detail/' . $mock->title_id); ?>"><span class="invisible-on-md"> <i class="fa fa-eye"></i>  View Questions</span></a>

                                            <a class="btn btn-warning btn-sm" href = "<?= base_url('admin_control/export_exam_questions/' . $mock->title_id); ?>"><span class="invisible-on-md"> <i class="fa fa-download"></i> Download Questions</span></a>

                                            <a class="btn btn-info btn-sm" href = "<?= base_url('admin_control/edit_mock_detail/' . $mock->title_id); ?>"><span class="invisible-on-md"> <i class="fa fa-eye"></i>  View Detail</span></a>
                                            <?php
                                            if($this->session->userdata('user_role_id')==1 || $this->session->userdata('user_role_id')==3) {
                                            ?>
                                            <a onclick="return delete_confirmation()" href = "<?php echo base_url('admin_control/delete_exam/' . $mock->title_id); ?>" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i><span class="invisible-on-md">  Delete</span></a>
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
                    echo '<h3>No result found!</h3>';
                }
                ?>
            </div>
        </div>
    </div>
</div><!--/span-->
<script>
    $('.reset_filter').on('click',function()
    {
        window.location.href = "<?= base_url('mocks/'.$exam_type)?>";
    })
</script>


