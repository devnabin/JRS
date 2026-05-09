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
  <title>Edit Employer Profile</title>

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

    .form-card {
      background: #ffffff;
      border-radius: 24px;
      padding: 30px;
      box-shadow: 0 12px 35px rgba(80, 143, 233, 0.12);
      border: 1px solid #dbeafe;
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
      min-height: 110px;
      resize: vertical;
    }

    .textfieldRequiredMsg,
    .textareaRequiredMsg {
      display: none;
      font-size: 13px;
      color: #dc3545;
      margin-top: 5px;
    }

    .update-btn {
      background: linear-gradient(135deg, rgb(80, 143, 233), #4f7fe5);
      border: none;
      color: white;
      border-radius: 14px;
      padding: 12px 34px;
      font-weight: 800;
      box-shadow: 0 12px 25px rgba(80, 143, 233, 0.28);
      transition: 0.25s;
    }

    .update-btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 16px 35px rgba(80, 143, 233, 0.38);
      color: white;
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
        <h1>Edit Profile</h1>
        <p>Update your employer account and company information.</p>
      </div>

      <?php
      $ID = $_GET['EmployerId'];
      include 'connection/db.php';

      $sql = "select * from employer_reg where Employer_Id =$ID  ";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($result)
      ?>

      <form method="post" action="UpdateProfile.php" class="form-card">
        <div class="form-group">
          <label for="txtId">Company ID</label>
          <input name="txtId" type="text" id="txtId" class="form-control" value="<?php echo $row['Employer_Id']; ?>" />
          <span class="textfieldRequiredMsg">A value is required.</span>
        </div>

        <div class="form-group">
          <label for="txtName">Company Name</label>
          <input name="txtName" type="text" id="txtName" class="form-control" value="<?php echo $row['CompanyName']; ?>" />
          <span class="textfieldRequiredMsg">A value is required.</span>
        </div>

        <div class="form-group">
          <label for="txtContact">Contact Person</label>
          <input name="txtContact" type="text" id="txtContact" class="form-control" value="<?php echo $row['ContactPerson']; ?>" />
          <span class="textfieldRequiredMsg">A value is required.</span>
        </div>

        <div class="form-group">
          <label for="txtAddress">Address</label>
          <textarea name="txtAddress" id="txtAddress" class="form-control" cols="35" rows="3"><?php echo $row['Address']; ?></textarea>
          <span class="textareaRequiredMsg">A value is required.</span>
        </div>

        <div class="form-group">
          <label for="txtCity">City</label>
          <input name="txtCity" type="text" id="txtCity" class="form-control" value="<?php echo $row['City']; ?>" />
          <span class="textfieldRequiredMsg">A value is required.</span>
        </div>

        <div class="form-group">
          <label for="txtEmail">Email</label>
          <input name="txtEmail" type="text" id="txtEmail" class="form-control" value="<?php echo $row['Email']; ?>" />
          <span class="textfieldRequiredMsg">A value is required.</span>
        </div>

        <div class="form-group">
          <label for="txtMobile">Mobile</label>
          <input name="txtMobile" type="text" id="txtMobile" class="form-control" value="<?php echo $row['Mobile']; ?>" />
          <span class="textfieldRequiredMsg">A value is required.</span>
        </div>

        <div class="form-group">
          <label for="txtArea">Area of Work</label>
          <input name="txtArea" type="text" id="txtArea" class="form-control" value="<?php echo $row['Area_Work']; ?>" />
          <span class="textfieldRequiredMsg">A value is required.</span>
        </div>

        <div class="form-group">
          <label for="txtUser">User Name</label>
          <input name="txtUser" type="text" id="txtUser" class="form-control" value="<?php echo $row['UserName']; ?>" />
          <span class="textfieldRequiredMsg">A value is required.</span>
        </div>

        <div class="form-group">
          <label for="txtPassword">Password</label>
          <input name="txtPassword" type="password" id="txtPassword" class="form-control" value="<?php echo $row['Password']; ?>" />
          <span class="textfieldRequiredMsg">A value is required.</span>
        </div>

        <div class="text-center mt-4">
          <input type="submit" class="btn update-btn" name="button" id="button" value="Update" />
        </div>
      </form>

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