<?php

	require 'controller.php';
	$bookName = $_POST['bookName'];
	$authorName = $_POST['authorName'];
	$edition = $_POST['edition'];
	$validate=requestingForNewBook($bookName, $authorName, $edition);
	if ($validate) {
		header('Location: ../our-library.html',true);
	}else{
		echo $validate;
	}

?>