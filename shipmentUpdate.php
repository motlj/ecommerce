<?php
 error_reporting(E_ALL);
    require_once 'includes/database.php';
    //require_once 'includes/crud.php';
 
    if ( !empty($_POST)) {

      $name = $_POST['name'];
      $address_fk = $_POST['address_fk'];
         
      function valid($varname){
        return ( !empty($varname) && isset($varname) );
      }

/*      $updateShipmentCenter = new ShipmentCenter($_SESSION['id']);
      $response = $updateShipmentCenter->update($name,$address_fk,$id);

      if (!valid($name) || !valid($address_fk)) {
        header("Location: adminUpdate.php");
      if ($response) {
        header('Location: adminUpdate.php');
      } else {
        header('Location: adminUpdate.php');
      }
*/
      $pdo = Database::connect();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE shipment_center SET name = ?, address_fk = ? WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($name,$address_fk,$_POST['id']));
      Database::disconnect();
      header("Location: adminUpdate.php");
    }