<?php
session_start();

// Include the database connection file
require_once("connection.php");

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to the login page
    header("Location: login.php");
    exit;
}

// Check if the game_id is provided in the request
if (isset($_POST['game_id'])) {
    // Retrieve the game_id from the request
    $game_id = $_POST['game_id'];

    // Check if the game exists in the database
    $query = "SELECT * FROM games WHERE game_id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$game_id]);
    $game = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($game) {
        // Game found, add it to the user's cart

        // Check if the game is already in the user's cart
        $query = "SELECT * FROM cart WHERE user_id = ? AND game_id = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$_SESSION['user_id'], $game_id]);
        $existing_cart_item = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existing_cart_item) {
            // If the game is already in the cart, update the quantity
            $quantity = $existing_cart_item['quantity'] + 1;
            $query = "UPDATE cart SET quantity = ? WHERE user_id = ? AND game_id = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$quantity, $_SESSION['user_id'], $game_id]);
        } else {
            // If the game is not in the cart, add it as a new item
            $quantity = 1;
            $query = "INSERT INTO cart (user_id, game_id, quantity) VALUES (?, ?, ?)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$_SESSION['user_id'], $game_id, $quantity]);
        }

        // Redirect back to the index page or any other appropriate page
        header("Location: index.php");
        exit;
    } else {
        // Game not found, handle error (you can redirect to an error page or display an error message)
        echo "Game not found.";
        exit;
    }
} else {
    // game_id is not provided in the request, handle error (you can redirect to an error page or display an error message)
    echo "Game ID not provided.";
    exit;
}
?>
