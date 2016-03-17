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
	  <title>Ecommerce | Checkout</title>
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
	      <h3>Verify Shipping Information</h3>
	    </div>
	    <div>
	      <h4>Personal Information:</h4>
	    </div>
	    <div class="row">
			<?php
				$customer = new customer();
				$cust = $customer->read($_SESSION['id']);
			    
			    echo '<form method="POST" action="placeOrder.php">';
			    echo '<input type="hidden" name="id" value="' . $cust['id'] . '">';
			    echo ''.$cust['name'].'';
			    echo '&nbsp;'; 
			    echo ''.$cust['last_name'].'';
			    echo '<br>';
			    echo ''.$cust['phone_number'].'';
			    echo '<br>';
			    echo ''.$cust['email_address'].'';
			    echo '<br>';
			    echo '<br>';
			?>
	    </div>
		<br>
		<br>
		<br>
	    <div class="row">
	      <h4>Select Shipping Address</h4>
	    </div>
	    <div>
	      <p>If you need to add a new address, please do so <a href="addressCreate.php">here</a>.</p>
	    	<?php
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "SELECT `address`.`id`, `address`.`street1` FROM `address` WHERE `address`.`id` IN (SELECT `customer_address`.`address_fk` FROM `customer_address` WHERE `customer_address`.`customer_fk` = ?) ORDER BY `address`.`street1`";
				$q = $pdo->prepare($sql);
				$q->execute(array($_SESSION['id']));
				$address = $q->fetchAll(PDO::FETCH_ASSOC);
				echo "<select name='address_fk'>";
				foreach ($address as $row) {
				 echo "<option value='" . $row['id'] . "'>" . $row['street1'] . "</option>";
				}
				echo "</select>";
	        ?>
		</div>
		<br>
		<br>
		<br>
	    <div class="row">
	      <h4>Select Credit Card</h4>
	    </div>
	    <div>
	      <p>If you need to add a new address, please do so <a href="ccCreate.php">here</a>.</p>
	    	<?php
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "SELECT `credit_card`.`id`, `credit_card`.`card_number` FROM `credit_card` WHERE `credit_card`.`id` IN (SELECT `customer_credit_card`.`creditcard_fk` FROM `customer_credit_card` WHERE `customer_credit_card`.`customer_fk` = ?) ORDER BY `credit_card`.`card_number`";
				$q = $pdo->prepare($sql);
				$q->execute(array($_SESSION['id']));
				$address = $q->fetchAll(PDO::FETCH_ASSOC);
				echo "<select name='creditcard_fk'>";
				foreach ($address as $row) {
				 echo "<option value='" . $row['id'] . "'>" . $row['card_number'] . "</option>";
				}
				echo "</select>";
	        ?>
	    </div>

<!-- 	      <table class="table table-striped table-bordered">
	        <thead>
	          <tr>
	            <th>Type</th>
	            <th>Name on Card</th>
	            <th>Card Number</th>
	            <th>Expiration Date</th>
	            <th>CVV Code</th>
	            <th>Address</th>
	            <th>Action</th>
	          </tr>
	        </thead>
	        <tbody>
	         *****removed opening php tag to comment section out.
	          if($loggedin) {
	            //try {
	              $pdo = Database::connect();
	              $id = $_SESSION['id'];
	              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	              $sql = 'SELECT * FROM credit_card WHERE id IN (SELECT creditcard_fk FROM customer_credit_card WHERE customer_fk = ?)';
	              $q = $pdo->prepare($sql);
	              $q->execute(array($id));
	              $query = $q->fetchAll(PDO::FETCH_ASSOC);
	            //} catch (PDOException $e) {
	            //  echo $e->getMessage();
	            //}
	            //die();
	            
	            foreach ($query as $row) {

	                echo '<tr>';
	                echo '<form method="POST" action="ccUpdate.php">';
	                echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
	                echo '<td><input type="text" name="type" value="'.$row['type'].'"></td>'; 
	                echo '<td><input type="text" name="name" value="'.$row['name'].'"></td>';
	                echo '<td><input type="text" name="card_number" value="'.$row['card_number'].'"></td>';
	                echo '<td><input type="text" name="expiration" value="'.$row['expiration'].'"></td>';
	                echo '<td><input type="text" name="security" value="'.$row['security'].'"></td>';
	                echo '<td>';
	                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	                $sql = "SELECT `address`.`id`, `address`.`street1` FROM `address` ORDER BY `street1` ASC";
	                $address = $pdo->query($sql);
	                echo "<select name='address_fk'>";

	                foreach ($address as $row1) {
	                  echo "<option value='" . $row1['id'] . "'";
	                  if($row1['id']==$row['address_fk']){
	                    echo " selected ";
	                  }
	                  echo ">" . $row1['street1'] . "</option>";
	                }
	                echo "</select>";
	                echo "</td>";
	                
	                echo '<td><input type="submit" value="Update"></td>';
	                echo '</tr>';
	              }
	          }
	          Database::disconnect();
	          ?>
	        </tbody>
	      </table> -->

	    <div>
          <a href="placeOrder.php" input type="submit" value="place_order">Place order</a>
        </div>
		
		<div>
          <a href="cart.php" input type="submit" value="Cart">Return to Cart</a>
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
