<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// PHPMailer files include
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Gmail SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'yourgmail@gmail.com';   // 👈 अपना Gmail डालो
        $mail->Password = 'your-app-password';     // 👈 Gmail App Password डालो
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Recipients
        $mail->setFrom($email, $name);  // Sender (form भरने वाला)
        $mail->addAddress('vishalkr0282@gmail.com'); // 👈 जहां mail चाहिए

        // Content
        $mail->isHTML(true);
        $mail->Subject = "New Portfolio Message from $name";
        $mail->Body    = "
            <h2>New Contact Message</h2>
            <p><b>Name:</b> $name</p>
            <p><b>Email:</b> $email</p>
            <p><b>Message:</b><br>$message</p>
        ";

        $mail->send();
        echo "<h2 style='color:green;'>✅ Thank you $name, your message has been sent successfully!</h2>";
        echo "<a href='index.html'>Go Back</a>";
    } catch (Exception $e) {
        echo "<h2 style='color:red;'>❌ Message could not be sent. Error: {$mail->ErrorInfo}</h2>";
        echo "<a href='index.html'>Go Back</a>";
    }
}
?>
