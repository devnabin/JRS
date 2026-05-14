# JRS Project (SE Project)

# JRS - Job Recommendation System

JRS stands for **Job Recommendation System**. This is a web-based job portal project built using **PHP, MySQL, HTML, CSS, Bootstrap, and JavaScript**.

The system has three main users:

1. Admin
2. Employer
3. Job Seeker

The main goal of this project is to allow employers to post jobs and allow job seekers to search, apply, and view relevant job recommendations.

---

## Project Features

### Admin Features

The admin can:

- Login to the admin panel
- View registered employers
- View registered job seekers
- Verify job seeker accounts
- Manage employers
- Manage job seekers
- View feedback
- Publish news
- Delete published news

---

### Employer Features

The employer can:

- Register and login
- View employer dashboard
- Update employer profile
- Post job vacancies
- View posted jobs
- Delete posted jobs
- Post walking interview vacancies
- View walking interview posts
- Delete walking interview posts
- View job applications
- View job seeker biodata
- Send call letter or message to job seekers

---

### Job Seeker Features

The job seeker can:

- Register and login
- Upload resume
- View profile
- Update profile
- Add education details
- Search jobs manually
- Apply for jobs
- View application status
- View relevant jobs
- View walking interview details
- Give feedback

---

## Recommendation Feature

This project includes a job recommendation feature using **cosine similarity**.

The system compares the job seeker profile with job details. It uses information such as:

- Qualification
- Experience
- Gender
- Age
- Job title
- Job requirement
- Job description
- Expected salary

If the similarity score is high enough, the job is shown as a relevant job for the job seeker.

The recommendation logic is handled using the `similarity.php` file.

---

## Required Software

To run this project, you need a local PHP and MySQL server.

### For Mac

Use **MAMP**.

Download and install MAMP.

### For Windows

Use **XAMPP**.

Download and install XAMPP.

---

## Project Folder Setup

After downloading or copying the project, place the project folder inside the local server folder.

---

## Mac Setup Using MAMP

Put the project folder inside:

```text
/Applications/MAMP/htdocs/
```

Example:

```text
/Applications/MAMP/htdocs/jrs/
```

Then open the project in the browser:

```text
http://localhost:8888/jrs/
```

or

```text
http://127.0.0.1:8888/jrs/
```

---

## Windows Setup Using XAMPP

Put the project folder inside:

```text
C:\xampp\htdocs\
```

Example:

```text
C:\xampp\htdocs\jrs\
```

Then open the project in the browser:

```text
http://localhost/jrs/
```

---

## Database Setup

This project uses a MySQL database.

You need to create/import the database in phpMyAdmin.

---

## Database Setup for Mac Using MAMP

Open phpMyAdmin from MAMP or visit:

```text
http://localhost:8888/phpMyAdmin/
```

Create a database named:

```text
jrs
```

Then import the project database SQL file into this database.

---

## Database Setup for Windows Using XAMPP

Start **Apache** and **MySQL** from the XAMPP Control Panel.

Then open:

```text
http://localhost/phpmyadmin/
```

Create a database named:

```text
job_recommend
```

Then import the project database SQL file into this database which is located on database folder in named "job_recommend.sql"

---

## Database Connection Files

This project has four database connection files.

You must update all of them based on your operating system.

The connection files are:

```text
connection/db.php
admin/connection/db.php
job seeker/connection/db.php
employer/connection/db.php
```

Make sure all four files have the correct database connection code.

---

## Database Connection for Mac Using MAMP

For Mac MAMP, use this connection code in all four `db.php` files:

```php
<?php
$server = "127.0.0.1";

$username = "root";

$password = "root";

$database = "jrs";

$port = 8889;

$conn = mysqli_connect($server, $username, $password, $database, $port);

if ($conn) {
?>
    <script>
    console.log('connection successful > main connection');
    </script>
<?php
} else {
    die("Connection failed: " . mysqli_connect_error());
}
?>
```

In MAMP, the MySQL username is usually:

```text
root
```

The password is usually:

```text
root
```

The MySQL port is usually:

```text
8889
```

Using `127.0.0.1` instead of `localhost` can work better on some Mac systems.

---

## Database Connection for Windows Using XAMPP

For Windows XAMPP, use this connection code in all four `db.php` files:

```php
<?php
$server = "localhost:3306";
$username = "root";
$password = "";
$database = "job_recommend";

$conn = mysqli_connect($server, $username, $password, $database);

if ($conn) {
?>
<script>
    console.log('connection successful');
</script>
<?php
} else {
    echo mysqli_connect_error();
}
?>
```

