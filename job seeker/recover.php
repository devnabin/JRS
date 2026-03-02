<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Recovery</title>
</head>

<body>
<?php
session_start();
if(isset($_POST['submit'])){
$UserEmail=$_POST['email'];
$Answer=$_POST['txtAnswer'];
include 'connection/db.php';
$sql = "select * from jobseeker_reg  where Email='$UserEmail' and  Answer='$Answer' ";

$result = mysqli_query($conn,$sql);
$records = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);
echo $records;
if ($records==0)
{
echo '<script type="text/javascript">alert("Wrong Information Provided");window.location=\'forget.php\';</script>';
}
else
{
$_SESSION['userid']=$row['JobSeekId'];
$_SESSION['jname']=$row['JobSeekerName'];
$_SESSION['uname']=$row['Username'];
header('location:./index.php');
} 
mysqli_close($conn);
}

?>
</body>
</html>
