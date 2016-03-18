<?php 
require_once('includes/session.php');
require_once('includes/database.php');
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
    <?php 
    if ($admin) {
      require_once'includes/adminNavBar.php';
    } else {
      require_once'includes/navbar.php';
    }
    ?>

    <div class="container">
      <?php
      if ($loggedin) {
        echo "Welcome Back, ";
        echo $_SESSION['name'];
      }
      ?>

      <div id="banner">
        <a href="categories.php?id=10"><img id="banner" src="assets/img/americabanner.jpg" alt="Wooden American Flag Map"></a>
      </div>
      <br>
      <br>

      <?php/*
        echo '<table class="table table-striped table-bordered">';
          echo '<thead>';
            echo '<tr>';
              echo '<th><h3>Sale of the Week:</h3></th>';

                    $pdo = Database::connect();
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = 'SELECT * FROM product WHERE id = 14      //ORDER BY RAND() LIMIT 1';
                    //$q = $pdo->prepare($sql);
                    //$q->execute(array());
                    //$query = $q->fetch(PDO::FETCH_ASSOC);
                    $query = $pdo->query($sql);
                    print_r($query);

                    $sql2 = 'SELECT * FROM image WHERE product_fk = 14      //LIMIT 1';
                    //$q2 = $pdo->prepare($sql2);
                    //$q2->execute(array(      //$query['id']));
                    //$query2 = $q2->fetch(PDO::FETCH_ASSOC);
                    $query2 = $pdo->query($sql2);
                    print_r($query2);
                    
                    Database::disconnect();

              echo '<th><h3>' . $query['product_name'] . '</h3></th>';
            echo '</tr>';
          echo '</thead>';
          echo '<tbody>';
            echo '<tr>';
              echo '<td>';
                echo '<img src="' . $query2['image_link'] . '">';
                echo '</td>';
              echo '<td>' . $query['description'] . ' </td>';
              echo '<td>' . $query['price'] . '</td>';
            echo '</tr>';
          echo '</tbody>';
        echo '</table>';*/
      ?>


      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>
              <h3>Sale of the Week:</h3>
            </th>
            <th>
              <h3> ***INSERT NAME OF PRODUCT HERE*** </h3>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <img src="assets/img/woodwisconsinlow.png">
            </td>
            <td>
              <h2>$100.00</h2>
            </td>
            <td>
              <p>SHape of wisconsin made out of distressed wood.</p>
            </td>
          </tr>
          <tr>
            <th>
              <a href="productDetails.php?id=14">Product Details</a>
            </th>
          </tr>
        </tbody>
      </table>




      

    </div><!-- /.container -->

    <?php require_once('includes/footer.php');?>

  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
