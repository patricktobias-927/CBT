<div class="container fluid ">
<h1> <?= $title;?> </h1>
<hr>
<?= validation_errors();?>
<?php if($this->session->flashdata('subject_added')) : ?> 
<?= '<p class="alert alert-success">'.$this->session->flashdata('subject_added').'</p>' ?>
<?php endif;?>
<?php if($this->session->flashdata('subject_deleted')) : ?> 
<?= '<p class="alert alert-success">'.$this->session->flashdata('subject_deleted').'</p>' ?>
<?php endif;?>

<div class="row">
    <div class="col-lg-12">
        <!-- <?= form_open('add_subject');?> -->
        <form name="bulk_action_form3" action="<?=base_url().'add_subject'?>" method="post"/>
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
           <form name="bulk_action_form2" action="<?= base_url().'delete_subject'?> " method="post" onSubmit="return delete_subject_confirm();"/>
           <button type="submit" name="bulk_delete_submit" value="DELETE" class="btn btn-danger" style="margin-left: 5px;  width:15%; margin-top:-4px;">Delete</button> 
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
</div>       
<script>  
            $(document).ready(function(){  
                $('#batch_table').DataTable();  
            });  
            </script>  