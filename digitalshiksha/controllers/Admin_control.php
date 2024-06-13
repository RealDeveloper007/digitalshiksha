<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');
require APPPATH . '/core/MS_Controller.php';

require 'vendor/autoload.php';

class Admin_control extends MS_Controller {

    public function __construct()
    {
        parent::__construct();
         $this->CI = &get_instance();
        $this->load->model('exam_model');
        $this->load->model('admin_model');
        $this->load->model('state_model');
        $this->load->model('district_model');
        if (!$this->session->userdata('log')) {
            $this->session->set_userdata('back_url', current_url());
            redirect(base_url('login_control'));
        }
    }



    public function student_details($id)
    {
        return $this->admin_model->get_user_details($id);
    }

    public function index($message = '')
    {
        $data                   = array();
        $data['class']          = 31; // class control value left digit for main manu rigt digit for submenu
        $data['header']         = $this->load->view('header/admin_head', '', TRUE);
        $data['top_navi']       = $this->load->view('header/admin_top_navigation', '', TRUE);
        $data['sidebar']        = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
        $data['states']         = $this->state_model->states_dropdown(1);
        $data['districts']      = $this->district_model->districts_dropdown(1);
        $data['message']        = $message;
        $data['profile_info']   = $this->admin_model->get_my_profile_info();
        $data['district_check']   = $this->district_model->GetDistrictDetails($data['profile_info']->district);
        $data['content']        = $this->load->view('admin/view_profile_info', $data, TRUE);
        $data['footer']         = $this->load->view('footer/admin_footer', '', TRUE);
        $this->load->view('dashboard', $data);
    }


     public function update_profile()
    {
        // print_r($_POST); die;
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user_email', 'User Email', 'required');
        $this->form_validation->set_rules('user_phone', 'User Phone', 'required');
        $this->form_validation->set_rules('school_name', 'School Name', 'required');
        $this->form_validation->set_rules('state', 'State', 'required');
        $this->form_validation->set_rules('district', 'District', 'required');

        if ($this->form_validation->run() == FALSE) 
        {
            return $this->index();

        } else {

            /*if($this->input->post('state')==0)
            {
                 $message = '<div class="alert alert-danger alert-dismissable">'
                            . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                            . 'Sorry! Please select the state.</div>';
                return $this->index($message);
            }

            if($this->input->post('district')==0)
            {
                 $message = '<div class="alert alert-danger alert-dismissable">'
                            . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                            . 'Sorry! Please select the district.</div>';
                return $this->index($message);

            }*/

            $this->load->model('login_model');
            
            $info['user_email'] = $this->input->post('user_email', TRUE);
            $info['user_phone'] = $this->input->post('user_phone', TRUE);
            $info['school_name'] = $this->input->post('school_name', TRUE);
            $info['state'] = $this->input->post('state', TRUE);
            $info['district'] = $this->input->post('district', TRUE);
            $info['user_id'] = $this->session->userdata('user_id');


            $CheckEmailExist = $this->login_model->check_user_mail_exist($this->input->post('user_email'),$this->session->userdata('user_id'));           

            $CheckPhoneExist = $this->login_model->check_user_phone_exist($this->input->post('user_phone'),$this->session->userdata('user_id'));


            if($CheckPhoneExist || $CheckEmailExist)
            { 
                if($CheckEmailExist)
                {
                     $message = '<div class="alert alert-danger alert-dismissable">'
                            . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                            . '"' . $info['user_email'] . '" is already used by another account. Try another email.</div>';
                    return $this->index($message);

                } else if($CheckPhoneExist) {

                    $message = '<div class="alert alert-danger alert-dismissable">'
                        . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                        . '"' . $info['user_phone'] . '" is already used by another account. Try another phone no.</div>';
                return $this->index($message);


                }
            } else {

                $UpdateDetails = $this->login_model->UpdateDetails($info);
                
                    $message = '<div class="alert alert-success alert-dismissable">'
                            . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                            . 'Details has been Updated Successfully!'
                            . '</div>';
                    return $this->index($message);
            
            }
        }
    }

    public function view_my_mocks($exam_type='',$message = '')
    {

        $userId = $this->session->userdata('user_id');
        $data = array();
         if($exam_type == 'mock_test') {
                $data['class'] = 21; // class control value left digit for main manu rigt digit for submenu
            } else {
                $data['class'] = 101; // class control value left digit for main manu rigt digit for submenu
            }
        $data['header'] = $this->load->view('header/admin_head', '', TRUE);
        $data['top_navi'] = $this->load->view('header/admin_top_navigation', '', TRUE);
        $data['sidebar'] = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
        $data['message'] = $message;
        $data['categories'] = $this->exam_model->get_categories();
        if ($this->session->userdata('user_role_id') == 1 || $this->session->userdata('user_role_id') == 3) {
                        $data['exam_type'] = $exam_type;

            $data['mocks'] = $this->exam_model->get_all_mocks($exam_type);
            $data['content'] = $this->load->view('content/view_all_mocks', $data, TRUE);
        } else {
            if($exam_type == 'mock_test') {
                $data['mocks'] = $this->admin_model->get_user_mocks($exam_type,$userId);
            } else {
                $data['mocks'] = $this->admin_model->get_user_mocks($exam_type,$userId);
            }

            $data['exam_type'] = $exam_type;

            // print_r($data); die;
            
            $data['content'] = $this->load->view('content/view_user_mocks', $data, TRUE);
        }
        $data['footer'] = $this->load->view('footer/admin_footer', '', TRUE);
        $this->load->view('dashboard', $data);
    }

    public function view_live_tests($exam_type='',$message = '')
    {

        $userId = $this->session->userdata('user_id');
        $data = array();
        $data['header'] = $this->load->view('header/admin_head', '', TRUE);
        $data['top_navi'] = $this->load->view('header/admin_top_navigation', '', TRUE);
        $data['sidebar'] = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
        $data['message'] = $message;
        $data['categories'] = $this->exam_model->get_categories();
        $data['mocks'] = $this->admin_model->get_student_live_test($userId);
        $data['content'] = $this->load->view('content/view_user_live_test', $data, TRUE);
        $data['footer'] = $this->load->view('footer/admin_footer', '', TRUE);
        $this->load->view('dashboard', $data);
    }

    public function checkLiveTestResult($exam_id)
    {
        return $this->exam_model->get_live_result_check($this->session->userdata('user_id'),$exam_id);
    }

      public function view_all_batches($message = '')
    {
        $userId = $this->session->userdata('user_id');
        $data = array();
        $data['class'] = 90; // class control value left digit for main manu rigt digit for submenu
        $data['header'] = $this->load->view('header/admin_head', '', TRUE);
        $data['top_navi'] = $this->load->view('header/admin_top_navigation', '', TRUE);
        $data['sidebar'] = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
        $data['message'] = $message;
        $data['batches'] = $this->admin_model->get_all_batches();
        $data['content'] = $this->load->view('content/view_all_batches', $data, TRUE);
        $data['footer'] = $this->load->view('footer/admin_footer', '', TRUE);
        $this->load->view('dashboard', $data);
    }

       public function add_new_batch($message = '')
    {
        $userId = $this->session->userdata('user_id');
        $data = array();
        $data['class'] = 90; // class control value left digit for main manu rigt digit for submenu
        $data['header'] = $this->load->view('header/admin_head', '', TRUE);
        $data['top_navi'] = $this->load->view('header/admin_top_navigation', '', TRUE);
        $data['sidebar'] = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
        $data['message'] = $message;
        $data['students'] = $this->admin_model->get_students();
        $data['content'] = $this->load->view('form/batch_add_form', $data, TRUE);
        $data['footer'] = $this->load->view('footer/admin_footer', '', TRUE);
        $this->load->view('dashboard', $data);
    }

     public function save_new_batch()
    {
        // print_r($_POST); die;
        $this->load->library('form_validation');
        $this->form_validation->set_rules('batch_name', 'Batch Name', 'required');
        $this->form_validation->set_rules('batch_code', 'Batch Code', 'required');
        $this->form_validation->set_rules('students', 'Students', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == FALSE) 
        {
            return $this->add_new_batch();

        } else {
            // echo $this->input->post('students', TRUE); die;
            $info['batch_name'] = $this->input->post('batch_name', TRUE);
            $info['batch_code'] = $this->input->post('batch_code', TRUE);
            $info['students']   = $this->input->post('students', TRUE);
            $info['status']     = $this->input->post('status', TRUE);
            $info['created_by'] = $this->session->userdata('user_id');
            $info['created_at'] = date('Y-m-d h:i:s');
            $info['updated_at'] = date('Y-m-d h:i:s');


            $SaveBatchData = $this->admin_model->save_batch($info);           

                
            $message = '<div class="alert alert-success alert-dismissable">'
                            . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                            . 'Batch Details has been Added Successfully!'
                            . '</div>';
            return $this->add_new_batch($message);
            
        }
    }

    public function batch_edit_form($id,$message = '')
    {
        $data = array();
        $data['class'] = 12; // class control value left digit for main manu rigt digit for submenu
        $data['header'] = $this->load->view('header/admin_head', $data, TRUE);
        $data['top_navi'] = $this->load->view('header/admin_top_navigation', $data, TRUE);
        $data['sidebar'] = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
        $data['message'] = $message;
        $data['students'] = $this->admin_model->get_students();
        $data['batch_details'] = $this->admin_model->batch_details($id);
        $data['content'] = $this->load->view('form/batch_edit_form', $data, TRUE);
        $data['footer'] = $this->load->view('footer/admin_footer', $data, TRUE);
        $this->load->view('dashboard', $data);
    }  

