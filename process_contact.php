<?php
$to = 'bashartukurshehu@gmail.com'; 
$subjectPrefix = '[AI-Powered JAMB Exam Assistant Contact Form] ';
$fromName = 'AI-Powered JAMB Exam Assistant Platform';
$fromEmail = 'noreply@APJA.com';

$errors = [];

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo "Method Not Allowed";
    exit;
}

// Sanitizing and validating input
$name = isset($_POST['name']) ? filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING) : '';
$email = isset($_POST['email']) ? filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL) : '';
$subject = isset($_POST['subject']) ? filter_var(trim($_POST['subject']), FILTER_SANITIZE_STRING) : '';
$message = isset($_POST['message']) ? filter_var(trim($_POST['message']), FILTER_SANITIZE_STRING) : '';

// Validate name
if (empty($name)) {
    $errors['name'] = 'Name is required.';
}

// Validate email
if (empty($email)) {
    $errors['email'] = 'Email is required.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Invalid email format.';
}

// Validate message
if (empty($message)) {
    $errors['message'] = 'Message is required.';
}

// If there are errors, return them
if (!empty($errors)) {
    http_response_code(400);
    echo json_encode(['errors' => $errors]);
    exit;
}

// Construct the email subject
$emailSubject = $subjectPrefix . (empty($subject) ? 'General Inquiry' : $subject);

// Construct the email body
$emailBody = "You have received a message from the AI-Powered JAMB Exam Assistant contact form:\n\n";
$emailBody .= "Name: " . $name . "\n";
$emailBody .= "Email: " . $email . "\n";
if (!empty($subject)) {
    $emailBody .= "Subject: " . $subject . "\n";
}
$emailBody .= "Message:\n" . $message . "\n\n";
$emailBody .= "------------------------------------------------------------\n";
$emailBody .= "This email was sent from the AI-Powered JAMB Exam Assistant website.";

// Set the email headers
$headers = "From: " . $fromName . " <" . $fromEmail . ">\r\n";
$headers .= "Reply-To: " . $email . "\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();

// Attempt to send the email
if (mail($to, $emailSubject, $emailBody, $headers)) {
    // Email sent successfully
    http_response_code(200);
    echo json_encode(['success' => 'Your message has been sent successfully!']);
} else {
    // Email sending failed
    http_response_code(500);
    echo json_encode(['error' => 'There was a problem sending your message. Please try again later.']);
}

?>