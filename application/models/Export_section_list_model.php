<?php
class Export_section_list_model extends CI_Model
{
 function fetch_data()
 {
  $this->db->order_by("school_id", "DESC");
  $query = $this->db->get("cbt_add_section");
  return $query->result();
 }

 
}
