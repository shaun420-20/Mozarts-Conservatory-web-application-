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
<tr><td>Username: <input type="text" name="username" required placeholder="example@domain.com"></td></tr>
<tr><td>Name:     <input type="text" name="Name" maxlength="40" placeholder="Full Name" required></td>
<tr><td><input type="submit" name="submit" value="Generate OTP"></td></tr>
</table>
</div>
<?php
$string = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$string_shuffled = str_shuffle($string);
$OTP = substr($string_shuffled, 1, 7);
session_start();

if(isset($_POST['submit'])){
$connect = mysqli_connect("localhost","id7295435_mozartsconservatory","lijinjoy","id7295435_mozarts");
$username= mysqli_real_escape_string($connect,$_POST['username']);
$name= mysqli_real_escape_string($connect,$_POST['Name']);
$query = mysqli_query($connect,"select * from user where username='$username'");
$numrows = mysqli_num_rows($query);

if($numrows!=0)
{
    while($row = mysqli_fetch_assoc($query))
    {
    $dbusername = $row['username'];
    $dbname = $row['Name'];
    }
	    if($name==$dbname&&$username==$dbusername)
		    {
            $query = mysqli_query($connect,"UPDATE user SET otp = '$OTP' WHERE username = '$username'");
            $to      = $dbusername;
            $subject = 'OTP to reset password ';
            $message = "Hello  " .$dbname. "  Your OTP is :  " .$OTP. "     go to: http://mozartsconservatory.000webhost.com/resetpassword.php" ;
            $headers = 'From: mozartsconservatory@gmail.com' . "\r\n" .
                    'Reply-To: mozartsconservatory.000webhost.com' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();
            mail($to, $subject, $message, $headers);
            echo "<script> alert('OTP is sent to registered email address!');window.location.href='resetpassword.php'; </script>";
        }
        
    }
    mysqli_close($connect);
}
 ?>
 </body>
 </html>
 
         
         
         
