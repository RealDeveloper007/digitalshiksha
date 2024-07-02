<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
require 'vendor/autoload.php';

require APPPATH . '/core/MS_Controller.php';
require APPPATH . '/libraries/MathsCaptcha.php';

class Blog extends MS_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('blog_model');
        $this->load->library('pagination');
    }

    public function index()
    {

        ///// Pagination config
        $config['base_url'] = base_url('digital-shiksha-search-engine');
        $config['total_rows'] = $this->db->count_all('blog');
        
                
        if ($_GET['page']) {
            $page = $_GET['page'];
        } else {
            $page = 0;
        }
        

        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
        // $config['reuse_query_string'] = true;
        $config['per_page'] = 30;
        // $config['num_links'] = count($this->db->count_all('blog'));
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['prev_link'] = '&laquo;';
        $config['next_link'] = '&raquo;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        

        
         $str_links = $this->pagination->create_links();
        // $data["links"] = explode('&nbsp;', $str_links);
        
                // print_r($data["links"]);  die;

        


        // $row = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data = array();
        $data['header'] = $this->load->view('header/head', '', TRUE);
        $data['top_navi'] = $this->load->view('header/top_navigation', $data, TRUE);
        if ($_GET['blog_name']) {
            $data['blogs'] = $this->blog_model->get_blogs($config['per_page'], $config['per_page'] * $page, $_GET['blog_name']);
        } else {
            $data['blogs'] = $this->blog_model->get_blogs($config['per_page'], $config['per_page'] * $page);
        }
        $data['no_contact_form'] = TRUE;
        $data['Popular_posts'] = $this->blog_model->get_all_popular_posts($data['blogs'][0]->blog_id);
        $data['content'] = $this->load->view('content/blog_page', $data, TRUE);
        $data['footer'] = $this->load->view('footer/footer', $data, TRUE);
        $this->load->view('home', $data);
    }

    public function view_all($message = '')
    {
        if (!$this->session->userdata('log')) {
            $this->session->set_userdata('back_url', current_url());
            redirect(base_url('admin'));
        }

        $data = array();
        $data['class'] = 71; // class control value left digit for main manu rigt digit for submenu
        $data['header'] = $this->load->view('header/admin_head', '', TRUE);
        $data['top_navi'] = $this->load->view('header/admin_top_navigation', $data, TRUE);
        $data['sidebar'] = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
        $data['message'] = $message;

        $config = array();

        if($this->uri->segment(3))
        {
            $page = $this->uri->segment(3);
        } else {
           $page = 0; 
        }

        $countresult = count($this->blog_model->get_all());
        
        $config['per_page']         = 10;
        $config["base_url"]         = base_url() . "blog/view_all";
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
        
        $getPageNo = 1 + ($page / 10);
         $data['count'] = ($getPageNo == 0 ? 1 : (($getPageNo - 1) * $config["per_page"] + 1));

        $str_links = $this->pagination->create_links();
        $data['no_contact_form'] = TRUE;

        // print_r($str_links); die;
        $data["links"] = explode('&nbsp;',$str_links );
        $data['blogs'] = $this->blog_model->get_blogs($config["per_page"], $page);

        $data['content'] = $this->load->view('admin/view_all_blog', $data, TRUE);
        $data['footer'] = $this->load->view('footer/admin_footer', $data, TRUE);
        $this->load->view('dashboard', $data);
    }

    public function post($id = '')
    {

        // echo "ss";
        // die;

        $data = array();
        $data['post'] = $this->blog_model->get_post_details_by_slug($id);


        $data['header'] = $this->load->view('header/head', $data, TRUE);
        $data['top_navi'] = $this->load->view('header/top_navigation', $data, TRUE);
        $data['post_comments'] = $this->blog_model->get_post_comments($data['post']->blog_id);

        $data['Popular_posts'] = $this->blog_model->get_all_popular_posts($data['post']->blog_id);
        $data['no_contact_form'] = TRUE;


        $data['content'] = $this->load->view('content/blog_post_single', $data, TRUE);
        $data['footer'] = $this->load->view('footer/footer', $data, TRUE);
        $this->load->view('home', $data);
    }

    public function find()
    {
        $_POST = $_GET;
        $this->load->library('form_validation');

        $this->form_validation->set_rules('keyword', 'Search keyword', 'required|min_length[3]|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', validation_errors('<div class="alert alert-warning">', '</div>'));
            redirect(base_url('blog'));
        } else {
            $data = array();
            $data['header'] = $this->load->view('header/head', '', TRUE);
            $data['top_navi'] = $this->load->view('header/top_navigation', $data, TRUE);
            $data['blogs'] = $this->blog_model->find();
            $data['content'] = $this->load->view('content/blog_page', $data, TRUE);
            $data['footer'] = $this->load->view('footer/footer', $data, TRUE);
            $this->load->view('home', $data);
        }
    }

    public function add($message = '')
    {
        if (!$this->session->userdata('log')) {
            $this->session->set_userdata('back_url', current_url());
            redirect(base_url('admin'));
        }
        $data = array();
        $data['class'] = 72; // class control value left digit for main manu rigt digit for submenu
        $data['header'] = $this->load->view('header/admin_head', '', TRUE);
        $data['top_navi'] = $this->load->view('header/admin_top_navigation', $data, TRUE);
        $data['sidebar'] = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
        $data['message'] = $message;
        $data['footer'] = $this->load->view('footer/admin_footer', $data, TRUE);
        $data['content'] = $this->load->view('form/blog_form', $data, TRUE);
        $this->load->view('dashboard', $data);
    }

    public function save()
    {
        $data = array();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('blog_title', 'Blog Title', 'required');
        $this->form_validation->set_rules('blog_slug', 'Blog Slug', 'required');
        $this->form_validation->set_rules('post_descr', 'Content ', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->add();
        } else {

            if ($this->blog_model->save()) {
                $message = '<div class="alert alert-success alert-dismissable">'
                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                    . 'Post added successfully!'
                    . '</div>';
                // $this->view_all($message);
                redirect(base_url('blog/view_all'));
            } else {
                $message = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>An ERROR occurred! Please try again.</div>';
                $this->add($message);
            }
        }
    }

    public function edit($id = '', $message = '')
    {
        if (!$this->session->userdata('log')) {
            $this->session->set_userdata('back_url', current_url());
            redirect(base_url('admin'));
        }
        if (!is_numeric($id)) return FALSE;
        $data = array();
        $data['class'] = 72; // class control value left digit for main manu rigt digit for submenu
        $data['header'] = $this->load->view('header/admin_head', '', TRUE);
        $data['top_navi'] = $this->load->view('header/admin_top_navigation', $data, TRUE);
        $data['sidebar'] = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
        $data['blog'] = $this->blog_model->get_blog_by_id($id);
        $data['message'] = $message;
        $data['content'] = $this->load->view('form/blog_edit_form', $data, TRUE);
        $data['footer'] = $this->load->view('footer/admin_footer', $data, TRUE);
        $this->load->view('dashboard', $data);
    }

    public function update($id = '')
    {
        if (!is_numeric($id)) return FALSE;

        // print_r($this->input->post()); die;

        if ($this->blog_model->update($id)) {
            $message = '<div class="alert alert-success alert-dismissable">'
                . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                . 'Post updated successfully!'
                . '</div>';
            //$this->view_all($message);
            redirect(base_url('blog/view_all'));
        } else {
            $message = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>An ERROR occurred! Please try again.</div>';
            $this->edit($id, $message);
        }
    }

    public function delete($id)
    {
        if (!is_numeric($id)) return FALSE;

        if ($this->blog_model->delete($id)) {
            $message = '<div class="alert alert-success alert-dismissable">'
                . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                . 'Successfully Deleted!'
                . '</div>';
            $this->view_all($message);
        } else {
            $message = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>An ERROR occurred! Please try again.</div>';
            $this->view_all($message);
        }
    }

    public function comment()
    {
        if (!$this->session->userdata('log')) {
            $this->session->set_userdata('back_url', current_url());
            redirect(base_url('login_control'));
        }
        $this->blog_model->save_comment();
        redirect(base_url('blog/post/' . $this->input->post('blog_id', TRUE)));
    }
}
