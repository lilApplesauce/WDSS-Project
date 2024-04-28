<?php
// Include the database connection file
require_once("connection.php");

// Retrieve all user records
$query = "SELECT user_id, password FROM users";
$stmt = $pdo->query($query);
$passwords = [];

// Hash passwords
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $hashedPassword = password_hash($row['password'], PASSWORD_DEFAULT);
    $passwords[$row['user_id']] = $hashedPassword;
}

// Update passwords in the database
foreach ($passwords as $userId => $hashedPassword) {
    $query = "UPDATE users SET password = ? WHERE user_id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$hashedPassword, $userId]);
}
?>

