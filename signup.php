<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

    //changed to connection.php from DBconnect.php
    include("connection.php");
	include("functions.php");

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $age = ($_POST['age']);
        $location = ($_POST['location']);
		$password = $_POST['password'];

        if (!empty($user_name) && !empty($lastname) && !empty($email) && !empty($password) && !empty($age) && !empty($location) && !is_numeric($user_name)) {


			//save to database USED FOR MYSQLI (CHANGE BACK IF DOESNT WORK)
			//$user_id = random_num(20);
            //$query = "INSERT INTO users (user_id, firstname, lastname, email, age, location, password) VALUES ('$user_id', '$user_name', '$lastname', '$email', '$age', '$location', '$password')";
            //mysqli_query($con, $query);

            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            // Save to database
            $user_id = random_num(10);

            // Using PDO for database connection and prepared statements
            $query = "INSERT INTO users (user_id, firstname, lastname, email, age, location, password) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$user_id, $user_name, $lastname, $email, $age, $location, $password]);


			header("Location: login.php");
			die;
		}else
		{
            echo "<script>alert('Please enter valid information')</script>";
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<?php include('Layout/Header2.php'); ?>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
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

		background-color: grey;
		width: 350px;
		padding: 20px;
        margin-left: 60px;
        margin-top: 10px;
	}



	</style>

	<div id="box">
		
		<form name="signupForm" method="post">
			<div style="margin-left:125px; color: white;">Signup</div>

            <label for="first_name">First Name:</label>
			<input id="text" type="text" name="firstname"><br><br>

            <label for="last_name">Last Name:</label>
            <input id="text" type="text" name="lastname"><br><br>

            <label for="email">Email:</label>
            <input id="text" type="email" name="email"><br><br>

            <label for="age">Age:</label>
			<input id="text" type="number" name="age"><br><br>

            <label for="location">Location:</label>
            <input id="text" type="text" name="location"><br><br>

            <label for="password">Password:</label>
            <input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Signup"><br><br>

            <a href="login.php" class="btn btn-lg btn-primary mt-2">Click To Login</a>
		</form>
	</div>


</body>
<?php include('Layout/footer.php'); ?>
</html>