<?php
require_once'includes/session.php';
require_once'includes/database.php';
require_once'includes/crud.php';
 error_reporting(E_ALL);
 Database::connect();


if ( !empty($_POST)) {
	$address_fk = $_POST['address_fk'];
	$creditcard_fk = $_POST['creditcard_fk'];

	$checkout = new cart();
	$verify = $checkout->checkout($address_fk, $creditcard_fk);
	
	if ($verify) {
		header('Location: placeOrder.php');
	} else {
		header('Location: cart.php');
	}
}