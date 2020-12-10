<h1>User Login</h1>
<hr>

<?php if($this->session->flashdata('failed_login')) : ?>
<?= '<p class="alert alert-danger">'.$this->session->flashdata('failed_login').'</p>' ?>
<?php endif;?>

<?= validation_errors();?>
<?= form_open('login');?>

<div class="form-group">
    <label for="username">Username</label>
    <input type="text" name="username" value="<?= set_value('username'); ?>" class="form-control"
    autocomplete="off" placeholder="Enter email as username">
</div>

<div class="form-group">
    <label for="password" >Password</label>
    <input type="password" name="password"  placeholder="Enter password" class="form-control">
</div>
<button type="submit" class="btn btn-primary">Submit</button>

</div>