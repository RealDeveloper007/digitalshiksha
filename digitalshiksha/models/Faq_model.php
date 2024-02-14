<?php
class Faq_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
	
	
	 public function get_faqs()
    {
        $result = $this->db->get('faqs')->result();
        return $result;
    }
	
	
	public function get_faq_by_id($id)
    {		
        $result = $this->db->get_where('faqs', array('faq_id' => $id))->row();
        return $result;
    }
	


    public function save()
    {
       if ($this->session->userdata['user_role_id'] > 3) {
            return FALSE;
		}		
		
        $data = array();	
        $data['faq_ques'] = $this->input->post('faq_ques');
        $data['faq_ans'] = $this->input->post('faq_ans');
        $data['faq_created_by'] = $this->session->userdata['user_id'];
        $data['faq_last_modified_by'] = $this->session->userdata['user_id']; 	
        $data['faq_grp_id'] = '1';		
        $this->db->insert('faqs', $data);
        if ($this->db->affected_rows() == 1) {
            return $this->db->insert_id();
        } else {
            return FALSE;
        }
    }
	
	
    public function update($id)
    {
        if ($this->session->userdata['user_role_id'] > 3) {
            return FALSE;
        }
        $data = array();
        $data['faq_ques'] = $this->input->post('faq_ques', TRUE);
        $data['faq_ans'] = $this->input->post('faq_ans', TRUE);
        $data['faq_created_by'] = $this->session->userdata['user_id'];
        $data['faq_last_modified_by'] = $this->session->userdata['user_id'];
        $data['faq_grp_id'] = '1';
        $this->db->where('faq_id', $id);
        $this->db->update('faqs', $data);
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
	
	 public function delete($id)
    {
        if ($this->session->userdata('user_role_id') > 2){
            return FALSE;
        }
        $this->db->where('faq_id', $id);
        $this->db->delete('faqs');
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}

