<?php
// Check if the 'op' query parameter is set and equals 'device_info'
if (isset($_GET['op']) && $_GET['op'] === 'device_info') {
    // Set content type to application/json to return a JSON response
    header('Content-Type: application/json');
    
    // Create the JSON response
    $response = array("Message" => "Outside");

    // Output the JSON response
    echo json_encode($response);
} else {
    // If the 'op' parameter is missing or not 'device_info', handle it as needed
    // For example, return a different message
    header('Content-Type: application/json');
    $errorResponse = array("Message" => "Invalid operation");
    echo json_encode($errorResponse);
}
?>