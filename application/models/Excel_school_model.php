<?php
class Excel_school_model extends CI_Model
{
 function fetch_data()
 {
//   $this->db->order_by("school_id", "DESC");
  $school_id = $this->input->post('select_code');
//   $section_id = "STP";
  
$query = $this->db->query("SELECT CONCAT('TMP', LPAD(s.school_code, 4, 0), RIGHT(s.LRN, 4)) as LRN, s.student_id, s.phoenix_student_code, s.first_name, s.middle_name, s.last_name, s.birth_date, s.gender, s.grade_level, s.section_name, s.section_code, s.school_code, s.respondent_number1, s.grade_level1, s.section1, s.batch1, s.testing_date1, s.assessment_1, s.respondent_number2, s.grade_level2, s.section2, s.batch2, s.testing_date2, s.assessment_2, s.respondent_number3, s.grade_level3, s.section3, s.batch3, s.testing_date3, s.assessment_3, s.respondent_number4, s.grade_level4, s.section4, s.batch4, s.testing_date4, s.assessment_4, s.respondent_number5, s.grade_level5, s.section5, s.batch5, s.testing_date5, s.assessment_5, s.respondent_number6, s.grade_level6, s.section6, s.batch6, s.testing_date6, s.assessment_6, s.respondent_number7, s.grade_level7, s.section7, s.batch7, s.testing_date7, s.assessment_7, s.respondent_number8, s.grade_level8, s.section8, s.batch8, s.testing_date8, s.assessment_8, s.respondent_number9, s.grade_level9, s.section9, s.batch9, s.testing_date9, s.assessment_9 FROM `cbt_students` s WHERE school_code = '".$school_id."' ORDER BY student_id ASC");

  return $query->result();
   // $dateofBirth = 'birth_date';
   // $today = date("Y-d-m");
   // $diff = date_diff(date_create($dateofBirth), date_create($today));
//   return $query->result();
 }
}
