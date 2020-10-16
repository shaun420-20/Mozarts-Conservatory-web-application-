<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>logged in</title>

</head>
<body>
<?php
session_start();
$connect = mysqli_connect("localhost","id7295435_mozartsconservatory","lijinjoy","id7295435_mozarts");
$username= mysqli_real_escape_string($connect,$_POST['username']);
$password= mysqli_real_escape_string($connect,$_POST['password']);

if ($username&&$password)
{
$query = mysqli_query($connect,"select * from user where username='$username'");
$numrows = mysqli_num_rows($query);

if($numrows!=0)
{
while($row = mysqli_fetch_assoc($query))
{
$dbusername = $row['username'];
$dbpassword = $row['password'];
$dbname = $row['Name'];
}
if(password_verify($password,$dbpassword))
{
	if($username=='ADMIN')
	{
		echo "<script>alert('WELCOME ADMIN'); window.location.href='admin.html';</script>";
	    
	}
	else
	{
	$_SESSION['mz_name']= $dbname;
    $_SESSION['mz_username']= $dbusername;
    echo "<script>alert('Login successful');window.location.href='profilo.php';</script>";
	}
	
}
else
	echo 'Incorrect Password';
	
}
else
die("That username doesnt exist");
}
else
die("Please enter username and password");
mysqli_close($connect);
?>

</body>
</html>
