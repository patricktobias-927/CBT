<h1> <?= $title;?> </h1>
<hr>
<?= validation_errors();?>

 
    
     
     <button style="float:right; display: none;"></button></div>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
   
        <table class="table table-bordered table-striped" id="students_list_table" style="">
            <thead>
                <tr>
                <th scope="col">School Name</th>
                <th scope="col">School Acronym</th>
                <th scope="col">School Code <Code></Code></th>
                <th scope="col">Section Name</th>
                <th scope="col">Section Code</th>
                <th scope="col">School Year</th>
                <th scope="col">Grade Level</th>
                <th scope="col">Assessment</th>
                <th scope="col">Batch</th>
             
                </tr>
            </thead>
            <tbody>
            <?php foreach($masterlist as $row){?>
               

               
                <tr>
                <td><?= $row['school_name'];?></td>
                <td><?= $row['school_acronym'];?></td>
                <td><?= $row['school_code'];?></td>
                <td><?= $row['section_name'];?></td>
                <td><?= $row['section_code'];?></td>
                <td><?= $row['school_year'];?></td>
                <td><?= $row['grade_level'];?></td>
                <td><?= $row['assessment_id'];?></td>
                <td><?= $row['batch'];?></td>
                </tr>
            
                <?php } ?>
            </tbody>
            </table>
         </div>          
    </div>
    
<br> 
<br> 
     
<div class="row">

        <div class="col-3">
            <div class="dropdown">
                <button class="btn dropdown-toggle exportStudentList" style="margin-right: 5px; float:right;  background-color: white; border-color: gray;" name="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-print"></i> Export Student Details
                        </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <a  type="button" class="dropdown-item" href="<?php echo base_url(); ?>Excel_export_students_all/action">Export All</a>
                                  <!-- <a  type="button" class="dropdown-item" data-toggle="modal" data-target="#Modal_All">Export All</a> -->
                                <a  type="button" class="dropdown-item" data-toggle="modal" data-target="#Modal_Students">Export Per LRN</a>
                                <a type="button" class="dropdown-item" data-toggle="modal" data-target=".Modal_Schools">Export Per School</a>
                                <a type="button" class="dropdown-item" data-toggle="modal" data-target="#Modal_Sections">Export Per Section</a>
                            </div>
            </div>
          </div>

          <div class="col-3">
            <div class="dropdown div">
                <button class="btn dropdown-toggle exportRespondentTempalate" style="margin-left: -25px; background-color: white; border-color: gray;" type="button" name="exportRespondentTempalate" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-print"></i> Export Respondent Template
                        </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <!-- <a  type="button" class="dropdown-item" data-toggle="modal" data-target="#Modal_All">Export All</a> -->
                                  <a  type="button" class="dropdown-item" href="<?php echo base_url(); ?>ExcelExportRespondent/action">Export All</a>
                                <a  type="button" class="dropdown-item" data-toggle="modal" data-target="#Modal_Students2">Export Per LRN</a>
                                <a type="button" class="dropdown-item" data-toggle="modal" data-target="#Modal_Schools2">Export Per School</a>
                                <a type="button" class="dropdown-item" data-toggle="modal" data-target="#Modal_Sections2">Export Per Section</a> 
                            </div>
                </div>     
          </div>   

    </div>

    <br>

</div>


