<?php if($this->session->logged_in){?>
<?php
echo "<h1> Welcome, ";
echo $this->session->fullname;
echo "!"; ?>
 <?php } else { ?>
 

<br>


<hr>


<?php if($this->session->flashdata('failed_login')) : ?>
<?= '<p class="alert alert-danger">'.$this->session->flashdata('failed_login').'</p>' ?>
<?php endif;?>

<?= form_open('login');?>

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
    <h3></h3>
    <h3>Log In</h3>
    </div>

    <!-- Login Form -->
    <form>
      <!-- <input type="text" id="login" class="fadeIn second" name="login" placeholder="login"> -->
      <?= validation_errors();?>

             <input type="phone" id="username" class="fadeIn second" name="username" value="<?= set_value('username'); ?>" class="form-control"
             autocomplete="on" placeholder="username">
             <input type="password" style=""  name="password" placeholder="password" class="fadeIn third">
      <!-- <input type="text" id="password" class="fadeIn third" name="login" placeholder="password"> -->
      <input type="submit" class="fadeIn fourth" value="Log In">
      
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">CBT MASTERLIST GENERATOR</a>
    </div>

  </div>
</div>




<!-- <div class="row">
<div class="col-sm-12">
<div class="form-group">
<?= validation_errors();?>
    <label for="username">Username</label>
    <div class="input-group">
         <div class="input-gour-prepend">
             <span class="input-group-text" style="width: 40px; height: 38px;"><i class="far fa-user"></i> 
             <input type="text" id="username" style="width: 300px; margin-left: 9px;"  name="username" value="<?= set_value('username'); ?>" class="form-control"
             autocomplete="on" placeholder="Enter email as username">
             </span>
          </div>
    </div>
</div>

<div class="form-group">
<div class="input-group">
         <div class="input-gour-prepend">
    <label for="password" >Password</label>
    <span class="input-group-text" style="width: 40px; height: 38px;"><i class="fas fa-lock" style=""></i>
    <input type="password" style="width: 300px; margin-left: 9px;" name="password" placeholder="Enter password" class="form-control"></span>
</div>

</div>
</div>
<button type="submit" class="btn btn-primary">Log In</button>

</div>
</div>
</div>
</div>
</div> -->
<?php } ?>
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


