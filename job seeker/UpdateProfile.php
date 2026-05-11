<?php
session_start();

if (!isset($_SESSION['uname'])) {
  header('location:registration.php');
}

include 'connection/db.php';

if (isset($_POST['button'])) {
  $ID = $_POST['txtId'];
  $Name = $_POST['txtName'];
  $Address = $_POST['txtAddress'];
  $City = $_POST['txtCity'];
  $Email = $_POST['txtEmail'];
  $Mobile = $_POST['txtMobile'];
  $Qualification = $_POST['txtQual'];
  $Gender = $_POST['txtGender'];
  $Age = $_POST['txtAge'];
  $BirthDate = $_POST['txtBirthDate'];
  $Experience = $_POST['txtExperience'];
  $UserName = $_POST['txtUserName'];
  $Password = $_POST['txtPassword'];
  $Resume = $_POST['oldResume'];

  if (isset($_FILES['txtFile']) && $_FILES['txtFile']['name'] != "") {
    $Resume = $_FILES['txtFile']['name'];
    $tempName = $_FILES['txtFile']['tmp_name'];
    move_uploaded_file($tempName, "upload/" . $Resume);
  }

  $sql = "UPDATE jobSeeker_reg SET 
          JobSeekerName = '$Name',
          Address = '$Address',
          City = '$City',
          Email = '$Email',
          Mobile = '$Mobile',
          Qualification = '$Qualification',
          Gender = '$Gender',
          BirthDate = '$BirthDate',
          age = '$Age',
          Experience = '$Experience',
          Resume = '$Resume',
          UserName = '$UserName',
          Password = '$Password'
          WHERE JobSeekId = '$ID'";

  if (mysqli_query($conn, $sql)) {
    $_SESSION['uname'] = $UserName;
    mysqli_close($conn);
    echo '<script type="text/javascript">alert("Profile Updated Successfully");window.location="profile.php";</script>';
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}
?>