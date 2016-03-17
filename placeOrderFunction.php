<?php
require_once'includes/session.php';
require_once'includes/database.php';
require_once'includes/crud.php';
 error_reporting(E_ALL);
 Database::connect();


	$checkout = new cart();
	$verify = $checkout->checkout();

	if ($verify) {
		header('Location: placeOrder.php');
	} else {
		header('Location: cart.php');
	}
}