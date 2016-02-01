<?php
	require 'controller.php';
	$email = $_POST['email'];
	$message=adminForgotPassword($email);
	if ($message) {
		$to = 'vkonduri@uxreactor.org';
		$subject = "My subject";
		$txt = "Hello world!";
		$headers = "From: aduddu@uxreactor.com" . "\r\n" ;
		$sentmail = mail($to,$subject,$txt,$headers);
		if($sentmail==1){
			echo "mail sent";
		}else {
			echo "mail not sent";
		}
		//mail($email,"Click on link to change password","localhost/library-management-system/code/change-password.php",'From:info@technokrats.in');
		echo "Excuting validate forgot password successfull";
	} else {
		echo "Not excuted";
	}
?>










