<?php
 error_reporting(E_ALL);
    require_once 'includes/session.php';
    require_once 'includes/database.php';
    require_once 'includes/crud.php';
 
    if ( !empty($_POST)) {

      // keep track post values
      $id = $_POST['id'];
      $name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
      $birthdate = $_POST['dob'];
      $phone_number = $_POST['phone'];
      $email_address = $_POST['email'];
      $user_name = $_POST['username'];
         
      $updateCustomer = new customer($_SESSION['id']);
      $response = $updateCustomer->update($name,$last_name,$birthdate,$phone_number,$email_address,$user_name,$id);

      if ($response) {
        header('Location: update.php');
      } else {
        header('Location: update.php');
      }    
    }
