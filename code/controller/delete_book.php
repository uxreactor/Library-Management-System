<?php
	require('controller.php');
	$isbn = $_POST['isbn'];
	$type = $_POST['type'];
	if ($type == 'Books'){
		$members_data = deleteBook($isbn);
	}else {
		$members_data = deleteMember($isbn);
	} 
	
	echo $members_data;
?>
