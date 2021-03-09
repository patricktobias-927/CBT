<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Export_add_section_perschool extends CI_Controller {
 
 function index()
 {
  $this->load->model("Export_add_section_perschool_model");
  // $data["employee_data"] = $this->excel_export_model->fetch_data();
  // $this->load->view("excel_export_view", $data);
 }

 function action()
 {
  $this->load->model("Export_add_section_perschool_model");
  $this->load->library("excel");
  $object = new PHPExcel();

  $object->setActiveSheetIndex(0);

  $table_columns = array("school_code", "grade", "section", "section_code", "sy");

  $column = 0;

  foreach($table_columns as $field)
  {
   $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
   $column++;
  }

  $section_data = $this->Export_add_section_perschool_model->fetch_data();

  $excel_row = 2;

  foreach($section_data as $row)
  {
    $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->school_code);
    $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->grade);
    $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->section_name);
    $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->section_code);
    $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->school_year);
    $excel_row++;
  }

  $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
  header('Content-Type: application/vnd.ms-excel');
  header('Content-Disposition: attachment;filename="Sections_list_Per_School.xls"');
  $object_writer->save('php://output');
 }

 
 
}