<?php
session_start();

if (!isset($_SESSION['email'])) {
  header('location:admin_login.php');
}
?>

<?php
include "connection/db.php";

if (isset($_POST['submit'])) {
  $News = $_POST['txtNews'];
  $Date = $_POST['txtDate'];

  $idQuery = "SELECT MAX(NewsId) AS MaxId FROM news_master";
  $idResult = mysqli_query($conn, $idQuery);
  $idRow = mysqli_fetch_array($idResult);

  if ($idRow['MaxId'] == NULL) {
    $NewsId = 1;
  } else {
    $NewsId = $idRow['MaxId'] + 1;
  }

  $sql = "INSERT INTO news_master (NewsId, News, NewsDate) 
          VALUES ('$NewsId', '$News', '$Date')";

  if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    echo '<script type="text/javascript">alert("New News Inserted Successfully");window.location=\'admin_news.php\';</script>';
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}
?>