<?php
    require_once 'includes/session.php';
    require_once 'includes/database.php';
    require_once 'includes/crud.php';
 
    if ( !empty($_POST['id']) && isset($_POST['id'])) {
      $ccID = $_POST['id'];

      $deleteCC = new creditCard($_SESSION['id']);
      $response = $deleteCC->delete($ccID);

      if ($response) {
        header('Location: update.php');
      } else {
        header('Location: update.php');
      }
    }
