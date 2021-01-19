<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Filter extends CI_Controller {


    public function index()
    {
        $data['data']=$this->db->get('cbt_add_section')->result();
        $this->load->view('pages/add_section', $data, FALSE);
    }

    public function load_filter()
    {
           $schools = $_GET['schools'];
        // $schools = $this->input->post('schools');
        
        if ($schools == 0) {
            $data = $this->db->get('cbt_add_section')->result();
        //     // $data = $this->db->select('*')->get('cbt_add_school')->result();
        // //     $query = $this->db->get('cbt_add_section');
        // //     return $query->result_array();
        }
        else
        {
            // $data = $this->db->select('*')->where('school_id', $schools)->get('cbt_add_section');
            // return $query->result();
        $data = $this->db->get_where('cbt_add_section', ['school_id'=>$schools])->result(); 
        }
    if (!empty($data))
    {
  
      $no=1;foreach($data as $row): ?>
            <tr>
            <td><?php echo $row->school_id ?></td>
            <td scope="row" style="font-weight:bold"><?php echo $row->school_code ?></th>
            <td><?php echo $row->grade ?></td>
            <td><?php echo $row->section_name ?></td>
            <td><?php echo $row->section_code ?></td>
            <td><?php echo $row->school_year ?></td>
            <td><?php echo $row->population ?></td>
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