<?php
session_start();

if (isset($_GET['service'])) {
    $_SESSION['selected_service'] = $_GET['service'];
    
    // Redirect to the appropriate page based on the service
    switch ($_GET['service']) {
        case 'Check Up':
            header('Location: appointment-templates/checkup.php');
            break;
        case 'Grooming':
            header('Location: appointment-templates/grooming.php');
            break;
        case 'Dental':
            header('Location: appointment-templates/dental.php');
            break;
        case 'Consultation':
            header('Location: appointment-templates/consultation.php');
            break;
        case 'Vaccination':
            header('Location: appointment-templates/vaccination.php');
            break;
        default:
            header('Location: index.php'); // Default redirect if service is not recognized
            break;
    }
    exit();
} else {
    // Redirect to index if no service is set
    header('Location: index.php');
    exit();
}
