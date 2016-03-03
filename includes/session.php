<?php

session_start();
	
	$loggedin = false;
	if (!empty($_SESSION['id']) && !empty($_SESSION['user_name'])) {
		$loggedin = true;
	}

?>