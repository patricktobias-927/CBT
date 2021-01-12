<h1> <?= $title;?> </h1>
<hr>
<?= validation_errors();?>
<div class="row">
    <div class="col-lg-12">
        <?= form_open('school_and_section_list');?>
        <div class="form-group">
     <label for="search"  style="float:left;">Search School:</label>
            <input type="text" name="search_text" id="search_text" class="form-control" placeholder="Search" style="width: 180px; border-color:gray; margin-left:10px; margin-top:-4px; float:left;"   value="<?= set_value('schoolcode'); ?>">
        </div>
        <br>
        <br>
        <br>
        <br>
        <table class="table table-bordered table-striped">
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