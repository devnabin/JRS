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
              <a class="nav-link active" href="index.php">
                <span data-feather="home"></span>
                Dashboard <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="profile.php">
                <span data-feather="users"></span>
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
                <span data-feather="search"></span>
                Relevant Job
              </a>
            </li>
            <!-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Saved reports</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
              </a>
            </h6> -->
            <ul class="nav flex-column mb-2">
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
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2" style="text-transform:uppercase;">Your Education </h1>
        </div>

        <table width="100%" border="1" cellspacing="2" cellpadding="2">
          <tr>
            <td bgcolor="#006699" style="color:#fff"><strong>Create Educational Profile</strong></td>
          </tr>
          <tr>
            <td>
              <form id="form1" method="post" action="InsertEdu.php">
                <table width="100%" border="0" cellspacing="0" cellpadding="5px">
                  <tr>
                    <td><strong>Degree:</strong></td>
                    <td>
                      <input type="text" name="cmbQual" id="cmbQual">

                    </td>
                  </tr>
                  <tr>
                    <td><strong>Other Degree:</strong></td>
                    <td><label>
                        <input type="text" name="txtOther" id="txtOther" />
                      </label></td>
                  </tr>
                  <tr>
                    <td><strong>University/Board Name:</strong></td>
                    <td><span id="sprytextfield1">
                        <label>
                          <input type="text" name="txtBoard" id="txtBoard" />
                        </label>
                        <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                  </tr>
                  <tr>
                    <td><strong>Passing Year:</strong></td>
                    <td><label>
                        <select name="cmbYear" id="cmbYear">
                          <option>1993</option>
                          <option>1994</option>
                          <option>1995</option>
                          <option>1996</option>
                          <option>1997</option>
                          <option>1998</option>
                          <option>1999</option>
                          <option>2000</option>
                          <option>2001</option>
                          <option>2002</option>
                          <option>2003</option>
                          <option>2004</option>
                          <option>2005</option>
                          <option>2006</option>
                          <option>2007</option>
                          <option>2008</option>
                          <option>2009</option>
                          <option>2010</option>
                          <option>2011</option>
                          <option>2012</option>
                          <option>2013</option>
                          <option>2014</option>
                          <option>2015</option>
                          <option>2016</option>
                          <option>2017</option>
                          <option>2018</option>
                          <option>2019</option>
                          <option>2020</option>
                          <option>2021</option>

                        </select>
                      </label></td>
                  </tr>
                  <tr>
                    <td><strong>Percentage(%)</strong></td>
                    <td><span id="sprytextfield2">
                        <label>
                          <input type="text" name="txtPer" id="txtPer" />
                        </label>
                        <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td><label>
                        <input type="submit" name="button" id="button" value="Submit" />
                      </label></td>
                  </tr>
                </table>
              </form>
            </td>
          </tr>
          <tr>
            <td bgcolor="#006699" style="color:#fff"><strong>Educational Profile</strong></td>
          </tr>
          <tr>
            <td>
              <table width="100%" border="1" cellpadding="1" cellspacing="2" bordercolor="#006699">
                <tr style="color:#fff">
                  <th height="32" bgcolor="#006699">
                    <div align="left"><strong>Degree</strong></div>
                  </th>
                  <th bgcolor="#006699">
                    <div align="left"><strong>University</strong></div>
                  </th>
                  <th bgcolor="#006699">
                    <div align="left"><strong>Passing Year</strong></div>
                  </th>
                  <th bgcolor="#006699">
                    <div align="left"><strong>Percentage</strong></div>
                  </th>
                </tr>
                <?php
                $ID = $_SESSION['userid'];
                // Establish Connection with Database
                include 'connection/db.php';

                // Specify the query to execute
                $sql = "select * from jobSeeker_education where JobSeekId='" . $ID . "'";
                // Execute query
                $result = mysqli_query($conn, $sql);
                // Loop through each records 
                while ($row = mysqli_fetch_array($result)) {
                  $Degree = $row['Degree'];
                  $Univ = $row['University'];
                  $Passing = $row['PassingYear'];
                  $Per = $row['Percentage'];
                ?>
                  <tr>
                    <td class="style3">
                      <div align="left" class="style9 style5"><strong><?php echo $Degree; ?></strong></div>
                    </td>
                    <td class="style3">
                      <div align="left" class="style9 style5"><strong><?php echo $Univ; ?></strong></div>
                    </td>
                    <td class="style3">
                      <div align="left" class="style9 style5"><strong><?php echo $Passing; ?></strong></div>
                    </td>
                    <td class="style3">
                      <div align="left" class="style9 style5"><strong><?php echo $Per; ?></strong></div>
                    </td>
                  </tr>
                <?php
                }
                // Retrieve Number of records returned
                $records = mysqli_num_rows($result);
                ?>
                <tr>
                  <td colspan="4" class="style3">
                    <div align="left" class="style12"><?php echo "Total " . $records . " Records"; ?> </div>
                  </td>
                </tr>
                <?php
                // Close the connection
                mysqli_close($conn);
                ?>
              </table>
            </td>
          </tr>
        </table>
      </main>
    </div>
  </div>

  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
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