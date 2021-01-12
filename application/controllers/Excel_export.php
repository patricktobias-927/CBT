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

  $table_columns = array("LRN", "First_name", "Middle_name", "Last_name", "Birth_date", "Gender", "Grade_level", "School_name", "Respondent_number1", "level1", "section1", "batch1", "testing_date1");

  $column = 0;

  foreach($table_columns as $field)
  {
   $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
   $column++;
  }

  $data = $this->excel_export_model->fetch_data();

  $excel_row = 2;

  foreach($data as $row)
  {
   $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->LRN);
   $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->first_name);
   $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->middle_name);
   $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->last_name);
   $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->birth_date);
   $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->gender);
   $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->grade_level);
   $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->school_name);
   $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->respondent_number1);
   $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row->level1);
   $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $row->section1);
   $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $row->batch1);
   $object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $row->testing_date1);
   
  }

  $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
  header('Content-Type: application/vnd.ms-excel');
  header('Content-Disposition: attachment;filename="Upload_template.xls"');
  $object_writer->save('php://output');
 }

 
 
}