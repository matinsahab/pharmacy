<?php
require('conn.php');
if (isset($_POST['loginform'])) {
    $loginemail = $_REQUEST['loginemail'];
    $loginpassword = md5($_REQUEST['loginpassword']);
    $command = "SELECT * FROM `account` WHERE `username` = '$loginemail' AND `password` = '$loginpassword'";
    $command1 = "SELECT * FROM `account` WHERE `username` = '$loginemail'";
    $command2 = "SELECT * FROM `account` WHERE `email` = '$loginemail'";
    $query = mysqli_query($conn, $command);
    $query1 = mysqli_query($conn, $command1);
    $query2 = mysqli_query($conn, $command2);
    $num = mysqli_num_rows($query);
    $num1 = mysqli_num_rows($query1);
    $num2 = mysqli_num_rows($query2);
    $fetch = mysqli_fetch_assoc($query);
    if ($num == 1) {
        $_SESSION['lol'] = $fetch['username'];
        header('location: index.php');
    } elseif ($num == 0) {
        header('location: login.php?both=wrong');
    } elseif ($num1 != 1) {
        header('location: login.php?nousername=like');
    } elseif ($num2 != 1) {
        header('location: login.php?noemail=like');
    } else{
        header('location: login.php?sthlogin=wrong');
    }
} elseif (isset($_POST['signupform'])) {
    $signupusername = $_POST['signupusername'];
    $signupemail = $_POST['signupemail'];
    $signuppassword = md5($_POST['signuppassword']);
    $command = "SELECT `username`, `email` FROM `account` WHERE `username` = '$signupusername'";
    $command1 = "SELECT `username`, `email` FROM `account` WHERE `email` = '$signupemail'";
    $query = mysqli_query($conn, $command);
    $query1 = mysqli_query($conn, $command1);
    $num = mysqli_num_rows($query);
    $num1 = mysqli_num_rows($query1);
    if($num > 0){
        header('location: login.php?username=exist');
    } elseif($num1 > 0){
        header('location: login.php?email=exist');
    } else{
        $command = "INSERT INTO `account`(`username`, `password`) VALUES ('$signupusername', '$signuppassword')";
        $query = mysqli_query($conn, $command);
        if (!$query) {
        header('location: login.php?signup=sthwrong');
        } else{
        header('location: login.php?account=created');
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="login.css">
  <link rel="stylesheet" href="w3.css">
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript">    $(".animated").addClass("delay-1s");</script>
</head>
<body>
<center><h2 style="margin-top: 20px; color: #f05837;"><a href="adminlogin.php" id="bcd">M</a>azahir Pharmacy Database</h2></center>
<div class="col-sm-6"></div>
<form method="post">
<div class="container login-container">
            <div class="row">
                <div class="col-md-6 login-form-1">
                    <h3>Login</h3>
                    
                        <div class="form-group">
                            <input type="text" class="form-control" name="loginemail" placeholder="Email or Username" value="" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="loginpassword" placeholder="Your Password" value="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" name="loginform" value="Login" />
                        </div>
                        <div class="form-group">
                            <?php if (isset($_GET['both'])) {?>
                            <label class="btnForgetPwd w3-animate-opacity" style="width:100%; color: #f05837;">Either username or password is wrong!</label>
                            <?php } ?>
                            <?php if (isset($_GET['nousername'])) {?>
                            <label class="btnForgetPwd w3-animate-opacity" style="width:100%; color: #f05837;">Username is not registered!</label>
                            <?php } ?>
                            <?php if (isset($_GET['noemail'])) {?>
                            <label class="btnForgetPwd w3-animate-opacity" style="width:100%; color: #f05837;">Email is not registered!</label>
                            <?php } ?>
                            <?php if (isset($_GET['sthwrong'])) {?>
                            <label class="btnForgetPwd w3-animate-opacity" style="width:100%; color: #f05837;">Something went worng, please try again!</label>
                            <?php } ?>
                            <a href="#" class="btnForgetPwd">Forget Password?</a>
                        </div>
                    
                </div>
                <div class="col-md-6 login-form-2">

                    <div class="login-logo">
                        <img src="newlogo.png" alt=""/>
                    </div>
                </form>
                <form method="post">
                    <h3>Sign up</h3>
                        <div class="form-group">
                            <input type="text" class="form-control" name="signupusername" placeholder="Choose Username" value="" />
                        </div>  
                        <div class="form-group">
                            <input type="password" class="form-control" name="signuppassword" placeholder="Your Password" value="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" name="signupform" value="Sign up" />
                        </div>
                            <?php 
                                if (isset($_GET['account'])) {?>
                                    <label class="btnForgetPwd w3-animate-opacity" style="width:100%; color: #282726;">Account created successfully, Please login.</label>
                            <?php }?>
                            <?php 
                                if (isset($_GET['username'])) {?>
                                    <label class="btnForgetPwd w3-animate-opacity" style="width:100%; color: #282726;">Username already exists!</label>
                            <?php }?>
                            <?php 
                                if (isset($_GET['email'])) {?>
                                    <label class="btnForgetPwd w3-animate-opacity" style="width:100%; color: #282726;">Email already exists!</label>
                            <?php }?>
                        <div class="form-group">
                        </div>
                </div>
            </div>
        </div>
</form>
</body>
</html>