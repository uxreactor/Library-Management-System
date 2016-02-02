<?php
	require 'controller.php';
	$bookId = $_POST['bookId'];
	$memberId = $_POST['memId'];
	$message=approveDueDateExtension($memberId, $bookId);
	echo $message;
?>