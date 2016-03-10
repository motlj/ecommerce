<?php
 error_reporting(E_ALL);
    require_once 'includes/database.php';
    require_once 'includes/crud.php';

    if ( !empty($_POST)) {

      // keep track post values
      $id = $_POST['id'];
      $type = $_POST['type'];
      $name = $_POST['name'];
      $card_number = $_POST['card_number'];
      $expiration = $_POST['expiration'];
      $security = $_POST['security'];
      $address_fk = $_POST['address_fk'];

      $updateCC = new creditCard($_SESSION['id']);
      $response = $updateCC->update($type,$name,$card_number,$expiration,$security,$address_fk,$id);

      if ($response) {
        header('Location: update.php');
      } else {
        header('Location: update.php');
      }
    }
