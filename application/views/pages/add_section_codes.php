<h1> <?= $title;?> </h1>
<hr>
<!-- <?= validation_errors();?> -->
<?php if($this->session->flashdata('section_code_added')) : ?> 
<?= '<p class="alert alert-success">'.$this->session->flashdata('section_code_added').'</p>' ?>
<?php endif;?>
<?php if($this->session->flashdata('section_code_deleted')) : ?> 
<?= '<p class="alert alert-success">'.$this->session->flashdata('section_code_deleted').'</p>' ?>
<?php endif;?>


<style>

</style>

<div class="container">
    <div class="row">
        <div class="col-12">

        <!-- <?= form_open('delete_section_codes');?> -->

        <form class="form-inline" name="bulk_action_form1" action="<?=base_url().'add_section_codes'?>" method="post"/>
        <div class="form-group">
                 <br>   
                     <label for="" style=" float:left;" >Section Code:   </label>
                       <input type="text" name="section_code" id="section_code" class="form-control" placeholder="Section Code" style="width: 180px; margin-top: 5px;"   value="">
                     
                       <button type="submit"  id="add_button" class="btn btn-success" style="width: 170px;  margin-top:-4px; margin-left:40px; background-color: #FF8C00; border-color: #FF8C00;  ">Add</button>
                      <button style="float:right; display: none;"></button></div>
                  <br>   
                </div>   
          </form>   
        </div> 
    </div> 
</div> 
<br>  
<br>  

<div class="container">  
    <div class="row">
         <div class="col-12">  
   
           <form name="bulk_action_form2" class="" action="<?=base_url().'delete_section_codes'?>" method="post" onSubmit="return delete_confirm();"/>
           <button type="submit" id="delete_button" name="bulk_delete_submit" value="DELETE" class="btn btn-danger" style="margin-left: 515px;width:15%; margin-top:-75px;">Delete</button>
             <div class="form-group">
             <br>  
         
  
                            <table class="table table-bordered table-striped"  style="width: 100%; " id="section_codes_table">
                            <thead>
                                <tr>
                                <th scope="col"></th>
                                <th scope="col">School Code</th>
                                </tr>
                            </thead>
                            <tbody>     
                    
                            <?php foreach($records as $row){?>
                                <tr>
                                <td><input type="checkbox" name="checked_id[]" class="checkbox" value="<?= $row['section_code_id'];?>"></td>
                                <td><?= $row['section_code'];?></td>
                                </tr>
                                <?php } ?> 
                              
                        </tbody>
                    </table>
                 </div>  
            </form>           
        </div> 
    </div> 
</div>   
            <script>  
                $(document).ready(function(){  
                    $('#section_codes_table').DataTable();  
                });  
            </script>  

 
     
   
      