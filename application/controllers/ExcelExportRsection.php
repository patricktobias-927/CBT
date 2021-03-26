<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExcelExportRsection extends CI_Controller {
 
 function index()
 {
  $this->load->model("ExcelExportRsectionModel");
//   $data["employee_data"] = $this->excel_export_model->fetch_data();
//   $this->load->view("bulk_upload_of_students", $data);
 }

 public function action()
 {
  $this->load->model("ExcelExportRsectionModel");
  $this->load->library("excel");
  $object = new PHPExcel();

  $object->setActiveSheetIndex(0);

  $table_columns = array("school_code", "grade", "section_code", "respondent_number", "respondent_num", "sy_from", "sy_to", "last_name", "first_name", "mi", "suffix", "gender"
);

  $column = 0;

  foreach($table_columns as $field)
  {
   $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
   $column++;
  }

  $data = $this->ExcelExportRsectionModel->fetch_data();

  $excel_row = 2;
// $LRN = "1234567890";
// $firstname = "Patrick Maine";
// $middlename = "Cruz";
// $lastname = "Tobias";
// $birthdate = "21-07-1996";
// $gender = "Male";
// $gradelevel = "Grade 6";
// $schoolcode = "STP";
// $respondentnumber = "123456";
// $GradeLevel = "Grade 5";
// $Section = "Persevere";
// $Batch1 = "Batch 1";
// $Testingdate1 = "21-07-2021";


  foreach($data as $row)
  {
    $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->school_code);
    $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->grade_level);
    $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->section_code);
    $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->LRN);
    $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->concated);
    $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->school_year_from);
    $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->school_year_to);
    $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->last_name);
    $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->first_name);
    $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row->middle_name);
    $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $row->gender);


    // $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->LRN);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->phoenix_student_code);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->first_name);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->middle_name);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->last_name);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->birth_date);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->gender);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->grade_level);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->section_name);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row->section_code);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $row->school_code);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $row->respondent_number1);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $row->grade_level1);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, $row->section1);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(14, $excel_row, $row->batch1);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(15, $excel_row, $row->testing_date1);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(16, $excel_row, $row->assessment_1);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(17, $excel_row, $row->respondent_number2);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(18, $excel_row, $row->grade_level2);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(19, $excel_row, $row->section2);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(20, $excel_row, $row->batch2);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(21, $excel_row, $row->testing_date2);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(22, $excel_row, $row->assessment_2);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(23, $excel_row, $row->respondent_number3);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(24, $excel_row, $row->grade_level3);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(25, $excel_row, $row->section3);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(26, $excel_row, $row->batch3);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(27, $excel_row, $row->testing_date3);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(28, $excel_row, $row->assessment_3);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(29, $excel_row, $row->respondent_number4);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(30, $excel_row, $row->grade_level4);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(31, $excel_row, $row->section4);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(32, $excel_row, $row->batch4);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(33, $excel_row, $row->testing_date4);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(34, $excel_row, $row->assessment_4);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(35, $excel_row, $row->respondent_number5);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(36, $excel_row, $row->grade_level5);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(37, $excel_row, $row->section5);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(38, $excel_row, $row->batch5);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(39, $excel_row, $row->testing_date5);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(40, $excel_row, $row->assessment_5);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(41, $excel_row, $row->respondent_number6);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(42, $excel_row, $row->grade_level6);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(43, $excel_row, $row->section6);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(44, $excel_row, $row->batch6);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(45, $excel_row, $row->testing_date6);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(46, $excel_row, $row->assessment_6);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(47, $excel_row, $row->respondent_number7);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(48, $excel_row, $row->grade_level7);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(49, $excel_row, $row->section7);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(50, $excel_row, $row->batch7);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(51, $excel_row, $row->testing_date7);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(52, $excel_row, $row->assessment_7);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(53, $excel_row, $row->respondent_number8);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(54, $excel_row, $row->grade_level8);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(55, $excel_row, $row->section8);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(56, $excel_row, $row->batch8);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(57, $excel_row, $row->testing_date8);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(58, $excel_row, $row->assessment_8);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(59, $excel_row, $row->respondent_number9);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(60, $excel_row, $row->grade_level9);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(61, $excel_row, $row->section9);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(62, $excel_row, $row->batch9);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(63, $excel_row, $row->testing_date9);
    // $object->getActiveSheet()->setCellValueByColumnAndRow(64, $excel_row, $row->assessment_9);
  //  $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $LRN);
  //  $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $firstname);
  //  $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $middlename);
  //  $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $lastname);
  //  $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $birthdate);
  //  $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $gender);
  //  $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $gradelevel);
  //  $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $schoolcode);
  //  $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $respondentnumber);
  //  $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $GradeLevel);
  //  $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $Section);
  //  $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $Batch1);
  //  $object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $Testingdate1);
   $excel_row++;
  }

  $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
  header('Content-Type: application/vnd.ms-excel');
  header('Content-Disposition: attachment;filename="Respondent_Template_Per_Section.xls"');
  $object_writer->save('php://output');
 }

 
 
}

