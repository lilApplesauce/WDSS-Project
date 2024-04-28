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

// Retrieve user ID
$user_id = $_SESSION['user_id'];

// Process checkout form submission
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Validate form inputs
    // (Ensure all required fields are filled, format validation, etc.)
    $shipping_address = $_POST['shipping_address'];
    $payment_method = $_POST['payment_method'];

    // Insert order details into Orders table
    // (Including user ID, game ID, quantity, total price, etc.)
    // Example:
    $query = "INSERT INTO Orders (user_id, game_id, quantity, total_amount, shipping_address, payment_method) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$user_id, $game_id, $quantity, $total_amount, $shipping_address, $payment_method]);

    // Remove items from the cart by deleting corresponding records from Cart table
    // Example:
    $query = "DELETE FROM Cart WHERE user_id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$user_id]);

    // Redirect to order confirmation page
    header("Location: order_confirmation.php");
    exit;
}
?>
