<?php
	require('controller.php');
	$isbn = $_POST['isbn'];
	$members_data = deleteBook($isbn);
	echo $members_data;
?>
