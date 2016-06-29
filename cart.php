<?php 
require_once'includes/session.php';
require_once'includes/database.php';
require_once'includes/crud.php';
?>
<!DOCTYPE html>
<html lang="en">
 <head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	  <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
	  <title>J. Marie Sign &amp; Design | Cart</title>
 </head>

 <body>
	  <?php 
	     if ($admin) {
	       require_once'includes/adminNavBar.php';
	     } else {
	       require_once'includes/navbar.php';
	     }
      ?>
    <div class="container"><center>
    	
    	<div id="searchResults" class="row">
        </div>

	    <div id="hidden">
		    <div class="row">
		      <br><br>
		      <center><h1>Your Shopping Cart</h1></center>
		      <br><hr><br>
		    </div>
		    <?php
		    if($loggedin) {
		    	$fetchCart = new cart();				
				$products = $fetchCart->fetchCart();
				$cost = 0;
				echo '<div class="row">';
	            echo '<form method="POST" action="updateQuantity.php">';
	            echo '<input type="hidden" name="id" value="' . $row['id'] . '">';

				foreach ($products as $row) {

	            	//echo '<div class="row">this is the product id:' . $row['product_fk'] . '</p></div>';

	                $pdo = Database::connect();
	                $sql2 = 'SELECT image_link FROM image WHERE product_fk = ? AND featured = 1';
	                $q2 = $pdo->prepare($sql2);
	                $q2->execute(array($row['product_fk']));
	                $thumbnail = $q2->fetch();

	                //echo '<div class="row"><p>' . $thumbnail['image_link'] . '</p></div>';
	                echo '<div class="col-lg-3 col-md-3 col-sm-12"><center><img id="cartImage" src="'. $thumbnail['image_link'] . '"></center></div>';

	                echo '<div class="col-lg-1 col-md-1 col-sm-0"></div>';
	          	    echo '<div class="col-lg-8 col-md-8 col-sm-12">';

	          	    echo '<h2>' . $row['product_name'] . '  -  <em>$' . $row['price'] . '</em></h2>';
	                echo '<input type="text" size="2" name="quantity" value="' . $row['quantity'] . '">&nbsp;&nbsp;';
	                echo '<input type="submit" class="btn btn-success form-actions" value="Update Quantity">';
	                $cost = $cost + (($row['price']) * ($row['quantity']));
	                echo '</form><br>';
	                echo '<form method="POST" action="deleteFromCart.php">';
		            echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
		            //echo '<p>this is the id:' . $row['id'] . '</p>';
		            echo '<br><input type="submit" class="btn btn-danger form-actions" value="Remove From Cart">';
		            echo '</form>';
		            echo '<hr>';
		            echo '</div>';
		            echo '</div>';
	    		}
	    		echo '<br>';
	    		echo '<center><div class="row">';
	            echo '<h4>Subtotal:  $' . $cost . '</h4>';
	            echo '</div>';
	            $tax = ($cost * .056);   
	            $roundedTax = number_format((float)$tax,2, '.', '');         
	            echo '<div class="row">';
	            echo '<h4>Tax:  $' . $roundedTax . '</h4>';
	            echo '</div>';
	            $total = $roundedTax + $cost;
	            $roundedTotal = number_format((float)$total,2, '.', '');
	            echo '<div class="row">';
	            echo '<h3>Total:  $' . $roundedTotal . '</h3>';
	            echo '</div>';
	    	}
	    	Database::disconnect();
		    ?>

	        <div><center>
	        	<form method="POST" action="checkout.php">
	        		<input type="submit" class="btn btn-success form-actions" value="Checkout">
	        	</form>
	          <!-- <a href="checkout.php">Checkout</a> -->
	        <center></div>
	        <br>
	        <br>

	        <div><center>
	          <a href="index.php">Return to Index</a>
	        </div>
	        <br>
	        <br>
	        <br>
	        <br>
	    </div>
    </center></div> <!-- /container -->

  <?php 
   require_once('includes/footer.php');
  ?>
  </body>
</html>
