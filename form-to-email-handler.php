<?php
if (!isset($_POST['submit'])) {
    echo "error; you need to submit the form!";
}

$name = $_POST['name'];
$visitor_email = $_POST['email'];
$message = $_POST['message'];

$email_subject = "New Form Submission"
$email_body = "You have recieved a message from $name. \n".
        "emial address: $visitor_email. \n".
        "Their Message:\n $message.";
$to = 'BPSaravia@gmial.com';
$headers = "From: $visitor_email \r \n"

mail($to,$email_subject,$email_body,$headers);

header("Location: index.html")
?>