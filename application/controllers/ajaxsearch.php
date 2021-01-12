<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajaxsearch extends CI_Controller {

 function index()
 {
  $this->load->view('add_section');
 }

 function fetch()
 {
  $output = '';
  $query = '';
  $this->load->model('Ajaxsearch_model');
  if($this->input->post('query'))
  {
   $query = $this->input->post('query');
  }
  $data = $this->Ajaxsearch_model->fetch_data($query);
  $output .= '
  <div class="table-responsive">
     <table class="table table-bordered table-striped">
      <tr>
      <th scope="col">School ID</th>
      <th scope="col">School Code</th>
      <th scope="col">Grade</th>
      <th scope="col">Section</th>
      <th scope="col">Section Code</th>
      <th scope="col">School Year</th>
      <th scope="col">Population</th>
      </tr>
  ';
  if($data->num_rows() > 0)
  {
   foreach($data->result() as $row)
   {
    $output .= '
      <tr>
      <td>'.$row->school_id.'</td>
       <td>'.$row->school_code.'</td>
       <td>'.$row->grade.'</td>
       <td>'.$row->section_name.'</td>
       <td>'.$row->section_code.'</td>
       <td>'.$row->school_year.'</td>
       <td>'.$row->population.'</td>
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

