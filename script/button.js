

// Function to handle button click
function toggleButtonColor() {
    var button = this;
    if (button.style.backgroundColor === 'rgb(240, 240, 240)') {
        button.style.backgroundColor = '#65A30D';
    } else {
        button.style.backgroundColor = '#f0f0f0';
    }
}

// Add click event listeners to all buttons with class "timeButton"
var buttons = document.getElementsByClassName('timeButton');
for (var i = 0; i < buttons.length; i++) {
    buttons[i].addEventListener('click', toggleButtonColor);
}
