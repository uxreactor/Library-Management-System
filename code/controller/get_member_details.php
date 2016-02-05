<?php
	require('controller.php');
	$memberId = $_POST['member_id'];
	$memberDetails = getMemberDetailsById($memberId);
	echo $memberDetails;
?>