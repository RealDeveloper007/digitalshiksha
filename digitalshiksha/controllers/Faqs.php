<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
require APPPATH . '/core/MS_Controller.php';
class Faqs extends MS_Controller
{
	 public function __construct() 
    {
        parent::__construct();
        
        $this->load->model('faq_model');
    }
	
	
     public function index($message = '')
    {		

         if(!$this->session->userdata('log')) {
            $this->session->set_userdata('back_url', current_url());
            redirect(base_url('login'));
        }

        $data = array();
        $data['class'] = 34; // class control value left digit for main manu rigt digit for submenu
        $data['header'] = $this->load->view('header/admin_head', '', TRUE);
        $data['top_navi'] = $this->load->view('header/admin_top_navigation', $data, TRUE);
        $data['sidebar'] = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
        $data['message'] = $message;
		$data['faqs'] = $this->faq_model->get_faqs();
        $data['content'] = $this->load->view('admin/view_all_faqs', $data, TRUE);
        $data['footer']  = $this->load->view('footer/admin_footer', $data, TRUE);
        $this->load->view('dashboard', $data);
    }
	
	public function add($message = '')
	{			
		
	  if(!$this->session->userdata('log')) {
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
        $data['content'] = $this->load->view('form/faqs_form', $data, TRUE);
        $this->load->view('dashboard', $data);			
	}
	
	public function save()
    {		
        $data = array();
        $this->load->library('form_validation');
		$this->form_validation->set_rules('faq_ques', 'FAQ Questions', 'required');
        $this->form_validation->set_rules('faq_ans', 'FAQ Answers', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->add();
        } else {
            if ($this->session->userdata['user_role_id'] <= 3) {
                if ($this->faq_model->save()) {
                    $message = '<div class="alert alert-success alert-dismissable">'
                            . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                            . 'FAQ added successfully!'
                            . '</div>';
                        $this->index($message);
                } else {
                    $message = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>An ERROR occurred! Please try again.</div>';
                    $this->add($message);
                }
            } else {
                exit('<h2>You are not Authorised person to do this!</h2>');
            }
        }
    }
	
	public function edit($id = '' , $message = '')
    {
        if (!$this->session->userdata('log')) {
            $this->session->set_userdata('back_url', current_url());
            redirect(base_url('admin'));
        }
        if (!is_numeric($id)) return FALSE;
        $data = array();
        $data['class'] = 34; // class control value left digit for main manu rigt digit for submenu
        $data['header'] = $this->load->view('header/admin_head', '', TRUE);
        $data['top_navi'] = $this->load->view('header/admin_top_navigation', $data, TRUE);
        $data['sidebar'] = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
        $data['faq'] = $this->faq_model->get_faq_by_id($id);
        $data['message'] = $message;
        $data['content'] = $this->load->view('form/faq_edit_form', $data, TRUE);
        $data['footer'] = $this->load->view('footer/admin_footer', $data, TRUE);
        $this->load->view('dashboard', $data);
    }
	
	
	
	public function update($id = '')
    {
        if (!is_numeric($id)) return FALSE;

        if ($this->faq_model->update($id)) {
            $message = '<div class="alert alert-success alert-dismissable">'
                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                    . 'FAQ updated successfully!'
                    . '</div>';
                $this->index($message);
        } else {
            $message = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>An ERROR occurred! Please try again.</div>';
            $this->edit($id, $message);
        }
    }  


     public function delete($id)
    {
        if (!$this->session->userdata('log')) {
            $this->session->set_userdata('back_url', current_url());
            redirect(base_url('admin'));
        }
        if (!is_numeric($id)) return FALSE;
        
        if ($this->faq_model->delete($id)) {
            $message = '<div class="alert alert-success alert-dismissable">'
                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                    . ' Record Successfully Deleted!'
                    . '</div>';
            $this->index($message);
        } else {
            $message = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>An ERROR occurred! Please try again.</div>';
            $this->index($message);
        }
    }
}