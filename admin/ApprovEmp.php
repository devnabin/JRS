<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$Id = $_GET['EmpId'];
// Establish Connection with MYSQL
include 'connection/db.php';
// Select Database

// Specify the query to Update Record
$sql = "Update employer_reg set Status='Confirm' where Employer_Id=$Id";
// Execute query
mysqli_query($conn,$sql);
// Close The Connection
mysqli_close($conn);
echo '<script>alert("Employer Request Confirmed");window.location=\'manageemployer.php\';</script>';
?>
</body>
</html>