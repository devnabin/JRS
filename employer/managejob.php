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

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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
                <span data-feather="users"></span>
                Profile
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="managejob.php">
                <span data-feather="users"></span>
                Manage Job
              </a>
            </li>
     
            <ul class="nav flex-column mb-2">
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

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4 mb-3">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2" style="text-transform:uppercase;">POST VACANCY </h1>
        </div>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td bgcolor="black" class="m-3" style="color:#fff; padding:10px;"><strong>Manage Job</strong></td>
          </tr>
          <tr>
            <td>
              <form id="form1" class="bg-body-secondary p-3" method="post" action="InsertJob.php">
                <div class="form-group m-2">
                  <label for="txtCompany">Company Name:</label>
                  <input type="text" class="form-control" id="txtCompany" name="txtCompany" required>
                  <div class="text-danger">A value is required.</div>
                </div>
                <div class="form-group">
                  <label for="txtTitle">Job Title:</label>
                  <input type="text" class="form-control" id="txtTitle" name="txtTitle" required>
                  <div class="text-danger">A value is required.</div>
                </div>
                <div class="form-group">
                  <label for="txtage">Age Group:</label>
                  <input type="text" class="form-control" id="txtage" name="txtage" required>
                  <div class="text-danger">A value is required.</div>
                </div>
                <div class="form-group">
                  <label for="txtTotal">Total Vacancy:</label>
                  <input type="number" class="form-control" id="txtTotal" name="txtTotal" required>
                  <div class="text-danger">A value is required.</div>
                </div>
                <div class="form-group">
                  <label for="cmbQual">Qualification:</label>
                  <input type="text" class="form-control" id="cmbQual" name="cmbQual">
                  <div class="text-danger">A value is required.</div>

                </div>
                <div class="form-group">
                  <label for="txtreq">Requirement:</label>
                  <textarea class="form-control" id="txtreq" name="txtreq" rows="3"></textarea>
                  <div class="text-danger">A value is required.</div>

                </div>
                <div class="form-group">
                  <label for="txtOther">Salary:</label>
                  <input type="text" class="form-control" id="txtOther" name="txtOther">
                  <div class="text-danger">A value is required.</div>

                </div>
                <div class="form-group">
                  <label for="txtDesc">Description:</label>
                  <textarea class="form-control" id="txtDesc" name="txtDesc" rows="3" required></textarea>
                  <div class="text-danger">A value is required.</div>
                </div>
                <button type="submit" class="m-3 btn btn-primary mx-auto d-block">Submit</button>

                <!-- <table width="100%" border="0" cellspacing="0" cellpadding="5px">
                  <tr>
                    <td><strong>Company Name:</strong></td>
                    <td><span>
                        <label>
                          <input type="text" name="txtCompany" id="txtCompany" />
                        </label>
                        <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                  </tr>
                  <tr>
                    <td><strong>Job Title:</strong></td>
                    <td><span>
                        <label>
                          <input type="text" name="txtTitle" id="txtTitle" />
                        </label>
                        <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                  </tr>
                  <tr>
                    <td><strong>Age Group:</strong></td>
                    <td><span>
                        <label>
                          <input type="text" name="txtage" id="txtage" />
                        </label>
                        <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                  </tr>
                  <tr>
                    <td><strong>Total Vacancy:</strong></td>
                    <td><span>
                        <label>
                          <input type="number" name="txtTotal" id="txtTotal" />
                        </label>
                        <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                  </tr>
                  <tr>
                    <td><strong>Qualification:</strong></td>
                    <td><input type="text" name="cmbQual" id="cmbQual">

                    </td>
                  </tr>
                  <td><strong>Requirement:</strong></td>
                  <td><span>
                      <label>
                        <textarea name="txtreq" id="txtreq" cols="25" rows="3"></textarea>
                      </label>
                      <tr>
                        <td><strong>Salary:</strong></td>
                        <td><label>
                            <input type="text" name="txtOther" id="txtOther" />
                          </label></td>
                      </tr>
                      <tr>
                        <td><strong>Description:</strong></td>
                        <td><span>
                            <label>
                              <textarea name="txtDesc" id="txtDesc" cols="25" rows="3"></textarea>
                            </label>
                            <span class="textareaRequiredMsg">A value is required.</span></span></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td><label>
                            <input type="submit" name="button" id="button" value="Submit" />
                          </label></td>
                      </tr>
                </table> -->
              </form>
            </td>
          </tr>
          <tr class="mt-5">
            <td bgcolor="black" style="color:#fff"><strong>Posted Job </strong></td>
          </tr>
          <tr>
            <td>
              <table width="100%" border="1" bordercolor="black" class="table table-bordered">
                <tr style="color:#fff">
                  <th height="32" bgcolor="black" class="style3">
                    <div align="left" class="text-primary"><strong>Id</strong></div>
                  </th>
                  <th bgcolor="black" class="style3">
                    <div align="left" class="text-primary"><strong>Job Title</strong></div>
                  </th>
                  <th bgcolor="black" class="style3">
                    <div align="left" class="text-primary"><strong>Vacancy</strong></div>
                  </th>
                  <th bgcolor="black" class="style3">
                    <div align="left" class="text-primary"><strong>Qualification</strong></div>
                  </th>
                  <th bgcolor="black" class="style3">
                    <div align="left" class="text-primary"><strong>Description</strong></div>
                  </th>
                  <th bgcolor="black" class="style3">
                    <div align="left" class="text-primary"><strong>Specification</strong></div>
                  </th>

                  <th bgcolor="black" class="style3">
                    <div align="left">Delete</div>
                  </th>
                </tr>
                <?php
                // Establish Connection with Database
                include 'connection/db.php';
                // Specify the query to execute
                $sql = "select * from job_master where CompanyName='" . $_SESSION['Company'] . "'";
                $sql3 = "select * from employer_reg where CompanyName='" . $_SESSION['Company'] . "'";
                $result3 = mysqli_query($conn, $sql3);
                $row3 = mysqli_fetch_array($result3);
                // Execute query
                $result = mysqli_query($conn, $sql);
                // Loop through each records 
                while ($row = mysqli_fetch_array($result)) {
                  $Id = $row['JobId'];
                  $JobTitle = $row['JobTitle'];
                  $Vacancy = $row['Vacancy'];
                  $MinQualification = $row['MinQualification'];
                  $requriement = $row['Requirement'];
                  $Description = $row['Description'];
                  $job_specification = "We are looking for a experienced  " . $JobTitle . " who are willing to work at our company located at located at " . $row3['Address'] . " , " . $row3['City'] . " and expand their knowledge. The candidate must be of age group " . $row['Age'] . ". They must  at least have degree of " . $MinQualification . ". Additional requirement include : " . $row['Requirement'] . ".";

                  $sql1 = "select * from job_specification where jobid ='" . $Id . "'";

                  // Execute query
                  $result1 = mysqli_query($conn, $sql1);
                  $num = mysqli_num_rows($result1);
                  if ($num == 0) {
                    $sql2 = "insert into  job_specification(  jobid, job_title, Specification) VALUES (
                       $Id, '$JobTitle','$job_specification'
                       )";
                    // execute query

                    mysqli_query($conn, $sql2);
                  }

                ?>
                  <tr>
                    <td class="style3">
                      <div align="left" class="style9 style5"><strong><?php echo $Id; ?></strong></div>
                    </td>
                    <td class="style3">
                      <div align="left" class="style9 style5"><strong><?php echo $JobTitle; ?></strong></div>
                    </td>
                    <td class="style3">
                      <div align="left" class="style9 style5"><strong><?php echo $Vacancy; ?></strong></div>
                    </td>
                    <td class="style3">
                      <div align="left" class="style9 style5"><strong><?php echo $MinQualification; ?></strong></div>
                    </td>
                    <td class="style3">
                      <div align="left" class="style9 style5"><strong><?php echo $Description; ?></strong></div>
                    </td>
                    <!-- <td class="style3">
                      <div align="left" class="style9 style5"><strong><?php echo $job_specification; ?></strong></div>
                    </td> -->

                    <td class="style3">
                      <div align="left" class="style9 style5"><strong><a href="DeleteJob.php?JobId=<?php echo $Id; ?>">Delete</a></strong></div>
                    </td>
                  </tr>
                <?php
                }
                // Retrieve Number of records returned
                $records = mysqli_num_rows($result);
                ?>
                <tr>
                  <td colspan="6" class="style3">
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