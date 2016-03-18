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
