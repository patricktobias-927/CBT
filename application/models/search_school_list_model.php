<?php
class Search_school_list_model extends CI_Model
{

    function fetch_data($query)
    {
        $this->db->select("*");
        $this->db->from("cbt_school_and_section_list");
        if($query != '')
    {
        $this->db->or_like('school_code', $query);
        $this->db->or_like('school_name', $query);
        $this->db->or_like('number_of_sections', $query);
        $this->db->or_like('population', $query);
    }
        $this->db->order_by('school_code', 'DESC');
        return $this->db->get();
    } 
    

}
?>