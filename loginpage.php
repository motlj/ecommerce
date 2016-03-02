<!DOCTYPE html>
<html lang="en">
    <?php require_once('includes/head.php');?>

  <title>Login</title>
  
  <body>
    <?php require_once('includes/navbar.php');?>

    
    <div class="container">
      <div class="starter-template">
        <h1>Login</h1>
        <p class="lead">Please enter username and password to login to your account.<br></p>
      </div>
      <div>
        <form action="includes/login.php" method="post">
          <input type="text" name="user_name" placeholder="user_name">
          <input type="text" name="password" placeholder="password">
          <input type="submit" value="Login">        
        </form>
      </div>
      <div>
      	<p>If you do not have an account please click register below</p>
      </div>
      <div>
        <form action="register.php" method="post">
          <input type="submit" value="Register">
        </form>
      </div>
    </div>

    <?php require_once('includes/footer.php');?>

  </body>
</html>
