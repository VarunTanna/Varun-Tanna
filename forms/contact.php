<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  // Email recipient
  $recipient = 'your-email@example.com'; // Replace with your email address

  // Prepare email headers
  $headers = "From: $name <$email>\r\n";
  $headers .= "Reply-To: $email\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-type: text/plain; charset=utf-8\r\n";

  // Prepare email body
  $emailBody = "Name: $name\n";
  $emailBody .= "Email: $email\n";
  $emailBody .= "Subject: $subject\n";
  $emailBody .= "Message:\n$message\n";

  // Send email
  if (mail($recipient, $subject, $emailBody, $headers)) {
    http_response_code(200); // Success status code
    echo "Message sent successfully!";
  } else {
    http_response_code(500); // Error status code
    echo "Oops! Something went wrong and we couldn't send your message.";
  }
} else {
  http_response_code(403); // Forbidden status code
  echo "There was a problem with your submission. Please try again.";
}
?>