<?php
session_start();
if (!isset($_SESSION['uname'])) {
  header('location:registration.php');
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>JobSeeker Walking Interview</title>

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
      white-space: nowrap;
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

    .id-badge {
      background: #ccfbf1;
      color: #0f766e;
      padding: 7px 12px;
      border-radius: 30px;
      font-weight: 800;
      display: inline-block;
      min-width: 42px;
      text-align: center;
    }

    .date-badge,
    .time-badge {
      background: #f0fdfa;
      color: #0f766e;
      padding: 7px 12px;
      border-radius: 12px;
      font-weight: 700;
      display: inline-block;
      white-space: nowrap;
      border: 1px solid #ccfbf1;
    }

    .description-cell {
      max-width: 320px;
      line-height: 1.6;
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
            <a class="nav-link" href="searchjob.php">
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
            <a class="nav-link active" href="walking.php">
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
        <h1>Walking Interview</h1>
        <p>View available walk-in interview opportunities posted by employers.</p>
      </div>

      <div class="content-card">
        <h3 class="section-title"><span></span>Available Walking Interviews</h3>

        <div class="table-responsive">
          <table class="table table-striped align-middle">
            <thead>
              <tr>
                <th>#</th>
                <th>Company Name</th>
                <th>Job Title</th>
                <th>Vacancy</th>
                <th>Qualification</th>
                <th>Description</th>
                <th>Date</th>
                <th>Time</th>
              </tr>
            </thead>

            <tbody>
              <?php
              include 'connection/db.php';

              $sql = "select * from walkin_master";
              $result = mysqli_query($conn, $sql);

              while ($row = mysqli_fetch_array($result)) {
                $Id = $row['WalkInId'];
                $CompanyName = $row['CompanyName'];
                $JobTitle = $row['JobTitle'];
                $Vacancy = $row['Vacancy'];
                $MinQualification = $row['MinQualification'];
                $Description = $row['Description'];
                $InterviewDate = $row['InterviewDate'];
                $InterviewTime = $row['InterviewTime'];
              ?>
                <tr>
                  <td><span class="id-badge"><?php echo $Id; ?></span></td>
                  <td><strong><?php echo $CompanyName; ?></strong></td>
                  <td><?php echo $JobTitle; ?></td>
                  <td><?php echo $Vacancy; ?></td>
                  <td><?php echo $MinQualification; ?></td>
                  <td class="description-cell"><?php echo $Description; ?></td>
                  <td><span class="date-badge"><?php echo $InterviewDate; ?></span></td>
                  <td><span class="time-badge"><?php echo $InterviewTime; ?></span></td>
                </tr>
              <?php
              }

              mysqli_close($conn);
              ?>
            </tbody>
          </table>
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