<?php
require_once __DIR__ . '/../Model/db_connection.php';
require_once __DIR__ . '/../Model/priest_mod.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['appointmentId']) && isset($_POST['appointmentType'])) {
    $appointmentId = intval($_POST['appointmentId']);
    $appointmentType = $_POST['appointmentType'];
    $action = $_POST['action'];  // Get the action (approve or decline)

    $priest = new Priest($conn); 

    if ($action === 'approve') {
        // Call approveAppointment method
        if ($priest->approveAppointment($appointmentId, $appointmentType)) {
            echo 'success'; // Send success response for approval
        } else {
            echo 'Error approving the appointment.'; // Error message for approval
        }
    } elseif ($action === 'decline') {
        // Call declineAppointment method (assuming you have this)
        if ($priest->declineAppointment($appointmentId, $appointmentType)) {
            echo 'success'; // Send success response for decline
        } else {
            echo 'Error declining the appointment.'; // Error message for decline
        }
    } else {
        echo 'Invalid action.'; // Handle unknown actions
    }
} else {
    echo 'Invalid request.'; // Handle invalid requests
}
