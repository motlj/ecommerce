<?php

	require_once('database.php');
	require_once('navbar.php');

	$ID = $_POST['user_name']; 
	$Password = $_POST['password']; 

	function SignIn() { 
		session_start(); //starting the session for user profile page 
		if(!empty($_POST['user'])) { 
			$query = mysql_query("SELECT * FROM customer where user_name = '$_POST[user_name]' AND password = '$_POST[password]'") or die(mysql_error()); 
			$row = mysql_fetch_array($query) or die(mysql_error()); 
			if(!empty($row['user_name']) AND !empty($row['password'])) { 
				$_SESSION['user_name'] = $row['password']; 
				echo "SUCCESSFULLY LOGIN TO USER PROFILE PAGE..."; 
			} else { 
			echo "SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY..."; 
			} 
		} 
	} 
	
	if(isset($_POST/*['submit']*/)) { 
	SignIn(); 
	} 




	if(!empty($_POST['user_name'])&&isset($_POST['user_name'])){
		if(!empty($_POST['password'])&&isset($_POST['password'])){
			$_SESSION['uid'] = ""
			$_SESSION['user_name']=$_POST['user_name'];
			header('Location: ../index.php');
		}
	}


header('Location: ../index.php');


require_once('footer.php');
