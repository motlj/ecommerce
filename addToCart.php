<?php
require_once('includes/session.php');
error_reporting(E_ALL);
require_once 'includes/database.php';
require_once 'includes/crud.php'
 
    if ( !empty($_POST)) {
        // keep track post values
      $product_fk = $_POST['id'];


      $addToCart = new cart();
      $addToCart->addToCart()
      $response = $createAddress->create($street1,$street2,$city,$state,$zip,$country);
      header('Location: cart.php');
         ?>
