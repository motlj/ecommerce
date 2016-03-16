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
        <?php
        require_once 'database.php';
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'SELECT id, name FROM category ORDER BY name ASC';

          echo '<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="categories.php">Categories<span class="caret"></span></a>';
          echo '<ul class="dropdown-menu">';
          foreach ($pdo->query($sql) as $category) {
            echo '<li id="' . $category['name'] . '">';
              echo '<a href="categories.php?id="' . $category['id'] . '">';
                echo ' ' . $category['name'] . ' ';
              echo '</a>';
            echo '</li>';
          }
          echo '</ul>';
          echo '</li>';

        Database::disconnect();
        ?>
        <!-- <li><a href="productPage.php">Products</a></li> -->
        <li><a href="cart.php">Cart</a></li>
        <li><a href="includes/logout.php">Logout</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>
<br>
<br>
<br>