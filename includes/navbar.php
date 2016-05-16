<nav class="navbar navbar-default navbar-fixed-top">
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
        echo '<li class="dropdown">';
        echo '<a class="dropdown-toggle" data-toggle="dropdown" href="categories.php">Categories<span class="caret"></span></a>';
        echo '<ul class="dropdown-menu">';
        foreach ($pdo->query($sql) as $category) {
          echo '<li id="' . $category['name'] . '"><a href="categories.php?id=' . $category['id'] . '"> ' . $category['name'] . ' </a></li>';
        }
        echo '</ul>';
        echo '</li>';

        Database::disconnect();
      ?>
 
        <?php
          if ($loggedin) {
            echo '<li><a href="cart.php">Cart</a></li>';
            echo '<li><a href="update.php">Update Profile</a></li>';
            echo '<li><a href="includes/logout.php">Logout</a></li>';
          } else {
            echo '<li><a href="loginpage.php">Login</a></li>';
            echo '<li><a href="register.php">Register</a></li>';
          }
        ?>
  
      </ul>

       <form class="navbar-form navbar-right">
          <div class="form-group">
              <input type="text" placeholder="Search" class="form-control" name="srch-term" id="srch-term">
          </div>
       </form>





    </div><!--/.nav-collapse -->
  </div>
</nav>
<br><br><br>
