function toggleDropdown(trigger) {
    var content = trigger.nextElementSibling;

    // Toggle the active class
    content.classList.toggle("active");
    var isActive = content.classList.contains("active");

    if (isActive) {
        content.style.display = "block";
        trigger.querySelector('.icon').innerHTML = '<i class="fas fa-angle-up"></i>';
    } else {
        content.style.display = "none";
        trigger.querySelector('.icon').innerHTML = '<i class="fas fa-angle-down"></i>';
    }

    // Add or remove class to indicate basic info dropdown active status
    if (trigger.querySelector('.text').innerText.trim() === "BASIC INFORMATION") {
        if (isActive) {
            document.body.classList.add("basic-info-active");
        } else {
            document.body.classList.remove("basic-info-active");
        }
    }
}

document.addEventListener("DOMContentLoaded", function() {
    const currentHour = new Date().getHours();
    const greetingElement = document.getElementById("greeting");
    let greetingMessage;
    if (currentHour >= 5 && currentHour < 12) {
        greetingMessage = "Good Morning!";
    } else if (currentHour >= 12 && currentHour < 18) {
        greetingMessage = "Good Afternoon!";
    } else {
        greetingMessage = "Good Evening!";
    }
    greetingElement.textContent = greetingMessage;
});
