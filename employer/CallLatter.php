<?php
session_start();
if(!isset( $_SESSION['name']))
{
	header('location:registration.php');
}
?>
<?php
$JobId=$_GET['JobId'];
$JobSeekId=$_GET['JobSeekId'];
$AppId=$_GET['AppId'];
$Status="Call Latter Send";
$Description=$_POST['txtDesc'];
// Establish Connection with MYSQL
include 'connection/db.php';
// Select Database
//mysql_select_db("job", $con);
// Specify the query to Update Record
$sql = "Update application_master set Status='".$Status."' ,Description='".$Description."' where ApplicationId=".$AppId." and JobId='".$JobId."' and JobSeekId='".$JobSeekId."'";
// Execute query
mysqli_query($conn,$sql);
// Close The Connection
mysqli_close($conn);
echo '<script type="text/javascript">alert("Call Latter Send Succesfully");window.location=\'application.php\';</script>';
?>