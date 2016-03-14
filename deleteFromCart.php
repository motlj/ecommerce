<?php
    require_once 'includes/session.php';
    require_once 'includes/database.php';
 
    if ( !empty($_POST['id']) && isset($_POST['id'])) {
      try { 
        $id = $_POST['id'];
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM `ecommerce`.`cart` WHERE `id` = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
        header("Location: cart.php");
      } catch (PDOException $e) { 
        header("Location: cart.php?error=1");
      }
    }
