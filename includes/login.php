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
require_once('navbar.php');
require_once('session.php');





	if(!empty($_POST['user_name'])&&isset($_POST['user_name'])){
		if(!empty($_POST['password'])&&isset($_POST['password'])){
			$_SESSION['uid'] = ""
			$_SESSION['user_name']=$_POST['user_name'];
			//header('Location: ../index.php');
			try { 
				$pdo = Database::connect();
			    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			    $sql = "SELECT * FROM customer WHERE password='$password' AND user_name='$user_name'");
			    $q = $pdo->prepare($sql);
			    Database::disconnect();
			    //header("Location: ../index.php");
			} catch (PDOException $e) { 
           		echo "Syntax Error: ".$e->getMessage(); 
           		die();
       			}
			}
		}
	}
	//header('Location: ../index.php');









	require_once('footer.php');
?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>  

  </body>
</html>
