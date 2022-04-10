<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
  <link rel="stylesheet" type="text/css" href="css/me.css">
  <link rel="stylesheet" href="bootstrap-select/dist/css/bootstrap-select.min.css">
  <script type="text/javascript" src="fontawesome/js/all.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script type="text/javascript" src="js/jquery-3.5.1.slim.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="bootstrap-select/dist/js/bootstrap-select.min.js"></script>
  <script src="bootstrap-select/dist/js/i18n/defaults-*.min.js"></script>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom: 20px;">
  <a class="navbar-brand" href="index.php" style="color: red;">Hey Big Box</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Prescription
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <center>
          <label>Prescription ID</label>
          <form style="margin: 4px;" action="cashprescription.php">
            <input type="text" placeholder="ID" class="form-control" style="margin-bottom: 5px; text-align: center;" name="id">
            <input type="submit" class="btn btn-primary" name="">
          </form>
        </center>
      </div>
    </li>
    </ul>
    <a class="nav-link" style="color: red;" href="index.php">Hi <?php echo $_SESSION['lol']; ?> <span class="sr-only">(current)</span></a>
    <a class="nav-link" href="logout.php">Logout <span class="sr-only">(current)</span></a>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<div class="container-fluid">