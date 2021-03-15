        <?php if($this->session->logged_in){?>
        <div class="container-fluid">
        <h1> <?= $title;?> </h1>
        <hr>
        <!-- <?= validation_errors();?> -->
        <?php if($this->session->flashdata('grade_level_added')) : ?> 
        <?= '<p class="alert alert-success">'.$this->session->flashdata('grade_level_added').'</p>' ?>
        <?php endif;?>
        <?php if($this->session->flashdata('grade_level_deleted')) : ?> 
        <?= '<p class="alert alert-success">'.$this->session->flashdata('grade_level_deleted').'</p>' ?>
        <?php endif;?>

        <div class="row">
            <div class="col-lg-12">
                <form name="bulk_action_form" action="<?=base_url().'add_grade_level'?>" method="post"/>
                    <div class="form-group">
                    <br>   
                        <label for="title" style=" float:left;" >Grade Level:   </label>
                        <input type="text" name="grade_level" class="form-control" placeholder="Grade Level" style="width: 200px;  margin-left:10px; margin-top:-4px; float:left;"   value="">
                        <button type="submit" class="btn btn-success" style="width: 15%; margin-left:16px; margin-top:-4px; float:left;background-color: #FF8C00; border-color: #FF8C00;">Add</button>
                        <br>     
                    <br>      
                </div> 
            </div>        
        </form> 

        <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">  
                <form name="bulk_action_form2" action="<?=base_url().'delete_grade_level'?>" method="post" onSubmit="return delete_grade_level_confirm();"/>
                <button type="submit" name="bulk_delete_submit" value="DELETE" class="btn btn-danger" style="float:left; margin-left: 549px;width:15%; margin-top:-78px;">Delete</button>
                    <div class="form-group">
                    <button style="float:right; display: none;"></button></div>
                                <table class="table table-bordered table-striped" style="width: 100%;" id="grade_table">
                                <thead>
                                    <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Grade Level</th>
                                    </tr>
                                </thead>
                                <tbody>    

                                        <?php foreach($records as $row){?>
                                            <tr>
                                            <td><input type="checkbox" name="checked_id[]" class="checkbox" value="<?= $row['grade_level_id'];?>"></td>
                                            <td><?= $row['grade_level'];?></td>
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
<?php } else {  redirect('login'); ?>  
<?php }?>  
<script>  
            $(document).ready(function(){  
                $('#grade_table').DataTable();  
            });  
            </script>  