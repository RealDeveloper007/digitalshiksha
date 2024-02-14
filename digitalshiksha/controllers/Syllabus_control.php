<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

require 'vendor/autoload.php';

require APPPATH . '/core/MS_Controller.php';
require APPPATH . '/libraries/MathsCaptcha.php';

class Syllabus_control extends MS_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->CI = & get_instance();
        $this->load->model(['system_model','admin_model','user_model','exam_model']);
        $this->load->helper('common_helper');

        if (!$this->session->userdata('log')) {
            $this->session->set_userdata('back_url', current_url());
            redirect(base_url('login'));
        }

    }

      public function category_url($id)
    {
        $data = array();
        $data['header']     = $this->load->view('header/head', '', TRUE);
        $data['top_navi']   = $this->load->view('header/top_navigation', $data, TRUE);
        $data['message']    = $message;
        $category   = $this->admin_model->get_category_details($id);
        //$CatName = str_replace(' ', '_', strtolower($category->category_name));
        //echo $CatName; die;
        $data['category']   = $category;
        $data['sub_category']   = $this->admin_model->get_subcategories_by_cat_id($category->category_id,1);

        if(isset($_GET['school_code']) && isset($_GET['quiz_code'])) {

            $data['mocks'] = $this->exam_model->get_all_mocks($_GET['school_code'],$_GET['quiz_code']);

         } else {
            $data['mocks'] = array();
         }

        if($category->is_exist==1)
        {
            $data['content']    = $this->load->view('content/sub_category_page', $data, TRUE);

        } else {

            //echo $CatName; die;
            // $CatName=='class_test'
            if(strpos($category->category_name, "Class") !== false)
            {
                $data['content'] = $this->load->view('content/class_test_page', $data, TRUE);
            } else if(strpos($category->category_name, "Exam") !== false) {
                redirect('exam_control/view_all_mocks');
            }

        }
        //print_r($data['category']); die;
        $data['footer']     = $this->load->view('footer/footer', $data, TRUE);
        $this->load->view('home', $data);
    }

    public function sub_category_url($id)
    {
        $data = array();
        $data['header']     = $this->load->view('header/head', '', TRUE);
        $data['top_navi']   = $this->load->view('header/top_navigation', $data, TRUE);
        $data['message']    = '';
    
        $data['sub_category']   = $this->admin_model->get_sub_category_details($id);
        $data['sub_sub_category']   = $this->admin_model->get_sub_sub_categories_by_cat_id($id);

        // print_r($data['sub_sub_category']); die;
              
        $data['content']    = $this->load->view('content/sub_sub_category_page', $data, TRUE);

        $data['footer']     = $this->load->view('footer/footer', $data, TRUE);
        $this->load->view('home', $data);
    }

    public function ExamVisitors($exam_id,$type)
    {
        return $this->exam_model->get_exam_visitors($exam_id,$type);
    }


     public function sub_sub_category_url($id)
    {
        $data = array();
        $data['header']     = $this->load->view('header/head', '', TRUE);
        $data['top_navi']   = $this->load->view('header/top_navigation', $data, TRUE);
        $data['message']    = '';
    
        $data['sub_sub_category']   = $this->admin_model->get_sub_sub_category_details($id);
        $data['sub_sub_sub_category']   = $this->admin_model->get_sub_sub_sub_categories_by_cat_id($id);
       // print_r($data['sub_sub_sub_category']); die;

        $data['content']    = $this->load->view('content/sub_sub_sub_category_page', $data, TRUE);

        if(isset($_COOKIE["VideoTimeDuration"]))
        {
            $this->system_model->add_time_duration('video', $_COOKIE["VideoTimeDuration"]);
        }

         if(isset($_COOKIE["LongATimeDuration"]))
        {
            $this->system_model->add_time_duration('long_answer', $_COOKIE["LongATimeDuration"]);
        }


        if(isset($_COOKIE["PDFTimeDuration"]))
        {
            $this->system_model->add_time_duration('pdf_read', $_COOKIE["PDFTimeDuration"]);
        }


        if(isset($_COOKIE["MCQTimeDuration"]))
        {
            $this->system_model->add_time_duration('mcq_read', $_COOKIE["MCQTimeDuration"]);
        }


        $data['footer']     = $this->load->view('footer/footer', $data, TRUE);
        $this->load->view('home', $data);
    }

     public function long_answer_details($id)
    {
        $data = array();
        $data['header']     = $this->load->view('header/head', '', TRUE);
        $data['top_navi']   = $this->load->view('header/top_navigation', $data, TRUE);
        $data['message']    = '';
    
        $data['syllabus_questions'] = $this->admin_model->get_syllabus_questions($id,'long answer');

        $data['content']    = $this->load->view('content/long_answer_details', $data, TRUE);
        $data['footer']     = $this->load->view('footer/footer', $data, TRUE);
        $this->load->view('home', $data);
    }

    public function pdf_details($id)
    {
        $data = array();
        $data['header']     = $this->load->view('header/head', '', TRUE);
        $data['top_navi']   = $this->load->view('header/top_navigation', $data, TRUE);
        $data['message']    = '';
    
        $data['syllabus_questions'] = $this->admin_model->get_syllabus_questions($id,'pdf');

        $data['content']    = $this->load->view('content/pdf_details', $data, TRUE);

        $data['footer']     = $this->load->view('footer/footer', $data, TRUE);

        $this->load->view('home', $data);
    }

      public function video_details($id)
    {
        $data = array();
        $data['header']     = $this->load->view('header/head', '', TRUE);
        $data['top_navi']   = $this->load->view('header/top_navigation', $data, TRUE);
        $data['message']    = '';
    
        $data['syllabus_questions'] = $this->admin_model->get_syllabus_questions($id,'video');

        $data['content']    = $this->load->view('content/video_details', $data, TRUE);

        $data['footer']     = $this->load->view('footer/footer', $data, TRUE);

        $this->load->view('home', $data);
    }

  

     public function video_single_details($id)
    {
        $data = array();
        $data['header']     = $this->load->view('header/head', '', TRUE);
        $data['top_navi']   = $this->load->view('header/top_navigation', $data, TRUE);
        $data['message']    = '';
    
        $data['syllabus_question_details']   = $this->admin_model->get_single_video_question_details($id,'video');

        $data['content']    = $this->load->view('content/video_single_details', $data, TRUE);

        $data['footer']     = $this->load->view('footer/footer', $data, TRUE);
        $this->load->view('home', $data);
    }

    public function mcq($id)
    {
        $data = array();
        $data['header']     = $this->load->view('header/head', '', TRUE);
        $data['top_navi']   = $this->load->view('header/top_navigation', $data, TRUE);    
        $categories = $this->admin_model->GetCategoriesData($id);
        $Exams = $this->admin_model->GetExams($categories->cat_id,$categories->sub_cat_id,$categories->sub_sub_cat_id);

        $ExamArray = array();
        foreach($Exams as $AllExams)
        {
            $ExamArray[] = $AllExams->title_id;
        }


        $data['mocks'] = $this->exam_model->get_all_mock_detail($ExamArray);

        $data['mock_ans'] = $this->exam_model->get_mock_answers($data['mocks']);



        $data['content']    = $this->load->view('content/mcqs', $data, TRUE);
        $data['footer']     = $this->load->view('footer/footer', $data, TRUE);
        $this->load->view('home', $data);
    }

    public function create_syllabus_questions($message = '')
    {

        if (!$this->session->userdata('log')) {
            $this->session->set_userdata('back_url', current_url());
            redirect(base_url('admin'));
        }
        $data = array();
        $data['class'] = 34; // class control value left digit for main manu rigt digit for submenu
        $data['header'] = $this->load->view('header/admin_head', '', TRUE);
        $data['top_navi'] = $this->load->view('header/admin_top_navigation', $data, TRUE);
        $data['sidebar'] = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
        $data['message'] = $message;
        $data['footer'] = $this->load->view('footer/admin_footer', $data, TRUE);
        $data['content'] = $this->load->view('form/syllabus_pdf_form', $data, TRUE);
        $this->load->view('dashboard', $data);
    }


    public function edit_syllabus_questions($message = '')
    {

        if (!$this->session->userdata('log')) {
            $this->session->set_userdata('back_url', current_url());
            redirect(base_url('admin'));
        }
        $data = array();
        $data['class'] = 34; // class control value left digit for main manu rigt digit for submenu
        $data['header'] = $this->load->view('header/admin_head', '', TRUE);
        $data['top_navi'] = $this->load->view('header/admin_top_navigation', $data, TRUE);
        $data['sidebar'] = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
        $data['message'] = $message;
        $data['syllabus_question'] = $this->admin_model->get_syllabus_single_question_details($_GET['qid']);
        $data['footer'] = $this->load->view('footer/admin_footer', $data, TRUE);
        $data['content'] = $this->load->view('form/edit_syllabus_pdf_form', $data, TRUE);
        $this->load->view('dashboard', $data);
    }


    public function view_syllabus_questions($message = '')
    {

        if (!$this->session->userdata('log')) {
            $this->session->set_userdata('back_url', current_url());
            redirect(base_url('admin'));
        }
        $data = array();
        $data['class'] = 34; // class control value left digit for main manu rigt digit for submenu
        $data['header'] = $this->load->view('header/admin_head', '', TRUE);
        $data['top_navi'] = $this->load->view('header/admin_top_navigation', $data, TRUE);
        $data['sidebar'] = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
        $data['message'] = $message;
        $categories = $this->admin_model->GetCategoriesData($_GET['id']);
        
        if($_GET['type']=='mcq')
        {
            $Exams = $this->admin_model->GetExams($categories->cat_id,$categories->sub_cat_id,$categories->sub_sub_cat_id);

            $ExamArray = array();
            foreach($Exams as $AllExams)
            {
                $ExamArray[] = $AllExams->title_id;
            }

            // print_r($ExamArray); die;
            if(empty($ExamArray))
            {
                $data['mocks'] = array();
                $data['mock_ans'] = array();
            } else {
                $data['mocks'] = $this->exam_model->get_all_mock_detail($ExamArray);
                $data['mock_ans'] = $this->exam_model->get_mock_answers($data['mocks']);
            }
            $data['footer'] = $this->load->view('footer/admin_footer', $data, TRUE);
            $data['content'] = $this->load->view('admin/view_syllabus_questions', $data, TRUE);

        } else if($_GET['type']=='long answer') {

            $data['pdf_questions'] = $this->admin_model->get_syllabus_questions($_GET['id'],'long answer');
            ///print_r($data['pdf_questions']); die;
            $data['content'] = $this->load->view('admin/view_long_answer_questions', $data, TRUE);

        } else if($_GET['type']=='pdf') {

            $data['pdf_questions'] = $this->admin_model->get_syllabus_questions($_GET['id'],'pdf');
            $data['content'] = $this->load->view('admin/view_pdf_questions', $data, TRUE);

        } else if($_GET['type']=='video') {
            
            $data['video_questions'] = $this->admin_model->get_syllabus_questions($_GET['id'],'video');

            $data['content'] = $this->load->view('admin/view_video_questions', $data, TRUE);

        }
        $this->load->view('dashboard', $data);
    }

    public function delete_syllabus_question()
    {
        $DeletePdfQuestion = $this->admin_model->delete_syllabus_question($_GET['qid']);
        //echo $DeletePdfQuestion; die;
        redirect('view_syllabus_questions?id='.$_GET['catid'].'&type='.$_GET['type']);
        //print_r($_GET); die;
    }

    public function save_question()
    {
        $data = array();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('question', 'Question', 'required');
        $this->form_validation->set_rules('url', 'Answer', 'required');
        $this->form_validation->set_rules('type', 'Type', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->create_syllabus_questions();
        } else {
            if ($this->session->userdata['user_role_id'] <= 3) {

                $info               = array();
                $info['cat_id']     = $this->input->post('cat_id');
                $info['question']   = $this->input->post('question');
                $info['type']       = $this->input->post('type');
                $info['url']        = $this->input->post('url');
                $info['status']     = $this->input->post('status');
                $info['created_at'] = date('Y-m-d h:i:s');
                $info['created_by'] = $this->session->userdata('user_id');

                if($this->input->post('type')=='pdf')
                {
                    if (isset($_FILES['pdf_file']['name'][0]))
                    {
                        $config['upload_path'] = './pdf_files/';
            
                        $config['allowed_types'] = 'pdf';
                        $config['file_name'] = uniqid();
                        $config['overwrite'] = TRUE;
            
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('pdf_file')) 
                        {
                            //echo "ss"; die;
                            $error = array('error' => $this->upload->display_errors('<div class="alert alert-danger">', '</div>'));
                            $this->session->set_flashdata('message',$error['error']);
                            redirect(base_url('admin_control/view_sub_sub_sub_categories'));
                        } else {
                            $upload_data = $this->upload->data();
                            $file_name = $upload_data['file_name'];
                           // echo $file_name; die;
            
                            $info['pdf_file'] = $file_name;
            
                        }
                    }
                }


                $Insert = $this->db->insert('syllabus_questions', $info);

                if ($this->db->affected_rows() == 1) {
                    $message = '<div class="alert alert-success alert-dismissable">'
                            . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                            . 'Question added successfully!'
                            . '</div>';
                       // $this->view_syllabus_questions($message);
                        redirect('syllabus_control/view_syllabus_questions?id='.$this->input->post('cat_id').'&type='.$this->input->post('type'));
                } else {
                    $message = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>An ERROR occurred! Please try again.</div>';
                    $this->view_syllabus_questions($message);
                }
            } else {
                exit('<h2>You are not Authorised person to do this!</h2>');
            }
        }
    }



    public function edit_question($id,$message = '')
    {

        if (!$this->session->userdata('log')) {
            $this->session->set_userdata('back_url', current_url());
            redirect(base_url('admin'));
        }
        $data = array();
        $data['class'] = 34; // class control value left digit for main manu rigt digit for submenu
        $data['header'] = $this->load->view('header/admin_head', '', TRUE);
        $data['top_navi'] = $this->load->view('header/admin_top_navigation', $data, TRUE);
        $data['sidebar'] = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
        $data['message'] = $message;
        $data['syllabus_question'] = $this->admin_model->get_syllabus_single_question_details($id);
        $data['footer'] = $this->load->view('footer/admin_footer', $data, TRUE);
        $data['content'] = $this->load->view('form/edit_syllabus_pdf_form', $data, TRUE);
        $this->load->view('dashboard', $data);
    }

    public function update_question()
    {
        $data = array();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('question', 'Question', 'required');
        $this->form_validation->set_rules('url', 'Answer', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->create_syllabus_questions();
        } else {
            if ($this->session->userdata['user_role_id'] <= 3) {

                $info               = array();
                $info['cat_id']     = $this->input->post('cat_id');
                $info['question']   = $this->input->post('question');
                $info['type']       = $this->input->post('type');
                $info['url']        = $this->input->post('url');
                $info['status']     = $this->input->post('status');
                $info['created_at'] = date('Y-m-d h:i:s');
                $info['created_by'] = $this->session->userdata('user_id');

                $Update = $this->admin_model->update_syllabus_question($this->input->post('id'),$info);

                if ($Update) {
                    $message = '<div class="alert alert-success alert-dismissable">'
                            . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                            . 'Question Updated successfully!'
                            . '</div>';
                       // $this->view_syllabus_questions($message);
                       redirect('syllabus_control/view_syllabus_questions?id='.$this->input->post('cat_id').'&type='.$this->input->post('type'));
                    } else {
                    $message = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>An ERROR occurred! Please try again.</div>';
                    $this->view_syllabus_questions($message);
                }
            } else {
                exit('<h2>You are not Authorised person to do this!</h2>');
            }
        }
    }

    public function delete_question($cat_id,$id)
    {
        if (!$this->session->userdata('log')) {
            $this->session->set_userdata('back_url', current_url());
            redirect('admin');
        }
        if (!is_numeric($id)) return FALSE;
        
        if ($this->admin_model->delete_syllabus_question($id)) {
            $message = '<div class="alert alert-success alert-dismissable">'
                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                    . 'Successfully Deleted!'
                    . '</div>';
                    redirect('syllabus_control/view_syllabus_questions?id='.$cat_id);
                } else {
            $message = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>An ERROR occurred! Please try again.</div>';
                  redirect('syllabus_control/view_syllabus_questions?id='.$cat_id);
        }
    }
   

}
