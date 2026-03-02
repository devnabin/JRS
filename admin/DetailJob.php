<?php
session_start();
if(!isset($_SESSION['email']))
{
	header('location:admin_login.php');
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

    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="./css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">ADMIN PAGE</a>
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
                <a class="nav-link active" href="#">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="employer.php">
                  <span data-feather="users"></span>
                  Employers
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="jobseeker.php">
                  <span data-feather="users"></span>
                  Job Seeker
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="managejobseeker.php">
                  <span data-feather="users"></span>
                   Manage Job Seeker
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="manageemployer.php">
                  <span data-feather="users"></span>
                  Manage Employer
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
                <a class="nav-link" href="feedback.php">
                  <span data-feather="file-text"></span>
                  FEEDBACK
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="admin_news.php">
                  <span data-feather="file-plus"></span>
                  PUBLISH NEWS
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Job Seeker Detail</h1>
          </div>
            
          <?php
 $ID = $_GET['JobId'];
// Establish Connection with Database
include 'connection/db.php';
// Specify the query to execute
$sql = "select * from jobseeker_reg where JobSeekId =$ID  ";
// Execute query
$result = mysqli_query($conn,$sql);
// Loop through each records
$row = mysqli_fetch_array($result)
?>
<table width="100%" border="1" cellspacing="2" cellpadding="2">
    <tr>
        <td>Id:</td>
        <td><?php echo $row['JobSeekId']; ?></td>
    </tr>
    <tr>
        <td>Name:</td>
        <td><?php echo $row['JobSeekerName']; ?></td>
    </tr>
    <tr>
        <td>Address:</td>
        <td><?php echo $row['Address']; ?></td>
    </tr>
    <tr>
        <td>City:</td>
        <td><?php echo $row['City']; ?></td>
    </tr>
    <tr>
        <td>Email:</td>
        <td><?php echo $row['Email']; ?></td>
    </tr>
    <tr>
        <td>Mobile:</td>
        <td><?php echo $row['Mobile']; ?></td>
    </tr>
    <tr>
        <td>Highest Qualification:</td>
        <td><?php echo $row['Qualification']; ?></td>
    </tr>
    <tr>
        <td>Gender:</td>
        <td><?php echo $row['Gender']; ?></td>
    </tr>
    <tr>
        <td>Birth Date:</td>
        <td><?php echo $row['BirthDate']; ?></td>
    </tr>
    <tr>
        <td>Resume:</td>
        <td><a href="../job seeker/upload/<?php echo $row['Resume']; ?>" target="_blank">View</a>
        </td>
    </tr>
    <tr>
        <td><strong><a href="ApprovJob.php?JobId=<?php echo $row['JobSeekId']; ?>">Approv Job Seeker</a></strong></td>
        <td></td>
    </tr>
</table>
                <?php
                mysqli_close($conn);
                ?>

          
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>');</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace();
    </script>

  </body>
</html>
