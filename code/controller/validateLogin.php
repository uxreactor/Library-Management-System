<?php
	require 'controller.php';
	$email = $_POST['email'];
	$password = $_POST['password'];
	$type = $_POST['type'];
	
	$message=login($email,$password);
	if ($message) {
		echo setSession($type,$email);
	} else {
		echo 0;
	}


	function setSession($type,$email){
		session_start();
		if($type == 'admin'){
			$_SESSION["admin"] = $email;
			$_SESSION["type"] = "admin";
		}else{
			$_SESSION["user"] = $email;
			$_SESSION["type"] = "user";
		}
		return $_SESSION["type"];
	}
?>