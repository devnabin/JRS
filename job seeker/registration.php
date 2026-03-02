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
  <link rel="stylesheet" href="css/sign.css" />
  <title>JobSeeker Log IN or Register</title>
</head>

<body>
  <SCRIPT language="JavaScript1.2" src="gen_validation.js"></SCRIPT>
  <SCRIPT language="JavaScript1.2">
    var arrFormValidation = [
      [ //Name
        ["minlen=1",
          "Please Enter Company Name"
        ]

      ],
      [ //Contact Person
        ["minlen=1",
          "Please Enter Contact Person"
        ]

      ],
      [ //Address
        ["minlen=1",
          "Please Enter Address"
        ]
      ],
      [ //City
        ["minlen=1",
          "Please Enter City"
        ]
      ],
      [ //Email

        ["minlen=1",
          "Please Enter Email "
        ],
        ["email",
          "Please Enter valid email "
        ]
      ],
      [ //Mobile
        ["num",
          "Please Enter valid Mobile "
        ],
        ["minlen=10",
          "Please Enter valid Mobile "
        ]
      ],
      [ //Area

        ["minlen=1",
          "Please Enter Area of Work"
        ]


      ],

      [ //User
        ["minlen=1",
          "Please Enter UserName "
        ]


      ],
      [ //Password
        ["minlen=1",
          "Please Enter Password "
        ]


      ],
      [ //Que


      ],
      [ //Answer

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
          <a href="forget.php">forget Password?</a>
          <a href="../index.php">Return Home</a>
        </form>
        <form action="insertregistration.php" class="sign-up-form" enctype="multipart/form-data" method="Post">
          <h2 class="title">Sign up</h2>
          <div class="input-field" style="margin-top:500px">
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
          <div class="input-field edit-the-register">
            <i class="fas fa-university"></i>
            <textarea name="text" required placeholder="What is your skills & Qualification. Please Describe."></textarea>

            <style>
              .edit-the-register {
                height: 800px;
                padding: 10px;
                position: relative;
                width: 100%;
                height: auto;
                overflow: hidden;
              }

              .edit-the-register textarea {
                height: 780px;
                background: none;
                border: none;
                outline: none;
                display: block;
                width: 100%;
                height: 100%;
                padding: 10px;
                font-size: 16px;
                line-height: 1.5;
                border: none;
                resize: none;
              }
            </style>

          </div>

          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="txtGender" required placeholder="Gender" />
          </div>
          <!-- <div>
            <label for="txtFile">Birth Date</label>
          </div>
          <div style="margin-bottom:10px">
            <input type="date" name="txtdate" required />
          </div> -->
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="age" required placeholder="Age" />
          </div>
          <div>
            <label for="txtFile">Upload Resume</label>
          </div>
          <div class="input-field">
            <i class="fas fa-briefcase"></i>
            <input type="file" name="txtFile" id="txtFile" style="padding:20px 10px" />
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
          <h3>New here ?</h3>
          <p>
            Do not have account? Register Here!
          </p>
          <button class="btn transparent" id="sign-up-btn">
            Register
          </button>
        </div>
        <!-- <img src="img/log.svg" class="image" alt="" /> -->
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>One of us ?</h3>
          <p>
            Already have an account? Log in Here !
          </p>
          <button class="btn transparent" id="sign-in-btn">
            Log in
          </button>
        </div>
        <!-- <img src="img/register.svg" class="image" alt="" /> -->
      </div>
    </div>
  </div>

  <script src="js/sign.js"></script>
</body>

</html>