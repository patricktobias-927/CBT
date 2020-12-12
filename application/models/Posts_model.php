<?php

class Posts_model extends CI_Model{

        public function __construct(){

            $this->load->database();
        }
        public function get_posts(){

            $query = $this->db->get('post');
            return $query->result_array();

        }

        public function get_records(){
            $query = $this->db->get('cbt_add_school');
            return $query->result_array();
        }
        public function get_schedule(){
            $query = $this->db->get('cbt_add_schedule');
            return $query->result_array();
        }
        public function get_records_single(){
            $result = $this->db->get('cbt_add_school');
            return $result->row_array();
        }
        
        public function get_posts_single($param){
            $this->db->where('Slug', $param);
            $result = $this->db->get('post');
            return $result->row_array();

        }
        public function get_posts_edit($param){
            $this->db->where('id', $param);
            $result = $this->db->get('post');

            return $result->row_array();

        }
            public function insert_post(){
                $data = array (
                    'school_name' => $this->input->post('schoolname'),
                    // 'slug'  => url_title($this->input->post('title'), '-', true),
                    'school_code' => $this->input->post('schoolcode')
                );
                return $this->db->insert('cbt_add_school', $data);          
        }


    
        public function insert_schedule(){
            $school_id = $this->input->post('schools');
            $data = array (
                'school_year' => $this->input->post('school_year'),
                'testing_date' => $this->input->post('daterange'),
                'no_of_takers' => $this->input->post('no_of_takers')
            );
            $select = $this->db->select('school_name, school_code')->where('school_id', $school_id)->get('cbt_add_school');
            if($select->num_rows())
                {
                   
                    $insert =  $this->db->insert('cbt_add_schedule', $select->row_array() + $data); 
                   
            }
            else{
                return false;
            }  
        }   
    
        public function update_post(){
            $id = $this->input->post('id');
            $data = array (

                'title' => $this->input->post('title'),
                'body' => $this->input->post('body')
            );
            $this->db->where('id', $id);
            return $this->db->update('post', $data);        
    }
        public function delete_post(){
            $id = $this->input->post('id');
            $this->db->where('id', $id);
            $this->db->delete('post');

            return true;     
        }

        public function login(){

            $this->db->where('email', $this->input->post('username', true));
            $this->db->where('password', $this->input->post('password', true));
            $result = $this->db->get('user');

            if($result->num_rows() == 1){
                return $result->row_array();

            }else{
                return false;
        }
    }
}