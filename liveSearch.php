<?php
 require_once 'includes/database.php';
 $search = $_POST['terms'];

	try {
	  $pdo = Database::connect();
	  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	  $sql = "SELECT `product`.*, `image`.* FROM `product` INNER JOIN `image` ON `product`.`id`=`image`.`product_fk` WHERE `image`.`featured` = 1 AND (`product`.`product_name` LIKE :search OR `product`.`description` LIKE :search)";
	  $q = $pdo->prepare($sql);
	  $q->bindValue(':search', '%' . $search . '%');
	  $q->execute();
	  $products = $q->fetchAll(PDO::FETCH_ASSOC);
	  $json=json_encode($products);
	  echo $json;
	  //echo $search;
	} catch (PDOException $error) {
	  echo $error->getMessage();
	  die();
	}

?>