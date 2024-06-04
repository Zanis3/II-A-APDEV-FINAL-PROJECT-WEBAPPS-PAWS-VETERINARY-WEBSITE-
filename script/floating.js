let activeService = null;

document.querySelectorAll('.grid-item').forEach((service, index) => {
    service.addEventListener('click', function(event) {
        const floatingUI = document.getElementById(`floatingUI${index + 1}`);
        const serviceRect = service.getBoundingClientRect();
        const containerRect = service.closest('.grid-container').getBoundingClientRect();
        
        // Toggle the floating UI
        if (activeService === service) {
            floatingUI.style.display = 'none';
            activeService = null;
            return;
        }

        // Hide any other active floating UI
        document.querySelectorAll('.floating-ui').forEach(ui => ui.style.display = 'none');

        activeService = service;

        // Determine if the service is in the first or second column
        const isFirstColumn = (index % 2) === 0;

        // Position the floating UI
        floatingUI.style.display = 'block';
        floatingUI.style.top = `${serviceRect.top + window.scrollY}px`;
        if (isFirstColumn) {
            floatingUI.style.left = `${serviceRect.left + window.scrollX - floatingUI.offsetWidth - 10}px`;
            floatingUI.style.right = 'auto';
        } else {
            floatingUI.style.left = `${serviceRect.right + window.scrollX + 10}px`;
            floatingUI.style.right = 'auto';
        }
    });
});

// Hide the floating UI when clicking outside
document.addEventListener('click', function(event) {
    const floatingUIs = document.querySelectorAll('.floating-ui');
    let clickedInside = false;

    floatingUIs.forEach(floatingUI => {
        if (floatingUI.contains(event.target)) {
            clickedInside = true;
        }
    });

    if (!clickedInside && !event.target.classList.contains('grid-item')) {
        floatingUIs.forEach(floatingUI => floatingUI.style.display = 'none');
        activeService = null;
    }
});