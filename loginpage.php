<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">  
    <title>J. Marie Sign &amp; Design | Login</title>
 </head>
  
  <body>
    <?php require_once('includes/navbar.php');?>

    <div id="searchResults" class="row">
    </div>

    <div id="hidden">
      <div class="container" id="login"><center>
        <br>
        <br>
        <br>
        <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-0 col-xs-0">
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="starter-template">
              <p class="lead">Please enter username and password to login to your account.<br></p>
            </div>
          </div>         
          <div class="control-group controls">
            <form action="includes/login.php" method="post">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <input type="text" name="user_name" placeholder="User Name">
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <input type="password" name="password" placeholder="Password">
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <input type="submit" class="btn btn-success form-actions" value="Login"> 
                </div>
              </div>       
            </form>
          </div>
          <br>
          <div>
          	<p>If you do not have an account please click register below</p>
          </div>
          <br>
          <div>
            <form action="register.php" method="post">
              <input type="submit" class="btn btn-success form-actions" value="Register">
            </form>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-0 col-xs-0">
          </div>
        </div>
      <br><br><br></center></div>
    </div>

    <?php require_once('includes/footer.php');?>


  </body>
</html>
