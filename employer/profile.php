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
  <title>Employer Profile</title>

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
    }

    .page-header h1 {
      font-size: 34px;
      font-weight: 800;
      margin-bottom: 8px;
    }

    .page-header p {
      margin: 0;
      opacity: 0.95;
      font-size: 16px;
    }

    .profile-card {
      background: #ffffff;
      border-radius: 24px;
      padding: 28px;
      box-shadow: 0 12px 35px rgba(80, 143, 233, 0.12);
      border: 1px solid #dbeafe;
    }

    .profile-top {
      display: flex;
      align-items: center;
      gap: 18px;
      margin-bottom: 24px;
      padding-bottom: 22px;
      border-bottom: 1px solid #e5eefc;
    }

    .profile-avatar {
      width: 72px;
      height: 72px;
      border-radius: 22px;
      background: linear-gradient(135deg, rgb(80, 143, 233), #4f7fe5);
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 30px;
      font-weight: 800;
      box-shadow: 0 12px 28px rgba(80, 143, 233, 0.26);
    }

    .profile-top h4 {
      margin: 0;
      font-weight: 800;
      color: #1f2937;
    }

    .profile-top span {
      color: #64748b;
      font-weight: 500;
    }

    .table {
      margin-bottom: 0;
    }

    .table th {
      width: 260px;
      background: #f0f6ff;
      color: #1f2937;
      border: none;
      padding: 16px 18px;
      font-weight: 800;
      vertical-align: middle;
    }

    .table td {
      border: none;
      border-bottom: 1px solid #edf3ff;
      padding: 16px 18px;
      color: #374151;
      font-weight: 500;
      vertical-align: middle;
    }

    .table tr:last-child td,
    .table tr:last-child th {
      border-bottom: none;
    }

    .edit-btn {
      background: linear-gradient(135deg, rgb(80, 143, 233), #4f7fe5);
      border: none;
      color: white !important;
      border-radius: 14px;
      padding: 11px 22px;
      font-weight: 800;
      text-decoration: none !important;
      box-shadow: 0 12px 25px rgba(80, 143, 233, 0.28);
      transition: 0.25s;
    }

    .edit-btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 16px 35px rgba(80, 143, 233, 0.38);
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

      .profile-top {
        flex-direction: column;
        text-align: center;
      }

      .table th {
        width: 150px;
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
            <a class="nav-link active" href="profile.php">
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

      <div class="page-header">
        <h1>Your Details</h1>
        <p>View and update your employer profile information.</p>
      </div>

      <?php
        $id = $_SESSION['id'];
        include 'connection/db.php';

        $sql = "SELECT * FROM employer_reg WHERE Employer_Id=$id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
      ?>

      <div class="profile-card">
        <div class="profile-top">
          <div class="profile-avatar">
            <?php echo strtoupper(substr($row['CompanyName'], 0, 1)); ?>
          </div>
          <div>
            <h4><?php echo $row['CompanyName']; ?></h4>
            <span><?php echo $row['Email']; ?></span>
          </div>
        </div>

        <table class="table table-striped">
          <tbody>
            <tr>
              <th scope="row">Company ID</th>
              <td><?php echo $row['Employer_Id']; ?></td>
            </tr>
            <tr>
              <th scope="row">Company Name</th>
              <td><?php echo $row['CompanyName']; ?></td>
            </tr>
            <tr>
              <th scope="row">Contact Person</th>
              <td><?php echo $row['ContactPerson']; ?></td>
            </tr>
            <tr>
              <th scope="row">Address</th>
              <td><?php echo $row['Address']; ?></td>
            </tr>
            <tr>
              <th scope="row">City</th>
              <td><?php echo $row['City']; ?></td>
            </tr>
            <tr>
              <th scope="row">Email</th>
              <td><?php echo $row['Email']; ?></td>
            </tr>
            <tr>
              <th scope="row">Mobile</th>
              <td><?php echo $row['Mobile']; ?></td>
            </tr>
            <tr>
              <th scope="row">Area of Work</th>
              <td><?php echo $row['Area_Work']; ?></td>
            </tr>
            <tr>
              <th scope="row">User Name</th>
              <td><?php echo $row['UserName']; ?></td>
            </tr>
          </tbody>
        </table>

        <div class="d-flex justify-content-end mt-4">
          <a href="EditProfile.php?EmployerId=<?php echo $row['Employer_Id']; ?>" class="edit-btn">Edit Profile</a>
        </div>
      </div>

      <?php
        mysqli_close($conn);
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