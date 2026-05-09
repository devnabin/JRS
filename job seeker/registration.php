<?php
session_start();
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <title>JobSeeker Log In or Register</title>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Segoe UI", Arial, sans-serif;
    }

    body {
      min-height: 100vh;
      background: #f0fdfa;
      overflow-x: hidden;
    }

    .container {
      position: relative;
      width: 100%;
      min-height: 100vh;
      overflow: hidden;
      background: linear-gradient(135deg, #f0fdfa, #ccfbf1);
    }

    .forms-container {
      position: absolute;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
    }

    .signin-signup {
      position: absolute;
      top: 50%;
      transform: translate(-50%, -50%);
      left: 75%;
      width: 50%;
      transition: 1s 0.7s ease-in-out;
      display: grid;
      grid-template-columns: 1fr;
      z-index: 5;
    }

    form {
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      padding: 0 4rem;
      transition: all 0.2s 0.7s;
      overflow: hidden;
      grid-column: 1 / 2;
      grid-row: 1 / 2;
      background: transparent;
    }

    form.sign-up-form {
      opacity: 0;
      z-index: 1;
      max-height: 95vh;
      overflow-y: auto;
      padding-top: 820px;
      padding-bottom: 40px;
    }

    form.sign-in-form {
      z-index: 2;
    }

    .title {
      font-size: 2.3rem;
      color: #134e4a;
      margin-bottom: 20px;
      font-weight: 800;
    }

    .title::after {
      content: "";
      width: 60px;
      height: 4px;
      background: rgb(20, 184, 166);
      display: block;
      border-radius: 20px;
      margin: 12px auto 0;
    }

    .input-field {
      max-width: 410px;
      width: 100%;
      background-color: #ffffff;
      margin: 10px 0;
      min-height: 55px;
      border-radius: 16px;
      display: grid;
      grid-template-columns: 15% 85%;
      padding: 0 0.4rem;
      position: relative;
      box-shadow: 0 8px 25px rgba(20, 184, 166, 0.12);
      border: 1px solid #ccfbf1;
      transition: 0.25s;
    }

    .input-field:focus-within {
      border-color: rgb(20, 184, 166);
      box-shadow: 0 10px 30px rgba(20, 184, 166, 0.25);
      transform: translateY(-2px);
    }

    .input-field i {
      text-align: center;
      line-height: 55px;
      color: rgb(20, 184, 166);
      transition: 0.5s;
      font-size: 1.1rem;
    }

    .input-field input {
      background: none;
      outline: none;
      border: none;
      line-height: 1;
      font-weight: 500;
      font-size: 1rem;
      color: #134e4a;
      width: 100%;
    }

    .input-field input::placeholder,
    .input-field textarea::placeholder {
      color: #7f9f9a;
      font-weight: 500;
    }

    .skill-field {
      max-width: 410px;
      width: 100%;
      background-color: #ffffff;
      margin: 10px 0;
      border-radius: 16px;
      display: grid;
      grid-template-columns: 15% 85%;
      padding: 0.4rem;
      box-shadow: 0 8px 25px rgba(20, 184, 166, 0.12);
      border: 1px solid #ccfbf1;
      transition: 0.25s;
    }

    .skill-field:focus-within {
      border-color: rgb(20, 184, 166);
      box-shadow: 0 10px 30px rgba(20, 184, 166, 0.25);
      transform: translateY(-2px);
    }

    .skill-field i {
      text-align: center;
      color: rgb(20, 184, 166);
      font-size: 1.1rem;
      padding-top: 14px;
    }

    .skill-field textarea {
      background: none;
      border: none;
      outline: none;
      width: 100%;
      min-height: 120px;
      padding: 12px 8px;
      font-size: 1rem;
      line-height: 1.5;
      resize: vertical;
      color: #134e4a;
      font-weight: 500;
    }

    .file-label {
      max-width: 410px;
      width: 100%;
      color: #134e4a;
      font-weight: 700;
      margin-top: 10px;
      margin-bottom: 2px;
    }

    .btn {
      width: 160px;
      background: linear-gradient(135deg, rgb(20, 184, 166), #0d9488);
      border: none;
      outline: none;
      height: 50px;
      border-radius: 14px;
      color: #fff;
      text-transform: uppercase;
      font-weight: 700;
      margin: 18px 0;
      cursor: pointer;
      transition: 0.3s;
      box-shadow: 0 12px 25px rgba(20, 184, 166, 0.35);
    }

    .btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 16px 35px rgba(20, 184, 166, 0.45);
    }

    .btn.solid {
      background: linear-gradient(135deg, rgb(20, 184, 166), #0d9488);
    }

    form a {
      color: rgb(20, 184, 166);
      text-decoration: none;
      font-weight: 600;
      margin-top: 8px;
      font-size: 15px;
      transition: 0.25s;
      /* padding: 50px; */
    }

    form a:hover {
      color: #0f766e;
      text-decoration: underline;
    }

    .panels-container {
      position: absolute;
      height: 100%;
      width: 100%;
      top: 0;
      left: 0;
      display: grid;
      grid-template-columns: repeat(2, 1fr);
    }

    .container:before {
      content: "";
      position: absolute;
      height: 2000px;
      width: 2000px;
      top: -10%;
      right: 48%;
      transform: translateY(-50%);
      background: linear-gradient(135deg, rgb(20, 184, 166), #0d9488);
      transition: 1.8s ease-in-out;
      border-radius: 50%;
      z-index: 6;
      box-shadow: 0 30px 90px rgba(20, 184, 166, 0.35);
    }

    .panel {
      display: flex;
      flex-direction: column;
      align-items: flex-end;
      justify-content: space-around;
      text-align: center;
      z-index: 6;
    }

    .left-panel {
      pointer-events: all;
      padding: 3rem 17% 2rem 12%;
    }

    .right-panel {
      pointer-events: none;
      padding: 3rem 12% 2rem 17%;
    }

    .panel .content {
      color: #fff;
      transition: transform 0.9s ease-in-out;
      transition-delay: 0.6s;
      max-width: 360px;
    }

    .panel h3 {
      font-weight: 800;
      line-height: 1;
      font-size: 1.8rem;
      margin-bottom: 15px;
    }

    .panel p {
      font-size: 1rem;
      padding: 0.7rem 0;
      line-height: 1.7;
      opacity: 0.95;
    }

    .btn.transparent {
      margin: 0;
      background: transparent;
      border: 2px solid #fff;
      width: 140px;
      height: 46px;
      font-weight: 700;
      font-size: 0.9rem;
      box-shadow: none;
    }

    .btn.transparent:hover {
      background: #fff;
      color: rgb(20, 184, 166);
      transform: translateY(-3px);
    }

    .right-panel .content {
      transform: translateX(800px);
    }

    .container.sign-up-mode:before {
      transform: translate(100%, -50%);
      right: 52%;
    }

    .container.sign-up-mode .left-panel .content {
      transform: translateX(-800px);
    }

    .container.sign-up-mode .signin-signup {
      left: 25%;
    }

    .container.sign-up-mode form.sign-up-form {
      opacity: 1;
      z-index: 2;
    }

    .container.sign-up-mode form.sign-in-form {
      opacity: 0;
      z-index: 1;
    }

    .container.sign-up-mode .right-panel .content {
      transform: translateX(0%);
    }

    .container.sign-up-mode .left-panel {
      pointer-events: none;
    }

    .container.sign-up-mode .right-panel {
      pointer-events: all;
    }

    @media (max-width: 870px) {
      .container {
        min-height: 1000px;
        height: 100vh;
      }

      .signin-signup {
        width: 100%;
        top: 95%;
        transform: translate(-50%, -100%);
        transition: 1s 0.8s ease-in-out;
        left: 50%;
      }

      .signin-signup,
      .container.sign-up-mode .signin-signup {
        left: 50%;
      }

      .panels-container {
        grid-template-columns: 1fr;
        grid-template-rows: 1fr 2fr 1fr;
      }

      .panel {
        flex-direction: row;
        justify-content: space-around;
        align-items: center;
        padding: 2.5rem 8%;
        grid-column: 1 / 2;
      }

      .right-panel {
        grid-row: 3 / 4;
      }

      .left-panel {
        grid-row: 1 / 2;
      }

      .panel .content {
        padding-right: 15%;
        transition: transform 0.9s ease-in-out;
        transition-delay: 0.8s;
      }

      .panel h3 {
        font-size: 1.3rem;
      }

      .panel p {
        font-size: 0.9rem;
        padding: 0.5rem 0;
      }

      .btn.transparent {
        width: 120px;
        height: 42px;
        font-size: 0.8rem;
      }

      .container:before {
        width: 1500px;
        height: 1500px;
        transform: translateX(-50%);
        left: 30%;
        bottom: 68%;
        right: initial;
        top: initial;
        transition: 2s ease-in-out;
      }

      .container.sign-up-mode:before {
        transform: translate(-50%, 100%);
        bottom: 32%;
        right: initial;
      }

      .container.sign-up-mode .left-panel .content {
        transform: translateY(-300px);
      }

      .container.sign-up-mode .right-panel .content {
        transform: translateY(0px);
      }

      .right-panel .content {
        transform: translateY(300px);
      }

      .container.sign-up-mode .signin-signup {
        top: 5%;
        transform: translate(-50%, 0);
      }

      form {
        padding: 0 2rem;
      }
    }

    @media (max-width: 570px) {
      form {
        padding: 0 1.5rem;
      }

      .input-field {
        min-height: 52px;
      }

      .panel .content {
        padding: 0.5rem 1rem;
      }

      .container {
        padding: 1.5rem;
      }

      .container:before {
        bottom: 72%;
        left: 50%;
      }

      .container.sign-up-mode:before {
        bottom: 28%;
        left: 50%;
      }
    }
  </style>
</head>

<body>
  <SCRIPT language="JavaScript1.2" src="gen_validation.js"></SCRIPT>
  <SCRIPT language="JavaScript1.2">
    var arrFormValidation = [
      [
        ["minlen=1",
          "Please Enter Company Name"
        ]

      ],
      [
        ["minlen=1",
          "Please Enter Contact Person"
        ]

      ],
      [
        ["minlen=1",
          "Please Enter Address"
        ]
      ],
      [
        ["minlen=1",
          "Please Enter City"
        ]
      ],
      [

        ["minlen=1",
          "Please Enter Email "
        ],
        ["email",
          "Please Enter valid email "
        ]
      ],
      [
        ["num",
          "Please Enter valid Mobile "
        ],
        ["minlen=10",
          "Please Enter valid Mobile "
        ]
      ],
      [

        ["minlen=1",
          "Please Enter Area of Work"
        ]


      ],

      [
        ["minlen=1",
          "Please Enter UserName "
        ]


      ],
      [
        ["minlen=1",
          "Please Enter Password "
        ]


      ],
      [


      ],
      [

        ["minlen=1",
          "Please Enter Answer "
        ]

      ]

    ];
  </SCRIPT>

  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="jobseeker_login.php" class="sign-in-form" method="Post">
          <h2 class="title">Log In</h2>

          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="txtUserName" id="txtUserName" required placeholder="Username" />
          </div>

          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="pass" id="pass" required placeholder="Password" />
          </div>

          <input type="submit" value="Login" class="btn solid" name="sub" />

          <a href="forget.php">Forgot Password?</a>
          <a href="../index.php">Return Home</a>
        </form>

        <form action="insertregistration.php" class="sign-up-form" enctype="multipart/form-data" method="Post">
          <h2 class="title">Sign Up</h2>

          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="txtName" required placeholder="JobSeeker Name" />
          </div>

          <div class="input-field">
            <i class="fas fa-map-marker"></i>
            <input type="text" name="txtAddress" required placeholder="Address" />
          </div>

          <div class="input-field">
            <i class="fas fa-map-marker"></i>
            <input type="text" name="txtCity" required placeholder="City" />
          </div>

          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" name="txtEmail" required placeholder="Email" />
          </div>

          <div class="input-field">
            <i class="fas fa-mobile"></i>
            <input type="text" name="txtMobile" required placeholder="Mobile" />
          </div>

          <div class="input-field">
            <i class="fas fa-university"></i>
            <input type="text" name="txtquali" required placeholder="University Degree" />
          </div>

          <div class="skill-field">
            <i class="fas fa-university"></i>
            <textarea name="text" required placeholder="What is your skills & Qualification. Please Describe."></textarea>
          </div>

          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="txtGender" required placeholder="Gender" />
          </div>

          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="age" required placeholder="Age" />
          </div>

          <div class="file-label">
            Upload Resume
          </div>

          <div class="input-field">
            <i class="fas fa-briefcase"></i>
            <input type="file" name="txtFile" id="txtFile" style="padding:18px 10px" />
          </div>

          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="txtUserName" required placeholder="Username" />
          </div>

          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="txtPassword" required placeholder="Password" />
          </div>

          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="text" name="txtAnswer" required placeholder="What is your pet name?" />
          </div>

          <input type="submit" class="btn" value="Register" name="submit" />
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>New Here?</h3>
          <p>Do not have an account? Register here.</p>
          <button class="btn transparent" id="sign-up-btn">Register</button>
        </div>
      </div>

      <div class="panel right-panel">
        <div class="content">
          <h3>One of Us?</h3>
          <p>Already have an account? Log in here.</p>
          <button class="btn transparent" id="sign-in-btn">Log In</button>
        </div>
      </div>
    </div>
  </div>

  <script src="js/sign.js"></script>
</body>

</html>