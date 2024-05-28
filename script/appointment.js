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
        var dropdownId = $(this).data('dropdown-id');
        var dropdown = $('#' + dropdownId + 'Dropdown');
        var icon = $(this).find('.icon');

        // Toggle the display of the dropdown with sliding animation
        dropdown.slideToggle();

        // Toggle the rotation class for the icon
        icon.toggleClass('fa-angle-right fa-angle-down');
    });

    // Close dropdown when clicked outside
    $(document).click(function(event) {
        if (!$(event.target).closest('.dropdown-container').length) {
            $('.dropdown-content').slideUp();
            $('.icon').removeClass('fa-angle-down').addClass('fa-angle-right');
        }
    });

    // Prevent form submission from closing the dropdown for the information form
    $('#informationForm').submit(function(event) {
        event.stopPropagation();
    });
});
