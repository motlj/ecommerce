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
    <div class="container">
	    <div class="row">
	      <br><br><br><br>
	      <h3>Cart</h3>
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
	            echo '<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="btn btn-success form-actions" value="Remove From Cart">';
	            echo '</form>';
	            echo '</div>';
	            echo '</div>';
    		}
    		echo '<br>';
            echo '<h4>Subtotal:  $' . $cost . '</h4>';
            $tax = ($cost * .056);   
            $tax = round($tax,2);         
            echo '<h4>Tax:  $' . $tax . '</h4>';
            $total = $tax + $cost;
            echo '<h3>Total:  $' . $total . '</h3>';
    	}
    	Database::disconnect();
	    ?>

<!-- 	    <div class="row">
	      <table class="table table-striped table-bordered">
	        <thead>
	          <tr>
	            <th>Name</th>
	            <th>Price</th>
	            <th>Image</th>
	            <th>Quantity</th>
	            <th>Action</th>
	            <th>Action</th>
	          </tr>
	        </thead>
	         <tbody>
	          <?php  /*
	          if($loggedin) {

				$fetchCart = new cart();				
				$products = $fetchCart->fetchCart();
				$cost = 0;

				foreach ($products as $row) {
	                echo '<tr>';
	                echo '<form method="POST" action="updateQuantity.php">';
	                echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
	                echo '<td>' . $row['product_name'] . '</td>';
	                echo '<td>' . $row['price'] . '</td>';
                	
                	$pdo = Database::connect();
	                $sql = 'SELECT image_link FROM image WHERE product_fk = ? AND featured = 1';
	                $q = $pdo->prepare($sql);
	                $q->execute(array($products['id']));
	                $thumbnail = $q->fetch();
	                echo '<td>';
	                echo '<img id="tiny" src=" ' . $thumbnail['image_link'] . ' ">';
	                echo '</td>';
	                Database::disconnect();

	                echo '<td><input type="text" name="quantity" value="' . $row['quantity'] . '"></td>';
	                echo '<td><input type="submit" value="Update Quantity"></td>';
		            $cost = $cost + (($row['price']) * ($row['quantity']));
	                echo '</form>';
	               	echo '<form method="POST" action="deleteFromCart.php">';
		            echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
		            echo '<td><input type="submit" value="Remove From Cart"></td>';
		            echo '</form>';
	                echo '</tr>';
	            }
	            echo '<br>';
                echo '<tr>';
                echo '<th>Subtotal</th>';
                echo '<th>Tax</th>';
                echo '</tr>';
                echo '<tr>';
                echo '<td>' . $cost . '</td>';
                $tax = ($cost * .056);
                echo '<td>' . $tax . '</td>';
                echo '</tr>';
                echo '<br>';
                echo '<tr>';
                echo '<th>Total:</th>';
                echo '<th>' . ($cost + $tax) . '</th>';
                echo '</tr>';

		      } 
	          */?>
	         </tbody>
	      </table>
	      <br>
	      <?php



	      ?>
	    </div> -->
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
  ?>
  </body>
</html>
