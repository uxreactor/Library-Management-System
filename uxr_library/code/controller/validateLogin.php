<?php
	//print_r($_POST);
	include 'controller.php';
	$email = $_POST['email'];
	$password = $_POST['password'];
	//echo $email . $password;
	$x=login($email,$password);
	print_r($x);
?>