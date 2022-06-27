<?php

ini_set( 'display_errors', 1 );   
error_reporting( E_ALL ); 

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
	
// Create the email and send the message 'admin@yjoc.web.id'
$to = 'admin@yjoc.web.id'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website YJOC Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\n
Name: $name\n\n
Email: $email_address\n\n
Phone: $phone\n\n
Message:\n$message";

$headers = 'From: noreply@yjoc.web.id' . "\r\n" . 
    'Reply-To: $email_address' . "\r\n" . 
    'X-Mailer: PHP/' . phpversion(); 
    
//$headers = "From: noreply@yjoc.web.id\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
//$headers .= "Reply-To: $email_address";	

/*ini_set("SMTP","mail.yjoc.web.id");
ini_set("smtp_port","993");*/

mail($to,$email_subject,$email_body,$headers);
return true;
/*if(!mail) {
    echo "Mailer Error: ";
} else {
    echo "Message has been sent successfully";
    return true;
}*/
?>