<?php 
require_once'includes/session.php';
require_once'includes/database.php';
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
	  <title>J. Marie Sign &amp; Design | Product</title>
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
            <?php
              $id = $_GET['id'];
              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $sql = 'SELECT product_name FROM product WHERE id = ?';
              $q = $pdo->prepare($sql);
              $q->execute(array($id));
              $query = $q->fetch(PDO::FETCH_ASSOC);

              echo '<h3>' . $query['product_name'] . '</h3>';
            ?>


            
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"> 
            <table>  
              <thead>
                <?php
                  $id = $_GET['id'];
                  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                  $sql = 'SELECT * FROM image WHERE product_fk = ? AND featured = 1';
                  $q = $pdo->prepare($sql);
                  $q->execute(array($id));
                  $query = $q->fetchAll(PDO::FETCH_ASSOC);

                  $sql3 = 'SELECT product_name FROM product WHERE id = ?';
                  $q3 = $pdo->prepare($sql3);
                  $q3->execute(array($id));
                  $query3 = $q3->fetch(PDO::FETCH_ASSOC);

                  foreach ($query as $image) {
                    echo '<tr>';
                    echo '<th colspan="2">';
                    echo '<img id="productImageSize" title="' . $query3['product_name'] . '" alt="' . $query3['product_name'] . '" src="' . $image['image_link'] . '"><br>';
                    echo '</th>';
                    echo '</tr>';
                  }
                  echo '</thead>';
                  echo '</table>';

                  $sql2 = 'SELECT * FROM image WHERE product_fk = ? AND featured = 0';
                  $q2 = $pdo->prepare($sql2);
                  $q2->execute(array($id));
                  $query2 = $q2->fetchAll(PDO::FETCH_ASSOC);

                  foreach ($query2 as $image2) {
                    echo '<div id="thumbwrap">';
                    echo '<a class="thumb" href="#"><img class="img-thumbnail thumbnail" title="' . $query3['product_name'] . '" alt="' . $query3['product_name'] . '" src="' . $image2['image_link'] . '"><span><img id="popup" title="' . $query3['product_name'] . '" alt="' . $query3['product_name'] . '" src="' . $image2['image_link'] . '"></span></a>';
                    echo '</div>';
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
                    $pdo = Database::connect();
                    $id = $_GET['id'];
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = 'SELECT * FROM product WHERE id = ?';
                    $q = $pdo->prepare($sql);
                    $q->execute(array($id));
                    $query = $q->fetchAll(PDO::FETCH_ASSOC);

                  foreach ($query as $row) {

                      echo '<tr>';
                      echo '<td>Product:</td>';
                      echo '<td>'.$row['product_name'].'</td>';
                      echo '</tr>';
                      echo '<tr>';
                      echo '<td>Description:</td>';
                      echo '<td>'.$row['description'].'</td>'; 
                      echo '</tr>';
                      echo '<tr>';
                      echo '<td>Price:</td>';
                      echo '<td>'.$row['price'].'</td>';
                      echo '</tr>';
                      if($loggedin) {
                        echo '<tr>';
                        echo '<form method="POST" action="addToCart.php">';
                        echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                        echo '<input type="hidden" name="product_name" value="' . $row['product_name'] . '">';
                        echo '<input type="hidden" name="description" value="' . $row['description'] . '">';
                        echo '<input type="hidden" name="price" value="' . $row['price'] . '">';
                        echo '<td colspan="2"><input type="submit" value="Add to Cart"></td>';
                        echo '</form>';
                        echo '</tr>';
                      } else {
                        echo '<tr>';
                        echo '<td colspan="2">Please <a href="loginpage.php">Login</a> to add to cart</td>';
                        echo '</tr>';
                      }
                    }
                Database::disconnect();
                ?>
              </tbody>
            </table>
          </div> <!-- end col-->
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          </div>
        </div> <!-- end row-->

        <div>
          <a href="index.php">Return to Homepage</a>
        </div>
        <br>
        <br>
        <br>
        <br>
      </div> <!-- /container -->
    </div>

  <?php 
   require_once('includes/footer.php');
  ?>

  </body>
</html>
