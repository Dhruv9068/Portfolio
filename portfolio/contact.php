<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $country = $_POST['country'];
    $message = $_POST['subject'];

    // Set recipient email address
    $to = 'dhruvchaturvedi999@gmail.com';

    // Set subject
    $subject = 'New Form Submission';

    // Build email message
    $email_message = "First Name: $firstname\n";
    $email_message .= "Last Name: $lastname\n";
    $email_message .= "Country: $country\n";
    $email_message .= "Message:\n$message";

    // Create a PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'your-smtp-server.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'your-smtp-username';
        $mail->Password = 'your-smtp-password';
        $mail->Port = 587;

        //Recipients
        $mail->setFrom('your-email@example.com', 'Your Name');
        $mail->addAddress($to);

        //Content
        $mail->isHTML(false);
        $mail->Subject = $subject;
        $mail->Body = $email_message;

        $mail->send();
        echo 'Email sent successfully.';
    } catch (Exception $e) {
        echo 'Error sending email: ', $mail->ErrorInfo;
    }
}
?>
