<?php
	require 'controller.php';
	$email = $_POST['email'];
	$password = $_POST['password'];
	$message=updatePasswordUser($email,$password);
	echo $message;
?>
