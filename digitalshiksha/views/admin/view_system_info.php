<style>
    h4
    {
        background: #1c2670;
        color: white;
        padding: 10px;
    }
</style>
<?php     //echo "<pre/>"; print_r($sys_set); exit();
$str = '[';
foreach ($currencies as $value) {
    $str .= "{value:" . $value->currency_id . ",text:'" . $value->currency_name . " (" . $value->currency_symbol . ")'},";
}
$str = substr($str, 0, -1);
$str .= "]";
?>
<div id="note">
    <?=validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>        
    <?=(isset($message)) ? $message : ''; ?>
</div>
<div class="block">  
    <div class="navbar block-inner block-header">
        <div class="row"><p class="text-muted">System Info </p></div>
    </div>
    <div class="block-content">
        <div class="row">
            <div class="col-sm-12">
                <!--BEGIN TABS-->
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Basic Info</a></li>
                    <li><a href="#tab_5" data-toggle="tab">Content</a></li>
                    <li><a href="#tab_2" data-toggle="tab">Social Profiles</a></li>
                </ul>
                <div class="tab-content info-display">
                    <div class="tab-pane" id="tab_5">
                        <?=form_open(base_url('admin/system_control/update_content'), 'role="form" class="form-horizontal"'); ?>
                        <?php $sys_content = $this->db->get('content')->result(); 
                            // echo "<pre/>"; print_r($sys_content); 
                            foreach ($sys_content as $value) { ?>
                                <?php 
                                if ($value->content_type == 'about_us') { ?>
                                    <div class="form-group">
                                        <label for="about_title" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">About Us:</label>
                                        <div class="col-sm-8 col-xs-7 col-mb">
                                            <?=form_input('about_title', $value->content_heading, 'placeholder="About Us Title" class="form-control" required="required"') ?>
                                            <br/>
                                            <?php 
                                            $data = array(
                                                'name'        => 'about_content',
                                                'placeholder' => 'About Us Content',
                                                'value'       => $value->content_data,
                                                'rows'        => '10',
                                                'class'       => 'form-control textarea-wysihtml5',
                                                'required' => 'required',
                                            ); ?>
                                            <?=form_textarea($data) ?>
                                        </div>
                                    </div>
                                <?php }
                                if ($value->content_type == 'price_table_msg') { ?>
                                    <div class="form-group">
                                        <label for="pricing_title" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">Price Table Message:</label>
                                        <div class="col-sm-8 col-xs-7 col-mb">
                                            <?=form_input('price_tbl_title', $value->content_heading, 'placeholder="Ptice Table Title" class="form-control" required="required"') ?>
                                            <br/>
                                            <?php 
                                            $data = array(
                                                'name'        => 'price_tbl_content',
                                                'placeholder' => 'Price Table Message',
                                                'value'       => $value->content_data,
                                                'rows'        => '5',
                                                'class'       => 'form-control textarea-wysihtml5',
                                                'required' => 'required',
                                            ); ?>
                                            <?=form_textarea($data) ?>
                                        </div>
                                    </div>
                                <?php }
                                if ($value->content_type == 'slider_text') { ?>
                                    <div class="form-group">
                                        <label for="slider_text_title" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">Slider Text:</label>
                                        <div class="col-sm-8 col-xs-7 col-mb">
                                            <?=form_input('slider_text_title[]', $value->content_heading, 'placeholder="Slider Text Heading" class="form-control" required="required"') ?>
                                            <br/>
                                            <?php 
                                            $data = array(
                                                'name'        => 'slider_text[]',
                                                'placeholder' => 'Slider Text',
                                                'value'       => $value->content_data,
                                                'rows'        => '2',
                                                'class'       => 'form-control textarea-wysihtml5'
                                            ); ?>
                                            <?=form_textarea($data) ?>                                            
                                        </div>
                                    </div>
                                <?php }
                            } ?><br/><br/><br/>
                        <div class="row">
                            <div class="col-xs-offset-1 col-xs-11 col-sm-offset-2 col-md-8">
                                <button type="submit" class="btn btn-primary col-xs-5 col-sm-3">Save</button>
                            </div>
                        </div>
                        <?=form_close() ?>
                    </div>


                    <div class="tab-pane" id="tab_2">
                        <dl class="dl-horizontal">
                            <h4> Important Links</h4>

                            <dt>YouTube Channel: </dt>
                            <dd>
                                <blockquote>
                                    <p class="lead">
                                        <a href="#" data-name="youtube" data-type="textarea" data-rows="2" data-url="<?=base_url('admin/system_control/update_system_info'); ?>" data-pk="<?= $sys_set->brand_id ?>" class="data-modify-social no-style"><?= $sys_set->you_tube_url ?></a>
                                        <a href="<?= $sys_set->you_tube_url ?>" target="_blank" class="btn btn-default btn-xs vitis-url"> Visit the link </a>
                                    </p>
                                </blockquote>
                            </dd>
                            <dt>Meet Us On Facebook: </dt>
                            <dd>
                                <blockquote>                            
                                    <p class="lead">
                                        <a href="#" data-name="facebook" data-type="textarea" data-rows="2" data-url="<?=base_url('admin/system_control/update_system_info'); ?>" data-pk="<?= $sys_set->brand_id ?>" class="data-modify-social no-style"><?= $sys_set->facbook_url ?></a>
                                        <a href="<?= $sys_set->facbook_url ?>" target="_blank" class="btn btn-default btn-xs vitis-url"> Visit the link </a>
                                    </p>
                                </blockquote>
                            </dd>
                            <dt>Online Exam Tutorial Video: </dt>
                            <dd>
                                <blockquote>                            
                                    <p class="lead">
                                        <a href="#" data-name="googleplus" data-type="textarea" data-rows="2" data-url="<?=base_url('admin/system_control/update_system_info'); ?>" data-pk="<?= $sys_set->brand_id ?>" class="data-modify-social no-style"><?= $sys_set->googleplus_url ?></a>
                                        <a href="<?= $sys_set->googleplus_url ?>" target="_blank" class="btn btn-default btn-xs vitis-url"> Visit the link </a>
                                    </p>
                                </blockquote>
                            </dd>
                            <dt>Our Subjective Website: </dt>
                            <dd>
                                <blockquote>                            
                                    <p class="lead">
                                        <a href="#" data-name="twitter" data-type="textarea" data-rows="2" data-url="<?=base_url('admin/system_control/update_system_info'); ?>" data-pk="<?= $sys_set->brand_id ?>" class="data-modify-social no-style"><?= $sys_set->twitter_url ?></a>
                                        <a href="<?= $sys_set->twitter_url ?>" target="_blank" class="btn btn-default btn-xs vitis-url"> Visit the link </a>
                                    </p>
                                </blockquote>
                            </dd>

                            <h4> Usefull Links</h4>

                            <dt>Example: </dt>
                            <dd>
                            <blockquote>   
                                <textarea class="form_textarea" style="margin: 0px;width: 619px;height: 74px;" disabled="disabled"><li><a class="text-muted" href="www.google.com" target="_blank"><i class="fa fa-google"></i> Google</a></li></textarea>
                                <br><br>
                                <a href="https://fontawesome.com/v4.7.0/icons/" target="_blank" style="color:blue">Find the Icons</a>
                            </blockquote>
                            </dd>


                            <dt>Link 1: </dt>
                            <dd>
                                <blockquote>                            
                                    <p class="lead">
                                        <a href="#" data-name="linkedin" data-type="textarea" data-rows="2" data-url="<?=base_url('admin/system_control/update_system_info'); ?>" data-pk="<?= $sys_set->brand_id ?>" class="data-modify-social no-style"><?= $sys_set->linkedin_url ?></a>
                                        <a href="<?= $sys_set->linkedin_url ?>" target="_blank" class="btn btn-default btn-xs vitis-url"> Visit the link </a>
                                    </p>
                                </blockquote>
                            </dd>
                            <dt>Link 2: </dt>
                            <dd>
                                <blockquote>                            
                                    <p class="lead">
                                        <a href="#" data-name="pinterest" data-type="textarea" data-rows="2" data-url="<?=base_url('admin/system_control/update_system_info'); ?>" data-pk="<?= $sys_set->brand_id ?>" class="data-modify-social no-style"><?= $sys_set->pinterest_url ?></a>
                                        <a href="<?= $sys_set->pinterest_url ?>" target="_blank" class="btn btn-default btn-xs vitis-url"> Visit the link </a>
                                    </p>
                                </blockquote>
                            </dd>
                            <dt>Link 3: </dt>
                            <dd>
                                <blockquote>                            
                                    <p class="lead">
                                        <a href="#" data-name="flickr" data-type="textarea" data-rows="2" data-url="<?=base_url('admin/system_control/update_system_info'); ?>" data-pk="<?= $sys_set->brand_id ?>" class="data-modify-social no-style"><?= $sys_set->flickr_url ?></a>
                                        <a href="<?= $sys_set->flickr_url ?>" target="_blank" class="btn btn-default btn-xs vitis-url"> Visit the link </a>
                                    </p>
                                </blockquote>
                            </dd>
                        </dl>
                        <hr/>
                        <?php if ($this->session->userdata['user_role_id'] == 1) { ?>
                            <div class="col-xs-10 col-xs-offset-1">
                                <a class="btn btn-info btn-block modify" id="rev-link" name="modify-social" href = "#"><i class="glyphicon glyphicon-edit"></i> Modify</a>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="tab-pane active" id="tab_1">
                        <?=form_open_multipart(base_url('admin/system_control/view_settings'), 'role="form" class="form-horizontal"'); ?>
                        <div class="form-group">
                            <label for="brand_name" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">Brand Name:</label>
                            <div class="col-sm-8 col-xs-7 col-mb">
                                <?=form_input('brand_name', $sys_set->brand_name, 'placeholder="Brand Name" class="form-control" required="required"') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="brand_tagline" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">Brand Tagline:</label>
                            <div class="col-sm-8 col-xs-7 col-mb">
                                <?=form_input('brand_tagline', $sys_set->brand_tagline, 'placeholder="Brand Tagline" class="form-control"') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">Address:</label>
                            <div class="col-sm-8 col-xs-7 col-mb">
                                <?=form_input('address', $sys_set->address, 'placeholder="Address" class="form-control"') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="local_time_zone" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">Timezone:</label>
                            <div class="col-sm-8 col-xs-7 col-mb">
                                <select name="local_time_zone" class="form-control" required="required">
                                    <option value=''>Select Timezone</option>
                                    <?php  foreach ($time_zone as $value) { ?>
                                        <option value="<?=$value->timezone_name?>" <?=($sys_set->local_time_zone == $value->timezone_name)?'selected':''?>><?=$value->timezone_name?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="support_email" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">Support Email:</label>
                            <div class="col-sm-8 col-xs-7 col-mb">
                                <?=form_input('support_email', $sys_set->support_email, 'placeholder="Support Email" class="form-control"') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="support_phone" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">Support Phone:</label>
                            <div class="col-sm-8 col-xs-7 col-mb">
                                <?=form_input('support_phone', $sys_set->support_phone, 'placeholder="Support Phone" class="form-control"') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bussiness_type" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">Bussiness Type:</label>
                            <div class="col-sm-8 col-xs-7 col-mb">
                                <select name="bussiness_type" class="form-control" required="required">
                                    <option value="1" <?=($sys_set->commercial == 1)?'selected':''?> >Commercial</option>
                                    <option value="0" <?=($sys_set->commercial == 0)?'selected':''?> >Non-commercial</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="student_can_register" class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">Student Can Register:</label>
                            <div class="col-sm-8 col-xs-7 col-mb">
                                <select name="student_can_register" class="form-control" required="required">
                                    <option value="1" <?=($sys_set->student_can_register == 1)?'selected':''?>>Yes</option>
                                    <option value="0" <?=($sys_set->student_can_register == 0)?'selected':''?>>No</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" style="height: 100px;">
                            <label for="logo" class="col-sm-2 hidden-xs control-label col-xs-2">Logo: </label>
                            <div class="col-sm-9 col-xs-12">
                                <?php if(file_exists ('logo.fsz')): ?>
                                    <img src="<?=base_url('logo.fsz');?>" alt="LOGO" style="max-height: 100px; max-width: 100px;" >
                                <?php else: ?>
                                    <img src="http://placehold.it/100?text=LOGO">
                                <?php endif; ?>
                                <span class="btn btn-default btn-flat btn-file col-xs-3" style="border-width: 2px; position: absolute; left: 200px; top: 35px">
                                    <i class="glyphicon glyphicon-open"></i> Upload Logo 
                                    <?=form_upload('logo', '', 'id="logo" class="form-control"') ?>
                                </span><br/>
                                <p class="help-block" style="margin-left:406px;  position: absolute; top: 38px; "><i class="glyphicon glyphicon-warning-sign"></i> Allowed only: jpg | jpeg | png. Standard: 200px X 78px</p>
                            </div>
                        </div><br/><br/><br/>
                        <div class="row">
                            <div class="col-xs-offset-1 col-xs-11 col-sm-offset-2 col-md-8">
                                <button type="submit" class="btn btn-primary col-xs-5 col-sm-3">Save</button>
                            </div>
                        </div>
                        <?=form_close() ?>
                    </div>
                </div>
                <!--END TABS-->
            </div>
        </div>
    </div>
</div><!--/span-->

<?=$this->load->view('plugin_scripts/bootstrap-wysihtml5');?>
