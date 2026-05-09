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
  <title>JobSeeker Profile</title>

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

    .profile-card {
      background: #ffffff;
      border-radius: 24px;
      padding: 30px;
      box-shadow: 0 12px 35px rgba(20, 184, 166, 0.12);
      border: 1px solid #ccfbf1;
    }

    .profile-top {
      display: flex;
      align-items: center;
      gap: 18px;
      margin-bottom: 24px;
      padding-bottom: 22px;
      border-bottom: 1px solid #ccfbf1;
    }

    .profile-avatar {
      width: 74px;
      height: 74px;
      border-radius: 22px;
      background: linear-gradient(135deg, rgb(20, 184, 166), #0d9488);
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 31px;
      font-weight: 800;
      box-shadow: 0 12px 28px rgba(20, 184, 166, 0.26);
    }

    .profile-top h4 {
      margin: 0;
      font-weight: 800;
      color: #134e4a;
    }

    .profile-top span {
      color: #0f766e;
      font-weight: 600;
    }

    .table {
      margin-bottom: 0;
    }

    .table td {
      border: none;
      border-bottom: 1px solid #e4fbf6;
      padding: 16px 18px;
      color: #134e4a;
      vertical-align: middle;
      font-weight: 500;
    }

    .table tr:last-child td {
      border-bottom: none;
    }

    .table td:first-child {
      width: 230px;
      background: #f0fdfa;
      font-weight: 800;
      color: #134e4a;
    }

    .about-box {
      line-height: 1.7;
      text-align: justify;
    }

    .resume-btn {
      background: #ccfbf1;
      color: #0f766e !important;
      border-radius: 12px;
      padding: 9px 16px;
      text-decoration: none !important;
      font-weight: 800;
      display: inline-block;
      transition: 0.25s;
    }

    .resume-btn:hover {
      background: rgb(20, 184, 166);
      color: #ffffff !important;
      transform: translateY(-2px);
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

      .profile-card {
        padding: 22px;
      }

      .profile-top {
        flex-direction: column;
        text-align: center;
      }

      .table td:first-child {
        width: 150px;
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
        <h1>Your Details</h1>
        <p>View your personal profile, resume, and generated profile summary.</p>
      </div>

      <?php
      $ID = $_SESSION['userid'];
      include 'connection/db.php';

      $sql = "select * from jobSeeker_reg where JobSeekId='" . $ID . "'  ";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($result);
      ?>

      <div class="profile-card">
        <div class="profile-top">
          <div class="profile-avatar">
            <?php echo strtoupper(substr($row['JobSeekerName'], 0, 1)); ?>
          </div>
          <div>
            <h4><?php echo $row['JobSeekerName']; ?></h4>
            <span><?php echo $row['Email']; ?></span>
          </div>
        </div>

        <div class="table-responsive">
          <table class="table table-bordered">
            <tbody>
              <tr>
                <td><strong>Name</strong></td>
                <td><?php echo $row['JobSeekerName']; ?></td>
              </tr>

              <tr>
                <td><strong>Address</strong></td>
                <td><?php echo $row['Address']; ?></td>
              </tr>

              <tr>
                <td><strong>City</strong></td>
                <td><?php echo $row['City']; ?></td>
              </tr>

              <tr>
                <td><strong>Email</strong></td>
                <td><?php echo $row['Email']; ?></td>
              </tr>

              <tr>
                <td><strong>Mobile</strong></td>
                <td><?php echo $row['Mobile']; ?></td>
              </tr>

              <tr>
                <td><strong>Qualification</strong></td>
                <td><?php echo $row['Qualification']; ?></td>
              </tr>

              <tr>
                <td><strong>Gender</strong></td>
                <td><?php echo $row['Gender']; ?></td>
              </tr>

              <tr>
                <td><strong>Birth Date</strong></td>
                <td><?php echo $row['BirthDate']; ?></td>
              </tr>

              <tr>
                <td><strong>About Myself</strong></td>
                <?php
                $sql1 = "select * from jobseeker_education where JobSeekId='" . $ID . "'  ";
                $result1 = mysqli_query($conn, $sql1);
                $row1 = mysqli_fetch_array($result1);

                $about_myself = $row['JobSeekerName'] . " " . $row['Address'] . " " . $row['City'] . " " . $row['Experience'] . " " . $row['Email'] . " " . $row['Mobile'] . " " . $row['age'] . " years old " . $row['Gender'] . " " . $row['Qualification'] . " " . $row1['Degree'] . " " . $row1['University'] . " " . $row1['Percentage'] . " percentage.";

                $sql2 = "select * from about_myself where jobseek_id='" . $ID . "'  ";
                $result2 = mysqli_query($conn, $sql2);
                $num = mysqli_num_rows($result2);
                if ($num == 0) {
                  $sql3 = "insert into  about_myself(jobseek_id, about_me) VALUES (
                       $ID, '$about_myself'
                       )";

                  mysqli_query($conn, $sql3);
                }
                ?>
                <td class="about-box"><?php echo  $about_myself; ?></td>
              </tr>

              <tr>
                <td><strong>Resume</strong></td>
                <td>
                  <a href="./upload/<?php echo $row['Resume']; ?>" target="_blank" class="resume-btn">
                    View Resume
                  </a>
                </td>
              </tr>
            </tbody>
          </table>
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