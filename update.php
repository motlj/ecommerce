<?php require_once('includes/session.php');?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--     <link rel="stylesheet" type="text/css" href="../assets/css/styles.css">  
 -->    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <title>Ecommerce</title>
  </head>
  <body>

  <?php 
    require_once('includes/navbar.php');
    require_once('includes/database.php');
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
            <th>Password</th>
            <th>Action</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            // include '../database.php';   --already required above
          if($loggedin) {
              $pdo = Database::connect();
              $username = $_SESSION['user_name'];
              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $sql = 'SELECT * FROM customer WHERE user_name = ?';
              $q = $pdo->prepare($sql);
              $q->execute(array($username));
              $query = $q->fetch(PDO::FETCH_ASSOC);

              //$q = $pdo->prepare($sql);
              //$q->execute(array($username));
              //foreach ($pdo->query($query) as $row) {
                echo '<tr>';

                echo '<form method="POST" action="userUpdate.php">';
                echo '<input type="hidden" name="id" value="' . $query['id'] . '">';
                echo '<td><input type="text" name="first_name" value="'.$query['name'].'"></td>'; 
                echo '<td><input type="text" name="last_name" value="'.$query['last_name'].'"></td>';
                echo '<td><input type="text" name="dob" value="'.$query['birthdate'].'"></td>';
                echo '<td><input type="text" name="phone" value="'.$query['phone_number'].'"></td>';
                echo '<td><input type="text" name="email" value="'.$query['email_address'].'"></td>';
                echo '<td><input type="text" name="username" value="'.$query['user_name'].'"></td>';
                echo '<td>***</td>';
                echo '<td><input type="submit" value="Update"></td>';
                echo '</form>';

                echo '<form method="POST" action="userDelete.php">';
                echo '<input type="hidden" name="id" value="' . $query['id'] . '">';
                echo '<td><input type="submit" value="Delete"></td>';
                echo '</form>';

                echo '</tr>';
              }
                
              Database::disconnect();
              print_r($query);
          //}
          ?>
        </tbody>
      </table>
    </div>
    <div>
      <a href="index.php">Return to Index</a>
    </div>
  </div> <!-- /container -->

  <?php require_once('includes/footer.php');?>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
