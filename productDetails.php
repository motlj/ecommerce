<?php 
require_once'includes/session.php';
require_once'includes/database.php';
//require_once'includes/crud.php';

 error_reporting(E_ALL);
 Database::connect();
?>
<!DOCTYPE html>
<html lang="en">
 <head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	  <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
	  <title>Ecommerce | Product</title>
 </head>

 <body>
	  <?php 
	     if ($admin) {
	       require_once'includes/adminNavBar.php';
	     } else {
	       require_once'includes/navbar.php';
	     }
      ?>

    <div class="container">
      <div class="row">
        <?php
          $id = $_GET['id'];
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = 'SELECT product_name FROM product WHERE id = ?';
          $q = $pdo->prepare($sql);
          $q->execute(array($id));
          $query = $q->fetch(PDO::FETCH_ASSOC);

          echo '<h3>' . $query['product_name'] . '</h3>';
        ?>
      </div>
      
      <?php
        $id = $_GET['id'];
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'SELECT * FROM image WHERE product_fk = ? AND feature = 1';
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $query = $q->fetchAll(PDO::FETCH_ASSOC);

        foreach ($query as $image) {
          echo '<img id="productImageSize" src="' . $image['image_link'] . '">';
        }
      ?>


      <div class="row">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Name</th>
              <th>Description</th>
              <th>Price</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if($loggedin) {
                $pdo = Database::connect();
                $id = $_GET['id'];
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = 'SELECT * FROM product WHERE id = ?';
                $q = $pdo->prepare($sql);
                $q->execute(array($id));
                $query = $q->fetchAll(PDO::FETCH_ASSOC);

              foreach ($query as $row) {

                  echo '<tr>';
                  echo '<form method="POST" action="addToCart.php">';
                  echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                  echo '<td>'.$row['product_name'].'</td>'; 
                  echo '<td>'.$row['description'].'</td>'; 
                  echo '<td>'.$row['price'].'</td>';
                  echo '<td><input type="submit" value="Add to Cart"></td>';
                  echo '</form>';
                  echo '</tr>';
                }
            }
            Database::disconnect();
            ?>
          </tbody>
        </table>
      </div>

      <div>
        <a href="productPage.php">Return to Products</a>
      </div>
      <br>
      <br>
      <br>
      <br>
    </div> <!-- /container -->

  <?php 
   require_once('includes/footer.php');
   Database::disconnect();
  ?>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
