<?php //echo "<pre/>"; print_r($blogs); exit(); ?>
<style>
iframe {
    width: 200px;
    height: 100px;
}
</style>
<div id="note">
    <?=validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>        
    <?=(isset($message)) ? $message : ''; ?>
</div>

<div class="block">  
    <div class="navbar block-inner block-header">
        <div class="row">
            <p class="text-muted">Blog posts 
                <a class="btn custom_navbar-btn btn-primary pull-right col-sm-3" href="<?php echo base_url('blog/add'); ?>"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp; Add Post </a>
            </p>
        </div>
    </div>

    <div class="block-content custom-iframe">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
				<div class="table-responsive">
                <?php if (isset($blogs) != NULL) { ?>
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th class="col-xs-2">Post</th>
                                <th class="col-xs-2">Media Type</th>
                                <th class="col-xs-3">Attachment</th>
                                <th class="col-sm-1 col-xs-2">Date</th>
                                <th class="col-sm-3 col-xs-3 col-sm-3 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($blogs as $blog) {
                                ?>
                                <tr class="<?= ($i & 1) ? 'even' : 'odd'; ?>">
                                    <td class="col-xs-2"><?= $blog->blog_title; ?>
                                        <div class="collapse" id="collapse_<?= $blog->blog_id; ?>"><br/>
                                            <p class="notice-css"><span class="text-muted"><b>Short Description</b>: </span> 
                                                <?= $blog->blog_short_body; ?>
                                            </p>
                                        </div>
                                    </td>

                                    <td class="col-xs-2"><?= ucfirst($blog->blog_media_type); ?></td>
                                    <td class="col-xs-3">
									<?php
									if($blog->blog_media_type=='image') {
										echo  "<img src='".base_url('blog_files/').$blog->blog_attachment."' width='50px;'>"; 
									} else if($blog->blog_media_type=='file'){
										echo "<a href='".base_url('blog_files/').$blog->blog_attachment."' target='_blank'>View File</a>"; 
									} else {

                                        echo $blog->blog_attachment; 
                                    }
									 ?>
									 
									 </td>
                                    <td class="col-xs-2"><?= $blog->blog_post_date; ?></td>
                                    <td class="col-xs-3 text-center">
                                        <div class="btn-group">
                                            <a href="#collapse_<?= $blog->blog_id; ?>"  data-toggle="collapse" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-resize-small"></i><span class="invisible-on-sm"> View</span></a>
                                            <a class="btn btn-default btn-sm" href = "<?php echo base_url('blog/edit/' . $blog->blog_id); ?>"><i class="glyphicon glyphicon-edit"></i><span class="invisible-on-md">  Modify</span></a>
                                            <?php if ($this->session->userdata['user_role_id'] <= 3) { ?>
                                                <a onclick="return delete_confirmation()" href = "<?php echo base_url('blog/delete/' . $blog->blog_id); ?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-trash"></i><span class="invisible-on-md">  Delete</span></a>
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
                    <?php
                } else {
                    echo 'No blogs!';
                }
                ?>
				</div>
            </div>
        </div>
    </div>
</div><!--/span-->
