<?php
// Create a PDO connection
try {
    $pdo = new PDO("mysql:host=localhost;dbname=g2gwebsite", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
    // Handle connection error
    die("Connection failed: " . $e->getMessage());
}

// Define the escape function (optional)
function escape($data) {
    if ($data !== null) {
        $data = htmlspecialchars($data, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
        $data = trim($data);
        $data = stripslashes($data);
    }
    return $data;
}

// Example usage
if (isset($_POST['user_name']) && isset($_POST['password'])) {
    $user_name = escape($_POST['user_name']);
    $password = escape($_POST['password']);

    if (!empty($user_name) && !empty($password)) {
        // Prepare and execute a query using PDO
        $query = "SELECT * FROM users WHERE username = :username LIMIT 1";
        $statement = $pdo->prepare($query);
        $statement->execute(['username' => $user_name]);
        $user_data = $statement->fetch(PDO::FETCH_ASSOC);

        if ($user_data) {
            // Verify password
            if (password_verify($password, $user_data['password'])) {
                // Passwords match, authentication successful
                // Handle authentication success
            } else {
                // Passwords don't match, authentication failed
                // Handle authentication failure
            }
        } else {
            // User not found in the database
            // Handle user not found
        }
    } else {
        // Username or password is empty
        // Handle empty input
    }
}
?>
