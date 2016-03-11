<?php
    require_once 'includes/session.php';
    require_once 'includes/database.php';
 
    if ( !empty($_POST['id']) && isset($_POST['id'])) {
      $shipmentID = $_POST['id'];

      $deleteShipmentCenter = new shipmentCenter($_SESSION['id']);
      $response = $deleteShipmentCenter->delete($shipmentID);

      if ($repsonse) {
        header('Location: adminUpdate.php');
      } else {
        header('Location: adminUpdate.php');
      }
    }
