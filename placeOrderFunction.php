<?php
require_once'includes/session.php';
require_once'includes/database.php';
require_once'includes/crud.php';
 error_reporting(E_ALL);

	$checkout = new cart();
	echo $checkout->customer_id;
	echo $checkout->cart_id;
	
	$verify = $checkout->checkout();

	if ($verify) {
		header('Location: placeOrder.php');
	} else {
		header('Location: cart.php');
	}
}