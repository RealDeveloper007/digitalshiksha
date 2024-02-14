<?php //echo "<pre/>"; print_r($sub_categories); exit(); ?>
<div id="note">
    <?php 
    if ($message) {
        echo $message;    
    }
    ?>
</div>
<style>
    .block-content .col-sm-12 {
    padding: 13px;
}
</style>
<div class="block"> 
  
    <div class="block-content">
    <div class="row">
        <div class="col-sm-12">
            <form method="get">
                <div class="col-lg-3 col-sm-4 col-xs-4">
                                <?php 
                                
                                if($_GET['category'])
                                {
                                    echo form_dropdown('category', $categories,$_GET['category'], 'id="parent-category" class="form-control"');
                                } else {
                                    echo form_dropdown('category', $categories,'', 'id="parent-category" class="form-control"');
                                }
                                
                                ?>
                            </div>
                 <div class="col-lg-3 col-sm-4 col-xs-4">
                     <?php 
                     
                     if($_GET['sub_category'])
                                {
                                    echo form_dropdown('sub_category', $option2, $_GET['sub_category'], 'id="sub_category" class="form-control"');
                                } else {
                                    echo form_dropdown('sub_category', array('select sub category'),'', 'id="sub_category" class="form-control"');
                                }
                    ?>

                </div>
                <div class="col-lg-3 col-sm-4 col-xs-4">
                    <button type="submit" class="btn btn-primary"> Search</button>
                </div>
                </form>
                <br></br>
        </div>
    <div class="col-sm-12">
            
        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatable" id="example">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Sub Sub-category Name</th>
                    <th class="col-sm-3" style="width: 27%">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1;
            if($sub_sub_categories) {
            foreach ($sub_sub_categories as $category) { ?>
                <tr class="<?=($i & 1) ? 'even' : 'odd'; ?>">
                    <td><?= $i ?></td>
                    <td><?=$category->name; ?></td>
                    <td style="width: 13%">
                        <a class="btn btn-warning" href = "<?php echo base_url('admin_control/sub_subcategory_form?category='.$_GET['category'].'&sub_category='.$_GET['sub_category'].'&id='.$category->id); ?>"><i class="glyphicon glyphicon-pencil"></i><span class="invisible-on-md">  Edit </span></a>

                        <a onclick="return confirm('Are you sure to delete this sub sub category?')" class="btn btn-danger" href = "<?php echo base_url('admin_control/delete_sub_subcategory/' . $category->id); ?>"><i class="glyphicon glyphicon-check"></i><span class="invisible-on-md">  Delete </span></a>
                    </td>
                </tr>
                <?php $i++; } } else { echo "<tr><td colspan='3' style='text-align:center;'>No Sub Sub-category found</td></tr>";} ?>
            </tbody>
        </table>
      
    </div>
    </div>
    </div>
</div><!--/span-->
<script>
$('select#parent-category').change(function() {

    var category = $(this).val();
    var link = '<?php echo base_url()?>'+'admin_control/get_subcategories_ajax/'+category;
    $.ajax({
        data: category,
        url: link
    }).done(function(subcategories) {

        console.log(subcategories);
        $('#sub_category').html(subcategories);
                $('#sub_sub_category').empty().html("<option>Select Sub Category first</option>");

    });
});

$('select#sub_category').change(function() {

    var sub_category = $(this).val();
    var link = '<?php echo base_url()?>'+'admin_control/get_sub_subcategories_ajax/'+sub_category;
    $.ajax({
        data: sub_category,
        url: link
    }).done(function(subcategories) {

        console.log(subcategories);
        $('#sub_sub_category').html(subcategories);
    });
});
</script>