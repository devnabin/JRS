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
  <title>Employer Dashboard</title>

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

    .welcome-card {
      background: linear-gradient(135deg, rgb(80, 143, 233), #4f7fe5);
      color: white;
      border-radius: 28px;
      padding: 35px;
      margin-bottom: 30px;
      box-shadow: 0 18px 45px rgba(80, 143, 233, 0.28);
    }

    .welcome-card h1 {
      font-size: 34px;
      font-weight: 800;
      margin-bottom: 8px;
      text-transform: uppercase;
    }

    .welcome-card p {
      margin: 0;
      opacity: 0.95;
      font-size: 16px;
    }

    .dashboard-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 24px;
    }

    .dashboard-card {
      background: #ffffff;
      border-radius: 24px;
      padding: 28px 20px;
      text-align: center;
      box-shadow: 0 12px 35px rgba(80, 143, 233, 0.12);
      border: 1px solid #dbeafe;
      transition: 0.25s;
      text-decoration: none !important;
      color: #1f2937;
      min-height: 180px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .dashboard-card:hover {
      transform: translateY(-7px);
      box-shadow: 0 18px 45px rgba(80, 143, 233, 0.24);
      color: rgb(80, 143, 233);
    }

    .dashboard-icon {
      width: 78px;
      height: 78px;
      border-radius: 22px;
      background: #e8f1ff;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 18px;
    }

    .dashboard-icon img {
      width: 52px;
      height: 52px;
      object-fit: contain;
    }

    .dashboard-card strong {
      font-size: 17px;
      font-weight: 800;
    }

    @media (max-width: 992px) {
      .dashboard-grid {
        grid-template-columns: repeat(2, 1fr);
      }
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

      .dashboard-grid {
        grid-template-columns: 1fr;
      }

      .welcome-card h1 {
        font-size: 26px;
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
            <a class="nav-link active" href="index.php">
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
            <a class="nav-link" href="application.php">
              <span data-feather="file-plus"></span>
              Application
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

      <div class="welcome-card">
        <h1>Welcome <?php echo $_SESSION['name']; ?></h1>
        <p>Manage your employer profile, jobs, interviews, and applications from one place.</p>
      </div>

      <div class="dashboard-grid">

        <a href="index.php" class="dashboard-card">
          <div>
            <div class="dashboard-icon">
              <img src="img/Home.png" alt="">
            </div>
            <strong>Home</strong>
          </div>
        </a>

        <a href="profile.php" class="dashboard-card">
          <div>
            <div class="dashboard-icon">
              <img src="img/Profile.png" alt="">
            </div>
            <strong>Profile</strong>
          </div>
        </a>

        <a href="managejob.php" class="dashboard-card">
          <div>
            <div class="dashboard-icon">
              <img src="img/Search.png" alt="">
            </div>
            <strong>Manage Job</strong>
          </div>
        </a>

        <a href="walking.php" class="dashboard-card">
          <div>
            <div class="dashboard-icon">
              <img src="img/Interview.png" alt="">
            </div>
            <strong>Walking Interview</strong>
          </div>
        </a>

        <a href="application.php" class="dashboard-card">
          <div>
            <div class="dashboard-icon">
              <img src="img/Feedback.png" alt="">
            </div>
            <strong>Application</strong>
          </div>
        </a>

        <a href="logout.php" class="dashboard-card">
          <div>
            <div class="dashboard-icon">
              <img src="img/Log.png" alt="">
            </div>
            <strong>Logout</strong>
          </div>
        </a>

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