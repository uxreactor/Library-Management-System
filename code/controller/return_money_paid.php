<?php
	require('controller.php');
	$book_id = $_POST['book_id'];
	$return_book = returningBookAfterPenalityPaid($book_id);
	echo $return_book;
?>