<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post App</title>
    <link rel="stylesheet" href="<?= base_url();?>css/bootstrap.min.css">
    
</head>
<body>
<header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Patrick's Blog</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item active">
            <a class="nav-link" aria-current="page" href="<?= base_url();?>">Home</a>
          </li>
          <?php if($this->session->logged_in == true && $this->session->access == 1){ ?>
          <li class="nav-item">
            <a class="nav-link" href="add">Create Post</a>
          </li>
          <?php }?>
        <?php if($this->session->logged_in){?>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url();?>logout">Logout</a>
          </li>
        <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url();?>login">Login</a>
          </li>
          <?php } ?>
          <li class="nav-item">
            <a class="nav-link" href=""><?= $this->session->fullname;?></a>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2 ml-5" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success ml-2" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
</header>

<div class="container mt-5">

