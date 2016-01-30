<?php
	require 'controller.php';
	$bookname = $_POST['book_name'];
	$authorname = $_POST['author_name'];
	$isbn = $_POST['isbn'];	
	$category = $_POST['category'];	
	$edition = $_POST['edition'];
	$quantity = $_POST['quantity'];
	$price = $_POST['price'];	
	$publisher = $_POST['publisher'];
	$message = addNewBook($isbn,$price,$edition,$publisher,$category,$bookname,$authorname,$quantity);
	echo $message;	
?>