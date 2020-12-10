<h1> <?= $title;?> </h1>
<br>
<p><?= $body;?></p>

<?php if($this->session->logged_in == true && $this->session->access == 1){ ?>
<div class="btn-group">
    <a href="edit/<?= $id;?>" class="btn btn-primary">Edit</a>
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete</button>
</div>
<?php }?>