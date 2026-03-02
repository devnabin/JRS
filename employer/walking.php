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
          <h1 class="h2" style="text-transform:uppercase;">Walking
            Interview </h1>
        </div>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td bgcolor="#1CB5F1" class="p-3" style="color:#fff"><strong>Manage Walking Interview</strong></td>
          </tr>
          <tr>
            <td>
              <form id="form1" method="post" action="InsertWalkin.php">
                <table class="table table-bordered table-striped">
                  <tr>
                    <td><strong>Job Title:</strong></td>
                    <td>
                      <div class="form-group">
                        <input type="text" name="txtTitle" id="txtTitle" class="form-control" required>
                        <span class="text-danger">A value is required.</span>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><strong>Total Vacancy:</strong></td>
                    <td>
                      <div class="form-group">
                        <input type="text" name="txtTotal" id="txtTotal" class="form-control" required>
                        <span class="text-danger">A value is required.</span>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><strong>Qualification:</strong></td>
                    <td>
                      <div class="form-group">
                        <select name="cmbQual" id="cmbQual" class="form-control" required>
                          <option value="">--Select--</option>
                          <option value="Graduate">Graduate</option>
                          <option value="Post Graduate">Post Graduate</option>
                        </select>
                        <span class="text-danger">A value is required.</span>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><strong>Description:</strong></td>
                    <td>
                      <div class="form-group">
                        <textarea name="txtDesc" id="txtDesc" cols="25" rows="3" class="form-control" required></textarea>
                        <span class="text-danger">A value is required.</span>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><strong>Interview Date:</strong></td>
                    <td>
                      <div class="form-group">
                        <input type="date" name="txtDate" id="txtDate" class="form-control" required>
                        <span class="text-danger">A value is required.</span>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><strong>Interview Time:</strong></td>
                    <td>
                      <div class="form-group">
                        <input type="time" name="txtTime" id="txtTime" class="form-control" required>
                        <span class="text-danger">A value is required.</span>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>
                      <button type="submit" name="button" id="button" class="btn btn-primary">Submit</button>
                    </td>
                  </tr>
                </table>

              </form>
            </td>
          </tr>
          <tr>
            <td bgcolor="#1CB5F1" style="color:#fff"><strong>Posted Walking </strong></td>
          </tr>
          <tr>
            <td>
              <table width="100%" border="1" bordercolor="#1CB5F1">
                <tr style="color:#fff">
                  <th height="32" bgcolor="#1CB5F1" class="style3">
                    <div align="left" class="style9 style5"><strong>Id</strong></div>
                  </th>
                  <th bgcolor="#1CB5F1" class="style3">
                    <div align="left" class="style9 style5"><strong>Job Title</strong></div>
                  </th>
                  <th bgcolor="#1CB5F1" class="style3">
                    <div align="left" class="style9 style5"><strong>Vacancy</strong></div>
                  </th>
                  <th bgcolor="#1CB5F1" class="style3">
                    <div align="left" class="style9 style5"><strong>Qualification</strong></div>
                  </th>
                  <th bgcolor="#1CB5F1" class="style3">
                    <div align="left" class="style9 style5"><strong>Description</strong></div>
                  </th>
                  <th bgcolor="#1CB5F1" class="style3">
                    <div align="left" class="style9 style5"><strong>Date</strong></div>
                  </th>
                  <th bgcolor="#1CB5F1" class="style3">
                    <div align="left" class="style9 style5"><strong>Time</strong></div>
                  </th>
                  <th bgcolor="#1CB5F1" class="style3">
                    <div align="left" class="style12">Delete</div>
                  </th>
                </tr>
                <?php
                // Establish Connection with Database
                include 'connection/db.php';

                // Specify the query to execute
                $sql = "select * from walkin_master where CompanyName='" . $_SESSION['Company'] . "'";
                // Execute query
                $result = mysqli_query($conn, $sql);
                // Loop through each records 
                while ($row = mysqli_fetch_array($result)) {
                  $Id = $row['WalkInId'];
                  $JobTitle = $row['JobTitle'];
                  $Vacancy = $row['Vacancy'];
                  $MinQualification = $row['MinQualification'];
                  $Description = $row['Description'];
                  $InterviewDate = $row['InterviewDate'];
                  $InterviewTime = $row['InterviewTime'];

                ?>
                  <tr>
                    <td class="style3">
                      <div align="left"><strong><?php echo $Id; ?></strong></div>
                    </td>
                    <td class="style3">
                      <div align="left"><strong><?php echo $JobTitle; ?></strong></div>
                    </td>
                    <td class="style3">
                      <div align="left"><strong><?php echo $Vacancy; ?></strong></div>
                    </td>
                    <td class="style3">
                      <div align="left"><strong><?php echo $MinQualification; ?></strong></div>
                    </td>
                    <td class="style3">
                      <div align="left"><strong><?php echo $Description; ?></strong></div>
                    </td>
                    <td class="style3">
                      <div align="left" class="style9 style5"><strong><?php echo $InterviewDate; ?></strong></div>
                    </td>
                    <td class="style3">
                      <div align="left" class="style9 style5"><strong><?php echo $InterviewTime; ?></strong></div>
                    </td>

                    <td class="style3">
                      <div align="left" class="style9 style5"><strong><a href="DeleteWalkin.php?WalkinId=<?php echo $Id; ?>">Delete</a></strong></div>
                    </td>
                  </tr>
                <?php
                }
                // Retrieve Number of records returned
                $records = mysqli_num_rows($result);
                ?>
                <tr>
                  <td colspan="8" class="style3">
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