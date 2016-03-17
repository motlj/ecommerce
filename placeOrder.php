<?php 
require_once'includes/session.php';
require_once'includes/database.php';
require_once'includes/crud.php';
 error_reporting(E_ALL);
 Database::connect();
?>
<!DOCTYPE html>
<html id="background" lang="en">
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


    ?>

    <div class="container">
      <div class="row">
      	<h3>Success!</h3>
        <br>
      	<h4>Thank you for your order.</h4>
        <br>

        <?php
          //$sql = 'SELECT id FROM transaction WHERE id = (SELECT transaction_fk FROM product_transaction)';
          //$q = $pdo->prepare($sql);
          //$transactionID = $q->execute(array($_SESSION['id'],1));
        ?>

  		  <p>Your confirmation number is <?php //echo $transactionID ?>. An email will be sent to you shortly containing this confirmation number and receipt. You will be emailed again once your purchase has shipped.</p>
        <br>
        <a href="index.php">Return to Home Page</a>
        <br>
        <br>

        <br>
        <br>
        <br>
        <br>
      </div> <!-- /row -->
    </div> <!-- /container -->

  <?php 
   require_once('includes/footer.php');
   Database::disconnect();
  ?>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
