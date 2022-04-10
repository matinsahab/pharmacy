<?php 
if (!isset($_SESSION['ax'])){
header('location: logout.php');
require 'conn.php';
}?>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
  <link rel="stylesheet" type="text/css" href="css/me.css">
  <script type="text/javascript" src="fontawesome/js/all.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script type="text/javascript" src="js/jquery-3.5.1.slim.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script src="js/popper.min.js"></script>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom: 20px;">
  <a class="navbar-brand" href="index.php" style="color: red;">Ghazni</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="admin.php">Home<span class="sr-only"></span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Drug
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="drug.php?add">Add Drug</a>
          <a class="dropdown-item" href="drug.php?edit">Edit Drug</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Stock
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="stock.php?tablet">Tablet</a>
          <a class="dropdown-item" href="stock.php?capsule">Capsules</a>
          <a class="dropdown-item" href="stock.php?pomade">Pomade</a>
          <a class="dropdown-item" href="stock.php?solution">Solution</a>
          <a class="dropdown-item" href="stock.php?syrup">Syrup</a>
          <a class="dropdown-item" href="stock.php?drops">Drops</a>
          <a class="dropdown-item" href="stock.php?inhaler">Inhalers</a>
          <a class="dropdown-item" href="stock.php?injection">Injections</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Report
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <center>
          <a class="dropdown-item" href="report.php?today">Today</a>
          <div><hr></div>
          <label>Specific Date</label>
          <form style="margin: 4px;" action="report.php">
            <input type="hidden" name="specificdate">
            <input type="text" placeholder="mm-dd-YYYY" class="form-control" style="margin-bottom: 5px; text-align: center;" name="date">
            <input type="submit" value="Get Report" class="btn btn-primary" name="">
          </form>
          <div><hr></div>
          <form style="margin: 4px;" action="report.php">
          <label>From</label>
            <input type="hidden" name="fromto">
            <input type="text" placeholder="date1:mm-dd-Y" class="form-control" style="margin-bottom: 5px; text-align: center;" name="date1">
          <label>To</label>
            <input type="text" placeholder="date2:mm-dd-Y" class="form-control" style="margin-bottom: 5px; text-align: center;" name="date2">
            <input type="submit" value="Get Report" class="btn btn-danger" name="">
          </center>
          </form>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Prescription
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <center>
          <label>Prescription ID</label>
          <form style="margin: 4px;" action="prescription.php">
            <input type="text" placeholder="ID" class="form-control" style="margin-bottom: 5px; text-align: center;" name="id">
            <input type="submit" class="btn btn-primary" name="">
          </form>
        </center>
      </div>
    </li>
    </ul>
    <a class="nav-link" style="color: red;" href="admin.php">Hi <?php echo $_SESSION['ax']; ?> <span class="sr-only">(current)</span></a>
    <a class="nav-link" href="logout.php">Logout <span class="sr-only">(current)</span></a>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<div class="container-fluid">