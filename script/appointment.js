$(document).ready(function() {
    // Set greeting message based on the time of day
    var currentHour = new Date().getHours();
    var greetingElement = $('#greeting');
    var greetingMessage;
    if (currentHour >= 5 && currentHour < 12) {
        greetingMessage = "Good Morning!";
    } else if (currentHour >= 12 && currentHour < 18) {
        greetingMessage = "Good Afternoon!";
    } else {
        greetingMessage = "Good Evening!";
    }
    greetingElement.text(greetingMessage);

    // Toggle dropdown function using jQuery
    $('.dropdown-header').click(function() {
        $(this).next('.dropdown-content').slideToggle();
    });
});
