<div id="note">
    <?php 
    if ($message) {
        echo $message;    
    }
    ?>
</div>
<?php
$str = '[';
foreach ($categories as $value) {
    $str .= "{value:" . $value->category_id . ",text:'" . $value->category_name . " '},";
}
$str = substr($str, 0, -1);
$str .= "]";
?>

<div class="block">  
    <div class="navbar block-inner block-header">
        <div class="row"><p class="text-muted">Pending Live Test List </p></div>
    </div>
    <div class="block-content">
        <div class="row">
            <div class="col-sm-12">
                <?php if (isset($mocks) != NULL) { ?>
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                        <thead>
                            <tr>
                                <th> Title</th>
                                <th style="width: 25%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i = 1;
                            foreach ($mocks as $mock) {
                                if($this->CI->checkLiveTestResult($mock->title_id)==0) {
                            ?>
                                <tr class="<?= ($i & 1) ? 'even' : 'odd'; ?>">
                                    <td>
                                        <p class="lead">
                                            <a href="#" data-name="exam_title" data-type="textarea" data-rows="2" data-url="<?php echo base_url('admin_control/update_mock_title'); ?>" data-pk="<?= $mock->title_id; ?>" class="data-modify-<?= $mock->title_id; ?> no-style"><?= $mock->title_name; ?></a>
                                        </p>

                                        <span class="text-muted">Syllabus: </span>
                                        <a href="#" data-name="exam_syllabus" data-type="textarea" data-rows="2" data-url="<?php echo base_url('admin_control/update_mock_title'); ?>" data-pk="<?= $mock->title_id; ?>" class="data-modify-<?= $mock->title_id; ?> no-style"><?= $mock->syllabus . '.'; ?></a>
                                        &nbsp;
                                        <span class="text-muted">Passing Score(%): </span>
                                        <a href="#" data-name="passing_score" data-type="text" data-url="<?php echo base_url('admin_control/update_mock_title'); ?>" data-pk="<?= $mock->title_id; ?>" class="data-modify-<?= $mock->title_id; ?> no-style"><?= $mock->pass_mark; ?></a>
                                        &nbsp;
                                        <span class="text-muted">Category: </span>
                                        <a href="#" data-name="cat_id" data-type="select" data-url="<?php echo base_url('admin_control/update_mock_title'); ?>" data-source="<?= $str; ?>" data-value="<?= $mock->category_id; ?>" data-pk="<?= $mock->title_id; ?>" class="data-modify-<?= $mock->title_id; ?> no-style"><?= $mock->category_name; ?></a>
                                        &nbsp;

                                         <span class="text-muted">Batch Name: </span>
                                        <a href="#" data-name="cat_id" data-type="select" data-url="<?php echo base_url('admin_control/update_mock_title'); ?>" data-source="<?= $str; ?>" data-value="<?= $mock->category_id; ?>" data-pk="<?= $mock->title_id; ?>" class="data-modify-<?= $mock->title_id; ?> no-style"><?= $mock->batch_name; ?></a>
                                        &nbsp;

                                        <span class="text-muted">Batch Code: </span>
                                        <a href="#" data-name="cat_id" data-type="select" data-url="<?php echo base_url('admin_control/update_mock_title'); ?>" data-source="<?= $str; ?>" data-value="<?= $mock->category_id; ?>" data-pk="<?= $mock->title_id; ?>" class="data-modify-<?= $mock->title_id; ?> no-style"><?= $mock->batch_code; ?></a>
                                        &nbsp;

                                         <span class="text-muted">From/To Date: </span>
                                        <a href="#" data-name="cat_id" data-type="select" data-url="<?php echo base_url('admin_control/update_mock_title'); ?>" data-source="<?= $str; ?>" data-value="<?= $mock->category_id; ?>" data-pk="<?= $mock->title_id; ?>" class="data-modify-<?= $mock->title_id; ?> no-style"><?= date('d M,Y',strtotime($mock->batch_start_date)).' - '.date('d M,Y',strtotime($mock->batch_end_date)); ?></a>
                                        &nbsp;

                                      
                                        <span class="pull-right">
                                            <span class="text-muted">Active: </span>
                                            <a href="#" data-name="active" data-type="select" data-url="<?php echo base_url('admin_control/update_mock_title'); ?>" data-source="[{value:1,text:'Yes'},{value:0,text:'No'}]" data-value="<?= $mock->exam_active; ?>" data-pk="<?= $mock->title_id; ?>" class="data-modify-<?= $mock->title_id; ?> no-style"><?= ($mock->exam_active == 1) ? 'Yes' : 'No'; ?></a>
                                        </span>
                                    </td>
                                    <td style="width: 25%">
                                        <div class="btn-group">
                                            <a class="btn btn-default btn-sm" href = "<?= base_url('mock-test-details/instructions/' . $mock->slug); ?>"><i class="glyphicon glyphicon-eye-open"></i><span class="invisible-on-md">  View</span></a>
                                            
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
                    <?php
                } else {

                    echo 'You have no live test!';
                }

                if($i==1)
                    {
                           echo 'You have no live test!'; 
                    }
                ?>
            </div>
        </div>
    </div>
</div><!--/span-->

