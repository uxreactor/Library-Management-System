<?php

	require 'controller.php';
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
	if(emailCheck($emailId)){
				$validate = 1;

	} else {
		$validate = requestingMembership($name, $phoneNumber, $emailId, $dob, $gender, $membershipType, $hNo, $street, $city, $place, $zip);
		$validate = "Successfully applied your form";
	}
	echo $validate;

?>