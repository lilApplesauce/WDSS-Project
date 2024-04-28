<?php

function check_login($pdo)
{
    session_start();

    if (isset($_SESSION['user_id'])) {
        $id = $_SESSION['user_id'];


        $query = "SELECT * FROM users WHERE user_id = ? LIMIT 1";
        $stmt = $pdo->prepare($query);  //prepare sql statement
        $stmt->execute([$id]);  //execute the stmt with user_id as param
        $user_data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user_data) {   //if user data is retrieved
            return $user_data; //returns data
        }
    }

    // Redirect to login
    header("Location: login.php");
    exit;
}

// for user id rng, not obsolete
function random_num($length)
{

	$text = "";
	if($length < 5)
	{
		$length = 5;
	}

	$len = rand(4,$length);

	for ($i=0; $i < $len; $i++) { 
		# code...

		$text .= rand(0,9);
	}

	return $text;
}
