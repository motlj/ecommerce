<?php
require_once('includes/session.php');
error_reporting(E_ALL);
require_once 'includes/database.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
      $typeError = null;
      $nameError = null;
      $card_numberError = null;
      $expirationError = null;
      $securityError = null;
         
        // keep track post values
      $type = $_POST['type'];
      $name = $_POST['name'];
      $card_number = $_POST['card_number'];
      $expiration = $_POST['expiration'];
      $security = $_POST['security'];
      $address_fk = $_POST['address_fk'];


        // validate input
      $valid = true;
        
      if (empty($type)) {
        $typeError = 'Please enter Card Type';
        $valid = false;
      }
      if (empty($name)) {
        $nameError = 'Please enter Name as it appears on card)';
        $valid = false;
      }
      if (empty($card_number)) {
        $card_numberError = 'Please enter Card Number';
        $valid = false;
      }
      if (empty($expiration)) {
        $expirationError = 'Please enter Expiration Date';
        $valid = false;
      }
      if (empty($security)) {
        $securityError = 'Please enter CVV Code (3 digit code found on back of card)';
        $valid = false;
      }
         
      if ($valid) {
        try {
          $pdo = Database::connect();
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = "INSERT INTO credit_card (type,name,card_number,expiration,security,address_fk) values(?, ?, ?, ?, ?, ?)";
          $q = $pdo->prepare($sql);
          $q->execute(array($type,$name,$card_number,$expiration,$security,$address_fk));
          $ccID = $pdo->lastInsertId();
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = "INSERT INTO customer_credit_card (creditcard_fk,customer_fk) values(?,?)";
          $q = $pdo->prepare($sql);
          $q->execute(array($ccID, $_SESSION['id']));
          Database::disconnect();

          header("Location: update.php");
        } catch (PDOException $e) {
          echo $e->getMessage();
        }
      }
    }


?>



<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--   <link rel="stylesheet" type="text/css" href="../assets/css/styles.css">   -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <title>Add a Credit Card</title>
 </head>
  
  <body>
    <?php // require_once('includes/navbar.php');?>


    <div class="container">
      <div class="span10 offset1">
        <div class="row">
          <h3>Please fill out all fields to add a credit card.</h3>
        </div>           
        <form class="form-horizontal" action="ccCreate.php" method="post"> 

          <div class="control-group <?php echo !empty($typeError)?'error':'';?>">
            <label class="control-label">Credit Card Type</label>
            <div class="controls">
              <input name="type" type="text" placeholder="Credit Card Type" value="<?php echo !empty($type)?$type:'';?>">
              <?php if (!empty($typeError)): ?>
                <span class="help-inline"><?php echo $typeError;?></span>
              <?php endif;?>
            </div>
          </div>

          <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
            <label class="control-label">Name as it appears on Card</label>
            <div class="controls">
              <input name="name" type="text" placeholder="Name as it appears on Card" value="<?php echo !empty($name)?$name:'';?>">
              <?php if (!empty($nameError)): ?>
                <span class="help-inline"><?php echo $nameError;?></span>
              <?php endif;?>
            </div>
          </div>

          <div class="control-group <?php echo !empty($card_numberError)?'error':'';?>">
            <label class="control-label">Credit Card Number</label>
            <div class="controls">
              <input name="card_number" type="text" placeholder="Credit Card Number" value="<?php echo !empty($card_number)?$card_number:'';?>">
              <?php if (!empty($card_numberError)): ?>
                <span class="help-inline"><?php echo $card_numberError;?></span>
              <?php endif;?>
            </div>
          </div>

          <div class="control-group <?php echo !empty($expirationError)?'error':'';?>">
            <label class="control-label">Expiration Date</label>
            <div class="controls">
              <input name="expiration" type="text" placeholder="Expiration Date" value="<?php echo !empty($expiration)?$expiration:'';?>">
              <?php if (!empty($expirationError)): ?>
                <span class="help-inline"><?php echo $expirationError;?></span>
              <?php endif;?>
            </div>
          </div>

          <div class="control-group <?php echo !empty($securityError)?'error':'';?>">
            <label class="control-label">CVV Code</label>
            <div class="controls">
              <input name="security" type="text" placeholder="CVV Code" value="<?php echo !empty($security)?$security:'';?>">
              <?php if (!empty($securityError)): ?>
                <span class="help-inline"><?php echo $securityError;?></span>
              <?php endif;?>
            </div>
          </div>

          <br>

          <?php
            try {
              $pdo = Database::connect();
              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $sql = "SELECT * FROM address LEFT JOIN customer_address ON (address.id=customer_address.address_fk) AND (customer_address.customer_fk = ". $_SESSION['id'] . ")";
              $address = $pdo->query($sql);
              echo "<select name='Address'>";
              foreach ($address as $row) {
                echo "<option name='address_fk' method='post' value='" . $row['id'] . "'>" . $row['street1'] . "</option>";
              }
              echo "</select>";
              Database::disconnect();
            } catch (PDOException $e) {
              echo $e->getMessage();
              Database::disconnect();
            }
          ?>

          <br>
          <br>
          <br>
          <div class="form-actions">
            <button type="submit" class="btn btn-success">Add Credit Card</button>
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
