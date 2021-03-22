    <?php if($this->session->logged_in){?>
    <h1> <?= $title;?> </h1>
    <hr>
    <?= validation_errors();?>

          <div class="container-fluid ">
            <div class="row">
              <div class="col-12">
                    <label for="">School:</label>
                    <select name="st_school_name" id="st_school_name"class="form-control"  style="width: 200px; display: inline-block;" onchange="singleSelectChangeValue()">
                      <option value=""></option>
                          <?php foreach($schools as $row){?> 
                              <!-- ICHANGEDTOSTUDENTID -->
                      <option value="<?= $row['school_id'];?>"><?= $row['school_name'].' - '.$row['school_code'];?></option>
                          <?php } ?>
                    </select>
                    
                    <a href="create_masterlist" class="btn btn-dark  float-right" style="margin-right: 5px;" ><i class="fas fa-folder-plus"></i> Generate CBT Credentials</a>     
                    <a href="bulk_upload_of_students" class="btn btn-success  float-right" style="background-color:#138496; border-color:#138496; margin-right: 10px; "><i class="fas fa-file-import"></i> Bulk Upload</a>
                    <a href="add_student" class="btn btn-success  float-right" style="background-color:#FF8C00; border-color:#FF8C00; margin-right: 10px;" ><i class="fas fa-user-plus"></i> Add Student</a>
                    <!-- <div class="col-6"> -->
                 
                </div>
              </div>

  
    
            <br>
            <br>
            <div class="row">
              <div class="col-6">
                <?php foreach($count as $row){?>
                  <div style="margin-left: -20px;"><label for="" style="font-size: 20px; color: Black;">Total Students: <?= $row['student_id'];?></label>
                <?php } ?>
                  </div> 
                </div>
              <div class="col-6"></div>
            </div>
          </div>    
          <br>
          <button style="float:right; display: none;"></button>

      <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <table class="table table-bordered table-striped" id="students_list_table" style="">
                <thead>
                  <tr>
                  <th scope="col">LRN</th>
                  <th scope="col">Name</th>
                  <th scope="col">School Name<Code></Code></th>
                  <th scope="col">Gender</th>
                  <th scope="col">Age</th>
                  </tr>
                </thead>
                <tbody>
                    <?php foreach($students as $row){?>   
                        <tr>
                        <td scope="row" style="font-weight:bold"><?= $row['LRN'];?></th>
                        <td><?= $row['last_name'].', '.$row['first_name'].' '.$row['middle_name'];?></td>
                        <td><?= $row['school_name'];?></td>
                        <td><?= $row['gender'];?></td>
                        <td><?=  date_diff(date_create( $row['birth_date']), date_create('now'))->y;?></td>
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

<?php } else {  redirect('login'); ?>  
<?php }?>


<script>

// $('table_section').ddTableFilter();

$(document).ready(function(){
        Filter();
    $("#st_school_name").change(function(){
        let a = $(this).val();
        console.log(a);
        Filter();
    });
});

// function Filter() {

//     var schools = $("#st_school_name").val();
//     $.ajax({
//         url : "<?= base_url('FilterSchool/load_filter') ?>",
//         data: "st_school_name=" + schools,
//         success:function(data){
//             console.log(data);
//             // $("#table_section tbody").html('<tr><td colspan="4" align="center">PATRICK</td></tr>');
//             $("#students_list_table tbody").html(data);
//         }
//     });
// }



</script>



<script>
    $(document).ready(function(){  
    $('#students_list_table').DataTable();  
});  


// //Create Masterlist Shchool Dropdown Filter Batch
// $(document).ready(function(){
//  $('#st_school_name').change(function(){

//   var school_code = $('#st_school_name').val();
//   if(school_code != '')
//   {
//    $.ajax({
//     url:"<?php echo base_url(); ?>Pages/fetch_students_list",
//     method:"POST",
//     data:{st_school_name:school_code},
//     success:function(data)
//     {
//      $('#students_list_table').html(data); 
//     }
//    });
//   }
//   else
//   {
//    $('#students_list_table').html('<tr><td>Select School<td><tr>');
//   }

//  });
// });



</script>  

