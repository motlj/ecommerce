<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Ecommerce</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li><a href="adminUpdate.php">Administrative Functions</a></li>
        <li><a href="update.php">Update Profile</a></li>
        <!-- <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Product Categories<span class="caret"></span></a>
                      <ul class="dropdown-menu">  
                           php opening tag
                          $pdo = Database::connect();
                          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                          $sql = 'SELECT id, name FROM category ORDER BY name ASC';
                          $q = $pdo->prepare($sql);
                          $q->execute(array());
                          $query = $q->fetchAll(PDO::FETCH_ASSOC);


                          foreach ($query as $row) {
                            echo '<li id="' . $row[name] . '" >';
                            <li id=" echo $row['id'];"><a href="category.php?catid= echo $row['id'];">echo $row['name'];?></a></li> }
                          php closing tag   
                      </ul>  -->
        <li><a href="productPage.php">Products</a></li>
        <li><a href="cart.php">Cart</a></li>
        <li><a href="includes/logout.php">Logout</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>
<br>
<br>
<br>