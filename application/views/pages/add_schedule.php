<?php if($this->session->logged_in){?>
 <h1> <?= $title;?> </h1>
    <hr>
      <?= validation_errors();?>
      <?php if($this->session->flashdata('post_added_schedule')) : ?> 
      <?= '<p class="alert alert-success">'.$this->session->flashdata('post_added_schedule').'</p>' ?>
      <?php endif;?>

      <div class="container fluid ">
         <div class="row">
           <div class="col-lg-12">

                  <?= form_open('addschedule');?>
                  <div class="form-group">
              <label for="title" style=" float:left;" >School:   </label>
           
            <select name="schools" id="schools"class="form-control"  style="width: 180px;float:left;margin-left:10px;margin-top:-4px; ">
            <option value=""></option>
            <?php foreach($records as $row){?>
            <option value="<?= $row['school_id'];?>"><?= $row['school_name'].' - '.$row['school_code'];?></option>
            <?php } ?>
            </select>

            <!-- <select name="schools" id="schools"class="form-control"  style="width: 180px;float:left;margin-left:10px;margin-top:-4px; ">
            <option value=""></option>
            <?php foreach($records as $row){?>
            <option value="<?= $row['school_code'];?>"><?= $row['school_name'].' - '.$row['school_code'];?></option>
            <?php } ?>
            </select> -->

            <!-- <label for="title" style=" margin-left:50px; float:left;">School Code:</label>
            <input  type="text" name="schoolcode" class="form-control" placeholder="" style="width: 180px;  margin-left:10px; margin-top:-4px; float:left;" value="" readonly> --> 
        
            <label for="title"  style="float:left; margin-left:30px; ">School Year:</label>
            <select id="school_year" name="school_year" class="form-control"  style="width: 180px;  margin-left:10px; margin-top:-4px; float:left;">
                <option value=""></option>
                <option value="2021-2022">2021 - 2022</option>
                <option value="2022-2023">2022 - 2023</option>
                <option value="2023-2024">2023 - 2024</option>
                <option value="2024-2025">2024 - 2025</option>
                <option value="2025-2026">2025 - 2026</option>

                </select>

            <!-- <input type="text" name="school_year" class="form-control" placeholder="ex. 2020-2021" style="width: 180px;  margin-left:10px; margin-top:-4px; float:left;"   value=""> -->
            <label for="title" style="float:left; margin-left:50px;">Testing Date:</label>
            <input type="text" name="daterange" class="form-control" style="width: 225px; margin-left:10px; margin-top:-4px; float:left;" value="" />
            <br>
            <br>   
            <br>
            <label for="title"  style="float:left;">No. of test Takers:</label>
            <input type="text" name="no_of_takers" class="form-control" placeholder="No. of test Takers" style="width: 195px;  margin-left:10px; margin-top:-4px; float:left;"   value="">
            <button type="submit" class="btn btn-success" style="margin-left:37px; margin-top:-4px; float:left; background-color: #FF8C00; border-color: #FF8C00;"><i class="fas fa-plus"></i> Add Schedule</button>
            <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" style="margin-left:185px; margin-top:-4px; float:left;">Add Schedule</button> -->
      
          </div>
        </div>
      </div>
   </div>     
</div>
<div class="container fluid ">
         <div class="row">
           <div class="col-lg-12">
        <br>
        <br>
        <table class="table table-bordered table-striped" id="schedule_table">
            <thead>
                <tr>
                <th scope="col">School Code</th>
                <th scope="col">School Name</th>
                <th scope="col">School Year</th>
                <th scope="col">Population</th>
                <th scope="col">Testing Date</th>
                </tr>
            </thead>
            <tbody>     
              <?php foreach($record as $row){?>
                <tr>
                <td scope="row" style="font-weight:bold"><?= $row['school_code'];?></th>
                <td><?= $row['school_name'];?></td>
                <td><?= $row['school_year'];?></td>
                <td><?= $row['no_of_takers'];?></td>
                <td><?= $row['testing_date'];?></td>
                </tr>
                <?php } ?>  
               </tbody>
            </table> 
            </div>
   </div>     
</div>                                   
<?php } else {  redirect('login'); ?>  
<?php }?>
 
<script>  
            $(document).ready(function(){  
                $('#schedule_table').DataTable();  
            });  
            </script>  