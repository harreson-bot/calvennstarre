<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'] ?? '';
    $last_name = $_POST['last_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $organization = $_POST['organization'] ?? '';
    $subject = $_POST['subject'] ?? '';
    $message = $_POST['message'] ?? '';

    $to = 'calvenn@calvennstarre.com';
    $subject_line = "New Contact Form: $first_name $last_name";
    $body = "Name: $first_name $last_name\nEmail: $email\nPhone: $phone\nOrganization: $organization\nSubject: $subject\n\nMessage:\n$message";
    $headers = "From: $email\r\nReply-To: $email";

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
