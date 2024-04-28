<?php

$host = "localhost";
$username = "root";
$password = "root"; // make sure to change to "root" or "".
$database = "g2gwebsite";

$connection = new PDO("mysql:host=$host;dbname=$database", $username, $password);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// Create a PDO DSN string
$dsn = "mysql:host=$host;dbname=$database";

// PDO options array
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    // Create a new PDO instance
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    // If connection fails, display error message
    die("Connection failed: " . $e->getMessage());
}

?>
