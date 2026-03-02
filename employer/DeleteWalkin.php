<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

	$Id=$_GET['WalkinId'];
	// Establish Connection with MYSQL
    include 'connection/db.php';
	// Specify the query to Insert Record
	$sql = "delete from walkin_master where WalkInId='".$Id."'";
	// execute query
	mysqli_query ($conn,$sql);
	// Close The Connection
	mysqli_close ($conn);
	echo '<script type="text/javascript">alert("Walkin Deleted Succesfully");window.location=\'walking.php\';</script>';

?>
</body>
</html>
