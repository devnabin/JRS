<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Job Seeker Account Recovery</title>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Segoe UI", Arial, sans-serif;
    }

    body {
      min-height: 100vh;
      background: linear-gradient(135deg, #f0fdfa, #ccfbf1);
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
      color: #134e4a;
    }

    form {
      width: 100%;
      max-width: 430px;
      background: #ffffff;
      border-radius: 26px;
      padding: 38px 34px;
      box-shadow: 0 18px 45px rgba(20, 184, 166, 0.22);
      border: 1px solid #ccfbf1;
    }

    h1 {
      text-align: center;
      font-size: 30px;
      font-weight: 800;
      color: #134e4a;
      margin-bottom: 12px;
    }

    h1::after {
      content: "";
      width: 65px;
      height: 4px;
      background: rgb(20, 184, 166);
      display: block;
      border-radius: 20px;
      margin: 14px auto 28px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      font-weight: 700;
      margin-bottom: 8px;
      color: #134e4a;
    }

    input[type="email"],
    input[type="text"] {
      width: 100%;
      height: 50px;
      border-radius: 14px;
      border: 1px solid #ccfbf1;
      background: #f8fffd;
      padding: 0 15px;
      font-size: 15px;
      font-weight: 500;
      outline: none;
      color: #134e4a;
      transition: 0.25s;
    }

    input[type="email"]:focus,
    input[type="text"]:focus {
      border-color: rgb(20, 184, 166);
      box-shadow: 0 0 0 4px rgba(20, 184, 166, 0.14);
      background: #ffffff;
    }

    input[type="submit"] {
      width: 100%;
      height: 50px;
      border: none;
      border-radius: 14px;
      background: linear-gradient(135deg, rgb(20, 184, 166), #0d9488);
      color: white;
      font-size: 16px;
      font-weight: 800;
      cursor: pointer;
      margin-top: 8px;
      box-shadow: 0 12px 25px rgba(20, 184, 166, 0.32);
      transition: 0.25s;
    }

    input[type="submit"]:hover {
      transform: translateY(-3px);
      box-shadow: 0 16px 35px rgba(20, 184, 166, 0.42);
    }

    @media (max-width: 500px) {
      form {
        padding: 30px 24px;
      }

      h1 {
        font-size: 25px;
      }
    }
  </style>
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
    <label>Enter Your Pet Name</label>
    <input type="text" name="txtAnswer" required>
  </div>

  <div>
    <input type="submit" value="Submit" name="submit">
  </div>
</form>

</body>
</html>