<?php
	require('controller.php');
	$book_id = $_POST['book_id'];
	$return_book = returningBook($book_id);
	echo $return_book;
?>