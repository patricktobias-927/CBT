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

            $query = $this->db->query("SELECT school_id, school_code, count(*) section_name, school_name, SUM(population) AS value_sum 
            FROM cbt_add_section GROUP BY school_code;");
            return $query->result_array();
            // $query = $this->db->query("SELECT school_code, count(*) section_name, school_name, SUM(population) AS value_sum 
            // FROM cbt_add_section GROUP BY school_code;");
            // return $query->result_array();
            // $this->db->insert('cbt_add_sections', $query->row_array());
        }

        public function get_batch(){
            $query = $this->db->get('cbt_add_batch');
            return $query->result_array();
        }

        public function get_custom_assessment(){
            $query = $this->db->get('cbt_add_custom_assessment');
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

    
        // public function getRecords(){
        //     $query = $this->db->get('cbt_add_section');
        //     return $query->result_array();
        // }
        // public function getRecordsWhere($price){

        //     $query = $this->db->query("SELECT * FROM cbt_add_section WHERE school_code = ".$school_code."");
        //     return $query->result_array();

        //     // $query="SELECT * from product where prod_price < ".$price."";
        //     // $result=mysqli_query($this->$con,$query);
        //     // return $result;
        // }




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

        public function insert_custom_assessment(){
            $data = array (
                'assessment_type' => $this->input->post('assessment_type'),
                'course1' => $this->input->post('course1'),
                'course2' => $this->input->post('course2'),
                'course3' => $this->input->post('course3'),
                'course4' => $this->input->post('course4'),
                'course5' => $this->input->post('course5'),
                'course6' => $this->input->post('course6'),
                'course_code1' => $this->input->post('course_code1'),
                'course_code2' => $this->input->post('course_code2'),
                'course_code3' => $this->input->post('course_code3'),
                'course_code4' => $this->input->post('course_code4'),
                'course_code5' => $this->input->post('course_code5'),
                'course_code6' => $this->input->post('course_code6')
            );
            return $this->db->insert('cbt_add_custom_assessment', $data);          
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
        
        //insert student
        public function insert_student(){
            $data = array (
                'LRN' => $this->input->post('LRN'),
                'phoenix_student_code' => $this->input->post('phoenix_student_code'),
                'first_name' => $this->input->post('first_name'),
                'middle_name' => $this->input->post('middle_name'),
                'last_name' => $this->input->post('last_name'),
                'birth_date' => $this->input->post('birthday'),
                'gender' => $this->input->post('gender'),
                'grade_level' => $this->input->post('grade_level'),
                'school_name' => $this->input->post('school_name'),
                
                'respondent_number2' => $this->input->post('respondent_number2'),
                'grade_level2' => $this->input->post('grade_level2'),
                'section2' => $this->input->post('section_2'),
                'batch2' => $this->input->post('batch_2'),
                'testing_date2' => $this->input->post('testing_date2'),
                'assessment_2' => $this->input->post('hidden_framework2'),

                'respondent_number3' => $this->input->post('respondent_number3'),
                'grade_level3' => $this->input->post('grade_level3'),
                'section3' => $this->input->post('section_3'),
                'batch3' => $this->input->post('batch_3'),
                'testing_date3' => $this->input->post('testing_date3'),
                'assessment_3' => $this->input->post('hidden_framework3'),

                'respondent_number4' => $this->input->post('respondent_number4'),
                'grade_level4' => $this->input->post('grade_level4'),
                'section4' => $this->input->post('section_4'),
                'batch4' => $this->input->post('batch_4'),
                'testing_date4' => $this->input->post('testing_date4'),
                'assessment_4' => $this->input->post('hidden_framework4'),

                'respondent_number5' => $this->input->post('respondent_number5'),
                'grade_level5' => $this->input->post('grade_level5'),
                'section5' => $this->input->post('section_5'),
                'batch5' => $this->input->post('batch_5'),
                'testing_date5' => $this->input->post('testing_date5'),
                'assessment_5' => $this->input->post('hidden_framework5'),

                'respondent_number1' => $this->input->post('respondent_number1'),
                'grade_level1' => $this->input->post('grade_level1'),
                'section1' => $this->input->post('section_1'),
                'batch1' => $this->input->post('batch_1'),
                'testing_date1' => $this->input->post('testing_date1'),
                'assessment_1' => $this->input->post('hidden_framework')

            );
            return $this->db->insert('cbt_students', $data);      
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

        public function get_students_list(){
            
            $query = $this->db->query("SELECT LRN, first_name, middle_name, last_name, school_name, gender,  birth_date
           FROM cbt_students GROUP BY LRN;");
            // $dateofBirth = 'birth_date';
            // $today = date("Y-d-m");
            // $diff = date_diff(date_create($dateofBirth), date_create($today));

            return $query->result_array();

            // $query = $this->db->get('cbt_students');
            // return $query->result_array();
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

       
      public function filter_section(){
        $section = $this->input->post('schools');
                    
        if($section != ""){
        $query = $this->db->select('*')->where('school_code', $section)->get('cbt_add_section');
        return $query->result_array();
        }
       
      }
    }


