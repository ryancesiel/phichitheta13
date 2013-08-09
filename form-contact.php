<?php
	// Mailer for the contact page

	$name = $_REQUEST['name'];
	$email = $_REQUEST['email'];
	$subject = $_REQUEST['subject'];
	$message = $_REQUEST['message'];

	$errors = array();
	if($name == '') { array_push($errors, "name"); }
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)) { array_push($errors, "email"); } 
	if($subject == '') { array_push($errors, "subject"); }
	if($message == '') { array_push($errors, "message"); }

	// Check if there were errors
	// if none, mail the message, else send the errors back
	if(empty($errors)) {
		mail("ryances@umich.edu", "[PCT Website] " . $subject, $message, "From: " . $email);
	}
	echo json_encode($errors);
?>
