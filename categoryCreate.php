<?php
require_once('includes/session.php');
error_reporting(E_ALL);
require_once 'includes/database.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
      $nameError = null;
      $descriptionError = null;
         
        // keep track post values
      $name = $_POST['name'];
      $description = $_POST['description'];
         
        // validate input
      $valid = true;
        
      if (empty($name)) {
        $nameError = 'Please enter Category Name';
        $valid = false;
      }
      if (empty($description)) {
        $descriptionError = 'Please enter Description';
        $valid = false;
      }
         
        // insert data
      if ($valid) {
        try {
          $pdo = Database::connect();
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = "INSERT INTO category (name, description) values(?, ?)";
          $q = $pdo->prepare($sql);
          $q->execute(array($name,$description));
          $binID = $pdo->lastInsertId();
              //attempting to use $binID in another SQL statement for bin_shipment
              // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              // $sql = "INSERT INTO bin_shipment (bin_fk,customer_fk) values(?,?)";
              // $q = $pdo->prepare($sql);
              // $q->execute(array($addressID, $_SESSION['id']));
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

    <title>J. Marie Sign &amp; Design | Create Bin</title>
 </head>
  
  <body>
    /<?php require_once('includes/navbar.php');?>


    <div class="container">
      <div class="span10 offset1">
        <div class="row">
          <h3>Please enter following information to create a Category.</h3>
        </div>           
        <form class="form-horizontal" action="categoryCreate.php" method="post"> 

          <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
            <label class="control-label">Category Name</label>
            <div class="controls">
              <input name="name" type="text" placeholder="Category Name" value="<?php echo !empty($name)?$name:'';?>">
              <?php if (!empty($nameError)): ?>
                <span class="help-inline"><?php echo $nameError;?></span>
              <?php endif;?>
            </div>
          </div>

          <div class="control-group <?php echo !empty($descriptionError)?'error':'';?>">
            <label class="control-label">Description</label>
            <div class="controls">
              <input name="description" type="text" placeholder="Description" value="<?php echo !empty($description)?$description:'';?>">
              <?php if (!empty($descriptionError)): ?>
                <span class="help-inline"><?php echo $descriptionError;?></span>
              <?php endif;?>
            </div>
          </div>
                        
          <div class="form-actions">
            <button type="submit" class="btn btn-success">Create Category</button>
          </div>
        </form>
      </div>
    </div>

    <?php require_once('includes/footer.php');?>

  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
 </body>
</html>
