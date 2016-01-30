<?php
	require 'controller.php';
	$email = $_POST['email'];
	$password = $_POST['password'];
	$message=login($email,$password);
	if ($message) {
		header('Location: ../our-library.html');
	}else{
		echo $message;
	}
?>