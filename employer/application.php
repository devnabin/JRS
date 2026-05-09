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
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Employer Applications</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link href="./css/dashboard.css" rel="stylesheet">

  <style>
    body {
      margin: 0;
      background: #f4f8ff;
      font-family: "Segoe UI", Arial, sans-serif;
      color: #1f2937;
    }

    .navbar {
      height: 70px;
      background: #ffffff !important;
      box-shadow: 0 4px 20px rgba(80, 143, 233, 0.14);
      padding: 0 !important;
      z-index: 1000;
    }

    .navbar-brand {
      width: 260px;
      height: 70px;
      background: linear-gradient(135deg, rgb(80, 143, 233), #4f7fe5);
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
      color: rgb(80, 143, 233) !important;
      border: 1px solid rgb(80, 143, 233);
      border-radius: 12px;
      padding: 8px 18px !important;
      font-weight: 700;
      margin-right: 20px;
      transition: 0.25s;
    }

    .navbar .nav-link:hover {
      background: rgb(80, 143, 233);
      color: #ffffff !important;
    }

    .sidebar {
      width: 260px;
      min-height: calc(100vh - 70px);
      background: #10223f !important;
      padding: 25px 15px;
      position: fixed;
      left: 0;
      top: 70px;
    }

    .sidebar .nav-link {
      color: #dbeafe !important;
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
      background: linear-gradient(135deg, rgb(80, 143, 233), #4f7fe5);
      color: #ffffff !important;
      transform: translateX(5px);
      box-shadow: 0 10px 24px rgba(80, 143, 233, 0.28);
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
      background: linear-gradient(135deg, rgb(80, 143, 233), #4f7fe5);
      color: white;
      border-radius: 28px;
      padding: 35px;
      margin-bottom: 28px;
      box-shadow: 0 18px 45px rgba(80, 143, 233, 0.28);
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
      box-shadow: 0 12px 35px rgba(80, 143, 233, 0.12);
      border: 1px solid #dbeafe;
      margin-bottom: 28px;
    }

    .section-title {
      font-size: 22px;
      font-weight: 800;
      color: #1f2937;
      margin-bottom: 22px;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .section-title span {
      width: 12px;
      height: 32px;
      background: rgb(80, 143, 233);
      border-radius: 20px;
      display: inline-block;
    }

    .filter-form {
      display: flex;
      align-items: end;
      gap: 16px;
      flex-wrap: wrap;
    }

    .form-group-custom {
      flex: 1;
      min-width: 260px;
    }

    .form-group-custom label {
      font-weight: 700;
      color: #1f2937;
      margin-bottom: 8px;
      display: block;
    }

    select,
    input[type="submit"] {
      min-height: 48px;
      border-radius: 14px;
      font-weight: 600;
    }

    select {
      width: 100%;
      border: 1px solid #dbeafe;
      background: #f8fbff;
      color: #1f2937;
      padding: 0 14px;
      outline: none;
      transition: 0.25s;
    }

    select:focus {
      border-color: rgb(80, 143, 233);
      box-shadow: 0 0 0 4px rgba(80, 143, 233, 0.14);
      background: #ffffff;
    }

    input[type="submit"] {
      background: linear-gradient(135deg, rgb(80, 143, 233), #4f7fe5);
      border: none;
      color: white;
      padding: 0 30px;
      font-weight: 800;
      box-shadow: 0 12px 25px rgba(80, 143, 233, 0.28);
      transition: 0.25s;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      transform: translateY(-3px);
      box-shadow: 0 16px 35px rgba(80, 143, 233, 0.38);
    }

    .table {
      margin-bottom: 0;
    }

    .table thead th {
      background: #10223f;
      color: #ffffff;
      border: none;
      padding: 15px;
      font-weight: 800;
      vertical-align: middle;
    }

    .table tbody td {
      padding: 15px;
      vertical-align: middle;
      border-color: #edf3ff;
      color: #374151;
      font-weight: 500;
    }

    .table tbody tr:hover {
      background: #f4f8ff;
    }

    .status-badge {
      background: #e8f1ff;
      color: rgb(80, 143, 233);
      padding: 7px 12px;
      border-radius: 30px;
      font-weight: 800;
      font-size: 13px;
      display: inline-block;
    }

    .view-btn {
      background: #e8f1ff;
      color: rgb(80, 143, 233) !important;
      border-radius: 10px;
      padding: 8px 16px;
      text-decoration: none !important;
      font-weight: 800;
      display: inline-block;
      transition: 0.25s;
    }

    .view-btn:hover {
      background: rgb(80, 143, 233);
      color: #ffffff !important;
    }

    .records-box {
      background: #f0f6ff;
      border-radius: 14px;
      padding: 14px 18px;
      font-weight: 800;
      color: #1f2937;
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

      .filter-form {
        display: block;
      }

      input[type="submit"] {
        width: 100%;
        margin-top: 15px;
      }
    }
  </style>
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
            <a class="nav-link" href="managejob.php">
              <span data-feather="briefcase"></span>
              Manage Job
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="walking.php">
              <span data-feather="file-text"></span>
              Walking Interview
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" href="application.php">
              <span data-feather="file-plus"></span>
              Application
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

      <div class="page-header">
        <h1>View Application</h1>
        <p>Select a job title to view applications submitted by job seekers.</p>
      </div>

      <div class="content-card">
        <h3 class="section-title"><span></span>Search Applications</h3>

        <form id="form1" method="post" action="application.php" class="filter-form">
          <div class="form-group-custom">
            <label for="cmbTitle">Select Job Title</label>
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
          </div>

          <div>
            <input type="submit" name="button" id="button" value="View" />
          </div>
        </form>
      </div>

      <?php
      if (isset($_POST['cmbTitle'])) {
        $Title = $_POST['cmbTitle'];
      ?>

        <div class="content-card">
          <h3 class="section-title"><span></span>Application List</h3>

          <div class="table-responsive">
            <table class="table table-striped align-middle">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>City</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th>View & Send</th>
                </tr>
              </thead>

              <tbody>
                <?php
                include 'connection/db.php';

                $sql = "SELECT application_master.ApplicationId, application_master.Status, 

jobseeker_reg.JobSeekerName, jobseeker_reg.City, jobseeker_reg.Email, jobseeker_reg.JobSeekId,

application_master.JobId
FROM application_master, jobseeker_reg
WHERE jobseeker_reg.JobSeekId=application_master.JobSeekId and application_master.JobId='" . $Title . "'";

                $result = mysqli_query($conn, $sql);
                $stat = 1;

                while ($row = mysqli_fetch_array($result)) {
                  $Id = $row['ApplicationId'];
                  $Status = $row['Status'];
                  $JobSeekerName = $row['JobSeekerName'];
                  $City = $row['City'];
                  $Email = $row['Email'];
                  $JobSeekId = $row['JobSeekId'];
                ?>
                  <tr>
                    <td><strong><?php echo $Id; ?></strong></td>
                    <td><strong><?php echo $JobSeekerName; ?></strong></td>
                    <td><?php echo $City; ?></td>
                    <td><?php echo $Email; ?></td>
                    <td><span class="status-badge"><?php echo $Status; ?></span></td>
                    <td>
                      <a class="view-btn" href="ViewBiodata.php?JobSeekId=<?php echo $JobSeekId; ?>&AppId=<?php echo $Id; ?>&JobId=<?php echo $Title; ?>&Status=<?php echo $Status; ?>">
                        View
                      </a>
                    </td>
                  </tr>
                <?php
                }

                $records = mysqli_num_rows($result);
                ?>
              </tbody>
            </table>
          </div>

          <div class="records-box">
            Total <?php echo $records; ?> Records
          </div>
        </div>

      <?php
        mysqli_close($conn);
      }
      ?>

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