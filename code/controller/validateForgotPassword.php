<?php
	require 'controller.php';
	$email = $_POST['email'];
	$type = $_POST['type'];
	
	$message=login($email);
	if ($message) {
		echo setSession($type,$email);
	} else {
		echo 0;
	}
?>










