<?php
session_start();

// Include the database connection file
require_once("connection.php");

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Check if username and password were submitted
    if (isset($_POST['user_name']) && isset($_POST['password'])) {
        // Retrieve username and password from the form
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        // Check if username is not empty and is not numeric
        if (!empty($user_name) && !is_numeric($user_name)) {
            // Read user data from the database
            $query = "SELECT * FROM users WHERE firstname = ? LIMIT 1";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$user_name]);
            $user_data = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verify if user exists and password is correct
            if ($user_data && password_verify($password, $user_data['password'])) {
                // if verification  successful, set session variables
                $_SESSION['user_id'] = $user_data['user_id'];
                $_SESSION['is_admin'] = ($user_data['firstname'] === 'admin'); // Check if firstname is 'admin' for admin

                // Redirect to index or admin
                if ($_SESSION['is_admin']) {
                    header("Location: adminAccess.php");
                } else {
                    header("Location: index.php");
                }
                exit;
            } else {
                // User not found or incorrect password, redirect with error message
                echo "<script>alert('Error: User not found')</script>";

            }
        } else {
            // Invalid username format, redirect with error message
            echo "<script>alert('Error: Empty Fields')</script>";
        }
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<?php include('Layout/Header2.php'); ?>

<style type="text/css">

    #text{

        height: 25px;
        border-radius: 5px;
        padding: 4px;
        border: solid thin #000000;
        width: 100%;
    }

    #button{

        padding: 10px;
        width: 100px;
        color: white;
        background-color: lightblue;
        border: none;
    }

    #box{

        background-color: darkslategrey;
        margin-top: 50px;
        margin-left: auto;
        margin-right: auto;
        width: 300px;
        padding: 20px;
    }

</style>
<body background="images/grey.png">
<div id="box">

    <form method="post">
        <div style="font-size: 20px;margin: 10px;color: white;">Login</div>

        <label for="first_name">First Name</label>
        <input id="text" type="text" name="user_name"><br><br>

        <label for="password">Password</label>
        <input id="text" type="password" name="password"><br><br>

        <input id="button" type="submit" value="Login"><br><br>

        <a href="signup.php">Click to Signup</a><br><br>
    </form>
</div>
<?php include('Layout/Footer.php'); ?>
</html>
