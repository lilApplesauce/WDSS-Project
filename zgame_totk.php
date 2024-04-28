<?php
session_start();

// Include connection file
include 'connection.php';

// Function to get game information by ID
function getGameInfo($game_id, $pdo) {
    $stmt = $pdo->prepare("SELECT * FROM games WHERE game_id = ?");
    $stmt->execute([$game_id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Get game ID from query parameter or default to 1
$game_id = isset($_GET['game_id']) ? $_GET['game_id'] : 2;

// Get game information
$game = getGameInfo($game_id, $pdo);
$gameStock = $game["game_stock"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('Layout/gameheader.php'); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <style>
        .container {
            display: flex;
            align-items: center;
        }
        .image-container {
            flex: 0 0 40%;
            margin-right: 20px;
        }
        .image-container img {
            width: 100%;
            height: auto;
        }
        .details-container {
            flex: 1;
        }
        .button-container {
            margin-top: 20px;
        }
        .button-container button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="image-container">
        <img src="images/zelda2.jpg" alt="Product Image">
    </div>

    <div class="details-container">
        <?php if ($gameStock > 0): ?>
            <p>
                <strong>Game Name:</strong> <?php echo $game["game_name"]; ?><br>
                <strong>Price:</strong> $<?php echo $game["game_price"]; ?><br>
                <strong>Rating:</strong> <?php echo $game["game_rating"]; ?><br>
                <strong>Category:</strong> <?php echo $game["game_category"]; ?><br>
                <strong>Stock:</strong> <?php echo $game["game_stock"]; ?><br>
            </p>
            <form method="post" action="checkout.php">
                <input type="hidden" name="game_id" value="<?php echo $game_id; ?>">
                <input type="submit" name="buy_game" value="Buy">
            </form>
        <?php else: ?>
            <p>
                <strong>Game Name:</strong> <?php echo $game["game_name"]; ?><br>
                <strong>Price:</strong> $<?php echo $game["game_price"]; ?><br>
                <strong>Rating:</strong> <?php echo $game["game_rating"]; ?><br>
                <strong>Category:</strong> <?php echo $game["game_category"]; ?><br>
                <strong>Stock:</strong> <?php echo $game["game_stock"]; ?><br>
            </p>
            <?php echo "We are sorry! The game seems to be out of stock." ?>
        <?php endif; ?>
    </div>
</div>
</body>
<?php include('Layout/Footer.php'); ?>
</html>
