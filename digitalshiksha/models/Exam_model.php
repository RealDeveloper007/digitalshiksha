<?php

class Exam_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_mocks($examId = null, $limit = null, $start = null)
    {
        if ($this->input->get('name')) {
            if ($examId == 'mock_test') {
                $result = $this->db->select('*')
                    ->select("exam_title.active AS exam_active")
                    ->from('exam_title')
                    ->join('sub_categories', 'sub_categories.id = exam_title.sub_category_id')
                    ->join('categories', 'categories.category_id = exam_title.category_id')
                    ->join('users', 'users.user_id = exam_title.user_id')
                    ->like('exam_title.title_name', $this->input->get('name'))
                    ->where('exam_title.batch_id', 0)
                    ->order_by("exam_created", "desc")
                    ->limit($limit, $start)
                    ->get()
                    ->result();
            } else {
                $result = $this->db->select('*')
                    ->select("exam_title.active AS exam_active")
                    ->from('exam_title')
                    ->join('sub_categories', 'sub_categories.id = exam_title.sub_category_id')
                    ->join('categories', 'categories.category_id = exam_title.category_id')
                    ->join('users', 'users.user_id = exam_title.user_id')
                    ->like('exam_title.title_name', $this->input->get('name'))
                    ->where('batch_id !=', 0)
                    ->order_by("exam_created", "desc")
                    ->limit($limit, $start)
                    ->get()
                    ->result();
            }
        } else {
            if ($examId == 'mock_test') {

                $result = $this->db->select('*')
                    ->select("exam_title.active AS exam_active")
                    ->from('exam_title')
                    ->join('sub_categories', 'sub_categories.id = exam_title.sub_category_id')
                    ->join('categories', 'categories.category_id = exam_title.category_id')
                    ->join('users', 'users.user_id = exam_title.user_id')
                    ->where('batch_id', 0)
                    ->limit($limit, $start)
                    ->order_by("exam_created", "desc")
                    ->get()
                    ->result();
            } else {
                $result = $this->db->select('*')
                    ->select("exam_title.active AS exam_active")
                    ->from('exam_title')
                    ->join('sub_categories', 'sub_categories.id = exam_title.sub_category_id')
                    ->join('categories', 'categories.category_id = exam_title.category_id')
                    ->join('users', 'users.user_id = exam_title.user_id')
                    ->where('batch_id !=', 0)
                    ->order_by("exam_created", "desc")
                    ->limit($limit, $start)
                    ->get()
                    ->result();
            }
        }

        return $result;
    }

    public function get_categories()
    {
        $this->db->order_by('category_name', 'asc');
        $result = $this->db->get('categories')->result();
        return $result;
    }


    public function get_all_mock_detail($ids)
    {
        $this->db->where_in('exam_id', $ids);
        $result = $this->db->get('questions')->result();
        return $result;
    }


    public function get_single_mock_details($id)
    {
        $this->db->select("exam_title.*,exam_title.active AS exam_active,users.user_photo,users.user_name,categories.category_name,sub_categories.sub_cat_name,sub_sub_category.name as sub_sub_sub_name,batch.batch_name,batch.batch_code");
        $this->db->from('exam_title');
        $this->db->join('sub_sub_category', 'sub_sub_category.id = exam_title.sub_sub_category_id');
        $this->db->join('sub_categories', 'sub_categories.id = exam_title.sub_category_id');
        $this->db->join('categories', 'exam_title.category_id = categories.category_id');
        $this->db->join('batch', 'exam_title.batch_id = batch.id');
        $this->db->join('users', 'users.user_id = exam_title.user_id');
        $this->db->where(['exam_title.title_id' => $id, 'exam_title.user_id' => $this->session->userdata('user_id')]);
        $result = $this->db->get();
        $result = $result->result()[0];
        return $result;
    }

    public function get_students_results($id)
    {
        $this->db->select('result.*,exam_title.pass_mark,users.user_name,users.user_phone');
        $this->db->select("users.user_id AS user_id");
        $this->db->select("result.user_id AS result_user_id");
        $this->db->select("exam_title.user_id AS exam_title_user_id");
        $this->db->from('result');
        $this->db->order_by('result.result_percent', 'asc');
        $this->db->join('users', 'users.user_id = result.user_id');
        $this->db->join('exam_title', 'exam_title.title_id = result.exam_id');
        $this->db->where('exam_title.title_id', $id);
        $result = $this->db->get();

        // echo $this->db->last_query(); die;
        return   $result->result();
    }



    public function get_choose_categories($subject = null)
    {
        $this->db->order_by('category_name', 'asc');
        // $this->db->where(['categories.is_exist'=>1,'status',1]);
        if ($subject) {
            $this->db->like('category_name', $subject);
            $this->db->or_like('category_name', 'syllabus');
        }
        $result = $this->db->get('categories')->result();
        return $result;
    }


    public function get_assign_categories()
    {
        $UserDetails = $this->db->where('user_id', $this->session->userdata('user_id'))->get('users')->result()[0];

        $UserAssignCategory = explode(',', $UserDetails->assign_categories);

        $this->db->order_by('category_name', 'asc');
        $this->db->where_in('category_id', $UserAssignCategory);
        $result = $this->db->get('categories')->result();
        return $result;
    }

    public function get_categories_with_author()
    {
        $this->db->select('*');
        $this->db->select("users.active AS user_active");
        $this->db->select("categories.active AS category_active");
        $this->db->from('categories');
        $this->db->join('users', 'users.user_id = categories.created_by');
        $result = $this->db->get()->result();
        return $result;
    }


    public function get_subcategories()
    {
        $this->db->select('*');
        $this->db->from('sub_categories');
        $result = $this->db->get()->result();
        return $result;
    }

    public function get_subcategories_by_catid($category_id)
    {
        $this->db->select('*');
        $this->db->from('sub_categories');
        $this->db->where('cat_id', $category_id);
        $result = $this->db->get()->result();
        return $result;
    }


    public function get_subsubcategories_by_catid($subcategory_id)
    {
        $this->db->select('*');
        $this->db->from('sub_sub_category');
        $this->db->where('sub_cat_id', $subcategory_id);
        if ($this->session->userdata['user_role_id'] == 4) {
            $this->db->where('created_by', $this->session->userdata['user_id']);
        }

        $result = $this->db->get()->result();
        return $result;
    }

    public function get_sub_subsubcategories_by_catid($sub_sub_cat_id)
    {
        $this->db->select('*');
        $this->db->from('sub_sub_sub_category');
        $this->db->where('sub_sub_cat_id', $sub_sub_cat_id);
        $result = $this->db->get()->result();
        return $result;
    }


    public function get_subcategories_with_category()
    {
        $this->db->select('*');
        $this->db->from('sub_categories');
        $this->db->join('categories', 'categories.category_id = sub_categories.cat_id');
        $result = $this->db->get()->result();
        return $result;
    }

    public function get_mocks_by_category($cat_id, $sub_cat_id, $sub_sub_cat_id, $limit = null, $start = null)
    {
        $result = $this->db->select('*')
            ->select("exam_title.active AS exam_active")
            ->from('exam_title')
            ->where(['exam_title.category_id' => $cat_id, 'exam_title.sub_category_id' => $sub_cat_id, 'exam_title.sub_sub_category_id' => $sub_sub_cat_id])
            ->join('sub_categories', 'sub_categories.id = exam_title.sub_category_id', 'left')
            ->join('categories', 'sub_categories.cat_id = categories.category_id', 'left')
            ->join('users', 'users.user_id = exam_title.user_id')
             ->where('exam_title.batch_id', 0)
            ->limit($limit, $start)
            ->get()->result();
        return $result;
    }

    public function get_syllabus_by_category($cat_id, $sub_cat_id, $sub_sub_cat_id)
    {
        $result = $this->db->select('*')
            ->select("sub_sub_sub_category.name")
            ->from('sub_sub_sub_category')
            ->where(['cat_id' => $cat_id, 'sub_cat_id' => $sub_cat_id, 'sub_sub_cat_id' => $sub_sub_cat_id, 'status' => 1])
            ->get()->result();
        return $result;
    }

    public function get_latest_exams($count)
    {
        $result = $this->db->select('*')
            ->select("exam_title.active AS exam_active")
            ->order_by('exam_title.title_id', 'desc')
            ->from('exam_title')
            ->limit($count)
            ->join('sub_categories', 'sub_categories.id = exam_title.category_id', 'left')
            ->join('categories', 'sub_categories.cat_id = categories.category_id', 'left')
            ->join('users', 'users.user_id = exam_title.user_id')
            ->get()->result();
        return $result;
    }

    public function get_mocks_by_price($type)
    {
        if ($type === 'free') {
            $result = $this->db->select('*')
                ->select("exam_title.active AS exam_active")
                ->from('exam_title')
                ->where('exam_title.exam_price', 0)
                ->join('sub_categories', 'sub_categories.id = exam_title.category_id', 'left')
                ->join('categories', 'sub_categories.cat_id = categories.category_id', 'left')
                ->join('users', 'users.user_id = exam_title.user_id')
                ->get()->result();
        } else if ($type === 'paid') {
            $result = $this->db->select('*')
                ->select("exam_title.active AS exam_active")
                ->from('exam_title')
                ->where('exam_title.exam_price >', 0)
                ->join('sub_categories', 'sub_categories.id = exam_title.category_id', 'left')
                ->join('categories', 'sub_categories.cat_id = categories.category_id', 'left')
                ->join('users', 'users.user_id = exam_title.user_id')
                ->get()->result();
        } else {
            redirect(base_url('exam_control/view_all_mocks'));
        }
        return $result;
    }

    public function QuestionRightAnswer($qid, $type)
    {

        $result = $this->db->select('*')
            ->from('answers')
            ->where(['ques_id' => $qid, 'right_ans' => 1])
            ->get()
            ->result()[0]->ans_id;

        return $result;
    }

    public function get_mock_title($id)
    {
        if (!is_numeric($id)) {
            return FALSE;
        }
        $this->db->select('*');
        $this->db->where('title_id', $id);
        $this->db->from('exam_title');
        $result = $this->db->get()->row();
        return $result;
    }

    public function get_mock_detail($id)
    {
        if (!is_numeric($id)) {
            return FALSE;
        }
        $this->db->where('exam_id', $id);
        $result = $this->db->get('questions')->result();
        return $result;
    }

    /* public function get_mock_answers($info)
    {
        $data = array();
        foreach ($info as $value) {
            $data[$value->ques_id][] = $this->db->where('ques_id', $value->ques_id)
                    ->from('answers')
                    ->get()
                    ->result();
        }
        return $data;
    }*/

    public function get_mock_answers($info, $type = null)
    {
        $data = array();
        foreach ($info as $value) {
            if ($type == 0) {
                $this->db->where('ques_id', $value->ques_id);
                $this->db->from('answers');
                $this->db->order_by("ans_id", "asc");
                $result = $this->db->get()->result();

                $data[$value->ques_id][] = $result;
            } else {

                $this->db->where('ques_id', $value->ques_id);
                $this->db->from('answers_upload');
                $this->db->order_by("ans_id", "asc");
                $result = $this->db->get()->result();

                $data[$value->ques_id][] = $result;
            }
        }
        return $data;
    }


    public function mock_count($info)
    {
        $data = array();
        foreach ($info as $value) {
            $data[$value->id] = $this->db->where('category_id', $value->id)
                ->where("active", 1)
                ->from('exam_title')
                ->count_all_results();
        }
        return $data;
    }

    public function course_count($info)
    {
        $data = array();
        foreach ($info as $value) {
            $data[$value->id] = $this->db->where('category_id', $value->id)
                ->where("active", 1)
                ->from('courses')
                ->count_all_results();
        }
        return $data;
    }

    public function question_count_by_id($id)
    {
        $total = $this->db->where('exam_id', $id)
            ->from('questions')
            ->count_all_results();
        return $total;
    }

    public function get_item_detail($id)
    {
        $result = $this->db->select('title_name,exam_price')
            ->where('title_id', $id)
            ->from('exam_title')
            ->get()
            ->row();
        return $result;
    }

    /**
     * 
     * @param type $id
     * @return object
     */
    public function get_mock_by_id($id)
    {
        $result = $this->db->select('*')
            ->select("TIME_TO_SEC(exam_title.time_duration) AS duration")
            ->from('exam_title')
            ->where('exam_title.title_id', $id)
            ->join('sub_categories', 'sub_categories.id = exam_title.sub_category_id', 'left')
            ->join('categories', 'sub_categories.cat_id = categories.category_id', 'left')
            ->get()
            ->row();
        return $result;
    }

    public function get_mock_by_slug($slug)
    {
        $result = $this->db->select('*')
            ->select("TIME_TO_SEC(exam_title.time_duration) AS duration")
            ->from('exam_title')
            ->where('exam_title.slug', $slug)
            ->join('sub_categories', 'sub_categories.id = exam_title.sub_category_id', 'left')
            ->join('categories', 'sub_categories.cat_id = categories.category_id', 'left')
            ->get()
            ->row();
        return $result;
    }

    public function get_live_result_check($user_id, $exam_id)
    {
        $result = $this->db->select('*')
            ->from('result')
            ->where(['result.user_id' => $user_id, 'result.exam_id' => $exam_id])
            ->get()
            ->num_rows();
        return $result;
    }
    
     public function get_recent_exam_result_check($user_id, $exam_id)
    {
        $result = $this->db->select('exam_taken_date,result_id')
            ->from('result')
            ->order_by("result_id", "desc")
            ->where(['result.user_id' => $user_id, 'result.exam_id' => $exam_id])
            ->get()
            ->row();
        return $result;
    }


    public function get_question_by_id($id)
    {
        $result = $this->db->select('*')
            ->from('questions')
            ->where('questions.ques_id', $id)
            ->join('exam_title', 'exam_title.title_id = questions.exam_id', 'left')
            ->get()
            ->row();
        return $result;
    }

    public function get_answer_by_id($id)
    {
        $result = $this->db->select('*')
            ->from('answers')
            ->where('answers.ans_id', $id)
            ->join('questions', 'questions.ques_id = answers.ques_id', 'left')
            ->join('exam_title', 'exam_title.title_id = questions.exam_id', 'left')
            ->get()
            ->row();
        return $result;
    }

    public function get_all_results($userId = null, $limit = null, $start = null)
    {
        //echo"helo"; die;
        $this->db->select('*');
        $this->db->select("users.user_id AS user_id");
        $this->db->select("result.user_id AS result_user_id");
        $this->db->select("exam_title.user_id AS exam_title_user_id");
        $this->db->from('result');
        $this->db->order_by("result.exam_taken_date", "desc");
        $this->db->join('users', 'users.user_id = result.user_id', 'left');
        $this->db->join('exam_title', 'exam_title.title_id = result.exam_id', 'left');
        $this->db->where('exam_title.batch_id', 0);
        if ($userId != null) {

            if ($this->session->userdata('user_role_id') == 4) {
                $this->db->where('exam_title.user_id', $userId);
                $this->db->limit($limit, $start);
            } else if ($this->session->userdata('user_role_id') == 5) {
                $this->db->where('result.user_id', $userId);
            } else {
                $this->db->limit($limit, $start);
            }
        } else {
            $this->db->limit($limit, $start);
        }

        $result =  $this->db->get();
        return   $result->result();

        // return $result;
    }

    public function get_all_results1($userId = null)
    {
        //echo"Hello"; die;
        $this->db->select('*');
        $this->db->select("users.user_id AS user_id");
        $this->db->select("result.user_id AS result_user_id");
        $this->db->select("exam_title.user_id AS exam_title_user_id");
        $this->db->from('result');
        $this->db->order_by("result.exam_taken_date", "desc");
        $this->db->join('users', 'users.user_id = result.user_id', 'left');
        $this->db->join('exam_title', 'exam_title.title_id = result.exam_id', 'left');
        $this->db->where('exam_title.batch_id !=', 0);
        if ($userId != null) {
            // $this->db->where('result.user_id',$userId);

            if ($this->session->userdata('user_role_id') == 4) {
                $this->db->where('exam_title.user_id', $userId);
            } else if ($this->session->userdata('user_role_id') == 5) {
                $this->db->where('result.user_id', $userId);
            }
        } else {
            $this->db->limit($limit, $start);
        }


        $result = $this->db->get();
        return   $result->result();

        // return $result;
    }


    public function count_all_results()
    {
        $this->db->select('*');
        $this->db->select("users.user_id AS user_id");
        $this->db->select("result.user_id AS result_user_id");
        $this->db->select("exam_title.user_id AS exam_title_user_id");
        $this->db->from('result');
        $this->db->order_by("result.exam_taken_date", "desc");
        $this->db->join('users', 'users.user_id = result.user_id', 'left');
        $this->db->join('exam_title', 'exam_title.title_id = result.exam_id', 'left');

        if ($this->session->userdata('user_role_id') == 4) {
            $this->db->where('exam_title.user_id', $userId);
        }

        $result =       $this->db->get();
        return   $result->num_rows();

        // return $result;
    }

    public function get_my_results($id, $limit = null, $start = null)
    {
        //echo $id; die;
        $this->db->select('*');
        $this->db->from('result');
        $this->db->where('result.user_id', $id);
        $this->db->order_by("result.exam_taken_date", "desc");
        $this->db->join('users', 'users.user_id = result.user_id', 'left');
        $this->db->join('exam_title', 'exam_title.title_id = result.exam_id', 'left');
        $this->db->where('batch_id', 0);
        // if($limit && $start)
        // {
        //     $this->db->limit($limit, $start);
        // }

        $result =  $this->db->get();
        return   $result->result();
    }

    public function get_my_results1($id)
    {
        $this->db->select('*');
        $this->db->from('result');
        $this->db->where('result.user_id', $id);
        $this->db->order_by("result.exam_taken_date", "desc");
        $this->db->join('users', 'users.user_id = result.user_id', 'left');
        $this->db->join('exam_title', 'exam_title.title_id = result.exam_id', 'left');
        $this->db->where('batch_id !=', 0);
        $result =  $this->db->get();
        return   $result->result();
    }

    public function view_result_detail($id)
    {
        $result = $this->db->select('*')
            ->select('result.user_id AS participant_id')
            ->from('result')
            ->where('result.result_id', $id)
            ->join('users', 'users.user_id = result.user_id', 'left')
            ->join('exam_title', 'exam_title.title_id = result.exam_id', 'left')
            ->get()
            ->row();
        return $result;
    }

    public function get_result_by_id($id)
    {
        $result = $this->db->select('*')
            ->from('result')
            ->where('result_id', $id)
            ->get()
            ->row();
        return $result;
    }

    public function evaluate_result()
    {
        // echo "<pre/>"; echo "_POST"; print_r($_POST);  exit();

        $exam_id = $this->input->post('exam_id');
        $exam_detail = $this->db->where('title_id', $exam_id)->get('exam_title')->row();
        $total_ques = $exam_detail->random_ques_no;

        $answers = $this->input->post('ans');
        $right_ans_count = 0;
        if ($answers) {
            $result_json = '{';
            foreach ($answers as $key => $answer) {
                $result_json .= '"' . $key . '"';
                $result_json .= ':';
                $result_json .= '"';

                $temp = $this->db->where('ques_id', $key)->from('answers')->get()->result_array();
                if (is_array($answer)) {
                    $tmp_count = array_count_values(array_column($temp, 'right_ans'))['1'];
                    $temp_ans_count = 0;
                    foreach ($answer as $tmp_ans) {
                        foreach ($temp as $tmp_val) {
                            if (($tmp_ans == $tmp_val['ans_id']) and ($tmp_val['right_ans'] == 1)) {
                                $temp_ans_count++;
                            }
                        }
                        $result_json .= $tmp_ans . ',';
                    }
                    if ($temp_ans_count == $tmp_count) {
                        $right_ans_count++;
                    }
                } else {
                    foreach ($temp as $tmp_val) {
                        if (($answer == $tmp_val['ans_id']) and ($tmp_val['right_ans'] == 1)) {
                            $right_ans_count++;
                        }
                    }
                    $result_json .= $answer . ',';
                }
                $result_json = substr($result_json, 0, -1);
                $result_json .= '",';
            }
            $result_json = substr($result_json, 0, -1);
            $result_json .= '}';
            $data['result_json'] = trim($result_json);
        } else {
            return FALSE;
        }


        // date_default_timezone_set($this->session->userdata['time_zone']);
                     date_default_timezone_set('Asia/Kolkata');

        $result = round(($right_ans_count / $total_ques) * 100, 2);
        $data['exam_id'] = $exam_id;
        $data['user_id'] = $this->session->userdata('user_id');
        $data['result_percent'] = $result;
        $data['question_answered'] = $right_ans_count;
        $data['exam_taken_date'] = date('Y-m-d H:i:s');

        // echo "<pre/>"; print_r($data); exit();

        $this->db->insert('result', $data);
        if ($this->db->affected_rows() == 1) {
            return $this->db->insert_id();
        } else {
            return FALSE;
        }
    }
    // public function evaluate_result()
    // {
    //     echo "<pre/>"; echo "_POST"; print_r($_POST);  exit();
    //     $num_of_ans = $this->input->post('num_of_ans');
    //     $answers = $this->input->post('ans');
    //     $total_ques = $this->input->post('total_ques');
    //     $exam_id = $this->input->post('exam_id');
    //     $right_ans_count = 0;
    //     if ($answers) {
    //         foreach ($answers as $key => $answer) {
    //             if (is_array($answer)) {
    //                 if (count($answer) != $num_of_ans[$key]) {
    //                     continue;
    //                 } else {
    //                     foreach ($answer as $val) {
    //                         if ($val != 1) {
    //                             continue 2;
    //                         }
    //                     }
    //                     $right_ans_count++;
    //                 }
    //             } else {
    //                 if ($answer == 1) {
    //                     $right_ans_count++;
    //                 }
    //             }
    //         }
    //     } else {
    //         return FALSE;
    //     }
    //     date_default_timezone_set($this->session->userdata['time_zone']);
    //     $result = round(($right_ans_count / $total_ques) * 100, 2);
    //     $data = array();
    //     $data['exam_id'] = $exam_id;
    //     $data['user_id'] = $this->session->userdata('user_id');
    //     $data['result_percent'] = $result;
    //     $data['question_answered'] = $total_ques;
    //     $data['exam_taken_date'] = date('Y-m-d H:i:s');
    //     $this->db->insert('result', $data);
    //     if ($this->db->affected_rows() == 1) {
    //         return $this->db->insert_id();
    //     } else {
    //         return FALSE;
    //     }
    // }

    public function delete_result($id)
    {
        $this->db->where('result_id', $id)
            ->delete('result');
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function set_payment_detail($info)
    {
        $data = array();
        $data['payer_id'] = $info['PayerID'];
        $data['token'] = $info['token'];
        $data['pay_amount'] = $info['pay_amount'];
        $data['payment_type'] = 'Exam';
        $data['currency_code'] = $info['currency_code'];
        $data['user_id_ref'] = $this->session->userdata('user_id');
        $data['payment_reference'] = $info['exam_title'];
        $data['pay_date'] = date('Y-m-d');
        $data['pay_method'] = $info['method'];
        $data['gateway_reference'] = $info['gateway_reference'];
        $this->db->insert('payment_history', $data);
        if ($this->db->affected_rows() == 1) {
            return $this->db->insert_id();
        } else {
            return FALSE;
        }
    }

    public function get_pay_token($exam_id, $token_id)
    {
        $result = $this->db->select('*')
            ->where('pay_id', $token_id)
            ->where('token', $this->session->userdata('payment_token'))
            ->where('user_id_ref', $this->session->userdata('user_id'))
            ->from('payment_history')
            ->get()
            ->row();
        return $result;
    }

    public function get_request_batches($userId)
    {
        $results = $this->db->where('status', 1)->get('batch')->result();
        $batches = [];
        if (count($results) > 0) {
            foreach ($results as $key) {
                if ($key->students != '') {
                    $explode_students = explode(',', $key->students);
                    if (in_array($userId, $explode_students)) {
                        $join_student = explode(',', $key->join_students);
                        $decline_student = explode(',', $key->decline_students);
                        $decline_student_status = explode(',', $key->decline_student_status);
                        if (in_array($userId, $join_student)) {
                            $status = 'Join';
                        } elseif (in_array($userId, $decline_student)) {
                            if (($key1 = array_search($userId, $decline_student)) !== false) {
                                $status_code = explode('-', $decline_student_status[$key1]);
                                if ($status_code[1] == 'S') {
                                    $status = 'Decline By You';
                                } else {
                                    $status = "Decline By Teacher";
                                }
                            }
                        } else {
                            $status = '1';
                        }
                        $user_detail = $this->db->where('user_id', $key->created_by)->get('users')->row();
                        $batches[] = [
                            'id'          => $key->id,
                            'batch_name'  => $key->batch_name,
                            'batch_code'  => $key->batch_code,
                            'created_at'  => date('d-m-Y h:i:s', strtotime($key->created_at)),
                            'status'      => $status,
                            'created_by'  => $user_detail->user_name
                        ];
                    }
                }
            }
        }
        return $batches;
    }

    public function get_questions($id)
    {
        $mock_detail = $this->db->where('title_id', $id)->get('exam_title')->row();
        $subcategory_mocks = $this->db->where('title_id !=', $id)->where('sub_sub_category_id', $mock_detail->sub_sub_category_id)->get('exam_title')->result();
        if (count($subcategory_mocks) > 0) {
            $exam_ids = [];
            foreach ($subcategory_mocks as $key) {
                $exam_ids[] = $key->title_id;
            }
            $results = $this->db->distinct()
                ->select('question')
                ->from('questions')
                ->where_in('exam_id', $exam_ids)
                ->get()->result();
            if (count($results) > 0) {
                $ques_ids = [];
                foreach ($results as $key) {
                    //echo $key->question; die;
                    $ques_detail = $this->db->where('question', $key->question)->get('questions')->row();
                    $ques_ids[]  = $ques_detail->ques_id;
                }
                // echo"<pre>";
                // print_r($ques_ids); die;
                $results1 = $this->db->select('*')
                    ->from('questions')
                    ->where_in('ques_id', $ques_ids)
                    ->get()->result();
                // echo"<pre>";
                // print_r($results1); die;                                   
                return $results1;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
