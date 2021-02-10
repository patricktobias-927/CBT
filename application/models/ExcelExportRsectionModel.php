<?php
class ExcelExportRsectionModel extends CI_Model
{
 function fetch_data()
 {
$sid = $this->input->post('select_section2');
//   $this->db->order_by("student_id", "DESC");
//   $query = $this->db->get("cbt_students");
//   return $query->result();
$query = $this->db->query("SELECT s.LRN as LRN, CONCAT(SUBSTRING(ad.school_year, 3, 2), SUBSTRING(ad.school_year, 8, 2), '-', LPAD(s.school_code, 4, 0), '-', LPAD(s.grade_level, 2, 0), '-', RIGHT(s.section_code, 4), '-', LPAD(s.LRN, 2, 0)) as concated, s.school_code as school_code, s.grade_level as grade_level, s.section_code as section_code, s.first_name as first_name, s.middle_name as middle_name, s.last_name as last_name, s.gender as gender,  s.birth_date as birth_date, LEFT(ad.school_year, 4) as school_year_from, RIGHT(ad.school_year, 4) as school_year_to
FROM `cbt_students` s LEFT JOIN cbt_add_section ad ON (s.section_id = ad.section_id) WHERE s.section_code = '".$sid."' ORDER BY s.LRN;");
 // $dateofBirth = 'birth_date';
 // $today = date("Y-d-m");
 // $diff = date_diff(date_create($dateofBirth), date_create($today));

 return $query->result();
 }
 
}
