<!-- log out feature is completed -->
<?php
session_start();
session_destroy();
header('location:registration.php');
?>