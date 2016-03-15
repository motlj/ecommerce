
<?php
require_once('database.php');

	if(!empty($_POST['user_name']) && isset($_POST['user_name'])){
		if(!empty($_POST['password']) && isset($_POST['password'])){
			
			$pdo = Database::connect();

			$username = $_POST['user_name'];
			$loginpassword = $_POST['password'];

		    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $sql = "SELECT * FROM customer WHERE user_name = ? AND password =?";
		    $q = $pdo->prepare($sql);
       		$q->execute(array($username,$loginpassword));
       		$query = $q->fetch(PDO::FETCH_ASSOC);
       		$uid = $pdo->lastInsertId();
       		$sql2 = 'INSERT INTO transaction (customer_fk) values (?)';
       		$q2 = $pdo->prepare($sql2);
       		$q2->execute(array($uid));
		    Database::disconnect();

       		$name = $query['name'];
       		$user_name = $query['user_name'];
       		$id = $query['id'];
       		$permission = $query['permission'];

			session_start();
			$_SESSION['name'] = $name;
			$_SESSION['user_name'] = $user_name;
			$_SESSION['id'] = $id;
			$_SESSION['permission'] = $permission;

       		print_r($query);

			header('Location: ../index.php');			
		}
	}
	//header('Location: ../loginpage.php'); 
?>
