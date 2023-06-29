<?php
// Check for empty fields
if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['subject']) || empty($_POST['message'])) {
  http_response_code(400);
  echo "All fields are required.";
  exit;
}

// Set the recipient email address
$to = "hvntaq@gmail.com";

// Set the email subject
$subject = $_POST['subject'];

// Construct the email body
$message = "Name: " . $_POST['name'] . "\n\n";
$message .= "Email: " . $_POST['email'] . "\n\n";
$message .= "Message: \n" . $_POST['message'];

// Set the email headers
$headers = "From: " . $_POST['name'] . " <" . $_POST['email'] . ">\r\n";
$headers .= "Reply-To: " . $_POST['email'] . "\r\n";

// Send the email
if (mail($to, $subject, $message, $headers)) {
  http_response_code(200);
  echo "Thank you! Your message has been sent.";
} else {
  http_response_code(500);
  echo "Oops! Something went wrong and we couldn't send your message.";
}
?>
