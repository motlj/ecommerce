<?php 
require_once'includes/session.php';
require_once('includes/database.php');
require_once('includes/crud.php');

echo "asjflhakjlsdgf";
die();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../assets/css/styles.css">  
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <title>Ecommerce</title>
  </head>
  <body>

  <?php 
    if ($admin) {
      require_once'includes/adminNavBar.php';
    } else {
      require_once'includes/navbar.php';
    }
    error_reporting(E_ALL);
  ?>

  <div class="container">
    <div class="row">
      <h3>Update User Information</h3>
    </div>
    <div class="row">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Birthdate</th>
            <th>Phone Number</th>
            <th>Email Address</th>
            <th>User Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <?php/*
            $customer = new customer($_SESSION['id']);
            $customer->read();
                echo '<tr>';
                echo '<form method="POST" action="userUpdate.php">';
                echo '<input type="hidden" name="id" value="' . $customer['id'] . '">';
                echo '<td><input type="text" name="first_name" value="'.$customer['name'].'"></td>'; 
                echo '<td><input type="text" name="last_name" value="'.$customer['last_name'].'"></td>';
                echo '<td><input type="text" name="dob" value="'.$customer['birthdate'].'"></td>';
                echo '<td><input type="text" name="phone" value="'.$customer['phone_number'].'"></td>';
                echo '<td><input type="text" name="email" value="'.$customer['email_address'].'"></td>';
                echo '<td><input type="text" name="username" value="'.$customer['user_name'].'"></td>';
                echo '<td><input type="submit" value="Update"></td>';
                echo '</form>';
                echo '<form method="POST" action="userDelete.php">';
                echo '<input type="hidden" name="id" value="' . $customer['id'] . '">';
                echo '<td><input type="submit" value="Delete"></td>';
                echo '</form>';
                echo '</tr>';*/
          ?>

        </tbody>
      </table>
    </div>

    <br>
    <br>

    <div class="row">
      <h3>Update Address</h3>
    </div>
    <div>
      <p>If you have not registered an address with your account, please <a href="addressCreate.php">Create an Address</a>.</p>
      <p>Please make updates to your existing addresses below.</p>
    </div>
    <div class="row">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Street Number</th>
            <th>Street Number (continued)</th>
            <th>City</th>
            <th>State</th>
            <th>Zip Code</th>
            <th>Country</th>
            <th>Action</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <?php
            $myAddresses = new customerAddress($_SESSION['id']);

            foreach ($myAddresses->read() as $row) {

                echo '<tr>';
                echo '<form method="POST" action="addressUpdate.php">';
                echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                echo '<td><input type="text" name="street1" value="'.$row['street1'].'"></td>'; 
                echo '<td><input type="text" name="street2" value="'.$row['street2'].'"></td>';
                echo '<td><input type="text" name="city" value="'.$row['city'].'"></td>';
                echo '<td><input type="text" name="state" value="'.$row['state'].'"></td>';
                echo '<td><input type="text" name="zip" value="'.$row['zip'].'"></td>';
                echo '<td><input type="text" name="country" value="'.$row['country'].'"></td>';
                echo '<td><input type="submit" value="Update"></td>';
                echo '</form>';
                echo '<form method="POST" action="addressDelete.php">';
                echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                echo '<td><input type="submit" value="Delete"></td>';
                echo '</form>';
                echo '</tr>';
              }
          ?>

        </tbody>
      </table>
    </div>


    <div class="row">
      <h3>Update Credit Card Information</h3>
    </div>
    <div>
      <p>If you have not registered a credit card with your account, please <a href="ccCreate.php">add a credit card</a>.</p>
      <p>Please make updates to your existing credit cards below.</p>
    </div>
    <div class="row">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Type</th>
            <th>Name on Card</th>
            <th>Card Number</th>
            <th>Expiration Date</th>
            <th>CVV Code</th>
            <th>Action</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
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
                echo '<td><input type="submit" value="Update"></td>';
                echo '</form>';
                echo '<form method="POST" action="ccDelete.php">';
                echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                echo '<td><input type="submit" value="Delete"></td>';
                echo '</form>';
                echo '</tr>';
              }
          }
                
          Database::disconnect();
              //print_r($query);
          ?>
        </tbody>
      </table>
    </div>

    <div>
      <a href="index.php">Return to Index</a>
    </div>
    <br>
    <br>
    <br>
    <br>
  </div> <!-- /container -->

  <?php require_once('includes/footer.php');?>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
