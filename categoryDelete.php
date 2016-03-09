<?php
    require_once 'includes/session.php';
    require_once 'includes/database.php';
 
    if ( !empty($_POST['id']) && isset($_POST['id'])) {
      try { 
        $id = $_POST['id'];
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM `ecommerce`.`category` WHERE `id` = ?"; //taken from SQL query on phpMyAdmin
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
        header("Location: adminUpdate.php");
      } catch (PDOException $e) { 
        //echo "Syntax Error: ".$e->getMessage() . "<br />\n"; 
        //die();
        header("Location: adminUpdate.php?error=1");
      }
    }
