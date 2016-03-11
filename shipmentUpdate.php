<?php
 error_reporting(E_ALL);
    require_once 'includes/database.php';
    require_once 'includes/crud.php';
 
    if ( !empty($_POST)) {

      // keep track post values
      $id = $_POST['id'];
      $name = $_POST['name'];
      $address_fk = $_POST['address_fk'];
         
      $updateShipmentCenter = new ShipmentCenter($_SESSION['id']);
      $response = $updateShipmentCenter->update($name,$address_fk,$id);

      if ($response) {
        header('Location: adminUpdate.php');
      } else {
        header('Location: adminUpdate.php');
      }
    }
