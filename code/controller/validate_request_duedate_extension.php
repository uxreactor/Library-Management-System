<?php

	require 'controller.php';
	$memberid = $_POST['memId'];
	$bookid = $_POST['bookId'];
	$extensiondays = $_POST['extention_days'];
	$validate=requestingForDueDateExtension($memberid, $bookid, $extensiondays);
	echo $validate;



?>