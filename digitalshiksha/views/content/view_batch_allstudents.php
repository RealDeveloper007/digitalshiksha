<div id="note">

    <?php 

    if ($message) {

        echo $message;    

    }

    ?>

</div>

<?php 

  $join_count = $request_batches[0]->join_students != '' ? count(explode(',',$request_batches[0]->join_students)) : 0;
  $decline_count = $request_batches[0]->decline_students != '' ? count(explode(',',$request_batches[0]->decline_students)) : 0;

  $in_progress_count = count(explode(',',$request_batches[0]->students)) - ($join_count + $decline_count);
?>



<div class="block"> 

    <div class="navbar block-inner block-header">
        <div class="row">
            <ul class="nav nav-pills">
                <li><p class="text-muted"><?= $request_batches[0]->batch_name ?> - <?= $request_batches[0]->batch_code ?></p></li>
                <li class=" pull-right"><a href="#in_progress" data-toggle="pill" class="in_progress">In Progress (<?= $in_progress_count?>)</a></li>
                <li class="pull-right"><a href="#decline_view" data-toggle="pill" class="decline_view">Declined (<?= $decline_count?>)</a></li>
                <li class="pull-right active"><a href="#join" data-toggle="pill" class="join">Joined (<?= $join_count?>)</a></li>
            </ul>
        </div>
    </div>

    <div class="block-content">

        <div class="row">

            <div class="col-sm-12">
                <div class="tab-content">
                <?php if (isset($request_batches) != NULL) { ?>
                    <div class="tab-pane active fade in" id="join">
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                            <thead>
                                <tr>
                                    <th>Student Name</th>
                                    <th>Student Email</th>
                                    <th>Status</th>                              
                                    <th class="text-center" style=" width: 10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $i = 1;
									
                                    foreach ($request_batches as $result) {
										
										
										
                                       $explode_student = explode(',',$result->join_students);
                                       if(count($explode_student) > 0 && $result->join_students != '') {
                                         foreach($explode_student as $key => $value) { 
                                            $student_detail = $this->db->where('user_id',$value)->get('users')->row();
                                            $status = 'Joined';
                                         ?>
                                          <tr class="<?= ($i & 1) ? 'even' : 'odd'; ?> student_tr" id="student<?= $student_detail->user_id; ?>">
                                              <td><?= $student_detail->user_name; ?></td>
                                              <td><?= $student_detail->user_email; ?></td>
                                              <td><?= $status?></td>
                                              <td class="text-center" style=" width: 17%">
                                                <a class="btn btn-danger btn-xs decline_request" href = "#" studentid="<?= $value?>" batchid="<?= $result->id?>"><i class="fa fa-trash"></i> Delete</a>
                                              </td>
                                          </tr>

                                          <?php $i++;
                                         }
                                       } else { ?>
                                          <tr class="<?= ($i & 1) ? 'even' : 'odd'; ?>">
                                              <td colspan="3"> No Detail found!</td>
                                          </tr>
                                     <?php }      
                                   }  
                                ?>
                            </tbody>

                        </table>
                    </div>

                    <div class="tab-pane fade" id="decline_view">
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                            <thead>
                                <tr>
                                    <th>Student Name</th>
                                    <th>Student Email</th>                              
                                    <th class="text-center" style=" width: 10%">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $i = 1;
                                    foreach ($request_batches as $result) {
                                       $explode_student = explode(',',$result->decline_students);
                                       if(count($explode_student) > 0 && $result->decline_students != '') {
                                         foreach($explode_student as $key => $value) { 
                                            $student_detail = $this->db->where('user_id',$value)->get('users')->row();
                                            $decline_student_status = explode(',',$result->decline_student_status);
                                            if (($key1 = array_search($value, $explode_student)) !== false) {
                                                $status_code = explode('-',$decline_student_status[$key1]);
                                                if($status_code[1] == 'S') {
                                                    $status = 'Declined By Student';
                                                } else {
                                                    $status = "Declined By Teacher";
                                                }
                                            }
                                         ?>
                                          <tr class="<?= ($i & 1) ? 'even' : 'odd'; ?>">
                                              <td><?= $student_detail->user_name; ?></td>
                                              <td><?= $student_detail->user_email; ?></td>
                                              <td class="text-center" style=" width: 17%">
                                               <?= $status?>
                                              </td>
                                          </tr>

                                          <?php $i++;
                                         }
                                       } else { ?>
                                          <tr class="<?= ($i & 1) ? 'even' : 'odd'; ?>">
                                              <td colspan="3"> No Detail found!</td>
                                          </tr>
                                     <?php }      
                                   }  
                                ?>
                            </tbody>

                        </table>
                    </div> 

                    <div class="tab-pane fade" id="in_progress">
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                            <thead>
                                <tr>
                                    <th>Student Name</th>
                                    <th>Student Email</th>                              
                                    <th class="text-center" style=" width: 10%">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $i = 1;
                                    foreach ($request_batches as $result) {
                                       $explode_student = explode(',',$result->students);
                                       if(count($explode_student) > 0 && $result->students != '') {
                                         foreach($explode_student as $key => $value) { 
                                            $student_detail = $this->db->where('user_id',$value)->get('users')->row();
                                            $decline_student_status = explode(',',$result->decline_student_status);
                                            if($result->join_students != '') {
                                              $join_students    = explode(',',$result->join_students);
                                            } else {
                                              $join_students    = [];
                                            }

                                            if($result->decline_students != '') {
                                              $decline_students    = explode(',',$result->decline_students);
                                            } else {
                                              $decline_students    = [];
                                            }
                                            if(!in_array($value, $join_students) && !in_array($value, $decline_students)) {
                                              $status ="In Progress";
                                             ?>
                                              <tr class="<?= ($i & 1) ? 'even' : 'odd'; ?>">
                                                  <td><?= $student_detail->user_name; ?></td>
                                                  <td><?= $student_detail->user_email; ?></td>
                                                  <td class="text-center" style=" width: 17%">
                                                   <?= $status?>
                                                  </td>
                                              </tr>

                                          <?php $i++;
                                           } 
                                        }
                                      }
                                    }      
                                ?>
                            </tbody>

                        </table>
                    </div>  
                  <?php } ?>
            </div>

        </div>

    </div>

