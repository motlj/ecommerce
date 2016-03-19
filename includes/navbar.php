<nav class="navbar navbar-default navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a id="logo" class="navbar-brand" href="index.php"><img src="assets/img/jmarie.png"></a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <?php
        require_once 'database.php';
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'SELECT id, name FROM category ORDER BY name ASC';

          echo '<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="categories.php">Categories<span class="caret"></span></a>';
          echo '<ul class="dropdown-menu">';
          foreach ($pdo->query($sql) as $category) {
            echo '<li id="' . $category['name'] . '">';
              echo '<a href="categories.php?id=' . $category['id'] . '">';
                echo ' ' . $category['name'] . ' ';
              echo '</a>';
            echo '</li>';
            
          }
          echo '</ul>';
          echo '</li>';

        Database::disconnect();
        ?>
        <li class="navbar-right"><a href="cart.php">Cart</a></li>
        <!-- <li><a href="productPage.php">Products</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li> -->
        
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
          } else {
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
          }
          ?>
      </ul>
        <div class="col-sm-3 col-md-3 pull-right">
        <form method="GET" class="navbar-form" role="search" action="search.php">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
        </form>
        </div>
    </div><!--/.nav-collapse -->
  </div>
</nav>
<br>
<br>
<br>