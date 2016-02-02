<?php
	require('controller.php');
	$email = $_POST['email'];
	$search_member = approveMembership($email);
	echo $search_member;
?>