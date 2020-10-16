<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
     <title>Update Password</title>
     <link rel="stylesheet" type="text/css" href="style2.css">
	 <link rel="stylesheet" type="text/css" href="style.css">
	 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
     <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<br><br><br><br><br>
<br>
<div class="login-box">
<form name="form2" method="post">
<table>
<tr><td>Username: <input type="text" name="username" required placeholder="example@domain.com"></td></tr>
<tr><td>OLD Password:     <input type="password" name="pass1" maxlength="10" required></td></tr>
<tr><td>new password:     <input type="password" name="pass2" maxlength="10" required></td></tr>
<tr><td><input type="submit" name="submit" value="Submit"></td></tr>
</table>
</div>
<?php
$connect = mysqli_connect("localhost","id7295435_mozartsconservatory","lijinjoy","id7295435_mozarts");
if(isset($_POST['submit'])){
$username = mysqli_real_escape_string($connect,$_POST['username']);
$pass1 = mysqli_real_escape_string($connect,$_POST['pass1']);
$pass=mysqli_real_escape_string($connect,$_POST['pass2']);
$query = mysqli_query($connect,"select * from user where username='$username'");
$numrows = mysqli_num_rows($query);

if($numrows!=0)
{
while($row = mysqli_fetch_assoc($query))
{
$dbusername = $row['username'];
$dbpassword = $row['password'];
}
	if($username==$dbusername&& password_verify($pass1, $dbpassword)
		{
		$query = mysqli_query($connect,"UPDATE user SET password = '$pass' WHERE username = '$username'");
		echo '<script>alert("successfully changed")</script>';
		header("refresh:0; url=login.html");
		}
	else{
	echo "Incorrect information";
	header("refresh:1; url=update.php");}
}
mysqli_close($connect);
}
?>