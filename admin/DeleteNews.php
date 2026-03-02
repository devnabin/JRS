<?php

	$Id=$_GET['NewsId'];
	// Establish Connection with MYSQL

    include "connection/db.php";
	// Specify the query to Insert Record
	$sql = "delete from news_master where NewsId=$Id";
	// execute query
	mysqli_query ($conn,$sql);
	// Close The Connection
	mysqli_close ($conn);
	echo '<script>alert("News Deleted Succesfully");window.location=\'admin_news.php\';</script>';

?>