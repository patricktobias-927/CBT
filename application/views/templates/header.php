<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grace Tools</title>
    <script src="https://kit.fontawesome.com/5711d9d9ba.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/sidenav.css" class="css">
    <link rel="stylesheet" href="css/stylesheet.css" class="css">

</head>
<body>
<header>
  <!-- Fixed navbar -->



<!-- UNDER CONSTRUCTION -->
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-11 mr-0 px-4" href="<?= base_url();?>">CBT Masterlist Generator</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <ul class="navbar-nav px-4">
  <?php if($this->session->logged_in){?>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url();?>logout"><i class="fas fa-power-off"></i> Logout</a>
          </li>
        <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url();?>login"></a>
          </li>
          <?php } ?>
  </ul>
</nav>
<?php if($this->session->logged_in == true && $this->session->access == 1){ ?>
<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse" style="margin-left: 10px;">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
       
          <li class="nav-item">
            <a class="nav-link" href="add"><i class="fas fa-school"></i> Add School</a>
          </li>
          
         
          <?php if($this->session->logged_in == true && $this->session->access == 1){ ?>
          <li class="nav-item">
            <a class="nav-link" href="addschedule";><i class="far fa-clock"></i> Add Schedule</a>
          </li>
          <?php }?>
          <?php if($this->session->logged_in){?>
          <li class="nav-item">
            <a class="nav-link" href="add_section_codes";><i class="fas fa-list-ul"></i> Section Codes</a>
          </li>
          <?php }?>
          <?php if($this->session->logged_in){?>
          <li class="nav-item">
            <a class="nav-link" href="add_batch";><i class="fas fa-list-ul"></i> Batch</a>
          </li>
          <?php }?>
          <?php if($this->session->logged_in){?>
          <li class="nav-item">
            <a class="nav-link" href="add_grade_level";><i class="fas fa-level-up-alt"></i> Grade Level</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="add_section"";><i class="fas fa-user-friends"></i> Add Section</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="school_and_section_list";><i class="fas fa-university"></i> School and Section List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="bulk_upload_of_students";><i class="fas fa-user-plus"></i> Bulk Upload of Student</a>
          </li>
          <?php }?>
            <br>
            <br>
          <?php if($this->session->logged_in){?>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url();?>logout"><i class="fas fa-power-off"></i> Logout</a>
          </li>
        <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url();?>login"></a>
          </li>
          <?php } ?>
            <li class="nav-item">
              <a class="nav-link" href=""><i class="far fa-user"></i> <?= $this->session->fullname;?></a>
            </li>
        </ul>
      </div>
    </nav>
  
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mb-2 mb-md-0">
        <?php }?>
          <div class="container mt-2">
          


