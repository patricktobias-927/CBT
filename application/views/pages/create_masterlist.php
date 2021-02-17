<!-- <div class="container fluid "> -->
<form name="multiple_select_form" action="<?=base_url().'create_masterlist'?>" method="post">
<h1> <?= $title;?> </h1>
<?= validation_errors();?>
<?php if($this->session->flashdata('masterlist_added')) : ?> 
<?= '<p class="alert alert-success">'.$this->session->flashdata('masterlist_added').'</p>' ?>
<?php endif;?>


<hr>

<button style="float:right; display: none;"></button></div>
<div class="container-fluid px-0">
    <div class="row align-items-center">
        <div class="col-md-6 col-sm-6">
            <div class="row justify-content-end" style="">
               <div class="col-md-2 col-sm-6"><label for="">School :</label></div> 
               <div class="col-md-9 col-sm-6">  <select name="cbt_school_name" id="cbt_school_name"class="form-control"  style="width: 180px;float:left;margin-left:10px;margin-top:-4px;" onchange="singleSelectChangeValue()">
                    <option value=""></option>
                    <?php foreach($schools as $row){?> 
                    <!-- ICHANGEDTOSTUDENTID -->
                    <option value="<?= $row['school_id'];?>"><?= $row['school_name'].' - '.$row['school_code'];?></option>
                    <?php } ?>
                </select></div> 
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
                <div class="row">
                    <div class="col-md-4 col-sm-6"><label for="">School Acronym: </label></div> 
                    <div class=""> <input id="school_acronym" name="school_acronym" class="form-control" style="margin-left: -40px;" type="text" style="" placeholder="School Acronym"></div> 
                </div>
            </div>
        </div>
    </div>

<br>
<br>
<br>
<div class="container-fluid px-0">
    <div class="row align-items-center">
        <div class="col-md-6 col-sm-6">
            <div class="row justify-content-end" style="">
               <div class="col-md-2 col-sm-6"><label for="">School Year : </label></div> 
               <div class="col-md-9 col-sm-6">  <select id="cbt_school_year" name="cbt_school_year" class="form-control"  style="width: 180px; margin-left: 10px;">
                <option value=""></option>
                <option value="2021-2022">2021 - 2022</option>
                <option value="2022-2023">2022 - 2023</option>
                <option value="2023-2024">2023 - 2024</option>
                <option value="2024-2025">2024 - 2025</option>
                <option value="2025-2026">2025 - 2026</option>

                </select></div> 
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="row">
                <div class="col-md-2 col-sm-6"><label for="">Section :</label></div> 
                <div class="col-md-3 col-sm-6" style=""><select name="cbt_section" id="cbt_section" class="form-control"  style="width: 180px;float:left;margin-left:10px;margin-top:-4px; ">
                    <option value=""></option>
                    <?php foreach($sections as $row){?>
                    <option value="<?= $row['section_id'];?>"><?= $row['section_code'].' - '.$row['section_name'];?></option>
                    <?php } ?>
                </select>  </div> 
              
        </div>
            </div>
        </div>       
    </div>    
    
<br>
<br>  

<div class="container-fluid px-0">
    <div class="row align-items-center">
        <div class="col-md-6 col-sm-6">
            <div class="row justify-content-end" style="">
               <div class="col-md-2 col-sm-6"><label for="">Grade Level : </label></div> 
               <div class="col-md-9 col-sm-6">  <select name="cbt_grade_level" id="cbt_grade_level" class="form-control" style="width: 180px;float:left;margin-left:10px;margin-top:-4px; ">
                    <option value=""></option>
                    <?php foreach($grade_records as $row){?>
                    <option value="<?= $row['grade_level'];?>"><?= $row['grade_level'];?></option>
                    <?php } ?>
                </select>   </div> 
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="row" style="margin-top: 5px;">
                <div class="col-md-2 col-sm-6"><label for="">Assessment Type : </label></div> 
                <div class="col-md-2 col-sm-6"><select style="" id="cbt_assessment" name="cbt_assessment" class="selectpicker" data-live-search="true" onchange="singleSelectChangeValue()" >
                    <option value=""></option>
                    <?php foreach($assessment as $row){?>
                    <option value="<?= $row['assessment_id'];?>"><?= $row['assessment_type'];?></option>
                    <?php } ?>
                </select></div> 
               
                </div>
            </div>
        </div>       
    </div>     
