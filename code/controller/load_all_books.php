<?php
	require('controller.php');
	$books_data = loadAllBooks();
	echo $books_data;
?>