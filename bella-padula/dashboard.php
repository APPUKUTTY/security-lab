<!DOCTYPE HTML>
<?php
$conn=mysqli_connect('127.0.0.1','root','');
if(!$conn)
echo "<script>alert('not connected to server')</script>";
if(!mysqli_select_db($conn,'bella'))
echo "<script>alert('db connection error')</script>";
$fileread=0;
if(isset($_POST['submit']))
{
session_start();
$fname=$_POST['fname'];
$fmode=$_POST['mode'];
$name=$_SESSION['user'];
$query="SELECT * FROM padula WHERE fname='$fname'";
$rec=mysqli_query($conn,$query);
if(mysqli_num_rows($rec)==0)
{
echo "<script>alert('filename not available')</script>";
//header("Location:http://localhost/bella-padula/dashboard.php");
}
else
{
while($rec1=mysqli_fetch_assoc($rec))
{
$fpriority=$rec1['priority'];

}
$query="SELECT * FROM padula WHERE name='$name'";
$rec=mysqli_query($conn,$query);
while($rec1=mysqli_fetch_assoc($rec))
{
$upriority=$rec1['priority'];
}
if($upriority<$fpriority)
{
if($fmode=='W')
{
echo "<script>alert('access not given to write')</script>";
//header("Location:http://localhost/bella-padula/dashboard.php");
}
else if($fmode=='R')
{
$handle=fopen($fname,'r');
$data=fread($handle,filesize($fname));
$fileread=1;
}
}
else if($upriority>$fpriority)
{
if($fmode=='R')
{
echo "<script>alert('access not given to read')</script>";
//header("Location:http://localhost/bella-padula/dashboard.php");
}
else if($fmode=='W')
{
$fcontent=$_POST['txt'];
$handle=fopen($fname,'r');
fwrite($handle,$fcontent);

}
}
}
}

?>
<html>
<head>
<title>dashboard</title>
</head>
<body>
<form method="POST" action="dashboard.php">
enter filename<br>
<input type="text" name="fname"><br>
enter filemode<br>
<input type="text" name="mode"><br>
enter the data to be written<br>
<input type="text" name="txt"><br>
<input type="submit" name="submit">
</form>
<?php
if($fileread==1)
echo $data;
?>
</body>
</html>
