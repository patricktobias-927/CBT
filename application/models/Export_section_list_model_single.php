<?php
class Export_section_list_model_single extends CI_Model
{
 function fetch_data()
 {
//   $this->db->order_by("school_id", "DESC");
  $section_id = $this->input->post('select_school');
//   $section_id = "STP";
  
  $query = $this->db->select('school_id, school_name, school_code, section_name, population')->where('school_code', $section_id)->get('cbt_add_section');
  return $query->result();
   // $dateofBirth = 'birth_date';
   // $today = date("Y-d-m");
   // $diff = date_diff(date_create($dateofBirth), date_create($today));
//   return $query->result();
 }

 
}
