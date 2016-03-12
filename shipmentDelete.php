<?php
    require_once 'includes/session.php';
    require_once 'includes/database.php';
 
    if ( !empty($_POST['id']) && isset($_POST['id'])) {
      try { 
        $id = $_POST['id'];
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM `ecommerce`.`shipment_center` WHERE `id` = ?"; //taken from SQL query on phpMyAdmin
        $q = $pdo->prepare($sql);
        $q->execute(query($id));
        Database::disconnect();
        header("Location: adminUpdate.php");
      } catch (PDOException $e) { 
        die();
        header("Location: adminUpdate.php?error=1");
/*
      $deleteShipmentCenter = new shipmentCenter($_SESSION['id']);
      $response = $deleteShipmentCenter->delete($shipmentID);

      if ($repsonse) {
        header('Location: adminUpdate.php');
      } else {
        header('Location: adminUpdate.php');
      }
*/  
      }
    }

