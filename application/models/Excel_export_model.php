<?php
class Excel_export_model extends CI_Model
{
 function fetch_data()
 {
  $this->db->order_by("student_id", "DESC");
  $query = $this->db->get("cbt_students");
  return $query->result();
 }

 
}
