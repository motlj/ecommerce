<?php
    require_once 'includes/session.php';
    require_once 'includes/database.php';
 
    if ( !empty($_POST['id']) && isset($_POST['id'])) {
      try { 
        $id = $_POST['id'];
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM `ecommerce`.`customer_credit_card` WHERE `creditcard_fk` = ?"; //taken from SQL query on phpMyAdmin
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
        header("Location: update.php");
      } catch (PDOException $e) { 
        //echo "Syntax Error: ".$e->getMessage() . "<br />\n"; 
        //die();
        header("Location: update.php?error=1");
      }
    }