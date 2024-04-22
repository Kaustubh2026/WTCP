<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sanchalana2k20";

try {
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }

    // If the connection is successful, you can proceed with your database operations here
    
} catch (Exception $e) {
    // Handle any exceptions that occur during the connection process
    die("Connection failed: " . $e->getMessage());
}
?>
