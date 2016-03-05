<?php
 error_reporting(E_ALL);
    require_once 'includes/database.php';
 
    if ( !empty($_POST)) {

      // keep track post values
      $id = $_POST['id'];
      $type = $_POST['type'];
      $name = $_POST['name'];
      $card_number = $_POST['card_number'];
      $expiration = $_POST['expiration'];
      $security = $_POST['security'];
         
      function valid($varname){
        return ( !empty($varname) && isset($varname) );
      }

      if (!valid($type) || !valid($name) || !valid($card_number) || !valid($expiration) || !valid($security)) {
        header("Location: update.php");
      }

      $pdo = Database::connect();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE credit_card SET type = ?, name = ?, card_number = ?, expiration = ?, security = ? WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($type,$name,$card_number,$expiration,$security,$id));
      Database::disconnect();
      header("Location: update.php");
    }
