<?php
require_once('includes/session.php');
error_reporting(E_ALL);
require_once 'includes/database.php';
 
    if ( !empty($_POST)) {
        // keep track post values
      $product_fk = $_POST['id'];
         
        // validate input
      $valid = true;
        // insert data
      if ($valid) {
        try {
          $pdo = Database::connect();
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = "INSERT INTO cart (product_fk) values(?)";
          $q = $pdo->prepare($sql);
          $q->execute(array($product_fk));
          Database::disconnect();

          header("Location: cart.php");
        } catch (PDOException $e) {
          echo $e->getMessage();
          die();
        }
      }
    }

//need to debug, not redirecting to update, not showing query row on update.

?>
