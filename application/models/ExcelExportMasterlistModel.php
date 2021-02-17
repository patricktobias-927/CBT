<?php
class ExcelExportMasterlistModel extends CI_Model
{
 function fetch_data()
 {
    $sid = $this->input->post('cbt_id');
//   $this->db->order_by("student_id", "DESC");
//   $query = $this->db->get("cbt_students");
//   return $query->result();

$query = $this->db->query("SELECT s.student_id as student_id, s.first_name as first_name, s.middle_name as middle_name, s.last_name as last_name, s.gender as gender, CONCAT(SUBSTRING(ad.school_year, 3, 2), SUBSTRING(ad.school_year, 8, 2), '-', LPAD(s.school_code, 4, 0), '-', LPAD(s.grade_level, 2, 0), '-', RIGHT(s.section_code, 4), '-', LPAD(s.LRN, 2, 0)) as concated, 

LOWER(CONCAT(mi.school_acronym, '_', RIGHT(s.grade_level, 2), s.section_code, '_', s.student_id)) as username,
LOWER(CONCAT(s.section_code, RIGHT(s.student_id, 2), '_', 

-- GET FIRSTNAME BEFORE SPACE
REVERSE(RIGHT(REVERSE(s.first_name
), LENGTH(s.first_name
) - LOCATE(' ', REVERSE(s.first_name
))))


)) as pass_word,


CONCAT(mi.school_acronym, ' ', RIGHT(s.grade_level, 2), ' ', s.section_name) as group_,

 mi.masterlist_id as masterlist, ca.course_code1 as course1, ca.course_code2 as course2, ca.course_code3 as course3, ca.course_code4 as course4, ca.course_code5 as course5, ca.course_code6 as course6 FROM `cbt_students` s LEFT JOIN cbt_masterlist_info mi ON (s.school_code = mi.school_code AND s.grade_level = mi.grade_level AND s.section_code = mi.section_code) LEFT JOIN cbt_add_custom_assessment ca ON (mi.assessment_id = ca.assessment_id) LEFT JOIN cbt_add_section ad ON (s.section_id = ad.section_id) WHERE mi.masterlist_id = '".$sid."' ORDER BY student_id;");



// $query = $this->db->query("SELECT s.LRN as LRN, CONCAT(SUBSTRING(ad.school_year, 3, 2), SUBSTRING(ad.school_year, 8, 2), '-', RIGHT(s.school_code, 4), '-', RIGHT(s.grade_level, 2), '-', RIGHT(s.section_code, 4), '-', RIGHT(s.LRN, 2)) as concated, s.school_code as school_code, s.grade_level as grade_level, s.section_code as section_code, s.first_name as first_name, s.middle_name as middle_name, s.last_name as last_name, s.gender as gender,  s.birth_date as birth_date, LEFT(ad.school_year, 4) as school_year_from, RIGHT(ad.school_year, 4) as school_year_to
// FROM `cbt_students` s LEFT JOIN cbt_add_section ad ON (s.section_id = ad.section_id) ORDER BY s.LRN;");
 // $dateofBirth = 'birth_date';
 // $today = date("Y-d-m");
 // $diff = date_diff(date_create($dateofBirth), date_create($today));

 return $query->result();
 }
 
}
