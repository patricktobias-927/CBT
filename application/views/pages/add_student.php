<?php if($this->session->logged_in){?>
<!-- <div class="container fluid "> -->
<form name="multiple_select_form" action="<?=base_url().'add_student'?>" method="post">
<h1> <?= $title;?> </h1>
<?= validation_errors();?>
<?php if($this->session->flashdata('student_added')) : ?> 
<?= '<p class="alert alert-success">'.$this->session->flashdata('student_added').'</p>' ?>
<?php endif;?>
<!-- <?php if($this->session->flashdata('subject_deleted')) : ?> 
<?= '<p class="alert alert-success">'.$this->session->flashdata('subject_deleted').'</p>' ?>
<?php endif;?> -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <button type="submit" id="add" name="add" class="btn btn-success" style="float:right; background-color: #FF8C00; border-color: #FF8C00;"><i class="fas fa-user-plus"></i> Add Student</button>
        </div>
    </div>
</div>
<hr>

<button style="float:right; display: none;"></button></div>
<div class="container-fluid px-0">
    <div class="row align-items-center">
        <div class="col-md-6 col-sm-6">
            <div class="row justify-content-end" style="">
               <div class="col-md-2 col-sm-6"><label for="">LRN :</label></div> 
               <div class="col-md-9 col-sm-6"> <input id="LRN" name="LRN" class="form-control" style="width: 60% !important;" type="text" style="" placeholder="LRN"></div> 
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
                <div class="row">
                    <div class="col-md-4 col-sm-6"><label for="">Phoenix Student Code : </label></div> 
                    <div class="col-md-8 col-sm-6"> <input id="phoenix_student_code" name="phoenix_student_code" class="form-control" style="width: 90% !important;" type="text" style="" placeholder="Phoenix Student Code"></div> 
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
               <div class="col-md-2 col-sm-6"><label for="">First Name : </label></div> 
               <div class="col-md-9 col-sm-6"> <input id="first_name" name="first_name" class="form-control" style="width: 60% !important;" type="text" style="" placeholder="First Name"></div> 
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="row">
                <div class="col-md-2 col-sm-6"><label for="">Gender</label></div> 
                <div class="col-md-3 col-sm-6" style=""><select id="gender" name="gender" class="form-control"  style="width: 110px;">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
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
               <div class="col-md-2 col-sm-6"><label for="">Middle Name : </label></div> 
               <div class="col-md-9 col-sm-6"> <input id="middle_name" name="middle_name" class="form-control" style="width: 60% !important;" type="text" style="" placeholder="Middle Name"></div> 
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="row">
                <div class="col-md-2 col-sm-6"><label for="">Birthdate: </label></div> 
                <input id="birthdate" name="birthday" class="col-md-5 col-sm-6 form-control" type=""  name="birthday" value="10/24/1984" />
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
               <div class="col-md-2 col-sm-6"><label for="">Last Name : </label></div> 
               <div class="col-md-9 col-sm-6"> <input id="last_name" name="last_name" class="form-control" style="width: 60% !important;" type="text" style="" placeholder="Middle Name"></div> 
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="row">
                <div class="col-md-2 col-sm-6"><label for="">School: </label></div> 
                <div class="col-md-9 col-sm-6">  <select name="school_name" id="school_name"class="form-control"  style="width: 180px;float:left;margin-left:10px;margin-top:-4px;" onchange="singleSelectChangeValue()">
                    <option value=""></option>
                    <?php foreach($schools as $row){?> 
                    <!-- ICHANGEDTOSTUDENTID -->
                    <option value="<?= $row['school_code'];?>"><?= $row['school_name'].' - '.$row['school_code'];?></option>
                    <?php } ?>
                </select></div> 
               
                </div>
            </div>
        </div>       
    </div>         
<br>
<br>
<br>

<div class="container-fluid px-0">
    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div class="row justify-content-start" style="">
               <div class="col-md-2 col-sm-6" style="margin-left: 46px;"><label for="">Grade level :</label></div> 
               <div class="col-md-8 col-sm-6 d-md-inline">
               <select name="grade_level" id="grade_level" class="form-control"  style="width: 180px;float:left;margin-left:10px;margin-top:-4px; ">
                    <!-- <option value=""></option> -->
                    <!-- <?php foreach($grade_records as $row){?>
                    <option value="<?= $row['grade_level'];?>"><?= $row['grade_level'];?></option>
                    <?php } ?> -->
                </select>  
                </div> 
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="row justify-content-start" style="">
               <div class="col-md-2 col-sm-6" style=""><label for="">Section :</label></div> 
               <div class="col-md-8 col-sm-6 d-md-inline">
               <select name="section" id="section" class="form-control"  style="width: 180px;float:left;margin-left:10px;margin-top:-4px; ">
                    <!-- <option value=""></option> -->
                    <!-- <?php foreach($sections as $row){?>
                    <option value="<?= $row['section_id'];?>"><?= $row['section_code'].' - '.$row['section_name'];?></option>
                    <?php } ?> -->
                </select>  
                
                </div> 
            </div>
        </div>
        
        <!-- <div class="col-md-6 col-sm-6"><a class="btn btn-info" id="toggle"><i class="fas fa-plus"></i> Add Previous Records</a></div>  -->
        <!-- <div class="col-md-6 col-sm-6">
            <div class="row">
                <div class="col-md-6 col-sm-6"><a class="btn btn-primary" id="toggle">Has Records?</a></div> 
                <div class="col-md-6 col-sm-6"></div> 
                </div>
            </div> -->
            
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
               <!-- <div class="col-md-2 col-sm-6" style="margin-left: 46px;"><label for="">Grade level :</label></div> 
               <div class="col-md-8 col-sm-6 d-md-inline">
               <select name="grade_level" id="grade_level" class="form-control"  style="width: 180px;float:left;margin-left:10px;margin-top:-4px; ">
                    <option value=""></option>
                    <?php foreach($grade_records as $row){?>
                    <option value="<?= $row['grade_level'];?>"><?= $row['grade_level'];?></option>
                    <?php } ?>
                </select>  
                </div>  -->
            </div>
        </div>
        
        <div class="col-md-6 col-sm-6"><a class="btn btn-info" id="toggle"><i class="fas fa-plus"></i> Add Previous Records</a></div> 
        <!-- <div class="col-md-6 col-sm-6">
            <div class="row">
                <div class="col-md-6 col-sm-6"><a class="btn btn-primary" id="toggle">Has Records?</a></div> 
                <div class="col-md-6 col-sm-6"></div> 
                </div>
            </div> -->
        </div>       
    </div>    

    <br>
    <br>
    <br>
    <br>
    <br>

<div style="display:none;" class="container respondent_id">

<div class="container-fluid px-0">
    <div class="row align-items-center">
        <div class="col-md-6 col-sm-6">
            <div class="row justify-content" style="">
               <div class="col-md-5 col-sm-6"><label style=" font-weight: bold;" for="">Previous Test</label></div> 
            </div>
        </div>
        <div class="col-md-7 col-sm-6">
            </div>
        </div>       
    </div> 
    <br>
<div class="container-fluid px-0">
    <div class="row align-items-center">
        <div class="col-md-6 col-sm-6">
            <div class="row justify-content-end" style="">
               <div class="col-md-2 col-sm-6"><label for="">Grade level : </label></div> 
               <div class="col-md-9 col-sm-6">   <select name="grade_level1" id="grade_level1" class="form-control" style="width: 180px;float:left;margin-left:10px;margin-top:-4px; ">
                    <option value=""></option>
                    <?php foreach($grade_records as $row){?>
                    <option value="<?= $row['grade_level'];?>"><?= $row['grade_level'];?></option>
                    <?php } ?>
                </select>   </div> 
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
                <div class="row">
                    <div class="col-md-2 col-sm-6"><label for="">Assessment Type : </label></div> 
                    <div class="col-md-9 col-sm-6"> <select id="select_1" name="select_1" class="selectpicker" data-live-search="true" onchange="singleSelectChangeValue()" >
                    <option value=""></option>
                    <?php foreach($assessment as $row){?>
                    <option value="<?= $row['assessment_type'];?>"><?= $row['assessment_type'];?></option>
                    <?php } ?>
                </select> </div> 
                <input type="hidden" name="hidden_framework" id="hidden_framework" />
                </div>
            </div>
        </div>       
    </div> 
<div class="container-fluid px-0">
    <div class="row align-items-center">
        <div class="col-md-6 col-sm-6">
            <div class="row justify-content-end" style="">
               <div class="col-md-2 col-sm-6"><label for="">Respondent Number : </label></div> 
               <div class="col-md-9 col-sm-6"> <input id="respondent_number1" name="respondent_number1" class="form-control" style="width: 60% !important;" type="text" style="" placeholder="Respondent Number"></div> 
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            </div>
        </div>       
    </div> 
    <div class="container-fluid px-0">
    <div class="row align-items-center">
        <div class="col-md-6 col-sm-6">
            <div class="row justify-content-end" style="">
               <div class="col-md-2 col-sm-6"><label for="">Section : </label></div> 
               <div class="col-md-9 col-sm-6">  <select name="section_1" id="section_1" class="form-control"  style="width: 180px;float:left;margin-left:10px;margin-top:-4px; ">
                    <option value=""></option>
                    <?php foreach($sections as $row){?>
                    <option value="<?= $row['section_code'];?>"><?= $row['section_code'].' - '.$row['section_name'];?></option>
                    <?php } ?>
                </select> </div> 
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            </div>
        </div>       
    </div>
    <div class="container-fluid px-0">
    <div class="row align-items-center">
        <div class="col-md-6 col-sm-6">
            <div class="row justify-content-end" style="">
               <div class="col-md-2 col-sm-6"><label for="">Testing Date : </label></div> 
               <div class="col-md-9 col-sm-6"> <input id="testing_date1" name="testing_date1" class="form-control" style="width: 60% !important;  margin-top: 10px; " type="text" placeholder="Testing Date"></div> 
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            </div>
        </div>       
    </div>      
    <div class="container-fluid px-0">
        <div class="row align-items-center">
            <div class="col-md-6 col-sm-6">
                <div class="row justify-content-end" style="">
                <div class="col-md-2 col-sm-6" style="margin-top: 15px;"><label for="">Batch : </label></div> 
                <div class="col-md-9 col-sm-6" > <br><select name="batch_1" id="batch_1" class="form-control"  style="width: 180px;float:left;margin-left:10px;margin-top:-4px; ">
                    <option value=""></option>
                    <?php foreach($batch_records as $row){?>
                    <option value="<?= $row['batch_name'];?>"><?= $row['batch_name'];?></option>
                    <?php } ?>
                </select> </div> 
                <!-- <input id="batch_1" name="batch_1" class="form-control" style="width: 60% !important; margin-top: 10px;" type="text" style="" placeholder="Batch"> -->
                </div>
            </div>
            <div class="col-md-6 col-sm-6"><a class="btn btn-secondary" id="toggle2"><i class="fas fa-plus"></i> Add more</a></div> 
        </div>   
    </div>
          
</div>    



<div style="display:none;" class="container respondent_id2">
<div class="container-fluid px-0">
    <div class="row align-items-center">
        <div class="col-md-6 col-sm-6">
            <div class="row justify-content" style="">
               <div class="col-md-5 col-sm-6"><label style=" font-weight: bold;" for="">Previous Test</label></div> 
            </div>
        </div>
        <div class="col-md-7 col-sm-6">
            </div>
        </div>       
    </div> 
    <br>
<div class="container-fluid px-0">
    <div class="row align-items-center">
        <div class="col-md-6 col-sm-6">
            <div class="row justify-content-end" style="">
               <div class="col-md-2 col-sm-6"><label for="">Grade level : </label></div> 
               <div class="col-md-9 col-sm-6"> <input id="grade_level2" name="grade_level2" class="form-control" style="width: 60% !important;" type="text" style="" placeholder="Grade Level"></div> 
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
                <div class="row">
                    <div class="col-md-2 col-sm-6"><label for="">Assessment Type : </label></div> 
                    <div class="col-md-9 col-sm-6"> <select id="select_2" name="select_2" class="selectpicker" data-live-search="true" onchange="singleSelectChangeValue2()">
                    <option value=""></option>
                    <?php foreach($assessment as $row){?>
                    <option value="<?= $row['assessment_type'];?>"><?= $row['assessment_type'];?></option>
                    <?php } ?>
                </select> </div>
                <input type="hidden" name="hidden_framework2" id="hidden_framework2">
                </div>
            </div>
        </div>       
    </div> 
<div class="container-fluid px-0">
    <div class="row align-items-center">
        <div class="col-md-6 col-sm-6">
            <div class="row justify-content-end" style="">
               <div class="col-md-2 col-sm-6"><label for="">Respondent Number : </label></div> 
               <div class="col-md-9 col-sm-6"> <input id="respondent_number2" name="respondent_number2" class="form-control" style="width: 60% !important;" type="text" style="" placeholder="Respondent Number"></div> 
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            </div>
        </div>       
    </div> 
    <div class="container-fluid px-0">
    <div class="row align-items-center">
        <div class="col-md-6 col-sm-6">
            <div class="row justify-content-end" style="">
               <div class="col-md-2 col-sm-6"><label for="">Section : </label></div> 
               <div class="col-md-9 col-sm-6">
               <select name="section_2" id="section_2" class="form-control"  style="width: 180px;float:left;margin-left:10px;margin-top:-4px; ">
                    <option value=""></option>
                    <?php foreach($sections as $row){?>
                    <option value="<?= $row['section_code'];?>"><?= $row['section_code'].' - '.$row['section_name'];?></option>
                    <?php } ?>
                </select>
                <!-- <input id="section_2" name="section_2"  class="form-control" style="width: 60% !important;" type="text" style="" placeholder="Section"> -->
                </div> 
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            </div>
        </div>       
    </div>
    <div class="container-fluid px-0">
    <div class="row align-items-center">
        <div class="col-md-6 col-sm-6">
            <div class="row justify-content-end" style="">
               <div class="col-md-2 col-sm-6"><label for="">Testing Date : </label></div> 
               <div class="col-md-9 col-sm-6"> <input id="testing_date2" name="testing_date2" class="form-control" style="width: 60% !important; margin-top: 10px;" type="text" style="" placeholder="Testing Date"></div> 
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            </div>
        </div>       
    </div>      
    <div class="container-fluid px-0">
        <div class="row align-items-center">
            <div class="col-md-6 col-sm-6">
                <div class="row justify-content-end" style="">
                <div class="col-md-2 col-sm-6" style="margin-top: 15px;">  <label for="">Batch : </label></div> 
                <div class="col-md-9 col-sm-6" style="margin-top: 8px;" >
                <select name="batch_2" id="batch_2" class="form-control"  style="width: 180px;float:left;margin-left:10px;margin-top:-4px; ">
                    <option value=""></option>
                    <?php foreach($batch_records as $row){?>
                    <option value="<?= $row['batch_name'];?>"><?= $row['batch_name'];?></option>
                    <?php } ?>
                </select>
                 <!-- <input id="batch_2" name="batch_2" class="form-control" style="width: 60% !important;" type="text" style="" placeholder="Batch"> -->
                 </div> 
                </div>
            </div>
            <div class="col-md-6 col-sm-6"><a class="btn btn-secondary" id="toggle3"><i class="fas fa-plus"></i> Add more</a></div> 
        </div>   
    </div>
          
</div>    


<div style="display:none;" class="container respondent_id3">
<div class="container-fluid px-0">
    <div class="row align-items-center">
        <div class="col-md-6 col-sm-6">
            <div class="row justify-content" style="">
               <div class="col-md-5 col-sm-6"><label style=" font-weight: bold;" for="">Previous Test</label></div> 
            </div>
        </div>
        <div class="col-md-7 col-sm-6">
            </div>
        </div>       
    </div> 
    <br>
<div class="container-fluid px-0">
    <div class="row align-items-center">
        <div class="col-md-6 col-sm-6">
            <div class="row justify-content-end" style="">
               <div class="col-md-2 col-sm-6"><label for="">Grade level : </label></div> 
               <div class="col-md-9 col-sm-6">  <select name="grade_level3" id="grade_level3" class="form-control" style="width: 180px;float:left;margin-left:10px;margin-top:-4px; ">
                    <option value=""></option>
                    <?php foreach($grade_records as $row){?>
                    <option value="<?= $row['grade_level'];?>"><?= $row['grade_level'];?></option>
                    <?php } ?>
                </select> </div> 
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
                <div class="row">
                    <div class="col-md-2 col-sm-6"><label for="">Assessment Type : </label></div> 
                    <div class="col-md-9 col-sm-6"> <select id="select_3" name="select_3" class="selectpicker" data-live-search="true" onchange="singleSelectChangeValue3()">
                    <option value=""></option>
                    <?php foreach($assessment as $row){?>
                    <option value="<?= $row['assessment_type'];?>"><?= $row['assessment_type'];?></option>
                    <?php } ?>
                </select> </div> 
                <input type="hidden" name="hidden_framework3" id="hidden_framework3" />
                </div>
            </div>
        </div>       
    </div> 
<div class="container-fluid px-0">
    <div class="row align-items-center">
        <div class="col-md-6 col-sm-6">
            <div class="row justify-content-end" style="">
               <div class="col-md-2 col-sm-6"><label for="">Respondent Number : </label></div> 
               <div class="col-md-9 col-sm-6"> <input id="respondent_number3" name="respondent_number3" class="form-control" style="width: 60% !important;" type="text" style="" placeholder="Respondent Number"></div> 
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            </div>
        </div>       
    </div> 
    <div class="container-fluid px-0">
    <div class="row align-items-center">
        <div class="col-md-6 col-sm-6">
            <div class="row justify-content-end" style="">
               <div class="col-md-2 col-sm-6"><label for="">Section : </label></div> 
               <div class="col-md-9 col-sm-6">
               <select name="section_3" id="section_3" class="form-control"  style="width: 180px;float:left;margin-left:10px;margin-top:-4px; ">
                    <option value=""></option>
                    <?php foreach($sections as $row){?>
                    <option value="<?= $row['section_code'];?>"><?= $row['section_code'].' - '.$row['section_name'];?></option>
                    <?php } ?>
                </select>
                <!-- <input id="section_3" class="form-control" style="width: 60% !important;" type="text" style="" placeholder="Section"> -->
                </div> 
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            </div>
        </div>       
    </div>
    <div class="container-fluid px-0">
    <div class="row align-items-center">
        <div class="col-md-6 col-sm-6">
            <div class="row justify-content-end" style="">
               <div class="col-md-2 col-sm-6"><label for="">Testing Date : </label></div> 
               <div class="col-md-9 col-sm-6"> <input id="testing_date3" name="testing_date3" class="form-control" style="width: 60% !important; margin-top: 10px;" type="text" style="" placeholder="Testing Date"></div> 
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            </div>
        </div>       
    </div>      
    <div class="container-fluid px-0">
        <div class="row align-items-center">
            <div class="col-md-6 col-sm-6">
                <div class="row justify-content-end" style="">
                <div class="col-md-2 col-sm-6" style="margin-top: 15px;"><label for="">Batch : </label></div> 
                <div class="col-md-9 col-sm-6" style="margin-top: 8px;">
                <select name="batch_3" id="batch_3" class="form-control"  style="width: 180px;float:left;margin-left:10px;margin-top:-4px; ">
                    <option value=""></option>
                    <?php foreach($batch_records as $row){?>
                    <option value="<?= $row['batch_name'];?>"><?= $row['batch_name'];?></option>
                    <?php } ?>
                </select>
                 <!-- <input id="batch_3" name="batch_3" class="form-control" style="width: 60% !important;" type="text" style="" placeholder="Batch"> -->
                 </div> 
                </div>
            </div>
            <div class="col-md-6 col-sm-6"><a class="btn btn-secondary" id="toggle4"><i class="fas fa-plus"></i> Add more</a></div> 
        </div>   
    </div>
          
</div>    

<div style="display:none;" class="container respondent_id4">
<div class="container-fluid px-0">
    <div class="row align-items-center">
        <div class="col-md-6 col-sm-6">
            <div class="row justify-content" style="">
               <div class="col-md-5 col-sm-6"><label style=" font-weight: bold;" for="">Previous Test</label></div> 
            </div>
        </div>
        <div class="col-md-7 col-sm-6">
            </div>
        </div>       
    </div> 
    <br>
<div class="container-fluid px-0">
    <div class="row align-items-center">
        <div class="col-md-6 col-sm-6">
            <div class="row justify-content-end" style="">
               <div class="col-md-2 col-sm-6"><label for="">Grade level : </label></div> 
               <div class="col-md-9 col-sm-6"> 
               <select name="grade_level4" id="grade_level4" class="form-control" style="width: 180px;float:left;margin-left:10px;margin-top:-4px; ">
                    <option value=""></option>
                    <?php foreach($grade_records as $row){?>
                    <option value="<?= $row['grade_level'];?>"><?= $row['grade_level'];?></option>
                    <?php } ?>
                </select>
               <!-- <input id="grade_level_4" name="grade_level_4" class="form-control" style="width: 60% !important; margin-top: 10px;" type="text" style="" placeholder="Grade Level"> -->
               </div> 
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
                <div class="row">
                    <div class="col-md-2 col-sm-6"><label for="">Assessment Type : </label></div> 
                    <div class="col-md-9 col-sm-6"> <select id="select_4" name="select_4" class="selectpicker" data-live-search="true" onchange="singleSelectChangeValue4()">
                    <option value=""></option>
                    <?php foreach($assessment as $row){?>
                    <option value="<?= $row['assessment_type'];?>"><?= $row['assessment_type'];?></option>
                    <?php } ?>
                </select> </div> 
                <input type="hidden" name="hidden_framework4" id="hidden_framework4" />
                </div>
            </div>
        </div>       
    </div> 
<div class="container-fluid px-0">
    <div class="row align-items-center">
        <div class="col-md-6 col-sm-6">
            <div class="row justify-content-end" style="">
               <div class="col-md-2 col-sm-6"><label for="">Respondent Number : </label></div> 
               <div class="col-md-9 col-sm-6"> <input id="respondent_number4" name="respondent_number4" class="form-control" style="width: 60% !important;" type="text" style="" placeholder="Respondent Number"></div> 
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            </div>
        </div>       
    </div> 
    <div class="container-fluid px-0">
    <div class="row align-items-center">
        <div class="col-md-6 col-sm-6">
            <div class="row justify-content-end" style="">
               <div class="col-md-2 col-sm-6"><label for="">Section : </label></div> 
               <div class="col-md-9 col-sm-6">
               <select name="section_4" id="section_4" class="form-control"  style="width: 180px;float:left;margin-left:10px;margin-top:-4px; ">
                    <option value=""></option>
                    <?php foreach($sections as $row){?>
                    <option value="<?= $row['section_code'];?>"><?= $row['section_code'].' - '.$row['section_name'];?></option>
                    <?php } ?>
                </select>
                <!-- <input class="form-control" id="section_4" name="section_4" style="width: 60% !important;" type="text" style="" placeholder="Section"> -->
                </div> 
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            </div>
        </div>       
    </div>
    <div class="container-fluid px-0">
    <div class="row align-items-center">
        <div class="col-md-6 col-sm-6">
            <div class="row justify-content-end" style="">
               <div class="col-md-2 col-sm-6"><label for="">Testing Date : </label></div> 
               <div class="col-md-9 col-sm-6"> <input id="testing_date4" name="testing_date4" class="form-control" style="width: 60% !important; margin-top: 10px;" type="text" style="" placeholder="Testing Date"></div> 
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            </div>
        </div>       
    </div>      
    <div class="container-fluid px-0">
        <div class="row align-items-center">
            <div class="col-md-6 col-sm-6">
                <div class="row justify-content-end" style="">
                <div class="col-md-2 col-sm-6" style="margin-top: 15px;"><label for="">Batch : </label></div> 
                <div class="col-md-9 col-sm-6" style="margin-top: 8px;"> 
                <select name="batch_4" id="batch_4" class="form-control"  style="width: 180px;float:left;margin-left:10px;margin-top:-4px; ">
                    <option value=""></option>
                    <?php foreach($batch_records as $row){?>
                    <option value="<?= $row['batch_name'];?>"><?= $row['batch_name'];?></option>
                    <?php } ?>
                </select>
                <!-- <input id="batch_4" name="batch_4" class="form-control" style="width: 60% !important;" type="text" style="" placeholder="Batch"> -->
                </div> 
                </div>
            </div>
            <div class="col-md-6 col-sm-6"><a class="btn btn-secondary" id="toggle5"><i class="fas fa-plus"></i> Add more</a></div> 
        </div>   
    </div>
          
</div>  

<div style="display:none;" class="container respondent_id5">
<div class="container-fluid px-0">
    <div class="row align-items-center">
        <div class="col-md-6 col-sm-6">
            <div class="row justify-content" style="">
               <div class="col-md-5 col-sm-6"><label style=" font-weight: bold;" for="">Previous Test</label></div> 
            </div>
        </div>
        <div class="col-md-7 col-sm-6">
            </div>
        </div>       
    </div> 
    <br>
<div class="container-fluid px-0">
    <div class="row align-items-center">
        <div class="col-md-6 col-sm-6">
            <div class="row justify-content-end" style="">
               <div class="col-md-2 col-sm-6"><label for="">Grade level : </label></div> 
               <div class="col-md-9 col-sm-6">
               <select name="grade_level5" id="grade_level5" class="form-control" style="width: 180px;float:left;margin-left:10px;margin-top:-4px; ">
                    <option value=""></option>
                    <?php foreach($grade_records as $row){?>
                    <option value="<?= $row['grade_level'];?>"><?= $row['grade_level'];?></option>
                    <?php } ?>
                </select>
                <!-- <input id="grade_level5" name="grade_level5" class="form-control" style="width: 60% !important;" type="text" style="" placeholder="Grade Level"> -->
                </div> 
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
                <div class="row">
                    <div class="col-md-2 col-sm-6"><label for="">Assessment Type : </label></div> 
                    <div class="col-md-9 col-sm-6"> <select id="select_5" name="select_5" class="selectpicker" data-live-search="true" onchange="singleSelectChangeValue5()">
                    <option value=""></option>
                    <?php foreach($assessment as $row){?>
                    <option value="<?= $row['assessment_type'];?>"><?= $row['assessment_type'];?></option>
                    <?php } ?>
                </select> </div> 
                <input type="hidden" name="hidden_framework5" id="hidden_framework5" />
                </div>
            </div>
        </div>       
    </div> 
<div class="container-fluid px-0">
    <div class="row align-items-center">
        <div class="col-md-6 col-sm-6">
            <div class="row justify-content-end" style="">
               <div class="col-md-2 col-sm-6"><label for="">Respondent Number : </label></div> 
               <div class="col-md-9 col-sm-6"> <input id="respondent_number5"  name="respondent_number5" class="form-control" style="width: 60% !important;" type="text" style="" placeholder="Respondent Number"></div> 
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            </div>
        </div>       
    </div> 
    <div class="container-fluid px-0">
    <div class="row align-items-center">
        <div class="col-md-6 col-sm-6">
            <div class="row justify-content-end" style="">
               <div class="col-md-2 col-sm-6"><label for="">Section : </label></div> 
               <div class="col-md-9 col-sm-6"> 
               <select name="section_5" id="section_5" class="form-control"  style="width: 180px;float:left;margin-left:10px;margin-top:-4px; ">
                    <option value=""></option>
                    <?php foreach($sections as $row){?>
                    <option value="<?= $row['section_code'];?>"><?= $row['section_code'].' - '.$row['section_name'];?></option>
                    <?php } ?>
                </select>
               <!-- <input id="section_5" name="section_5" class="form-control" style="width: 60% !important;" type="text" style="" placeholder="Section"> -->
               </div> 
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            </div>
        </div>       
    </div>
    <div class="container-fluid px-0">
    <div class="row align-items-center">
        <div class="col-md-6 col-sm-6">
            <div class="row justify-content-end" style="">
               <div class="col-md-2 col-sm-6"><label for="">Testing Date : </label></div> 
               <div class="col-md-9 col-sm-6"> <input id="testing_date5" name="testing_date5" class="form-control" style="width: 60% !important; margin-top: 10px;" type="text" style="" placeholder="Testing Date"></div> 
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            </div>
        </div>       
    </div>      
    <div class="container-fluid px-0">
        <div class="row align-items-center">
            <div class="col-md-6 col-sm-6">
                <div class="row justify-content-end" style="">
                <div class="col-md-2 col-sm-6" style="margin-top: 15px;"><label for="">Batch : </label></div> 
                <div class="col-md-9 col-sm-6" style="margin-top: 8px;">
                <select name="batch_5" id="batch_5" class="form-control"  style="width: 180px;float:left;margin-left:10px;margin-top:-4px; ">
                    <option value=""></option>
                    <?php foreach($batch_records as $row){?>
                    <option value="<?= $row['batch_name'];?>"><?= $row['batch_name'];?></option>
                    <?php } ?>
                </select>
                 <!-- <input id="batch_5" name="batch_5" class="form-control" style="width: 60% !important;" type="text" style="" placeholder="Batch"> -->
                 </div> 
                </div>
            </div>
            <div class="col-md-6 col-sm-6"></div> 
        </div>   
    </div>
          
</div>  


        <button type="button" class="top-of-site-link" onclick="topFunction()" id="myBtn" title="Go to top"><svg width="32" height="32" viewBox="0 0 100 100">
        <path fill="white" d="m50 0c-13.262 0-25.98 5.2695-35.355 14.645s-14.645 22.094-14.645 35.355 5.2695 25.98 14.645 35.355 22.094 14.645 35.355 14.645 25.98-5.2695 35.355-14.645 14.645-22.094 14.645-35.355-5.2695-25.98-14.645-35.355-22.094-14.645-35.355-14.645zm20.832 62.5-20.832-22.457-20.625 22.457c-1.207 0.74219-2.7656 0.57812-3.7891-0.39844-1.0273-0.98047-1.2695-2.5273-0.58594-3.7695l22.918-25c0.60156-0.61328 1.4297-0.96094 2.2891-0.96094 0.86328 0 1.6914 0.34766 2.293 0.96094l22.918 25c0.88672 1.2891 0.6875 3.0352-0.47266 4.0898-1.1562 1.0508-2.9141 1.0859-4.1133 0.078125z"></path>
        </svg>
        </button>

        </form>
<?php } else {  redirect('login'); ?>  
<?php }?>



      
        
