<?php
require_once 'includes/session.php';
error_reporting(E_ALL);
require_once 'includes/database.php';
//require_once 'includes/crud.php';
require_once 'includes/session.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
      $nameError = null;
         
        // keep track post values
      $name = $_POST['name'];
      $address_fk = $_POST['address_fk'];
         
        // validate input
      $valid = true;
        
      if (empty($name)) {
        $nameError = 'Please enter Shipment Center Name';
        $valid = false;
      }
         
        // insert data
      if ($valid) {
        try {
          $pdo = Database::connect();
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = "INSERT INTO shipment_center (name,address_fk) values(?, ?)";
          $q = $pdo->prepare($sql);
          $q->execute(array($name,$address_fk));
          Database::disconnect();

          header("Location: adminUpdate.php");
        } catch (PDOException $e) {
          echo $e->getMessage();
          die();
        }
/*      $createShipmentCenter = new shipmentCenter($_SESSION['id']);
      $response = $createShipmentCenter->create($name,$address_fk);

      if ($response) {
        header('Location: adminUpdate.php');
      } else {
        header('Location: adminUpdate.php');
      }
*/    }
    }
//need to debug, not redirecting to update, not showing query row on update.

?>



<!DOCTYPE html>
<html lang="en">
 <head>