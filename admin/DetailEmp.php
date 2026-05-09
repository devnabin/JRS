<?php
session_start();
if(!isset($_SESSION['email']))
{
	header('location:admin_login.php');
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>JRS Admin | Employer Detail</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="./css/dashboard.css" rel="stylesheet">

    <style>
      body {
        margin: 0;
        background: #f4f7fb;
        font-family: "Segoe UI", Arial, sans-serif;
        color: #1f2937;
      }

      .navbar {
        height: 70px;
        background: #ffffff !important;
        box-shadow: 0 4px 20px rgba(0,0,0,0.06);
        padding: 0 !important;
      }

      .navbar-brand {
        width: 260px;
        height: 70px;
        background: linear-gradient(135deg, #0d6efd, #6610f2);
        color: #ffffff !important;
        display: flex;
        align-items: center;
        padding-left: 25px !important;
        font-size: 22px;
        font-weight: 800;
        letter-spacing: 1px;
        margin: 0 !important;
      }

      .navbar-brand::before {
        content: "JRS ";
      }

      .navbar .nav-link {
        color: #dc3545 !important;
        border: 1px solid #dc3545;
        border-radius: 12px;
        padding: 8px 18px !important;
        font-weight: 600;
        margin-right: 20px;
      }

      .navbar .nav-link:hover {
        background: #dc3545;
        color: white !important;
      }

      .sidebar {
        width: 260px;
        min-height: calc(100vh - 70px);
        background: #111827 !important;
        padding: 25px 15px;
        position: fixed;
        left: 0;
        top: 70px;
      }

      .sidebar .nav-link {
        color: #cbd5e1 !important;
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
        color: #ffffff !important;
        transform: translateX(5px);
      }

      .sidebar-heading {
        color: #94a3b8 !important;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 1px;
      }

      main {
        margin-left: 260px;
        padding: 35px !important;
        max-width: calc(100% - 260px);
      }

      main .border-bottom {
        background: linear-gradient(135deg, #0d6efd, #6610f2);
        color: white;
        border-radius: 25px;
        padding: 30px !important;
        box-shadow: 0 18px 45px rgba(13,110,253,0.25);
        margin-bottom: 25px !important;
        border-bottom: none !important;
      }

      main h1 {
        font-weight: 800;
        margin: 0;
      }

      main h1::after {
        content: "Review employer information and approve account.";
        display: block;
        font-size: 16px;
        font-weight: 400;
        margin-top: 8px;
        opacity: 0.95;
      }

      table {
        width: 100% !important;
        background: #ffffff;
        border: none !important;
        border-radius: 22px;
        overflow: hidden;
        box-shadow: 0 12px 35px rgba(0,0,0,0.07);
        border-collapse: collapse;
      }

      table tr {
        border-bottom: 1px solid #eef2f7;
      }

      table tr:last-child {
        border-bottom: none;
      }

      table td {
        padding: 16px 20px !important;
        border: none !important;
        vertical-align: middle;
        font-size: 15px;
      }

      table td:first-child {
        width: 260px;
        background: #f8fafc;
        font-weight: 700;
        color: #111827;
      }

      table td:nth-child(2) {
        color: #374151;
        font-weight: 500;
      }

      table a {
        background: #16a34a;
        color: #ffffff !important;
        padding: 11px 18px;
        border-radius: 12px;
        text-decoration: none !important;
        font-weight: 700;
        display: inline-block;
      }

      table a:hover {
        background: #15803d;
        color: #ffffff !important;
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

        table td:first-child {
          width: 160px;
        }
      }
    </style>
  </head>

  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">ADMIN</a>
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
                <a class="nav-link" href="admin_dashboard.php">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="employer.php">
                  <span data-feather="briefcase"></span>
                  Employers
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="jobseeker.php">
                  <span data-feather="users"></span>
                  Job Seeker
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="managejobseeker.php">
                  <span data-feather="user-check"></span>
                   Manage Job Seeker
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="manageemployer.php">
                  <span data-feather="user-plus"></span>
                  Manage Employer
                </a>
              </li>
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Reports</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="feedback.php">
                  <span data-feather="message-square"></span>
                  Feedback
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="admin_news.php">
                  <span data-feather="file-plus"></span>
                  Publish News
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Employer Detail</h1>
          </div>
            
          <?php
$ID=$_GET['EmpId'];
// Establish Connection with Database
include 'connection/db.php';
// Specify the query to execute
$sql = "select * from employer_reg where Employer_Id =$ID  ";
// Execute query
$result = mysqli_query($conn,$sql);
// Loop through each records 
$row = mysqli_fetch_array($result)
?>
                <table width="100%" border="1" cellspacing="2" cellpadding="2">
                  <tr>
                    <td>ID:</td>
                    <td><?php echo $row['Employer_Id'];?></td>
                  </tr>
                  <tr>
                    <td>Company Name:</td>
                    <td><?php echo $row['CompanyName'];?></td>
                  </tr>
                  <tr>
                    <td>Contact Person:</td>
                    <td><?php echo $row['ContactPerson'];?></td>
                  </tr>
                  <tr>
                    <td>Address:</td>
                    <td><?php echo $row['Address'];?></td>
                  </tr>
                  <tr>
                    <td>City:</td>
                    <td><?php echo $row['City'];?></td>
                  </tr>
                  <tr>
                    <td>Email:</td>
                    <td><?php echo $row['Email'];?></td>
                  </tr>
                  <tr>
                    <td>Mobile:</td>
                    <td><?php echo $row['Mobile'];?></td>
                  </tr>
                  <tr>
                    <td>Area of Work:</td>
                    <td><?php echo $row['Area_Work'];?></td>
                  </tr>
                  <tr>
                    <td><strong><a href="ApprovEmp.php?EmpId=<?php echo $row['Employer_Id'];?>">Approve Employer</a></strong></td>
                    <td>&nbsp;</td>
                  </tr>
                </table>
                <?php
                mysqli_close($conn);
                ?>

          
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>');</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace();
    </script>

  </body>
</html>