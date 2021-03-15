<?php if($this->session->logged_in){?>
<h1> <?= $title;?> </h1>
<hr>
<?= validation_errors();?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <?= form_open('add');?>
                        <div class="form-group">
                            <label for=""  style="float:left; margin-left: -16px;">School Name: </label>
                            <input type="text" name="schoolname" class="form-control" placeholder="School Name" style="width: 180px; margin-left:10px; margin-top:-4px; float:left;"   value="<?= set_value('schoolcode'); ?>">
                            <label for="title" style="float:left; margin-left:25px;">School Code: </label>
                            <input type="text" name="schoolcode" class="form-control" placeholder="School Code" style="width: 180px; margin-top:-4px; margin-left:10px; float:left;"   value="<?= set_value('schoolname'); ?>">
                            <button type="submit" class="btn btn-success" style="margin-top:-4px; margin-left:20px; float:left;background-color: #FF8C00; border-color: #FF8C00;"><i class="fas fa-plus"></i> Add School</button>
                        </div>
                    </div>
                </div>
            </div> 
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <br>
                    <br>
                    <table class="table table-bordered table-striped" id="school_table" style="width: 100%;">
                            <thead>
                                <tr>
                                <th scope="col">School Code</th>
                                <th scope="col">School Name</th>
                                </tr>
                            </thead>
                            <?php foreach($records as $row){?>
                                <tr>
                                <td scope="row" style="font-weight:bold"><?= $row['school_code'];?></th>
                                <td><?= $row['school_name'];?></td>
                                </tr>
                                <?php } ?>
                    </table>    
                </div>
            </div>
        </div>
        <?php } else {  redirect('login'); ?>  
        <?php }?>

        <script>  
                $(document).ready(function(){  
                    $('#school_table').DataTable();  
                });  
        </script>  