<div id="note">

    <?php 

    if ($message) {

        echo $message;    

    }

    ?>

</div>



<div class="block"> 

    <div class="navbar block-inner block-header">

        <div class="row"><p class="text-muted">Batch Request </p></div>

    </div>

    <div class="block-content">

        <div class="row">

            <div class="col-sm-12">

                <?php if (isset($request_batches) != NULL) { ?>

                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

                        <thead>

                            <tr>

                                <th>Date</th>

                                <th>Teacher</th>

                                <th>Batch Name</th>

                                <th class="hidden-xxs">Batch Code</th>

                                <th class="text-center" style=" width: 10%">Action</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php 

                            $i = 1;

                            foreach ($request_batches as $result) {

                            ?>

                                <tr class="<?= ($i & 1) ? 'even' : 'odd'; ?>">

                                    <td><?= date('d M,Y',strtotime($result['created_at'])); ?></td>

                                    <td><?= $result['created_by']; ?></td>

                                    <td><?= $result['batch_name']; ?></td>

                                    <td class="hidden-xxs"><?= $result['batch_code']; ?></td>

                                    <td class="text-center" style=" width: 17%">

                                        <?php if($result['status'] == 1) { ?>

                                            <div class="btn-group">
                                                <a class="btn btn-success btn-xs accept_batch" href = "#" batchid="<?= $result['id']?>"><i class="fa fa-check"></i> Accept</a>

                                                <a class="btn btn-danger btn-xs decline_request" href = "#" batchid="<?= $result['id']?>"><i class="fa fa-trash" aria-hidden="true"></i> Decline</a>

                                            </div>

                                        <?php } else { ?>
                                            <?= $result['status']?>
                                         <?php } ?>   

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

                    echo 'No Batches!';

                }

                ?>

            </div>

        </div>

    </div>

</div><!--/span-->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('body').on('click', '.decline_request', function() {
            var id = $(this).attr('batchid');
            Swal.fire({
              title: 'Are you sure?',
              text: "You want to decline this batch!",
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
                      url: "<?= base_url('exam_control/decline_batch')?>",
                      data: { id:id },
                      dataType: "json",
                      success: function(resultData) 
                      { 
                        $.LoadingOverlay("hide");
                        if(resultData.status) {
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

         $('body').on('click', '.accept_batch', function() {
            var id = $(this).attr('batchid');
            $.LoadingOverlay("show");
            $.ajax({
                  type: 'POST',
                  url: "<?= base_url('exam_control/accept_batch')?>",
                  data: { id:id },
                  dataType: "json",
                  success: function(resultData) 
                  { 
                    $.LoadingOverlay("hide");
                    if(resultData.status) {
                        Swal.fire(
                          'Success!',
                          'You are joined new batch for Live Exam!',
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
        });
    });
</script>