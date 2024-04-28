<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    // If logged in, display the logout button
    include ("Layout/HeaderLogout.php");
} else {
    // If not logged in, display the login button
    include ("Layout/Header.php");
}





// Handle logout
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['logout'])) {
    // Unset all of the session variables
    $_SESSION = array();

    // Destroy the session.
    session_destroy();

    // Redirect to the current page to clear the POST data
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="html/css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="html/css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="html/css/responsive.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="html/css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="html/css/owl.carousel.min.css">
    <link rel="stylesheet" href="html/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
</head>
    <style>
        /* Basic styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .slider {
            width: 100%;
            height: 300px;
            overflow: hidden;
            position: relative;
        }
        .slider img {
            width: 100%;
            height: auto;
        }
        .slider-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
        }
        .gallery {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 20px;
        }
        .gallery-item {
            width: 18%;
            margin: 10px;
        }
        .gallery-item img {
            width: 100%;
            height: auto;
            cursor: pointer;
        }

        img {
            border: 5px solid #555;
        }



    </style>
</head>
<body background="images/grey.png">
<!-- Slider -->
<div class="slider">
    <div class="slider-content">
        <!-- You can add your slide images here -->
        <img src="images/SHAFT.png" alt="Slide 1">
        <img src="images/STASIS.png" alt="Slide 2">
        <img src="images/G2G.png" alt="Slide 3">
        <img src="images/witcher.jpg" alt="Slide 4">
        <img src="images/bf2042.jpg" alt="Slide 5">

    </div>
</div>

<!-- Gallery -->
<div class="gallery">
    <!-- First row -->
    <div class="gallery-item">
        <a href="zgame_dmcps5.php"><img src="images/dmc5PS5.jpg" alt="Image 1"></a>
    </div>
    <div class="gallery-item">
        <a href="zgame_totk.php"><img src="images/zelda2.jpg" alt="Image 2"></a>
    </div>
    <div class="gallery-item">
        <a href="zgame_rdr2.php"><img src="images/rdr2pccover.jpg" alt="Image 3"></a>
    </div>
    <div class="gallery-item">
        <a href="zgame_rayman.php"><img src="images/raymanLegendsXBOXONE.png" alt="Image 4"></a>
    </div>
    <div class="gallery-item">
        <a href="zgame_helldivers.php"><img src="images/helldiverspc.jpg" alt="Image 5"></a>
    </div>
</div>



<script>
    // JavaScript to rotate slides every 20 seconds
    const slides = document.querySelectorAll('.slider img');
    let currentSlide = 0;

    function nextSlide() {
        slides[currentSlide].style.display = 'none';
        currentSlide = (currentSlide + 1) % slides.length;
        slides[currentSlide].style.display = 'block';
    }

    setInterval(nextSlide, 5000);
</script>
</body>







<?php include('public/templates/footertemplate.html'); ?>
</html>