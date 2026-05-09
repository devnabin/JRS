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
  <title>JRS Admin Dashboard</title>

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
      background: #ffffff;
      box-shadow: 0 4px 20px rgba(0,0,0,0.06);
      position: sticky;
      top: 0;
      z-index: 1000;
    }

    .brand-box {
      width: 260px;
      background: linear-gradient(135deg, #0d6efd, #6610f2);
      color: white;
      height: 70px;
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

    .welcome-card {
      background: linear-gradient(135deg, #0d6efd, #6610f2);
      color: white;
      border-radius: 25px;
      padding: 35px;
      box-shadow: 0 18px 45px rgba(13,110,253,0.25);
    }

    .info-card {
      background: white;
      border-radius: 22px;
      padding: 25px;
      box-shadow: 0 12px 35px rgba(0,0,0,0.07);
      transition: 0.25s;
      height: 100%;
    }

    .info-card:hover {
      transform: translateY(-5px);
    }

    .icon-circle {
      width: 48px;
      height: 48px;
      border-radius: 14px;
      background: #eef4ff;
      color: #0d6efd;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 15px;
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
      <a href="logout.php" class="btn btn-outline-danger logout-btn">
        Sign out
      </a>
    </div>
  </div>

  <nav class="sidebar">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link active" href="#">
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
    <div class="welcome-card mb-4">
      <h1 class="fw-bold mb-2">Welcome Admin</h1>
      <p class="mb-0">
        Manage users, employers, job seekers, feedback, and news from your JRS admin dashboard.
      </p>
    </div>

    <div class="row g-4">
      <div class="col-md-4">
        <div class="info-card">
          <div class="icon-circle">
            <i data-feather="users"></i>
          </div>
          <h5 class="fw-bold">Manage Users</h5>
          <p class="text-muted mb-0">
            View and manage job seekers and employers registered in the system.
          </p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="info-card">
          <div class="icon-circle">
            <i data-feather="message-circle"></i>
          </div>
          <h5 class="fw-bold">Review Feedback</h5>
          <p class="text-muted mb-0">
            Check feedback submitted by users and improve the platform experience.
          </p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="info-card">
          <div class="icon-circle">
            <i data-feather="edit-3"></i>
          </div>
          <h5 class="fw-bold">Publish News</h5>
          <p class="text-muted mb-0">
            Add and publish important updates or announcements for users.
          </p>
        </div>
      </div>
    </div>
  </main>

  <script>
    feather.replace();
  </script>

</body>
</html>