<?php
function MainCategory($id=null)
{

        $CI = &get_instance();     
        // Get categories with exam count, sorted by exam count (most exams first)
        $CI->db->select('categories.*, COUNT(exam_title.title_id) as exam_count');
        $CI->db->from('categories');
        $CI->db->join('exam_title', 'exam_title.category_id = categories.category_id AND exam_title.batch_id = 0 AND exam_title.active = 1 AND exam_title.public = 1', 'left');
        $CI->db->where(['categories.active'=>1]);   
        $CI->db->group_by('categories.category_id');
        $CI->db->order_by('exam_count', 'DESC'); // Most exams first
        $CI->db->order_by('category_name', 'ASC'); // Then alphabetically
        $query = $CI->db->get();
        $AllCategories = "<option value='' disabled selected>Select Main Category</option>";
        foreach($query->result_array() as $skey)
        {
            if($id == $skey['category_id'])
            {
                $AllCategories .= "<option value='" . $skey['category_id'] . "' selected>" . $skey['category_name'] . "</option>";

            } else {

                $AllCategories .= "<option value='" .$skey['category_id'] . "'>" . $skey['category_name'] . "</option>";
            }

        }
        return $AllCategories;
}




function SubCategory($mid,$id=null)
{

        $CI = &get_instance();     
        $CI->db->select('*');
        $CI->db->from('sub_categories');
        $CI->db->where(['cat_id'=>$mid,'sub_cat_active'=>1]);   
        $CI->db->order_by('sub_cat_name','asc'); 
        $query = $CI->db->get();

        $AllCategories = "<option value='' disabled selected>Select Sub Category</option>";
        foreach($query->result_array() as $skey)
        {
            if($id == $skey['id'])
            {
                $AllCategories .= "<option value='" . $skey['id'] . "' selected>" . $skey['sub_cat_name'] . "</option>";

            } else {

                $AllCategories .= "<option value='" .$skey['id'] . "'>" . $skey['sub_cat_name'] . "</option>";
            }

        }
        return $AllCategories;
}

function SubSubCategory($sub_category,$id=null)
{

        $CI = &get_instance();     
        $CI->db->select('*');
        $CI->db->from('sub_sub_category');
        $CI->db->where(['sub_cat_id'=>$sub_category,'status'=>1]);  
        $CI->db->order_by('name','asc'); 
        $query = $CI->db->get();

        $AllCategories = "<option value='' disabled selected>Select Sub Sub Category</option>";
        foreach($query->result_array() as $skey)
        {
            if($id == $skey['id'])
            {
                $AllCategories .= "<option value='" . $skey['id'] . "' selected>" . $skey['name'] . "</option>";

            } else {

                $AllCategories .= "<option value='" .$skey['id'] . "'>" . $skey['name'] . "</option>";
            }

        }
        return $AllCategories;
}

?>