<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

  <title>Admin_login</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- Custom styles for this template -->
  <link href="./css/admin_login.css" rel="stylesheet">
  <script src="./js/admin_login.js"></script>



  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>

<body class="text-center">
  <form class="form-signin border border-primary-subtl bg-body-secondary" id="admin_login" name="admin_login" method="Post">
    <div class="pb-4 fs-4 text">Job Station Admin Login</div>
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <label for="email" class="sr-only">Email address</label>
    <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required autofocus>
    <label for="pass" class="sr-only">Password</label>
    <input type="password" id="pass" name="pass" class="form-control" placeholder="Password" required>
    <input type="submit" name="submit" id="submit" value="Sign in" class="btn btn-lg btn-primary btn-block" type="submit">
    <br>
    <br>
    <a href="../index.php">Return to Home</a>
    <br>
    <p class="mt-5 mb-3 text-muted">&copy; 2023-2024</p>
  </form>
</body>

</html>
<?php
include "connection/db.php";
if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = $_POST['pass'];
  $selectquery = "select * from admin_login where admin_email='$email' ";
  $query = mysqli_query($conn, $selectquery);
  $data = mysqli_fetch_array($query);
  if ($password === $data['admin_pass']) {
    $_SESSION['email'] = $email;
    $_SESSION['uname'] = $data['admin_username'];
    echo "<script> alert('login successful');</script>";
    header('location:admin_dashboard.php');
  } else {
    echo "<script>alert('Wrong Information, Please Try Again');</script>";
  }
}

?>