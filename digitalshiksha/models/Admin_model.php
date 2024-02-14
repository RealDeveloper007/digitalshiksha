<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Admin_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_user_details($id)
    {
        $result = $this->db->where('user_id', $id)->get('users')->result()[0];
        return $result;
    }

     public function get_students()
    {
        $result = $this->db->where(['active'=>1,'user_role_id'=>5])->get('users')->result();
        return $result;
    }

    public function get_user_role()
    {
        $result = $this->db->get('user_role')->result();
        return $result;
    }

      public function get_all_batches()
    {
        //echo $id; die;
        $this->db->select('*');
        $this->db->from('batch');
        $this->db->where('created_by',$this->session->userdata('user_id'));
        $result = $this->db->get()->result();
        return $result;
    }

      public function save_batch($data)
    {
            $this->db->insert('batch', $data);
            if ($this->db->affected_rows() == 1) {
                return $this->db->insert_id();
            } else {
                return FALSE;
            }
        
    }

    public function update_batch($id,$data)
    {
        
        $this->db->where(['created_by'=>$this->session->userdata('user_id'),'id'=>$id]);
        $this->db->update('batch', $data);
        return true;
    }

      public function batch_details($id)
    {
        $result = $this->db->where(['id'=>$id,'created_by'=>$this->session->userdata('user_id')])->get('batch')->result()[0];
        return $result;
    }

    
    public function delete_syllabus_question($id)
    {
        
            $this->db->where('id', $id);
            $this->db->delete('syllabus_questions');
            if ($this->db->affected_rows() == 1) {
                return 'deleted';
            } else {
                return FALSE;
            }
        
    }
    
    public function set_subscription($info)
    {
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->update('users', $info);
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }  
       public function get_syllabus_question_details($id,$type)
    {
        //echo $id; die;
        $this->db->select('*');
        $this->db->from('syllabus_questions');
        $this->db->where(['MD5(cat_id)'=>$id,'type'=>$type]);
        $result = $this->db->get()->result()[0];
        return $result;
    }   
    public function get_payment_history()
    {
        $result = $this->db->select('*')
                ->from('payment_history')
                ->order_by("pay_date", "desc")
                ->join('users', 'users.user_id = payment_history.user_id_ref', 'left')
                ->get()->result();
        return $result;
    }

   public function get_mock_detail($id)
    {
        $result = $this->db->select('exam_title.*')
                ->where('title_id', $id)
                ->from('exam_title')
                ->join('sub_categories', 'sub_categories.id = exam_title.sub_category_id')
                ->join('categories', 'categories.category_id = exam_title.category_id')
                ->join('users', 'users.user_id = exam_title.user_id')
                ->get()
                ->row();
        return $result;
    }
    /**
     * @name        get_user_mocks
     * @desc        Get an array of exam_title objects.
     * @param       id      (int)   
     */
    public function get_user_mocks($examId,$id)
    {
        if (!is_numeric($id)) {
            return FALSE;
        }
        if($examId == 'mock_test') {
            $this->db->select('*')
                ->select("exam_title.active AS exam_active")
                ->from('exam_title')
                ->where('user_id', $id)
                ->where('batch_id',0)
                ->join('categories', 'categories.category_id = exam_title.category_id');
                
        } else {
            $this->db->select('*')
                ->select("exam_title.active AS exam_active")
                ->from('exam_title')
                ->where('user_id', $id)
                ->where('batch_id !=',0)
                ->join('categories', 'categories.category_id = exam_title.category_id')
                ->join('batch', 'batch.id = exam_title.batch_id');
        }

        $this->db->order_by("exam_title.exam_created", "desc");
        
        $result = $this->db->get()->result();
        return $result;
    }

    public function get_student_live_test($id)
    {
         if (!is_numeric($id)) {
            return FALSE;
        }
        
        
        $JoinBatches =  $this->db->select('*')
                ->select("id")
                ->from('batch')
                ->where('find_in_set("'.$id.'", join_students) <> 0');
        $Batchresult = $this->db->get()->result();


        if(isset($Batchresult))
        {
            $Batches = [];
            foreach ($Batchresult as $SingleBatchResult)
            {
                $Batches = $SingleBatchResult->id;
            }
            // echo"<pre>";

            //  print_r($Batches); die;
         if(count($Batches) > 0) {
             $this->db->distinct('exam_title.title_id')->select('batch.batch_name,batch.batch_code,batch.id,exam_title.active AS exam_active,exam_title.*,categories.*')
                ->from('exam_title')
                ->where_in('exam_title.batch_id',$Batches)
                ->where_in('exam_title.active',1)
                ->join('categories', 'categories.category_id = exam_title.category_id')
                ->join('batch', 'batch.id = exam_title.batch_id');

                 $result = $this->db->get()->result();

                 return $result;
         }
         else 
         {
            return false;
         }
        
        } else {

            return false;
        }
       

    }

    public function count_get_messages()
    {
         if($this->session->userdata['user_role_id']==5 ||  $this->session->userdata['user_role_id'] == 4)
        {
            $this->db->select('messages.*, COUNT(messages_reply.message_reply_id) as numOfReply')
                    ->from('messages')
                    ->order_by("messages.message_date", "desc")
                    ->join('messages_reply', 'messages.message_id = messages_reply.message_id_fk', 'left')
                    ->where('messages.user_id',$this->session->userdata['user_id'])
                    ->group_by('message_id');
            $result = $this->db->get()->num_rows();
        } else {

            $this->db->select('messages.*, COUNT(messages_reply.message_reply_id) as numOfReply')
                    ->from('messages')
                    ->order_by("messages.message_date", "desc")
                    ->join('messages_reply', 'messages.message_id = messages_reply.message_id_fk', 'left')
                    ->group_by('message_id');
            $result = $this->db->get()->num_rows();

        }

        return $result;
    }

    public function get_messages($limit=null, $start=null)
    {
        if($this->session->userdata['user_role_id']==5 ||  $this->session->userdata['user_role_id'] == 4)
        {
             $this->db->select('messages.*, COUNT(messages_reply.message_reply_id) as numOfReply')
                ->from('messages')
                ->order_by("messages.message_date", "desc")
                ->join('messages_reply', 'messages.message_id = messages_reply.message_id_fk', 'left')
                ->where('messages.user_id',$this->session->userdata['user_id'])
                ->group_by('message_id');
            $this->db->limit($limit, $start);
            $result = $this->db->get()->result();

        } else {
        $this->db->select('messages.*, COUNT(messages_reply.message_reply_id) as numOfReply')
                ->from('messages')
                ->order_by("messages.message_date", "desc")
                ->join('messages_reply', 'messages.message_id = messages_reply.message_id_fk', 'left')
                ->group_by('message_id');
            $this->db->limit($limit, $start);
            $result = $this->db->get()->result();
        }

        return $result;
    }

    public function open_message($id)
    {
        $this->db->select('*')
                ->where('message_id', $id)
                ->from('messages');
        $result = $this->db->get()->row();
        if ($result) {
            $data = array();
            $data['message_read'] = 1;
            $this->db->where('message_id', $id);
            $this->db->update('messages', $data);
            return $result;
        } else {
            return FALSE;
        }
    }

    public function get_replies($id)
    {
        $this->db->select('*')
                ->order_by("replied_time", "asc")
                ->where('message_id_fk', $id)
                ->from('messages_reply');
        $result = $this->db->get()->result();
        return $result;
    }

    public function get_my_profile_info()
    {
        $userId = $this->session->userdata('user_id');
        $this->db->select('*')
                ->from('users')
                ->where('users.user_id', $userId)
                ->join('user_role', 'user_role.user_role_id = users.user_role_id');
        $result = $this->db->get()->row();
        return $result;
    }

    public function save_message($folder = 'draft', $sender = '', $sender_email = '', $send_to = '',$phone_number = '')
    {
        date_default_timezone_set($this->session->userdata['time_zone']);
        $info = array();
        if ($sender == '') {
            $info['message_sender'] = $this->session->userdata['user_name'];
        } else {
            $info['message_sender'] = $sender;
        }
        if ($sender_email == '') {
            $info['sender_email'] = $this->session->userdata['support_email'];
        } else {
            $info['sender_email'] = $sender_email;
        }
        
         if ($phone_number == '') {
            $info['phone_number'] = '';
        } else {
            $info['phone_number'] = $phone_number;
        }
        
        $info['message_send_to'] = 'info@digitalshikshadarpan.com';
        if ($send_to != '') {
            if($this->session->userdata['support_email'])
            {
                $info['message_send_to'] = $this->session->userdata['support_email'];
            } else {
                $info['message_send_to'] = $send_to;
            }
        }
        if($this->input->post('user_id'))
        {
            $info['user_id'] = $this->input->post('user_id');
        }
        $info['message_subject'] = $this->input->post('subject', TRUE);
        $info['message_body'] = $this->input->post('message', TRUE);
        $info['message_date'] = date('Y-m-d H:i:s');
        $info['message_folder'] = $folder;
        $this->db->insert('messages', $info);
        if ($this->db->insert_id()) {
            return  true;
        } else {
            return false;
        }
    }

    public function save_reply()
    {
        date_default_timezone_set($this->session->userdata['time_zone']);
        $info = array();
        $info['message_id_fk'] = $this->input->post('message_id', TRUE);
        $info['replied_messages'] = $this->input->post('reply_message', TRUE);
        $info['replied_by'] = $this->session->userdata['user_id'];
        $info['replied_time'] = date('Y-m-d H:i:s');
        $this->db->insert('messages_reply', $info);
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function send_draft_message()
    {
        $id = $this->input->post('message_id', TRUE);
        date_default_timezone_set($this->session->userdata['time_zone']);
        $info = array();
        $info['message_sender'] = $this->session->userdata['user_name'];
        $info['sender_email'] = $this->session->userdata['support_email'];
        $info['message_send_to'] = $this->input->post('to', TRUE);
        $info['message_subject'] = $this->input->post('subject', TRUE);
        $info['message_body'] = $this->input->post('reply_message', TRUE);
        $info['message_date'] = date('Y-m-d H:i:s');
        $info['message_folder'] = 'send';
        $info['message_read'] = 0;
        $this->db->where('message_id', $id);
        $this->db->update('messages', $info);
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function create_category($cat_name)
    {
        $info = array();
        $info['category_name'] = $cat_name;
        $info['created_by'] = $info['last_modified_by'] = $this->session->userdata['user_id'];
        $if_exist = $this->db->get_where('categories', array('category_name' => $cat_name), 1)->result();
        if ($if_exist) {
            return FALSE;
        } else {
            $this->db->insert('categories', $info);
            if ($this->db->affected_rows() == 1) {
                return $this->db->insert_id();
            } else {
                return FALSE;
            }
        }
    }
public function create_subcategory($sub_cat_name)
    {
        $info = array();
        $info['sub_cat_name'] = $sub_cat_name;
        $info['cat_id'] = $this->input->post('category', TRUE);
        $info['created_by'] = $info['last_modified_by'] = $this->session->userdata['user_id'];
        $if_exist = $this->db->get_where('sub_categories', array('sub_cat_name' => $sub_cat_name), 1)->result();
        if ($if_exist) {
            return FALSE;
        } else {
            $this->db->insert('sub_categories', $info);
            if ($this->db->affected_rows() == 1) {
                return $this->db->insert_id();
            } else {
                return FALSE;
            }
        }
    }
    
    public function create_sub_subcategory($sub_cat_name)
    {
        $info = array();
        $info['name'] = $sub_cat_name;
        $info['cat_id'] = $this->input->post('category', TRUE);
        $info['sub_cat_id'] = $this->input->post('sub_category', TRUE);
        $info['status'] = 1;
        $info['created_at'] = date('Y-m-d h:i:s');
        $info['created_by'] = $this->session->userdata['user_id'];
       // print_r($info); die;
        $if_exist = $this->db->get_where('sub_sub_category', array('name' => $sub_cat_name), 1)->result();
        if ($if_exist) {
            return FALSE;
        } else {
            $this->db->insert('sub_sub_category', $info);
            if ($this->db->affected_rows() == 1) {
                return $this->db->insert_id();
            } else {
                return FALSE;
            }
        }
    }
    
        public function update_sub_subcategory()
    {
        if ($this->session->userdata('user_role_id') > 4) {
            return FALSE;
        }
        $data = array();
        $data['name'] = $this->input->post('sub_cat_name', TRUE);
        $if_exist = $this->db->get_where('sub_sub_category', array('name' => $data['name']), 1)->result();
        if ($if_exist) {
            return FALSE;
        } else {
            $this->db->where('id', (int) $this->input->post('id'));
            $this->db->update('sub_sub_category', $data);
            if ($this->db->affected_rows() == 1) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }
    
    public function update_syllabus_question($id,$data)
    {
        $this->db->where('id', $id);
        $this->db->update('syllabus_questions', $data);
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
     public function get_syllabus_single_question_details($id)
    {
        //echo $id; die;
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->from('syllabus_questions');
        $result = $this->db->get()->result()[0];
        return $result;
    }

      public function create_sub_sub_subcategory($sub_cat_name)
    {
        $info = array();
        $info['name'] = $sub_cat_name;
        $info['cat_id'] = $this->input->post('cat_id', TRUE);
        $info['sub_cat_id'] = $this->input->post('sub_cat_id', TRUE);
        $info['sub_sub_cat_id'] = $this->input->post('sub_sub_cat_id', TRUE);
        $info['status'] = 1;
        // $info['created_at'] = date('Y-m-d h:i:s');

        if (isset($_FILES['icon_class']['name'][0]))
        {
            $config['upload_path'] = './category_images/';

            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['file_name'] = uniqid();
            $config['overwrite'] = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('icon_class')) 
            {
                $error = array('error' => $this->upload->display_errors('<div class="alert alert-danger">', '</div>'));
                $this->session->set_flashdata('message',$error['error']);
                redirect(base_url('admin_control/sub_sub_subcategory_form'));
            } else {
                $upload_data = $this->upload->data();
                $file_name = $upload_data['file_name'];

                $info['icon_class'] = $file_name;

            }
        }
       // print_r($info); die;
        // $if_exist = $this->db->get_where('sub_sub_category', array('name' => $sub_cat_name), 1)->result();
        // if ($if_exist) {
        //     return FALSE;
        // } else {
           // print_r($info); die;
            $this->db->insert('sub_sub_sub_category', $info);
            if ($this->db->affected_rows() == 1) {
                return $this->db->insert_id();
            } else {
                return FALSE;
            }
        // }
    }
      public function get_sub_sub_sub_categories_details($id)
    {
        //echo $id; die;
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->from('sub_sub_sub_category');
        $result = $this->db->get()->result()[0];
        return $result;
    }

      public function get_syllabus_questions($id,$type)
    {
        //echo $id; die;
        $this->db->select('*');
        $this->db->where(['cat_id'=>$id,'type'=>$type]);
        $this->db->from('syllabus_questions');
        $result = $this->db->get()->result();
                //echo $this->db->last_query(); die;

        return $result;
    }

      public function GetExams($catid,$subcat_id,$sub_subcat_id)
    {
        $this->db->select('title_id');
        $this->db->where(['category_id'=>$catid,'sub_category_id'=>$subcat_id,'sub_sub_category_id'=>$sub_subcat_id]);
        $this->db->from('exam_title');
        $result = $this->db->get()->result();
        //echo $this->db->last_query(); die;
        return $result;
    }

     public function GetCategoriesData($id)
    {
        //echo $id; die;
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->from('sub_sub_sub_category');
        $result = $this->db->get()->result()[0];
        return $result;
    }

    public function update_sub_sub_subcategory()
    {
       
        $data = array();
        $info['cat_id'] = $this->input->post('cat_id', TRUE);
        $info['sub_cat_id'] = $this->input->post('sub_cat_id', TRUE);
        $info['sub_sub_cat_id'] = $this->input->post('sub_sub_cat_id', TRUE);
        $info['name'] = $this->input->post('name', TRUE);
        $info['status'] = $this->input->post('status', TRUE);

        //print_r($_FILES); die;
        if (isset($_FILES['icon_class']['name'][0]))
        {
            $config['upload_path'] = './category_images/';

            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = uniqid();
            $config['overwrite'] = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('icon_class')) 
            {
                //echo "ss"; die;
                $error = array('error' => $this->upload->display_errors('<div class="alert alert-danger">', '</div>'));
                $this->session->set_flashdata('message',$error['error']);
                redirect(base_url('admin_control/view_sub_sub_sub_categories'));
            } else {
                $upload_data = $this->upload->data();
                $file_name = $upload_data['file_name'];
               // echo $file_name; die;

                $info['icon_class'] = $file_name;

            }
        }

        // $if_exist = $this->db->get_where('sub_sub_category', array('name' => $data['name']), 1)->result();
        // if ($if_exist) {
        //     return FALSE;
        // } else {
            $this->db->where('id', (int) $this->input->post('id'));
            $this->db->update('sub_sub_sub_category', $info);
            if ($this->db->affected_rows() == 1) {
                return TRUE;
            } else {
                return FALSE;
            }
        // }
    }

    public function get_subcategories_by_cat_id($id)
    {
        $this->db->select('*');
        $this->db->where('cat_id', $id);
        $this->db->from('sub_categories');
        $this->db->order_by("sub_cat_name","asc");
        $result = $this->db->get()->result();
        return $result;
    }
    
      public function get_sub_subcategories_by_cat_id($id)
    {
        $this->db->select('*');
        $this->db->where('sub_cat_id', $id);
        $this->db->from('sub_sub_category');
        $this->db->order_by("name","asc");
        $result = $this->db->get()->result();
        return $result;
    }
    
       public function get_sub_subcategories_details($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->from('sub_sub_category');
        $this->db->order_by("name","asc");
        $result = $this->db->get()->result()[0];
        return $result;
    }



    public function add_mock_title($upload_data = '')
    {
        date_default_timezone_set($this->session->userdata['time_zone']);
        $info = array();
        $info['category_id'] = $this->input->post('category', TRUE);
        $info['sub_category_id'] = $this->input->post('sub_category', TRUE);
        $info['sub_sub_category_id'] = $this->input->post('sub_sub_category', TRUE);
        $info['title_name'] = $this->input->post('mock_title', TRUE);
        $info['slug'] = $this->input->post('slug', TRUE);
        $info['user_id'] = $this->session->userdata['user_id'];
        $info['syllabus'] = $this->input->post('mock_syllabus', TRUE);
        $info['pass_mark'] = $this->input->post('passing_score', TRUE);
        $info['exam_price'] = ($this->input->post('price'))?$this->input->post('price', TRUE):0;
        $info['exam_created'] = date('Y-m-d H:i:s');
        $info['public'] = $this->input->post('public', TRUE);
        $info['created_byy'] = $this->input->post('created_byy', TRUE);
        $info['course_id'] = $this->input->post('course_id', TRUE);
        $info['feature_img_name'] = ($upload_data == '')?'':$upload_data;
        $info['last_modified_by'] = $this->session->userdata['user_id'];
        if($this->input->post('exam_type', TRUE) == 'live_mock_test') {
            $info['batch_id']         = $this->input->post('btach_id', TRUE);
            $info['batch_start_date'] = $this->input->post('batch_start_date', TRUE)." 00:00:00";
            $info['batch_end_date']   = $this->input->post('batch_end_date', TRUE)." 23:59:59";
        }
        // echo"<pre>";
        // print_r($info); die;
        $if_exist = $this->db->get_where('exam_title', array('title_name' => $info['title_name']), 1)->result();
        if ($if_exist) {
        
            return FALSE;
        } else {
            $this->db->insert('exam_title', $info);
            if ($this->db->affected_rows() == 1) {
                return $this->db->insert_id();
            } else {
                return FALSE;
            }
        }
    }

    public function mute_category($id)
    {
        $data = array();
        $data['active'] = 0;
        $data['last_modified_by'] = $this->session->userdata['user_id'];
        $this->db->where('category_id', $id);
        $this->db->update('categories', $data);
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function mute_subcategory($id)
    {
        $data = array();
        $data['sub_cat_active'] = 0;
        $data['last_modified_by'] = $this->session->userdata['user_id'];
        $this->db->where('cat_id', $id);
        $this->db->update('sub_categories', $data);
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function mute_exam($id)
    {
        $data = array();
        $data['active'] = 0;
        $data['last_modified_by'] = $this->session->userdata['user_id'];
        $this->db->where('title_id', $id);
        $this->db->update('exam_title', $data);
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function add_question($file_name = '', $file_type = '')
    {
        /**************INSERT QUESTION********************** */
        $info = array();
        $info['question']    = $this->input->post('question', TRUE);
        $info['exam_id']     = $this->input->post('ques_id', TRUE);
        $info['option_type'] = $this->input->post('ans_type', TRUE);
        $info['media_type']  = $file_type;
        $info['media_link']  = $file_name;
        $this->db->insert('questions', $info);
        $last_ques_id = $this->db->insert_id();
        if ($last_ques_id) {
            /*             * ************INSERT ANSWERS********************** */
            $data = array();
            $data['ques_id'] = $last_ques_id;
            $opt   = array_filter($this->input->post('options'));
            $r_ans = array_filter($this->input->post('right_ans'));
            $new   = array_filter($this->input->post('new'));

            //print_r($new);
            foreach ($opt as $key => $option) {
                $data['answer'] = $option;
                if (isset($r_ans[$key]) && $r_ans[$key] != '') {
                    $data['right_ans'] = 1;
                } else {
                    $data['right_ans'] = 0;
                }
                $data['new'] = $new[$key];
                $this->db->insert('answers', $data);
            }
            return TRUE;

            //die;
        } else {
            return FALSE;
        }
    }

    public function set_time_n_random_ques_no()
    {
        $data = array();
        $data['time_duration'] = $this->input->post('duration', TRUE);
        $data['random_ques_no'] = $this->input->post('random_ques', TRUE);
        $this->db->where('title_id', (int) $this->input->post('exam_id', TRUE));
        $this->db->update('exam_title', $data);
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function activate_category($id)
    {
        if ($this->session->userdata('user_role_id') > 3) {
            return FALSE;
        }
        $data = array();
        $data['active'] = 1;
        $data['last_modified_by'] = $this->session->userdata['user_id'];
        $this->db->where('category_id', (int) $id);
        $this->db->update('categories', $data);
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function update_category_name()
    {
        if ($this->session->userdata('user_role_id') > 3) {
            return FALSE;
        }
        $data = array();
        $data['category_name'] = $this->input->post('value', TRUE);
        $data['last_modified_by'] = $this->session->userdata['user_id'];
        $if_exist = $this->db->get_where('categories', array('category_name' => $data['category_name']), 1)->result();
        if ($if_exist) {
            return FALSE;
        } else {
            $this->db->where('category_id', (int) $this->input->post('pk'));
            $this->db->update('categories', $data);
            if ($this->db->affected_rows() == 1) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }
    
    
    public function update_subcategory_name()
    {
        if ($this->session->userdata('user_role_id') > 3) {
            return FALSE;
        }
        $data = array();
        $data['sub_cat_name'] = $this->input->post('value', TRUE);
        $data['last_modified_by'] = $this->session->userdata['user_id'];
        $if_exist = $this->db->get_where('sub_categories', array('sub_cat_name' => $data['sub_cat_name']), 1)->result();
        if ($if_exist) {
            return FALSE;
        } else {
            $this->db->where('id', (int) $this->input->post('pk'));
            $this->db->update('sub_categories', $data);
            if ($this->db->affected_rows() == 1) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }


    public function update_mock($id, $upload_data = '')
    {
        date_default_timezone_set($this->session->userdata['time_zone']);
        $info = array();
        $info['category_id'] = $this->input->post('category', TRUE);
        $info['sub_category_id'] = $this->input->post('sub_category', TRUE);
        $info['sub_sub_category_id'] = $this->input->post('sub_sub_category', TRUE);
        $info['title_name'] = $this->input->post('mock_title', TRUE);
        $info['slug'] = $this->input->post('slug', TRUE);
         $info['syllabus'] = $this->input->post('mock_syllabus', TRUE);
        $info['pass_mark'] = $this->input->post('passing_score', TRUE);
        $info['exam_price'] = ($this->input->post('price'))?$this->input->post('price', TRUE):0;
        $info['time_duration'] = $this->input->post('duration', TRUE);
        $info['random_ques_no'] = $this->input->post('random_ques', TRUE);
        $info['exam_created'] = date('Y-m-d H:i:s');
        $info['public'] = $this->input->post('public', TRUE);
        $info['active'] = $this->input->post('active', TRUE);
         if($this->input->post('batch_id')) {
            $info['batch_id']         = $this->input->post('batch_id', TRUE);
            $info['batch_start_date'] = $this->input->post('batch_start_date', TRUE)." 00:00:00";
            $info['batch_end_date']   = $this->input->post('batch_end_date', TRUE)." 23:59:59";
        }
        $info['created_byy'] = $this->input->post('created_byy', TRUE);
        $info['course_id'] = $this->input->post('course_id', TRUE);
        $info['last_modified_by'] = $this->session->userdata['user_id'];

        // echo $upload_data; die;

        if ($upload_data != '') {
            $info['feature_img_name'] = $upload_data;
        }
        
        $this->db->where('title_id', $id);
        $this->db->update('exam_title', $info);
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function update_mock_title()
    {
        $name = $this->input->post('name');
        $data = array();
        $data['last_modified_by'] = $this->session->userdata['user_id'];
        if ($this->session->userdata('user_role_id') > 3) {
            $this->db->where('user_id', (int) $this->session->userdata('user_id'));
        }
        $this->db->where('title_id', (int) $this->input->post('pk'));
        switch ($name) {
            case 'exam_title':
                $data['title_name'] = $this->input->post('value', TRUE);
                break;
            case 'exam_price':
                $data['exam_price'] = $this->input->post('value', TRUE);
                break;
            case 'cat_id':
                $data['category_id'] = $this->input->post('value', TRUE);
                break;
            case 'active':
                $data['active'] = $this->input->post('value', TRUE);
                break;
            case 'exam_syllabus':
                $data['syllabus'] = $this->input->post('value', TRUE);
                break;
            case 'passing_score':
                $data['pass_mark'] = $this->input->post('value', TRUE);
                break;
            default:
                return FALSE;
                break;
        }
        $this->db->update('exam_title', $data);
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function update_question()
    {
        $data = array();
        $data['question'] = $this->input->post('question', TRUE);
        $this->db->where('ques_id', (int) $this->input->post('ques_id'));
        $this->db->where('exam_id', (int) $this->input->post('exam_id'));
        $this->db->update('questions', $data);
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function update_answer($ques_id)
    {
        $name = $this->input->post('name');
        $data = array();
        if ($name == 'ans-text') {
            $data['answer'] = $this->input->post('value', TRUE);
        } elseif ($name == 'right-ans') {
            $type = $this->db->get_where('questions', array('ques_id' => $ques_id), 1)->row();
            if (($type->option_type == 'Radio') && ($this->input->post('value', TRUE) == 1)) {
                $have = $this->db->select('right_ans')
                        ->from('answers')
                        ->where('ques_id', $ques_id)
                        ->where('right_ans', 1)
                        ->get()
                        ->row();
                if ($have) {
                    return FALSE;
                } else {
                    $data['right_ans'] = $this->input->post('value', TRUE);
                }
            } else {
                $data['right_ans'] = $this->input->post('value', TRUE);
            }
        } else {
            return FALSE;
        }
        $this->db->where('ques_id', $ques_id);
        $this->db->where('ans_id', (int) $this->input->post('pk'));
        $this->db->update('answers', $data);
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function update_message($id, $field)
    {
        $data = array();
        switch ($field) {
            case 'trash':
                $data['trash'] = 1;
                break;
            case 'spam':
                $data['spam'] = 1;
                break;
            case 'untrash':
                $data['trash'] = 0;
                break;
            case 'unspam':
                $data['spam'] = 0;
                break;
            default:
                return FALSE;
                break;
        }
        $this->db->where('message_id', $id);
        $this->db->update('messages', $data);
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function update_password($info)
    {
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->update('users', $info);
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

     public function update_photo($info)
    {
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->update('users', $info);
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function update_profile_info()
    {
        $pk = (int) $this->input->post('pk');
        $name = $this->input->post('name');
        $data = array();
        $this->db->where('user_id', $this->session->userdata('user_id'));
        switch ($name) {
            case 'email':
                $data['user_name'] = $this->input->post('value', TRUE);
                break;
            case 'phone':
                $data['user_phone'] = $this->input->post('value', TRUE);
                break;
            default:
                return FALSE;
                break;
        }
        $this->db->update('users', $data);
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function delete_category_name($id)
    {
        if ($this->session->userdata('user_role_id') > 3) {
            return FALSE;
        }
        $have_exam = $this->db->get_where('sub_categories', array('cat_id' => $id), 1)->result();
        if ($have_exam) {
            if ($this->mute_category($id)) {
                return 'muted';
            }
        } else {
            $this->db->where('category_id', $id);
            $this->db->delete('categories');
            if ($this->db->affected_rows() == 1) {
                return 'deleted';
            } else {
                return FALSE;
            }
        }
    }
public function delete_subcategory_name($id)
    {
        
            $this->db->where('id', $id);
            $this->db->delete('sub_categories');
            if ($this->db->affected_rows() == 1) {
                return 'deleted';
            } else {
                return FALSE;
            }
        
    }
    
    public function delete_sub_subcategory_name($id)
    {
        
            $this->db->where('id', $id);
            $this->db->delete('sub_sub_category');
            if ($this->db->affected_rows() == 1) {
                return 'deleted';
            } else {
                return FALSE;
            }
        
    }
    /**
     * Delete the exam with all questions and answers related to this exam.
     * @param type $id
     * @return boolean
     */
    public function delete_exam_with_all_questions($id)
    {
        $this->db->where('title_id', $id);
        $this->db->delete('exam_title');
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * Delete the question with all answers related to this question.
     * @param type $id
     * @return boolean
     */
    public function delete_question_with_answers($id)
    {
        $this->db->where('ques_id', $id);
        $this->db->delete('questions');
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * Delete single answers.
     * @param type $id
     * @return boolean
     */
    public function delete_answer($id)
    {
        $this->db->where('ans_id', $id);
        $this->db->delete('answers');
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function delete_message($id)
    {
        $this->db->where('message_id', $id);
        $this->db->delete('messages');
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get_paypal_settings()
    {
        return $this->db->get('paypal_settings')->row();
    }

    public function get_request_batches($userId) {
        $results = $this->db->where('status',1)->get('batch')->result();
        $batches = [];
        if(count($results) > 0) {
            foreach ($results as $key) {
                if($key->student_request != '') {
                    $explode_students = explode(',',$key->student_request);
                    $join_student = explode(',',$key->join_students);
                    $decline_student = explode(',',$key->decline_students);
                    if(!in_array($userId, $join_student) && !in_array($userId, $decline_student)) {
                         $batches[] = ['id'          => $key->id,
                                       'batch_name'  => $key->batch_name,
                                       'batch_code'  => $key->batch_code,
                                       'student_request' => $key->student_request
                                     ];
                    } 
            
                }
            }
        }
        return $batches;
    }
    public function get_student_batches($userId) {
        $results = $this->db->where('id',$userId)->where('status',1)->get('batch')->result();
        return $results;
    }

    public function QuestionInsert($questiondata)
    {
        $this->db->insert('questions', $questiondata);
        if ($this->db->affected_rows() == 1) {
            return $this->db->insert_id();
        } else {
            return FALSE;
        }
    }
}
