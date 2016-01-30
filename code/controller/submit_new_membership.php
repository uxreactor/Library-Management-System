<?php

	require 'controller.php';
	$name = $_POST['name_id'];
	$phoneNumber = $_POST['phoneno_id'];
	$emailId = $_POST['input_email'];
	$dob = $_POST['dob'];
	$gender = $_POST['radio1'];
	$membershipType = $_POST['membership_type'];
	$hNo = $_POST['hno'];
	$street = $_POST['street'];
	$city = $_POST['city'];
	$place = $_POST['state'];
	$zip = $_POST['pin'];
	//$photos = $_POST['photos'];
	//$addressProof = $_POST['addressProof'];
	$validate=requestingMembership($name, $phoneNumber, $emailId, $dob, $gender, $membershipType, $hNo, $street, $place, $city, $zip);
	echo $validate;
?>