</div><!--/span-->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
<style type="text/css">
</style>
<script type="text/javascript">
  $(document).ready(function() {
    $(".join").trigger('click');
  });
    $(".in_progress").on('click', function(){
       $('#decline_view').css('display','none');
    });
    $(".decline_view").on('click', function(){
       $('#decline_view').css('display','block');
    });
    $(".join").on('click', function(){
       $('#decline_view').css('display','none');
    });
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('body').on('click', '.decline_request', function() {
            var id = $(this).attr('batchid');
            var student_id = $(this).attr('studentid');
            Swal.fire({
              title: 'Are you sure?',
              text: "You want to remove this student!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes',
              cancelButtonText: 'No',
            }).then((result) => {
              if (result.isConfirmed) {
                $.LoadingOverlay("show");
                $.ajax({
                      type: 'POST',
                      url: "<?= base_url('admin_control/remove_student_batch')?>",
                      data: { id:id,student_id : student_id },
                      dataType: "json",
                      success: function(resultData) 
                      { 
                        $.LoadingOverlay("hide");
                        if(resultData.status) {
                            $('#student'+student_id).hide();
                            Swal.fire(
                              'Success!',
                              resultData.message,
                              'success'
                            );
                            setTimeout(function(){
                              location.reload();
                            }, 2000);
                        } 
                        else 
                        {
                            Swal.fire({
                              icon: 'error',
                              title: 'Oops...',
                              text: resultData.message
                            })
                        }
                      }
                });
              }
            });
            
        });
    });
</script>