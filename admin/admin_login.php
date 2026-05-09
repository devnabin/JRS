<?php
session_start();
include "connection/db.php";

$error = "";

if (isset($_POST['submit'])) {
    $email = trim($_POST['email']);
    $password = $_POST['pass'];

    $stmt = $conn->prepare("SELECT * FROM admin_login WHERE admin_email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    if ($data && $password === $data['admin_pass']) {
        $_SESSION['email'] = $email;
        $_SESSION['uname'] = $data['admin_username'];
        header("Location: admin_dashboard.php");
        exit();
    } else {
        $error = "Invalid email or password.";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login | JRS</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: "Segoe UI", Arial, sans-serif;
        }

        .login-card {
            width: 100%;
            max-width: 430px;
            background: rgba(255, 255, 255, 0.96);
            border-radius: 24px;
            padding: 40px 35px;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.25);
        }

        .login-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #0d6efd, #6610f2);
            color: white;
            border-radius: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 22px;
            font-size: 24px;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .login-title {
            font-weight: 700;
            color: #222;
        }

        .login-subtitle {
            color: #6c757d;
            font-size: 15px;
        }

        .form-label {
            font-weight: 600;
            color: #333;
        }

        .form-control {
            height: 50px;
            border-radius: 14px;
            border: 1px solid #d8dbe0;
        }

        .form-control:focus {
            box-shadow: 0 0 0 4px rgba(13, 110, 253, 0.15);
        }

        .btn-login {
            height: 50px;
            border-radius: 14px;
            font-weight: 700;
            background: linear-gradient(135deg, #0d6efd, #6610f2);
            border: none;
        }

        .btn-login:hover {
            opacity: 0.92;
        }

        .back-link {
            text-decoration: none;
            color: #0d6efd;
            font-weight: 600;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .footer-text {
            font-size: 14px;
        }
    </style>
</head>

<body>

<div class="login-card">
    <div class="login-icon">JRS</div>

    <h3 class="text-center login-title mb-1">Admin Login</h3>
    <p class="text-center login-subtitle mb-4">Sign in to manage JRS</p>

    <?php if (!empty($error)) { ?>
        <div class="alert alert-danger text-center">
            <?php echo $error; ?>
        </div>
    <?php } ?>

    <form method="POST" id="admin_login" name="admin_login">
        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input
                type="email"
                id="email"
                name="email"
                class="form-control"
                placeholder="Enter admin email"
                required
                autofocus
            >
        </div>

        <div class="mb-4">
            <label for="pass" class="form-label">Password</label>
            <input
                type="password"
                id="pass"
                name="pass"
                class="form-control"
                placeholder="Enter password"
                required
            >
        </div>

        <button type="submit" name="submit" class="btn btn-primary w-100 btn-login">
            Sign In
        </button>
    </form>

    <div class="text-center mt-4">
        <a href="../index.php" class="back-link">← Return to Home</a>
    </div>

    <p class="text-center text-muted footer-text mt-4 mb-0">&copy; 2026 JRS</p>
</div>

</body>
</html>