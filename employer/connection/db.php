<?php
// 1. Use 127.0.0.1 instead of localhost to force a TCP connection (more reliable on Mac M4)
$server = "127.0.0.1"; 

$username = "root";

// 2. MAMP requires the password 'root'
$password = "root"; 

$database = "jrs";

// 3. Define the port separately
$port = 8889; 

// 4. Pass the port as the 5th argument
$conn = mysqli_connect($server, $username, $password, $database, $port);

if ($conn) {
?>
    <script>
    console.log('connection successful > main connection');
    </script>
<?php
} else {
    // 5. Better error handling
    die("Connection failed: " . mysqli_connect_error());
}
?>