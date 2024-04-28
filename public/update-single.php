<?php
// Attempt to update the user if form is submitted
if (isset($_POST['submit'])) {
    try {
        require_once '../connection.php';
        $user = [
            "user_id" => $_POST['user_id'],
            "firstname" => $_POST['firstname'],
            "lastname" => $_POST['lastname'],
            "email" => $_POST['email'],
            "age" => $_POST['age'],
            "location" => $_POST['location'],
            "date" => $_POST['date']
        ];
        $sql = "UPDATE users
                SET user_id = :user_id,
                    firstname = :firstname,
                    lastname = :lastname,
                    email = :email,
                    age = :age,
                    location = :location,
                    date = :date
                WHERE user_id = :user_id";
        $statement = $pdo->prepare($sql);
        $statement->execute($user);
    } catch(PDOException $error) {
        echo "Error updating user: " . $error->getMessage();
    }
}

// Fetch user data for editing
if (isset($_GET['id'])) {
    try {
        require_once '../connection.php';
        $user_id = $_GET['id'];
        $sql = "SELECT * FROM users WHERE user_id = :user_id";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':user_id', $user_id);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $error) {
        echo "Error fetching user: " . $error->getMessage();
    }
} else {
    echo "Something went wrong!";
    exit;
}
?>

<?php require "../templates/header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) : ?>
    <?php echo escape($_POST['firstname']); ?> successfully updated.
<?php endif; ?>
<h2>Edit a user</h2>
<form method="post">
    <?php foreach ($user as $key => $value) : ?>
        <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
        <input type="text" name="<?php echo $key; ?>" id="<?php echo $key;
        ?>" value="<?php echo escape($value); ?>" <?php echo ($key === 'id' ?
            'readonly' : null); ?>>
    <?php endforeach; ?>
    <input type="submit" name="submit" value="Submit">
</form>
<a href="index.php">Back to home</a>
<?php require "../templates/footer.php"; ?>
