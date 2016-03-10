<?php
 error_reporting(E_ALL);
    require_once 'includes/database.php';
 
    if ( !empty($_POST)) {

      // keep track post values
      $id = $_POST['id'];
      $street1 = $_POST['street1'];
      $street2 = $_POST['street2'];
      $city = $_POST['city'];
      $state = $_POST['state'];
      $zip = $_POST['zip'];
      $country = $_POST['country'];


      $updateAddress = new customerAddress($_SESSION['id']);
      $updateAddress->update($street1,$street2,$city,$state,$zip,$country,$id);

         
/*      function valid($varname){
        return ( !empty($varname) && isset($varname) );
      }

      if (!valid($street1) || !valid($street2) || !valid($city) || !valid($state) || !valid($zip) || !valid($country)) {
        header("Location: update.php");
      }

      $pdo = Database::connect();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE address SET street1 = ?, street2 = ?, city = ?, state = ?, zip = ?, country = ? WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($street1,$street2,$city,$state,$zip,$country,$id));
      Database::disconnect();
      header("Location: update.php");
*/    }
