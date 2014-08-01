<?php

	require_once("connection.php"); 

class Customer{

	private $iCustomerID;
	private $sFirstName;
	private $sLastName;
	private $sAddress;
	private $sTelephone;
	private $sEmail;
	private $sUserName;
	private $sPassword;
	private $bExisting; 

	public function __construct(){
		$this->iCustomerID = 0;
		$this->sFirstName = "";
		$this->sLastName = "";
		$this->sAddress = "";
		$this->sTelephone = "";
		$this->sEmail = "";
		$this->sUserName = "";
		$this->sPassword = ""; 
		$this->bExisting = false; 
	}

	public function encode($sValue){
		
		$sEncrypt = md5(sha1(md5($sValue))+sha1($sValue));

		return $sEncrypt;
	}

	public function load($iID){

		// open
		$oConnection = new Connection();

		// execute query
		$sSQL = "SELECT CustomerID, FirstName, LastName, Address, Telephone, Email, Username, Password
		FROM tbcustomer
		WHERE CustomerID =".$oConnection->escape_value($iID);

		$oResult = $oConnection->query($sSQL);

		// extract
		$aCustomer = $oConnection->fetch_array($oResult); 

		$this->iCustomerID = $aCustomer["CustomerID"];
		$this->sFirstName = $aCustomer["FirstName"];
		$this->sLastName = $aCustomer["LastName"];
		$this->sAddress = $aCustomer["Address"];
		$this->sTelephone = $aCustomer["Telephone"];
		$this->sEmail = $aCustomer["Email"];
		$this->sUserName = $aCustomer["Username"];
		$this->sPassword = $aCustomer["Password"];

		$this->bExisting = true; 

		// close
		$oConnection->close_connection();

	}

	public function save(){

		$oConnection = new Connection();

		if($this->bExisting == false){

			$sSQL = "INSERT INTO tbcustomer(FirstName, LastName, Address, Telephone, Email, UserName, Password
				)
			VALUES (
				'".$oConnection->escape_value($this->sFirstName)."',
				'".$oConnection->escape_value($this->sLastName)."',
				'".$oConnection->escape_value($this->sAddress)."',
				'".$oConnection->escape_value($this->sTelephone)."',
				'".$oConnection->escape_value($this->sEmail)."',
				'".$oConnection->escape_value($this->sUserName)."',
				'".$oConnection->escape_value($this->sPassword)."'
				)"; 

			$bResult = $oConnection->query($sSQL);

			if($bResult == true){
				$this->iCustomerID = $oConnection->get_insert_id(); 
				$this->bExisting = true;
			}else{
				die($sSQL. "failed"); 
			}

		}else { 
			// updating current customer 

			$sSQL = "UPDATE tbcustomer
			SET FirstName = '".$oConnection->escape_value($this->sFirstName)."', 
			LastName = '".$oConnection->escape_value($this->sLastName)."',
			Address = '".$oConnection->escape_value($this->sAddress)."', 
			Telephone = '".$oConnection->escape_value($this->sTelephone)."',
			Email = '".$oConnection->escape_value($this->sEmail)."',
			UserName = '".$oConnection->escape_value($this->sUserName)."',
			Password = '".$oConnection->escape_value($this->sPassword)."'
			WHERE tbcustomer.CustomerID =".$oConnection->escape_value($this->iCustomerID); 

			$bResult = $oConnection->query($sSQL);

			if($bResult ==false){
				die($sSQL. "fails"); 
			}

		}

		$oConnection->close_connection();

	}

	public function __get($var){

		switch($var) {
			case "html":
				return $this->sHTML."</form>";
				break;
			case "CustomerID":
				return $this->iCustomerID;
				break;
			case "FirstName":
				return $this->sFirstName;
				break;
			case "LastName":
				return $this->sLastName;
				break;
			case "Address":
				return $this->sAddress;
				break;
			case "Telephone":
				return $this->sTelephone;
				break;
			case "Email":
				return $this->sEmail;
				break;
			case "Username":
				return $this->sUserName;
				break;
			case "Password":
				return $this->sPassword;
				break;
			default:
				 die($var . "does not exist in customer");
		}

	}

	public function __set($var,$value){

		switch($var) {
				case "FirstName":
					$this->sFirstName = $value;
					break;
				case "LastName":
					$this->sLastName = $value;
					break;
				case "Address":
					$this->sAddress = $value;
					break;
				case "Telephone":
					$this->sTelephone = $value;
					break;
				case "Email":
					$this->sEmail = $value;
					break;
				case "UserName":
					$this->sUserName = $value;
					break;
				case "Password":
					$this->sPassword = $value;
					break;
				default:
					die($var . "does not exist in customer");
		}

	}

}

//Test

// $oCustomer = new Customer();

// $oCustomer->FirstName = "Test";
// $oCustomer->LastName = "Test";
// $oCustomer->Address = "Test";
// $oCustomer->Telephone = "Test";
// $oCustomer->Email = "Test";
// $oCustomer->UserName = "Test";
// $oCustomer->Password = "Test";

// $oCustomer->save();


?>