<!-- TOGGLE HIDE AND SHOW RESPONDENT -->
<script>
let btn = document.querySelector('#toggle');
let div = document.querySelector('.respondent_id');

btn.addEventListener('click', ()=>{
    if(div.style.display === 'none'){
        div.style.display = 'block';
    }else{
        div.style.display = 'none';
    }
});
</script>

<!-- TOGGLE HIDE AND SHOW RESPONDENT -->
<script>
let btn2 = document.querySelector('#toggle2');
let div2 = document.querySelector('.respondent_id2');

btn2.addEventListener('click', ()=>{
    if(div2.style.display === 'none'){
        div2.style.display = 'block';
    }else{
        div2.style.display = 'none';
    }
});
</script>

<!-- TOGGLE HIDE AND SHOW RESPONDENT -->
<script>
let btn3 = document.querySelector('#toggle3');
let div3 = document.querySelector('.respondent_id3');

btn3.addEventListener('click', ()=>{
    if(div3.style.display === 'none'){
        div3.style.display = 'block';
    }else{
        div3.style.display = 'none';
    }
});
</script>

<!-- TOGGLE HIDE AND SHOW RESPONDENT -->
<script>
let btn4 = document.querySelector('#toggle4');
let div4 = document.querySelector('.respondent_id4');

