<?php 

print_r($_POST);

// declare variables, sanitize and validate

$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);

$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "This cleaned email address is considered valid.";
} else {
	echo "This cleaned email address is not valid. Sorry. xoxo.";
}

$message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

//https://www.w3schools.com/php/php_form_validation.asp


// if all fields are filled in, send the info to my email

// $formcontent= "From: $name \n Email: $email \n Message: $message";
// $recipient = "tinevancorenland@gmail.com";
// $subject = "Contact Form";
// $mailheader = "From: $email \r\n";
// mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
// echo "Thank you for your message!";

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
        
    <p class="text">
        <textarea name="text"></textarea>
    </p>
            
    <p class="submit">
        <input type="submit" value="Send" />
    </p>
</form>
    

</body>
</html>

