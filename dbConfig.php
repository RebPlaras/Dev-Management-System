<?php

// database parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "plaras";

try {
    // establish connection with the server using PDO
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Optionally echo this for testing; you can remove it later
    echo "Connected successfully"; 
} catch (PDOException $e) {
    // error message if connection fails
    die("Connection failed: " . $e->getMessage());
}
?>
