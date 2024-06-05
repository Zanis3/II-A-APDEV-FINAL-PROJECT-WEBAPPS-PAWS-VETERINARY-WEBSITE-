document.addEventListener('DOMContentLoaded', function() {
    let currentIndex = 1;
    const slides = document.querySelectorAll('.feedback-slide');
    const numbers = document.querySelectorAll('.number');
    let interval;

    function updateActiveSlide() {
        slides.forEach((slide, index) => {
            slide.classList.remove('active', 'inactive');
            if (index === currentIndex - 1) {
                slide.classList.add('active');
            } else {
                slide.classList.add('inactive');
            }
        });
        numbers.forEach(number => number.classList.remove('active'));
        numbers[(currentIndex - 1) % slides.length].classList.add('active');
    }

    function showSlide(index) {
        currentIndex = index;
        updateActiveSlide();
        resetInterval();
    }

    function nextSlide() {
        currentIndex = (currentIndex % slides.length) + 1;
        updateActiveSlide();
    }

    function prevSlide() {
        currentIndex = (currentIndex - 1 + slides.length) % slides.length;
        if (currentIndex === 0) {
            currentIndex = slides.length;
        }
        updateActiveSlide();
    }

    function resetInterval() {
        clearInterval(interval);
        interval = setInterval(nextSlide, 10000);
    }

    updateActiveSlide(); // Initialize the first active slide
    interval = setInterval(nextSlide, 10000); // Start the automatic slide change

    window.nextSlide = nextSlide;
    window.prevSlide = prevSlide;

    // Add click event listeners to the number indicators
    numbers.forEach((number, index) => {
        number.addEventListener('click', () => showSlide(index + 1));
    });
});