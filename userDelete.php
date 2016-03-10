<?php
    require_once 'includes/session.php';
    require_once 'includes/database.php';
    require_once 'includes/crud.php';

    if ( !empty($_POST['id']) && isset($_POST['id'])) {
      $id = $_POST['id'];

      $deleteCustomer = new customer($_SESSION['id']);
      $response = $deleteCustomer->delete($id);

      if ($response) {
        header('Location: update.php');
      } else {
        header('Location: update.php');
      }

    }

