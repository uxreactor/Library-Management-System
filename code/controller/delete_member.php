<?php
	require('controller.php');
	$memberId = $_POST['isbn'];
	$members_data = deleteMember($memberId);
	echo $members_data;
?>
