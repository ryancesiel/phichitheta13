<?php
	// Mailer for the contact page

	$name = $_REQUEST['name'];
	$email = $_REQUEST['email'];
	$subject = $_REQUEST['subject'];
	$message = $_REQUEST['message'];

	mail("ryances@umich.edu", "[PCT Website] " . $subject, $message, "From: " . $email);
?>