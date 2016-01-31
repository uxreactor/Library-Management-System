<?php
	require('controller.php');

	$search_key = $_POST['search'];

	$search_member = searchForMember($search_key);
	print_r($search_member);
?>