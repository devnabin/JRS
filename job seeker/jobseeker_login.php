<?php
session_start();
?>

<?php
include 'connection/db.php';
if(isset($_POST['sub']))
{
$username=$_POST['txtUserName'];
$pass=$_POST['pass'];
$query="select * from jobseeker_reg where UserName='$username' and Status='Confirm' ";
$search=mysqli_query($conn, $query);
$num=mysqli_num_rows($search);
if($num)
{
$searchres=mysqli_fetch_assoc($search);
$dbpass=$searchres['Password'];
if($pass===$dbpass)
{
    $_SESSION['uname']=$username;
    $_SESSION['jname']=$searchres['JobSeekerName'];
    $_SESSION['userid']=$searchres['JobSeekId'];
   
  header('location:index.php');

}
else
{
    echo "<script>alert('incorrect password');</script>";
  header('location:./registration.php');

}
}

else
{
    echo "<script>alert('user do not exist');</script>";

}
}

?>
