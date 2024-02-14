<div id="note">

    <?php 

    if ($message) {

        echo $message;    

    }

    // echo"<pre>";
    // print_r($questions); die;
    ?>

</div>



<div class="block"> 

    <div class="navbar block-inner block-header">

        <div class="row"><p class="text-muted">Bulk Questions </p></div>

    </div>

    <div class="block-content">

        <div class="row">

            <div class="col-sm-12">
                <p style="color:red;">Note : Please choose a different questions which are not in this live test. Same questions will not be added again.</p>
                <?php if (isset($questions) != NULL) { ?>
                    <button type="type" id="add_questions_button" class="btn btn-primary" style="margin: 15px;display:none;"><i class="glyphicon glyphicon-plus-sign"></i> Add Selected Questions</button>
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

                        <thead>

                            <tr>
                                <th><input type='checkbox' id='master_click'></th>

                                <th>Question</th>

                                <th>Option 1</th>

                                <th>Option 2</th>

                                <th>Option 3</th>

                                <th>Option 4</th>

                            </tr>

                        </thead>

                        <tbody>
                          <?php 
                            $i = 1;
                            foreach ($questions as $result) { 
                              $ans = $this->db->where('ques_id',$result->ques_id)->get('answers')->result();

                              ?>
                                <tr class="<?= ($i & 1) ? 'even' : 'odd'; ?>">
                                  <td><input type="checkbox" class='sub_click' data-id='<?= $result->ques_id ?>' class="selected_questions"></td>
                                  <td><?= $result->question?></td>
                                  <?php foreach($ans as $key) { ?>
                                    <td><?php if($key->right_ans == 1) { ?> <i class="fa fa-check" aria-hidden="true"></i> <?php } ?> <?= $key->answer?></td>
                                  <?php } ?>  
                                </tr>

                            <?php $i++;
                            }
                          ?>

                        </tbody>

                    </table>

                    <?php

                } else {

                    echo 'No Questions!';

                }

                ?>

            </div>

        </div>

    </div>

</div><!--/span-->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
<script type="text/javascript">
  jQuery('#master_click').on('click', function(e) {
    if($(this).is(':checked',true))
    {
        $(".sub_click").prop('checked', true);
        $("#add_questions_button").show(500);
    }
    else
    {
        $(".sub_click").prop('checked',false);
        $("#add_questions_button").hide(500);
    }
});

jQuery('.sub_click').on('click', function(e)
{
  var Count = $('.sub_click:checked').length;
  if($(this).is(':checked',true))
  {

      $("#add_questions_button").show(500);
  } else {

      if(Count==0)
      {
          $("#add_questions_button").hide(500);
      }
  }
});

jQuery('#add_questions_button').on('click', function(e)
{
    var allVals = [];
    $(".sub_click:checked").each(function()
    {
        allVals.push($(this).attr('data-id'));
    });

    if(allVals.length <=0)
    {
        alert("Please select any Question.");

    }  else {

        Add_Questions = "Are you sure you want to add selected Questions?";
        var check = confirm(Add_Questions);
        if(check == true)
        {

            var join_selected_values = allVals.join(",");
            $.LoadingOverlay("show");
            var baseurl =  "<?= base_url() ?>";
            var ajaxurl = "admin_control/add_questions";
            postData = {
                'questions' : join_selected_values,
                'exam_id' : "<?= $mock_title->title_id ?>"
            };

            $.ajax({
                type: "POST",
                url: baseurl + ajaxurl,
                data: postData,
                success: function(result)
                {
                    $.LoadingOverlay("hide");
                    window.location.href = '<?= base_url('admin_control/set_time_n_random_ques_no/'.$mock_title->title_id) ?>';
                   
                }

            })
        }
    }
});


</script>