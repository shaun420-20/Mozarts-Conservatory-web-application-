<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>feedback</title>

</head>
<body>
<?php
session_start();
$Name=$_POST['Name'];
$Email=$_POST['Email'];
$Message=$_POST['Message'];
$servername = "localhost";
$musername = "id7295435_mozartsconservatory";
$dpassword = "lijinjoy";
$database = "id7295435_mozarts";
$conn = new mysqli($servername, $musername, $dpassword, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
	$INSERT = "INSERT INTO contact (Name,Email,Message) VALUES(?, ?, ?)";
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sss",$Name, $Email, $Message);
      $stmt->execute();
     echo "<script>alert('your feedback/message is successfully recorded');
     window.location.href='contactus.html';</script>";
     } 
     $stmt->close();
     $conn->close();
mysqli_close($conn);
?>
</body>
</html>
