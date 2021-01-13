<?php

class Posts_model extends CI_Model{

        public function __construct(){

            $this->load->helper(array('url', 'download'));
            $this->load->database();
            $this->tblName = 'cbt_section_codes';
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

        public function get_section_codes(){
            $query = $this->db->get('cbt_section_codes');
            return $query->result_array();
        }

        public function get_sections(){
            $query = $this->db->get('cbt_add_section');
            return $query->result_array();
        }

        public function get_sections_filter(){

            $query = $this->db->query("SELECT school_code, count(*) section_name, school_name, SUM(population) AS value_sum 
            FROM cbt_add_section GROUP BY school_code;");
            return $query->result_array();
            // $this->db->insert('cbt_add_sections', $query->row_array());
        }

        public function get_batch(){
            $query = $this->db->get('cbt_add_batch');
            return $query->result_array();
        }
        
        public function get_subjects(){
            $query = $this->db->get('cbt_add_subject');
            return $query->result_array();
        }


        public function get_grade_level(){
            $query = $this->db->get('cbt_add_grade_level');
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
 
        public function get_bulk_file(){
            $query = $this->db->get('cbt_file');
            return $query->result_array();
        }

        public function get_LRN(){
            $query = $this->db->get('cbt_add_student');
            return $query->result_array();
            // $this->db->insert('cbt_add_sections', $query->row_array());
        }

            public function insert_post(){
                $data = array (
                    'school_name' => $this->input->post('schoolname'),
                    // 'slug'  => url_title($this->input->post('title'), '-', true),
                    'school_code' => $this->input->post('schoolcode')
                );
                return $this->db->insert('cbt_add_school', $data);          
        }

        public function insert_section(){
            $data = array (
                'section_code' => $this->input->post('section_code'),
            );
            return $this->db->insert('cbt_section_codes', $data);          
    }

        public function insert_batch(){
        $data = array (
            'batch_name' => $this->input->post('batch'),
        );
        return $this->db->insert('cbt_add_batch', $data);          
}

        public function insert_subject(){
            $data = array (
                'subject_name' => $this->input->post('subject'),
            );
            return $this->db->insert('cbt_add_subject', $data);          
        }

        public function insert_grade_level(){
            $data = array (
                'grade_level' => $this->input->post('grade_level'),
            );
        return $this->db->insert('cbt_add_grade_level', $data);          
}

        //insert schedule
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

        //insert section
        public function insert_sections(){
            $school_id = $this->input->post('schools');
            $data = array (
                'grade' => $this->input->post('gradelevel'),
                'section_name' => $this->input->post('sectionname'),
                'section_code' => $this->input->post('sectioncode'),
                'school_year' => $this->input->post('schoolyear'),
                'batch' => $this->input->post('batch'),
                'population' => $this->input->post('population')
            );
            $select = $this->db->select('school_name, school_code, school_id')->where('school_id', $school_id)->get('cbt_add_school');
            if($select->num_rows())
                {
                    $insert =  $this->db->insert('cbt_add_section', $select->row_array() + $data); 
                   
                }
            else{
                return false;
            }  
        }   

        //update school_and_section_list
        public function get_schools_and_section_list(){
            $query = $this->db->get('cbt_add_school');
            $sql = "SELECT SUM(section_code) AS TotalItemsOrdered FROM cbt_add_section";
            return $query->result_array();
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

        //Delete Section Code
        public function delete($id){
            // $id = $this->input->post('checked_id[]');
            
            if(is_array($id)){
                $this->db->where_in('section_id', $id);
            }else{
                $this->db->where('section_id', $id);
            }
            $delete = $this->db->delete('cbt_section_codes');
            return $delete?true:false;
        }

         //Delete Batch Code
         public function delete_batch($id){
            // $id = $this->input->post('checked_id[]');
            
            if(is_array($id)){
                $this->db->where_in('batch_id', $id);
            }else{
                $this->db->where('batch_id', $id);
            }
            $delete = $this->db->delete('cbt_add_batch');
            return $delete?true:false;
        }

           //Delete Subject
        public function delete_subject($id){
            // $id = $this->input->post('checked_id[]');
            
            if(is_array($id)){
                $this->db->where_in('subject_id', $id);
            }else{
                $this->db->where('subject_id', $id);
            }
            $delete = $this->db->delete('cbt_add_subject');
            return $delete?true:false;
        }

          //Delete Grade level
          public function delete_grade_level($id){
            // $id = $this->input->post('checked_id[]');
            
            if(is_array($id)){
                $this->db->where_in('grade_level_id', $id);
            }else{
                $this->db->where('grade_level_id', $id);
            }
            $delete = $this->db->delete('cbt_add_grade_level');
            return $delete?true:false;
        }

        public function delete_section($id){
            // $id = $this->input->post('checked_id[]');
            
            if(is_array($id)){
                $this->db->where_in('section_id', $id);
            }else{
                $this->db->where('section_id', $id);
            }
            $delete = $this->db->delete('cbt_add_section');
            return $delete?true:false;
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

            //search section
      
    }


