<?php

session_start();
	
	$loggedin = false;
	if (!empty($_SESSION['id']) && !empty($_SESSION['user_name'])) {
		$loggedin = true;
	}

	$admin = false;
	if (!empty($_SESSION['permission']) && ($_SESSION['permission']) ) == 1 {
		$admin = true;
	}
?>