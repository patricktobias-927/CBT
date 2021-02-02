<h1> <?= $title;?> </h1>
<hr>
<?= validation_errors();?>

 
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="row">
            <div class="col-md-1 col-sm-6"><label for="">Masterlist ID : </label></div> 
                <div class="col-md-6 col-sm-6"><select style="" id="cbt_masterlist" name="cbt_masterlist" class="selectpicker" data-live-search="true" onchange="singleSelectChangeValue()" >
                    <option value=""></option>
                    <?php foreach($masterlist as $row){?>
                    <option value="<?= $row['masterlist_id'];?>"><?= $row['masterlist_id'];?></option>
                    <?php } ?>
                </select></div> 
          
            </div>
        </div>
    </div>
</div>    
     
<br>
<br>
     <button style="float:right; display: none;"></button></div>

<div class="container">
    <div class="row">
        <div class="col-sm-12">

        
   
        <table class="table table-bordered table-striped" id="students_list_table" style="">
            <thead>
                <tr>
                <th scope="col">Masterlist ID</th>
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
                <td><?= $row['masterlist_id'];?></td>
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

        <div class="col-6">
            <div class="dropdown">
            <form name="multiple_select_form" action="<?=base_url().'ExcelExportMasterlist/action'?>" method="post">
            <input type="" name="cbt_masterlist_framework" id="cbt_masterlist_framework" />
                <button type="submit" class="btn" style="margin-right: 5px; float:right;  background-color: white; border-color: gray;" name="" type="button" id="dropdownMenuButton" data-toggle="" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-print"></i> Download Excel File
                </button>
                       
             
                            <!-- <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                
                                  <buttom  type="button" class="dropdown-item" href="<?php echo base_url(); ?>ExcelExportMasterlist/action">Export All</a> -->
                                  <!-- <a  type="button" class="dropdown-item" data-toggle="modal" data-target="#Modal_All">Export All</a> -->
                                <!-- <a  type="button" class="dropdown-item" data-toggle="modal" data-target="#Modal_Students">Export Per LRN</a>
                                <a type="button" class="dropdown-item" data-toggle="modal" data-target=".Modal_Schools">Export Per School</a>
                                <a type="button" class="dropdown-item" data-toggle="modal" data-target="#Modal_Sections">Export Per Section</a> -->
                            <!-- </div> -->
              </form>

              
            </div>
          </div>

          <div class="col-">
            <div class="dropdown">
              
            <form name="multiple_select_form" action="<?=base_url().'ExcelExportMcsv/action'?>" method="post">
            <input type="" name="cbt_masterlist_framework" id="cbt_masterlist_framework" />
                <button type="submit" class="btn" style="margin-right: 5px; float:right;  background-color: white; border-color: gray;" name="" type="button" id="dropdownMenuButton" data-toggle="" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-print"></i> Download CSV File
                </button>
                          
                          
              </form>


                </div>     
          </div>   

    </div>

    <br>

</div>





            <script>
                $(document).ready(function(){  
                $('#students_list_table').DataTable();  
            });  
            </script>  

<script>
function singleSelectChangeValue() {
        //Getting Value
        //var selValue = document.getElementById("singleSelectDD").value;
        var selObj = document.getElementById("cbt_masterlist");
        var selValue = selObj.options[selObj.selectedIndex].value;
        //Setting Value
        document.getElementById("cbt_masterlist_framework").value = selValue;
    }


</script>

