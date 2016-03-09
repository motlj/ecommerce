<?php
 error_reporting(E_ALL);
    require_once 'includes/database.php';
 
    if ( !empty($_POST)) {

      // keep track post values
      $id = $_POST['id'];
      $product_name = $_POST['product_name'];
      $description = $_POST['description'];
      $price = $_POST['price'];
         
      function valid($varname){
        return ( !empty($varname) && isset($varname) );
      }

      if (!valid($product_name) || !valid($description) || !valid($price)) {
        header("Location: adminUpdate.php");
      }

      $pdo = Database::connect();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE category SET product_name = ?, description = ?, price = ? WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($name,$description,$price,$id));
      Database::disconnect();
      header("Location: adminUpdate.php");
    }
