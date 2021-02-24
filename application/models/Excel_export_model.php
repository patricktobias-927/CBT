<?php
class Excel_export_model extends CI_Model
{
 function fetch_data()
 {
  $this->db->group_by("LRN");
  $query = $this->db->get("cbt_students");
  return $query->result();
 }

 
}
