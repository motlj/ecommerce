<?php 
require_once'includes/session.php';
require_once'includes/database.php';
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

  <title>Ecommerce | Admin</title>
 </head>

 <?php 
  require_once('includes/navbar.php');
 ?>
 
 <body>

  <div class="container">
    <div class="row">
      <h3>Update Bin Information</h3>
      <p>Please <a href="binCreate.php">Create a Bin</a>.</p>
      <p>Please make updates to your existing Bins below.</p>
    </div>
    <div class="row">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>name</th>
            <th>Action</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            if($loggedin) {
              $pdo = Database::connect();
              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $sql = 'SELECT * FROM bin ORDER BY name';
              $q = $pdo->prepare($sql);
              $q->execute(array());
              $query = $q->fetchAll(PDO::FETCH_ASSOC);
           	 
           	  foreach ($query as $row) {
                echo '<tr>';
                echo '<form method="POST" action="binUpdate.php">';
                echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                echo '<td><input type="text" name="name" value="'.$row['name'].'"></td>'; 
                echo '<td><input type="submit" value="Update"></td>';
                echo '</form>';
                echo '<form method="POST" action="binDelete.php">';
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

    <br>
    <br>

    <div class="row">
      <h3>Update Category</h3>
    </div>
    <div>
      <p>Please <a href="categoryCreate.php">Create a Category</a>.</p>
      <p>Please make updates to your existing Categories below.</p>
    </div>
    <div class="row">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Category Name</th>
            <th>Description</th>
            <th>Action</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if($loggedin) {
              //$pdo = Database::connect();
              //$id = $_SESSION['id'];
              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $sql = 'SELECT * FROM category ORDER BY id';
              $q = $pdo->prepare($sql);
              $q->execute(array());
              $query = $q->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($query as $row) {

                echo '<tr>';
                echo '<form method="POST" action="categoryUpdate.php">';
                echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                echo '<td><input type="text" name="name" value="'.$row['name'].'"></td>'; 
                echo '<td><input type="text" name="description" value="'.$row['description'].'"></td>';
                echo '<td><input type="submit" value="Update"></td>';
                echo '</form>';
                echo '<form method="POST" action="categoryDelete.php">';
                echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                echo '<td><input type="submit" value="Delete"></td>';
                echo '</form>';
                echo '</tr>';
              }
          }
                
          //Database::disconnect();
          ?>
        </tbody>
      </table>
    </div>


    <div class="row">
      <h3>Update Product Information</h3>
    </div>
    <div>
      <p>Please <a href="productCreate.php">Add a Product</a>.</p>
      <p>Please make updates to any existing Products below.</p>
    </div>
    <div class="row">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Category</th>
            <th>Bin</th>
            <th>Action</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if($loggedin) {
              //$pdo = Database::connect();
              //$id = $_SESSION['id'];
              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $sql = 'SELECT * FROM product ORDER BY id';
              $q = $pdo->prepare($sql);
              $q->execute(array());
              $query = $q->fetchAll(PDO::FETCH_ASSOC);

            foreach ($query as $row) {

                echo '<tr>';
                echo '<form method="POST" action="productUpdate.php">';
                echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                echo '<td><input type="text" name="product_name" value="'.$row['product_name'].'"></td>'; 
                echo '<td><input type="text" name="description" value="'.$row['description'].'"></td>';
                echo '<td><input type="text" name="price" value="'.$row['price'].'"></td>';
	           




	            //dropdown for category
	            echo '<td>';
	            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT `category`.`id`, `category`.`name` FROM `category` ORDER BY `name` ASC";
       	        $category = $pdo->query($sql);
                echo "<select name='id'>";

                //$sql2 = "SELECT `category`.`name` FROM `category` LEFT JOIN `product` ON (`category`.`id`=`product`.`category_fk`)";
                //$categoryname = $pdo->query($sql2);
                //echo "<option value='" . $row['category_fk'] . "'>"

                foreach ($category as $row1) {
                  echo "<option value='" . $row1['id'] . "'";
                  if($row1['id']==$row['category_fk']){
                  	echo " selected ";
                  }
                  echo ">" . $row1['name'] . "</option>";
                }

                echo "</select>";
                echo "</td>";





                //dropdown for bin
                echo '<td>';
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT `bin`.`id`, `bin`.`name` FROM `bin` ORDER BY `name` ASC";
       	        $bin = $pdo->query($sql);
                echo "<select name='id'>";
                foreach ($bin as $row2) {
                  echo "<option value='" . $row2['id'] . "'>" . $row2['name'] . "</option>";
                }
                echo "</select>";
                echo "</td>";

                echo '<td><input type="submit" value="Update"></td>';
                echo '</form>';
                echo '<form method="POST" action="productDelete.php">';
                echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                echo '<td><input type="submit" value="Delete"></td>';
                echo '</form>';
                echo '</tr>';
              }
          }
                
          //Database::disconnect();
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

  <?php 
   require_once('includes/footer.php');
   Database::disconnect();
  ?>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>