<br>
<br>
<div class="container-fluid px-0">
    <div class="row align-items-center">
        <div class="col-md-6 col-sm-6">
            <div class="row justify-content-end" style="">
               <div class="col-md-2 col-sm-6"><label for="">Batch :</label></div> 
               <div class="col-md-9 col-sm-6"> <select name="cbt_batch" id="cbt_batch" class="form-control"  style="width: 180px;float:left;margin-left:10px;margin-top:-4px; ">
                    <option value=""></option>
                    <?php foreach($batch_records as $row){?>
                    <option value="<?= $row['batch_name'];?>"><?= $row['batch_name'];?></option>
                    <?php } ?>
                </select></div> 
                <input type="hidden" name="cbt_hidden_framework" id="cbt_hidden_framework" />
            </div>
        </div>

        </div>       
    </div>     

                <select name="cbt_id" id="cbt_id" class="form-control"  style="display: none;">
                    <option value=""></option>
                    <?php foreach($last_id as $row){?>
                    <option value="<?= $row['masterlist_id'];?>" selected><?= $row['masterlist_id'];?></option>
                    <?php } ?>
                </select>

<br>
<br>
<br>

<div class="container-fluid px-0">
    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div class="row justify-content-start" style="">
               <div class="col-md-2 col-sm-6" style="margin-left: 46px;"><label for="">Select Section :</label></div> 
               <div class="col-md-8 col-sm-6 d-md-inline">
               <select name="cbt_select_section" id="cbt_select_section" class="form-control"  style="width: 180px;float:left;margin-left:10px;margin-top:-4px; ">
                    <option value=""></option>
                    <?php foreach($grade_records as $row){?>
                    <option value="<?= $row['grade_level'];?>"><?= $row['grade_level'];?></option>
                    <?php } ?>
                </select>  
                </div> 
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="row justify-content-start" style="">
               <div class="col-md-2 col-sm-6" style=""></div> 
               <div class="col-md-8 col-sm-6 d-md-inline">
               <button type="submit" id="add" name="add" class="btn btn-warning" style="float:right;"><i class="fas fa-poll-h"></i> Create Masterlist</button>
              <br>
              <br>
                <a type="button" class="btn btn-success" style="float:right; margin-top: 10px;" href="<?=base_url().'ExcelExportMasterlist/action'?>">Download Excel File</a>
                <a type="button" class="btn btn-success" style="float:right; margin-top: 10px;" href="<?=base_url().'ExcelExportMcsv/action'?>">Download CSV File</a>
                </div> 
            </div>
        </div>
        

            
        </div>       
    </div>

       <br>
       <br>     
       <br>   
       <br>
 

    <div class="container-fluid px-0">
    <div class="row">
           <br>
        <div class="col-md-6 col-sm-6">
            <div class="row justify-content-start" style="">
     
            </div>
        </div>
        
    
 
        </div>       
    </div>    

    <div class="container">
    <div class="row">
        <div class="col-md-12">
        
        </div>
    </div>
</div>

        </form>



<script>
function singleSelectChangeValue() {
        //Getting Value
        //var selValue = document.getElementById("singleSelectDD").value;
        var selObj = document.getElementById("cbt_assessment");
        var selValue = selObj.options[selObj.selectedIndex].value;
        //Setting Value
        document.getElementById("cbt_hidden_framework").value = selValue;
    }


</script>

<script>  
            $(document).ready(function(){  
                $('#batch_table').DataTable();  
            });  
            </script>  