<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/style.css">
    <title>contact form</title>
</head>
<body>

<?php

if($_POST) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    $contactFormInfo = "Name: $name <br> Email: $email <br> Message: $message";

    cleanupName($name, $email, $message, $contactFormInfo);
}

function cleanupName($name, $email, $message, $contactFormInfo) {
    if(empty($name)) {
        echo "please fill in your name";
    } else {
        $name = filter_var($name, FILTER_SANITIZE_STRING);
        cleanupEmail($name, $email, $message, $contactFormInfo);
    }
}

function cleanupEmail($name, $email, $message, $contactFormInfo) {
    if(empty($email)) {
        echo "please fill in your email <br>";
    } else {
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            cleanupMessage($name, $email, $message, $contactFormInfo);
        } else {
            echo "please fill in a correct email <br>";
        }
    }
}

function cleanupMessage($name, $email, $message, $contactFormInfo) {
    if(empty($message)) {
        echo "please fill in a message <br>";
    } else {
        $message = filter_var($message, FILTER_SANITIZE_STRING);
        sendMail($name, $email, $message, $contactFormInfo);
    }
}

function sendMail($name, $email, $message, $contactFormInfo) {

    require 'vendor/autoload.php';

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'smtp.mailtrap.io';                     // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'a9afcc8b165ae6';                       // SMTP username
        $mail->Password   = '2ae8a76456568e';                       // SMTP password
        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port       =  25;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom($email);
        $mail->addAddress('tinevancorenland@gmail.com');      

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'contact form '.$name;
        $mail->Body    = $contactFormInfo;
        $mail->AltBody = $contactFormInfo;

        $mail->send();
        echo '<h2> Message sent! </h2>';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

?>

<h2>Contact Form</h2>

<form class="form" action="index.php" method="POST">
            
    <p class="name">
        <input type="text" name="name" id="name" />
        <label for="name">Name</label>
    </p>
            
    <p class="email">
        <input type="text" name="email" id="email" />
        <label for="email">Email</label>
    </p>	
        
    <p class="message">
        <textarea name="message" id="message"></textarea>
    </p>
            
    <p class="submit">
        <input type="submit" id="submit" value="submit" />
    </p>
</form>

<?php

if($_POST) {
    echo "<br><h2>Thanks for contacting us $name</h2>";
    echo "We will read your message, saying: <br><br> ' $message ' <br><br> 
    We will get in touch with you by responding to $email.";
}

?>
    

</body>
</html>