
<?php
require_once('database.php');

	//if(!empty($_POST['user_name']) && isset($_POST['user_name'])){
		//if(!empty($_POST['password']) && isset($_POST['password'])){
			
			$pdo = Database::connect();

			$username = $_POST['user_name'];
			$loginpassword = $_POST['password'];

		    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $sql = "SELECT * FROM customer WHERE user_name = ?";
		    $q = $pdo->prepare($sql);
       		$q->execute(array($username,$loginpassword));
       		$query = $q->fetch(PDO::FETCH_ASSOC);

       		print_r($query);
/*       		$name = $query['name'];
       		$user_name = $query['user_name'];
       		$password = $query['password'];
       		$id = $query['id'];
       		$permission = $query['permission'];
		    Database::disconnect();

			session_start();
			$_SESSION['name'] = $name;
			$_SESSION['user_name'] = $user_name;
			$_SESSION['id'] = $id;
			$_SESSION['permission'] = $permission;


	if(!empty($_POST['user_name']) && isset($_POST['user_name'])){
		if(!empty($_POST['password']) && isset($_POST['password'])){
			if ($username == $user_name && $loginpassword == $password) {
			    echo "You have successfully logged in. Welcome back," . $_SESSION['name'] . "We've been waiting for you.";
			} else {
		    	echo "Username/Password pair not recognized.";
			}*/
			//header('Location: ../index.php');			
//		}
//	}
	//header('Location: ../index.php'); 

