<?php
 error_reporting(E_ALL);
    require_once 'includes/database.php';
    require_once 'includes/crud.php';
    require_once 'includes/session.php'
 
    if ( !empty($_POST)) {

      // keep track post values
      $quantity = $_POST['quantity'];

      $updateQuantity = new cart();
      $update = $updateQuantity->updateQuantity($quantity);
      if ($update) {
        header('Location: cart.php');
      } else {
        header('Location: cart.php');
      }

    }
