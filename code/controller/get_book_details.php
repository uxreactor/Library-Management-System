<?php
	require('controller.php');
	$bookId = $_POST['book_id'];
	$bookDetails = getBookDetailsById($bookId);
	echo $bookDetails;
?>