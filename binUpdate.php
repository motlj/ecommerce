<?php
 error_reporting(E_ALL);
    require_once 'includes/database.php';
 
    if ( !empty($_POST)) {

      // keep track post values
      $id = $_POST['id'];
      $name = $_POST['name'];
      $shipment_center_fk = $_POST['shipment_center_fk'];
         
      function valid($varname){
        return ( !empty($varname) && isset($varname) );
      }

      if (!valid($name) || !valid($shipment_center_fk)) {
        header("Location: adminUpdate.php");
      }

      $pdo = Database::connect();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE bin SET name = ?, shipment_center_fk = ? WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($name,$shipment_center_fk,$id));
      Database::disconnect();
      header("Location: adminUpdate.php");
    }
