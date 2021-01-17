<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel_export extends CI_Controller {
 
 function index()
 {
  $this->load->model("excel_export_model");
//   $data["employee_data"] = $this->excel_export_model->fetch_data();
//   $this->load->view("bulk_upload_of_students", $data);
 }

 function action()
 {
  $this->load->model("excel_export_model");
  $this->load->library("excel");
  $object = new PHPExcel();

  $object->setActiveSheetIndex(0);

  $table_columns = array("LRN", "First_name", "Middle_name", "Last_name", "Birth_date", "Gender", "Grade_level", "School_name", "Respondent_number1", "Grade_level1", "section1", "batch1", "testing_date1");

  $column = 0;

  foreach($table_columns as $field)
  {
   $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
   $column++;
  }

  // $data = $this->excel_export_model->fetch_data();

  $excel_row = 2;
$LRN = "1234567890";
$firstname = "Patrick Maine";
$middlename = "Cruz";
$lastname = "Tobias";
$birthdate = "21-07-1996";
$gender = "Male";
$gradelevel = "Grade 6";
$schoolname = "La Salle";
$respondentnumber = "123456";
$GradeLevel = "Grade 5";
$Section = "Persevere";
$Batch1 = "Batch 1";
$Testingdate1 = "21-07-2021";


  // foreach($data as
  // {
   $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $LRN);
   $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $firstname);
   $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $middlename);
   $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $lastname);
   $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $birthdate);
   $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $gender);
   $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $gradelevel);
   $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $schoolname);
   $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $respondentnumber);
   $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $GradeLevel);
   $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $Section);
   $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $Batch1);
   $object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $Testingdate1);
   
  // }

  $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
  header('Content-Type: application/vnd.ms-excel');
  header('Content-Disposition: attachment;filename="Upload_template.xls"');
  $object_writer->save('php://output');
 }

 
 
}