function showServiceContent(service) {
    const serviceContent = document.getElementById('service-content');
    let contentHtml = '';

    switch (service) {
        case 'checkup':
            contentHtml = `
                <div class="hidden">   
                    <div class="wide">
                <div class="patient-section">
                    <h2 id="patient-heading">Patients</h2>
                    <div class="filter-options">
                        <label for="filter">Filter:</label>
                        <select id="filter" onchange="updatePatientHeading(this.value)">
                            <option value="today">Today</option>
                            <option value="this-week">This Week</option>
                            <option value="this-month">This Month</option>
                        </select>
                    </div>
                </div>
                <table class="patients-table">
                    <tr>
                        <th>Appointment ID</th>
                        <th>Pet Name</th>
                        <th>Owner</th>
                        <th>Vet</th>
                        <th>Schedule</th>
                    </tr>
                </table>
            </div>
            <div class="narrow">
                <div class="info-container">
                    <p><b>You have a total of</b></p>
                    <h2></h2>
                    <p><b>Check Up Appointments</b></p>
                </div>
            </div>  
                </div>`;
            break;
        case 'dental':
            contentHtml = `
                <div class="hidden">
                    
                </div>`;
            break;
        case 'grooming':
            contentHtml = `
                <div class="hidden">
                    
                </div>`;
            break;
        case 'vaccination':
            contentHtml = `
                <div class="hidden">

                </div>`;
            break;
        case 'surgery':
            contentHtml = `
                <div class="hidden">
                    
                </div>`;
            break;
        default:
            contentHtml = `
                <div class="hidden">
                    <div class="wide">
                        <p>Select a service to see details.</p>
                    </div>
                    <div class="narrow">
                        <p>Select a service to see additional info.</p>
                    </div>
                </div>`;
    }

    serviceContent.innerHTML = contentHtml;
}