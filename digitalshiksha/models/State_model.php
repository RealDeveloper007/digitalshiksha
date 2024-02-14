<?php

class State_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function states_dropdown($status,$prof=null)
    {
        $this->db->select('*');
        $this->db->from('state');
        $this->db->where('status',1);
        $this->db->order_by("state_name", "asc");
        $result = $this->db->get()->result_array();

        $dropdown=array();

          if($prof) {
        $dropdown[]='Select Profession State';
        } else {

        $dropdown[]='Select State';

        }
           
        foreach($result as $row)
        {
            $dropdown[$row['id']]=$row['state_name'];
        }
        return $dropdown;
    }
    
   
}
