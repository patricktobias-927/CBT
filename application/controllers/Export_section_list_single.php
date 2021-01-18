<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Export_section_list_single extends CI_Controller {
 
 function index()
 {
  $this->load->model("Export_section_list_model_single");
  // $data["employee_data"] = $this->excel_export_model->fetch_data();
  // $this->load->view("excel_export_view", $data);
 }

 function action()
 {
  $this->load->model("Export_section_list_model_single");
  $this->load->library("excel");
  $object = new PHPExcel();

  $object->setActiveSheetIndex(0);

  $table_columns = array("School Code", "School Name", "Section Name", "Population");

  $column = 0;

  foreach($table_columns as $field)
  {
   $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
   $column++;
  }

  $section_data = $this->Export_section_list_model_single->fetch_data();

  $excel_row = 2;

  foreach($section_data as $row)
  {
   $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->school_code);
   $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->school_name);
   $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->section_name);
   $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->population);
   $excel_row++;
  }

  $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
  header('Content-Type: application/vnd.ms-excel');
  header('Content-Disposition: attachment;filename="school_and_section_list.xls"');
  $object_writer->save('php://output');
 }

 
 
}