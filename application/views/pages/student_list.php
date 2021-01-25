<h1> <?= $title;?> </h1>
<hr>
<?= validation_errors();?>

        <!-- <?= form_open('students_list');?> -->
        <!-- <div class="form-group">
     <label for="search"  style="float:left;">Search School:</label>
            <input type="text" name="search_text" id="search_text" class="form-control" placeholder="Search" style="width: 180px; border-color:gray; margin-left:10px; margin-top:-4px; float:left;"   value="<?= set_value('schoolcode'); ?>">
        </div> -->
       

<div class="container">
    <div class="row justify-content-end">
        <div class="col-6">

        <a href="add_student" class="btn btn-success" style="background-color:#FF8C00; border-color:#FF8C00;" ><i class="fas fa-user-plus"></i> Add Student</a>
            <a href="bulk_upload_of_students" class="btn btn-success" style="background-color:#138496; border-color:#138496; "><i class="fas fa-file-import"></i> Bulk Upload</a>
        <!-- <form method="post" action="<?php echo base_url(); ?>Export_add_section_perschool/action">
                <label for="">Select LRN: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <select id="select_LRN" name="select_LRN" class="selectpicker" data-live-search="true" onchange="singleSelectChangeofValue()">
                        <option value=""></option>
                        <?php foreach($records as $row){?>
                        <option value="<?= $row['LRN'];?>"><?= $row['LRN'].' - '.$row['last_name'].', '.$row['first_name'].' '.$row['middle_name'];?></option>
                        <?php } ?>
                        </select>
                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> 
           
            </form>   -->
        
        </div>
        
<div class="col-6">
    <div class="row float-right">
        <!-- <div class="col-6"> -->
        <a href="#" class="btn btn-secondary" style="margin-right: 5px;" ><i class="fas fa-folder-plus"></i> Generate CBT Credentials</a>
            <!-- <a href="add_student" class="btn btn-success" style="background-color:#FF8C00; border-color:#FF8C00;" ><i class="fas fa-user-plus"></i> Add Student</a>
            <a href="bulk_upload_of_students" class="btn btn-success" style="background-color:#138496; border-color:#138496; "><i class="fas fa-file-import"></i> Bulk Upload</a> -->
        <!-- </div>      -->
    <!-- <div class="col-md-6 col-sm-6 ">     -->
        
<div class="dropdown ">
    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-print"></i> Export Data
            </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a  type="button" class="dropdown-item" data-toggle="modal" data-target="#Modal_All">Export All</a>
                    <a  type="button" class="dropdown-item" data-toggle="modal" data-target="#Modal_Students">Export Per LRN</a>
                    <a type="button" class="dropdown-item" data-toggle="modal" data-target=".Modal_Schools">Export Per School</a>
                    <a type="button" class="dropdown-item" data-toggle="modal" data-target="#Modal_Sections">Export Per Section</a>
                    <!-- </div>                -->
                </div>
            </div>
        </div>
    </div>   
</div>
    <br>
    <div class="row">
        <div class="col-6">

            <!-- <form method="post" action="<?php echo base_url(); ?>Export_add_section_perschool/action">
                    <label for="">Filter by School: </label>
                        <select id="select_sectionmodal" name="select_sectionmodal" class="selectpicker" data-live-search="true" onchange="singleSelectChangeofValue()">
                        <option value=""></option>
                        <?php foreach($schools as $row){?>
                        <option value="<?= $row['school_code'];?>"><?= $row['school_code'].' - '.$row['school_name'];?></option>
                        <?php } ?>
                        </select>
                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>  -->

            </form>  

        </div>
        <div class="col-6"></div>
    </div>
</div>    

     <br>
     
     <button style="float:right; display: none;"></button></div>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
   
        <table class="table table-bordered table-striped" id="students_list_table" style="">
            <thead>
                <tr>
                <th scope="col">LRN</th>
                <th scope="col">Name</th>
                <th scope="col">School <Code></Code></th>
                <th scope="col">Gender</th>
                <th scope="col">Age</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($students as $row){?>
               

               
                <tr>
                <td scope="row" style="font-weight:bold"><?= $row['LRN'];?></th>
                <td><?= $row['last_name'].', '.$row['first_name'].' '.$row['middle_name'];?></td>
                <td><?= $row['school_code'];?></td>
                <td><?= $row['gender'];?></td>
                <td><?= $row['birth_date'];?></td>
                </tr>
            
                <?php } ?>
            </tbody>
            </table>
         </div>          
    </div>
</div>

<!-- ALL MODAL -->
<div class="modal fade" id="Modal_All" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Export All</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="<?php echo base_url(); ?>Export_add_section_perschool/action">
                <!-- <label for="">Select LRN: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <select id="select_sectionmodal" name="select_sectionmodal" class="selectpicker" data-live-search="true" onchange="singleSelectChangeofValue()">
                        <option value=""></option>
                        <?php foreach($records as $row){?>
                        <option value="<?= $row['LRN'];?>"><?= $row['LRN'].' - '.$row['last_name'].', '.$row['first_name'].' '.$row['middle_name'];?></option>
                        <?php } ?>
                        </select>
                      
                        <br>
                        <br>
                        
                <div class="dropdown" style="margin-left: 170px;"> -->
    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-print"></i> Export Data
            </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <!-- <a  class="dropdown-item" href="<?php echo base_url(); ?>Export_add_section/action">Generate CBT Credentials</a> -->
                    <a class="dropdown-item" href="<?php echo base_url(); ?>Excel_export_students_all/action">Print Details</a>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>Export_add_section/action">Generate Respondent Template</a>

                    </div>               
                <!-- </div> -->

            </form>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
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
                      
                        <br>
                        <br>
                        
                <div class="dropdown" style="margin-left: 170px;">
    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-print"></i> Export Data
            </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <!-- <a  class="dropdown-item" href="<?php echo base_url(); ?>Export_add_section/action">Generate CBT Credentials</a> -->
                    <!-- <a class="dropdown-item" href="<?php echo base_url(); ?>Export_add_section/action">Print Details</a>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>Export_add_section/action">Generate Respondent Template</a> -->
                    <button class="dropdown-item" type="submit" name="export"  value="">Print Details</button>
                    <button class="dropdown-item" type="submit" name="export"  value="">Generate Respondent Template</button>

                    </div>               
                </div>

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
                      
                        <br>
                        <br>
                        
                <div class="dropdown" style="margin-left: 170px;">
    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-print"></i> Export Data
            </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <!-- <a  class="dropdown-item" href="<?php echo base_url(); ?>Export_add_section/action">Generate CBT Credentials</a> -->
                    <!-- <a class="dropdown-item" href="<?php echo base_url(); ?>Export_lrn/action">Print Details</a> -->
                    <button class="dropdown-item" type="submit" name="export"  value="">Print Details</button>
                    <button class="dropdown-item" type="submit" name="export"  value="">Generate Respondent Template</button>
                 
                    </div>               
                </div>

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

 <br>
 <br>           

<div class="dropdown" style="margin-left: 170px;">
    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-print"></i> Export Data
            </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
               
                    <!-- <a  class="dropdown-item" href="<?php echo base_url(); ?>Export_add_section/action">Generate CBT Credentials</a> -->
                    <button class="dropdown-item" type="submit" name="export"  value="">Print Details</button>
                    <button class="dropdown-item" type="submit" name="export"  value="">Generate Respondent Template</button>

                    </div>               
                </div>
           
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

