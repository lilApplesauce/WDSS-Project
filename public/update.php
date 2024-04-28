<?php
require "../common.php"; // Include common.php to access $pdo

try {
    // Fetch all users from the database
    $sql = "SELECT * FROM users";
    $statement = $pdo->query($sql);
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $error) {
    echo "Error fetching users: " . $error->getMessage();
}

?>

<?php require "templates/header.php"; ?>
<h2>Update users</h2>
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
        <th>Edit</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($result as $row) : ?>
        <tr>
            <td><?php echo escape($row["user_id"]); ?></td>
            <td><?php echo escape($row["firstname"]); ?></td>
            <td><?php echo escape($row["lastname"]); ?></td>
            <td><?php echo escape($row["email"]); ?></td>
            <td><?php echo escape($row["age"]); ?></td>
            <td><?php echo escape($row["location"]); ?></td>
            <td><?php echo escape($row["date"]); ?> </td>
            <!-- Replace the link with your edit functionality -->
            <td><a href="#">Edit</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<a href="../adminAccess.php">Back to home</a>
<?php require "templates/footer.php"; ?>

