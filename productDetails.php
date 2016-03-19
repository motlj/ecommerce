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
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
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
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12"> 
          <?php
            $id = $_GET['id'];
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = 'SELECT product_name FROM product WHERE id = ?';
            $q = $pdo->prepare($sql);
            $q->execute(array($id));
            $query = $q->fetch(PDO::FETCH_ASSOC);

            echo '<h3>' . $query['product_name'] . '</h3>';
          ?>
          
        
          <?php
            $id = $_GET['id'];
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = 'SELECT * FROM image WHERE product_fk = ? AND featured = 1';
            $q = $pdo->prepare($sql);
            $q->execute(array($id));
            $query = $q->fetchAll(PDO::FETCH_ASSOC);

            foreach ($query as $image) {
              echo '<img id="productImageSize" src="' . $image['image_link'] . '"><br>';
            }

            $sql2 = 'SELECT * FROM image WHERE product_fk = ? AND featured = 0';
            $q2 = $pdo->prepare($sql2);
            $q2->execute(array($id));
            $query2 = $q2->fetchAll(PDO::FETCH_ASSOC);

            foreach ($query2 as $image2) {
              echo '<img class="img-thumbnail thumbnail" src="' . $image2['image_link'] . '">';
            }
          ?>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th colspan="2">Product Information</th>
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
                    echo '<td>Product:</td>';
                    echo '<td>'.$row['product_name'].'</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Description:</td>';
                    echo '<td>'.$row['description'].'</td>'; 
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Description:</td>';
                    echo '<td>'.$row['price'].'</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td colspan="2"><input type="submit" value="Add to Cart"></td>';
                    echo '</form>';
                    echo '</tr>';
                  }
              }
              Database::disconnect();
              ?>
            </tbody>
          </table>
        </div> <!-- end col-->
      </div> <!-- end row-->

      <div>
        <a href="index.php">Return to Homepage</a>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
