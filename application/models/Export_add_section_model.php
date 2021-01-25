<?php
class Export_add_section_model extends CI_Model
{
 function fetch_data()
 {
  $this->db->order_by("school_id", "DESC");
  $query = $this->db->get("cbt_add_section");
  return $query->result();
 }

 
}
