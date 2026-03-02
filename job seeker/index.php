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
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

  <title>Employer Dashboard</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- Custom styles for this template -->
  <link href="./css/dashboard.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0 py-3" style="font-size: 1.2rem;" href="#">JobSeeker Page</a>
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="logout.php" style="font-size: 1.2rem;">Sign out</a>
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
                <span class="feather" data-feather="home"></span>
                Dashboard <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="profile.php">
                <span class="feather" data-feather="users"></span>
                Profile
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="education.php">
                <span class="feather" data-feather="layers"></span>
                Education
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="searchjob.php">
                <span class="feather" data-feather="search"></span>
                Search Job
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="relevant.php">
                <span class="feather" data-feather="search"></span>
                Relevant Job
              </a>
            </li>
            <li class="nav-item">
              <!-- <h6 class="nav-link d-flex justify-content-between align-items-center text-muted">
                <span>Saved reports</span>
                <a class="d-flex align-items-center text-muted" href="#">
                  <span class="feather" data-feather="plus-circle"></span>
                </a>
              </h6> -->
            </li>
            <li class="nav-item">
              <a class="nav-link" href="walking.php">
                <span class="feather" data-feather="file-text"></span>
                Walking Interview
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="feedback.php">
                <span class="feather" data-feather="message-circle"></span>
                Feedback
              </a>
            </li>
          </ul>
        </div>
      </nav>


      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">


        <div class="container-fluid bg-primary p-3 mb-5">
          <div class="row">
            <div class="col">
              <h1 class="h2 text-center text-white">Welcome <?php echo $_SESSION['uname']; ?>👋 There are some Jobs waiting for you 🙌</h1>
            </div>
          </div>
        </div>

        <div class="container mt-5">
          <div class="row justify-content-center">

            <div class="col-md-2 mb-4">
              <div class="card shadow-sm">
                <div class="card-body text-center">
                  <img src="img/Profile.png" alt="" width="64" height="64" class="mb-3">
                  <h5 class="card-title"><a href="profile.php">Profile</a></h5>
                </div>
              </div>
            </div>
            <div class="col-md-2 mb-4">
              <div class="card shadow-sm">
                <div class="card-body text-center">
                  <img src="img/Edu.png" alt="" width="64" height="64" class="mb-3">
                  <h5 class="card-title"><a href="education.php">Education</a></h5>
                </div>
              </div>
            </div>
            <div class="col-md-2 mb-4">
              <div class="card shadow-sm">
                <div class="card-body text-center">
                  <img src="img/Search.png" alt="" width="64" height="64" class="mb-3">
                  <h5 class="card-title"><a href="searchjob.php">Search Job</a></h5>
                </div>
              </div>
            </div>
            <div class="col-md-2 mb-4">
              <div class="card shadow-sm">
                <div class="card-body text-center">
                  <img src="img/Interview.png" alt="" width="64" height="64" class="mb-3">
                  <h5 class="card-title"><a href="walking.php">Walkin</a></h5>
                </div>
              </div>
            </div>
            <div class="col-md-2 mb-4">
              <div class="card shadow-sm">
                <div class="card-body text-center">
                  <img src="img/Feedback.png" alt="" width="64" height="64" class="mb-3">
                  <h5 class="card-title"><a href="feedback.php">Feedback</a></h5>
                </div>
              </div>
            </div>
            <div class="col-md-2 mb-4">
              <div class="card shadow-sm">
                <div class="card-body text-center">
                  <img src="img/Log.png" alt="" width="64" height="64" class="mb-3">
                  <h5 class="card-title"><a href="logout.php">Logout</a></h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>







      <main role="main" class="d-flex justify-content-evenl col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="container-fluid bg-primary p-3 mt-5 dontdo">
          <div class="row">
            <div class="col">
              <h1 class="h2 text-center text-white">Recommended Jobs 💼</h1>
            </div>
          </div>
        </div>
      </main>
      <main role="main" class="d-flex justify-content-evenl col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

        <?php
        $ID = $_SESSION['userid'];
        include 'connection/db.php';

        //for job seeker
        $sql1 = "select * from jobseeker_reg where JobSeekID='" . $ID . "'  ";

        // making sql query
        $result1 = mysqli_query($conn, $sql1);
        $row1 = mysqli_fetch_array($result1);

        // First parameter for cosine value
        $text1 = $row1['Qualification'] . " " . $row1['Experience'] . " " . $row1['Gender'] . " " . $row1['age'];

        $sql2 = "select * from job_master";
        $result2 = mysqli_query($conn, $sql2);

        while ($row2 = mysqli_fetch_array($result2)) {


          // data form job master table
          $JobId = $row2['JobId'];

          $JobTitle = $row2['JobTitle'];

          //2nd parameter for calculating cosine value
          $text2 = $row2['CompanyName'] . ' ' . $row2['JobTitle'] . ' ' . $row2['Age'] . ' ' . $row2['MinQualification'] . ' ' . $row2['Requirement'] . ' ' . $row2['Description'] . ' ' . $row2['ExpectedSalary'];

          //concatination for creating base array
          $text3 = $text1 . $text2;

          // making string of array
          $array_text1 = explode(" ", $text1);
          $array_text2 = explode(" ", $text2);
          // $array_text3 = explode(" ", $text3);


          $base = Similarity::dot($array_text2);

          // checking cosine value
          // echo 'Cosine Similarity is ' . Similarity::cosine($array_text1, $array_text2, $dot);

          // generating value
          $similarity = Similarity::cosine($array_text1, $array_text2, $base);

          // making confidence to 100
          $sim_percent = $similarity * 100;

          // echo $similarity;
          // echo "<br />";
          // echo $sim_percent;

          if ($sim_percent >= 50) {

            // print_r($base);
            // echo '<br>';
            // print_r(Similarity::checka($array_text1, $base));
            // echo '<br>';
            // echo "check a and b data";
            // print_r(Similarity::checkb($array_text2, $base));
            // echo '<br>';


        ?>

            <div class="card m-2 my-2 p-2" style="width: 400px; cursor:pointer;">
              <div class="card-body" style="background-color: #f0f0f0;">


                <div class="mb-2 d-flex align-items-center justify-content-center bg-success   py-2">
                  <h3>JOB - <?php echo $row2['JobId']; ?></h3>
                </div>


                <!-- card content -->

                <p style="text-align: justify; font-size: 1rem;">Company : <b><?php echo $row2['CompanyName']; ?></b></p>
                <p style="text-align: justify; font-size: 1rem;">JobTitle : <b><?php echo $row2['JobTitle']; ?></b></p>
                <p style="text-align: justify; font-size: 1rem;">Vacancy : <b><?php echo $row2['Vacancy']; ?></b></p>
                <p style="text-align: justify; font-size: 1rem;">Qualification : <b><?php echo $row2['MinQualification']; ?></b></p>
                <p style="text-align: justify; font-size: 1rem;">Description : <b>
                    <!-- <?php echo $row2['Description']; ?> -->
                    <?php
                    $limited_text = substr($row2['Description'], 0, 200);
                    echo "<td>$limited_text...</td>";
                    ?>
                  </b></p>
                <div class="text-center mt-2">
                  <a href="Apply.php?JobId=<?php echo $row2['JobId']; ?>" class="btn btn-primary">
                    Apply For Job
                  </a>
                </div>


                <!-- hover effect -->
                <style>
                  .card:hover {
                    transform: scale(1.02);
                    transition: all 0.3s ease-in-out;
                    box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.3);
                  }
                </style>

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

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script>
    window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>');
  </script>
  <script src="../../assets/js/vendor/popper.min.js"></script>
  <script src="../../dist/js/bootstrap.min.js"></script>

  <!-- Icons -->
  <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
  <script>
    feather.replace();
  </script>

</body>

</html>