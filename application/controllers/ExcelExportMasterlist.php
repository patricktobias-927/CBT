<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExcelExportMasterlist extends CI_Controller {
 
 function index()
 {
  $this->load->model("ExcelExportMasterlistModel");
//   $data["employee_data"] = $this->excel_export_model->fetch_data();
//   $this->load->view("bulk_upload_of_students", $data);
 }

 public function action()
 {
  $this->load->model("ExcelExportMasterlistModel");
  $this->load->library("excel");
  $object = new PHPExcel();

  $object->setActiveSheetIndex(0);

  $table_columns = array("username", "password", "first_name ", "lastname", "middlename", "institution", "department", "email", "course1", "role1", "group1", "course2", "role2", "group2", "course3", "role3", "group3", "course4", "role4", "group4", "course5", "role5", "group5"
);




  $column = 0;

  foreach($table_columns as $field)
  {
   $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
   $column++;
  }

  $data = $this->ExcelExportMasterlistModel->fetch_data();

  $excel_row = 2;
  $institution = "0";
  $role = "5";
  // $count = $data['extra_accounts'];


  foreach($data as $row)
  {
    $count = $row->extra_accounts;
    $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->username); //username
    $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->pass_word); //password
    $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->first_name);
    $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->last_name);
    $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->middle_name);
    $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $institution);
    $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->gender);
    $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->concated);  //respondent number
    $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->course1);
    $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $role);
    $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $row->group_); //group
    $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $row->course2);
    $object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $role);
    $object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, $row->group_); // group
    $object->getActiveSheet()->setCellValueByColumnAndRow(14, $excel_row, $row->course3);
    $object->getActiveSheet()->setCellValueByColumnAndRow(15, $excel_row, $role);
    $object->getActiveSheet()->setCellValueByColumnAndRow(16, $excel_row, $row->group_); // group
    $object->getActiveSheet()->setCellValueByColumnAndRow(17, $excel_row, $row->course4);
    $object->getActiveSheet()->setCellValueByColumnAndRow(18, $excel_row, $role);
    $object->getActiveSheet()->setCellValueByColumnAndRow(19, $excel_row, $row->group_); //group
    $object->getActiveSheet()->setCellValueByColumnAndRow(20, $excel_row, $row->course5);
    $object->getActiveSheet()->setCellValueByColumnAndRow(21, $excel_row, $role);
    $object->getActiveSheet()->setCellValueByColumnAndRow(22, $excel_row, $row->group_); //group
    $object->getActiveSheet()->setCellValueByColumnAndRow(23, $excel_row, $row->course6);
    $object->getActiveSheet()->setCellValueByColumnAndRow(24, $excel_row, $role);
    $object->getActiveSheet()->setCellValueByColumnAndRow(25, $excel_row, $row->group_); //group
   $excel_row++;

  

  }

  for($i = 0; $i < $count; $i++){
    $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "lzds_1aa_1"); //username
    $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "AA01_ethan"); //password
    $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "Ethan Mchale" 
  );
    $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "Anicete"
  );
    $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "N."
  );
    $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "0"
  );
    $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "Male"
  );
    $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "2021-0435-01-AA-01"
  );  //respondent number
    $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "demo-exams"
  );
    $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, "5"
  );
    $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, "LZDS 1 Faith"
  ); //group
    $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, "eval-forms"
  );
    $object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, "5"
  );
    $object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, "LZDS 1 Faith"
  ); // group
    $object->getActiveSheet()->setCellValueByColumnAndRow(14, $excel_row, "en-2018-1"
  );
    $object->getActiveSheet()->setCellValueByColumnAndRow(15, $excel_row, "5"
  );
    $object->getActiveSheet()->setCellValueByColumnAndRow(16, $excel_row, "LZDS 1 Faith"
  ); // group
    $object->getActiveSheet()->setCellValueByColumnAndRow(17, $excel_row, "ma-2018-1"
  );
    $object->getActiveSheet()->setCellValueByColumnAndRow(18, $excel_row, "5"
  );
    $object->getActiveSheet()->setCellValueByColumnAndRow(19, $excel_row, "LZDS 1 Faith"
  ); //group
    $object->getActiveSheet()->setCellValueByColumnAndRow(20, $excel_row, "sc-2018-1"
  );
    $object->getActiveSheet()->setCellValueByColumnAndRow(21, $excel_row, "5"
  );
    $object->getActiveSheet()->setCellValueByColumnAndRow(22, $excel_row, "LZDS 1 Faith"
  ); //group
    $object->getActiveSheet()->setCellValueByColumnAndRow(23, $excel_row, "sc-2018-1"
  );
    $object->getActiveSheet()->setCellValueByColumnAndRow(24, $excel_row, "5"
  );
    $object->getActiveSheet()->setCellValueByColumnAndRow(25, $excel_row, "LZDS 1 Faith"
    
  ); //group
  $excel_row++;
   }

  $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
  header('Content-Type: application/vnd.ms-excel');
  header('Content-Disposition: attachment;filename="Masterlist_Info_All.xls"');
  $object_writer->save('php://output');

  

 }

 
 
}