<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
     <title>Forget password</title>
     <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<br><br><br><br><br>
<div class="login-box">
<form name="form2" method="post">
<table>
<tr><td>Username: <input type="text" name="username" required email placeholder="example@domain.com"></td></tr>
<tr><td>OTP:     <input type="text" name="otp" maxlength="40"  required></td>
<tr><td>Password:     <input type="password" name="password" maxlength="40"  required></td>
<tr><td><input type="submit" name="submit" value="Reset password"></td></tr>
</table>
</div>
<?php
session_start();
if(isset($_POST['submit'])){
$connect = mysqli_connect("localhost","id7295435_mozartsconservatory","lijinjoy","id7295435_mozarts");
$username= mysqli_real_escape_string($connect,$_POST['username']);
$otp= mysqli_real_escape_string($connect,$_POST['otp']);
$password= trim(password_hash($_POST['password'],PASSWORD_BCRYPT, [15]));
$query = mysqli_query($connect,"select * from user where username='$username'");
$numrows = mysqli_num_rows($query);
if($numrows!=0)
{
    while($row = mysqli_fetch_assoc($query))
        {
        $dbusername = $row['username'];
        $dbotp = $row['otp'];
        }
        if($otp==$dbotp && $username==$dbusername)
		    {
		    $query = mysqli_query($connect,"UPDATE user SET password = '$password' WHERE username = '$username'");
		    echo '<script>alert(" password successfully changed")</script>';
		    header("refresh:0; url=login.html");
		}
	    else{
	    echo "Incorrect information";
	    header("refresh:1; url=resetpassword.php");}
        }
mysqli_close($connect);
}
?>
 </body>
 </html>
 
         
         
         
