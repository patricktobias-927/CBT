<div class="form-group">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1> <?= $title;?> </h1>
                    <hr>
                    <br>
                    <!-- TO BE MODAL -->
                    <form method="post" id="import_form" enctype="multipart/form-data">
                   <p><label>Select Excel File</label>
                   <input type="file" name="file" id="file" required accept=".xls, .xlsx" /></p>
                    <br>
                    <button type="submit" name="import" class="btn btn-info" style=""><i class="fas fa-upload"></i> Import</button>
                    <!-- <a href="<? base_url('process_download'); ?>" class="btn btn-success">Download Template</a>    -->
                    </form>
                    <br>
                    <form method="post" action="<?php echo base_url(); ?>excel_export/action">
                    <button type="submit" name="export" class="btn btn-success" value=""><i class="fas fa-file-download"></i> Download Template</button>
                    </form>
                       <br>
                       <br>
                    <div class="table-responsive" id="data">
                    </div>
                    <br>
                    <table class="table table-bordered table-striped">
            <thead>
                <tr>
                <!-- <th scope="col">ID</th>
                <th scope="col">FILE</th> -->
                </tr>
            </thead>
            <tbody>     
              <!-- <?php foreach($records as $row){?>
                <tr>
                <td scope="row" style="font-weight:bold"><?= $row['file_id'];?></th>
                <td><?= $row['file_name'];?></td>     
                </tr>
                <?php } ?>   -->
               </tbody>
            </table> 
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){

load_data();

function load_data()
{
 $.ajax({
  url:"<?php echo base_url(); ?>excel_import/fetch",
  method:"POST",
  success:function(data){
   $('#data').html(data);
  }
 })
}

$('#import_form').on('submit', function(event){
 event.preventDefault();
 $.ajax({
  url:"<?php echo base_url(); ?>excel_import/import",
  method:"POST",
  data:new FormData(this),
  contentType:false,
  cache:false,
  processData:false,
  success:function(data){
   $('#file').val('');
   load_data();
   alert(data);
  }
 })
});

});
</script>