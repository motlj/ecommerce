<?php
    require_once 'includes/session.php';
    require_once 'includes/database.php';
    require_once 'includes/crud.php';
 
    if ( !empty($_POST['id']) && isset($_POST['id'])) {
      $addressID = $_POST['id'];

      $deleteAddress = new customerAddress($_SESSION['id']);
      $response = $deleteAddress->delete($addressID);

      if ($response) {
        header('Location: update.php');
      } else {
        header('Location: update.php');
      }

    }
