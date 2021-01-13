<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Excel_import extends CI_Controller
{
 public function __construct()
 {
  parent::__construct();
  $this->load->model('excel_import_model');
  $this->load->library('excel');
 }

 function index()
 {
  $this->load->view('bulk_upload_of_students');
 }
 
 function fetch()
 {
  $data = $this->excel_import_model->select();
  $output = '
  <br>
  <h3 align="center">Total Data - '.$data->num_rows().'</h3>
  <table class="table table-striped table-bordered">
   <tr>
    <th>student_id</th>
    <th>firstname</th>
    <th>middle_name</th>
    <th>last_name</th>
    <th>birthdate</th>
   </tr>
  ';
  foreach($data->result() as $row)
  {
   $output .= '
   <tr>
    <td>'.$row->student_id.'</td>
    <td>'.$row->first_name.'</td>
    <td>'.$row->middle_name.'</td>
    <td>'.$row->last_name.'</td>
    <td>'.$row->birth_date.'</td>
   </tr>
   ';
  }
  $output .= '</table>';
  echo $output;
 }

 function import()
 {
  if(isset($_FILES["file"]["name"]))
  {
   $path = $_FILES["file"]["tmp_name"];
   $object = PHPExcel_IOFactory::load($path);
   foreach($object->getWorksheetIterator() as $worksheet)
   {
    $highestRow = $worksheet->getHighestRow();
    $highestColumn = $worksheet->getHighestColumn();
    for($row=2; $row<=$highestRow; $row++)
    {
     $LRN = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
     $first_name = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
     $middle_name = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
     $last_name = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
     $birth_date = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
     $BirthdayR = date('Y-m-d', strtotime($birth_date));
     $gender = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
     $Grade_level = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
     $School_name = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
     $Respondent_number1 = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
     $level1 = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
     $section1 = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
     $batch1 = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
     $testing_date1 = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
     $testing_date1R = date('Y-m-d', strtotime($testing_date1));
     $data[] = array(
      'LRN'   => $LRN,
      'first_name'    => $first_name,
      'middle_name'   => $middle_name,
      'last_name'   => $last_name,
      'birth_date'    => $BirthdayR,
      'gender'  => $gender,
      'grade_level'   => $Grade_level,
      'school_name'   => $School_name,
      'respondent_number1'    => $Respondent_number1,
      'level1'   => $level1,
      'section1'   => $section1,
      'batch1'    => $batch1,
      'testing_date1'  => $testing_date1R
     );
    }
   }  
   
//    $result = $this->db->query("SELECT LRN FROM cbt_students WHERE LRN = '" . $LRN . "' ");
//    return $result->result_array();
//    return $totalrows->row_array();
   
//    if ($totalrows > 0) {
//     $pass_row = mysqli_fetch_assoc($result);
//     $userID = $pass_row['LRN'];

    // $this->db->where('LRN', $LRN);
    // return $this->db->update('cbt_students', $data); 
   
//    $query= $this->db->query("UPDATE cbt_students
//    SET
//    first_name = '" . $first_name . "',
//    middle_name = '" . $middle_name . "'
//    WHERE LRN = '" . $userID . "'");   

//             }
   $this->excel_import_model->insert($data);
   echo 'Data Imported successfully';
  } 
 }
}

?>

