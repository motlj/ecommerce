<?php
require_once 'includes/session.php';
require_once 'includes/database.php';
?>

<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">

    <title>J. Marie Sign &amp; Design | Categories</title>
 </head>

  <body>
    <div class="container">
      <div class="row">
        <h3>List of all Categorys</h3>
      </div>
      <div class="row">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Name</th>
              <th>Description</th>
              <th>Action</th>
            </tr>
          </thead>
           <tbody>
    
              <?php 
              if ($admin) {
                require_once'includes/adminNavBar.php';
              } else {
                require_once'includes/navbar.php';
              }

              $category_id = $_GET['id'];
              $pdo = Database::connect();
              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $sql = 'SELECT * FROM category';
              $q = $pdo->prepare($sql);
              $q->execute(array());
              $category = $q->fetchAll();

              foreach ($category as $row) {
                echo '<tr>';
                echo '<form method="GET" action="categories.php">';
                echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                echo '<td>'.$row['name'].'</td>'; 
                echo '<td>'.$row['description'].'</td>';
                echo '<td><input type="submit" value="See Products"></td>';
                echo '</form>';
                echo '</tr>';
              }
              Database::disconnect();
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
    </div><!-- /.container -->

    <?php require_once('includes/footer.php');?>

  </body>
</html>
