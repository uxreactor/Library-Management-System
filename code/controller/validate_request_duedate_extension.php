<?php

	require 'controller.php';
	$book_name = $_POST['book_name'];
	$author_name = $_POST['author_name'];
	$validate=requestingForDueDateExtension($book_name, $author_name);
	echo $validate;

?>