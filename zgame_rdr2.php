<!DOCTYPE html>
<html lang="en">
<head>
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
        <img src="images/rdr2pccover.jpg" alt="Product Image">
    </div>
    <div class="details-container">
        <?php
        // Include the connection file
        include 'connection.php';

        try {
            // Fetch product details from the database
            $game_id = 3; // Set the games_id of the product you want to display
            $stmt = $pdo->prepare("SELECT * FROM games WHERE game_id = 3");
            $stmt->execute([":game_id" => $game_id]);
            $product = $stmt->fetchAll();

            if ($product) {
                ?>
                <h2><?php echo $product['game_name']; ?></h2>
                <p>Price: $<?php echo $product['game_price']; ?></p>
                <p>Description: <?php echo $product['description']; ?></p>
                <div class="button-container">
                    <button>Add to Cart</button>
                </div>
                <?php
            } else {
                echo "Product not found.";
            }
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        ?>
    </div>
</div>
</body>
</html>
