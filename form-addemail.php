<?php
	// Mailer for the add email call to action on the homepage

	$email = $_REQUEST['email'];

	mail("ryances@umich.edu", "[PCT Fall 2013 Rush Interest] Email:" . $email, "Email: " . $email, "From: " . $email);
?>