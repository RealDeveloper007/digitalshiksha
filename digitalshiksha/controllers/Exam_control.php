<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

require 'vendor/autoload.php';

require APPPATH . '/core/MS_Controller.php';
require APPPATH . '/libraries/MathsCaptcha.php';

class Exam_control extends MS_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->CI = &get_instance();
        $this->load->model('exam_model');
        $this->load->model('admin_model');
        $this->load->model('user_model');
        $this->load->helper('common_helper');
        $this->load->library("pagination");
        $this->load->helper('url');
    }

    public function index()
    {
        if ($this->input->post('token') == $this->session->userdata('token')) {
            exit('Can\'t re-submit the form');
        }
        if (!$this->session->userdata('log')) {
            $this->session->set_userdata('back_url', current_url());
            redirect(base_url('login_control'));
        }
        
        date_default_timezone_set('Asia/Kolkata');

        $result_id = $this->exam_model->evaluate_result();
        if ($result_id) {
            $this->session->set_userdata('token', $this->input->post('token'));
            $this->view_result_detail($result_id);
        } else {
            $message = '<div class="alert alert-danger alert-dismissable">'
                . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                . 'An ERROR occurred! Please contact to admin.</div>';
            $this->view_all_mocks('', $message);
        }
    }

    public function submit_answers()
    {
        if ($this->input->post('token') == $this->session->userdata('token')) {
           echo json_encode(['status'=>false,'message'=>`Can\'t re-submit the form`,'url'=>'']);
           exit();
        }
        if (!$this->session->userdata('log')) 
        {
            $this->session->set_userdata('back_url', current_url());
            // redirect(base_url('login_control'));

            echo json_encode(['status'=>false,'message'=>`You are not authorized to access this url`,'url'=>base_url('login_control')]);

            exit();
        }
        
        date_default_timezone_set('Asia/Kolkata');

        $result_id = $this->exam_model->evaluate_result();
        if ($result_id) 
        {
            $this->session->set_userdata('token', $this->input->post('token'));
            // $this->view_result_detail($result_id);

            $ExamResultDetails = $this->exam_model->view_result_detail($result_id);

            $heading        = '';
            $result_message = '';
            $celebration    = true;

            if($ExamResultDetails->result_percent >= $ExamResultDetails->pass_mark) 
            {
                    if($result->result_percent == 100)
                    {
                            $heading        = 'Marvellous! ';
                            $class          = "marvellous";
                            $result_message = 'You are now competent for this exam. Best Wishes for nex.'; 
                            $celebration    = true;

                    } else if($result->result_percent >= 95)
                    {
                            $heading        = 'Congrats !';
                            $class          = "excellent";
                            $result_message = 'You qualified this exam. Best Wishes.'; 
                            $celebration    = true;

                    } else {
                                                        
                        $heading        = 'Excellent !';
                        $class          = "qualified";
                        $result_message = 'You have done good Job!'; 
                        $celebration    = true;
                  
                    }
                                                    
            } else { 
                                                    
                        $heading        = 'Ohh !';
                        $class          = "not_qualified";
                        $celebration    = false;
                        $result_message = 'You have not qualified this time. Watch solution carefully and try again.'; 
                                                    
            }

            echo json_encode(['status'=>true,'data'=>['heading'=>$heading,'class'=>$class,'celebration'=>$celebration,'result_message'=>$result_message],'url'=>base_url('exam_control/view_result_detail/'.$result_id)]);
            exit();
        } else {

            $message = '<div class="alert alert-danger alert-dismissable">'
                . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                . 'An ERROR occurred! Please contact to admin.</div>';

                echo json_encode(['status'=>false,'message'=>`An ERROR occurred! Please contact to admin.`,'url'=>base_url('exam_control/view_all_mocks')]);
                exit();
            // $this->view_all_mocks('', $message);
        }
    }

    public function view_all_mocks($count = '', $message = '')
    {
        if (!$this->session->userdata('log')) {
            $this->session->set_flashdata('message', 'Please login firstly.After that you can see any exams.');
            redirect(base_url('login'));
        }
        $data = array();
        $data['header'] = $this->load->view('header/head', '', TRUE);

        if ($_GET['main_category'] && $_GET['sub_category'] && $_GET['sub_sub_category']) {
            $data['mocks'] = $this->exam_model->get_mocks_by_category($_GET['main_category'], $_GET['sub_category'], $_GET['sub_sub_category']);
        } else {

            $data['mocks'] = $this->exam_model->get_all_mocks('mock_test');
        }

        // if ($this->uri->segment(2)) {
        //     $page = $this->uri->segment(2);
        // } else {
        //     $page = 0;
        // }

        if ($_GET['page']) {
            $page = $_GET['page'];
        } else {
            $page = 0;
        }

        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
        // $config['uri_segment']      = $this->uri->segment(2);
        $config['per_page']         = 40;
        $config["base_url"]         = base_url() . "mock-test";
        $config["total_rows"]       = count($data['mocks']);
        $config['anchor_class']     = 'class="page gradient"';
        $config['cur_tag_open']     = '<a class="page active">';
        $config['cur_tag_close']    = '</a>';
        $config['full_tag_open']    = '<div class="pagination">';
        $config['full_tag_close']   = '</div>';
        $config['first_link']       = 'First';
        $config['num_links']        = count($data['mocks']);

        // if (count($_GET) > 0) $config['suffix'] = '?' . http_build_query($_GET, '', "&");


        // if (ceil($config['total_rows'] / $config['per_page']) > 5)
        //     $config['last_link']    =   '.... Last';
        // else
        //     $config['last_link']    =   'Last';

        $this->pagination->initialize($config);

        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links);

        // print_r($data["links"]);
        // print_r($config);
        // die;

        if ($_GET['main_category'] && $_GET['sub_category'] && $_GET['sub_sub_category']) {
            $data['mocks'] = $this->exam_model->get_mocks_by_category($_GET['main_category'], $_GET['sub_category'], $_GET['sub_sub_category'], $config["per_page"], $page * $config["per_page"]);
            $data['category_name'] = $this->db->get_where('sub_categories', array('id' => $_GET['sub_category']))->row()->sub_cat_name;
        } else {


            $data['mocks'] = $this->exam_model->get_all_mocks('mock_test', $config["per_page"], $page * $config["per_page"]);
        }



        $data['categories'] = $this->exam_model->get_categories();
        $data['top_navi'] = $this->load->view('header/top_navigation', $data, TRUE);
        $data['user_role'] = $this->admin_model->get_user_role();
        $data['count'] = $count;
        $data['message'] = $message;
        $data['content'] = $this->load->view('content/view_mock_list', $data, TRUE);
        $data['footer'] = $this->load->view('footer/footer', $data, TRUE);
        $this->load->view('home', $data);
    }

    public function download_student_results($id)
    {
        // if (!$this->session->userdata('log')) {
        //     $this->session->set_userdata('back_url', current_url());
        //     redirect(base_url('login_control'));
        // }
        $userId                   = $this->session->userdata('user_id');
        $data                     = array();
        $data['class']            = 26; // class control value left digit for main manu rigt digit for submenu
        // $data['header']           = $this->load->view('header/admin_head', '', TRUE);
        // $data['top_navi']         = $this->load->view('header/admin_top_navigation', '', TRUE);
        // $data['sidebar']          = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
        $data['mock_details']     = $this->exam_model->get_single_mock_details($id);
        $examDate                 = date('Y-m-d', strtotime($data['mock_details']->exam_created));
        $data['student_results']  = $this->exam_model->get_students_results($id);

        $data['questions']        = count($this->exam_model->get_mock_detail($id));

        $data['all_questions']    = $this->exam_model->get_mock_detail($id);

        // print_r($data['all_questions']); die;
        $data['details']          = $this->user_model->get_user_info();

        $html = $this->load->view('content/student_results_pdf', $data, TRUE);
        // print_r($html); die;

           // Load pdf library
           $this->load->library('pdf');

           // Load HTML content
           $this->dompdf->loadHtml($html);
   
           // (Optional) Setup the paper size and orientation
           $this->dompdf->setPaper('A4', 'potrait');
   
           // Render the HTML as PDF
           $this->dompdf->render();
   
           // Output the generated PDF (1 = download and 0 = preview)
           // 		$this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
           $pdfname = time() . ".pdf";
           $this->dompdf->stream("Result_report.pdf", array("Attachment" => 0));
           // $pdf = $this->dompdf->output();
        //    $file_location = FCPATH . "uploads/aforms/" . $pdfname;
        //    file_put_contents($file_location, $pdf);

        // $data['footer'] = $this->load->view('footer/admin_footer', '', TRUE);
        // $this->load->view('dashboard', $data);
    }


    public function student_results($id)
    {
        // if (!$this->session->userdata('log')) {
        //     $this->session->set_userdata('back_url', current_url());
        //     redirect(base_url('login_control'));
        // }
        $userId                   = $this->session->userdata('user_id');
        $data                     = array();
        $data['class']            = 26; // class control value left digit for main manu rigt digit for submenu
        $data['header']           = $this->load->view('header/admin_head', '', TRUE);
        $data['top_navi']         = $this->load->view('header/admin_top_navigation', '', TRUE);
        $data['sidebar']          = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
        $data['mock_details']     = $this->exam_model->get_single_mock_details($id);
        $examDate                 = date('Y-m-d', strtotime($data['mock_details']->exam_created));
        $data['student_results']  = $this->exam_model->get_students_results($id);

        $data['questions']        = count($this->exam_model->get_mock_detail($id));

        $data['all_questions']    = $this->exam_model->get_mock_detail($id);

        // print_r($data['all_questions']); die;
        $data['details']          = $this->user_model->get_user_info();

        $data['content'] = $this->load->view('content/student_results', $data, TRUE);
        // print_r($html); die;

           // Load pdf library
        //    $this->load->library('pdf');

        //    // Load HTML content
        //    $this->dompdf->loadHtml($html);
   
        //    // (Optional) Setup the paper size and orientation
        //    $this->dompdf->setPaper('A4', 'potrait');
   
        //    // Render the HTML as PDF
        //    $this->dompdf->render();
   
        //    // Output the generated PDF (1 = download and 0 = preview)
        //    // 		$this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
        //    $pdfname = time() . ".pdf";
        //    $this->dompdf->stream("Result_report.pdf", array("Attachment" => 0));
           // $pdf = $this->dompdf->output();
        //    $file_location = FCPATH . "uploads/aforms/" . $pdfname;
        //    file_put_contents($file_location, $pdf);

        $data['footer'] = $this->load->view('footer/admin_footer', '', TRUE);
        $this->load->view('dashboard', $data);
    }

    public function StudentQuestionAnswer($resultArray, $qid, $examid)
    // public function StudentQuestionAnswer($qid)
    {
        // $json = '{"11":"44","10":"40","7":"27","9":"34","3":"11","20":"79","4":"15","1":"4","13":"52","12":"48","18":"72","2":"7","6":"23","8":"30","17":"66","16":"62","14":"53"}';
        // $resultArray = json_decode($json);

        $ExamDetails = $this->exam_model->get_mock_title($examid);

        $resultArray = (array)$resultArray;
        $RightAnswer = $this->exam_model->QuestionRightAnswer($qid, $ExamDetails->type);

        $CheckQuestionAnswer = array($qid => $RightAnswer);

        $Output = '';
        $Questions = array_keys($resultArray);
        $Answers   = array_values($resultArray);

        if (in_array($qid, $Questions)) {
            $output =  $this->CheckGivenAnswer($resultArray, $qid, $RightAnswer);
        } else {

            $output = 'not_attempted';
        }

        return $output;
    }

    private function CheckGivenAnswer($resultArray, $qid, $RightAnswer)
    {
        foreach ($resultArray as $key => $value) {
            if ($key == $qid) {
                if ($value == $RightAnswer) {
                    $Output = 'right';
                } else {
                    $Output = 'wrong';
                }
            }
        }
        return $Output;
    }


    public function view_all_syllabus($message = '')
    {
        if (!$this->session->userdata('log')) {
            $this->session->set_flashdata('message', 'Please login firstly.After that you can see any exams.');
            redirect(base_url('login'));
        }
        $data = array();
        $data['header'] = $this->load->view('header/head', '', TRUE);

        if ($_GET['main_category'] && $_GET['sub_category'] && $_GET['sub_sub_category']) {
            $data['syllabus'] = $this->exam_model->get_syllabus_by_category($_GET['main_category'], $_GET['sub_category'], $_GET['sub_sub_category']);

            $data['category_name'] = $this->db->get_where('sub_categories', array('id' => $_GET['sub_category']))->row()->sub_cat_name;
        } else {

            $data['syllabus'] = array();
        }
        $data['categories'] = $this->exam_model->get_categories();
        $data['top_navi'] = $this->load->view('header/top_navigation', $data, TRUE);
        $data['user_role'] = $this->admin_model->get_user_role();
        $data['message'] = $message;
        $data['content'] = $this->load->view('content/view_syllabus_list', $data, TRUE);
        $data['footer'] = $this->load->view('footer/footer', $data, TRUE);
        $this->load->view('home', $data);
    }




    public function view_mocks_by_category($cat_id)
    {
        $data = array();
        $data['header'] = $this->load->view('header/head', '', TRUE);
        $data['mocks'] = $this->exam_model->get_mocks_by_category($cat_id);
        $data['categories'] = $this->exam_model->get_categories();
        $data['category_name'] = $this->db->get_where('sub_categories', array('id' => $cat_id))->row()->sub_cat_name;
        $data['top_navi'] = $this->load->view('header/top_navigation', $data, TRUE);
        $data['user_role'] = $this->admin_model->get_user_role();
        $data['content'] = $this->load->view('content/view_mock_list', $data, TRUE);
        $data['footer'] = $this->load->view('footer/footer', $data, TRUE);
        $this->load->view('home', $data);
    }


    public function mocks_type($type)
    {
        $data = array();
        $data['header'] = $this->load->view('header/head', '', TRUE);
        $data['categories'] = $this->exam_model->get_categories();
        //    $data['mock_count'] = $this->exam_model->mock_count($data['categories']);
        $data['top_navi'] = $this->load->view('header/top_navigation', $data, TRUE);
        $data['user_role'] = $this->admin_model->get_user_role();
        $data['mocks'] = $this->exam_model->get_mocks_by_price($type);
        if ($type === 'free') {
            $data['category_name'] = 'Free';
        } else if ($type === 'paid') {
            $data['category_name'] = 'Paid';
        } else {
            redirect(base_url('mock-test'));
        }
        $data['footer'] = $this->load->view('footer/footer', $data, TRUE);
        $data['content'] = $this->load->view('content/view_mock_list', $data, TRUE);
        $this->load->view('home', $data);
    }

    public function view_exam_summery($id = '', $message = '')
    {
        // if (!is_numeric($id)) show_404();

        $data = array();
        $data['mock'] = $this->exam_model->get_mock_by_slug($id);
        if ($data['mock']->batch_id != 0) {

            if ($this->session->userdata()['user_role_id'] == 5) {

                $this->db->select('students');
                $this->db->where('id', $data['mock']->batch_id);
                $result = $this->db->get('batch')->row();

                $BatchStudents = explode(',', $result->students);

                if (!in_array($this->session->userdata()['user_id'], $BatchStudents)) {

                    $message = '<div class="alert alert-danger alert-dismissable">'
                        . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                        . 'Sorry! You can not access this live test.</div>';
                    $this->session->set_flashdata('message', $message);

                    redirect('dashboard/' . $this->session->userdata()['user_id']);
                }
            }
        }
        $data['header'] = $this->load->view('header/head', $data, TRUE);
        $data['top_navi'] = $this->load->view('header/top_navigation', $data, TRUE);
        if (!$data['mock']) show_404();
        $data['message'] = $message;
        $data['content'] = $this->load->view('content/exam_summery', $data, TRUE);
        $data['footer'] = $this->load->view('footer/footer', $data, TRUE);
        $this->load->view('home', $data);
    }

    public function view_exam_instructions($id = '', $message = '')
    {
        // if (!is_numeric($id)) {
        //     show_404();
        // }
        if (!$this->session->userdata('log')) {
            $this->session->set_userdata('back_url', current_url());
            $message = '<div class="alert alert-danger alert-dismissable">'
                . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                . 'Please login to start the exam!</div>';
            $this->session->set_flashdata('message', $message);
            redirect(base_url('login_control'));
        }
        $data = array();
        $data['header'] = $this->load->view('header/head', '', TRUE);
        $data['top_navi'] = $this->load->view('header/top_navigation', $data, TRUE);
        $data['message'] = $message;
        $data['mock'] = $this->exam_model->get_mock_by_slug($id);

        if ($data['mock']->batch_id != 0) {

            if ($this->session->userdata()['user_role_id'] == 5) {

                $this->db->select('students');
                $this->db->where('id', $data['mock']->batch_id);
                $result = $this->db->get('batch')->row();

                $BatchStudents = explode(',', $result->students);

                if (!in_array($this->session->userdata()['user_id'], $BatchStudents)) {

                    $message = '<div class="alert alert-danger alert-dismissable">'
                        . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                        . 'Sorry! You can not access this live test.</div>';
                    $this->session->set_flashdata('message', $message);

                    redirect('dashboard/' . $this->session->userdata()['user_id']);
                }
            }
        }

        if ($data['mock']->batch_id != 0) 
        {
            $ResultCheck = $this->exam_model->get_live_result_check($this->session->userdata('user_id'), $data['mock']->title_id);


            if ($ResultCheck > 0) {
                $message = '<div class="alert alert-danger alert-dismissable">'
                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                    . 'Sorry! you have already taken this live exam</div>';
                $this->session->set_flashdata('message', $message);
                redirect(base_url('mock-test-details/' . $data['mock']->slug));
            }
        }

        if (!$data['mock']) {
            show_404();
        }
        $data['content'] = $this->load->view('content/exam_instructions', $data, TRUE);
        $data['footer'] = $this->load->view('footer/footer', $data, TRUE);
        $this->load->view('home', $data);
    }

    public function start_exam($id = '', $message = '')
    {
        $this->load->helper('cookie');
        // if (($id == '') or !is_numeric($id)) show_404();
        if (!$this->session->userdata('log')) {
            $this->session->set_userdata('back_url', current_url());
            redirect(base_url('login'));
        }
        $data = array();
        $data['header'] = $this->load->view('header/head', '', TRUE);
        $data['message'] = $message;
        $data['mock'] = $this->exam_model->get_mock_by_slug($id);
        if (!$data['mock'])  show_404();

        if ($data['mock']->batch_id != 0) 
        {

            if ($this->session->userdata()['user_role_id'] == 5) {

                $this->db->select('students');
                $this->db->where('id', $data['mock']->batch_id);
                $result = $this->db->get('batch')->row();

                $BatchStudents = explode(',', $result->students);

                if (!in_array($this->session->userdata()['user_id'], $BatchStudents)) {

                    $message = '<div class="alert alert-danger alert-dismissable">'
                        . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                        . 'Sorry! You can not access this live test.</div>';
                    $this->session->set_flashdata('message', $message);

                    redirect('dashboard/' . $this->session->userdata()['user_id']);
                }
            }
            
            $ResultCheck = $this->exam_model->get_live_result_check($this->session->userdata('user_id'), $data['mock']->title_id);


            if ($ResultCheck > 0) {
                $message = '<div class="alert alert-danger alert-dismissable">'
                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                    . 'Sorry! you have already taken this live exam</div>';
                $this->session->set_flashdata('message', $message);
                redirect(base_url('mock-test-details/' . $data['mock']->slug));
            }
        }
        
            $lastExamTime = $this->exam_model->get_recent_exam_result_check($this->session->userdata('user_id'), $data['mock']->title_id);
            
            $AddedTwoMinutes = date('Y-m-d H:i:s', strtotime(' +2 minutes ',strtotime($lastExamTime->exam_taken_date)));
            
             date_default_timezone_set('Asia/Kolkata');
            
            // echo $AddedTwoMinutes;
            
            // echo "<br/>";
            
            // echo date('Y-m-d H:i:s');
            
            // die;
            
            if($AddedTwoMinutes > date('Y-m-d H:i:s'))
            {
                $message = '<div class="alert alert-danger alert-dismissable">'
                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                    . 'Exam given by you is closed for 2 minutes. Please try after this duration.</div>';
                $this->session->set_flashdata('message', $message);
                redirect(base_url('dashboard/' .$this->session->userdata()['user_id']));
            }

        if ($data['mock']->exam_price != 0) {
            $user_info = $this->db->get_where('users', array('user_id' => $this->session->userdata('user_id')))->row();
            if (($user_info->subscription_id == 0) or ($user_info->subscription_end <= now())) {
                $payment_token = $this->exam_model->get_pay_token($id, $this->session->userdata('pay_id'));
                if (!$payment_token) {
                    redirect('exam_control/payment_process/' . $id, 'refresh');
                }
            }
        }

        if ($this->input->cookie('ExamTimeDuration')) {
            $data['duration'] = $this->input->cookie('ExamTimeDuration', TRUE) - 1;
        } else {
            $data['duration'] = $data['mock']->duration;
        }

        $total_questions = $this->exam_model->get_mock_detail($data['mock']->title_id);
        
        // print_r($total_questions); die;
        $counter = count($total_questions);
        $questions = array();
        $i = 0;
        do {
            $index = rand(0, $counter - 1);
            if (array_key_exists($index, $questions)) {
                continue;
            }
            $questions[$index] = $total_questions[$index];
            $i++;
        } while ($i < $data['mock']->random_ques_no);

        $data['questions'] = $questions;
        $data['ques_count'] = $counter;
        $data['answers'] = $this->exam_model->get_mock_answers($data['questions']);
        $data['content'] = $this->load->view('content/start_exam', $data, TRUE);
        $data['no_contact_form'] = TRUE;
        $data['footer'] = $this->load->view('footer/footer', $data, TRUE);
        $this->load->view('home', $data);
        $this->session->unset_userdata('pay_id');
        $this->session->unset_userdata('payment_token');
    }

    // public function payment_process($id = '', $message = '')
    // {
    //     if (($id == '') OR !is_numeric($id)) {
    //         show_404();
    //     }
    //     $item_info = $this->exam_model->get_item_detail($id);
    //     if (!$item_info) {
    //         show_404();
    //     }
    //     $payment_settings = $this->admin_model->get_paypal_settings();
    //     if ($payment_settings->sandbox == 1) {
    //         $mode = TRUE;
    //     }else{
    //         $mode = FALSE;
    //     }
    //     $settings = array(
    //         'username' => $payment_settings->api_username,
    //         'password' => $payment_settings->api_pass,
    //         'signature' => $payment_settings->api_signature,
    //         'test_mode' => $mode
    //     )
    //     $params = array(
    //         'amount' => $item_info->exam_price,
    //         'currency' => $currency_code,
    //         'description' => $item_info->title_name,
    //         'return_url' => base_url('exam_control/payment_complete/' . $id),
    //         'cancel_url' => base_url('exam_control/view_all_mocks'));

    //     $this->load->library('merchant');
    //     $this->merchant->load('paypal_express');
    //     $this->merchant->initialize($settings);
    //     $response = $this->merchant->purchase($params);

    //     if ($response->status() == Merchant_response::FAILED) {
    //         $message = $response->message();
    //         echo('Error processing payment: ' . $message);
    //         exit;
    //     } else {
    //         $data = array();
    //         $data['order_token'] = sha1(rand(0, 999999) . $id);
    //         $data['exam_id'] = $id;
    //         $set_token = $this->exam_model->set_order_token($data);
    //     }
    // }

    // public function payment_complete($id)
    // {
    //     $item_info = $this->exam_model->get_item_detail($id);
    //     $payment_settings = $this->admin_model->get_paypal_settings();
    //     if ($payment_settings->sandbox == 1) {
    //         $mode = TRUE;
    //     }else{
    //         $mode = FALSE;
    //     }
    //     $settings = array(
    //         'username' => $payment_settings->api_username,
    //         'password' => $payment_settings->api_pass,
    //         'signature' => $payment_settings->api_signature,
    //         'test_mode' => $mode
    //     )
    //     $params = array(
    //         'amount' => $item_info->exam_price,
    //         'currency' => $currency_code,
    //         'cancel_url' => base_url('exam_control/view_all_mocks')
    //     );

    //     $this->load->library('merchant');
    //     $this->merchant->load('paypal_express');
    //     $this->merchant->initialize($settings);
    //     $response = $this->merchant->purchase_return($params);

    //     if ($response->success()) {
    //         $message = '<div class="alert alert-sucsess alert-dismissable">'
    //                 . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
    //                 . 'Payment Successful!</div>';
    //         $this->session->set_flashdata('message', $message);
    //         $data = array();
    //         $data['PayerID'] = $this->input->get('PayerID');
    //         $data['token'] = $this->input->get('token');
    //         $data['exam_title'] = $item_info->title_name;
    //         $data['pay_amount'] = $item_info->exam_price;
    //         $data['currency_code'] = $currency_code . ' ' . $currency_symbol;
    //         $data['method'] = 'PayPal';
    //         $data['gateway_reference'] = $response->reference();
    //         $token_id = $this->exam_model->set_payment_detail($data);

    //         $this->session->set_userdata('payment_token', $data['token']);
    //         $this->session->set_userdata('pay_id', $token_id);

    //         redirect(base_url() . 'exam_control/view_exam_instructions/' . $id);
    //     } else {
    //         $message = $response->message();
    //         echo('Error processing payment: ' . $message);
    //         exit;
    //     }
    // }


    public function payment_process($id = '', $message = '')
    {
        if (($id == '') or !is_numeric($id))  show_404();

        $item_info = $this->exam_model->get_item_detail($id);
        if (!$item_info)  show_404();

        $payment_settings = $this->admin_model->get_paypal_settings();
        if ($payment_settings->sandbox == 1) {
            $mode = TRUE;
        } else {
            $mode = FALSE;
        }
        $currency = $this->db->select('currency.currency_code,currency.currency_symbol')
            ->from('paypal_settings')
            ->join('currency', 'currency.currency_id = paypal_settings.currency_id')
            ->get()->row_array();
        $settings = array(
            'username' => $payment_settings->api_username,
            'password' => $payment_settings->api_pass,
            'signature' => $payment_settings->api_signature,
            'test_mode' => $mode
        );
        $params = array(
            'amount' => $item_info->exam_price,
            'currency' => $currency['currency_code'],
            'description' => $item_info->title_name,
            'return_url' => base_url('exam_control/payment_complete/' . $id),
            'cancel_url' => base_url('exam_control/view_all_mocks')
        );

        $this->load->library('merchant');
        $this->merchant->load('paypal_express');
        $this->merchant->initialize($settings);
        $response = $this->merchant->purchase($params);

        if ($response->status() == Merchant_response::FAILED) {
            $message = $response->message();
            echo ('Error processing payment: ' . $message);
            exit;
        } else {
            $data = array();
            $data['order_token'] = sha1(rand(0, 999999) . $id);
            $data['exam_id'] = $id;
            $set_token = $this->exam_model->set_order_token($data);
        }
    }

    public function payment_complete($id)
    {
        $item_info = $this->exam_model->get_item_detail($id);
        $payment_settings = $this->admin_model->get_paypal_settings();
        $currency = $this->db->select('currency.currency_code,currency.currency_symbol')
            ->from('paypal_settings')
            ->join('currency', 'currency.currency_id = paypal_settings.currency_id')
            ->get()->row_array();
        if ($payment_settings->sandbox == 1) {
            $mode = TRUE;
        } else {
            $mode = FALSE;
        }
        $settings = array(
            'username' => $payment_settings->api_username,
            'password' => $payment_settings->api_pass,
            'signature' => $payment_settings->api_signature,
            'test_mode' => $mode
        );
        $params = array(
            'amount' => $item_info->exam_price,
            'currency' => $currency['currency_code'],
            'cancel_url' => base_url('exam_control/view_all_mocks')
        );

        $this->load->library('merchant');
        $this->merchant->load('paypal_express');
        $this->merchant->initialize($settings);
        $response = $this->merchant->purchase_return($params);

        if ($response->success()) {
            $message = '<div class="alert alert-sucsess alert-dismissable">'
                . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                . 'Payment Successful!</div>';
            $this->session->set_flashdata('message', $message);
            $data = array();
            $data['PayerID'] = $this->input->get('PayerID');
            $data['token'] = $this->input->get('token');
            $data['exam_title'] = $item_info->title_name;
            $data['pay_amount'] = $item_info->exam_price;
            $data['currency_code'] = $currency_code . ' ' . $currency_symbol;
            $data['method'] = 'PayPal';
            $data['gateway_reference'] = $response->reference();
            $token_id = $this->exam_model->set_payment_detail($data);

            $this->session->set_userdata('payment_token', $data['token']);
            $this->session->set_userdata('pay_id', $token_id);

            redirect(base_url() . 'exam_control/view_exam_instructions/' . $id);
        } else {
            $message = $response->message();
            echo ('Error processing payment: ' . $message);
            exit;
        }
    }

    public function view_results($message = '')
    {
        if (!$this->session->userdata('log')) {
            $this->session->set_userdata('back_url', current_url());
            redirect(base_url('login_control'));
        }
        $userId = $this->session->userdata('user_id');
        $data = array();
        $data['class'] = 25; // class control value left digit for main manu rigt digit for submenu
        $data['header'] = $this->load->view('header/admin_head', '', TRUE);
        $data['top_navi'] = $this->load->view('header/admin_top_navigation', '', TRUE);
        $data['sidebar'] = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
        $data['message'] = $message;

        $config = array();

        if ($this->uri->segment(3)) {
            $page = $this->uri->segment(3);
        } else {
            $page = 0;
        }

        if ($this->session->userdata('user_role_id') <= 4) {
            $countresult = $this->exam_model->count_all_results($userId);
        } else {
            $countresult = count($this->exam_model->get_my_results($userId));
        }


        $config['per_page']         = 50;
        $config["base_url"]         = base_url() . "exam_control/view_results";
        $config["total_rows"]       = $countresult;
        $config['anchor_class']     = 'class="page gradient"';
        $config['cur_tag_open']     = '<a class="page active">';
        $config['cur_tag_close']    = '</a>';
        $config['full_tag_open']    = '<div class="pagination">';
        $config['full_tag_close']   = '</div>';
        $config['first_link']       = 'First';
        $config['num_links']        = 5;

        // if(ceil($config['total_rows']/$config['per_page'])> 5)
        //     $config['last_link']    =   '.... Last';
        // else
        //     $config['last_link']    =   'Last';

        $this->pagination->initialize($config);

        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links);


        if ($this->session->userdata('user_role_id') <= 4) {
            $data['results'] = $this->exam_model->get_all_results($userId, $config["per_page"], $page);
            $data['results1'] = $this->exam_model->get_all_results1($userId);
            $data['my_result'] = $this->exam_model->get_my_results($userId);
            $data['content'] = $this->load->view('content/view_all_results', $data, TRUE);
        } else {
            $data['results']  = $this->exam_model->get_my_results($userId, $config["per_page"], $page);
            $data['results1'] = $this->exam_model->get_my_results1($userId);
            $data['content']  = $this->load->view('content/view_my_results', $data, TRUE);
        }






        // ($config["per_page"], $page,$FilterParams);


        $data['footer'] = $this->load->view('footer/admin_footer', '', TRUE);
        $this->load->view('dashboard', $data);
    }


    public function view_exam_detail($id = '', $message = '')
    {
        if (!$this->session->userdata('log')) {
            $this->session->set_userdata('back_url', current_url());
            redirect(base_url('login_control'));
        }
        if (!is_numeric($id))  show_404();
        $author = $this->exam_model->view_result_detail($id);
        if (empty($author)) {
            $message = '<div class="alert alert-danger alert-dismissable">'
                . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                . 'Not available!</div>';
            $this->view_results($message);
        } else {

            if (($author->participant_id != $this->session->userdata('user_id')) && ($this->session->userdata('user_id') == 5)) {
                exit('<h2>You are not Authorised person to do this!</h2>');
            } else {
                $data = array();
                $data['class'] = 25; // class control value left digit for main manu rigt digit for submenu
                $data['header'] = $this->load->view('header/admin_head', '', TRUE);
                $data['top_navi'] = $this->load->view('header/admin_top_navigation', '', TRUE);
                $data['sidebar'] = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
                $data['message'] = $message;
                $data['results'] = $author;
                $data['content'] = $this->load->view('content/exam_detail', $data, TRUE);
                $data['footer'] = $this->load->view('footer/admin_footer', '', TRUE);
                $this->load->view('dashboard', $data);
            }
        }
    }

    public function view_result_detail($id = '', $message = '')
    {
        if (!$this->session->userdata('log')) {
            $this->session->set_userdata('back_url', current_url());
            redirect(base_url('login_control'));
        }
        if (!is_numeric($id)) {
            show_404();
        }
        $author = $this->exam_model->view_result_detail($id);

        if (empty($author)) {
            $message = '<div class="alert alert-danger alert-dismissable">'
                . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                . 'Not available!</div>';
            $this->view_results($message);
        } else {
            if (($author->participant_id != $this->session->userdata('user_id') &&  $this->session->userdata('user_id') == 5)) {
                exit('<h2>You are not Authorised person to do this!</h2>');
            } else {
                $data = array();
                $data['class'] = 25; // class control value left digit for main manu rigt digit for submenu
                $data['header'] = $this->load->view('header/admin_head', '', TRUE);
                $data['top_navi'] = $this->load->view('header/admin_top_navigation', '', TRUE);
                $data['sidebar'] = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
                $data['message'] = $message;
                $data['results'] = $author;
                $data['all_questions']    = $this->exam_model->get_mock_detail($author->exam_id);
                $data['content'] = $this->load->view('content/result_detail', $data, TRUE);
                $data['footer'] = $this->load->view('footer/admin_footer', '', TRUE);
                $this->load->view('dashboard', $data);
            }
        }
    }

    public function delete_results($id = '')
    {
        if (!is_numeric($id)) {
            return FALSE;
        }
        $author = $this->exam_model->get_result_by_id($id);
        if (empty($author) or (($author->user_id != $this->session->userdata('user_id')) && ($this->session->userdata('user_id') > 2))) {
            show_404();
        }
        if ($this->exam_model->delete_result($id)) {
            $message = '<div class="alert alert-success alert-dismissable">'
                . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                . 'Successfully Deleted!'
                . '</div>';
            $this->view_results($message);
        } else {
            $message = '<div class="alert alert-danger alert-dismissable">'
                . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                . 'An ERROR occurred! Please try again.</div>';
            $this->view_results($message);
        }
    }

    public function batch_request($message = '')
    {
        if ($this->session->userdata('user_role_id') == 5) {
            if (!$this->session->userdata('log')) {
                $this->session->set_userdata('back_url', current_url());
                redirect(base_url('login_control'));
            }
            $userId = $this->session->userdata('user_id');
            $data = array();
            $data['class']  = 73; // class control value left digit for main manu rigt digit for submenu
            $data['header'] = $this->load->view('header/admin_head', '', TRUE);
            $data['top_navi'] = $this->load->view('header/admin_top_navigation', '', TRUE);
            $data['sidebar']  = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
            $data['message']  = $message;
            //get batch detail
            $data['request_batches'] = $this->exam_model->get_request_batches($userId);
            $data['content'] = $this->load->view('content/view_batch_request', $data, TRUE);
            $data['footer'] = $this->load->view('footer/admin_footer', '', TRUE);
            $this->load->view('dashboard', $data);
        }
    }

    public function accept_batch()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $id = $this->input->post('id');
            $userId = $this->session->userdata('user_id');
            $query = $this->db->where('id', $id)->get('batch');
            if ($query->num_rows() > 0) {
                $detail = $query->row();
                $explode_student = explode(',', $detail->students);
                if (in_array($userId, $explode_student)) {
                    $join_students = $detail->join_students;
                    if ($join_students != '') {
                        $explode_join_students = explode(',', $detail->join_students);
                        if (!in_array($userId, $explode_join_students)) {
                            $merge_join = $join_students . "," . $userId;
                        } else {
                            $merge_join = $join_students;
                        }
                    } else {
                        $merge_join = $userId;
                    }
                    $this->db->where('id', $id)->update('batch', ['join_students' => $merge_join]);
                    $res['status'] = true;
                    $res['message'] = 'You are joined new batch for Live Exam!';
                } else {
                    $res['status'] = false;
                    $res['message'] = 'You are not join this Batch';
                }
            } else {
                $res['status'] = false;
                $res['message'] = 'No Detail Found!';
            }
        } else {
            $res['status'] = false;
            $res['message'] = 'Wrong Method!';
        }

        echo json_encode($res);
        exit();
    }

    public function decline_batch()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $id = $this->input->post('id');
            $userId = $this->session->userdata('user_id');
            $query  = $this->db->where('id', $id)->get('batch');
            if ($query->num_rows() > 0) {
                $detail = $query->row();
                $explode_student = explode(',', $detail->students);
                if (in_array($userId, $explode_student)) {
                    $join_students = $detail->decline_students;
                    $decline_student_status = $detail->decline_student_status;
                    if ($join_students != '') {
                        $explode_join_students = explode(',', $detail->decline_students);
                        if (!in_array($userId, $explode_join_students)) {
                            $merge_join = $join_students . "," . $userId;
                            $merge_decline_status = $decline_student_status . "," . $userId . "-S";
                        } else {
                            $merge_join = $join_students;
                            $merge_decline_status = $decline_student_status;
                        }
                    } else {
                        $merge_join = $userId;
                        $merge_decline_status = $userId . "-S";
                    }
                    $this->db->where('id', $id)->update('batch', ['decline_students' => $merge_join, 'decline_student_status' => $merge_decline_status]);
                    $res['status'] = true;
                    $res['message'] = 'You are decline this batch!';
                } else {
                    $res['status'] = false;
                    $res['message'] = 'You are not join this Batch';
                }
            } else {
                $res['status'] = false;
                $res['message'] = 'No Detail Found!';
            }
        } else {
            $res['status'] = false;
            $res['message'] = 'Wrong Method!';
        }

        echo json_encode($res);
        exit();
    }

    public function join_batch()
    {
        $userId = $this->session->userdata('user_id');
        $data = array();
        $data['class'] = 74; // class control value left digit for main manu rigt digit for submenu
        $data['header'] = $this->load->view('header/admin_head', '', TRUE);
        $data['top_navi'] = $this->load->view('header/admin_top_navigation', '', TRUE);
        $data['sidebar'] = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
        $data['message'] = $message;
        $data['content'] = $this->load->view('form/join_batch', $data, TRUE);
        $data['footer'] = $this->load->view('footer/admin_footer', '', TRUE);
        $this->load->view('dashboard', $data);
    }

    public function request_join_batch()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $code = $this->input->post('code');
            $userId = $this->session->userdata('user_id');
            $query  = $this->db->where('batch_code', $code)->get('batch');
            if ($query->num_rows() > 0) {
                $detail = $query->row();
                $explode_student = explode(',', $detail->student_request);
                if (!in_array($userId, $explode_student)) {
                    $join_students = $detail->student_request;
                    $all_students = $detail->students;
                    $explode_all_students = explode(',', $all_students);
                    if (in_array($userId, $explode_all_students)) {
                        $res['status'] = false;
                        $res['message'] = 'You have Already send request of this Batch!.Please try Again another batch code';
                    } else {
                        //join table 
                        $aleary_join = explode(',', $detail->join_students);
                        if (in_array($userId, $aleary_join)) {
                            $res['status'] = false;
                            $res['message'] = 'You have Already join this Batch!.Please try Again another batch code';
                        } else {
                            if ($join_students != '') {
                                $explode_join_students = explode(',', $detail->student_request);
                                $explode_students = explode(',', $detail->students);
                                if (!in_array($userId, $explode_join_students)) {
                                    $merge_join = $join_students . "," . $userId;
                                    $merge_join_student = $all_students . "," . $userId;
                                } else {
                                    $merge_join = $join_students;
                                    $merge_join_student = $all_students . "," . $userId;
                                }
                            } else {
                                $merge_join = $userId;
                                $merge_join_student = $all_students . "," . $userId;
                            }
                            $this->db->where('id', $detail->id)->update('batch', ['student_request' => $merge_join]);
                            $res['status'] = true;
                            $res['message'] = 'Your request has been send to teacher for this batch';
                        }
                    }
                } else {
                    $res['status'] = false;
                    $res['message'] = 'You have Already send request of this Batch!.Please try Again another batch code';
                }
            } else {
                $res['status'] = false;
                $res['message'] = 'No Detail Found!';
            }
        } else {
            $res['status'] = false;
            $res['message'] = 'Wrong Method!';
        }

        echo json_encode($res);
        exit();
    }

    public function view_all_mocks_test($count = '', $message = '')
    {
        if (!$this->session->userdata('log')) {
            $this->session->set_flashdata('message', 'Please login firstly.After that you can see any exams.');
            redirect(base_url('login_control'));
        }
        $data = array();
        $data['header'] = $this->load->view('header/head', '', TRUE);

        if ($_GET['main_category'] && $_GET['sub_category'] && $_GET['sub_sub_category']) {
            $data['mocks'] = $this->exam_model->get_mocks_by_category($_GET['main_category'], $_GET['sub_category'], $_GET['sub_sub_category']);
        } else {

            $data['mocks'] = $this->exam_model->get_all_mocks('mock_test');
        }

        if ($this->uri->segment(3)) {
            $page = $this->uri->segment(3);
        } else {
            $page = 0;
        }


        $config['per_page']         = 40;
        $config["base_url"]         = base_url() . "exam_control/view_all_mocks_test";
        $config["total_rows"]       = count($data['mocks']);
        $config['anchor_class']     = 'class="page gradient"';
        $config['cur_tag_open']     = '<a class="page active">';
        $config['cur_tag_close']    = '</a>';
        $config['full_tag_open']    = '<div class="pagination">';
        $config['full_tag_close']   = '</div>';
        $config['first_link']       = 'First';
        $config['num_links']        = count($data['mocks']);

        if (count($_GET) > 0) $config['suffix'] = '?' . http_build_query($_GET, '', "&");


        if (ceil($config['total_rows'] / $config['per_page']) > 5)
            $config['last_link']    =   '.... Last';
        else
            $config['last_link']    =   'Last';

        $this->pagination->initialize($config);

        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links);

        if ($_GET['main_category'] && $_GET['sub_category'] && $_GET['sub_sub_category']) {
            $data['mocks'] = $this->exam_model->get_mocks_by_category($_GET['main_category'], $_GET['sub_category'], $_GET['sub_sub_category'], $config["per_page"], $page);
            $data['category_name'] = $this->db->get_where('sub_categories', array('id' => $_GET['sub_category']))->row()->sub_cat_name;
        } else {



            $data['mocks'] = $this->exam_model->get_all_mocks('mock_test', $config["per_page"], $page);
        }



        $data['categories'] = $this->exam_model->get_categories();
        $data['top_navi'] = $this->load->view('header/top_navigation', $data, TRUE);
        $data['user_role'] = $this->admin_model->get_user_role();
        $data['count'] = $count;
        $data['message'] = $message;
        $data['content'] = $this->load->view('content/view_mock_list_test', $data, TRUE);
        $data['footer'] = $this->load->view('footer/footer', $data, TRUE);
        $this->load->view('home', $data);
    }
}
