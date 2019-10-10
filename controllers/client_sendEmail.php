<?php

	require_once '../vendor/autoload.php';
	require_once '../config/constants.php';

	// Create the Transport
	$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
  ->setUsername(EMAIL)
  ->setPassword(PASSWORD);

	// Create the Mailer using your created Transport
	$mailer = new Swift_Mailer($transport);

	if (isset($_POST['send-email'])) {
		$email = $_POST['email'];
		$subject = $_POST['subject'];
		$body = $_POST['body'];

		global $mailer;
		$body1 = '<!DOCTYPE html>
		<html>
		<head>
		<meta charset="utf-8">
		<title>Verify Email</title>
		</head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<body>
		<div class="container">
		<p>
			A client is interested. You can now message her.
		</p>

		</div>
		</body>
		</html>';
		$message = (new Swift_Message("'$subject'"))
		->setFrom(EMAIL)
		->setTo($email)
		->setBody($body1, 'text/html');
		
		$result = $mailer->send($message);
	
	}
	/*function sendVerificationEmail($email, $token)
	{
		global $mailer;

		$body = '<!DOCTYPE html>
		<html>
		<head>
		<meta charset="utf-8">
		<title>Verify Email</title>
		</head>
		<body>
		<div class="wrapper">
		<p>
			Thank you for signing up on our website. Please click the link below to verify your email.
		</p>
		<a href="http://localhost/cater/client.php?token=' . $token . '">verify</a>

		</div>
		</body>
		</html>';

		// Create a message
		$message = (new Swift_Message('Verify your email'))
  			->setFrom(EMAIL)
  			->setTo($email)
  			->setBody($body, 'text/html');

		// Send the message
		$result = $mailer->send($message);
	}*/

?>