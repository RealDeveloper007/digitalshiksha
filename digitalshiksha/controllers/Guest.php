<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
require 'vendor/autoload.php';

require APPPATH . '/core/MS_Controller.php';
require APPPATH . '/libraries/MathsCaptcha.php';

#[\AllowDynamicProperties]
class Guest extends MS_Controller
{
    /**
     * @var CI_Benchmark
     */
    public $benchmark;

    /**
     * @var CI_Hooks
     */
    public $hooks;

    /**
     * @var CI_Config
     */
    public $config;

    /**
     * @var CI_Log
     */
    public $log;

    /**
     * @var CI_UTF8
     */
    public $utf8;

    /**
     * @var CI_URI
     */
    public $uri;

    /**
     * @var CI_Router
     */
    public $router;

    /**
     * @var CI_Output
     */
    public $output;

    /**
     * @var CI_Security
     */
    public $security;

    /**
     * @var CI_Input
     */
    public $input;

    /**
     * @var CI_Lang
     */
    public $lang;

    /**
     * @var CI_DB_query_builder
     */
    public $db;

    /**
     * @var CI_Session
     */
    public $session;

    /**
     * @var System_model
     */
    public $system_model;

    /**
     * @var Admin_model
     */
    public $admin_model;

    /**
     * @var Login_model
     */
    public $login_model;