btn4.addEventListener('click', ()=>{
    if(div4.style.display === 'none'){
        div4.style.display = 'block';
    }else{
        div4.style.display = 'none';
    }
});

let btn5 = document.querySelector('#toggle5');
let div5 = document.querySelector('.respondent_id5');

btn5.addEventListener('click', ()=>{
    if(div5.style.display === 'none'){
        div5.style.display = 'block';
    }else{
        div5.style.display = 'none';
    }
});
</script>


<!-- SELECTPICKER -->
<!-- 
// $(document).ready(function(){
//  $('.selectpicker').selectpicker();

//  $('#select_1').change(function(){
//   $('#hidden_framework').val($('#select_1').val());
//  });

//  $('#multiple_select_form').on('add', function(event){
//   event.preventDefault();
//   $('#hidden_framework').val('');
//      $('.selectpicker').selectpicker('val', '');
//  });
// }); -->

<!-- <script>
$(document).ready(function(){
 $('.selectpicker').selectpicker();

 $('#framework').change(function(){
  $('#hidden_framework').val($('#framework').val());
 });

 $('#multiple_select_form').on('add', function(event){
  event.preventDefault();
  if($('#framework').val() != '')
  {
   var form_data = $(this).serialize();
   $.ajax({
    url:"insert_select.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     //console.log(data);
     $('#hidden_framework').val('');
     $('.selectpicker').selectpicker('val', '');
     alert(data);
    }
   })
  }
  else
  {
   alert("Please select framework");
   return false;
  }
 });
});
</script> -->
<script>
function singleSelectChangeValue() {
        //Getting Value
        //var selValue = document.getElementById("singleSelectDD").value;
        var selObj = document.getElementById("select_1");
        var selValue = selObj.options[selObj.selectedIndex].value;
        //Setting Value
        document.getElementById("hidden_framework").value = selValue;
    }

    function singleSelectChangeValue2() {
        //Getting Value
        //var selValue = document.getElementById("singleSelectDD").value;
        var selObj = document.getElementById("select_2");
        var selValue = selObj.options[selObj.selectedIndex].value;
        //Setting Value
        document.getElementById("hidden_framework2").value = selValue;
    }
    function singleSelectChangeValue3() {
        //Getting Value
        //var selValue = document.getElementById("singleSelectDD").value;
        var selObj = document.getElementById("select_3");
        var selValue = selObj.options[selObj.selectedIndex].value;
        //Setting Value
        document.getElementById("hidden_framework3").value = selValue;
    }
    function singleSelectChangeValue4() {
        //Getting Value
        //var selValue = document.getElementById("singleSelectDD").value;
        var selObj = document.getElementById("select_4");
        var selValue = selObj.options[selObj.selectedIndex].value;
        //Setting Value
        document.getElementById("hidden_framework4").value = selValue;
    }
    function singleSelectChangeValue5() {
        //Getting Value
        //var selValue = document.getElementById("singleSelectDD").value;
        var selObj = document.getElementById("select_5");
        var selValue = selObj.options[selObj.selectedIndex].value;
        //Setting Value
        document.getElementById("hidden_framework5").value = selValue;
    }
