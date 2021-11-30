<?php
session_start();
error_reporting(0);
include("dbconnection.php");
if(isset($_POST['login']))
{
$ret=mysqli_query($con,"SELECT * FROM admin WHERE name='".$_POST['email']."' and password='".$_POST['password']."'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$extra="data-wisata.php";
$_SESSION['alogin']=$_POST['email'];
$_SESSION['id']=$num['id'];
echo "<script>window.location.href='".$extra."'</script>";
exit();
}
else
{
$_SESSION['action1']="*Invalid username or password";
$extra="index.php";

echo "<script>window.location.href='".$extra."'</script>";
exit();
}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>CRM | Admin Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta content="" name="author" />

<!-- font awesome cdn link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<!-- custom css file link  -->
<link rel="stylesheet" href="assets/css/login.css">
</head>
<body class="error-body no-top">
<section class="contact">

<div class="image">
    <img src="img/arahkita-2.png" alt="">
    </div>


<form action="" method="POST">

    <h1 class="heading">Welcome to Arah Kita</h1>
    <p style="color: #F00"><?php echo $_SESSION['action1'];?><?php echo $_SESSION['action1']="";?></p>
    <?php if (isset($error)) : ?>
        <i style="color: red;">Username atau password salah</i>
    <?php endif; ?>


    <ul style="list-style: none;">
        <div class="inputBox">
            <li>
                <input type="text" name="email" id="txtusername" placeholder="Username"> <br><br>
            </li>
        </div>

        <div class="inputBox">
            <li>
                <input type="password" name="password" id="txtpassword" placeholder="Password"> <br><br>
            </li>
        </div>

        <li>
            <button type="submit" name="login" class="btn_login">Masuk</button>
        </li>
       
    </ul>
</form>

</section>

<script src="assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="assets/js/login.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/highcharts.js"></script>
	<script type="text/javascript" src="js/exporting.js"></script>	
</body>
</html>