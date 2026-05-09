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
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>JRS Admin | Feedback</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://unpkg.com/feather-icons"></script>

  <style>
    body {
      margin: 0;
      background: #f4f7fb;
      font-family: "Segoe UI", Arial, sans-serif;
      color: #1f2937;
    }

    .topbar {
      height: 70px;
      background: #fff;
      box-shadow: 0 4px 20px rgba(0,0,0,0.06);
      position: sticky;
      top: 0;
      z-index: 1000;
    }

    .brand-box {
      width: 260px;
      height: 70px;
      background: linear-gradient(135deg, #0d6efd, #6610f2);
      color: #fff;
      display: flex;
      align-items: center;
      padding-left: 25px;
      font-size: 22px;
      font-weight: 800;
      letter-spacing: 1px;
    }

    .logout-btn {
      border-radius: 12px;
      font-weight: 600;
    }

    .sidebar {
      width: 260px;
      min-height: calc(100vh - 70px);
      background: #111827;
      padding: 25px 15px;
      position: fixed;
      left: 0;
      top: 70px;
    }

    .sidebar .nav-link {
      color: #cbd5e1;
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
      background: linear-gradient(135deg, #0d6efd, #6610f2);
      color: #fff;
      transform: translateX(5px);
    }

    .main-content {
      margin-left: 260px;
      padding: 35px;
    }

    .page-header {
      background: linear-gradient(135deg, #0d6efd, #6610f2);
      color: white;
      border-radius: 25px;
      padding: 30px;
      box-shadow: 0 18px 45px rgba(13,110,253,0.25);
      margin-bottom: 25px;
    }

    .content-card {
      background: #fff;
      border-radius: 22px;
      padding: 25px;
      box-shadow: 0 12px 35px rgba(0,0,0,0.07);
    }

    .table thead th {
      background: #111827;
      color: white;
      border: none;
      padding: 14px;
    }

    .table tbody td {
      padding: 14px;
      vertical-align: middle;
    }

    .feedback-text {
      max-width: 520px;
      line-height: 1.5;
    }

    .records-box {
      background: #f8fafc;
      border-radius: 14px;
      padding: 14px;
      font-weight: 700;
      color: #374151;
      margin-top: 15px;
      text-align: right;
    }

    @media (max-width: 768px) {
      .brand-box {
        width: 100%;
      }

      .sidebar {
        position: static;
        width: 100%;
        min-height: auto;
      }

      .main-content {
        margin-left: 0;
        padding: 20px;
      }
    }
  </style>
</head>

<body>

<div class="topbar d-flex justify-content-between align-items-center">
  <div class="brand-box">JRS ADMIN</div>

  <div class="me-4">
    <a href="logout.php" class="btn btn-outline-danger logout-btn">Sign out</a>
  </div>
</div>

<nav class="sidebar">
  <ul class="nav flex-column">
    <li class="nav-item">
      <a class="nav-link" href="admin_dashboard.php">
        <i data-feather="home"></i> Dashboard
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="employer.php">
        <i data-feather="briefcase"></i> Employers
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="jobseeker.php">
        <i data-feather="users"></i> Job Seeker
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="managejobseeker.php">
        <i data-feather="user-check"></i> Manage Job Seeker
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="manageemployer.php">
        <i data-feather="user-plus"></i> Manage Employer
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link active" href="feedback.php">
        <i data-feather="message-square"></i> Feedback
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="admin_news.php">
        <i data-feather="file-plus"></i> Publish News
      </a>
    </li>
  </ul>
</nav>

<main class="main-content">

  <div class="page-header">
    <h1 class="fw-bold mb-2">Read Feedback</h1>
    <p class="mb-0">View feedback submitted by job seekers.</p>
  </div>

  <div class="content-card">
    <div class="table-responsive">
      <table class="table table-striped align-middle">
        <thead>
          <tr>
            <th>Id</th>
            <th>Job Seeker Name</th>
            <th>Feedback</th>
            <th>Date</th>
          </tr>
        </thead>

        <tbody>
          <?php
          include 'connection/db.php';

          $sql = "select FeedbackId,Feedback,FeedbakDate,JobSeekerName from feedback,jobseeker_reg where feedback.JobSeekId=jobseeker_reg.JobSeekId";
          $result = mysqli_query($conn, $sql);

          while ($row = mysqli_fetch_array($result)) {
            $Id = $row['FeedbackId'];
            $Name = $row['JobSeekerName'];
            $Feedback = $row['Feedback'];
            $FeedbakDate = $row['FeedbakDate'];
          ?>
            <tr>
              <td><strong><?php echo $Id; ?></strong></td>
              <td><?php echo $Name; ?></td>
              <td class="feedback-text"><?php echo $Feedback; ?></td>
              <td><?php echo $FeedbakDate; ?></td>
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

<script>
  feather.replace();
</script>

</body>
</html>