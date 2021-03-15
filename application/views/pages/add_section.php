        <?php if($this->session->logged_in){?>
        <div class="container-fluid">
        <h1> <?= $title;?> </h1>
        <hr>

        <?= validation_errors();?>

        <?php if($this->session->flashdata('post_added_section')) : ?> 
        <?= '<p class="alert alert-success">'.$this->session->flashdata('post_added_section').'</p>' ?>
        <?php endif;?>



        <div class="row">
            <div class="col-lg-4">
                <form style=""name="bulk_action_form3" action="<?=base_url().'add_section'?>" method="post">
                    <label for="title" style="" >Select School: &nbsp; &nbsp;</label>
                    <select name="schools" id="schools" class="form-control schools"  style="width: 225px;" onchange="singleSelectChangeValue()">
                    <option value=""></option>
                    <?php foreach($records as $row){?>
                    <option value="<?= $row['school_id'];?>"><?= $row['school_name'].' - '.$row['school_code'];?> </option>
                    <?php } ?>
                    </select>    
            </div> 


   
            <div class="col-6 mt-4">
                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> 
                <button type="submit" class="btn btn-success" style="background-color: #FF8C00; border-color: #FF8C00; float:right;"><i class="fas fa-plus"></i> Add Another Section</button>          
                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> 
                <input type="hidden" name="search_text" id="search_text" placeholder="Search" class="form-control" style="width: 180px; " />    
            </div>
     

        <div class="col-2 mt-4 float-left">       
            <div class="dropdown">
                <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-print"></i> Export Data
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="<?php echo base_url(); ?>Export_add_section/action">Print All</a>
                    <button type="button" class="dropdown-item" data-toggle="modal" data-target="#exampleModal">Print Per School</button>
                    <!-- <a class="dropdown-item" href="<?php echo base_url(); ?>Export_add_section_perschool/action">Print Per School</a> -->
                </div>
            </div>
        </div>
    </div>       
        <br>
    
        <div class="row" style="margin-top: 5px;">
            <div class="col-md-5">
                <label for="title"  style="float:left;">Grade:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>      
                    <select name="gradelevel" id="gradelevel" class="form-control float-left"  style="width: 225px;">
                        <option value=""></option>
                        <?php foreach($grade_records as $row){?>
                        <option value="<?= $row['grade_level'];?>"><?= $row['grade_level'];?></option>
                        <?php } ?>
                </select>             
            </div>
            <div class="col-md-6">   
                <label for=""   style="float:left;">Section Code:&nbsp; &nbsp;</label>
                <select name="sectioncode" id="sectioncode" class="form-control float-left"  style="width: 225px;">
                    <option value=""></option>
                    <?php foreach($section_codes as $row){?>
                    <option value="<?= $row['section_code'];?>"><?= $row['section_code'];?></option>
                    <?php } ?>
                </select>  
            </div>
        </div> 

        <div class="row" style="margin-top: 10px;">
            <div class="col-5" >  
                <label for="title" style="float:left;">School Year: &nbsp;</label>
                    <input type="phone" name="schoolyear" id="schoolyear" placeholder="ex. 2020-2021" class="form-control" style="width: 225px;" value=""  />          
            </div>     
            <div class="col-6">
                <label for="" style="float:left; ">Section Name: &nbsp;</label>
                    <input type="text" name="sectionname" id="sectionname" placeholder="Section name" class="form-control" style="width: 225px;" value="" />
            </div>
        </div>    

        <div class="row" style="margin-top: 10px;">
            <div class="col-6">
                <label for="batch"  style="float:left;">Batch:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;    </label>   
                <select name="batch" id="batch" class="form-control"  style="width: 225px;float:left;margin-left:10px;margin-top:-4px; ">
                    <option value=""></option>
                    <?php foreach($batch_records as $row){?>
                    <option value="<?= $row['batch_name'];?>"><?= $row['batch_name'];?></option>
                    <?php } ?>
                </select>
            </div>
        </div>       
                
        <div class="row" style="margin-top: 10px;">
            <div class="col-6">    
                <label for="title" style="float:left;">Population: &nbsp; &nbsp;</label>     
                <input type="text" name="population" placeholder="Population" class="form-control" style="width: 225px;" value="" />
            </div>
            <div class="col-1">    </div>
            <div class="col-5 float-right">  
         <!-- <span>&nbsp;</span> <button type="submit" class="btn btn-success" style="background-color: #FF8C00; border-color: #FF8C00;"><i class="fas fa-plus"></i> Add Another Section</button>           -->
            </div>
        </div>
    </div>      
    <br>
    <br>
    </form>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">  
                <button style="float:right; display: none;"></button>
            <div id="result"></div>
                        <!-- DROPDOWN FILTER ONGOING -->
                <table class="table table-bordered table-striped" name="table_section" id="table_section">
                    <thead>
                        <tr>
                        <!-- <th scope="col">School ID</th> -->
                        <!-- <th scope="col">#</th> -->
                        <th scope="col">School Code</th>
                        <th scope="col">Grade</th>
                        <th scope="col">Section</th>
                        <th scope="col">Section Code</th>
                        <th scope="col">School Year</th>
                        <th scope="col">Population</th>
                        </tr>
                    </thead>
                    <tbody>     
                    <!-- <?php foreach($sections as $row){?>
                        <tr>
                        <td scope="row" style="font-weight:bold"><?= $row['school_code'];?></th>
                        <td><?= $row['grade'];?></td>
                        <td><?= $row['section_name'];?></td>
                        <td><?= $row['section_code'];?></td>
                        <td><?= $row['school_year'];?></td>
                        <td><?= $row['population'];?></td>
                        </tr>
                        <?php } ?>     -->  
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<!-- MODAL -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Select School</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="<?php echo base_url(); ?>Export_add_section_perschool/action">
            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> 
                <select id="select_sectionmodal" name="select_sectionmodal" class="selectpicker" data-live-search="true" onchange="singleSelectChangeofValue()">
                <option value=""></option>
                <?php foreach($records as $row){?>
                <option value="<?= $row['school_id'];?>"><?= $row['school_name'];?></option>
                <?php } ?>
                </select>
                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> 
                <button type="submit" name="export" class="btn btn-success" value=""><i class="fas fa-file-download"></i> Export</button>
            </form>         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Export</button> -->
      </div>
    </div>
  </div>
     
<?php } else {  redirect('login'); ?>  
<?php }?>

     <script>

