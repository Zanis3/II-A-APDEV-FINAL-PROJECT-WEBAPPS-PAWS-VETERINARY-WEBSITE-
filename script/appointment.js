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

    const dropdownTrigger = document.querySelector('.trigger');
    const dropdownContent = document.querySelector('.content');
    const icon = document.querySelector('.icon i');

    dropdownTrigger.addEventListener('click', function() {
        dropdownContent.classList.toggle('active');
        // Calculate the rotation based on the dropdown state
        icon.style.transform = dropdownContent.classList.contains('active') ? 'rotate(180deg)' : 'rotate(90deg)';
    });

    // Add an event listener to close the dropdown and rotate the icon to face right when clicking outside the dropdown
    document.addEventListener('click', function(event) {
        if (!dropdownTrigger.contains(event.target)) {
            dropdownContent.classList.remove('active');
            icon.style.transform = 'rotate(90deg)'; // Ensure the icon faces right when the dropdown is closed
        }
    });
});
