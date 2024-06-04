let slideIndex = 0;
showSlides();

function showSlides() {
    let slides = document.getElementsByClassName("feedback-slide");
    let dots = document.getElementsByClassName("dot");
    
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
        dots[i].classList.remove("active");
    }
    
    slideIndex++;
    if (slideIndex > slides.length) { slideIndex = 1; }
    
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].classList.add("active");
    
    setTimeout(showSlides, 20000); // Change slide every 20 seconds
}

// Add event listeners to the dots to allow manual selection of the slides
let dotElements = document.getElementsByClassName("dot");
for (let i = 0; i < dotElements.length; i++) {
    dotElements[i].addEventListener("click", function() {
        slideIndex = i;
        showSlides();
    });
}