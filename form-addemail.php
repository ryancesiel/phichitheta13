<?php
	// Mailer for the add email call to action on the homepage

	$email = $_REQUEST['email'];

	if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo "Invalid email address.  Please try again.";
	} else { 
		echo "Successfully added email. Thanks!";
		mail("ryances@umich.edu", "[PCT Fall 2013 Rush Interest] Email:" . $email, "Email: " . $email, "From: " . $email); 
	}
?>