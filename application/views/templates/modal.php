
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?= form_open('delete');?>
      <h2>Set Schedule?</h2>
        <input type="hidden" value="<?= $id; ?>" name="id">
        
      </div>
      <div class="modal-footer">
      <div class="btn-group">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-success">Yes</button>
        </div>
      </div>
    </div>
  </div>
</div>