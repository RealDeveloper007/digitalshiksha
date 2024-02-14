<script src="https://cdn.ckeditor.com/4.13.1/standard-all/ckeditor.js"></script>

<div id="note"> <?php //if ($message) echo $message; ?> </div>

<div class="block"> 

     <div class="navbar block-inner block-header">
        <div class="row">
            <ul class="nav nav-pills">
               <li class="active"><a href="#student_mock_result" data-toggle="pill">Students Mock Results </a></li>
               <li ><a href="#student_result_live" data-toggle="pill">Students Live Results </a></li>
                 <li ><a href="#own_result" data-toggle="pill">Own Results </a></li>
            </ul>
        </div>
    </div>

    <div class="block-content">
        <div class="row">
            <div class="col-sm-12">
                        <div class="tab-content">

                <?php if (isset($results) != NULL) { ?>
                      <div class="tab-pane active fade in" id="student_mock_result">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                        <thead>
                            <tr>
                                <td class="hidden">1</td>
                                <th>Name of Student</th>
                                <th>Exam</th>
                                <th class="hidden-xxs">Assessment</th>
                                <th class="hidden-xxs">Score</th>
                                <th class="hidden-xs">Date</th>
                                <th class="text-center" style=" width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($results as $result) {
                                ?>
                                <?php if (($result->exam_title_user_id == $this->session->userdata('user_id')) OR ($this->session->userdata('user_role_id') <= 3)) { ?>
                                    <tr class="<?= ($i & 1) ? 'even' : 'odd'; ?>">
                                        <td class="hidden">1</td>
                                        <td><?= $result->user_name; ?></td>
                                        <td><?= $result->title_name; ?></td>
                                        <td class="hidden-xxs">
                                           <?php if($result->result_percent >= $result->pass_mark) 
                                                 {
                                                    if($result->result_percent >= 95)
                                                    {
                                                        echo '<span class="label label-success">Excellent</span>';
                                                        
                                                    } else {
                                                        
                                                        echo '<span class="label label-primary">PASS</span>';
                                                        
                                                    }
                                                    
                                                } else { 
                                                    
                                                   echo  '<span class="label label-warning">FAIL</span>';
                                                    
                                                }
                                            ?>
                                            
                                            
                                            </td>
                                        <td class="hidden-xxs"><?php echo $result->result_percent; ?>%</td>
                                        <td class="hidden-xs"><?= date("D, d M", strtotime($result->exam_taken_date)); ?></td>
                                        <td class="text-center" style=" width: 17%">
                                            <div class="btn-group">
                                                <a class="btn btn-default btn-xs" href = "<?= base_url('exam_control/view_exam_detail/' . $result->result_id); ?>"><i class="glyphicon glyphicon-list-alt"></i> Details</a>
                                                <a class="btn btn-default btn-xs" href = "<?= base_url('exam_control/view_result_detail/' . $result->result_id); ?>"><i class="glyphicon glyphicon-file"></i> Certificate</a>
                                                <?php if ($this->session->userdata['user_role_id'] < 3) { ?>
                                                <a onclick="return delete_confirmation()" href = "<?= base_url('exam_control/delete_results/' . $result->result_id); ?>" class="btn btn-xs btn-default" ><i class="glyphicon glyphicon-trash"></i><span class="invisible-on-md">  Delete </span></a>
                                                <?php } ?>
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
                    <?php  if($i>1){ ?>
                        <div id="pagination">

                     <ul class="tsc_pagination">
                                <!-- Show pagination links -->
                                <?php foreach ($links as $link) {
                                    echo "<li>". $link."</li>";
                                } ?>
                    </ul>
                    </div>
                            <?php }
                } else {
                    echo 'No results!';
                }
                ?>
            </div>


                <?php if (isset($results1) != NULL) { ?>
                      <div class="tab-pane fade" id="student_result_live" style="display: '' !important!">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                        <thead>
                            <tr>
                                <td class="hidden">1</td>
                                <th>Name of Student</th>
                                <th>Exam</th>
                                <th class="hidden-xxs">Assessment</th>
                                <th class="hidden-xxs">Score</th>
                                <th class="hidden-xs">Date</th>
                                <th class="text-center" style=" width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($results1 as $result1) {
                                ?>
                                <?php if (($result1->exam_title_user_id == $this->session->userdata('user_id')) OR ($this->session->userdata('user_role_id') <= 3)) { ?>
                                    <tr class="<?= ($i & 1) ? 'even' : 'odd'; ?>">
                                        <td class="hidden">1</td>
                                        <td><?= $result1->user_name; ?></td>
                                        <td><?= $result1->title_name; ?></td>
                                        <td class="hidden-xxs">

                                             <?php if($result1->result_percent >= $result1->pass_mark) 
                                                 {
                                                    if($result1->result_percent >= 95)
                                                    {
                                                        echo '<span class="label label-success">Excellent</span>';
                                                        
                                                    } else {
                                                        
                                                        echo '<span class="label label-primary">PASS</span>';
                                                        
                                                    }
                                                    
                                                } else { 
                                                    
                                                   echo  '<span class="label label-warning">FAIL</span>';
                                                    
                                                }
                                            ?>
                                            </td>
                                        <td class="hidden-xxs"><?php echo $result1->result_percent; ?>%</td>
                                        <td class="hidden-xs"><?= date("D, d M", strtotime($result1->exam_taken_date)); ?></td>
                                        <td class="text-center" style=" width: 17%">
                                            <div class="btn-group">
                                                <a class="btn btn-default btn-xs" href = "<?= base_url('exam_control/view_exam_detail/' . $result1->result_id); ?>"><i class="glyphicon glyphicon-list-alt"></i> Details</a>
                                                <a class="btn btn-default btn-xs" href = "<?= base_url('exam_control/view_result_detail/' . $result1->result_id); ?>"><i class="glyphicon glyphicon-file"></i> Certificate</a>
                                                <?php if ($this->session->userdata['user_role_id'] < 3) { ?>
                                                <a onclick="return delete_confirmation()" href = "<?= base_url('exam_control/delete_results/' . $result1->result_id); ?>" class="btn btn-xs btn-default" ><i class="glyphicon glyphicon-trash"></i><span class="invisible-on-md">  Delete </span></a>
                                                <?php } ?>
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
                    <?php  if($i>1){ ?>
           
                            <?php }
                } else {
                    echo 'No results!';
                }
                ?>
            </div>

             <div class="tab-pane fade" id="own_result">

                   <?php if (isset($my_result) != NULL) { ?>
                 <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                        <thead>
                            <tr>
                                <td class="hidden">1</td>
                                <th>Exam</th>
                                <th class="hidden-xxs">Assessment</th>
                                <th class="hidden-xxs">Score</th>
                                <th class="hidden-xs">Date</th>
                                <th class="text-center" style=" width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($my_result as $mresult) {
                                ?>
                                    <tr class="<?= ($i & 1) ? 'even' : 'odd'; ?>">
                                        <td class="hidden">1</td>
                                        <td><?= $mresult->title_name; ?></td>
                                        <td class="hidden-xxs">

                                             <?php if($mresult->result_percent >= $mresult->pass_mark) 
                                                 {
                                                    if($mresult->result_percent >= 95)
                                                    {
                                                        echo '<span class="label label-success">Excellent</span>';
                                                        
                                                    } else {
                                                        
                                                        echo '<span class="label label-primary">PASS</span>';
                                                        
                                                    }
                                                    
                                                } else { 
                                                    
                                                   echo  '<span class="label label-warning">FAIL</span>';
                                                    
                                                }
                                            ?>
                                            
                                            </td>
                                        <td class="hidden-xxs"><?php echo $mresult->result_percent; ?>%</td>
                                        <td class="hidden-xs"><?= date("D, d M", strtotime($mresult->exam_taken_date)); ?></td>
                                        <td class="text-center" style=" width: 17%">
                                            <div class="btn-group">
                                                <a class="btn btn-default btn-xs" href = "<?= base_url('exam_control/view_exam_detail/' . $mresult->result_id); ?>"><i class="glyphicon glyphicon-list-alt"></i> Details</a>
                                                <a class="btn btn-default btn-xs" href = "<?= base_url('exam_control/view_result_detail/' . $mresult->result_id); ?>"><i class="glyphicon glyphicon-file"></i> Certificate</a>
                                                <?php if ($this->session->userdata['user_role_id'] < 3) { ?>
                                                <a onclick="return delete_confirmation()" href = "<?= base_url('exam_control/delete_results/' . $result->result_id); ?>" class="btn btn-xs btn-default" ><i class="glyphicon glyphicon-trash"></i><span class="invisible-on-md">  Delete </span></a>
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
                <?php } ?>
             </div>
            </div>
        </div>
        </div>
    </div>
</div><!--/span-->


<script>
    $(window).on('load', function() {

    $("#student_result_live").css("display","");
})
</script>