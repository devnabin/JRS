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
    $txtname=$_POST['txtCompany'];
	$txtTitle=$_POST['txtTitle'];
	$txtage=$_POST['txtage'];
	$txtTotal=$_POST['txtTotal'];
	$cmbQual=$_POST['cmbQual'];
	$req=$_POST['txtreq'];
	$txtDesc=$_POST['txtDesc'];
    $salary=$_POST['txtOther'];
   
	
	// Establish Connection with MYSQL
	include 'connection/db.php';

	// Specify the query to Insert Record
	$sql = "insert into job_master (CompanyName,JobTitle, Age,Vacancy,MinQualification, Requirement, Description,ExpectedSalary) values('$txtname', '$txtTitle','$txtage',$txtTotal,'$cmbQual','$req', '$txtDesc','$salary')";
	// execute query
	mysqli_query ($conn,$sql);
	// Close The Connection
	mysqli_close ($conn);
	echo '<script type="text/javascript">alert("Job Inserted Succesfully");window.location=\'manageJob.php\';</script>';

?>
</body>
</html>
