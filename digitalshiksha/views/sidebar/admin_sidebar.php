<!-- \ css class control -->

<style>
      ul.tsc_pagination li a
    {
        border:solid 1px;
        border-radius:3px;
        -moz-border-radius:3px;
        -webkit-border-radius:3px;
        padding:6px 9px 6px 9px;
    }
    div#pagination ul li {
    display: flex;
    float: left;
}
    ul.tsc_pagination li
    {
        padding-bottom:1px;
    }
    ul.tsc_pagination li a:hover,
    ul.tsc_pagination li a.current
    {
        color:#FFFFFF;
        box-shadow:0px 1px #EDEDED;
        -moz-box-shadow:0px 1px #EDEDED;
        -webkit-box-shadow:0px 1px #EDEDED;
    }
    ul.tsc_pagination
    {
        /*margin: -74px 0 0;*/
        padding:0px;
        overflow:hidden;
        font:12px 'Tahoma';
        list-style-type:none;
    }
    ul.tsc_pagination li
    {
        margin:0px;
        padding:0px;
        margin-left:5px;
    }
    ul.tsc_pagination li a
    {
        color:black;
        display:block;
        text-decoration:none;
        padding:7px 10px 7px 10px;
    }
    ul.tsc_pagination li a img
    {
        border:none;
    }
    ul.tsc_pagination li a {
        color: #F87405;
        border-color: #F87405;
        background: #F8FCFF;
        width: auto;
        height: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 5px 4px;
    }
    ul.tsc_pagination li a:hover, ul.tsc_pagination li a.current {
        text-shadow: 0px 1px #F87405;
        border-color: #F87405;
        background: #F87405;
        background: -moz-linear-gradient(top, #F87405 1px, #F87405 1px, #F87405);
        background: -webkit-gradient(linear, 0 0, 0 100%, color-stop(0.02, #F87405), color-stop(0.02, #F87405), color-stop(1, #F87405));
    }
    #pagination{
        margin-top: 15px;
    }
    .tsc_pagination li:nth-child(2) {
        display: flex;
        flex-flow: row wrap;
    }
 
    .pagination {
        display: flex;
        justify-content: center;
        margin: 0px !important;
    }
    a.page.active {
    color: white;
    background: #F87405;
    cursor:not-allowed;
}
</style>
<?php
if (isset($class)) {
    $active = floor($class/10); //The numeric value to round
}
?>
<!-- \ Sidebar -->
<ul class="nav sidebar">
    <li>
        <a href="<?=base_url('dashboard/'.$this->session->userdata('user_id')); ?>">
            <i class="fa fa-dashboard fa-2x"></i> Dashboard
        </a>
    </li>
    <?php if ($this->session->userdata['user_role_id'] <= 3) { ?>
    <li><a href="#" class="sub <?=($active==1)?"active":'';?>"><i class="fa fa-user"> </i> User Control</a>
        <ul>
            <li><a href="<?=base_url('user_control');?>" class="<?=($class==11)?"current":'';?>">View Users</a></li>
            <li><a href="<?=base_url('user_control/user_add_form');?>" class="<?=($class==12)?"current":'';?>">Add New User</a></li>
            <li><a href="<?=base_url('user_control/view_banned_users');?>" class="<?=($class==13)?"current":'';?>">Banned / Inactive Users</a></li>
        </ul>
    </li>
    <?php } ?>

     <?php if ($this->session->userdata['user_role_id'] == 4) { ?>
    <li><a href="#" class="sub <?=($active==90)?"active":'';?>"><i class="fa fa-group"></i> Batch Control</a>
        <ul>
            <li><a href="<?=base_url('batches');?>" class="<?=($class==91)?"current":'';?>">List of batches</a></li>
            <li><a href="<?=base_url('admin_control/student_batch_request');?>" class="<?=($class==92)?"current":'';?>">Student Request</a></li>
        </ul>
    </li>
<?php } ?>
   
    
    <?php if ($this->session->userdata['user_role_id'] <= 4) { ?>
    <li><a href="#" class="sub <?=($active==2)?"active":'';?>"><i class="fa fa-bullseye"></i> Mock Test Control</a>
        <ul>
            <li><a href="<?=base_url('mocks/mock_test');?>" class="<?=($class==21)?"current":'';?>">View Mock Test</a></li>
            <li><a href="<?=base_url('admin_control/create_mock/mock_test');?>" class="<?=($class==22)?"current":'';?>">Create Mock Test</a></li>
            <?php if ($this->session->userdata['user_role_id'] == 1 || 3) { ?>
                <li><a href="<?=base_url('exam_control/view_results');?>" class="<?=($class==25)?"current":'';?>">View Results</a></li>
            <?php } ?>
        </ul>
    </li>
     <li><a href="#" class="sub <?=($active==10)?"active":'';?>"><i class="fa fa-bullseye"></i> Live Test Control</a>
        <ul>
            <li><a href="<?=base_url('mocks/live_mock_test');?>" class="<?=($class==101)?"current":'';?>">View Live Test</a></li>
            <li><a href="<?=base_url('admin_control/create_mock/live_mock_test');?>" class="<?=($class==102)?"current":'';?>">Create Live Test</a></li>
        </ul>
    </li>
    <?php } else { ?>
        <li><a href="<?=base_url('exam_control/view_results');?>" class="<?=($active==2)?"active":'';?>"><i class="fa fa-puzzle-piece"></i> View Results</a></li>
    <?php } ?>
    <?php if ($this->session->userdata['user_role_id'] < 4) { ?>
    <li><a href="#" class="sub <?=($active==6)?"active":'';?>"><i class="fa fa-code-fork"></i> Categories</a>
        <ul>
            <li><a href="<?=base_url('admin_control/view_categories');?>" class="<?=($class==61)?"current":'';?>">View Categories</a></li>
            <li><a href="<?=base_url('create_category');?>" class="<?=($class==62)?"current":'';?>">Create New Category</a></li>
            <li><a href="<?=base_url('admin_control/view_subcategories');?>" class="<?=($class==63)?"current":'';?>">View Sub-Categories</a></li>
            <li><a href="<?=base_url('admin_control/subcategory_form');?>" class="<?=($class==64)?"current":'';?>">Create Sub-Category</a></li>
            <li><a href="<?=base_url('admin_control/view_sub_subcategories');?>" class="<?=($class==65)?"current":'';?>">View Sub Sub-Categories</a></li>
            <li><a href="<?=base_url('admin_control/sub_subcategory_form');?>" class="<?=($class==66)?"current":'';?>">Create Sub Sub-Categories</a></li>
              <li><a href="<?=base_url('admin_control/view_sub_sub_subcategories');?>" class="<?=($class==67)?"current":'';?>">Sub Sub Sub-Categories</a></li>

        </ul>
    </li>
    <?php } ?>

     <?php if ($this->session->userdata['user_role_id'] == 4) { ?>
   <li><a href="#" class="sub <?=($active==6)?"active":'';?>"><i class="fa fa-code-fork"></i> Categories</a>
        <ul>
           
            <li><a href="<?=base_url('admin_control/view_sub_subcategories');?>" class="<?=($class==65)?"current":'';?>">View Sub Sub-Categories</a></li>
            <li><a href="<?=base_url('admin_control/sub_subcategory_form');?>" class="<?=($class==66)?"current":'';?>">Create Sub Sub-Categories</a></li>

        </ul>
    </li>
    <?php } ?>
    <?php if ($commercial) { ?>
    <?php if ($this->session->userdata['user_role_id'] <= 2) { ?>
    <li><a href="#" class="sub <?=($active==8)?"active":'';?>"><i class="fa fa-list"> </i> Membership</a>
       
    </li>
    <?php } ?>
    <?php } ?>
    <?php if ($this->session->userdata['user_role_id'] <=3) { ?>
    <li><a href="#" class="sub <?=($active==7)?"active":'';?>"><i class="fa fa-comment"> </i> Digital Shiksha Search Engine</a>
        <ul>
            <li><a href="<?=base_url('blog/view_all');?>" class="<?=($class==71)?"current":'';?>">View Posts</a></li>
            <li><a href="<?=base_url('blog/add');?>" class="<?=($class==72)?"current":'';?>">Add Post</a></li>
        </ul>
    </li>
    <?php } ?>
    <?php if ($this->session->userdata['user_role_id'] <= 3) { ?>
    <li><a href="#" class="sub <?=($active==3)?"active":'';?>"><i class="fa fa-cogs"> </i> Admin Area</a>
        <ul>
            <li><a href="<?=base_url('admin_control');?>" class="<?=($class==31)?"current":'';?>">Profile Settings</a></li
             <li><a href="<?=base_url('noticeboard'); ?>" class="<?=($class==34)?"current":'';?>"> Noticeboard</a></li> 
             <li><a href="<?=base_url('faqs'); ?>" class="<?=($class==34)?"current":'';?>"> FAQ</a></li>        
       
            <?php if ($this->session->userdata['user_role_id'] <= 2) { ?>
            <li><a href="<?=base_url('admin/system_control/view_settings');?>" class="<?=($class==32)?"current":'';?>">System Settings</a></li>
            <li><a href="<?=base_url('message_control'); ?>" class="<?=($class==36)?"current":'';?>"> Inbox</a></li>        
            <?php }?>
             
        </ul>
    </li>
    <?php } else { ?>
        <li><a href="<?=base_url('admin_control');?>" class="<?=($active==3)?"active":'';?>"><i class="fa fa-cogs"> </i> Profile Settings</a></li>
    <?php } ?>
    <?php if ($this->session->userdata['user_role_id'] > 2) { ?>
       
    <?php }?>
    <?php if($this->session->userdata['user_role_id'] == 5) { ?>
          <li><a href="#" class="sub <?=($active==7)?"active":'';?>"><i class="fa fa-comment"> </i> Batches</a>
                <ul>
                    <li><a href="<?=base_url('exam_control/batch_request');?>" class="<?=($class==73)?"current":'';?>">Batch Request</a></li>
                    <li><a href="<?=base_url('exam_control/join_batch');?>" class="<?=($class==74)?"current":'';?>">Join Batch</a></li>
                </ul>
            </li>
    <?php } ?>    

 <?php if ($this->session->userdata['user_role_id'] == 5 || $this->session->userdata['user_role_id'] == 4) { ?>
                <li><a href="<?=base_url('message_control'); ?>" class="<?=($class==40)?"current":'';?>"><i class="fa fa-envelope"></i> Contact Help desk</a></li>    
<?php } ?>    

    <li><a href="<?=base_url('login_control/logout'); ?>"><i class="fa fa-power-off"></i> Logout</a></li>
</ul>
<!-- /End Sidebar -->