     public function update_new_batch()
    {
        // print_r($_POST); die;
        $this->load->library('form_validation');
        $this->form_validation->set_rules('batch_name', 'Batch Name', 'required');
        $this->form_validation->set_rules('batch_code', 'Batch Code', 'required');
        //$this->form_validation->set_rules('students[]', 'Students', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == FALSE) 
        {
            return $this->batch_edit_form();

        } else {
            if($this->input->post('status_type', TRUE) == 1) {
                $batch_detail = $this->db->where('id',$this->input->post('id'))->get('batch')->row();
                if($this->input->post('students', TRUE) != '') {
                    $students = $batch_detail->students.",".$this->input->post('students', TRUE);
                } else {
                    $students = $batch_detail->students;
                }
            } else {
                $students = $this->input->post('students', TRUE);
            }
            
            $info['batch_name'] = $this->input->post('batch_name', TRUE);
            $info['batch_code'] = $this->input->post('batch_code', TRUE);
            $info['students']   = $students;
            $info['status']     = $this->input->post('status', TRUE);
            $info['created_by'] = $this->session->userdata('user_id');
            $info['updated_at'] = date('Y-m-d h:i:s');


            $SaveBatchData = $this->admin_model->update_batch($this->input->post('id'),$info);           

                
            $message = '<div class="alert alert-success alert-dismissable">'
                            . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                            . 'Batch Details has been updated Successfully!'
                            . '</div>';

                $this->session->set_flashdata('message',$message);

            return $this->view_all_batches($message);
            
        }
    }

    public function view_my_mock_detail($id, $message = '')
    {
        if (!is_numeric($id)) {
            show_404();
        }
        $data = array();
         $MockDetails = $this->db->where('title_id',$id)->get('exam_title')->row();
        if($MockDetails->batch_id==0)
        {
            $data['class'] = 21;   // class control value left digit for main manu rigt digit for submenu

        } else {

            $data['class'] = 101;   // class control value left digit for main manu rigt digit for submenu

        }
        // $data['class'] = 21;   // class control value left digit for main manu rigt digit for submenu
        $data['header'] = $this->load->view('header/admin_head', '', TRUE);
        $data['top_navi'] = $this->load->view('header/admin_top_navigation', $data, TRUE);
        $data['sidebar'] = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
        $data['message'] = $message;
        $data['mock_title'] = $this->exam_model->get_mock_by_id($id);
        if (!(empty($data['mock_title'])) && (($this->session->userdata('user_role_id') == 1 || $this->session->userdata('user_role_id') == 4) OR ($data['mock_title']->user_id == $this->session->userdata('user_id')))) {
            $data['mocks'] = $this->exam_model->get_mock_detail($id);
            $data['mock_ans'] = $this->exam_model->get_mock_answers($data['mocks']);
            $data['exam_detail'] = $this->db->where('title_id',$id)->get('exam_title')->row();
            $data['content'] = $this->load->view('content/mock_detail', $data, TRUE);
            $data['modal'] = $this->load->view('modals/update_question', $data, TRUE);
            $data['footer'] = $this->load->view('footer/admin_footer', $data, TRUE);

            $this->load->view('dashboard', $data);
        } else {
            show_404();
        }
    }

    public function view_categories($message = '')
    {
//        if ($this->session->userdata('user_role_id') > 3) {
//            redirect(base_url("login_control/dashboard_control"));
//        }
        $data = array();
        $data['class'] = 61; // class control value left digit for main manu rigt digit for submenu
        $data['header'] = $this->load->view('header/admin_head', '', TRUE);
        $data['top_navi'] = $this->load->view('header/admin_top_navigation', $data, TRUE);
        $data['sidebar'] = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
        $data['message'] = $message;
        $data['categories'] = $this->exam_model->get_categories_with_author();
        $data['content'] = $this->load->view('content/view_all_categories', $data, TRUE);
        $data['footer'] = $this->load->view('footer/admin_footer', $data, TRUE);
        $this->load->view('dashboard', $data);
    }

    public function view_subcategories($message = '')
    { 
        $data = array();
        $data['class'] = 63; // class control value left digit for main manu rigt digit for submenu
        $data['header'] = $this->load->view('header/admin_head', '', TRUE);
        $data['top_navi'] = $this->load->view('header/admin_top_navigation', $data, TRUE);
        $data['sidebar'] = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
        $data['message'] = $message;
        $data['categories'] = $this->exam_model->get_categories();
        $data['sub_categories'] = $this->exam_model->get_subcategories_with_category();
        $data['mock_count'] = $this->exam_model->mock_count($data['sub_categories']);
        $data['course_count'] = $this->exam_model->course_count($data['sub_categories']);
        //  echo "<pre/>"; print_r($data['course_count']); exit();
        $data['content'] = $this->load->view('content/view_sub_categories', $data, TRUE);
        $data['footer'] = $this->load->view('footer/admin_footer', $data, TRUE);
        $this->load->view('dashboard', $data);
    }
    
    
    public function view_sub_subcategories($message = '')
    { 
        $data = array();
        $data['class'] = 65; // class control value left digit for main manu rigt digit for submenu
        $data['header'] = $this->load->view('header/admin_head', '', TRUE);
        $data['top_navi'] = $this->load->view('header/admin_top_navigation', $data, TRUE);
        $data['sidebar'] = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
        $data['message'] = $message;
        // $categories = $this->exam_model->get_categories();

        if($this->session->userdata('user_role_id')==4)
        {
            $categories  = $this->exam_model->get_assign_categories();
        } else {
            $categories  = $this->exam_model->get_categories();

        }
            $option = array();
            $option[''] = 'Select Category';
            foreach ($categories as $category) {
      
                    $option[$category->category_id] = $category->category_name;
                
            }
        $data['categories'] = $option;
        
        if($_GET['sub_category'] && $_GET['category'])
        {
             $sub_categories = $this->exam_model->get_subcategories_by_catid($_GET['category']);
        
            $option2 = array();
            foreach ($sub_categories as $sub_cat) {
     
                    $option2[$sub_cat->id] = $sub_cat->sub_cat_name;
                
            }

            $data['option2'] = $option2;
            
            $data['sub_sub_categories'] = $this->exam_model->get_subsubcategories_by_catid($_GET['sub_category']);
        } else {

            $data['sub_sub_categories'] = array();
            $data['option2'] = array();

        }

        $data['content'] = $this->load->view('content/view_sub_sub_categories', $data, TRUE);
        $data['footer'] = $this->load->view('footer/admin_footer', $data, TRUE);
        $this->load->view('dashboard', $data);
    }

     public function view_sub_sub_subcategories($message = '')
    {
        $data = array();
        $data['class'] = 67; // class control value left digit for main manu rigt digit for submenu
        $data['header'] = $this->load->view('header/admin_head', '', TRUE);
        $data['top_navi'] = $this->load->view('header/admin_top_navigation', $data, TRUE);
        $data['sidebar'] = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
        $data['message'] = $message;
        $categories = $this->exam_model->get_choose_categories();


        $option[''] = 'Select Category';
        foreach ($categories as $category) {

            $option[$category->category_id] = $category->category_name;
        }
        $data['categories'] = $option;



        if ($_GET['sub_category'] && $_GET['category']) {
            $sub_categories = $this->exam_model->get_subcategories_by_catid($_GET['category']);

            $option2[''] = 'Select Sub Category';
            foreach ($sub_categories as $sub_cat) {

                $option2[$sub_cat->id] = $sub_cat->sub_cat_name;
            }

            $data['option2'] = $option2;


            $sub_subcategories = $this->exam_model->get_subsubcategories_by_catid($_GET['sub_category']);

            $option3[''] = 'Select Sub Sub Category';
            foreach ($sub_subcategories as $sub_subcat) {

                $option3[$sub_subcat->id] = $sub_subcat->name;
            }

            $data['option3'] = $option3;

            $data['sub_sub_sub_categories'] = $this->exam_model->get_sub_subsubcategories_by_catid($_GET['sub_sub_category']);
            // print_r($data['sub_sub_sub_categories']); die;
        } else {
            $data['sub_sub_sub_categories'] = array();
            $data['option2'] = array('Select Sub Category');
        }


        $data['content'] = $this->load->view('content/view_sub_sub_sub_categories', $data, TRUE);
        $data['footer'] = $this->load->view('footer/admin_footer', $data, TRUE);
        $this->load->view('dashboard', $data);
    }


    // public function category_form($message = '')
    // {
    //     $data = array();
    //     $data['class'] = 62; // class control value left digit for main manu rigt digit for submenu
    //     $data['header'] = $this->load->view('header/admin_head', '', TRUE);
    //     $data['top_navi'] = $this->load->view('header/admin_top_navigation', $data, TRUE);
    //     $data['sidebar'] = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
    //     $data['message'] = $message;
    //     $data['footer'] = $this->load->view('footer/admin_footer', $data, TRUE);
    //     $data['content'] = $this->load->view('form/category_form', $data, TRUE);
    //     $this->load->view('dashboard', $data);
    // }

    public function subcategory_form($message = '')
    {
        $data = array();
        $data['class'] = 64; // class control value left digit for main manu rigt digit for submenu
        $data['header'] = $this->load->view('header/admin_head', '', TRUE);
        $data['top_navi'] = $this->load->view('header/admin_top_navigation', $data, TRUE);
        $data['sidebar'] = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
        $data['message'] = $message;
        $data['categories'] = $this->exam_model->get_categories();
        $data['content'] = $this->load->view('form/subcategory_form', $data, TRUE);
        $data['footer'] = $this->load->view('footer/admin_footer', $data, TRUE);
        $this->load->view('dashboard', $data);
    }
    
