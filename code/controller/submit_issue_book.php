<?php
	require 'controller.php';
	$bookId = $_POST['book_id'];
	$memberId = $_POST['mem_id'];
	$issuedDate = $_POST['issue_date'];
	$returnDate = $_POST['return_date'];
	$message=issueBook($memberId, $bookId, $issuedDate, $returnDate);
	echo $message;
?>