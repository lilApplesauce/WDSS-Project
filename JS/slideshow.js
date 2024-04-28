
    // JavaScript to rotate slides every 20 seconds
    const slides = document.querySelectorAll('.slider img');
    let currentSlide = 0;

    function nextSlide() {
    slides[currentSlide].style.display = 'none';
    currentSlide = (currentSlide + 1) % slides.length;
    slides[currentSlide].style.display = 'block';
}

    setInterval(nextSlide, 5000);
