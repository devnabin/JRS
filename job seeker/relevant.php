<?php
session_start();
if (!isset($_SESSION['uname'])) {
  header('location:registration.php');
}
include('similarity.php')
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>JobSeeker Relevant Jobs</title>

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

    .jobs-wrapper {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 26px;
    }

    .job-card {
      background: #ffffff;
      border-radius: 24px;
      border: 1px solid #ccfbf1;
      box-shadow: 0 12px 35px rgba(20, 184, 166, 0.12);
      overflow: hidden;
      transition: 0.25s;
    }

    .job-card:hover {
      transform: translateY(-7px);
      box-shadow: 0 18px 45px rgba(20, 184, 166, 0.24);
    }

    .job-card-header {
      background: linear-gradient(135deg, rgb(20, 184, 166), #0d9488);
      color: #ffffff;
      padding: 18px 22px;
      font-size: 20px;
      font-weight: 800;
    }

    .job-card-body {
      padding: 24px;
    }

    .table {
      margin-bottom: 0;
    }

    .table th {
      width: 210px;
      background: #f0fdfa;
      color: #134e4a;
      border: none;
      border-bottom: 1px solid #e4fbf6;
      padding: 15px 16px;
      font-weight: 800;
      vertical-align: middle;
    }

    .table td {
      color: #134e4a;
      border: none;
      border-bottom: 1px solid #e4fbf6;
      padding: 15px 16px;
      font-weight: 500;
      vertical-align: middle;
      line-height: 1.6;
    }

    .table tr:last-child th,
    .table tr:last-child td {
      border-bottom: none;
    }

    .apply-btn {
      background: linear-gradient(135deg, rgb(20, 184, 166), #0d9488);
      color: #ffffff !important;
      border: none;
      border-radius: 14px;
      padding: 11px 22px;
      font-weight: 800;
      text-decoration: none !important;
      display: inline-block;
      box-shadow: 0 12px 25px rgba(20, 184, 166, 0.28);
      transition: 0.25s;
    }

    .apply-btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 16px 35px rgba(20, 184, 166, 0.38);
    }

    @media (max-width: 992px) {
      .jobs-wrapper {
        grid-template-columns: 1fr;
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

      .page-header h1 {
        font-size: 26px;
      }

      .table th {
        width: 145px;
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
            <a class="nav-link active" href="relevant.php">
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
        <h1>Relevant Jobs For You</h1>
        <p>Jobs are recommended based on your profile information and similarity matching.</p>
      </div>

      <div class="jobs-wrapper">

        <?php
        $ID = $_SESSION['userid'];
        include 'connection/db.php';

        $sql1 = "select * from jobseeker_reg where JobSeekID='" . $ID . "'  ";
        $result1 = mysqli_query($conn, $sql1);
        $row1 = mysqli_fetch_array($result1);

        $text1 = $row1['Qualification'] . " " . $row1['Experience'] . " " . $row1['Gender'] . " " . $row1['age'];

        $sql2 = "select * from job_master";
        $result2 = mysqli_query($conn, $sql2);

        while ($row2 = mysqli_fetch_array($result2)) {
          $JobId = $row2['JobId'];
          $JobTitle = $row2['JobTitle'];

          $text2 = $row2['CompanyName'] . ' ' . $row2['JobTitle'] . ' ' . $row2['Age'] . ' ' . $row2['MinQualification'] . ' ' . $row2['Requirement'] . ' ' . $row2['Description'] . ' ' . $row2['ExpectedSalary'];

          $text3 = $text1 . $text2;

          $array_text1 = explode(" ", $text1);
          $array_text2 = explode(" ", $text2);
          $array_text3 = explode(" ", $text3);

          $base = Similarity::dot($array_text3);
          $similarity = Similarity::cosine($array_text1, $array_text2, $base);
          $sim_percent = $similarity * 100;

          if ($sim_percent >= 50) {
        ?>

            <div class="job-card">
              <div class="job-card-header">
                Job Details
              </div>

              <div class="job-card-body">
                <table class="table table-bordered table-hover">
                  <tbody>
                    <tr>
                      <th scope="row">Job ID</th>
                      <td><?php echo $row2['JobId']; ?></td>
                    </tr>

                    <tr>
                      <th scope="row">Company Name</th>
                      <td><?php echo $row2['CompanyName']; ?></td>
                    </tr>

                    <tr>
                      <th scope="row">Job Title</th>
                      <td><?php echo $row2['JobTitle']; ?></td>
                    </tr>

                    <tr>
                      <th scope="row">Vacancy</th>
                      <td><?php echo $row2['Vacancy']; ?></td>
                    </tr>

                    <tr>
                      <th scope="row">Qualification</th>
                      <td><?php echo $row2['MinQualification']; ?></td>
                    </tr>

                    <tr>
                      <th scope="row">Description</th>
                      <?php
                      $limited_text = substr($row2['Description'], 0, 500);
                      echo "<td>$limited_text...</td>";
                      ?>
                    </tr>

                    <tr>
                      <th scope="row">Job Specification</th>
                      <?php
                      $limited_text = substr($row2['Description'], 0, 200);
                      echo "<td>$limited_text...</td>";
                      ?>
                    </tr>

                    <tr>
                      <td colspan="2" class="text-center">
                        <a href="Apply.php?JobId=<?php echo $row3['JobId']; ?>" class="apply-btn">
                          Apply For Job
                        </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

        <?php
          }
        }
        ?>

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