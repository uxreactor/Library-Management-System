s<?php
	require('controller.php');
	$memId = $_POST['memId'];
	$search_member = rejetcMembershipRenewal($memId);
	echo $search_member;
	echo "string";
?>