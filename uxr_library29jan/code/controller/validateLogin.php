<?php
	print_r($_POST);
	include 'controller.php';
	$email = $_POST['email'];
	$password = $_POST['password'];
	$message=login($email,$password);
	if ($message) {
		header('Location: ../our-library.html',true);
	}else{
		echo $message;
	}
?>