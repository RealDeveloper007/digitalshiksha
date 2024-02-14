<?php

class Blog_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_popular_posts($id)
    {
        $this->db->select('count(blog_comments.blog_id) as total_comment,blog.*')
            ->from('blog')
            ->join('blog_comments', 'blog_comments.blog_id = blog.blog_id')
            ->where('blog.blog_id !=', $id)
            ->group_by('blog_comments.blog_id')
            ->order_by('total_comment', 'desc')
            ->limit(4);
        return $this->db->get()->result();
    }

    public function get_all()
    {
        if ($this->session->userdata('user_role_id') < 4) {
            $this->db->select('*')
                ->order_by('blog.blog_id', 'desc')
                ->from('blog')
                ->join('users', 'users.user_id = blog.author_id', 'left');
        } else {
            $this->db->select('*')
                ->where('blog.author_id', $this->session->userdata('user_id'))
                ->order_by('blog.blog_id', 'desc')
                ->from('blog')
                ->join('users', 'users.user_id = blog.author_id', 'left');
        }
        return $this->db->get()->result();
    }

    public function get_blog_by_id($id)
    {
        return $this->db->where('blog_id', $id)
            ->get('blog')->row();
    }

    public function get_blog_by_slug($id)
    {
        return $this->db->where('blog_slug', $id)
            ->get('blog')->row();
    }


    public function save()
    {

        //  date_default_timezone_set($this->session->userdata['time_zone']);

        $data = array();
        $data['blog_title'] = $this->input->post('blog_title', TRUE);
        $data['blog_slug'] = $this->input->post('blog_slug', TRUE);
        $data['blog_short_body'] = $this->input->post('blog_short_body', TRUE);
        $data['blog_body'] = $this->input->post('post_descr');

        if ($_FILES['media']['name']) {
            $config['upload_path'] = './blog_files/' . $this->input->post('media_type') . '/';

            //echo $config['upload_path']; die;
            if ($this->input->post('media_type') == 'image') {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
            } elseif ($this->input->post('media_type') == 'file') {
                $config['allowed_types'] = 'pdf';
            }

            $config['file_name'] = uniqid();
            $config['overwrite'] = TRUE;
            $config['max_size'] = '3048';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('media')) {
                $error = array('error' => $this->upload->display_errors('<div class="alert alert-danger">', '</div>'));
                $this->session->set_flashdata('message', $error['error']);
                redirect(base_url('blog/add/'));
            } else {
                $upload_data = $this->upload->data();
                $file_name = $this->input->post('media_type') . '/' . $upload_data['file_name'];
                $file_type = $this->input->post('media_type');

                $data['blog_media_type'] = $file_type;
                $data['blog_attachment'] = $file_name;
            }
        } else {
            $data['blog_media_type'] = $this->input->post('media_type');
            $data['blog_attachment'] = $this->input->post('media');
        }

        $data['author_id'] = $this->session->userdata('user_id');
        $data['blog_post_date'] = date('Y-m-d');

        $this->db->insert('blog', $data);
        if ($this->db->affected_rows() == 1) {
            return $this->db->insert_id();
        } else {
            return FALSE;
        }
    }

    public function update($id)
    {

        $data = array();
        $data['blog_title'] = $this->input->post('blog_title', TRUE);
        $data['blog_slug'] = $this->input->post('blog_slug', TRUE);
        $data['blog_short_body'] = $this->input->post('blog_short_body', TRUE);
        $data['blog_body'] = $this->input->post('blog_body');

        if ($_FILES['media']['name']) {
            $config['upload_path'] = './blog_files/' . $this->input->post('media_type') . '/';

            //echo $config['upload_path']; die;
            if ($this->input->post('media_type') == 'image') {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
            } elseif ($this->input->post('media_type') == 'file') {
                $config['allowed_types'] = 'pdf';
            }

            $config['file_name'] = uniqid();
            $config['overwrite'] = TRUE;
            $config['max_size'] = '3048';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('media')) {
                $error = array('error' => $this->upload->display_errors('<div class="alert alert-danger">', '</div>'));
                $this->session->set_flashdata('message', $error['error']);
                redirect(base_url('blog/edit/' . $id));
            } else {
                $upload_data = $this->upload->data();
                $file_name = $this->input->post('media_type') . '/' . $upload_data['file_name'];
                $file_type = $this->input->post('media_type');

                $data['blog_media_type'] = $file_type;
                $data['blog_attachment'] = $file_name;
            }
        } else {
            if ($this->input->post('media_type') == 'video') {
                $data['blog_media_type'] = $this->input->post('media_type');
                $data['blog_attachment'] = $this->input->post('media');
            }
        }


        $this->db->where('blog_id', $id);
        $this->db->update('blog', $data);
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function delete($id)
    {
        $this->db->where('blog_id', $id);
        $this->db->delete('blog');
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get_blogs($per_page, $offset, $name = null)
    {
        if ($name) {
            $this->db->select('*')
                ->like('blog.blog_title', $name)
                ->order_by('blog.blog_id', 'desc')
                ->limit($per_page, $offset)
                ->from('blog')
                ->join('users', 'users.user_id = blog.author_id', 'left');
            return $this->db->get()->result();
        } else {
            $this->db->select('*')
                ->order_by('blog.blog_id', 'desc')
                ->limit($per_page, $offset)
                ->from('blog')
                ->join('users', 'users.user_id = blog.author_id', 'left');
            return $this->db->get()->result();
        }
    }
    public function get_post($id)
    {
        $this->db->select('*')
            ->where('blog.blog_id', $id)
            ->from('blog')
            ->join('users', 'users.user_id = blog.author_id', 'left');
        return $this->db->get()->row();
    }

    public function get_post_details_by_slug($id)
    {
        $this->db->select('*')
            ->where('blog.blog_slug', $id)
            ->from('blog')
            ->join('users', 'users.user_id = blog.author_id', 'left');
        return $this->db->get()->row();
    }


    public function get_latest_blogs($count)
    {
        $result = $this->db->select('*')
            ->order_by('blog.blog_id', 'desc')
            ->from('blog')
            ->limit($count)
            ->join('users', 'users.user_id = blog.author_id', 'left')
            ->get()->result();
        return $result;
    }

    public function find()
    {
        $keyword = $this->input->post('keyword', TRUE);
        //   echo "<pre/>"; print_r($keyword); exit();
        $this->db->select('*')
            ->order_by('blog.blog_id', 'desc')
            ->like('blog.blog_title', $keyword)
            ->or_like('blog.blog_body', $keyword)
            ->from('blog')
            ->join('users', 'users.user_id = blog.author_id', 'left');
        return $this->db->get()->result();
    }

    public function get_post_comments($id)
    {
        return $this->db->where('blog_comments.blog_id', $id)
            ->order_by('blog_comments.comment_id', 'desc')
            ->from('blog_comments')
            ->join('users', 'users.user_id = blog_comments.comment_author_id')
            ->get()
            ->result();
    }
    public function save_comment()
    {
        if ($this->input->post('blog_comment') == '') {
            return false;
        }
        date_default_timezone_set($this->session->userdata['time_zone']);
        $data['comment_body'] = $this->input->post('blog_comment', TRUE);
        $data['blog_id'] = $this->input->post('blog_id', TRUE);
        $data['comment_author_id'] = $this->session->userdata('user_id');
        $data['comment_date'] = date('Y-m-d');

        $this->db->insert('blog_comments', $data);
    }
}
