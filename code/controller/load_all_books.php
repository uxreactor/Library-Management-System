<?php
	require('controller.php');
	$books_data = loadAllBooksInIndex();
	echo $books_data;
?>