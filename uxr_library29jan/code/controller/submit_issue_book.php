<?php

	require 'controller.php';
	$memberId = $_POST['memberId'];
	$bookId = $_POST['bookId'];
	$issuedDate = $_POST['issuedDate'];
	$returnDate = $_POST['returnDate'];
	$validate=issueBook($memberId, $bookId, $issuedDate, $returnDate);
	if ($validate) {
		header('Location: ../our-library.html',true);
	}else{
		echo $validate;
	}

?>