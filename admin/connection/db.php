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