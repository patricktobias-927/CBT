<?php
class Export_Lrn_Model extends CI_Model
{
 function fetch_data()
 {
//   $this->db->order_by("school_id", "DESC");
  $sid = $this->input->post('select_lrn');
//   $section_id = "STP";
  
  // $query = $this->db->select('LRN, first_name, middle_name, last_name, birth_date, gender, grade_level, section_name, section_code')->where('student_id', $sid)->get('cbt_students');
  $query = $this->db->select('*')->where('student_id', $sid)->get('cbt_students');
  return $query->result();
   // $dateofBirth = 'birth_date';
   // $today = date("Y-d-m");
   // $diff = date_diff(date_create($dateofBirth), date_create($today));
//   return $query->result();
 }
}
