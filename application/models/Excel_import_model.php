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
    // $this->db->where('LRN', $LRN);
    // return $this->db->update('cbt_students', $data); 
  $this->db->insert_batch('cbt_students', $data);

    // $query = null; //emptying in case 

    // $id   = $LRN; //getting from post value

    // $query = $this->db->get_where('cbt_add_students', array(//making selection
    //     'LRN' => $LRN
    // ));

    // $count = $query->num_rows(); //counting result from query

    // if ($count === 0) {
    //     $data = array(
    //         'name' => $name,
    //         'id' => $id
    //     );
    // $this->db->insert_batch('cbt_add_section', $data);
 }

 function update($data)
 {
  // $this->db->set($data);
  // $this->db->where('LRN', 1234567891);
  $this->db->update_batch('cbt_students', $data, 'LRN');
  // $this->db->where('id', $id);
  // $this->db->update('mytable', $data);
  // $this->db->update('cbt_students', $data);

 }
}

