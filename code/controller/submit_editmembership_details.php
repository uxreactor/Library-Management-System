<?php

	require 'controller.php';
	$memId = $_POST['memberId'];
	$name = $_POST['name'];
	$phoneNumber = $_POST['phoneno'];
	$emailId = $_POST['email'];
	$dob = $_POST['dob'];
	$gender = $_POST['gender'];
	$membershipType = $_POST['membership_type'];
	$hNo = $_POST['hno'];
	$street = $_POST['street'];
	$city = $_POST['city'];
	$place = $_POST['state'];
	$zip = $_POST['pin'];
	$exist = emailChecking($emailId);
	$validate = editMembershipDetails($memId, $name, $phoneNumber, $emailId, $dob, $gender, $membershipType, $hNo, $street, $place, $city, $zip);
	return 1;

?>