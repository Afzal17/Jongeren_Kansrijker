<?php

	// Logout Script using PDO & Sessions
	session_start();
	session_destroy();

	// Redirecting the user to the Login script
	header("location: login.php");



?>