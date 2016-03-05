<?php
require_once('includes/session.php');
error_reporting(E_ALL);
require_once 'includes/database.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
      $street1Error = null;
      $street2Error = null;
      $cityError = null;
      $stateError = null;
      $zipError = null;
      $countryError = null;
         
        // keep track post values
      $street1 = $_POST['street1'];
      $street2 = $_POST['street2'];
      $city = $_POST['city'];
      $state = $_POST['state'];
      $zip = $_POST['zip'];
      $country = $_POST['country'];
         
        // validate input
      $valid = true;
        
      if (empty($street1)) {
        $street1Error = 'Please enter Street Number';
        $valid = false;
      }
      if (empty($street2)) {
        $street2Error = 'Please enter Street Number (continued)';
        $valid = false;
      }
      if (empty($city)) {
        $cityError = 'Please enter City';
        $valid = false;
      }
      if (empty($state)) {
        $stateError = 'Please enter State';
        $valid = false;
      }
      if (empty($zip)) {
        $zipError = 'Please enter Zip Code';
        $valid = false;
      }
      if (empty($country)) {
        $countryError = 'Please enter Country';
        $valid = false;
      }
         
        // insert data
      if ($valid) {
        try {
          $pdo = Database::connect();
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = "INSERT INTO address (street1,street2,city,state,zip,country) values(?, ?, ?, ?, ?, ?)";
          $q = $pdo->prepare($sql);
          $q->execute(array($street1,$street2,$city,$state,$zip,$country));
          $addressID = $pdo->lastInsertId();
          //attempting to use $addressID in another SQL statement
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = "INSERT INTO customer_address (address_fk,customer_fk) values(?,?)";
          $q = $pdo->prepare($sql);
          $q->execute(array($addressID, $_SESSION['id']));
          $query = $q->fetch(PDO::FETCH_ASSOC);
          //print_r($query);
          Database::disconnect();
          //echo $addressID;
          //die();

          header("Location: update.php");
        } catch (PDOException $e) {
          echo $e->getMessage();
        }
      }
    }

//need to debug, not redirecting to update, not showing query row on update.

?>



<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--   <link rel="stylesheet" type="text/css" href="../assets/css/styles.css">   -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <title>Register</title>
 </head>
  
  <body>
    /<?php //require_once('includes/navbar.php');?>


    <div class="container">
      <div class="span10 offset1">
        <div class="row">
          <h3>Please fill out all fields to create an address.</h3>
        </div>           
        <form class="form-horizontal" action="addressCreate.php" method="post"> 

          <div class="control-group <?php echo !empty($street1Error)?'error':'';?>">
            <label class="control-label">Street Number</label>
            <div class="controls">
              <input name="street1" type="text" placeholder="Street Number" value="<?php echo !empty($street1)?$street1:'';?>">
              <?php if (!empty($street1Error)): ?>
                <span class="help-inline"><?php echo $street1Error;?></span>
              <?php endif;?>
            </div>
          </div>

          <div class="control-group <?php echo !empty($street2Error)?'error':'';?>">
            <label class="control-label">Street Number (continued)</label>
            <div class="controls">
              <input name="street2" type="text" placeholder="Street Number (continued)" value="<?php echo !empty($street2)?$street2:'';?>">
              <?php if (!empty($street2Error)): ?>
                <span class="help-inline"><?php echo $street2Error;?></span>
              <?php endif;?>
            </div>
          </div>

          <div class="control-group <?php echo !empty($cityError)?'error':'';?>">
            <label class="control-label">City</label>
            <div class="controls">
              <input name="city" type="text" placeholder="City" value="<?php echo !empty($city)?$city:'';?>">
              <?php if (!empty($cityError)): ?>
                <span class="help-inline"><?php echo $cityError;?></span>
              <?php endif;?>
            </div>
          </div>

          <div class="control-group <?php echo !empty($stateError)?'error':'';?>">
            <label class="control-label">State</label>
            <div class="controls">
              <input name="state" type="text" placeholder="State" value="<?php echo !empty($state)?$state:'';?>">
              <?php if (!empty($stateError)): ?>
                <span class="help-inline"><?php echo $stateError;?></span>
              <?php endif;?>
            </div>
          </div>

          <div class="control-group <?php echo !empty($zipError)?'error':'';?>">
            <label class="control-label">Zip Code</label>
            <div class="controls">
              <input name="zip" type="text" placeholder="Zip Code" value="<?php echo !empty($zip)?$zip:'';?>">
              <?php if (!empty($zipError)): ?>
                <span class="help-inline"><?php echo $zipError;?></span>
              <?php endif;?>
            </div>
          </div>

          <div class="control-group <?php echo !empty($countryError)?'error':'';?>">
            <label class="control-label">Country</label>
            <div class="controls">
              <input name="country" type="text" placeholder="Country" value="<?php echo !empty($country)?$country:'';?>">
              <?php if (!empty($countryError)): ?>
                <span class="help-inline"><?php echo $countryError;?></span>
              <?php endif;?>
            </div>
          </div>
                        
          <div class="form-actions">
            <button type="submit" class="btn btn-success">Add Address</button>
            <!-- no longer need a button to go back as this is the page being updated   <a class="btn" href="index.php">Back</a>   -->
          </div>
        </form>
      </div>
    </div>

    <?php require_once('includes/footer.php');?>

  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>

 </body>
</html>
