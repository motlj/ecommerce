<?php


	if(!empty($_POST['username'])&&isset($_POST['username'])){
		if(!empty($_POST['password'])&&isset($_POST['password'])){
			$_SESSION['uid'] = ""
			$_SESSION['username']=$_POST['username'];
			header('Location: ../index.php');
		}
	}
header('Location: ../index.php');
