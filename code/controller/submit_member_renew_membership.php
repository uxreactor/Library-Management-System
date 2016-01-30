<?php
	//print_r($_POST);
	require 'controller.php';
	$member_id = $_POST['memid'];
	$member_name = $_POST['memname'];
	$validate=requestingMembershipRenewal($member_id, $member_name);
	echo $validate;
?>