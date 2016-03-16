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
	  <title>Ecommerce | Cart</title>
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
	    <div class="row">
	      <h3>Cart</h3>
	    </div>
	    <div class="row">
	      <table class="table table-striped table-bordered">
	        <thead>
	          <tr>
	            <th>Name</th>
	            <th>Price</th>
	            <th>Quantity</th>
	            <th>Action</th>
	            <th>Action</th>
	          </tr>
	        </thead>
	         <tbody>
	          <?php
	          if($loggedin) {
/*	          	  $pdo = Database::connect();
	              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	              $sql ='SELECT * FROM product_transaction WHERE transaction_fk IN (SELECT id FROM transaction)';
	              $q = $pdo->prepare($sql);
	              $q->execute(array());
	              $query = $q->fetchAll(PDO::FETCH_ASSOC);

	            foreach ($query as $row) { */
	            	echo $products;
				$fetchCart = new cart();
				$cart = $fetchCart->fetchCart();

				foreach ($products as $row) {
	                echo '<tr>';
	                echo '<form method="POST" action="updateQuantity.php">';
	                echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
	                echo '<td><input type="text" name="product_name" value="'.$row['product_name']. '"></td>';
	                echo '<td><input type="text" name="price" value="'.$row['price']. '"></td>';
	                echo '<td><input type="text" name="quantity" value="' .$row['quantity']. '"></td>';
	                echo '<td><input type="submit" value="Update Quantity"></td>';
	                echo '</form>';
	               	echo '<form method="POST" action="deleteFromCart.php">';
		            echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
		            echo '<td><input type="submit" value="Remove From Cart"></td>';
		            echo '</form>';
	                echo '</tr>';
		        }
		      } 
	          Database::disconnect();
	          ?>
	         </tbody>
	      </table>
	    </div>
        <div>
          <a href="checkout.php">Checkout</a>
        </div>
        <br>
        <br>

        <div>
          <a href="index.php">Return to Index</a>
        </div>
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