// $('table_section').ddTableFilter();



$(document).ready(function(){
        Filter();
    $("#schools").change(function(){
        let a = $(this).val();
        console.log(a);
        Filter();
    });
});

function Filter() {

    var schools = $("#schools").val();
    $.ajax({
        url : "<?= base_url('filter/load_filter') ?>",
        data: "schools=" + schools,
        success:function(data){
            console.log(data);
            // $("#table_section tbody").html('<tr><td colspan="4" align="center">PATRICK</td></tr>');
            $("#table_section tbody").html(data);
        }
    });
}



</script>
 <script>
     
$(document).ready(function(){  
    $('#table_section').DataTable();  
        });  
      
//  SEARCH AJAX       

// $(document).ready(function(){

//  load_data();

//  function load_data(query)
//  {
//   $.ajax({
//    url:"<?php echo base_url(); ?>ajaxsearch/fetch",
//    method:"POST",
//    data:{query:query},
//    success:function(data){
//     $('#result').html(data);
//    }
//   })
//  }

//  $('#search_text').keyup(function(){
//   var search = $(this).val();
//   if(search != '')
//   {
//    load_data(search);
//   }
//   else
//   {
//    load_data();
//   }
//  });
// });

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

//  REFRESH AJAX
// $('#table_section').bootstrapTable('refresh')

 

// </script>




 