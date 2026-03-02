<?php
session_start();
if (!isset($_SESSION['name'])) {
  header('location:registration.php');
}
?>
<?php include 'connection/db.php' ?>
<?php
if (!function_exists("GetSQLValueString")) {
  function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
  {

    if (function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc()) {
      $theValue = stripslashes($theValue);
    }

    // $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

    //  $theValue = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string($theValue) : mysqli_escape_string($theValue);

    switch ($theType) {
      case "text":
        $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
        break;
      case "long":
      case "int":
        $theValue = ($theValue != "") ? intval($theValue) : "NULL";
        break;
      case "double":
        $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
        break;
      case "date":
        $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
        break;
      case "defined":
        $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
        break;
    }
    return $theValue;
  }
}

$colname_Recordset1 = "-1";
if (isset($_SESSION['Company'])) {
  $colname_Recordset1 = $_SESSION['Company'];
}

$query_Recordset1 = sprintf("SELECT JobId, JobTitle FROM job_master WHERE CompanyName = %s", GetSQLValueString($colname_Recordset1, "text"));
$Recordset1 = mysqli_query($conn, $query_Recordset1) or die(mysqli_error());
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);


$query_Recordset2 = "SELECT application_master.ApplicationId, application_master.Status, jobseeker_reg.JobSeekerName, jobseeker_reg.City, jobseeker_reg.Email, application_master.JobId FROM application_master, jobseeker_reg WHERE jobseeker_reg.JobSeekId=application_master.JobSeekId";
$Recordset2 = mysqli_query($conn, $query_Recordset2) or die(mysqli_error());
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);
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
          <h1 class="h2" style="text-transform:uppercase;">View Application </h1>
        </div>
        <form id="form1" method="post" action="application.php">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><strong>Select Job Title:</strong></td>
              <td><label>
                  <select name="cmbTitle" id="cmbTitle">
                    <?php
                    do {
                    ?>
                      <option value="<?php echo $row_Recordset1['JobId'] ?>"><?php echo $row_Recordset1['JobTitle'] ?></option>
                    <?php
                    } while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1));
                    $rows = mysqli_num_rows($Recordset1);

                    if ($rows > 0) {
                      mysqli_data_seek($Recordset1, 0);
                      $row_Recordset1 = mysqli_fetch_assoc($Recordset1);
                    }
                    ?>
                  </select>
                </label></td>
              <td><label>
                  <input type="submit" name="button" id="button" value="View " />
                </label></td>
            </tr>
          </table>
        </form>
        <?php
        if (isset($_POST['cmbTitle'])) {
          $Title = $_POST['cmbTitle'];

        ?>
          <table width="100%" border="1" bordercolor="#1CB5F1">
            <tr style="color:#fff">
              <th height="32" bgcolor="#1CB5F1" class="style3">
                <div align="left" class="style9 style5"><strong>Id</strong></div>
              </th>
              <th bgcolor="#1CB5F1" class="style3">
                <div align="left" class="style9 style5"><strong>Name</strong></div>
              </th>
              <th bgcolor="#1CB5F1" class="style3">
                <div align="left" class="style9 style5"><strong>City</strong></div>
              </th>
              <th bgcolor="#1CB5F1" class="style3">
                <div align="left" class="style9 style5"><strong>Email</strong></div>
              </th>
              <th bgcolor="#1CB5F1" class="style3">
                <div align="left" class="style9 style5"><strong>Status</strong></div>
              </th>
              <th bgcolor="#1CB5F1" class="style3">
                <div align="left" class="style9 style5"><strong>View & Send</strong></div>
              </th>
            </tr>
            <?php
            // Establish Connection with Database
            include 'connection/db.php';

            // Specify the query to execute
            $sql = "SELECT application_master.ApplicationId, application_master.Status, 

jobseeker_reg.JobSeekerName, jobseeker_reg.City, jobseeker_reg.Email, jobseeker_reg.JobSeekId,

application_master.JobId
FROM application_master, jobseeker_reg
WHERE jobseeker_reg.JobSeekId=application_master.JobSeekId and application_master.JobId='" . $Title . "'";

            // Execute query
            $result = mysqli_query($conn, $sql);
            $stat = 1;
            // Loop through each records 
            while ($row = mysqli_fetch_array($result)) {
              $Id = $row['ApplicationId'];
              $Status = $row['Status'];
              $JobSeekerName = $row['JobSeekerName'];
              $City = $row['City'];
              $Email = $row['Email'];
              $JobSeekId = $row['JobSeekId'];
            ?>
              <tr>
                <td class="style3">
                  <div align="left" class="style9 style5"><strong><?php echo $Id; ?></strong></div>
                </td>
                <td class="style3">
                  <div align="left" class="style9 style5"><strong><?php echo $JobSeekerName; ?></strong></div>
                </td>
                <td class="style3">
                  <div align="left" class="style9 style5"><strong><?php echo $City; ?></strong></div>
                </td>
                <td class="style3">
                  <div align="left" class="style9 style5"><strong><?php echo $Email; ?></strong></div>
                </td>
                <td class="style3">
                  <div align="left" class="style9 style5"><strong><?php echo $Status; ?></strong></div>
                </td>
                <td class="style3">
                  <div align="left" class="style9 style5"><strong></strong><a href="ViewBiodata.php?JobSeekId=<?php echo $JobSeekId; ?>&AppId=<?php echo $Id; ?>&JobId=<?php echo $Title; ?>&Status=<?php echo $Status; ?>">View</a></div>
                </td>
              </tr>
            <?php
            }
            // Retrieve Number of records returned
            $records = mysqli_num_rows($result);
            ?>
          </table>
        <?php

          // Close the connection
          mysqli_close($conn);
        }
        ?>
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