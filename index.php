<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JRS | Job Recommendation System</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: "Poppins", sans-serif;
            background: #f8fafc;
            color: #1f2937;
        }

        a {
            text-decoration: none !important;
        }

        .header-area {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background: rgba(255, 255, 255, 0.96);
            backdrop-filter: blur(14px);
            box-shadow: 0 8px 28px rgba(15, 23, 42, 0.08);
        }

        .main-nav {
            height: 78px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            font-size: 30px;
            font-weight: 800;
            color: #2563eb !important;
            letter-spacing: 1px;
        }

        .logo span {
            color: #14b8a6;
        }

        .nav {
            display: flex;
            align-items: center;
            gap: 8px;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .nav li a {
            color: #334155;
            font-weight: 600;
            font-size: 14px;
            padding: 10px 14px;
            border-radius: 12px;
            transition: 0.25s;
        }

        .nav li a:hover,
        .nav li a.active {
            background: #e0f2fe;
            color: #2563eb;
        }

        .nav li a.cta-link {
            background: linear-gradient(135deg, #2563eb, #14b8a6);
            color: #ffffff !important;
            box-shadow: 0 10px 25px rgba(37, 99, 235, 0.25);
        }

        .menu-trigger {
            display: none;
            color: #1f2937;
            font-weight: 700;
            cursor: pointer;
        }

        .main-banner {
            min-height: 100vh;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            padding: 120px 20px 70px;
            background: linear-gradient(135deg, #0f172a, #134e4a);
        }

        #bg-video {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.32;
        }

        .video-overlay {
            position: relative;
            z-index: 2;
            width: 100%;
        }

        .caption {
            max-width: 900px;
            margin: auto;
            text-align: center;
            color: white;
        }

        .caption h6 {
            font-size: 16px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #99f6e4;
            margin-bottom: 22px;
        }

        .caption h2 {
            font-size: 58px;
            line-height: 1.15;
            font-weight: 800;
            margin-bottom: 25px;
        }

        .caption h2 em {
            color: #14b8a6;
            font-style: normal;
        }

        .caption p {
            font-size: 18px;
            color: #e2e8f0;
            max-width: 700px;
            margin: 0 auto 30px;
            line-height: 1.7;
        }

        .hero-actions {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .hero-btn {
            padding: 14px 28px;
            border-radius: 14px;
            font-weight: 800;
            transition: 0.25s;
            display: inline-block;
        }

        .hero-btn.primary {
            background: linear-gradient(135deg, #2563eb, #14b8a6);
            color: #ffffff;
            box-shadow: 0 16px 35px rgba(20, 184, 166, 0.35);
        }

        .hero-btn.secondary {
            background: rgba(255, 255, 255, 0.13);
            color: #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.35);
        }

        .hero-btn:hover {
            transform: translateY(-4px);
            color: #ffffff;
        }

        .section {
            padding: 90px 0;
        }

        .section-heading {
            text-align: center;
            margin-bottom: 45px;
        }

        .section-heading h2 {
            font-size: 38px;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 12px;
        }

        .section-heading h2 em {
            color: #14b8a6;
            font-style: normal;
        }

        .section-heading p {
            color: #64748b;
            font-size: 16px;
            line-height: 1.7;
        }

        .job-card {
            background: #ffffff;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 14px 38px rgba(15, 23, 42, 0.08);
            border: 1px solid #e2e8f0;
            margin-bottom: 30px;
            transition: 0.25s;
            height: 100%;
        }

        .job-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 22px 48px rgba(15, 23, 42, 0.14);
        }

        .job-card img {
            width: 100%;
            height: 210px;
            object-fit: cover;
        }

        .job-card-content {
            padding: 24px;
        }

        .salary-badge {
            background: #ecfeff;
            color: #0891b2;
            padding: 8px 13px;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 800;
            display: inline-block;
            margin-bottom: 14px;
        }

        .job-card h4 {
            font-size: 20px;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 10px;
        }

        .job-card p {
            color: #64748b;
            font-size: 15px;
            line-height: 1.7;
        }

        .dark-section {
            background: #0f172a;
            color: white;
        }

        .dark-section .section-heading h2 {
            color: white;
        }

        .dark-section .section-heading p {
            color: #cbd5e1;
        }

        .testimonial-card {
            background: #ffffff;
            border-radius: 24px;
            padding: 28px;
            height: 100%;
            box-shadow: 0 14px 38px rgba(15, 23, 42, 0.13);
        }

        .testimonial-card img {
            width: 90px;
            height: 90px;
            object-fit: cover;
            border-radius: 22px;
            margin-bottom: 18px;
        }

        .testimonial-card p {
            color: #475569;
            line-height: 1.7;
            text-align: justify;
        }

        .testimonial-card h5 {
            color: #0f172a;
            font-weight: 800;
            margin-top: 15px;
        }

        .news-card {
            background: #ffffff;
            border-radius: 24px;
            padding: 26px;
            height: 100%;
            border: 1px solid #e2e8f0;
            box-shadow: 0 14px 38px rgba(15, 23, 42, 0.08);
            transition: 0.25s;
            margin-bottom: 30px;
        }

        .news-card:hover {
            transform: translateY(-6px);
        }

        .news-card h5 {
            color: #0f172a;
            font-weight: 800;
        }

        .news-date {
            color: #14b8a6;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .read-btn,
        .main-button a {
            background: linear-gradient(135deg, #2563eb, #14b8a6);
            color: #ffffff !important;
            border-radius: 14px;
            padding: 11px 20px;
            font-weight: 800;
            display: inline-block;
            box-shadow: 0 12px 28px rgba(20, 184, 166, 0.28);
            transition: 0.25s;
        }

        .read-btn:hover,
        .main-button a:hover {
            transform: translateY(-3px);
            color: #ffffff !important;
        }

        .cta-section {
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.88), rgba(19, 78, 74, 0.88)), url(assets/images/banner-image-1-1920x500.jpg);
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
        }

        .cta-content h2 {
            font-size: 40px;
            font-weight: 800;
            margin-bottom: 16px;
        }

        .cta-content h2 em {
            color: #99f6e4;
            font-style: normal;
        }

        .cta-content p {
            color: #e2e8f0;
            font-size: 16px;
            margin-bottom: 25px;
        }

        .member-card {
            background: #ffffff;
            border-radius: 24px;
            padding: 24px;
            display: flex;
            gap: 18px;
            align-items: center;
            border: 1px solid #e2e8f0;
            box-shadow: 0 14px 38px rgba(15, 23, 42, 0.08);
            margin-bottom: 24px;
        }

        .member-card img {
            width: 95px;
            height: 95px;
            object-fit: cover;
            border-radius: 20px;
        }

        .member-card h4 {
            font-size: 20px;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 8px;
        }

        .member-card p {
            color: #64748b;
            margin-bottom: 6px;
            line-height: 1.6;
        }

        .about-section {
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.86), rgba(37, 99, 235, 0.65)), url(assets/images/about-fullscreen-1-1920x700.jpg);
            background-size: cover;
            background-position: center;
            color: white;
        }

        .about-section .section-heading h2 {
            color: white;
        }

        .about-section .section-heading p,
        .about-section .about-text p {
            color: #e2e8f0;
        }

        .about-text {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 24px;
            padding: 30px;
            backdrop-filter: blur(10px);
            line-height: 1.8;
        }

        .contact-card {
            background: #ffffff;
            border-radius: 24px;
            padding: 28px;
            height: 100%;
            border: 1px solid #e2e8f0;
            box-shadow: 0 14px 38px rgba(15, 23, 42, 0.08);
        }

        .contact-card img {
            width: 130px;
            height: 130px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 18px;
        }

        .contact-card h3 {
            font-size: 22px;
            font-weight: 800;
            color: #0f172a;
        }

        .contact-card li {
            color: #64748b;
            margin-bottom: 8px;
        }

        footer {
            background: #0f172a;
            color: #cbd5e1;
            text-align: center;
            padding: 28px 0;
        }

        footer p {
            margin: 0;
            font-size: 16px;
            font-weight: 600;
        }

        @media (max-width: 991px) {
            .main-nav {
                height: auto;
                padding: 18px 0;
                flex-direction: column;
                align-items: flex-start;
                gap: 14px;
            }

            .nav {
                flex-wrap: wrap;
                gap: 8px;
            }

            .caption h2 {
                font-size: 42px;
            }

            .section {
                padding: 70px 0;
            }
        }

        @media (max-width: 575px) {
            .logo {
                font-size: 26px;
            }

            .nav {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                width: 100%;
            }

            .nav li a {
                display: block;
                text-align: center;
                font-size: 13px;
                padding: 9px;
            }

            .caption h2 {
                font-size: 34px;
            }

            .caption h6 {
                font-size: 13px;
            }

            .caption p {
                font-size: 15px;
            }

            .hero-btn {
                width: 100%;
            }

            .section-heading h2 {
                font-size: 30px;
            }

            .member-card {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>
</head>

<body>

    <header class="header-area header-sticky">
        <div class="container">
            <nav class="main-nav">
                <a href="index.php" class="logo">J<span>RS</span></a>

                <ul class="nav">
                    <li><a href="index.php" class="active">Home</a></li>
                    <li><a href="#schedule">About</a></li>
                    <li><a href="#trainers">Vacancy</a></li>
                    <li><a href="#our-classes">News</a></li>
                    <li><a href="./admin/admin_login.php">Admin</a></li>
                    <li><a href="./employer/registration.php" class="cta-link">Post Job</a></li>
                    <li><a href="./job seeker/registration.php" class="cta-link">Apply Job</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="main-banner" id="top">
        <video autoplay muted loop id="bg-video">
            <source src="assets/images/video3.mp4" type="video/mp4" />
        </video>

        <div class="video-overlay header-text">
            <div class="caption">
                <h6>Welcome to JRS</h6>
                <h2>Find Your Dream <em>Job</em> Today</h2>
                <p>JRS helps job seekers discover opportunities and helps employers post vacancies, review applicants, and manage hiring in one simple platform.</p>

                <div class="hero-actions">
                    <a href="./job seeker/registration.php" class="hero-btn primary">Apply for Jobs</a>
                    <a href="./employer/registration.php" class="hero-btn secondary">Post a Job</a>
                </div>
            </div>
        </div>
    </div>

    <section class="section" id="trainers">
        <div class="container">
            <div class="section-heading">
                <h2>Featured <em>Jobs</em></h2>
                <p>Choose a job you love, and you will never have to work a day in your life.</p>
            </div>

            <div class="row">
                <?php
                include 'connection/db.php';
                $sql = "select * from job_master";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <a href="./job seeker/registration.php">
                            <div class="job-card">
                                <img src="assets/images/job.jpg" alt="job">
                                <div class="job-card-content">
                                    <span class="salary-badge">Expected Salary: RS <?php echo $row['ExpectedSalary']; ?></span>
                                    <h4><?php echo $row['CompanyName']; ?></h4>
                                    <p>
                                        <strong><?php echo $row['JobTitle']; ?></strong><br>
                                        <?php
                                        $limited_text = substr($row['Description'], 0, 220);
                                        echo $limited_text . "...";
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>

    <section class="section dark-section">
        <div class="container">
            <div class="section-heading">
                <h2><em>User Testimonials</em></h2>
                <p>See what users say about JRS.</p>
            </div>

            <div class="row">
                <?php
                $testimonials = array(
                    array(
                        "name" => "Arjan Bhattarai",
                        "content" => "Working with JRS on a frontend development project was a pleasure. Their skills were impressive, and they demonstrated strong attention to detail. JRS was communicative, collaborative, and responsive to feedback throughout the project.",
                        "image" => "assets/images/arjan.jpg"
                    ),
                    array(
                        "name" => "Bidhan Jha",
                        "content" => "I had the pleasure of working with JRS on a frontend development project. Their attention to detail and commitment to delivering quality work was clear throughout the project. I highly recommend JRS.",
                        "image" => "assets/images/bidhan.jpg"
                    )
                );

                foreach ($testimonials as $testimonial) {
                    echo '<div class="col-lg-6 mb-4">';
                    echo '<div class="testimonial-card">';
                    echo '<img src="' . $testimonial["image"] . '" alt="' . $testimonial["name"] . '">';
                    echo '<p>' . $testimonial["content"] . '</p>';
                    echo '<h5>' . $testimonial["name"] . '</h5>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </section>

    <section class="section" id="our-classes">
        <div class="container">
            <div class="section-heading">
                <h2>Read Our <em>News</em></h2>
                <p>Latest news and announcements published by admin.</p>
            </div>

            <div class="row">
                <?php
                include 'connection/db.php';
                $dummyText = "Stay updated with the latest job market news, hiring information, and platform announcements from JRS.";
                $stmt = mysqli_prepare($conn, "SELECT News, NewsDate FROM news_master");

                if (!$stmt) {
                    die(mysqli_error($conn));
                }

                if (!mysqli_stmt_execute($stmt)) {
                    die(mysqli_stmt_error($stmt));
                }

                mysqli_stmt_bind_result($stmt, $news, $news_date);

                while (mysqli_stmt_fetch($stmt)) {
                ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="news-card">
                            <h5><?php echo $news; ?></h5>
                            <div class="news-date"><?php echo $news_date; ?></div>
                            <p><?php echo $dummyText; ?></p>
                            <a href="#" class="read-btn">Read More</a>
                        </div>
                    </div>
                <?php
                }

                mysqli_stmt_close($stmt);
                mysqli_close($conn);
                ?>
            </div>
        </div>
    </section>

    <section class="section cta-section" id="call-to-action">
        <div class="container">
            <div class="cta-content">
                <h2>Send Us a <em>Message</em></h2>
                <p>If you are interested, feel free to contact us at jobvetau@gmail.com</p>
                <div class="main-button">
                    <a href="https://www.gmail.com" target="_blank">Contact Us</a>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="features">
        <div class="container">
            <div class="section-heading">
                <h2>Our Core <em>Members</em></h2>
                <p>Meet the people behind JRS.</p>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="member-card">
                        <img src="assets/images.png" alt="Aakros Dewas">
                        <div>
                            <h4>Aakros Dewas</h4>
                            <p><em>Frontend Developer at JRS</em></p>
                            <p>+977-9812870775</p>
                        </div>
                    </div>

                    <div class="member-card">
                        <img src="assets/images.jpg" alt="Bimal Shrestha">
                        <div>
                            <h4>Bimal Shrestha</h4>
                            <p><em>Content Creator and SEO Expert at JRS</em></p>
                            <p>+977-98725685</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="member-card">
                        <img src="assets/images.jpg" alt="Chetan Budhathoki">
                        <div>
                            <h4>Chetan Budhathoki</h4>
                            <p><em>UI/UX Developer at JRS</em></p>
                            <p>+977-9823587458</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section about-section" id="schedule">
        <div class="container">
            <div class="section-heading">
                <h2>Read <em>About Us</em></h2>
                <p>If opportunity does not knock, build a door.</p>
            </div>

            <div class="about-text">
                <p>JRS is designed for employers who need to recruit employees for their organizations. Employers can register on the platform, post job vacancies, view job seeker applications, and send call letters to selected applicants.</p>

                <p>JRS also provides job seekers with a simple way to create a profile, add educational information, search available jobs, view relevant jobs, and apply for suitable opportunities.</p>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section-heading">
                <h2><em>Contact Us</em></h2>
                <p>If opportunity does not knock, build a door.</p>
            </div>

            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="contact-card text-center">
                        <img src="assets/images/information.jpg" alt="Information Officer">
                        <h3>Information Officer</h3>
                        <h5>Ram Hari Ghimire</h5>
                        <ul class="list-unstyled mt-3">
                            <li>+977 981256874</li>
                            <li><a href="mailto:ramhari@example.com">ramhari@example.com</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="contact-card">
                        <h3>JRS Office</h3>
                        <p>Job Recommendation System</p>
                        <p>Helping employers and job seekers connect through a simple and professional platform.</p>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="contact-card">
                        <h3>Contact Number</h3>
                        <ul class="list-unstyled mt-3">
                            <li>Phone: +977 981285687</li>
                            <li><a href="mailto:info@example.com">info@example.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>JRS © 2026 | Job Recommendation System</p>
        </div>
    </footer>

    <script src="assets/js/jquery-2.1.0.min.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script>
    <script src="assets/js/mixitup.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/custom.js"></script>

</body>

</html>