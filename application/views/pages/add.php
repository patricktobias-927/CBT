<h1> <?= $title;?> </h1>
<hr>
<?= validation_errors();?>
<div class="row">
    <div class="col-lg-12">
        <?= form_open('add');?>
        <div class="form-group">
     <label for="title"  style="float:left;">School Name</label>
            <input type="text" name="schoolname" class="form-control" placeholder="Enter School Name" style="width: 180px; border-color:gray; margin-left:10px; margin-top:-4px; float:left;"   value="<?= set_value('schoolcode'); ?>">
            <label for="title" style="float:left; margin-left:50px;">School Code</label>
            <input type="text" name="schoolcode" class="form-control" placeholder="Enter School Code" style="width: 180px; border-color:gray; margin-left:10px; margin-top:-4px; float:left;"   value="<?= set_value('schoolname'); ?>">
            <button type="submit" class="btn btn-success" style="margin-left:30px; margin-top:-4px; float:left;">Add School</button>
        </div>
        <br>
        <br>
        <br>
        <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col">School Code</th>
                <th scope="col">School Name</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($records as $row){?>
                <tr>
                <th scope="row"><?= $row['school_code'];?></th>
                <td><?= $row['school_name'];?></td>
                </tr>
                <?php } ?>
            </tbody>
            </table>

                </div>
                            
                    </div>
                </div>