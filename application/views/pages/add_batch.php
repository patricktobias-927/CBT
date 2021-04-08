        <?php if($this->session->logged_in){?>
        <div class="container-fluid">
        <h1> <?= $title;?> </h1>
        <hr>
        <!-- <?= validation_errors();?> -->
        <?php if($this->session->flashdata('batch_added')) : ?> 
        <?= '<p class="alert alert-success">'.$this->session->flashdata('batch_added').'</p>' ?>
        <?php endif;?>
        <?php if($this->session->flashdata('batch_deleted')) : ?> 
        <?= '<p class="alert alert-success">'.$this->session->flashdata('batch_deleted').'</p>' ?>
        <?php endif;?>

        <div class="row">
            <div class="col-lg-12">
                <!-- <?= form_open('add_batch');?> -->
                <form style=""name="bulk_action_form3" action="<?=base_url().'add_batch'?>" method="post"/>
                <div class="form-group">
                <br>   
                        <label for="title" style=" float:left;" >Batch Name:   </label>
                        <input type="text" name="batch" class="form-control" placeholder="Batch Name" style="width: 200px;  margin-left:10px; margin-top:-4px; float:left;"   value="">
                        <button type="submit" class="btn btn-success" style="width: 15%; margin-left:16px; margin-top:-4px; float:left;background-color: #FF8C00; border-color: #FF8C00;">Add</button>

                    <br>      
            </div>  
        </form>
        </div>
        <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">  
                <form name="bulk_action_form2" action="<?= base_url().'delete_batch'?> " method="post" onSubmit="return  ();"/>
                <button type="submit" name="bulk_delete_submit" value="DELETE" class="btn btn-danger" style="margin-left: 550px;  width:15%; margin-top:-72px;">Delete</button> 
                    <div class="form-group">
                    <br>
                    <button style="float:right; display: none;"></button></div>
                        <table class="table table-bordered table-striped" style="width: 100%;" id="batch_table">
                            <thead>
                                <tr>
                                <th></th>
                                <th class="col">Batch</th>
                                </tr>
                            </thead>
                            <tbody>     
                            <?php foreach($records as $row){?>
                                <tr>
                                <td><input type="checkbox" name="checked_id[]" class="checkbox" value="<?= $row['batch_id'];?>"></td>
                                <td><?= $row['batch_name'];?></td>
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
                        $('#batch_table').DataTable();  
                    });  
                    </script>  