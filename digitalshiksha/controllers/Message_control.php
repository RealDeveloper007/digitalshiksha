<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
require APPPATH . '/core/MS_Controller.php';

class Message_control extends MS_Controller
{
        public $CI = NULL;

    public function __construct()
    {
        parent::__construct();
        $this->CI = & get_instance();
        $this->load->model('admin_model');
        if (!$this->session->userdata('log')) {
            redirect(base_url('login_control'));
        }
        $this->load->library("pagination");
        $this->load->helper('url');

    }

    public function index($message = '')
    {
        $data = array();
        $data['class'] = 40; // class control value left digit for main manu rigt digit for submenu
        $data['header'] = $this->load->view('header/admin_head', '', TRUE);
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


      //  echo $this->uri->segment(2); 

        $countresult = $this->admin_model->count_get_messages(); 
        
        $config['per_page']         = 10;
        $config["base_url"]         = base_url() . "message_control";
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
        
        $str_links = $this->pagination->create_links();

        // print_r($str_links); die;
        $data["links"] = explode('&nbsp;',$str_links );

        $data['messages'] = $this->admin_model->get_messages($config["per_page"], $page);

        $data['modal'] = $this->load->view('modals/email_compose', '', TRUE);
        $data['content'] = $this->load->view('admin/view_messages', $data, TRUE);
        $data['footer'] = $this->load->view('footer/admin_footer', $data, TRUE);
        $this->load->view('dashboard', $data);
    }

     public function replies($id = '')
    {
        $reply =  $this->admin_model->get_replies($id);

        return isset($reply[0]->replied_messages) ? $reply[0]->replied_messages : 'Not replied yet';
    }

    public function open_message($id = '', $message = '')
    {
        $data = array();
        $data['class'] = 36; // class control value left digit for main manu rigt digit for submenu
        $data['header'] = $this->load->view('header/admin_head', '', TRUE);
        $data['top_navi'] = $this->load->view('header/admin_top_navigation', $data, TRUE);
        $data['sidebar'] = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
        $data['message'] = $message;
        $data['message'] = $this->admin_model->open_message($id);
        $data['msg_replies'] = $this->admin_model->get_replies($data['message']->message_id);
        $data['content'] = $this->load->view('admin/open_messages', $data, TRUE);
        $data['footer'] = $this->load->view('footer/admin_footer', $data, TRUE);
        $this->load->view('dashboard', $data);
    }

    public function reply_message($id, $message = '')
    {
        if ((!is_numeric($id))) {
            return FALSE;
        }
        $data = array();
        $data['class'] = 36; // class control value left digit for main manu rigt digit for submenu
        $data['header'] = $this->load->view('header/admin_head', '', TRUE);
        $data['top_navi'] = $this->load->view('header/admin_top_navigation', $data, TRUE);
        $data['sidebar'] = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
        $data['message'] = $message;
        $data['msg_info'] = $this->admin_model->open_message($id);
        $data['content'] = $this->load->view('form/email_reply', $data, TRUE);
        $data['footer'] = $this->load->view('footer/admin_footer', $data, TRUE);
        $this->load->view('dashboard', $data);
    }

    public function send_message()
    {
        if ($this->input->post('token') == $this->session->userdata('token')) {
            exit('Can\'t re-submit the form');
        }
        if ($this->input->post('save')) {
            if ($this->admin_model->save_message()) {
                $this->session->set_userdata('token', $this->input->post('token'));
                $message = '<div class="alert alert-success alert-dismissable">'
                        . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                        . 'Saved successfully.!'
                        . '</div>';
                $this->index($message);
            } else {
                $message = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>An ERROR occurred! Please try again.</div>';
                $this->index($message);
            }
        } else {
            // $from = $this->session->userdata['support_email'];
            // $to = $this->input->post('to', TRUE);
            // $suject = $this->input->post('subject', TRUE);
            // $message = $this->input->post('message', TRUE);
            // if ($this->admin_model->save_message('send')) {
            //     $config = Array(
            //         'mailtype' => 'html',
            //         'charset' => 'iso-8859-1',
            //         'wordwrap' => TRUE);
            //     $this->load->library('email', $config);
            //     $this->email->set_newline("\r\n");
            //     $this->email->from($from);
            //     $this->email->to($to);
            //     $this->email->subject($suject);
            //     $this->email->message($message);
            //     if ($this->email->send()) {
            //         $this->session->set_userdata('token', $this->input->post('token'));
            //         $message = '<div class="alert alert-success alert-dismissable">'
            //                 . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
            //                 . 'Send successfully.!'
            //                 . '</div>';
            //     } else {
            //         $message = show_error($this->email->print_debugger());
            //     }

            //     $message = '<div class="alert alert-success alert-dismissable">'
            //                 . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
            //                 . 'Send successfully.!'
            //                 . '</div>';

                $this->index($message);
            } 
        }

