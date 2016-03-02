<?php

session_start();
	
	$loggedin = false
	if (!empty($_SESSION['user_name'])) {
		$loggedin = true;
	}


	
/*session_start();
	
	if( isset( $_SESSION['user_name'])) {
	      echo "you are logged in" ;
	   } else {
	   	  echo "create account to login";
	   }
*/?>