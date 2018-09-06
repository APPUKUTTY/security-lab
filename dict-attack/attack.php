<?php
$con=mysqli_connect('127.0.0.1','root','');
if(!$con)
echo "connection error";
if(!mysqli_select_db($con,'pwd'))
echo "db select error";
if(isset($_POST['sub']))
{
$uname=$_POST['name'];
$upwd=$_POST['pwd'];
$query1="SELECT password FROM userpwds WHERE username='$uname'";
$rec1=mysqli_query($con,$query1);
while($find=mysqli_fetch_assoc($rec1))
{
$pwd=$find["password"];
}
if($upwd)
{

}
else
{
$query="SELECT word FROM dictionary";
$que=mysqli_query($con,$query);
if(!$que)
echo "query error";
else
{
$check=0;$count=0;
while($rec=mysqli_fetch_assoc($que))
{
if($rec['word']==$pwd)
{
echo "Logged in successfully";
$check=1;
break;
}
else
{
$count++;
if($count>=3)
{
echo "no of attempts exceeded";
echo "\n";
break;
}
}
}
if($check==0)
echo "immune against dictionary attack";
}

}
}
?>
<html>
<head>
<title>dictionary attack impl</title>
</head>
<body>
<form method="post" action="attack.php">
enter username<br>
<input type="text" name="name"><br>
enter password<br>
<input type="password" name="pwd"><br>
<input type="submit" name="sub">
</form>
</body>
</html>
