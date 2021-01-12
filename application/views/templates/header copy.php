<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CBT</title>
    <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/stylesheet.css" class="css">
    <link rel="stylesheet" href="css/sidenav.css" class="css">


</head>
<body>
<header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-dark sticky-top bg-dark navbar-expand-md shadow">
    <div class="container-fluid">
    <!-- <?php if($this->session->logged_in){?>
      <a class="navbar-brand" href="<?= base_url();?>">CBT Masterlist Generator</a>
      <?php }?> -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarCollapse">
      
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <!-- <?php if($this->session->logged_in){?>
          <li class="nav-item active">
            <a class="nav-link" aria-current="page" href="<?= base_url();?>">Home</a>
          </li>
          <?php }?> -->
          <?php if($this->session->logged_in == true && $this->session->access == 1){ ?>
          <li class="nav-item">
            <a class="nav-link" href="add" style="color:white; margin-left: 70px;">Add School</a>
          </li>
          
          <?php }?>
          <?php if($this->session->logged_in == true && $this->session->access == 1){ ?>
          <li class="nav-item">
            <a class="nav-link" href="addschedule" style="color:white;";>Add Schedule</a>
          </li>
          <?php }?>
          <?php if($this->session->logged_in){?>
          <li class="nav-item">
            <a class="nav-link" href="add_section_codes" style="color:white;";>Section Codes</a>
          </li>
          <?php }?>
          <?php if($this->session->logged_in){?>
          <li class="nav-item">
            <a class="nav-link" href="add_batch" style="color:white;";>Batch</a>
          </li>
          <?php }?>
          <?php if($this->session->logged_in){?>
          <li class="nav-item">
            <a class="nav-link" href="add_grade_level" style="color:white;";>Grade Level</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="add_section" style="color:white;";>Add Section</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="school_and_section_list" style="color:white;";>School and Section List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="school_and_section_list" style="color:white;";>Bulk Upload of Student</a>
          </li>
          <?php }?>
        <?php if($this->session->logged_in){?>
          <li class="nav-item">
            <a style="margin-left: 600px;color:white;"class="nav-link" href="<?= base_url();?>logout">Logout</a>
          </li>
        <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link" style="color:white;" href="<?= base_url();?>login">CBT Masterlist Generator</a>
          </li>
          <?php } ?>
            <li class="nav-item">
              <a class="nav-link" href=""><?= $this->session->fullname;?></a>
            </li>
        </ul>
        <!-- <form class="d-flex">
          <input class="form-control me-2 ml-5" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success ml-2" type="submit">Search</button>
        </form> -->
      </div>
    </div>
  </nav>


<!-- UNDER CONSTRUCTION -->
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Company name</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="#">Sign out</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
        <?php if($this->session->logged_in == true && $this->session->access == 1){ ?>
          <li class="nav-item">
            <a class="nav-link" href="add">Add School</a>
          </li>
          
          <?php }?>
          <?php if($this->session->logged_in == true && $this->session->access == 1){ ?>
          <li class="nav-item">
            <a class="nav-link" href="addschedule";>Add Schedule</a>
          </li>
          <?php }?>
          <?php if($this->session->logged_in){?>
          <li class="nav-item">
            <a class="nav-link" href="add_section_codes";>Section Codes</a>
          </li>
          <?php }?>
          <?php if($this->session->logged_in){?>
          <li class="nav-item">
            <a class="nav-link" href="add_batch";>Batch</a>
          </li>
          <?php }?>
          <?php if($this->session->logged_in){?>
          <li class="nav-item">
            <a class="nav-link" href="add_grade_level;>Grade Level</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="add_section"";>Add Section</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="school_and_section_list";>School and Section List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="school_and_section_list";>Bulk Upload of Student</a>
          </li>
          <?php }?>
        <?php if($this->session->logged_in){?>
          <li class="nav-item">
            <a style="margin-left: 600px;color:white;"class="nav-link" href="<?= base_url();?>logout">Logout</a>
          </li>
        <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url();?>login">CBT Masterlist Generator</a>
          </li>
          <?php } ?>
            <li class="nav-item">
              <a class="nav-link" href=""><?= $this->session->fullname;?></a>
            </li>
        </ul>
      </div>
    </nav>





</header>

<div class="container mt-5">


