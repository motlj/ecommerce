<?php
require_once('includes/session.php');
require_once 'includes/database.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
      $product_nameError = null;
      $descriptionError = null;
      $priceError = null;
         
        // keep track post values
      $product_name = $_POST['product_name'];
      $description = $_POST['description'];
      $price = $_POST['price'];
      $category_fk = $_POST['category_fk'];
      $bin_fk = $_POST['bin_fk'];

        // validate input
      $valid = true;
        
      if (empty($product_name)) {
        $product_nameError = 'Please enter Product Name';
        $valid = false;
      }
      if (empty($description)) {
        $descriptionError = 'Please enter Description';
        $valid = false;
      }
      if (empty($price)) {
        $priceError = 'Please enter Price of Product';
        $valid = false;
      }
         
        // insert data
      if ($valid) {
        try {
          $pdo = Database::connect();
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = "INSERT INTO `product` (product_name, description, price, category_fk, bin_fk) values(?, ?, ?, ?, ?)";
          $q = $pdo->prepare($sql);
          $q->execute(array($product_name,$description,$price,$category_fk,$bin_fk));
              // $productID = $pdo->lastInsertId();
              // attempting to use $binID in another SQL statement for bin_shipment
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
          <h3>Please enter corresponding information to add a product.</h3>
        </div>           
        <form class="form-horizontal" action="productCreate.php" method="post"> 

          <div class="control-group <?php echo !empty($product_nameError)?'error':'';?>">
            <label class="control-label">Product Name</label>
            <div class="controls">
              <input name="product_name" type="text" placeholder="Product Name" value="<?php echo !empty($product_name)?$product_name:'';?>">
              <?php if (!empty($product_nameError)): ?>
                <span class="help-inline"><?php echo $product_nameError;?></span>
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

          <div class="control-group <?php echo !empty($priceError)?'error':'';?>">
            <label class="control-label">Product Price</label>
            <div class="controls">
              <input name="price" type="text" placeholder="Product Price" value="<?php echo !empty($price)?$price:'';?>">
              <?php if (!empty($priceError)): ?>
                <span class="help-inline"><?php echo $priceError;?></span>
              <?php endif;?>
            </div>
          </div>
          <br>

          <?php
            try {
              $pdo = Database::connect();
              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $sql = "SELECT * FROM `bin` ORDER BY `name` ASC";
              $bin = $pdo->query($sql);
              echo "Please choose Bin";
              echo "<br>";
              echo "<select name='bin_fk'>";
              foreach ($bin as $row) {
                echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
              }
              echo "</select>";
              echo "<br>";

              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $sql = "SELECT * FROM `category` ORDER BY `name` ASC";
              $category = $pdo->query($sql);
              echo "Please choose Category";
              echo "<br>";
              echo "<select name='category_fk'>";
              foreach ($category as $row1) {
                echo "<option value='" . $row1['id'] . "'>" . $row1['name'] . "</option>";
              }
              echo "</select>";
              echo "<br>";
              Database::disconnect();
            } catch (PDOException $e) {
              echo $e->getMessage();
              Database::disconnect();
            }
          ?>

          <div class="form-actions">
            <button type="submit" class="btn btn-success">Add Product</button>
          </div>
        </form>
      </div>
    </div>

    <?php require_once('includes/footer.php');?>

 </body>
</html>
