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
	$old_isbn = $_POST['old_isbn'];
	if($new == 'new'){
		$cate = checkCategoryExists($category);
		if($cate){
			echo "Category is already exists";
		}else{
			$message = editBookDetails($old_isbn,$isbn,$price,$edition,$publisher,$category,$bookname,$authorname,$quantity);
			echo "Book details updated successfully";
		}
	}else{
		$message = editBookDetails($old_isbn,$isbn,$price,$edition,$publisher,$category,$bookname,$authorname,$quantity);
		echo "Book details updated successfully";	
	}
	
?>