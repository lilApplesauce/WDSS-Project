

<?php require "../config.php"; ?>

<?php
// Attempt to delete the user if an ID is provided
if (isset($_GET["id"])) {
    try {
        require_once '../connection.php';
        $user_id = $_GET["id"];
        $sql = "DELETE FROM users WHERE user_id = :user_id";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':user_id', $user_id);
        $statement->execute();
        $success = "User " . $user_id . " successfully deleted";
    } catch(PDOException $error) {
        echo "Error deleting user: " . $error->getMessage();
    }
}

// Fetch all users from the database
try {
    require_once '../connection.php';
    $sql = "SELECT * FROM users";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll();
} catch(PDOException $error) {
    echo "Error fetching users: " . $error->getMessage();
}
?>

<?php require "templates/header.php"; ?>
<h2>Delete users</h2>
<?php if (!empty($success)) echo "<p>$success</p>"; ?>
<table>
    <thead>
    <tr>
        <th>User ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email Address</th>
        <th>Age</th>
        <th>Location</th>
        <th>Date</th>
        <th>Password</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($result as $row) : ?>
        <tr>
            <td><?php echo htmlspecialchars($row["user_id"]); ?></td>
            <td><?php echo htmlspecialchars($row["firstname"]); ?></td>
            <td><?php echo htmlspecialchars($row["lastname"]); ?></td>
            <td><?php echo htmlspecialchars($row["email"]); ?></td>
            <td><?php echo htmlspecialchars($row["age"]); ?></td>
            <td><?php echo htmlspecialchars($row["location"]); ?></td>
            <td><?php echo htmlspecialchars($row["date"]); ?> </td>
            <td><?php echo htmlspecialchars($row["password"]); ?> </td>
            <td><a href="delete.php?id=<?php echo htmlspecialchars($row["user_id"]); ?>">Delete</a></td>
        </tr>

    <?php endforeach; ?>
    </tbody>
</table>
<a href="../adminAccess.php">Back to home</a>
<?php require "../templates/footer.php"; ?>
