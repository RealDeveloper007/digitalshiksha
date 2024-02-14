<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
require 'vendor/autoload.php';

require APPPATH . '/core/MS_Controller.php';
require APPPATH . '/libraries/MathsCaptcha.php';
class Login_control extends MS_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('admin_model');
        $this->load->model('exam_model');
        $this->load->model('login_model');
        $this->load->library('email');
    }
    
    
     public function exam_sitemap_generate() 
    {
        $data = [];
        $this->db->select('slug,exam_created');
        $this->db->where(['public'=>1,'active'=>1]);
        $data['exams'] = $this->db->get('exam_title')->result();
        header("Content-Type: text/xml;charset=iso-8859-1");
        $this->load->view("sitemap",$data);
      }
      
    public function blog_sitemap_generate() 
    {
        $data = [];
        $this->db->select('blog_slug as slug,blog_post_date');
        $data['blogs'] = $this->db->get('blog')->result();
        header("Content-Type: text/xml;charset=iso-8859-1");
        $this->load->view("sitemap_blog",$data);
      }

    public function index($message = '')
    {
        if ($_POST) 
        {
            // echo "<pre/>"; print_r($_POST); exit();
            $this->load->library('form_validation');
            if (is_numeric($this->input->post('user_email'))) {
                $this->form_validation->set_rules('user_email', 'Phone no', 'min_length[10]');
            } else {
                $this->form_validation->set_rules('user_email', 'Email', 'valid_email');
            }

            $this->form_validation->set_rules('user_email', 'Email/Phone No.', 'required');

            $this->form_validation->set_rules('user_pass', 'Password', 'required');
            if ($this->form_validation->run() != FALSE) 
            {
                // Check athentication
                if ($this->login_model->login_check()) 
                {   
                    
                    $this->load->model('system_model');
                    $this->system_model->set_system_info_to_session();
                    
                    $message = '<div class="alert alert-success alert-dismissable">'
                        . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                        . 'You loged in successfully!'
                        . '</div>';
                        
                  if ($this->session->userdata('back_url')) 
                  {
                        if ($this->session->userdata('back_url') == 'login_control') {
                            redirect('login');
                        } else {
                            redirect($this->session->userdata('back_url'));
                        }
                    }
                    
                    
                    redirect('dashboard/' . $this->session->userdata('user_id'));

                // print_r($this->session->userdata()); die;
                
                    
                } else {
                    $message = '<div class="alert alert-danger">User Email/Password is not correct!</div>';
                }
            }
          
        }
        
            if ($this->uri->segment('1') == 'dashboard') 
            {
                // redirect('dashboard/' . $this->session->userdata('user_id'));
                redirect('admin');
            }
        
       

        // $AllData = $this->db->select('title_name,slug,title_id')->get('exam_title')->result();

        // foreach($AllData as $SingleData)
        // {
        //      $slug = strip_tags($SingleData->title_name);
        //      $Slug = preg_replace('/[^A-Za-z0-9\-]/', ' ', $slug);

        //      $this->db->where('title_id', $SingleData->title_id);
        //      $this->db->update('exam_title', ['slug'=>str_replace('--','-',$SingleData->slug)]);

        //     // $this->db->update('title_name,slug,title_id')->get('exam_title')->result();
        // }

        // echo "<pre>";

        // print_r($AllData); die;



        // $AllData = $this->db->select('blog_title,blog_slug,blog_id')->get('blog')->result();

        // foreach($AllData as $SingleData)
        // {
        //      $slug = strip_tags($SingleData->blog_title);
        //      $Slug = preg_replace('/[^A-Za-z0-9\-]/', ' ', $slug);

        //      $this->db->where('blog_id', $SingleData->blog_id);
        //      $this->db->update('blog', ['blog_slug'=>str_replace('--','-',$SingleData->blog_slug)]);

        //     // $this->db->update('title_name,slug,title_id')->get('exam_title')->result();
        // }

        // echo "<pre>";

        // print_r($AllData); die;
        

        $data = array();
        $data['header'] = $this->load->view('header/head', '', TRUE);
        $data['top_navi'] = $this->load->view('header/top_navigation', $data, TRUE);
        $data['message'] = ($this->session->flashdata('message')) ? $this->session->flashdata('message') : $message;
        $data['modal'] = $this->load->view('modals/login_n_register', $data, TRUE);
        $data['content'] = $this->load->view('form/login_form', $data, TRUE);
        $data['footer'] = $this->load->view('footer/footer', '', TRUE);
        $this->load->view('home', $data);
    }

    public function superadmin_login($message = '')
    {
        if ($_POST) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('user_email', 'Email Address', 'required');
            $this->form_validation->set_rules('user_pass', 'Password', 'required');
            $this->form_validation->set_rules('user_role', 'User Type', 'callback_user_role_check');
            if ($this->form_validation->run() != FALSE) {
                $info_user = $this->input->post('user_email');
                $info_pass = md5($this->input->post('user_pass'));
                $info_role = $this->input->post('user_role');

                // Check athentication
                if ($this->login_model->login_check($info_user, $info_pass, $info_role)) {
                    $this->load->model('system_model');
                    $this->system_model->set_system_info_to_session();
                    redirect('login_control/dashboard_control');
                } else {
                    $message = '<div class="alert alert-danger">User Email/Password is not correct!</div>';
                }
            }
        }
        $data = array();
        $data['header'] = $this->load->view('header/head', '', TRUE);
        $data['top_navi'] = $this->load->view('header/top_navigation', $data, TRUE);
        $data['user_role'] = $this->admin_model->get_user_role();
        $data['message'] = $message;
        $data['content'] = $this->load->view('admin/admin_login_form', $data, TRUE);
        $data['footer'] = $this->load->view('footer/footer', '', TRUE);
        $this->load->view('home', $data);
    }

    public function teacher_login($message = '')
    {
        if ($_POST) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('user_email', 'Email Address', 'required');
            $this->form_validation->set_rules('user_pass', 'Password', 'required');
            $this->form_validation->set_rules('user_role', 'User Type', 'callback_user_role_check');
            if ($this->form_validation->run() != FALSE) {
                $info_user = $this->input->post('user_email');
                $info_pass = md5($this->input->post('user_pass'));
                $info_role = $this->input->post('user_role');

                // Check athentication
                if ($this->login_model->login_check($info_user, $info_pass, $info_role)) {
                    $this->load->model('system_model');
                    $this->system_model->set_system_info_to_session();
                    redirect('login_control/dashboard_control');
                } else {
                    $message = '<div class="alert alert-danger">User Email/Password is not correct!</div>';
                }
            }
        }
        $data = array();
        $data['header'] = $this->load->view('header/head', '', TRUE);
        $data['top_navi'] = $this->load->view('header/top_navigation', $data, TRUE);
        $data['user_role'] = $this->admin_model->get_user_role();
        $data['message'] = $message;
        $data['content'] = $this->load->view('admin/teacher_login_form', $data, TRUE);
        $data['footer'] = $this->load->view('footer/footer', '', TRUE);
        $this->load->view('home', $data);
    }

    public function admin_login($message = '')
    {
        if ($_POST) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('user_email', 'Email Address', 'required');
            $this->form_validation->set_rules('user_pass', 'Password', 'required');
            $this->form_validation->set_rules('user_role', 'User Type', 'callback_user_role_check');
            if ($this->form_validation->run() != FALSE) {
                $info_user = $this->input->post('user_email');
                $info_pass = md5($this->input->post('user_pass'));
                $info_role = $this->input->post('user_role');

                // Check athentication
                if ($this->login_model->login_check($info_user, $info_pass, $info_role)) {
                    $this->load->model('system_model');
                    $this->system_model->set_system_info_to_session();
                    redirect('login_control/dashboard_control');
                } else {
                    $message = '<div class="alert alert-danger">User Email/Password is not correct!</div>';
                }
            }
        }
        $data = array();
        $data['header'] = $this->load->view('header/head', '', TRUE);
        $data['top_navi'] = $this->load->view('header/top_navigation', $data, TRUE);
        $data['user_role'] = $this->admin_model->get_user_role();
        $data['message'] = $message;
        $data['content'] = $this->load->view('admin/login_form', $data, TRUE);
        $data['footer'] = $this->load->view('footer/footer', '', TRUE);
        $this->load->view('home', $data);
    }

    public function dashboard_control($user_id = 0, $role_id = 0, $message = '')
    {
        if ($user_id == 0) {
            $user_id = $this->session->userdata('user_id');
        }
        if ($user_id != $this->session->userdata('user_id')) {
            $message = '<div class="alert alert-danger alert-dismissable">'
                . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                . 'Please loged in to view this page.'
                . '</div>';
            $this->index($message);
        }
        if ($role_id == 0) {
            $role_id = $this->session->userdata('user_role_id');
        }
        
        if($_GET['type'])
        {
            $this->session->set_userdata('type','andriod');
        }
        
        
        switch ($role_id) {
            case 1: //SUPER ADMIN
                $this->super_admin_dashboard($this->session->userdata('user_id'), $message);
                break;
            case 2: //admin
                $this->admin_dashboard($this->session->userdata('user_id'), $message);
                break;
            case 3:  //Moderator
                $this->moderator_dashboard($this->session->userdata('user_id'), $message);
                break;
            case 4: //Teacher
                $this->teacher_dashboard($this->session->userdata('user_id'), $message);
                break;
            case 5:  //Student
                $this->student_dashboard($this->session->userdata('user_id'), $message);
                break;
            case 0: // no break
            default:
                break;
        }
    }

    public function super_admin_dashboard($id = '0', $message = '')
    {
        if ($id == 0) {
            $this->index();
        }
        $data = array();
        $data['class'] = 00; // class control value left digit for main manu rigt digit for submenu
        $data['header'] = $this->load->view('header/admin_head', '', TRUE);
        $data['extra_head'] = $this->load->view('plugin_scripts/graph_n_chart', '', TRUE);
        $data['top_navi'] = $this->load->view('header/admin_top_navigation', $data, TRUE);
        $data['sidebar'] = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
        $data['message'] = $message;
        // $data['unread_messages'] = $this->login_model->get_unread_messages();
        // $data['new_exams'] = $this->login_model->get_new_exams();
        // $data['exam_taken'] = $this->login_model->new_exams_taken();
        // $data['new_user'] = $this->login_model->get_new_users();

        $data['total_admin'] = $this->login_model->get_total_admin();
        $data['total_moderator'] = $this->login_model->get_total_moderator();
        $data['total_exam'] = $this->login_model->get_total_exam();
        $data['total_student'] = $this->login_model->get_total_studnet();

        $data['content'] = $this->load->view('admin/dashboard', $data, TRUE);
        $data['footer'] = $this->load->view('footer/admin_footer', $data, TRUE);
        $this->load->view('dashboard', $data);
    }

    public function admin_dashboard($id = '0', $message = '')
    {
        if ($id == 0) {
            $this->index();
        }
        $data = array();
        $data['class'] = 00; // class control value left digit for main manu rigt digit for submenu
        $data['header'] = $this->load->view('header/admin_head', '', TRUE);
        $data['extra_head'] = $this->load->view('plugin_scripts/graph_n_chart', '', TRUE);
        $data['top_navi'] = $this->load->view('header/admin_top_navigation', $data, TRUE);
        $data['sidebar'] = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
        $data['message'] = $message;
        // $data['unread_messages'] = $this->login_model->get_unread_messages();
        // $data['new_exams'] = $this->login_model->get_new_exams();
        // $data['exam_taken'] = $this->login_model->new_exams_taken();
        // $data['new_user'] = $this->login_model->get_new_users();

        $data['total_admin'] = $this->login_model->get_total_admin();
        $data['total_moderator'] = $this->login_model->get_total_moderator();
        $data['total_teacher'] = $this->login_model->get_total_teacher();
        $data['total_student'] = $this->login_model->get_total_studnet();

        $data['content'] = $this->load->view('admin/dashboard', $data, TRUE);
        $data['footer'] = $this->load->view('footer/admin_footer', $data, TRUE);
        $this->load->view('dashboard', $data);
    }

    public function moderator_dashboard($id = '0', $message = '')
    {
        if ($id == 0) {
            $this->index();
        }
        $data = array();
        $data['class'] = 00; // class control value left digit for main manu rigt digit for submenu
        $data['header'] = $this->load->view('header/admin_head', '', TRUE);
        $data['extra_head'] = $this->load->view('plugin_scripts/graph_n_chart', '', TRUE);
        $data['top_navi'] = $this->load->view('header/admin_top_navigation', $data, TRUE);
        $data['sidebar'] = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
        $data['message'] = $message;
        // $data['unread_messages'] = $this->login_model->get_unread_messages();
        // $data['new_exams'] = $this->login_model->get_new_exams();
        // $data['exam_taken'] = $this->login_model->new_exams_taken();
        // $data['new_user'] = $this->login_model->get_new_users();

        $data['total_admin'] = $this->login_model->get_total_admin();
        $data['total_moderator'] = $this->login_model->get_total_moderator();
        $data['total_teacher'] = $this->login_model->get_total_teacher();
        $data['total_student'] = $this->login_model->get_total_studnet();

        $data['content'] = $this->load->view('admin/dashboard', $data, TRUE);
        $data['footer'] = $this->load->view('footer/admin_footer', $data, TRUE);
        $this->load->view('dashboard', $data);
    }

    public function teacher_dashboard($id = '0', $message = '')
    {
        if ($id == 0) {
            $this->index();
        }
        $data = array();
        $data['class'] = 00; // class control value left digit for main manu rigt digit for submenu
        $data['header'] = $this->load->view('header/admin_head', $data, TRUE);
        $data['top_navi'] = $this->load->view('header/admin_top_navigation', $data, TRUE);
        $data['sidebar'] = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
        $data['title'] = 'Tracher Dashboard';
        $data['total_exam'] = $this->login_model->get_total_exam_by_user_id($this->session->userdata['user_id']);
        $data['exam_taken_new'] = $this->login_model->new_exams_taken();
        $data['exam_taken'] = $this->login_model->exams_taken();
        $data['message'] = $message;
        $data['content'] = $this->load->view('teacher_dashboard', $data, TRUE);
        $data['footer'] = $this->load->view('footer/admin_footer', $data, TRUE);
        $this->load->view('dashboard', $data);
    }

    public function student_dashboard($id = '0', $message = '')
    {
        //   echo "<pre/>"; print_r('done'); exit();
        if ($id == 0) {
            $this->index();
        }
        $data = array();
        $data['class'] = 00; // class control value left digit for main manu rigt digit for submenu
        $data['header'] = $this->load->view('header/admin_head', $data, TRUE);
        $data['top_navi'] = $this->load->view('header/admin_top_navigation', $data, TRUE);
        $data['sidebar'] = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
        $data['title'] = 'Student Dashboard';
        $data['message'] = $message;
        $data['results'] = $this->exam_model->get_my_results($id);
        $liveTests = $this->admin_model->get_student_live_test($this->session->userdata('user_id'));

        $PendingLiveTests = 0;

        foreach ($liveTests as $singleLiveTest) {
            $CheckResult = $this->exam_model->get_live_result_check($this->session->userdata('user_id'), $singleLiveTest->title_id);

            if ($CheckResult == 0) {
                $PendingLiveTests += 1;

                $i++;
            }
        }

        $data['pending_live_tests'] = $PendingLiveTests;

        $data['content'] = $this->load->view('student_dashboard', $data, TRUE);
        $data['footer'] = $this->load->view('footer/admin_footer', '', TRUE);
        $this->load->view('dashboard', $data);
    }
    
     private function alpha_dash_space($str)
    {
        return ( ! preg_match("/^([-a-z_ ])+$/i", $str)) ? FALSE : TRUE;
    } 

    public function register($message = '')
    {
        redirect('/');

        if ($_POST) {
            if ($this->input->post('token') == $this->session->userdata('token')) {
                exit('Can\'t re-submit the form');
            }
            $this->load->library('form_validation');
            $this->form_validation->set_rules('user_name', 'Name', 'trim|required|min_length[4]|max_length[12]');
            $this->form_validation->set_rules('user_email', 'Email Address', 'required|valid_email|is_unique[users.user_email]');
            $this->form_validation->set_rules('user_phone', 'Phone No', 'required|min_length[10]|is_unique[users.user_phone]');
            $this->form_validation->set_rules('user_pass', 'Password', 'required|min_length[6]|matches[user_passcf]');
            $this->form_validation->set_rules('user_passcf', 'Confirm Password', 'required|min_length[6]');
            if ($this->form_validation->run() != FALSE) {
                
                date_default_timezone_set($this->session->userdata['time_zone']);
                $info = array();
                $info['user_name'] = $this->input->post('user_name');
                $info['user_email'] = $this->input->post('user_email');
                $info['user_phone'] = $this->input->post('user_phone');
                $info['user_role_id'] = ($this->input->post('user_role')) ? $this->input->post('user_role') : 5;
                $info['user_pass'] = md5($this->input->post('user_pass'));
                //$info['confirm_password'] = $this->input->post('user_pass');
                $info['user_from'] = date('Y-m-d H:i:s');

                // $info['active'] =1;

                // Check athentication
                if ($this->login_model->register($info)) {
                    $mysecret = 'galua.mugda';
                    $key = sha1($mysecret . $info['user_email'] . $this->session->userdata['brand_name']);

                    $from = $this->session->userdata['support_email'];
                    $to = $info['user_email'];
                    $suject = 'Thank you for register with ' . $this->session->userdata['brand_name'];
                    $Data['name'] = $this->input->post('user_name');
                    $Data['brand'] = $this->session->userdata['brand_name'];
                    $Data['brand_phone'] = $this->session->userdata['support_phone'];
                    $Data['brand_address'] = $this->session->userdata['address'];
                    $Data['url'] = base_url('login_control/activate/') . '?user=' . $info['user_email'] . '&key=' . $key;

                    $config = array(
                        // 'protocol' => 'smtp',
                        // 'smtp_host'   => 'ssl://smtp.googlemail.com',
                        // 'smtp_port' => 465,
                        // 'smtp_user' => 'digitalshikshadarpan@gmail.com', 
                        // 'smtp_pass' => '9996441188', 
                        'mailtype'    => 'html',
                        'crlf'        => "\n",
                        'newline'     => "\r\n",
                        'charset'     => 'utf-8',
                        'wordwrap'    => TRUE
                    );

                    $this->email->initialize($config);
                    $this->load->library('email', $config);
                    $this->email->set_newline("\r\n");
                    $this->email->from($this->session->userdata['support_email']);
                    $this->email->to($to);
                    $this->email->subject($suject);

                    $body = $this->load->view('emails/verify.php', $Data, TRUE);

                    $this->email->message($body);
                    if ($this->email->send()) {
                        $this->session->set_userdata('token', $this->input->post('token'));
                        $message = '<div class="alert alert-success alert-dismissable">'
                            . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                            . 'You Details has been saved! Verification link has been send to your mail id. Please click on the link for account activation.'
                            . '</div>';
                    } else {

                        // print_r($this->email->print_debugger()); die;

                        $message = '<div class="alert alert-danger alert-dismissable">'
                            . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                            . 'Mail has not been sent.</div>';
                    }
                    if (count($_POST) > 0) {
                        $_POST = array();
                    }
                    $this->index($message);
                } else {
                    $message = '<div class="alert alert-danger alert-dismissable">'
                        . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                        . '"' . $info['user_email'] . '" is already used by another account. Try another email.</div>';
                }
            }
        }

        $data = array();
        $data['header'] = $this->load->view('header/head', '', TRUE);
        $data['top_navi'] = $this->load->view('header/top_navigation', $data, TRUE);
        $data['message'] = $message;
        $data['content'] = $this->load->view('form/register_form', $data, TRUE);
        $data['footer'] = $this->load->view('footer/footer', '', TRUE);
        $this->load->view('home', $data);
    }

    public function register_ajax()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('user_name', 'Name', 'trim|required|min_length[4]|max_length[12]');
        $this->form_validation->set_rules('user_email', 'Email Address', 'required|valid_email|is_unique[users.user_email]');
        $this->form_validation->set_rules('user_phone', 'Phone No', 'required|min_length[10]|is_unique[users.user_phone]');
        $this->form_validation->set_rules('user_pass', 'Password', 'required|min_length[6]|matches[user_passcf]');
        $this->form_validation->set_rules('user_passcf', 'Confirm Password', 'required|min_length[6]');

        if ($this->form_validation->run() === FALSE) {
            echo json_encode(array('status' => false, 'message' => '<div class="alert alert-danger alert-dismissable">' . validation_errors() . '</div>'));
            exit();
        } else {

            $row = $this->db->where(['MD5(id)' => $this->input->post('token_data')])->get('register_otp')->result();

            date_default_timezone_set($this->session->userdata['time_zone']);
            $info = array();
            $info['user_name'] = $this->input->post('user_name');
            $info['user_email'] = $this->input->post('user_email');
            $info['user_phone'] = $this->input->post('user_phone');
            $info['user_role_id'] = ($this->input->post('user_role')) ? $this->input->post('user_role') : 5;
            $info['user_pass'] = md5($this->input->post('user_pass'));
            //$info['confirm_password'] = $this->input->post('user_pass');
            $info['user_from'] = date('Y-m-d H:i:s');
            $info['active']    = 1;

            if (isset($row[0])) {
                $info['register_otp_id']    = $row[0]->id;
            }

            // Check athentication
            if ($this->login_model->register($info)) {

                if ($this->login_model->login_check()) {
                    $this->load->model('system_model');
                    $this->system_model->set_system_info_to_session();

                    $this->session->set_userdata('dashboard_message', 'डिजिटल शिक्षा में आपका स्वागत है, आप लॉगिन हो चुके हैं');

                    $message = '<div class="alert alert-success alert-dismissable">'
                        . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                        . 'You loged in successfully!'
                        . '</div>';


                    echo json_encode(array('status' => true, 'message' => '<div class="alert alert-success alert-dismissable">Your details has been registered Successully! Now you will be able to login</div>', 'login_url' => 'dashboard/' . $this->session->userdata('user_id')));
                    exit();
                }
                // $mysecret = 'galua.mugda';
                // $key = sha1($mysecret . $info['user_email'] . $this->session->userdata['brand_name']);

                // $from = $this->session->userdata['support_email'];
                // $to = $info['user_email'];
                // $suject = 'Thank you for register with ' . $this->session->userdata['brand_name'];
                // $Data['name'] = $this->input->post('user_name');
                // $Data['brand'] = $this->session->userdata['brand_name'];
                // $Data['brand_phone'] = $this->session->userdata['support_phone'];
                // $Data['brand_address'] = $this->session->userdata['address'];
                // $Data['url'] = base_url('login_control/activate/') . '?user=' . $info['user_email'] . '&key=' . $key;

                // $config = array(
                //     // 'protocol' => 'smtp',
                //     // 'smtp_host'   => 'ssl://smtp.googlemail.com',
                //     // 'smtp_port' => 465,
                //     // 'smtp_user' => 'digitalshikshadarpan@gmail.com', 
                //     // 'smtp_pass' => '9996441188', 
                //     'mailtype'    => 'html',
                //     'crlf'        => "\n",
                //     'newline'     => "\r\n",
                //     'charset'     => 'utf-8',
                //     'wordwrap'    => TRUE
                // );

                // $this->email->initialize($config);
                // $this->load->library('email', $config);
                // $this->email->set_newline("\r\n");
                // $this->email->from($this->session->userdata['support_email']);
                // $this->email->to($to);
                // $this->email->subject($suject);

                // $body = $this->load->view('emails/verify.php', $Data, TRUE);

                // $this->email->message($body);
                // if ($this->email->send()) {
                //     $this->session->set_userdata('token', $this->input->post('token'));
                //     $message = '<div class="alert alert-success alert-dismissable">'
                //         . 'You Details has been saved! Verification link has been send to your mail id. Please click on the link for account activation OR Select "OTP on mobile" option for account activation.'
                //         . '</div>';


                //     echo json_encode(array('status' => true, 'type' => 'email_sent_success', 'message' => $message));
                //     exit();
                // } else {

                //     $message = '<div class="alert alert-danger alert-dismissable">'
                //         . 'You Details has been saved!  Mail has not been sent.Please select "OTP on mobile" option for account activation.</div>';


                //     echo json_encode(array('status' => false, 'type' => 'email_sent_failed', 'message' => $message));
                //     exit();
                // }                
            }
        }
    }


    public function login_access()
	{
        $_POST['user_email'] = $_GET['email'];
        $_POST['user_pass']  = $_GET['user_pass'];
        $_POST['role']       = $_GET['role'];
        
        // echo $_GET['type']; die;
        $checkLogin = $this->login_model->login_check_new();

        if($checkLogin)
        {
               if($_GET['type'])
                {
                    $this->session->set_userdata('type','andriod');
                    redirect(base_url('dashboard/'.$this->session->userdata('user_id').'?type='.$_GET['type']));

                } else {
                    
                    redirect(base_url('dashboard/'.$this->session->userdata('user_id')));

                }
        

        } else {

            redirect(base_url('/'));

        }

    }

    public function send_otp_ajax()
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('sending_type', 'Sending Type', 'required');

        if ($this->form_validation->run() != FALSE) {
            $OtpSend = $this->SendOTP($this->input->post('user_phone'));

            if ($OtpSend == false) {
                $message = '<div class="alert alert-danger alert-dismissable">'
                    . 'OTP is not sending on you mobile.'
                    . '</div>';

                echo json_encode(array('status' => false, 'type' => 'otp_sent_failed', 'message' => $message));
                exit();
            } else {

                $this->db->where('user_email', $this->input->post('user_email'));
                $this->db->update('users', array('otp' => $OtpSend));
                if ($this->db->affected_rows() == 1) {
                    $message = '<div class="alert alert-success alert-dismissable">'
                        . 'OTP is sent on your mobile.'
                        . '</div>';


                    echo json_encode(array('status' => true, 'type' => 'otp_sent_success', 'message' => $message));
                    exit();
                } else {

                    $message = '<div class="alert alert-danger alert-dismissable">'
                        . 'Some error is found . Please try again later.'
                        . '</div>';


                    echo json_encode(array('status' => false, 'type' => 'otp_sent_failed', 'message' => $message));
                    exit();
                }
            }
        } else {

            echo json_encode(array('status' => false, 'message' => '<div class="alert alert-danger alert-dismissable">' . validation_errors() . '</div>'));
            exit();
        }
    }


    private function SendOTP($mobile)
    {
        $OTP = rand(11111, 99999);
        $username = "ksmalik60@gmail.com";
        $hash = "b2a89c0a6ffc29d6763bad25d529cd67bdac282305853259abe9c365cf72b120";

        // Config variables. Consult http://api.textlocal.in/docs for more info.
        // $test = "0";

        // Data for text message. This is the text message data.
        $sender = "DIGISD"; // This is who the message appears to be from.
        $numbers = "91" . $mobile; // A single number or a comma-seperated list of numbers
        $SendOtp = $OTP;
        $message = "Dear Customer, Your OTP is " . $SendOtp . ". Kindly keep is secret for login. www.digitalshikshadarpan.com";
        // 612 chars or less
        // A single number or a comma-seperated list of numbers
        $message = urlencode($message);
        $data = "username=" . $username . "&hash=" . $hash . "&message=" . $message . "&sender=" . $sender . "&numbers=" . $numbers;
        $ch = curl_init('https://api.textlocal.in/send/?');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch); // This is the result from the API
        $result = json_decode($result);


        if ($result->status == true) {
            return $SendOtp;
        } else {

            return false;
        }

        curl_close($ch);
    }
    
       private function SendForgotPasswordOTP($mobile)
    {
        $OTP = rand(11111, 99999);
        $username = "ksmalik60@gmail.com";
        $hash = "b2a89c0a6ffc29d6763bad25d529cd67bdac282305853259abe9c365cf72b120";

        // Config variables. Consult http://api.textlocal.in/docs for more info.
        // $test = "0";

        // Data for text message. This is the text message data.
        $sender = "DIGISD"; // This is who the message appears to be from.
        $numbers = "91" . $mobile; // A single number or a comma-seperated list of numbers
        $SendOtp = $OTP;
        // $message = "Dear user, Your OTP is " . $SendOtp .". Kindly use it to reset password. Digital Shiksha Darpan";
        $message = "Dear Customer, Your OTP is " . $SendOtp . ". Kindly keep is secret for login. www.digitalshikshadarpan.com";
        
        // echo $message; die;
        // 612 chars or less
        // A single number or a comma-seperated list of numbers
        $message = urlencode($message);
        $data = "username=" . $username . "&hash=" . $hash . "&message=" . $message . "&sender=" . $sender . "&numbers=" . $numbers;
        $ch = curl_init('https://api.textlocal.in/send/?');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch); // This is the result from the API
        $result = json_decode($result);
        

        if ($result->status == true) {
            return $SendOtp;
        } else {

            return false;
        }

        curl_close($ch);
    }



    public function SendOTPData()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('type', 'Sending Type', 'required');
        $this->form_validation->set_rules('type_value', 'Phone OR Email', 'required');

        if ($this->input->post('type') == 'mobile') {
            $this->form_validation->set_rules('type_value', 'Phone No', 'required|min_length[10]|is_unique[users.user_phone]');
        } else {
            $this->form_validation->set_rules('type_value', 'Email Address', 'required|valid_email|is_unique[users.user_email]');
        }

        if ($this->form_validation->run() === FALSE) {
            echo json_encode(array('status' => false, 'type' => 'validation_error', 'message' => validation_errors()));
            exit();
        } else {


            if ($this->input->post('otp')) {
                $GetOTP = true;
            } else {
                if ($this->input->post('type') == 'mobile') 
                {
                    $GetOTP =  $this->SendOTP($this->input->post('type_value'));
                } else {
                    $GetOTP =  $this->SendOtpOnEmail($this->input->post('type_value'));
                    // $GetOTP =  34019;

                }
            }

            if ($GetOTP) {
                $SaveOtpData =  $this->login_model->saveOtps($GetOTP);

                if ($SaveOtpData['status']) {
                    echo json_encode(array('status' => true, 'type' => $SaveOtpData['type'], 'data' => md5($SaveOtpData['insert_id'])));
                    exit();
                } else {

                    echo json_encode(array('status' => false, 'type' => $SaveOtpData['type']));
                    exit();
                }
            } else {

                echo json_encode(array('status' => false, 'type' => 'otp_not_sent'));
                exit();
            }
        }
    }

    private function SendOtpOnEmail($email)
    {
        date_default_timezone_set("Asia/Kolkata");

        $OTP = rand(11111, 99999);
        $Date = date('d-m-Y') . '@' . date('h:i:s a');
        $from = $this->session->userdata['support_email'];
        $to = $email;
        $suject = 'OTP Sent on ' . $Date . ' | ' . $this->session->userdata['brand_name'];
        $Data['name'] = $this->input->post('user_name');
        $Data['brand'] = $this->session->userdata['brand_name'];
        $Data['brand_phone'] = $this->session->userdata['support_phone'];
        $Data['brand_address'] = $this->session->userdata['address'];
        $Data['otp'] = $OTP;

        $config = array(
            // 'protocol' => 'smtp',
            // 'smtp_host'   => 'ssl://smtp.googlemail.com',
            // 'smtp_port' => 465,
            // 'smtp_user' => 'digitalshikshadarpan@gmail.com', 
            // 'smtp_pass' => '9996441188', 
            'mailtype'    => 'html',
            'crlf'        => "\n",
            'newline'     => "\r\n",
            'charset'     => 'utf-8',
            'wordwrap'    => TRUE
        );

        $this->email->initialize($config);
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from($this->session->userdata['support_email']);
        $this->email->to($to);
        $this->email->subject($suject);

        $body = $this->load->view('emails/verify.php', $Data, TRUE);

        $this->email->message($body);
        if ($this->email->send()) {
            return $Data['otp'];
        } else {
            return false;
        }
    }


    public function activate()
    {
        $mysecret = 'galua.mugda';
        if (sha1($mysecret . $this->input->get('user') . $this->session->userdata['brand_name']) == $this->input->get('key')) {
            if ($this->login_model->activate_my_account($this->input->get('user'))) {
                $message = '<div class="alert alert-success alert-dismissable">'
                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                    . 'Activation successful! Please login.'
                    . '</div>';
                $this->index($message);
            } else {
                $message = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>An ERROR occurred! Please try again.</div>';
                $this->index($message);
            }
        } else {
            exit('Invalid key');
        }
    }

    public function password_recovery_form($message = '')
    {
        $data = array();
        $data['header'] = $this->load->view('header/head', '', TRUE);
        $data['top_navi'] = $this->load->view('header/top_navigation', $data, TRUE);
        $data['message'] = $message;
        $data['content'] = $this->load->view('form/forgot_password', $data, TRUE);
        $data['footer'] = $this->load->view('footer/footer', '', TRUE);
        $this->load->view('home', $data);
    }



    public function forgot_password()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email Address', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->password_recovery_form();
        } else {
            $email = $this->input->post('email');
            $this->load->model('user_model');
            if ($this->user_model->check_user_exist($email)) 
            {
                $UserDetails = $this->user_model->get_user_details_by_email($email);
                $mysecret = 'galua.mugda';
                $key = sha1($mysecret . $email);
                $to = $email;
                $suject = 'Password reset request ';
                $Data['name'] = $UserDetails->user_name;
                $Data['brand'] = $this->session->userdata['brand_name'];
                $Data['brand_phone'] = $this->session->userdata['support_phone'];
                $Data['brand_address'] = $this->session->userdata['address'];
                $Data['url'] = base_url('login_control/revovery/') . '?user=' . $email . '&key=' . $key;

                $config = array(
                    // 'protocol'    => 'smtp',
                    // 'smtp_host'   => 'ssl://smtp.googlemail.com',
                    // 'smtp_port'   => 465,
                    // 'smtp_user'   => 'digitalshikshadarpan@gmail.com', 
                    // 'smtp_pass'   => '9996441188', 
                    'mailtype'    => 'html',
                    'crlf'        => "\n",
                    'newline'     => "\r\n",
                    'charset'     => 'utf-8',
                    'wordwrap'    => TRUE
                );

                $this->email->initialize($config);
                $this->load->library('email', $config);
                $this->email->set_newline("\r\n");
                $this->email->from($this->session->userdata['support_email']);
                $this->email->to($to);
                $this->email->subject($suject);

                $body = $this->load->view('emails/forgot.php', $Data, TRUE);
                $this->email->message($body);

                if ($this->email->send()) {
                    $_POST = array();
                    $message = '<div class="alert alert-success alert-dismissable">'
                        . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                        . 'Password reset link sent to your email address! Check your inbox or spam.'
                        . '</div>';
                    $this->session->set_flashdata('message', $message);

                    redirect('login');
                    // $this->index($message);
                } else {
                    //print_r($this->email->print_debugger()); die;

                    $message = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>An ERROR occurred! Please try again.</div>';
                    $this->session->set_flashdata('message', $message);
                    redirect('forgot-password');
                    // $this->password_recovery_form($message);
                }
                
                // check by phone
            } else if($this->user_model->check_user_exist_by_phone($email)) {
                
                    $phone = $email;
                
                    $UserDetails = $this->user_model->get_user_details_by_phone($phone);
                    
                    $ForgotOTP =  $this->SendForgotPasswordOTP($phone);
                    
                    // print_r($ForgotOTP); die;
                    

                     $this->db->where('user_id', $UserDetails->user_id);
                     $UpdateOTP = $this->db->update('users', ['forgot_otp'=>$ForgotOTP]);
                     
                     if($UpdateOTP)
                     {
                           $message = '<div class="alert alert-success alert-dismissable">'
                            . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                            . 'OTP sent on your mobile no.'
                            . '</div>';
                            $this->session->set_flashdata('message', $message);
                            $mysecret = 'galua.mugda';
                            $key = sha1($mysecret . $phone);
                            redirect('login_control/recovery?user=' . $phone . '&key=' . $key);

                     } else {
                         
                          $message = '<div class="alert alert-danger">Sorry! Something went wrong. Please try again</div>';
                            // $this->password_recovery_form($message);
                            $this->session->set_flashdata('message', $message);
                            redirect('forgot-password');
                         
                         
                     }
                
            } else {
                
                 $message = '<div class="alert alert-danger">User not exist!</div>';
                // $this->password_recovery_form($message);
                $this->session->set_flashdata('message', $message);
                redirect('forgot-password');
                
            }
        }
    }
    
     public function recovery()
    {
          $mysecret = 'galua.mugda';
        $key = sha1($mysecret . $this->input->get('user'));
        if ($key == $this->input->get('key')) {
            $data = array();
            $data['header'] = $this->load->view('header/head', '', TRUE);
            $data['top_navi'] = $this->load->view('header/top_navigation', $data, TRUE);
            $data['key'] = $key;
            $data['phone'] = $this->input->get('user');
            $data['content'] = $this->load->view('form/password_recovery_by_otp', $data, TRUE);
            $data['footer'] = $this->load->view('footer/footer', '', TRUE);
            $this->load->view('home', $data);
        } else {
            exit('Invalid Key!!!');
        }
    }

    public function revovery()
    {
        $mysecret = 'galua.mugda';
        $key = sha1($mysecret . $this->input->get('user'));
        if ($key == $this->input->get('key')) {
            $data = array();
            $data['header'] = $this->load->view('header/head', '', TRUE);
            $data['top_navi'] = $this->load->view('header/top_navigation', $data, TRUE);
            $data['key'] = $key;
            $data['mail'] = $this->input->get('user');
            $data['content'] = $this->load->view('form/password_revovery', $data, TRUE);
            $data['footer'] = $this->load->view('footer/footer', '', TRUE);
            $this->load->view('home', $data);
        } else {
            exit('Invalid Key!!!');
        }
    }

    public function reset_password()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user_pass', 'Password', 'required|min_length[6]|matches[user_passcf]');
        $this->form_validation->set_rules('user_passcf', 'Confirm Password', 'required|min_length[6]');
        if ($this->form_validation->run() == FALSE) {
            $message = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>An ERROR occurred! Please try again.</div>';
            $this->password_recovery_form($message);
        } else {
            $mysecret = 'galua.mugda';
            $key = sha1($mysecret . $this->input->post('mail'));
            if ($key == $this->input->post('key')) {
                $this->load->model('user_model');
                if ($this->user_model->reset_password($this->input->post('mail'))) 
                {
                    // $from = $this->session->userdata['support_email'];
                    // $to = $this->input->post('mail');
                    // $suject = $this->session->userdata['brand_name'] . ' password change confirmation!';
                    // $message_body = 'You\'ve successfully changed your ' . $this->session->userdata['brand_name'] . ' password.' 
                    //         . '.<br/> If you didn\'t do it. Deactivate your account' 
                    //         . anchor(base_url('login_control/report_password_reset/') . '?user=' . $email . '&key=' . $key, ' from here ') . '. and Contact with administrator immediately';
                    // $config = Array(
                    //     'mailtype' => 'html',
                    //     'charset' => 'iso-8859-1',
                    //     'wordwrap' => TRUE
                    // );
                    // $this->load->library('email', $config);
                    // $this->email->set_newline("\r\n");
                    // $this->email->from($from);
                    // $this->email->to($to);
                    // $this->email->subject($suject);
                    // $this->email->message($message_body);
                    // $this->email->send();
                    // $_POST = array();
                    $message = '<div class="alert alert-success alert-dismissable">'
                        . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                        . 'Password reset successfully!.'
                        . '</div>';
                    $this->index($message);
                } else {
                    $message = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>An ERROR occurred! Please try again.</div>';
                    $this->password_recovery_form($message);
                }
            } else {
                  $message = '<div class="alert alert-danger">Invalid Key!!!. Please try again</div>';
                            // $this->password_recovery_form($message);
                            $this->session->set_flashdata('message', $message);
                redirect('forgot-password');
            }
        }
    }
    
    public function reset_password_by_mobile()
    {
        $this->load->library('form_validation');
         $this->form_validation->set_rules('otp', 'OTP', 'required');
        $this->form_validation->set_rules('user_pass', 'Password', 'required|min_length[6]|matches[user_passcf]');
        $this->form_validation->set_rules('user_passcf', 'Confirm Password', 'required|min_length[6]');
        if ($this->form_validation->run() == FALSE) {
            $message = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>An ERROR occurred! Please try again.</div>';
             $this->session->set_flashdata('message', $message);
                            
                 redirect('forgot-password');
            
        } else {
            $mysecret = 'galua.mugda';
            $key = sha1($mysecret . $this->input->post('phone'));
            
            $phone = $this->input->post('phone');

            if ($key == $this->input->post('key')) 
            {
                $this->load->model('user_model');
                $Response = $this->user_model->reset_password_by_phone($this->input->post('phone'));
                
                if ($Response) 
                {
                    if($Response == 'password_change')
                    {
                        $message = '<div class="alert alert-success alert-dismissable">'
                            . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                            . 'Password reset successfully!.'
                            . '</div>';
                        $this->session->set_flashdata('message', $message);
                            
                        redirect('login');
                    } else if($Response == 'password_not_change') {
                        
                         $message = '<div class="alert alert-danger alert-dismissable">'
                            . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                            . 'Password not changed.  Please try again'
                            . '</div>';
                        
                        $this->session->set_flashdata('message', $message);
                            
                        redirect('forgot-password');
                        
                    } else {
                        
                         $message = '<div class="alert alert-danger alert-dismissable">'
                            . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                            . 'OTP is invaild.  Please try again'
                            . '</div>';
                                       $this->session->set_flashdata('message', $message);
                            
                    redirect('login_control/recovery?user='.$phone.'&key='.$key);
                        
                    }
                } else {
                    $message = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>An ERROR occurred! Please try again.</div>';
                    $this->session->set_flashdata('message', $message);
                            
                    redirect('login_control/recovery?user='.$phone.'&key='.$key);
                }
            } else {
                
                
                $message = '<div class="alert alert-danger">Invalid Key!!!. Please try again</div>';
                $this->session->set_flashdata('message', $message);
                            
                 redirect('forgot-password');

            }
        }
    }

    public function report_password_reset()
    {
        $mysecret = 'galua.mugda';
        $key = sha1($mysecret . $this->input->get('user'));
        if ($key == $this->input->post('key')) {
            $this->load->model('user_model');
            if ($this->user_model->report_password_reset($this->input->get('user'))) {
                $message = '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                    . 'Deactivated successfully! You account is no more accessible. Please contact with administrator.'
                    . '</div>';
                $this->index($message);
            } else {
                $message = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>An ERROR occurred! Please try again.</div>';
                $this->index($message);
            }
        } else {
            exit('Invalid Key!!!');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function user_role_check($val)
    {
        //Callback Function for form validation
        if ($val == 0) {
            $this->form_validation->set_message('user_role_check', 'Select User Type.');
            return FALSE;
        } else {
            return TRUE;
        }
    }


    public function get_live_test()
    {
        date_default_timezone_set('Asia/Kolkata');

        $CurrentDate = date('Y-m-d');

        $this->db->select('title_id,batch_end_date');
        $this->db->where('batch_id !=', $CurrentDate . ' 00:00:00');
        $this->db->where('batch_end_date >=', $CurrentDate . ' 00:00:00');
        $this->db->where('batch_end_date <=', $CurrentDate . ' 23:59:59');
        $query = $this->db->get("exam_title");

        $AllData = $query->result();

        foreach ($AllData as $singleLiveTest) {
            echo date('Y-m-d H:i:s');
            echo "<pre>";
            echo $singleLiveTest->batch_end_date;

            if (date('Y-m-d H:i:s') > $singleLiveTest->batch_end_date) {
                $data = [
                    'active' => 0,
                    'public' => 0,
                ];

                // Update live test
                $this->db->where('title_id', $singleLiveTest->title_id);
                $Update[] = $this->db->update('exam_title', $data);
            }
        }

        print_r($Update);
    }
}
