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
	$new = $_POST['type'];
	if($new == 'new'){
		$cate = checkCategoryExists($category);
		if($cate){
			echo "Category is already exists";
		}else{
			$message = addNewBook($isbn,$price,$edition,$publisher,$category,$bookname,$authorname,$quantity);
			echo "New Book added sucessfully";
		}
	}else{
		$message = addNewBook($isbn,$price,$edition,$publisher,$category,$bookname,$authorname,$quantity);
		echo "New Book added sucessfully";	
	}
	
?>