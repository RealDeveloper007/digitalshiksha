<style>
    .form-horizontal .form-group {
     margin-left: 0px;
     margin-right: 0px;
}
</style>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <?php echo form_open(base_url() . 'exam_control/search_batch', 'role="form" class="form-horizontal"'); ?>
            <div class="row">
                <?php
                if (isset($message) && $message != '') {
                    echo $message;
                }
                ?>
                <h4>Join batch</h4>
            </div>
            <hr/>
            <div class="row">
                <div class="col-xs-offset-1 col-xs-10">
                    <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                </div>
            </div>
            <div class="row">
               
                <div class="form-group">
                  <label for="user_name" class="col-sm-2 control-label col-xs-2">Batch Code: *</label>
                  <div class="col-xs-6">
                      <?php echo form_input('batch_code', '', 'placeholder="Batch Code" class="form-control" required="required"') ?>
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-offset-1 col-sm-offset-2 col-xs-4">
                    <button type="button" class="btn btn-primary col-xs-6 search_batch">Submit</button>&nbsp;
                </div>
            </div>
            <?php echo form_close() ?>
            <br/>
        </div>
    </div> <!-- /.row -->
</div> <!-- /.container -->
<br/><br/>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script> 
<script>
    $(".search_batch").on('click', function(){
         var code = $("input[name=batch_code]").val();
         if(code != '') {
             $.LoadingOverlay("show");
            $.ajax({
                type: 'POST',
                url: "<?= base_url('exam_control/request_join_batch')?>",
                data: { code:code },
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
         } else {
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Please fill Batch Code Firstly!'
            })
         }
    })
</script>