<?php   //OBSOLETE NOT USING
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

// Retrieve cart items for the user
$query = "SELECT c.*, g.name, g.price FROM Cart c JOIN Games g ON c.game_id = g.game_id WHERE c.user_id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$user_id]);
$cart_items = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Display cart items
foreach ($cart_items as $item) {
    echo "Game: {$item['name']}, Price: {$item['price']}<br>";
}

// Provide options to adjust quantities or remove items
// (Form submissions should lead back to this page with appropriate actions)
?>
