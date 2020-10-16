<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>logged in</title>

</head>
<body>
<?php
session_start();
$Name=$_POST['Name'];
$username=$_POST['username'];
$Address=$_POST['Address'];
$mobno=$_POST['mobno'];
$dob=$_POST['dob'];
$instrument=$_POST['instrument'];
$Gender=$_POST['Gender'];
$password = trim(password_hash($_POST['pass1'], PASSWORD_BCRYPT, [15]));
	$servername = "localhost";
	$musername = "id7295435_mozartsconservatory";
	$dpassword = "lijinjoy";
	$database = "id7295435_mozarts";
	$connect = new mysqli($servername, $musername, $dpassword, $database);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT username From user Where username = ? Limit 1";
     $INSERT = "INSERT Into user (Name,username,Address,mobno,dob,instrument,Gender,password) values(?, ?, ?, ?, ?, ?, ?, ?)";
     $stmt = $connect->prepare($SELECT);
     $stmt->bind_param("s", $username);
     $stmt->execute();
     $stmt->bind_result($username);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $connect->prepare($INSERT);
      $stmt->bind_param("sssissss",$Name,$username,$Address,$mobno,$dob,$instrument,$Gender,$password);
      $stmt->execute();
        $to      = $username;
        $subject = 'Welcome To MozartsConservatory ';
        $message = "Hello  " .$Name. " Welcome To MozartsConservatory  \n you have selected : " .$instrument. "for your course " ;
        $headers = 'From: mozartsconservatory@gmail.com' . "\r\n" .
                    'Reply-To: mozartsconservatory.000webhost.com' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();
            mail($to, $subject, $message, $headers);
      echo "<script>alert('Successfully Registered!');window.location.href='login.html';</script>";
     } else {
      echo "Someone already registered using this email";
     }
     $stmt->close();
     $connect->close();
    }
?>