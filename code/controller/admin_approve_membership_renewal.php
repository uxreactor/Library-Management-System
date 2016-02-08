s<?php
	require('controller.php');
	$msId = $_POST['msId'];
	$memId = $_POST['memId'];
	$search_member = approveMembershipRenewal($memId,$msId);
	echo $search_member;
?>