     public function sub_subcategory_form($message = '')
    {
        $data = array();
        $data['class'] = 66; // class control value left digit for main manu rigt digit for submenu
        $data['header'] = $this->load->view('header/admin_head', '', TRUE);
        $data['top_navi'] = $this->load->view('header/admin_top_navigation', $data, TRUE);
        $data['sidebar'] = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
        $data['message'] = $message;
        if($_GET['category'] && $_GET['sub_category'] && $_GET['id'])
        {
            $data['sub_sub_category'] = $this->admin_model->get_sub_subcategories_details($_GET['id']);
            

            if($this->session->userdata('user_role_id')==4)
            {
                $data['categories']  = $this->exam_model->get_assign_categories();
            } else {

                $data['categories']  = $this->exam_model->get_categories();

            }

            $option = array();
            foreach ($data['categories'] as $category) {
      
                    $option[$category->category_id] = $category->category_name;
                
            }
            
            $data['option'] = $option;
    
            $data['sub_categories'] = $this->exam_model->get_subcategories_by_catid($data['sub_sub_category']->cat_id);
            
                $option2 = array();
                foreach ($data['sub_categories'] as $sub_cat) {
         
                        $option2[$sub_cat->id] = $sub_cat->sub_cat_name;
                    
                }

            $data['option2'] = $option2;
                    $data['content'] = $this->load->view('form/edit_sub_subcategory_form', $data, TRUE);


        } else {
            
            if($this->session->userdata('user_role_id')==4)
            {
                $data['categories']  = $this->exam_model->get_assign_categories();
            } else {

                $data['categories']  = $this->exam_model->get_categories();

            }
            $data['content'] = $this->load->view('form/sub_subcategory_form', $data, TRUE);

        }
        $data['footer'] = $this->load->view('footer/admin_footer', $data, TRUE);
        $this->load->view('dashboard', $data);
    }

       public function sub_sub_subcategory_form($message = '')
    {
        $data = array();
        $data['class'] = 66; // class control value left digit for main manu rigt digit for submenu
        $data['header'] = $this->load->view('header/admin_head', '', TRUE);
        $data['top_navi'] = $this->load->view('header/admin_top_navigation', $data, TRUE);
        $data['sidebar'] = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
        $data['message'] = $message;
        if ($_GET['category'] && $_GET['sub_category'] && $_GET['id']) {
            $data['sub_sub_category'] = $this->admin_model->get_sub_sub_sub_categories_details($_GET['id']);

            //print_r($data['sub_sub_category']); die;

            $data['categories'] = $this->exam_model->get_choose_categories();

            $option[''] = 'Select Category';
            foreach ($data['categories'] as $category) {

                $option[$category->category_id] = $category->category_name;
            }

            $data['option'] = $option;

            $data['sub_categories'] = $this->exam_model->get_subcategories_by_catid($data['sub_sub_category']->cat_id);

            $option2[''] = 'Select Sub Category';
            foreach ($data['sub_categories'] as $sub_cat) {

                $option2[$sub_cat->id] = $sub_cat->sub_cat_name;
            }

            $data['option2'] = $option2;

            $sub_subcategories = $this->exam_model->get_subsubcategories_by_catid($_GET['sub_category']);

            $option3[''] = 'Select Sub Sub Category';
            foreach ($sub_subcategories as $sub_subcat) {

                $option3[$sub_subcat->id] = $sub_subcat->name;
            }

            $data['option3'] = $option3;

            $data['content'] = $this->load->view('form/edit_sub_sub_subcategory_form', $data, TRUE);
        } else {

            $data['categories'] = $this->exam_model->get_choose_categories();
            $data['content'] = $this->load->view('form/sub_sub_subcategory_form', $data, TRUE);
        }
        $data['footer'] = $this->load->view('footer/admin_footer', $data, TRUE);
        $this->load->view('dashboard', $data);
    }


    public function category_form($message = '')
    {
        $data = array();
        $data['class'] = 62; // class control value left digit for main manu rigt digit for submenu
        $data['header'] = $this->load->view('header/admin_head', '', TRUE);
        $data['top_navi'] = $this->load->view('header/admin_top_navigation', $data, TRUE);
        $data['sidebar'] = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
        $data['message'] = $message;
        $data['footer'] = $this->load->view('footer/admin_footer', $data, TRUE);
        $data['content'] = $this->load->view('form/category_form', $data, TRUE);
        $this->load->view('dashboard', $data);
    }

    public function view_payment_history($message = '')
    {
        if ($this->session->userdata('user_role_id') > 2) {
            redirect(base_url("login_control/dashboard_control"));
        }
        $data = array();
        $data['class'] = 35; // class control value left digit for main manu rigt digit for submenu
        $data['header'] = $this->load->view('header/admin_head', '', TRUE);
        $data['top_navi'] = $this->load->view('header/admin_top_navigation', $data, TRUE);
        $data['sidebar'] = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
        $data['message'] = $message;
        $data['payments'] = $this->admin_model->get_payment_history();
        $data['content'] = $this->load->view('content/view_payment_history', $data, TRUE);
        $data['footer'] = $this->load->view('footer/admin_footer', $data, TRUE);
        $this->load->view('dashboard', $data);
    }
    
    public function mock_form($type = '', $message = '', $cat_id = '')
    {  
        //echo "<pre/>"; print_r($this->session->all_userdata()); exit();
        $userId = $this->session->userdata('user_id');
        $data = array();
        $data['class'] = $type == 'mock_test' ? 22 : 97; // class control value left digit for main manu rigt digit for submenu
        $data['header'] = $this->load->view('header/admin_head', '', TRUE);
        $data['top_navi'] = $this->load->view('header/admin_top_navigation', $data, TRUE);
        $data['sidebar'] = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
        $data['message'] = $message;
        $data['cat_id'] = $cat_id;
        if($this->session->userdata('user_role_id')==4)
        {
            $data['categories'] = $this->exam_model->get_assign_categories();
        } 
        else 
        {
            $data['categories'] = $this->exam_model->get_categories();
        }
        $data['batches'] = $this->db->where('status',1)->get('batch')->result();
        $data['exam_type']    = $this->uri->segment(3);
        $data['content'] = $this->load->view('form/mock_form', $data, TRUE);
        $data['footer']  = $this->load->view('footer/admin_footer', $data, TRUE);
        $this->load->view('dashboard', $data);
    }

    public function question_form($message = '', $title_id, $mock_title = 'Create Question', $question_no = 1)
    {
        $data = array();
        // $data['class'] = 22; // class control value left digit for main manu rigt digit for submenu
         $MockDetails = $this->db->where('title_id',$title_id)->get('exam_title')->row();
        if($MockDetails->batch_id==0)
        {
            $data['class'] = 22;   // class control value left digit for main manu rigt digit for submenu

        } else {

            $data['class'] = 102;   // class control value left digit for main manu rigt digit for submenu

        }
        $data['header'] = $this->load->view('header/admin_head', '', TRUE);
        $data['top_navi'] = $this->load->view('header/admin_top_navigation', $data, TRUE);
        $data['sidebar'] = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
        $data['categories'] = $this->exam_model->get_categories();
        $data['message'] = $message;
        $data['question_no'] = $question_no;
        $data['mock_title'] = $mock_title;
        $data['title_id'] = $title_id;
        $data['content'] = $this->load->view('form/question_form', $data, TRUE);
        $data['footer'] = $this->load->view('footer/admin_footer', $data, TRUE);
        $this->load->view('dashboard', $data);
    }

    public function question_new_form($message = '', $title_id, $mock_title = 'Create Question', $question_no = 1)
    {
        $data = array();
        $data['class'] = 22; // class control value left digit for main manu rigt digit for submenu
        $data['header'] = $this->load->view('header/admin_head', '', TRUE);
        $data['top_navi'] = $this->load->view('header/admin_top_navigation', $data, TRUE);
        $data['sidebar'] = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
        $data['categories'] = $this->exam_model->get_categories();
        $data['message'] = $message;
        $data['question_no'] = $question_no;
        $data['mock_title'] = $mock_title;
        $data['title_id'] = $title_id;
        $data['content'] = $this->load->view('form/question_new_form', $data, TRUE);
        $data['footer'] = $this->load->view('footer/admin_footer', $data, TRUE);
        $this->load->view('dashboard', $data);
    }

    public function create_category()
    {
        $data = array();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('cat_name', 'Category', 'required|max_length[20]');
        if ($this->form_validation->run() == FALSE) {
            $this->category_form();
        } else {
            if ($this->session->userdata['user_role_id'] <= 4) {
                $category_name = $this->input->post('cat_name');
                $cat_id = $this->admin_model->create_category($category_name);
                if ($cat_id) {
                    $message = '<div class="alert alert-success alert-dismissable">'
                            . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                            . 'Category added successfully! Create Exam in the category.'
                            . '</div>';
                    $this->mock_form($message, $cat_id);
                } else {
                    $message = '<div class="alert alert-danger">' . $category_name . ' already exist.</div>';
                    $this->category_form($message);
                }
            } else {
                show_404();
            }
        }
    }
    public function create_subcategory()
    {
        $data = array();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('sub_cat_name', 'Category', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->category_form();
        } else {
            if ($this->session->userdata['user_role_id'] <= 4) {
                $sub_cat_name = $this->input->post('sub_cat_name');
                $cat_id = $this->admin_model->create_subcategory($sub_cat_name);
               // if ($cat_id) {
                    $message = '<div class="alert alert-success alert-dismissable">'
                            . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                            . 'Sub category added successfully! Create Exam in the category.'
                            . '</div>';
                    $this->mock_form($message, $cat_id);
               // } else {
                    //$message = '<div class="alert alert-danger">' . $sub_cat_name . ' already exist.</div>';
                    //$this->category_form($message);
                //}
            } else {
                show_404();
            }
        }
    }
    
