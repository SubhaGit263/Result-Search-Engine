<!----------------start php code for database connection------------->
<?php
$db_host="localhost";
$db_user="root";
$db_pass="";
$db_name="db1";
$conn=mysqli_connect($db_host,$db_user,$db_pass,$db_name);
if(!$conn)
{
die("Connection Failed");
}
?>
<!----------------End php code for database connection----------------->

<!-----------------start php code for login form----------------------->
<?php
session_start();
if(!isset($_SESSION['alogin']))
{
if(isset($_REQUEST['rLogin']))
{
if(($_REQUEST['rName']=="")||($_REQUEST['aEmail']=="")||($_REQUEST['rPass']==""))
{
echo '<div class="alert alert-warning mt-3 text-center">Please fill all the fields</div>';
}
else
{
$rName=$_REQUEST['rName'];
$aEmail=$_REQUEST['aEmail'];
$rPass=$_REQUEST['rPass'];
$sql="SELECT rName,aEmail,rPass FROM admin WHERE rName='".$rName."' AND aEmail='".$aEmail."' AND rPass='".$rPass."'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)==1)
{
$_SESSION['rName']=$rName;
$_SESSION['aEmail']=$aEmail;
$_SESSION['rPass']=$rPass;
$_SESSION['alogin']=true;
echo '<script>location.href="Adminprofile.php"</script>';
}
else
{
echo '<div class="alert alert-warning mt-3 text-center">Name,Email or Password is not valid</div>';
}
}
}
}
else
{
echo '<script>location.href="Adminprofile.php"</script>';
}
?>
<!----------------End php code for login form------------------>

<!-----------------------start login form---------------------->
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

<title>AdminLogin.com</title>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-sm-12">

<form action="" method="POST" class="shadow-lg p-5">

<h5>welcome To Login Page</h5>

<label for="Name">Name</label>
<input type="text" placeholder="Type your name here" name="rName" class="form-control">

<label for="Email">Email</label>
<input type="text" placeholder="Type your email here" name="aEmail" class="form-control">

<label for="Password">Password</label>
<input type="password" placeholder="Type your password here" name="rPass" class="form-control">

<input type="submit" value="Login" name="rLogin" class="btn btn-info">

<a href="Adminregistration.php" class="btn btn-info">Back To Registration Page</a>
</form>

</div>
</div>
</div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
-->
</body>
</html>
<!------------------End login form-------------------------->