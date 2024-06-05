function showContent(page) {
    const content = document.getElementById('content');
    if (page === 'doctor') {
        content.innerHTML = `
            <table class="doctor-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Specialization</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Dr. John Doe</td>
                        <td>GPV</td>
                    </tr>
                    <tr>
                        <td>Dr. Jane Smith</td>
                        <td>GPV</td>
                    </tr>
                    <tr>
                        <td>Dr. White</td>
                        <td>IMS</td>
                    </tr>
                    <tr>
                        <td>Dr. Nguyen</td>
                        <td>IMS</td>
                    </tr>
                    <tr>
                        <td>Dr. Dr.Johnson</td>
                        <td>Surgeon</td>
                    </tr>
                    <tr>
                        <td>Dr. Patel</td>
                        <td>Surgeon</td>
                    </tr>
                    <tr>
                        <td>Dr. Chen</td>
                        <td>Dentist</td>
                    </tr>
                    <tr>
                        <td>Dr. Rodriguez</td>
                        <td>Dentist</td>
                    </tr>
                    <tr>
                        <td>Ms. Smith</td>
                        <td>Groomer</td>
                    </tr>
                    <tr>
                        <td>Mr. Lee</td>
                        <td>Groomer</td>
                    </tr>
                </tbody>
            </table>
        `;
    } else if (page === 'reports') {
        content.innerHTML = `
            <div class="reports-container">
                <div class="reports-buttons">
                    <h2> Select Reports </h2>
                    <button onclick="showAppointments('today')"><b>Today</b></button>
                    <button onclick="showAppointments('week')"><b>This Week</b></button>
                    <button onclick="showAppointments('month')"><b>This Month</b></button>
                </div>
                <div id="appointments-content"></div>
            </div>
        `;
    } else if (page === 'calendar') {
        content.innerHTML = `
            <div class="calendar-container">
                <div class="calendar-header">
                    <select id="month-select" onchange="renderCalendar()">
                        <option value="0">January</option>
                        <option value="1">February</option>
                        <option value="2">March</option>
                        <option value="3">April</option>
                        <option value="4">May</option>
                        <option value="5">June</option>
                        <option value="6">July</option>
                        <option value="7">August</option>
                        <option value="8">September</option>
                        <option value="9">October</option>
                        <option value="10">November</option>
                        <option value="11">December</option>
                    </select>
                    <span id="current-year"></span>
                </div>
                <div class="calendar-body">
                    <div class="calendar-days">
                        <div>Mon</div>
                        <div>Tue</div>
                        <div>Wed</div>
                        <div>Thu</div>
                        <div>Fri</div>
                        <div>Sat</div>
                    </div>
                    <div class="calendar-dates" id="calendar-dates"></div>
                </div>
                <div id="popup-container" class="popup-container">
                    <button id="disable-button" onclick="disableDate()">Disable</button>
                    <button id="enable-button" onclick="enableDate()">Enable</button>
                </div>
                <div id="disabled-dates-container" class="disabled-dates-container">
                    <h3>Disabled Dates</h3>
                    <ul id="disabled-dates-list"></ul>
                </div>
            </div>
        `;
        renderCalendar();
    }
}

let disabledDates = [];

function renderCalendar() {
    const currentYear = new Date().getFullYear();
    const monthSelect = document.getElementById('month-select');
    const month = parseInt(monthSelect.value);
    const year = currentYear;
    const firstDayOfMonth = new Date(year, month, 1).getDay();
    const daysInMonth = new Date(year, month + 1, 0).getDate();
    const calendarDates = document.getElementById('calendar-dates');
    const popupContainer = document.getElementById('popup-container');
    const disableButton = document.getElementById('disable-button');
    const enableButton = document.getElementById('enable-button');
    let selectedDateElement = null;

    document.getElementById('current-year').textContent = year;

    calendarDates.innerHTML = '';

    // Adjust for the calendar starting on Monday
    const adjustedFirstDay = (firstDayOfMonth === 0) ? 6 : firstDayOfMonth - 1;

    // Fill in the empty slots before the first day of the month
    for (let i = 0; i < adjustedFirstDay; i++) {
        calendarDates.innerHTML += `<div></div>`;
    }

    for (let i = 1; i <= daysInMonth; i++) {
        const dateElement = document.createElement('div');
        dateElement.textContent = i;
        dateElement.addEventListener('click', function() {
            selectedDateElement = dateElement;
            popupContainer.classList.add('active');
            if (selectedDateElement.classList.contains('disabled')) {
                disableButton.style.display = 'none';
                enableButton.style.display = 'inline-block';
            } else {
                disableButton.style.display = 'inline-block';
                enableButton.style.display = 'none';
            }
        });

        // Check if the date is in the disabledDates array
        if (disabledDates.some(d => d.date == i && d.month == month && d.year == year)) {
            dateElement.classList.add('disabled');
        }

        calendarDates.appendChild(dateElement);
    }


    window.disableDate = function() {
        if (selectedDateElement) {
            if (window.confirm("Are you sure you want to disable this date?")) {
                selectedDateElement.classList.add('disabled');
                const dateInfo = {
                    date: selectedDateElement.textContent,
                    month: month,
                    year: currentYear
                };
                disabledDates.push(dateInfo);
                renderDisabledDates();
                popupContainer.classList.remove('active');
            }
        }
    };

    window.enableDate = function() {
        if (selectedDateElement) {
            if (window.confirm("Are you sure you want to enable this date?")) {
                selectedDateElement.classList.remove('disabled');
                const dateInfo = {
                    date: selectedDateElement.textContent,
                    month: month,
                    year: currentYear
                };
                disabledDates = disabledDates.filter(d => !(d.date == dateInfo.date && d.month == dateInfo.month && d.year == dateInfo.year));
                renderDisabledDates();
                popupContainer.classList.remove('active');
            }
        }
    };
}

function renderDisabledDates() {
    const disabledDatesList = document.getElementById('disabled-dates-list');
    disabledDatesList.innerHTML = '';
    disabledDates.forEach(dateInfo => {
        const listItem = document.createElement('li');
        listItem.textContent = `${dateInfo.date} ${new Date(dateInfo.year, dateInfo.month).toLocaleString('default', { month: 'long' })} ${dateInfo.year}`;
        listItem.addEventListener('click', function() {
            if (window.confirm("Are you sure you want to enable this date?")) {
                const monthSelect = document.getElementById('month-select');
                monthSelect.value = dateInfo.month;
                renderCalendar();
                const calendarDates = document.getElementById('calendar-dates');
                const dateElement = Array.from(calendarDates.children).find(el => el.textContent == dateInfo.date);
                if (dateElement) {
                    dateElement.classList.remove('disabled');
                    disabledDates = disabledDates.filter(d => !(d.date == dateInfo.date && d.month == dateInfo.month && d.year == dateInfo.year));
                    renderDisabledDates();
                }
            }
        });
        disabledDatesList.appendChild(listItem);
    });
}

function showAppointments(period) {
    const appointmentsContent = document.getElementById('appointments-content');
    let message = '';
    switch (period) {
        case 'today':
            message = 'Showing appointments for today.';
            break;
        case 'week':
            message = 'Showing appointments for this week.';
            break;
        case 'month':
            message = 'Showing appointments for this month.';
            break;
    }
    appointmentsContent.innerHTML = `<p>${message}</p>`;
}

window.onload = function() {
    const currentMonth = new Date().getMonth();
    document.getElementById('month-select').value = currentMonth;
    renderCalendar();
};
