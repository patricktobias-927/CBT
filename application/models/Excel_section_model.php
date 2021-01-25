<?php
class Excel_section_model extends CI_Model
{
 function fetch_data()
 {
//   $this->db->order_by("school_id", "DESC");
  $section_code = $this->input->post('select_section');
//   $section_id = "STP";
  
  $query = $this->db->select('*')->where('section_code', $section_code)->get('cbt_students');
  return $query->result();
   // $dateofBirth = 'birth_date';
   // $today = date("Y-d-m");
   // $diff = date_diff(date_create($dateofBirth), date_create($today));
//   return $query->result();
 }
}
