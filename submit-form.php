<?php
if(isset($_POST['Submit'])) {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $subject = isset($_POST['subject']) ? $_POST['subject'] : 'No subject';

    // Set recipient email address
    $to = "taivilay@gmail.com";

    // Set email headers
    $headers = "From: $name <$email>" . "\r\n";
    $headers .= "Reply-To: $email" . "\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    // Validate the email input using FILTER_VALIDATE_EMAIL
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      // Invalid email address
      echo "Invalid email address";
    } else {
      // Valid email address
      // Send email or process the form data
          // Send email
    if(mail($to, $subject, $message, $headers)) {
        echo "Thank you for your message!";
    } else {
        echo "Sorry, there was an error sending your message. Please try again later.";
    }
    }


}
?>
