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
            $query = $this->db->get('cbt_students');
            return $query->result_array();
            // $this->db->insert('cbt_add_sections', $query->row_array());
        }

        public function get_masterlist(){
            $query = $this->db->get('cbt_masterlist_info');
            return $query->result_array();
        }

        public function get_last(){
                 
            $query = $this->db->query("SELECT masterlist_id
           FROM cbt_masterlist_info ORDER BY masterlist_id DESC LIMIT 1;");
            return $query->result_array();

          
        }


       // To get last record form the table



    
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
            $section_id = $this->input->post('section');
            $data = array (
                'LRN' => $this->input->post('LRN'),
                'phoenix_student_code' => $this->input->post('phoenix_student_code'),
                'first_name' => $this->input->post('first_name'),
                'middle_name' => $this->input->post('middle_name'),
                'last_name' => $this->input->post('last_name'),
                'birth_date' => $this->input->post('birthday'),
                'gender' => $this->input->post('gender'),
                'grade_level' => $this->input->post('grade_level'),
                'school_code' => $this->input->post('school_name'),
                
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
            $select = $this->db->select('section_id, section_name, section_code')->where('section_id', $section_id)->get('cbt_add_section');
            if($select->num_rows())
            {
                $insert =  $this->db->insert('cbt_students', $select->row_array() + $data); 
                }
            else{
                return false;
            }  
        }   


        public function insert_masterlist(){

            $school_id = $this->input->post('cbt_school_name');
            $section_id = $this->input->post('cbt_section');

          $data = array (
                'school_acronym' => $this->input->post('school_acronym'),
                'school_year' => $this->input->post('cbt_school_year'),
                'grade_level' => $this->input->post('cbt_grade_level'),
                'assessment_id' => $this->input->post('cbt_hidden_framework'),
                'batch' => $this->input->post('cbt_batch'),
                'extra_accounts' => $this->input->post('cbt_extra')
            );

            $select1 = $this->db->select('school_name, school_code')->where('school_id', $school_id)->get('cbt_add_school');
            $select2 = $this->db->select('section_name, section_code')->where('section_id', $section_id)->get('cbt_add_section');
            if($select2->num_rows())
                {
                    $insert =  $this->db->insert('cbt_masterlist_info', $select1->row_array() + $select2->row_array() + $data); 
                   
                }
            else{
                return false;
            }  
        }   

 
            // return $this->db->insert('cbt_students', $data);      
        // }  

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
            
            $query = $this->db->query("SELECT cs.LRN as LRN, cs.first_name, cs.middle_name, cs.last_name, cas.school_name, cs.gender,  cs.birth_date
           FROM cbt_students cs LEFT JOIN cbt_add_school cas ON cs.school_code = cas.school_code  GROUP BY LRN;");




            // $dateofBirth = 'birth_date';
            // $today = date("Y-d-m");
            // $diff = date_diff(date_create($dateofBirth), date_create($today));

            return $query->result_array();

            // $query = $this->db->get('cbt_students');
            // return $query->result_array();
        }

        
        public function get_schools_list(){
            
            $query = $this->db->query("SELECT cs.school_code, cs.LRN, cs.first_name, cs.last_name, cs.middle_name, cs.birth_date, cas.school_name, cas.school_id
           FROM cbt_students cs LEFT JOIN cbt_add_school cas ON cs.school_code = cas.school_code  GROUP BY LRN;");


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

       
      public function filter_section(){
        $section = $this->input->post('schools');
                    
        if($section != ""){
        $query = $this->db->select('*')->where('school_code', $section)->get('cbt_add_section');
        return $query->result_array();
        }
       
      }


      //DEPENDENT DROPDOWN
      function fetch_section($school_id)
        {
        $this->db->where('school_code', $school_id);
        $this->db->order_by('section_id', 'ASC');
        $query = $this->db->get('cbt_add_section');
        $output = '<option value="">Select Section</option>';
        foreach($query->result() as $row)
        {
        $output .= '<option value="'.$row->section_id.'">'.$row->section_name.'</option>';
        }
        return $output;
        }

      //GRADE LEVEL DEPENDENT DROPDOWN
      function fetch_glevel($school_id)
      {
      $this->db->where('school_code', $school_id);
      $this->db->order_by('section_id', 'ASC');
      $query = $this->db->get('cbt_add_section');
      $output = '<option value="">Select Level</option>';
      foreach($query->result() as $row)
      {
      $output .= '<option value="'.$row->grade.'">'.$row->grade.'</option>';
      }
      return $output;
      }

        
     public function count_students(){
        $query = $this->db->query("SELECT COUNT(DISTINCT(LRN)) as student_id
        FROM cbt_students");
        return $query->result_array();
    }

   //School Year Create Masterlist Dependent Dropdown
   function fetch_masterlist_sy($school_id)
   {

    $this->db->where('school_id', $school_id);
    $this->db->group_by('school_year');
    $query = $this->db->get('cbt_add_section');
    $output = '<option value="">Select School Year</option>';
  
    foreach($query->result() as $row)
   {
   $output .= '<option value="'.$row->school_year.'">'.$row->school_year.'</option>';
   }
   return $output;
   }

    //Grade level Create Masterlist Dependent Dropdown
    function fetch_masterlist_gl($school_id)
    {
    $this->db->where('school_id', $school_id);
    $this->db->order_by('section_id', 'ASC');
    $query = $this->db->get('cbt_add_section');
    $output = '<option value="">Select Grade Level</option>';
    
    foreach($query->result() as $row)
    {
    $output .= '<option value="'.$row->grade.'">'.$row->grade.'</option>';
    }
    return $output;
    }

    //Grade level Create Masterlist Dependent Dropdown
    function fetch_masterlist_batch($school_id)
    {
    $this->db->where('school_id', $school_id);
    $this->db->order_by('section_id', 'ASC');
    $query = $this->db->get('cbt_add_section');
    $output = '<option value="">Select Batch</option>';
    
    foreach($query->result() as $row)
    {
    $output .= '<option value="'.$row->batch.'">'.$row->batch.'</option>';
    }
    return $output;
    }

        //Grade level Create Masterlist Dependent Dropdown
    function fetch_masterlist_section($school_id)
    {
    $this->db->where('school_id', $school_id);
    $this->db->order_by('section_id', 'ASC');
    $query = $this->db->get('cbt_add_section');
    $output = '<option value="">Select Section</option>';
    
    foreach($query->result() as $row)
    {
    $output .= '<option value="'.$row->section_name.'">'.$row->section_name.'</option>';
    }
    return $output;
    }

    function fetch_students_list($school_id)
    {
    // $query = $this->db->query("SELECT cs.LRN, cs.first_name, cs.middle_name, cs.last_name, cas.school_name, cs.gender,  cs.birth_date
    // FROM cbt_students cs LEFT JOIN cbt_add_school cas ON cs.school_code = cas.school_code GROUP BY LRN;");

    // $output = '<td>Select Section</td>';
    // $this->db->select('ca.school_id, cs.LRN, cs.last_name, cs.first_name, cs.middle_name, ca.school_name, cs.gender, cs.birth_date');
    // $this->db->select('*');
    // $this->db->from('cbt_students cs');
    // $this->db->where('school_code', $school_code);
    // $this->db->join('cbt_add_school ca', 'ca.school_code = cs.school_code', 'left');
    // $this->db->get();

    // $this->db->order_by('section_id', 'ASC');

    // $this->db->order_by('school_id', 'ASC');
    // $this->db->join('cbt_school ca', 'cs.school_code = ca.school_code', 'left');
    // $this->db->where('ca.school_id', $school_id);
    // $query = $this->db->get('cbt_students cs');
    $this->db->where('school_code', $school_id);
    // $this->db->order_by('student_id', 'ASC');
    $query = $this->db->get('cbt_students');
 
    $output = '<tr></td>Select</td><tr>';
  

    foreach($query->result() as $row)
        {
            $output .= '<tr>
            <td scope="row" style="font-weight:bold">'.$row->LRN.'</td>
            <td>'.$row->last_name.','.$row->first_name.','.$row->middle_name.'</td>
            <td>'.$row->school_name.'</td>
            <td>'.$row->date_diff(date_create($row->birth_date), date_create('now'))->y.'</td>
            <td>'.$row->gender.'</td>
      
            </tr>';
        }
            return $output; 
    }
}

