<?php
 error_reporting(E_ALL);
    require_once 'includes/database.php';
 
    if ( !empty($_POST)) {

      // keep track post values
      $id = $_POST['id'];
      $name = $_POST['name'];
         
      function valid($varname){
        return ( !empty($varname) && isset($varname) );
      }

      if (!valid($name)) {
        header("Location: adminUpdate.php");
      }

      $pdo = Database::connect();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE bin SET name = ? WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($name,$id));
      Database::disconnect();
      header("Location: adminUpdate.php");
    }
