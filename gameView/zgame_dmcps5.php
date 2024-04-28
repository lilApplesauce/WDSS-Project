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
        <img src="path_to_your_image.jpg" alt="Product Image">
    </div>
    <div class="details-container">
        <?php
        // Include the connection file
        include 'connection.php';

        try {
            // Fetch product details from the database
            $games_id = 1; // Set the games_id of the product you want to display
            $query = "SELECT game_name, game_price, description FROM games WHERE games_id = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$games_id]);
            $product = $stmt->fetch(PDO::FETCH_ASSOC);

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
