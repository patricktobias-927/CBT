<?php
class Ajaxsearch_model extends CI_Model
{

    function fetch_data($query)
    {
        $this->db->select("*");
        $this->db->from("cbt_add_section");
        if($query != '')
    {
        $this->db->like('school_code', $query);
        $this->db->or_like('grade', $query);
        $this->db->or_like('section_name', $query);
        $this->db->or_like('section_code', $query);
        $this->db->or_like('school_id', $query);
        $this->db->or_like('school_year', $query);
        $this->db->or_like('population', $query);
    }
        $this->db->order_by('section_id', 'DESC');
        return $this->db->get();
    } 
    

}
?>