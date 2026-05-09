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
  <title>JRS Admin | Job Seekers</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
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

    .breadcrumb {
      background: transparent;
      padding: 0;
      margin-bottom: 15px;
    }

    .breadcrumb a {
      text-decoration: none;
      font-weight: 600;
    }

    table.dataTable {
      border-collapse: collapse !important;
      width: 100% !important;
    }

    table.dataTable thead th {
      background: #111827;
      color: white;
      border: none;
      padding: 14px;
    }

    table.dataTable tbody td {
      padding: 14px;
      vertical-align: middle;
    }

    .status-badge {
      background: #dcfce7;
      color: #166534;
      padding: 6px 12px;
      border-radius: 20px;
      font-size: 13px;
      font-weight: 700;
    }

    .deactivate-btn {
      background: #fee2e2;
      color: #991b1b;
      padding: 7px 12px;
      border-radius: 10px;
      text-decoration: none;
      font-weight: 700;
      font-size: 13px;
    }

    .deactivate-btn:hover {
      background: #dc2626;
      color: white;
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
      <a class="nav-link active" href="jobseeker.php">
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
      <a class="nav-link" href="feedback.php">
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

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
      <li class="breadcrumb-item active">Job Seekers</li>
    </ol>
  </nav>

  <div class="page-header">
    <h1 class="fw-bold mb-2">Job Seekers</h1>
    <p class="mb-0">View confirmed job seekers and manage their account status.</p>
  </div>

  <div class="content-card">
    <div class="table-responsive">
      <table id="example" class="table table-striped align-middle" style="width:100%">
        <thead>
          <tr>
            <th>Name</th>
            <th>Address</th>
            <th>City</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody>
          <?php
          include 'connection/db.php';

          $sql = "select * from jobseeker_reg where Status='Confirm'";
          $result = mysqli_query($conn, $sql);

          while ($row = mysqli_fetch_array($result)) {
            $Id = $row['JobSeekId'];
            $Name = $row['JobSeekerName'];
            $Address = $row['Address'];
            $City = $row['City'];
            $email = $row['Email'];
            $mobile = $row['Mobile'];
            $status = $row['Status'];
          ?>
            <tr>
              <td><?php echo $Name; ?></td>
              <td><?php echo $Address; ?></td>
              <td><?php echo $City; ?></td>
              <td><?php echo $email; ?></td>
              <td><?php echo $mobile; ?></td>
              <td><span class="status-badge"><?php echo $status; ?></span></td>
              <td>
                <a class="deactivate-btn" href="deactivatejob.php?JobId=<?php echo $row['JobSeekId']; ?>">
                  Deactivate
                </a>
              </td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

</main>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

<script>
  feather.replace();

  $(document).ready(function() {
    $('#example').DataTable();
  });
</script>

</body>
</html>