    public function send_reply()
    {
        $from = $this->session->userdata['support_email'];
        $to = $this->input->post('to', TRUE);
        $suject = $this->input->post('subject', TRUE);
        $message = $this->input->post('reply_message', TRUE);
        if ($this->admin_model->save_reply()) {
            // $config = Array(
            //     'mailtype' => 'html',
            //     'charset' => 'iso-8859-1',
            //     'wordwrap' => TRUE);
            // $this->load->library('email', $config);
            // $this->email->set_newline("\r\n");
            // $this->email->from($from);
            // $this->email->to($to);
            // $this->email->subject($suject);
            // $this->email->message($message);
            // if ($this->email->send()) {
            //     $message = '<div class="alert alert-success alert-dismissable">'
            //             . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
            //             . 'Send successfully.!'
            //             . '</div>';
            // } else {
            //     $message = show_error($this->email->print_debugger());
            // }

             $message = '<div class="alert alert-success alert-dismissable">'
                        . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                        . 'Send successfully.!'
                        . '</div>';
            $this->index($message);
        } else {
            $message = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>An ERROR occurred! Please try again.</div>';
            $this->index($message);
        }
    }

    public function send_draft_message()
    {
        $from = $this->session->userdata['support_email'];
        $to = $this->input->post('to', TRUE);
        $suject = $this->input->post('subject', TRUE);
        $message = $this->input->post('reply_message', TRUE);
        if ($this->admin_model->send_draft_message()) {
            $config = Array(
                'mailtype' => 'html',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE);
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from($from);
            $this->email->to($to);
            $this->email->subject($suject);
            $this->email->message($message);
            if ($this->email->send()) {
                $message = '<div class="alert alert-success alert-dismissable">'
                        . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                        . 'Send successfully.!'
                        . '</div>';
            } else {
                $message = show_error($this->email->print_debugger());
            }
            $this->index($message);
        } else {
            $message = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>An ERROR occurred! Please try again.</div>';
            $this->index($message);
        }
    }

    public function move_message($field, $id)
    {
        if ((!is_numeric($id)) OR ($this->session->userdata('user_role_id') > 3)) {
            return FALSE;
        }
        if ($this->admin_model->update_message($id, $field)) {
            $message = '<div class="alert alert-success alert-dismissable">'
                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                    . 'Moved successfully.!'
                    . '</div>';
            $this->index($message);
        } else {
            $message = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>An ERROR occurred! Please try again.</div>';
            $this->index($message);
        }
    }

    public function delete_message($id)
    {
        if ((!is_numeric($id)) OR ($this->session->userdata('user_role_id') > 2)) {
            return FALSE;
        }
        if ($this->admin_model->delete_message($id)) {
            $message = '<div class="alert alert-success alert-dismissable">'
                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                    . 'Successfully Deleted!'
                    . '</div>';
            $this->index($message);
        } else {
            $message = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>An ERROR occurred! Please try again.</div>';
            $this->index($message);
        }
    }


    public function delete_messages() 
    {
        $record_ids = $this->input->post('record_ids');
        // print_r($record_ids); die;
        if (!empty($record_ids)) {
            // $countRecords = count($record_ids);
            $this->admin_model->delete_in_spam_messages($record_ids); // Delete records from the database
            $this->session->set_flashdata('success', 'Messages deleted successfully.');
        } else {
            $this->session->set_flashdata('error', 'No message selected.');
        }
        redirect('message_control');
    }

    public function contact_form($message = '')
    {
        $data = array();
        $data['class'] = 42; // class control value left digit for main manu rigt digit for submenu
        $data['header'] = $this->load->view('header/admin_head', '', TRUE);
        $data['top_navi'] = $this->load->view('header/admin_top_navigation', $data, TRUE);
        $data['sidebar'] = $this->load->view('sidebar/admin_sidebar', $data, TRUE);
        $data['message'] = $message;
        $data['content'] = $this->load->view('form/contact_form', $data, TRUE);
        $data['footer'] = $this->load->view('footer/admin_footer', $data, TRUE);
        $this->load->view('dashboard', $data);
    }

    public function contact()
    {
        if ($this->input->post('token') == $this->session->userdata('token')) {
            exit('Can\'t re-submit the form');
        }
        $sender = $this->input->post('name', TRUE);
        $sender_email = $this->input->post('email', TRUE);
        if ($this->admin_model->save_message('inbox', $sender, $sender_email)) {
            $this->session->set_userdata('token', $this->input->post('token'));
            $message = '<div class="alert alert-success alert-dismissable">'
                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>'
                    . 'Send successfully.!'
                    . '</div>';
            $this->index($message);
        } else {
            $message = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>An ERROR occurred! Please try again.</div>';
            $this->index($message);
        }
    }
}
