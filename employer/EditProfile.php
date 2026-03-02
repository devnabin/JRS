<?php
session_start();
if (!isset($_SESSION['name'])) {
  header('location:registration.php');
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

  <title>Employer Dashboard</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- Custom styles for this template -->
  <link href="./css/dashboard.css" rel="stylesheet">


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>

<body>
  <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Employer Page</a>
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="logout.php">Sign out</a>
      </li>
    </ul>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="index.php">
                <span data-feather="home"></span>
                Dashboard <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="profile.php">
                <span data-feather="users"></span>
                Profile
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="managejob.php">
                <span data-feather="users"></span>
                Manage Job
              </a>
            </li>
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Saved reports</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="walking.php">
                  <span data-feather="file-text"></span>
                  Walking Interview
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="application.php">
                  <span data-feather="file-plus"></span>
                  Application
                </a>
              </li>
            </ul>
        </div>
      </nav>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2" style="text-transform:uppercase;">Edit Profile </h1>
        </div>
        <?php
        $ID = $_GET['EmployerId'];
        // Establish Connection with Database
        include 'connection/db.php';

        // Specify the query to execute
        $sql = "select * from employer_reg where Employer_Id =$ID  ";
        // Execute query
        $result = mysqli_query($conn, $sql);
        // Loop through each records 
        $row = mysqli_fetch_array($result)
        ?>
        <form method="post" action="UpdateProfile.php" class="bg-dark-subtle p-5">
          <div class="form-group">
            <label for="txtId">Company ID:</label>
            <input name="txtId" type="text" id="txtId" class="form-control" value="<?php echo $row['Employer_Id']; ?>" />
            <span class="textfieldRequiredMsg">A value is required.</span>
          </div>
          <div class="form-group">
            <label for="txtName">Company Name:</label>
            <input name="txtName" type="text" id="txtName" class="form-control" value="<?php echo $row['CompanyName']; ?>" />
            <span class="textfieldRequiredMsg">A value is required.</span>
          </div>
          <div class="form-group">
            <label for="txtContact">Contact Person:</label>
            <input name="txtContact" type="text" id="txtContact" class="form-control" value="<?php echo $row['ContactPerson']; ?>" />
            <span class="textfieldRequiredMsg">A value is required.</span>
          </div>
          <div class="form-group">
            <label for="txtAddress">Address:</label>
            <textarea name="txtAddress" id="txtAddress" class="form-control" cols="35" rows="3"><?php echo $row['Address']; ?></textarea>
            <span class="textareaRequiredMsg">A value is required.</span>
          </div>
          <div class="form-group">
            <label for="txtCity">City:</label>
            <input name="txtCity" type="text" id="txtCity" class="form-control" value="<?php echo $row['City']; ?>" />
            <span class="textfieldRequiredMsg">A value is required.</span>
          </div>
          <div class="form-group">
            <label for="txtEmail">Email:</label>
            <input name="txtEmail" type="text" id="txtEmail" class="form-control" value="<?php echo $row['Email']; ?>" />
            <span class="textfieldRequiredMsg">A value is required.</span>
          </div>
          <div class="form-group">
            <label for="txtMobile">Mobile:</label>
            <input name="txtMobile" type="text" id="txtMobile" class="form-control" value="<?php echo $row['Mobile']; ?>" />
            <span class="textfieldRequiredMsg">A value is required.</span>
          </div>
          <div class="form-group">
            <label for="txtArea">Area of Work:</label>
            <input name="txtArea" type="text" id="txtArea" class="form-control" value="<?php echo $row['Area_Work']; ?>" />
            <span class="textfieldRequiredMsg">A value is required.</span>
          </div>
          <div class="form-group">
            <label for="txtUser">User Name:</label>
            <input name="txtUser" type="text" id="txtUser" class="form-control" value="<?php echo $row['UserName']; ?>" />
            <span class="textfieldRequiredMsg">A value is required.</span>
          </div>
          <div class="form-group">
            <label for="txtPassword">Password:</label>
            <input name="txtPassword" type="password" id="txtPassword" class="form-control" value="<?php echo $row['Password']; ?>" />
            <span class="textfieldRequiredMsg">A value is required.</span>
          </div>
          <div class="text-center">
            <input type="submit" class="btn btn-primary" name="button" id="button" value="Update" />
          </div>

      </main>
    </div>
  </div>

  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script>
    window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>');
  </script>
  <script src="../../assets/js/vendor/popper.min.js"></script>
  <script src="../../dist/js/bootstrap.min.js"></script>

  <!-- Icons -->
  <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
  <script>
    feather.replace();
  </script>

</body>

</html>