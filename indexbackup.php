<!DOCTYPE html>
<html>
<?php include('Layout/Header.php'); ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Store</title>
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
    </style>
</head>
<body>
<!-- Slider -->
<div class="slider">
    <div class="slider-content">
        <!-- You can add your slide images here -->
        <img src="images/SHAFT.png" alt="Slide 1">
        <img src="images/elisocray_siri.jpg" alt="Slide 2">
        <img src="images/STASIS.png" alt="Slide 3">
    </div>
</div>

<!-- Gallery -->
<div class="gallery">
    <!-- First row -->
    <div class="gallery-item">
        <a href="gameView/dmcps5.php"><img src="images/dmc5PS5.jpg" alt="Image 1"></a>
    </div>
    <div class="gallery-item">
        <a href="gameView/dmcxbox.php"><img src="images/zelda2.jpg" alt="Image 2"></a>
    </div>
    <div class="gallery-item">
        <a href="gameView/raymanps5.php"><img src="images/rdr2pccover.jpg" alt="Image 3"></a>
    </div>
    <div class="gallery-item">
        <a href="gameView/raymanxbox.php"><img src="images/raymanLegendsXBOXONE.png" alt="Image 4"></a>
    </div>
    <div class="gallery-item">
        <a href="gameView/zgame_helldivers.php"><img src="images/helldiverspc.jpg" alt="Image 5"></a>
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







<?php include('Layout/Footer.php'); ?>
</html>