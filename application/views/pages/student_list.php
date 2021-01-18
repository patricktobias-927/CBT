<h1> <?= $title;?> </h1>
<hr>
<?= validation_errors();?>

        <?= form_open('students_list');?>
        <!-- <div class="form-group">
     <label for="search"  style="float:left;">Search School:</label>
            <input type="text" name="search_text" id="search_text" class="form-control" placeholder="Search" style="width: 180px; border-color:gray; margin-left:10px; margin-top:-4px; float:left;"   value="<?= set_value('schoolcode'); ?>">
        </div> -->
        <br>
     <button style="float:right; display: none;"></button></div>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
   
        <table class="table table-bordered table-striped" id="students_list_table" style="">
            <thead>
                <tr>
                <th scope="col">LRN</th>
                <th scope="col">Name</th>
                <th scope="col">School</th>
                <th scope="col">Gender</th>
                <th scope="col">Age</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($students as $row){?>
               

               
                <tr>
                <td scope="row" style="font-weight:bold"><?= $row['LRN'];?></th>
                <td><?= $row['last_name'].', '.$row['first_name'].' '.$row['middle_name'];?></td>
                <td><?= $row['school_name'];?></td>
                <td><?= $row['gender'];?></td>
                <td><?= $row['birth_date'];?></td>
                </tr>
            
                <?php } ?>
            </tbody>
            </table>
         </div>          
    </div>
</div>
            <script>
                $(document).ready(function(){  
                $('#students_list_table').DataTable();  
            });  
            </script>  