    public function create_sub_subcategory()
    {
        $data = array();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('sub_cat_name', 'Sub Sub Category', 'required');
        if ($this->form_validation->run() == FALSE) {
                        //print_r($this->input->post()); die;

            $this->category_form();
        } else {
            if ($this->session->userdata['user_role_id'] <= 4) {
                
                $category = $this->input->post('category');
                $sub_category = $this->input->post('sub_category');
                $sub_cat_name = $this->input->post('sub_cat_name');

                $sub_cat_name = $this->input->post('sub_cat_name');
                $cat_id = $this->admin_model->create_sub_subcategory($sub_cat_name);
               // if ($cat_id) {
                    $message = '<div class="alert alert-success alert-dismissable">'
                            . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                            . 'Sub Sub category added successfully! Create Exam in the category.'
                            . '</div>';
                    //$this->mock_form($message, $cat_id);
                    redirect('admin_control/view_sub_subcategories?category='.$category.'&sub_category='.$sub_category);
               // } else {
                    //$message = '<div class="alert alert-danger">' . $sub_cat_name . ' already exist.</div>';
                    //$this->category_form($message);
                //}
            } else {
                show_404();
            }
        }
    }
    
        public function update_sub_subcategory()
    {
        $data = array();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('sub_cat_name', 'Sub Sub Category', 'required');
        if ($this->form_validation->run() == true){
            if ($this->session->userdata['user_role_id'] <= 4) {
                
                $id = $this->input->post('id');
                $category = $this->input->post('category');
                $sub_category = $this->input->post('sub_category');
                $sub_cat_name = $this->input->post('sub_cat_name');

                $sub_cat_name = $this->input->post('sub_cat_name');
                $cat_id = $this->admin_model->update_sub_subcategory($sub_cat_name);
               // if ($cat_id) {
                    $message = '<div class="alert alert-success alert-dismissable">'
                            . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                            . 'Sub Sub category updated successfully.'
                            . '</div>';
                    //$this->mock_form($message, $cat_id);
                    redirect('admin_control/view_sub_subcategories?category='.$category.'&sub_category='.$sub_category);
               // } else {
                    //$message = '<div class="alert alert-danger">' . $sub_cat_name . ' already exist.</div>';
                    //$this->category_form($message);
                //}
            } else {
                show_404();
            }
        }
    }

    public function create_sub_sub_subcategory()
    {
        $data = array();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('cat_id', 'Category', 'required');
        $this->form_validation->set_rules('sub_cat_id', 'Sub Category', 'required');
        $this->form_validation->set_rules('sub_sub_cat_id', 'Sub Sub Category', 'required');
        $this->form_validation->set_rules('name', 'Sub Sub Sub Category', 'required');
        if ($this->form_validation->run() == FALSE) {
            // echo validation_errors(); die;

            $this->sub_sub_subcategory_form();
        } else {
            if ($this->session->userdata['user_role_id'] <= 4) {

                $category = $this->input->post('cat_id');
                $sub_category = $this->input->post('sub_cat_id');
                $sub_sub_category = $this->input->post('sub_sub_cat_id');
                $sub_cat_name = $this->input->post('name');
                $cat_id = $this->admin_model->create_sub_sub_subcategory($sub_cat_name);
                // if ($cat_id) {
                $message = '<div class="alert alert-success alert-dismissable">'
                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                    . 'Sub Sub category added successfully! Create Exam in the category.'
                    . '</div>';
                //$this->mock_form($message, $cat_id);
                redirect('admin_control/view_sub_sub_subcategories?category=' . $category . '&sub_category=' . $sub_category . '&sub_sub_category=' . $sub_sub_category);
                // } else {
                //$message = '<div class="alert alert-danger">' . $sub_cat_name . ' already exist.</div>';
                //$this->category_form($message);
                //}
            } else {
                show_404();
            }
        }
    }

    public function update_sub_sub_subcategory()
    {
        $data = array();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('cat_id', 'Category', 'required');
        $this->form_validation->set_rules('sub_cat_id', 'Sub Category', 'required');
        $this->form_validation->set_rules('sub_sub_cat_id', 'Sub Sub Category', 'required');
        $this->form_validation->set_rules('name', 'Sub Sub Sub Category', 'required');
        if ($this->form_validation->run() == true) {
            if ($this->session->userdata['user_role_id'] <= 4) {

                $id = $this->input->post('id');
                $category = $this->input->post('cat_id');
                $sub_category = $this->input->post('sub_cat_id');
                $sub_sub_category = $this->input->post('sub_sub_cat_id');
                $sub_cat_name = $this->input->post('name');
                $cat_id = $this->admin_model->update_sub_sub_subcategory($sub_cat_name);

                // if ($cat_id) {
                $message = '<div class="alert alert-success alert-dismissable">'
                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                    . 'Sub Sub category updated successfully.'
                    . '</div>';
                //$this->mock_form($message, $cat_id);
                redirect('admin_control/view_sub_sub_subcategories?category=' . $category . '&sub_category=' . $sub_category . '&sub_sub_category=' . $sub_sub_category);
                // } else {
                //$message = '<div class="alert alert-danger">' . $sub_cat_name . ' already exist.</div>';
                //$this->category_form($message);
                //}
            } else {

                // echo "s"; die;

                // show_404();
            }
        } else {
            $this->sub_sub_subcategory_form();
        }
    }


    public function create_mock($message = '')
    {
        // print_r($this->input->post()); die;
        $this->load->library('form_validation');
        $this->form_validation->set_rules('category', 'Category', 'required|integer');
        $this->form_validation->set_rules('sub_category', 'Sub Category', 'required|integer');
        $this->form_validation->set_rules('sub_sub_category', 'Sub Sub Category', 'required|integer');

        $this->form_validation->set_rules('mock_title', 'Mock Title', 'required|min_length[3]');
        $this->form_validation->set_rules('slug', 'Mock Slug', 'required|min_length[3]');
        $this->form_validation->set_rules('passing_score', 'Passing Score', 'required|integer|less_than[100]');
        if ($this->form_validation->run() == FALSE) {
            $this->mock_form($this->input->post('exam_type', TRUE));
        } else {
            $form_info = array();
            if ($_FILES['feature_image']['name']) {
                $config['upload_path'] = './exam-images/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['file_name'] = uniqid();
                $config['max_size'] = '3048';

//                $config['overwrite'] = TRUE;
//                $config['max_size'] = '150';
//                $config['max_width'] = '1024';
//                $config['max_height'] = '768';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('feature_image')) 
                {
                    $error = array('error' => $this->upload->display_errors('<div class="alert alert-danger">', '</div>'));
                    $this->session->set_flashdata('message',$error['error']);
                    redirect(base_url('admin_control/mock_form'));
                } else {
                    $upload_data = $this->upload->data();

                    $Thumbnail =  $this->resizeImage($upload_data['file_name']); 

                    $title_id = $this->admin_model->add_mock_title($Thumbnail);
                }
            }else{
                $title_id = $this->admin_model->add_mock_title();
            }

            if ($title_id) {
                if($this->input->post('exam_type', TRUE) == 'live_mock_test') { 
                   return redirect(base_url('mock_detail/'.$title_id));
                } else {
                    $message = '<div class="alert alert-success alert-dismissable">'
                        . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                        . 'Exam created successfully! Now create questions.'
                        . '</div>';
                    $mock_title = $this->input->post('mock_title');
                    $this->question_form($message, $title_id, $mock_title);
                }
               
            } else {
                $message = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>An ERROR occurred! Please try again.</div>';
                $this->mock_form($this->input->post('exam_type', TRUE),$message);

            }
        }
    }

    public function resizeImage($filename)
   {
      $source_path = $_SERVER['DOCUMENT_ROOT'] . '/exam-images/' . $filename;
      $target_path = $_SERVER['DOCUMENT_ROOT'] . '/exam-images/';
      $config_manip = array(
          'image_library' => 'gd2',
          'source_image' => $source_path,
          'new_image' => $target_path,
          'maintain_ratio' => TRUE,
          'create_thumb' => TRUE,
          'thumb_marker' => '_thumb',
          'width' => 400,
          'height' => 400
      );


      $this->load->library('image_lib', $config_manip);
      if (!$this->image_lib->resize()) {
          echo $this->image_lib->display_errors();
      }

      $this->image_lib->clear();


      $ext = pathinfo($filename, PATHINFO_EXTENSION);

      $FileName = str_replace('.'.$ext,'',$filename);


      return $FileName.'_thumb.'.$ext;

   }

