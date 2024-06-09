const calendar = document.getElementById('calendar');
const selectedDateDiv = document.getElementById('selected-date');
const yearDisplay = document.getElementById('year-display');
const timeSlotsDiv = document.getElementById('time-slots');
let currentDate = new Date();
let selectedDate = null;
let activeTimeSlot = null;

function renderCalendar() {
    calendar.innerHTML = '';
    const startDate = new Date(currentDate);
    startDate.setDate(startDate.getDate() - startDate.getDay() + 1); // Start from Monday
    for (let i = 0; i < 6; i++) { // Only show Monday to Saturday
        const date = new Date(startDate);
        date.setDate(startDate.getDate() + i);
        const dateContainer = document.createElement('div');
        dateContainer.classList.add('date-container');
        dateContainer.innerHTML = `
            <div class="date-content">
                <div class="day">${date.toLocaleString('default', { weekday: 'long' })}</div>
                <div class="date">${date.getDate()}</div>
                <div class="month">${date.toLocaleString('default', { month: 'long' })}</div>
            </div>
        `;
        if (date < new Date()) {
            dateContainer.classList.add('disabled'); // Disable past dates// Set background color for past dates
        } else {
            dateContainer.onclick = () => selectDate(date);
        }
        if (selectedDate && date.toDateString() === selectedDate.toDateString()) {
            dateContainer.classList.add('selected');
        }
        calendar.appendChild(dateContainer);
    }
    yearDisplay.innerHTML = currentDate.getFullYear();
}

function moveLeft() {
    currentDate.setDate(currentDate.getDate() - 7);
    renderCalendar();
}

function moveRight() {
    currentDate.setDate(currentDate.getDate() + 7);
    renderCalendar();
}

function selectDate(date) {
    if (selectedDate && date.toDateString() === selectedDate.toDateString()) {
        // Unselect the date
        selectedDate = null;
        selectedDateDiv.innerHTML = '';
        timeSlotsDiv.innerHTML = '';
        setHiddenFields('', ''); // Clear hidden fields
    } else {
        // Select the date
        selectedDate = date;
        selectedDateDiv.innerHTML = `Selected Date: ${date.toLocaleString('default', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' })}`;
        setHiddenFields(date.toISOString().split('T')[0], activeTimeSlot ? activeTimeSlot.innerHTML : ''); // Set hidden fields
        renderTimeSlots();
    }
    renderCalendar();
}

function renderTimeSlots() {
    timeSlotsDiv.innerHTML = '';
    const timeSlots = [
        '9:00 AM - 10:00 AM',
        '10:00 AM - 11:00 AM',
        '11:00 AM - 12:00 PM',
        '12:00 PM - 1:00 PM',
        '1:00 PM - 2:00 PM',
        '2:00 PM - 3:00 PM',
        '3:00 PM - 4:00 PM',
        '4:00 PM - 5:00 PM'
    ];
    const timeSlotsContainer = document.createElement('div');
    timeSlotsContainer.classList.add('time-slots');
    timeSlots.forEach(slot => {
        const slotButton = document.createElement('button');
        slotButton.classList.add('time-slot');
        slotButton.innerHTML = slot;
        const slotTime = new Date(selectedDate);
        const [startHour, startMinute] = slot.split(' - ')[0].split(':');
        slotTime.setHours(parseInt(startHour), parseInt(startMinute), 0, 0);
        if (slotTime < new Date()) {
            slotButton.classList.add('disabled'); // Disable past time slots
        } else {
            slotButton.onclick = () => selectTimeSlot(slotButton, slot);
        }
        timeSlotsContainer.appendChild(slotButton);
    });
    timeSlotsDiv.appendChild(timeSlotsContainer);
}

function selectTimeSlot(slotButton, slot) {
    if (activeTimeSlot === slotButton) {
        // Unselect the currently active time slot
        slotButton.classList.remove('active');
        activeTimeSlot = null;
        selectedDateDiv.innerHTML = `Selected Date: ${selectedDate.toLocaleString('default', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' })}`;
        setHiddenFields(selectedDate ? selectedDate.toISOString().split('T')[0] : '', ''); // Clear time field in hidden fields
    } else {
        // Select a new time slot
        if (activeTimeSlot) {
            activeTimeSlot.classList.remove('active');
        }
        slotButton.classList.add('active');
        activeTimeSlot = slotButton;
        selectedDateDiv.innerHTML = `Selected Date: ${selectedDate.toLocaleString('default', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' })} | ${slot}`;
        setHiddenFields(selectedDate.toISOString().split('T')[0], slot); // Set hidden fields
    }
}

document.addEventListener('DOMContentLoaded', renderCalendar);

// Placeholder function for setHiddenFields
function setHiddenFields(date, time) {
    document.getElementById('selected_date').value = date;
    document.getElementById('selected_time').value = time;
}