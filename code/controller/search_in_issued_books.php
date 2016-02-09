<?php
	require('controller.php');

	$search_key = $_POST['search'];

	$search_books = searchForIssuedBook($search_key);
	
	print_r($search_books);
?>