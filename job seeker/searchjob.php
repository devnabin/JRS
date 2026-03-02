<?php
session_start();
if (isset($_SESSION['uname'])) {
} else {
  header('location:registration.php');
}
?>
<?php include 'connection/db.php' ?>
<?php
if (!function_exists("GetSQLValueString")) {
  function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
  {

    // chat gpt
    $theValue = stripslashes($theValue);

    // our old code
    // $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

    //  $theValue = function_exists("mysql_real_escape_string") ? mysqli_real_escape_string($theValue) : mysqli_escape_string($theValue);
    //
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

$currentPage = $_SERVER["PHP_SELF"];





$query_Recordset1 = "SELECT MinQualification FROM job_master";
$Recordset1 = mysqli_query($conn, $query_Recordset1) or die(mysqli_error());
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);


$query_Recordset3 = "SELECT job_master.JobId, job_master.CompanyName, job_master.JobTitle, application_master.Status, application_master.JobSeekId, application_master.Description FROM application_master, job_master WHERE application_master.JobId=job_master.JobId";
$Recordset3 = mysqli_query($conn, $query_Recordset3) or die(mysqli_error());
$row_Recordset3 = mysqli_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysqli_num_rows($Recordset3);


$query_Recordset4 = "SELECT distinct CompanyName FROM job_master";
$Recordset4 = mysqli_query($conn, $query_Recordset4) or die(mysqli_error());
$row_Recordset4 = mysqli_fetch_assoc($Recordset4);
$totalRows_Recordset4 = mysqli_num_rows($Recordset4);


$query_Recordset5 = "SELECT distinct JobTitle FROM job_master";
$Recordset5 = mysqli_query($conn, $query_Recordset5) or die(mysqli_error());
$row_Recordset5 = mysqli_fetch_assoc($Recordset5);
$totalRows_Recordset5 = mysqli_num_rows($Recordset5);

$colname_Recordset2 = "-1";
if (isset($_POST['cmbQual'])) {
  $colname_Recordset2 = $_POST['cmbQual'];
}
$colname2_Recordset2 = "-1";
if (isset($_POST['cmbCompany'])) {
  $colname2_Recordset2 = $_POST['cmbCompany'];
}
$colname3_Recordset2 = "-1";
if (isset($_POST['cmbArea'])) {
  $colname3_Recordset2 = $_POST['cmbArea'];
}

$query_Recordset2 = sprintf("SELECT * FROM job_master WHERE MinQualification = %s and CompanyName=%s and JobTitle=%s", GetSQLValueString($colname_Recordset2, "text"), GetSQLValueString($colname2_Recordset2, "text"), GetSQLValueString($colname3_Recordset2, "text"));
$Recordset2 = mysqli_query($conn, $query_Recordset2) or die(mysqli_error());
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);

