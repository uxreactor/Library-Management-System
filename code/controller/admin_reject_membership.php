<?php
	require('controller.php');
	$email = $_POST['email'];
	$search_member = rejectMembership($email);
	echo $search_member;
?>