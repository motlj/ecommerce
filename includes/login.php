
<?php
require_once('database.php');

	if(!empty($_POST['user_name']) && isset($_POST['user_name'])){
		if(!empty($_POST['password']) && isset($_POST['password'])){
			$pdo = Database::connect();

			$username = $_POST['user_name'];
			$loginpassword = $_POST['password'];

	//try { 
		    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $sql = "SELECT * FROM customer WHERE user_name = ? AND password = ?";
		    $q = $pdo->prepare($sql);
       		$q->execute(array($username,$password));
       		$query = $q->fetch(PDO::FETCH_ASSOC);
       		$name = $query['name'];
       		$last_name = $query['last_name'];
       		$user_name = $query['user_name'];
       		$password = $query['password'];
       		$id = $query['id'];
       		$permission = $query['permission'];
		    Database::disconnect();

			session_start();
			$_SESSION['id'] = $id;
			$_SESSION['name'] = $name;
			$_SESSION['last_name'] = $last_name;
			$_SESSION['user_name'] = $user_name;
			$_SESSION['permission'] = $permission;

			    // check if user was found and
			    // check if password from db = $password; if it is the same
			if ($username == $user_name && $loginpassword == $password) {
			    echo "You have successfully logged in. Welcome back," . $_SESSION['name'] . "We've been waiting for you.";
			} else {
		    	echo "Username/Password pair not recognized.";
			}

		//	} catch (PDOException $e) { 
          // 		echo "Syntax Error: ".$e->getMessage(); 
           	//	die();
			
		}
	}
	header('Location: ../index.php'); // accessed page incorrectly, redirecting


