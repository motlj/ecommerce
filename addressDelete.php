<?php
    require_once 'includes/session.php';
    require_once 'includes/database.php';
    require_once 'includes/crud.php';
 
    if ( !empty($_POST){

      $deleteAddress = new customerAddress($_SESSION['id']);
      $deleteAddress->delete($_POST['id']);

    }
