<?php
	require 'controller.php';
	require 'session.php';
	$email = $_POST['email'];
	$password = $_POST['password'];
	$type = $_POST['type'];
	
	$message=login($email,$password);
	if ($message) {
		echo setSession($email,$type,$message);
	} else {
		echo 0;
	}

?>