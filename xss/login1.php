<?php

if(isset($_POST["sub"]))
{
$val=$_POST["no"];
header("Location:http://localhost/xss/impl.php?val=$val");
}

?>
<html>
<head>

<title>xss implementation</title>
</head>
<body>
<form method="post" action="login1.php">
enter the number<br>
<input type="number" name="no"><br>
<input type="submit" name="sub"><br>
</form>
</body>
</html>
