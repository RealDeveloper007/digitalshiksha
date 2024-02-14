<?php

class District_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function districts_dropdown($stateid=null,$prof=null)
    {
        $this->db->select('*');
        $this->db->from('district');

        if($prof) {
            $select = "Select Profession District";
        } else {

            $select = "Select District";

        }
        $this->db->where(['status'=>1,'state_id'=>$stateid]);
        $this->db->order_by("district", "asc");

        $result = $this->db->get()->result_array();

        $dropdown=array();
        $dropdown[]=$select;
        foreach($result as $row)
        {
             $dropdown[$row['id']]=$row['district'];
        }
        return $dropdown; 
    }

    public function GetDistrictDetails($id)
    {
        $this->db->select('*');
        $this->db->from('district');
        $this->db->where(['status'=>1,'id'=>$id]);
        $result = $this->db->get()->result();

        return isset($result[0]->district) ? $result[0]->district : '';
    }

}
