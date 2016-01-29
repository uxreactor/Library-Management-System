<?php

	require 'controller.php';
	$name = $_POST['name'];
	$phoneNumber = $_POST['phoneNumber'];
	$emailId = $_POST['emailId'];
	$dob = $_POST['dob'];
	$gender = $_POST['gender'];
	$membershipType = $_POST['membershipType'];
	$hNo = $_POST['hNo'];
	$street = $_POST['street'];
	$city = $_POST['city'];
	$pinCode = $_POST['pinCode'];
	$photos = $_POST['photos'];
	$addressProof = $_POST['addressProof'];
	$validate=requestingMembership($name, $phoneNumber, $emailId, $dob, $gender, $membershipType, $hNo, $street, $place, $city, $zip, $photos, $addressProof);
	if ($validate) {
		header('Location: ../our-library.html',true);
	}else{
		echo $validate;
	}

?>