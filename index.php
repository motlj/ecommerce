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
      <div class="browntext">
        <?php
        if ($loggedin) {
          echo "Welcome Back, ";
          echo $_SESSION['name'];
        }
        ?>
      </div>

      <div id="banner">
        <a href="categories.php?id=11"><img id="banner" src="assets/img/americabanner.jpg" alt="Wooden American Flag Map"></a>
      </div>
      <br>
      <br>


      <table id="border" class="table table-striped table-bordered">
        <thead>
          <tr class="tablehead">
            <th>
              <h3 class="tantext">Sale of the Week:</h3>
            </th>
            <th colspan=2>
              <h3 class="tantext"> Wisconsin Home - Bold </h3>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr id="tablebody">
            <td>
              <img src="assets/img/red1.jpg">
            </td>
            <td>
              <h2>$100.00</h2>
            </td>
            <td>
              <p>Our signature Wisconsin Home sign. This sign is finished with a solid black background, a bold red Wisconsin and bright white lettering.</p>
            </td>
          </tr>
          <tr class="tablehead">
            <th colspan=3>
              <a href="productDetails.php?id=17">Product Details</a>
            </th>
          </tr>
        </tbody>
      </table>
      <br>
      <br>
      <br>




      

    </div><!-- /.container -->

    <?php require_once('includes/footer.php');?>

  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
