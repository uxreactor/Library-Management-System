<?php

	require 'controller.php';
	$memberid = $_POST['memberid'];
	$membershipType = $_POST['membershipType'];
	$validate=requestingMembershipRenewal($memberid, $membershipType);
	if ($validate) {
		header('Location: ../our-library.html',true);
	}else{
		echo $validate;
	}

?>