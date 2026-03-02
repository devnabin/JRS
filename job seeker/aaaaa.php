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



  <div class="container-fluid">
    <div class="row">

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">



        </div>

        <?php
        $ID = $_SESSION['userid'];
        include 'connection/db.php';

        echo "First Text is ", "</br>", "</br>";


        $text1 = "Arjan Bhattarai Kathmandu Kathmandu CSS Cascading Style Sheets (CSS) Box Model Responsive Design Media Queries Flexbox Grid Layout CSS Preprocessors (e.g., SASS, LESS) CSS Frameworks (e.g., Bootstrap, Materialize) HTML HyperText Markup Language (HTML) Semantic HTML Document Object Model (DOM) Accessibility Forms and Input Semantic Web Web Standards Browser Compatibility JavaScript JavaScript (JS) Variables Functions Control Flow Arrays Objects Scope Callbacks Asynchronous Programming Libraries and Frameworks (e.g., jQuery, Node.js, Angular.js) React.js React.js Virtual DOM JSX Components State Props Lifecycle methods Hooks Redux React Router shesh@gmail.com 9812870775 21 years old Male CSIT CSIT Kathmandu Model Collage 60 percentage.";

        // $text1 = "hello hi hi this is me nabin";

        echo $text1;


        echo "</br> </br> </br>", "</br>";


        echo "</br> </br> Second Text is ", "</br>", "</br>";


        $text2 = "we are looking for a very energetic and technology passionate individual for the post of frontend developer in our company, one needs to have good understanding of core programming concepts and must have work in a required field for around or more than 6 years of work experience. Candidate from Kathmandu area will be higly preferable. He/she must be familair with core concept of HTML, CSS and JavaScript (JS). He/She should be above 21 years old and must posses above 60 percentages in related field like CSIT or BIT etc. He/She must have knowledge in CSS Cascading Style Sheets (CSS) Box Model Responsive Design Media Queries Flexbox Grid React.js Virtual DOM JSX Components State Props Lifecycle methods and deeply understanding in javaScript like  Variables Functions Control Flow Arrays Objects. CSS Cascading Style Sheets (CSS) Box Model Responsive Design Media Queries Flexbox Grid Layout CSS Preprocessors (e.g., SASS, LESS) CSS Frameworks (e.g., Bootstrap, Materialize) HTML HyperText Markup Language (HTML) Semantic HTML Document Object Model (DOM) Accessibility Forms and Input Semantic Web Web Standards Browser Compatibility JavaScript JavaScript (JS)";



        // $text2 = "mero vai";
        echo $text2;


       //concatination for creating base array
       $text3 = $text1 . $text2;

       // making string of array
       $array_text1 = explode(" ", $text1);
       $array_text2 = explode(" ", $text2);
       $array_text3 = explode(" ", $text3);


        $dot = Similarity::dot($array_text3);

        $similarity = Similarity::cosine($array_text1, $array_text2, $dot);

        $sim_percent = $similarity * 100;

        echo "</br>", "</br>","</br>", "</br>";
        echo "Cosine value is : </br> ";

        echo $sim_percent;

        ?>


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