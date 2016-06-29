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

    <title>J. Marie Sign &amp; Design | Category</title>
 </head>

  <body>
    <?php 
      if ($admin) {
        require_once'includes/adminNavBar.php';
      } else {
        require_once'includes/navbar.php';
      }
    ?>

    <div id="searchResults" class="row">
    </div>
    <div id="hidden">          
      <div class="container">
        <div class="row">
          <h3>List of Products</h3>
        </div>
          <?php
            $category_id = $_GET['id'];
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = 'SELECT * FROM product WHERE category_fk = ?';
            $q = $pdo->prepare($sql);
            $q->execute(array($category_id));
            $products = $q->fetchAll();

            foreach ($products as $row) {
              $sql2 = 'SELECT image_link FROM image WHERE product_fk = ? AND featured = 1';
              $q2 = $pdo->prepare($sql2);
              $q2->execute(array($row['id']));
              $thumbnail = $q2->fetch();
              
              echo '<div class="row">';
              echo '<div class="col-lg-3 col-md-3 col-sm-12"><center><img id="categoryImage" src="'.$thumbnail['image_link'].'"></center></div>';
              echo '<div class="col-lg-1 col-md-1 col-sm-0"></div>';
              echo '<div class="col-lg-8 col-md-8 col-sm-12">';
              echo '<form method="GET" action="productDetails.php">';
              echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
              echo '<h1>' . $row['product_name'] . '</h1>';
              echo '<p>'. $row['description'].'</p>';
              echo '<h3>Price: $' . $row['price'] . '</h3>';
              echo '<input type="submit" class="btn btn-success form-actions" value="More Details">';
              echo '</form>';
              echo '<br>';
              if ($loggedin) {
                echo '<form method="POST" action="addToCart.php">';
                echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                echo '<input type="submit" class="btn btn-success form-actions" value="Add to Cart">';
                echo '</form>';
              } else {
                echo 'Please <a href="loginpage.php">login</a> to add item to cart';
              }
              echo '</div>';
              echo '</div>';
              echo '<hr>';
            }
            Database::disconnect();
          ?>
        <div>
          <a href="index.php">Return to Index</a>
        </div>
        <br>
        <br>
        <br>
        <br>
      </div><!-- /.container -->
    </div>

    <?php require_once('includes/footer.php');?>

  </body>
</html>
