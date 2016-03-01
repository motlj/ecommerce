<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
  </head>
  <body>
    <br>
    <br>
    <br>
    <br>

<?php
require_once('database.php');
require_once('navbar.php');



	session_start(); // Starting Session
	$error=''; // Variable To Store Error Message

	if (isset($_POST['submit'])) {
		if (empty($_POST['user_name']) || empty($_POST['password'])) {
			$error = "Username or Password is invalid";
			header("Location: ../index.php");
		} else {
			$user_name=$_POST['user_name'];
			$password=$_POST['password'];
			//$connection = mysql_connect("localhost", "root", "");
			$user_name = stripslashes($user_name);
			$password = stripslashes($password);
			$user_name = mysql_real_escape_string($user_name);
			$password = mysql_real_escape_string($password);
			//$db = mysql_select_db("ecommerce", $connection);
			$query = mysql_query("SELECT * FROM customer WHERE password='$password' AND user_name='$user_name'"/*, $connection*/);
			$rows = mysql_num_rows($query);
			if ($rows == 1) {
				$_SESSION['login_user']=$user_name; 
				header("Location: ../index.php"); // Redirecting To Other Page
			} else {
				$error = "Username or Password is invalid";
			}
			//mysql_close($connection); // Closing Connection
		}
	}










/*	if(!empty($_POST['user_name'])&&isset($_POST['user_name'])){
		if(!empty($_POST['password'])&&isset($_POST['password'])){
			$_SESSION['uid'] = ""
			$_SESSION['user_name']=$_POST['user_name'];
			header('Location: ../index.php');
		}
	}
	header('Location: ../index.php');
*/








	require_once('footer.php');
?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>  

  </body>
</html>
