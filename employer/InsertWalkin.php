<?php
if (!isset($_SESSION)) 
{
  session_start();
  
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

	$txtTitle=$_POST['txtTitle'];
	$txtTotal=$_POST['txtTotal'];
	$cmbQual=$_POST['cmbQual'];
	$txtDesc=$_POST['txtDesc'];
	$txtDate=$_POST['txtDate'];
	$txtTime=$_POST['txtTime'];
	$Name=$_SESSION['Company'];
	// Establish Connection with MYSQL
    include 'connection/db.php';
	// Specify the query to Insert Record
	$sql = "insert into walkin_master (CompanyName,JobTitle,Vacancy,MinQualification,Description,InterviewDate,InterviewTime) values('".$Name."','".$txtTitle."','".$txtTotal."','".$cmbQual."','".$txtDesc."','".$txtDate."','".$txtTime."')";
	// execute query
	mysqli_query ($conn,$sql);
	// Close The Connection
	mysqli_close ($conn);
	echo '<script type="text/javascript">alert("Walking Inserted Succesfully");window.location=\'walking.php\';</script>';

?>
</body>
</html>