</script>

<!-- BIRTHDATE -->
<!-- <script>
$(function() {
  $('input[name="birthday"]').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    minYear: 1901,
    maxYear: parseInt(moment().format('YYYY'),10)
  }
  , function(start, end, label) {
    var years = moment().diff(start, 'years');
    // alert("You are " + years + " years old!");
    
  });
});
</script> -->

<script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>
<!-- <div class="row">
    <div class="col-lg-12"> -->

        <!-- <form name="bulk_action_form3" action="<?=base_url().'add_student'?>" method="post"/>
           <div class="form-group">
           <br>   
                <label for="title" style=" float:left;" >Subject:   </label>
                <input type="text" name="subject" class="form-control" placeholder="Enter Subject" style="width: 200px;  margin-left:10px; margin-top:-4px; float:left;"   value="">
                <button type="submit" class="btn btn-success" style="width: 15%; margin-left:16px; margin-top:-4px; float:left;background-color: #FF8C00; border-color: #FF8C00;">Add</button>
             
            <br>      
      </div>  
</form>
</div>
<div class="container">
<div class="row">
    <div class="col-lg-12">  
           <form name="bulk_action_form2" action="<?= base_url().'delete_subject'?> " method="post" onSubmit="return delete_subject_confirm q ();"/>
           <button type="submit" name="bulk_delete_submit" value="DELETE" class="btn btn-danger" style="float:left; margin-left: 445px;  width:15%; margin-top:-41px;">Delete</button> 
             <div class="form-group">
             <br>
             <br>
                <table class="table table-bordered table-striped" style="width: 100%;" id="batch_table">
                    <thead>
                        <tr>
                        <th scope="col"></th>
                        <th scope="col">Subject</th>
                        </tr>
                    </thead>
                    <tbody>     
                    <?php foreach($records as $row){?>
                        <tr>
                        <td><input type="checkbox" name="checked_id[]" class="checkbox" value="<?= $row['subject_id'];?>"></td>
                        <td><?= $row['subject_name'];?></td>
                        </tr>
                        <?php } ?>      
                           
                            </div>  
                         </form>
                     </div>
                 </div>  
             </tbody>
         </table>
         </div>
       </div>
    </div>
