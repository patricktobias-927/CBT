        <?php if($this->session->logged_in){?>
        <div class="container-fluid">
        <h1> <?= $title;?> </h1>
        <hr>
        <?= validation_errors();?>
        <?php if($this->session->flashdata('custom_assessment_added')) : ?> 
        <?= '<p class="alert alert-success">'.$this->session->flashdata('custom_assessment_added').'</p>' ?>
        <?php endif;?>
        <!-- <?php if($this->session->flashdata('batch_deleted')) : ?> 
        <?= '<p class="alert alert-success">'.$this->session->flashdata('batch_deleted').'</p>' ?>
        <?php endif;?> -->

        <div class="row">
            <div class="col-lg-12">
                <!-- <?= form_open('add_batch');?> -->
                <form style=""name="bulk_action_form3" action="<?=base_url().'add_custom_assessment'?>" method="post"/>
                <div class="form-group">
                <br>   
                        <label for="" style=" float:left;" >Assessment Type :   </label>
                        <input type="text" name="assessment_type" id="assessment_type" class="form-control" placeholder="Assessment Type" style="width: 200px;  margin-left:10px; margin-top:-4px; float:left;"   value="">
                        
                        <button type="submit" class="btn btn-success" style="width: 15%; margin-left:16px; margin-top:-4px; float:right;background-color: #FF8C00; border-color: #FF8C00;"><i class="fas fa-plus"></i> Add</button>

                    <br>      
            </div>  
        </div>
        <br>    
        <br>    
        <br>    
        <br> 
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                        <label for="" class="float-left">Course1 : &nbsp; &nbsp;</label>
                        <input type="text" name="course1" id="course1" placeholder="Course 1" class="form-control float-left" style="width: 50%;">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">    
                        <label for="" class="float-left">Course Code1 : &nbsp; &nbsp;&nbsp;</label>
                        <input type="text" name="course_code1" id="course_code1" placeholder="Course Code 1" class="form-control float-left" style="width: 50%;">
                    </div>
                </div>   
                <br>
                <br>
                <div class="col-md-6">
                <div class="form-group">
                        <label for="" class="float-left">Course2 : &nbsp; &nbsp;</label>
                        <input type="text" name="course2" id="course2" placeholder="Course 2" class="form-control float-left" style="width: 50%;">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">    
                        <label for="" class="float-left">Course Code 2 : &nbsp; &nbsp;</label>
                        <input type="text" name="course_code2" id="course_code2" placeholder="Course Code 2" class="form-control float-left" style="width: 50%;">
                    </div>
                </div>   
                <br>
                <br>
                <div class="col-md-6">
                <div class="form-group">
                        <label for="" class="float-left">Course3 : &nbsp; &nbsp;</label>
                        <input type="text" name="course3" id="course3" placeholder="Course 3" class="form-control float-left" style="width: 50%;">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">    
                        <label for="" class="float-left">Course Code 3 : &nbsp; &nbsp;</label>
                        <input type="text" name="course_code3" id="course_code3" placeholder="Course Code 3" class="form-control float-left" style="width: 50%;">
                    </div>
                </div>  
                <br>
                <br>
                <div class="col-md-6">
                <div class="form-group">
                        <label for="" class="float-left">Course4 : &nbsp; &nbsp;</label>
                        <input type="text" name="course4" id="course4" placeholder="Course 4" class="form-control float-left" style="width: 50%;">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">    
                        <label for="" class="float-left">Course Code 4 : &nbsp; &nbsp;</label>
                        <input type="text" name="course_code4" id="course_code4" placeholder="Course Code 4" class="form-control float-left" style="width: 50%;">
                    </div>
                </div>   
                <br>
                <br>
                <div class="col-md-6">
                <div class="form-group">
                        <label for="" class="float-left">Course5 : &nbsp; &nbsp;</label>
                        <input type="text" name="course5" id="course5" placeholder="Course 5" class="form-control float-left" style="width: 50%;">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">    
                        <label for="" class="float-left">Course Code 5 : &nbsp; &nbsp;</label>
                        <input type="text" name="course_code5" id="course_code5" placeholder="Course Code 5" class="form-control float-left" style="width: 50%;">
                    </div>
                </div>   
                <br>
                <br>
                <div class="col-md-6">
                <div class="form-group">
                        <label for="" class="float-left">Course6 : &nbsp; &nbsp;</label>
                        <input type="text" name="course6" id="course6" placeholder="Course 6" class="form-control float-left" style="width: 50%;">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">    
                        <label for="" class="float-left">Course Code 6 : &nbsp; &nbsp;</label>
                        <input type="text" name="course_code6" id="course_code6" placeholder="Course Code 6" class="form-control float-left" style="width: 50%;">
                    </div>
                </div>    
            </div>
        </div>
        </form>
        <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">  
                <form name="bulk_action_form2" action="<?= base_url().'delete_batch'?> " method="post" onSubmit="return  ();"/>
                <!-- <button type="submit" name="bulk_delete_submit" value="DELETE" class="btn btn-danger" style="margin-left: 475px;  width:15%; margin-top:-67px;">Delete</button>  -->
                    <div class="form-group">
                    <br>
                    <button style="float:right; display: none;"></button></div>
                        <table class="table table-bordered table-striped" style="width: 100%;" id="batch_table">
                            <thead>
                                <tr>
                                <th scope="col">Assessment Type</th>
                                <th scope="col">Course1</th>
                                <th scope="col">Course2</th>
                                <th scope="col">Course3</th>
                                <th scope="col">Course4</th>
                                <th scope="col">Course5</th>
                                <th scope="col">Course6</th>
                                </tr>
                            </thead>
                            <tbody>     
                            <?php foreach($records as $row){?>
                                <tr>
                                <!-- <td><input type="checkbox" name="checked_id[]" class="checkbox" value="<?= $row['batch_id'];?>"></td> -->
                                <td><?= $row['assessment_type'];?></td>
                                <td><?= $row['course1'];?></td>
                                <td><?= $row['course2'];?></td>
                                <td><?= $row['course3'];?></td>
                                <td><?= $row['course4'];?></td>
                                <td><?= $row['course5'];?></td>
                                <td><?= $row['course6'];?></td>
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