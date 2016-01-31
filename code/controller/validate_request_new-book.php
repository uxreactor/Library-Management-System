<?php
	require 'controller.php';
	$memberId = $_POST['mem_id'];
	$book_name = $_POST['book_name'];
	$author_name = $_POST['author_name'];
	$validate=requestingForNewBook($memberId,$book_name, $author_name);
	echo $validate;
?>