        <?php if($this->session->logged_in){?>
        <h1> <?= $title;?> </h1>
        <hr>
        <?= validation_errors();?>

        <div class="container-fluid">
            <div class="row d-flex justify-content-start align-items-center">
                <div class="col-sm-4" >  
                    <form method="post" action="<?php echo base_url(); ?>export_section_list/action">
                        <button type="submit" name="export" class="btn btn-success" value=""><i class="fas fa-file-download"></i> Export All</button>
                    </form>
                </div>

                <div class="col-sm-8 d-flex justify-content-end"> 
                    <form method="post" action="<?php echo base_url(); ?>export_section_list_single/action">
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> 
                        <select id="select_school" name="select_school" class="selectpicker" data-live-search="true" onchange="singleSelectChangeofValue()">
                        <option value=""></option>
                        <?php foreach($records as $row){?>
                        <option value="<?= $row['school_code'];?>"><?= $row['school_name'];?></option>
                        <?php } ?>
                        </select>
                        <button type="submit" name="export" class="btn btn-success" value=""><i class="fas fa-file-download"></i> Export Selected</button>
                    </form>         
                </div>  
            </div>
        </div>
        <br>
        <br>
        <button style="float:right; display: none;"></button>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                <table class="table table-bordered table-striped" id="school_list_table1" style="">
                    <thead>
                        <tr>
                        <th scope="col">School Code</th>
                        <th scope="col">School Name</th>
                        <th scope="col">Number of Sections</th>
                        <th scope="col">Population</th>
                        </tr>
                    </thead>
                        <tbody>
                        <?php foreach($records as $row){?>
                            <tr>
                            <!-- <td><input type="checkbox" name="selected_section_id" id="selected_section_id" class="checkbox" value="<?= $row['school_id'];?>" onchange="singleSelectChangeofValue()"><?= $row['school_id'];?></td> -->
                            <td scope="row" style="font-weight:bold"><?= $row['school_code'];?></th>
                            <td><?= $row['school_name'];?></td>
                            <td><?= $row['section_name'];?></td>
                            <td><?= $row['value_sum'];?></td>
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
                $('#school_list_table1').DataTable();  
            });  
            </script>  
            <!-- <script>
            function singleSelectChangeofValue() {
                //Getting Value
                //var selValue = document.getElementById("singleSelectDD").value;
                var selObj = document.getElementById("select_school");
                var selValue = selObj.options[selObj.selectedIndex].value;
                //Setting Value
                document.getElementById("hidden_input").value = selValue;
            }
            </script> -->