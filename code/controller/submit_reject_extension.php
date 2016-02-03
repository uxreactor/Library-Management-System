<?php
	require 'controller.php';
	$bookId = $_POST['bookId'];
	$memberId = $_POST['memId'];
	$message=rejectExtension($memberId, $bookId);
	echo $message;
?>