    public function __construct()
    {
        parent::__construct();

        $this->load->model('system_model');
        $this->load->model('admin_model');
        $this->load->model('login_model');
        $system_info = $this->system_model->get_system_info();
        $timezone = $system_info->time_zone ?? 'UTC';
        date_default_timezone_set($timezone);
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
            $mail_config = $system_info->mail ?? array();
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
                echo "mail send"; die;
                // Additional success handling
            } else {

                print_r($this->email->print_debugger()); 
                die;
                // Handle email sending failure
            }
        }

        $this->system_model->set_system_info_to_session();
        $data = array();
        $data['no_contact_form'] = FALSE;

        // Fetch latest 3 notices (including expired) - type 1 = Notice
        $data['notices'] = $this->db->where('notice_status', 1)
            ->where('notice_type', 1)
            ->order_by('noticeboard.notice_id', 'desc')
            ->limit(3)
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

        // Fetch top 3 quizzes ordered by most attempts by students
        $data['top_quizzes'] = $this->db->select('exam_title.*, categories.category_name, sub_categories.sub_cat_name, COUNT(DISTINCT result.result_id) as attempt_count, COUNT(DISTINCT questions.ques_id) as question_count')
            ->from('exam_title')
            ->join('sub_categories', 'sub_categories.id = exam_title.sub_category_id', 'left')
            ->join('categories', 'categories.category_id = exam_title.category_id', 'left')
            ->join('result', 'result.exam_id = exam_title.title_id', 'left')
            ->join('questions', 'questions.exam_id = exam_title.title_id', 'left')
            ->where('exam_title.batch_id', 0)
            ->where('exam_title.active', 1)
            ->group_by('exam_title.title_id')
            ->order_by('attempt_count', 'desc')
            ->order_by('exam_title.exam_created', 'desc')
            ->limit(3)
            ->get()
            ->result();

        // Fetch top 6 students who have passed (result_percent >= pass_mark)
        // Order by latest date first, then by highest marks to show most recent high achievers
        // Optionally filter to only show results from last 90 days for more recent achievers
        $this->db->select('result.*, exam_title.title_name, exam_title.pass_mark, users.user_name, users.user_photo, users.user_email, result.exam_taken_date')
            ->from('result')
            ->join('exam_title', 'exam_title.title_id = result.exam_id', 'left')
            ->join('users', 'users.user_id = result.user_id', 'left')
            ->where('result.result_percent >= exam_title.pass_mark')
            ->where('exam_title.batch_id', 0)
            ->where('exam_title.active', 1);
        
        // Filter to only show results from last 90 days to ensure latest achievers
        // Remove this line if you want to show all time achievers
        // $this->db->where('result.exam_taken_date >= DATE_SUB(NOW(), INTERVAL 90 DAY)', NULL, FALSE);
        
        $data['top_passed_students'] = $this->db->order_by('result.exam_taken_date', 'desc')
            ->order_by('result.result_id', 'desc')
            ->order_by('result.result_percent', 'desc')
            ->limit(6)
            ->get()
            ->result();

        // Fetch top 3 blogs
        $this->load->model('blog_model');
        $data['top_blogs'] = $this->blog_model->get_latest_blogs(3);

        // Fetch top 3 important study materials from categories with more exams
        // Commented out - Section is hidden
        /*
        $data['important_study_materials'] = $this->db->select('sub_sub_sub_category.*, COUNT(DISTINCT exam_title.title_id) as exam_count')
            ->from('sub_sub_sub_category')
            ->join('exam_title', 'exam_title.category_id = sub_sub_sub_category.cat_id AND exam_title.sub_category_id = sub_sub_sub_category.sub_cat_id AND exam_title.sub_sub_category_id = sub_sub_sub_category.sub_sub_cat_id AND exam_title.batch_id = 0 AND exam_title.active = 1', 'left')
            ->where('sub_sub_sub_category.status', 1)
            ->group_by('sub_sub_sub_category.id')
            ->order_by('exam_count', 'desc')
            ->order_by('sub_sub_sub_category.id', 'desc')
            ->limit(3)
            ->get()
            ->result();
        */
        $data['important_study_materials'] = array(); // Empty array to prevent errors

        $data['content'] = $this->load->view('content/home_page', $data, TRUE);


        $data['footer'] = $this->load->view('footer/footer', $data, TRUE);

                                 // print_r($data); die;

      
                $this->load->view('home', $data);
    }
    
      public function delete_account()
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

        $data['content'] = $this->load->view('content/delete_account', $data, TRUE);
        $data['footer'] = $this->load->view('footer/footer', $data, TRUE);
        $this->load->view('home', $data);
    
    }

    public function home($message = '')
    {
        if($_GET['mail'])
        {
            // echo "ssd"; die;
            $from = $this->session->userdata['support_email'];
            $to = $info['user_email'];
            $subject = 'Welcome mail by ' . $this->session->userdata['brand_name'];
        
            $sendData = ['user_name'=>'test','email'=>'diwakarsharma603@gmail.com','phone'=>'82829832323','password'=>'822823','logo'=>base_url('logo.png') ];
            $message_body = $this->load->view('emails/welcome.php', $sendData,TRUE);
            $mail_config = $system_info->mail ?? array();
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
                echo "mail send"; die;
                // Additional success handling
            } else {

                print_r($this->email->print_debugger()); 
                die;
                // Handle email sending failure
            }
        }

        $this->system_model->set_system_info_to_session();
        $data = array();
        $data['no_contact_form'] = FALSE;

        // Fetch latest 3 notices (including expired) - type 1 = Notice
        $data['notices'] = $this->db->where('notice_status', 1)
            ->where('notice_type', 1)
            ->order_by('noticeboard.notice_id', 'desc')
            ->limit(3)
            ->get('noticeboard')
            ->result();

        $data['News']  = $this->db->where('notice_status', 1)
            ->order_by('noticeboard.notice_id', 'desc')
            ->where('notice_type', 2)
            ->where('notice_start <=', date('Y-m-d'))
            ->where('notice_end >=', date('Y-m-d'))
            ->get('noticeboard')
            ->row();

        // Load header for CSS but hide navigation visually
        $data['header'] = $this->load->view('header/head', '', TRUE);
        // Add custom CSS to hide navigation and improve layout
        $data['header'] .= '<style>
            /* Hide navigation and header elements */
            nav, .navbar, .top-navigation, header, .header, 
            .top-bar, .top-bar-wrapper, #top-navigation,
            .navbar-wrapper, .navbar-container, .navbar-header,
            .navbar-collapse, .navbar-nav, .nav-wrapper {
                display: none !important;
                visibility: hidden !important;
                height: 0 !important;
                margin: 0 !important;
                padding: 0 !important;
                overflow: hidden !important;
            }
            
            /* Remove top margin/padding from body when no nav */
            body.Site, body {
                padding-top: 0 !important;
                margin-top: 0 !important;
            }
            
            /* Ensure content starts at top with proper spacing */
            .content-wrapper, .main-content, #content {
                margin-top: 0 !important;
                padding-top: 0 !important;
            }
            
            /* First section should have top margin equal to header height (80px) */
            section:first-of-type {
                margin-top: 80px !important;
                padding-top: 0 !important;
            }
            
            /* Breaking news section (if first) should have top margin equal to header height */
            #breaking-news-section:first-of-type {
                margin-top: 80px !important;
            }
            
            /* Main slider should have top margin equal to header height if it is first */
            #main-slider:first-of-type {
                margin-top: 80px !important;
            }
            
            /* If breaking news exists, slider should not have top margin */
            #breaking-news-section + #main-slider {
                margin-top: 0 !important;
            }
            
            /* Regular sections keep their padding */
            section.secPad {
                padding: 60px 0;
            }
            
            /* Ensure proper layout and prevent horizontal scroll */
            body, html {
                overflow-x: hidden;
                width: 100%;
            }
            
            /* Fix any fixed positioning issues */
            .navbar-fixed-top, .navbar-fixed-bottom {
                position: relative !important;
            }
            
            /* Ensure full width content */
            .container, .container-fluid {
                width: 100%;
                max-width: 100%;
            }
            
            /* Hide login/register buttons from slider */
            #main-slider .newBanner,
            #main-slider .register_open,
            #main-slider .login_open,
            #main-slider .btn-home-slider,
            #main-slider a[href="#register"],
            #main-slider a[href="#login"] {
                display: none !important;
                visibility: hidden !important;
            }
        </style>';
        // $data['top_navi'] is not set, so it won't be displayed

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

        // Fetch top 3 quizzes ordered by most attempts by students
        $data['top_quizzes'] = $this->db->select('exam_title.*, categories.category_name, sub_categories.sub_cat_name, COUNT(DISTINCT result.result_id) as attempt_count, COUNT(DISTINCT questions.ques_id) as question_count')
            ->from('exam_title')
            ->join('sub_categories', 'sub_categories.id = exam_title.sub_category_id', 'left')
            ->join('categories', 'categories.category_id = exam_title.category_id', 'left')
            ->join('result', 'result.exam_id = exam_title.title_id', 'left')
            ->join('questions', 'questions.exam_id = exam_title.title_id', 'left')
            ->where('exam_title.batch_id', 0)
            ->where('exam_title.active', 1)
            ->group_by('exam_title.title_id')
            ->order_by('attempt_count', 'desc')
            ->order_by('exam_title.exam_created', 'desc')
            ->limit(3)
            ->get()
            ->result();

        // Fetch top 6 students who have passed (result_percent >= pass_mark)
        // Order by latest date first, then by highest marks to show most recent high achievers
        // Optionally filter to only show results from last 90 days for more recent achievers
        $this->db->select('result.*, exam_title.title_name, exam_title.pass_mark, users.user_name, users.user_photo, users.user_email, result.exam_taken_date')
            ->from('result')
            ->join('exam_title', 'exam_title.title_id = result.exam_id', 'left')
            ->join('users', 'users.user_id = result.user_id', 'left')
            ->where('result.result_percent >= exam_title.pass_mark')
            ->where('exam_title.batch_id', 0)
            ->where('exam_title.active', 1);
        
        // Filter to only show results from last 90 days to ensure latest achievers
        // Remove this line if you want to show all time achievers
        // $this->db->where('result.exam_taken_date >= DATE_SUB(NOW(), INTERVAL 90 DAY)', NULL, FALSE);
        
        $data['top_passed_students'] = $this->db->order_by('result.exam_taken_date', 'desc')
            ->order_by('result.result_id', 'desc')
            ->order_by('result.result_percent', 'desc')
            ->limit(6)
            ->get()
            ->result();

        // Fetch top 3 blogs
        $this->load->model('blog_model');
        $data['top_blogs'] = $this->blog_model->get_latest_blogs(3);

        // Fetch top 3 important study materials from categories with more exams
        // Commented out - Section is hidden
        /*
        $data['important_study_materials'] = $this->db->select('sub_sub_sub_category.*, COUNT(DISTINCT exam_title.title_id) as exam_count')
            ->from('sub_sub_sub_category')
            ->join('exam_title', 'exam_title.category_id = sub_sub_sub_category.cat_id AND exam_title.sub_category_id = sub_sub_sub_category.sub_cat_id AND exam_title.sub_sub_category_id = sub_sub_sub_category.sub_sub_cat_id AND exam_title.batch_id = 0 AND exam_title.active = 1', 'left')
            ->where('sub_sub_sub_category.status', 1)
            ->group_by('sub_sub_sub_category.id')
            ->order_by('exam_count', 'desc')
            ->order_by('sub_sub_sub_category.id', 'desc')
            ->limit(3)
            ->get()
            ->result();
        */
        $data['important_study_materials'] = array(); // Empty array to prevent errors

        $data['content'] = $this->load->view('content/home_page', $data, TRUE);


        $data['footer'] = $this->load->view('footer/footer', $data, TRUE);

                                 // print_r($data); die;

      
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

    public function contact_us($message = '')
    {
        $data = array();
        $data['header'] = $this->load->view('header/head', '', TRUE);
        $data['top_navi'] = $this->load->view('header/top_navigation', $data, TRUE);
        $data['message'] = $message;

        $data['no_contact_form'] = FALSE;
        $data['content'] = $this->load->view('contact_form', $data, TRUE);
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
            redirect(base_url('contact-us'));
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
            redirect(base_url('contact-us'));


            }
        } else {
            
            $message = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>An ERROR occurred! Please try again.</div>';
             $this->session->set_flashdata('message', $message);
            redirect(base_url('contact-us'));
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
        redirect(base_url('contact-us'));
    }
}
