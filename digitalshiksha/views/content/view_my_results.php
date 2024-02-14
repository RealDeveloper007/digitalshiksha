<script src="https://cdn.ckeditor.com/4.13.1/standard-all/ckeditor.js"></script>

<div id="note">

    <?php 

    if ($message) {

        echo $message;    

    }

    ?>

</div>



<div class="block"> 

     <div class="navbar block-inner block-header">
        <div class="row">
            <ul class="nav nav-pills">
                <li><p class="text-muted">Result</p></li>
                <li class=" pull-right"><a href="#live_Test" data-toggle="pill" class="in_progress">Live Test</a></li>
                <li class="pull-right active"><a href="#mock_test" data-toggle="pill" class="join">Mock Test</a></li>
            </ul>
        </div>
    </div>

    <div class="block-content">

        <div class="row">

            <div class="col-sm-12">

                 <div class="tab-content">
                <?php if (isset($results) != NULL) { ?>
                    <div class="tab-pane active fade in" id="mock_test">
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

                            <thead>

                                <tr>

                                    <th>Exam Title</th>

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

                                    <tr class="<?= ($i & 1) ? 'even' : 'odd'; ?>">

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

                                            </div>

                                        </td>

                                    </tr>

                                    <?php 

                                    $i++;

                                }

                                ?>

                            </tbody>

                        </table>
                    </div>    

                    <?php

                } else {

                    echo 'No Mock results!';

                }

                ?>

                <?php if (isset($results1) != NULL) { ?>
                    <div class="tab-pane fade" id="live_Test">
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

                            <thead>

                                <tr>

                                    <th>Exam Title</th>

                                    <th class="hidden-xxs">Assessment</th>

                                    <th class="hidden-xxs">Score</th>

                                    <th class="hidden-xs">Date</th>

                                    <th class="text-center" style=" width: 10%">Action</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php 

                                $i = 1;

                                foreach ($results1 as $result) {

                                ?>

                                    <tr class="<?= ($i & 1) ? 'even' : 'odd'; ?>">

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

                                            </div>

                                        </td>

                                    </tr>

                                    <?php 

                                    $i++;

                                }

                                ?>

                            </tbody>

                        </table>
                    </div>    

                    <?php

                } else {

                    echo 'No Live results!';

                }

                ?>

            </div>

        </div>

    </div>

</div><!--/span-->