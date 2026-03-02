<?php
session_start();
?>

<?php
include 'connection/db.php';
if(isset($_POST['sub']))
{
$username=$_POST['txtUserName'];
$pass=$_POST['pass'];
$query="select * from employer_reg where UserName='$username' and Status='Confirm' ";
$search=mysqli_query($conn, $query);
$num=mysqli_num_rows($search);
if($num)
{
$searchres=mysqli_fetch_assoc($search);
$dbpass=$searchres['Password'];
if($pass===$dbpass)
{
   $id=$searchres['Employer_Id']; 
    $_SESSION['id']=$id;
    $_SESSION['Company']=$searchres['CompanyName']; 
    $_SESSION['name']=$username;
   
  header('location:index.php');

}
else
{
    echo "<script>alert('incorrect password');</script>";
  header('location:registration.php');

}
}

else
{
    echo "<script>alert('user do not exist');</script>";

}
}

?>
