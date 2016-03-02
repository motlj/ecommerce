<?php
require_once('session.php');

	if(!empty($_POST['user_name']) && isset($_POST['user_name'])){
		if(!empty($_POST['password']) && isset($_POST['password'])){
			$username=$_POST['user_name'];
			$password=$_POST['password'];
			try { 
				$pdo = Database::connect();
			    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			    $sql = "SELECT * FROM customer WHERE user_name = ? AND $password = ?");
			    $q = $pdo->prepare($sql);
           		$q->query(array($username));
			    Database::disconnect();
			    // check if user was found and
			    // check if password from db = $password; if it is the same
				if ($username = ($_POST['user_name']) && $password = ($_POST['password'])) {
				    echo "You have successfully logged in. Welcome back" . $_SESSION['name'];
				} else {
			    	echo "Username/Password pair not recognized.";
					header('Location: ../index.php'); // username/password pair not found
				}

				session_start();
				    $_SESSION['uid'] = $id;
				    $_SESSION['name'] = $name;
				    $_SESSION['last_name'] = $last_name;
				    $_SESSION['user_name'] = $user_name;
				    $_SESSION['permissions'] = $permission;

				    //header('Location: ../index.php'); // successfully logged in     				}
			} catch (PDOException $e) { 
           		echo "Syntax Error: ".$e->getMessage(); 
           		die();
			}
		}
	}
	header('Location: ../index.php'); // accessed page incorrectly, redirecting