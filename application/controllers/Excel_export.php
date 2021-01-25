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

  $table_columns = array("LRN", "Phoenix_Student_Code", "First_name", "Middle_name", "Last_name", "Birth_date", "Gender", "Grade_level", "Section_Name", "Section_Code", "School_Code", "Respondent_number1", "Grade_level1", "Section1", "Batch1", "testing_date1", "Assessment_1", "Respondent_number2", "Grade_level2", "section2", "batch2", "testing_date2", "assessment_2","Respondent_number3", "Grade_level3", "section3", "batch3", "testing_date3", "assessment_3", "Respondent_number4", "Grade_level4", "section4", "batch4", "testing_date4", "assessment_4","Respondent_number5", "Grade_level5", "section5", "batch5", "testing_date5", "assessment_5","Respondent_number6", "Grade_level6", "section6", "batch6", "testing_date6", "assessment_6", "Respondent_number7", "Grade_level7", "section7", "batch7", "testing_date7", "assessment_7", "Respondent_number8", "Grade_level8", "section8", "batch8", "testing_date8", "assessment_8", "Respondent_number9", "Grade_level9", "section9", "batch9", "testing_date9", "assessment_9");

  $column = 0;

  foreach($table_columns as $field)
  {
   $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
   $column++;
  }

  // $data = $this->excel_export_model->fetch_data();

  $excel_row = 2;
$LRN = "1234567890";
$phoenix_code = "P123456789";
$firstname = "Patrick Maine";
$middlename = "Cruz";
$lastname = "Tobias";
$birthdate = "21-07-1996";
$gender = "Male";
$gradelevel = "Grade 6";
$section_name = "Affinity";
$section_code = "AF";
$schoolname = "University";
$respondentnumber = "123456";
$GradeLevel = "Grade 5";
$Section_Code = "SH";
$Batch1 = "Batch 1";
$Testingdate1 = "21-07-2021";
$Assessment_type1 = "Asssessment1";


  // foreach($data as
  // {
   $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $LRN);
   $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $phoenix_code);
   $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $firstname);
   $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $middlename);
   $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $lastname);
   $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $birthdate);
   $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $gender);
   $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $gradelevel);
   $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $section_name);
   $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $section_code);
   $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $schoolname);
   $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $respondentnumber);
   $object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $GradeLevel);
   $object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, $Section_Code);
   $object->getActiveSheet()->setCellValueByColumnAndRow(14, $excel_row, $Batch1);
   $object->getActiveSheet()->setCellValueByColumnAndRow(15, $excel_row, $Testingdate1);
   $object->getActiveSheet()->setCellValueByColumnAndRow(16, $excel_row, $Assessment_type1);
   
  // }

  $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
  header('Content-Type: application/vnd.ms-excel');
  header('Content-Disposition: attachment;filename="Upload_template.xls"');
  $object_writer->save('php://output');
 }

 
 
}