<?php 
require('conn.php');
if (isset($_POST['loginemail'])) {
	$log = $_POST['loginemail'];
	$pas = $_POST['loginpassword'];
	if ($log == 'hamid' && $pas == 'mazahir') {
    $_SESSION['ax'] = $log;
		header('location: admin.php');
	}
}
?>
<head>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="login.css">
  <link rel="stylesheet" href="w3.css">
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript">    $(".animated").addClass("delay-1s");</script>
</head>
<div class="col-sm-6"></div>
<form method="post">
<div class="container login-container">
            <div class="row">
                <div class="col-md-6 login-form-1">
                    <h3>Login</h3>
                    
                        <div class="form-group">
                            <input type="text" class="form-control" name="loginemail" placeholder="Username" value="" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="loginpassword" placeholder="Your Password" value="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" name="loginform" value="Login" />
                        </div>
                    
                </div>
                <div class="col-md-6 login-form-2">

                    <div class="login-logo">
                        <img src="newlogo.png" alt=""/>
                    </div>
                </form>
<div class="login-form-2"><center><h1 style="margin: center; color: white;">Admin <br>Login</h1></center></div>