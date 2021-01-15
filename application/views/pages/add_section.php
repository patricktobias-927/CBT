<div class="container fluid">
<h1> <?= $title;?> </h1>
<hr>

<?= validation_errors();?>

<?php if($this->session->flashdata('post_added_section')) : ?> 
<?= '<p class="alert alert-success">'.$this->session->flashdata('post_added_section').'</p>' ?>
<?php endif;?>

<div class="row">
    <div class="col-lg-12">
        <?= form_open('add_section');?>
          <div class="form-group">

         
          <label for="search_text" style=" float:left; margin-top:5px;" >Search School: </label>    
        <input type="text" name="search_text" id="search_text" placeholder="Search" class="form-control" style="width: 180px; margin-left:110px;" />    
        <br>
        <br>

            <label for="title" style=" float:left;" >Select School:   </label>
                <select name="schools" id="schools"class="form-control"  style="width: 180px;float:left;margin-left:10px;margin-top:-4px;" onchange="singleSelectChangeValue()">
                    <option value=""></option>
                    <?php foreach($records as $row){?>
                    <option value="<?= $row['school_id'];?>"><?= $row['school_name'].' - '.$row['school_code'];?></option>
                    <?php } ?>
                </select>    

            <br>
            <br>
  


            <label for="title"  style="float:left; margin-left: 0px;">Grade:</label>      
                <select name="gradelevel" id="gradelevel" class="form-control"  style="width: 180px;float:left;margin-left:10px;margin-top:-4px; ">
                    <option value=""></option>
                    <?php foreach($grade_records as $row){?>
                    <option value="<?= $row['grade_level'];?>"><?= $row['grade_level'];?></option>
                    <?php } ?>
                </select>             
          
            <label for="title"  style="float:left; margin-left: 130px;">Section Code:</label>
                    <select name="sectioncode" id="sectioncode" class="form-control"  style="width: 180px;float:left;margin-left:10px;margin-top:-4px; ">
                        <option value=""></option>
                        <?php foreach($section_codes as $row){?>
                        <option value="<?= $row['section_code'];?>"><?= $row['section_code'];?></option>
                        <?php } ?>
                    </select>  

            <br> 
            <br>  

             <label for="title" style="float:left; margin-left:0px;">School Year:</label>
                 <input type="phone" name="schoolyear" placeholder="ex. 2020-2021" class="form-control" style="width: 220px; margin-left:10px; margin-top:-4px; float:left;" value=""  />          
          
            <label for="title" style="float:left; margin-left:50px; ">Section Name:</label>
                 <input type="text" name="sectionname" placeholder="" class="form-control" style="width: 220px; margin-left:10px; margin-top:-4px; float:left;" value="" />
                
            <br> 
            <br> 
              
            <label for="batch"  style="float:left;">Batch:</label>   
                <select name="batch" id="batch" class="form-control"  style="width: 180px;float:left;margin-left:10px;margin-top:-4px; ">
                    <option value=""></option>
                    <?php foreach($batch_records as $row){?>
                    <option value="<?= $row['batch_name'];?>"><?= $row['batch_name'];?></option>
                    <?php } ?>
                </select>
                    
            <br>
            <br>
            
            <label for="title" style="float:left; margin-left:0px;">Population:</label>     
                 <input type="text" name="population" placeholder="" class="form-control" style="width: 220px; margin-left:10px; margin-top:-4px; float:left;" value="" />
                 <button type="submit" class="btn btn-success" style="margin-left:210px; margin-top:0px; float:left; background-color: #FF8C00; border-color: #FF8C00;"><i class="fas fa-plus"></i> Add Another Section</button>          
            <br>
            <br>
            <br>
            <br>
             <div id="result"></div>

                        <!-- DROPDOWN FILTER ONGOING -->

            <!-- <table class="table table-bordered" id="table_section">
                <thead>
                    <tr>
                    <th scope="col">School ID</th>
                    <th scope="col">School Code</th>
                    <th scope="col">Grade</th>
                    <th scope="col">Section</th>
                    <th scope="col">Section Code</th>
                    <th scope="col">School Year</th>
                    <th scope="col">Population</th>
                    </tr>
                </thead>
                <tbody>     
                <?php foreach($sections as $row){?>
                    <tr>
                    <td scope="row" style="font-weight:bold"><?= $row['school_code'];?></th>
                    <td><?= $row['grade'];?></td>
                    <td><?= $row['section_name'];?></td>
                    <td><?= $row['section_code'];?></td>
                    <td><?= $row['school_year'];?></td>
                    <td><?= $row['population'];?></td>
                    </tr>
                    <?php } ?>    
            </tbody>
        </table> -->
          </div>                       
        </div>
    </div>                    
 </div>                          

 <script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"<?php echo base_url(); ?>ajaxsearch/fetch",
   method:"POST",
   data:{query:query},
   success:function(data){
    $('#result').html(data);
   }
  })
 }

 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});

function singleSelectChangeValue() {
        //Getting Value
        //var selValue = document.getElementById("singleSelectDD").value;
        var selObj = document.getElementById("schools");
        var selValue = selObj.options[selObj.selectedIndex].value;
        //Setting Value
        document.getElementById("search_text").value = selValue;
    }

    // function singleSelectChangeText() {
    //     //Getting Value
        

    //     var selObj = document.getElementById("schools");
    //     var selValue = selObj.options[selObj.selectedIndex].text;
        
    //     //Setting Value
    //     document.getElementById("search_text").value = selValue;
    // }

    $(document).ready(function(){
    mahisaswa();
    $("#schools").change(function(){
        mahisaswa();
    });
});

function mahisaswa() {

    var schools = $("#schools").val();
    $.ajax({
        url : "<?= base_url('filter/load_mahisaswa') ?>",
        data: "schools=" + schools,
        success:function(data){
            $("#table_section tbody").html(data);
        }
    });
}

</script>



 