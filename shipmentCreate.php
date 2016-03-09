<?php
require_once('includes/session.php');
error_reporting(E_ALL);
require_once 'includes/database.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
      $nameError = null;
         
        // keep track post values
      $name = $_POST['name'];
      $address_fk = $_POST['address_fk'];
         
        // validate input
      $valid = true;
        
      if (empty($name)) {
        $nameError = 'Please enter Shipment Center Name';
        $valid = false;
      }
         
        // insert data
      if ($valid) {
        try {
          $pdo = Database::connect();
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = "INSERT INTO shipment_center (name,address_fk) values(?, ?)";
          $q = $pdo->prepare($sql);
          $q->execute(array($name,$address_fk));
          Database::disconnect();

          header("Location: adminUpdate.php");
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
    <link rel="stylesheet" type="text/css" href="../assets/css/styles.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <title>Register</title>
 </head>
  
  <body>
    /<?php require_once('includes/navbar.php');?>


    <div class="container">
      <div class="span10 offset1">
        <div class="row">
          <h3>Please fill out all fields to create a Shipment Center.</h3>
        </div>           
        <form class="form-horizontal" action="shipmentCreate.php" method="post"> 

          <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
            <label class="control-label">Shipment Center Name</label>
            <div class="controls">
              <input name="name" type="text" placeholder="Shipment Center Name" value="<?php echo !empty($name)?$name:'';?>">
              <?php if (!empty($nameError)): ?>
                <span class="help-inline"><?php echo $nameError;?></span>
              <?php endif;?>
            </div>
          </div>

          <br>

          <?php
            try {
              $pdo = Database::connect();
              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $sql = "SELECT `address`.`id`, `address`.`street1` FROM `address` ORDER BY `street1`";
              $address = $pdo->query($sql);
              echo "Please Select Address";
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
            <button type="submit" class="btn btn-success">Add Shipment Center</button>
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
