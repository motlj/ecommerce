<?php
 error_reporting(E_ALL);
    require_once 'includes/database.php';
 
    if ( !empty($_POST)) {

      // keep track post values
      $id = $_POST['id'];
      $name = $_POST['name'];
      $description = $_POST['description'];
         
      function valid($varname){
        return ( !empty($varname) && isset($varname) );
      }

      if (!valid($name) || !valid($description)) {
        header("Location: adminUpdate.php");
      }

      $pdo = Database::connect();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE category SET name = ?, description = ? WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($name,$description,$id));
      Database::disconnect();
      header("Location: adminUpdate.php");
    }
