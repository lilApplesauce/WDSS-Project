<?php
/**
 * Function to query information based on
 * a parameter: in this case, location.
 *
 */
if (isset($_POST['submit'])) {
    try {
        require "../common.php";
        require_once '../connection.php';
        $sql = "SELECT *
 FROM users
 WHERE location = :location";
        $location = $_POST['location'];
        $statement = $connection->prepare($sql);
        $statement->bindParam(':location', $location, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchAll();
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
require ".//templates/header.php";
if (isset($_POST['submit'])) {
if ($result && $statement->rowCount() > 0) {
?>
<h2>Results</h2>
<table>
    <thead>

    <tr>
        <th>user_id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email Address</th>
        <th>Age</th>
        <th>Location</th>
        <th>Date</th>
        <th>Password</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($result as $row) { ?>
        <tr>
            <td><?php echo escape($row["user_id"]); ?></td>
            <td><?php echo escape($row["firstname"]); ?></td>
            <td><?php echo escape($row["lastname"]); ?></td>
            <td><?php echo escape($row["email"]); ?></td>
            <td><?php echo escape($row["age"]); ?></td>
            <td><?php echo escape($row["location"]); ?></td>
            <td><?php echo escape($row["date"]); ?> </td>
            <td><?php echo escape($row["password"]); ?> </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<?php } else { ?>
    > No results found for <?php echo escape($_POST['location']); ?>.
<?php }
} ?>
    <h2>Find user based on location</h2>
    <form method="post">
        <label for="location">Location</label>
        <input type="text" id="location" name="location">
        <input type="submit" name="submit" value="View Results">
    </form>
    <a href="../adminAccess.php">Back to home</a>
<?php require "templates/footer.php"; ?>