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
  <title>Edit JobSeeker Profile</title>

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

    .form-card {
      background: #ffffff;
      border-radius: 24px;
      padding: 30px;
      box-shadow: 0 12px 35px rgba(20, 184, 166, 0.12);
      border: 1px solid #ccfbf1;
    }

    .form-group label {
      font-weight: 700;
      color: #134e4a;
      margin-bottom: 8px;
    }

    .form-control {
      min-height: 48px;
      border-radius: 14px;
      border: 1px solid #ccfbf1;
      background: #f8fffd;
      color: #134e4a;
      font-weight: 500;
      transition: 0.25s;
    }

    .form-control:focus {
      border-color: rgb(20, 184, 166);
      box-shadow: 0 0 0 4px rgba(20, 184, 166, 0.14);
      background: #ffffff;
    }

    textarea.form-control {
      min-height: 130px;
      resize: vertical;
    }

    .update-btn {
      background: linear-gradient(135deg, rgb(20, 184, 166), #0d9488);
      border: none;
      color: white;
      border-radius: 14px;
      padding: 12px 34px;
      font-weight: 800;
      box-shadow: 0 12px 25px rgba(20, 184, 166, 0.28);
      transition: 0.25s;
    }

    .update-btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 16px 35px rgba(20, 184, 166, 0.38);
      color: white;
    }

    .back-btn {
      background: #ccfbf1;
      color: #0f766e !important;
      border-radius: 14px;
      padding: 12px 24px;
      font-weight: 800;
      text-decoration: none !important;
      display: inline-block;
      margin-right: 10px;
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

      .form-card {
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
              Dashboard
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" href="profile.php">
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
        <h1>Edit Profile</h1>
        <p>Update your job seeker profile information.</p>
      </div>

      <?php
      $ID = $_SESSION['userid'];
      include 'connection/db.php';

      $sql = "select * from jobSeeker_reg where JobSeekId='" . $ID . "'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($result);
      ?>

      <form method="post" action="UpdateProfile.php" enctype="multipart/form-data" class="form-card">
        <input type="hidden" name="txtId" value="<?php echo $row['JobSeekId']; ?>">
        <input type="hidden" name="oldResume" value="<?php echo $row['Resume']; ?>">

        <div class="row">
          <div class="form-group col-md-6">
            <label for="txtName">Name</label>
            <input type="text" name="txtName" id="txtName" class="form-control" value="<?php echo $row['JobSeekerName']; ?>" required>
          </div>

          <div class="form-group col-md-6">
            <label for="txtEmail">Email</label>
            <input type="email" name="txtEmail" id="txtEmail" class="form-control" value="<?php echo $row['Email']; ?>" required>
          </div>

          <div class="form-group col-md-6">
            <label for="txtMobile">Mobile</label>
            <input type="text" name="txtMobile" id="txtMobile" class="form-control" value="<?php echo $row['Mobile']; ?>" required>
          </div>

          <div class="form-group col-md-6">
            <label for="txtCity">City</label>
            <input type="text" name="txtCity" id="txtCity" class="form-control" value="<?php echo $row['City']; ?>" required>
          </div>

          <div class="form-group col-md-12">
            <label for="txtAddress">Address</label>
            <input type="text" name="txtAddress" id="txtAddress" class="form-control" value="<?php echo $row['Address']; ?>" required>
          </div>

          <div class="form-group col-md-6">
            <label for="txtQual">Qualification</label>
            <input type="text" name="txtQual" id="txtQual" class="form-control" value="<?php echo $row['Qualification']; ?>" required>
          </div>

          <div class="form-group col-md-6">
            <label for="txtGender">Gender</label>
            <input type="text" name="txtGender" id="txtGender" class="form-control" value="<?php echo $row['Gender']; ?>" required>
          </div>

          <div class="form-group col-md-6">
            <label for="txtAge">Age</label>
            <input type="text" name="txtAge" id="txtAge" class="form-control" value="<?php echo $row['age']; ?>" required>
          </div>

          <div class="form-group col-md-6">
            <label for="txtBirthDate">Birth Date</label>
            <input type="date" name="txtBirthDate" id="txtBirthDate" class="form-control" value="<?php echo $row['BirthDate']; ?>">
          </div>

          <div class="form-group col-md-12">
            <label for="txtExperience">Skills / Experience</label>
            <textarea name="txtExperience" id="txtExperience" class="form-control" required><?php echo $row['Experience']; ?></textarea>
          </div>

          <div class="form-group col-md-6">
            <label for="txtUserName">Username</label>
            <input type="text" name="txtUserName" id="txtUserName" class="form-control" value="<?php echo $row['UserName']; ?>" required>
          </div>

          <div class="form-group col-md-6">
            <label for="txtPassword">Password</label>
            <input type="password" name="txtPassword" id="txtPassword" class="form-control" value="<?php echo $row['Password']; ?>" required>
          </div>

          <div class="form-group col-md-12">
            <label for="txtFile">Upload New Resume</label>
            <input type="file" name="txtFile" id="txtFile" class="form-control">
            <small>Current Resume: <?php echo $row['Resume']; ?></small>
          </div>
        </div>

        <div class="text-center mt-4">
          <a href="profile.php" class="back-btn">Back</a>
          <input type="submit" name="button" id="button" value="Update Profile" class="btn update-btn">
        </div>
      </form>

      <?php
      mysqli_close($conn);
      ?>

    </main>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
  feather.replace();
</script>

</body>
</html>