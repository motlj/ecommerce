<?php 
require_once('session.php');
require_once('database.php');
?>

<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/styles.css">

    <title>Ecommerce | Sitemap</title>
 </head>
 <body>

    <div class="container">
      <a alt="Homepage" title="Homepage" href="../index.php">Homepage</a>
      <br>
      <a alt="Register Account" title="Register Account" href="../register.php">Registration</a>
      <a alt="Login Page" title="Login Page" href="../loginpage.php">Login Page</a>
      <br>
      <a alt="Update User Information" title="Update User Information" href="../update.php">Update User Information</a>
      <br>
      <p>Categories</p> <!-- create a page that lists all categories with links to all products in said cateogry -->
      <br>
      <p>Products</p> <!-- Create a page that lists all products and sends them to URL using GET -->
      <br>
      <a alt="Cart" title="Cart" href="../cart.php">Cart</a>
      <br>
    </div><!-- /.container -->

  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