In XAMPP, the MySQL username is usually:

```text
root
```

The password is usually empty.

The database name for Windows setup is:

```text
job_recommend
```

---

## Important Note About Database Name

You can use the same database name on both Mac and Windows if you want.

For example, you can use:

```text
jrs
```

on both systems.

But if you do this, you must also change the database name in all four connection files.

Example:

```php
$database = "jrs";
```

The database name in phpMyAdmin and the database name in `db.php` must match.

---

## How to Run the Project

### Step 1: Start Server

For Mac:

```text
Open MAMP
Start Servers
```

For Windows:

```text
Open XAMPP
Start Apache
Start MySQL
```

---

### Step 2: Import Database

Open phpMyAdmin.

Create the database.

Import the SQL file.

---

### Step 3: Update Database Connection

Update all four `db.php` files:

```text
connection/db.php
admin/connection/db.php
job seeker/connection/db.php
employer/connection/db.php
```

Use the correct connection code for your operating system.

---

### Step 4: Open Project

For Mac MAMP:

```text
http://localhost:8888/jrs/
```

For Windows XAMPP:

```text
http://localhost/jrs/
```

---

## Project Main Pages

### Landing Page

```text
index.php
```

This is the main home page of the project.

---

### Admin Login

```text
admin/admin_login.php
```

Admin can login and manage the system from here.

---

### Employer Registration/Login

```text
employer/registration.php
```

Employers can register and login from this page.

---

### Job Seeker Registration/Login

```text
job seeker/registration.php
```

Job seekers can register and login from this page.

---

## Important Tables Used

Some important database tables used in this project are:

```text
admin_login
employer_reg
jobseeker_reg
jobseeker_education
job_master
walkin_master
application_master
feedback
news_master
about_myself
job_specification
```

---

## Application Flow

### Employer Flow

```text
Employer registers
Employer logs in
Employer posts job
Job is saved in job_master
Job seeker can search and apply
Employer views applications
Employer sends call letter
Application status is updated
```

---

### Job Seeker Flow

```text
Job seeker registers
Job seeker logs in
Job seeker completes profile
Job seeker adds education
Job seeker searches jobs
Job seeker applies for job
Application is saved in application_master
Job seeker checks application status
```

---

### Admin Flow

```text
Admin logs in
Admin manages employers and job seekers
Admin verifies job seekers
Admin views feedback
Admin publishes news
```

---

## Manual Job Search Logic

The job seeker can search jobs manually using:

- Qualification
- Company name
- Area of work / job title

In the current search logic, all selected values must match the job record. If one value does not match, the job may not appear in the search result.

---

## Relevant Job Logic

The relevant job page uses cosine similarity to recommend jobs.

The system compares the job seeker information with job information. If the match score is high enough, the job is displayed as a relevant job.

The match score helps the job seeker understand how closely the job matches their profile.

---

## Walking Interview Logic

Employers can post walking interview details.

Job seekers can view walking interviews, including:

- Company name
- Job title
- Vacancy
- Qualification
- Description
- Interview date
- Interview time

This section is mainly view-only for job seekers. They can see the walking interview details and attend based on the posted date and time.

---

## Application Status Logic

When a job seeker applies for a job, the application is stored in the `application_master` table.

This table connects:

```text
Job Seeker + Job Post + Application Status
```

Important columns include:

```text
ApplicationId
JobSeekId
JobId
Status
Description
```

Example status values:

```text
Apply
Call Letter Sent
```

The job seeker can view their application status from the search job page.

---

## Notes

- Make sure Apache and MySQL are running before opening the project.
- Make sure the database is imported correctly.
- Make sure all four database connection files are updated.
- If the page shows database connection error, check database name, username, password, and port.
- If the project works on Windows but not Mac, check the MAMP MySQL port. Usually it is `8889`.
- If a form is not saving data, check the related insert file and database table column names.
- If an ID error appears, check whether the table ID column is auto-increment or manually handled in the code.

---

## Project Name

```text
JRS - Job Recommendation System
```

---

## Year

```text
2026
```

---

## Developed For

This project was developed as a web-based job portal and recommendation system project.

It is useful for learning:

- PHP
- MySQL
- Session handling
- CRUD operations
- Job posting
- Job searching
- Job application management
- Basic recommendation logic using cosine similarity