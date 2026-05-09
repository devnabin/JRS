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
    $theValue = stripslashes($theValue);

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
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>JobSeeker Search Job</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link href="./css/dashboard.css" rel="stylesheet">

  <style>
    body {
      margin: 0;
      background: #f0fdfa;
      font-family: "Segoe UI", Arial, sans-serif;
      color: #134e4a;
    }

    .navbar {
      height: 70px;
      background: #ffffff !important;
      box-shadow: 0 4px 20px rgba(20, 184, 166, 0.14);
      padding: 0 !important;
      z-index: 1000;
    }

    .navbar-brand {
      width: 260px;
      height: 70px;
      background: linear-gradient(135deg, rgb(20, 184, 166), #0d9488);
      color: #ffffff !important;
      display: flex;
      align-items: center;
      padding-left: 25px !important;
      font-size: 21px;
      font-weight: 800;
      letter-spacing: 0.5px;
      margin: 0 !important;
    }

    .navbar .nav-link {
      color: rgb(20, 184, 166) !important;
      border: 1px solid rgb(20, 184, 166);
      border-radius: 12px;
      padding: 8px 18px !important;
      font-weight: 700;
      margin-right: 20px;
      transition: 0.25s;
    }

    .navbar .nav-link:hover {
      background: rgb(20, 184, 166);
      color: #ffffff !important;
    }

    .sidebar {
      width: 260px;
      min-height: calc(100vh - 70px);
      background: #134e4a !important;
      padding: 25px 15px;
      position: fixed;
      left: 0;
      top: 70px;
    }

    .sidebar .nav-link {
      color: #ccfbf1 !important;
      border-radius: 14px;
      padding: 13px 15px;
      margin-bottom: 8px;
      font-weight: 500;
      display: flex;
      align-items: center;
      gap: 12px;
      transition: 0.25s;
    }

    .sidebar .nav-link:hover,
    .sidebar .nav-link.active {
      background: linear-gradient(135deg, rgb(20, 184, 166), #0d9488);
      color: #ffffff !important;
      transform: translateX(5px);
      box-shadow: 0 10px 24px rgba(20, 184, 166, 0.28);
    }

    .sidebar .nav-link svg {
      width: 19px;
      height: 19px;
    }

    main {
      margin-left: 260px;
      padding: 35px !important;
      max-width: calc(100% - 260px);
    }

    .page-header {
      background: linear-gradient(135deg, rgb(20, 184, 166), #0d9488);
      color: white;
      border-radius: 28px;
      padding: 35px;
      margin-bottom: 28px;
      box-shadow: 0 18px 45px rgba(20, 184, 166, 0.28);
      border-bottom: none !important;
    }

    .page-header h1 {
      font-size: 34px;
      font-weight: 800;
      margin-bottom: 8px;
      text-transform: uppercase;
    }

    .page-header p {
      margin: 0;
      opacity: 0.95;
      font-size: 16px;
    }

    .content-card {
      background: #ffffff;
      border-radius: 24px;
      padding: 30px;
      box-shadow: 0 12px 35px rgba(20, 184, 166, 0.12);
      border: 1px solid #ccfbf1;
      margin-bottom: 28px;
    }

    .section-title {
      font-size: 22px;
      font-weight: 800;
      color: #134e4a;
      margin-bottom: 22px;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .section-title span {
      width: 12px;
      height: 32px;
      background: rgb(20, 184, 166);
      border-radius: 20px;
      display: inline-block;
    }

    .form-group label {
      font-weight: 700;
      color: #134e4a;
      margin-bottom: 8px;
    }

    select {
      width: 100%;
      min-height: 48px;
      border-radius: 14px;
      border: 1px solid #ccfbf1;
      background: #f8fffd;
      color: #134e4a;
      font-weight: 500;
      padding: 8px 14px;
      outline: none;
      transition: 0.25s;
    }

    select:focus {
      border-color: rgb(20, 184, 166);
      box-shadow: 0 0 0 4px rgba(20, 184, 166, 0.14);
      background: #ffffff;
    }

    input[type="submit"] {
      background: linear-gradient(135deg, rgb(20, 184, 166), #0d9488);
      border: none;
      color: white;
      border-radius: 14px;
      padding: 12px 34px;
      font-weight: 800;
      box-shadow: 0 12px 25px rgba(20, 184, 166, 0.28);
      transition: 0.25s;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      transform: translateY(-3px);
      box-shadow: 0 16px 35px rgba(20, 184, 166, 0.38);
      color: white;
    }

    .job-result-card {
      background: #ffffff;
      border-radius: 24px;
      padding: 26px;
      box-shadow: 0 12px 35px rgba(20, 184, 166, 0.12);
      border: 1px solid #ccfbf1;
      margin-bottom: 22px;
      transition: 0.25s;
    }

    .job-result-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 18px 45px rgba(20, 184, 166, 0.22);
    }

    .job-result-card table {
      margin-bottom: 0;
    }

    .job-result-card td {
      border: none;
      border-bottom: 1px solid #e4fbf6;
      padding: 14px 16px;
      vertical-align: middle;
      color: #134e4a;
    }

    .job-result-card tr:last-child td {
      border-bottom: none;
    }

    .job-result-card td:first-child {
      width: 220px;
      background: #f0fdfa;
      font-weight: 800;
    }

    .apply-btn {
      background: linear-gradient(135deg, rgb(20, 184, 166), #0d9488);
      color: #ffffff !important;
      border-radius: 12px;
      padding: 10px 18px;
      text-decoration: none !important;
      font-weight: 800;
      display: inline-block;
      box-shadow: 0 10px 22px rgba(20, 184, 166, 0.25);
      transition: 0.25s;
    }

    .apply-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 14px 30px rgba(20, 184, 166, 0.34);
    }

    .table {
      margin-bottom: 0;
    }

    .table thead th {
      background: #134e4a;
      color: #ffffff;
      border: none;
      padding: 15px;
      font-weight: 800;
      vertical-align: middle;
    }

    .table tbody td {
      padding: 15px;
      vertical-align: middle;
      border-color: #e4fbf6;
      color: #134e4a;
      font-weight: 500;
    }

    .table tbody tr:hover {
      background: #f0fdfa;
    }

    .status-badge {
      background: #ccfbf1;
      color: #0f766e;
      padding: 7px 13px;
      border-radius: 30px;
      font-weight: 800;
      font-size: 13px;
      display: inline-block;
    }

    .records-box {
      background: #ccfbf1;
      border-radius: 14px;
      padding: 14px 18px;
      font-weight: 800;
      color: #134e4a;
      margin-top: 15px;
    }

    @media (max-width: 768px) {
      .navbar {
        height: auto;
        flex-direction: column;
        align-items: stretch;
      }

      .navbar-brand {
        width: 100%;
      }

      .navbar .nav-link {
        margin: 12px;
        text-align: center;
      }

      .sidebar {
        position: static;
        width: 100%;
        min-height: auto;
      }

      main {
        margin-left: 0;
        max-width: 100%;
        padding: 20px !important;
      }

      .page-header h1 {
        font-size: 26px;
      }

      .content-card {
        padding: 22px;
      }

      .job-result-card td:first-child {
        width: 140px;
      }
    }
  </style>
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
            <a class="nav-link" href="index.php">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="profile.php">
              <span data-feather="user"></span>
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
            <a class="nav-link active" href="searchjob.php">
              <span data-feather="search"></span>
              Search Job
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="relevant.php">
              <span data-feather="target"></span>
              Relevant Job
            </a>
          </li>

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

      <div class="page-header">
        <h1>Search Your Jobs</h1>
        <p>Filter jobs by qualification, company, and area of work.</p>
      </div>

      <div class="content-card">
        <h3 class="section-title"><span></span>Search Job</h3>

        <form id="form1" method="post" action="searchjob.php">
          <div class="row">
            <div class="form-group col-md-4">
              <label for="cmbQual">Select Qualification</label>
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
            </div>

            <div class="form-group col-md-4">
              <label for="cmbCompany">Select Company Name</label>
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
            </div>

            <div class="form-group col-md-4">
              <label for="cmbArea">Select Area of Work</label>
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
            </div>
          </div>

          <div class="text-center mt-3">
            <input type="submit" name="button" id="button" value="Search">
          </div>
        </form>
      </div>

      <?php
      if ($totalRows_Recordset2 != 0) {
        do {
      ?>
          <div class="job-result-card">
            <table class="table">
              <tr>
                <td><strong>Job ID</strong></td>
                <td><strong><?php echo $row_Recordset2['JobId']; ?></strong></td>
              </tr>

              <tr>
                <td><strong>Company Name</strong></td>
                <td><strong><?php echo $row_Recordset2['CompanyName']; ?></strong></td>
              </tr>

              <tr>
                <td><strong>Job Title</strong></td>
                <td><strong><?php echo $row_Recordset2['JobTitle']; ?></strong></td>
              </tr>

              <tr>
                <td><strong>Vacancy</strong></td>
                <td><strong><?php echo $row_Recordset2['Vacancy']; ?></strong></td>
              </tr>

              <tr>
                <td><strong>Minimum Qualification</strong></td>
                <td><strong><?php echo $row_Recordset2['MinQualification']; ?></strong></td>
              </tr>

              <tr>
                <td><strong>Description</strong></td>
                <td><strong><?php echo $row_Recordset2['Description']; ?></strong></td>
              </tr>

              <tr>
                <td></td>
                <td>
                  <a href="Apply.php?JobId=<?php echo $row_Recordset2['JobId']; ?>" class="apply-btn">
                    Apply For Job
                  </a>
                </td>
              </tr>
            </table>
          </div>
      <?php
        } while ($row_Recordset2 = mysqli_fetch_assoc($Recordset2));
      }
      ?>

      <div class="content-card">
        <h3 class="section-title"><span></span>Status of Job</h3>

        <div class="table-responsive">
          <table class="table table-striped align-middle">
            <thead>
              <tr>
                <th>Company Name</th>
                <th>Job Title</th>
                <th>Status</th>
                <th>Description</th>
              </tr>
            </thead>

            <tbody>
              <?php
              include 'connection/db.php';

              $sql = "SELECT job_master.JobId, job_master.CompanyName, job_master.JobTitle, application_master.Status, application_master.JobSeekId, application_master.Description
FROM application_master, job_master
WHERE application_master.JobId=job_master.JobId and application_master.JobSeekId='" . $_SESSION['userid'] . "'";

              $result = mysqli_query($conn, $sql);

              while ($row = mysqli_fetch_array($result)) {
                $CompanyName = $row['CompanyName'];
                $JobTitle = $row['JobTitle'];
                $Status = $row['Status'];
                $Description = $row['Description'];
              ?>
                <tr>
                  <td><strong><?php echo $CompanyName; ?></strong></td>
                  <td><?php echo $JobTitle; ?></td>
                  <td><span class="status-badge"><?php echo $Status; ?></span></td>
                  <td><?php echo $Description; ?></td>
                </tr>
              <?php
              }

              $records = mysqli_num_rows($result);
              mysqli_close($conn);
              ?>
            </tbody>
          </table>
        </div>

        <div class="records-box">
          Total <?php echo $records; ?> Records
        </div>
      </div>

    </main>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkN" crossorigin="anonymous"></script>
<script>
  window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>');
</script>
<script src="../../assets/js/vendor/popper.min.js"></script>
<script src="../../dist/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
  feather.replace();
</script>

</body>

</html>