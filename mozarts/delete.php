<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
     <title>Delete Account</title>
     <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<br><br><br><br><br>
<br>
<div class="login-box">
<form name="form2" method="post">
<table>
<tr><td>Username: <input type="text" name="username" required placeholder="example@domain.com"></td></tr>
<tr><td>Name:     <input type="text" name="Name" maxlength="40" placeholder="Full Name" required></td>
<tr><td>Password:<input type="password" name="pass" required></td></tr>
<tr><td><input type="submit" name="submit" value="Submit"></td></tr>
</table>
</div>
<?php
$connect = mysqli_connect("localhost","id7295435_mozartsconservatory","lijinjoy","id7295435_mozarts");
if(isset($_POST['submit'])){
$username= mysqli_real_escape_string($connect,$_POST['username']);
$Name= mysqli_real_escape_string($connect,$_POST['Name']);
$pass= mysqli_real_escape_string($connect,$_POST['pass']);
$query = mysqli_query($connect,"select * from user where username='$username'");
$numrows = mysqli_num_rows($query);

if($numrows!=0)
{
while($row = mysqli_fetch_assoc($query))
{
$dbusername = $row['username'];
$dbname = $row['Name'];
$dbpassword = $row['password'];
}
	if($Name==$dbname&&$username==$dbusername&&password_verify($pass,$dbpassword))
		{
		$query = mysqli_query($connect,"delete from user where username='$username'");
		echo "<SCRIPT>alert('Your account " .$dbusername ." is succesfully removed.')</SCRIPT>";
		header("refresh:5; url=login.html");
		}
	else
	echo "Incorrect information";
}
else
echo "Username doesn't exists!";
mysqli_close($connect);
}
?>