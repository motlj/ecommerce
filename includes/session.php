<?php

session_start();
	
	$loggedin = false;
	if (!empty($_SESSION['id'])) {
		$loggedin = true;
	}

	$admin = false;
	if (!empty($_SESSION['id']) && ($_SESSION['permission']) == 1 ) {
		$admin = true;
	}
?>