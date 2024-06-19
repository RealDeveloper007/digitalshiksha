<?php

class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_users()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('user_role', 'users.user_role_id = user_role.user_role_id');
        $result = $this->db->get()->result();
        return $result;
    }
    
     public function get_all_students($limit=null, $start=null)
    {

        $this->db->select('users.*,user_role.user_role_id,user_role.user_role_name,state.state_name,district.district as district_name');
        $this->db->from('users');
        $this->db->join('user_role', 'users.user_role_id = user_role.user_role_id');
        $this->db->join('state', 'users.state = state.id','left');
        $this->db->join('district', 'users.district = district.id','left');

        if($this->input->get('phone'))
        {
            $this->db->where(['user_role.user_role_id'=>5,'users.active'=>1,'users.banned'=>0,'users.user_phone'=>$this->input->get('phone')]);

        } else if($this->input->get('email'))
        {
            $this->db->where('users.user_email',$this->input->get('email'));

        } else if($this->input->get('name')) {

            $this->db->where(['user_role.user_role_id'=>5,'users.active'=>1,'users.banned'=>0]);

            $this->db->like('users.user_name',$this->input->get('name'));
        } else {
            $this->db->where(['user_role.user_role_id'=>5,'users.active'=>1,'users.banned'=>0]);

        }

        $this->db->limit($limit, $start);
        $this->db->order_by("users.user_id", "desc");
        $result = $this->db->get()->result();
    //   echo $this->db->last_query(); die;
        return $result;
    }
    
     
     public function count_all_students()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('user_role', 'users.user_role_id = user_role.user_role_id');
         if($this->input->get('phone'))
        {
            $this->db->where(['user_role.user_role_id'=>5,'users.active'=>1,'users.banned'=>0,'users.user_phone'=>$this->input->get('phone')]);

        }else if($this->input->get('email'))
        {
            $this->db->where('users.user_email',$this->input->get('email'));

        } else if($this->input->get('name')) {

            $this->db->where(['user_role.user_role_id'=>5,'users.active'=>1,'users.banned'=>0]);

            $this->db->like('users.user_name',$this->input->get('name'));
        } else {
            $this->db->where(['user_role.user_role_id'=>5,'users.active'=>1,'users.banned'=>0]);

        }
        $result = $this->db->get()->num_rows();
        return $result;
    }
  

    public function check_user_exist($email)
    {
        $this->db->where('user_email', $email);
        $this->db->from('users');
        $row = $this->db->count_all_results();
        if ($row) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function delete_in_active_users($record_ids) {
        $this->db->where_in('user_id', $record_ids);
        $this->db->delete('users');
    }
    
    
    public function check_user_exist_by_phone($phone)
    {
        $this->db->where('user_phone', $phone);
        $this->db->from('users');
        $row = $this->db->count_all_results();
        if ($row) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    
    public function get_user_details_by_email($email)
    {
        $this->db->where('user_email', $email);
        $this->db->from('users');
        $result = $this->db->get()->result()[0];
        if ($result) {
            return $result;
        } else {
            return FALSE;
        }
    }
    
    public function get_user_details_by_phone($phone)
    {
        $this->db->where('user_phone', $phone);
        $this->db->from('users');
        $result = $this->db->get()->result()[0];
        if ($result) {
            return $result;
        } else {
            return FALSE;
        }
    }

    public function get_user_info($id = '')
    {
        if ($id == '') {
            $id = $this->session->userdata('user_id');
        }
        $this->db->select('users.*,district.district');
        $this->db->from('users');
        $this->db->join('district', 'district.id = users.district','left');
        $this->db->where('user_id', $id);
        $result = $this->db->get()->row();
        return $result;
    }

    public function get_benned_users()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('users.active', 0);
        $this->db->or_where('users.banned', 1);
        $this->db->join('user_role', 'users.user_role_id = user_role.user_role_id','left');
        $result = $this->db->get()->result();
        return $result;
    }

    public function update_user_data()
    {
        $pk = (int) $this->input->post('pk');
        $can = $this->db->get_where('users', array('user_id' => $pk), 1)->row();
        if ($can->user_role_id <= $this->session->userdata('user_role_id')) {
            return FALSE;
        }
        $name = $this->input->post('name');
        $data = array();
        $this->db->where('user_id', $pk);
        switch ($name) {
            case 'user_name':
                $data['user_name'] = $this->input->post('value', TRUE);
                break;
            case 'user_phone':
                $data['user_phone'] = $this->input->post('value', TRUE);
                break;
            case 'user_email':
                $data['user_email'] = $this->input->post('value', TRUE);
                break;
            case 'user_role':
                $data['user_role_id'] = $this->input->post('value', TRUE);
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

    public function deactivate_user_account($id)
    {
        $can = $this->db->get_where('users', array('user_id' => $id), 1)->row();
        if (!($can->user_role_id > $this->session->userdata('user_role_id'))) {
            return FALSE;
        }
        $data = array();
        $data['active'] = 0;
        $this->db->where('user_id', (int) $id);
        $this->db->update('users', $data);
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function ban_user_account($id)
    {
        $can = $this->db->get_where('users', array('user_id' => $id), 1)->row();
        if (!($can->user_role_id > $this->session->userdata('user_role_id'))) {
            return FALSE;
        }
        $data = array();
        $data['banned'] = 1;
        $this->db->where('user_id', (int) $id);
        $this->db->update('users', $data);
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function unban_user_account($id)
    {
        $can = $this->db->get_where('users', array('user_id' => $id), 1)->row();
        if (!($can->user_role_id > $this->session->userdata('user_role_id'))) {
            return FALSE;
        }
        $data = array();
        $data['banned'] = 0;
        $this->db->where('user_id', (int) $id);
        $this->db->update('users', $data);
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function activate_user_account($id)
    {
        $can = $this->db->get_where('users', array('user_id' => $id), 1)->row();
        if (($can->user_role_id <= $this->session->userdata('user_role_id')) OR ($this->session->userdata('user_role_id') > 3)) {
            return FALSE;
        }
        $data = array();
        $data['active'] = 1;
        $this->db->where('user_id', (int) $id);
        $this->db->update('users', $data);
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function reset_password($email)
    {
        $data = array();
        $data['user_pass'] = md5($this->input->post('user_pass'));
        $this->db->where('user_email', $email);
        $this->db->update('users', $data);
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
       public function reset_password_by_phone($phone)
    {
         $can = $this->db->get_where('users', array('user_phone' => $phone), 1)->row();
      
        if(isset($can->user_id))
        {
            if($this->input->post('otp') ==$can->forgot_otp)
            {
                         $data = array();
                        $data['user_pass'] = md5($this->input->post('user_pass'));
                        $this->db->where('user_phone', $phone);
                        $this->db->update('users', $data);
                        return 'password_change';

                        // echo $this->db->last_query(); die;
                        // print_r($data); die;
                        // if ($this->db->affected_rows() == 1) {
                        //     return 'password_change';
                        // } else {
                        //     return 'password_not_change';
                        // }
            } else {
                
                return 'otp_not_matched';
            }

            
        } else {
            return FALSE;
        }
       
    }

    public function reset_password_by_email($email)
    {
        $can = $this->db->get_where('users', array('user_email' => $email), 1)->row();
      
        if(isset($can->user_id))
        {
            if($this->input->post('otp') ==$can->forgot_otp)
            {
                         $data = array();
                        $data['user_pass'] = md5($this->input->post('user_pass'));
                        $this->db->where('user_email', $email);
                        $this->db->update('users', $data);
                        return 'password_change';

                        // echo $this->db->last_query(); die;
                        // print_r($data); die;
                        // if ($this->db->affected_rows() == 1) {
                        //     return 'password_change';
                        // } else {
                        //     return 'password_not_change';
                        // }
            } else {
                
                return 'otp_not_matched';
            }

            
        } else {
            return FALSE;
        }
    }

    public function report_password_reset($email)
    {
        $data = array();
        $data['active'] = 0;
        $this->db->where('user_email', $email);
        $this->db->update('users', $data);
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
