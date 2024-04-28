<?php
session_start();


require_once("connection.php");

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {

    header("Location: login.php");
    exit;
}


$user_id = $_SESSION['user_id'];


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $shipping_address = $_POST['shipping_address'];
    $payment_method = $_POST['payment_method'];


    $query = "INSERT INTO Orders (user_id, game_id, quantity, total_amount, shipping_address, payment_method) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$user_id, $game_id, $quantity, $total_amount, $shipping_address, $payment_method]);


    $query = "DELETE FROM Cart WHERE user_id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$user_id]);


    header("Location: order_confirmation.php");
    exit;
}
?>
