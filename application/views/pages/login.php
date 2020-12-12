<h1>User Login</h1>
<div class="container">
<hr>

<?php if($this->session->flashdata('failed_login')) : ?>
<?= '<p class="alert alert-danger">'.$this->session->flashdata('failed_login').'</p>' ?>
<?php endif;?>

<?= validation_errors();?>
<?= form_open('login');?>

<div class="form-group">
    <label for="username">Username</label>
    <input type="text" id="username" style="width: 300px"  name="username" value="<?= set_value('username'); ?>" class="form-control"
    autocomplete="off" placeholder="Enter email as username">
</div>

<div class="form-group">

    <label for="password" >Password</label>
    <input type="password" style="width: 300px" name="password" placeholder="Enter password" class="form-control">
</div>
<button type="submit" class="btn btn-primary">Submit</button>

</div>
</div>

<!-- <div class="row" style="margin-left: 200px">
	<aside class="col-sm-4">
<div class="card">
<article class="card-body"> -->
<!-- <a href="" class="float-right btn btn-outline-primary">Sign up</a>
<h4 class="card-title mb-4 mt-1">Sign in</h4>
	 <form>
    <div class="form-group">
    	<label>Your email</label>
        <input name="" class="form-control" placeholder="Email" type="email">
    </div>  -->
    <!-- form-group// -->
    <!-- <div class="form-group">
    	<a class="float-right" href="#">Forgot?</a>
    	<label>Your password</label>
        <input class="form-control" placeholder="******" type="password">
    </div> -->
     <!-- form-group// --> 
    <!-- <div class="form-group"> 
    <div class="checkbox">
      <label> <input type="checkbox"> Save password </label>
    </div> -->
     <!-- checkbox .// -->
    <!-- </div>  -->
    <!-- form-group// -->  
    <!-- <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"> Login  </button>
    </div>  -->
    <!-- form-group// -->                                                           
<!-- </form>
</article>
</div> -->


