<?php

$con=mysqli_connect("127.0.0.1",'root','');
if(!$con)
echo "connection error";
if(!mysqli_select_db($con,'username-password'))
echo "db select error";
if(isset($_POST['submit']))
{
$uname=$_POST['username'];
$pwd=$_POST['pin'];
$query="SELECT pin FROM pins WHERE username='$uname'";
$q=mysqli_query($con,$query);
while($find=mysqli_fetch_assoc($q))
{
$ans=$find['pin'];
}

if(!$pwd)
{
for($i=1;$i<100;$i++)
{
if($i==4)
{
echo "Attempt Count Exceeded";
break;
}
if($i==$ans)
{
echo "login Successsssssssssssss";
break;
}
}
}
}

?>

<html>
<head>
<title>Brute force attack</title>
</head>
<body>

<form method="POST" action="login.php">
Enter the username<br>
<input type="text" name="username"><br>
Enter the 2-digit pin<br>
<input type="password" name="pin"><br>
<input type="submit" name="submit">
</form>

</body>
</html>
