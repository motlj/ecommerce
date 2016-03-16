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
        <li><a href="index.php">Home</a></li>
        <?php
        require_once 'database.php';
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'SELECT id, name FROM category ORDER BY name ASC';

        foreach ($pdo->query($sql) as $category) {
          echo '<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="categories.php">Categories<span class="caret"></span></a>';
            echo '<ul class="dropdown-menu">';
              echo '<li id="' . $category['name'] . '">';
                echo '<a href="categories.php?id="' . $category['id'] . '">';
                  echo ' ' . $category['name'] . ' ';
                echo '</a>';
              echo '</li>';
            echo '</ul>';
          echo '</li>';
        }
        Database::disconnect();
        ?>
        <li><a href="productPage.php">Products</a></li>
        <li><a href="cart.php">Cart</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>
        
          <?php
          if ($loggedin) {
            echo '<li>';
              echo '<a href="update.php">';
                echo "Update Profile";
              echo '</a>';
            echo '</li>';
            echo '<li>';
              echo '<a href="includes/logout.php">';
                echo "Logout";
              echo '</a>';
            echo '</li>';

/*            echo '<li>';
            echo '<form action="update.php" method="post">';
              echo '<input type="submit" value="Update Profile">';
            echo '</form>';
            echo '</li>';
            echo '<li>';
            echo '<form action="includes/logout.php" method="post">';
              echo '<input type="submit" value="Logout">';
            echo '</form>';
            echo '</li>';
*/          } else {
            echo '<li>';
              echo '<a href="loginpage.php">';
                echo "Login";
              echo '</a>';
            echo '</li>';
            echo '<li>';
              echo '<a href="register.php">';
                echo "Register";
              echo '</a>';
            echo '</li>';

/*            echo '<li>';
            echo '<form action="loginpage.php" method="post">';
              echo '<input type="submit" value="Login">';
            echo '</form>';
            echo '</li>';
            echo '<li>';
            echo '<form action="register.php" method="post">';
              echo '<input type="submit" value="Register">';
            echo '</form>';
            echo '</li>';
*/          }
          ?>
        
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>
<br>
<br>
<br>