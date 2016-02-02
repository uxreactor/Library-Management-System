<?php
	require 'controller.php';
	$email = $_POST['email'];
	$message=adminForgotPassword($email);
	if ($message) {
		echo 1;
	} else {
		echo 'false';
	}
?>










