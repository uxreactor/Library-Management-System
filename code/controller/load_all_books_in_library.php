<?php
	require('controller.php');
	$books_data = loadAllBooksInLibrary();
	echo $books_data;
?>