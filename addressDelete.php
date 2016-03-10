<?php
    require_once 'includes/session.php';
    require_once 'includes/database.php';
 
    if ( !empty($_POST['id']) && isset($_POST['id'])) {
/*      try { 
        $id = $_POST['id'];
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM `ecommerce`.`customer_address` WHERE `address_fk` = ?"; //taken from SQL query on phpMyAdmin
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
        header("Location: update.php");
      } catch (PDOException $e) { 
        echo "Syntax Error: ".$e->getMessage() . "<br />\n"; 
        header("Location: update.php?error=1");
      }
*/
      $addressID = $_POST['id'];

      $deleteAddress = new customerAddress($_SESSION['id']);
      $deleteAddress->delete($addressID);


    }
