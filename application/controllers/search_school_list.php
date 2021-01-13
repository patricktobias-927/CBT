<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search_school_list extends CI_Controller {

 function index()
 {
  $this->load->view('add_section');
 }

 function fetch()
 {
  $output = '';
  $query = '';
  $this->load->model('Search_school_list_model');
  if($this->input->post('query'))
  {
   $query = $this->input->post('query');
  }
  $data['records'] = $this->Posts_model->get_sections_filter();
  $output .= '
  <div class="table-responsive">
     <table class="table table-bordered table-striped">
      <tr>
      <th scope="col">School Code</th>
      <th scope="col">School Name</th>
      <th scope="col">Number of Sections</th>
      <th scope="col">Population</th>
      </tr>
  ';
  if($data->num_rows() > 0)
  {
   foreach($data->result() as $row)
   {
    $output .= '
      <tr>
      <td>'.$row->school_code.'</td>
       <td>'.$row->school_name.'</td>
       <td>'.$row->section_name.'</td>
       <td>'.$row->value_sum.'</td>
      </tr>
    ';
   }
  }
  else
  {
   $output .= '<tr>
       <td colspan="5">No Data Found</td>
      </tr>';
  }
  $output .= '</table>';
  echo $output;
 }
 
}

