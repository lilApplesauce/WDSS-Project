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

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    if (isset($_POST['shipping_address1'], $_POST['shipping_address2'], $_POST['card_details'], $_POST['game_id'])) {
        // Sanitize input data (you should validate and sanitize all input fields)
        $shipping_address1 = $_POST['shipping_address1'];
        $shipping_address2 = $_POST['shipping_address2'];
        $card_details = $_POST['card_details'];
        $game_id = $_POST['game_id'];

        try {
            // Insert order into database
            $stmt = $pdo->prepare("INSERT INTO orders (user_id, game_id, shipping_address1, shipping_address2, card_details) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$user_id, $game_id, $shipping_address1, $shipping_address2, $card_details]);

            // Redirect to order confirmation page
            header("Location: orderConfirm.php");
            exit;
        } catch (PDOException $e) {
            // Handle database errors
            echo "Database error: " . $e->getMessage();
            exit;
        }
    } else {
        // Handle form submission errors
        // For example, display an error message or redirect back to the checkout page
        // This depends on your specific requirements
        echo "Error: Form submission data missing.";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
</head>
<body>

<h2>Checkout</h2>

<div>
    <?php
    // Include connection file
    include 'connection.php';

    // Check if the game ID is sent via POST method
    if(isset($_POST['game_id'])) {
        // Retrieve the game details from the database
        $game_id = $_POST['game_id'];
        $stmt = $pdo->prepare("SELECT game_name, game_price FROM games WHERE game_id = ?");
        $stmt->execute([$game_id]);
        $game = $stmt->fetch(PDO::FETCH_ASSOC);

        // Display the game name and price
        if($game) {
            echo "<p><strong>Game Name:</strong> " . $game['game_name'] . "</p>";
            echo "<p><strong>Price:</strong> $" . $game['game_price'] . "</p>";
        } else {
            echo "<p>Game not found.</p>";
        }
    } else {
        echo "<p>No game selected for checkout.</p>";
    }
    ?>
</div>

<form method="post" action="">
    <!-- Form fields for shipping address, payment method, etc. -->
    <!-- Example: -->
    <label for="shipping_address1">Address Line 1: </label>
    <input type="text" id="shipping_address1" name="shipping_address1" required><br><br>

    <label for="shipping_address2">Address Line 2: </label>
    <input type="text" id="shipping_address2" name="shipping_address2" required><br><br>

    <label for="card_details">Card Number: </label>
    <input type="tel" pattern="[0-9\s]{13,19}" id="card_details" name="card_details" autocomplete="cc-number" maxlength="19" placeholder="xxxx xxxx xxxx xxxx" required><br><br>

    <!-- Hidden input field for game ID -->
    <input type="hidden" name="game_id" value="<?php echo isset($_POST['game_id']) ? $_POST['game_id'] : ''; ?>">

    <button type="submit" class="btn btn-lg btn-primary mt-2">Place Order</button>
</form>

</body>
</html>