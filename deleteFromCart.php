<?php
    require_once 'includes/session.php';
    require_once 'includes/database.php';
    require_once 'includes/crud.php';
 
    if ( !empty($_POST['id']) && isset($_POST['id'])) {
      $productTransactionID = $_POST['id'];

      $deleteFromCart = new cart();
      $delete = $deleteFromCart->deleteFromCart($productTransactionID);

      if ($delete) {
        header('Location: cart.php');
      } else {
        header('Location: cart.php');
      }
    }