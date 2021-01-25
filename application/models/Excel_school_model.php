<?php
class Excel_school_model extends CI_Model
{
 function fetch_data()
 {
//   $this->db->order_by("school_id", "DESC");
  $school_id = $this->input->post('select_code');
//   $section_id = "STP";
  
  $query = $this->db->select('*')->where('school_code', $school_id)->get('cbt_students');
  return $query->result();
   // $dateofBirth = 'birth_date';
   // $today = date("Y-d-m");
   // $diff = date_diff(date_create($dateofBirth), date_create($today));
//   return $query->result();
 }
}
