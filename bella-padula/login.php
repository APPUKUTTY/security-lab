<!DOCTYPE HTML>
<?php

$conn=mysqli_connect('127.0.0.1','root','');
if(!$conn)
echo "not connected";
if(!mysqli_select_db($conn,'bella'))
echo "not connected to db";
if(isset($_POST['submit']))
{
$name=$_POST['name'];
$pwd=$_POST['pwd'];
$query="SELECT * FROM padula WHERE name='$name' AND pwd='$pwd'";
$rec=mysqli_query($conn,$query);
if(!$rec)
echo "error in query";
else
{
$var=0;
if(mysqli_num_rows($rec)==0)
{
echo "login error";
$var=1;
header("Location:http://localhost/bella-padula/login.php");
}
if($var==0)
{
session_start();
$_SESSION['user']=$name;
header("Location:http://localhost/bella-padula/dashboard.php");
}
}
}

?>
<html>
<head>
<title>login page</title>
</head>
<body>
<form method="POST" action="login.php">
Enter username<br>
<input type="text" name="name"><br>
Enter password<br>
<input type="password" name="pwd">
<br><input type="submit" name="submit">
</form>

</body>
</html>
