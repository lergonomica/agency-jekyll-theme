<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }

$name = $_POST['name'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

// Create the email and send the message
/*$to = 'lergonomica1@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";
mail($to,$email_subject,$email_body,$headers);
return true;*/
/*
 require('mailin.php');
    $mailin = new Mailin("https://api.sendinblue.com/v2.0","gwzYDVfpFqvAjkdZ");
    $data = array( "to" => "lergonomica1@gmail.com",
        "from" => array($email_address, "from email!"),
        "subject" => "My subject",
        "html" => $message
   );
 
    var_dump($mailin->send_email($data));*/
include 'Mailin.php';
$mailin = new Mailin('kikz.maglia@gmail.com', 'gwzYDVfpFqvAjkdZ');
$mailin->
addTo('kikz.maglia@gmail.com', 'Francesco Maria Maglia')->
setFrom('kikz.maglia@gmail.com', 'Francesco Maria Maglia')->
setReplyTo('kikz.maglia@gmail.com','Francesco Maria Maglia')->
setSubject('Inserire l'oggetto qui')->
setText('Buongiorno')->
setHtml('<strong>Buongiorno</strong>');
$res = $mailin->send();

?>