</div>        -->
<script>  
            $(document).ready(function(){  
                $('#batch_table').DataTable();  
            });  
            </script>  

            
<script>

//GRADELEVEL DEPENDENT DROPDOWN
$(document).ready(function(){
 $('#school_name').change(function(){

  var school_code = $('#school_name').val();
  if(school_code != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>Pages/fetch_glevel",
    method:"POST",
    data:{school_name:school_code},
    success:function(data)
    {
     $('#grade_level').html(data); 
    }
   });
  }
  else
  {
   $('#grade_level').html('<option value="">Select School</option>');
  }

 });
});

//SECTION DEPENDENT DROPDOWN
$(document).ready(function(){
 $('#school_name').change(function(){

  var school_code = $('#school_name').val();
  if(school_code != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>Pages/fetch_section",
    method:"POST",
    data:{school_name:school_code},
    success:function(data)
    {
     $('#section').html(data); 
    }
   });
  }
  else
  {
   $('#section').html('<option value="">Select School</option>');
  }

 });
});

$(document).ready(function(){
 $('#school_name').change(function(){

  var school_code = $('#school_name').val();
  if(school_code != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>Pages/fetch_section",
    method:"POST",
    data:{school_name:school_code},
    success:function(data)
    {
     $('#section_1').html(data); 
    }
   });
  }
  else
  {
   $('#section_1').html('<option value="">Select School</option>');
  }

 });
});

