s<?php
	require('controller.php');
	$email = $_POST['email'];
	$search_member = approveMembershipRenewal($email);
	echo $search_member;
?>