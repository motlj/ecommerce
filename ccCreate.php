<?php
error_reporting(E_ALL);
require_once 'includes/database.php';
require_once 'includes/crud.php';
require_once 'includes/session.php';
 
    if ( !empty($_POST)) {
         
        // keep track post values
      $type = $_POST['type'];
      $name = $_POST['name'];
      $card_number = $_POST['card_number'];
      $expiration = $_POST['expiration'];
      $security = $_POST['security'];
      $address_fk = $_POST['address_fk'];

      $createCC = new creditCard($_SESSION['id']);
      $response = $createCC->create($type,$name,$card_number,$expiration,$security,$address_fk);

      if ($response) {
        header('Location: update.php');
      } else {
        header('Location: update.php');
      }
    }
?>

<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">  
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <title>J. Marie Sign &amp; Design | Add a Credit Card</title>
 </head>
  
  <body>
    <?php require_once('includes/navbar.php');?>


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
              $sql = "SELECT `address`.`id`, `address`.`street1` FROM `address` LEFT JOIN `customer_address` ON `address`.`id`=`customer_address`.`address_fk` WHERE (`customer_address`.`customer_fk` = ". $_SESSION['id'] . ")";
              $address = $pdo->query($sql);
              echo "Please choose an Address";
              echo "<br>";
              echo "<select name='address_fk'>";
              foreach ($address as $row) {
                echo "<option value='" . $row['id'] . "'>" . $row['street1'] . "</option>";
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
            <a class="btn" href="update.php">Back</a>
          </div>
        </form>
      </div>
    </div>

    <?php require_once('includes/footer.php');?>


 </body>
</html>
