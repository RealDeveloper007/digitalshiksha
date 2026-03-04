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
        // Require login to view individual study material
        if (!$this->session->userdata('log')) {
            $this->session->set_userdata('back_url', current_url());
            $message = '<div class="alert alert-danger alert-dismissable">'
                . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                . 'Please login to view study material!</div>';
            $this->session->set_flashdata('message', $message);
            redirect(base_url('login'));
        }
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
        // Require login to view individual study material
        if (!$this->session->userdata('log')) {
            $this->session->set_userdata('back_url', current_url());
            $message = '<div class="alert alert-danger alert-dismissable">'
                . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                . 'Please login to view study material!</div>';
            $this->session->set_flashdata('message', $message);
            redirect(base_url('login'));
        }
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
        // Require login to view individual study material
        if (!$this->session->userdata('log')) {
            $this->session->set_userdata('back_url', current_url());
            $message = '<div class="alert alert-danger alert-dismissable">'
                . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                . 'Please login to view study material!</div>';
            $this->session->set_flashdata('message', $message);
            redirect(base_url('login'));
        }
        $data = array();
        $data['header']     = $this->load->view('header/head', '', TRUE);
        $data['top_navi']   = $this->load->view('header/top_navigation', $data, TRUE);
        $data['message']    = '';
    
        $syllabus_questions = $this->admin_model->get_syllabus_questions($id,'video');
        
        // Organize questions into lessons and episodes
        // Group episodes into lessons (10 episodes per lesson by default)
        $episodes_per_lesson = 10;
        $lessons = array();
        $lesson_index = 1;
        $episode_index = 1;
        
        foreach ($syllabus_questions as $index => $question) {
            if ($episode_index == 1) {
                $lessons[$lesson_index] = array(
                    'lesson_number' => $lesson_index,
                    'lesson_name' => 'Lesson ' . $lesson_index,
                    'episodes' => array()
                );
            }
            
            // Determine if it's a Mux URL or YouTube key based on length
            // Long keys (20+ characters) = Mux player
            // Short keys (typically 11 characters) = YouTube player
            $video_key = trim($question->url);
            
            // Clean the key - remove URL parts if present
            if (filter_var($video_key, FILTER_VALIDATE_URL)) {
                // Extract the key from URL
                if (strpos(strtolower($video_key), 'youtube.com') !== false || 
                    strpos(strtolower($video_key), 'youtu.be') !== false) {
                    // Extract YouTube ID from URL
                    preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $video_key, $matches);
                    if (isset($matches[1])) {
                        $video_key = $matches[1];
                    }
                } elseif (strpos(strtolower($video_key), 'mux.com') !== false || 
                          strpos(strtolower($video_key), 'stream.mux.com') !== false) {
                    // Extract Mux playback ID from URL
                    preg_match('/\/([a-zA-Z0-9]{20,})(?:\/|$|\?|#)/', $video_key, $matches);
                    if (isset($matches[1])) {
                        $video_key = $matches[1];
                    }
                } else {
                    // Try to extract from path
                    $parts = parse_url($video_key);
                    if (isset($parts['path'])) {
                        $path_parts = explode('/', trim($parts['path'], '/'));
                        $last_part = end($path_parts);
                        if (strlen($last_part) >= 20) {
                            $video_key = $last_part;
                        }
                    }
                }
            }
            
            // Determine player type based on key length
            // Mux playback IDs are typically 20+ characters
            // YouTube video IDs are typically 11 characters
            $is_mux_url = strlen($video_key) >= 20;
            
            $lessons[$lesson_index]['episodes'][] = array(
                'id' => $question->id,
                'episode_number' => $episode_index,
                'title' => $question->question,
                'video_url' => $question->url,
                'is_mux' => $is_mux_url,
                'pdf_file' => isset($question->pdf_file) ? $question->pdf_file : null,
                'status' => isset($question->status) ? $question->status : 1
            );
            
            $episode_index++;
            if ($episode_index > $episodes_per_lesson) {
                $lesson_index++;
                $episode_index = 1;
            }
        }
        
        $data['lessons'] = $lessons;
        $data['syllabus_questions'] = $syllabus_questions;
        $data['user_id'] = $this->session->userdata('user_id');

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
        // Require login to view individual study material
        if (!$this->session->userdata('log')) {
            $this->session->set_userdata('back_url', current_url());
            $message = '<div class="alert alert-danger alert-dismissable">'
                . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                . 'Please login to view study material!</div>';
            $this->session->set_flashdata('message', $message);
            redirect(base_url('login'));
        }
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
                        $config['upload_path'] = './uploads/pdf_files/';
            
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
    
    public function mark_episode_complete()
    {
        if (!$this->session->userdata('log')) {
            header('Content-Type: application/json');
            echo json_encode(array('success' => false, 'message' => 'Not logged in'));
            return;
        }
        
        $episode_id = $this->input->post('episode_id');
        $completed = $this->input->post('completed');
        $user_id = $this->session->userdata('user_id');
        
        if (!is_numeric($episode_id)) {
            header('Content-Type: application/json');
            echo json_encode(array('success' => false, 'message' => 'Invalid episode ID'));
            return;
        }
        
        try {
            // Check if table exists, if not create it or use alternative storage
            // For now, we'll use session or cookies as fallback
            // In production, you should create the episode_completions table
            
            // Try to use database if table exists
            $table_exists = $this->db->table_exists('episode_completions');
            
            if ($table_exists) {
                // Check if record exists
                $this->db->where('episode_id', $episode_id);
                $this->db->where('user_id', $user_id);
                $existing = $this->db->get('episode_completions')->row();
                
                if ($existing) {
                    // Update existing record
                    $this->db->where('episode_id', $episode_id);
                    $this->db->where('user_id', $user_id);
                    $this->db->update('episode_completions', array(
                        'completed' => $completed == '1' ? 1 : 0,
                        'updated_at' => date('Y-m-d H:i:s')
                    ));
                } else {
                    // Insert new record
                    $this->db->insert('episode_completions', array(
                        'episode_id' => $episode_id,
                        'user_id' => $user_id,
                        'completed' => $completed == '1' ? 1 : 0,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    ));
                }
            } else {
                // Fallback: Store in session (temporary solution)
                $completions = $this->session->userdata('episode_completions');
                if (!is_array($completions)) {
                    $completions = array();
                }
                $completions[$episode_id] = $completed == '1' ? 1 : 0;
                $this->session->set_userdata('episode_completions', $completions);
            }
            
            header('Content-Type: application/json');
            echo json_encode(array('success' => true));
        } catch (Exception $e) {
            header('Content-Type: application/json');
            echo json_encode(array('success' => false, 'message' => 'Error saving completion status'));
        }
    }

}
