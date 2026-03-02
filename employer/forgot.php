<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    
    <link rel="stylesheet" href="css/forgot.css">
  </head>
  <body>
  <form action="recover.php" method="Post">
  <div>
  <h1>Recovery Form</h1>
  </div>
  <div class="form-group">
  <label for="email">Enter Your Email</label>
  <input type="email" name="email" id="email">
  </div>
  <div class="form-group">
  <label>Enter Your Pet name</label>
  <input type="text" name="txtAnswer" required   />
  </div>
  <div>
  <input type="submit" value="Submit" name="submit">
  </div>
  </form>
  </body>
  </html>