$queryString_Recordset2 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (
      stristr($param, "pageNum_Recordset2") == false &&
      stristr($param, "totalRows_Recordset2") == false
    ) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset2 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset2 = sprintf("&totalRows_Recordset2=%d%s", $totalRows_Recordset2, $queryString_Recordset2);
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
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">JobSeeker Page</a>
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
              <a class="nav-link" href="education.php">
                <span data-feather="layers"></span>
                Education
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="searchjob.php">
                <span data-feather="search"></span>
                Search Job
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="relevant.php">
                <span data-feather="search"></span>
                Relevant Job
              </a>
            </li>
            <!-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Saved reports</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
              </a>
            </h6> -->
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="walking.php">
                  <span data-feather="file-text"></span>
                  Walking Interview
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="feedback.php">
                  <span data-feather="message-circle"></span>
                  Feedback
                </a>
              </li>
            </ul>
        </div>
      </nav>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2" style="text-transform:uppercase;">Search Your Jobs</h1>
        </div>
        <form id="form1" method="post" action="searchjob.php">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><strong>Select Qualification:</strong></td>
              <td><label>
                  <select name="cmbQual" id="cmbQual">
                    <?php
                    do {
                    ?>
                      <option value="<?php echo $row_Recordset1['MinQualification'] ?>"><?php echo $row_Recordset1['MinQualification'] ?></option>
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
              <td><label></label></td>
            </tr>
            <tr>
              <td><strong>Select Compnay Name:</strong></td>
              <td><label>
                  <select name="cmbCompany" id="cmbCompany">
                    <?php
                    do {
                    ?>
                      <option value="<?php echo $row_Recordset4['CompanyName'] ?>"><?php echo $row_Recordset4['CompanyName'] ?></option>
                    <?php
                    } while ($row_Recordset4 = mysqli_fetch_assoc($Recordset4));
                    $rows = mysqli_num_rows($Recordset4);
                    if ($rows > 0) {
                      mysqli_data_seek($Recordset4, 0);
                      $row_Recordset4 = mysqli_fetch_assoc($Recordset4);
                    }
                    ?>
                  </select>
                </label></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><strong>Select Area of Work:</strong></td>
              <td><label>
                  <select name="cmbArea" id="cmbArea">
                    <?php
                    do {
                    ?>
                      <option value="<?php echo $row_Recordset5['JobTitle'] ?>"><?php echo $row_Recordset5['JobTitle'] ?></option>
                    <?php
                    } while ($row_Recordset5 = mysqli_fetch_assoc($Recordset5));
                    $rows = mysqli_num_rows($Recordset5);
                    if ($rows > 0) {
                      mysqli_data_seek($Recordset5, 0);
                      $row_Recordset5 = mysqli_fetch_assoc($Recordset5);
                    }
                    ?>
                  </select>
                </label></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><input type="submit" name="button" id="button" value="Search" /></td>
              <td>&nbsp;</td>
            </tr>
          </table>
        </form>
        <table width="100%" border="1px" cellspacing="0" cellpadding="0">
          <tr>
            <td width="100%">&nbsp;

              <?php
              if ($totalRows_Recordset2 != 0) {
                do { ?>
                  <table width="100%" border="1px" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><strong>JobId</strong></td>
                      <td><strong><?php echo $row_Recordset2['JobId']; ?></strong></td>
                    </tr>
                    <tr>
                      <td><strong>CompanyName</strong></td>
                      <td><strong><?php echo $row_Recordset2['CompanyName']; ?></strong></td>
                    </tr>
                    <tr>
                      <td><strong>JobTitle</strong></td>
                      <td><strong><?php echo $row_Recordset2['JobTitle']; ?></strong></td>
                    </tr>
                    <tr>
                      <td><strong>Vacancy</strong></td>
                      <td><strong><?php echo $row_Recordset2['Vacancy']; ?></strong></td>
                    </tr>
                    <tr>
                      <td><strong>MinQualification</strong></td>
                      <td><strong><?php echo $row_Recordset2['MinQualification']; ?></strong></td>
                    </tr>
                    <tr>
                      <td><strong>Description</strong></td>
                      <td><strong><?php echo $row_Recordset2['Description']; ?></strong></td>

                    <tr>
                      <td>&nbsp;</td>
                      <td><a href="Apply.php?JobId=<?php echo $row_Recordset2['JobId']; ?>"><strong>Apply For Job</strong></a></td>
                    </tr>
                  </table>
                <?php } while ($row_Recordset2 = mysqli_fetch_assoc($Recordset2));

                ?>
        </table>
      <?php
              }
      ?></td>
      </tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td bgcolor="#006699" style="color:#fff"><strong>Status of Job</strong></td>
        </tr>
        <tr>
          <td>
            <table width="100%" border="1" cellpadding="1" cellspacing="2" bordercolor="#006699">
              <tr style="color:#fff">
                <th height="32" bgcolor="#006699" class="style3">
                  <div align="left" class="style9 style5 style2"><strong>Company Name</strong></div>
                </th>
                <th bgcolor="#006699" class="style3">
                  <div align="left" class="style9 style5 style2"><strong>Job Title</strong></div>
                </th>
                <th bgcolor="#006699" class="style3">
                  <div align="left" class="style9 style5 style2"><strong>Status</strong></div>
                </th>
                <th bgcolor="#006699" class="style3">
                  <div align="left" class="style9 style5 style2"><strong>Description</strong></div>
                </th>
              </tr>
              <?php
              // Establish Connection with Database
              include 'connection/db.php';

              // Specify the query to execute
              $sql = "SELECT job_master.JobId, job_master.CompanyName, job_master.JobTitle, application_master.Status, application_master.JobSeekId, application_master.Description
FROM application_master, job_master
WHERE application_master.JobId=job_master.JobId and application_master.JobSeekId='" . $_SESSION['userid'] . "'";
              // Execute query
              $result = mysqli_query($conn, $sql);
              // Loop through each records 
              while ($row = mysqli_fetch_array($result)) {
                $CompanyName = $row['CompanyName'];
                $JobTitle = $row['JobTitle'];
                $Status = $row['Status'];
                $Description = $row['Description'];
              ?>
                <tr>
                  <td class="style3">
                    <div align="left" class="style9 style5"><strong><?php echo $CompanyName; ?></strong></div>
                  </td>
                  <td class="style3">
                    <div align="left" class="style9 style5"><strong><?php echo $JobTitle; ?></strong></div>
                  </td>
                  <td class="style3">
                    <div align="left" class="style9 style5"><strong><?php echo $Status; ?></strong></div>
                  </td>
                  <td class="style3">
                    <div align="left" class="style9 style5"><strong><?php echo $Description; ?></strong></div>
                  </td>
                </tr>
              <?php
              }
              // Retrieve Number of records returned
              $records = mysqli_num_rows($result);
              ?>
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