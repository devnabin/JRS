<?php
session_start();
if(!isset($_SESSION['email']))
{
	header('location:admin_login.php');
}
?>
<?php
include "connection/db.php";
if (isset($_POST['submit'])) {
    $News=$_POST['txtNews'];
	$Date=$_POST['txtDate'];
    $sql = "insert into News_Master	(News,NewsDate)values('$News', '$Date')";
	// execute query
	mysqli_query ($conn,$sql);
	// Close The Connection
	mysqli_close ($conn);
	echo '<script type="text/javascript">alert("New News Inserted Succesfully");window.location=\'admin_news.php\';</script>';


}