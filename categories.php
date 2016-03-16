<?php
require_once 'includes/session.php';
require_once 'includes/database.php';
?>

<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">

    <title>Ecommerce</title>
 </head>

  <body>
    <div class="container">
    
      <?php 
      if ($admin) {
        require_once'includes/adminNavBar.php';
      } else {
        require_once'includes/navbar.php';
      }

      $category_id = $_GET['id'];
      $pdo = Database::connect();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = 'SELECT * FROM product WHERE category_fk = ?';
      $q = $pdo->prepare($sql);
      $q->execute(array($category_id));
      $products = $q->fetchAll();

      foreach ($products as $row) {
        echo '<tr>';
        echo '<form method="GET" action="productDetails.php">';
        echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
        echo '<td><input type="text" name="product_name" value="'.$row['product_name'].'"></td>'; 
        echo '<td><input type="text" name="price" value="'.$row['price'].'"></td>';
        echo '<td><input type="submit" value="More Details"></td>';
        echo '</form>';
        echo '<form method="POST" action="addToCart.php">';
        echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
        echo '<td><input type="submit" value="Add to Cart"></td>';
        echo '</form>';
        echo '</tr>';
      }
      ?>

    </div><!-- /.container -->

    <?php require_once('includes/footer.php');?>

   <script src="assets/js/jquery.min.js"></script>
   <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
