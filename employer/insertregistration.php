<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registration</title>
</head>

<body>
<?php
    if (isset($_POST['submit'])) {
	$CompanyName=$_POST['txtName'];
	$ContactPerson=$_POST['txtPerson'];
	$Address=$_POST['txtAddress'];
	$City=$_POST['txtCity'];
	$Email=$_POST['txtEmail'];
	$Mobile=$_POST['txtMobile'];
	$Area=$_POST['txtAreaWork'];
	$Status="Pending";
	$UserName=$_POST['txtUserName'];
	$Password=$_POST['txtPassword'];
    $Question="What is your pet Name?";
	$Answer=$_POST['txtAnswer'];
	// Establish Connection with MYSQL
	include "connection/db.php";

	// Specify the query to Insert Record
	$sql = "insert into employer_reg(CompanyName,ContactPerson,Address,City,Email,Mobile,Area_Work,Status,UserName,Password,Question,Answer)
    values('$CompanyName','$ContactPerson','$Address','$City','$Email','$Mobile','$Area','$Status', '$UserName','$Password','$Question','$Answer')";
	// execute query
      
	mysqli_query ($conn,$sql);
	// Close The Connection
	mysqli_close ($conn);
	
	echo '<script type="text/javascript">alert("Registration Completed Succesfully");window.location=\'registration.php\';</script>';
    }
?>
</body>
</html>
