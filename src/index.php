<?php

if($_POST) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    $formcontent = "From: $name \n Email: $email \n Message: $message";
    $recipient = "tinevancorenland@gmail.com";
    $subject = "Contact Form - $name";

    cleanupName($name);
    cleanupEmail($email);
    cleanupMessage($message);

    // sendMail();
}

function cleanupName($name) {
    if($name !="") {
        $name = filter_var($name, FILTER_SANITIZE_STRING);
        echo "thank you for filling in your name";
    } else {
        echo "please fill in your name";
    }
}

function cleanupEmail($email) {
    if($email != "") {
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        echo "email is clean";
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "email is valid";
        } else {
         echo "email is not valid";
        }
    } else {
        echo "please fill in your email";
    }
}

function cleanupMessage($message) {
    if($message != "") {
        $message = filter_var($message, FILTER_SANITIZE_STRING);
        echo "message is clean";
    } else {
        echo "please fill in your message";
    }
}

// function sendMail(){
//     if(mail("tinevancorenland@gmail.com", "contact form", $message)) {
//         echo "thank you for your message";
//     } else {
//         echo "try again and again and again";
//     }
// }

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
    

</body>
</html>