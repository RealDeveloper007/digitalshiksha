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
.custom_navbar-btn {
    margin-top: 22px !important;
    margin-bottom: 0px !important;
}
</style>
<div class="block"> 
  
    <div class="block-content">
    <div class="row">
        <div class="col-sm-12">
            <form method="get">
                <div class="col-lg-3 col-sm-3 col-xs-3">
                                <?php 
                                
                                if($_GET['category'])
                                {
                                    echo form_dropdown('category', $categories,$_GET['category'], 'id="parent-category" class="form-control"');
                                } else {
                                    echo form_dropdown('category', $categories,'', 'id="parent-category" class="form-control"');
                                }
                                
                                ?>
                            </div>
                 <div class="col-lg-3 col-sm-3 col-xs-3">
                     <?php 
                     
                     if($_GET['sub_category'])
                                {
                                    echo form_dropdown('sub_category', $option2, $_GET['sub_category'], 'id="sub_category" class="form-control"');
                                } else {
                                    echo form_dropdown('sub_category', array('Select Sub Category'),'', 'id="sub_category" class="form-control"');
                                }
                    ?>

                </div>

                <div class="col-lg-3 col-sm-3 col-xs-3">
                     <?php 
                     
                     if($_GET['sub_sub_category'])
                                {
                                    echo form_dropdown('sub_sub_category', $option3, $_GET['sub_sub_category'], 'id="sub_sub_category" class="form-control"');
                                } else {
                                    echo form_dropdown('sub_sub_category', array('Select Sub Sub Category'),'', 'id="sub_sub_category" class="form-control"');
                                }
                    ?>

                </div>

                <div class="col-lg-2 col-sm-2 col-xs-2">
                    <button type="submit" class="btn btn-primary"> Search</button>
                </div>
                <span class="pull-left" style="margin: 13px;font-size: 30px;color: red;">Note : Name must be LONG ANSWER,PDF,VIDEO & MCQ.</span>             
                <a class="btn custom_navbar-btn btn-primary pull-right" href="<?php echo base_url('admin_control/sub_sub_subcategory_form'); ?>"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp; Add Sub Sub Sub Category </a>
                </form>
                <br></br>
        </div>
    <div class="col-sm-12">
            
        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatable" id="example">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Sub Sub Sub-category Name</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1;
            foreach ($sub_sub_sub_categories as $category) { ?>
                <tr class="<?=($i & 1) ? 'even' : 'odd'; ?>">
                    <td><?= $i ?></td>
                    <td> <img src="<?=base_url('category_images/'.$category->icon_class); ?>" width="100px"></td>
                    <td><?=$category->name; ?></td>
                    <td><?=$category->status==1 ? 'Active' : 'In-Active'; ?></td>
                    <td>

                    <div class="btn-group">
                        <?php if($category->name!='MCQ') { ?>
                        <a class="btn btn-default btn-sm" href="<?php echo base_url('create_syllabus_questions?id='.$category->id.'&type='.strtolower($category->name)); ?>" target="_blank"><i class="glyphicon glyphicon-plus"></i><span class="invisible-on-md">  Add Questions</span></a>
                         <?php } ?>
                        <a class="btn btn-default btn-sm" href="<?php echo base_url('view_syllabus_questions?id='.$category->id.'&type='.strtolower($category->name)); ?>" target="_blank"><i class="glyphicon glyphicon-eye-open"></i><span class="invisible-on-md">  View Questions</span></a>

                        <a class="btn btn-default btn-sm" href="<?php echo base_url('admin_control/sub_sub_subcategory_form?category='.$_GET['category'].'&sub_category='.$_GET['sub_category'].'&id='.$category->id); ?>"><i class="glyphicon glyphicon-edit"></i><span class="invisible-on-md">  Modify</span></a>

                        <!-- <a onclick="return confirm('Are you sure to delete this sub sub sub category?')" href="<?php //echo base_url('admin_control/delete_sub_subcategory/' . $category->id); ?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-trash"></i><span class="invisible-on-md">  Delete</span></a> -->
                    </div>
                    </td>
                </tr>
                <?php $i++;
            } ?>
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