<?php
 error_reporting(E_ALL);
    require_once 'includes/database.php';
    require_once 'includes/crud.php';
 
    if ( !empty($_POST)) {

      // keep track post values
      $id = $_POST['id'];
      $street1 = $_POST['street1'];
      $street2 = $_POST['street2'];
      $city = $_POST['city'];
      $state = $_POST['state'];
      $zip = $_POST['zip'];
      $country = $_POST['country'];


      $updateAddress = new customerAddress($_SESSION['id']);
      $response = $updateAddress->update($street1,$street2,$city,$state,$zip,$country,$id);

      if ($response) {
        header('Location: update.php');
      } else {
        header('Location: update.php');
      }

    }
