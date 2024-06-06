function showServiceContent(service) {
    const serviceContent = document.getElementById('service-content');
    let contentHtml = '';

    switch (service) {
        case 'checkup':
            contentHtml = `
                <div class="hidden">     
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