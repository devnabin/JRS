<?php
session_start();
if (!isset($_SESSION['email'])) {
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
          <h1 class="h2">Verify Account</h1>
        </div>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>
              <table width="100%" border="1" bordercolor="black">
                <tr style="color:#fff">
                  <th height="32" bgcolor="black">
                    <div align="left"><strong>Id</strong></div>
                  </th>
                  <th bgcolor="black">
                    <div align="left"><strong>JobSeeker Name</strong></div>
                  </th>
                  <th bgcolor="black">
                    <div align="left"><strong>City</strong></div>
                  </th>
                  <th bgcolor="black">
                    <div align="left">Gender</div>
                  </th>
                  <th bgcolor="black">
                    <div align="left"><strong>Detail</strong></div>
                  </th>
                </tr>
                <?php
                // Establish Connection with Database
                include 'connection/db.php';
                // Specify the query to execute
                $sql = "select * from JobSeeker_Reg where Status='Pending'";
                // Execute query
                $result = mysqli_query($conn, $sql);
                // Loop through each records
                while ($row = mysqli_fetch_array($result)) {
                  $Id = $row['JobSeekId'];
                  $Name = $row['JobSeekerName'];
                  $City = $row['City'];
                  $Gender = $row['Gender'];

                ?>
                  <tr>
                    <td class="style3">
                      <div align="left" class="style9 style5">
                        <strong><?php echo $Id; ?></strong>
                      </div>
                    </td>
                    <td class="style3">
                      <div align="left" class="style9 style5">
                        <strong><?php echo $Name; ?></strong>
                      </div>
                    </td>
                    <td class="style3">
                      <div align="left" class="style9 style5">
                        <strong><?php echo $City; ?></strong>
                      </div>
                    </td>
                    <td class="style3">
                      <div align="left" class="style9 style5">
                        <strong><?php echo $Gender; ?></strong>
                      </div>
                    </td>
                    <td class="style3">
                      <div align="left" class="style9 style5"><strong><a href="DetailJob.php?JobId=<?php echo $Id; ?>">Detail</a></strong>
                      </div>
                    </td>

                  </tr>
                <?php
                }
                // Retrieve Number of records returned
                $records = mysqli_num_rows($result);
                ?>
                <tr>
                  <td colspan="4" class="style3">
                    <div align="left" class="style12"><?php echo "Total " . $records . " Records"; ?> </div>
                  </td>
                </tr>
                <?php
                // Close the connection
                mysqli_close($conn);
                ?>
              </table>
            </td>
          </tr>
        </table>
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