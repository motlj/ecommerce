<?php require_once('includes/session.php');?>

<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
    <link rel="stylesheet" type="text/css" href="assets/css/flexslider.css">

    <title>Ecommerce</title>
 </head>

  <body id="background-image">
    <?php require_once('includes/navbar.php');?>

    <div class="container">
      <section class="slider">
        <div class="flexslider">
          <ul class="slides">
            <li>
              <img src="assets/img/homesignhigh.jpg" title="Wisconsin Home" alt="Wisconsin Home"/>
            </li>
            <li>
              <img src="assets/img/woodflaghigh.jpg" title="Wooden American Flag" alt="Wooden American Flag"/>
            </li>
            <li>
              <img src="assets/img/woodwisconsinhigh.jpg" title="Wooden Wisconsin." alt="Wooden Wisconsin"/>
            </li>
          </ul>
        </div>
      </section>
    </div>

    <div class="container">
      <div class="starter-template">
        <h1>Login</h1>
        <p class="lead">Please click login to sign into your account or click register to create an account.<br></p>
      </div>
      <div>
        <form action="loginpage.php" method="post">
          <input type="submit" value="Login">
        </form>
      </div>
      
      <br>
      
      <div>
        <form action="register.php" method="post">
          <input type="submit" value="Register">
        </form>
      </div>
      
      <br>

      <div>
        <form action="includes/logout.php" method="post">
          <input type="submit" value="Logout">
        </form>
      </div>

      <div>
        <br>
        <br>
        <?php
          if ($loggedin) {
            echo "You are logged in.";
            echo '<form method="POST" action="update.php">';
            echo '<input type="submit" value="Update User Info">';
            echo '</form>';
          
          } else {
            echo "You are logged out.";
          }
        ?>
      </div>
    </div><!-- /.container -->

    <?php require_once('includes/footer.php');?>


  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
