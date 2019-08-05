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

    cleanupName($name);
    cleanupEmail($email);
    cleanupMessage($message);

    if(mail("some@from.address", "contact form", $message)) {
        echo "great succes";
    } else {
        echo "wrong wrong wrong";
    }
}

function cleanupName($name) {
    if(empty($name)) {
        echo "please fill in your name";
    } else {
        $name = filter_var($name, FILTER_SANITIZE_STRING);
        echo "thank you for filling in your name";
    }
}

function cleanupEmail($email) {
    if(empty($email)) {
        echo "please fill in your email";
    } else {
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        echo "email is clean";
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "email is valid";
        } else {
            echo "email is not valid";
        }
    }
}

function cleanupMessage($message) {
    if(empty($message)) {
        echo "please fill in a message";
    } else {
        $message = filter_var($message, FILTER_SANITIZE_STRING);
        echo "message is clean";
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
    echo "<h2>Thanks for your message $name</h2>";
    echo "We will read your message, saying: $message, and we will get in touch with you by responding to $email";
}

?>
    

</body>
</html>