<?php
class Export_add_section_perschool_model extends CI_Model
{
 function fetch_data()
 {
//   $this->db->order_by("school_id", "DESC");
  $school_id = $this->input->post('select_sectionmodal');
//   $section_id = "STP";
  
  $query = $this->db->select('school_name, school_code, grade, section_name, batch, section_code, school_year, population')->where('school_id', $school_id)->get('cbt_add_section');
  return $query->result();
   // $dateofBirth = 'birth_date';
   // $today = date("Y-d-m");
   // $diff = date_diff(date_create($dateofBirth), date_create($today));
//   return $query->result();
 }
}
