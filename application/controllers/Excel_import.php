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
//   $output = '
//   <br>
//   <div class="card" style="float:left; height: 70px;">
//   <div class="card-body" style="background-color: #20B2AA	; color: white;">
//   <h3 align="center">Total Students: '.$data->num_rows().'</h3> 
//   </div>
// </div>
  

//   ';
//   foreach($data->result() as $row)
//   {
//    $output .= '
//    <tr>
//     <td>'.$row->student_id.' - '.$row->middle_name.'</td>
//     <td>'.$row->first_name.'</td>
//     <td>'.$row->middle_name.'</td>
//     <td>'.$row->last_name.'</td>
//     <td>'.$row->birth_date.'</td>
//    </tr>
//    ';
//   }
//   $output .= '</table>';

// <table class="table table-striped table-bordered">
// <tr>
//  <th>LRN</th>
//  <th>Full Name</th>
//  <th>middle_name</th>
//  <th>last_name</th>
//  <th>birthdate</th>
// </tr>

  // echo $output;
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
     $phoenix_student_code = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
     $first_name = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
     $middle_name = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
     $last_name = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
     $birth_date = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
     $BirthdayR = date('Y-m-d', strtotime($birth_date));
     $gender = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
     $Grade_level = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
     $Section_name = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
     $Section_code = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
     $School_code = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
     $Respondent_number1 = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
     $level1 = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
     $section1 = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
     $batch1 = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
     $testing_date1 = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
     $testing_date1R = date('Y-m-d', strtotime($testing_date1));
     $data[] = array(
      'LRN'   => $LRN,
      'phoenix_student_code' => $phoenix_student_code,
      'first_name'    => $first_name,
      'middle_name'   => $middle_name,
      'last_name'   => $last_name,
      'birth_date'    => $BirthdayR,
      'gender'  => $gender,
      'grade_level'   => $Grade_level,
      'section_name'   => $Section_name,
      'section_code'   => $Section_code,
      'school_code'   => $School_code,
      'respondent_number1'    => $Respondent_number1,
      'grade_level1'   => $level1,
      'section1'   => $section1,
      'batch1'    => $batch1,
      'testing_date1'  => $testing_date1R
     );
    }
   }  
   

// //    return $result->result_array();




//     $pass_row = mysqli_fetch_assoc($result);
//     $userID = $pass_row['LRN'];

//     $this->db->where('LRN', $LRN);
//     return $this->db->update('cbt_students', $data); 
   
//    $query= $this->db->query("UPDATE cbt_students
//    SET
//    first_name = '" . $first_name . "',
//    middle_name = '" . $middle_name . "'
//    WHERE LRN = '" . $userID . "'");   

//             }
  } 

  $result = $this->db->query("SELECT * FROM cbt_students WHERE LRN = '" . $LRN . "' ");
   $totalrows = $result->num_rows();
      if ($totalrows > 0) {
         $this->excel_import_model->update($data);
         echo "Data Updated Successfully!";
      //   $this->excel_import_model->update($data);
 } else { $this->excel_import_model->insert($data);
   echo "Data Imported Successfully!";

 }


 }  
 

 
}

?>