<!-- Sections MODAL -->
<div class="modal fade" id="Modal_Sections" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Select Section</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="<?php echo base_url(); ?>Excel_Section/action">
                <label for="">Select Section: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <select id="select_section" name="select_section" class="selectpicker" data-live-search="true" onchange="singleSelectChangeofValue()">
                        <option value=""></option>
                        <?php foreach($sections as $row){?>
                        <option value="<?= $row['section_code'];?>"><?= $row['section_code'].' - '.$row['section_name'];?></option>
                        <?php } ?>
                        </select>
                      
                        <!-- <br>
                        <br>
                         -->
                <!-- <div class="dropdown" style="margin-left: 170px;"> -->
    <button class="btn btn-primary" type="submit" style="margin-left: 10px;" id="dropdownMenuButton" data-toggle="" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-print"></i>
            </button>
                <!-- <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"> -->
                    <!-- <a  class="dropdown-item" href="<?php echo base_url(); ?>Export_add_section/action">Generate CBT Credentials</a> -->
                    <!-- <a class="dropdown-item" href="<?php echo base_url(); ?>Export_add_section/action">Print Details</a>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>Export_add_section/action">Generate Respondent Template</a> -->
                    <!-- <button class="dropdown-item" type="submit" name="export"  value="">Print Details</button> -->
                    <!-- <button class="dropdown-item" type="submit" name="export"  value="">Respondent Template</button> -->

                    <!-- </div>               
                </div> -->


                <!-- <div class="dropdown" style="margin-left: 170px;">
    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-print"></i> Export Data
            </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"> -->
                    <!-- <a  class="dropdown-item" href="<?php echo base_url(); ?>Export_add_section/action">Generate CBT Credentials</a> -->
                    <!-- <a class="dropdown-item" href="<?php echo base_url(); ?>Export_add_section/action">Print Details</a>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>Export_add_section/action">Generate Respondent Template</a> -->
                    <!-- <button class="dropdown-item" type="submit" name="export"  value="">Print Details</button> -->
                    <!-- <button class="dropdown-item" type="submit" name="export"  value="">Respondent Template</button> -->
<!-- 
                    </div>               
                </div> -->


            </form>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>

<!-- LRN MODAL -->
<div class="modal fade" id="Modal_Students" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Select LRN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="<?php echo base_url(); ?>Export_lrn/action">
                <label for="">Select LRN: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <select id="select_lrn" name="select_lrn" class="selectpicker" data-live-search="true" onchange="singleSelectChangeofValue()">
                        <option value=""></option>
                        <?php foreach($records as $row){?>
                        <option value="<?= $row['student_id'];?>"><?= $row['LRN'].' - '.$row['last_name'].', '.$row['first_name'].' '.$row['middle_name'];?></option>
                        <?php } ?>
                        </select>
<!--                       
                        <br>
                        <br> -->
                        
                <!-- <div class="dropdown" style="margin-left: 170px;"> -->
    <button class="btn btn-primary" style="margin-left: 10px;" type="submit" id="dropdownMenuButton" data-toggle="" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-print"></i>
            </button>
                <!-- <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"> -->
                    <!-- <a  class="dropdown-item" href="<?php echo base_url(); ?>Export_add_section/action">Generate CBT Credentials</a> -->
                    <!-- <a class="dropdown-item" href="<?php echo base_url(); ?>Export_lrn/action">Print Details</a> -->
                    <!-- <button class="dropdown-item" type="submit" name="export"  value="">Print Details</button> -->
                    <!-- <a class="dropdown-item" href="<?php echo base_url(); ?>ExcelExportReslrn/action">Respondent Template</a> -->
                    <!-- <button class="dropdown-item" type="submit" name="export"  value="">Respondent Template</button> -->
                 
                    <!-- </div>                -->
                <!-- </div> -->

            </form>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>

  <!-- SCHOOL MODAL -->
<div class="modal fade Modal_Schools" id="Modal_Schools" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Select School</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form method="post" action="<?php echo base_url(); ?>Excel_School/action">
                <label for="">Select School: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <select id="select_code" name="select_code" class="selectpicker" data-live-search="true" onchange="singleSelectChangeofValue()">
                        <option value=""></option>
                        <?php foreach($schools as $row){?>
                            <option value="<?= $row['school_code'];?>"><?= $row['school_code'].' - '.$row['school_name'];?></option>
                        <?php } ?>
                        </select>
<!-- 
 <br>
 <br>            -->

<!-- <div class="dropdown" style="margin-left: 170px;"> -->
    <button class="btn btn-primary" style="margin-left: 10px;" type="submit" id="dropdownMenuButton" data-toggle="" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-print"></i>
            </button>
                <!-- <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"> -->
               
                    <!-- <a  class="dropdown-item" href="<?php echo base_url(); ?>Export_add_section/action">Generate CBT Credentials</a> -->
                    <!-- <button class="dropdown-item" type="submit" name="export"  value="">Print Details</button> -->
                    <!-- <button class="dropdown-item" type="submit" name="export"  value="">Respondent Template</button> -->

                    <!-- </div>                -->
                <!-- </div> -->
           
            </form>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>

  </div>
