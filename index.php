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

    <title>J. Marie Sign & Design</title>
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
      <div id="welcome" class="browntext">
        <?php
        if ($loggedin) {
          echo "Welcome Back, ";
          echo $_SESSION['name'];
        }
        ?>
      </div>

      <div id="banner">
        <img id="banner" src="assets/img/americanflagbanner.jpg" alt="Wooden American Flag Map">
      </div>
      <br>
      <hr>
      <h2 class="center">Featured Categories</h2>
      <hr>
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <a href="categories.php?id=12"><img class="imagewidth" alt="Bottle Opener" title="Bottle Opener" src="assets/img/bottleopener.png"></a>
          <br>
          <a href="categories.php?id=12"><h5 class="center">Bottle Openers</h5></a>
          <br>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <a href="categories.php?id=14"><img class="imagewidth" alt="Pipe Decorations" title="Pipe Decorations" src="assets/img/pipelamp.png"></a>
          <br>
          <a href="categories.php?id=14"><h5 class="center">Decorative Pipe Creations</h5></a>
          <br>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <a href="categories.php?id=11"><img class="imagewidth" alt="Wooden Signs Wisconsin Home" title="Wooden Signs Wisconsin Home" src="assets/img/home.png"></a>
          <br>
          <a href="categories.php?id=11"><h5 class="center">Wooden Signs</h5></a>
          <br>
        </div>
      </div>



    </div> <!-- /container-->

    <!-- <div class="row">
      <table id="border" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>
              <h3>Sale of the Week:</h3>
            </th>
            <th colspan=2>
              <h3> Wisconsin Home - Bold </h3>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <img id="homepageImage" src="assets/img/redhome/red1.JPG">
            </td>
            <td>
              <h2>$100.00</h2>
            </td>
            <td>
              <p>Our signature Wisconsin Home sign. This sign is finished with a solid black background, a bold red Wisconsin and bright white lettering.</p>
            </td>
          </tr>
          <tr>
            <th colspan=3>
              <a href="productDetails.php?id=17">Product Details</a>
            </th>
          </tr>
        </tbody>
      </table>
      <br>
      <br>
      <br>
    </div> --><!-- /.container -->

    <?php require_once('includes/footer.php');?>

  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
