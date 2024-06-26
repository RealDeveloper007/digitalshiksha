<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
require APPPATH . '/core/MS_Controller.php';

class User_control extends MS_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('log')) {
            redirect(base_url());
        }
        $this->load->model('user_model');
        $this->load->model('admin_model');
        $this->load->model('exam_model');
        $this->load->library("pagination");
        $this->load->helper('url');
    }

    public function index($message = '')
    {
    
        $data = array();
        $data['class'] = 11; // class control value left digit for main manu rigt digit for submenu
        $data['header'] = $this->load->view('header/admin_head', $data, TRUE);
        $data['top_navi'] = $this->load->view('header/admin_top_navigation', $data, TRUE);
        $data['sidebar'] = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
        $data['message'] = $message;
        
        $config = array();

         if($this->uri->segment(2))
        {
            $page = $this->uri->segment(2);
        } else {
           $page = 0; 
        }


        $countresult = $this->user_model->count_all_students(); 
        
        $config['per_page']         = 50;
        $config["base_url"]         = base_url() . "user_control";
        $config["total_rows"]       = $countresult;
        $config['anchor_class']     = 'class="page gradient"';
        $config['cur_tag_open']     = '<a class="page active">';
        $config['cur_tag_close']    = '</a>';
        $config['full_tag_open']    = '<div class="pagination">';
        $config['full_tag_close']   = '</div>';
        $config['first_link']       = 'First';
        $config['num_links']        = $countresult;

        if (count($_GET) > 0) $config['suffix'] = '?' . http_build_query($_GET, '', "&");

        
        if(ceil($config['total_rows']/$config['per_page'])> 5)
            $config['last_link']    =   '.... Last';
        else
            $config['last_link']    =   'Last';
            
        $this->pagination->initialize($config);
        
        $getPageNo = 1 + ($page / 50);
         $data['count'] = ($getPageNo == 0 ? 1 : (($getPageNo - 1) * $config["per_page"] + 1));

        $str_links = $this->pagination->create_links();

        // print_r($str_links); die;
        $data["links"] = explode('&nbsp;',$str_links );
        $data['students'] = $this->user_model->get_all_students($config["per_page"], $page);

              //  print_r($data["links"]); die;

        $data['users'] = $this->user_model->get_all_users();
        $data['user_role'] = $this->admin_model->get_user_role();
        $data['content'] = $this->load->view('content/view_all_users', $data, TRUE);
        $data['footer'] = $this->load->view('footer/admin_footer', $data, TRUE);
        $this->load->view('dashboard', $data);
    }

    public function view_banned_users($message = '')
    {
        $data = array();
        $data['class'] = 13; // class control value left digit for main manu rigt digit for submenu
        $data['header'] = $this->load->view('header/admin_head', $data, TRUE);
        $data['top_navi'] = $this->load->view('header/admin_top_navigation', $data, TRUE);
        $data['sidebar'] = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
        $data['message'] = $message;
        $data['users'] = $this->user_model->get_benned_users();
        $data['content'] = $this->load->view('content/view_banned_users', $data, TRUE);
        $data['footer'] = $this->load->view('footer/admin_footer', $data, TRUE);
        $this->load->view('dashboard', $data);
    }

    public function delete_records() 
    {
        $record_ids = $this->input->post('record_ids');
        // print_r($record_ids); die;
        if (!empty($record_ids)) {
            // $countRecords = count($record_ids);
            $this->user_model->delete_in_active_users($record_ids); // Delete records from the database
            $this->session->set_flashdata('success', 'Records deleted successfully.');
        } else {
            $this->session->set_flashdata('error', 'No records selected.');
        }
        redirect('user_control/view_banned_users');
    }

    // public function user_add_form($message = '')
    // {
    //     $data = array();
    //     $data['class'] = 12; // class control value left digit for main manu rigt digit for submenu
    //     $data['header'] = $this->load->view('header/admin_head', $data, TRUE);
    //     $data['top_navi'] = $this->load->view('header/admin_top_navigation', $data, TRUE);
    //     $data['sidebar'] = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
    //     $data['message'] = $message;
    //     $data['user_role'] = $this->admin_model->get_user_role();
    //     $data['content'] = $this->load->view('form/user_add_form', $data, TRUE);
    //     $data['footer'] = $this->load->view('footer/admin_footer', $data, TRUE);
    //     $this->load->view('dashboard', $data);
    // }

    public function add_user()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user_name', 'Name', 'required');
        $this->form_validation->set_rules('user_email', 'Email Address', 'required|valid_email');
        $this->form_validation->set_rules('user_pass', 'Password', 'required|min_length[4]');
        $this->form_validation->set_rules('user_passcf', 'Confirm Password', 'required|min_length[4]|matches[user_pass]');
        $this->form_validation->set_rules('user_role', 'User Type', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->user_add_form();
        } else {
            date_default_timezone_set($this->session->userdata['time_zone']);
            $this->load->model('login_model');
            //print_r($this->input->post()); die;
            $info = array();
            $info['user_name'] = $this->input->post('user_name', TRUE);
            $info['user_email'] = $this->input->post('user_email', TRUE);
            $info['user_phone'] = $this->input->post('user_phone', TRUE);
            $info['user_role_id'] = $this->input->post('user_role', TRUE);
            $info['user_pass'] = md5($this->input->post('user_pass'));
            if($this->input->post('user_role')==4){
                $info['assign_categories'] = implode(',',$this->input->post('assign_categories'));

            } else {
                $info['assign_categories'] = null;
            }


            //print_r($info['assign_categories']); die;
            $info['user_from'] = date('Y-m-d H:i:s');
            $info['active'] = 1;
            if (!($info['user_role_id'] > $this->session->userdata('user_role_id'))) {
                show_404();
            }
            if ($this->login_model->register($info)) 
            {
                $from = $this->session->userdata['support_email'];
                $to = $info['user_email'];
                $suject = 'You are added with ' . $this->session->userdata['brand_name'];
                // $message_body = 'Initial Login info:</br> User Name: ' . $info['user_email'] 
                //         . '</br>Password: ' . $this->input->post('user_pass') . '</br></br>'
                //         . 'Use this link to login: ' . base_url('login_control') . '</br></br>'
                //         . 'Note: Change you password after login.';

                $sendData = ['user_name'=>$info['user_name'],'email'=>$info['user_email'],'phone'=>$info['user_phone'],'password'=>$this->input->post('user_pass')];
                $message_body = $this->load->view('emails/welcome.php', $sendData,TRUE);
                $config = Array(
                    'mailtype' => 'html',
                    'charset' => 'utf-8',
                    'wordwrap' => TRUE
                );
                $this->load->library('email', $config);
                $this->email->set_newline("\r\n");
                $this->email->from($from);
                $this->email->to($to);
                $this->email->subject($suject);
                $this->email->message($message_body);
                $this->email->send();

                $message = '<div class="alert alert-success alert-dismissable">'
                        . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                        . 'User Added Successfully! User name and Password sent to the user\'s mail address.'
                        . '</div>';
                
                $this->session->set_flashdata('message', $message);

                // $this->index($message);
                redirect('user_control/add_user');
            } else {
                $message = '<div class="alert alert-danger alert-dismissable">'
                        . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                        . '"' . $info['user_email'] . '" is already used by another account. Try another email.</div>';
                $this->user_add_form($message);
            } 
        }
    }
    
    public function reset_password_by_admin($id)
    {
                $info = $this->user_model->get_user_info($id);
                
                // print_r( $info); die;
            
                $randPass = rand(111111,9999999);
            
                $from = $this->session->userdata['support_email'];
                $to = $info->user_email;
                $suject = 'Password reset by ADMIN';
                $message_body = 'Hello '.$info->user_name.', We have reset your password as per your request. Your new password is '.$randPass
                           .'. You can change your password after login into dashboard.';
                $config = Array(
                    'mailtype' => 'html',
                    'charset' => 'iso-8859-1',
                    'wordwrap' => TRUE
                );
                $this->load->library('email', $config);
                $this->email->set_newline("\r\n");
                $this->email->from($from);
                $this->email->to($to);
                $this->email->subject($suject);
                $this->email->message($message_body);
               if($this->email->send())
               {
                      $this->db->where('user_id', $info->user_id);
                      $UpdatePassword = $this->db->update('users', ['user_pass'=>md5($randPass)]);
                      
                    //   echo $UpdatePassword; die;
                      
                      $message = '<div class="alert alert-success alert-dismissable">'
                            . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                            . 'Password has been changed successfully! New password is '.$randPass
                            . '</div>';
                       $this->session->set_flashdata('s_message', $message);
                    redirect('user_control');
               }

    }

    public function user_add_form($message = '')
    {
        $data = array();
        $data['class'] = 12; // class control value left digit for main manu rigt digit for submenu
        $data['header'] = $this->load->view('header/admin_head', $data, TRUE);
        $data['top_navi'] = $this->load->view('header/admin_top_navigation', $data, TRUE);
        $data['sidebar'] = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
        $data['message'] = $message;
        $data['categories'] = $this->exam_model->get_categories();
        
            $option = array();
            foreach ($data['categories'] as $category) 
            {
      
                    $option[$category->category_id] = $category->category_name;
                
            }

        $data['opt_category'] = $option;
        $data['user_role'] = $this->admin_model->get_user_role();
        $data['content'] = $this->load->view('form/user_add_form', $data, TRUE);
        $data['footer'] = $this->load->view('footer/admin_footer', $data, TRUE);
        $this->load->view('dashboard', $data);
    }    


    public function user_edit_form($id,$message = '')
    {
        $data = array();
        $data['class'] = 12; // class control value left digit for main manu rigt digit for submenu
        $data['header'] = $this->load->view('header/admin_head', $data, TRUE);
        $data['top_navi'] = $this->load->view('header/admin_top_navigation', $data, TRUE);
        $data['sidebar'] = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
        $data['message'] = $message;
        $data['categories'] = $this->exam_model->get_categories();
        
            $option = array();
            foreach ($data['categories'] as $category) 
            {
      
                    $option[$category->category_id] = $category->category_name;
                
            }

        $data['opt_category'] = $option;
        $data['user_role'] = $this->admin_model->get_user_role();
        $data['user_details'] = $this->admin_model->get_user_details($id);
        $data['content'] = $this->load->view('form/user_edit_form', $data, TRUE);
        $data['footer'] = $this->load->view('footer/admin_footer', $data, TRUE);
        $this->load->view('dashboard', $data);
    }   


    public function edit_user()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user_id', 'User ID', 'required');
        $this->form_validation->set_rules('user_email', 'User Email', 'required');
        $this->form_validation->set_rules('user_phone', 'User Phone', 'required');

        if ($this->form_validation->run() == FALSE) 
        {
            $this->user_edit_form($this->input->post('user_id'));
        } else {
            date_default_timezone_set($this->session->userdata['time_zone']);
            $this->load->model('login_model');
            
            $info['user_email'] = $this->input->post('user_email', TRUE);
            $info['user_phone'] = $this->input->post('user_phone', TRUE);
            $info['assign_categories'] = implode(',',$this->input->post('assign_categories'));
            $info['user_id'] = $this->input->post('user_id');


              $CheckEmailExist = $this->login_model->check_user_mail_exist($this->input->post('user_email'),$this->input->post('user_id'));           

             $CheckPhoneExist = $this->login_model->check_user_phone_exist($this->input->post('user_phone'),$this->input->post('user_id'));


            if($CheckPhoneExist || $CheckEmailExist)
            { 
                if($CheckEmailExist)
                {
                     $message = '<div class="alert alert-danger alert-dismissable">'
                            . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                            . '"' . $info['user_email'] . '" is already used by another account. Try another email.</div>';
                    $this->user_edit_form($this->input->post('user_id'),$message);
                } else if($CheckPhoneExist) {

                    $message = '<div class="alert alert-danger alert-dismissable">'
                        . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                        . '"' . $info['user_phone'] . '" is already used by another account. Try another phone no.</div>';
                $this->user_edit_form($this->input->post('user_id'),$message);

                }
            } else {

                $UpdateDetails = $this->login_model->UpdateDetails($info);
                
                    $message = '<div class="alert alert-success alert-dismissable">'
                            . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                            . 'Details has been Updated Successfully!'
                            . '</div>';
                    $this->index($message);
            
            }
        }
    }

    public function update_user_data()
    {
        echo ($this->user_model->update_user_data()) ? 'TRUE' : 'FALSE';
    }

    public function deactivate_user_account($id)
    {        
        if (!is_numeric($id) OR ($this->session->userdata('user_role_id') > $id)){
            show_404();
        }
        if ($this->user_model->deactivate_user_account($id)) {
            $message = '<div class="alert alert-success alert-dismissable">'
                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                    . 'Deactivated successfully.!'
                    . '</div>';
            $this->index($message);
        } else {
            $message = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>An ERROR occurred! Please try again.</div>';
            $this->index($message);
        }
    }

    public function ban_user_account($id)
    {
        if (!is_numeric($id) OR ($this->session->userdata('user_role_id') >= $id)) {
            show_404();
        }
        if ($this->user_model->ban_user_account($id)) {
            $message = '<div class="alert alert-success alert-dismissable">'
                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                    . 'This account has banned successfully.!'
                    . '</div>';
            $this->index($message);
        } else {
            $message = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>An ERROR occurred! Please try again.</div>';
            $this->index($message);
        }
    }

    public function activate_user_account($id)
    {
        if (!is_numeric($id) OR ($this->session->userdata('user_role_id') >= $id)) {
            show_404();
        }
        if ($this->user_model->activate_user_account($id)) 
        {
            $info = $this->user_model->get_user_info($id);
            $email = $info->user_email;

             date_default_timezone_set("Asia/Kolkata");

            $Date   = date('d-m-Y') . '@' . date('h:i:s a');
            $from   = $this->session->userdata['support_email'];
            $to     = $email;
            $suject = 'Account Activated | ' . $this->session->userdata['brand_name'];
            $Data['name'] = $info->user_name;
            $Data['brand'] = 'Digital Shiksha Darpan';
            $Data['brand_phone'] = '';
            $Data['brand_address'] = '';
    
            $config = array(
                'mailtype'    => 'html',
                'crlf'        => "\n",
                'newline'     => "\r\n",
                'charset'     => 'utf-8',
                'wordwrap'    => TRUE
            );
                $this->load->library('email', $config);

            $this->email->initialize($config);
            $this->email->set_newline("\r\n");
            $this->email->from('info@digitalshikshadarpan.com');
            $this->email->to($to);
            $this->email->subject($suject);
    
            $body = $this->load->view('emails/activate.php', $Data, TRUE);
    
            $this->email->message($body);
            $this->email->send();
            
        
            $message = '<div class="alert alert-success alert-dismissable">'
                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                    . 'Activated successfully.!'
                    . '</div>';
            $this->view_banned_users($message);
        } else {
            $message = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>An ERROR occurred! Please try again.</div>';
            $this->view_banned_users($message);
        }
    }

    public function unban_user_account($id)
    {
        if (!is_numeric($id) OR ($this->session->userdata('user_role_id') >= $id)) {
            show_404();
        }
        if ($this->user_model->unban_user_account($id)) {
            $message = '<div class="alert alert-success alert-dismissable">'
                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                    . 'Unbanned successfully.!'
                    . '</div>';
            $this->view_banned_users($message);
        } else {
            $message = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>An ERROR occurred! Please try again.</div>';
            $this->view_banned_users($message);
        }
    }

}
