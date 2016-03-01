
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ecommerce</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

  </head>

  <body>
    <br>
    <br>
    <br>
    <br>
  <?php require_once('includes/navbar.php');?>

    
    <div class="container">
      <div class="starter-template">
        <h1>Login</h1>
        <p class="lead">Please login or click register to create an account.<br></p>
      </div>
      <div>
        <form action="includes/login.php" method="post">
          <input type="text" name="user_name" placeholder="user_name">
          <input type="text" name="password" placeholder="password">
          <input type="submit" value="Login">        
        </form>
      </div>
      <div>
        <form action="register.php" method="post">
          <input type="submit" value="Register">
        </form>
      </div>
      <div>
        <?php
          if ($loggedin){
            echo "you are logged in.";
          } else {
            echo "logged out.";
          }
        ?>
      </div>
    </div><!-- /.container -->

    <?php require_once('includes/footer.php');?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>  

  </body>
</html>
