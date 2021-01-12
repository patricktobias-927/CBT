<?php
class Excel_import_model extends CI_Model
{
 function select()
 {
  $this->db->order_by('student_id', 'DESC');
  $query = $this->db->get('cbt_students');
  return $query;
 }

 function insert($data)
 {
  $this->db->insert_batch('cbt_students', $data);
  
 }
}