    public function create_question($message = '')
    {
           //  echo "<pre>";                print_r($this->input->post());                exit();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('question', 'Question', 'required');
        $this->form_validation->set_rules('right_ans[]', 'At Least One Correct Answer', 'required');
        $this->form_validation->set_rules('ans_type', 'Answer Type', 'required');
        $this->form_validation->set_rules('options[1]', 'Option 1', 'required');
        $this->form_validation->set_rules('options[2]', 'Option 2', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->question_form('', $this->input->post('ques_id'));
        } else{
            $exam_id = $this->input->post('ques_id', TRUE);
            $exam_title = $this->input->post('mock_title', TRUE);

            $file_name = ''; $file_type = '';
            if ($_FILES['media']['name']) {
                $config['upload_path'] = './question-media/'.$this->input->post('media_type').'/';

                if ($this->input->post('media_type') == 'image') {
                    $config['allowed_types'] = 'gif|jpg|jpeg|png';
                }elseif ($this->input->post('media_type') == 'video') {
                    $config['allowed_types'] = 'mp4|ogg|webm';
                }elseif ($this->input->post('media_type') == 'audio') {
                    $config['allowed_types'] = 'application/ogg|mp3|wav';
                }

                $config['file_name'] = uniqid();
                $config['overwrite'] = TRUE;

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('media')) 
                {
                    $error = array('error' => $this->upload->display_errors('<div class="alert alert-danger">', '</div>'));
                    $this->session->set_flashdata('message',$error['error']);
                    redirect(base_url('admin_control/add_more_question/'.$this->input->post('ques_id')));
                } else {
                    $upload_data = $this->upload->data();
                    $file_name = $this->input->post('media_type').'/'.$upload_data['file_name'];
                    $file_type = $this->input->post('media_type');
                }
            }else if($this->input->post('media', TRUE)){
                $file_name = $this->input->post('media');
                $file_type = $this->input->post('media_type');
            }

            if ($this->admin_model->add_question($file_name, $file_type))
            {
                if ($this->input->post('done')) {                    
                    $message = '<div class="alert alert-success alert-dismissable">'
                            . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                            . 'Success! Set the time allowed to take ' . $exam_title . ' exam and the number of questions have to answer.'
                            . '</div>';
                    $this->set_time_n_random_ques_no($exam_id, $exam_title, $message);
                } else {
                    $message = '<div class="alert alert-success alert-dismissable">'
                            . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                            . 'Successfully Added!'
                            . '</div>';
                    $question_no = $this->input->post('ques_no') + 1;
                    $this->question_form($message, $exam_id, $exam_title, $question_no);
                }
            } else {
                $message = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>An ERROR occurred! Please try again.</div>';
                $this->question_form($message);
            }
        }
    }

    public function add_more_question($id = '', $message = '')
    {
        if (!is_numeric($id)) {
            show_404();
        }
        $mocks = $this->exam_model->get_mock_title($id);
//        if ((empty($mocks)) OR ($mocks->user_id != $this->session->userdata('user_id'))) {
//            $message = '<div class="alert alert-danger alert-dismissable">'
//                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
//                    . 'Only the author can add questions.'
//                    . '</div>';
//            $this->view_my_mocks($message);
//        } else {
            $mock_title = $mocks->title_name;
            $title_id = $mocks->title_id;
            $question_no = $this->exam_model->question_count_by_id($id) + 1;
            $this->question_form($message, $title_id, $mock_title, $question_no);
        //}
    }

    public function add_more_question_new_option($id = '', $message = '')
    {
        if (!is_numeric($id)) {
            show_404();
        }
        $mocks = $this->exam_model->get_mock_title($id);
//        if ((empty($mocks)) OR ($mocks->user_id != $this->session->userdata('user_id'))) {
//            $message = '<div class="alert alert-danger alert-dismissable">'
//                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
//                    . 'Only the author can add questions.'
//                    . '</div>';
//            $this->view_my_mocks($message);
//        } else {
            $mock_title = $mocks->title_name;
            $title_id = $mocks->title_id;
            $question_no = $this->exam_model->question_count_by_id($id) + 1;
            $this->question_new_form($message, $title_id, $mock_title, $question_no);
        //}
    }

    public function set_time_n_random_ques_no($id, $exam_title = '', $message = '')
    {
        $data = array();
        // $data['class'] = 22; // class control value left digit for main manu rigt digit for submenu
         $MockDetails = $this->db->where('title_id',$id)->get('exam_title')->row();
        if($MockDetails->batch_id==0)
        {
            $data['class'] = 22;   // class control value left digit for main manu rigt digit for submenu

        } else {

            $data['class'] = 102;   // class control value left digit for main manu rigt digit for submenu

        }
        $data['header'] = $this->load->view('header/admin_head', '', TRUE);
        $data['top_navi'] = $this->load->view('header/admin_top_navigation', $data, TRUE);
        $data['sidebar'] = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
        $data['ques_count'] = $this->exam_model->question_count_by_id($id);
        $data['message'] = $message;
        $data['exam_title'] = $exam_title;
        $data['exam_id'] = $id;
        $data['content'] = $this->load->view('form/set_time_n_random_ques_no', $data, TRUE);
        $data['footer'] = $this->load->view('footer/admin_footer', $data, TRUE);
        $this->load->view('dashboard', $data);
    }

    public function update_time_n_random_ques_no()
    {
        $ques_count = $this->input->post('ques_count', TRUE)+1;
        $data = array();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('duration', 'Time Duration', 'required|min_length[5]|max_length[8]');
        $this->form_validation->set_rules('random_ques', 'Total Random Question', 'required|integer|less_than['.$ques_count.']');
        if ($this->form_validation->run() == FALSE) {
            $this->set_time_n_random_ques_no($this->input->post('exam_id', TRUE),$this->input->post('exam_title', TRUE));
        } else {
            if ($this->admin_model->set_time_n_random_ques_no()) 
            {
                 $exam_detail = $this->db->where('title_id',$this->input->post('exam_id', TRUE))->get('exam_title')->row();

                $message = '<div class="alert alert-success alert-dismissable">'
                        . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                        . 'Successfully done!'
                        . '</div>';
                if($exam_detail->batch_id==0)
                {
                    $this->view_my_mocks('mock_test',$message);

                } else {
                    $this->view_my_mocks('live_mock_test',$message);
                }

            } else {
                $message = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>An ERROR occurred! Please try again.</div>';
                $this->set_time_n_random_ques_no($this->input->post('exam_id', TRUE),$this->input->post('exam_title', TRUE),$message);
            }
        }
    }

    public function activate_category($id)
    {
        if ($this->admin_model->activate_category($id)) {
            $message = '<div class="alert alert-success alert-dismissable">'
                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                    . 'Updated successfully!'
                    . '</div>';
            $this->view_categories($message);
        } else {
            $message = '<div class="alert alert-danger alert-dismissable">'
                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                    . 'An ERROR occurred! Please try again.</div>';
            $this->view_categories($message);
        }
    }

    public function update_category_name()
    {
        echo ($this->admin_model->update_category_name()) ? 'TRUE' : 'FALSE';
    }
    
     public function update_subcategory()
    {
        echo ($this->admin_model->update_subcategory_name()) ? 'TRUE' : 'FALSE';
    }

    public function update_mock_title()
    {
        echo ($this->admin_model->update_mock_title()) ? 'TRUE' : 'FALSE';
    }

    public function update_question()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('question', 'Question', 'required|min_length[8]');
        $exam_id = $this->input->post('exam_id', TRUE);
        if ($this->form_validation->run() == FALSE) {
            $message = '<div class="alert alert-danger alert-dismissable">'
                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                    . 'An ERROR occurred! ' . validation_errors()
                    . '</div>';
            $this->view_my_mock_detail($exam_id, $message);
        } elseif ($this->admin_model->update_question()) {
            $message = '<div class="alert alert-success alert-dismissable">'
                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                    . 'Updated successfully!'
                    . '</div>';
            $this->view_my_mock_detail($exam_id, $message);
        } else {
            $message = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>An ERROR occurred! Please try again.</div>';
            $this->view_my_mock_detail($exam_id, $message);
        }
    }

    public function update_answer($ques_id)
    {
        echo ($this->admin_model->update_answer($ques_id)) ? 'TRUE' : 'FALSE';
    }

       public function upload_image($message = '')
    {
            $form_info = array();
            if ($_FILES['user_photo']['name']) {
                $config['upload_path'] = './user-avatar/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['file_name'] = uniqid();
//                $config['overwrite'] = TRUE;
//                $config['max_size'] = '150';
//                $config['max_width'] = '1024';
//                $config['max_height'] = '768';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('user_photo')) {

                    $error = array('error' => $this->upload->display_errors('<div class="alert alert-danger">', '</div>'));
                    $this->session->set_flashdata('message',$error['error']);
                    redirect(base_url('admin_control'));
                } else {
                    $upload_data = $this->upload->data();

                     if ($this->session->userdata('user_id'))
                     {
                        $info = array();
                        $info['user_photo'] = $upload_data['file_name'];

                        if ($this->admin_model->update_photo($info)) 
                        {

                             $message = '<div class="alert alert-success alert-dismissable">'
                        . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                        . 'Your photo has been uploaded successfully.'
                        . '</div>';
                                        // $this->index($message);

                            $this->session->set_flashdata('message',$message);
                            redirect(base_url('admin_control'));
                        }
                     } else {

                         $message = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>An ERROR occurred! Please try again.</div>';
                            $this->index($message);
                     }

                }
            } else {

                 $message = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>An ERROR occurred! Please try again.</div>';
                $this->index($message);
            }
    }


    public function change_password()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('old-pass', 'Current Password', 'required|min_length[6]');
        $this->form_validation->set_rules('new-pass', 'New Password', 'required|min_length[6]|matches[re-new-pass]');
        $this->form_validation->set_rules('re-new-pass', 'Re-type New Password', 'required|min_length[6]');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $this->load->model('user_model');
            $data = $this->user_model->get_user_info();
            
            if ($data->user_id != $this->session->userdata('user_id')) {
                $message = '<div class="alert alert-danger alert-dismissable">'
                        . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                        . 'Your can\'t change other user\'s password!</div>';
                $this->index($message);
            } elseif (($data->user_pass != md5($this->input->post('old-pass')))) {
                $message = '<div class="alert alert-danger alert-dismissable">'
                        . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                        . 'Your old password doesn\'t match! Please try again.</div>';
                $this->index($message);
            } elseif (($data->user_pass == md5($this->input->post('new-pass')))) {
                $message = '<div class="alert alert-danger alert-dismissable">'
                        . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                        . 'You entered your old password! Please try different one.</div>';
                $this->index($message);
            } else {
                $info = array();
                $info['user_pass'] = md5($this->input->post('new-pass'));
                if ($this->admin_model->update_password($info)) {
                    $message = '<div class="alert alert-success alert-dismissable">'
                            . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                            . 'Password Changed successfully!'
                            . '</div>';
                    $this->index($message);
                } else {
                    $message = '<div class="alert alert-danger alert-dismissable">'
                            . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                            . 'An ERROR occurred! Please try again.</div>';
                    $this->index($message);
                }
            }
        }
    }

    public function update_profile_info()
    {
        echo ($this->admin_model->update_profile_info()) ? 'TRUE' : 'FALSE';
    }

    public function mute_category($id)
    {
        if (!is_numeric($id)) {
            return FALSE;
        }
        $user_role_id = $this->session->userdata('user_role_id');
        if ($user_role_id <= 3) {
            if ($this->admin_model->mute_category($id)) {
                $message = '<div class="alert alert-success alert-dismissable">'
                        . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                        . 'This category has muted successfully! No one can create new exam in this category.'
                        . '</div>';
                $this->view_categories($message);
            } else {
                $message = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>An ERROR occurred! Please try again.</div>';
                $this->view_categories($message);
            }
        } else {
            exit('<h2>You are not Authorised person to do this!</h2>');
        }
    }

    public function delete_category($id)
    {
        if (!is_numeric($id)) {
            return FALSE;
        }
        $user_role_id = $this->session->userdata('user_role_id');
        if ($user_role_id <= 3) {
            $key = $this->admin_model->delete_category_name($id);
            if ($key == 'deleted') {
                $message = '<div class="alert alert-success alert-dismissable">'
                        . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                        . 'The category has Deleted successfully!'
                        . '</div>';
                $this->view_categories($message);
            } elseif ($key == 'muted') {
                $message = '<div class="alert alert-success alert-dismissable">'
                        . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                        . 'This category have subcategories, so can\'t be deleted but muted successfully! No one can create new exam in this category.'
                        . '</div>';
                $this->view_categories($message);
            } else {
                $message = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>An ERROR occurred! Please try again.</div>';
                $this->view_categories($message);
            }
        } else {
            exit('<h2>You are not Authorised person to do this!</h2>');
        }
    }

 public function delete_subcategory($id)
    {
        if (!is_numeric($id)) {
            return FALSE;
        }
        $user_role_id = $this->session->userdata('user_role_id');
        if ($user_role_id <= 3) {
            $key = $this->admin_model->delete_subcategory_name($id);
            if ($key == 'deleted') {
                $message = '<div class="alert alert-success alert-dismissable">'
                        . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                        . 'The category has Deleted successfully!'
                        . '</div>';
                $this->view_subcategories($message);
            } else {
                $message = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>An ERROR occurred! Please try again.</div>';
                $this->view_subcategories($message);
            }
        } else {
            exit('<h2>You are not Authorised person to do this!</h2>');
        }
    }
    
    public function delete_sub_subcategory($id)
    {
        if (!is_numeric($id)) {
            return FALSE;
        }
        $user_role_id = $this->session->userdata('user_role_id');
        if ($user_role_id <= 4) {
            $key = $this->admin_model->delete_sub_subcategory_name($id);
            if ($key == 'deleted') {
                $message = '<div class="alert alert-success alert-dismissable">'
                        . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                        . 'The Sub Sub category has Deleted successfully!'
                        . '</div>';
                $this->view_sub_subcategories($message);
            } else {
                $message = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>An ERROR occurred! Please try again.</div>';
                $this->view_sub_subcategories($message);
            }
        } else {
            exit('<h2>You are not Authorised person to do this!</h2>');
        }
    }
    public function delete_exam($id)
    {
        if (!is_numeric($id)) {
            return FALSE;
        }
        $user_id = $this->session->userdata('user_id');
        $user_role_id = $this->session->userdata('user_role_id');

        $exam_detail = $this->db->where('title_id',$id)->get('exam_title')->row();

        if(isset($exam_detail->batch_id))
        {
                if($exam_detail->batch_id==0)
                {
                   $exam_type = 'mock_test';

                } else {
                     $exam_type = 'live_mock_test';
                }
        } else {

                $exam_type = '';

        }

        if ($user_role_id <= 2) {
            if ($this->admin_model->delete_exam_with_all_questions($id)) {
                $message = '<div class="alert alert-success alert-dismissable">'
                        . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                        . 'The Exam has Deleted successfully with all related questions and answers!'
                        . '</div>';
                $this->view_my_mocks($exam_type,$message);
            } else {
                $message = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>An ERROR occurred! Please try again.</div>';
                $this->view_my_mocks($exam_type,$message);
            }
        } else {
            $author = $this->exam_model->get_mock_by_id($id);
            if (empty($author) OR (($user_role_id != 3) && ($author->user_id != $user_id))) {
                exit('<h2>You are not Authorised person to do this!</h2>');
            }
            if ($this->admin_model->mute_exam($id)) {
                $message = '<div class="alert alert-success alert-dismissable">'
                        . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                        . 'The Exam is in-activated successfully! Admin will review the request.'
                        . '</div>';
                $this->view_my_mocks($exam_type,$message);
            } else {
                $message = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>An ERROR occurred! Please try again.</div>';
                $this->view_my_mocks($exam_type,$message);
            }
        }
    }

    public function delete_question($id)
    {
        if (!is_numeric($id)) {
            return FALSE;
        }
        $author = $this->exam_model->get_question_by_id($id);

        if($this->session->userdata('user_role_id')!=1)
        {
            if (empty($author) OR ($author->user_id != $this->session->userdata('user_id'))) {
                exit('<h2>You are not Authorised person to do this!</h2>');
            }
        }
        $ques_id = $author->exam_id;
        if ($this->admin_model->delete_question_with_answers($id)) {
            $message = '<div class="alert alert-success alert-dismissable">'
                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                    . 'Successfully Deleted!'
                    . '</div>';
            $this->view_my_mock_detail($ques_id, $message);
        } else {
            $message = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>An ERROR occurred! Please try again.</div>';
            $this->view_my_mock_detail($ques_id, $message);
        }
    }

    public function delete_answer($id)
    {
        if (!is_numeric($id)) {
            return FALSE;
        }
        $author = $this->exam_model->get_answer_by_id($id);
         if($this->session->userdata('user_role_id')!=1)
        {
            if (empty($author) OR ($author->user_id != $this->session->userdata('user_id'))) {
                exit('<h2>You are not Authorised person to do this!</h2>');
            }
        }
        $ques_id = $author->exam_id;
        if ($this->admin_model->delete_answer($id)) {
            $message = '<div class="alert alert-success alert-dismissable">'
                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                    . 'Successfully Deleted!'
                    . '</div>';
            $this->view_my_mock_detail($ques_id, $message);
        } else {
            $message = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>An ERROR occurred! Please try again.</div>';
            $this->view_my_mock_detail($ques_id, $message);
        }
     }

    public function edit_mock_detail($id, $message = '')
    {        
        if (!is_numeric($id)) show_404();

        $data = array();
        $data['class'] = 21; // class control value left digit for main manu rigt digit for submenu
        $data['header'] = $this->load->view('header/admin_head', '', TRUE);
        $data['top_navi'] = $this->load->view('header/admin_top_navigation', $data, TRUE);
        $data['sidebar'] = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
        $data['message'] = $message;
        $mock = $this->admin_model->get_mock_detail($id);
        $data['mock'] = $mock;
        if($this->session->userdata('user_role_id')==4){

            $data['categories'] = $this->exam_model->get_assign_categories();
        } else {
            $data['categories'] = $this->exam_model->get_categories();

        }
            $option = array();
            foreach ($data['categories'] as $category) 
            {
      
                    $option[$category->category_id] = $category->category_name;
                
            }
            
        $data['option'] = $option;

        $data['sub_categories'] = $this->exam_model->get_subcategories_by_catid($mock->category_id);
        
            $option2 = array();
            foreach ($data['sub_categories'] as $sub_cat) {
     
                    $option2[$sub_cat->id] = $sub_cat->sub_cat_name;
                
            }

        $data['option2'] = $option2;
        

       $data['sub_sub_categories'] =$this->exam_model->get_subsubcategories_by_catid($mock->sub_category_id);
            
                $option3 = array();
            foreach ($data['sub_sub_categories'] as $sub_sub_cat) {
            
                    $option3[$sub_sub_cat->id] = $sub_sub_cat->name;
                
            }
            $data['option3'] = $option3;
            

                                            //    print_r( $data['sub_sub_categories']); die;
        $data['batches'] = $this->db->where('status',1)->get('batch')->result();
        $data['exam_type']    = $this->uri->segment(3);

        $data['ques_count'] = $this->exam_model->question_count_by_id($id);
        $data['content'] = $this->load->view('form/edit_mock_detail', $data, TRUE);
        $data['footer'] = $this->load->view('footer/admin_footer', $data, TRUE);
        $this->load->view('dashboard', $data);
    }
    
    public function update_mock($id, $message = '')
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('category', 'Category', 'required|integer');
                $this->form_validation->set_rules('sub_category', 'Sub Category', 'required|integer');
        $this->form_validation->set_rules('sub_sub_category', 'Sub Sub Category', 'required|integer');

        $this->form_validation->set_rules('mock_title', 'Mock Title', 'required|min_length[3]');
        $this->form_validation->set_rules('mock_syllabus', 'Syllabus', 'required');
        $this->form_validation->set_rules('duration', 'Time Duration', 'required|min_length[5]|max_length[8]');
        $this->form_validation->set_rules('random_ques', 'Total Random Question', 'required|integer');
        $this->form_validation->set_rules('passing_score', 'Passing Score', 'required|integer|less_than[100]');
        if ($this->form_validation->run() == FALSE) {
            $this->mock_form();
        } else {
            $form_info = array();

            // print_r($_FILES['feature_image']); die;
            if ($_FILES['feature_image']['name']) {
                $config['upload_path'] = './exam-images/';
                $config['allowed_types'] = '*';
                $config['file_name'] = uniqid();
                $config['overwrite'] = TRUE;
                $config['max_size'] = '3048';
//                $config['max_width'] = '1024';
//                $config['max_height'] = '768';
//                print_r($_FILES['feature_image']['name']); die;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('feature_image')) {
                    $error = array('error' => $this->upload->display_errors('<div class="alert alert-danger">', '</div>'));
                    $this->session->set_flashdata('message',$error['error']);
                    redirect(base_url('admin_control/edit_mock_detail/'.$id));
                } else {
                    $upload_data = $this->upload->data();

                    $Thumbnail =  $this->resizeImage($upload_data['file_name']); 

                    $title_id = $this->admin_model->update_mock($id,$Thumbnail);
                }
            }else{
                // $title_id = $this->admin_model->add_mock_title();
                $title_id = $this->admin_model->update_mock($id);
            }

            if ($title_id) {

                $mockDetails = $this->db->where('title_id',$id)->get('exam_title')->row();

                $message = '<div class="alert alert-success alert-dismissable">'
                        . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                        . 'Exam updated successfully.'
                        . '</div>';
                $this->session->set_flashdata('message',$message);

                if($mockDetails->batch_id==0)
                {
                    redirect(base_url('mocks/mock_test'));
                } else {
                    redirect(base_url('mocks/live_mock_test'));
                }
            } else {
                $message = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>An ERROR occurred! Please try again.</div>';
                redirect(base_url('admin_control/edit_mock_detail/'.$id));
            }
        }

    }
    public function get_subcategories_ajax($id)
    {
        $sub_cat = $this->admin_model->get_subcategories_by_cat_id($id);
        $str = '<option value="">Select Sub Category</option>';
        foreach ($sub_cat as $value) {
            $str.='<option value="'.$value->id.'">'.$value->sub_cat_name.'</option>';
        }

        echo $str;
    }
    
     public function get_sub_subcategories_ajax($id)
    {
        $sub_cat = $this->admin_model->get_sub_subcategories_by_cat_id($id);
        $str = '<option value="">Select Sub Sub Category</option>';
        foreach ($sub_cat as $value) {
            $str.='<option value="'.$value->id.'">'.$value->name.'</option>';
        }

        echo $str;
    }

    public function get_student_detail($id=null) {
        if($id != null) {
            $batch_query = $this->db->where('id',$id)->get('batch');
            if($batch_query->num_rows() > 0) {
                $batch_detail = $batch_query->row();
                $students = explode(',',$batch_detail->students);
            }
        } 
    	$searchTerm = $_GET['q']; 
    	$this->db->select('*');
		$this->db->from('users');
		$this->db->where('user_role_id',5);
        if($id != null) {
           $this->db->where_not_in('user_id',$students);
        }   
		$this->db->like('user_email', $searchTerm,'both');
		$this->db->limit(20);  
		$query = $this->db->get();
		$skillData = array(); 
		if($query->num_rows() > 0){ 
			$result = $query->result();
		    foreach($result as $key) {
		    	$skillData[] = ['id' => $key->user_id,
		                        'name' => $key->user_email.'-'.$key->user_name
		                       ];
		    }
		}
		echo json_encode($skillData); 
    } 

    public function student_batch_request($message = '')
    {
        if ($this->session->userdata('user_role_id') == 4) {
            if (!$this->session->userdata('log')) {
                $this->session->set_userdata('back_url', current_url());
                redirect(base_url('login_control'));
            }
            $userId = $this->session->userdata('user_id');
            $data = array();
            $data['class']  = 92; // class control value left digit for main manu rigt digit for submenu
            $data['header'] = $this->load->view('header/admin_head', '', TRUE);
            $data['top_navi'] = $this->load->view('header/admin_top_navigation', '', TRUE);
            $data['sidebar']  = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
            $data['message']  = $message;
            //get batch detail
            $data['request_batches'] = $this->admin_model->get_request_batches($userId);
            $data['content'] = $this->load->view('content/view_student_batch_request', $data, TRUE);
            $data['footer'] = $this->load->view('footer/admin_footer', '', TRUE);
            $this->load->view('dashboard', $data);
        }    
    }

    public function accept_batch() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') { 
            $id = $this->input->post('id');
            $userId = $this->input->post('student_id');
            $query = $this->db->where('id',$id)->get('batch');
            if($query->num_rows() > 0) {
                $detail = $query->row();
                $explode_student = explode(',',$detail->student_request);
                $all_students = $detail->students;
                if(in_array($userId, $explode_student)) {
                    $join_students = $detail->join_students;
                    if($join_students != '') {
                        $explode_join_students = explode(',',$detail->join_students);
                        if(!in_array($userId, $explode_join_students)) {
                            $merge_join = $join_students.",".$userId;
                            $merge_join_all = $all_students.",".$userId;
                        } else {
                             $merge_join = $join_students;
                             $merge_join_all = $all_students.",".$userId;
                        }
                    } else {
                        $merge_join = $userId;
                        $merge_join_all = $all_students.",".$userId;
                    }
                    if (($key = array_search($userId, $explode_student)) !== false) {
					    unset($explode_student[$key]);
					}
					if(count($explode_student) > 0) {
						$implode_student = implode(',',$explode_student);
					} else {
						$implode_student = '';
					}
                    $this->db->where('id',$id)->update('batch',['join_students' => $merge_join,'student_request' => $implode_student,'students'=>$merge_join_all]);
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

    public function decline_batch() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') { 
            $id = $this->input->post('id');
            $userId = $this->input->post('student_id');
            $query  = $this->db->where('id',$id)->get('batch');
            if($query->num_rows() > 0) {
                $detail = $query->row();
                $explode_student = explode(',',$detail->student_request);
                $all_students = $detail->students;
                if(in_array($userId, $explode_student)) {
                    $join_students = $detail->decline_students;
                    $decline_student_status = $detail->decline_student_status;
                    if($join_students != '') {
                        $explode_join_students = explode(',',$detail->decline_students);
                        if(!in_array($userId, $explode_join_students)) {
                            $merge_join = $join_students.",".$userId;
                            $merge_decline_status = $decline_student_status.",".$userId."-T";
                            $merge_join_all = $all_students.",".$userId;
                        } else {
                             $merge_join = $join_students;
                             $merge_decline_status = $decline_student_status;
                             $merge_join_all = $all_students.",".$userId;
                        }
                    } else {
                        $merge_join = $userId;
                        $merge_decline_status = $userId."-T";
                        $merge_join_all = $all_students.",".$userId;
                    }
                    if (($key = array_search($userId, $explode_student)) !== false) {
					    unset($explode_student[$key]);
					}
					if(count($explode_student) > 0) {
						$implode_student = implode(',',$explode_student);
					} else {
						$implode_student = '';
					}
                    $this->db->where('id',$id)->update('batch',['decline_students' => $merge_join,'decline_student_status'=>$merge_decline_status,'student_request' => $implode_student,'students'=>$merge_join_all]);
                    $res['status'] = true;
                    $res['message'] = 'This student is decline on this batch successfully';
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

    public function batch_students($id) {
    	if ($this->session->userdata('user_role_id') == 4) {
            if (!$this->session->userdata('log')) {
                $this->session->set_userdata('back_url', current_url());
                redirect(base_url('login_control'));
            }
            $userId = $this->session->userdata('user_id');
            $data = array();
            $data['class']  = 92; // class control value left digit for main manu rigt digit for submenu
            $data['header'] = $this->load->view('header/admin_head', '', TRUE);
            $data['top_navi'] = $this->load->view('header/admin_top_navigation', '', TRUE);
            $data['sidebar']  = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
            $data['message']  = $message;
            //get batch detail
            $data['request_batches'] = $this->admin_model->get_student_batches($id);
            $data['content'] = $this->load->view('content/view_batch_allstudents', $data, TRUE);
            $data['footer'] = $this->load->view('footer/admin_footer', '', TRUE);
            $this->load->view('dashboard', $data);
        }    
    }

    public function remove_student_batch() {
         if ($this->input->server('REQUEST_METHOD') === 'POST') { 
            $id = $this->input->post('id');
            $userId = $this->input->post('student_id');
            $query  = $this->db->where('id',$id)->get('batch');
            if($query->num_rows() > 0) {
                $detail = $query->row();
                $explode_student = explode(',',$detail->join_students);
                $all_students = $detail->students;
                if(in_array($userId, $explode_student)) {

                    if (($key = array_search($userId, $explode_student)) !== false) {
                        unset($explode_student[$key]);
                    }
                    if(count($explode_student) > 0) {
                        $implode_student = implode(',',$explode_student);
                    } else {
                        $implode_student = '';
                    }

                    $join_students = explode(',',$detail->students);
                    if (($key1 = array_search($userId, $join_students)) !== false) {
                        unset($join_students[$key1]);
                    }
                    if(count($join_students) > 0) {
                        $implode_student1 = implode(',',$join_students);
                    } else {
                        $implode_student1 = '';
                    }

                    $this->db->where('id',$id)->update('batch',['join_students' => $implode_student,'students' => $implode_student1]);

                    $res['status'] = true;
                    $res['message'] = 'This student is deleted on this batch successfully';

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

    public function bulk_questions($id, $message = '')
    {
        if (!is_numeric($id)) {
            show_404();
        }
        $data = array();
        $data['active']   = 10;
        $data['class']    = 96;   // class control value left digit for main manu rigt digit for submenu
        $data['header']   = $this->load->view('header/admin_head', '', TRUE);
        $data['top_navi'] = $this->load->view('header/admin_top_navigation', $data, TRUE);
        $data['sidebar']  = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
        $data['message']  = $message;
        $data['mock_title'] = $this->exam_model->get_mock_by_id($id);
        if (!(empty($data['mock_title'])) && (($this->session->userdata('user_role_id') == 1 || $this->session->userdata('user_role_id') == 4) OR ($data['mock_title']->user_id == $this->session->userdata('user_id')))) {

                $data['questions'] = $this->exam_model->get_questions($id);
                $data['content']   = $this->load->view('form/bulk_questions', $data, TRUE);
                $data['footer']    = $this->load->view('footer/admin_footer', $data, TRUE);
            $this->load->view('dashboard', $data);
        } else {
            show_404();
        }
    } 

    public function importquestions($id)
    {
        if($id)
        {
            $this->session->set_userdata('exam_id', $id);
        }
        
        $data = array();
        $data['title'] = 'Import Excel Sheet | TechArise';
        $data['breadcrumbs'] = array('Home' => '#');
        // Load form validation library
        $this->load->library('form_validation');
        $this->form_validation->set_rules('fileURL', 'Upload File', 'callback_checkFileValidations');
        if ($this->form_validation->run() == false) {

            $this->session->set_flashdata('message', validation_errors());

            redirect('mock_detail/' . $id);
            
        } else {
            // If file uploaded

            if (!empty($_FILES['fileURL']['name'])) {
                // get file extension
                $extension = pathinfo($_FILES['fileURL']['name'], PATHINFO_EXTENSION);

                if ($extension == 'csv') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
                } elseif ($extension == 'xlsx') {

                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                } else {

                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                }

                // file path
                $spreadsheet = $reader->load($_FILES['fileURL']['tmp_name']);
                $allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
                
                // array Count
                $arrayCount = count($allDataInSheet);
                $flag = 0;
                $createArray = array('sr_no', 'question_title', 'Option_1', 'Option_2', 'Option_3', 'Option_4', 'answer');

                $makeArray = array('sr_no' => 'sr_no', 'question_title' => 'question_title', 'Option_1' => 'Option_1', 'Option_2' => 'Option_2', 'Option_3' => 'Option_3', 'Option_4' => 'Option_4', 'answer' => 'answer');

                $SheetDataKey = array();
                foreach ($allDataInSheet as $dataInSheet) {
                    foreach ($dataInSheet as $key => $value) {
                        if (in_array(trim($value), $createArray)) {
                            $value = preg_replace('/\s+/', '', $value);
                            $SheetDataKey[trim($value)] = $key;
                        }
                    }
                }

                $dataDiff = array_diff_key($makeArray, $SheetDataKey);
                if (empty($dataDiff)) {
                    $flag = 1;
                }
                // match excel sheet column
                if ($flag == 1) {
                    for ($i = 2; $i <= $arrayCount; $i++) {
                        $sr_no = $SheetDataKey['sr_no'];
                        $question_title = $SheetDataKey['question_title'];
                        $Option_1 = $SheetDataKey['Option_1'];
                        $Option_2 = $SheetDataKey['Option_2'];
                        $Option_3 = $SheetDataKey['Option_3'];
                        $Option_4 = $SheetDataKey['Option_4'];
                        $answer = $SheetDataKey['answer'];

                        $sr_no = filter_var(trim($allDataInSheet[$i][$sr_no]), FILTER_SANITIZE_STRING);
                        $question_title = filter_var(trim($allDataInSheet[$i][$question_title]), FILTER_SANITIZE_STRING);
                        $Option_1       = filter_var(trim($allDataInSheet[$i][$Option_1]), FILTER_SANITIZE_STRING);
                        $Option_2       = filter_var(trim($allDataInSheet[$i][$Option_2]), FILTER_SANITIZE_STRING);
                        $Option_3       = filter_var(trim($allDataInSheet[$i][$Option_3]), FILTER_SANITIZE_STRING);
                        $Option_4       = filter_var(trim($allDataInSheet[$i][$Option_4]), FILTER_SANITIZE_STRING);
                        $answer         = filter_var(trim($allDataInSheet[$i][$answer]), FILTER_SANITIZE_STRING);

                        $fetchData[] = array('sr_no' => $sr_no, 'question_title' => $question_title, 'Option_1' => $Option_1, 'Option_2' => $Option_2, 'Option_3' => $Option_3, 'Option_4' => $Option_4, 'answer' => $answer);
                    }

                    $NotInsertedDetails = array();
                    foreach ($fetchData as $row) {
                        if ($row['question_title'] && $row['answer']) {
                            // Prepare data for DB insertion
                            $OptionsArray = array();
                            for ($i = 1; $i <= 4; $i++) {
                                $OptionsArray[] = $row['Option_' . $i];
                            }

                            $FilterOptions = array_filter($OptionsArray);

                            $MultiAnswers = explode(',', $row['answer']);


                            $searchString = ',';

                            if (strpos($row['answer'], $searchString) !== false) {
                                $questiondata = array(
                                    'question' => $row['question_title'],
                                    'exam_id' => $id,
                                    'feedback' => $row['feedback'],
                                    'option_type' => 'Checkbox',
                                );

                                $QuestionId = $this->admin_model->QuestionInsert($questiondata);


                                for ($M = 0; $M < count($FilterOptions); $M++) {
                                    $Mk = $M + 1;
                                    if (in_array($Mk, $MultiAnswers)) {
                                        $ANSWER =  1;
                                    } else {

                                        $ANSWER =  0;
                                    }

                                    $MultiOptions = array(
                                        'answer' => $OptionsArray[$M],
                                        'ques_id' => $QuestionId,
                                        'right_ans' => $ANSWER,
                                    );

                                    $this->db->insert('answers', $MultiOptions);
                                }
                            } else {

                                $questiondata = array(
                                    'question' => $row['question_title'],
                                    'exam_id' => $id,
                                    'option_type' => 'Radio',
                                );

                                $QuestionId = $this->admin_model->QuestionInsert($questiondata);


                                for ($j = 0; $j < count($FilterOptions); $j++) {
                                    $k = $j + 1;

                                    $optiondata = array(
                                        'answer' => str_replace('&#39;', '', $OptionsArray[$j]),
                                        'ques_id' => $QuestionId,
                                        'right_ans' => $this->GetAnswers($row['answer'], $k),
                                    );

                                    $QuestionOptionsInsertion = $this->db->insert('answers', $optiondata);
                                }
                            }
                        } else {

                            $NotInsertedDetails[] =  $row['sr_no'];
                        }
                    }
                    $NotInsertedData = implode(',', $NotInsertedDetails);
                    if (!empty($NotInsertedDetails)) 
                    {

                        $successMsg = '<div class="alert alert-danger alert-dismissable">'
                            . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                            . 'Questions imported sucessfully and some rows are not inserted.'
                            . '(' . $NotInsertedData . ') Please fill correct details.'
                            . '</div>';

                        $this->session->set_flashdata('message', $successMsg);
                        
                        if($this->session->userdata('exam_id'))
                        {
                            redirect('admin_control/set_time_n_random_ques_no/' . $this->session->userdata('exam_id'));
                        }
                        
                        
                    } else {

                        $successMsg = '<div class="alert alert-success alert-dismissable">'
                            . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                            . 'Questions imported sucessfully.'
                            . '</div>';

                        $this->session->set_flashdata('message', $successMsg);
                        
                         if($this->session->userdata('exam_id'))
                        {
                            redirect('admin_control/set_time_n_random_ques_no/' . $this->session->userdata('exam_id'));
                        }

                    }
                } else {

                    $successMsg = '<div class="alert alert-danger alert-dismissable">'
                        . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                        . 'Please import correct file, did not match excel sheet column.'
                        . '</div>';

                    $this->session->set_flashdata('message', $successMsg);
                    
                     if($this->session->userdata('exam_id'))
                        {
                            redirect('admin_control/set_time_n_random_ques_no/' . $this->session->userdata('exam_id'));
                        }
                }
                
                redirect('mock_detail/' . $id);
            }
        }
    }

    private function GetAnswers($answers, $k)
    {
        return $answers == $k ? '1' : '0';
    }

    // checkFileValidation
    public function checkFileValidations($string)
    {
        $file_mimes = array(
            'text/x-comma-separated-values',
            'text/comma-separated-values',
            'application/octet-stream',
            'application/vnd.ms-excel',
            'application/x-csv',
            'text/x-csv',
            'text/csv',
            'application/csv',
            'application/excel',
            'application/vnd.msexcel',
            'text/plain',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        );

        if (isset($_FILES['fileURL']['name'])) {
            $arr_file = explode('.', $_FILES['fileURL']['name']);
            $extension = end($arr_file);
            if (($extension == 'xlsx' || $extension == 'xls' || $extension == 'csv') && in_array($_FILES['fileURL']['type'], $file_mimes)) {
                return true;
            } else {


                $this->form_validation->set_message('checkFileValidations', '<div class="alert alert-danger alert-dismissable">'
                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>Please choose only csv & excel files only.</div>');
                return false;
            }
        } else {


            $this->form_validation->set_message('checkFileValidations', '<div class="alert alert-danger alert-dismissable">'
                . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>Please choose a file.</div>');
            return false;
        }
    } 

    public function add_questions() {
        $exam_id = $this->input->post('exam_id');
        $selected_values = explode(',',$this->input->post('questions'));
        foreach($selected_values as $key => $value) {
           
                $detail = $this->db->where('ques_id',$value)->get('questions')->row();
                $count = $this->db->where('exam_id',$exam_id)->where('question',$detail->question)->get('questions')->num_rows();
                if($count == 0) {
                    $InsertData['question'] = $detail->question;
                    $InsertData['exam_id'] = $exam_id;
                    $InsertData['option_type'] = $detail->option_type;
                    $InsertData['media_type'] = $detail->media_type;
                    $InsertData['media_link'] = $detail->media_link;
                    $InsertId = $this->admin_model->QuestionInsert($InsertData);
                    $ans = $this->db->where('ques_id',$value)->get('answers')->result();
                    foreach($ans as $key1) {
                        $InsData['answer'] = $key1->answer;
                        $InsData['ques_id'] = $InsertId;
                        $InsData['right_ans'] = $key1->right_ans;
                        $InsData['new'] = $key1->new;

                        $this->db->insert('answers',$InsData);
                    }
                }      
        }
        $res['status'] = true;
        $res['message'] = "Updates successfully";
        echo json_encode($res);
        exit();
    }
     

}
