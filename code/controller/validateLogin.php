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
		$response = setSession($email,$type,$message);
		echo $response;
	} else {
		echo false;
	}

?>