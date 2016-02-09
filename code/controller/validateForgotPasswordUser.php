<?php
	require 'controller.php';
	$email = $_POST['email'];
	$message = userForgotPassword($email);
	if ($message) {
		echo 1;
	} else {
		echo 'false';
	}
?>
