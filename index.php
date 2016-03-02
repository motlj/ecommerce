<?php require_once('includes/session.php');?>

<!DOCTYPE html>
<html lang="en">
    <?php require_once('includes/head.php');?>

  <title>Ecommerce</title>
  
  <body>
    <?php require_once('includes/navbar.php');?>

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
          } else {
            echo "You are logged out.";
          }
        ?>
      </div>
    </div><!-- /.container -->

    <?php require_once('includes/footer.php');?>

  </body>
</html>
