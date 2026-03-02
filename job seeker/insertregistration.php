<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registration</title>
</head>

<body>
<?php
    if (isset($_POST['submit'])) {
	$Name=$_POST['txtName'];
	$Address=$_POST['txtAddress'];
	$City=$_POST['txtCity'];
	$Email=$_POST['txtEmail'];
	$Mobile=$_POST['txtMobile'];
    $Qualification=$_POST['txtquali'];
    $Experience=$_POST['txtExp'];
    $Gender=$_POST['txtGender'];
    $birthdate=$_POST['txtdate'];
    $age=$_POST['age'];
    $path1 = $_FILES["txtFile"]["name"];
	$Status="Pending";
	$UserName=$_POST['txtUserName'];
	$Password=$_POST['txtPassword'];
    $Question="What is your pet Name?";
	$Answer=$_POST['txtAnswer'];
    move_uploaded_file($_FILES["txtFile"]["tmp_name"],"./upload/"  .$_FILES["txtFile"]["name"]);
	// Establish Connection with MYSQL
	include "connection/db.php";

	// Specify the query to Insert Record
	$sql = "insert into jobseeker_reg(JobSeekerName,Address,City,Email,Mobile,Qualification, Experience,Gender,BirthDate, Age,Resume,Status,UserName,Password,Question,Answer) VALUES (
        '$Name','$Address','$City','$Email','$Mobile','$Qualification','$Experience','$Gender','$birthdate', '$age', '$path1','$Status','$UserName','$Password','$Question','$Answer'
        
        )";
	// execute query
      
	mysqli_query ($conn,$sql);
	// Close The Connection
	mysqli_close ($conn);
	
	echo '<script type="text/javascript">alert("Registration Completed Succesfully");window.location=\'registration.php\';</script>';
    }
?>
</body>
</html>
