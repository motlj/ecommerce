<?php
 error_reporting(E_ALL);
    require_once 'includes/database.php';
 
    if ( !empty($_POST)) {

      // keep track post values
      $id = $_POST['id'];
      $name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
      $birthdate = $_POST['dob'];
      $phone_number = $_POST['phone'];
      $email_address = $_POST['email'];
      $user_name = $_POST['username'];
         
      function valid($varname){
        return ( !empty($varname) && isset($varname) );
      }

      if (!valid($name) || !valid($last_name) || !valid($birthdate) || !valid($user_name) || !valid($phone_number)) {
        header("Location: update.php");
      } else if (!valid($email_address)) {
        header("Location: update.php");
      } else if ( !filter_var($email_address,FILTER_VALIDATE_EMAIL) ) {
        header("Location: update.php");
      }

      $pdo = Database::connect();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE customer SET name = ?, last_name = ?, birthdate = ?, phone_number = ?, email_address = ?, user_name = ? WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($name,$last_name,$birthdate,$phone_number,$email_address,$user_name,$id));
      Database::disconnect();
      header("Location: update.php");
    }
