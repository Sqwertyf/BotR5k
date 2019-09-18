<?php
	$name = $_POST['name'];
	$visitor_email = $_POST['email'];
	$donation_category = $_POST['donation-category'];
	$message = $_POST['message'];

	$email_from = 'sqwertyf@gmail.com';
	$email_subject = "New Band on the Run Donation Applicant";
	$email_body = 	"There was a new entry in the online BotR donation form from 					$name.\n".
					"Donation Level: $donation_category.\n".
					"Message:\n $message".
	
	$to = "sqwertyf@gmail.com";
	$headers = "From: $email_from \r\n";
	$headers .= "Reply-To: $visitor_email \r\n";
	mail($to,$email_subject,$email_body,$headers);

function IsInjected($str)
{
    $injections = array('(\n+)',
           '(\r+)',
           '(\t+)',
           '(%0A+)',
           '(%0D+)',
           '(%08+)',
           '(%09+)'
           );             
    $inject = join('|', $injections);
    $inject = "/$inject/i";
     
    if(preg_match($inject,$str))
    {
      return true;
    }
    else
    {
      return false;
    }
}
 
if(IsInjected($visitor_email))
{
    echo "Bad email value!";
    exit;
}

?>