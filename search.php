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

    <title>J. Marie Sign &amp; Design | Search Results</title>
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
        <h2>Search Results</h2>
      </div>
      <hr>
      <div class="row">
        <h3>Products</h3>
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Name</th>
              <th>Image</th>
              <th>Price</th>
              <th>Action</th>
              <th>Action</th>
            </tr>
          </thead>
           <tbody>
    
            <?php
              $search = $_POST['srch-term'];
              //$sqlSearch = '%' . $search . '%';
            try {
              $pdo = Database::connect();
              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $sql = "SELECT * FROM `product` WHERE `product`.`product_name` LIKE :search OR `product`.`description` LIKE :search";
              $q = $pdo->prepare($sql);
              $q->bindValue(':search', '%' . $search . '%');
              $q->execute();
              $products = $q->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $error) {
              echo $error->getMessage();
              die();
            }
              foreach ($products as $row) {
                echo '<tr>';
                echo '<form method="GET" action="productDetails.php">';
                echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                echo '<td>'.$row['product_name'].'</td>'; 

                $sql2 = 'SELECT image_link FROM image WHERE product_fk = ? AND featured = 1';
                $q2 = $pdo->prepare($sql2);
                $q2->execute(array($row['id']));
                $thumbnail = $q2->fetch();

                echo '<td>';
                echo '<img id="tiny" src=" ' . $thumbnail['image_link'] . ' ">';
                echo '</td>';

                echo '<td>'.$row['price'].'</td>';
                echo '<td><input type="submit" value="More Details"></td>';
                echo '</form>';
                echo '<form method="POST" action="addToCart.php">';
                echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                echo '<td><input type="submit" value="Add to Cart"></td>';
                echo '</form>';
                echo '</tr>';
              }
              Database::disconnect();
              ?>
           </tbody>
        </table>
      </div>
      <div>
        <a href="index.php">Return to Index</a>
      </div>
      <br>
      <br>
      <br>
      <br>
    </div><!-- /.container -->

    <?php require_once('includes/footer.php');?>

  <link rel="shortcut icon" type="image/png" href="assets/img/jmfav.png">

   <script src="assets/js/jquery.min.js"></script>
   <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
