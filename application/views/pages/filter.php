<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Filter extends CI_Controller {


    public function index()
    {
        $data['data']=$this->db->get('cbt_add_section')->result();
        $this->load->view('pages/add_section', $data, FALSE);
    }

    public function load_mahisaswa()
    {
        $schools = $this->input->post('schools');
        if ($schools == 0) {
            $data = $this->db->get('cbt_add_section')->result();
        }
        else
        {
        $data = $this->db->get_where('cbt_add_section', ['school_name'=>$schools])->results();
    }
    if (!empty($data))
    {
      
      foreach($sections as $row): ?>
            <tr>
            <td><?= $row['section_id'];?></td>
            <td scope="row" style="font-weight:bold"><?= $row['school_code'];?></th>
            <td><?= $row['grade'];?></td>
            <td><?= $row['section_name'];?></td>
            <td><?= $row['section_code'];?></td>
            <td><?= $row['school_year'];?></td>
            <td><?= $row['population'];?></td>
            </tr>

            <?php endforeach?> <?php    

    }
    else
    {
        ?>
        <tr><td align="center">DATA</td></tr>
        <?php
    }

}
}