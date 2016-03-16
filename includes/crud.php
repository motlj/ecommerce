<?php
require_once 'includes/session.php';

// helper function for validation
function valid($varname){
	return ( !empty($varname) && isset($varname) );
}

//customer table crud functions
class customer {	

	public function create($name, $last_name, $birthdate, $phone_number, $email_address, $user_name, $password){
		if (!valid($name) || !valid($last_name) || !valid($birthdate) || !valid($phone_number) || !valid($email_address) || !valid($user_name) || !valid($password)) {
			return false;
		} else {
			$pdo = Database::connect();
			$sql = "INSERT INTO customer (name,last_name,birthdate,phone_number,email_address,user_name,password) values(?, ?, ?, ?, ?, ?, ?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($name,$last_name,$birthdate,$phone_number,$email_address,$user_name,$password));
			$_SESSION['id'] = $pdo->lastInsertId();
			$_SESSION['name'] = $name;
			$_SESSION['user_name'] = $user_name;
			$_SESSION['permission'] = $permission;

			Database::disconnect();
			return true;
		}
	}

	public function read($customer_id){
		try{
			$pdo = Database::connect();
			$sql = 'SELECT * FROM customer WHERE id = ?';
			$q = $pdo->prepare($sql);
			$q->execute(array($customer_id));
			$data = $q->fetch(PDO::FETCH_ASSOC);
	        Database::disconnect();
	        return $data;
		} catch (PDOException $error){
			header( "Location: 500.php" );
			die();

		}

    }

	public function update($name, $last_name, $birthdate, $phone_number, $email_address, $user_name, $customer_id){
		if (!valid($name) || !valid($last_name) || !valid($birthdate) || !valid($phone_number) || !valid($email_address) || !valid($user_name)) {
			return false;
		} else {
			$pdo = Database::connect();
			$sql = "UPDATE customer SET name = ?, last_name = ?, birthdate = ?, phone_number = ?, email_address = ?, user_name = ? WHERE id = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($name,$last_name,$birthdate,$phone_number,$email_address,$user_name,$customer_id));
			Database::disconnect();
			return true;
		}
	}

	public function delete($customer_id){
        $pdo = Database::connect();
        $sql = "DELETE FROM customer WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($customer_id));
        Database::disconnect();
        return true;
	}
}
//end of customer crud

//--------------------------------------------------------------------------------

//address table crud functions
class customerAddress {	
	public $customer_id;
	
	public function __construct($customer_id){
		$this->customer_id = $customer_id;
	}
	
	public function create($street1, $street2, $city, $state, $zip, $country){
		if (!valid($street1) || !valid($street2) || !valid($city) || !valid($state) || !valid($zip) || !valid($country)) {
			return false;
		} else {
			$pdo = Database::connect();
			$sql = "INSERT INTO address (street1,street2,city,state,zip,country) values(?, ?, ?, ?, ?, ?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($street1,$street2,$city,$state,$zip,$country));
			$addressID = $pdo->lastInsertId();
			$sql = "INSERT INTO customer_address (address_fk, customer_fk) values(?, ?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($addressID, $this->customer_id)); 
			Database::disconnect();
			return true;
		}
	}

	public function read(){
		try{
			$pdo = Database::connect();
			$sql = 'SELECT * FROM address WHERE id IN (SELECT address_fk FROM customer_address WHERE customer_fk = ?) ORDER BY id DESC';
			$q = $pdo->prepare($sql);
			$q->execute(array($this->customer_id));
			$data = $q->fetchAll(PDO::FETCH_ASSOC);
	        Database::disconnect();
	        return $data;
		} catch (PDOException $error){
			header( "Location: 500.php" );
			die();
		}
    }

	public function update($street1, $street2, $city, $state, $zip, $country, $addressID){
		if (!valid($street1) || !valid($street2) || !valid($city) || !valid($state) || !valid($zip) || !valid($country)) {
			return false;
		} else {
			$pdo = Database::connect();
			$sql = "UPDATE address SET street1 = ?, street2 = ?, city = ?, state = ?, zip = ?, country = ? WHERE id = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($street1,$street2,$city,$state,$zip,$country,$addressID));
			Database::disconnect();
			return true;
		}
	}

	public function delete($addressID){
        $pdo = Database::connect();
        $sql = "DELETE FROM customer_address WHERE address_fk = ?"; //taken from SQL query on phpMyAdmin
        $q = $pdo->prepare($sql);
        $q->execute(array($addressID));
        Database::disconnect();
        return true;
	}
}
//end of address crud

//--------------------------------------------------------------------------------

//credit card table crud functions
class creditCard {	
	public $customer_id;
	
	public function __construct($customer_id){
		$this->customer_id = $customer_id;
	}
	
	public function create($type, $name, $card_number, $expiration, $security, $address_fk){
		if (!valid($type) || !valid($name) || !valid($card_number) || !valid($expiration) || !valid($security) || !valid($address_fk)) {
			return false;
		} else {
			$pdo = Database::connect();
			$sql = "INSERT INTO credit_card (type,name,card_number,expiration,security,address_fk) values(?, ?, ?, ?, ?, ?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($type,$name,$card_number,$expiration,$security,$address_fk));
			$ccID = $pdo->lastInsertId();
            $sql = "INSERT INTO customer_credit_card (creditcard_fk,customer_fk) values(?,?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($ccID, $this->customer_id)); 
			Database::disconnect();
			return true;
		}
	}

