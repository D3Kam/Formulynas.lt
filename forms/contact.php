<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $subject = strip_tags(trim($_POST["subject"]));
    $message = trim($_POST["message"]);


    if (empty($name) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($subject) || empty($message)) {
        echo "Oops! There was a problem with your submission. Please complete the form and try again.";
        exit;
    }

  
    $recipient = "isarastomas@gmail.com";


    $email_subject = "New contact from $name: $subject";


    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";


    $email_headers = "From: Formulynas.lt <tisaras64@gmail.com>"; 

 
    if (mail($recipient, $email_subject, $email_content, $email_headers)) {
        echo "Thank You! Your message has been sent.";
    } else {
        echo "Oops! Something went wrong and we couldn't send your message.";
    }
} else {
    
    echo "Error: You must submit the form!";
}
?>
