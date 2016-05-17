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

    <title>J. Marie Sign &amp; Design</title>
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

      <div id="searchResults" class="row">
      </div>

      <div id="hidden">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <img id="banner" alt="Hand Crafted Wooden Signs" title="Hand Crafted Wooden Signs" src="assets/img/americanflagbanner.jpg" alt="Wooden American Flag Map">
          </div>
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
            <a href="categories.php?id=11"><img class="imagewidth" alt="Wooden Signs - Wisconsin Home" title="Wooden Signs - Wisconsin Home" src="assets/img/home.png"></a>
            <br>
            <a href="categories.php?id=11"><h5 class="center">Wooden Signs</h5></a>
            <br>
          </div>
        </div>
      </div>
    </div>

    <?php require_once('includes/footer.php');?>


  </body>
</html>
