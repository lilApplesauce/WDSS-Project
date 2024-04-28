<?php
session_start();

// Include the database connection file
require_once("connection.php");

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit;
}

// Retrieve game ID from GET or POST parameters
if (isset($_GET['game_id'])) {
    $game_id = $_GET['game_id'];
} else {
    // Handle invalid request
    echo "Invalid request!";
    exit;
}

// Insert game ID and user ID into Cart table
$user_id = $_SESSION['user_id'];
$query = "INSERT INTO Cart (user_id, game_id) VALUES (?, ?)";
$stmt = $pdo->prepare($query);
$stmt->execute([$user_id, $game_id]);

// Redirect back to the previous page
header("Location: view_cart.php");
exit;
?>
