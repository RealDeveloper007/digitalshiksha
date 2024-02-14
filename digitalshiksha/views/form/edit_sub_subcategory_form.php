<?php
if ($message) {
    echo $message;
}
?>
<!-- block -->
<div class="block">
    <div class="navbar block-inner block-header">
        <div class="row"><p class="text-muted">Create Sub Sub-category </p></div>
    </div>
    <div class="block-content">
    <div class="row">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-xs-offset-1 col-xs-10">
                <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
            </div>
        </div>
        <div class="row">
            <?=form_open(base_url('admin_control/update_sub_subcategory'), 'role="form" class="form-horizontal"'); ?>
            <div class="form-group">
                <label for="category" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">Select Category:</label>
                <div class="col-lg-5 col-sm-8 col-xs-7 col-mb">
                 <?php echo form_hidden('id', $_GET['id'], 'placeholder="Sub Sub-category Name" class="form-control" required="required"') ?>

                    <?php echo form_dropdown('category', $option, $sub_sub_category->cat_id, 'id="category" class="form-control"') ?>
                </div>
            </div>
             <div class="form-group">
                <label for="category" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">Select Category:</label>
                <div class="col-lg-5 col-sm-8 col-xs-7 col-mb">
                    <?php echo form_dropdown('sub_category',$option2,$sub_sub_category->sub_cat_id, 'id="sub_category" class="form-control"');?>
                </div>
            </div>
            <div class="form-group">
                <label for="sub_cat_name" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">Sub-category Name:</label>
                <div class="col-lg-5 col-sm-8 col-xs-7 col-mb">
                    <?php echo form_input('sub_cat_name', $sub_sub_category->name, 'id="sub_cat_name" placeholder="Sub Sub-category Name" class="form-control" required="required"') ?>
                </div>
            </div>
            <br/><hr/>
            <div class="row">
                <div class="col-xs-offset-1 col-xs-11 col-sm-offset-2 col-md-8">
                    <button type="submit" class="btn btn-primary col-xs-5 col-sm-3">Save</button>
                </div>
            </div>
            <?=form_close() ?>
        </div>
    </div>
    </div>
    </div>
</div>
<script>
    $('select#category').change(function() {

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