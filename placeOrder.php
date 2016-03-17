<?php 
require_once'includes/session.php';
require_once'includes/database.php';
require_once'includes/crud.php';
 error_reporting(E_ALL);
 Database::connect();
?>
<!DOCTYPE html>
<html lang="en">
 <head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	  <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
	  <title>Ecommerce | Confirmation</title>
 </head>

 <body>
	  <?php 
      if ($admin) {
       require_once'includes/adminNavBar.php';
      } else {
       require_once'includes/navbar.php';
      }

      $address = $_POST['address_fk'];

      $cc = $_POST['creditcard_fk'];

      echo $address;

      echo $cc;

    ?>

    <div class="container">
    	<h3>Success!</h3>
    	<h4>Thank you for your order.</h4>
		<p>Your confirmation number is BLAHBLAH. An email will be sent to you shortly containing this confirmation number and receipt. You will be emailed again once your purchase has shipped.</p>
		
		<div>
          <a href="index.php">Return to Home Page</a>
        </div>
        <br>
        <br>

        <br>
        <br>
        <br>
        <br>
    </div> <!-- /container -->

  <?php 
   require_once('includes/footer.php');
   Database::disconnect();
  ?>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
