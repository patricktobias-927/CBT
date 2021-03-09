<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FilterSchool extends CI_Controller {


    public function index()
    {
        $data['data']=$this->db->get('cbt_add_section')->result();
        $this->load->view('pages/add_section', $data, FALSE);
    }

    public function load_filter()
    {
           $schools = $_GET['st_school_name'];
        // $schools = $this->input->post('schools');
        if ($schools == 0) {
            $this->db->select('*');
            $this->db->from('cbt_students cs');
            $this->db->join('cbt_add_school ca', 'cs.school_code = ca.school_code');
            $data = $this->db->get()->result();
            // $data = $this->db->get('cbt_add_school')->result();
        //     // $data = $this->db->select('*')->get('cbt_add_school')->result();
        // //     $query = $this->db->get('cbt_add_section');
        // //     return $query->result_array();
        }
        else
        {
            // $data = $this->db->select('*')->where('school_id', $schools)->get('cbt_add_section');
            // return $query->result();
        $this->db->distinct();
        $this->db->select('*');
        // $this->db->group_by('LRN');
        $this->db->from('cbt_students cs');
        $this->db->join('cbt_add_school ca', 'cs.school_code = ca.school_code');
    
        $data = $this->db->get_where('cbt_students', ['ca.school_id'=>$schools])->result(); 
        
        }
    if (!empty($data))
    {
  
      $no=1;foreach($data as $row): ?>
            <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $row->LRN ?></td>
            <td><?php echo $row->last_name.','.$row->first_name.','.$row->middle_name?></td>
            <!-- <td scope="row" style="font-weight:bold"><?php echo $row->school_code ?></th> -->
            <td><?php echo $row->school_name ?></td>
            <td><?php echo $row->gender ?></td>

            <td><?php echo $row->birth_date ?></td>
  
            </tr>

            <?php endforeach ?> <?php    
    }
    else
    {
        ?>
        <tr><td align="center">DATA</td></tr>
        <?php
    }

}
}