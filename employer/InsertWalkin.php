<?php
if (!isset($_SESSION)) {
  session_start();
}

$txtTitle = $_POST['txtTitle'];
$txtTotal = intval($_POST['txtTotal']);
$cmbQual = $_POST['cmbQual'];
$txtDesc = $_POST['txtDesc'];
$txtDate = $_POST['txtDate'];
$txtTime = $_POST['txtTime'];
$Name = $_SESSION['Company'];

include 'connection/db.php';

$idQuery = "SELECT MAX(WalkInId) AS MaxId FROM walkin_master";
$idResult = mysqli_query($conn, $idQuery);
$idRow = mysqli_fetch_array($idResult);

if ($idRow['MaxId'] == NULL) {
  $WalkInId = 1;
} else {
  $WalkInId = $idRow['MaxId'] + 1;
}

$sql = "INSERT INTO walkin_master 
(WalkInId, CompanyName, JobTitle, Vacancy, MinQualification, Description, InterviewDate, InterviewTime) 
VALUES 
('$WalkInId', '$Name', '$txtTitle', '$txtTotal', '$cmbQual', '$txtDesc', '$txtDate', '$txtTime')";

if (mysqli_query($conn, $sql)) {
  mysqli_close($conn);
  echo '<script type="text/javascript">alert("Walking Inserted Successfully");window.location="walking.php";</script>';
} else {
  echo "Error: " . mysqli_error($conn);
}
?>