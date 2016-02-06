<?php
	require 'controller.php';
	require 'session.php';
	$email = $_POST['email'];
	$password = $_POST['password'];
	$type = $_POST['type'];
	if($type == 'admin'){
		$message=adminLogin($email,$password);
	}else{
		$message=login($email,$password);
	}
	
	if ($message) {
		echo setSession($email,$type,$message);
		echo $message;
	} else {
		echo false;
	}

?>