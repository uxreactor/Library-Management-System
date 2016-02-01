<?php
	require 'controller.php';
	$email = $_POST['email'];
	$password = $_POST['password'];
	$message=updatePassword($email,$password);
	echo $message;
?>