$(document).ready(function(){
 $('#school_name').change(function(){

  var school_code = $('#school_name').val();
  if(school_code != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>Pages/fetch_section",
    method:"POST",
    data:{school_name:school_code},
    success:function(data)
    {
     $('#section_2').html(data); 
    }
   });
  }
  else
  {
   $('#section_2').html('<option value="">Select School</option>');
  }

 });
});
 
$(document).ready(function(){
 $('#school_name').change(function(){

  var school_code = $('#school_name').val();
  if(school_code != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>Pages/fetch_section",
    method:"POST",
    data:{school_name:school_code},
    success:function(data)
    {
     $('#section_3').html(data); 
    }
   });
  }
  else
  {
   $('#section_3').html('<option value="">Select School</option>');
  }

 });
});

$(document).ready(function(){
 $('#school_name').change(function(){

  var school_code = $('#school_name').val();
  if(school_code != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>Pages/fetch_section",
    method:"POST",
    data:{school_name:school_code},
    success:function(data)
    {
     $('#section_4').html(data); 
    }
   });
  }
  else
  {
   $('#section_4').html('<option value="">Select School</option>');
  }

 });
});

$(document).ready(function(){
 $('#school_name').change(function(){

  var school_code = $('#school_name').val();
  if(school_code != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>Pages/fetch_section",
    method:"POST",
    data:{school_name:school_code},
    success:function(data)
    {
     $('#section_5').html(data); 
    }
   });
  }
  else
  {
   $('#section_5').html('<option value="">Select School</option>');
  }

 });
});
</script>

