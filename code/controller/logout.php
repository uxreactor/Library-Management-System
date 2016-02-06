<?php 
	// remove all session variables
	require 'session.php';
	checkSession();
	session_unset(); 

	// destroy the session 
	session_destroy();

	// redirect to login page
	header("Location: ../index.php");
?>