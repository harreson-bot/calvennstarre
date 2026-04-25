<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'] ?? '';
    $last_name = $_POST['last_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $organization = $_POST['organization'] ?? '';
    $interest = $_POST['interest'] ?? '';
    $event_date = $_POST['event_date'] ?? '';
    $message = $_POST['message'] ?? '';

    $to = 'calvenn@calvennstarre.com';
    $subject_line = "New Contact Form: $first_name $last_name";
    $body = "Name: $first_name $last_name\nEmail: $email\nPhone: $phone\nOrganization: $organization\nInterested In: $interest\nEvent Date: $event_date\n\nMessage:\n$message";
    $headers = "From: noreply@calvennstarre.com\r\nReply-To: $email";

    if (mail($to, $subject_line, $body, $headers)) {
        http_response_code(200);
        echo json_encode(['success' => true]);
    } else {
        http_response_code(500);
        echo json_encode(['success' => false]);
    }
} else {
    http_response_code(405);
    echo json_encode(['success' => false]);
}
?>
