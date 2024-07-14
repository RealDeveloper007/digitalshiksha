<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
require 'vendor/autoload.php';

require APPPATH . '/core/MS_Controller.php';
require APPPATH . '/libraries/MathsCaptcha.php';

class Guest extends MS_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('system_model');
        $this->load->model('admin_model');
        $this->load->model('login_model');
        date_default_timezone_set($this->session->userdata['time_zone']);
    }

    public function index($message = '')
    {

        if($_GET['mail'])
        {
            // echo "ssd"; die;
            $from = $this->session->userdata['support_email'];
            $to = $info['user_email'];
            $subject = 'Welcome mail by ' . $this->session->userdata['brand_name'];
        
            $sendData = ['user_name'=>'test','email'=>'diwakarsharma603@gmail.com','phone'=>'82829832323','password'=>'822823','logo'=>base_url('logo.png') ];
            $message_body = $this->load->view('emails/welcome.php', $sendData,TRUE);
            $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'mail.digitalshikshadarpan.com',
                'smtp_port' => 465,
                'smtp_user' => 'info@digitalshikshadarpan.com',
                'smtp_pass' => 'K}]LSI-KRief',
                'mailtype' => 'html',
                'charset' => 'utf-8',
                'wordwrap' => TRUE
            );

            $this->load->library('email', $config);
            $this->email->set_header('Content-Type', 'text/html');
            $this->email->set_newline("\r\n");
            $this->email->from($from);
            $this->email->to($to);
            $this->email->subject($subject);
            $this->email->message($message_body);
        
            if ($this->email->send()) {
                // Additional success handling
            } else {
                // Handle email sending failure
            }
        }

        $this->system_model->set_system_info_to_session();
        $data = array();

        $data['notices'] = $this->db->where('notice_status', 1)
            ->order_by('noticeboard.notice_id', 'desc')
            ->where('notice_type', 1)
            ->where('notice_start <=', date('Y-m-d'))
            ->where('notice_end >=', date('Y-m-d'))
            ->get('noticeboard')
            ->result();

        $data['News']  = $this->db->where('notice_status', 1)
            ->order_by('noticeboard.notice_id', 'desc')
            ->where('notice_type', 2)
            ->where('notice_start <=', date('Y-m-d'))
            ->where('notice_end >=', date('Y-m-d'))
            ->get('noticeboard')
            ->row();
        $data['header'] = $this->load->view('header/head', '', TRUE);
        $data['top_navi'] = $this->load->view('header/top_navigation', $data, TRUE);
        $data['message'] = $message;
        if (!$this->session->userdata('log')) {
            $data['user_role'] = $this->admin_model->get_user_role();
            $data['modal'] = $this->load->view('modals/login_n_register', $data, TRUE);
        }
        //echo "<pre/>"; print_r($data['notices']); exit();
        // $data['total_teacher'] = $this->login_model->get_total_teacher();
        $data['total_exam'] = $this->login_model->get_total_exam();
        $data['total_student'] = $this->login_model->get_total_students();
        $data['total_blogs'] = $this->login_model->get_total_blogs();
        $data['content'] = $this->load->view('content/home_page', $data, TRUE);
        $data['footer'] = $this->load->view('footer/footer', $data, TRUE);
      
                $this->load->view('home', $data);
    }

    public function home($message = '')
    {
        $this->system_model->set_system_info_to_session();
        $data = array();

        $data['notices'] = $this->db->where('notice_status', 1)
            ->order_by('noticeboard.notice_id', 'desc')
            ->where('notice_type', 1)
            ->where('notice_start <=', date('Y-m-d'))
            ->where('notice_end >=', date('Y-m-d'))
            ->get('noticeboard')
            ->result();

        $data['News']  = $this->db->where('notice_status', 1)
            ->order_by('noticeboard.notice_id', 'desc')
            ->where('notice_type', 2)
            ->where('notice_start <=', date('Y-m-d'))
            ->where('notice_end >=', date('Y-m-d'))
            ->get('noticeboard')
            ->row();
        $data['header'] = $this->load->view('header/head', '', TRUE);
        // $data['top_navi'] = $this->load->view('header/top_navigation', $data, TRUE);
        $data['message'] = $message;
        if (!$this->session->userdata('log')) {
            $data['user_role'] = $this->admin_model->get_user_role();
            $data['modal'] = $this->load->view('modals/login_n_register', $data, TRUE);
        }
        //echo "<pre/>"; print_r($data['notices']); exit();
        // $data['total_teacher'] = $this->login_model->get_total_teacher();
        $data['total_exam'] = $this->login_model->get_total_exam();
        $data['total_student'] = $this->login_model->get_total_students();
        $data['total_blogs'] = $this->login_model->get_total_blogs();
        $data['content'] = $this->load->view('content/home_page_new', $data, TRUE);
        $data['footer'] = $this->load->view('footer/footer', $data, TRUE);
      
                $this->load->view('home', $data);
    }


    public function pricing($message = '')
    {
        $this->load->model('membership_model');
        $data = array();
        $data['header'] = $this->load->view('header/head', '', TRUE);
        // $data['extra_head'] = $this->load->view('plugin_scripts/price-table', '', TRUE);
        $data['top_navi'] = $this->load->view('header/top_navigation', $data, TRUE);
        $data['message'] = $message;
        if (!$this->session->userdata('log')) {
            $data['user_role'] = $this->admin_model->get_user_role();
            $data['modal'] = $this->load->view('modals/login_n_register', $data, TRUE);
        }
        $data['memberships'] = $this->membership_model->get_all_memberships();
        $data['features'] = $this->membership_model->get_features();
        $data['content'] = $this->load->view('content/pricing', $data, TRUE);
        $data['footer'] = $this->load->view('footer/footer', $data, TRUE);
        $this->load->view('home', $data);
    }

    public function about_us($message = '')
    {
        $data = array();
        $data['header'] = $this->load->view('header/head', '', TRUE);
        $data['top_navi'] = $this->load->view('header/top_navigation', $data, TRUE);
        $data['message'] = $message;
        if (!$this->session->userdata('log')) {
            $data['user_role'] = $this->admin_model->get_user_role();
            $data['modal'] = $this->load->view('modals/login_n_register', $data, TRUE);
        }
        $data['no_contact_form'] = TRUE;
        $data['content'] = $this->load->view('content/about_page', $data, TRUE);
        $data['footer'] = $this->load->view('footer/footer', $data, TRUE);
        $this->load->view('home', $data);
    }

    public function disclaimer($message = '')
    {
        $data = array();
        $data['header'] = $this->load->view('header/head', '', TRUE);
        $data['top_navi'] = $this->load->view('header/top_navigation', $data, TRUE);
        $data['message'] = $message;
        if (!$this->session->userdata('log')) {
            $data['user_role'] = $this->admin_model->get_user_role();
            $data['modal'] = $this->load->view('modals/login_n_register', $data, TRUE);
        }
        $data['content'] = $this->load->view('content/disclaimer', $data, TRUE);
        $data['footer'] = $this->load->view('footer/footer', $data, TRUE);
        $this->load->view('home', $data);
    }

    public function privacy($message = '')
    {
        $data = array();
        $data['header'] = $this->load->view('header/head', '', TRUE);
        $data['top_navi'] = $this->load->view('header/top_navigation', $data, TRUE);
        $data['message'] = $message;
        if (!$this->session->userdata('log')) {
            $data['user_role'] = $this->admin_model->get_user_role();
            $data['modal'] = $this->load->view('modals/login_n_register', $data, TRUE);
        }
        $data['content'] = $this->load->view('content/privacy', $data, TRUE);
        $data['footer'] = $this->load->view('footer/footer', $data, TRUE);
        $this->load->view('home', $data);
    }

    public function terms($message = '')
    {
        $data = array();
        $data['header'] = $this->load->view('header/head', '', TRUE);
        $data['top_navi'] = $this->load->view('header/top_navigation', $data, TRUE);
        $data['message'] = $message;
        if (!$this->session->userdata('log')) {
            $data['user_role'] = $this->admin_model->get_user_role();
            $data['modal'] = $this->load->view('modals/login_n_register', $data, TRUE);
        }
        $data['content'] = $this->load->view('content/terms', $data, TRUE);
        $data['footer'] = $this->load->view('footer/footer', $data, TRUE);
        $this->load->view('home', $data);
    }



    public function notice($message = '')
    {
        $data = array();
        $data['header'] = $this->load->view('header/head', '', TRUE);
        $data['top_navi'] = $this->load->view('header/top_navigation', $data, TRUE);
        $data['message'] = $message;
        if (!$this->session->userdata('log')) {
            $data['user_role'] = $this->admin_model->get_user_role();
            $data['modal'] = $this->load->view('modals/login_n_register', $data, TRUE);
        }
        $data['content'] = $this->load->view('content/notice_page', $data, TRUE);
        $data['footer'] = $this->load->view('footer/footer', $data, TRUE);
        $this->load->view('home', $data);
    }

    public function view_faqs($message = '')
    {
        $data = array();
        $data['header'] = $this->load->view('header/head', '', TRUE);
        $data['top_navi'] = $this->load->view('header/top_navigation', $data, TRUE);
        $data['message'] = $message;
        if (!$this->session->userdata('log')) {
            $data['user_role'] = $this->admin_model->get_user_role();
            $data['modal'] = $this->load->view('modals/login_n_register', $data, TRUE);
        }
        $data['no_contact_form'] = TRUE;
        $data['faqs'] = $this->system_model->get_faqs();
        $data['content'] = $this->load->view('content/faqs', $data, TRUE);
        $data['footer'] = $this->load->view('footer/footer', $data, TRUE);
        $this->load->view('home', $data);
    }
    

    public function contact()
    {
          if ($this->input->post('token') == $this->session->userdata('token')) exit('Can\'t re-submit the form');
          
         $this->load->library('form_validation');
         $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[4]|max_length[20]');
         $this->form_validation->set_rules('phone_number', 'Phone no', 'required|min_length[10]');
         $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
         $this->form_validation->set_rules('subject', 'Subject', 'trim|required|min_length[4]|max_length[30]');
         $this->form_validation->set_rules('message', 'Message', 'trim|required|min_length[10]|max_length[400]');
        
         if ($this->form_validation->run() == FALSE) 
         {
              $message = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'.validation_errors().'</div>';
             $this->session->set_flashdata('message', $message);
            redirect(base_url());
         }
            
      
        $sender = $this->input->post('name');
        $sender_email = $this->input->post('email');
        $phone_number = $this->input->post('phone_number');
        
        if($_REQUEST&&$_REQUEST["_captcha_solution"]&&$_REQUEST["_captcha_hash"])
        {
            if(MathsCaptcha::verify($_REQUEST["_captcha_solution"],$_REQUEST["_captcha_hash"]))
            {
                           $success = 'ok';

            } else {
                
            $message = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>Answer is not correct. Please fill in the field for numerical captcha also</div>';
             $this->session->set_flashdata('message', $message);
            redirect(base_url());


            }
        } else {
            
            $message = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>An ERROR occurred! Please try again.</div>';
             $this->session->set_flashdata('message', $message);
            redirect(base_url());
        }

        $mail = $this->admin_model->save_message('inbox', $sender, $sender_email, '', $phone_number);
        if ($mail) 
        {
            $this->session->set_userdata('token', $this->input->post('token'));
            $message = '<div class="alert alert-success alert-dismissable">'
                . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                . 'Your details has been Send successfully.!'
                . '</div>';
        } else {
            $message = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>An ERROR occurred! Please try again.</div>';
        }
        $this->session->set_flashdata('message', $message);
        redirect(base_url());
    }
}