	public function read(){
		try{
			$pdo = Database::connect();
             $sql = 'SELECT * FROM credit_card WHERE id IN (SELECT creditcard_fk FROM customer_credit_card WHERE customer_fk = ?) ORDER BY id DESC';
			$q = $pdo->prepare($sql);
			$q->execute(array($this->customer_id));
			$data = $q->fetchAll(PDO::FETCH_ASSOC);
	        Database::disconnect();
	        return $data;
		} catch (PDOException $error){
			header( "Location: 500.php" );
			die();
		}
    }

	public function update($type, $name, $card_number, $expiration, $security, $address_fk, $addressID){
		if (!valid($type) || !valid($name) || !valid($card_number) || !valid($expiration) || !valid($security)) {
			return false;
		} else {
			$pdo = Database::connect();
			$sql = "UPDATE credit_card SET type = ?, name = ?, card_number = ?, expiration = ?, security = ?, address_fk = ? WHERE id = ?";
			$q = $pdo->prepare($sql);
        $q->execute(array($type,$name,$card_number,$expiration,$security,$address_fk,$addressID));
			Database::disconnect();
			return true;
		}
	}

	public function delete($ccID){
        $pdo = Database::connect();
        $sql = "DELETE FROM `ecommerce`.`customer_credit_card` WHERE `creditcard_fk` = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($ccID));
        Database::disconnect();
        return true;
	}
}
//end of credit card crud
//--------------------------------------------------------------------------------

//--------------------------------------------------------------------------------
//Admin CRUD

//category table crud functions
/*class shipmentCenter {	
	public $customer_id;
	
	public function __construct($customer_id){
		$this->customer_id = $customer_id;
	}
	
	public function create($name, $address_fk){
		if (!valid($name)) {
			return false;
		} else {
			$pdo = Database::connect();
            $sql = "INSERT INTO shipment_center (name,address_fk) values(?, ?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($name,$address_fk));
			Database::disconnect();
			return true;
		}
	}

	public function read(){
		try{
			$pdo = Database::connect();
            $sql = 'SELECT * FROM shipment_center ORDER BY name';
			$q = $pdo->prepare($sql);
			$q->execute(array());
			$data = $q->fetchAll(PDO::FETCH_ASSOC);
	        Database::disconnect();
	        return $data;
		} catch (PDOException $error){
			header( "Location: 500.php" );
			die();
		}
    }

	public function update($name, $addess_fk, $shipmentID){
		if (!valid($name)) {
			return false;
		} else {
			$pdo = Database::connect();
        	$sql = "UPDATE shipment_center SET name = ?, address_fk = ? WHERE id = ?";
			$q = $pdo->prepare($sql);
        	$q->execute(array($name,$address_fk,$shipmentID));
			Database::disconnect();
			return true;
		}
	}

	public function delete($shipmentID){
        $pdo = Database::connect();
        $sql = "DELETE FROM `ecommerce`.`shipment_center` WHERE `id` = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($shipmentID);
        Database::disconnect();
        return true;
	}
}
*/
//end of credit card crud

//-----------------------------------------------------------------------------------

//Beginning of Cart CRUD

class cart {
	public $customer_id;
	public $cart_id; //aka transaction ID
		
	public function __construct() {
		$this->customer_id = $_SESSION['id'];
		$pdo = Database::connect();
		$sql = 'SELECT * FROM transaction WHERE customer_fk = ? AND cart = ?';
		$q = $pdo->prepare($sql);
		$q->execute(array($this->customer_id,1));
		$cart = $q->fetch(PDO::FETCH_ASSOC);
		$this->cart_id = $cart['id'];
		Database::disconnect();
	}

	public function createCart() {
		$pdo = Database::connect();
		$sql = "INSERT INTO transaction (customer_fk) values(?)";
		$q = $pdo->prepare($sql);
		$q->execute(array($this->customer_id));
		Database::disconnect();
	}

    public function fetchCart() {
		$products = array();

		$pdo = Database::connect();
		$sql = 'SELECT * FROM product_transaction WHERE transaction_fk = ?';
		$q = $pdo->prepare($sql);
		$q->execute(array($this->cart_id));
		$product_ids = $q->fetchAll(PDO::FETCH_ASSOC);

		foreach ($product_ids as $pid => $item) {
			$sql = 'SELECT * FROM product WHERE id = ?';
			$q = $pdo->prepare($sql);
			$q->execute(array($item['product_fk']));
			$product = $q->fetch(PDO::FETCH_ASSOC);
			array_push($products, array("id"=>$item['id']/*, "product_fk" $item['product_fk'], "quantity"=>$item['quantity'], "product_name"=>$product['product_name'], "price"=>$product['price'], "description"=>$product['description']*/));
		}
		Database::disconnect();
		return $products;
	}

	public function addToCart($product_fk) {

		echo $product_fk;
		echo $this->cart_id;
		$pdo = Database::connect();
		$sql = "INSERT INTO product_transaction (transaction_fk, product_fk) values(?, ?)";
		$q = $pdo->prepare($sql);
		$q->execute(array($this->cart_id,$product_fk));
		Database::disconnect();
		return true;
	}

/*	public function updateQuantity($quantity) {
		if (!valid($quantity)) {
			return false;
		} else {
			$pdo = Database::connect();
			$sql = "UPDATE product_transaction SET quantity = ?";
			$q = $pdo->prepare($sql);
        	$q->execute(array($quantity));
			Database::disconnect();
			return true;
		}
	}

	public function deleteFromCart() {
        $pdo = Database::connect();
        $sql = "DELETE FROM `ecommerce`.`product_transaction` WHERE `transaction_fk` = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($this->cart_id));
        Database::disconnect();
        return true;
	}

*/}




