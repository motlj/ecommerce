	require_once('database.php');
	session_start();
	
	$loggedin = false
	if (!empty($_SESSION['user_name'])) {
		$loggedin = true;
	}