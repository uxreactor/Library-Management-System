<?php
	require 'controller.php';
	$book_name = $_POST['book_name'];
	$author_name = $_POST['author_name'];
	$validate=requestingForNewBook($book_name, $author_name);
	echo $validate;
?>