</div>


<!-- RESPONDENT TEMPLATE -->

<!-- Sections MODAL -->
<div class="modal fade" id="Modal_Sections2" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Select Section</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="<?php echo base_url(); ?>ExcelExportRsection/action">
                <label for="">Select Section: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <select id="select_section2" name="select_section2" class="selectpicker" data-live-search="true" onchange="singleSelectChangeofValue()">
                        <option value=""></option>
                        <?php foreach($sections as $row){?>
                        <option value="<?= $row['section_code'];?>"><?= $row['section_code'].' - '.$row['section_name'];?></option>
                        <?php } ?>
                        </select>
                      
                        <!-- <br>
                        <br>
                         -->
                <!-- <div class="dropdown" style="margin-left: 170px;"> -->
    <button class="btn btn-primary" type="submit" style="margin-left: 10px;" id="dropdownMenuButton" data-toggle="" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-print"></i>
            </button>


            </form>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>

<!-- LRN MODAL -->
<div class="modal fade" id="Modal_Students2" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Select LRN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="<?php echo base_url(); ?>ExcelExportReslrn/action">
                <label for="">Select LRN: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <select id="select_lrn2" name="select_lrn2" class="selectpicker" data-live-search="true" onchange="singleSelectChangeofValue()">
                        <option value=""></option>
                        <?php foreach($records as $row){?>
                        <option value="<?= $row['student_id'];?>"><?= $row['LRN'].' - '.$row['last_name'].', '.$row['first_name'].' '.$row['middle_name'];?></option>
                        <?php } ?>
                        </select>
<!--                       
                        <br>
                        <br> -->
                        
                <!-- <div class="dropdown" style="margin-left: 170px;"> -->
    <button class="btn btn-primary" style="margin-left: 10px;" type="submit" id="dropdownMenuButton" data-toggle="" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-print"></i>
            </button>
                <!-- <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"> -->
                    <!-- <a  class="dropdown-item" href="<?php echo base_url(); ?>Export_add_section/action">Generate CBT Credentials</a> -->
                    <!-- <a class="dropdown-item" href="<?php echo base_url(); ?>Export_lrn/action">Print Details</a> -->
                    <!-- <button class="dropdown-item" type="submit" name="export"  value="">Print Details</button> -->
                    <!-- <a class="dropdown-item" href="<?php echo base_url(); ?>ExcelExportReslrn/action">Respondent Template</a> -->
                    <!-- <button class="dropdown-item" type="submit" name="export"  value="">Respondent Template</button> -->
                 
                    <!-- </div>                -->
                <!-- </div> -->

            </form>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>

  <!-- SCHOOL MODAL -->
<div class="modal fade Modal_Schools" id="Modal_Schools2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Select School</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form method="post" action="<?php echo base_url(); ?>ExcelExportRschool/action">
                <label for="">Select School: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <select id="select_code2" name="select_code2" class="selectpicker" data-live-search="true" onchange="singleSelectChangeofValue()">
                        <option value=""></option>
                        <?php foreach($schools as $row){?>
                            <option value="<?= $row['school_code'];?>"><?= $row['school_code'].' - '.$row['school_name'];?></option>
                        <?php } ?>
                        </select>
<!-- 
 <br>
 <br>            -->

<!-- <div class="dropdown" style="margin-left: 170px;"> -->
    <button class="btn btn-primary" style="margin-left: 10px;" type="submit" id="dropdownMenuButton" data-toggle="" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-print"></i>
            </button>
                <!-- <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"> -->
               
                    <!-- <a  class="dropdown-item" href="<?php echo base_url(); ?>Export_add_section/action">Generate CBT Credentials</a> -->
                    <!-- <button class="dropdown-item" type="submit" name="export"  value="">Print Details</button> -->
                    <!-- <button class="dropdown-item" type="submit" name="export"  value="">Respondent Template</button> -->

                    <!-- </div>                -->
                <!-- </div> -->
           
            </form>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
    
  </div>
</div>



            <script>
                $(document).ready(function(){  
                $('#students_list_table').DataTable();  
            });  
            </script>  

