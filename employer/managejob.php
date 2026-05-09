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
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Employer Manage Job</title>

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

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      font-weight: 700;
      color: #1f2937;
      margin-bottom: 8px;
    }

    .form-control {
      min-height: 48px;
      border-radius: 14px;
      border: 1px solid #dbeafe;
      background: #f8fbff;
      color: #1f2937;
      font-weight: 500;
      transition: 0.25s;
    }

    .form-control:focus {
      border-color: rgb(80, 143, 233);
      box-shadow: 0 0 0 4px rgba(80, 143, 233, 0.14);
      background: #ffffff;
    }

    textarea.form-control {
      min-height: 115px;
      resize: vertical;
    }

    .text-danger {
      display: none;
      font-size: 13px;
      margin-top: 5px;
    }

    .submit-btn {
      background: linear-gradient(135deg, rgb(80, 143, 233), #4f7fe5);
      border: none;
      color: white;
      border-radius: 14px;
      padding: 12px 34px;
      font-weight: 800;
      box-shadow: 0 12px 25px rgba(80, 143, 233, 0.28);
      transition: 0.25s;
    }

    .submit-btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 16px 35px rgba(80, 143, 233, 0.38);
      color: white;
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

    .delete-btn {
      background: #fee2e2;
      color: #991b1b !important;
      border-radius: 10px;
      padding: 8px 14px;
      text-decoration: none !important;
      font-weight: 800;
      display: inline-block;
      transition: 0.25s;
    }

    .delete-btn:hover {
      background: #dc2626;
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
            <a class="nav-link active" href="managejob.php">
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
            <a class="nav-link" href="application.php">
              <span data-feather="file-plus"></span>
              Application
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4 mb-3">

      <div class="page-header">
        <h1>Post Vacancy</h1>
        <p>Create a new job vacancy and manage already posted jobs.</p>
      </div>

      <div class="content-card">
        <h3 class="section-title"><span></span>Manage Job</h3>

        <form id="form1" method="post" action="InsertJob.php">
          <div class="row">
            <div class="form-group col-md-6">
              <label for="txtCompany">Company Name</label>
              <input type="text" class="form-control" id="txtCompany" name="txtCompany" required>
              <div class="text-danger">A value is required.</div>
            </div>

            <div class="form-group col-md-6">
              <label for="txtTitle">Job Title</label>
              <input type="text" class="form-control" id="txtTitle" name="txtTitle" required>
              <div class="text-danger">A value is required.</div>
            </div>

            <div class="form-group col-md-6">
              <label for="txtage">Age Group</label>
              <input type="text" class="form-control" id="txtage" name="txtage" required>
              <div class="text-danger">A value is required.</div>
            </div>

            <div class="form-group col-md-6">
              <label for="txtTotal">Total Vacancy</label>
              <input type="number" class="form-control" id="txtTotal" name="txtTotal" required>
              <div class="text-danger">A value is required.</div>
            </div>

            <div class="form-group col-md-6">
              <label for="cmbQual">Qualification</label>
              <input type="text" class="form-control" id="cmbQual" name="cmbQual">
              <div class="text-danger">A value is required.</div>
            </div>

            <div class="form-group col-md-6">
              <label for="txtOther">Salary</label>
              <input type="text" class="form-control" id="txtOther" name="txtOther">
              <div class="text-danger">A value is required.</div>
            </div>

            <div class="form-group col-md-6">
              <label for="txtreq">Requirement</label>
              <textarea class="form-control" id="txtreq" name="txtreq" rows="3"></textarea>
              <div class="text-danger">A value is required.</div>
            </div>

            <div class="form-group col-md-6">
              <label for="txtDesc">Description</label>
              <textarea class="form-control" id="txtDesc" name="txtDesc" rows="3" required></textarea>
              <div class="text-danger">A value is required.</div>
            </div>
          </div>

          <div class="text-center mt-3">
            <button type="submit" class="btn submit-btn">Submit</button>
          </div>
        </form>
      </div>

      <div class="content-card">
        <h3 class="section-title"><span></span>Posted Job</h3>

        <div class="table-responsive">
          <table class="table table-striped align-middle">
            <thead>
              <tr>
                <th>Id</th>
                <th>Job Title</th>
                <th>Vacancy</th>
                <th>Qualification</th>
                <th>Description</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
              <?php
              include 'connection/db.php';

              $sql = "select * from job_master where CompanyName='" . $_SESSION['Company'] . "'";
              $sql3 = "select * from employer_reg where CompanyName='" . $_SESSION['Company'] . "'";
              $result3 = mysqli_query($conn, $sql3);
              $row3 = mysqli_fetch_array($result3);

              $result = mysqli_query($conn, $sql);

              while ($row = mysqli_fetch_array($result)) {
                $Id = $row['JobId'];
                $JobTitle = $row['JobTitle'];
                $Vacancy = $row['Vacancy'];
                $MinQualification = $row['MinQualification'];
                $requriement = $row['Requirement'];
                $Description = $row['Description'];
                $job_specification = "We are looking for a experienced  " . $JobTitle . " who are willing to work at our company located at located at " . $row3['Address'] . " , " . $row3['City'] . " and expand their knowledge. The candidate must be of age group " . $row['Age'] . ". They must  at least have degree of " . $MinQualification . ". Additional requirement include : " . $row['Requirement'] . ".";

                $sql1 = "select * from job_specification where jobid ='" . $Id . "'";
                $result1 = mysqli_query($conn, $sql1);
                $num = mysqli_num_rows($result1);

                if ($num == 0) {
                  $sql2 = "insert into  job_specification(  jobid, job_title, Specification) VALUES (
                       $Id, '$JobTitle','$job_specification'
                       )";
                  mysqli_query($conn, $sql2);
                }
              ?>
                <tr>
                  <td><strong><?php echo $Id; ?></strong></td>
                  <td><strong><?php echo $JobTitle; ?></strong></td>
                  <td><?php echo $Vacancy; ?></td>
                  <td><?php echo $MinQualification; ?></td>
                  <td><?php echo $Description; ?></td>
                  <td>
                    <a href="DeleteJob.php?JobId=<?php echo $Id; ?>" class="delete-btn">Delete</a>
                  </td>
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