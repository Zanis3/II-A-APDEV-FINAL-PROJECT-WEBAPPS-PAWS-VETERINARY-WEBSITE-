document.addEventListener('DOMContentLoaded', function() {
    const yearDisplay = document.getElementById('year-display');
    const currentYear = new Date().getFullYear();
    const currentMonth = new Date().getMonth(); // Get the current month (0-11)
    yearDisplay.textContent = currentYear;
    let selectedDate = null;
    const disabledDatesContainer = document.getElementById('disabled-dates-container');
    const disabledDates = {}; // Object to store disabled dates

    // Set the month select options
    const monthSelect = document.getElementById('month-select');
    const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    monthNames.forEach((month, index) => {
        const option = document.createElement('option');
        option.value = index;
        option.textContent = month;
        monthSelect.appendChild(option);
    });

    // Set the month select to the current month
    monthSelect.selectedIndex = currentMonth;

    // Hide the disable button initially
    document.getElementById('disable-container').style.display = 'none';

    // Function to generate calendar dates
    function generateCalendar() {
        const calendarDates = document.querySelector('.calendar-dates');
        calendarDates.innerHTML = ''; // Clear previous dates

        const selectedMonth = monthSelect.value;
        const selectedYear = currentYear;
        const firstDay = new Date(selectedYear, monthSelect.selectedIndex, 1).getDay();
        const daysInMonth = new Date(selectedYear, monthSelect.selectedIndex + 1, 0).getDate();

        // Adjust firstDay to start from Monday (0 for Monday, 6 for Sunday)
        const adjustedFirstDay = (firstDay === 0) ? 6 : firstDay - 1;

        // Fill in the dates
        for (let i = 0; i < adjustedFirstDay; i++) {
            const emptyDiv = document.createElement('div');
            emptyDiv.classList.add('disabled');
            calendarDates.appendChild(emptyDiv);
        }

        for (let i = 1; i <= daysInMonth; i++) {
            const dateDiv = document.createElement('div');
            dateDiv.textContent = i;
            dateDiv.addEventListener('click', function() {
                if (selectedDate && selectedDate !== dateDiv) {
                    selectedDate.classList.remove('selected');
                }
                if (selectedDate !== dateDiv) {
                    selectedDate = dateDiv;
                    dateDiv.classList.add('selected');
                    document.getElementById('disable-container').style.display = 'block';
                } else {
                    selectedDate.classList.remove('selected');
                    selectedDate = null;
                    document.getElementById('disable-container').style.display = 'none';
                }
            });
            calendarDates.appendChild(dateDiv);
        }

        // Apply disabled dates for the selected month
        const monthYearKey = `${selectedYear}-${selectedMonth}`;
        if (disabledDates[monthYearKey]) {
            disabledDates[monthYearKey].forEach(day => {
                const dateDiv = calendarDates.children[adjustedFirstDay + day - 1];
                dateDiv.classList.add('disabled');
            });
        }
    }

    function confirmDisable() {
        if (selectedDate) {
            const confirmDisable = confirm("Are you sure you want to disable this date?");
            if (confirmDisable) {
                selectedDate.classList.add('disabled');
                selectedDate.classList.remove('selected');
                selectedDate.classList.remove('clickable'); // Remove the clickable class to disable further selection
                selectedDate.removeEventListener('click', disableDateClick); // Remove the click event listener
                addDisabledDate(selectedDate);
                selectedDate = null;
                document.getElementById('disable-container').style.display = 'none';
            }
        }
    }

    function addDisabledDate(dateDiv) {
        const selectedMonth = monthSelect.value;
        const selectedYear = currentYear;
        const dateText = `${monthNames[selectedMonth]} ${dateDiv.textContent}, ${selectedYear}`;

        const disabledDateButton = document.createElement('button');
        disabledDateButton.textContent = dateText;
        disabledDateButton.classList.add('disabled-date-button');
        disabledDateButton.addEventListener('click', function() {
            const confirmEnable = confirm("Are you sure you want to enable it again?");
            if (confirmEnable) {
                dateDiv.classList.remove('disabled');
                disabledDatesContainer.removeChild(disabledDateButton);
                removeDisabledDate(dateDiv.textContent);
            }
        });

        disabledDatesContainer.appendChild(disabledDateButton);

        // Store the disabled date
        const monthYearKey = `${selectedYear}-${selectedMonth}`;
        if (!disabledDates[monthYearKey]) {
            disabledDates[monthYearKey] = [];
        }
        disabledDates[monthYearKey].push(parseInt(dateDiv.textContent));
    }

    function removeDisabledDate(day) {
        const selectedMonth = monthSelect.value;
        const selectedYear = currentYear;
        const monthYearKey = `${selectedYear}-${selectedMonth}`;
        if (disabledDates[monthYearKey]) {
            disabledDates[monthYearKey] = disabledDates[monthYearKey].filter(d => d !== parseInt(day));
        }
    }

    function disableDateClick(event) {
        const dateDiv = event.currentTarget;
        if (dateDiv.classList.contains('disabled')) {
            dateDiv.classList.remove('disabled');
            const buttons = disabledDatesContainer.querySelectorAll('button');
            buttons.forEach(button => {
                if (button.textContent.includes(dateDiv.textContent)) {
                    disabledDatesContainer.removeChild(button);
                }
            });
        }
    }

    // Generate calendar on page load and when month changes
    generateCalendar();
    monthSelect.addEventListener('change', generateCalendar);
    document.getElementById('disable-button').addEventListener('click', confirmDisable);
});
