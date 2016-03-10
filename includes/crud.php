<?php
/*
require_once'database.php';

// helper function for validation
function valid($varname){
	return ( !empty($varname) && isset($varname) );
}

//begin customer class for crud
class customerAddress {	
​
	public $customer_id;
​
	public function __construct($customer_id){
		$this->customer_id = $customer_id;
	}
​
	public function create($street1, $street2, $city, $state, $zip, $country){
		if (!valid($street1) || !valid($street2) || !valid($city) || !valid($state) || !valid($zip) || !valid($country)) {
			return false;
		} else {
			$pdo = Database::connect();
			$sql = "INSERT INTO address (street1,street2,city,state,zip,country) values(?, ?, ?, ?, ?, ?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($street1,$street2,$city,$state,$zip,$country));
			$addressID = $pdo->lastInsertId();
			$sql = "INSERT INTO customer_address (address_fk, customer_fk) values(?,?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($addressID, $this->customer_id)); 
			Database::disconnect();
			return true;
		}
	}
​
	public function read(){
		try{
			$pdo = Database::connect();
			$sql = 'SELECT * FROM address WHERE id IN (SELECT address_fk FROM customer_address WHERE customer_fk = ?) ORDER BY id ASC';
			$q = $pdo->prepare($sql);
			$q->execute(array($this->customer_id));
			$data = $q->fetchAll(PDO::FETCH_ASSOC);
	        Database::disconnect();
	        return $data;
		} catch (PDOException $error){
			//header( "Location: 500.php" );
			echo $error->getMessage();
			die();
		}
    }
​
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
​
	public function delete($addressID){
        $pdo = Database::connect();
        $sql = "DELETE FROM `ecommerce`.`customer_address` WHERE `address_fk` = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($addressID));
        Database::disconnect();
        return true;
	}



}
​
​*/
​
​
​
​
